<?php session_start()?>

<link rel="stylesheet" href="css/gacha.css">
<link rel="stylesheet" href="css/popup_menu.css">
    <link rel="stylesheet" href="css/userInfo.css">

<?php require 'common/header1.php';?>

	<?php require 'common/nav_top1.php';?>

<div class="container-fluid w-100 h-100" style="margin-top:10vh; padding-top:1vh; background:white;"><!-- UserInfo_body -->

    <div class="container"> <!-- UserInfo_container -->

    <form action="userInfo_conf.php" method="get">

    

      <div class="row"> <!-- UserInfo -->
        <h3 class="mt-2 title">ユーザ情報　</h3>
        <div class="col-12 mx-auto"> <!-- UserInfo_field -->
          <p class="field mb-0">ユーザ名</p>
          <input type="text" name="nickname" class="form_input">
          <p class="field mb-0">お名前</p>
          <input type="text" name="name" class="form_input">
          <div class="row"> <!-- UserInfo_field2 -->
            <div class="col-8"> <!-- Info_birth -->
              <p class="field mb-2">生年月日</p>
              <select name="year" class="ml-0">
              <?php 
                 for ($y = 1980; $y <= 2021; $y++) { ?>
                  <option value=<?php echo $y?>><?php echo $y?></option>
                 <?php }
              ?>
              </select>
              <select name="month">
                <?php 
                 for ($i = 1; $i <= 12; $i++) { ?>
                  <option value=<?php echo $i?>><?php echo $i?></option>
                 <?php }
                ?>
              </select>
              <select name="day">
              <?php 
                 for ($n = 1; $n <= 31; $n++) { ?>
                  <option value=<?php echo $n?>><?php echo $n?></option>
                 <?php }
                ?>
              </select>
            </div> <!-- Info_birth -->
            <div class="col-4 pr-0 mr-0"> <!-- Info_gender -->
              <p class="field mb-0">性別</p>
              <input type="radio" name="genderid" value="1">男性<br>
              <input type="radio" name="genderid" value="2">女性<br>
              <input type="radio" name="genderid" value="3">その他           
            </div> <!-- Info_gender -->
          </div> <!-- UserInfo_field2 -->
          <p class="field mb-0">パスワード</p>
          <input type="password" name="password" class="form_input">
          <p class="field mb-0">mail</p>
          <input type="text" name="mail" class="form_input">
          <p class="field mb-0">電話番号</p>
          <input type="text" name="phone_number" class="form_input">
          <p class="field">都道府県</p>
          <select name="prefecture_id" class="form_input">
          <?php
            $sql = $pdo->prepare('select * from Prefecture');
            $sql->execute(); 
            foreach ($sql as $row) {?>
              <option value=<?php echo $row['Prefecture_ID'] ?>><?php echo $row['Pre_Name'] ?></option>
            <?php }  
          ?>  
          </select>
        </div> <!-- UserInfo_field -->

        <div class="col-4 mt-4"> <!-- button -->
          <a href="userInfo.php" class="btn btn_back">戻る</a>
        </div>
        <div class="col-4 mt-4">
          <input type="submit" class="btn_alt" value="変更">
        </div> <!-- button -->

        <div class="col-4"> <!-- img -->
          <img src="./img/userInfo.png" alt="" width="100px">
        </div> <!-- img -->
        
      <div> <!-- UserInfo -->

    </form>

    </div> <!-- UserInfo_container -->

	</div><!-- UserInfo_body -->
        
</body>

</html>