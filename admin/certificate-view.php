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

$id = $_GET['id'];

$st_id = $_GET['st_id'];

$et = $_GET['et'];



$marks_query = mysqli_query($conn, "SELECT * FROM `tb_marks_sheet` WHERE `st_id`='$st_id' && exam_term='$et' ");

$subC = mysqli_num_rows($marks_query);



$rndata = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `tb_admit_card` WHERE `st_id`='$st_id' && exam_term='$et'"));

$tot = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `tb_tot_marks` WHERE `id`='$id' "));



$data = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `tb_student` WHERE `id`='$st_id' "));
$sdate = $data['session_end'] . $data['reg_month'];
$sr_no = $sdate . $tot['serial_no'];
$regd =  substr($data['session_start'], -2);

$dob = date('d/m/Y', strtotime($data['dob']));



if ($data['course_duration'] == '6 Month') {

    $lastmonth = $data['reg_month'] - 7;
} else if ($data['course_duration'] == '3 Month') {

    $lastmonth = $data['reg_month'] - 10;
} else {

    $lastmonth = $data['reg_month'] - 1;
}

$rsdate = substr($data['session_start'], -2);

$reg_month =  date("F", mktime(0, 0, 0, $data['reg_month'], 10));



$end_month =  date("F", mktime(0, 0, 0, $lastmonth, 10));



$course = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `tb_course` WHERE `id`='$data[course_id]' "));



?>

