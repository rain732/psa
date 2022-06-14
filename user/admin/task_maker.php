<?php
include 'include/connect.php';

session_start();

if(isset($_POST['submit'])){
$book_id = 1;
$task_desc = "";
$page_numbers = "";

$task_type = "";
$duration_day = "";
$duration_hour = "";
$duration_minute = "";
$start_date = "";
$duration = "";

if(isset($_POST['book_id'])){
  $book_id = $_POST['book_id'];
}
if(isset($_POST['task_desc'])){
  $task_desc = $_POST['task_desc'];
}
if(isset($_POST['page_numbers'])){
  $page_numbers = $_POST['page_numbers'];
}

if(isset($_POST['task_type'])){
  $task_type = $_POST['task_type'];
}
if(isset($_POST['duration_day'])){
  $duration_day = $_POST['duration_day'];
} 
if(isset($_POST['duration_hour'])){
  $duration_hour = $_POST['duration_hour'];
}
if(isset($_POST['duration_minute'])){
  $duration_minute = $_POST['duration_minute'];
}
if(isset($_POST['start_date'])){
  $start_date = $_POST['start_date'];
}

$duration = $duration_day . " " . $duration_hour . " ". $duration_minute;

$sql = "INSERT INTO task (book_id_fk, duration, start_date, type, chapter, description, volunteer_id_fk, task_status_id)
                  VALUES ($book_id, '$duration','$start_date' , '$task_type', '$page_numbers', 'description', NULL , 1)";


if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
  
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="../dist/bootstrap-duration-picker.css">
  <script src="../dist/bootstrap-duration-picker-debug.js"></script>
    <?php include "include/head.php" ?>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    
    <style>
      .mainTaskMaker{
        width:50%;
      }
      .duration-picker input{
        width:19%;
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
          <div class="content-wrapper" style="padding:5px;">
            <!-- Content -->

            <div class="mainTaskMaker">
              <br>
              <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

                <div class="form-group">
                <label for="exampleFormControlInput1">Choose the Book</label>
                  <select class="js-example-basic-single" name="book_id">
                  <?php
                    $sql1 = "select * from books";
                    $result = mysqli_query($conn,$sql1);
                    while($row = mysqli_fetch_assoc($result)){
                      echo "<option value='" . $row['id']."'>" . $row["book_name"] . "</option>";
                    }
                    ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="exampleFormControlInput1">Chapter Size:</label>
                  <input name="chapter" type="number" min="0" value="0" class="form-control" id="exampleFormControlInput1" placeholder="for example enter the number 1 ,only numbers!" required>
                  
                </div>

                <div class="form-group">
                <label for="exampleFormControlInput1">Pages from to :</label>
                <br>
                  From <input name="chapter" type="number" min="0" value="0"  width="25px" id="exampleFormControlInput1" placeholder="for example enter the number 1 ,only numbers!" required>
                  To <input name="chapter" type="number" min="0" value="0"  width="25px" id="exampleFormControlInput1" placeholder="for example enter the number 1 ,only numbers!" required>
                </div>

                <div class="form-group">
                  <label for="exampleFormControlTextarea1">Description :</label>
                  <textarea name="task_desc" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>


                <div class="form-group">
                  <label for="exampleFormControlSelect1">Select Type of Task (word or Voice ?)</label>
                  <select name="task_type" class="form-control" id="exampleFormControlSelect1">
                    <option>pdf to word</option>
                    <option>pdf to voice</option>
                  </select>
                </div>
                
                <div class="duration-picker">
                  <h5>Please specify the duration</h5>
                  <lable>Days</lable>
                  <input name="duration_day" type="number" min="0" max="30" required>
                  <lable>Hours</lable>
                  <input name="duration_hour" type="number" min="0" max="23" required>
                  <lable>Minutes</lable>
                  <input name="duration_minute" type="number" min="0" max="60" required>
                </div>

                <div class="Start-Time">
                  <h5>Pick starting date</h5>
                  <label for="taskdate">Task Starts at (date and time):</label>
                  <input name="start_date" type="datetime-local" id="task_start" name="task_start" required>
                </div>
                <input type="reset">
                <input type="submit" value="Submit Task">

              </form>
            </div>
            <!-- / Content -->

            <!-- Footer -->
            <?php include "include/footer.php"; ?>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
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

    <script>
  $(function () {
    $('#reset-picker').click(function () {
      $('#duration6').data('durationPicker').setValue(0);
    });
  });
</script>

<script type="text/javascript">
    $(function () {
        $('#datetimepicker1').datetimepicker();
    });
  </script>
    <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

<script>
  // In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  </body>
</html>
