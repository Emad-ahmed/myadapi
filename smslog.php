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
    $insert_query =  "INSERT INTO `smslog`(`user_id`, `from_sms`, `body`, `time_date`, `sendtime`) VALUES ('$object->user_id','$object->from_sms','$object->body','$object->time_date', '$object->sendtime')";
    $run = mysqli_query($conn,  $insert_query);
}
echo json_encode(['status'=>TRUE, 'msg'=>'Sms Logged Added']);

// if($data->user_id == '')
// {
//     echo json_encode(['status'=>FALSE, 'msg'=>'User Id Not Provided']);
// } elseif($data->from_sms == '')
// {
//     echo json_encode(['status'=>FALSE, 'msg'=>'Form Sms Not Provided']);
// } elseif($data->body == '')
// {
//     echo json_encode(['status'=>FALSE, 'msg'=>'Body Not Provided']);
// } else{
    
    
//     $insert_query .= "INSERT INTO `smslog`(`user_id`, `from_sms`, `body`, `time_date`) VALUES ('$data->user_id','$data->from_sms','$data->body','$dateview')";
//     $run = mysqli_multi_query($conn,  $insert_query);
//     echo json_encode(['status'=>TRUE, 'msg'=>'Sms Logged Added']);
//     $alldata = mysqli_query($conn, "SELECT * FROM `smslog` WHERE user_id = '$data->user_id'");
//     while ($row = mysqli_fetch_array($alldata))
//     {
//         echo json_encode(['status'=>TRUE, 'data'=>['user_id'=>$row['user_id'], 'from_sms'=>$row['from_sms'], 'time_date'=>$row['time_date'], 'body'=>$row['body']]]);
//     }

    
// }


// $alldata = mysqli_query($conn, "SELECT * FROM `smslog` WHERE user_id = '$data->user_id'");
// while ($row = mysqli_fetch_array($alldata))
// {
//     echo json_encode(['status'=>TRUE, 'data'=>['user_id'=>$row['user_id'], 'from_sms'=>$row['from_sms'], 'time_date'=>$row['time_date'], 'body'=>$row['body']]]);
// }




?>