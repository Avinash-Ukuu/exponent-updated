<?php

include_once('configDB.php');

$logged_user_id = "";

$logged_username = "";



if (getSession('admin_id') > 0) {

    $logged_user_id  = getSession('admin_id');

    //$logged_user_actype = getSession('log_usertype');

    $logged_username = getSession('admin_username');
} else {

    header("location: login.php");
}
$query = "SELECT * FROM blogs ORDER BY created_at DESC";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Exponent Institute | Department Form</title>
    <!-- Google Font: Source Sans Pro -->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- Font Awesome -->

    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- daterange picker -->

    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <link href="https://adminlte.io/themes/AdminLTE/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet" />

    <!-- Tempusdominus Bootstrap 4 -->

    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

    <!-- SweetAlert2 -->

    <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

    <!-- Theme style -->

    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <style>
        .dropdown-menu {

            z-index: 9999 !important;

        }
    </style>

</head>
<body class="hold-transition sidebar-mini">

    <div class="wrapper">

        <!-- Navbar -->

        <nav class="main-header navbar navbar-expand navbar-white navbar-light">

            <!-- Left navbar links -->

            <ul class="navbar-nav">

                <li class="nav-item">

                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>

                </li>

                <li class="nav-item d-none d-sm-inline-block">

                    <a href="index.php" class="nav-link">Home</a>

                </li>

                <li class="nav-item d-none d-sm-inline-block">

                    <a href="#" class="nav-link">Contact</a>

                </li>

            </ul>
            <!-- SEARCH FORM -->

            <form class="form-inline ml-3">

                <div class="input-group input-group-sm">

                    <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">

                    <div class="input-group-append">

                        <button class="btn btn-navbar" type="submit">

                            <i class="fas fa-search"></i>

                        </button>

                    </div>

                </div>

            </form>

            <!-- Right navbar links -->

            <ul class="navbar-nav ml-auto">

                <!-- Messages Dropdown Menu -->

                <li class="nav-item dropdown">

                    <a class="nav-link" data-toggle="dropdown" href="#">

                        <i class="far fa-comments"></i>

                        <span class="badge badge-danger navbar-badge">3</span>

                    </a>

                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                        <a href="#" class="dropdown-item">

                            <!-- Message Start -->

                            <div class="media">

                                <img src="../../dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">

                                <div class="media-body">

                                    <h3 class="dropdown-item-title">

                                        Brad Diesel

                                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>

                                    </h3>

                                    <p class="text-sm">Call me whenever you can...</p>

                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>

                                </div>

                            </div>

                            <!-- Message End -->

                        </a>

                        <div class="dropdown-divider"></div>

                        <a href="#" class="dropdown-item">

                            <!-- Message Start -->

                            <div class="media">

                                <img src="../../dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">

                                <div class="media-body">

                                    <h3 class="dropdown-item-title">

                                        John Pierce
                                        <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">I got your message bro</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="../../dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Nora Silvester
                                        <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">The subject goes here</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li>

                <!-- Notifications Dropdown Menu -->

                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        <?php include('sidebar.php'); ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <!-- <h1>Blogs</h1> -->
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                            <div class="card card-outline card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Blog List</h3>
                                </div>
                                <div class="card-body">
                                    <!-- general form elements -->
                                    <table class="table table-bordered" id="table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Title</th>
                                                <th>Publish Type</th>
                                                <th>Date</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $iteration = 1;
                                                while ($row = mysqli_fetch_assoc($result)) { ?>
                                                <tr id="blog_<?php echo $row['id']; ?>">
                                                    <td><?php echo $iteration++; ?></td>
                                                    <td><?php echo $row['title']; ?></td>
                                                    <td>  
                                                        <?php if($row['publish_type'] == 'published') { ?>
                                                            <span class="badge badge-success"> Published </span>
                                                        <?php } else { ?>
                                                            <span class="badge badge-danger"> Unpublished </span>
                                                        <?php } ?>
                                                    </td>
                                                    <td><?php echo date('d-m-Y', strtotime($row['created_at'])); ?></td>
                                                    <td>
                                                        <a href="edit_blog.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                                                        <button onclick="deleteBlog(<?php echo $row['id']; ?>)" class="btn btn-sm btn-danger">Delete</button>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row -->
        </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

    <!-- /.content-wrapper -->
    <!-- /. Footer Start Wrapper -->

    <?php include('footer.php'); ?>

    <!-- /. Footer End Wrapper -->
    <!-- Control Sidebar -->

    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- bs-custom-file-input -->
    <script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <!-- InputMask -->
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/inputmask/jquery.inputmask.min.js"></script>
    <!-- date-range-picker -->
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <script src="https://adminlte.io/themes/AdminLTE/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- Page specific script -->
    <!-- SweetAlert2 -->
    <script src="plugins/sweetalert2/sweetalert2.min.js"></script>
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <!-- Custom form -->
    <script src="custom.js"></script>
    <script>
        $(document).ready(function(){
            $('#table').DataTable();
        });

        function deleteBlog(blogId) {
            if (confirm('Are you sure you want to delete this blog?')) {
                $.ajax({
                    url: 'delete_blog.php',
                    type: 'POST',
                    data: {
                        id: blogId
                    },
                    success: function(response) {
                        alert(response);
                        location.reload();
                    },
                    error: function() {
                       alert(response.error);    
                    }
                });
            }
        }
    </script>
</body>

</html>