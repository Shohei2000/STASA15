<?php require 'common/sound.php';?>
<div class="modal fade" id="modal3" tabindex="-1" role="dialog"
	aria-labelledby="label1" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content pt-5 pr-5 pl-5 pb-4"
			style="background: #d1ffe8; border-radius: 25px; text-align: center;">
			<div class="menu">
				<h2 style="color: white;">MENU</h2>
			</div>
			<div class="row menu_row mb-2" style="margin-top: 30px;">
				<div class="col-7">
					<h2 class="parts">BGM・SE</h2>
				</div>
				<div class="col-5">
					<h2 class="parts">
						ON<input type="radio" class="parts" value="1"
							onclick="radioCheck(this)" style="width: 0.8em; height: 0.8em;">
					</h2>
				</div>
			</div>
			<div class="row menu_row mb-2">
				<div class="col">
					<a href="userInfo.php" style="text-decoration: none;"><h2 class="parts">ユーザー情報の変更</h2></a>
				</div>
			</div>
			<div class="row menu_row mb-2">
				<div class="col">
					<a href="" style="text-decoration: none;"><h2 class="parts">サポートに問い合わせる</h2></a>
				</div>
			</div>
			<div class="row menu_row mb-2">
				<div class="col">
					<a href="news.php" style="text-decoration: none;"><h2 class="parts">お知らせ</h2></a>
				</div>
			</div>
            <div class="row menu_row" style="margin-bottom: 30px;">
				<div class="col">
					<a href="logout.php" style="text-decoration: none;"><h2 class="parts">ログアウト</h2></a>
				</div>
			</div>
			<div class="original" style="text-decoration: none;"
				data-dismiss="modal" aria-label="original">
				<h2 style="color: white;">閉じる</h2>
			</div>
		</div>
	</div>
</div>