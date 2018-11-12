<?php
require '../connect.php';
$conn = new PDO("mysql:host=$host;dbname=$dbn;charset=utf8", $dba, $dbp);
unset($dbn,$dbu,$dbp);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$conn->exec("SET NAMES 'utf8';");
