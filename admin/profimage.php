<?php include('dashboard.php') ?>

<?php
session_start();


$view = $_SESSION['admin'];


if (!isset($view)) {
    echo "<script>location.href = '../login.php'</script>";
}


?>

<style>
    .profimager
    {
        width:200px;
        height:200px;
    }
    #myTable
    {
       
        width:80%;
        text-align:center;
    }
    .profileimage a{
        background: black !important;
    }
</style>



    
  

<main role="main">
<form method="GET" action="profimage.php" class="mb-4 mt-4 ">
<div class="d-flex">
    <a href="profimage.php" class="btn btn-all col-3 me-5">Profile Image</a>
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
                    <th>Image</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'config.php';

            if(isset($_GET['id']))
            {
            $user_id = $_GET['id'];
            $sql = "SELECT * FROM user, profimage where user.id = profimage.user_id AND profimage.user_id = '$user_id' ORDER BY profimage.id DESC";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$row['id']}</td>";
                    echo "<td>{$row['device_id']}</td>";
                    echo "<td><img src='../$row[image]' class='profimager'></td> ";
                    
                    echo "</tr>";
                }
            }
            } else{
                $sql = "SELECT * FROM user, profimage where user.id = profimage.user_id ORDER BY profimage.id DESC";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>{$row['id']}</td>";
                        echo "<td>{$row['device_id']}</td>";
                        echo "<td><img src='../$row[image]'></td> ";
                       
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