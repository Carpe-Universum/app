WikiaLabs = {};

$(function() {
	WikiaLabs.init();	
});

WikiaLabs.init = function() {
	$('#addProject').click(function(){
		WikiaLabs.editProject(0, function(){});
	});
	$('#addFeedback').click(function(){
		WikiaLabs.giveFeedback(0, function(){});
	});
	$('.buttons .slider').click(WikiaLabs.switchTogel);
	$('.WikiaLabsStaff select').change( WikiaLabs.staffEditCombo ).val(0); 
	$('.wikiaLabsMainView .buttons .feedback').click( WikiaLabs.showFeedback );
}

WikiaLabs.showFeedback = function(e){
	var target = $(e.target);
	var button = target.closest( '.feedback' );
	
	var id = button.attr('data-id');
	var starValue = button.attr('data-user-feedback');
	
	var modal =	$( '#feedbackmodal' )
					.clone()
					.attr('id','')
					.show()
					.prepend($("<div class='clearfix' ></div>"))
					.prepend(target.closest('li').find('.appScreen,.details').clone());
	
	
	var inputRating = modal.find(".rating");
	
	var stars = modal.find('.stars img');
	
	var setStarValue = function( index ) {
		stars.each(function() {
			var element = $(this);
			if(index >= element.attr('data-index') ) {
			    element.addClass('staractive')	
			} else {
				element.removeClass('staractive')	
            }
		});
	} 
	
	setStarValue(starValue);
	
	modal.find('.stars img').mouseenter(function(e){
		var index =  $(e.target).attr('data-index');
		setStarValue(index);
	}).click(function(e){
		var index =  $(e.target).attr('data-index');
		starValue = index;
		inputRating.val(index);
	}).mouseleave(function(e){
		setStarValue(starValue);
	});
	
	var okbutton = modal.find('.okbutton');
	okbutton.click(function() {
		okbutton.css('opacity', '0.5' );
		$.ajax({
			type: "POST",
			url: wgScript + '?action=ajax&rs=WikiaLabsHelper::saveFeedback' +'&rating=' + starValue ,
			dataType: "json",
			data: modal.find('form').serialize() + '&projectId=' + id,
			success: function(data) {
				okbutton.css('opacity', '1' );
				if( data.status == "error" ) {
					var errorBox = modal.find(".errorBox").show().find('div');
					errorBox.empty();
					for( var i = 0; i < data.errors.length; i++ ) {
						var error = $( "<p>" + data.errors[i] + "</p>");
						$().log( error );
						errorBox.append( error );
					}
				}
				else {
					modalWrap.closeModal();
					window.location = wgScript = '?title=' + wgCanonicalNamespace + ':' + wgCanonicalSpecialPageName;
				}
			}
		});
		return false;
	});
	
	var modalWrap = modal.makeModal({ width : 650});
}

WikiaLabs.editProject = function(id, callback) {
	$.ajax({
		url: wgScript + '?action=ajax&rs=WikiaLabsHelper::getProjectModal&id=' + id  ,
		dataType: "html",
		type: "POST",
		success: function(data) {
			callback(data);
			var modal =	$(data).makeModal({ width : 650});
			okbutton = modal.find('#saveProject'); 
			okbutton.click(function() {
				okbutton.css('opacity', '0.5' );
				$.ajax({
					type: "POST",
					url: wgScript + '?action=ajax&rs=WikiaLabsHelper::saveProject',
					dataType: "json",
					data: modal.find('form').serialize(),
					success: function(data) {
						okbutton.css('opacity', '1' );
						if( data.status == "error" ) {
							var errorBox = $(".addprjmodal #errorBox").show().find('div');
							errorBox.empty();
							for( var i = 0; i < data.errors.length; i++ ) {
								var error = $( "<p>" + data.errors[i] + "</p>");
								$().log( error );
								errorBox.append( error );
							}
						} else {
							modal.closeModal();
							window.location = wgScript = '?title=' + wgCanonicalNamespace + ':' + wgCanonicalSpecialPageName; 
						}
					}
				});
				return false;
			});
			
			modal.find('#cancelProject').click(function(){
				modal.closeModal();
			});
			
			modal.find('button.prjscreen').click(function() {
				WikiaLabs.uploadImage(modal.find('.prjscreen'));
				return false;
			}); 
			//solve YUI modal problem 
            modal.css('z-index', 9999);
            $('.blackout').css('z-index', 9998);
			
		}
	});
};

