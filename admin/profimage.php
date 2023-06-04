
<?php include('dashboard.php') ?>
<link rel="stylesheet" href="css/prof.css">
<?php
session_start();


$view = $_SESSION['admin'];


if (!isset($view)) {
    echo "<script>location.href = '../login.php'</script>";
}


?>

<style>
    .notification a
    {
        background: black !important;
    }

</style>
   

<main role="main" class="pt-4">

    <div>
    <ul class="gallery">
        <?php
        include 'config.php';
        // Assuming you have a database connection established
        // Fetch the first 6 images from the database
        $query = "SELECT * FROM profimage";
        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<li><img src='../$row[image]' /></li>";
        }

        // Close the database connection
        mysqli_close($conn);
        ?>
         </ul>
        </div>  
        
        <div class="more">Show more</div>
        <div class="less">Show less</div>
  
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
        $(document).ready(function () {
            $('.gallery li:lt(3)').show();
            $('.less').hide();
            var items =  9;
            var shown =  3;
            $('.more').click(function () {
                $('.less').show();
                shown = $('.gallery li:visible').length+3;
                if(shown< items) {
                $('.gallery li:lt('+shown+')').show(300);
                } else {
                $('.gallery li:lt('+items+')').show(300);
                $('.more').hide();
                }
            });
            $('.less').click(function () {
                $('.gallery li').not(':lt(3)').hide(300);
                $('.more').show();
                $('.less').hide();
            });
        });
        </script>
</main>