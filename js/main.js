;(function($) {

	var main = {
		w: $(window),
		d: $(document),
		init: function(){
			
			this.global.init();
			this.header.init();
			this.frontpage.init();
			this.infiniteScroll();
			this.magnific.init();
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
		},

		frontpage: {
			element: $('#front-page'),
			init: function(){

				var element = this.element;

				if(!element.length) return false;
				
				this.carousel.init();
			},
			carousel: {
				element: $('.owl-carousel'),
				init: function(){

					var element = this.element;

					if(!element.length) return false;

					element.owlCarousel({
						loop: true,
					    dots: true,
					    nav: true,
					    items: 1,
						animateOut: 'fadeOut',
						animateIn: 'fadeIn',
						navText: ["",""],
					});
				}
			}
		},

		magnific: {
			element: $('.post-gallery'),
			init: function(){

				var element = this.element;

				if(!element.length) return false;
				
		        element.magnificPopup({
		          delegate: 'a',
		          type: 'image',
		          tLoading: 'Loading image #%curr%...',
		          mainClass: 'mfp-img-mobile',
		          gallery: {
		          	enabled: true,
		            navigateByImgClick: true,
		            preload: [0,1] // Will preload 0 - before current, and 1 after the current image
		          },
		          image: {
		            tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
		          }
		        });


			
			}
		},		



		infiniteScroll: function() {
			  var container = $('ul.posts');

			container.infinitescroll({
				navSelector: "#navbelow",
				nextSelector: "#navbelow a",
				itemSelector: ".posts li",
				extraScrollPx: 150,
			loading: {
				finishedMsg: 'No more items to load.',
					img: 'http://i.imgur.com/qkKy8.gif'
				}
			}, function (newElements) {
				var newElems = $( newElements ).hide();
					newElems.imagesLoaded(function(){
					newElems.fadeIn(); // fade in when ready
				});			  	
			});

			$(window).unbind('.infscr');
			$('a#next').click(function(e){
				e.preventDefault();
			    container.infinitescroll('retrieve');
			 	return false;
			});

			$(document).ajaxError(function(e,xhr,opt) {
				if(xhr.status==404)
				  $('a#next').remove();
			});			  	
		}		
	};

	window.main = main;

	$(function(){
		window.main.init();
	});

})(jQuery);

