<?php

include('db.php');

$d=mktime(11, 14, 54, 8, 12, 2014);
$dateview = date("Y-m-d h:i:sa", $d);

header('Access-Control-Allow-Origin:*');
header('Content-Type:application/json');
header('Access-Control-Allow-Methods:POST');
header('Access-Control-Allow-Headers:Content-Type,Access-Control-Allow-Headers,Authorization,X-Request-With');
error_reporting(0);



$data = json_decode(file_get_contents('php://input'), false);
$duplicate_device = mysqli_query($conn, "SELECT * FROM `user` WHERE device_id = '$data->device_id'");



if(mysqli_num_rows($duplicate_device) > 0){
    $datafetchquery = mysqli_query($conn, "SELECT * FROM `user` WHERE device_id = '$data->device_id'");
    $dataview = mysqli_fetch_array($datafetchquery);
    echo json_encode(['status'=>TRUE, 'msg'=>'Already Taken', 'data' =>['user_id'=>$dataview['id'],'device_id'=>$dataview['device_id'],'name'=>$dataview['name'],'email'=>$dataview['email'], 'model'=>$dataview['model'], 'manufacturer'=>$dataview['manufacturer']]]);
} else{
    $insert_query = "INSERT INTO `user`(`device_id`, `name`, `email`, `model`, `manufacturer`, `status`, `created_date`, `updated_date`) VALUES ('$data->device_id','$data->name','$data->email', '$data->model', '$data->manufacturer','$data->status','$dateview','$dateview')";
    $run = mysqli_query($conn,  $insert_query); 
    $datafetchquery = mysqli_query($conn, "SELECT * FROM `user` WHERE device_id = '$data->device_id'");
    $dataview = mysqli_fetch_array($datafetchquery);
    echo json_encode(['status'=>TRUE, 'msg'=>'Successfully Saved', 'data' =>['user_id'=>$dataview['id'],'device_id'=>$dataview['device_id'],'name'=>$dataview['name'],'email'=>$dataview['email'],   ]]);

}
  
?>