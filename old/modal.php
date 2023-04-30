<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="robots" content="noindex,nofollow">

		<!-- ビューポートの設定 -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- スタイルシートの読み込み -->
		<link href="modal.css" rel="stylesheet">

		<title>モーダルウィンドウのデモ</title>
	</head>
<body>



<h1 style="text-align:center;color:#d36015;">モーダルウィンドウのデモ</h1>
<p>リンクテキストをクリックするとモーダルウィンドウを表示させます。モーダルウィンドウ周りのオーバーレイをクリックすると終了します。</p>

<HR style="margin: 3em 0 ;">

<!-- ここからモーダルウィンドウ -->
<div id="modal-content">
	<!-- モーダルウィンドウのコンテンツ開始 -->
	<p>モーダルウィンドウのコンテンツをHTMLで自由に編集することができます。画像や、動画埋め込みなど、お好きなものを入れて下さい。</p>
	<p>「閉じる」か「背景」をクリックするとモーダルウィンドウを終了します。</p>
	<p><a id="modal-close" class="button-link">閉じる</a></p>
	<!-- モーダルウィンドウのコンテンツ終了 -->
</div>

<p><a id="modal-open" class="button-link">クリックするとモーダルウィンドウを開きます。</a></p>
<!-- ここまでモーダルウィンドウ -->


<HR style="margin: 3em 0 ;">



<p style="text-align:center"><a href="https://syncer.jp/jquery-modal-window">配布元: Syncer</a></p>




<!-- JavaScriptの読み込み -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="modal.js"></script>




</body>
</html>