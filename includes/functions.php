<?php
require('config/database.php');
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
if (!function_exists('is_logged_in')) {
    function is_logged_in()
    {
        if (empty($_SESSION['steamid'])) {
            set_flash("You have to be logged in to access that!<br><b>Click the green button to Sign-in!</b>", "warning");
            redirect("index.php");
        }
    }
}
