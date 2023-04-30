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
					<div class="parts">
					<div id="Audio-Control">
					<audio id="bgm" preload autoplay loop muted>
						<source src="<?php bloginfo('template_url'); ?>/media/sample.ogg" type="audio/ogg">
						<source src="<?php bloginfo('template_url'); ?>/media/sample.mp3" type="audio/mpeg">
					</audio>
					<button onclick="enableMute()" class="off active" type="button">OFF</button>
					<button onclick="disableMute()" class="on" type="button">ON</button>
					</div>
					</div>
				</div>
			</div>
			<div class="row menu_row mb-2">
				<div class="col">
					<a style="text-decoration: none;" href=""><h2 class="parts">ユーザー情報の変更</h2></a>
				</div>
			</div>
			<div class="row menu_row mb-2">
				<div class="col">
					<a style="text-decoration: none;" href=""><h2 class="parts">サポートに問い合わせる</h2></a>
				</div>
			</div>
			<div class="row menu_row" style="margin-bottom: 30px;">
				<div class="col">
					<a style="text-decoration: none;" href=""><h2 class="parts">お知らせ</h2></a>
				</div>
			</div>
			<div class="original" style="text-decoration: none;"
				data-dismiss="modal" aria-label="original">
				<h2 style="color: white;">閉じる</h2>
			</div>
		</div>
	</div>
</div>