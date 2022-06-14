<?php
include 'include/connect.php';

session_start();
//{about ,contact-us details }


//contact us
if(!empty($_POST['contact_email'])){
  $contact_email = $_POST['contact_email'];
  $sql1="UPDATE contact_us SET email = '$contact_email'  WHERE email = email ";
  $result=mysqli_query($conn,$sql1);
}
if(!empty($_POST['contact_whatsapp'])){
  $contact_whatsapp = $_POST['contact_whatsapp'];
  $sql2="UPDATE contact_us SET whatsapp = '$contact_whatsapp'  WHERE whatsapp = whatsapp ";
  $result=mysqli_query($conn,$sql2);
}
if(!empty($_POST['contact_facebook'])){
  $contact_facebook = $_POST['contact_facebook'];
  $sql3="UPDATE contact_us SET facebook = '$contact_facebook'  WHERE facebook = facebook ";
  $result=mysqli_query($conn,$sql3);
}
if(!empty($_POST['contact_instagram'])){
  $contact_instagram = $_POST['contact_instagram'];
  $sql4="UPDATE contact_us SET instagram = '$contact_instagram'  WHERE instagram = instagram ";
  $result=mysqli_query($conn,$sql4);
}
if(!empty($_POST['contact_linkedin'])){
  $contact_linkedin = $_POST['contact_linkedin'];
  $sql5="UPDATE contact_us SET linkedin = '$contact_linkedin'  WHERE linkedin = linkedin ";
  $result=mysqli_query($conn,$sql5);
}
if(!empty($_POST['contact_twitter'])){
  $contact_twitter = $_POST['contact_twitter'];
  $sql6="UPDATE contact_us SET twitter = '$contact_twitter'  WHERE twitter = twitter ";
  $result=mysqli_query($conn,$sql6);
}


//about --> title	body 	admins_id_fk

if(isset($about_title) and isset($about_body)){
  $sql = "UPDATE about SET title='$about_title' , body='$about_body' WHERE id=1";

  if (mysqli_query($conn, $sql)) {
      echo "Record updated successfully";
    } else {
      echo "Error updating record: " . mysqli_error($conn);
  }
}


?>

<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <?php include "include/head.php" ?>

    <style>
      .content-wrapper div{
        margin-bottom:15px;
        padding:10px;
      }
      * {
        box-sizing: border-box;
      }

      /* Create three equal columns that floats next to each other */
      .column {
        margin-bottom:15px;
        float: left;
        width: 33.33%;
        padding: 10px;
        height: 50%; /* Should be removed. Only for demonstration */
      }

      /* Clear floats after the columns */
      .row1:after {
        content: "";
        display: table;
        clear: both;
      }
      /* Clear floats after the columns */
      .row2:after {
        content: "";
        display: table;
        clear: both;
      }

      /* Responsive layout - makes the three columns stack on top of each other instead of next to each other */
      @media screen and (max-width: 600px) {
        .column {
          width: 100%;
        }
      }

      </style>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">

        <!-- Menu -->
          <?php include "include/sidebar.php"; ?>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">

          <!-- Navbar -->
          <?php include "include/navbar.php";?>
          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            <!--{slideshow ,testinomial ,about ,members ,services ,contact-us details }-->
            <div class="row1">

              <div class="contact-us column">
                <h4>Contact Us</h4>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                  <div class="form-group">
                      <label for="exampleFormControlInput1">Email Address</label>
                      <input name="contact_email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="Email" >
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Phone Number</label>
                      <input name="contact_whatsapp" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Phone Number" >
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Facebook Profile Link</label>
                      <input name="contact_facebook" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Facebook" >
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Instagram Profile Link</label>
                      <input name="contact_instagram" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Instagram" >
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Linkedin Profile Link</label>
                      <input name="contact_linkedin" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Linkedin">
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Twitter Profile Link</label>
                      <input name="contact_twitter" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Twitter">
                    </div>
                    <div class="form-group">
                        <input name="submit" type="submit" value="Submit"class="form-control" id="exampleFormControlInput1" >
                      </div>
                </form>
              </div>

              <div class="about column">
                <h4>About</h4>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Title</label>
                        <input name="about_title" type="text" class="form-control" id="exampleFormControlInput1" placeholder="image name" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlInput1">Body Paragraph Text</label>
                        <input name="about_body" type="text" class="form-control" id="exampleFormControlInput1" placeholder="image body" required>
                      </div>
                      <div class="form-group">
                        <input name="Submit" type="submit" value="Submit" class="form-control" id="exampleFormControlInput1" >
                      </div>
                  </form>
                </div>
              </div>


            <div class="row2">



              <!-- <div class="contact-us column">
                <h4>Contact Us</h4>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                  <div class="form-group">
                      <label for="exampleFormControlInput1">Email Address</label>
                      <input name="contact_email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="image name" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Phone Number</label>
                      <input name="contact_phone" type="tel" class="form-control" id="exampleFormControlInput1" placeholder="image body" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Facebook Profile Link</label>
                      <input name="contact_facebook" type="text" class="form-control" id="exampleFormControlInput1" placeholder="image" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Instagram Profile Link</label>
                      <input name="contact_insta" type="text" class="form-control" id="exampleFormControlInput1" placeholder="image" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Linkedin Profile Link</label>
                      <input name="contact_linkedin" type="text" class="form-control" id="exampleFormControlInput1" placeholder="image" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Twitter Profile Link</label>
                      <input name="contact_twitter" type="text" class="form-control" id="exampleFormControlInput1" placeholder="image" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Location</label>
                      <input name="contact_location" type="text" class="form-control" id="exampleFormControlInput1" placeholder="image" required>
                    </div>
                    <div class="form-group">
                        <input name="Submit" type="submit" value="Submit"class="form-control" id="exampleFormControlInput1" >
                      </div>
                </form>
              </div> -->

    </div>


            <!-- / Content -->

            <!-- Footer -->
            <?php include "include/footer.php"; ?>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Scripts -->
    <?php include "include/scripts.php"; ?>

  </body>
</html>
