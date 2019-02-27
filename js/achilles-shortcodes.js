jQuery(document).ready(function($){
	var ac_shortcodes = {

		accordion: function(){
			var spans = [];
			$('.accordion').children('span').each(function(){
				spans.push($(this));
				$(this).hide();
			});

			$('.accordion').children('div').each(function(index){

				var $self = $(this);
				$(this).siblings().on('click', function(){
					spans[index].hide();
					$self.html('+');
					clicked = false;
				});

				var clicked = false;
				$(this).on('click', function(){
					if(clicked === true){
						$(this).html('+');
						clicked = false;
					}else{
						$(this).html('-');
						clicked=true;
					}
					spans[index].toggle();
				});
				
			});
		}
	};

	ac_shortcodes.accordion();

});

