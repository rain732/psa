<?php include 'connect.php';

$query4 = "SELECT facebook , whatsapp , instagram , linkedin , twitter , email FROM `contact_us` WHERE id=1 ";
$result4 = mysqli_query($conn,$query4);
$row4 = mysqli_fetch_assoc($result4);
$facebook = $row4['facebook'];
$whatsapp = $row4['whatsapp'];
$instagram = $row4['instagram'];
$linkedin = $row4['linkedin'];
$twitter = $row4['twitter'];
$instagram = $row4['instagram'];
$email = $row4['email'];


 ?>


<html lang="en">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGHTLESS</title>
    <link rel="stylesheet" href="css/stylee2.css">
    <link rel="stylesheet" href="css/stylee.css">
    <link rel="stylesheet" href="css/singup.css" >
    <link rel="stylesheet" href="css/footer.css">
</head>
<body>
<header>
    <div class="banner">
        <div class="content" >
            <div class="navv">
                <div class="logo">
                    <h1><span>SIGHTLESS</span></h1>
                </div>
                <div class="navv-items">
                    <ul>
                        <li><a href="index.php">HOME</a></li>
                        <li><a href="contact_us.php">CONTACT US</a></li>
                        <li id="sign" ><a href="login.php" class="active" style="color:white;">LOGIN</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>

    <div class="container">
      <div class="frame" style="height:700px;">
        <div class="nav">
          <ul class="links">
            <li class="signin-active"><a class="btn">Sign in</a></li>
            <li class="signup-inactive"><a class="btn">Sign up </a></li>
          </ul>
        </div>
        <div ng-app ng-init="checked = false">
              <?php if (isset($_GET['error'])) { ?>

              <p style="color:red" class="error"><?php echo $_GET['error']; ?></p>

              <?php } ?>
    				  <form class="form-signin" action="sessions/login.php" method="post" name="form" >

              <label for="username">Username</label>
              <input class="form-styling" type="text" name="uname" placeholder="" value="" required oninvalid="this.setCustomValidity('Enter Email Here')"
              oninput="this.setCustomValidity('')"/>

              <label for="password">Password</label>
              <input class="form-styling" type="password" name="password" placeholder=""
              value="" required  oninvalid="this.setCustomValidity('Enter Password Here')" oninput="this.setCustomValidity('')"/>

              <input type="submit" class="btn-signup" value="Login" />
      			  </form>

              <?php if (isset($_GET['error2'])) { ?>

                <p style="color:yellow" class="error"><?php echo $_GET['error2']; ?></p>

              <?php } ?>

    				  <form class="form-signup" action="sessions/register.php" method="post" >
                <label for="first_name">First name</label>
                <input class="form-styling" type="text" name="first_name" placeholder=""
                required placeholder="Enter Name" oninvalid="this.setCustomValidity('Enter First Name Here')" oninput="this.setCustomValidity('')"/>

                <label for="last_name">Last name</label>
                <input class="form-styling" type="text" name="last_name" placeholder=""
                required placeholder="Enter Name" oninvalid="this.setCustomValidity('Enter Last Name Here')" oninput="this.setCustomValidity('')"/>

                <label for="email">Email</label>
                <input class="form-styling" type="text" name="email" placeholder=""
                required placeholder="Enter Email" oninvalid="this.setCustomValidity('Enter Email Here')" oninput="this.setCustomValidity('')"/>

                <label for="phonenumber">Phone Number</label>
                <input class="form-styling" type="tel" name="telephone" placeholder=""
                required placeholder="Enter Phone Number" oninvalid="this.setCustomValidity('Enter Phone Number Here')" oninput="this.setCustomValidity('')"/>

                <label for="password">Password</label>
                <input class="form-styling" type="password" name="password" placeholder=""
                required placeholder="Enter Password" oninvalid="this.setCustomValidity('Enter Password Here')" oninput="this.setCustomValidity('')"/>

                <input type="submit" class="btn-signup" value="Sign Up" />
    				  </form>
              </div>
      </div>
    </div>


<footer class="footer2">

    <div class="footer-wrap">
        <div class="container first_class">
            <div class="row">

                    <div class="col-md-4 col-sm-6">
                      <h3>BE THE FIRST TO KNOW</h3>
                      <p>Get all the latest information on  Triedge Services, Events, Jobs
                        and Fairs. Sign up for our newsletter today.</p>
                    </div>

                    <div class="col-md-4 col-sm-6">
                    <form class="newsletter">
                      <input type="text" placeholder="Email Address">
                      <button class="newsletter_submit_btn" type="submit"><i class="fa fa-paper-plane"></i></button>
                    </form>
                    </div>

              <div class="col-md-4 col-sm-6">
                  <div class="col-md-12">
                      <div class="standard_social_links">
                        <div>
                          <li class="round-btn btn-facebook"><a href="<?php echo $facebook;?>"><i class="fab fa-facebook-f"></i></a>

                          </li>
                          <li class="round-btn btn-linkedin"><a href="<?php echo $linkedin;?>"><i class="fab fa-linkedin-in" aria-hidden="true"></i></a>

                          </li>
                          <li class="round-btn btn-twitter"><a href="<?php echo $twitter;?>"><i class="fab fa-twitter" aria-hidden="true"></i></a>

                          </li>
                          <li class="round-btn btn-instagram"><a href="<?php echo $instagram;?>"><i class="fab fa-instagram" aria-hidden="true"></i></a>

                          </li>
                          <li class="round-btn btn-whatsapp"><a href="<?php echo $whatsapp;?>"><i class="fab fa-whatsapp" aria-hidden="true"></i></a>

                          </li>
                          <li class="round-btn btn-envelop"><a href="mailto: <?php echo $email;?>"><i class="fa fa-envelope" aria-hidden="true"></i></a>

                          </li>
                        </div>
                      </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-12"><h3 style="text-align: right;">Stay Connected</h3></div>
              </div>
            </div>
          </div>

           <div class="row">
              <div class="container-fluid">
                <div class="copyright"> Copyright 2022 | All Rights Reserved by Passionate Sightless  Assistant.</div>
              </div>
           </div>
    </div>

</footer>

    <!--footer end-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- Font Awesome 5 links-->
    <script src="https://kit.fontawesome.com/fddf5c0916.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="singup.js"></script>
</body>
</html>
