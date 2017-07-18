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


$q = $db->prepare('SELECT * FROM users where steam_id=?');
$q->execute([$_SESSION['steamid']]);
$rep = $q->fetch();

if (isset($_POST["message"])) {
    try {
        $req = $db->prepare("INSERT INTO support_answers (id_ticket, steamid, message, date_answer, rank) VALUES (:idt, :id, :message, :date, :rank)");
        $req->execute(array(
            "idt" => $_POST["idt"],
            "id" => $_POST['steamid'],
            "message" => $_POST['message'],
            "date" => date("Y-m-d H:i:s"),
            "rank" => $rep["rank"]
        ));

        set_flash("Message sent to the Support, we'll answer as soon as possible.", "success");
        redirect("ticket.php?show=" . $_POST["idt"]);

    } catch (PDOException $e) {
        set_flash("You have to insert a message or our System got an error! Please contact us by mail!" . $e, "warning");
        redirect("ticket.php?show=" . $_POST["idt"]);
    }
} else {
    set_flash("You have to insert a message or our System got an error! Please contact us by mail!" . $e, "warning");
    redirect("ticket.php?show=" . $_POST["idt"]);
}