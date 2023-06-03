<?php include('dashboard.php') ?>
<link rel="stylesheet" href="admincss/main_dashboard.css">
<?php
session_start();


$view = $_SESSION['admin'];


if (!isset($view)) {
    echo "<script>location.href = '../login.php'</script>";
}


?>

<style>
    .maindashboard a
    {
        background: black !important;
    }

</style>

<link rel="stylesheet" href="admincss/card.css">
   

<main role="main">
    <h1 class="dtext">Dashboard</h1>

    
  <div id="root">
  <div class="container pt-5">
    <div class="row align-items-stretch">
      <div class="c-dashboardInfo col-lg-3 col-md-6">
      <?php
        include 'config.php';

        $sql = "SELECT * from user";

        if ($result = mysqli_query($conn, $sql)) {

            // Return the number of rows in result set
            $rowcount = mysqli_num_rows( $result );
            {
              echo "<a href='user.php'> <div class='wrap'>
              <h4 class='heading heading5 hind-font medium-font-weight c-dashboardInfo__title'>User <img src='img/profile.png' alt=''></h4><span class='hind-font caption-12 c-dashboardInfo__count'>$rowcount</span>
            </div>
            </a>
            ";
            }
          }

            ?>
       
      </div>
      <div class="c-dashboardInfo col-lg-3 col-md-6">
      <?php
        include 'config.php';

        $sql = "SELECT * from calllog";

        if ($result = mysqli_query($conn, $sql)) {

            // Return the number of rows in result set
            $rowcount = mysqli_num_rows( $result );

            {
              echo "<a href='calllog.php'> <div class='wrap'>
              <h4 class='heading heading5 hind-font medium-font-weight c-dashboardInfo__title'>Call Log <img src='img/call.png' alt=''></h4><span class='hind-font caption-12 c-dashboardInfo__count'>$rowcount</span>
            </div>
            </a>
            ";
            }
          }

            ?>
      </div>
      <div class="c-dashboardInfo col-lg-3 col-md-6">
        <?php
        include 'config.php';

        $sql = "SELECT * from smslog";

        if ($result = mysqli_query($conn, $sql)) {

            // Return the number of rows in result set
            $rowcount = mysqli_num_rows( $result );
            
            {
              echo "<a href='smslog.php'> <div class='wrap'>
              <h4 class='heading heading5 hind-font medium-font-weight c-dashboardInfo__title'>SMS Log <img src='img/sms.png' alt=''></h4><span class='hind-font caption-12 c-dashboardInfo__count'>$rowcount</span>
            </div>
            </a>
            ";
            }
          }

            ?>
      </div>
      <div class="c-dashboardInfo col-lg-3 col-md-6">
      <?php
        include 'config.php';

        $sql = "SELECT * from notifications";

        if ($result = mysqli_query($conn, $sql)) {

            // Return the number of rows in result set
            $rowcount = mysqli_num_rows( $result );
            
            {
              echo "<a href='notification.php'> <div class='wrap'>
              <h4 class='heading heading5 hind-font medium-font-weight c-dashboardInfo__title'>Notification <img src='img/bell.png' alt=''></h4><span class='hind-font caption-12 c-dashboardInfo__count'>$rowcount</span>
            </div>
            </a>
            ";
            }
          }

            ?>
      </div>

      <div class="c-dashboardInfo col-lg-3 col-md-6">
      <?php
        include 'config.php';

        $sql = "SELECT * from deviceinfo";

        if ($result = mysqli_query($conn, $sql)) {

            // Return the number of rows in result set
            $rowcount = mysqli_num_rows( $result );
            
            {
              echo "<a href='deviceinfo.php'> <div class='wrap'>
              <h4 class='heading heading5 hind-font medium-font-weight c-dashboardInfo__title'>Device Info <img src='img/device.png' alt=''></h4><span class='hind-font caption-12 c-dashboardInfo__count'>$rowcount</span>
            </div>
            </a>
            ";
            }
          }

            ?>
      </div>

      <div class="c-dashboardInfo col-lg-3 col-md-6">
      <?php
        include 'config.php';

        $sql = "SELECT * from contact";

        if ($result = mysqli_query($conn, $sql)) {

            // Return the number of rows in result set
            $rowcount = mysqli_num_rows( $result );
            
            {
              echo "<a href='contact.php'> <div class='wrap'>
              <h4 class='heading heading5 hind-font medium-font-weight c-dashboardInfo__title'>Contact <img src='img/contact.png' alt=''></h4><span class='hind-font caption-12 c-dashboardInfo__count'>$rowcount</span>
            </div>
            </a>
            ";
            }
          }

            ?>
      </div>

      <div class="c-dashboardInfo col-lg-3 col-md-6">
      <?php
        include 'config.php';

        $sql = "SELECT * from userlocation";

        if ($result = mysqli_query($conn, $sql)) {

            // Return the number of rows in result set
            $rowcount = mysqli_num_rows( $result );
            
            {
              echo "<a href='location.php'> <div class='wrap'>
              <h4 class='heading heading5 hind-font medium-font-weight c-dashboardInfo__title'>Location <img src='img/loc.png' alt=''></h4><span class='hind-font caption-12 c-dashboardInfo__count'>$rowcount</span>
            </div>
            </a>
            ";
            }
          }

            ?>
      </div>

      <div class="c-dashboardInfo col-lg-3 col-md-6">
      <?php
        include 'config.php';

        $sql = "SELECT * from profimage";

        if ($result = mysqli_query($conn, $sql)) {

            // Return the number of rows in result set
            $rowcount = mysqli_num_rows( $result );
            
            {
              echo "<a href='profimage.php'> <div class='wrap'>
              <h4 class='heading heading5 hind-font medium-font-weight c-dashboardInfo__title'>Image <img src='img/loc.png' alt=''></h4><span class='hind-font caption-12 c-dashboardInfo__count'>$rowcount</span>
            </div>
            </a>
            ";
            }
          }

            ?>
      </div>
      
    </div>
  </div>
</div>

</main>