<?php session_start()?>

<link rel="stylesheet" href="css/popup_menu.css">
<link rel="stylesheet" href="css/animal_detail.css">

<?php require 'common/header1.php';?>

	<?php require 'common/nav_top1.php';?>

	<div class="container-bg container-fluid w-100 h-100 d-flex align-items-center"> <!-- detail_body -->
  
	  <div class="row"> <!-- 詳細画面 -->
          
    <?php
        //animal_idを二桁にする処理
        if( strlen($_REQUEST['animal_id']) == 1 ){
            $_REQUEST['animal_id'] = '0'.$_REQUEST['animal_id'];
        }
          
      $fav_animal=$pdo->prepare('SELECT COUNT( Animal_ID ) AS COUNT FROM `Index` where User_ID = ? AND Animal_ID = ? AND Fav_Flag = "1" ');
      $fav_animal->execute([$_SESSION['user']['user_id'],$_REQUEST['animal_id']]);
      foreach($fav_animal as $row){
        $fav_count = $row['COUNT'];
      }
    ?>

    <?php
      $sql=$pdo->prepare('select * from Animal where Animal_ID = ?');
      $sql->execute([$_REQUEST['animal_id']]);
      foreach($sql as $row){
    ?>
      <div class="col-3"></div>
      <div class="col-9"></div>
      <div class="col-1"></div>
      <div class="col-10 text-center mx-auto" style="position: relative;"> <!-- 中央寄せ -->
          
        <?php
            if($fav_count == 0){
        ?>
                <a href="fav_insert.php?fav_flag=<?php echo $fav_count;?>&animal_id=<?php echo $row['Animal_ID'];?>" ><img src="./img/heart.png" style="width:1.5rem;"></a>
        <?php
            }else{
        ?>
                <a href=""><img src="./img/heart_red.png" style="width:1.5rem;"></a>
        <?php
            }
        ?>
          
        <h2 style="font-size:1.4rem;"><?php echo $row['Jp_Name']; ?></h2>
        <h2 style="font-size:0.8rem;"><?php echo $row['En_Name']; ?></h2>
          
        <?php 
          $img=$pdo->prepare('select * from Animal_Image where Animal_ID = ?');
          $img->execute([$row['Animal_ID']]);
          foreach($img as $path){
              $image_path = $path['Image_Path'];
          }
        ?>
          
        <img src="<?php echo $image_path; ?>" class="border border-gray" height="200px">
        <span class="credit"><?php echo $row['Credit']; ?></span>
          
      </div> <!-- 中央寄せ -->
          
      <div class="col-1"></div>

      <div class="col"> <!-- カルーセル -->
        <div id="Animal_detail" class="carousel slide mt-3" data-ride="carousel"> <!-- カルーセル枠 -->
          <div class="carousel-inner"> <!-- カルーセルインナー -->
              
            <div class="carousel-item active"> <!-- カルーセル1 -->
              <table class="detail_box mx-auto" width="75%" style="display:block;">
                <tr class="w-100">
                  <?php 
                    $class=$pdo->prepare('select * from Class where Class_ID = ?');
                    $class->execute([$row['Class_ID']]);
                    foreach($class as $name){ 
                  ?>

                  <td class="text-center" style="width:30%;">分類</td>
                  <td>:</td>
                  <td><?php echo $name['Class_Name']; ?></td>
                
                  <?php
                    }
                  ?>
                </tr>

                <tr class="w-100">
                  <?php 
                    $category=$pdo->prepare('select * from Category where Category_ID = ?');
                    $category->execute([$row['Category_ID']]);
                    foreach($category as $cate){ 
                  ?>
                  
                  <td class="text-center" style="width:30%;">ランク</td>
                  <td>:</td>
                  <td><?php echo $cate['Cate_Name']; ?></td>
                
                  <?php
                    }
                  ?>
                </tr>

                <tr class="w-100">
                  <td class="text-center" style="width:30%;">生息地</td>
                  <td>:</td>
                  <td><?php echo $row['Animal_Habitat']; ?></td>
                </tr>

              </table>
            </div> <!-- カルーセル1 -->
              
            <div class="carousel-item"> <!-- カルーセル2 -->
              
              <div class="detail_box mx-auto" style="width: 75%;"> <!-- 詳細文 -->
                <p align="left"><?php echo $row['Animal_Detail']; ?>
                </p>
              </div> <!-- 詳細文 -->
            </div> <!-- カルーセル2 -->
          </div><!-- カルーセルインナー -->
      <a class="carousel-control-prev" href="#Animal_detail" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#Animal_detail" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
        </div> <!-- カルーセル枠 -->
      </div> <!-- カルーセル -->

    <?php
      }
    ?>
      
	  </div> <!-- 詳細画面 -->

	</div> <!-- detail_body -->

    <?php require 'common/nav_bottom1.php';?>

</body>

</html>