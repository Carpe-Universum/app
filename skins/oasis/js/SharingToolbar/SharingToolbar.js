(function( window, $ ) {

var $window = $( window ),
	scroll = 'scroll.SharingToolbar',
	Wikia = window.Wikia || {};

var SharingToolbar = {
	offsetTop: 0,

	init: function( options ) {
		this.$button = options.button;
		this.$toolbar = options.toolbar;
		this.offsetTop = this.$button.offset().top - 5;

		// Bind events
		this.$button.bind('click', $.proxy(this.toggleToolbar, this));
		this.$toolbar.find('.email-link').bind('click', this.onEmailClick);
	},
	onScroll: function() {
		var fixed = $window.scrollTop() >= this.offsetTop;
		this.$toolbar.toggleClass('fixed', fixed);
	},
	onEmailClick: function(ev) {
		var node = $(this),
		lightboxShareEmailLabel = node.attr('data-lightboxShareEmailLabel'),
		lightboxSend = node.attr('data-lightboxSend'),
		lightboxShareEmailLabelAddress = node.attr('data-lightboxShareEmailLabelAddress'),
		lightboxCancel = node.attr('data-lightboxcancel');

		var showEmailModal = function() {
			SharingToolbar.showEmailModal(lightboxShareEmailLabel, lightboxSend, lightboxShareEmailLabelAddress, lightboxCancel);
		};

		if ( window.wgUserName == null ) {
			if (window.wgComboAjaxLogin) {
				showComboAjaxForPlaceHolder(false, false, function () {
					AjaxLogin.doSuccess = function () {
						$('#AjaxLoginBoxWrapper').closest('.modalWrapper').closeModal();
						showEmailModal();
					};
					AjaxLogin.close = function () {
						$('#AjaxLoginBoxWrapper').closeModal();
					};
				}, false, true);
			} else {
				UserLoginModal.show({
					callback: function() {
						UserLogin.forceLoggedIn = true;
						showEmailModal();
					}
				});
			}
			return false;
		}
		else {
			showEmailModal();
		}
	},
	showEmailModal: function(lightboxShareEmailLabel, lightboxSend, lightboxShareEmailLabelAddress, lightboxCancel) {
		var refreshPage = function() {
			if (UserLogin.forceLoggedIn) {
				(new Wikia.Querystring()).addCb().goTo();
			}
		};

		$.showCustomModal(
			lightboxShareEmailLabel,
			'<label>'+lightboxShareEmailLabelAddress+'<br/>'
			+'<input type="text" id="lightbox-share-email-text" /></label>',
			{
				id: 'shareEmailModal',
				width: 690,
				showCloseButton: true,
				buttons: [
					{id:'ok', defaultButton:true, message:lightboxSend, handler:function(){
						$.nirvana.sendRequest({
							controller: 'SharingToolbarController',
							method: 'sendMail',
							format: 'json',
							data: {
								pageName: wgPageName,
								addresses: $('#shareEmailModal #lightbox-share-email-text').val(),
								messageId: 1
							},
							callback: function(data) {
								var result = data.result;
								$.showModal(result['info-caption'], result['info-content'], {
									onClose: function() {
										if (result.success) {
											refreshPage();
										}
									}
								});
								// close email modal when share is successful (BugId:16061)
								if (result.success) {
									$('#shareEmailModal').closeModal();
									refreshPage();
								}
							}
						});
					}},
					{id:'cancel', message:'Cancel', handler:function(){
							$('#shareEmailModal').hideModal();
							refreshPage();
						}
					}
				],
				onClose: refreshPage
			}
		);
	},
	checkWidth: function() {
		var maxWidth = 0,
			nodes = this.$toolbar.children();

		$.each(nodes, function(key, value) {
			var node = $(value),
				elementWidth = Math.max(node.outerWidth(), node.children().outerWidth());

			maxWidth = Math.max(elementWidth, maxWidth);
		});

		this.$toolbar.css('width', maxWidth);
	},
	toggleToolbar: function(event) {
		var show = this.$toolbar.hasClass('loading');

		event.preventDefault();

		if (show) {
			this.$toolbar.removeClass('loading');

		} else {
			show = this.$toolbar.hasClass('hidden');
		}

		this.$button.toggleClass('share-enabled', show);
		this.$toolbar.toggleClass('hidden', !show);

		if (show) {
			$window.on(scroll, $.proxy(this.onScroll, this));

		} else {
			this.checkWidth();
			$window.off(scroll);
		}
	}
};

// Exports
Wikia.SharingToolbar = SharingToolbar;
window.Wikia = Wikia;

})( window, jQuery );
