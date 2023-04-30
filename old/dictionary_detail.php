<?php session_start()?>

<link rel="stylesheet" href="css/gacha.css">
<link rel="stylesheet" href="css/popup_menu.css">

<?php require 'common/header1.php';?>

	<?php require 'common/nav_top1.php';?>

    <!-- ここから記入 -->
    <?php
        $sql = $pdo->prepare('select * from Mission where Mis_Difficulty = ?');

        //デイリーミッション情報取得
        $sql->execute(['0']);
        $_SESSION['mission_d'] = $sql->fetchAll(PDO::FETCH_ASSOC);
        $count_mission_d = count($_SESSION['mission_d']);

    //    var_dumpで配列や変数を吐き出せる(デバッグ用)
    //    var_dump($_SESSION['mission_d']);
    ?>

	<?php require 'common/modal_menu.php';?>


</body>

<script type="text/javascript">
</script>

</html>