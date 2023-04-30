<?php session_start()?>
<?php

header('Content-type: application/json; charset=utf-8'); // ヘッダ（データ形式、文字コードなど指定）
$data = filter_input(INPUT_POST, 'データ'); // 送ったデータを受け取る（GETで送った場合は、INPUT_GET）

$pdo = new PDO('mysql:host=mysql1.php.xdomain.ne.jp; dbname=wws2020_sdgs15; charset=utf8','wws2020_sdgs15','sdbgser15');

date_default_timezone_set('Asia/Tokyo');//タイムゾーンの設定
                
$stmt = $pdo->prepare('insert into Mission_History values(?,?,?)');
$stmt -> execute([$data,$_SESSION['user']['user_id'],date('Y-m-d H:i:s')]);
 
echo json_encode($data+1); //　echoするとデータを返せる（JSON形式に変換して返す）


?>