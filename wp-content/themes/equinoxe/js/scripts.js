(function ($, root, undefined) {

	$(function () {

        $.fn.waitUntilExists    = function (handler, shouldRunHandlerOnce, isChild) {
            var found       = 'found';
            var $this       = $(this.selector);
            var $elements   = $this.not(function () { return $(this).data(found); }).each(handler).data(found, true);

            if (!isChild)
            {
                (window.waitUntilExists_Intervals = window.waitUntilExists_Intervals || {})[this.selector] =
                    window.setInterval(function () { $this.waitUntilExists(handler, shouldRunHandlerOnce, true); }, 500)
                ;
            }
            else if (shouldRunHandlerOnce && $elements.length)
            {
                window.clearInterval(window.waitUntilExists_Intervals[this.selector]);
            }

            return $this;
        }

		/*'use strict';*/

        // Use svg logo
        if(!Modernizr.svg) {
            $('img[src*="svg"]').attr('src', function() {
                return $(this).attr('src').replace('.svg', '.png');
            });
        }

		// HTML5 Placeholder
        $('input, textarea').placeholder();

        // Remove asteriks from required field
        $(document).bind('gform_post_render', function(){

            $('.ginput_container input, .ginput_container textarea').each(function(){
                var placeholder = $(this).attr('placeholder');
                if(placeholder){
                    $(this).attr('placeholder', placeholder.replace('*', ''));
                }
            });

        });

        /* Revolution Slider Tweak for scrollToHash() */
        var revSlider = $('#revolution-slider');
        var timeBuffer = 1000;
        var timeout = 100;

        if(revSlider.length){

            if(revSlider.height() > 0){
                scrollToHash();
            }else{
                watchRevSlider();
            }

        }else{
            scrollToHash();
        }

        function watchRevSlider(){
            setTimeout(function(){
               if(timeBuffer > 0){
                    if(revSlider.height() > 0){
                        scrollToHash();
                    }else{
                        timeBuffer = timeBuffer - timeout;
                        watchRevSlider();
                    }

               }else{
                    scrollToHash();
               }

            }, timeout);
        }

        // Scroll To Hash
        function scrollToHash(hash){
            // Hook for .heightContainer
            $(window).trigger('resize');

            // Hash management
            if(!hash){
                var hash = window.location.hash;
            }

            if($(hash).length) {

                var offset = Math.floor($(hash).offset().top) - $('#header').outerHeight() - parseInt($(hash).css('margin-top')) - parseInt($(hash).css('padding-top'));

                $('body,html').animate({
                    scrollTop: offset
                }, {
                    duration: 400,
                    easing: 'easeInOutExpo',
                    queue: false
                });

            }
        }

        // Anchored links
        $('a[href^="#"]').each(function(){
            var self = $(this);
            var hash = self.attr('href');

            if($(hash).length){

                self.on('click', function(){

                    scrollToHash(hash);

                });

            }
        });

        // Custom Selects
        var customSelects = $('select').selectik({
            width: 0,
            maxItems: 5,
            customScroll: true
        });

        // Custom Checkboxes
        $('#main').find('input[type="radio"], input[type="checkbox"]').not('[rel="icheckIgnore"]').not('.showMenu').iCheck({
            checkboxClass: 'icheckbox-custom',
            radioClass: 'iradio-custom',
            increaseArea: false
        });

        // See if this is a touch device
        if('ontouchstart' in window){
            var scope = $('#divisions .title a, .tile, #mainnav >ul.menu >li, #listing li');

            scope.on('click', function(){
                scope.not($(this)).each(function(){
                    $(this).removeClass('hover');
                });
                $(this).toggleClass('hover');
            });
        }

        //tiles
        var tiles = $('.tile');

        tiles.each(function(){
            var self = $(this);
            var backface = self.find('.face.back');
            var linkmore = self.find('.face.back .more');
            var no_touch = $('body.no-touch').length;

            if(linkmore.length){
                linkmore.on('click', function(e){
                    var href = $(this).attr('href');
                    var hash = href.replace(/^.*?(#|$)/,'');
                    var noRedirect = (window.location.href == href.replace(/#.*?$/, '')) ? true : false;

                    console.log(noRedirect);

                    if(noRedirect && hash){
                        scrollToHash('#'+hash);
                    }else{
                        window.location = href;
                    }
                });
            }

            if(backface.length){
                backface.on('click', function(event){
                    if(event.target.nodeName !== 'A'){
                        linkmore.trigger('click');
                    }

                });
            }
        });

        /*--- news function ---*/
        (function initServices(){
            var change_speed = 400; //in ms

            var box_hold = $('#tiles');
            var box_inner = $('#tiles >.inner');
            var loadAmount = $('body.home').length ? 2 : 3;
            var _btn = $('#expander');
            var _btnTextCache = _btn.html();
            var anim_f = true;
            var response;
            var empty;
            var data = {};
            var tiles;

            if(_btn.length){

                _btn.on('click', function(){
                    if(!empty){
                        loadPosts(loadAmount);
                        return false;
                    }
                });

            }

            function loadPosts(_ind){
                if(anim_f){
                    anim_f = false;
                    box_hold.addClass('loading');

                    data['offset'] = box_inner.find('.tile').length;
                    data['load'] = _ind;

                    $.ajax({
                        url: window.location.href,
                        type: 'POST',
                        data: data,
                        dataType: 'json',
                        success: function(_html){

                            ajaxCallback(_html);

                        }
                    });
                }
            }

            function ajaxCallback(_html){
                $.each(_html, function(index, element) {
                    if(index == 'html'){
                        response = element;
                    }
                    if(index == 'empty'){
                        empty = element;
                    }
                });

                if(response){
                    var holderHeight = box_hold.height();
                    var offset = box_hold.offset().top + holderHeight - $('#header').outerHeight();
                    tiles = tiles ? $(tiles).add($(response).find('.tile')) : $(response).find('.tile');

                    $('body,html').animate({
                        scrollTop: offset
                    }, {
                        duration: change_speed,
                        queue: false
                    });

                    tiles.css({
                        opacity : 0
                    });

                    box_hold.css({
                        height : holderHeight
                    });

                    box_inner.append(tiles);

                    box_hold.stop().animate({height: box_inner.height() }, change_speed, 'easeOutExpo', function(){
                        box_hold.css({ height: 'auto' }).removeClass('loading');

                        tiles.each(function(i){
                            var self = $(this);
                            setTimeout(function(){
                                self.animate({opacity: 1}, 200, 'easeInExpo', function(){});
                            }, i*200);
                        });
                    });

                    if(empty){

                        var _btnTextCache = _btn.html();
                        var toggleList;

                        _btn.html('Collapse <span class="icon-arrow-up6"></span>');

                        _btn.on('click', function(){

                            if(!toggleList){

                                $('body,html').animate({
                                    scrollTop: box_hold.offset().top
                                }, {
                                    duration: change_speed,
                                    queue: false
                                });

                                box_hold.css({ height: box_hold.height() });

                                tiles.css('opacity', '0').hide();

                                box_hold.stop().animate({height: holderHeight }, change_speed, 'easeOutExpo', function(){
                                    box_hold.css({ height: 'auto' });
                                    _btn.html('View Full List of services <span class="icon-arrow-down6"></span>');
                                });

                                toggleList = true;

                            }else{

                                $('body,html').animate({
                                    scrollTop: _btn.offset().top - $('#header').outerHeight() - 10
                                }, {
                                    duration: change_speed,
                                    queue: false
                                });

                                box_hold.css({ height: box_hold.height() });

                                tiles.show();

                                box_hold.stop().animate({height: box_inner.height() }, change_speed, 'easeOutExpo', function(){

                                    tiles.each(function(i){
                                        var self = $(this);
                                        setTimeout(function(){
                                            self.animate({opacity: 1}, 200, 'easeInExpo', function(){});
                                        }, i*200);
                                    });

                                    box_hold.css({ height: 'auto' });

                                    _btn.html('Collapse services <span class="icon-arrow-up6"></span>');

                                });

                                toggleList = false;
                            }

                            return false;
                        });
                    }

                    anim_f = true;
                }
            }

        })();

        // Slider Image soft edges
        var slider = $('#slider');

        if(slider.length){

            var items = slider.children('.slide');

            items.each(function(){
                var self = $(this),
                    leftSide = $('<div/>').addClass('leftSide'),
                    rightSide = $('<div/>').addClass('rightSide'),
                    img = self.children('img').eq(0),
                    src = img.attr('src'),
                    offset;

                if(img.length){
                    img.css({
                        opacity : 0
                    });

                    imgNew = new Image();
                    imgNew.src = src;

                    $(imgNew).on('load', function(){
                        self.append(leftSide, rightSide);
                        img.animate({opacity: 1}, 300);

                        $(window).on('resize', function() {
                            setTimeout(function(){
                                offset = Math.floor((self.width() - img.width()) / 2);

                                leftSide.css('border-left-width', offset + 'px');
                                rightSide.css('border-right-width', offset + 'px');
                            }, 10);
                        }).trigger('resize');
                    });

                    $(window).on('focus', function(){
                        if(!offset) img.trigger('load');
                    });
                }

            });
        }

        // Content Height Adjust
        $(window).on('resize', function() {
            if($('#page').height() < Math.max(document.documentElement.clientHeight, window.innerHeight || 0)){

                var container = $('.heightContainer'),
                    footer = $('#footer .top-row'),
                    footerHeight = (footer.css('display') == 'none') ? footer.outerHeight() : 0;

                if(container.length){
                    setTimeout(function(){
                        var minHeight = Math.max(document.documentElement.clientHeight, window.innerHeight || 0) - container.offset().top - $('#footer .bottom-row').outerHeight() - parseInt(container.css('padding-top')) - parseInt(container.css('padding-bottom'));

                        container.css('min-height', minHeight);
                        console.log(minHeight);
                    }, 10);
                }

            }

        }).trigger('resize');

        // Sticky Footer
        function EasyParallax() {
            scrollPos = $(this).scrollTop();
            windowH = $(this).height();
            pageH = $(document).height();

            if (matchMedia){
                var mq = window.matchMedia("(min-width: 768px)");
                mq.addListener(WidthChange);
                WidthChange(mq);
            }
            function WidthChange(mq) {
                if (mq.matches) {
                    if( scrollPos + windowH + 380 < pageH){
                        $('#footer').addClass('sticky');
                        $('#habla_window_div').addClass('sticky');
                    }else{
                        $('#footer').removeClass('sticky');
                        $('#habla_window_div').removeClass('sticky');
                    }
                }
                else {
                    if( scrollPos + windowH < pageH){
                        $('#footer').addClass('sticky');
                        $('#habla_window_div').addClass('sticky');
                    }else{
                        $('#footer').removeClass('sticky');
                        $('#habla_window_div').removeClass('sticky');
                    }
                }

            }
        }

        $('#habla_window_div').waitUntilExists(function(){
            EasyParallax();
        });

        $(window).on('scroll resize', function(){
            setTimeout(function(){
                EasyParallax();
            }, 50);
        });


        // Tooltip
        var w = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
        var h = Math.max(document.documentElement.clientHeight, window.innerHeight || 0);

        if(w != 0 && h != 0){

            // Tooltip set up
            var tooltip, timer, overlay;

            if($('#tooltip').length){
                tooltip = $('#tooltip');
            }else{
                tooltip = $('<div>', {
                    'id' : 'tooltip'
                });
                $('body').append(tooltip);
            }

            if($('#overlay').length){
                overlay = $('#overlay');
            }else{
                overlay = $('<div>', {
                    'id' : 'overlay'
                });
                $('body').append(overlay);
            }

            tooltip.css({
                'position' : 'absolute',
                'top' : 0,
                'left' : 0,
                'display' : 'none',
                'z-index' : 99
            });

            overlay.css({
                'position' : 'fixed',
                'top' : 0,
                'right' : 0,
                'bottom' : 0,
                'left' : 0,
                'background' : '#000',
                'opacity' : '.5',
                'display' : 'none',
                'z-index' : 98
            });

            tooltip.data('index', -1);

            tooltip.on('click', function(){
                closeTip();
            });

            overlay.on('click', function(){
                closeTip();
            });

            function setPosition(obj){
                var sH = Math.max(document.documentElement.clientHeight, window.innerHeight || 0);
                var sW = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
                var tH = $(obj).outerHeight();
                var tW = $(obj).outerWidth();
                var hH = $('#header').outerHeight();
                var sT = $(document).scrollTop();

                var top = (sH - hH > tH) ? (((sH - tH + hH) / 2) + sT) : sT + hH + 20;
                var left = (sW > tW) ? ((sW - tW) / 2) : 0;

                $(obj).css({
                    'top' : top,
                    'left' : left
                });

            }

            function closeTip(){
                timer = setTimeout(function(){
                    tooltip
                    .hide()
                    .css({
                        'top'   : 'auto',
                        'right' : 'auto',
                        'left'  : 'auto'
                    })
                    .html('').data('index', -1);
                    overlay.hide();
                }, 300);
            }

            function fireTip(obj){
                clearTimeout(timer);

                if(tooltip.data('index') != $(obj).index()){
                    tooltip.html($(obj).data('content'));
                    setPosition(tooltip);
                }

                if(tooltip.data('index') == -1){
                    overlay.fadeIn(200);
                    tooltip.fadeIn(200);
                }

                tooltip.data('index', $(obj).index());

            }

            $(window).on('resize', function() {
                setTimeout(function(){
                    setPosition(tooltip);
                }, 50);
            });

            // Team list tooltip
            $( '#team li' ).each( function() {
                var self = $(this),
                    content = self.html();

                self.data('content', self.html());

                self.on('click', function(){
                    fireTip(self);
                });
            });
        }

        // Viewport fix
        // By @mathias, @cheeaun and @jdalton
        (function(doc) {

            var addEvent = 'addEventListener',
                type = 'gesturestart',
                qsa = 'querySelectorAll',
                scales = [1, 1],
                meta = qsa in doc ? doc[qsa]('meta[name=viewport]') : [];

            function fix() {
                meta.content = 'width=device-width,minimum-scale=' + scales[0] + ',maximum-scale=' + scales[1];
                doc.removeEventListener(type, fix, true);
            }

            if ((meta = meta[meta.length - 1]) && addEvent in doc) {
                fix();
                scales = [.25, 1.6];
                doc[addEvent](type, fix, true);
            }

        }(document));

        /* quote-slider */
        $('#quote-slider .slide-holder').cycle({
            fx:"scrollHorz",
            timeout:"5000",
            slides:"> blockquote",
            prev:"#quote-slider .prev",
            next:"#quote-slider .next",
            pauseOnHover:"true"
        });

        // Google Maps
        if(typeof google != "undefined"){

            var myLatlng = new google.maps.LatLng($('body').data('latitude'), $('body').data('longitude'));
            var image = $('body').data('marker');
            var marker;
            var map;

            $('body').removeAttr('data-latitude');
            $('body').removeAttr('data-longitude');
            $('body').removeAttr('data-marker');

            function initialize() {
                var mapOptions = {
                  center: myLatlng,
                  zoom: 15
                };

                map = new google.maps.Map(document.getElementById("map"), mapOptions);

                // To add the marker to the map, use the 'map' property
                marker = new google.maps.Marker({
                    position: myLatlng,
                    title:"Equinoxe LifeCare",
                    animation: google.maps.Animation.DROP,
                    icon: image
                });

                google.maps.event.addListener(marker, 'click', toggleBounce);

                marker.setMap(map);
            }

            function toggleBounce() {
              if (marker.getAnimation() != null) {
                marker.setAnimation(null);
              } else {
                marker.setAnimation(google.maps.Animation.BOUNCE);
              }
            }

            /* google.maps.event.addDomListener(window, 'load', initialize); */

            $('#map img').on('click', function(){
                initialize();
            });

            /*$('#map').waypoint(function() {
                if($('#map >img').length){
                    initialize();
                }
            }, { offset: '50%' });*/
        }

        // Listings
        $('#listing >li').each(function(){
            var self = $(this),
                href = self.find('.title a').eq(0).attr('href');

            self.on('click', function(event){
                window.location = href;

                if (event.stopPropagation) event.stopPropagation();
                else event.cancelBubble = true;
            });
        });

        // MainNavCtrl
        (function mainNavCtrl(){
            var header = $('#header'),
                main = $('#main'),
                footer = $('#footer'),
                button = $('#expandMainNav');

            button.on('change', function(){
                if($(this).is(':checked')){

                    header.css({
                        'position' : 'absolute'
                    });

                    main.hide();
                    footer.hide();
                }else{

                    header.css({
                        'position' : 'fixed'
                    });

                    main.show();
                    footer.show();
                }
            }).trigger('change');
        })();

	});

})(jQuery, this);
