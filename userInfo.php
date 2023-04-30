<?php session_start()?>

<link rel="stylesheet" href="css/gacha.css">
<link rel="stylesheet" href="css/popup_menu.css">
    <link rel="stylesheet" href="css/userInfo.css">

<?php require 'common/header1.php';?>

	<?php require 'common/nav_top1.php';?>

	<div class="container-fluid w-100 h-100" style="margin-top:10vh; padding-top:1vh; background:white;"><!-- UserInfo_body -->

    <?php
     $sql = $pdo->prepare('select Gender_Name from Gender where Gender_ID = ?');
     $sql->execute([
      $_SESSION['user']['genderid']
     ]); 
     foreach ($sql as $row) {
       $gender = $row['Gender_Name'];
     }  

     $sql2 = $pdo->prepare('select Pre_Name from Prefecture where Prefecture_ID = ?');
     $sql2->execute([
      $_SESSION['user']['prefecture_id']
     ]); 
     foreach ($sql2 as $row2) {
       $prefecture = $row2['Pre_Name'];
     }  
    ?>
    
    <div class="container"> <!-- UserInfo_container -->
      <div class="row"> <!-- UserInfo -->
        <h3 class="mt-2 title">ユーザ情報　</h3>
        <div class="col-10 mx-auto"> <!-- UserInfo_field -->
          <p class="field">ユーザ名</p>
          <p class="info"><?php echo $_SESSION['user']['nickname']?></p>
          <p class="field">お名前</p>
          <p class="info"><?php echo $_SESSION['user']['name']?></p>
          <div class="row"> <!-- UserInfo_field2 -->
            <div class="col-8"> <!-- Info_birth -->
              <p class="field">生年月日</p>
              <p class="info"><?php echo $_SESSION['user']['birthday']?></p>
            </div> <!-- Info_birth -->
            <div class="col-4"> <!-- Info_gender -->
              <p class="field">性別</p>
              <p class="info"><?php echo $gender?></p>
            </div> <!-- Info_gender -->
          </div> <!-- UserInfo_field2 -->
          <p class="field">パスワード</p>
          <p class="info"><?php echo $_SESSION['user']['password']?></p>
          <p class="field">mail</p>
          <p class="info"><?php echo $_SESSION['user']['mail']?></p>
          <p class="field">電話番号</p>
          <p class="info"><?php echo $_SESSION['user']['phone_number']?></p>
          <p class="field">都道府県</p>
          <p class="info"><?php echo $prefecture?></p>
        </div> <!-- UserInfo_field -->

        <div class="col-4 mt-4"> <!-- button -->
          <a href="top_menu.php" class="btn btn_back">戻る</a>
        </div>
        <div class="col-4 mt-4">
          <a href="userInfo_change.php" class="btn btn_change">変更</a>
        </div> <!-- button -->

        <div class="col-4"> <!-- img -->
          <img src="./img/userInfo.png" alt="" width="100px">
        </div> <!-- img -->
        
      <div> <!-- UserInfo -->

    </div> <!-- UserInfo_container -->

	</div><!-- UserInfo_body -->

	<?php require 'common/modal_menu.php';?>

</body>

</html>