<?php
  session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="Content-Security-Policy" content="default-src * data: gap: content: https://ssl.gstatic.com; style-src * 'unsafe-inline'; script-src * 'unsafe-inline' 'unsafe-eval'">
    <script src="components/loader.js"></script>
    <link rel="stylesheet" href="components/loader.css">
     <link rel="stylesheet" href="css/dictionary_top.css"> 

    <!-- CSSのみ -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <!-- JavaScriptと依存ライブラリ -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    <?php
//     $pdo = new PDO('mysql:host=localhost; dbname=sdgs15; charset=utf8','root');

        $pdo = new PDO('mysql:host=mysql1.php.xdomain.ne.jp; dbname=wws2020_sdgs15; charset=utf8','wws2020_sdgs15','sdbgser15');
    ?>
</head>

<body style="height:100%; font-family:ヒラギノ丸ゴ Pro;">

    <?php require 'common/nav_top1.php';?>

<div class="container-bg" style="padding-top:11vh;  height: inherit;">
  <div class="container-fluid" id="index" style="margin-top: 1vh;">
    <div style="float: left">	<?php require 'common/nav_top1.php';?>

    <a style="margin: 0; padding: 0; font-size: 3vh; font-weight: 800; letter-spacing:0.2rem;">動物一覧</a>
    </div>
    <div style="text-align: right; margin-right: 1vw; padding-top: 1vh;">
    <a data-toggle="modal" data-target="#modal3" data-backdrop="static" style="font-weight: 800; border: 2px solid; color: white; letter-spacing:0.1rem; padding:0.2rem;">絞り込み</a>
    </div>
  </div>
  <div class="container-fluid" style="height: 57vh; overflow-y: scroll;">
  <?php
  $category = filter_input(INPUT_GET, 'Category');
  $class = filter_input(INPUT_GET, 'Class');
  $index = 0;
  $have = 0;
  if($category == 'Category_ALL'){
    if($class == 'Class_ALL'){
      foreach($pdo->query('select Animal_Image.Image_Path, Animal.Jp_Name, Animal.Animal_ID from Animal, Animal_Image where Animal_Image.Animal_ID = Animal.Animal_ID')as $row){
        $sql = 'select * FROM `Index` where Animal_ID ='.$row['Animal_ID'].' and User_ID ='.$_SESSION['user']['user_id'];
        $exe = $pdo->query($sql);
        $count = $exe->rowCount();
        if($count > 0){
          $have++;
          if($index % 2 == 0){
            echo '<div class="row">';
            echo '<div class="col-6">';
            echo '<a class="detail_link" href="animal_detail.php?animal_id=',$row['Animal_ID'],'"><img class="dictionary-image" src="',$row['Image_Path'],'"><br></a>';
            echo '<div class="box7">';
            echo '<a href="animal_detail.php?animal_id=',$row['Animal_ID'],'" style="text-decoration: none; color:black;">',$row['Jp_Name'],'</a>';
            echo '</div>';
            echo '</div>';
            $index++;
          }else{
            echo '<div class="col-6">';
            echo '<a class="detail_link" href="animal_detail.php?animal_id=',$row['Animal_ID'],'"><img class="dictionary-image" src="',$row['Image_Path'],'"><br></a>';
            echo '<div class="box7">';
            echo '<a href="animal_detail.php?animal_id=',$row['Animal_ID'],'" style="text-decoration: none; color:black;">',$row['Jp_Name'],'</a>';
            echo '</div>';
            echo '</div>';
            echo '</a>';
            echo '</div>';
            $index++;
          }
        }else{
          if($index % 2 == 0){
            echo '<div class="row">';
            echo '<div class="col-6">';
            echo '<img class="dictionary-image-opacity" src="',$row['Image_Path'],'"><br>';
            echo '<div class="box7">';
            echo '<a>？？？？？？</a>';
            echo '</div>';
            echo '</div>';
            $index++;
          }else{
            echo '<div class="col-6">';
            echo '<img class="dictionary-image-opacity" src="',$row['Image_Path'],'"><br>';
            echo '<div class="box7">';
            echo '<a>？？？？？？</a>';
            echo '</div>'; 
            echo '</div>';
            echo '</div>';
            $index++;
          }
        }
      }
      if($index % 2 == 0){
      }else{
        echo '</div>';
      }
    }else{
      foreach($pdo->query('select Animal_Image.Image_Path, Animal.Jp_Name, Animal.Animal_ID from Animal, Animal_Image where Animal_Image.Animal_ID = Animal.Animal_ID and Animal.Class_ID ='.$class)as $row){
        $sql = 'select * FROM `Index` where Animal_ID ='.$row['Animal_ID'].' and User_ID ='.$_SESSION['user']['user_id'];
        $exe = $pdo->query($sql);
        $count = $exe->rowCount();
        if($count > 0){
          $have++;
          if($index % 2 == 0){
            echo '<div class="row">';
            echo '<div class="col-6">';
            echo '<a class="detail_link" href="animal_detail.php?animal_id=',$row['Animal_ID'],'"><img class="dictionary-image" src="',$row['Image_Path'],'"><br></a>';
            echo '<div class="box7">';
            echo '<a>',$row['Jp_Name'],'</a>';
            echo '</div>';
            echo '</div>';
            $index++;
          }else{
            echo '<a href="animal_detail.php?animal_id=',$row['Animal_ID'],'" style="display: contents;">';
            echo '<div class="col-6">';
            echo '<a class="detail_link" href="animal_detail.php?animal_id=',$row['Animal_ID'],'"><img class="dictionary-image" src="',$row['Image_Path'],'"><br></a>';
            echo '<div class="box7">';
            echo '<a>',$row['Jp_Name'],'</a>';
            echo '</div>';
            echo '</div>';
            echo '</a>';
            echo '</div>';
            $index++;
          }
        }else{
          if($index % 2 == 0){
            echo '<div class="row">';
            echo '<div class="col-6">';
            echo '<img class="dictionary-image-opacity" src="',$row['Image_Path'],'"><br>';
            echo '<div class="box7">';
            echo '<a>？？？？？？</a>';
            echo '</div>';
            echo '</div>';
            $index++;
          }else{
            echo '<div class="col-6">';
            echo '<img class="dictionary-image-opacity" src="',$row['Image_Path'],'"><br>';
            echo '<div class="box7">';
            echo '<a>？？？？？？</a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            $index++;
          }
        }
      }
      if($index % 2 == 0){
      }else{
        echo '</div>';
      }
    }
  }else{
    if($class == 'Class_ALL'){
      foreach($pdo->query('select Animal_Image.Image_Path, Animal.Jp_Name, Animal.Animal_ID from Animal, Animal_Image where Animal_Image.Animal_ID = Animal.Animal_ID and Animal.Category_ID ='.$category)as $row){
        $sql = 'select * FROM `Index` where Animal_ID ='.$row['Animal_ID'].' and User_ID ='.$_SESSION['user']['user_id'];
        $exe = $pdo->query($sql);
        $count = $exe->rowCount();
        if($count > 0){
          $have++;
          if($index % 2 == 0){
            echo '<div class="row">';
            echo '<div class="col-6">';
            echo '<a class="detail_link" href="animal_detail.php?animal_id=',$row['Animal_ID'],'"><img class="dictionary-image" src="',$row['Image_Path'],'"><br></a>';
            echo '<div class="box7">';
            echo '<a>',$row['Jp_Name'],'</a>';
            echo '</div>';
            echo '</div>';
            $index++;
          }else{
            echo '<div class="col-6">';
            echo '<a class="detail_link" href="animal_detail.php?animal_id=',$row['Animal_ID'],'"><img class="dictionary-image" src="',$row['Image_Path'],'"><br></a>';
            echo '<div class="box7">';
            echo '<a>',$row['Jp_Name'],'</a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            $index++;
          }
        }else{
          if($index % 2 == 0){
            echo '<div class="row">';
            echo '<div class="col-6">';
            echo '<img class="dictionary-image-opacity" src="',$row['Image_Path'],'"><br>';
            echo '<div class="box7">';
            echo '<a>？？？？？？</a>';
            echo '</div>';
            echo '</div>';
            $index++;
          }else{
            echo '<div class="col-6">';
            echo '<img class="dictionary-image-opacity" src="',$row['Image_Path'],'"><br>';
            echo '<div class="box7">';
            echo '<a>？？？？？？</a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            $index++;
          }
        }
      }
      if($index % 2 == 0){
      }else{
        echo '</div>';
      }
    }else{
      foreach($pdo->query('select Animal_Image.Image_Path, Animal.Jp_Name, Animal.Animal_ID from Animal, Animal_Image where Animal_Image.Animal_ID = Animal.Animal_ID and Animal.Category_ID ='.$category.' and Animal.Class_ID ='.$class)as $row){
        $sql = 'select * FROM `Index` where Animal_ID ='.$row['Animal_ID'].' and User_ID ='.$_SESSION['user']['user_id'];
        $exe = $pdo->query($sql);
        $count = $exe->rowCount();
        if($count > 0){
          $have++;
          if($index % 2 == 0){
            echo '<div class="row">';
            echo '<div class="col-6">';
            echo '<a class="detail_link" href="animal_detail.php?animal_id=',$row['Animal_ID'],'"><img class="dictionary-image" src="',$row['Image_Path'],'"><br></a>';
            echo '<div class="box7">';
            echo '<a>',$row['Jp_Name'],'</a>';
            echo '</div>';
            echo '</div>';
            $index++;
          }else{
            echo '<div class="col-6">';
            echo '<a class="detail_link" href="animal_detail.php?animal_id=',$row['Animal_ID'],'"><img class="dictionary-image" src="',$row['Image_Path'],'"><br></a>';
            echo '<div class="box7">';
            echo '<a>',$row['Jp_Name'],'</a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            $index++;
          }
        }else{
          if($index % 2 == 0){
            echo '<div class="row">';
            echo '<div class="col-6">';
            echo '<img class="dictionary-image-opacity" src="',$row['Image_Path'],'"><br>';
            echo '<div class="box7">';
            echo '<a>？？？？？？</a>';
            echo '</div>';
            echo '</div>';
            $index++;
          }else{
            echo '<div class="col-6">';
            echo '<img class="dictionary-image-opacity" src="',$row['Image_Path'],'"><br>';
            echo '<div class="box7">';
            echo '<a>？？？？？？</a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            $index++;
          }
        }
      }
      if($index % 2 == 0){
      }else{
        echo '</div>';
      }
    }
  }
  ?>
  </div>
    
  <div class="container-fluid" style="text-align: right;">
    <div class="row">
      <div class="col-7">
      </div>
      <div class="col-5" id="get">
        <?php
          echo '<p>取得数　',$have,'/ ',$index,'</p>';
        ?>
      </div>
    </div>
  </div>

