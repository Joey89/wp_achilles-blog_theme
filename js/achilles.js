function scrollToTop(){
	var toTop = 2000;
	if($(window).scrollTop() > toTop){
		$(".scroll_top").show();
	}else{
		$(".scroll_top").hide();
	}
	$(window).scroll(function(){
		if($(this).scrollTop() > toTop){
			$(".scroll_top").fadeIn();
		}else{
			$(".scroll_top").fadeOut();
		}
	});
	
	$('.scroll_top').click(function(e){
		e.preventDefault();
		$('html, body').animate({
			scrollTop: 0
		}, 500);
	});
}



jQuery(document).ready(function($){
	$('.menu-search').on('click', function(e){
		e.preventDefault();
		$('.search_menu').slideToggle();
	});

	$('.icon-ham').on('click', function(){
		$('.mobile-nav').slideToggle();
	});

	scrollToTop();

	$('#send_email').on('click',function(e){
		e.preventDefault();
		var user_email = $('#email_signup_text').val();

		var re = /\S+@\S+\.\S+/;
		console.log(re.test(user_email));
		
		if(re.test(user_email) !== true){
			$('.email_feedback').text('You must enter a valid email address.');
			return;
		}
		//send to php page and connect to my personal database. php page will be on my site.
		var email_url = '../wp-content/themes/Achilles3/js/email_users.php';
		$.ajax({
			url: email_url,
			type: 'POST',
			data: { email: user_email },
			success: function(data){
				$('.email_feedback').text(data);
				
			},
			error: function(e){
				console.log('Error' + e);
			}
		});
		console.log(user_email);
	});
});