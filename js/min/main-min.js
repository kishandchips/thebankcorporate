!function($){var e={w:$(window),d:$(document),init:function(){this.global.init(),this.header.init(),this.frontpage.init(),this.infiniteScroll(),this.magnific.init(),this.filters.init(),this.anchors.init(),this.loaded()},loaded:function(){$.fn.expander&&$(".expander").expander({expandText:"More",userCollapseText:"Less",slicePoint:230,expandEffect:"slideDown",expandSpeed:0,collapseEffect:"slideUp",collapseSpeed:0})},global:{init:function(){setTimeout(function(){$("body").addClass("loaded")},1500)}},body:{element:$("body")},header:{element:$("#header"),init:function(){var n=e.header.element,i=$(".menu-btn",n);i.on("click",function(e){e.preventDefault(),$(this).toggleClass("active"),n.toggleClass("navigation-open")}),e.w.on("scroll",this.scroll).trigger("scroll")},scroll:function(){var n=e.w.scrollTop(),i=e.body.element,t=e.header.element,a=$(".menu-btn",t);n>10&&!i.hasClass("header-fixed")?i.addClass("header-fixed"):10>n&&i.hasClass("header-fixed")&&i.removeClass("header-fixed"),e.header.element.hasClass("navigation-open")&&(console.log("scroll"),t.removeClass("navigation-open"),a.removeClass("active")),$(".primary-navigation").mouseleave(function(){console.log("mouseleave"),t.removeClass("navigation-open"),a.removeClass("active")})}},anchors:{init:function(){var e={},n=$(".row[id]");if(n.length>0){n.each(function(n,i){e[$(this).attr("id")]=$(this).data("label")});var i='<div id="subnav"><ul>';$.each(e,function(e,n){i+='<li><a class="scroll" href="#'+e+'">'+n+"</a></li>"}),i+="</ul></div>",$("#header").append(i),$(".scroll").click(function(e){e.preventDefault(),$("html,body").animate({scrollTop:$(this.hash).offset().top-100},1e3)})}}},frontpage:{element:$("#front-page"),init:function(){var e=this.element;return e.length?void this.carousel.init():!1},carousel:{element:$("#wowslider"),init:function(){var e=this.element;return e.length?void e.wowSlider({effect:"parallax",prev:"",next:"",duration:2e3,delay:5e3,width:1680,height:677,autoPlay:!0,autoPlayVideo:!1,playPause:!1,stopOnHover:!0,loop:!1,bullets:0,caption:!1,captionEffect:"parallax",controls:!0,responsive:2,fullScreen:!1,gestures:2,onBeforeStep:0,revers:1}):!1}}},magnific:{element:$(".post-gallery"),init:function(){var e=this.element;return e.length?void e.magnificPopup({delegate:"a",type:"image",tLoading:"Loading image #%curr%...",mainClass:"mfp-img-mobile",gallery:{enabled:!0,navigateByImgClick:!0,preload:[0,1]},image:{tError:'<a href="%url%">The image #%curr%</a> could not be loaded.'}}):!1}},filters:{element:$(".filters"),init:function(){var e=this.element,n=$(".category",e),i=$(".date",e);n.on("change",function(){window.location.href=$(this).val()}),i.on("change",function(){window.location.href=$(this).val()})}},infiniteScroll:function(){var e=$("ul.posts");e.infinitescroll({navSelector:"#navbelow",nextSelector:"#navbelow a",itemSelector:".posts li",extraScrollPx:150,loading:{finishedMsg:"No more items to load.",img:"http://i.imgur.com/qkKy8.gif"}},function(e){var n=$(e).hide();n.imagesLoaded(function(){n.fadeIn()})}),$(window).unbind(".infscr"),$("a#next").click(function(n){return n.preventDefault(),e.infinitescroll("retrieve"),!1}),$(document).ajaxError(function(e,n,i){404==n.status&&$("a#next").remove()})}};window.main=e,$(function(){window.main.init()})}(jQuery);