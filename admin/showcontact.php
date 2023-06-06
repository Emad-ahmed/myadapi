<?php


include 'config.php';

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM user, contact where user.id = contact.user_id AND user_id = '$id' ORDER BY user.id DESC");


$output = "";

if(mysqli_num_rows($result) > 0 )
{
   

                while($row=mysqli_fetch_assoc($result))
                {
                    
                    $output .= "
                        <div class='formsms p-3 mb-4'>
                        <div class='imgshow'>
                           <img src='img/profile2.png' alt=''> 
                           <h2>{$row["name"]}</h2>
                        </div>

                        <div class='myconvert'>
                            <h4>{$row["number"]}</h2>
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