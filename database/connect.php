<?php
$host = '127.0.0.1';
$login = 'root';
$password = 'root';
$db = 'cleanblog_db';
try {
    $mysqli = new mysqli($host, $login, $password, $db);
    $mysqli->set_charset("utf8");
} catch (Exception $e) {}