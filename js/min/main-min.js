!function($){var e={w:$(window),d:$(document),init:function(){this.global.init(),this.lettering.init(),this.header.init(),this.frontpage.init(),this.infiniteScroll(),this.magnific.init(),this.filters.init(),this.anchors.init(),this.loaded()},loaded:function(){$.fn.expander&&$(".expander").expander({expandText:"More",userCollapseText:"Less",slicePoint:1e3,sliceOn:"<hr",expandEffect:"slideDown",expandSpeed:0,collapseEffect:"slideUp",collapseSpeed:0,expandPrefix:""}),console.log("init"),$("#content a").filter(function(){return $(this).attr("href").match(/\.(jpg|png|gif)/i)}).addClass("majom"),$(".majom").magnificPopup({type:"image"}),$(".search-form").submit(function(){return""===$.trim($(".search-form .input").val())?(alert("You did not fill out the search field!"),!1):void 0})},global:{init:function(){setTimeout(function(){$("body").addClass("loaded")},1500)}},body:{element:$("body")},lettering:{element:$(".primary-navigation .menu-item a"),init:function(){elements=e.lettering.element,elements.lettering(),elements.addClass("lettering")}},header:{element:$("#header"),init:function(){var i=e.header.element,t=$(".menu-btn",i);t.on("click",function(e){e.preventDefault(),$(this).toggleClass("active"),setTimeout(function(){t.hasClass("white")?t.removeClass("white"):t.hasClass("active")&&t.addClass("white")},600),i.toggleClass("navigation-open")}),$(".primary-navigation").mouseleave(function(){console.log("leave"),setTimeout(function(){t.removeClass("active white"),i.removeClass("navigation-open")},1e3)}),e.w.on("scroll",this.scroll).trigger("scroll")},scroll:function(){var i=e.w.scrollTop(),t=e.body.element,n=e.header.element,a=$(".menu-btn",n);e.header.element.hasClass("navigation-open")&&(n.removeClass("navigation-open"),a.removeClass("active white"))}},anchors:{init:function(){var e={},i=$(".row[id]");if(i.length>0){i.each(function(i,t){e[$(this).attr("id")]=$(this).data("label")});var t='<div id="subnav"><ul>';$.each(e,function(e,i){t+='<li><a class="scroll" href="#'+e+'">'+i+"</a></li>"}),t+="</ul></div>",$("#header").append(t),$(".scroll").click(function(e){e.preventDefault(),$("html,body").animate({scrollTop:$(this.hash).offset().top-160},1e3)}),$("body").addClass("subnav")}}},frontpage:{element:$("#front-page"),init:function(){var e=this.element;return e.length?void this.carousel.init():!1},carousel:{element:$("#wowslider"),init:function(){var e=this.element;if(!e.length)return!1;if($(window).width()>500)var i="parallax";e.wowSlider({effect:i,prev:"",next:"",duration:1800,delay:5e3,width:1680,height:677,autoPlay:!0,autoPlayVideo:!1,playPause:!1,stopOnHover:!0,loop:!1,bullets:0,caption:!1,captionEffect:"parallax",controls:!0,responsive:2,fullScreen:!1,gestures:2,onBeforeStep:0,revers:1})}}},magnific:{element:$(".post-gallery"),init:function(){var e=this.element;return e.length?void e.magnificPopup({delegate:"a",type:"image",tLoading:"Loading image #%curr%...",mainClass:"mfp-img-mobile",gallery:{enabled:!0,navigateByImgClick:!0,preload:[0,1]},image:{tError:'<a href="%url%">The image #%curr%</a> could not be loaded.'}}):!1}},filters:{element:$(".filters"),init:function(){var e=this.element,i=$(".category",e),t=$(".date",e);i.on("change",function(){window.location.href=$(this).val()}),t.on("change",function(){window.location.href=$(this).val()})}},infiniteScroll:function(){var e=$("ul.posts");e.infinitescroll({navSelector:"#navbelow",nextSelector:"#navbelow a",itemSelector:".posts li",extraScrollPx:150,loading:{finishedMsg:"No more items to load.",msgText:" ",img:site_url+"/wp-content/themes/thebankbusiness/images/misc/loader.gif"}},function(e){var i=$(e).hide();i.imagesLoaded(function(){i.fadeIn()}),$("#infscr-loading").remove()}),$("body").hasClass("home")&&($(window).unbind(".infscr"),$("a#next").click(function(i){return i.preventDefault(),e.infinitescroll("retrieve"),!1})),$(document).ajaxError(function(e,i,t){404==i.status&&$("a#next").remove()})}};window.main=e,$(function(){window.main.init()})}(jQuery);