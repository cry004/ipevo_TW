<?php
function cleanWords($str){
	$str = strtolower($str);
	$str = htmlspecialchars($str);
	$bad = array(
				"../",
				"<!--",
				"-->",
				"<",
				">",
				"'",
				'"',
				'&',
				'$',
				'#',
				'{',
				'}',
				'[',
				']',
				'=',
				';',
				'?',
				'(',
				')',
				"/",
				"%20",
				"%22",
				"%3c",		// <
				"%253c",	// <
				"%3e",		// >
				"%0e",		// >
				"%28",		// (
				"%29",		// )
				"%2528",	// (
				"%26",		// &
				"%24",		// $
				"%3f",		// ?
				"%3b",		// ;
				"%3d"		// =
			);
	$str = str_replace($bad,'',$str);
	return $str;
}

function cleanUrl($str){
	global $page,$other;

	$str = strtolower($str);
	$result = array();

	$cleanStr = explode("?",$str); //預想狀況：以?分段丟進陣列
	if($_SERVER['HTTP_HOST'] == 'www.ipevo.com.tw' || $_SERVER['HTTP_HOST'] == 'ipevo.com.tw' || $_SERVER['HTTP_HOST'] == 'www.ipevo.tw' || $_SERVER['HTTP_HOST'] == 'ipevo.tw'){
		$cleanWords = cleanWords($cleanStr[0]);
	}else{
		$cleanStr  = explode("/",$cleanStr[0]);
		$cleanWords = cleanWords($cleanStr[2]);
	}

	if(empty($cleanWords)){
		$result['status'] = true;
		$result['pageVal'] = '';
	}elseif(in_array($cleanWords,$page) || in_array($cleanWords,$other)){
		$result['status'] = true;
		$result['pageVal'] = $cleanWords;
	}else{
		$result['status'] = false;
		$result['pageVal'] = '';
	}

	return $result;
}

function forbidden(){
	include_once('error/403.php');
}

function socialShare($prod){

	if(detectMobile() == ""){

		// Facebook
		$socialStr  = '<a class="socialite facebook-like likes" data-href="http://www.ipevo.com.tw/'.$prod.'" data-send="false" data-layout="button_count" data-width="450" data-show-faces="false"></a>';

		// Google+
		$socialStr .= '<a class="socialite googleplus-one likes" data-href="http://www.ipevo.com.tw/'.$prod.'" data-size="medium"></a>';
		//<g:plusone size="medium" href="http://www.ipevo.com.tw/'.$prod.'"></g:plusone>

		// Twitter
		$content = getPageContent($prod);
		$socialStr .= '<div class="twi-like likes"><a href="https://twitter.com/share" class="socialite twitter-share" data-url="http://www.ipevo.com.tw/'.$prod.'" data-text="'.$content.'" data-lang="zh-tw"></a></div>';

		// Plurk
		$socialStr .= "<div class=\"plurk-like likes\"><a title=\"Share to Plurk\" href=\"javascript:void(window.open('http://www.plurk.com/?qualifier=shares&status='.concat(encodeURIComponent('http://www.ipevo.com.tw/".$prod."')).concat(' ').concat('(').concat(encodeURIComponent(document.title)).concat(')')));\"><img title=\"share\" src=\"images/plurk_share3.png\" width=\"77\" height=\"20\" align=\"absmiddle\" border=\"0\" style=\"margin:0;\" /></a></div>";

		// PDF
		if($prod != 'driven-by-design') $socialStr .= '<div class="pdf_d likes"><a href="http://assets.ipevo.com/pdf/tw/'.$prod.'.compressed.pdf" target="_blank">下載PDF</a></div>';

		return $socialStr;

	}else{
		return false;
	}

}

/*function socialShare backup*/
/*
function socialShare($prod){

	if(detectMobile() == ""){

		// Facebook
		$socialStr  = '<div class="fb-like likes" data-href="http://www.ipevo.com.tw/'.$prod.'" data-send="false" data-layout="button_count" data-width="450" data-show-faces="false"></div>';

		// Google+
		$socialStr .= '<div class="google-like likes"><g:plusone size="medium" href="http://www.ipevo.com.tw/'.$prod.'"></g:plusone></div>';

		// Twitter
		$content = getPageContent($prod);
		$socialStr .= '<div class="twi-like likes"><a href="https://twitter.com/share" class="twitter-share-button" data-url="http://www.ipevo.com.tw/'.$prod.'" data-text="'.$content.'" data-lang="zh-tw"></a></div>';

		// Plurk
		$socialStr .= "<div class=\"plurk-like likes\"><a title=\"Share to Plurk\" href=\"javascript:void(window.open('http://www.plurk.com/?qualifier=shares&status='.concat(encodeURIComponent('http://www.ipevo.com.tw/".$prod."')).concat(' ').concat('(').concat(encodeURIComponent(document.title)).concat(')')));\"><img title=\"share\" src=\"images/plurk_share3.png\" width=\"77\" height=\"20\" align=\"absmiddle\" border=\"0\" style=\"margin:0;\" /></a></div>";

		// PDF
		$socialStr .= '<div class="pdf_d likes"><a href="http://www.ipevo.com.tw/files/downloads/pdf/'.$prod.'.pdf" target="_blank">下載PDF</a></div>';

		return $socialStr;

	}else{
		return false;
	}

}
*/
