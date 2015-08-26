<!DOCTYPE html>
<html lang="en">
<head>
  <?php include 'php/header.php';?>
</head>
<body>
  <?php include 'php/navbar_links.php';?>

  <!-- php email form -->
  <?php
  // define variables and set to empty values
  $firstNameErr = $lastNameErr = $emailErr = $success = "";

  $valid = true;
  
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
     if (empty($_POST["firstName"])) {
       $firstNameErr = "First Name is required";
       $valid = false;
     } else {
       $firstName = test_input($_POST["firstName"]);
       // check if name only contains letters and whitespace
       if (!preg_match("/^[a-zA-Z ]*$/",$firstName)) {
         $firstNameErr = "Only letters and white space allowed"; 
         $valid = false;
       }
     }

      if (empty($_POST["lastName"])) {
       $lastNameErr = "Last Name is required";
       $valid = false;
     } else {
       $lastName = test_input($_POST["lastName"]);
       // check if name only contains letters and whitespace
       if (!preg_match("/^[a-zA-Z ]*$/",$lastName)) {
         $lastNameErr = "Only letters and white space allowed"; 
         $valid = false;
       }
     }

     if (empty($_POST["email"])) {
       $emailErr = "Email is required";
       $valid = false;
     } else {
       $email = test_input($_POST["email"]);
       // check if e-mail address is well-formed
       if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
         $emailErr = "Invalid email format"; 
         $valid = false;
       }
     }

     if ($valid) {

        $message = "Website Request \n" .
          "Name: " . $firstName . " " . $lastName . "\n" .
          "Email: " . $email . "\n\n" .
          "Description : \n" . 
          $_POST["comments"];
        mail('requests@violinxia.com;webmaster@violinxia.com;zheng_colin@yahoo.com',"WEBMASTER: Form Submission",$message, "From: " . $email);
        $success = "<div class=\"well text-center success\">Your input has been submitted. <br> Thank you for your help!</div>";
     }

     // header("Location:press.php#contribute");
  }
  
  function test_input($data) {
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     return $data;
  }
  ?>

<div class="wheader alt vert-header">
  <div class="container vert">
    <h1 class="white">
        Tell Us What You Think!
    </h1>
    <p class="white font-V-large">
      See an error? Find something that doesn't work? Contact us using the form below.
    </p>
    <br><br><br><br><br><br><br>
    <div>&nbsp;</div>
    <a data-scroll href="#contact" class="btn btn-default btn-lg">Contact Webmaster</a>
    <div>&nbsp;</div>
  </div>
</div>

<div class="blurb">
  <div class="container"> 
    <div class="row">
      <div class='col-md-3 col-md-offset-1 face-container text-center font-V'>
        <img src='pic/colin.jpg' alt="Colin Zheng" class="img-circle grayscalem face"/>
        <br>
        <br>
        <hr>
        <br>
        Colin Zheng
        <br>
        Web Developer
      </div>
      <div class="col-md-7">
        <h1 id="website-info">About This Website...</h1>
        <div>&nbsp;</div>
        <p class="font-V-large">
          Big thanks goes out to <a href="https://www.linkedin.com/pub/pauline-zheng/65/5a3/237">Pauline Zheng</a> for content curation and design help.
          <br><br>
            The libraries/frameworks used:
          <ul class="font-V">
          <br>
            <li>
              Twitter Bootstrap (v3.2.0) - <a src='http://getbootstrap.com/'>getbootstrap.com/</a>
              <br>
              (MIT License)
            </li>
            <br>
            <li>
              JQuery (v2.0.2) - <a src='https://jquery.com/'>jquery.com/</a>
              <br>
              (MIT License)
            </li>
            <br>
            <li>
              Font Awesome (v4.2.0) - <a src='http://fortawesome.github.io/Font-Awesome/'>fortawesome.github.io/Font-Awesome/</a>
              <br>
              Fonts - (SIL OFL 1.1)<br>
              CSS - (MIT License)
            </li>
            <br>
            <li>
              Google Maps API (v3) - <a href="https://developers.google.com/maps/?hl=en">developers.google.com/maps</a>
              <br>
              <a href="https://developers.google.com/maps/terms">developers.google.com/maps/terms</a>
            </li>
            <br>
            <li>
              Smooth-Scroll (v5.1.2) - <a href="http://github.com/cferdinandi/smooth-scroll">github.com/cferdinandi/smooth-scroll</a>
              <br>
              (MIT License)
            </li>
          </ul>

        </p>
      </div>
    </div>
    <br>
    <br>
    <hr>
    <br>
    <br>
    <div class="row">
      <div class="col-md-8 col-md-offset-2 font-V">
        <h1 id="contact" class="text-center">
          Let Us Know!
        </h1>
        <br>
        <p class="text-center">
          Tell us about issues with this website.
          <br>
          Use the form below to contact us about anything from spelling errors to photo credits to broken links. 
          <br>
          Thanks for your help!
        </p>
        <form role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>#contribute">
          <div class="form-group">
            <label for="formFirstName">First Name *<span class="error"> <?php echo $firstNameErr;?></span></label>
            <input type="text" name="firstName" class="form-control" id="formFirstName" placeholder="Enter First Name">
            <label for="formLastName">Last Name *<span class="error"> <?php echo $lastNameErr;?></span></label>
            <input type="text" name="lastName" class="form-control" id="formLastName" placeholder="Enter Last Name">
          </div>
          <div class="form-group">
            <label for="formEmail">Email Address *<span class="error"> <?php echo $emailErr;?></span></label>
            <input type="text" name="email" class="form-control" id="formEmail" placeholder="Enter email">
          </div>
          <div class="form-group">
            <hr>
            <label for="formComments">More Information</label>
            <textarea type="text" name="comments" class="form-control" id="formComments" rows="7" 
              placeholder="Please tell us a little about the issue(s) that you have found."></textarea>
          </div>
          <div>
            Fields with * are required
          </div>
          <br>
          <button type="submit" name="submit" value="Submit" class="btn btn-default">Submit</button>
        </form>
      </div>
    </div>   
  </div>
</div>

<!-- email form -->


  <?php include 'php/footer.php'; ?>

	<!-- script references -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  <script src="js/bind-polyfill.min.js"></script>
  <script src="js/smooth-scroll.min.js"></script>
  <script src="js/scripts.js"></script>
  <script src="js/scroll-up.js"></script>
</body>
</html>