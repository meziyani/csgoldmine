<meta http-equiv="refresh" content="15">
<?php
include "../config/database.php";
?>
<style>@import url(http://fonts.googleapis.com/css?family=Open+Sans);
    /* apply a natural box layout model to all elements, but allowing components to change */

    .activity-feed {
        padding: 15px;
    }

    .activity-feed .feed-item {
        position: relative;
        padding-bottom: 20px;
        padding-left: 30px;
        border-left: 2px solid #e4e8eb;
    }

    .activity-feed .feed-item:last-child {
        border-color: transparent;
    }

    .activity-feed .feed-item:after {
        content: "";
        display: block;
        position: absolute;
        top: 0;
        left: -6px;
        width: 10px;
        height: 10px;
        border-radius: 6px;
        background: #fff;
        border: 1px solid #f37167;
    }

    .activity-feed .feed-item .date {
        position: relative;
        top: -5px;
        color: #8c96a3;
        text-transform: uppercase;
        font-size: 13px;
    }

    .activity-feed .feed-item .text {
        position: relative;
        top: -3px;
    }
</style>

<script src="assets/js/ie/html5shiv.js"></script><![endif]-->
<script src="assets/js/shop.js"></script><![endif]-->
<script src="assets/css/shop.css"></script><![endif]-->
<link rel="stylesheet" href="assets/css/main.css"/>
<!--[if lte IE 8]>
<link rel="stylesheet" href="assets/css/ie8.css"/><![endif]-->

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!------ START ------->
<?php


$req = $db->query('SELECT * FROM feeds ORDER BY id DESC LIMIT 0, 10');

while ($donnees = $req->fetch()) {

    $userQuery = $db->prepare('SELECT * FROM users WHERE steam_id=?');
    $userQuery->execute([$donnees["steamid"]]);
    $user = $userQuery->fetch();


    $avatar = $user["avatar_little"];
    $name = $user["username"];

    ?>
    <div class="activity-feed">
        <div class="feed-item">
            <div class="date">
                <img class="img-circle img-thumbnail" src="<?= $avatar; ?>"
                     alt="Avatar">
                <span class="label label-success" data-toggle="tooltip" data-placement="top"
                      style="font-size: 14px"><b><?= $name; ?></b></span>
            </div>
            <div class="text">Just won
                <b>
                    <?= $donnees["pts"]; ?>Pts <img src="../images/coins.png">
                </b>
                using <b><?= $donnees["wall"]; ?></b>!
            </div>
        </div>
    </div>
<?php } ?>
