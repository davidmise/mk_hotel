<?php
include 'db.php';

session_start();

// Redirect to login page if user is not logged in
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}


// Handle update form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_payment'])) {
    $booking_id = (int)$_POST['booking_id'];
    $payment_status = $_POST['payment_status'] ?? 'Unpaid';
    $payment_method = $_POST['payment_method'] ?? NULL;

    $stmt = $conn->prepare("UPDATE bookings SET payment_status = ?, payment_method = ? WHERE id = ?");
    $stmt->bind_param("ssi", $payment_status, $payment_method, $booking_id);
    $stmt->execute();
    $stmt->close();

    header("Location: admin.php");
    exit;
}

// ------------------
// FILTER HANDLING (created_at based)
// ------------------
$startDate = $_GET['start_date'] ?? '';
$endDate = $_GET['end_date'] ?? '';
$filterBy = $_GET['filter_by'] ?? 'checkin'; // default to checkin if not selected

$sql = "SELECT b.*, r.type AS room_name, r.price 
        FROM bookings b 
        JOIN rooms r ON b.room_type_id = r.id 
        WHERE 1";

// Date filtering
if ($filterBy === 'checkin') {
    if (!empty($startDate)) {
        $sql .= " AND DATE(b.check_in) >= '$startDate'";
    }
    if (!empty($endDate)) {
        $sql .= " AND DATE(b.check_out) <= '$endDate'";
    }
} elseif ($filterBy === 'created') {
    if (!empty($startDate)) {
        $sql .= " AND DATE(b.created_at) >= '$startDate'";
    }
    if (!empty($endDate)) {
        $sql .= " AND DATE(b.created_at) <= '$endDate'";
    }
}

$sql .= " ORDER BY b.created_at DESC";
$result = $conn->query($sql);

