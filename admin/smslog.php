<?php include('dashboard.php') ?>

<?php
session_start();


$view = $_SESSION['admin'];


if (!isset($view)) {
    echo "<script>location.href = '../login.php'</script>";
}

if (isset($_GET['id'])) {
    $clickedCardId = $_GET['id'];

}


?>

<style>
    .smslog a
    {
        background: black !important;
    }
    .col-lg-3
    {
        height:35rem !important;
        overflow : auto !important;
    }

    .col-lg-8
    {
        height:35rem !important;
        overflow : auto !important;
    }

</style>
   
<main role="main">
<!-- <form method="GET" action="smslog.php" class="mb-4 mt-4">

<div class="d-flex">
    <a href="smslog.php" class="btn btn-all col-3 me-5">SMS Log</a>
<select class="form-select" aria-label="Default select example" name="id" id="category" onchange="navigateToLink(this)">
   
    <?php
        include 'config.php';
        $alldata = mysqli_query($conn, "SELECT * FROM `user`");

        while ($row = mysqli_fetch_array($alldata)) {
                echo "<option value='$row[id]'>$row[device_id]</option>";
        }
    ?>
</select>


<button type="submit" class="btn btn-info me-4 ms-3">Search</button>
</div>

</form>


<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                    <th>Sno.</th>
                    <th>Device Id</th>
                    <th>From Sms</th>
                    <th>Body</th>
                    <th>Time Date</th>
                    <th>Send time</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'config.php';

            if(isset($_GET['id']))
            {
            $user_id = $_GET['id'];
            $sql = "SELECT * FROM user, smslog where user.id = smslog.user_id AND smslog.user_id = '$user_id' ORDER BY user.id DESC";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$row['id']}</td>";
                    echo "<td>{$row['device_id']}</td>";
                    echo "<td>{$row['from_sms']} {$row['name']}</td> ";
                    echo "<td>{$row['body']}</td>";
                    echo "<td>{$row['time_date']}</td>";
                    echo "<td>{$row['send_time']}</td>"; 
                    echo "</tr>";
                }
            }
            } else{
                $sql = "SELECT * FROM user, smslog where user.id = smslog.user_id ORDER BY user.id DESC";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>{$row['id']}</td>";
                        echo "<td>{$row['device_id']}</td>";
                        echo "<td>{$row['from_sms']} {$row['name']}</td> ";
                        echo "<td>{$row['body']}</td>";
                        echo "<td>{$row['time_date']}</td>";
                        echo "<td>{$row['send_time']}</td>"; 
                        echo "</tr>";
                    }
                }
            }

            // Close the database connection
            $conn->close();
            ?>
        </tbody>
    </table> -->


    <div class="row pt-5">
    <div class="col-lg-3">
    <?php
    include 'config.php';
    $sql = "SELECT * FROM user  ORDER BY id DESC";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "
                <div class='card mysms mb-2' data-id ='{$row["id"]}' id='$row[name]' style='width: 100%;' id='myCard'>
                    <div class='card-body'>
                        <h5 class='card-title mb-3'>$row[name]</h5>
                        <h6 class='card-subtitle mb-2 text-body-secondary'>$row[device_id]</h6>
                        <p class='card-text'></p>
                    </div>
                </div>
            ";
        }
    }
    ?>
</div>

        <div class="col-lg-8">
        <div class="col-12"> 
                <div id="showdata">
                </div>

                <div id="mydata">
                    <?php
                        include 'config.php';
                        $sql = "SELECT * FROM user, smslog where user.id = smslog.user_id  ORDER BY user.id DESC";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                        while($row=mysqli_fetch_assoc($result))
                        {
                            $inputTime = $row["send_time"];
                            $convertedTime = date('M j, Y g:i A', strtotime($inputTime));
                            echo "
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
                    }
                    ?>
                </div>
        </div>


        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>

    $(document).ready(function() {
  // Add click event listener to anchor tags with class 'mysms'
    $(document).on("click", ".mysms", function() {
    var student_id = $(this).data("id");
    $("#mydata").css("display", "none");
    var clickedCard = $(this); // Store the clicked card element
    
    $.ajax({
      type: "GET",
      url: "showsmslog.php",
      data: { id: student_id },
      success: function(data) {
        $("#showdata").html(data);
        $(".mysms").css("background-color", ""); // Reset background color of all cards
        clickedCard.css("background-color", "#55C2DA");
        clickedCard.css("color", "white !important"); // Set background color of the clicked card
      },
      error: function() {
        console.log("Error occurred during AJAX request");
      }
    });
  });
});
</script>


    
        <script src="js/datatable.min.js"></script>

</main>