<?php


include 'config.php';

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM user, smslog where user.id = smslog.user_id AND user_id = '$id' ORDER BY user.id DESC");


$output = "";

if(mysqli_num_rows($result) > 0 )
{
   

                while($row=mysqli_fetch_assoc($result))
                {
                    $output .= "
                    <div class='d-flex'>
                        <div>
                           <img src='img/profile.png' alt=''> 
                        </div>
                        <div>
                           
                                <h2>{$row["from_sms"]}</h2>
                           
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