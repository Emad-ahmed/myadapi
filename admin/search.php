<?php include('dashboard.php') ?>

<?php
session_start();


$view = $_SESSION['admin'];


if (!isset($view)) {
    echo "<script>location.href = '../login.php'</script>";
}


?>

<style>
    .smslog a
    {
        background: black !important;
    }

</style>
   

<main role="main">
<h2>View Sms Log</h2>
<table data-replace="jtable" id="example" aria-label="JS Datatable" data-locale="en" data-search="true">
            <thead>
                <tr>
                <th>Sno.</th>
                    <th>User Id</th>
                    <th>From Sms</th>
                    <th>Body</th>
                    <th>Time Date</th>
                    <th>Send time</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <?php
                    include 'config.php';
                    $alldata = mysqli_query($conn, "SELECT * FROM user, smslog where user.id = smslog.user_id ORDER BY user.id DESC");

                    while ($row = mysqli_fetch_array($alldata)) {
                        echo "<tr>
                        <td>$row[id]</td>
                        <td>$row[user_id]</td>
                        <td>$row[from_sms] $row[name]</td>
                        <td>$row[body]</td>
                        <td>$row[time_date]</td>
                        <td>$row[send_time]</td>
                        </tr>";
                    }
                ?>
                </tr>
            </tbody>
        </table>
      

</main>