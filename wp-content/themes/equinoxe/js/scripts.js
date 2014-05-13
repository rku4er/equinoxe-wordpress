(function ($, root, undefined) {

	$(function () {

		/*'use strict';*/

        // Use svg logo
        /*if(!Modernizr.svg) {
            $('img[src*="svg"]').attr('src', function() {
                return $(this).attr('src').replace('.svg', '.png');
            });
        }*/

		// HTML5 Placeholder
        $('input, textarea').placeholder();

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
        if ('ontouchstart' in window){
            var scope = $('#divisions .title a, .tile, #mainnav >ul.menu >li, #listing li');

            scope.on('click', function(){
                scope.not($(this)).each(function(){
                    $(this).removeClass('hover');
                });
                $(this).toggleClass('hover');
            });
        }

        function EasyPeasyParallax() {
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
                    }else{
                        $('#footer').removeClass('sticky');
                    }
                }
                else {
                    if( scrollPos + windowH < pageH){
                        $('#footer').addClass('sticky');
                    }else{
                        $('#footer').removeClass('sticky');
                    }
                }

            }
        }
        $(window).scroll(function() {
            EasyPeasyParallax();
        });

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
                'position' : 'fixed',
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

                $(obj).css({
                    'top' :  (Math.max(document.documentElement.clientHeight, window.innerHeight || 0) - tooltip.outerHeight()) / 2,
                    'left' :  (Math.max(document.documentElement.clientWidth, window.innerWidth || 0) - tooltip.outerWidth()) / 2
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

            $(window).on('resize scroll', function() {
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

        // Rewritten version
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
            fx:"fade",
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
        }

        // Listings
        $('#listing >li').each(function(){
            var self = $(this),
                href = self.find('.title a').eq(0).attr('href');

            self.on('click', function(event){
                document.location.href = href;

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
