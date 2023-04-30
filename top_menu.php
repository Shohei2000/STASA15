<?php session_start()?>

<link rel="stylesheet" href="css/top_menu.css">
<link rel="stylesheet" href="css/popup_menu.css">

<?php require 'common/header1.php';?>

	<?php require 'common/nav_top1.php';?>

    <?php
        $top_fav=$pdo->prepare('SELECT Animal.Jp_Name, Animal_Image.Image_Path, Animal.Credit,  COUNT(Animal.Animal_ID) as COUNT FROM `Index` LEFT JOIN Animal_Image ON `Index`.Animal_ID = Animal_Image.Animal_ID LEFT JOIN Animal ON `Index`.Animal_ID = Animal.Animal_ID Where `Index`.User_ID = ? AND `Index`.Fav_Flag = "1" ');
        $top_fav->execute([$_SESSION['user']['user_id']]);

        foreach($top_fav as $row){
            $fav_animal_name = $row['Jp_Name'];
            $fav_animal_path = $row['Image_Path'];
            $fav_animal_credit = $row['Credit'];
            $fav_animal_count = $row['COUNT'];
        }
    ?>

	<div class="container-bg inner w-100 h-100">
		<div class="container text-center">
            
            <?php
                if($fav_animal_count == 0){
            ?>
                <h1 class="p-0 m-0" style="font-size:5vw;">ツシマヤマネコ</h1>
                <div class="top-img-container">
                    <img class="animals protected" src="./img/animals/animal01.png">
                    <span class="credit">環境省生物多様性センター</span>
                </div>
            <?php
                }else{
            ?>
                <h1 class="p-0 m-0" style="font-size:5vw;"><?php echo $fav_animal_name; ?></h1>
                <div class="top-img-container">
                    <img class="animals protected" src="<?php echo $fav_animal_path; ?>">
                    <span class="credit"><?php echo $fav_animal_credit; ?></span>
                </div>
            <?php        
                }
            ?>
            
            
            <a href="gacha_top.php" class="btn-square-pop">
                <div class="row">
                    <div class="col-12">
                        <p class="p-0 m-0 top_font">ガチャ</p>
                    </div>
                    <div class="col-12">
                        <img class="protected" src="./img/icon_gacha.png" style="width:50%;">
                    </div>
                </div>
            </a>
            
            <a href="ranking_user.php" class="btn-square-pop">
                <div class="row">
                    <div class="col-12">
                        <p class="p-0 m-0 top_font">ランキング</p>
                    </div>
                    <div class="col-12">
                        <img class="protected" src="./img/icon_ranking.png" style="width:50%;">
                    </div>
                </div>
            </a>
            
            <a class="btn-square-pop" data-toggle="modal"
					data-target="#modal1" data-backdrop="static">
                <div class="row">
                    <div class="col-12">
                        <p class="p-0 m-0 top_font">ミッション</p>
                    </div>
                    <div class="col-12">
                        <img class="protected" src="./img/icon_mission.png" style="width:50%;">
                    </div>
                </div>
            </a>
            
            <a href="./dictionary_top.php?Category=Category_ALL&Class=Class_ALL" class="btn-square-pop">
                <div class="row">
                    <div class="col-12">
                        <p class="p-0 m-0 top_font">図鑑</p>
                    </div>
                    <div class="col-12">
                        <img class="protected" src="./img/icon_dictionary.png" style="width:50%;">
                    </div>
                </div>
            </a>

		</div>
	</div>

    <?php
        $quiz12 = date("Y-m-d").' 12:00:00'; //12時
        $quiz15 = date("Y-m-d").' 15:00:00'; //15時
        $quiz18 = date("Y-m-d").' 18:00:00'; //18時
        $quiz21 = date("Y-m-d").' 21:00:00'; //21時

        $sql = $pdo->prepare('SELECT COUNT( Quiz_ID ) AS COUNT FROM Quiz_History WHERE DATE_FORMAT(Quiz_Date, "%Y-%m-%d") = DATE_FORMAT(now(), "%Y-%m-%d")');
        $sql->execute();
        foreach ($sql as $row) {
            $quiz_count = $row['COUNT'];
        }

        $sql = $pdo->prepare('SELECT * FROM Quiz_History WHERE USER_ID = ? AND DATE_FORMAT(Quiz_Date, "%Y-%m-%d") = DATE_FORMAT(now(), "%Y-%m-%d") ORDER BY Quiz_Date DESC LIMIT 1');
        $sql->execute([$_SESSION['user']['user_id']]);
        foreach ($sql as $row) {
            $latest_date = $row['Quiz_Date'];
        }

//        echo 'クイズカウント：'.$quiz_count;
//        echo $latest_date;

        if($quiz_count == 0){
            echo '1回目';
            require 'common/quiz_text.php';
            
        }else if($quiz_count != 0 && $latest_date < $quiz12 && date("Y-m-d H:i:s") > $quiz12 ){
            echo '12時のクイズ';
            require 'common/quiz_text.php';
            
        }else if($quiz_count != 0 && $latest_date < $quiz15 && date("Y-m-d H:i:s") > $quiz15 ){
            echo '15時のクイズ';
            require 'common/quiz_text.php';
            
        }else if($quiz_count != 0 && $latest_date < $quiz18 && date("Y-m-d H:i:s") > $quiz18 ){
            echo '18時のクイズ';
            require 'common/quiz_text.php';
            
        }else if($quiz_count != 0 && $latest_date < $quiz21 && date("Y-m-d H:i:s") > $quiz21 ){
            echo '21時のクイズ';
            require 'common/quiz_text.php';
        }

    ?>

	<?php require 'common/modal_mission.php';?>
	<?php require 'common/modal_menu.php';?>

</body>

</html>