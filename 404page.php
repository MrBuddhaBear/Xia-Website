<!DOCTYPE html>
<html lang="en">
<head>
  <?php include 'php/header.php';?>
</head>
<body>
<?php include 'php/navbar_links.php';?>

<div id="error" class="error-page">
  <div class="container">  
    <div class="row">
      <div class='col-md-5 text-center'>
        <br><br><br>
        <div class="font-V-large">
          <i class="fa fa-exclamation-triangle fa-5x"></i>
        </div>
        <br>
        <hr>
        <h1>
          Uhh Ohh!
        </h1>
      </div>
      <div class="col-md-7 text-center">
        <br><br><br>
        <h1>
          Opps, the page you are looking for can't be found.
        </h1>
        <br>
        <h2>
          Did you type in the URL correctly? Try using the navigation bar above. Or click one of the links below.
        </h2>
      </div>
    </div> 
  </div>
</div>


  <?php include 'php/footer-no-up.php'; ?>

	<!-- script references -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  <script src="js/bind-polyfill.min.js"></script>
  <script src="js/smooth-scroll.min.js"></script>
  <script src="js/scripts.js"></script>
</body>
</html>