


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>Api</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="admincss/main.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">

</head>
<body>

<header role="banner">
  <h1>Admin Panel</h1>
  <ul class="utilities">
    <br>
    <li class="logout warn"><a href="logout.php">Log Out</a></li>
  </ul>
</header>

<nav role='navigation'>
  <ul class="main">
    <li class="maindashboard"><a href="maindashboard.php"><img src="img/dashboard.png" alt="" class="me-3">Dashboard</a></li>
    <li class="dashboard"><a href="user.php"><img src="img/profile.png" alt="" class="me-3">User</a></li>
    <li class="calllog"><a href="calllog.php"><img src="img/call.png" alt="" class="me-3">Call Log</a></li>
    <li class="smslog"><a href="smslog.php"><img src="img/sms.png" alt="" class="me-3">Sms Log</a></li>
    <li class="location"><a href="location.php"><img src="img/loc.png" alt="" class="me-3">Location</a></li>
    <li class="contact"><a href="contact.php"><img src="img/contact.png" alt="" class="me-3">Contact</a></li>
    <li class="profileimage"><a href="profimage.php"><img src="img/image.png" alt="" class="me-3">Profile Image</a></li>
    <li class="deviceinfo"><a href="deviceinfo.php"><img src="img/device.png" alt="" class="me-3">Device Info</a></li>
    <li class="notification"><a href="notification.php"><img src="img/bell.png" alt="" class="me-3">Notification</a></li>

  </ul>
</nav>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script>
        


        $(document).ready(function() {
          $('#example').DataTable({
              "order": [[0, "desc"]]
           });
           
        });
        
        
    </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
