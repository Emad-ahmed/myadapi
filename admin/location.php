<?php include('dashboard.php') ?>

<?php
session_start();


$view = $_SESSION['admin'];


if (!isset($view)) {
    echo "<script>location.href = '../login.php'</script>";
}


?>

<style>
    .location a
    {
        background: black !important;
    }

</style>
   

<main role="main">


<form method="GET" action="location.php" class="mb-4 mt-4">
<div class="d-flex">
    <a href="location.php" class="btn btn-all col-3 me-5">Location</a>
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
                    <th>Longititude</th>
                    <th>Latitude</th>
                    <th>TimeStamp</th>
                    <th>Address</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'config.php';

            if(isset($_GET['id']))
            {
            $user_id = $_GET['id'];
            $sql = "SELECT * FROM user, userlocation where user.id = userlocation.user_id  AND userlocation.user_id = '$user_id'   ORDER BY userlocation.id DESC";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$row['id']}</td>";
                    echo "<td>{$row['device_id']}</td>";
                    echo "<td>{$row['long']}</td>";
                    echo "<td>{$row['lat']}</td>";
                    echo "<td>{$row['TimeStamp']}</td>";
                    echo "<td>{$row['Address']}</td>";
                    echo "</tr>";
                }
            }
            } else{
                $sql = "SELECT * FROM user, userlocation where user.id = userlocation.user_id ORDER BY userlocation.id DESC";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>{$row['id']}</td>";
                        echo "<td>{$row['device_id']}</td>";
                        echo "<td>{$row['long']}</td>";
                        echo "<td>{$row['lat']}</td>";
                        echo "<td>{$row['TimeStamp']}</td>";
                        echo "<td>{$row['Address']}</td>";
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