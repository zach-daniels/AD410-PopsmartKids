/*
Vimeo Support: In the original FlexSlider, vimeo videos continue to play when the next vid/image is scrolled.  However, there was a workaround implemented in our examples.  The original was found here (multiple vimeo videos flexslider 2): http://demo.juanfra.me/multiple-videos-flexslider-v2/
*/

// Can also be used with $(document).ready()
jQuery(window).load(function() {
 
    var vimeoPlayers = jQuery('.flexslider').find('iframe'), player;
 
    for (var i = 0, length = vimeoPlayers.length; i < length; i++) {
            player = vimeoPlayers[i];
            $f(player).addEvent('ready', ready);
    }
 
    function addEvent(element, eventName, callback) {
        if (element.addEventListener) {
            element.addEventListener(eventName, callback, false)
        } else {
            element.attachEvent(eventName, callback, false);
        }
    }
 
    function ready(player_id) {
        var froogaloop = $f(player_id);
        froogaloop.addEvent('play', function(data) {
            jQuery('.flexslider').flexslider("pause");
        });
        froogaloop.addEvent('pause', function(data) {
            jQuery('.flexslider').flexslider("play");
        });
    }
 
    jQuery(".flexslider")
    .fitVids()
    .flexslider({
        animation: "slide",
        animationLoop: false,
        smoothHeight: true,
        useCSS: false,
        before: function(slider){
            if (slider.slides.eq(slider.currentSlide).find('iframe').length !== 0)
                  $f( slider.slides.eq(slider.currentSlide).find('iframe').attr('id') ).api('pause');
        }
    });
 
});