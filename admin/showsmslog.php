<?php


include 'config.php';

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM user, smslog where user.id = smslog.user_id AND user_id = '$id' ORDER BY user.id DESC");


$output = "";

if(mysqli_num_rows($result) > 0 )
{
   

                while($row=mysqli_fetch_assoc($result))
                {
                    $inputTime = $row["send_time"];
                    $convertedTime = date('M j, Y g:i A', strtotime($inputTime));
                    $output .= "

                        <div class='formsms p-3 d-flex mb-4'>
                        <div class='imgshow'>
                           <img src='img/profile2.png' alt=''> 
                        </div>

                        <div class='myconvert'>
                            <h4>{$row["from_sms"]}</h2>
                            <p>{$row["body"]}</p>
                            
                            <p class='convertform'>$convertedTime</p>
                          
                        </div>
                        </div>
                    ";
                }
       

       mysqli_close($conn);

       echo $output;

} else{
    echo "No Record Found";
}



?>