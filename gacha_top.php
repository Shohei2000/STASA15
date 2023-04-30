<?php session_start()?>

<link rel="stylesheet" href="css/gacha.css">
<link rel="stylesheet" href="css/popup_menu.css">

<?php require 'common/header1.php';?>

	<?php require 'common/nav_top1.php';?>

	<div id="main" class="container container-bg w-100 h-100">

		<div class="row container-main">
			<div class="col-12">
				<!-- ガチャ画面上部 -->
				<div class="row">
					<div class="col-12 text-center">

						<h1 class="p-0 m-0 gacha-font" style="margin: 0; font-size: 3rem; color: seagreen">動物ガチャ</h1>

						<p class="p-0 gacha-font m-1 h6" style="color:darkgreen">
							動物をゲットして<br>図鑑を完成させよう！！
						</p>

					</div>
				</div>

				<!-- カルーセル開始 -->
				<div id="myCarousel" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
						<li data-target="#myCarousel" data-slide-to="1" class=""></li>
						<li data-target="#myCarousel" data-slide-to="2" class=""></li>
                        <li data-target="#myCarousel" data-slide-to="3" class=""></li>
                        <li data-target="#myCarousel" data-slide-to="4" class=""></li>
					</ol>

					<div class="carousel-inner">
						<div class="carousel-item active">
							<div class="carousel-container1 carousel-container text-center">
								<img class="carousel-img protected" src="./img/animals/animal01.png">
                                <span class="credit">環境省生物多様性センター</span>
							</div>
						</div>

						<div class="carousel-item">
							<div class="carousel-container2 carousel-container text-center">
								<img class="carousel-img protected" class="carousel-img"
									src="./img/animals/animal02.png">
                                <span class="credit">環境省生物多様性センター</span>
							</div>
						</div>

						<div class="carousel-item">
							<div class="carousel-container3 carousel-container text-center">
								<img class="carousel-img" protected src="./img/animals/animal03.png">
                                <span class="credit">環境省生物多様性センター</span>
							</div>
						</div>

						<div class="carousel-item">
							<div class="carousel-container1 carousel-container text-center">
								<img class="carousel-img protected" src="./img/animals/animal04.png">
                                <span class="credit">環境省生物多様性センター</span>
							</div>
						</div>

						<div class="carousel-item">
							<div class="carousel-container1 carousel-container text-center">
								<img class="carousel-img protected" src="./img/animals/animal05.png">
                                <span class="credit">環境省生物多様性センター</span>
							</div>
						</div>

					</div>

					<a class="carousel-control-prev" href="#myCarousel" role="button"
						data-slide="prev">
                        
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
					</a>
                    
                    <a class="carousel-control-next" href="#myCarousel" role="button"
						data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
					</a>
				</div>
				<!-- カルーセル終了 -->

				<div class="row">
					<!-- モーダルウィンドウ -->
					<div class="col-12">
						<div class="modal fade w-100" id="modal_gacha100" tabindex="-1"
							role="dialog" aria-labelledby="label1" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered" role="document">
								<div class="modal-content p-4 w-75"
									style="background: #efffef; border-radius: 25px; text-align: center; margin: 0 auto;">

									<div class="container gacha_check" id="gacha_check">

										<div class="row">
											<div class="col-12" style="text-align: center;">

												<div class="row">
													<h1 class="mb-3">確認</h1>
													<p class="mb-3">1回引きます</p>
													<h3 class="mb-3">消費P:100pt</h3>
												</div>
											</div>
										</div>
                                        
                                        <?php
                                            if($_SESSION['user']['user_point'] >= 100){
                                        ?>
                                            <a class="btn btn--gacha btn-modal" data-dismiss="modal" aria-label="Close" onclick="gacha_buttonClick1()">OK</a>
                                        <?php
                                            }else{
                                                echo '<p class="p-0 text-danger">※所持ポイントが足りません</p>';
                                            }
                                        ?>
										<a class="btn btn--gacha btn-modal" data-dismiss="modal"
											aria-label="Close">戻る</a>

									</div>
									<!-- container gacha-check -->

								</div>
							</div>
						</div>
                        <div class="modal fade w-100" id="modal_gacha900" tabindex="-1"
							role="dialog" aria-labelledby="label1" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered" role="document">
								<div class="modal-content p-4 w-75"
									style="background: #efffef; border-radius: 25px; text-align: center; margin: 0 auto;">

									<div class="container gacha_check" id="gacha_check">

										<div class="row">
											<div class="col-12" style="text-align: center;">

												<div class="row">
													<h1 class="mb-3">確認</h1>
													<p class="mb-3">10回引きます</p>
													<h3 class="mb-3">消費P:900pt</h3>
												</div>
											</div>
										</div>
                                        
                                        <?php
                                            if($_SESSION['user']['user_point'] >= 900){
                                        ?>
                                            <a class="btn btn--gacha btn-modal" data-dismiss="modal" aria-label="Close" onclick="gacha_buttonClick2()">OK</a>
                                        <?php
                                            }else{
                                                echo '<p class="p-0 text-danger">※所持ポイントが足りません</p>';
                                            }
                                        ?>
										<a class="btn btn--gacha btn-modal" data-dismiss="modal"
											aria-label="Close">戻る</a>

									</div>
									<!-- container gacha-check -->

								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- モーダルウィンドウ -->

				<div class="row p-2"
					style="width: 80vw; margin: 0 auto; background:rgba(143,188,143,0.8); border-bottom: outset 3px;">
					<div class="col-12">
						<div class="row">
							<div class="col-12 text-center">
								<p class="m-0 gacha-font text-light">所持ポイント</p>
								<p class="m-0 gacha-font text-light"><?php echo $_SESSION['user']['user_point']; ?>pt</p>
							</div>
						</div>
						<div class="row">
							<div class="col-12 text-center p-2">
								<a class="btn btn--gacha btn--radius mr-1"
									data-toggle="modal" data-target="#modal_gacha100"
									data-backdrop="static">1回<br>消費P:100pt
								</a>
                                <a class="btn btn--gacha btn--radius mr-1"
									data-toggle="modal" data-target="#modal_gacha900"
									data-backdrop="static">10回<br>消費P:900pt
								</a>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>

	</div>
	<!-- container-fluid -->

	<?php require 'common/modal_menu.php';?>

	<?php require 'common/nav_bottom1.php';?>

</body>

</html>