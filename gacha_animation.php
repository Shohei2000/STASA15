<?php session_start()?>

<?php
    unset($_SESSION['gacha_animal_id']);
    unset($_SESSION['gacha_animal_name']);
    unset($_SESSION['gacha_animal_credit']);

    $point_back = 0;//被った時に、還元するポイント

    $pdo = new PDO('mysql:host=mysql1.php.xdomain.ne.jp; dbname=wws2020_sdgs15; charset=utf8','wws2020_sdgs15','sdbgser15');

    //動物テーブルに何匹登録されているか確認する処理
        $sql_gacha_count = $pdo->prepare('SELECT COUNT( Animal_ID ) AS COUNT FROM Animal');
        $sql_gacha_count->execute();
        foreach ($sql_gacha_count as $row) {
            $animal_count = $row['COUNT'];
        }

    if($_REQUEST['point'] == 100){//1連ガチャ

        //ガチャで何の動物を出すか決める処理
        $animal_rand = rand(1,$animal_count);
        $sql_gacha100 = $pdo->prepare('SELECT * FROM Animal where Animal_ID = ?');
        $sql_gacha100->execute([$animal_rand]);

        foreach ($sql_gacha100 as $row) {
            $_SESSION['gacha_animal_id'][0] = $row['Animal_ID'];
            $_SESSION['gacha_animal_name'][0] = $row['Jp_Name'];
            $_SESSION['gacha_animal_credit'][0] = $row['Credit'];
        }

        //動物画像表示用の数字処理1を01にする処理
        if($_SESSION['gacha_animal_id'][0] < 10){
            $_SESSION['gacha_animal_id'][0] = '0'.$_SESSION['gacha_animal_id'][0];
        }else{
            $_SESSION['gacha_animal_id'][0] = $_SESSION['gacha_animal_id'][0];
        }
        
        //gacha_result100から移動させた処理
        
        //取得した動物が既にIndexテーブルに存在するか確認する処理
        $sql_index_check = $pdo->prepare('SELECT COUNT(*) AS COUNT FROM `Index` where User_ID = ? AND Animal_ID = ?');
        $sql_index_check->execute([$_SESSION['user']['user_id'],$_SESSION['gacha_animal_id'][0]]);
        foreach ($sql_index_check as $row) {
            $_SESSION['index_check_count']['0'] = $row['COUNT'];
        }

        if($_SESSION['index_check_count']['0'] == 0){//初入手時処理

            //Indexテーブルに、取得した動物を格納する処理
            //UserID,AnimalID,Fav_Flag
            $sql_insert_gacha = $pdo->prepare('insert into `Index` values(?,?,0)');
            $sql_insert_gacha -> execute([$_SESSION['user']['user_id'],$_SESSION['gacha_animal_id'][0]]);

        }else{//被った時の処理

            $point_back += 50;
        }
        
        
        
    }else if($_REQUEST['point'] == 900){//10連ガチャ

        for($i = 0; $i < 10; $i++){
            
            //ガチャで何の動物を出すか決める処理
            $animal_rand = rand(1,$animal_count);
            $sql_gacha900 = $pdo->prepare('SELECT * FROM Animal where Animal_ID = ?');
            $sql_gacha900->execute([$animal_rand]);

            foreach ($sql_gacha900 as $row) {
                $_SESSION['gacha_animal_id'][$i] = $row['Animal_ID'];
                $_SESSION['gacha_animal_name'][$i] = $row['Jp_Name'];
                $_SESSION['gacha_animal_credit'][$i] = $row['Credit'];
            }
            
            //動物画像表示用の数字処理1を01にする処理
            if($_SESSION['gacha_animal_id'][$i] < 10){
                $_SESSION['gacha_animal_id'][$i] = '0'.$_SESSION['gacha_animal_id'][$i];
            }else{
                $_SESSION['gacha_animal_id'][$i] = $_SESSION['gacha_animal_id'][$i];
            }
            
        }//for_END
        
        //gacha_result900から移動させた処理        
        //Indexテーブルに、取得した動物を格納する処理
        //UserID,AnimalID,Fav_Flag
        for($i = 0; $i < 10; $i++){

            //取得した動物が既にIndexテーブルに存在するか確認する処理
            $sql_index_check = $pdo->prepare('SELECT COUNT(*) AS COUNT FROM `Index` where User_ID = ? AND Animal_ID = ?');
            $sql_index_check->execute([$_SESSION['user']['user_id'],$_SESSION['gacha_animal_id'][$i]]);
            foreach ($sql_index_check as $row) {
                $_SESSION['index_check_count'][$i] = $row['COUNT'];
            }

            if($_SESSION['index_check_count'][$i] == 0){
                $sql_insert_gacha = $pdo->prepare('insert into `Index` values(?,?,0)');
                $sql_insert_gacha -> execute([$_SESSION['user']['user_id'],$_SESSION['gacha_animal_id'][$i]]);

            }else{//被った時の処理

                $point_back += 50;

            }

        }//forEND        
        
    }//if_END

    $_SESSION['point_back'] = $point_back;//次の画面で利用する為、還元予定ポイントをセッションに格納

    //ガチャ消費ポイントを、100or900引く処理
    //クイズのポイントとユーザーのポイントを足す処理
    $point_sum = intval($_SESSION['user']['user_point'])-intval($_REQUEST['point'])+intval($point_back);

    //Userセッションのポイントを更新する処理
    $_SESSION['user']['user_point'] = $point_sum;

    //Userテーブルにポイントを追加する処理
    $stmt = $pdo->prepare('UPDATE User SET User_Point = ? WHERE User_ID = ?;');
    $stmt -> execute([$point_sum,$_SESSION['user']['user_id']]);

?>

<a href="./gacha_result<?php echo $_REQUEST['point']; ?>.php" style="text-decoration:none; color:black;">
    <div class="text-center">
        <h1>【画面をタップ！】</h1>
        <video class="w-100" autoplay muted poster="" playsinline>
            <source src="./img/gacha_images/gacha1.mp4">
        </video>
    </div>
</a>

<style>
    #main{
        padding: 0;
    }
    div.container-bg{
        background-image: none;
    }
</style>