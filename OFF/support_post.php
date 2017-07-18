<?php
/**
 * Created by PhpStorm.
 * User: Khalil
 * Date: 04/09/2016
 * Time: 02:50
 */

if (isset($_POST["message"])) {

    $req = $deb("INSERT INTO support (active, steamid, message, date_creation) VALUES (1, '" . $_SESSION['steamid'] . "', " . $_POST['message']", )");

}