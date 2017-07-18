<?php
/**
 * Created by PhpStorm.
 * User: Khalil
 * Date: 04/09/2016
 * Time: 02:50
 */

include("includes/head.php");
include("includes/header.php");
//Check if user is logged in
is_logged_in();



if (isset($_POST["message"])) {
    try {
        $req = $db->prepare("INSERT INTO support (active, steamid, message, date_creation) VALUES (:active, :id, :message, :date)");
        $req->execute(array(
           "active" => 1,
            "id" => $_SESSION['steamid'],
            "message" => $_POST['message'],
            "date" => date("Y-m-d H:i:s")
        ));

        set_flash("Message sent to the Support, we'll answer as soon as possible.", "success");
        redirect("support.php");

    } catch (PDOException $e) {
        set_flash("You have to insert a message or our System got an error! Please contact us by mail!" . $e, "warning");
        redirect("support.php");
    }
} else {
    set_flash("You have to insert a message or our System got an error! Please contact us by mail!" . $e, "warning");
    redirect("support.php");
}