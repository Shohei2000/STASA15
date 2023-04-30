<!DOCTYPE HTML>
<html>
<head>

<meta charset="utf-8">
<meta name="viewport"
	content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta http-equiv="Content-Security-Policy"
	content="default-src * data: gap: content: https://ssl.gstatic.com; style-src * 'unsafe-inline'; script-src * 'unsafe-inline' 'unsafe-eval'">

<!-- CSS -->
<!--CSSファイル読み込み処理は、各phpファイルの上部に記載してます-->
    
<!-- JavaScript -->
<script src="script/radio.js"></script>
<script src="script/gacha_ajax.js"></script>
    
<?php require './common/sound.php';?><!-- 効果音ファイル -->

<link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css"
	rel="stylesheet">

<!-- CSSのみ -->
<link rel="stylesheet"
	href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
	integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I"
	crossorigin="anonymous">
<!-- JavaScriptと依存ライブラリ -->
<script
	src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
	integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
	crossorigin="anonymous"></script>
<script
	src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
	integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/"
	crossorigin="anonymous"></script>
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

	<?php
//     $pdo = new PDO('mysql:host=localhost; dbname=sdgs15; charset=utf8','root');

        $pdo = new PDO('mysql:host=mysql1.php.xdomain.ne.jp; dbname=wws2020_sdgs15; charset=utf8','wws2020_sdgs15','sdbgser15');
    ?>
    
</head>
    
<style>
.protected {
  pointer-events: none;
}
body{
    -webkit-touch-callout:none; /*リンク長押しのポップアップを無効化*/
    -webkit-user-select:none; /*テキスト長押しの選択ボックスを無効化*/
}
</style>

<body style="font-family:ヒラギノ丸ゴ Pro;" >