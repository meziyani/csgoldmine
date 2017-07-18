<?php
require('config/database.php');
$test_sig = md5($_GET['oid'] . "-" . $_GET['user_id'] . "-" . "f5985de522df6b16fe4c618b58bb86a0");
$q = $db->prepare('SELECT * FROM users WHERE steam_id = ?');
$q->execute([$_GET['user_id']]);
$req = $q->fetch();
$points = $req['points'];
if ($_GET['sig'] == $test_sig) {
    $q = $db->prepare('UPDATE users SET points=? WHERE steam_id=?');
    $q->execute([$points + $_GET['amount'], $_GET['user_id']]);
    echo "1";
} else {
    echo "0";
}


?>