WikiaLabs.staffEditCombo = function(e) {
	var select = $(e.target);
	if(select.val() > 0) {
		select.attr('disabled', 'disabled');
		WikiaLabs.editProject(select.val(), function() {
			select.attr('disabled', '').val(0);
		});
	} 
}

WikiaLabs.uploadImage = function ( imgelement ) {
	$.loadYUI( function() {
		importStylesheetURI( wgExtensionsPath+ '/wikia/WikiaMiniUpload/css/WMU.css?'+wgStyleVersion );
		$.getScript(wgExtensionsPath+ '/wikia/WikiaMiniUpload/js/WMU.js?'+wgStyleVersion, function() {
			WMU_show();
			WMU_Event_OnLoadDetails = function() {
				$('#ImageColumnRow,#ImageSizeRow,#ImageWidthRow,#ImageLayoutRow').hide();
			};			

			WikiaLabs.WMU_insertImage = function(event,body) {
				var val = $("#ImageUploadFileName").val();
				$.ajax({
				  url: wgScript + '?action=ajax&rs=WikiaLabs::getImageUrlForEdit&name=' + val,
				  dataType: "json",
				  method: "get",
				  success: function(data) {
					if(data.status == "ok") {
						$().log(imgelement);
						imgelement.filter('img').attr('src', data.url );
						$('input.prjscreen').val(val);
					}
					WMU_close();
				  }
				});
				return false;
			}
			$("body").unbind('imageUploadSummary').bind( 'imageUploadSummary', WikiaLabs.WMU_insertImage);
		});
	});
	return false;
}

WikiaLabs.switchTogel = function(e) {
	var slider;
	slider = $(e.target).closest('.buttons').find('.slider');
	var onoff = slider.hasClass('on')  ? 0:1;
	
	if(onoff) {
		WikiaLabs.switchRequest(slider, onoff);
		return false;
	}
	
	var warning = slider.find( '.warning' ).clone();
	if(warning.length == 0) {
		WikiaLabs.switchRequest(slider, onoff);
		return false;
	}
	
	warning.show();
	var modal =	$(warning).makeModal({ width : 650});
	
	var okbutton = modal.find('.okbutton');
	var count = 3; 
	var oktitle = okbutton.html();
	okbutton.html(oktitle + '(' + count +')').css('opacity', '0.5' );
	var countdown = function() {
		count--;
		if(count != 0 ) {
			okbutton.html(oktitle + '(' + count +')')
			setTimeout(countdown,1000);
			return;
		}
		okbutton.html(oktitle).css('opacity', '1' );;
		okbutton.click( function(){
			WikiaLabs.switchRequest(slider, onoff);
			modal.closeModal();
		});	
	};
	setTimeout(countdown,1000);
	
	modal.find('.cancelbutton').click(function() {
		modal.closeModal();
	});
	return false;
}

WikiaLabs.switchRequest = function(slider, onoff) {
	$.ajax({
		url: wgScript + '?action=ajax&rs=WikiaLabsHelper::switchProject&id=' +  slider.attr('data-id') + '&onoff=' + onoff ,
		dataType: "json",
		type: "POST",
		success: function(data) {
			WikiaLabs.animateTogel(slider);
		}
	});
}

WikiaLabs.animateTogel = function(slider) {
	$().log(slider, 'WikiaLabs');
	if( slider.hasClass('on') ) {      
			slider.find('.textoff').fadeIn();              
	    	slider.find('.texton').fadeOut();    
	    	
	    	slider.find('.button').animate({       
		    	left: '-=67'     
		    });   
		    slider.removeClass('on');
	    } else {               	 
	    	slider.find('.texton').fadeIn();              
	    	slider.find('.textoff').fadeOut();
		    
	    	slider.find('.button').animate({       
	    		left: '+=67'     
	    	});
	    	slider.addClass('on'); 
	}
}

