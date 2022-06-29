<?php

include '../connect.php';
session_start();
if(!isset($_SESSION['email'])){
  header("Location:../login.php?error=not logged in");
}
//volunteer_id in this session
$v = $_SESSION['email'];
$vsql = "SELECT * FROM volunteers WHERE email = '$v'";
$vresult = mysqli_query($conn,$vsql);
$row1=mysqli_fetch_assoc($vresult);
$vid=$row1['id'];

$email='';


$email=$_SESSION["email"];

//----------------
if(!empty($_POST['bio']))
{
  $bio=$_POST['bio'];
  $query = "UPDATE `volunteers` SET bio='$bio' WHERE email='$email'";
  $result2 = mysqli_query($conn, $query);
}
if(!empty($_POST['first_name']))
{
  $first_name=$_POST['first_name'];
  $query1 = "UPDATE `volunteers` SET first_name='$first_name' WHERE email='$email'";
  $result = mysqli_query($conn, $query1);
}
if(!empty($_POST['last_name']))
{
  $last_name=$_POST['last_name'];
  $query2 = "UPDATE `volunteers` SET last_name='$last_name' WHERE email='$email'";
  $result = mysqli_query($conn, $query2);
}


$statusMsg = '';
// File upload path
$fileName="";
$targetDir = "uploads/";
if (isset($_FILES["file"]["name"])){
  $fileName = date('Y-m-d-h-i-s')."_".basename($_FILES["file"]["name"]);
}
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
if(isset($_POST["submit"]) && isset($_FILES["file"]["name"])){
    // Allow certain file formats
    $allowTypes = array('jpg','png','PNG','jpeg','JPEG','gif','JPG','GIF');
    if (!file_exists($targetFilePath)) {
        if(in_array($fileType, $allowTypes)){
                // Upload file to server
            if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
                // Insert image file name into database

                $insert = $conn->query("INSERT into images (file_name, uploaded_on, volunteer_id_fk) VALUES ('".$fileName."', NOW(),$vid)");
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
            $insert = $conn->query("INSERT into images (file_name, uploaded_on, volunteer_id_fk) VALUES ('".$fileName."', NOW(),$vid)");
        }
}



 ?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons">
    <link rel="stylesgeet" href="https://rawgit.com/creativetimofficial/material-kit/master/assets/css/material-kit.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
  
    <link rel="stylesheet" href="user.css">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

  </head>

<body class="profile-page">
    <nav class="navbar navbar-color-on-scroll navbar-transparent    fixed-top  navbar-expand-lg "  color-on-scroll="100"  id="sectionsNav">
        <div class="container">
            <div class="navbar-translate">
                <a class="navbar-brand" href="https://demos.creative-tim.com/material-kit/index.html" target="_blank"> </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                </button>
            </div>

            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="dropdown nav-item">
                      <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false">
                          <i class="material-icons">apps</i> 
                      </a>
                      <div class="dropdown-menu dropdown-with-icons">
                        <a href="volunteer.php" class="dropdown-item">
                            <i class="material-icons">work</i> Back to Task Area
                        </a>

                        <a href="logout.php" class="dropdown-item">
                            <i class="material-icons">logout</i> Logout
                        </a>
                      </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="page-header header-filter" data-parallax="true" style="background-image:url('http://wallpapere.org/wp-content/uploads/2012/02/black-and-white-city-night.png');"></div>
    <div class="main main-raised">
		<div class="profile-content">

                <div class="container">
                <div class="row">
	                <div class="col-md-6 ml-auto mr-auto">
        	           <div class="profile">
	                        <div class="avatar">
                            <?php
                            // Include the database configuration file

                            // Get images from the database
                            $query = $conn->query("SELECT file_name FROM images WHERE volunteer_id_fk = $vid ORDER BY uploaded_on DESC");
                            if($query->num_rows > 0){
                                if($row = $query->fetch_assoc()){
                                    $imageURL = 'uploads/'.$row["file_name"];
                            }}
                            ?>
	                            <div><img src="<?= $imageURL; ?>" alt="Circle Image" class="img-raised rounded-circle img-fluid"><br>
                                <form action="setting.php" method="post" enctype="multipart/form-data">
                                      <!-- Select Image File to Upload: -->

                                    <input type="file" name="file" class="form-control">
                                    <input type="submit" id="upload11"  name="submit" value="Upload">
                                </form> </div>



                          </div><br><br>
	                        <div class="name">
                            <?php

                            $query4 = "SELECT first_name , last_name , bio FROM `volunteers` WHERE email='$email' ";
                            $result4 = mysqli_query($conn,$query4);
                            $row4 = mysqli_fetch_assoc($result4);
                            $first_name = $row4['first_name'];
                            $last_name = $row4['last_name'];
                            $bio = $row4['bio'];
                            // Display status message
                            echo "<br>" . "<p style='color:red'>$statusMsg</p>";
                             ?>
                             
                             <br>
                             <h3><?php echo $first_name." ".$last_name; ?></h3>
                             <h3><?php echo $bio; ?></h3>
                            
                            <p>
                              <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                Edit Your Profile Informations:
                              </a>
                            </p>
                            <div class="collapse" id="collapseExample">
                              <div class="card card-body" style="padding:15px;">
                              <form action="setting.php" method="POST">
                                <input type="text" name="first_name" placeholder="First Name"  class="form-control"><br>
                                <input type="text" name="last_name" placeholder="Last Name"  class="form-control"><br>
                                <input type="text" name="bio" placeholder="Bio"  class="form-control"><br>
                                <input type="submit" name="update" value="Edit Profile"  class="form-control" style="background-color:#406349;color:white;">
                              </form>

                              </div>
                            </div>

	                    </div>
    	            </div>
                </div>
              </div>
               </div>
			<br>
      <br>
      <br>
      <br>
      <br>
      <br>

            </div>
        </div>

	<footer class="footer text-center ">
       
    </footer>

  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>
  <script src="js/user.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

  <script>
 
  function message1(){
    Swal.fire(
    'Good job!',
    'gggghhhh',
    'success',
    5000
  )
  }
  </script>


</body>
</html>
