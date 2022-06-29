<?php
include 'connect.php';

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



<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>PSA</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGHTLESS</title>
    <link rel="stylesheet" href="css/stylee.css">
    <link rel="stylesheet" href="css/footer.css">
</head>
<body style="background-image: url('img/sightless.jpeg');background-repeat:no-repeat;background-size:100%;">
  <header>
    <div class="banner">

        <div class="content" >
            <div class="navv">
                <div class="logo">
                    <h1><span>SIGHTLESS</span></h1>
                </div>
                <div class="navv-items">
                    <ul>
                        <li><a href="index.php" class="active">HOME</a></li>
                        <li><a href="sessions/logout.php.php" class="active">xyz</a></li>
                        <li><a href="contact_us.php">CONTACT US</a></li>
                        <li id="sign" ><a href="login.php">LOGIN</a></li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
  </header>
  <div class="" style="color:white;margin-left:30px;">
      <h1 style="padding-top:200px;"><span style="color:rgb(36, 211, 182); "> Passionate Sightless  Assistant</span></h1><br><br>
      <h3 style="font-family:'Courier New'">Every <span style="color:rgb(36, 211, 182);">Human</span> deserve the same Rigths</h3>

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
</body>

</html>
