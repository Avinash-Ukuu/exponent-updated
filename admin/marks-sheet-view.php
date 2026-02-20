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

if ($tot['issue_date'] == '0000-00-00') {



    $day = mt_rand(1, 15);

    $month =  $day . '-' . $data['reg_month'] . '-' . $data['session_end'];

    $issueDate = date('Y-m-d', strtotime($month . '+1 month'));
} else {

    $issueDate = $tot['issue_date'];
}

$course = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `tb_course` WHERE `id`='$data[course_id]' "));



?>

<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Exponent Institute | View Marks Form</title>



    <!-- Google Font: Source Sans Pro -->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- Font Awesome -->

    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css" media="all" />

    <!-- SweetAlert2 -->

    <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css" media="all">

    <!-- Theme style -->

    <link rel="stylesheet" href="dist/css/adminlte.min.css" media="all">

    <link rel="stylesheet" href="dist/css/certificates.css" media="all" />

    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">

    <script src="plugins/jquery/jquery.min.js"></script>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <link rel="stylesheet" href="/resources/demos/style.css">

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <style>
        html,

        body {

            font-family: "Times New Roman", Times, serif !important;

            font-size: 1.1rem;

            line-height: 1.3;





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

                    <a href="../../index3.html" class="nav-link">Home</a>

                </li>

                <li class="nav-item d-none d-sm-inline-block">

                    <a href="#" class="nav-link">Marks Sheet</a>

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

                                <li class="breadcrumb-item active">Marks Sheet</li>

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

                                <form action="mark-sheet-print.php">

                                    <div class="card-header text-center col-sm-12">

                                        <h3 class="card-title"><span>View Marks Sheet</span> </h3>

                                        <span class="float-right">

                                            <button type="submit" class="btn btn-secondary"><i class="fa fa-print" title="click to print"></i></button>

                                        </span>

                                        <!-- <a href="mark-sheet-print.php?id=<?= $id; ?>&st_id=<?= $st_id; ?>&et=<?= $et; ?>"><i class="fa fa-print" title="click to print"></i></a> -->

                                        <!--  <span class="float-right"><i class="fa fa-print" title="click to print" onclick="printDiv()"></i></span> -->

                                    </div>



                                    <!-- /.card-header -->

                                    <!-- form start -->

                                    <!-- id="updateMarks_sheet" data-id="< ?php echo $id; ?>" -->

                                    <input type="hidden" id="id" name="id" value="<?= $id; ?>">

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

                                                        <div class="col-md-10 col-sm-10 mt-2 ml-3">


                                                            <h5 class="course text-uppercase cours_fullname py-1 "> <strong> <?= $course['course_type'] . ' IN ' . $course['name']; ?> <br><span class="course-short">(<?= $course['course_code'] ?>)</span></strong>

                                                            </h5>

                                                            <table class="table mt-2 ml-3">

                                                                <tr>

                                                                    <td width="10%">

                                                                        <span class="title">Name</span>

                                                                    </td>

                                                                    <td width="50%">

                                                                        <span class="value"> <?= $data['name']; ?></span>

                                                                    </td>

                                                                    <td width="10%">

                                                                        <span class="title">DOB</span>

                                                                    </td>

                                                                    <td width="30%">

                                                                        <span class="value"> <?= $dob; ?></span>

                                                                    </td>

                                                                </tr>

                                                                <tr>

                                                                    <td width="10%">

                                                                        <span class="title">Father's Name</span>

                                                                    </td>

                                                                    <td width="50%">

                                                                        <span class="value"> <?= $data['father_name']; ?></span>

                                                                    </td>

                                                                    <td width="10%">

                                                                        <span class="title">Roll no.</span>

                                                                    </td>

                                                                    <td width="30%">

                                                                        <span class="value"> <?php if ($et == 1) {

                                                                                                    echo  $data['roll_no'];
                                                                                                } else if ($et == 2) {

                                                                                                    echo  $data['roll_no2'];
                                                                                                } ?></span>

                                                                    </td>

                                                                </tr>

                                                                <tr>

                                                                    <td width='10%'>

                                                                        <span class="title">mother's Name</span>

                                                                    </td>

                                                                    <td width='50%'>

                                                                        <span class="value"> <?= $data['mother_name']; ?></span>

                                                                    </td>

                                                                    <td width='10%'>

                                                                        <span class="title">year/Sem</span>

                                                                    </td>

                                                                    <td width='30%'>

                                                                        <span class="value"> <?= $course['course_duration']; ?></span>

                                                                    </td>

                                                                </tr>

                                                                <tr>

                                                                    <td width='17%'>

                                                                        <span class="title">Training Center</span>

                                                                    </td>

                                                                    <td colspan="4" width='83%'>
                                                                    	<?php
						                                                    $centreID = $data['centre_id'];
						                                                    $chk_centre_name = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `franchises_centre` WHERE `id` = $centreID"));

						                                                 ?>
						                                                <span class="value"> <?= $chk_centre_name['c_name']; ?></span>
                                                                        <!--<span class="value"> <?//= $data['centre_name']; ?></span>-->

                                                                    </td>

                                                                </tr>

                                                            </table>

                                                        </div>

                                                        <div class=" col-md-2 col-sm-2 text-right mt-2" style="margin-left: -3%;">

                                                            <p class="m-0"><img class="passport" src="../uploads/profile/<?= $data['image']; ?>" alt="" style="background-color: #ffffff;"></p>

                                                            <p><img class='signature ' src="../uploads/profile/<?= $data['signature_img']; ?>" alt="" style="background-color: #ffffff;"></p>



                                                        </div>

                                                    </div>

                                                </div>

                                                <div class="container-fluid font-19 px40">

                                                    <div class="row">



                                                        <table class="table table-bordered marks-table text-uppercase marked_table tb-color" style="width:100%; ">



                                                            <tr>

                                                                <th scope="col" class="text-center text-uppercase tb_head_bold align-middle" width='10%'>Subject<br> Code

                                                                </th>

                                                                <th scope="col" class="text-center text-uppercase tb_head_bold align-middle" width='44%'>Subject</th>

                                                                <th colspan="3" scope="col" class="text-center text-uppercase tb_head_bold align-middle" style="padding-top:2px !important" width='25%'>Marks Obtained

                                                                    <table class="tb-color text-uppercase " style="width:100%;">



                                                                        <tr class="border-top color ">

                                                                            <td width='31.7%' scope="col" class="text-center  text-uppercase internal-table align-middle">Theory

                                                                            </td>

                                                                            <td width='32%' scope="col" class="text-center text-uppercase internal-table align-middle">

                                                                                Pratical

                                                                            </td>

                                                                            <td width='36.3%' scope="col" class="text-center text-uppercase internal-table align-middle" style="border-right: 0px !important">Total<br> marks

                                                                            </td>

                                                                        </tr>

                                                                    </table>

                                                                </th>

                                                                <th scope="col" class="text-center text-uppercase tb_head_bold align-middle" width='8%'>Max<br> Marks</th>

                                                                <th scope="col" class="text-center text-uppercase tb_head_bold align-middle" width='13%'>Grade</th>



                                                            </tr>







                                                            <?php

                                                            $a = 1;

                                                            $count_r = mysqli_num_rows($marks_query);

                                                            while ($rows = mysqli_fetch_array($marks_query)) {

                                                                $sub = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `tb_subject` WHERE `id`='$rows[sub_id]'"));

                                                            ?>



                                                                <tr class="marks">

                                                                    <!-- <input type="hidden" name="sub_id[]" value="< ?= $sub['id']; ?>"> -->

                                                                    <td class="text-center marks-data" width='10%'><?= $course['course_code'] . '-' . $sub['sub_code']; ?></td>

                                                                    <td class="text-left pl-2 marks-data" width='44%'><?= $sub['sub_name'] ?></td>

                                                                    <td class="text-center marks-data" width='9%'><?php if ($rows['ob_theory'] != 0) {

                                                                                                                        echo $rows['ob_theory'];
                                                                                                                    } else {

                                                                                                                        echo "**";
                                                                                                                    }  ?></td>

                                                                    <td class="text-center marks-data" width='9%'><?php if ($rows['ob_practical'] != 0) {

                                                                                                                        echo $rows['ob_practical'];
                                                                                                                    } else {

                                                                                                                        echo "**";
                                                                                                                    }  ?></td>

                                                                    <td class="text-center marks-data" width='7%'><?= $rows['total_marks']; ?></td>

                                                                    <td class="text-center marks-data" width='8%'><?= $rows['max_marks']; ?></td>

                                                                    <td class="text-center marks-data" width='13%'><?= $rows['grade']; ?></td>

                                                                </tr>



                                                            <?php $a++;
                                                            }

                                                            $r = 10 - $count_r;

                                                            for ($x = 1; $x <= $r; $x++) {

                                                            ?>

                                                                <tr class="marks">

                                                                    <td>&nbsp;</td>

                                                                    <td></td>

                                                                    <td></td>

                                                                    <td></td>

                                                                    <td></td>

                                                                    <td></td>

                                                                    <td></td>

                                                                </tr>

                                                            <?php

                                                            }



                                                            ?>







                                                            <tr>

                                                                <td class="text-center marks-data marks-total p-2" colspan="4">TOTAL</td>

                                                                <td class="text-center marks-data  marks-total marks-total-num" width='10%'><?= $tot['grand_tot']; ?>

                                                                </td>

                                                                <td class="text-center marks-data marks-total marks-total-num" width='12%'><?= $tot['max_marks']; ?>

                                                                </td>

                                                                <td class="text-center marks-data marks-total marks-total-num" width='14%'><?= $tot['grand_grade']; ?>

                                                                </td>

                                                            </tr>







                                                        </table>





                                                    </div>

                                                </div>



                                                <div class="row mt-2 px40">

                                                    <div class="col-md-4 col-sm-4 pr-4">

                                                        <div class="py-2 px-2 result-box  text-uppercase">Result:

                                                            <span class="result-text"><strong><?= $tot['result']; ?></strong>

                                                        </div>

                                                    </div>

                                                    <div class="col-md-4 col-sm-4 px-4">

                                                        <div class="py-2 px-2  result-box  text-uppercase">Grade:

                                                            <span class="result-text"><strong><?= $tot['grand_grade']; ?></strong>

                                                        </div>

                                                    </div>

                                                    <div class="col-md-4 col-sm-4 pl-4">

                                                        <div class="py-2 px-1 result-box text-uppercase">Date of issue:

                                                            <span class="result-text"><strong class="text-left">

                                                                    <!-- --><input type="text" name="dt" id="datepicker" value="<?= $issueDate; ?>">

                                                                </strong>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>





                                            <div>

                                                <img class="qr mx-auto mt-2" src="../<?= $tot['qr']; ?>" alt="">

                                            </div>



                                            <div class="container-fluid mt-4">

                                                <div class="row">

                                                    <div class="col-md-3 col-sm-3">

                                                        <div class=" text-center grading-container">

                                                            <p class="p-0 m-0">Traning Center</p>

                                                            <strong>(Sign With Stamp)</strong>

                                                        </div>

                                                    </div><!-- // col-md-4 -->



                                                    <div class="col-md-3 col-sm-3 offset-sm-6">

                                                        <div class=" text-center grading-container">

                                                            <p class="p-0 m-0">Controller of Exam</p>

                                                            <strong>(Exponent Institute)</strong>

                                                        </div>

                                                    </div><!-- // col-md-4 -->

                                                    <div class="col-md-12 col-sm-12 p-0" style="margin-top: 12px;">

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
        $(function() {

            $("#datepicker").datepicker({

                dateFormat: "dd-mm-yy",

            });

        });
    </script>

    <script>
        /* function printDiv() {

    var divContents = document.getElementById("record").innerHTML;

    var a = window.open('', '', 'height=500, width=500');

    a.document.write('<html>');

    a.document.write('



    <head>

        <link href="dist/css/adminlte.min.css" rel="stylesheet" media="all">

        <link href="dist/css/certificates.css" rel="stylesheet" media="all">');



        a.document.write('

    </head>



    <body>');

        a.document.write(divContents);

        a.document.write('</body>



    </html>');

    a.document.close();

    a.onafterprint = window.close;

    a.print();

    } */
    </script>



</body>



</html>