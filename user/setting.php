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
// Display status message
echo $statusMsg;



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
                          <i class="material-icons">apps</i> Components
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
                                    <input type="submit" name="submit" value="Upload">
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
                             ?>
                             <br>
                             <h3><?php echo $first_name." ".$last_name; ?></h3>
                             <h3><?php echo $bio; ?></h3>
                            <?php
                            // // Include the database configuration file

                            // // Get images from the database
                            // $query = $conn->query("SELECT first_name ,last_name,bio FROM volunteers WHERE email='$email'");
                            // if($query->num_rows > 0){
                            //     if($row = $query->fetch_assoc()){
                            //         $imageURL = 'uploads/'.$row["file_name"];
                            // }}


                            // if (isset($_POST['fname'])){
                            //   $first_name=$_POST['fname'];
                            // }
                            // if (isset($_POST['lname'])){
                            //   $last_name=$_POST['lname'];
                            // }
                            // $query5 = "UPDATE `volunteers` SET first_name='$first_name' WHERE email='$email'";
                            // $result5 = mysqli_query($conn, $query5);
                            //
                            // $query2 = "UPDATE `volunteers` SET last_name='$last_name' WHERE email='$email'";
                            // $result2 = mysqli_query($conn, $query2);

                            ?>
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

                          <!-- <div class="description text-center">
                            <form action="" method="POST">

                              <input type="submit" name="updatee" value="Edit Bio"><br><br>
                              <input type="text" name="bio" placeholder="Bio">
                          </form>
	                       </div> -->
	                    </div>
    	            </div>
                </div>
              </div>
               </div>
				<div class="row">
					<div class="col-md-6 ml-auto mr-auto">
                        <div class="profile-tabs">
                          <ul class="nav nav-pills nav-pills-icons justify-content-center" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" href="#studio" role="tab" data-toggle="tab">
                                  <i class="material-icons">camera</i>
                                  Studio
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#works" role="tab" data-toggle="tab">
                                  <i class="material-icons">palette</i>
                                    Work
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#favorite" role="tab" data-toggle="tab">
                                  <i class="material-icons">favorite</i>
                                    Favorite
                                </a>
                            </li>
                          </ul>
                        </div>
    	    	</div>
            </div>

          <div class="tab-content tab-space">
            <div class="tab-pane active text-center gallery" id="studio">
  				<div class="row">
  					<div class="col-md-3 ml-auto">
  					    <img src="https://images.unsplash.com/photo-1524498250077-390f9e378fc0?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=83079913579babb9d2c94a5941b2e69d&auto=format&fit=crop&w=751&q=80" class="rounded">
  						<img src="https://images.unsplash.com/photo-1528249227670-9ba48616014f?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=66b8e7db17b83084f16fdeadfc93b95b&auto=format&fit=crop&w=357&q=80" class="rounded">
  					</div>
  					<div class="col-md-3 mr-auto">
  						<img src="https://images.unsplash.com/photo-1521341057461-6eb5f40b07ab?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=72da2f550f8cbd0ec252ad6fb89c96b2&auto=format&fit=crop&w=334&q=80" class="rounded">
  						<img src="https://images.unsplash.com/photo-1506667527953-22eca67dd919?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=6326214b7ce18d74dde5e88db4a12dd5&auto=format&fit=crop&w=750&q=80" class="rounded">
  					</div>
  				</div>
  			</div>
            <div class="tab-pane text-center gallery" id="works">
      			<div class="row">
      				<div class="col-md-3 ml-auto">
                      <img src="https://images.unsplash.com/photo-1524498250077-390f9e378fc0?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=83079913579babb9d2c94a5941b2e69d&auto=format&fit=crop&w=751&q=80" class="rounded">
  					  <img src="https://images.unsplash.com/photo-1506667527953-22eca67dd919?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=6326214b7ce18d74dde5e88db4a12dd5&auto=format&fit=crop&w=750&q=80" class="rounded">
  					  <img src="https://images.unsplash.com/photo-1505784045224-1247b2b29cf3?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=ec2bdc92a9687b6af5089b335691830e&auto=format&fit=crop&w=750&q=80" class="rounded">  					</div>
      				<div class="col-md-3 mr-auto">
                      <img src="https://images.unsplash.com/photo-1504346466600-714572c4b726?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=6754ded479383b7e3144de310fa88277&auto=format&fit=crop&w=750&q=80" class="rounded">
                      <img src="https://images.unsplash.com/photo-1494028698538-2cd52a400b17?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=83bf0e71786922a80c420c17b664a1f5&auto=format&fit=crop&w=334&q=80" class="rounded">
      				</div>
      			</div>
  			</div>
            <div class="tab-pane text-center gallery" id="favorite">
      			<div class="row">
      				<div class="col-md-3 ml-auto">
      				  <img src="https://images.unsplash.com/photo-1504346466600-714572c4b726?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=6754ded479383b7e3144de310fa88277&auto=format&fit=crop&w=750&q=80" class="rounded">
                      <img src="https://images.unsplash.com/photo-1494028698538-2cd52a400b17?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=83bf0e71786922a80c420c17b664a1f5&auto=format&fit=crop&w=334&q=80" class="rounded">
      				</div>
      				<div class="col-md-3 mr-auto">
      				  <img src="https://images.unsplash.com/photo-1505784045224-1247b2b29cf3?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=ec2bdc92a9687b6af5089b335691830e&auto=format&fit=crop&w=750&q=80" class="rounded">
      				  <img src="https://images.unsplash.com/photo-1524498250077-390f9e378fc0?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=83079913579babb9d2c94a5941b2e69d&auto=format&fit=crop&w=751&q=80" class="rounded">
  					  <img src="https://images.unsplash.com/photo-1506667527953-22eca67dd919?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=6326214b7ce18d74dde5e88db4a12dd5&auto=format&fit=crop&w=750&q=80" class="rounded">
      			    </div>
      			</div>
      		</div>
          </div>


            </div>
        </div>

	<footer class="footer text-center ">
        <p>This is th footer baby u can put your things below here</p>
    </footer>

  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>
  <script src="js/user.js"></script>



</body>
</html>
