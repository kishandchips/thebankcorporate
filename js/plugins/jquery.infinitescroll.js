(function ($) {
    'use strict';

    var defaults = {
            total: 30,
            template: '',
            scroll: {
                element: $(window)
            },
            threshold: 0,
            itemselector: '.item',
            start: function(){},
            loading: function(){},
            loaded: function(){},
            complete: function(){},
        },
        dataName = 'infinitescroll',
        InfiniteScroll = function (object, options) {
            //set options
            this.element = object;
            this.ready = false;
            this.stop = false;
            this.page = 1;
            this.loading = false;
            this.options = options;

            this.init();
        },
        init = function (options) {
            var settings = $.extend({}, defaults, options);
            return this.each(function () {
                var element = $(this),
                    infinitescroll = new InfiniteScroll(element, settings);

                element.data(dataName, infinitescroll);
            });
        },
        callMethod = function (methodName) {
            if (!(methodName in InfiniteScroll.prototype)) {
                $.error('Method ' + methodName + ' does not exist on jQuery.infinitescroll');
            }
            var slicedArguments = Array.prototype.slice.call(arguments, 1);

            return this.each(function () {
                var $element = $(this);
                var infinitescroll = $element.data(dataName);

                if (!infinitescroll) {
                    return true;
                }
                infinitescroll[methodName].apply(infinitescroll, slicedArguments);
            });
        },
        template = {
            parse: function (template, data) {
                return template.replace(/\{([\w\.]*)\}/g, function(str, key) {
                    var keys = key.split("."), v = data[keys.shift()];
                    for (var i = 0, l = keys.length; i < l; i++) v = v[keys[i]];
                    return (typeof v !== "undefined" && v !== null) ? v : "";
                });
            }
        };

    InfiniteScroll.prototype = {
        init: function(){

            var instance = this;

            instance.load();

            if( instance.options.scroll ) {
                instance.options.scroll.element.on('scroll', function(){
                    instance.scroll();
                });
            }
            instance.options.start();
        
        },
        load: function(){
            var instance = this;

            if( !this.stop && !this.loading ) {

                instance.loading = true;

                var data = $.extend({}, { 
                    action: instance.options.action,
                    page: instance.page,
                    posts_per_page: instance.options.total
                }, instance.options.ajax.data);
                
                $.ajax({
                    type: 'GET',
                    url: instance.options.ajax.url,
                    dataType: 'json',
                    data: data
                }).done(function(data){
                    instance.loading = false;
                    instance.loaded(data);
                });

                instance.options.loading();
            }
        },
        loaded: function(data){
            var instance = this,
                html = '';

            if($.isArray(data) ) {
                $.each(data, function(i, item){
                    html += template.parse(instance.options.template, item);
                });

                instance.element.append(html);
                
                if(instance.options.itemselector) {
                    var delay = 1,
                        items =  $(instance.options.itemselector, instance.element);

                   items.each(function(){
                        var item = $(this),
                            image = $('img', item);

                        image.on('load', function(){
                            ///setTimeout(function(){
                                item.addClass('loaded');
                            //}, delay * 20);
                            delay++;
                        });
                    });
                }

                if( instance.options.scroll ) {
                    instance.element.imagesLoaded(function(){
                        if(  instance.options.scroll.element.height() > instance.element.height() ) {
                            instance.load();
                        }
                    });
                }

                instance.options.loaded();

                if(items.length <= instance.options.total) {
                    instance.complete();
                }
                
                instance.page++;
            } else {
                instance.complete();
            }
        },
        complete: function(){
            this.options.complete();
            this.stop = true;
        },
        scroll: function(){
            var instance = this,
                element = instance.options.scroll.element;

            if( instance.loading || instance.stop ) return false;

            if(element.scrollTop() + element.height() >= instance.element.height() - instance.options.threshold) {
                instance.load();
            }
        }
    };
    $.fn.infinitescroll = function (method) {
        if (typeof method === 'object' || ! method) {
            return init.apply(this, arguments);
        } else {
            return callMethod.apply(this, arguments);
        }
    };

})(jQuery);