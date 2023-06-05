<?php include('dashboard.php') ?>

<?php
session_start();


$view = $_SESSION['admin'];


if (!isset($view)) {
    echo "<script>location.href = '../login.php'</script>";
}


?>

<style>
    .contact a
    {
        background: black !important;
    }

</style>

<main role="main" class="pt-4">
<!--    
<form method="GET" action="contact.php" class="mb-4 mt-4">

<div class="d-flex">
    <a href="contact.php" class="btn btn-all col-3 me-5">Contact</a>
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
                    <th>Name</th>
                    <th>Number</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'config.php';

            if(isset($_GET['id']))
            {
            $user_id = $_GET['id'];
            $sql = "SELECT * FROM user, contact where user.id = contact.user_id AND contact.user_id = '$user_id'  ORDER BY contact.id DESC";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$row['id']}</td>";
                    echo "<td>{$row['device_id']}</td>";
                    echo "<td>{$row['name']}</td>";
                    echo "<td>{$row['number']}</td>";
                    echo "</tr>";
                }
            }
            } else{
                $sql = "SELECT * FROM user, contact where user.id = contact.user_id ORDER BY contact.id DESC";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>{$row['id']}</td>";
                        echo "<td>{$row['device_id']}</td>";
                        echo "<td>{$row['name']}</td>";
                        echo "<td>{$row['number']}</td>";
                       
                        echo "</tr>";
                    }
                }
            }

            // Close the database connection
            $conn->close();
            ?>
        </tbody>
    </table> -->

    <a href="contact.php" class='showms mt-5' id="showsms">Show All Sms</a>
    <div class="row pt-5">
    
    <div class="col-lg-3">
        
    <?php
    include 'config.php';
    $sql = "SELECT * FROM user  ORDER BY id DESC";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "
                <div class='card mysms mb-2 mt-3' data-id ='{$row["id"]}' id='$row[name]' style='width: 100%;' id='myCard'>
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

        <div class="col-lg-9">
        <div class="col-12"> 
                <div id="showdata">
                </div>

                <div id="mydata">
                    <?php
                        include 'config.php';
                        $sql = "SELECT * FROM user, contact where user.id = contact.user_id  ORDER BY user.id DESC";
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
                                    <h4>{$row["number"]}</h2>
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
    $(".showms").css('background-color', 'white');
    $(".showms").css('border', '1px solid #145B75');
    $(".showms").css('color', '#145B75');
    $.ajax({
      type: "GET",
      url: "showcontact.php",
      data: { id: student_id },
      success: function(data) {
        $("#showdata").html(data);
        $(".mysms").css("background-color", ""); // Reset background color of all cards
        clickedCard.css("background-color", "#55C2DA");
        clickedCard.css("color", "white !important"); // Set background color of the clicked card
        $(".showsms").css('background-color', 'red !important');
        window.scrollTo(0, 0);
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