<!-- モーダルウィンドウ -->
<div class="modal fade" id="modal3" tabindex="-1" role="dialog"
	aria-labelledby="label1" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content pt-4"
			style="background: #faeac3; border-radius: 25px; height: auto;">
			<div class="menu" style="text-align: center;">
        <div>
				  <h2 style="color: ; font-weight: 800;">絞り込み</h2>
        </div>
			</div>
      <div style="margin-left: 12vw; margin-top: 2vh;">
        <a style="font-size: 1.3em; font-weight: 600;">•ランク</a><br>
        <select name="Category" onChange="selectChange()" id="Category">
        <option value="Category_ALL" <?php if (filter_input(INPUT_GET, 'Category') == 'Category_ALL') { echo 'selected'; } ?>>全て</option>
        <option value="2" <?php if (filter_input(INPUT_GET, 'Category') == '2') { echo 'selected'; } ?>>絶滅危惧種ⅠA類(CR)</option>
        <option value="3" <?php if (filter_input(INPUT_GET, 'Category') == '3') { echo 'selected'; } ?>>絶滅危惧種ⅠB類(EN)</option>
        <option value="4" <?php if (filter_input(INPUT_GET, 'Category') == '4') { echo 'selected'; } ?>>絶滅危惧種Ⅱ類(VU)</option>
        <option value="5" <?php if (filter_input(INPUT_GET, 'Category') == '5') { echo 'selected'; } ?>>準絶滅危惧(NT)</option>
        </select>
      </div>
      <div style="margin-left: 12vw; margin-top: 3vh;">
        <a style="font-size: 1.3em; font-weight: 600;">•分類</a><br>
        <select name="Class" onChange="selectChange()" id="Class">
        <option value="Class_ALL" <?php if (filter_input(INPUT_GET, 'Class') == 'Class_ALL') { echo 'selected'; } ?>>全て</option> 
        <option value="1" <?php if (filter_input(INPUT_GET, 'Class') == '1') { echo 'selected'; } ?>>哺乳類</option>
        <option value="2" <?php if (filter_input(INPUT_GET, 'Class') == '2') { echo 'selected'; } ?>>鳥類</option>
        <option value="3" <?php if (filter_input(INPUT_GET, 'Class') == '3') { echo 'selected'; } ?>>爬虫類</option>
        <option value="4" <?php if (filter_input(INPUT_GET, 'Class') == '4') { echo 'selected'; } ?>>両生類</option>
        </select>
      </div>
      <div style="margin-left: 12vw; margin-top: 3vh;">
        <a style="font-size: 1.3em; font-weight: 600;">•生息地</a><br>
        <select name="kind">
        <option value="list1">全て</option> 
        </select>
      </div>
      <div class="original" style="text-decoration: none; text-align: center; margin-top: 4vh; padding-bottom: 4vh;"
				data-dismiss="modal" aria-label="original">
				<a style="font-size: 1.3em; font-weight: 600; color: #">閉じる</a>
			</div>
  	</div>
  </div>
