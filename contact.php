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
    $insert_query =  "INSERT INTO `contact`(`user_id`, `name`, `number`) VALUES ('$object->user_id','$object->name','$object->number')";
    $run = mysqli_query($conn,  $insert_query);
}
echo json_encode(['status'=>TRUE, 'msg'=>'Contact  Added Successfully']);

// if($data->user_id == '')
// {
//     echo json_encode(['status'=>FALSE, 'msg'=>'User Id Not Provided']);
// } elseif($data->name == '')
// {
//     echo json_encode(['status'=>FALSE, 'msg'=>'Name Not Provided']);
// } elseif($data->number == ''){

//     echo json_encode(['status'=>FALSE, 'msg'=>'Number Not Provided']);
// } else{
    
//     $insert_query .=  "INSERT INTO `contact`(`user_id`, `name`, `number`) VALUES ('$data->user_id','$data->name','$data->number')";
//     $run = mysqli_multi_query($conn,  $insert_query);
//     echo json_encode(['status'=>TRUE, 'msg'=>'Contact  Added']);
//     $alldata = mysqli_query($conn, "SELECT * FROM `contact` WHERE user_id = '$data->user_id'");
//     while ($row = mysqli_fetch_array($alldata))
//     {
//         echo json_encode(['status'=>TRUE, 'data'=>['user_id'=>$row['user_id'], 'name'=>$row['number'], 'time_date'=>$row['number']]]);
//     }
// }

// $alldata = mysqli_query($conn, "SELECT * FROM `contact` WHERE user_id = '$data->user_id'");
// while ($row = mysqli_fetch_array($alldata))
// {
//     echo json_encode(['status'=>TRUE, 'data'=>['user_id'=>$row['user_id'], 'name'=>$row['number'], 'time_date'=>$row['number']]]);
// }


?>