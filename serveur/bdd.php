<?php

try {
    $bdd = new PDO('mysql:host=localhost;dbname=mydb;charset=utf8', 'root', '',array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
?>
