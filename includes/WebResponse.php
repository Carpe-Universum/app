<?php
/**
 * Classes used to send headers and cookies back to the user
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
 * http://www.gnu.org/copyleft/gpl.html
 *
 * @file
 */

/**
 * Allow programs to request this object from WebRequest::response()
 * and handle all outputting (or lack of outputting) via it.
 * @ingroup HTTP
 */
class WebResponse implements \Wikia\HTTP\Response {

	const NO_COOKIE_PREFIX  = '';
	const MAX_HEADER_LENGTH = 2048;

	/**
	 * Output a HTTP header, wrapper for PHP's
	 * header()
	 * @param $string String: header to output
	 * @param $replace Bool: replace current similar header
	 * @param $http_response_code null|int Forces the HTTP response code to the specified value.
	 */
	public function header( $string, $replace = true, $http_response_code = null ) {
		// PLATFORM-3070: In case of extremely long headers we should trim them to avoid problems with Fastly or other clients
		// SUS-5793: avoid large headers blowing out the nginx's FastCGI buffer and resulting in a HTTP 500 error
		if ( strlen( $string ) > self::MAX_HEADER_LENGTH ) {
			$string = substr( $string, 0, self::MAX_HEADER_LENGTH );

			\Wikia\Logger\WikiaLogger::instance()->warning( __METHOD__ . '- header was too long', [
				'header_value' => substr( $string, 0, 128 )
			] );
		}

		header( $string, $replace, $http_response_code );
	}

	/**
	 * Set the browser cookie
	 * @param string $name : name of cookie
	 * @param string $value : value to give cookie
	 * @param int $expire : Expire time in seconds (a unix epoch time)
	 * @param string $prefix : Prefix to use, if not $wgCookiePrefix (use '' for no prefix)
	 * @param string $domain : Cookie domain to use, if not $wgCookieDomain
	 */
	public function setcookie( $name, $value, $expire = 0, $prefix = null, $domain = null ) {
		global $wgCookiePath, $wgCookiePrefix, $wgCookieDomain;
		global $wgCookieSecure,$wgCookieExpiration, $wgCookieHttpOnly;
		if ( $expire == 0 ) {
			$expire = time() + $wgCookieExpiration;
		}
		if( $prefix === null ) {
			$prefix = $wgCookiePrefix;
		}
		if( $domain === null ) {
			$domain = $wgCookieDomain;
		}
		wfDebugLog( 'cookie',
			'setcookie: "' . implode( '", "',
				array(
					$prefix . $name,
					$value,
					$expire,
					$wgCookiePath,
					$domain,
					$wgCookieSecure,
					$wgCookieHttpOnly ) ) . '"' );
		setcookie( $prefix . $name,
			$value,
			$expire,
			$wgCookiePath,
			$domain,
			$wgCookieSecure,
			$wgCookieHttpOnly );
	}
}

/**
 * @ingroup HTTP
 */
class FauxResponse extends WebResponse {
	private $headers;
	private $cookies;
	private $code;

	/**
	 * Stores a HTTP header
	 * @param $string String: header to output
	 * @param $replace Bool: replace current similar header
	 * @param $http_response_code null|int Forces the HTTP response code to the specified value.
	 */
	public function header( $string, $replace = true, $http_response_code = null ) {
		if ( substr( $string, 0, 5 ) == 'HTTP/' ) {
			$parts = explode( ' ', $string, 3 );
			$this->code = intval( $parts[1] );
		} else {
			list( $key, $val ) = array_map( 'trim', explode( ":", $string, 2 ) );

			if( $replace || !isset( $this->headers[$key] ) ) {
				$this->headers[$key] = $val;
			}
		}

		if ( $http_response_code !== null ) {
			$this->code = intval( $http_response_code );
		}
	}

	/**
	 * @param $key string
	 * @return string
	 */
	public function getheader( $key ) {
		if ( isset( $this->headers[$key] ) ) {
			return $this->headers[$key];
		}
		return null;
	}

	/**
	 * Get the HTTP response code, null if not set
	 *
	 * @return Int or null
	 */
	public function getStatusCode() {
		return $this->code;
	}

	/**
	 * @todo document. It just ignore optional parameters.
	 *
	 * @param $name String: name of cookie
	 * @param $value String: value to give cookie
	 * @param $expire Int: number of seconds til cookie expires (Default: 0)
	 * @param $prefix TODO DOCUMENT (Default: null)
	 * @param $domain TODO DOCUMENT (Default: null)
	 *
	 */
	public function setcookie( $name, $value, $expire = 0, $prefix = null, $domain = null ) {
		$this->cookies[$name] = $value;
	}

	/**
	 * @param $name string
	 * @return string
	 */
	public function getcookie( $name )  {
		if ( isset( $this->cookies[$name] ) ) {
			return $this->cookies[$name];
		}
		return null;
	}
}
