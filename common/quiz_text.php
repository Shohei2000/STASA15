<?php
    
    //クイズの総合計数を求める処理
    $sql = $pdo->prepare('SELECT COUNT( QUIZ_ID ) AS COUNT FROM Quiz');
    $sql->execute();
    foreach ($sql as $row) {
        $quiz_count = $row['COUNT'];
    }

    //乱数でクイズIDを取得
    $quiz_rand = rand(1,$quiz_count);
    $sql = $pdo->prepare('SELECT * FROM Quiz LEFT JOIN Animal ON Quiz.Quiz_Answer = Animal.Jp_Name LEFT JOIN Category ON Animal.Category_ID = Category.Category_ID where Quiz.Quiz_ID = ?');
    $sql->execute([$quiz_rand]);
    $_SESSION['quiz'] = $sql->fetchAll(PDO::FETCH_ASSOC);

    //動物画像表示用の数字処理1を01にする処理
    if($_SESSION['quiz'][0]['Animal_ID'] < 10){
        $img_no = '0'.$_SESSION['quiz'][0]['Animal_ID'];
    }else{
        $img_no = $_SESSION['quiz'][0]['Animal_ID'];
    }

    //ミッション履歴にインサートする処理
    $sql = $pdo -> prepare('INSERT INTO Quiz_History VALUES (?,?,?)');
    $sql -> execute([$_SESSION['quiz'][0]['Quiz_ID'],$_SESSION['user']['user_id'],date("Y/m/d H:i:s")]);

//        デバッグ用
//    echo "データ総数".$quiz_count;
//    echo "ランダム値".$quiz_rand;
//    var_dump($_SESSION['quiz']);

?>

<link rel="stylesheet" href="css/quiz.css">

    <div class="modal" id="modal3" tabindex="-1" role="dialog"
      aria-labelledby="label1" aria-hidden="true" style="display:block;">
        
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content  mt-4 pt-5 pr-5 pl-5" style="background: #d1ffe8; border-radius:25px; text-align:center;">
            
          <div class="menu mt-3"><h2 style="color:white;">QUIZ</h2></div>

          <div class="row choices open question mt-3 mb-3">
            <div class="col py-4"><h3><?php echo $_SESSION['quiz'][0]['Quiz_Detail']; ?></h3></div>
          </div>
                    
        <!--選択肢表示処理-->
        <?php
            $min = 1;
            $max = 4;
            $rand = rand($min, $max);

            for ($j = 1; $j <= $quiz_count; $j ++) { // 1~最大の辞書ID
                $used_number[$j] = true; // 初期値でtrueを格納する
            }

            for ($i = 1; $i < 5; $i ++) { // 4回繰り返す
                if ($i == $rand) {
                    echo '<div class="row choices mb-2 open" >
                            <div class="col"><a style="text-decoration:none;" href="javascript:click(true)" ><h3 class="parts">', $_SESSION['quiz'][0]['Quiz_Answer'] ,'</h3></a></div>
                          </div>';
                    continue;
                }

                $min2 = 1;
                $max2 = $quiz_count;

                // 選択肢被り防止の為の処理
                // あえて最初に、$rand2に該当問題の動物idを格納する
                $rand2 = $_SESSION['quiz'][0]['Quiz_Answer'];
                $used_number[$_SESSION['quiz'][0]['Animal_ID']] = false; // 該当問題の辞書idにはfalseを入れる
                $flg = true;

                while ($flg == true) {
                    $rand2 = rand($min2, $max2);
                    while ($used_number[$rand2] == false) { // $used_number[$rand2]がfalse -> 既に使用されていたら
                        $rand2 = rand($min2, $max2); // 再度random取得
                    }
                    $used_number[$rand2] = false;
                    $flg = false;
                }

                $sql_radio = $pdo->prepare('select * from Animal where Animal_ID = ?');
                $sql_radio->execute([
                    $rand2
                ]);
                foreach ($sql_radio as $row_radio) {
                    $jp_name = $row_radio['Jp_Name'];
                }

                echo '<div class="row choices mb-2 open" >
                        <div class="col"><a style="text-decoration:none;" href="javascript:click(false)" ><h3 class="parts">', $jp_name ,'</h3></a></div>
                      </div>';
            }
            
        ?>  

          <!--後から表示-->
          <div class="row choices clos"   style="display:none;">
            <div class="col picture"><img src="./img/animals/animal<?php echo $img_no; ?>.png" style="width:90%;"></div>
          </div>
          <div class="clos m-2"   style="display:none;">
            <h1 class="m-0"><?php echo $_SESSION['quiz'][0]['Quiz_Answer']; ?></h1>
          </div>
          <div class="clos"   style="display:none;">
            <?php echo $_SESSION['quiz'][0]['Quiz_Detail']; ?>
          </div>
          <div class="clos m-2"   style="display:none;">
            <h1 style="color:red;"><?php echo $_SESSION['quiz'][0]['Cate_Name']; ?></h1>
          </div>
          <div class="row choices clos" style="display:none;">
            <div class="col"><a style="text-decoration:none;"><h3 class="parts">獲得ポイント:<?php echo $_SESSION['quiz'][0]['Quiz_Point']; ?>pt</h3></a></div>
          </div>
          <div class="original clos mt-2 mb-2" id="close" style="text-decoration:none;
          display:none" data-dismiss="modal" aria-label="original">
              <a href="" style="text-decoration:none;"><h2 style="color:white;" onclick="closeModal3();">閉じる</h2></a>
            </div> 
        </div>
      </div>
    </div>
        
<script src="./script/quiz.js" charset="utf-8"></script>
