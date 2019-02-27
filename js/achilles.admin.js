jQuery(document).ready( function($){
	
	var mediaUploader;
	
	$('#upload-button').on('click',function(e) {
		e.preventDefault();
		if( mediaUploader ){
			mediaUploader.open();
			return;
		}
		
		mediaUploader = wp.media.frames.file_frame = wp.media({
			title: 'Choose Your Logo',
			button: {
				text: 'Choose Logo'
			},
			multiple: false
		});
		
		mediaUploader.on('select', function(){
			attachment = mediaUploader.state().get('selection').first().toJSON();
			$('#achilles-logo').val(attachment.url);
			$('#achilles-logo-preview').css('background-image','url(' + attachment.url + ')');
		});
		
		mediaUploader.open();
		
	});
	
	$('#remove-logo').on('click',function(e){
		e.preventDefault();
			$('#achilles-logo').val('');
			$('.achilles-general-form').submit();
		
		return;
	});
	

	$('#header_ad_textarea').text($('#header_ad_text').val());
	$('#header_mobile_ad').text($('#header_mobile_ad_text').val());
	$('#below_content_ad').text($('#below_content_ad_text').val());
	$('#below_widgets_ad').text($('#below_widget_ad_text').val());

	$('#send_email').on('click',function(e){
		e.preventDefault();
		var user_email = $('#email_signup_text').val();
		//send to php page and connect to my personal database. php page will be on my site.
		var email_url = '../wp-content/themes/Achilles3/js/email_users.php';
		$.ajax({
			url: email_url,
			type: 'POST',
			data: { email: user_email },
			success: function(data){
				console.log('Successful');
				console.log(data);
			},
			error: function(e){
				console.log('Error' + e);
			}
		});
		console.log(user_email);
	});
});