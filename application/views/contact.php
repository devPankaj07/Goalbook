<!DOCTYPE html>
<html lang="en">
<?php include_once('head.php')?>

<?php include_once('header.php')?>


<section class="breadcrumbs_common bg_img pos_relative">
<div class="overlay-innerpage"></div>
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="breadcrumbs_content align_row_spacebetween">
<ol class="breadcrumb">
<li><a href="#">Home</a></li>
<li class="active"><a href="#">Contact Us</a></li>
</ol>
<h2 class="color_ff">Contact Us</h2>
</div>
</div>
</div>
</div>
</section>

<div id="our-partner" class="padding white contact-form-area mt-4">
<div class="container mt-4">
<div class="row">
<div class="col-lg-7">
<h4 class="contact-title">send your massage</h4>
<form id="contact-form" action="mail.php" method="post">
<div class="row">
<div class="col-lg-6">
<input name="name" placeholder="name" type="text">
</div>
<div class="col-lg-6">
<input name="email" placeholder="Email" type="email">
</div>
<div class="col-lg-12">
<textarea name="message" cols="30" rows="10" placeholder="Message"></textarea>
<button type="submit" class="button-default" style="background-color: #643094;">SUBMIT</button>
</div>
</div>
</form>
<p class="form-messege"></p>
</div>
<div class="col-lg-4">
<h4 class="contact-title">contact info</h4>
<div class="contact-text">
<p><span class="c-icon"><i class="zmdi zmdi-phone"></i></span><span class="c-text"><a href="tel:1234567890">+91 7447725992</a></span></p>
<p><span class="c-icon"><i class="zmdi zmdi-email"></i></span><span class="c-text">manved@gmail.com</span></p>
<p><span class="c-icon"><i class="zmdi zmdi-pin"></i></span><span class="c-text"><a href="https://goo.gl/maps/NYWxQirzrTq1fryi9">
company address - <br> Navi Mumbai - 400709</a> </span></p>
</div>
<h4 class="contact-title">social media</h4>
<div class="link-social">
<a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
<a href="#" class="google"><i class="fa fa-google-plus"></i></a>
<a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
<a href="#" class="pinterest"><i class="fa fa-pinterest"></i></a>
<a href="#" class="blog"><i class="fa fa-rss"></i></a>
<a href="#" class="dribbble"><i class="fa fa-dribbble"></i></a>
</div>
</div>
</div>
</div>
</div>





<?php include_once('footer.php')?>


<?php include_once('foot.php')?>

</body>
</html>
