/*Global JS Setting */

/* detect if ipad */	
var isiPad = navigator.userAgent.match(/iPad/i) != null;

var ua = navigator.userAgent, event = (ua.match(/iPad/i)) ? "touchstart" : "click";

/* Facebook 活動Trigger */
$(function(){
	$('.eFun').bind('click',function(){

		var dis = $('.eventPage').css('display');
		if(dis == 'none'){
			// $('.singleDisplay').find('.box').each(function(){
			// 	$(this).css({'position':'relative','top':'auto'});
			// });					

			// $('.singleDisplay').css('height','auto');
			// $('.forEvent').css('height','auto');		

			$('.eventPage').slideDown(500);
			$('.magnifying_lens .eventBan').css('background-position','0 -198px');

		}else{
			$('.eventPage').slideUp(500);
			$('.magnifying_lens .eventBan').css('background-position','0 -99px');
		}
		
	});
});

/* broken cycle */
function recover(className){
	//單一產品頁使用不同背景
	$("body").css("background","#f7f6ee");	
	//首頁不顯示user_review, 但單一產品頁要顯示
	//$(".user_review").addClass("box");

	var me = $(className),
	boxWrap = me.find('.boxWrap'),
	num = me.find('.box').length, //取得子元素數量
	oriH = me.find('.box.page01').height(),
	newH = num*oriH; //取得總高度

	$('.btnSwitch, .pager, .destroy').hide(); //干掉左右鍵和點點
	
	me.addClass('singleDisplay');
	me.height(newH);
	boxWrap.height(newH);

	//干掉CYCLE並變成直式排版
	$(me).cycle('destroy')
	.animate({ height: newH	},400)
	.find('.box').each(function(idx){					
		var box = $(this);					
		box.css('top',-oriH).css('left',0).show().animate({
			top: oriH * idx //+ extraH
		},400);
	});

	boxWrap.removeClass('boxWrap'); //remove class to kill swipe func.
	
	//執行 "隨window scroll調整購買按鈕位置 " 功能
	movingEle();
	
	//輸出pdf 時的切斷點
	$(".box:not(:last-child)").after('<div class="page-break">&nbsp;</div>');
	//var timeout = setTimeout(function() { $("img").lazyload({ effect: "fadeIn", skip_invisible : false }) }, 500);
	var timeout = setTimeout(function() {$(".box img").trigger("cycle")}, 500);

	/* magnifying_lens FB Event */
	if( document.referrer == 'http://www.ipevo.com.tw/' && className == '.magnifying_lens' ){	
		$('.eventPage').slideDown(500);
		$('.magnifying_lens .eventBan').css('background-position','0 -198px');
	}	

}


/* 設定Slideer初始 */
$(function(){

	/*
	$('#s1 .boxWrap').cycle({
		fx: 'scrollHorz',								
		timeout: 0,
		speedIn: 300,
		speedOut: 200,
		slideExpr: '.box'				
	});
	*/

	// 自訂 Cycle 切換時讀入剩餘的圖片
    /* $(".box img").lazyload({    	
        event : "cycle"
    }); */
	
	$('.btnSwitch').bind('click',function(){
		$(this).parent().find('.box img').lazyload({    	
        	event : "cycle"
    	});
	});
   

	$('.boxWrap').each(function(idx){
		
		var sp = 300;
		if(isiPad){ sp = 600; }
		$(this).cycle({
			fx: 'scrollHorz',								
			timeout: 0,
			speedIn: sp,
			speedOut: sp,
			//delay: idx * 1000,
			slideExpr: '.box',
			prev: '.prevBt:eq('+idx+')',
			next: '.nextBt:eq('+idx+')',
			pager: '.pager:eq('+idx+')',			
			onPrevNextEvent: function() {
				var timeout = setTimeout(function() {$(".box img").trigger("cycle")}, 500);
			},
			onPagerEvent: function(){
	            var timeout = setTimeout(function() {$(".box img").trigger("cycle")}, 200);
	        }
			//onPrevNextEvent: function(){ $('img').removeClass('ani'); }, //remove animation func binded in img onload
			//onPagerEvent: function(){ $('img').removeClass('ani'); } //remove animation func binded in img onload
		});			
						
	});
	
});

$(function(){
	/* 進場動畫完畢後綁定 */
	$('.btnSwitch').addClass('loaded');			
});



//當單一產品顯示時,執行 "recover" function
$(function(){
	var pos = location.href.lastIndexOf("/")+1;
	var key = location.href.substr(pos).split("?fb")[0];//切 "?fb" 是為了FB Like連回來後的網址
	if( key != "" ){
		recover("."+ key);
		$('html, body').animate({scrollTop:0}, 'slow');
	}else{
		return false;
	}
});

