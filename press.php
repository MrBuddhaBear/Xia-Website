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

        $message = "Press/Testimony User Contribution \n" .
          "Name: " . $firstName . " " . $lastName . "\n" .
          "Email: " . $email . "\n\n" .
          "Info/Testimony : \n" . 
          $_POST["comments"];
        mail("zheng_colin@yahoo.com","User Press/Testimony Contribution",$message,"From: " . $email);
        $success = "Your input has been submitted. \n Thank you for your contribution!";
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
            <h1>Press and Testimonies
              <hr>
              <p class="lead">
                Find Xia and his students in the news <br>
                Read testimonies from parents and students
              </p>             
            </h1>
          </div>
          <div class="col-md-5">
              <div class="well well-lg"> 
                <div class="row">
                  <div class="col-sm-6">
                    <img src="pic/press.jpg" class="img-responsive pic-border">
                  </div>
                  <div class="col-sm-6 font-V">
                    From Left to Right:
                    <br>
                    Guo Hua Xia, 
                    <br>
                    ...,
                    <br>
                    ...,
                    <br>
                    ...
                  </div>
                </div>
              </div>
          </div>
        </div> 
    </div><!--/container-->
  </div><!--/masthead-->

<div id="spy">
  <!--main-->
  <div class="container">
    <div class="row">
        <!--left-->
        <div class="col-md-3" id="leftCol">
          <ul class="nav nav-stacked" id="sidebar">
            <li><a href="#press"><h4>Press</h4></a></li>
            <li><a href="#testimonies"><h4>Testimonies</h4></a></li>
            <li><a href="#contribute"><h4>Contribute</h4>
              <p>
                (find a missing news article?)
              </p>
            </a></li>
          </ul>
        </div><!--/left-->
        
        <!--right-->
        <div class="col-md-9 font-V">
          <h2 id="press">
            <br>
            Press
          </h2>
          <br>
          <ul class="font-V li-space">
            <li>
              <em>JAMM violins expand to two more schools</em>
              <br>
              Juneau Empire, May 2, 2012
              <a href="http://juneauempire.com/local/2012-05-02/jamm-violins-expand-two-more-schools" target="_blank">
                Link
              </a>
            </li>
            <li>
              <em>Paper violins reach out worldwide</em>
              <br>
              Juneau Empire, Sep 4, 2011 - 
                <a href="http://juneauempire.com/local/2011-09-04/paper-violins-reach-out-worldwide" target="_blank">
                  Link
                </a>
            </li>
            <li>
              <em>Paganinis on Paper</em>
              <br>
              Juneau Empire, Nov 14, 2010 - 
                <a href="http://juneauempire.com/stories/111410/loc_736111576.shtml" target="_blank">
                  Link
                </a>
            </li>
            <li>
              <em>Symphony Announces Winners of Youth Solo Competition</em>
              <br>
              Juneau Empire, June 10, 2010 -
                <a href="http://juneauempire.com/stories/061010/art_651625936.shtml" target="_blank">
                  Link
                </a>
            </li>
          </ul>
          <hr>
          <h2 id="testimonies">
            <br>
            Testimonies
          </h2>
          <br>
          <ul class="font-V">
            <li>
              <q style="font-size:85%">
                Thank you so much for all your incredible energy that you spend with our children. Monica has progressed so well under your supervision and Elias is an emerging musician with your kind and gentle encouragement. We feel both blessed and enriched.
              </q>
              <br>
              - Monica's mom
            </li>
            <br>
            <li>
              <q style="font-size:85%">
                We appreicate all the help you've given Megan with this piece. Not having done this before, we didn't realize all that would go into it and all the effort you would put into it. You are a great teacher.            </q>
              <br>
              - Megan's mom
            </li>
          </ul>
          
          <hr>
          
          <h2 id="contribute">
            <br>
            Contribute
          </h2>
          <br>
          <p>
            Spot Xia or one of his students in the news? Have a testimony about how great Xia is? Let us know by filling out the form below.
          </p>
          
          <form role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>#contribute">
            <div class="form-group">
              <hr>
              <label for="formFirstName">First Name *<span class="error"> <?php echo $firstNameErr;?></span></label>
              <input type="text" name="firstName" class="form-control" id="formFirstName" placeholder="Enter First Name">
              <label for="formLastName">Last Name *<span class="error"> <?php echo $lastNameErr;?></span></label>
              <input type="text" name="lastName" class="form-control" id="formLastName" placeholder="Enter Last Name">
            <div>
            <div class="form-group">
              <label for="formEmail">Email Address *<span class="error"> <?php echo $emailErr;?></span></label>
              <input type="text" name="email" class="form-control" id="formEmail" placeholder="Enter email">
            </div>
            <div class="form-group">
              <hr>
              <label for="formComments">More Information</label>
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
          <div class="font-V">
            <h2>
              <?php echo $success;?>
            </h2>
          </div>
          <hr>
          <br>
          </div><!--/right-->
      </div><!--/row-->
  </div><!--/container-->
</div>

</div>

  <?php include 'php/footer.php'; ?>

  <!-- script references -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/bind-polyfill.min.js"></script>
  <script src="js/smooth-scroll.min.js"></script>
  <script src="js/scripts.js"></script>
  <script src="js/scroll-up.js"></script>
  <script type="text/javascript">
    var page = "press";
  </script>
  <script src="js/side_scroll.js"></script>
</body>
</html>