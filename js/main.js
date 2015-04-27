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
			this.filters.init();
			this.anchors.init();
			this.loaded();
		},


		loaded: function(){

	        if($.fn.expander){
	        	$('.expander').expander({
	        		expandText: 'More',
	        		userCollapseText: 'Less',
	        		slicePoint: 230,
					expandEffect: 'slideDown',
					expandSpeed: 0,
					collapseEffect: 'slideUp',
					collapseSpeed: 0,
					expandPrefix: ''
	        	});
	        }	    
			
		},

		global: {
			init: function(){

				setTimeout(function() {
					$('body').addClass('loaded');
				}, 1500);
							
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
					setTimeout(function() {
						menuBtn.toggleClass('white');
					}, 600);
					header.toggleClass('navigation-open');
				});
				
				main.w.on('scroll', this.scroll).trigger('scroll');
			},
			scroll: function(){
				var scrollTop = main.w.scrollTop(),
					body = main.body.element,
					header = main.header.element,
					btn = $('.menu-btn', header);

				if(scrollTop > 10 && !body.hasClass('header-fixed')) {
					body.addClass('header-fixed');
				} else if(scrollTop < 10 && body.hasClass('header-fixed')) {
					body.removeClass('header-fixed');
				}

				if(main.header.element.hasClass('navigation-open')) {
					header.removeClass('navigation-open');
					btn.removeClass('active white');
				}

				$( ".primary-navigation" ).mouseleave(function() {
					header.removeClass('navigation-open');
					btn.removeClass('active white');
				});
			}
		},

		anchors: {
			init: function() {

			    var anchors = {},
			    	selector = $('.row[id]');

			    if (selector.length > 0) {
				   	selector.each(function(index, val) {
				   		 anchors[$(this).attr('id')] = $(this).data('label');
				    });

				    var output = '<div id="subnav"><ul>';
					$.each( anchors, function(key,valueObj) {
						output += '<li><a class="scroll" href="#' + key + '">' + valueObj + '</a></li>';
					});	
					output += '</ul></div>';

					$('#header').append(output);	

				    $(".scroll").click(function(event) {
				    	event.preventDefault();
				    	$('html,body').animate( { scrollTop: ($(this.hash).offset().top) - 100 } , 1000);
				    });				    
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
				element: $('#wowslider'),
				init: function(){

					var element = this.element;

					if(!element.length) return false;

					element.wowSlider({
					    effect: "parallax",
					    prev: "",
					    next: "",
					    duration: 18 * 100,
					    delay: 50 * 100,
					    width: 1680,
					    height: 677,
					    autoPlay: true,
					    autoPlayVideo: false,
					    playPause: false,
					    stopOnHover: true,
					    loop: false,
					    bullets: 0,
					    caption: false,
					    captionEffect: "parallax",
					    controls: true,
					    responsive: 2,
					    fullScreen: false,
					    gestures: 2,
					    onBeforeStep: 0,
					    revers:1
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

		filters: {
			element: $('.filters'),
			init: function(){
				var element = this.element,
					category = $('.category', element),
					date = $('.date', element);

				category.on('change', function(){
					window.location.href = $(this).val();
				});

				date.on('change', function(){
					window.location.href = $(this).val();
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
				$( "#infscr-loading" ).remove();
			});

			if ($('body').hasClass('home')) {
				$(window).unbind('.infscr');
				$('a#next').click(function(e){
					e.preventDefault();
				    container.infinitescroll('retrieve');
				 	return false;
				});
			};


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