// ------------------
// FETCH CONTACT MESSAGES
// ------------------
$query_contacts = "SELECT * FROM contacts ORDER BY created_at DESC";
$result_contacts = $conn->query($query_contacts);
?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Reception - Bookings</title>

    <!-- Custom fonts for this template -->
    <link href="admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/admin/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

     <style>
    select, input[type="submit"] {
      padding: 4px;
      margin-top: 4px;
    }
  </style>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id ="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-icon ">
               <strong>  MK </strong>
            </div>
            <div class="sidebar-brand-text mx-1">Hotel</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="admin.php">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            WEBSITE MANAGEMENT
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-folder"></i>
                <span>Pages</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Basic:</h6>
                    <a class="collapse-item" href="login.html">Home</a>
                    <a class="collapse-item" href="register.html">About</a>
                    <a class="collapse-item" href="forgot-password.html">Gallery</a>
                    <a class="collapse-item" href="forgot-password.html">Contacts</a>
                    <div class="collapse-divider"></div>
                    <h6 class="collapse-header">Facilities:</h6>
                    <a class="collapse-item" href="404.html">Rooms</a>
                    <a class="collapse-item" href="blank.html">Amenities</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Charts -->
        <!-- <li class="nav-item">
            <a class="nav-link" href="charts.html">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Charts</span></a>
        </li> -->

        <!-- Nav Item - Tables -->
        <!-- <li class="nav-item active">
            <a class="nav-link" href="tables.html">
                <i class="fas fa-fw fa-table"></i>
                <span>Tables</span></a>
        </li> -->

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">


      <!-- main content -->
      <div id="content">
        
            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <form class="form-inline">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                </form>

   
                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                   

                    <!-- Nav Item - Alerts -->
           

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                              <?php 
                              if (isset($_SESSION['user']['username'])) {
                                    $username = $_SESSION['user']['username'];
                                      $user = htmlspecialchars($username);
                                      echo "Logged in as: " . $user;  
                                  } else {
                                      echo "User not logged in.";
                                  }
                              ?> 
                            </span>
                            <img class="img-profile rounded-circle"
                                src="admin/img/undraw_profile.svg">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                Settings
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                Activity Log
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

              <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
              <h1 class="h3 mb-2 text-gray-800">Reception - Bokings</h1>
            
              <div class="row align-items-end mb-3">
            <!-- Filter Form -->
            <div class="col-md-8">
              <form method="GET" class="form-inline">
                <div class="form-group mr-3 mb-2">
                  <label for="filter_by" class="mr-2">Filter By:</label>
                  <select name="filter_by" id="filter_by" class="form-control">
                    <option value="checkin" <?= ($_GET['filter_by'] ?? '') === 'checkin' ? 'selected' : '' ?>>Check In/Out</option>
                    <option value="created" <?= ($_GET['filter_by'] ?? '') === 'created' ? 'selected' : '' ?>>Created At</option>
                  </select>
                </div>

                <div class="form-group mr-3 mb-2">
                  <label for="start_date" class="mr-2">From:</label>
                  <input type="date" name="start_date" id="start_date" class="form-control"
                        value="<?= htmlspecialchars($_GET['start_date'] ?? '') ?>">
                </div>

                <div class="form-group mr-3 mb-2">
                  <label for="end_date" class="mr-2">To:</label>
                  <input type="date" name="end_date" id="end_date" class="form-control"
                        value="<?= htmlspecialchars($_GET['end_date'] ?? '') ?>">
                </div>

                <button type="submit" class="btn btn-primary mb-2">Filter</button>
              </form>
            </div>

            <!-- Quick Filter Shortcuts -->
            <!-- <div class="col-md-4 text-md-right">
              <div class="mb-2">
                <a href="?filter=today" class="btn btn-sm btn-info">Today</a>
                <a href="?filter=this_week" class="btn btn-sm btn-secondary">This Week</a>
                <a href="?filter=this_month" class="btn btn-sm btn-dark">This Month</a>
              </div>
            <!-- </div> -->
          </div> 

              <!-- Filter Summary -->
              <?php
              $startDate = $_GET['start_date'] ?? '';
              $endDate = $_GET['end_date'] ?? '';
              $filterBy = $_GET['filter_by'] ?? 'checkin';
              ?>

              <?php if (!empty($startDate) || !empty($endDate)): ?>
                <p class="text-muted">
                  Filtering by <strong><?= $filterBy === 'created' ? 'Created Date' : 'Check In/Out' ?></strong>
                  from <strong><?= $startDate ?: 'Any' ?></strong>
                  to <strong><?= $endDate ?: 'Any' ?></strong>
                </p>
              <?php endif; ?>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary"> All Bookings </h6>
                    </div>
                    
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                      <th>No.</th>
                                      <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Check In</th>
                                        <th>Check Out</th>
                                        <th>Room</th>
                                        <th>No. of Rooms</th>
                                        <th>Payment Status</th>
                                        <th>Payment Method</th>
                                        <th>Price (TZS)</th>
                                        <th>Booked At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>No.</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Check In</th>
                                        <th>Check Out</th>
                                        <th>Room</th>
                                        <th>No. of Rooms</th>
                                        <th>Payment Status</th>
                                        <th>Payment Method</th>
                                        <th>Price (TZS)</th>
                                        <th>Booked At</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>

                              <tbody>
                                <?php 
                                  $no = 1; // Initialize counter
                                  while ($row = $result->fetch_assoc()): 
                                ?>
                                  <tr>
                                    <form method="POST">
                                      <input type="hidden" name="booking_id" value="<?= $row['id'] ?>">
                                      
                                      <td><?= $no++ ?></td> <!-- Serial number column -->

                                      <td><?= htmlspecialchars($row['name']) ?></td>
                                      <td><?= !empty($row['email']) ? htmlspecialchars($row['email']) : 'N/A' ?></td>
                                      <td><?= !empty($row['phone']) ? htmlspecialchars($row['phone']) : 'N/A' ?></td>
                                      <td><?= $row['check_in'] ?></td>
                                      <td><?= $row['check_out'] ?></td>
                                      <td><?= htmlspecialchars($row['room_name']) ?></td>
                                      <td><?= (int)$row['number_of_rooms'] ?></td>
                                      <td>
                                        <select name="payment_status" class="form-control">
                                          <option value="Unpaid" <?= $row['payment_status'] === 'Unpaid' ? 'selected' : '' ?>>Unpaid</option>
                                          <option value="Paid" <?= $row['payment_status'] === 'Paid' ? 'selected' : '' ?>>Paid</option>
                                        </select>
                                      </td>
                                      <td>
                                        <select name="payment_method" class="form-control">
                                          <option value="" <?= empty($row['payment_method']) ? 'selected' : '' ?>>-- Select --</option>
                                          <option value="Cash" <?= $row['payment_method'] === 'Cash' ? 'selected' : '' ?>>Cash</option>
                                          <option value="Card" <?= $row['payment_method'] === 'Card' ? 'selected' : '' ?>>Card</option>
                                          <option value="Mobile Money" <?= $row['payment_method'] === 'Mobile Money' ? 'selected' : '' ?>>Mobile Money</option>
                                        </select>
                                      </td>
                                      <td><?= number_format((int)$row['price'] * (int)$row['number_of_rooms']) ?></td>
                                      <td><?= $row['created_at'] ?></td>
                                      <td><input class="btn btn-primary" type="submit" name="update_payment" value="Update"></td>
                                    </form>
                                  </tr>
                                <?php endwhile; ?>
                              </tbody>


                            </table>
                        </div>
                    </div>
                </div>

                  <br>
                <h1 class="h3 mb-2 text-gray-800">Reception - Contacts</h1>

            <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary"> Contact Messages </h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                  <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                    <th>Received At</th>
                                  </tr>
                                </thead>
                                <tfoot>
                                      <tr>
                                        <th>No.</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Subject</th>
                                        <th>Message</th>
                                        <th>Received At</th>
                                      </tr>
                                </tfoot>
                                <tbody>
                                  <?php 
                                    $no = 1; // Start the counter
                                    while ($row = $result_contacts->fetch_assoc()): 
                                  ?>
                                    <tr>
                                      <td><?= $no++ ?></td> <!-- Display and increment -->
                                      <td><?= htmlspecialchars($row['name']) ?></td>
                                      <td><?= htmlspecialchars($row['email']) ?></td>
                                      <td><?= htmlspecialchars($row['subject']) ?></td>
                                      <td><?= nl2br(htmlspecialchars($row['message'])) ?></td>
                                      <td><?= $row['created_at'] ?></td>
                                    </tr>
                                  <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
  
      </div>
     <!-- End of Main Content -->

     <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; MK Hotel <script>document.write(new Date().getFullYear());</script>. Powered By <strong> Pamoja INC</strong> </span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->


    </div>
    <!-- End of Content Wrapper -->
  </div>
   <!-- End of Page Wrapper -->

   
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="admin/vendor/jquery/jquery.min.js"></script>
    <script src="admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="admin/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="admin/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="admin/js/demo/datatables-demo.js"></script>

</body>

</html>
  
