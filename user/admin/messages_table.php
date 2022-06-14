<?php include "include/connect.php";

session_start();
$sql_messages = "SELECT * FROM contact_form";

$result_messages = mysqli_query($conn, $sql_messages); 


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
    <style>
      .fifty-chars {
        width: 50ch;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
      }
      .show-hide-text {
        display: flex;
        flex-wrap: wrap;
      }

      .show-hide-text a {
        order: 2;
      }

      .show-hide-text p {
        position: relative;
        overflow: hidden;
        max-height: 60px; // The Height of 3 rows
      }

      .show-hide-text p {
        display: -webkit-box;
        -webkit-line-clamp: 3; // 3 Rows of text
        -webkit-box-orient: vertical;
      }

      .show-less {
        display: none;
      }

      .show-less:target {
        display: block;
      }

      .show-less:target ~ p {
        display: block;
        max-height: 100%;
      }

      .show-less:target + a {
        display: none;
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

            <div class="datatable-container" style="width:95%; margin:15px; padding:7px;">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Message ID</th>
                        <th>Name</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                        <th>Message</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>0</td>
                        <td>Jehad Abu-Shehab</td>
                        <td>0795584201</td>
                        <td>jehad@gmail.com</td>
                        <td><div class="show-hide-text wrapper">
                              <a  id="show-more" class="show-less" href="#show-less">Show less</a>
                              <a  id="show-less" class="show-more" href="#show-more">Show more</a>
                              <p > <!--class="fifty-chars"-->
                                Lorem Ipsum is simply dummy text of  the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                              </p>
                            </div>
                        </td>
                    </tr>

                    <?php 
                        while ($row = mysqli_fetch_assoc($result_messages)) {
                      ?>
                    <tr>
                        <td><?php echo $row ["id"];?></td>
                        <td><?php echo $row ["name"];?></td>
                        <td><?php echo $row ["phone_number"];?></td>
                        <td><?php echo $row ["email"];?></td>
                        <td><div class="show-hide-text wrapper">
                              <a  id="show-more" class="show-less" href="#show-less">Show less</a>
                              <a  id="show-less" class="show-more" href="#show-more">Show more</a>
                              <p > <!--class="fifty-chars"-->
                              <?php echo $row ["message"];?>
                              </p>
                            </div>
                        </td>
                        <?php } ?>
                    </tr>
                   
                </tbody>
                <tfoot>
                    <tr>
                      <th>Message ID</th>
                      <th>Name</th>
                      <th>Phone Number</th>
                      <th>Email</th>
                      <th>Message</th>
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
