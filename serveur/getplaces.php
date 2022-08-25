<?php 
require_once 'bdd.php';


function getPlace(){
$sql = "SELECT * FROM place";    
$response = $bdd->query($sql);
$respone->execute();
//afficher les donnees

$donnees = $response->fetchAll();

var_dump($donnees);
echo json_encode($donnees);

};