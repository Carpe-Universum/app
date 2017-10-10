define('wikia.articleVideo.featuredVideo.jwplayer.onScroll', ['wikia.onScroll', 'wikia.articleVideo.whichTransitionEvent'], function (onScroll, whichTransitionEvent) {
	return function (playerInstance, $featuredVideo, $playerContainer) {
		var videoCollapsed = false,
			collapsingDisabled = false,
			$closeBtn = $('.featured-video__close'),
			transitionEvent = whichTransitionEvent();

		function isVideoInFullScreenMode() {
			return playerInstance.getFullscreen();
		}

		function collapseVideo(videoOffset, videoHeight) {
			var videoWidth = $playerContainer.outerWidth(),
				viewportWidth = $(window).width(),
				viewportHeight = $(window).height();

			collapsingDisabled = false;
			videoCollapsed = true;
			$featuredVideo.addClass('is-collapsed-ready');

			$playerContainer.css({
				'bottom': viewportHeight - videoOffset.top - videoHeight + $(window).scrollTop(),
				'right': viewportWidth - videoOffset.left - videoWidth,
				'width': videoWidth
			});
			setTimeout(function () {
				if (videoCollapsed) { // we need to be sure video has not been uncollapsed yet
					$featuredVideo.addClass('is-collapsed');
				}
			}, 0);
		}

		function uncollapseVideo() {
			videoCollapsed = false;
			$playerContainer.css({
				'position': '',
				'bottom': '',
				'right': '',
				'top': '',
				'left': '',
				'width': ''
			});
			$featuredVideo.removeClass('is-collapsed is-collapsed-ready');
			playerInstance.resize();
		}

		function toggleCollapse() {
			// That's for Safari because it triggers scroll event (it scrolls to the top)
			// when video is switched to full screen mode.
			if (isVideoInFullScreenMode()) {
				return;
			}
			if (!collapsingDisabled || videoCollapsed) {
				var scrollTop = $(window).scrollTop(),
					videoHeight = $featuredVideo.outerHeight(),
					videoOffset = $featuredVideo.offset(),
					scrollOffset = 100,
					collapseOffset = videoOffset.top + videoHeight - scrollOffset;

				if (scrollTop > collapseOffset && !videoCollapsed) {
					collapseVideo(videoOffset, videoHeight);
				} else if (scrollTop <= collapseOffset && videoCollapsed) {
					uncollapseVideo();
				}
			}
		}

		function closeButtonClicked() {
			playerInstance.pause(true);
			uncollapseVideo();
			collapsingDisabled = true;
			// TODO tracking
			// track({
			// 	action: tracker.ACTIONS.CLOSE,
			// 	label: 'featured-video-collapsed'
			// });
		}

		function onVideoResized(event) {
			if (event.propertyName === 'width') {
				playerInstance.resize();
			}
		}

		function unbindEvents() {
			$playerContainer[0].removeEventListener(transitionEvent, onVideoResized);
			onScroll.unbind(toggleCollapse);
		}

		if (transitionEvent) {
			$playerContainer[0].addEventListener(transitionEvent, onVideoResized);
		}

		onScroll.bind(toggleCollapse);
		$closeBtn.click(closeButtonClicked);

		playerInstance.on('play', function () {
			collapsingDisabled = false;
		});

		return unbindEvents;
	}
});
