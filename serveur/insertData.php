<?php
include 'bdd.php';


header('Content-Type: application/json');
$content = json_decode(stripslashes(file_get_contents("php://input")),true);


// get the place details concerne le formulaire pour l'ajout de lieux par le user s'il se connecte
// mais ne marche pas encore à revoir!!

$idPlace = $content['id'];
$namePlace= $content['name'];
$adressPlace = $content['adress'];
$idCategory = $content['category_id1'];
$idCity = $content['city_id'];
$longitude = $content['longitude'];
$latitude = $content['latitude'];
    

//insert into mysql table

$sql = "INSERT INTO `place`(`id`, `name`, `adress`, `lat`, `lng`, `city_id`, `category_id1`) VALUES
('$idPlace','$namePlace','$adressPlace','$latitude','$longitude','$idCity','$idCategory')";
if(!mysql_query($sql,$conn))

{
    die('Error : ' . mysql_error());
}

?>











// traitement/
    echo( json_encode($content));
?>