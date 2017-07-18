<?php
session_start();
require('../config/database.php');
if (!function_exists('set_flash')) {
    function set_flash($message, $type = 'info')
    {
        $_SESSION['notification']['message'] = $message;
        $_SESSION['notification']['type'] = $type;
    }
}
if (!function_exists('redirect')) {
    function redirect($page)
    {
        header("Location: $page");
        exit();
    }
}

if (!function_exists('allowed_admin')) {
    function allowed_admin()
    {
        global $db;
        if (empty($_SESSION['steamid'])) {
            set_flash("You have to be logged in to access that!", "warning");
            redirect("../index.php");
        }
        $q = $db->prepare("SELECT * FROM users WHERE steam_id=?");
        $q->execute([$_SESSION['steamid']]);

        $rep = $q->fetch();
        if ($rep['rank'] == 0) {
            session_unset();
            session_destroy();
            session_start();
            set_flash("This account is not administrator! Logging you off.", "danger");
            redirect("../index.php");
        }

    }
}
allowed_admin();