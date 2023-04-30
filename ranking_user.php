<?php session_start()?>

<link rel="stylesheet" href="css/rank.css">
<link rel="stylesheet" href="css/popup_menu.css">

<?php require 'common/header1.php';?>

<?php

    $sql = $pdo->prepare('SELECT Dex.User_ID, User.Name, User.NickName, COUNT(Dex.User_ID) as count FROM Animal LEFT JOIN `Index` as Dex ON Animal.Animal_ID = Dex.Animal_ID LEFT JOIN User ON Dex.User_ID = User.User_ID Where Dex.User_ID IS NOT NULL GROUP BY Dex.User_ID ORDER BY count DESC;');

    $sql->execute();
        
    $_SESSION['ranking_user'] = $sql->fetchAll(PDO::FETCH_ASSOC);

    $count = count($_SESSION['ranking_user']);
    if($count > 10){
        $count = 10;
    }

//    var_dump($_SESSION['ranking_user']);

//User_ID毎の図鑑開放数
//SELECT Dex.User_ID, COUNT(Dex.User_ID) as count FROM Animal LEFT JOIN `Index` as Dex ON Animal.Animal_ID = Dex.Animal_ID Where Dex.User_ID IS NOT NULL GROUP BY Dex.User_ID ORDER BY count DESC;

?>

	<?php require 'common/nav_top1.php';?>

	<div class="container-bg inner w-100 h-100" style="padding-top: 12vh;">
		<div class="container">

			<div class="row">
				<div class="col-12">
					<div class="row">
						<div class="col-8">
							<h3 class="title" style="text-align: center;">ユーザーランキング</h3>
						</div>
						<div class="col-4">
							<a class="btn" style="background-color: darkseagreen; color: white;"
								href="ranking_animal.php">切替え</a>
						</div>
					</div>
				</div>
			</div>

			<div class="row" style="background:rgba(143,188,143,0.7); height:70vh; margin:0.1rem; overflow-x:hidden; overflow-y:scroll;">
				<div class="col-12" style="padding:0.5rem 0;">
                    
					<div class="row rank1 mt-2">
                        <div class="col-1"></div>
                        
                        <div class="col-2 text-center" style="position: relative;">
                            <img class="protected w-100" src="img/user1.png" style="background: white; border-radius: 100%; padding:0.1rem;">
                            <p class="p-0 m-0" style="position: absolute; top: 60%; left: 50%; transform: translate(-50%,-50%); color:white; font-size:0.9rem;">1</p>
                        </div>
                        
                        <div class="col-8 text-center" style="display: flex; align-items: center;     border-bottom: solid white 3px;">
                            <p class="p-0 m-0"><?php echo $_SESSION['ranking_user'][0]['NickName'];?></p>
                        </div>
                        
                        <div class="col-1"></div>
                    </div>
                    
                    <div class="row rank2 mt-2">
                        <div class="col-1"></div>
                        
                        <div class="col-2 text-center" style="position: relative;">
                            <img class="protected w-100" src="img/user2.png" style="background: white; border-radius: 100%; padding:0.1rem;">
                            <p class="p-0 m-0" style="position: absolute; top: 60%; left: 50%; transform: translate(-50%,-50%); color:white; font-size:0.9rem;">2</p>
                        </div>
                        
                        <div class="col-8 text-center" style="display: flex; align-items: center;     border-bottom: solid white 3px;">
                            <p class="p-0 m-0"><?php echo $_SESSION['ranking_user'][1]['NickName'];?></p>
                        </div>
                        
                        <div class="col-1"></div>
                    </div>
                    
                    <div class="row rank3 mt-2">
                        <div class="col-1"></div>
                        
                        <div class="col-2 text-center" style="position: relative;">
                            <img class="w-100 protected" src="img/user3.png" style="background: white; border-radius: 100%; padding:0.1rem;">
                            <p class="p-0 m-0" style="position: absolute; top: 60%; left: 50%; transform: translate(-50%,-50%); color:white; font-size:0.9rem;">3</p>
                        </div>
                        
                        <div class="col-8 text-center" style="display: flex; align-items: center;     border-bottom: solid white 3px;">
                            <p class="p-0 m-0"><?php echo $_SESSION['ranking_user'][2]['NickName'];?></p>
                        </div>
                        
                        <div class="col-1"></div>
                    </div>
                    
                    <?php
                        for($i = 3; $i < $count; $i++){
                    ?>
                        <div class="row rank4 mt-2">
                            <div class="col-1"></div>

                            <div class="col-2 text-center" style="position: relative;">
                                <img class="w-100 protected" src="img/user4.png" style="background: white; border-radius: 100%; padding:0.1rem;">
                                <p class="p-0 m-0" style="position: absolute; top: 60%; left: 50%; transform: translate(-50%,-50%); color:white; font-size:0.9rem;">
                                    <?php echo $i+1; ?>
                                </p>
                            </div>

                            <div class="col-8 text-center" style="display: flex; align-items: center;     border-bottom: solid white 3px;">
                                <p class="p-0 m-0">
                                    <?php echo $_SESSION['ranking_user'][$i]['NickName'];?>
                                </p>
                            </div>

                            <div class="col-1"></div>
                        </div>
                    <?php
                        }
                    ?>
                    
                    
				</div>
			</div>
		</div>
	</div>

    <?php require 'common/modal_menu.php';?>

	<?php require 'common/nav_bottom1.php';?>
	
</body>

<script type="text/javascript">
</script>

</html>