<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Exponent Institute | Certificate</title>



    <!-- Google Font: Source Sans Pro -->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- Font Awesome -->

    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">

    <!-- SweetAlert2 -->

    <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

    <!-- Theme style -->

    <link rel="stylesheet" href="dist/css/adminlte.min.css">

    <link rel="stylesheet" href="dist/css/certificates.css">

    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">

    <script src="plugins/jquery/jquery.min.js"></script>

    <!--   <style>

        .note-editable {

            min-height: 250px;

        }

    </style> -->





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

                    <a href="../../index3.html" class="nav-link">Home</a>

                </li>

                <li class="nav-item d-none d-sm-inline-block">

                    <a href="#" class="nav-link">Certificate</a>

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

                            <h1>Marks Sheet</h1>

                        </div>

                        <div class="col-sm-6">

                            <ol class="breadcrumb float-sm-right">

                                <li class="breadcrumb-item"><a href="#">Home</a></li>

                                <li class="breadcrumb-item active">Certificate</li>

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

                            <!-- general form elements -->

                            <div class="card card-dark" style="min-height:650px">

                                <form action="certificate-view-print.php">

                                    <div class="card-header text-center col-sm-12">

                                        <h3 class="card-title"><span>Certificate</span> </h3>

                                        <span class="float-right">

                                            <button type="submit" class="btn btn-secondary"><i class="fa fa-print" title="click to print"></i></button>

                                        </span>



                                    </div>



                                    <!-- <span class="float-right"><i class="fa fa-print" title="click to print" onclick="printDiv()"></i></span> -->

                                    <!-- /.card-header -->

                                    <!-- form start -->





                                    <input type="hidden" id="et" name="id" value="<?= $id; ?>">

                                    <input type="hidden" id="et" name="et" value="<?= $et; ?>">

                                    <input type="hidden" id="st_id" name="st_id" value="<?= $data['id']; ?>">



                                    <div class="card-body" id="record">









                                        <!-- Start Certificate -->

                                        <div class="certificate" style="background-image:url(dist/img/certificate-background.jpg);">

                                            <div class="certificate-wrapper">



                                                <div class="serial-register">

                                                    <div class='sn ml-4'>

                                                        <p class="font-italic m-0 mb-1"> Serial No.</p>

                                                        <span id="sn " class="font-weight-bold"> <?= $sr_no; ?></span>

                                                        </span>

                                                    </div>

                                                    <div class='reg mr-4'>

                                                        <p class=" font-italic m-0 mb-1 "> Registration No.

                                                        </p>

                                                        <span id="sn" class="font-weight-bold"> EI/<?= $course['course_code'] ?>/<?= $regd . $data['reg_month'] . $data['reg_no']; ?></span>

                                                    </div>

                                                </div>

                                                <div class="logo">

                                                    <img src="dist/img/header-logo.png" width="100%">

                                                </div>





                                                <!-- bio section -->

                                                <div class="container-fluid">

                                                    <div class="row">

                                                        <div class="col-sm-9">

                                                            <div class="certi-head-text">

                                                                <img src="dist/img/diploma.png" width="200px" />

                                                            </div>

                                                        </div>

                                                        <div class="col-sm-3 text-right mt-4 " style="margin-left: -3.5%;">

                                                            <p class="m-0"><img class="passport" src="../uploads/profile/<?= $data['image']; ?>" alt="" style="background-color: #ffffff;"></p>

                                                            <p><img class='signature ' src="../uploads/profile/<?= $data['signature_img']; ?>" alt="" style="background-color: #ffffff;"></p>



                                                        </div>

                                                    </div>

                                                </div>

                                                <div class="container-fluid font-19">

                                                    <div class="row">

                                                        <div class="col-sm-12">

                                                            <div class="certi_inner px40">

                                                                <p>

                                                                    This is certify that Mr./Ms. <span class="text-uppercase border-line-bottom text-decorate brd74 font-lg pl-17"><b><?= $data['name']; ?></b></span>

                                                                </p>

                                                                <p>

                                                                    Son/Daughter of sh. <span class="text-uppercase border-line-bottom text-decorate brd72 font-lg pl-23"><b><?= $data['father_name']; ?></b></span> (Father)

                                                                </p>

                                                                <p>

                                                                    and Smt. <span class="text-uppercase border-line-bottom text-decorate brd82 font-lg pl-33"><b><?= $data['mother_name']; ?></b></span> (Mother)

                                                                </p>

                                                                <p>

                                                                    having D.O.B.<span class="text-uppercase border-line-bottom text-decorate text-center brd22"><b><?= $dob; ?></b></span> and Roll. No.<span class="text-uppercase border-line-bottom text-decorate text-center brd25"><b><?= $data['roll_no']; ?></b></span> has successfully compeleted </p>

                                                                <p> the traning program <span class="text-uppercase border-line-bottom text-decorate text-center brd80"><b><?= $course['course_type'] . ' IN ' . $course['name']; ?> (<?= $course['course_code'] ?>)</b></span> </p>

                                                                <p>at <span class="text-uppercase border-line-bottom text-decorate text-center brd97">
                                                                    <b>
                                                                        <?php
                                                                            $centreID = $data['centre_id'];
                                                                            $chk_centre_name = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `franchises_centre` WHERE `id` = $centreID"));

                                                                         ?>
                                                                         <!-- <? //= $chk_centre_name['c_name']; ?> -->
                                                                        <?= $data['centre_name']; ?></b></span> 

                                                                </p>

                                                                <p>with Grade <span class="text-uppercase border-line-bottom text-decorate text-center brd35">

                                                                        <b><?= $tot['grand_grade']; ?></b></span> of duration <span class="text-uppercase  border-line-bottom text-decorate text-center brd42"><b><?= $course['course_duration']; ?></b></span> </p>

                                                                <p>conducted from <span class="text-uppercase border-line-bottom text-decorate text-center brd33"><b><?= $reg_month; ?> <?= $data['session_start']; ?> </b></span> to <span class="text-uppercase border-line-bottom text-decorate text-center brd48"><b><?= $end_month; ?> <?= $data['session_end']; ?></b></span> </p>

                                                                <p>securing <span class="text-uppercase border-line-bottom text-decorate text-center brd38"><b><?= $tot['grand_tot']; ?></b></span> out of <span class="text-uppercase border-line-bottom text-decorate text-center brd14"><b><?= $tot['max_marks']; ?></b></span> is hereby awarded this certificate.</p>

                                                            </div>

                                                        </div>

                                                    </div>

                                                </div><!-- // container-fluid -->

                                            </div>



                                            <div>

                                                <img class="qr mx-auto" src="../<?= $tot['qr']; ?>" alt="">

                                            </div>



                                            <div class="container-fluid">

                                                <div class="row">

                                                    <div class="col-md-3 col-sm-3">

                                                        <div class="mt-4 mb-1 text-center grading-container">

                                                            <p class="p-0 m-0">Traning Center</p>

                                                            <strong>(Sign With Stamp)</strong>

                                                        </div>

                                                    </div><!-- // col-md-4 -->



                                                    <div class="col-md-3 col-sm-3 offset-sm-6">

                                                        <div class="mt-4 mb-1 text-center grading-container">

                                                            <p class="p-0 m-0">Controller of Exam</p>

                                                            <strong>(Exponent Institute)</strong>

                                                        </div>

                                                    </div><!-- // col-md-4 -->

                                                    <div class="col-md-12 col-sm-12 p-0" style="margin-top: 10px;">

                                                        <div class="text-center grading-container text-center">

                                                            <p class="p-0 m-0"><small style="font-weight: 600;font-size: 16px;">Verification visit : www.exponentinstitute.com | info@exponentinstitute.com</small></p>

                                                        </div>

                                                    </div><!-- // col-md-4 -->

                                                </div>

                                            </div><!-- // container-fluid -->

                                        </div><!-- // End Certificate -->

                                    </div>

                                </form>



                                <!-- /.card -->









                                <!--/.col (left) -->

                                <!-- right column -->



                                <!--/.col (right) -->

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

    <!-- <script src="plugins/jquery/jquery.min.js"></script> -->



    <!-- Bootstrap 4 -->

    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- bs-custom-file-input -->

    <script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

    <!-- AdminLTE App -->

    <script src="dist/js/adminlte.min.js"></script>

    <!-- AdminLTE for demo purposes -->

    <script src="dist/js/demo.js"></script>

    <!-- Page specific script -->

    <script>
        $(function() {

            bsCustomFileInput.init();

        });
    </script>

    <!-- SweetAlert2 -->

    <script src="plugins/sweetalert2/sweetalert2.min.js"></script>

    <!-- Summernote -->

    <script src="plugins/summernote/summernote-bs4.min.js"></script>





    <!-- Custom form -->

    <script src="custom.js"></script>



    <script>
        function printDiv() {

            var divContents = document.getElementById("record").innerHTML;

            var a = window.open('', '', 'height=500, width=500');

            a.document.write('<html>');

            a.document.write('<head><link href="dist/css/adminlte.min.css" rel="stylesheet" media="all"> <link href="dist/css/certificates.css" rel="stylesheet" media="all">');



            a.document.write(' </head><body>');

            a.document.write(divContents);

            a.document.write('</body></html>');

            a.document.close();

            a.onafterprint = window.close;

            a.print();



        }
    </script>



</body>



</html>