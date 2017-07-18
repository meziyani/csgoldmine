<?php
require('../config/database.php');
$test_sig = md5($_GET['oid'] . "-" . $_GET['user_id'] . "-" . "f5985de522df6b16fe4c618b58bb86a0");
$q = $db->prepare('SELECT * FROM users WHERE steam_id = ?');
$q->execute([$_GET['user_id']]);
$req = $q->fetch();
$points = $req['points'];
if ($_GET['sig'] == $test_sig) {
    $q = $db->prepare('UPDATE users SET points=? WHERE steam_id=?');
    $q->execute([$points + $_GET['amount'], $_GET['user_id']]);
    $points = $points + $_GET['amount'];


    $q = $db->prepare('INSERT INTO feeds (steamid, pts, wall) VALUES (?,?,?)');
    $q->execute([
        $_GET["user_id"],
        $_GET['amount'],
        "OfferToro"

    ]);


    if ($req["refid"] != (null || 0)) {
        if ($points >= 10) {

            $q = $db->prepare('SELECT * FROM users WHERE steam_id = ?');        // GET THE AFFILIATING
            $q->execute([$req['refid']]);
            $ref = $q->fetch();

            $q = $db->prepare('UPDATE users SET points=? WHERE steam_id=?');    // SET [+ 10 pts to the Affiliating]
            $q->execute([$ref["points"] + 10, $req["refid"]]);

            $q = $db->prepare('UPDATE users SET refid=0 WHERE steam_id=?');     // SET REFID = 0 |/| Desactivate Ref.
            $q->execute([$req["steam_id"]]);
        }
    }

    echo "1";
} else {
    echo "0";
}
