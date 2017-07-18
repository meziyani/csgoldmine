<?php
require('config/constants.php');
require('includes/functions.php');

is_logged_in();

session_start();

session_unset();
session_destroy();
set_flash("You have been logged out!", "success");
redirect("index.php");

?>