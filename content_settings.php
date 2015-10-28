<?php
// 有新"其它非產品頁面"就繼續在這新增
$other = array('wheretobuy'/*,'contact'*/,'about','press','whereis','driven-by-design','download','trouble_102','trouble_103','trouble_104','trouble_105','trouble_106','trouble_107','trouble_108','trouble_109','trouble_111','trouble_112','trouble_118');

// 產品頁列表, 有新產品就繼續在這新增
$page = array('leading-edge','ziggi_plus','iziggi','vx-1','is01','vz1','ziggi_hd','ziggi_height_extension_stand','x1n6','p2v','height_extension_stand','magnifying_lens','perch','padpillow','padpillow_lite','typi','pv01','drivenbydesign','chopstakes');

function getPageContent($pageX='')
{
	if (isset($pageX))
	{
		// 每個頁面個別的 FB Like og:title
		switch($pageX)
		{
			/* 產品頁面 */
			case "iziggi":
                $content = "iZiggi-HD 無線實物攝影機";
            break;
			case "vx1":
				$content = "VX-1 網路會議機";
			break;
			case "ziggi_height_extension_stand":
				$content ="Ziggi-HD USB實物攝影機專屬增高架";
			break;
			case "is01":
				$content = "IS-01 互動白板系統 繪圖、標註、互動和啟發";
			break;
			case "typi":
				$content = "Typi 藍牙無線鍵盤筆記型保護套 - for iPad 4 / iPad 3 / iPad 2";
			break;
			case "chopstakes":
				$content = "Chopstakes 多點觸控筆組 - 多點觸控的天生一對";
			break;
			case "pv01":
				$content = "PV-01 360度旋轉筆記型保護套 - for iPad 4 / iPad 3 / iPad 2";
			break;
			case "padpillow":
				$content = "PadPillow iPad 專用靠枕 - 適用iPad全系列";
			break;
			case "x1n6":
				$content = "X1-N6 USB 網路會議機";
			break;
			case "p2v":
				$content = "Point 2 View USB 實物攝影機";
			break;
			case "perch":
				$content = "Perch 桌上用、坐著用、站著用iPad腳架";
			break;
			case "height_extension_stand":
				$content = "P2V USB 實物攝影機專用增高支架";
			break;
			case "magnifying_lens":
				$content = "P2V USB實物攝影機專用微距放大鏡";
			break;
			case "ziggi_hd":
				$content = "Ziggi-HD USB實物攝影機";
			break;
			case "padpillow_lite":
				$content = "PadPillow Lite小平板專用輕靠枕";
			break;
			case "vz1":
				$content = "VZ-1 HD VGA/USB 實物攝影機";
			break;
			/* 其它頁面 */
			case "about":
				$content = "關於 IPEVO";
			break;
			case "wheretobuy":
				$content = "銷售據點";
			break;
			case "wiereis":
				$content = "線上購物退換貨";
			break;
			case "press":
				$content = "新聞發布";
			break;
			case "driven-by-design":
				$content = "Driven by Design - 有道理的設計";
			break;
			case "ziggi_plus":
				$content = "Ziggi-HD Plus USB 實物攝影機";
			break;
			/* Default */
			default:
				$content = "IPEVO - Design for Learning.";
			break;
		}

		return $content;
	}
}
?>