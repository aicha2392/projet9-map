<?php 

try {
    $bdd = new PDO('mysql:host=localhost;dbname=mydb;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$reponse  = $bdd->query('SELECT * FROM place');

header('Content-Type: application/json'); // ce qui va faire comprendre au navigateur que c'est fichier json
echo json_encode($reponse->fetchAll(), true); // transforme un array en json

?>

