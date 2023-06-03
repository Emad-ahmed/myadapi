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
    $insert_query =  "INSERT INTO `calllog`(`user_id`, `from_call`, `time_date`, `call_type`, `call_duration`) VALUES ('$object->user_id','$object->from_call','$dateview','$object->call_type','$object->call_duration')";
    $run = mysqli_query($conn,  $insert_query);
}
echo json_encode(['status'=>TRUE, 'msg'=>'Call Logged  Added']);



// if($data->user_id == '')
// {
//     echo json_encode(['status'=>FALSE, 'msg'=>'User Id Not Provided']);
// } elseif($data->from_call == '')
// {
//     echo json_encode(['status'=>FALSE, 'msg'=>'Form Call Not Provided']);
// } elseif($data->call_type == '')
// {
//     echo json_encode(['status'=>FALSE, 'msg'=>'Call Type Not Provided']);
// } elseif($data->call_duration == '')
// {
//     echo json_encode(['status'=>FALSE, 'msg'=>'Call Duration Not Provided']);
// }
// else{
    
//     $insert_query .= "INSERT INTO `calllog`(`user_id`, `from_call`, `time_date`, `call_type`, `call_duration`) VALUES ('$data->user_id','$data->from_call','$dateview','$data->call_type','$data->call_duration')";
//     $run = mysqli_multi_query($conn,  $insert_query);
//     echo json_encode(['status'=>TRUE, 'msg'=>'Call Logged Added']);
//     $alldata = mysqli_query($conn, "SELECT * FROM `calllog` WHERE user_id = '$data->user_id'");
//     while ($row = mysqli_fetch_array($alldata))
//     {
//         echo json_encode(['status'=>TRUE, 'data'=>['user_id'=>$row['user_id'], 'from_call'=>$row['from_call'], 'time_date'=>$row['time_date'], 'call_duration'=>$row['call_duration'], 'call_type'=>$row['call_type']]]);
//     }
// }

// $alldata = mysqli_query($conn, "SELECT * FROM `calllog` WHERE user_id = '$data->user_id'");
// while ($row = mysqli_fetch_array($alldata))
// {
//     echo json_encode(['status'=>TRUE, 'data'=>['user_id'=>$row['user_id'], 'from_call'=>$row['from_call'], 'time_date'=>$row['time_date'], 'call_duration'=>$row['call_duration'], 'call_type'=>$row['call_type']]]);
// }


?>