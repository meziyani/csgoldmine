<?php
if (!(empty($_GET) && empty($_GET["refid"]))) {

    if (!isset($_SESSION["refid"]) && !isset($_SESSION["steamid"])) {

        $q = $db->prepare('SELECT * FROM users WHERE steam_id = ?');
        $q->execute([$_GET['refid']]);
        $req = $q->fetch();

        $ip = $_SERVER['REMOTE_ADDR'];
        if ($req["ip"] == $ip) {
            set_flash("You need to be new to use the refferals system. Double accounts = BAN", "danger");
            redirect("index.php");
        } else {

            $_SESSION["refid"] = $_GET["refid"];
        }

    } else
        if (isset($_SESSION["steamid"])) {
            set_flash("You need to be new to use the refferals system. Double accounts = BAN", "danger");
            redirect("index.php");
        }

} else
    if (!empty($_SESSION["steamid"]) && !empty($_SESSION["refid"])) {

        $q = $db->prepare('UPDATE users SET refid=? WHERE steam_id=?');
        $q->execute([$_SESSION["refid"], $_SESSION["steamid"]]);

    }