//隨window scroll調整"購買按鈕"位置 
function movingEle(){
	var temp = 0,temp2 = 0;;
	$(window).scroll(function(){
		var y = $(window).scrollTop();
	  
	  	//因為產品page數量不同, 所以最後一個用計算的
	  	var m = $(".box").length;
	  	var end = 660*(m-1)+584;
	  	
	  	//ziggi hd plus 隨頁面滾動自動播放影片
	  	if($('.slider').hasClass('ziggi_plus')){
	  		if((y-$('.page03').offset().top)>-200){
                if(Math.abs(y-$('.page04').offset().top) < 400 && temp != 1){
                   player.playVideo();
                   temp = 1;
                }
                if((y-$('.page05').offset().top)> 0 && temp != 0){
                   player.stopVideo();
                   temp = 0;
                }
            }else{
                if((y-$('.page02').offset().top)> 0 && temp != 0){
                   player.stopVideo();
                   temp = 0;
                }
            }
            if((y-$('.page05').offset().top)>-200){
                if(Math.abs(y-$('.page06').offset().top) < 600 && temp2 != 1){
                   player2.playVideo();
                   temp2 = 1;
                }
                if((y-$('.page07').offset().top)> 0 && temp2 != 0){
                   player2.stopVideo();
                   temp2 = 0;
                }
            }else{
                if((y-$('.page03').offset().top)> 0 && temp2 != 0){
                   player2.stopVideo();
                   temp2 = 0;
                }
            }
		}
		// #det 用來偵測頁面是否至底, 排除ipad直式時的scrollTop計算方式不同問題
	  	// 660為page高度
	  	if (($("#det").offset().top + $("#det").height()) >= $(document).height()) {
	   		$(".purchase").css("top",end+"px"); 
	  	}else{
	  		var i = 584+(y<700?0:660*Math.ceil(((y-700)/660),0));
			$(".purchase").css("top",i+"px");
	  	}
	});
}

// go to top
$(function(){
	//不需要"go-to-top"按鈕的頁面
	/*$("#contactWrap, #aboutWrap, #downloadWrap").parents("body").find("#go-to-top").hide();*/
	
	$('#go-to-top').click(function(){
		$('html, body').animate({'scrollTop' : 0}, {
			'duration':900,
			'easing':'easeOutExpo',
			'queue':false,
			'complete':function(){ $('#go-to-top').fadeIn(); }
		});
		$(this).hide();
		return false;
	});		
});

// play video in shadowbox
function _openVideo(a, b){
    var _video = '<iframe src="'+a+'?autoplay=1" width="920" height="520" frameborder="0" webkitAllowFullScreen allowFullScreen></iframe>';
    Shadowbox.open({ content: _video, player: "html", title: b, width: 920, height: 520 }); 
}
$(function(){
    $('a.playVideo').bind('click', function(event){
        event.preventDefault();
        var _a = $(this).attr('href'), _b = $(this).attr('title');
        _openVideo(_a, _b);
        return false;
    });
});

/* Social Share Buttons 出現在畫面時才載入(socialite.js) */
$(document).ready(function()
{

	var	articles = $('.share_prod .share'), socialised = { }, win = $(window), updateArticles, onUpdate, updateTimeout;

	updateArticles = function()
	{
		// viewport bounds
		var	wT = win.scrollTop(),
			wL = win.scrollLeft(),
			wR = wL + win.width(),
			wB = wT + win.height();
		// check which articles are visible and socialise!
		for (var i = 0; i < articles.length; i++) {
			if (socialised[i]) {
				continue;
			}
			// article bounds
			var	art = $(articles[i]),
				aT = art.offset().top,
				aL = art.offset().left,
				aR = aL + art.width(),
				aB = aT + art.height();
			// vertial point inside viewport
			if ((aT >= wT && aT <= wB) || (aB >= wT && aB <= wB)) {
				// horizontal point inside viewport
				if ((aL >= wL && aL <= wR) || (aR >= wL && aR <= wR)) {
					socialised[i] = true;
					Socialite.load(articles[i]);
				}
			}
		}
	};

	onUpdate = function()
	{
		if (updateTimeout) {
			clearTimeout(updateTimeout);
		}
		updateTimeout = setTimeout(updateArticles, 100);
	};

	win.on('resize', onUpdate).on('scroll', onUpdate);

	setTimeout(updateArticles, 100);

});
