<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="keywords" content="IPEVO, 愛比, 愛比科技, p2v, ziggi-hd, ziggi, x1-n6, 實物投影, 單槍, 教具, 教學工具, ipad教學, ipad配件, ipad周邊, 課堂, 互動教學, 電子白板, skype喇叭, 遠距教學, 教室設備,  教學解決方案, 美國教學, 視訊會議, con call, skype擴音, 耳麥, 洪裕鈞, Royce, webcam, 網路攝影, 教學影片製作, point 2 view, Skype, VoIP, 網路電話, PChome Skype, 會議機">
		<meta name="description" content="IPEVO愛比科技以使用者經驗出發，透過觀察教學過程，設計更簡單、更有效的資訊產品，讓教育工作者不須再遷就複雜而昂貴的教室設備，而是利用小而美的教學工具，靈活使用科技與學生互動、彈性生動教學。這些工具售價亦平易近人，充分發揮「少即是多」的精神。">

		<meta name="viewport" content="width=480px, maximum-scale=5.0, user-scalable=1" >

		<!-- Facebook Like -->
		<meta property="og:type" content="website" />
		<meta property="og:description" content="IPEVO愛比科技以使用者經驗出發，透過觀察教學過程，設計更簡單、更有效的資訊產品，讓教育工作者不須再遷就複雜而昂貴的教室設備，而是利用小而美的教學工具，靈活使用科技與學生互動、彈性生動教學。這些工具售價亦平易近人，充分發揮「少即是多」的精神。" />
		<meta property="og:site_name" content="IPEVO" />

		<meta property="og:title" content="<?php echo $content;?>" />
		<meta property="og:url" content="<?php echo isset($_GET["page"])?"http://www.ipevo.com.tw/".$_GET["page"]:"http://www.ipevo.com.tw/";?>" />
		<meta property="og:image" content="<?php echo (isset($_GET["page"]))?"http://www.ipevo.com.tw/images/fblike/".$_GET["page"]."_fb.jpg":"http://www.ipevo.com.tw/images/fblike/ipevo_fb.jpg";?>" />

		<link rel="icon" href="images/ipevo_favicon_2.ico" type="image/x-icon">
		<link rel="shortcut icon" href="images/ipevo_favicon_2.ico" type="image/x-icon" />
		<!-- <link rel="apple-touch-icon" href="images/ipevo_logo.png" /> -->
		<link rel="apple-touch-icon-precomposed" href="images/ipevo_logo.png" />

		<title><?php echo $content;?></title>
		<!-- Pulled from http://code.google.com/p/html5shiv/ -->
		<!--[if lt IE 9]>
		<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<link rel="stylesheet" type="text/css" href="css/shadowbox.original.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<link rel="stylesheet" type="text/css" href="css/media.css">
		<link rel="stylesheet" type="text/css" href="css/print.css" media="print">

		<!-- Google Hosted Libraries -->
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script> -->
		<!-- <script type="text/javascript" src="js/jquery-1.6.1.min.js"></script> -->

		<script type="text/javascript" src="js/jquery.cycle.all.min.js"></script>
		<script type="text/javascript" src="js/jquery.lazyload.min.js"></script>
		<script type="text/javascript" src="js/jquery.easing.js"></script>
		<script type="text/javascript" src="js/jquery.swipe.js"></script>
		<script type="text/javascript" src="js/jquery.shadowbox.js"></script>

		<script type="text/javascript" src="js/global.js"></script>
		<!--[if IE]>
			<link rel="stylesheet" href="css/ie.css">
			<script type="text/javascript" src="js/respond.min.js"></script>
		<![endif]-->

	</head>
	<body>
		<div class="container">
			<header>
				<a href="<?php echo ('http://'.$_SERVER['HTTP_HOST']) ?>"><img class="logo" src="images/ipevo_logo.png" alt="IPEVO Inc." /></a>
				<ul class="sub clearfix">
					<li><a href="about" class="btn_tp1">關於 IPEVO</a></li>
					<!-- <li><a href="wheretobuy" class="btn_tp1">企業／學校採購</a></li>
					<li><a href="wheretobuy" class="btn_tp1">銷售據點</a></li> -->
					<li><a href="wheretobuy" class="btn_tp1">購買</a></li>
					<li><a href="download" class="btn_tp1">下載</a></li>
					<li><a href="press" class="btn_tp1">新聞發布</a></li>
					<!-- <li><a href="contact" class="btn_tp1">聯絡我們</a></li> -->
					<li><a target="_blank" href="http://blogs.ipevo.com.tw/" class="btn_tp1">愛比松鼠部落格</a></li>
					<li><a target="_blank" href="https://www.facebook.com/ipevotw" class="btn_tp1 ico_facebook">臉書粉絲團</a></li>
					<li class="last language">
                        <img class="flag" src="images/icon_flag_tw.gif" alt="TW">
                        <span>台灣</span>
                        <ul class="lang-dropdown">
                            <li><span><a class="us" href="http://www.ipevo.com/store" class="us">United States</a></span></li>
                            <li><span><a class="de" href="http://de.ipevo.com">Deutschland</a></span></li>
                            <li><span><a class="jp" href="http://www.ipevo.jp">日本</a></span></li>
                        </ul>
                    </li>
					<!-- <li class="follow"><a href="whereis"><img src="images/whereis.gif" height="17" width="145"></a></li> -->
					<!-- <li class="follow">官方社群</li>
					<li class="follow">
						<a target="_blank" href="https://www.facebook.com/ipevotw" class="btn_tp1 ico_facebook"></a>
						<a target="_blank" href="http://www.plurk.com/IPEVO_TW" class="btn_tp1 ico_plurk"></a>
						<a target="_blank" href="http://blogs.ipevo.com.tw/" class="btn_tp1 ico_squirrel"></a>
					</li> -->
				</ul>
				<nav>
					<ul class="main clearfix">
						<li class="tabi hasChild">
							<a href="<?php echo ('http://'.$_SERVER['HTTP_HOST']) ?>"></a>
							<ul class="dropdown">
								<li><a href="<?php echo ('http://'.$_SERVER['HTTP_HOST']) ?>" class="target"><strong>首頁</strong><br>所有產品</a></li>
							</ul>
						</li>
						<li class="tab1 hasChild">
							<a href="javascript:void(0)"></a>
							<ul class="dropdown">
								<li><div class="thumbnail ziggi_plus_tn"></div><a href="ziggi_plus" class="target"><strong>Ziggi-HD Plus</strong><br> USB 實物攝影機</a></li>
								<li><div class="thumbnail vz1_tn"></div><a href="vz1" class="target"><strong>VZ-1 HD VGA/USB</strong><br>實物攝影機</a></li>
								<li><div class="thumbnail iziggi_tn"></div><a href="iziggi" class="target"><strong>iZiggi-HD</strong><br>無線實物攝影機</a></li>
								<li><div class="thumbnail ziggi_hd_tn"></div><a href="ziggi_hd" class="target"><strong>Ziggi-HD</strong><br>USB 實物攝影機</a></li>
								<!-- <li><div class="thumbnail ziggi_case_tn"></div><a href="ziggi_case" class="target"><strong>Ziggi 攜行包</strong><br>專屬收納包</a></li> -->
								<li><div class="thumbnail ziggi_height_extension_stand_tn"></div><a href="ziggi_height_extension_stand" class="target"><strong>Ziggi-HD USB 實物攝影機<br>專用增高支架</strong></a></li>
								<li><div class="thumbnail p2v_tn"></div><a href="p2v" class="target" ><strong>Point 2 View</strong><br>USB 實物攝影機</a></li>
								<li><div class="thumbnail height_extension_stand_tn"></div><a href="height_extension_stand" class="target"><strong>P2V USB 實物攝影機<br>專用增高支架</strong></a></li>
								<li><div class="thumbnail magnifying_lens_tn"></div><a href="magnifying_lens" class="target"><strong>P2V／Ziggi-HD／VZ-1 HD<br>實物攝影機專用微距放大鏡</strong></a></li>
								<!-- <li><div class="thumbnail p2v_case_tn"></div><a href="p2v_case" class="target"><strong>P2V USB 實物攝影機攜行包</strong></a></li> -->
							</ul>
						</li>
						<li class="tab3 hasChild">
							<a href="javascript:void(0)"></a>
							<ul class="dropdown">
								<li><div class="thumbnail vx1_tn"></div><a href="vx-1" class="target"><strong>VX-1</strong><br>USB 網路會議機</a></li>
								<li><div class="thumbnail x1n6_tn"></div><a href="x1n6" class="target"><strong>X1-N6</strong><br>USB 網路會議機</a></li>
								<li><div class="thumbnail is01_tn"></div><a href="is01" class="target"><strong>IS-01</strong><br>互動白板系統</a></li>
							</ul>
						</li>
						<li class="tab2 hasChild">
							<a href="javascript:void(0)"></a>
							<ul class="dropdown">
								<!-- <li><div class="thumbnail ts01_tn"></div><a href="ts01" class="target"><strong>TS-01</strong><br>伸縮式觸控筆</a></li> -->
								<li><div class="thumbnail typi_tn"></div><a href="typi" class="target"><strong>Typi</strong><br>藍牙無線鍵盤筆記型保護套</a></li>
								<!-- <li><div class="thumbnail tubular_tn"></div><a href="tubular" class="target"><strong>Tubular</strong><br>藍牙立體聲無線喇叭</a></li> -->
								<!-- <li><div class="thumbnail ka01_tn"></div><a href="ka01" class="target"><strong>KA-01</strong><br>超薄折疊立式保護套</a></li> -->
								<li><div class="thumbnail pv01_tn"></div><a href="pv01" class="target"><strong>PV-01</strong><br>360度旋轉筆記型保護套</a></li>
								<li><div class="thumbnail perch_tn"></div><a href="perch" class="target"><strong>Perch</strong><br>桌上用、坐著用、站著用iPad腳架</a></li>
								<li><div class="thumbnail padpillow_tn"></div><a href="padpillow" class="target"><strong>PadPillow</strong><br>iPad 專用靠枕</a></li>
								<li><div class="thumbnail padpillow_lite_tn"></div><a href="padpillow_lite" class="target"><strong>PadPillow Lite</strong><br>小平板專用輕靠枕</a></li>
								<li><div class="thumbnail chopstakes_tn"></div><a href="chopstakes" class="target"><strong>Chopstakes</strong><br>多點觸控筆組</a></li>
								<!-- <li><div class="thumbnail perch_security_stand_tn"></div><a href="perch_security_stand" class="target"><strong>Perch</strong><br>桌上用、坐著用、站著用iPad防竊腳架</a></li> -->
								<!--
								<li><a href="" class="target"><strong>Tubi</strong><br>(網頁準備中)</a></li>
								<li><a href="" class="target"><strong>Open</strong><br>(網頁準備中)</a></li>
								-->
							</ul>
						</li>
						<!--
						<li class="tab4 hasChild">
							<a href="javascript:void(0)"></a>
							<ul class="dropdown">
								<li><a href="" class="target"><strong>Kaliedo R7</strong><br>(網頁準備中)</a></li>
							</ul>
						</li>
						-->
					</ul>
				</nav>
				<!--
				<div class="social">
					<a class="btn_social tumblr"></a>
					<a class="btn_social twitter"></a>
				</div>
				-->

				<!-- 首頁 Header Small Banner -->
				<a href="driven-by-design" class="header_ban<?php echo isset($_GET["page"])?" hidden":"";?>">
					<img src="images/header_banner.png" alt="" height="87" width="155">
				</a>

			</header>
