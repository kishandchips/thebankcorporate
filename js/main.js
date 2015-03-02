;(function($) {

	var main = {
		w: $(window),
		d: $(document),
		init: function(){
			
			this.global.init();
			this.header.init();
		},


		loaded: function(){
			
		},

		global: {
			init: function(){
							
			}
		},

		body:{
			element: $('body')
		},

		header: {
			element: $('#header'),
			init: function(){
				var header = main.header.element,
					menuBtn = $('.menu-btn', header);

				menuBtn.on('click', function(e){
					e.preventDefault();
					$(this).toggleClass('active');
					header.toggleClass('navigation-open');
				});
				
				main.w.on('scroll', this.scroll).trigger('scroll');
			},
			scroll: function(){
				var scrollTop = main.w.scrollTop(),
					body = main.body.element;

				if(scrollTop > 10 && !body.hasClass('header-fixed')) {
					body.addClass('header-fixed');
				} else if(scrollTop < 10 && body.hasClass('header-fixed')) {
					body.removeClass('header-fixed');
				}
			}
		}
	};

	window.main = main;

	$(function(){
		window.main.init();
	});

})(jQuery);

