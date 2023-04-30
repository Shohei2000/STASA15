<?php require 'common/header1.php';?>

  <nav class="navbar fixed-top" style="height:10vh; justify-content: center; background:#FFFFFF;">
		<div class="row w-100">
			<div class="col-4 text-left">
				<a class="text-decoration-none" href="top_menu.php"><p class="navbar-brand m-0 p-0 pl-3" style="color:#FFCC33;">戻る</p></a>
			</div>
			<div class="col-4 text-center">
				<p class="navbar-brand m-0 p-0" style="color:#FFCC33;">お知らせ</p>
			</div>
			<div class="col-4 text-right" style="display: flex; justify-content: right; align-items: center;">
			</div>
		</div>
	</nav>
  
<div class="container-fluid w-100" style="background:#EEEEEE;">
  <div class="row">
    <div class="col-12">
      <div class="container" style="overflow-y:scroll; height:90vh;">
        <div class="border" style="border-width:0px;border-style:None; background-color: white; margin-top:12vh;">
          <h5 style="padding:10px;">【メンテンス】定期メンテナンス情報</h5>
          <p class="p">メンテナンスは9:00～12:00の間で行います。<br>
                  その間ログイン等できませんのでご了承ください。</p>
          <label class="open" id="model_open" for="pop-up">詳細を表示する</label>
          <input type="checkbox" id="pop-up">
            <div class="overlay" tabindex="-1" role="dialog" aria-labelledby="label1" aria-hidden="true">
          <div class="window">
            <label class="close" id="model_close" for="pop-up">×</label>
            <p class="text">【メンテナンス】メンテナンス情報</p>
          </div>
        </div>
        <div id="overlay"></div>
        </div>
        <br>
        <div class="border" style="border-width:0px;border-style:None; background-color: white;">
          <h5 style="padding:10px;">【メンテンス】定期メンテナンス情報</h5>
          <p class="p">メンテナンスは9:00～12:00の間で行います。<br>
                  その間ログイン等できませんのでご了承ください。</p>
          <label class="open" id="model_open" for="pop-up">詳細を表示する</label>
          <input type="checkbox" id="pop-up">
            <div class="overlay" tabindex="-1" role="dialog" aria-labelledby="label1" aria-hidden="true">
          <div class="window">
            <label class="close" id="model_close" for="pop-up">×</label>
            <p class="text">【メンテナンス】メンテナンス情報</p>
          </div>
        </div>
        <div id="overlay"></div>
        </div>
        <br>
        <div class="border" style="border-width:0px;border-style:None; background-color: white;">
          <h5 style="padding:10px;">【メンテンス】定期メンテナンス情報</h5>
          <p class="p">メンテナンスは9:00～12:00の間で行います。<br>
                  その間ログイン等できませんのでご了承ください。</p>
          <label class="open" id="model_open" for="pop-up">詳細を表示する</label>
          <input type="checkbox" id="pop-up">
            <div class="overlay" tabindex="-1" role="dialog" aria-labelledby="label1" aria-hidden="true">
          <div class="window">
            <label class="close" id="model_close" for="pop-up">×</label>
            <p class="text">【メンテナンス】メンテナンス情報</p>
          </div>
        </div>
        <div id="overlay"></div>
        </div>
        <br>
        <div class="border" style="border-width:0px;border-style:None; background-color: white;">
          <h5 style="padding:10px;">【メンテンス】定期メンテナンス情報</h5>
          <p class="p">メンテナンスは9:00～12:00の間で行います。<br>
                  その間ログイン等できませんのでご了承ください。</p>
          <label class="open" id="model_open" for="pop-up">詳細を表示する</label>
          <input type="checkbox" id="pop-up">
            <div class="overlay" tabindex="-1" role="dialog" aria-labelledby="label1" aria-hidden="true">
          <div class="window">
            <label class="close" id="model_close" for="pop-up">×</label>
            <p class="text">【メンテナンス】メンテナンス情報</p>
          </div>
        </div>
        <div id="overlay"></div>
        </div>
        <br>
        <div class="border" style="border-width:0px;border-style:None; background-color: white;">
          <h5 style="padding:10px;">【メンテンス】定期メンテナンス情報</h5>
          <p class="p">メンテナンスは9:00～12:00の間で行います。<br>
                  その間ログイン等できませんのでご了承ください。</p>
          <label class="open" id="model_open" for="pop-up">詳細を表示する</label>
          <input type="checkbox" id="pop-up">
            <div class="overlay" tabindex="-1" role="dialog" aria-labelledby="label1" aria-hidden="true">
          <div class="window">
            <label class="close" id="model_close" for="pop-up">×</label>
            <p class="text">【メンテナンス】メンテナンス情報</p>
          </div>
        </div>
        <div id="overlay"></div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>

<style>
.href {
	cursor:pointer; /* マウスオーバーでカーソルの形状を変えることで、クリックできる要素だとわかりやすいように */
  color:#FFCC33;
  padding-left:180px
}
#pop-up {
	display: none; /* label でコントロールするので input は非表示に */
}
.overlay {
	display: none; /* input にチェックが入るまでは非表示に */
}
#pop-up:checked + .overlay {
	display: block;
	z-index: 9999;
	background-color: #00000070;
	position: fixed;
	width: 100%;
	height: 100vh;
	top: 0;
	left: 0;
}
.window {
	width: 90vw;
	max-width: 380px;
	height: 240px;
	background-color: #ffffff;
	border-radius: 6px;
	display: flex;
	justify-content: center;
	align-items: center;
	position: fixed;
	top: 50%;
	left: 50%;
	transform: translate(-50%, -50%);
}
.text {
	font-size: 18px;
	margin: 0;
}
.close {
	cursor:pointer;
	position: absolute;
	top: 4px;
	right: 4px;
	font-size: 20px;
}
.p {
  font-size: 15px;
}
.open{
  color: #FFCC33;
  text-align: right;
}

</style>
</html>