</div>

    <?php require 'common/nav_bottom1.php';?>
    
</body>

<style>
html{
    width: 100%;
    height: 100%;
}

body{ /* Do not change!*/
  width: 100%;
  height: 80%;
  margin: 0;
  padding: 0;
}

p{
  margin: 0;
  padding: 0;
}
/* ------------------------------- */

.popup {
  position: fixed;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  z-index: 9999;
  opacity: 0;
  visibility: hidden;
  transition: .6s;
}
.popup.is-show {
  opacity: 1;
  visibility: visible;
}
.popup-inner {
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-50%,-50%);
  width: 80%;
  max-width: 600px;
  padding: 50px;
  background-color: #fff;
  z-index: 2;
}
.popup-inner img {
  width: 100%;
}
.close-btn {
  position: absolute;
  right: 0;
  top: 0;
  width: 50px;
  height: 50px;
  line-height: 50px;
  text-align: center;
  cursor: pointer;
  opacity: 1;
}
.close-btn i {
  font-size: 20px;
  color: #333;
}
.black-background {
  position: absolute;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0,0,0,.8);
  z-index: 1;
  cursor: pointer;
}
.close{
  opacity: 1;
}
/* ----------------------------------- */
.detail_button1,
.receive_button1{
	height: 100%;
	width: 100%;
	padding:0;
}

