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



?>

<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Exponent Institute | Student List</title>



    <!-- Google Font: Source Sans Pro -->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- SweetAlert2 -->

    <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

    <!-- Font Awesome -->

    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">

    <!-- DataTables -->

    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <!-- Theme style -->

    <link rel="stylesheet" href="dist/css/adminlte.min.css">

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

                    <a href="index3.html" class="nav-link">Home</a>

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

                                <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">

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

                                <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">

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

                                <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">

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

                            <h1>Student Records</h1>

                        </div>

                        <div class="col-sm-6">

                            <ol class="breadcrumb float-sm-right">

                                <li class="breadcrumb-item"><a href="#">Home</a></li>

                                <li class="breadcrumb-item active">Student List</li>

                            </ol>

                        </div>

                    </div>

                </div><!-- /.container-fluid -->

            </section>



            <!-- Main content -->

            <section class="content">

                <div class="container-fluid">

                    <div class="row">

                        <div class="col-12">

                            <div class="card">

                                <div class="card-header">

                                    <h3 class="card-title">Student List</h3>

                                </div>

                                <!-- /.card-header -->

                                <div class="card-body">

                                    <table id="example1" class="table table-bordered table-striped">

                                        <thead>

                                            <tr>

                                                <th>#ID</th>

                                                
                                                <th>Registration Number </th>

                                                <th>Roll No.</th>

                                                <th>Course Name </th>
                                                
                                                <th> Student Name </th>

                                                <th> DOB </th>

                                                <th> Father Name </th>

                                                <th>Image(s)</th>

                                                <th>Created Date</th>

                                                <th>Action</th>

                                            </tr>

                                        </thead>

                                        <tbody>

                                            <?php

                                            $deptlist_sql = "SELECT * FROM `tb_student` ORDER BY `id` ASC;";

                                            $deptlist_query = $conn->query($deptlist_sql);

                                            if ($deptlist_query->num_rows > 0) {

                                                while ($result = $deptlist_query->fetch_assoc()) {

                                                    $rdate = substr($result['session_start'], -2);
                                                    $course = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `tb_course` WHERE id='$result[course_id]'"));

                                            ?>

                                                    <tr data-id="<?php echo $result['id']; ?>" id="row<?php echo $result['id']; ?>" style="background:<?php

                                                                                                                                                        if ($result['status'] == 0) {

                                                                                                                                                            echo 'rgb(255, 0, 0,.1)';
                                                                                                                                                        } else if ($result['status'] == 1) {

                                                                                                                                                            echo 'rgb(255, 255, 255,1)';
                                                                                                                                                        }

                                                                                                                                                        ?>">

                                                        <td><?php echo $result['id']; ?></td>

                                                        <td><?php echo 'EI/' . $course['course_code'] . '/' . $rdate . $result['reg_month'] . $result['reg_no']; ?></td>

                                                        <td><?php echo $result['roll_no']; ?></td>

                                                        <td><?php echo $course['name']; ?></td>
                                                        
                                                        <td><?php echo $result['name']; ?></td>

                                                        <td><?php echo $result['dob']; ?></td>

                                                        <td><?php echo $result['father_name']; ?></td>

                                                        <td class="p-0 m-0" width="20">
                                                            
                                                            <?php if( $result['image'] ==''  ||  $result['image']== NULL){ ?>
                                                                <p><img src="https://placehold.jp/000000/ffffff/100x70.png?text=No%20Image" width="100%" /></p>
                                                            <?php 
                                                                }
                                                                    else
                                                                { 
                                                            ?>
                                                                <p><img src="../uploads/profile/<?php echo $result['image']; ?>" width="100%" /></p>
                                                            <?php } ?>
                                                            
                                                             <?php if( $result['signature_img'] ==''  ||  $result['signature_img']== NULL){ ?>
                                                                <p><img src="https://placehold.jp/12/dedede/000000/100x40.png?text=No%20Signature" width="100%" /></p>
                                                            <?php 
                                                                }
                                                                    else
                                                                { 
                                                            ?>
                                                                <p><img src="../uploads/profile/<?php echo $result['signature_img']; ?>" width="100%" /></p>
                                                            <?php } ?>
                                                            
                                                            

                                                        </td>



                                                        <td><?php echo $result['created_date']; ?></td>

                                                        <td>

                                                            <a href="student-edit.php?stu_id=<?php echo $result['id']; ?>" id="btn_edit" class="edit_btn btn btn-success"> Edit</a>

                                                            <?php

                                                            $btn_shows = $result['status'];

                                                            if ($btn_shows == 1) {

                                                            ?>

                                                                <button href="" id="btn_action" class="action_show_btn action_btn btn btn-info" data-id="<?php echo $result['id']; ?>" title="click to disabled">

                                                                    Enable</button>

                                                            <?php } else if ($result['status'] == 0) { ?>

                                                                <button id="btn_action" class="action_hide_btn action_btn btn btn-warning" data-id="<?php echo $result['id']; ?>" title="click to enable">

                                                                    Disable</button>

                                                            <?php } ?>

                                                            <!--<a id="btn_del" class="stud_del_btns btn btn-danger" data-id="<?php echo $result['id']; ?>">

                                                                Delete</a>-->

                                                        </td>

                                                    </tr>

                                            <?php

                                                }
                                            } else {

                                                echo "Sorry, no record found";
                                            }

                                            ?>

                                        </tbody>

                                        <tfoot>

                                            <tr>

                                                <th>#ID</th>

                                                <th>Registration Number </th>

                                                <th> Roll No. </th>
                                                
                                                <th>Course Name </th>

                                                <th> Student Name </th>

                                                <th> DOB </th>

                                                <th> Father Name </th>

                                                <th>Image(s)</th>

                                                <th>Created Date</th>

                                                <th>Action</th>

                                            </tr>

                                        </tfoot>

                                    </table>

                                </div>

                                <!-- /.card-body -->

                            </div>

                            <!-- /.card -->

                        </div>

                        <!-- /.col -->

                    </div>

                    <!-- /.row -->

                </div>

                <!-- /.container-fluid -->

            </section>

            <!-- /.content -->

        </div>

        <!-- /.content-wrapper -->

        <footer class="main-footer">

            <div class="float-right d-none d-sm-block">

                <b>Version</b> 3.1.0-rc

            </div>

            <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights

            reserved.

        </footer>



        <!-- Control Sidebar -->

        <aside class="control-sidebar control-sidebar-dark">

            <!-- Control sidebar content goes here -->

        </aside>

        <!-- /.control-sidebar -->

    </div>

    <!-- ./wrapper -->



    <!-- jQuery -->

    <script src="plugins/jquery/jquery.min.js"></script>

    <script src="custom.js"></script>

    <!-- Bootstrap 4 -->

    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- SweetAlert2 -->

    <script src="plugins/sweetalert2/sweetalert2.min.js"></script>

    <!-- DataTables  & Plugins -->

    <script src="plugins/datatables/jquery.dataTables.min.js"></script>

    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>

    <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>

    <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

    <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>

    <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>

    <script src="plugins/jszip/jszip.min.js"></script>

    <script src="plugins/pdfmake/pdfmake.min.js"></script>

    <script src="plugins/pdfmake/vfs_fonts.js"></script>

    <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>

    <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>

    <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

    <!-- AdminLTE App -->

    <script src="dist/js/adminlte.min.js"></script>

    <!-- AdminLTE for demo purposes -->

    <script src="dist/js/demo.js"></script>



    <!-- Page specific script -->

    <script>
        $(function() {

            $("#example1").DataTable({

                "responsive": true,

                "lengthChange": false,

                "autoWidth": false,

                "order": [
                    [0, "desc"]
                ],

                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]

            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

            $('#example2').DataTable({

                "paging": true,

                "lengthChange": false,

                "searching": false,

                "ordering": true,

                "info": true,

                "autoWidth": false,

                "responsive": true,

            });

        });
    </script>



</body>



</html>