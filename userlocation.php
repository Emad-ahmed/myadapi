<?php

include('db.php');


$dateview = date("Y-m-d h:i:sa");

header('Access-Control-Allow-Origin:*');
header('Content-Type:application/json');
header('Access-Control-Allow-Methods:POST');
header('Access-Control-Allow-Headers:Content-Type,Access-Control-Allow-Headers,Authorization,X-Request-With');





error_reporting(0);


$data = json_decode(file_get_contents("php://input"));



for ($x = 0; $x < count($data); $x++) {
    $object =$data[$x];
    $insert_query =  "INSERT INTO `userlocation`(`user_id`, `long`, `lat`, `TimeStamp`, `Address`) VALUES ('$object->user_id','$object->long','$object->lat','$object->TimeStamp','$object->Address')";
    $run = mysqli_query($conn,  $insert_query);
}
echo json_encode(['status'=>TRUE, 'msg'=>'User Location  Added']);

// $object =$data[0];
// $alldata = mysqli_query($conn, "SELECT * FROM `userlocation` WHERE user_id = '$object->user_id'");
// while ($row = mysqli_fetch_array($alldata))
// {
//     echo json_encode(['status'=>TRUE, 'data'=>['user_id'=>$row['user_id'], 'long'=>$row['long'], 'lat'=>$row['lat'], 'TimeStamp'=>$row['TimeStamp'], 'Address'=>$row['Address']]]);
// }

// $alldata = mysqli_query($conn, "SELECT * FROM `userlocation` WHERE user_id = '$data->user_id'");
// while ($row = mysqli_fetch_array($alldata))
// {
//     echo json_encode(['status'=>TRUE, 'data'=>['user_id'=>$row['user_id'], 'long'=>$row['long'], 'lat'=>$row['lat'], 'TimeStamp'=>$row['TimeStamp'], 'Address'=>$row['Address']]]);
// }



?>