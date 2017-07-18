<?php
require('config/database.php');
require('config/constants.php');
require('includes/functions.php');
//Check if user is logged in
is_logged_in();


if (!empty($_GET['id'])) {
    $steam_id = $_SESSION['steamid'];
    $id = $_GET['id'];
    $q = $db->prepare('select COUNT(id) as matching from store where id=?');
    $q->execute([$id]);
    $req = $q->fetch();
    if ($req['matching'] == 1) {
        //Get all item info from id
        $q = $db->prepare('select * from store where id=?');
        $q->execute([$id]);
        $iteminfo = $q->fetch();

        //Remove money from user
        $price = $iteminfo['price'];
        $SQL = "SELECT * FROM users WHERE steam_id = '$steam_id'";
        $q = $db->query($SQL);
        $userinfo = $q->fetch();
        $points = $userinfo['points'];
        if ($points >= $price) {
            $q = $db->prepare('UPDATE users SET points=? WHERE steam_id=?');
            $q->execute([$points - $price, $steam_id]);

            //Add transaction to database
            $q = $db->prepare('INSERT INTO transactions (steam_id,item_title, item_id, balance_before, balance_after, price, ip) VALUES (?,?,?,?,?,?,?)');
            $q->execute([$steam_id, $iteminfo['title'], $iteminfo['id'], $points, $points - $price, $price, $_SERVER['REMOTE_ADDR']]);

            set_flash("You have successfully bought this item!", "success");
            redirect("store.php");
        } else {
            set_flash("You dont have enough points for that!", "danger");
            redirect("index.php");
        }


    } else {
        echo 'error';
    }

} else {
    echo 'error';
}


?>