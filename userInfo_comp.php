<?php session_start()?>

<link rel="stylesheet" href="css/gacha.css">
<link rel="stylesheet" href="css/popup_menu.css">
    <link rel="stylesheet" href="css/userInfo.css">

<?php require 'common/header1.php';?>

	<?php require 'common/nav_top1.php';?>

	<div class="container-fluid w-100 h-100" style="margin-top:10vh; padding-top:1vh; background:white;"><!-- UserInfo_body -->

   <?php
     $sql = $pdo->prepare('
      update User set Name = ?,
      NickName = ?,
      Birthday = ?,
      PhoneNumber = ?,
      Gender_ID = ?,
      Mail = ?,
      Prefecture_ID = ?,
      Password = ?
      where User_ID = ?');
     $sql->execute([
      $_REQUEST['name'],
      $_REQUEST['nickname'],
      $_REQUEST['birthday'],
      $_REQUEST['phone_number'],
      $_REQUEST['genderid'],
      $_REQUEST['mail'],
      $_REQUEST['prefecture_id'],
      $_REQUEST['password'],
      $_SESSION['user']['user_id'],
     ]); 

     $_SESSION['user'] = [
      'user_id' => $_SESSION['user']['user_id'],
      'name' => $_REQUEST['name'],
      'nickname' => $_REQUEST['nickname'],
      'birthday' => $_REQUEST['birthday'],
      'phone_number' => $_REQUEST['phone_number'],
      'genderid' => $_REQUEST['genderid'],
      'mail' => $_REQUEST['mail'],
      'prefecture_id' => $_REQUEST['prefecture_id'],
      'password' => $_REQUEST['password'],
      'age' => $_SESSION['user']['age'],
      'user_point' => $row['user']['user_point']
     ];
    
   ?>


    <div class="container"> <!-- UserInfo_container -->
      <h3 class="mt-2 title">ユーザ情報　</h3>
      <div class="text-center">
        <h2 class="mt-5">完了</h2>
        <p class="mt-3">ありがとうございます<br>
           ユーザ情報を変更しました。</p>
        <a href="top_menu.php" class="btn btn_top">トップメニューへ</a>
      </div>
    </div> <!-- UserInfo_container -->

	</div><!-- UserInfo_body -->

</body>

</html>