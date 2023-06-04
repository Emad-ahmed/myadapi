<?php

include('db.php');






$image = $_FILES['image'];
$user_id = $_POST['user_id'];
$imageLocation = $image['tmp_name'];
$imageName = $image['name'];


for ($x = 0; $x < sizeof($imageName); $x++) {
    $imageLocation = $image['tmp_name'][$x];
    $imageDes = 'images/'.$imageName[$x];
    move_uploaded_file($imageLocation, $imageDes);

    $insert_query =  "INSERT INTO `profimage`(`user_id`, `image`) VALUES ('$user_id','$imageDes')";
    $run = mysqli_query($conn,  $insert_query);
}

echo json_encode(['status'=>TRUE, 'msg'=>'Image  Added Successfully']);


?>