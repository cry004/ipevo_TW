/* Facebook 活動Trigger */
$(function(){
	$('.eFun').bind('click',function(){

		var dis = $('.eventPage').css('display');
		if(dis == 'none'){

			$('.eventPage').slideDown(500);
			$('.magnifying_lens .eventBan').css('background-position','0 -85px');

		}else{
			$('.eventPage').slideUp(500);
			$('.magnifying_lens .eventBan').css('background-position','0 0');
		}

	});
});

/* Header Navigation */
$(function(){
	// Note: jQuery 1.8 之後不支援 toogle function, 所以引用 jQ 1.7.2
	$(".tabTrigger").toggle(
		function(){
			$("nav ul.main").css('height','265px');//61+51*4
			$(".tabTrigger span").addClass('up');
			// alert('hi');
		},
		function(){
			console.log('close');
			$("nav ul.main").css({'height':'60px','overflow':'hidden'});
			$("ul.dropdown").hide();
			$("li.hasChild").css('background-position-y','');
			$(".tabTrigger span").removeClass('up');
		}
	);

	$("li.hasChild>a").bind('click', function(){
		$("nav ul.main").css('overflow','visible');
		var target = $(this).parent().find('ul.dropdown');
		//var y = $(this).parent().css('background-position-y').replace("px","")-58;
		if(target.css('display')=='block'){
			//$("li.hasChild").css('background-position-y','');
			target.slideUp();
		}else{
			//$(this).parent().css('background-position-y', y+'px');
			$('ul.dropdown').hide();
			target.slideDown();
		}
	});
});

//alert(navigator.userAgent + " --- " + $(window).width() + " x " + $(window).height());

/* broken cycle */
function recover(className){
	//單一產品頁使用不同背景
	//$("body").css("background","#f7f6ee");
	//首頁不顯示user_review, 但單一產品頁要顯示
	//$(".user_review").addClass("box");

	var  me = $(className),
	box = me.find('.boxWrap'),
	num = me.find('.box').length, //取得子元素數量
	oriH = me.find('.box:first').height(),
	newH	= num*oriH; //取得原始高度

	$('.slider').not(className).hide();
	$(me).show();
	//$('.btnSwitch, .pager, .destroy').hide(); //干掉左右鍵和點點
	//$('.sideTitle:not(:first)').remove(); //干掉第二個之後的sideTitle

	me.addClass('singleDisplay');
	//me.height(newH);
	//box.height(newH);

	//干掉CYCLE並變成直式排版
	$(me).find('.box').each(function(idx){
		var box = $(this);
		box.show();
	});
	//box.removeClass('boxWrap'); //remove class to kill swipe func.

	//執行 "隨window scroll調整購買按鈕位置 " 功能
	//movingEle();

	//輸出pdf 時的切斷點
	//$(".box:not(:last-child)").after('<div class="page-break">&nbsp;</div>');

	//var timeout = setTimeout(function() { $("img").lazyload({ effect: "fadeIn", skip_invisible : false }) }, 500);
	//var timeout = setTimeout(function() {$(".box img").trigger("cycle")}, 500);

	/* magnifying_lens FB Event */
	if( document.referrer == 'http://192.168.5.141/TW/' && className == '.magnifying_lens' ){
		$('.eventPage').slideDown(500);
		$('.magnifying_lens .eventBan').css('background-position','0 -85px');
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
    $(".box img").lazyload({
        event : "cycle"
    });



	/*$('.boxWrap').each(function(idx){

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

	});*/

});

/*
$(function(){
	$('.btnSwitch').addClass('loaded');
});
*/

/* 將網址截出最後一個"/"後的字串 */
/*
function strrchr (haystack, needle) {
  var pos = 0;
  if (typeof needle !== 'string') {
    needle = String.fromCharCode(parseInt(needle, 10));
  }
  needle = needle.charAt(0);
  pos = haystack.lastIndexOf(needle);
  if (pos === -1) {
    return false;
  }
  return haystack.substr(pos);
}
*/

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
/*
function movingEle(){
	$(window).scroll(function(){
		var y = $(window).scrollTop();

	  	//因為產品page數量不同, 所以最後一個用計算的
	  	var m = $(".box").length;
	  	var end = 660*(m-1)+584;

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
*/

// go to top
$(function(){
	//不需要"go-to-top"按鈕的頁面
	$(".singleDisplay, #aboutWrap, #contactWrap, #wheretobuy").parents("body").find("#go-to-top").hide();

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
/*
function _openVideo(a, b){
    var _video = '<iframe src="'+a+'?autoplay=1" width="460" height="260" frameborder="0" webkitAllowFullScreen allowFullScreen></iframe>';
    Shadowbox.open({ content: _video, player: "html", title: b, width: 460, height: 260 });
}
$(function(){
    $('a.playVideo').bind('click', function(event){
        event.preventDefault();
        var _a = $(this).attr('href'), _b = $(this).attr('title');
        _openVideo(_a, _b);
        return false;
    });
});
*/