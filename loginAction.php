<?php



$email = $_POST['email'];
$password = $_POST['password'];



if ($email == "emad123@gmail.com" && $password == "emad12") {
    session_start();
    $_SESSION['admin'] = $email;
    echo "<script>location.href = 'admin/maindashboard.php'</script>";
} else {
    echo "<script>alert('Incorrect Email Or Password')</script>";
    echo "<script>location.href = 'login.php'</script>";
}
