<!DOCTYPE html>
<html lang="en">
<head>
  <?php include 'php/header.php';?>
  <link rel="stylesheet" type="text/css" href="css/side_scroll.css">
</head>
<body>
  <?php include 'php/navbar_links.php';?>

  <!-- php email form -->
  <?php
  // define variables and set to empty values
  $firstNameErr = $lastNameErr = $emailErr = $subjectErr = $success = "";

  $valid = true;
  
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
     if (empty($_POST["subject"])) {
       $subjectErr = "Please select an option below";
       $valid = false;
     } else {
       $subject = test_input($_POST["subject"]);
     }

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

        $message_subject = 
          "REQUEST: " . $subject . " " . $firstName . " " . $lastName;
        $message_body = "Press/Testimony User Contribution \n" .
          "Name: " . $firstName . " " . $lastName . "\n" .
          "Email: " . $email . "\n\n" .
          "Info/Testimony : \n" . 
          $_POST["comments"];
        mail('requests@violinxia.com',$message_subject,$message_body, "From: " . $email);
        $success = "<div class=\"well text-center success\">Your message has been submitted. <br> Thank you contacting Xia!</div>";
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

<div>
  <div id="masthead">  
    <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h1>Contact Xia
              <hr>
              <p class="lead">
                Use the form below to contact Xia <br>
                If your issue is urgent, please call Xia at <br>
                <abbr title="Work Phone">Work:</abbr> (907) 789-9774 <br>
                <abbr title="Mobile Phone">Mobile:</abbr> (907) ...-.... <br>
              </p>             
            </h1>
          </div>
          <div class="col-md-5">
              <div class="well well-lg"> 
                <div class="row">
                  <div class="col-sm-6">
                    <img src="pic/New-England-Conservatory-Visit.jpg" alt="The New England Conservatory President and Xia" class="img-responsive pic-border">
                  </div>
                  <div class="col-sm-6 font-V-sm">
                    The president of the New England Conservatory visits a violin class taught by Xia in 2014.
                    <br>
                    From left to right: Guo Hua Xia,Tony Woodcock, Mrs. Woodcock, and Lorrie Heagy
                  </div>
                </div>
              </div>
          </div>
        </div> 
    </div><!--/container-->
  </div><!--/masthead-->

<div>
  <!--main-->
  <div class="container">
    <div class="row">
      <hr>
      <div class="col-md-2">
      </div>
        <div class="col-md-8 font-V">
            <div class="font-V">
            <h2>
              <?php echo $success;?>
          </h2>
          </div>
          <br>
          <p>
            Spot Xia or one of his students in the news? Have a testimony about how great Xia is? Let us know by filling out the form below.
          </p>
          
          <form role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>#contribute">
            <div class="form-group">
              <label for="formSubject">*<span class="error"> <?php echo $subjectErr;?></span></label>
              <input type="hidden" name="subject" id="btn-input"/>
              <div class="btn-group btn-group-justified" role="group" aria-label="...">
                <div class="btn-group" role="group">
                  <button id="btn-1" type="button" class="btn btn-default" name="subject" value="Lessons">
                    Lessons <br><br> 
                  </button>
                </div>
                <div class="btn-group" role="group">
                  <button id="btn-2" type="button" class="btn btn-default" name="subject" value="Event Booking">
                    Event <br> Booking
                  </button>
                </div>
                <div class="btn-group" role="group">
                  <button id="btn-3" type="button" class="btn btn-default" name="subject" value="Time Conflict">
                    Time <br> Conflict
                  </button>
                </div>
                <div class="btn-group" role="group">
                  <button id="btn-4" type="button" class="btn btn-default" name="subject" value="Other">
                    Other <br><br> 
                  </button>
                </div>
              </div>
            </div>
            <div class="form-group">
              <hr>
              <label for="formFirstName">First Name *<span class="error"> <?php echo $firstNameErr;?></span></label>
              <input type="text" name="firstName" class="form-control" id="formFirstName" placeholder="Enter First Name"/>
              <label for="formLastName">Last Name *<span class="error"> <?php echo $lastNameErr;?></span></label>
              <input type="text" name="lastName" class="form-control" id="formLastName" placeholder="Enter Last Name"/>
            </div>
            <div class="form-group">
              <label for="formEmail">Email Address *<span class="error"> <?php echo $emailErr;?></span></label>
              <input type="text" name="email" class="form-control" id="formEmail" placeholder="Enter email"/>
            </div>
            <div class="form-group">
              <hr>
              <label for="formComments">More Information/Details</label>
              <textarea type="text" name="comments" class="form-control" id="formComments" rows="7" 
                placeholder="Please enter your testimony or information about the news article (URL or newpaper/data) you found about Xia's Studio."></textarea>
            </div>
            <div>
              Fields with * are required
            </div>
            <br>
            <button type="submit" name="submit" value="Submit" class="btn btn-default">Submit</button>
          </form>
          <br>
          <hr>
          <br>
          </div><!--/right-->
        <div class="col-md-2">
        </div>
      </div><!--/row-->
  </div><!--/container-->
</div>

</div>

  <?php include 'php/footer.php'; ?>

  <!-- script references -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  <script src="js/bind-polyfill.min.js"></script>
  <script src="js/smooth-scroll.min.js"></script>
  <script src="js/scripts.js"></script>
  <script src="js/scroll-up.js"></script>
  <script src="js/hidden-input.js"></script>
  <script type="text/javascript">
    var page = "contact";
  </script>

</body>
</html>