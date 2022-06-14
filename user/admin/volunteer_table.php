<?php include "include/connect.php";

session_start();
$sql_volunteers = "SELECT * FROM volunteers";
//$sql_volunt_tasks = "SELECT task.id FROM volunteers INNER JOIN task ON volunteers.id=task.id";

$result_volunteers = mysqli_query($conn, $sql_volunteers); 

if(isset($_POST['new_status'])){
  $sql = "UPDATE volunteers SET status = '".$_POST['new_status']."' WHERE id = '".$_POST['id']."'";
  $result = mysqli_query($conn,$sql);
  header("Location: volunteer_table.php");
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
          <div class="content-wrapper">
            <!-- Content -->

            <div class="datatable-container" style="width:95%; margin:15px; padding:7px;">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Volunteer ID</th>
                        <th>Volunteer Name</th>
                        <th>Status</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Phone Number</th>
                        <th># of Tasks</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php 
                        while ($row = mysqli_fetch_assoc($result_volunteers)) {
                          $n=$row ["id"];
                          $sql_Tasks = "SELECT count(*) FROM task WHERE volunteer_id_fk = $n";
                          $row2 = mysqli_fetch_assoc(mysqli_query($conn,$sql_Tasks));

                      ?>
                    <tr>
                        <td><?php echo $row ["id"];?></td>
                        <td><?php echo $row ["first_name"] . ' ' . $row ["last_name"];?></td>

                        <td><form method = "post">
                          <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                          <select  name="new_status" onchange='this.form.submit()' class="form-select">
                          <option <?php echo $row ["status"]=="OnHold"? 'selected':'' ?> >OnHold</option>
                          <option <?php echo $row ["status"]=="Blocked"? 'selected':'';?> >Blocked</option>
                          <option <?php echo $row ["status"]=="Accepted"? 'selected':'';?> >Accepted</option>
                          </select></form></td>
                        <td><?php echo $row ["email"];?></td>
                        <td><?php echo $row ["password"];?></td>
                        <td><?php echo $row ["phone_number"];?></td>
                        <td><?php print $row2['count(*)'];?></td>
                        <?php } ?>
                    </tr>
                   
                </tbody>
                <tfoot>
                    <tr>
                        <th>Volunteer ID</th>
                        <th>Volunteer Name</th>
                        <th>Status</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Phone Number</th>
                        <th># of Tasks</th>
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
