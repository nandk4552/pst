<?php include "partials/_header.php"; ?>
<?php

session_start();

if (!isset($_SESSION['useremail']) || !isset($_SESSION['usertoken'])) {
  header('location:./LogIn-LogOut/login.php');
}


?>
<div class="container col-xxl-8 px-4 py-5">
  <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
    <div class="col-10 col-sm-8 col-lg-6">
      <img src="<?php echo SITEURL; ?>images/banner.png" class="d-block mx-lg-auto img-fluid w-100" alt="Bootstrap Themes" loading="lazy">
    </div>
    <div class="col-lg-6">
      <h1 class="display-6 fw-bold lh-1 mb-3">E-Transport</h1>
      <p class="lead">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p>
      <div class="d-grid gap-2 d-md-flex align-items-center justify-content-md-start">
        <a href="<?php echo SITEURL; ?>parentRegistration.php" type="button" class="btn btn-primary btn-lg px-4 me-md-2">Join Us</a>
        <!-- <button type="button" class="btn btn-outline-secondary btn-lg px-4">Default</button> -->
      </div>
    </div>
  </div>
</div>

<?php include "Driverreviews.php"; ?>

<?php include "partials/_footer.php"; ?>