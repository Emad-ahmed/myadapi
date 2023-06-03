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
            echo "<a href='catsmslog.php?id=$row[id]' id='myLink' onclick='changeCardColor(\"$row[name]\")'>
                <div class='card mb-2' id='$row[name]' style='width: 100%;'>
                    <div class='card-body'>
                        <h5 class='card-title mb-3'>$row[name]</h5>
                        <h6 class='card-subtitle mb-2 text-body-secondary'>$row[device_id]</h6>
                        <p class='card-text'></p>
                    </div>
                </div>
            </a>";
        }
    }
    ?>
</div>

        <div class="col-lg-7">

        </div>
    </div>

    
        <script src="js/datatable.min.js"></script>

</main>