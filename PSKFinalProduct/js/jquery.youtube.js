/*
	Adapted by Bill Newman, December 2013
	based on code by:
	Lord Zardeck- https://gist.github.com/LordZardeck/7205720
	
*/

$(function() {
	var slider, // Global slider value to force playing and pausing by direct access of the slider control
		canSlide = true; // Global switch to monitor video state
 
	// Load the YouTube API. For some reason it's required to load it like this
	var tag = document.createElement('script');
    tag.src = "http://www.youtube.com/iframe_api";
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
 
    // Setup a callback for the YouTube api to attach video event handlers
	window.onYouTubeIframeAPIReady = function(){
		// Iterate through all videos
		$('.flexslider iframe').each(function(){
			// Create a new player pointer; "this" is a DOMElement of the player's iframe
			var player = new YT.Player(this, {
				playerVars: {
					autoplay: 0
				}
			});
 
			// Watch for changes on the player
			player.addEventListener("onStateChange", function(state){
				switch(state.data)
				{
					// If the user is playing a video, stop the slider
					case YT.PlayerState.PLAYING:
						slider.flexslider("stop");
						canSlide = false;
						break;
					// The video is no longer player, give the go-ahead to start the slider back up
					case YT.PlayerState.ENDED:
					case YT.PlayerState.PAUSED:
						slider.flexslider("stop"); //don't allow slider to start after a vid
						canSlide = true;
						break;
				}
			});
 
			$(this).data('player', player);
		});
	}
	// Setup the slider control
	slider = $(".flexslider")
		.fitVids()
		.flexslider({
	    	animation: "slide",
			easing: "swing",
			slideshowSpeed: 6500,
			animationSpeed: 900,
			pauseOnHover: false,
			pauseOnAction: true,
			touch: true,
			video: true,
			controlNav: true,
			directionNav: true,
			animationLoop: true,
			slideshow: false,
			useCSS: false,
	    	// Before you go to change slides, make sure you can!
	    	before: function(){			    		
	    		if(!canSlide)
	    			slider.flexslider("stop");
	    	}
		});
 
	slider.on("click", ".flex-prev, .flex-next, .flex-control-nav", function(){
		canSlide = true;
		$('.flexslider iframe').each(function(){
			$(this).data('player').pauseVideo();
		});
	});
	
});