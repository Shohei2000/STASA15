<?php session_start()?>

<link rel="stylesheet" href="css/rank.css">
<link rel="stylesheet" href="css/popup_menu.css">

<?php require 'common/header1.php';?>

<?php
    
    $sql = $pdo->prepare('SELECT Dex.Animal_ID, Animal.Jp_Name, COUNT(Dex.Animal_ID) AS count FROM `Index` as Dex LEFT JOIN Animal ON Dex.Animal_ID = Animal.Animal_ID GROUP BY Dex.Animal_ID');

    $sql->execute();
        
    $_SESSION['ranking_animal'] = $sql->fetchAll(PDO::FETCH_ASSOC);

    $count = count($_SESSION['ranking_animal']);
    if($count > 10){
        $count = 10;
    }

//    var_dump($_SESSION['ranking_animal']);
?>

	<?php require 'common/nav_top1.php';?>

    <div class="container-bg inner w-100 h-100" style="padding-top: 12vh;">
		<div class="container">

			<div class="row">
				<div class="col-12">
					<div class="row">
						<div class="col-8">
							<h3 class="title" style="text-align: center;">動物ランキング</h3>
						</div>
						<div class="col-4">
							<a class="btn" style="background-color: darkseagreen; color: white;"
								href="ranking_user.php">切替え</a>
						</div>
					</div>
				</div>
			</div>

			<div class="row" style="background:rgba(143,188,143,0.7); height:70vh; margin:0.1rem; overflow-x:hidden; overflow-y:scroll;">
				<div class="col-12" style="padding:0.5rem 0;">
                    
					<div class="row rank1 mt-2">
                        <div class="col-1"></div>
                        
                        <div class="col-2 text-center" style="position: relative;">
                            <img class="w-100 protected" src="img/pow1.png" style="background: white; border-radius: 100%; padding:0.1rem;">
                            <p class="p-0 m-0" style="position: absolute; top: 67%; left: 46%; transform: translate(-50%,-50%); color:white; font-size:0.9rem;">1</p>
                        </div>
                        
                        <div class="col-8 text-center" style="display: flex; align-items: center;     border-bottom: solid white 3px;">
                            <p class="p-0 m-0"><?php echo $_SESSION['ranking_animal'][0]['Jp_Name'];?></p>
                        </div>
                        
                        <div class="col-1"></div>
                    </div>
                    
                    <div class="row rank2 mt-2">
                        <div class="col-1"></div>
                        
                        <div class="col-2 text-center" style="position: relative;">
                            <img class="w-100 protected" src="img/pow2.png" style="background: white; border-radius: 100%; padding:0.1rem;">
                            <p class="p-0 m-0" style="position: absolute; top: 67%; left: 46%; transform: translate(-50%,-50%); color:white; font-size:0.9rem;">2</p>
                        </div>
                        
                        <div class="col-8 text-center" style="display: flex; align-items: center;     border-bottom: solid white 3px;">
                            <p class="p-0 m-0"><?php echo $_SESSION['ranking_animal'][1]['Jp_Name'];?></p>
                        </div>
                        
                        <div class="col-1"></div>
                    </div>
                    
                    <div class="row rank3 mt-2">
                        <div class="col-1"></div>
                        
                        <div class="col-2 text-center" style="position: relative;">
                            <img class="w-100 protected" src="img/pow3.png" style="background: white; border-radius: 100%; padding:0.1rem;">
                            <p class="p-0 m-0" style="position: absolute; top: 67%; left: 46%; transform: translate(-50%,-50%); color:white; font-size:0.9rem;">3</p>
                        </div>
                        
                        <div class="col-8 text-center" style="display: flex; align-items: center;     border-bottom: solid white 3px;">
                            <p class="p-0 m-0"><?php echo $_SESSION['ranking_animal'][2]['Jp_Name'];?></p>
                        </div>
                        
                        <div class="col-1"></div>
                    </div>
                    
                    <?php
                        for($i = 3; $i < $count; $i++){
                    ?>
                        <div class="row rank4 mt-2">
                            <div class="col-1"></div>

                            <div class="col-2 text-center" style="position: relative;">
                                <img class="w-100 protected" src="img/pow4.png" style="background: white; border-radius: 100%; padding:0.1rem;">
                                <p class="p-0 m-0" style="position: absolute; top: 67%; left: 46%; transform: translate(-50%,-50%); color:white; font-size:0.9rem;">
                                    <?php echo $i+1; ?>
                                </p>
                            </div>

                            <div class="col-8 text-center" style="display: flex; align-items: center;     border-bottom: solid white 3px;">
                                <p class="p-0 m-0" style="font-size:4vw;">
                                    <?php echo $_SESSION['ranking_animal'][$i]['Jp_Name'];?>
                                </p>
                            </div>

                            <div class="col-1"></div>
                        </div>
                    <?php
                        }
                    ?>
                    
                    <?php
                        for($i = 3; $i < $count; $i++){
                    ?>
                        <div class="row rank4 mt-2">
                            <div class="col-1"></div>

                            <div class="col-2 text-center" style="position: relative;">
                                <img class="w-100" src="img/pow4.png" style="background: white; border-radius: 100%; padding:0.1rem;">
                                <p class="p-0 m-0" style="position: absolute; top: 60%; left: 50%; transform: translate(-50%,-50%); color:white; font-size:0.9rem;">
                                    <?php echo $i; ?>
                                </p>
                            </div>

                            <div class="col-8 text-center" style="display: flex; align-items: center;     border-bottom: solid white 3px;">
                                <p class="p-0 m-0" style="font-size:4vw;">
                                    <?php echo $_SESSION['ranking_animal'][$i]['Jp_Name'];?>
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