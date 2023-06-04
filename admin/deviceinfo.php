<?php include('dashboard.php') ?>

<?php
session_start();


$view = $_SESSION['admin'];


if (!isset($view)) {
    echo "<script>location.href = '../login.php'</script>";
}




?>

<style>
    .deviceinfo a
    {
        background: black !important;
    }

</style>
   

<main role="main" class="pt-4">

<form method="GET" action="deviceinfo.php" class="mb-4 mt-4">

<div class="d-flex">
    <a href="deviceinfo.php" class="btn btn-all col-3 me-5">Device Info</a>
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
                    <th>Deivice Id</th>
                    <th>Version</th>
                    <th>Imei</th>
                    <th>Battery</th>
                    <th>Cell Data</th>
                    <th>Wifi Data</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'config.php';

            if(isset($_GET['id']))
            {
            $user_id = $_GET['id'];
            $sql = "SELECT * FROM user, deviceinfo where user.id = deviceinfo.user_id AND deviceinfo.user_id = '$user_id'  ORDER BY deviceinfo.id DESC";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$row['id']}</td>";
                    echo "<td>{$row['device_id']}</td>";
                    echo "<td>{$row['version']}</td>";
                    echo "<td>{$row['imei']}</td>";
                    echo "<td>{$row['battery']}</td>";
                    echo "<td>{$row['cell_data']}</td>";
                    echo "<td>{$row['wifi_data']}</td>";
                    
                    echo "</tr>";
                }
            }
            } else{
                $sql = "SELECT * FROM user, deviceinfo where user.id = deviceinfo.user_id ORDER BY deviceinfo.id DESC";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>{$row['id']}</td>";
                        echo "<td>{$row['device_id']}</td>";
                        echo "<td>{$row['version']}</td>";
                        echo "<td>{$row['imei']}</td>";
                        echo "<td>{$row['battery']}</td>";
                        echo "<td>{$row['cell_data']}</td>";
                        echo "<td>{$row['wifi_data']}</td>";
                        echo "</tr>";
                    }
                }
            }

            // Close the database connection
            $conn->close();
            ?>
        </tbody>
    </table>
    

      


       

</main>

