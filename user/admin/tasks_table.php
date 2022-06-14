<?php


include "include/connect.php";
session_start();

$sql_task = "SELECT * FROM task";

$result_task = mysqli_query($conn, $sql_task); 

$vid="";
$vid=$_SESSION['id'];

if(isset($_POST['new_status'])){
    $sql = "UPDATE task SET task_status_id = '".$_POST['new_status']."' , volunteer_id_fk = $vid WHERE id = '".$_POST['id']."' ";
    $result = mysqli_query($conn,$sql);
    header("Location: tasks_table.php");
  }
//_____________


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
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css" rel="stylesheet">
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
          <div class="content-wrapper" style="margin:15px;">
            <?php $date = date("y-m-d");  echo "<h1> $date</h1>" ?>

            <div class="datatable-container" style="">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>TaskID</th>
                        <th>Book</th>
                        <th>Duration</th>
                        <th>Status</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Type</th>
                        <th>chapter</th>
                        <th>Volunteer</th>
                        <th>desciption</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    
                    while ($row = mysqli_fetch_assoc($result_task)) {
                      //define
                      $id = $row ["id"];
                      $start = $row ["start_date"];
                      $type = $row ["type"];
                      $chapter = $row ["chapter"];
                      $description = $row ["description"];
                      // --------------------
                      $d="";
                      $d= substr($row ["duration"],0,1) ." Days ".substr($row ["duration"],2,1) . " Hours ".substr($row ["duration"],4,1) . " Minutes";
                      $x = (int)substr($row ["duration"],0,1);
                      $y = (int)substr($row ["start_date"],8,2);
                      $z=$y+$x;
                      $end = substr( $row ["start_date"],0,5) . substr($row ["start_date"],5,2)  ."-".$z ;
                      // --------------------
                      $book_id =  $row ["book_id_fk"];
                      $sql_book = "SELECT * FROM books WHERE id = $book_id";
                      $book = "no book";
                      $row2 = mysqli_fetch_assoc(mysqli_query($conn,$sql_book));
                      $book = $row2['book_name'];
                      // --------------------
                      $s = $row["task_status_id"];
                      $sql1 = "SELECT * FROM task_status WHERE id = $s";
                      $result1 = mysqli_query($conn, $sql1);
                      $row3 = mysqli_fetch_assoc($result1);
                      $status = $row3['status'];
                      // --------------------
                      $v = $row ["volunteer_id_fk"];
                      $sql2 = "SELECT * FROM volunteers WHERE id = $v";
                      $result2 = mysqli_query($conn, $sql2);
                      $row4 = mysqli_fetch_assoc($result2);
                      $volunteer = $row4['first_name'] . " " . $row4['last_name'];
                  ?>
                    <tr>
                    <td><?php echo $id;?></td>
                    <td><?php echo $book;?></td>
                    <td><?php echo $d;?></td>
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
                      </form></td>
                    <td><?php echo $start;?></td>
                    <td><?php echo $end;?></td>
                    <td><?php echo $type;?></td>
                    <td><?php echo $chapter;?></td>
                    <td><?php echo $volunteer;?></td>
                    <td><?php echo $description;?></td>
                    <?php 
                    $val = "";              
                    
                    if(isset($_POST['book'])){
                        $val = $_POST['book']; 
                        $booking = "UPDATE task SET task_status_id = 6 WHERE id = $id";
                        $queryb = mysqli_query($conn,$booking);
                    }
                  
                  } ?>
                    </tr>
                   
                </tbody>
                <tfoot>
                    <tr>
                        <th>TaskID</th>
                        <th>Book</th>
                        <th>Duration</th>
                        <th>Status</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Type</th>
                        <th>chapter</th>
                        <th>Volunteer</th>
                        <th>desciption</th>
                    </tr>
                </tfoot>
            </table>
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
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
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
