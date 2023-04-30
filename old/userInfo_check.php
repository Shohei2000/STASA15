<?php session_start()?>

<link rel="stylesheet" href="css/gacha.css">
<link rel="stylesheet" href="css/popup_menu.css">
    <link rel="stylesheet" href="css/userInfo.css">

<?php require 'common/header1.php';?>

	<?php require 'common/nav_top1.php';?>

	<div class="container-fluid w-100 h-100" style="margin-top:10vh; padding-top:1vh; background:white;"> <!-- UserInfo_body -->
	
    <div class="container">

      <div class="text-center">
        <h3 class="my-5">認証</h3>

        <form action="userInfo_change.php" method="GET"> 
          <p class="text-danger mb-1">passwordが間違っています</p>
          <p class="text-secondary my-0">現在のパスワードを入力してください</p>
          <input type="password" class="mt-1" style="width:75%">
          <input type="submit" class="my-5 text-center" value="次へ" style="width:30%"><br>
          <a href="userInfo.php" class="text-secondary">戻る</a>
        </form>
      </div>
      
    </div>


	</div> <!-- UserInfo_body -->

	<?php require 'common/modal_menu.php';?>

</body>

</html>