.btn--green,
a.btn--green {
  color: #009933;
  background-color: #9eff9e;
  margin: 1rem;
}

/* .btn--green:hover,
a.btn--green:hover {
  color: #fff;
  background: #9eff9e;
} */

.close{
	float:none;
}

.btn{
  padding: 0;
  margin: 0;
}

/* ------------------------ */

.modal{
  max-height: 100%;
}
.modal-content{
  height: 30rem;
}

/* ------------------------ */
.quiz-title,.quiz-progress,.quiz-progressBar{
	display: flex;
	justify-content: center;
	align-items: center;
}

.quiz-title{
	padding: 6vw;
}

.quiz-progress{
	padding-bottom: 2vw;
}
.quiz-detail{
	padding: 3vw;
}

.quiz-prizeImg{
	height: 13vh;
}

.img-container{
	width: 13vh;
	height: 100%;
	margin: 0 auto;
	border: 1px green solid;
}

/* ガチャ画面ボタン */
.btn--gacha,
a.btn--gacha {
  color: #fff;
  background-color: #eb6100;
}
.btn--gacha:hover,
a.btn--gacha:hover {
  color: #fff;
  background: #f56500;
}
.dictionary-image{
  height: 32vw;
}
.dictionary-image-opacity{
  height: 32vw;
  opacity: 0.3;
}
.col-6{
  text-align: center;
  font-size: 3vw;
  font-weight: 1000;
  margin-top: 0vh;
}
#index{
    padding: 0.5em 1em;
    margin: 1em 0;
    color: white;
    background: darkseagreen;
    border-left: solid 10px yellowgreen;
}
#get {
    padding: 0.3em 1em 0.3em 0em;
    margin-top: 2vh;
    background: darkseagreen;
    border: dotted 3px white;
    color: white;
}
#get p {
    margin: 0; 
    padding: 0;
}
select{
  width: 70vw;
  height: 4vh;
}
.box7{
    margin: 1em 0;
    color: #474747;
    background: whitesmoke;/*背景色*/
    border-left: double 2px #4ec4d3;/*左線*/
    border-right: double 2px #4ec4d3;/*右線*/
}
.box7 p {
    margin: 0; 
    padding: 0;
}
.dictionary-image,.dictionary-image-opacity {/*保存禁止処理*/
  pointer-events: none;
}
body{
    -webkit-touch-callout:none; /*リンク長押しのポップアップを無効化*/
    -webkit-user-select:none; /*テキスト長押しの選択ボックスを無効化*/
}
.detail_link {
    display: block;
}
</style>
    
<script type="text/javascript" src="//code.jquery.com/jquery-3.1.1.min.js"></script>
<script type="text/javascript">
  function selectChange(){
    let category = document.getElementById("Category");
    let selectClass = document.getElementById("Class");
    let url = 'dictionary_top.php?Category=' + category.value + '&Class=' + selectClass.value;
    location.href = url;
  }
  $(function(){
    $('select').change(function(){
      $('form').submit();
    });
  });
</script>
</html>