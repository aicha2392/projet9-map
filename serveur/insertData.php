<?php
include 'bdd.php';


header('Content-Type: application/json');
$content = json_decode(stripslashes(file_get_contents("php://input")), true);


// get the place details concerne le formulaire pour l'ajout de lieux par le user s'il se connecte
// mais ne marche pas encore à revoir!!

if(isset($content['submit'])){

    $name= $content['name'];
    $adress = $content['adress'];
    // $idCategory2 = $content['category_id1'];
    // $idCategory = (int)$idCategory2;
    // $idCity2 = $content['city_id'];
    // $idCity = (int)$idCity2;
    // $longitude2 = $content['longitude'];
    // $longitude = $longitude2;
    // $latitude2 = $content['latitude'];
    // $latitude = $latitude2;
    
//insert into mysql table


//$sql = "Insert into place2 (name, adress, lat, lng, city_id, category_id1) values (?,?,?,?,?,?);";
$sql = "Insert into place2 (name, adress) values ($name, $adress)";
//$stmt = $conn->stmt_init();
if (!$stmt->prepare($sql)) {
    echo "something went wrong!!!";
    exit();
}
//$stmt->bind_param('ss', $name, $adress);
$stmt->execute();
if ($stmt->affected_rows) {
    http_response_code(200);
    echo "Congratulation!!\n Registration successful\n";
}
exit();

// $sql = "INSERT INTO place (name, adress, lat, lng, city_id, category_id1) VALUES
// ('$name','$adress', '$latitude','$longitude','$idCity','$idCategory')";
// // if(!mysql_query($sql,$conn))

// {
//     die('Error : ' . mysql_error());
// }
}
// traitement/
    echo( json_encode(['status_code'=>200]));
?>