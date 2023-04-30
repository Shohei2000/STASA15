<?php session_start()?>
<?php require 'common/header1.php';?>

    <?php
    unset($_SESSION['user']);

    $sql = $pdo->prepare('select * from User where Mail = ? and Password = ?');

    if (isset($_REQUEST['mail']) && isset($_REQUEST['password'])) {
        
        $sql->execute([
            $_REQUEST['mail'],
            $_REQUEST['password']
        ]);
        
        foreach ($sql as $row) {
            $_SESSION['user'] = [
                'user_id' => $row['User_ID'],
                'name' => $row['Name'],
                'nickname' => $row['NickName'],
                'age' => $row['Age'],
                'birthday' => $row['Birthday'],
                'phone_number' => $row['PhoneNumber'],
                'genderid' => $row['Gender_ID'],
                'mail' => $row['Mail'],
                'prefecture_id' => $row['Prefecture_ID'],
                'password' => $row['Password'],
                'user_point' => $row['User_Point']
            ];
        }
                        
        if ($_REQUEST['mail'] == "" || $_REQUEST['password'] == "") {
            echo '<label style="font-size:0.7em; color:red;">メールアドレス又はパスワードを入力してください。</label>';
        } else if (isset($_SESSION['user'])) {

            // ログイン成功時は、top_menu.phpへ遷移する
            
            ?>

			<script>
            	location.href = "top_menu.php";
            </script>

	<?php
        } else {
            echo '<label style="font-size:0.7em; color:red;">メールアドレス又はパスワードが間違っています。</label>';
        }
    }
    ?>

<!--
<div class="inner w-100 h-100" style="padding-top: 10vh;">
	<div class="container">
		<h2>ログイン</h2>
		<form action="login.php" method="post">
			<input type="text" name="mail" placeholder="mail">
            <input type="password" name="password" placeholder="password"><br>
		</form>
	</div>
</div>
-->

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="Login">Login</h2><br>
                <form action="login.php" method="post">
                    <input type="text" name="mail" placeholder="mail"><br>
                    <input type="password" name="password" placeholder="password"><br>
                    <input type="submit" class="btn btn-outline-secondary" name="login"  value="ログイン">
                </form>
                <a href="register.php" class="href">新規登録はこちら</a><br>
                <img src="./img/Login.png" class="img protected" width="110" height="160">
            </div>
        </div>
    </div>

</body>

<style>
html,body{
  height:100%;
}
.container {
  display: flex;
  align-items: center;
  align-content: center;
  height: 100%;
}
.row {
  text-align: center;
}
.mail {
  margin: 2% 0;
  border-color: #C0C0C0; 
  border-width:thin;
}
.pass {
  margin: 2% 0;
  border-color: #C0C0C0; 
  border-width:thin;
}
.btn {
  margin: 4% 0;
}
.href {
  color: #808080;
}
</style>

</html>