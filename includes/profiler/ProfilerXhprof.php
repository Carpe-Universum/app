<?php
/**
 * ProfilerXhprof implements profiler interface for Mediawiki and delegates profiling
 * data collection to Facebook's XHProf extension. Afterwards sends the gathered data
 * to UDP formatted in similar way to regular ProfilerSimpleUDP.
 *
 * @author wladek
 */
class ProfilerXhprof extends ProfilerStub {

	/**
	 * @var bool Is XHProf initialized in this request?
	 */
	protected static $initialized = false;
	protected static $ruUsageStart = null;

	/**
	 * Create a new ProfilerXhprof instance and bind to request shutdown event to transfer
	 * collected data.
	 */
	public function __construct() {
		if ( !self::$initialized ) {
			self::$initialized = true;
			self::$ruUsageStart = $this->getCpuTime();
			if ( !function_exists( 'xhprof_enable' ) ) {
				return;
			}
			xhprof_enable( XHPROF_FLAGS_NO_BUILTINS );
			register_shutdown_function( array( $this, 'finalize' ) );
		}
	}

	/**
	 * Collect XHProf data and send it to the attached sink
	 *
	 * DO NOT CALL DIRECTLY! Has to be public as it's called from outside the class.
	 *
	 * @access private
	 */
	public function finalize() {
		$sink = $this->getSink();
		if ( !$sink ) {
			return;
		}

		$data = $this->buildProfilerPayload();
		if ( $data ) {
			$sink->send( $data );
		}
	}

	protected function buildProfilerPayload() {
		if ( !function_exists( 'xhprof_disable' ) ) { // should never happen
			return null;
		}
		$entries = xhprof_disable();
		$entries = $this->parse( $entries );
		$entries = $this->filter( $entries );
		$entries = $this->convert( $entries );

		$request = isset( $entries['-total'] ) ? $entries['-total'] : null;
		$request = $this->appendTotalCpuTime( $request );

		return new ProfilerData(
			ProfilerData::ENGINE_XHPROF,
			$this->getProfileID(),
			$request,
			$entries
		);
	}

	/**
	 * Parse raw xhprof profiling data and return per-function summarized values.
	 * Removes closure entries as they are more misleading than helpful.
	 * Renames "main()" to "-total" which is better-known in MW world.
	 *
	 * @param $data array Raw XHProf profiling data
	 * @return array Per-function summary
	 */
	protected function parse( $data ) {
		$ndata = array();
		foreach ( $data as $k => $v ) {
			$p = strpos( $k, '==>' );
			if ( $p !== false ) {
				$k = substr( $k, $p + 3 );
			} else if ( $k === 'main()' ) {
				$k = '-total';
			} else {
				continue;
			}
			if ( substr( $k, 0, 9 ) === '{closure}' ) {
				// closure data is more misleading than helpful
				continue;
			}
			// collapse different versions of the same function
			$p = strpos( $k, '@' );
			if ( $p !== false ) {
				$k = substr( $k, 0, $p );
			}
			// scale times to MW standard (us => s)
			if ( isset( $v['wt'] ) ) $v['wt'] /= 1000000;
			if ( isset( $v['rt'] ) ) $v['rt'] /= 1000000;
			foreach ( $v as $k2 => $v2 ) {
				@$ndata[$k][$k2] += $v2;
			}
		}
		uasort( $ndata, function ( $a, $b ) {
			return $a['wt'] <= $b['wt'];
		} );

		return $ndata;
	}

	/**
	 * Filter given profiling data.
	 * Removes entries that are invalid or didn't reach the time threshold to be reported.
	 *
	 * @param $data array
	 * @return array
	 */
	protected function filter( $data ) {
		$minimumTime = $this->getMinimumTimeThreshold();
		foreach ( $data as $k => $v ) {
			if ( ( isset( $v['ct'] ) && isset( $v['wt'] ) )
				&& $v['wt'] >= $minimumTime
			) {
				continue;
			}
			unset( $data[$k] );
		}

		return $data;
	}

	/**
	 * Returns the minimum time threshold for entry to be reported
	 *
	 * @return float
	 */
	protected function getMinimumTimeThreshold() {
		global $wgXhprofMinimumTime;

		return $wgXhprofMinimumTime;
	}

	/**
	 * Filter given profiling data.
	 * Removes entries that are invalid or didn't reach the time threshold to be reported.
	 *
	 * @param $data array
	 * @return array
	 */
	protected function convert( $data ) {
		foreach ( $data as $k => $v ) {
			$data[$k] = array(
				'count' => $v['ct'],
				'real' => $v['wt'],
			);
		}

		return $data;
	}

	/**
	 * Adds cpu usage to the request entry
	 *
	 * @param $entries array (reference) Entries list to be updated
	 */
	protected function appendTotalCpuTime( $request ) {
		if ( !$request ) {
			return null;
		}
		$request['cpu'] = $this->getCpuTime() - self::$ruUsageStart;
		return $request;
	}

}