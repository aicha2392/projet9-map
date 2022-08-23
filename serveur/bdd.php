<?php

try{
    $conn = new PDO('mysql:host=localhost;dbname=projet9;charset=utf8','root','');
} catch (PDOException $e){
    throw new PDOException($e->getMessages(), (int)$e->getCode());
}

?>
