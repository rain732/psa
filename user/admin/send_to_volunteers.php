<?php
include "include/connect.php";
session_start();
$message = "";

if(isset($_POST['submit']) ){
  $message = $_POST['message'];
  $sql = "INSERT INTO vmessage (message) VALUES ('$message')";
  $result = mysqli_query($conn,$sql);
  if($result){
    header("Location: send_to_volunteers.php");
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
          <div class="content-wrapper m-3" >
            <!-- Content -->

            <form action="" method="post">
            <div class="form-floating">
              <textarea name="message" class="form-control w-75" placeholder="Leave a message here" id="floatingTextarea2" style="height: 150px"></textarea>
              <label for="floatingTextarea2">Write a message to all of volunteers ...</label>
            </div>
            <input type="submit" name="submit" value="Send Now" class="btn btn-success m-3">
            </form>
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
