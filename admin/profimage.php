
<?php include('dashboard.php') ?>
<link rel="stylesheet" href="admincss/prof.css">
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
<div class="comic-content row">
  <div class="col-12 col-sm-6 col-lg-4 py-3">
    <a href="https://www.instagram.com/p/B8iwyiVHdi4/" target="_blank" class="social-content">
      <img src="https://xyzofficialweb.blob.core.windows.net/xyz-events/Green%20NKG/img/IG/15.jpg" alt="" class="social-photo"></a></div>
  <div class="col-12 col-sm-6 col-lg-4 py-3"><a href="https://www.instagram.com/p/B8QvM9wHiJh/" target="_blank" class="social-content"><img src="https://xyzofficialweb.blob.core.windows.net/xyz-events/Green%20NKG/img/IG/14.jpg" alt="" class="social-photo"></a></div><div class="col-12 col-sm-6 col-lg-4 py-3"><a href="https://www.instagram.com/p/B7-toc-ngf2/" target="_blank" class="social-content"><img src="https://xyzofficialweb.blob.core.windows.net/xyz-events/Green%20NKG/img/IG/13.jpg" alt="" class="social-photo"></a></div><div class="col-12 col-sm-6 col-lg-4 py-3"><a href="https://www.instagram.com/p/B7ssIIcnTgf/" target="_blank" class="social-content"><img src="https://xyzofficialweb.blob.core.windows.net/xyz-events/Green%20NKG/img/IG/12.jpg" alt="" class="social-photo"></a></div><div class="col-12 col-sm-6 col-lg-4 py-3"><a href="https://www.instagram.com/p/B7aV86DFrjP/" target="_blank" class="social-content"><img src="https://xyzofficialweb.blob.core.windows.net/xyz-events/Green%20NKG/img/IG/11.jpg" alt="" class="social-photo"></a></div><div class="col-12 col-sm-6 col-lg-4 py-3"><a href="https://www.instagram.com/p/B7Io8ViBNYf/" target="_blank" class="social-content"><img src="https://xyzofficialweb.blob.core.windows.net/xyz-events/Green%20NKG/img/IG/10.jpg" alt="" class="social-photo"></a></div><div class="col-12 col-sm-6 col-lg-4 py-3"><a href="https://www.instagram.com/p/B62nYcxhyQ9/" target="_blank" class="social-content"><img src="https://xyzofficialweb.blob.core.windows.net/xyz-events/Green%20NKG/img/IG/9.jpg" alt="" class="social-photo"></a></div><div class="col-12 col-sm-6 col-lg-4 py-3"><a href="https://www.instagram.com/p/B6klzyShIMw/" target="_blank" class="social-content"><img src="https://xyzofficialweb.blob.core.windows.net/xyz-events/Green%20NKG/img/IG/8.jpg" alt="" class="social-photo"></a></div><div class="col-12 col-sm-6 col-lg-4 py-3"><a href="https://www.instagram.com/p/B5uhHj-h0TM/" target="_blank" class="social-content"><img src="https://xyzofficialweb.blob.core.windows.net/xyz-events/Green%20NKG/img/IG/7.jpg" alt="" class="social-photo"></a></div><div class="col-12 col-sm-6 col-lg-4 py-3"><a href="https://www.instagram.com/p/B5KeCqohpqr/" target="_blank" class="social-content"><img src="https://xyzofficialweb.blob.core.windows.net/xyz-events/Green%20NKG/img/IG/6.jpg" alt="" class="social-photo"></a></div><div class="col-12 col-sm-6 col-lg-4 py-3"><a href="https://www.instagram.com/p/B44cflTnmYt/" target="_blank" class="social-content"><img src="https://xyzofficialweb.blob.core.windows.net/xyz-events/Green%20NKG/img/IG/5.jpg" alt="" class="social-photo"></a></div><div class="col-12 col-sm-6 col-lg-4 py-3"><a href="https://www.instagram.com/p/B4ma7lthmBp/" target="_blank" class="social-content"><img src="https://xyzofficialweb.blob.core.windows.net/xyz-events/Green%20NKG/img/IG/4.jpg" alt="" class="social-photo"></a></div><div class="col-12 col-sm-6 col-lg-4 py-3"><a href="https://www.instagram.com/p/B4UZVITBfmQ/" target="_blank" class="social-content"><img src="https://xyzofficialweb.blob.core.windows.net/xyz-events/Green%20NKG/img/IG/3.jpg" alt="" class="social-photo"></a></div><div class="col-12 col-sm-6 col-lg-4 py-3"><a href="https://www.instagram.com/p/B4CXz74Hr7m/" target="_blank" class="social-content"><img src="https://xyzofficialweb.blob.core.windows.net/xyz-events/Green%20NKG/img/IG/2.jpg" alt="" class="social-photo"></a></div><div class="col-12 col-sm-6 col-lg-4 py-3"><a href="https://www.instagram.com/p/B3wWNz0HMvx/" target="_blank" class="social-content"><img src="https://xyzofficialweb.blob.core.windows.net/xyz-events/Green%20NKG/img/IG/1.jpg" alt="" class="social-photo"></a></div></div>
<div class="more">Show more</div>
<div class="less">Show less</div>

<script>
    $(document).ready(function () {
    $('.comic-content .col-12:lt(3)').show();
    $('.less').hide();
    var items =  9;
    var shown =  3;
    $('.more').click(function () {
        $('.less').show();
        shown = $('.comic-content .col-12:visible').length+3;
        if(shown< items) {
          $('.comic-content .col-12:lt('+shown+')').show(300);
        } else {
          $('.comic-content .col-12:lt('+items+')').show(300);
          $('.more').hide();
        }
    });
    $('.less').click(function () {
        $('.comic-content .col-12').not(':lt(3)').hide(300);
        $('.more').show();
        $('.less').hide();
    });
});
</script>

</main>