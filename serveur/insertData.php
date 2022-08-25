<?php
$server = 'localhost';
$username = 'root';
$password = '';
$db = 'mydb';



$bdd = new mysqli($server, $username, $password, $db) or die ("Unable to Connect");

// ( $host = 'localhost', $user = 'root', $password = '', $database = 'mydb', $port = [1002 => 'SET NAMES utf8'] )


// header('Content-Type: application/json');
// $content = json_decode(stripslashes(file_get_contents("php://input")),true);


// // get the place details concerne le formulaire pour l'ajout de lieux par le user s'il se connecte
// // mais ne marche pas encore à revoir!!
// if (isset($content['submit'])){

// $namePlace= $content['name'];
// $adressPlace = $content['adress'];
// $idCategory = $content['category_id'];
// $idCity = $content['city_id'];
// $longitude = $content['longitude'];
// $latitude = $content['latitude'];
    

// //insert into mysql table

// $sql = "INSERT INTO place(name, adress, lat, lng, city_id, category_id1) VALUES ('".$namePlace."','".$adressPlace."','".$latitude."','".$longitude."','".$idCity."','".$idCategory."')";


// if(mysql_query($conn,$sql)){
//     echo "ok";
// }else{
//         echo "error $sql. " .mysqli_error($conn);
//     }


// }



// // traitement/
//     echo( json_encode($content));
// 


$response = array();
$res=array();

$jsonRaw = file_get_contents('php://input');
$json = json_decode($jsonRaw);

if($json!=null){

    
    $namePlace= $json->namePlace;
    $adressPlace = $json->adressPlace;
    $category_id = $json->category_id;
    $city_id = $json->city_id;
    $lon = $json->lon;
    $lat = $json->lat;

    $sql = "INSERT INTO place(name, adress, lng, lat, city_id, category_id1) VALUES ('$namePlace','$adressPlace','$lon','$lat','$city_id','$category_id')";

    if(mysqli_query($bdd, $sql)){
        $svrResp["code"] = "1";
        $svrResp["message"] = "Sucessfully Connected";

        echo json_encode($response);
    }else{
        $svrResp["code"] = "2";
        $svrResp["message"] = mysqli_error($bdd);
        echo json_encode($response);
    }
}else{
    echo "JSON data error";
}
    

mysqli_close($bdd);



 ?>