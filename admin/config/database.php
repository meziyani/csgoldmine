<?php
//Database Credentials
define('DB_HOST', "localhost");
define('DB_NAME', "csgoldmine");
define('DB_USER', "root");
define('DB_PASSWORD', "noria::94800-");

try {
    $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Impossible de se connecter a la base de données!");
}