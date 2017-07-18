<?php
require('config/constants.php');
require('includes/functions.php');

is_logged_in();

session_unset();
session_destroy();
session_start();
set_flash("You have been logged out!", "success");
redirect("index.php");

?>