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
    $wifi = ($dataRaw->wifiData)?1:0;
    $cell = ($dataRaw->cellData)?1:0;
    $insert_query =  "INSERT INTO `deviceinfo`(`user_id`, `version`, `imei`, `battery`, `cell_data`, `wifi_data`) VALUES ('$dataRaw->user_id','$dataRaw->app_version','$dataRaw->imei','$object->battery', '$cell', '$wifi')";
    $run = mysqli_query($conn,  $insert_query);
}
echo json_encode(['status'=>TRUE, 'msg'=>'DeviceInfo saved successfully']);


?>