<?php include('dashboard.php') ?>

<?php
session_start();


$view = $_SESSION['admin'];


if (!isset($view)) {
    echo "<script>location.href = '../login.php'</script>";
}


?>

<style>
   
    .calllog a
    {
        background: black !important;
    }
    th{
        text-align:center;
    }

</style>




<main role="main" class="pt-3">


<form method="GET" action="calllog.php" class="mb-4 mt-4">

<div class="d-flex">
    <a href="calllog.php" class="btn btn-all col-3 me-5">Call Log</a>
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
                    <th>From Call</th>
                    <th>Time Date</th>
                    <th>Call Duration</th>
                    <th>Call Type</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'config.php';

            if(isset($_GET['id']))
            {
            $user_id = $_GET['id'];
            $sql = "SELECT * FROM user, calllog where user.id = calllog.user_id AND calllog.user_id = '$user_id'  ORDER BY calllog.id DESC";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $inputTime = $row["time_date"];
                    $convertedTime = date('M j, Y g:i A', strtotime($inputTime));
                    echo "<tr>";
                    echo "<td>{$row['id']}</td>";
                    echo "<td>{$row['device_id']}</td>";
                    echo "<td>{$row['from_call']} {$row['name']}</td> ";
                    echo "<td>$convertedTime</td>";
                    echo "<td>{$row['call_duration']}</td>";
                    echo "<td>{$row['call_type']}</td>"; 
                    echo "</tr>";
                }
            }
            } else{
                $sql = "SELECT * FROM user, calllog where user.id = calllog.user_id ORDER BY calllog.id DESC";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $inputTime = $row["time_date"];
                        $convertedTime = date('M j, Y g:i A', strtotime($inputTime));
                        $seconds = $row['call_duration'];
                        $minutes = $seconds / 60;
                        $minutes = number_format($minutes, 2);
                        echo "<tr>";
                        echo "<td>{$row['id']}</td>";
                        echo "<td>{$row['device_id']}</td>";
                        echo "<td>{$row['from_call']} {$row['name']}</td> ";
                        echo "<td>$convertedTime</td>";
                        echo "<td>$minutes min</td>";
                        echo "<td>{$row['call_type']}</td>"; 
                        echo "</tr>";
                    }
                }
            }

            // Close the database connection
            $conn->close();
            ?>
        </tbody>
    </table>

        <script src="js/datatable.min.js"></script>


        

</main>
