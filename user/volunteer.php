<?php
include '../connect.php';
session_start();
if(!isset($_SESSION['email'])){
    header("Location:../login.php?error=not logged in");
  }

$var = $_SESSION['Authorized'] ;
if($var=== 1){
  echo "this is admin";
}
$vid="";
$vid=$_SESSION['id'];

if(isset($_POST['new_status'])){
    $sql = "UPDATE task SET task_status_id = '".$_POST['new_status']."' , volunteer_id_fk = $vid WHERE id = '".$_POST['id']."' ";
    $result = mysqli_query($conn,$sql);
    header("Location: volunteer.php");
  }

//Define Table Vars
$book = "";
$duration="";
$status="";
$start="";
$end="";
$type="";
$task_id="";

// File upload path
$statusMsg ="";
$fileName="";
$targetDir = "completed/";
if (isset($_FILES["file"]["name"])){
  $fileName = date('Y-m-d-h-i-s')."_".basename($_FILES["file"]["name"]);
}
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
if(isset($_POST["submit"]) && isset($_FILES["file"]["name"]) && isset($_POST['task_id'])){
    $task_id=$_POST['task_id'];
    // Allow certain file formats
    $allowTypes = array('mp3','wav','MP3','WAV','doc','docx','DOC','DOCX');
    if (!file_exists($targetFilePath)) {
        if(in_array($fileType, $allowTypes)){
                // Upload file to server
            if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
                // Insert image file name into database
                
                $insert = $conn->query("INSERT into completed_task (file_name, uploaded_on, volunteer_id_fk, task_id_fk) VALUES ('".$fileName."', NOW(),$vid ,$task_id)");
                if($insert){

                    $statusMsg = "uploaded successfully." ;
                }else{
                    $statusMsg = "File upload failed, please try again." ;
                }
            }else{
                $statusMsg = "Sorry, there was an error uploading your file." ;
            }
        }else{
            $statusMsg = "Sorry, only mp3 wav doc docx files are allowed to upload." ;
        }
    }else{
            $insert = $conn->query("INSERT into completed_task (file_name, uploaded_on, volunteer_id_fk) VALUES ('".$fileName."', NOW(),$vid)");
        }
}

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css\stylepage.css">
    <!-- Books Table -->
 
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css" rel="stylesheet">

 
    <link rel="stylesheet" href="vcss/volunteer.css">
    <style>
        /* #example thead{
            width:80%;
        }
        #example tbody{
            width:80%;
        }
        #example tfoot{
            width:80%;
        } */
        </style>
