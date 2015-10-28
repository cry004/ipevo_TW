/* Shadowbox(popup func) */
Shadowbox.init({
    skipSetup: true
});
window.onload = function() {

	Shadowbox.setup(".playImg", {
	    gallery:            "jp-custom",
	    overlayOpacity:     0.8,
		autoplayMovies:     true
		// ,onOpen: function(){
			// var h = ($(window).height()-42)/2+15;
			// $('#sb-nav-next, #sb-nav-previous').css('marginTop',-h);
		// }
	});

};


/* 延遲截入所有圖片 首頁時 */
$('.box img[rel*=lazy]').lazyload({
    effect: 'fadeIn'
}).removeAttr('rel');


$(document).ready( function(){

/* Swipe Variables */
$.fn.cycle.transitions.scrollHorzTouch = function($cont, $slides, opts) {
	$cont.css('overflow','hidden').width();
	opts.before.push(function(curr, next, opts, fwd) {

                if (opts.rev)
                fwd = !fwd;

                positionNext = $(next).position();
                positionCurr = $(curr).position();

                $.fn.cycle.commonReset(curr,next,opts);
                if( ( positionNext.left > 0 && fwd ) || ( positionNext.left <  0 && !fwd ) )
                {
                    opts.cssBefore.left = positionNext.left;
                }
                else
                {
                    opts.cssBefore.left = fwd ? (next.cycleW-1) : (1-next.cycleW);
                }
                if( ( positionCurr.left > 0 && fwd ) || ( positionCurr.left <  0 && !fwd ) )
                {
                             opts.animOut.left = positionCurr.left;
                }
                else
                {
                        opts.animOut.left = fwd ? -curr.cycleW : curr.cycleW;
                }

	});
	opts.cssFirst.left = 0;
	opts.cssBefore.top = 0;
	opts.animIn.left = 0;
	opts.animOut.top = 0;
};
     var currenSlide = null;
     var slideNumber = 0;
     var currentLeft = 0;
     var leftStart = 0;
     var sliderExpr;
     var slideFlag = false;

 $('.boxWrap').each(function(idx){
 	$(this).cycle({
        fx:     'scrollHorzTouch',
        timeout: 0,
        pager:  '#nav',
        speedIn:   400,
        speedOut:   400,
        slideExpr: 'img',
        next:   '.nextBt',
        prev:   '.prevBt',
        before: beforeSlide,
        after: afterSlide,
        startingSlide: 0,
		slideExpr: '.box:eq(idx)' //找這個SLIDER裡的的BOX

    });
  });

$('.boxWrap').each(function(idx){
	$(this).swipe({ swipeMoving: function( pageX ){

        if( slideFlag ) return;

        var newLeft = currentLeft-pageX;

        currenSlide.css('left', newLeft+'px'  );

        var $slides = $( sliderExpr, $('.boxWrap').eq(idx) );
        var scrollSlide;

        nextSlideLeft =   newLeft > 0 ? newLeft - currenSlide.width(): newLeft+currenSlide.width();
        flag = newLeft > 0 ? -1: 1;
        scrollSlide  = slideNumber + flag;
        if( scrollSlide < 0 || scrollSlide > ($slides.length - 1 ) )
        {
            scrollSlide = scrollSlide < 0 ? $slides.length - 1 : 0;
        }

         $slides.eq( scrollSlide ).css('left',nextSlideLeft + 'px' );
         $slides.eq( scrollSlide ).show();
    },
    swipeLeft: function(){$('.boxWrap').eq(idx).cycle('next'); var timeout = setTimeout(function(){ $('.box img').lazyload() }, 500 ) },
    swipeRight: function(){ $('.boxWrap').eq(idx).cycle('prev'); var timeout = setTimeout(function(){ $('.box img').lazyload() }, 500 ) }


    });
  });

// Call this function before the slide start
function beforeSlide( curr, next , opt )
{
     sliderExpr = opt.slideExpr;
     slideFlag = true;
}

// Call this function after the slide start
function afterSlide(curr, next , opt )
{
    ///$(".box img").trigger("sporty");
    currenSlide =  $(next);
    slideNumber = opt.currSlide;
    currentLeft = $(next).position().left;
    slideFlag = false;
}
});

if($('.slider').hasClass('ziggi_plus')){
    var tag = document.createElement('script');

      tag.src = "https://www.youtube.com/iframe_api";
      var firstScriptTag = document.getElementsByTagName('script')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

      // 3. This function creates an <iframe> (and YouTube player)
      //    after the API code downloads.
      var player,player2;
      function onYouTubeIframeAPIReady() {
        player = new YT.Player('player', {
            height: '223',
            width: '792',
            videoId: 'rVsYxCOkM5k',
            playerVars: { 'controls': 0,'autohide': 1,'wmode':'opaque', 'rel': 0, 'showinfo': 0},
            events: {
                'onStateChange': onPlayerStateChange
            }
        });
         player2 = new YT.Player('player2', {
            height: '175',
            width: '565',
            videoId: 'FJ5OvjjJYHs',
            playerVars: { 'controls': 0,'autohide': 1,'wmode':'opaque', 'rel': 0, 'showinfo': 0},
            events: {
                'onStateChange': onPlayerStateChange2
            }
        });
      }
   function onPlayerStateChange(event) {

        if(event.data === YT.PlayerState.ENDED){
            player.playVideo();
        }
    }
     function onPlayerStateChange2(event) {

        if(event.data === YT.PlayerState.ENDED){
            player2.playVideo();
        }
    }
    
}
