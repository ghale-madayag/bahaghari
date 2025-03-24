<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Design System for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Tracking Page | Bahaghari</title>
  <!-- Favicon -->
  <link href="assets/img/logo.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="assets/css/argon.css?v=1.0.1" rel="stylesheet">
  <!-- Docs CSS -->
  <link type="text/css" href="assets/css/style.css" rel="stylesheet">
</head>

<body>
  <?php require_once('inc/header.php');?>
  <main>
    <div class="position-relative">
        <?php require_once("inc/track.php")?>
    </div>
    <?php 
      require_once("inc/box.php");
      require_once("inc/about.php");
      require_once("inc/services.php");
      require_once("inc/contact.php");
      require_once("inc/inquiry.php");
    ?>
  
  </main>
  <?php require_once("inc/footer.php");?>
  <!-- Core -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/popper/popper.min.js"></script>
  <script src="assets/vendor/bootstrap/bootstrap.min.js"></script>
  <script src="assets/vendor/headroom/headroom.min.js"></script>
  <!-- Argon JS -->
  <script src="assets/js/argon.js?v=1.0.1"></script>
  <script src="assets/js/function.js"></script>
  <div id="fb-root"></div>
    <script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    <form name="aspnetForm" method="post" action="./ContactUs_v2.aspx?menu=1&amp;skin=2&amp;p=mCUv" id="aspnetForm">
</body>

</html>