</head>
  <body>

    <body>

      <div class="container rounded bg-white mt-5 mb-5">
          <div class="row">
              <div class="col-md-2 border-right">
                <?php
                include '../connect.php';
                $query = $conn->query("SELECT file_name FROM images WHERE volunteer_id_fk = $vid ORDER BY uploaded_on DESC");
                if($query->num_rows > 0){
                    if($row = $query->fetch_assoc()){
                        $imageURL = 'uploads/'.$row["file_name"];
                }}

                
                ?>
                  <div class="d-flex flex-column align-items-center text-center p-2 py-5"><img src="<?= $imageURL; ?>" class="rounded-circle mt-5" width="150px" ><span class="font-weight-bold"><?php echo $_SESSION['first_name'] . ' ' . $_SESSION['last_name']; ?></span><span class="text-black-50"><?php echo $_SESSION['email'];?>
                  </span><span><?php echo $_SESSION['status'];?></span>
                </div>
              </div>
              <div class="col-md-7 border-right">
                  <div class="p-3 py-5">
                      <div class="d-flex justify-content-between align-items-center mb-3">
                          <h2 class="text-right">Task Area</h2>
                          <?php // Display status message
                                echo "<h1>$statusMsg</h1>";
                                ?>
                      </div>

                    <h6>Download</h6>
                    
                    <div class="datatable-container" style="">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Book Name</th>
                                    <th>Task Duration</th>
                                    <th>Task Status</th>
                                    <th>Starting Date</th>
                                    <th>Type</th>
                                    <th>Book</th> 
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $sql_task = "SELECT * FROM task";

                                $result_task = mysqli_query($conn, $sql_task);
                                while ($row = mysqli_fetch_assoc($result_task)){
                                    //---------
                                    $id =  $row['id'];
                                    $book_id = $row['book_id_fk'];
                                    $sql1="SELECT * FROM books WHERE id=$book_id";
                                    $row1 = mysqli_fetch_assoc(mysqli_query($conn, $sql1));
                                    $book = $row1['book_name'];
                                    
                                    //----------
                                    $d="";
                                    $d= substr($row ["duration"],0,1) ." Days ".substr($row ["duration"],2,1) . " Hours ".substr($row ["duration"],4,1) . " Minutes";
                                    $start=$row['start_date']; 
                                    $type=$row['type'];
                                    
                                
                                ?>
                                <tr>
                                    <td><?php echo $id; ?></td>
                                    <td><?php echo $book; ?></td>
                                    <td><?php echo $d; ?></td>
                                    <td><form method = "post">
                                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                            <select name="new_status" onchange='this.form.submit()' class="form-select">
                                            <?php
                                            $sql0 = "select * from task_status";
                                            $result0 = mysqli_query($conn,$sql0);
                                            while($row0 = mysqli_fetch_assoc($result0)){
                                                $rid = $row0['id'];
                                                $task_status_id=$row["task_status_id"];
                                                $r_status=$row0['status'];
                                            echo "
                                            <option value='$rid' ".(($task_status_id == $rid)?'selected' : "")." >$r_status</option>
                                            ";
                                            }
                                            ?>
                                            </select>
                                        </form>
                                    </td>
                                    <td><?php echo $start; ?></td>
                                    <td><?php echo $type; ?></td>
                                    <td><a href="admin/uploads_book/<?php echo $book;?>" download>Download</a></td>
                                   
                                </tr>
                                
                            <?php
                                $val = "";              
                    
                                if(isset($_POST['book'])){
                                    $val = $_POST['book']; 
                                    $booking = "UPDATE task SET task_status_id = 6 WHERE id = $id";
                                    $queryb = mysqli_query($conn,$booking);
                                }
                            }?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Book Name</th>
                                    <th>Task Duration</th>
                                    <th>Task Status</th>
                                    <th>Starting Date</th>
                                    <th>Type</th>
                                    <th>Book</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
            
                    <?php
                    
                    
                    ?>

                    <div class="row mt-2"><br>
                    </div> <p class="ds"></p>

                  <div class="flex-parent">
                  <div class="wrapper">
                    <form action="volunteer.php" method="post" enctype="multipart/form-data">
                   
                                            <select name="task_id" class="form-select">
                                            <?php
                                            $sql0 = "select * from task WHERE task_status_id = 6 and volunteer_id_fk = $vid";
                                            $result0 = mysqli_query($conn,$sql0);
                                            while($row0 = mysqli_fetch_assoc($result0)){
                                                $rid = $row0['id'];
                                                $bookID = $row0['book_id_fk'];
                                                $sql1="SELECT * FROM books WHERE id=$bookID";
                                                $row1 = mysqli_fetch_assoc(mysqli_query($conn, $sql1));
                                                $rbook = $row1['book_name'];
                                                $rr = $rid . " " . $rbook;
                                                echo "
                                                <option>$rr</option>
                                                ";
                                            }
                                            ?>
                                            </select>
                        <h1>Upload file</h1>
                        <div class="file-wrap">
                            <input type="file" name="file" id="myFile" class="custom-file" multiple size="50">
                            <label for="myFile"> <span> Drag file here <br> or <span class="blue">browse</span></span></label>
                        </div>
                        <div class="mt-5 text-center">
                            <input class="btn btn-primary profile-button" type="submit" name="submit" value="Upload File">
                        </div>
                    </form>
                  </div>
                  </div>

                  </div>
              </div>
              <div class="col-md-3" >
                  <div class="p-3 py-5" >
                      <div class="d-flex justify-content-between align-items-center experience"><h6>Edit Profile Page</h6><span class="border px-2 p-1 add-experience"><a href="../user/setting.php"><i class="fa fa-plus"></i>&nbsp;Edit Profile</span></a></div><br>
                      <div class="d-flex justify-content-between align-items-center experience"><h6>Logout To Home</h6><span class="border px-2 p-1 add-experience"><a href="../sessions/logout.php"><i class="fa fa-plus"></i>&nbsp;Logout</span></a></div><br>
                      <br><br>
                      
                      <div class="mb-3">
                      </div>                    
                  </div>
              </div>
          </div>
      </div>
      </div>
      </div>
      <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    <Script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </Script>
    </body>
  </html>
<?php
if (isset($_SESSION['email'])) {
    echo "";
}else{
     header("Location: ../setting.php");
     exit();
}
 ?>
