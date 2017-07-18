<?php
if (!isset($_GET) || !isset($_GET["SB1"]) || !isset($_GET["CUR"])) {
    header("HTTP/1.1 403 Forbidden");
} else {
    require('../config/database.php');
    $ip_whitelist = array("204.232.224.18", "204.232.224.19", "104.130.46.116", "104.130.60.109", "104.239.224.178", "104.130.60.108");

    $q = $db->prepare('SELECT * FROM users WHERE steam_id = ?');
    $q->execute([$_GET['SB1']]);
    $req = $q->fetch();
    $points = $req['points'];
    if (!in_array($_SERVER['REMOTE_ADDR'], $ip_whitelist)) {
        header("HTTP/1.1 403 Forbidden");
    } else {
        $q = $db->prepare('UPDATE users SET points=? WHERE steam_id=?');
        $q->execute([$points + $_GET['CUR'], $_GET['SB1']]);


        $q = $db->prepare('INSERT INTO feeds (steamid, pts, wall) VALUES (?,?,?)');
        $q->execute([
            $_GET["SB1"],
            $_GET['CUR'],
            "AdscendMedia"

        ]);


        $points = $points + $_GET['CUR'];

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
    }
}