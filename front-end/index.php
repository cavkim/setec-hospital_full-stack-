
<?php
  require_once("database/db_config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Index - Medilab Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Sytle Star -->

   <!-- Sytle End -->
</head>

<body class="index-page">
  <!-- Header Start -->
  <?php 
   require ("layouts/headers.php")
   ?>
  <!-- Header End -->
  <main class="main">
    <!-- Hero End -->
   <?php 
        require ("layouts/main.php")
   ?>
    <!-- /Contact Section -->
  </main>
  <!-- Footer Start -->
     <?php 
   require ("layouts/footer.php")
   ?>
   <!-- Footer End -->

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Script -->
    <?php require ("layouts/scriptfiles.php")?>

</body>

</html>