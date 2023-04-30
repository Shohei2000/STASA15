<?php session_start()?>

<link rel="stylesheet" href="css/gacha.css">
<link rel="stylesheet" href="css/popup_menu.css">

<?php require 'common/header1.php';?>

	<?php require 'common/nav_top1.php';?>

	<div id="main"
		class="container container-bg w-100 h-100 d-flex align-items-center"
		style="margin-top: 10vh;">

		<div class="row container-main">
			<div class="col-12 p-0 m-0">

				<!-- ガチャ画面上部 -->
				<div class="row">
					<div class="col-12 text-center">
						<h1 class="p-0 gacha-font" style="color:seagreen;">GET!!</h1>
					</div>
				</div>

				<!-- 動物画像開始 -->
				<div class="row-img900">
					<div class="container-img">
                        <?php
                            for($i = 0; $i < 10; $i++){
                        ?>
                            <div class="mb-2" style="display:inline-block; position:relative;">
                                
                            <a href="animal_detail.php?animal_id=<?php echo $_SESSION['gacha_animal_id'][$i]; ?>">
                                
                            <img class="getAnimalImage900 protected" src="./img/animals/animal<?php echo $_SESSION['gacha_animal_id'][$i]; ?>.png">
                                
                            <span class="credit900"><?php echo $_SESSION['gacha_animal_credit'][$i]; ?></span>
                                
                        <?php
                            if($_SESSION['index_check_count'][$i] == 0){
                                echo '<img class="new_icon protected" src="./img/icon4newgreen2.gif" style="position:absolute; right:0; bottom:0;">';
                            }
                                
                            echo '</a>';
                            echo '</div>';
                                
                            }//forEND
                        ?>
						
					</div>
				</div>
				<!-- 動物画像終了 -->

				<div class="row p-2"
					style="width: 80vw; margin: 0 auto; background:rgba(143,188,143,0.8); border-bottom: outset 3px;">
					<div class="col-12">
						<div class="row">
							<div class="col-12 text-center">       
                                <?php
                                    if($_SESSION['point_back'] != 0){
                                        echo '<p class="m-0 mb-2 text-light">',$_SESSION['point_back'],'pt還元します。</p>';
                                    }
                                
                                    if($_SESSION['user']['user_point'] >= 100){
                                ?>
                                    <a class="btn btn--gacha btn--radius mr-1" onclick="gacha_buttonClick2()">もう一度</a>
                                <?php
                                    }
                                ?>
                                <a href="./gacha_top.php" class="btn btn--gacha btn--radius ml-1">戻る</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php require 'common/modal_menu.php';?>

	<?php require 'common/nav_bottom1.php';?>

</body>

<script type="text/javascript">
//    window.onload = function() {
//        document.getElementById("sound-file-sound_jajan").play();
//    };
    
    let soundElem = document.getElementById("sound-file-sound_jajan");
    playVideo();
    async function playVideo() {
      try {
        await soundElem.play();
      } catch(err) {
        console.log(err);
      }
    }
    
</script>
        
</html>