<?php
// 判斷是否為行動裝置
function detectMobile(){
	$isMobile = 0;
	$ua = strtolower($_SERVER['HTTP_USER_AGENT']);
	
	$uaList = array (
	'mobile','blazer','palm','handspring','nokia','kyocera','samsung','motorola','smartphone','windows ce','windows phone','windows mobile',
	'blackberry','wap','sonyericsson','playStation portable','lg','mmp','opwv','symbian','epoc','android','iphone');

	//$uaList = array ('mobile');	

	foreach ( $uaList as $uaL ) {
		if(strstr($ua,$uaL)) {
			$isMobile ++;
			break;
		}
	}

	$mpath = ($isMobile>0)?'m_':"";

	return $mpath;
}

$mobile = detectMobile();

// 載入內容頁設定檔
include_once('content_settings.php');

// 加入網址安全性檢查&SocialShare&行動裝置判斷
include_once('functions.php');

// 檢查網址是否符合程式規範
$checkUrl = cleanUrl($_SERVER['REQUEST_URI']);

if($checkUrl['status'] == true){
	$pageX = $checkUrl['pageVal'];

	// 載入header
	$content = getPageContent($pageX);
	include_once('view/'.$mobile.'header.php');

	// 是首頁的話載入各產品
	if(empty($pageX)){
		foreach($page as $val){
			include_once('view/'.$mobile.$val.'.php');
		}
	}elseif($pageX){  //不是首頁
		@include_once('view/'.$mobile.$pageX.'.php');
	}

	// 載入footer
	include_once('view/footer.php');
}else{
	forbidden();
	exit();
}
?>