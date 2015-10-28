<?php
header('HTTP/1.0 403 Forbidden');
print "<html>
<head>
<title>您嘗試進入您未被授權的網址</title>
</head>
<body>";
$server = $_SERVER['SERVER_NAME'];
$uri = $_SERVER['REQUEST_URI'];
$bad_link = $server.$uri;
// Note that the referer cannot be completely trusted
// as some agents either do not set a referer or allow
// the user to modify the referer at will. It is, however,
// often useful for troubleshooting.
$referer = $_SERVER['HTTP_REFERER'];
$remote = $_SERVER['REMOTE_ADDR'];
print "<h1>403: Forbidden 您嘗試進入您未被授權的網址</h1>
<p> </p>";
    print "<p>您嘗試進入您未被授權的網址 $uri .</p>
    <p>如果您認為這是一個錯誤，請聯絡 <a href=\"mailto:henrychen@ipevo.com?subject=403 Error&body=$bad_link from $referer reached by $remote\">網站管理員</a>. 或者是 <a href=\"http://www.ipevo.com.tw\">按這裡返回愛比科技首頁</a></p>";
print "</body>
</html>
";
?>