<?php session_start()?>

<?php require 'common/header1.php';?>

  <div class="container-fluid w-100 h-100" style="margin-top:2vh; padding-top:1vh; background:white;"><!-- UserInfo_body -->
   <?php
    $i = 0;
     $sql = $pdo->prepare('
      Insert Into User(Name, NickName, Age, Birthday, PhoneNumber, Gender_ID, Mail, Prefecture_ID, Password, User_point) values(?,?,?,?,?,?,?,?,?,0)');
     $sql->execute([
      $_REQUEST['name'],
      $_REQUEST['nickname'],
      $_REQUEST['age'],
      $_REQUEST['birthday'],
      $_REQUEST['phone_number'],
      $_REQUEST['gender'],
      $_REQUEST['mail'],
      $_REQUEST['prefecture_id'],
      $_REQUEST['password']
     ]);
     $i++;
   ?>

    <div class="container"> <!-- UserInfo_container -->
      <h3 class="mt-2 title">ユーザ情報　</h3>
      <div class="text-center">
        <h2 class="mt-5">完了</h2>
        <p class="mt-3">ありがとうございます<br>
           新規登録完了しました。</p>
        <a href="login.php" class="btn btn_top">ログインページへ</a>
      </div>
    </div> <!-- UserInfo_container -->

  </div><!-- UserInfo_body -->

</body>

</html>