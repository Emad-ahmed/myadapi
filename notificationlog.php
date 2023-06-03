<?php

include('db.php');


$dateview = date("Y-m-d h:i:sa");

header('Access-Control-Allow-Origin:*');
header('Content-Type:application/json');
header('Access-Control-Allow-Methods:POST');
header('Access-Control-Allow-Headers:Content-Type,Access-Control-Allow-Headers,Authorization,X-Request-With');



error_reporting(0);

$dataRaw = json_decode(file_get_contents("php://input"));

$data = $dataRaw->data;

for ($x = 0; $x < count($data); $x++) {
    $object =$data[$x];
    $insert_query =  "INSERT INTO `notifications`(`user_id`, `app`, `msg_title`, `msg`, `msg_time`) VALUES ('$dataRaw->user_id','$object->package','$object->header','$object->body', date_format($object->msg_at, 'yyyy-MM-dd HH:mm:ss'))";
    $run = mysqli_query($conn,  $insert_query);
}
echo json_encode(['status'=>TRUE, 'msg'=>'Notifications saved successfully']);


?>