<?php session_start()?>
<?php

header('Content-type: application/json; charset=utf-8'); // ヘッダ（データ形式、文字コードなど指定）
$data = filter_input(INPUT_POST, 'データ'); // 送ったデータを受け取る（GETで送った場合は、INPUT_GET）

$pdo = new PDO('mysql:host=mysql1.php.xdomain.ne.jp; dbname=wws2020_sdgs15; charset=utf8','wws2020_sdgs15','sdbgser15');

date_default_timezone_set('Asia/Tokyo');//タイムゾーンの設定

//クイズのポイントとユーザーのポイントを足す処理
$point_sum = intval($_SESSION['user']['user_point'])+intval($_SESSION['quiz'][0]['Quiz_Point']);

//Userセッションのポイントを更新する処理
$_SESSION['user']['user_point'] = $point_sum;

//Userテーブルにポイントを追加する処理
$stmt = $pdo->prepare('UPDATE User SET User_Point = ? WHERE User_ID = ?;');
$stmt -> execute([$point_sum,$_SESSION['user']['user_id']]);


echo json_encode($point_sum); //　echoするとデータを返せる（JSON形式に変換して返す

?>