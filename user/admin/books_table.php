<?php 
include "include/connect.php";

session_start();
$sql_books = "SELECT * FROM books";

$result_books = mysqli_query($conn, $sql_books); //

function getPDFPages($document)
{
    $cmd = "/path/to/pdfinfo";           // Linux
    $cmd = "C:\\xampp\\htdocs\\ps\\user\\xpdf\\bin32\\pdfinfo.exe";  // Windows
    
    // Parse entire output
    // Surround with double quotes if file name has spaces
    exec("$cmd \"$document\"", $output);

    // Iterate through lines
    $pagecount = 0;
    foreach($output as $op)
    {
        // Extract the number
        if(preg_match("/Pages:\s*(\d+)/i", $op, $matches) === 1)
        {
            $pagecount = intval($matches[1]);
            break;
        }
    }
    
    return $pagecount;
}
function slash($path){
  $result="uploads_book\\";
  for($i=0;$i<strlen($path);$i++){
    if($path[$i]==".'\'."){
      $result.=".'\\'.";
    }else{
      $result.=$path[$i];
    }
  }
  return $result;
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
                        <th>Book ID</th>
                        <th>Book Name</th>
                        <th>Download</th>
                        <th>Image</th>
                        <th>Passionate</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        while ($row = mysqli_fetch_assoc($result_books)) {

                      ?>
                    <tr>
                        <td><?php echo $row ["id"];?></td>
                        <td><?php echo $row ["book_name"];?> <p><?php echo " ". getPDFPages(slash($row["book_pdf"])) . " pages" ;?></p></td>
                        <td><a href="uploads_book/<?php echo $row ["book_pdf"];?>" download>Download</a></td>
                        <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" onClick='view("uploads_img/<?php echo $row ["book_img"];?>")'>
                              View
                            </button></td>
                        
                        <td>someone educated</td>
                        <?php } ?>
                    </tr>
                        
                </tbody>
                
                <tfoot>
                    <tr>
                    <th>Book ID</th>
                        <th>Book Name</th>
                        <th>Download</th>
                        <th>Image</th>
                        <th>Passionate</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    
        <?php
          while ($row = mysqli_fetch_assoc($result_books)) {
            echo $row ["id"] . " " . $row ["book_name"] . " " . $row ["pdf_path"] . " " . $row ["image"];
          }
          
          ?>
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
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Book Image</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <img id="book_img" class="img-fluid">
      </div>
    </div>
  </div>
</div>
    <?php include "include/scripts.php"; ?>
    
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    <Script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );

        function view(img){
          $('#book_img').attr('src',img);
        }
    </Script>
 
  </body>
</html>
