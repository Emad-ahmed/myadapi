<?php
session_start();

if (isset($_SESSION['admin'])) {
    session_unset();
    session_destroy();
    echo "<script>alert('Now In Logout Page')</script>";
    echo "<script>location.href = '../login.php'</script>";
} else {
    echo "<script>location.href = 'user.php'</script>";
}
