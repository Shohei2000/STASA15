<?php require 'common/modal_mission.php';?>

<nav class="navbar fixed-bottom navbar-dark bg-dark" style="height: 10%;">
    <div class="row w-100 h-100 nav_bottom_row">
        <div class="col-1"></div>
        <div class="col-2">
            <a href="./top_menu.php"><img class="nav_bottom_icons" src="./img/icon_top.png"></a>
        </div>
        <div class="col-2">
            <a href="./ranking_user.php"><img class="nav_bottom_icons" src="./img/icon_ranking.png"></a>
        </div>
        <div class="col-2">
            <a href="./dictionary_top.php?Category=Category_ALL&Class=Class_ALL"><img class="nav_bottom_icons" src="./img/icon_dictionary.png"></a>
        </div>
        <div class="col-2">
            <a href="./gacha_top.php"><img class="nav_bottom_icons" src="./img/icon_gacha.png"></a>
        </div>
        <div class="col-2">
            <a data-toggle="modal" data-target="#modal1" data-backdrop="static"><img class="nav_bottom_icons" src="./img/icon_mission.png"></a>
        </div>
        <div class="col-1"></div>
    </div>
</nav>

<style>
    .nav_bottom_row{
        text-align: center;
        align-content: center;
    }
    .nav_bottom_icons{
        width:80%;
    }
</style>
