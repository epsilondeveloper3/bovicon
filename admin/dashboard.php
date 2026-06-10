<!DOCTYPE html>
<?php include("include/config.php");?>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <?php include('include/head.php')?>
  </head>

  <body>
    <!-- Preloader -->
    <?php include('include/loder.php')?>
    <!-- /Preloader -->

    <!-- Choose Layout -->

    <!-- ======================================
    ******* Page Wrapper Area Start **********
    ======================================= -->
    <div class="flapt-page-wrapper">
      <!-- Sidemenu Area -->
      <?php include('include/sidebar.php')?>

      <!-- Page Content -->
      <div class="flapt-page-content">
        <!-- Top Header Area -->
        <?php include('include/header.php')?>

        <!-- Main Content Area -->
        <div class="main-content introduction-farm">
          <div class="content-wraper-area">
            <div class="dashboard-area">
              <div class="container-fluid">
                <div class="row g-4">
                  <div class="col-12">
                    <div
                      class="d-flex align-items-center justify-content-between"
                    >
                      <div class="dashboard-header-title">
                        <h5 class="mb-0">Dashboard</h5>
                        <p class="mb-0">
                          Welcome to <span class="text-success">Bovicon Admin Panel</span>
                        </p>
                      </div>
                    </div>
                  </div>

                  <?php
                    // Get counts from Bovicon database
                    $servicesResult = mysqli_query($con, "SELECT * FROM services");
                    $servicesCount = $servicesResult ? mysqli_num_rows($servicesResult) : 0;
                    
                    $testsResult = mysqli_query($con, "SELECT * FROM tests");
                    $testsCount = $testsResult ? mysqli_num_rows($testsResult) : 0;
                    
                    $cityResult = mysqli_query($con, "SELECT * FROM cities");
                    $cityCount = $cityResult ? mysqli_num_rows($cityResult) : 0;
                  ?>

                  <div class="col-sm-6 col-lg-4">
                    <div class="card shadow-sm">
                      <div class="card-body">
                        <div class="single-widget d-flex align-items-center justify-content-between">
                          <div>
                            <div class="widget-icon bg-primary text-white mb-2" style="width: 48px; height: 48px; display: flex; align-items: center; justify-content: center; border-radius: 8px;">
                              <i class="bx bx-briefcase font-24"></i>
                            </div>
                            <div class="widget-desc">
                              <h4 class="mb-1"><?php echo $servicesCount; ?></h4>
                              <p class="mb-0 text-muted font-14">Total Services</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-6 col-lg-4">
                    <div class="card shadow-sm">
                      <div class="card-body">
                        <div class="single-widget d-flex align-items-center justify-content-between">
                          <div>
                            <div class="widget-icon bg-success text-white mb-2" style="width: 48px; height: 48px; display: flex; align-items: center; justify-content: center; border-radius: 8px;">
                              <i class="bx bx-flask font-24"></i>
                            </div>
                            <div class="widget-desc">
                              <h4 class="mb-1"><?php echo $testsCount; ?></h4>
                              <p class="mb-0 text-muted font-14">Total Tests</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-6 col-lg-4">
                    <div class="card shadow-sm">
                      <div class="card-body">
                        <div class="single-widget d-flex align-items-center justify-content-between">
                          <div>
                            <div class="widget-icon bg-warning text-dark mb-2" style="width: 48px; height: 48px; display: flex; align-items: center; justify-content: center; border-radius: 8px;">
                              <i class="bx bx-building font-24"></i>
                            </div>
                            <div class="widget-desc">
                              <h4 class="mb-1"><?php echo $cityCount; ?></h4>
                              <p class="mb-0 text-muted font-14">Total Cities</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="card shadow-sm">
                      <div class="card-body">
                        <div class="card-title border-bottom-none mb-30 d-flex align-items-center justify-content-between">
                          <h6 class="mb-0">Recently Added Tests</h6>
                          <a href="tests.php" class="btn btn-primary btn-sm">Manage Tests</a>
                        </div>
                        <div class="table-responsive text-nowrap">
                          <table class="table table-centered table-nowrap table-hover mb-0">
                            <thead>
                              <tr>
                                <th>Sr No</th>
                                <th>Test Name</th>
                                <th>Price</th>
                                <th>Preparation</th>
                                <th>Frequency</th>
                                <th>Parameters</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                                $recentTests = mysqli_query($con, "SELECT * FROM tests ORDER BY id DESC LIMIT 5");
                                $srNo = 1;
                                if($recentTests && mysqli_num_rows($recentTests) > 0) {
                                  while($row = mysqli_fetch_assoc($recentTests)) {
                              ?>
                              <tr>
                                <td><?php echo $srNo++; ?></td>
                                <td><strong><?php echo htmlspecialchars($row['name']); ?></strong></td>
                                <td><span class="text-success">₹<?php echo number_format($row['price'], 2); ?></span></td>
                                <td><?php echo htmlspecialchars($row['preparation']); ?></td>
                                <td><?php echo htmlspecialchars($row['frequency']); ?></td>
                                <td><span class="badge bg-info text-white"><?php echo $row['parameter_count']; ?> parameter(s)</span></td>
                              </tr>
                              <?php
                                  }
                                } else {
                              ?>
                              <tr>
                                <td colspan="6" class="text-center py-4">No tests found. Add some in the Tests module!</td>
                              </tr>
                              <?php } ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Footer Area -->
          <div class="container-fluid">
            <div class="row">
              <div class="col-12">
                <!-- Footer Area -->
                <footer
                  class="footer-area d-sm-flex justify-content-center align-items-center justify-content-between"
                >
                  <!-- Copywrite Text -->
                  <div class="copywrite-text">
                    <p class="font-13">
                      Developed by &copy; <a href="#">Epsilon Developer</a>
                    </p>
                  </div>
                  <div class="fotter-icon text-center">
                    <p class="mb-0 font-13">2026 &copy; </p>
                  </div>
                </footer>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- ======================================
    ********* Page Wrapper Area End ***********
    ======================================= -->

    <!-- Must needed plugins to the run this Template -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/default-assets/setting.js"></script>
    <script src="js/default-assets/scrool-bar.js"></script>
    <script src="js/todo-list.js"></script>

    <!-- Active JS -->
    <script src="js/default-assets/active.js"></script>
  </body>
</html>
