<?php
include 'include/connect.php';
session_start();
echo "<h1>".session_status()."</h1>";
if($_SESSION['Authorized'] === 1){
  echo "";
}else{
  header("Location: ../../login.php?error=not admin");
}

$var = $_SESSION['Authorized'] ;
if($var=== 1){
  echo "this is admin";
}

$sql = "SELECT count(*) FROM TASK WHERE task_status_id = 0";

$tasks = "SELECT count(*) FROM TASK";
$volunteers = "SELECT count(*) FROM volunteers";
$books = "SELECT count(*) FROM books";
$messages = "SELECT count(*) FROM contact_form";

$result = mysqli_query($conn, $sql);

$t = mysqli_query($conn, $tasks);
$v = mysqli_query($conn, $volunteers);
$b = mysqli_query($conn, $books);
$m = mysqli_query($conn, $messages);

$complete = 0;
while($row = mysqli_fetch_assoc($result)){
  $complete = $row['count(*)'];
  break;
}
$all_tasks = 0;
while($row = mysqli_fetch_assoc($t)){
  $all_tasks = $row['count(*)'];
  break;
}
$rv = 0;
while($row = mysqli_fetch_assoc($v)){
  $rv = $row['count(*)'];
  break;
}
$rb = 0;
while($row = mysqli_fetch_assoc($b)){
  $rb = $row['count(*)'];
  break;
}
$rm = 0;
while($row = mysqli_fetch_assoc($m)){
  $rm = $row['count(*)'];
  break;
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
    <title>Admin Panel</title>
    <?php include "include/head.php" ?>
    <link rel="icon" href="admin.png" type="image/icon type">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <div class="col-lg-8 mb-4 order-0">
                  <div class="card">
                    <div class="d-flex align-items-end row">
                      <div class="col-sm-7">
                        <div class="card-body">
                          <h5 class="card-title text-primary">Hello My Elegant Admin! <i class="fa">&#xf06e;</i></h5>
                          <p class="mb-4">
                            We have done <span class="fw-bold"><?php echo($all_tasks == 0)? "0%": ($complete/$all_tasks) ."%";?></span> of Tasks yet.
                          </p>

                         
                        </div>
                      </div>
                      <div class="col-sm-5 text-center text-sm-left">
                        
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 order-1">
                  <div class="row">
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <!-- <img
                                src="../assets/img/icons/unicons/chart-success.png"
                                alt="chart success"
                                class="rounded"
                              /> -->
                            </div>
                            <div class="dropdown">
                              
                              
                            </div>
                          </div>
                          <span class="fw-semibold d-block mb-1">Tasks</span>
                          <h3 class="card-title mb-2"><?php echo $all_tasks; ?></h3>
                          
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <!-- <img
                                src="../assets/img/icons/unicons/wallet-info.png"
                                alt="Credit Card"
                                class="rounded"
                              /> -->
                            </div>
                            <div class="dropdown">
                              
                              
                            </div>
                          </div>
                          <span>Volunteers</span>
                          <h3 class="card-title text-nowrap mb-1"><?php echo $rv; ?></h3>
                          
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Total Revenue -->
                <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
                  <div class="card">
                    <div class="row row-bordered g-0">
                      <div class="col-md-8">
                        <h5 class="card-header m-0 me-2 pb-3">Total Work</h5>
                        <div id="totalRevenueChart" class="px-2"></div>
                      </div>
                      
                    </div>
                  </div>
                </div>
                <!--/ Total Revenue -->
                <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
                  <div class="row">
                    <div class="col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <!-- <div class="avatar flex-shrink-0">
                              <img src="../assets/img/icons/unicons/paypal.png" alt="Credit Card" class="rounded" />
                            </div> -->
                            
                          </div>
                          <span class="d-block mb-1">Books</span>
                          <h3 class="card-title text-nowrap mb-2"><?php echo $rb; ?></h3>
                          
                        </div>
                      </div>
                    </div>
                    <div class="col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <!-- <div class="avatar flex-shrink-0">
                              <img src="../assets/img/icons/unicons/cc-primary.png" alt="Credit Card" class="rounded" />
                            </div> -->
                            
                          </div>
                          <span class="fw-semibold d-block mb-1">Messages</span>
                          <h3 class="card-title mb-2"><?php echo $rm; ?></h3>
                          
                        </div>
                      </div>
                    </div>
                    <!-- </div>
                    <div class="row"> -->
                    <!-- <div class="col-12 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                            <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                              <div class="card-title">
                                <h5 class="text-nowrap mb-2">Profile Report</h5>
                                <span class="badge bg-label-warning rounded-pill">Year 2021</span>
                              </div>
                              <div class="mt-sm-auto">
                                <small class="text-success text-nowrap fw-semibold"
                                  ><i class="bx bx-chevron-up"></i> 68.2%</small
                                >
                                <h3 class="mb-0">$84,686k</h3>
                              </div>
                            </div>
                            <div id="profileReportChart"></div>
                          </div>
                        </div>
                      </div>
                    </div> -->
                  </div>
                </div>
              </div>
              <div class="row">
                <!-- Order Statistics -->
                
                <!--/ Order Statistics -->

                <!-- Expense Overview -->
                
                <!--/ Expense Overview -->

                <!-- Transactions -->
                
                <!--/ Transactions -->
              </div>
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


<?php


?>