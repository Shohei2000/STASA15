<?php session_start() ?>
<?php
    
    $pdo = new PDO('mysql:host=mysql1.php.xdomain.ne.jp; dbname=wws2020_sdgs15; charset=utf8','wws2020_sdgs15','sdbgser15');

    if( strlen($_REQUEST['animal_id']) == 1 ){
        $new_fav_id = '0'.$_REQUEST['animal_id'];
    }else{
        $new_fav_id = $_REQUEST['animal_id'];
    }

    //現在お気に入りになっている動物があるか判定する処理
    $count_fav=$pdo->prepare('SELECT COUNT(Animal_ID) as COUNT FROM `Index` WHERE User_ID = ? AND Fav_Flag = "1" ');
    $count_fav->execute([$_SESSION['user']['user_id']]);
    foreach($count_fav as $row){
        $count = $row['COUNT'];
    }

    echo $count;

    if($count != 0){
        //現在お気に入りになっている動物を取得する処理
        $find_fav=$pdo->prepare('SELECT * FROM `Index` WHERE User_ID = ? AND Fav_Flag = "1" ');
        $find_fav->execute([$_SESSION['user']['user_id']]);
        foreach($find_fav as $row){
            $old_fav_id = $row['Animal_ID'];
        }

        //現在お気に入りになっている動物を、お気に入りから外す処理
        $update_fav1=$pdo->prepare('UPDATE `Index` SET `Fav_Flag` = "0" WHERE User_ID = ? AND Animal_ID = ?');
        $update_fav1->execute([$_SESSION['user']['user_id'],$old_fav_id]);
    }
        
    //新しくお気に入りにしたい動物を、お気に入りに設定する処理
    $update_fav2=$pdo->prepare('UPDATE `Index` SET `Fav_Flag` = "1" WHERE User_ID = ? AND Animal_ID = ?');
    $update_fav2->execute([$_SESSION['user']['user_id'],$new_fav_id]);

?>

<script>
    location.href = 'animal_detail.php?animal_id=<?php echo $_REQUEST['animal_id']; ?>';
</script>