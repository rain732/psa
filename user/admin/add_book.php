<?php
include "include/connect.php";
session_start();


// 
$statusMsg = '';
// File upload path
$fileName="";
$targetDir = "uploads_book/";
if (isset($_FILES["file"]["name"])){
  $fileName = date('Y-m-d-h-i-s')."_".basename($_FILES["file"]["name"]);
}
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

// File upload path
$fileName2="";
$targetDir2 = "uploads_img/";
if (isset($_FILES["book_img"]["name"])){
  $fileName2 = basename($_FILES["book_img"]["name"]);
}
$targetFilePath2 = $targetDir2 . $fileName2;
$fileType2 = pathinfo($targetFilePath2,PATHINFO_EXTENSION);

if(isset($_POST["submit"]) && isset($_FILES["file"]["name"])  && isset($_FILES["book_img"]["name"])){
    // Allow certain file formats
    $allowTypes = array('pdf','PDF');
     // Allow certain file formats
     $allowTypes2 = array('jpg','png','PNG','jpeg','JPEG','gif','JPG','GIF');

    if (!file_exists($targetFilePath) && !file_exists($targetFilePath2) ) {
        if(in_array($fileType, $allowTypes) && in_array($fileType2, $allowTypes2)){
                // Upload file to server
            if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath) && move_uploaded_file($_FILES["book_img"]["tmp_name"], $targetFilePath2)){
                // Insert image file name into database
                $name = "";
                $name = $_POST['book_name'];
                $insert = $conn->query("INSERT into books (book_name,book_pdf,book_img ) VALUES ('$name','".$fileName."', '".$fileName2."')");
                if($insert){

                    $statusMsg = "uploaded successfully." ;
                }else{
                    $statusMsg = "File upload failed, please try again." ;
                }
            }else{
                $statusMsg = "Sorry, there was an error uploading your file." ;
            }
        }else{
            $statusMsg = "Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload." ;
        }
    }else{
            $insert = $conn->query("INSERT into books (book_name,book_pdf,book_img ) VALUES ('$name','".$fileName."', '".$fileName2."')");
        }
}
// Display status message


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
      .add_book{
        padding:10px;
        margin:5px;
      }
      .add_book div{
        padding:5px;
        margin:5px;
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

            <div class="add_book column">
                <h4>Add New Book</h4>
                <?php echo "<h1> $statusMsg </h1>"; ?>
                  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"  enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Book Name</label>
                        <input name="book_name" type="text" class="form-control" id="exampleFormControlInput1" placeholder="book name" >
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlInput1">Upload PDF Book Here</label>
                        <input name="file" type="file" class="form-control" id="exampleFormControlInput1" placeholder="book pdf" >
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlInput1">Upload Image</label>
                        <input name="book_img" type="file" class="form-control" id="exampleFormControlInput1" placeholder="image" >
                      </div>
                      <div class="form-group">
                        <input name="submit" type="submit" value="Submit" class="form-control" id="exampleFormControlInput1" >
                      </div>
                  </form>
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
