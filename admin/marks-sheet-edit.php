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

$course = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `tb_course` WHERE `id`='$data[course_id]' "));



?>

<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Exponent Institute | Edit Marks Form</title>



    <!-- Google Font: Source Sans Pro -->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- Font Awesome -->

    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">

    <!-- SweetAlert2 -->

    <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

    <!-- Theme style -->

    <link rel="stylesheet" href="dist/css/adminlte.min.css">

    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">

    <script src="plugins/jquery/jquery.min.js"></script>

    <!--   <style>

        .note-editable {

            min-height: 250px;

        }

    </style> -->

</head>

<style>
    .certificate {

        position: relative;

        width: 100%;

        margin-top: 0px;

        /*  margin-left: auto;

            margin-right: auto; */

        text-align: left;

        line-height: 20px;

        padding: 47px;

        height: auto;

        vertical-align: middle;

        /* border: 2px solid black; */

        background-image: url(bg.png);

        background-size: 100% 100%;



    }







    .sn {

        font-size: 18px;

        text-align: center;

        float: left;

    }



    .reg {

        font-size: 18px;

        text-align: center;

        float: right;

    }



    .font-italic {

        font-style: italic;

    }



    .font-weight-bold {

        font-weight: bold;

    }



    .no-font {

        font-family: 'Arial black', serif !important;

    }



    .table td,

    .table th {

        padding: 0px !important;

        border-top: 0px !important;

    }



    .passport {

        height: 170px;

        width: 160px !important;

        border: 2px solid black;

        border-bottom: 0px;

        padding: 9px;

    }



    .signature {

        height: 45px;

        width: 160px !important;

        border: 2px solid black;

        padding: 9px;

    }



    h4.course {

        border: 2px solid;

        text-align: center;

        font-family: 'Arial', serif !important;

        margin: 0px 5% !important;

    }



    .course-short {

        text-align: center;

        font-family: 'Arial', serif !important;

    }



    /* bio table css */



    table.table.mt-2.bio {

        margin: 8px 41px !important;

    }



    span.title {

        font-weight: 500 !important;

        text-transform: capitalize;

    }



    span.value:before {

        content: ':';

        font-weight: 500 !important;

        padding-right: 25px;

    }



    span.value {

        font-weight: bold;

        text-transform: uppercase;

        display: inline-block;

        padding-right: 29px;

    }



    /* marks section css */



    .table-bordered {

        border: 2px solid black !important;

    }



    th {

        background-color: #fff3b2;

    }



    .table-bordered td {

        border: 0px !important;

        border: 1.5px solid black !important;

    }



    .table-bordered th {

        border: 1.5px solid black;

    }



    .marks-data {

        font-size: 18px !important;

        font-weight: 600 !important;

    }



    .internal-table {

        border: 0px !important;

    }



    .border-top {

        border-top: 1px solid black !important;

    }



    .border-right {

        border-right: 1px solid black !important;

    }



    table.text-uppercase.table-marks.internal-table {

        margin: 4px !important;

    }



    .marks-table>tbody>tr>td {

        line-height: 40px !important;

    }



    td.text-center.marks-data.marks-total {

        border: 1.5px solid black !important;

    }



    .result-box {

        border: 1.5px solid black;

    }



    .result-text {

        margin-left: 60px !important;

        font-weight: bold !important;

    }



    .mt-4.text-uppercase.grading-container {

        display: flex;

    }



    .margin-left-result {

        margin-left: 31% !important;

    }



    .qr {

        height: 100px;

        width: 100px;

        display: block;

        margin-left: auto;

        margin-right: auto
    }



    .marks-data input {

        width: 100%;

        border: 0;

        font-weight: normal;

    }



    .marks-data input:focus {

        outline: 0;

    }



    @media print {

        .table-bordered {

            border: 2px solid black !important;

        }



        th {

            background-color: #fff3b2;

        }



        .table-bordered td {

            border: 0px !important;

            border-right: 1.5px solid black !important;

        }



        .table-bordered th {

            border: 1.5px solid black;

        }



        .marks-data {

            font-size: 18px !important;

            font-weight: 600 !important;

        }



        .internal-table {

            border: 0px !important;

        }



        .border-top {

            border-top: 1px solid black !important;

        }



        .border-right {

            border-right: 1px solid black !important;

        }



        table.text-uppercase.table-marks.internal-table {

            margin: 4px !important;

        }



        .marks-table>tbody>tr>td {

            line-height: 40px !important;

        }



        td.text-center.marks-data.marks-total {

            border: 1.5px solid black !important;

        }







        .certificate {

            position: relative;

            width: 1100px;

            margin-top: 0px;

            margin-left: auto;

            margin-right: auto;

            text-align: left;

            line-height: 20px;

            padding: 47px;

            height: 1570px !important;

            /* border: 2px solid black; */

            background-image: url(bg.png);

            background-size: cover;

        }

    }
</style>



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

                            <h1>Edit Marks Sheet</h1>

                        </div>

                        <div class="col-sm-6">

                            <ol class="breadcrumb float-sm-right">

                                <li class="breadcrumb-item"><a href="#">Home</a></li>

                                <li class="breadcrumb-item active">Edit Marks Sheet</li>

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

                            <div class="card card-dark" style="min-height:700px">

                                <div class="card-header text-center">

                                    <h3 class="card-title">Generate Edit Marks Sheet </h3>

                                </div>

                                <!-- /.card-header -->

                                <!-- form start -->



                                <form id="updateMarks_sheet" data-id="<?php echo $id; ?>">

                                    <input type="hidden" id="et" name="et" value="<?= $et; ?>">

                                    <input type="hidden" id="st_id" name="st_id" value="<?= $data['id']; ?>">



                                    <div class="card-body">





                                        <h4 class="text-center m-auto"><strong>Student Detail</strong></h4>

                                        <div class="certificate">

                                            <div class=serial-register>

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

                                            <div class="logo ">

                                                <img src="header.png" width="100%">

                                            </div>

                                            <h5 class="text-center text-capitalize ">Result cum detail marks certificate</h5>



                                            <!-- bio section -->

                                            <div class="bio-container">

                                                <div class="table ">

                                                    <table class="table">

                                                        <tr>

                                                            <td width='90%'>

                                                                <h4 class="course text-uppercase"><strong> <?= $course['course_type'] . ' IN ' . $course['name']; ?> <br><span class="course-short">(<?= $course['course_code'] ?>)</span></strong>

                                                                </h4>





                                                                <!-- bio table started -->



                                                                <table class="table mt-2 bio">

                                                                    <tr>

                                                                        <td width='17%'>

                                                                            <span class="title">Name</span>

                                                                        </td>

                                                                        <td width='40%'>

                                                                            <span class="value"> <?= $data['name']; ?></span>

                                                                        </td>

                                                                        <td width='10%'>

                                                                            <span class="title">DOB</span>

                                                                        </td>

                                                                        <td width='30%'>

                                                                            <span class="value"> <?= $data['dob']; ?></span>

                                                                        </td>

                                                                    </tr>

                                                                    <tr>

                                                                        <td width='17%'>

                                                                            <span class="title">Father's Name</span>

                                                                        </td>

                                                                        <td width='40%'>

                                                                            <span class="value"> <?= $data['father_name']; ?></span>

                                                                        </td>

                                                                        <td width='10%'>

                                                                            <span class="title">Roll no.</span>

                                                                        </td>

                                                                        <td width='30%'>

                                                                            <span class="value"> <?php if ($et == 1) {

                                                                                                        echo  $data['roll_no'];
                                                                                                    } else if ($et == 2) {

                                                                                                        echo  $data['roll_no2'];
                                                                                                    } ?></span>

                                                                        </td>

                                                                    </tr>

                                                                    <tr>

                                                                        <td width='17%'>

                                                                            <span class="title">mother's Name</span>

                                                                        </td>

                                                                        <td width='40%'>

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

                                                                        <td colspan="4" width='80%'>

                                                                            <span class="value"> <?= $data['centre_name']; ?></span>

                                                                        </td>

                                                                </table>





                                                            </td>

                                                            <!-- image section -->

                                                            <td class="photo-section"> <img class=' passport ' src="../uploads/profile/<?= $data['image']; ?>" alt=""> <br><img class='signature ' src="../uploads/profile/<?= $data['signature_img']; ?>" alt=""> </td>

                                                        </tr>

                                                    </table>

                                                    <!-- marks section started -->

                                                    <h5 class="text-center text-uppercase ">Detail of marks</h5>

                                                    <div class="marks-container">



                                                        <table class="table-bordered marks-table text-uppercase" style="width:100%">

                                                            <tr>

                                                                <th scope="col" class="text-center text-uppercase " width='12%'>Subject Code

                                                                </th>

                                                                <th scope="col" class="text-center text-uppercase " width='36%'>Subject</th>

                                                                <th colspan="3" scope="col" class="text-center text-uppercase" width='32%'>

                                                                    <table class="text-uppercase table-marks internal-table" style="width:100%">

                                                                        <tr>

                                                                            <th colspan="3" class="text-center text-uppercase internal-table no-border" width='100%'>

                                                                                Marks Obtained

                                                                            </th>

                                                                        </tr>

                                                                        <tr class="border-top">

                                                                            <th scope="col" class="text-center text-uppercase internal-table border-right" width='9%'>Theory

                                                                            </th>

                                                                            <th scope="col" class="text-center text-uppercase internal-table border-right" width='12%'>

                                                                                Pratical

                                                                            </th>

                                                                            <th scope="col" class="text-center text-uppercase internal-table " width='9%'>Total marks

                                                                            </th>

                                                                        </tr>

                                                                    </table>

                                                                </th>

                                                                <th scope="col" class="text-center text-uppercase " width='12%'>Max Marks</th>

                                                                <th scope="col" class="text-center text-uppercase " width='12%'>Grade</th>

                                                            </tr>

                                                            <?php

                                                            $a = 1;

                                                            while ($rows = mysqli_fetch_array($marks_query)) {

                                                                $sub = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `tb_subject` WHERE `id`='$rows[sub_id]'"));

                                                            ?>



                                                                <tr>

                                                                    <input type="hidden" name="sub_id[]" value="<?= $sub['id']; ?>">

                                                                    <td class="text-center marks-data" width='12%'><?= $course['course_code'] . '-' . $sub['sub_code']; ?></td>

                                                                    <td class="text-left pl-2 marks-data" width='34%'><?= $sub['sub_name'] ?></td>

                                                                    <td class="text-center marks-data" width='10.5%'><input type="text" id="the<?= $a; ?>" class="m-0 " name="ob_theory[]" placeholder="Enter theory marks" value="<?= $rows['ob_theory']; ?>"></td>

                                                                    <td class="text-center marks-data" width='12%'><input type="text" id="pra<?= $a; ?>" class="m-0 " name="ob_practical[]" placeholder="Enter practical marks" value="<?= $rows['ob_practical']; ?>"></td>

                                                                    <td class="text-center marks-data" width='9%'><input type="text" id="sum<?= $a; ?>" class="m-0 " name="ob_total[]" style="background:#eee" placeholder="Total marks" value="<?= $rows['total_marks']; ?>" readonly></td>

                                                                    <td class="text-center marks-data" width='12%'><input type="text" class="m-0 " id="max<?= $a; ?>" name="max_marks[]" placeholder="Max marks" value="<?= $rows['max_marks']; ?>"></td>

                                                                    <td class="text-center marks-data" width='12%'><input type="text" id="gra<?= $a; ?>" class="m-0 " style="background:#eee" name="ob_grade[]" placeholder="Grade" value="<?= $rows['grade']; ?>" readonly></td>

                                                                </tr>

                                                                <script>
                                                                    $(function() {

                                                                        $('#the<?= $a; ?>, #pra<?= $a; ?>').keyup(function() {



                                                                            var the = parseInt($('#the<?= $a; ?>').val()) || 0;

                                                                            var pra = parseInt($('#pra<?= $a; ?>').val()) || 0;

                                                                            var tot = the + pra;

                                                                            $('#sum<?= $a; ?>').val(tot);



                                                                            var tot = parseInt($('#sum<?= $a; ?>').val()) || 0;

                                                                            var max = parseInt($('#max<?= $a; ?>').val()) || 0;

                                                                            var gra = parseInt((tot / max) * 100);

                                                                            if (gra <= 100 && gra >= 81) {

                                                                                grade = 'A';

                                                                            } else if (gra <= 80 && gra >= 61) {

                                                                                grade = 'B';

                                                                            } else if (gra <= 60 && gra >= 41) {

                                                                                grade = 'C';



                                                                            } else if (gra <= 40 && gra >= 33) {

                                                                                grade = 'D';

                                                                            } else if (gra <= 32 && gra >= 20) {

                                                                                grade = 'E';

                                                                            } else {

                                                                                grade = 'OB';

                                                                            }

                                                                            $('#gra<?= $a; ?>').val(grade);







                                                                        });

                                                                        $('#max<?= $a; ?>').keyup(function() {

                                                                            var tot = parseInt($('#sum<?= $a; ?>').val()) || 0;

                                                                            var max = parseInt($('#max<?= $a; ?>').val()) || 0;

                                                                            var gra = parseInt((tot / max) * 100);

                                                                            if (gra <= 100 && gra >= 81) {

                                                                                grade = 'A';

                                                                            } else if (gra <= 80 && gra >= 61) {

                                                                                grade = 'B';

                                                                            } else if (gra <= 60 && gra >= 41) {

                                                                                grade = 'C';



                                                                            } else if (gra <= 40 && gra >= 33) {

                                                                                grade = 'D';

                                                                            } else if (gra <= 32 && gra >= 20) {

                                                                                grade = 'E';

                                                                            } else {

                                                                                grade = 'OB';

                                                                            }

                                                                            $('#gra<?= $a; ?>').val(grade);



                                                                        });



                                                                    });
                                                                </script>

                                                            <?php $a++;
                                                            } ?>

                                                            <tr>

                                                                <td class="text-center marks-data marks-total p-2" colspan="4">TOTAL</td>

                                                                <td class="text-center marks-data  marks-total " width='10%'><input type="text" class="m-0 " id="gsum" name="ob_grand_tot" placeholder="Grand obtained" style="background:#eee" value=" <?= $tot['grand_tot']; ?>" readonly>

                                                                </td>

                                                                <td class="text-center marks-data marks-total " width='12%'><input type="text" class="m-0 " id="gmax" name="grand_max" placeholder="Grand max marks" style="background:#eee" value=" <?= $tot['max_marks']; ?>" readonly>

                                                                </td>

                                                                <td class="text-center marks-data marks-total " width='12%'><input type="text" class="m-0 " id="ggra" name="ob_grand_grade" placeholder="Grand grade" style="background:#eee" value=" <?= $tot['grand_grade']; ?>" readonly>

                                                                </td>

                                                            </tr>

                                                            <script>
                                                                $(function() {

                                                                    for (var i = 1; i <= <?= $subC; ?>; i++) {

                                                                        document.getElementById('the' + i).addEventListener('keyup', sumCalc);

                                                                        document.getElementById('pra' + i).addEventListener('keyup', sumCalc);

                                                                        document.getElementById('max' + i).addEventListener('change', gsumCalc);

                                                                        document.getElementById('max' + i).addEventListener('change', gmaxCalc);

                                                                    }

                                                                    // }







                                                                    function sumCalc() {

                                                                        var s = 0;

                                                                        for (var a = 1; a <= <?= $subC; ?>; a++) {

                                                                            if ($('#sum' + a).val() != "") {

                                                                                s += parseInt($('#sum' + a).val());

                                                                            }



                                                                        }

                                                                        $('#gsum').val(s);

                                                                        var ms = 0;

                                                                        var gm = 0;

                                                                        for (var a = 1; a <= <?= $subC; ?>; a++) {

                                                                            if ($('#sum' + a).val() != "") {

                                                                                ms += parseInt($('#sum' + a).val());

                                                                            }



                                                                        }

                                                                        for (var b = 1; b <= <?= $subC; ?>; b++) {

                                                                            if ($('#max' + b).val() != "") {

                                                                                gm += parseInt($('#max' + b).val());

                                                                            }



                                                                        }



                                                                        var gra = (ms / gm) * 100;

                                                                        if (gra <= 100 && gra >= 81) {

                                                                            grade = 'A';

                                                                        } else if (gra <= 80 && gra >= 61) {

                                                                            grade = 'B';

                                                                        } else if (gra <= 60 && gra >= 41) {

                                                                            grade = 'C';



                                                                        } else if (gra <= 40 && gra >= 33) {

                                                                            grade = 'D';

                                                                        } else if (gra <= 32 && gra >= 20) {

                                                                            grade = 'E';

                                                                        }

                                                                        $('#ggra').val(grade);

                                                                    }







                                                                    function gsumCalc() {

                                                                        var g = 0;

                                                                        for (var b = 1; b <= <?= $subC; ?>; b++) {

                                                                            if ($('#max' + b).val() != "") {

                                                                                g += parseInt($('#max' + b).val());

                                                                            }



                                                                        }

                                                                        $('#gmax').val(g);





                                                                    }



                                                                    function gmaxCalc() {

                                                                        var ms = 0;

                                                                        var gm = 0;

                                                                        for (var a = 1; a <= <?= $subC; ?>; a++) {

                                                                            if ($('#sum' + a).val() != "") {

                                                                                ms += parseInt($('#sum' + a).val());

                                                                            }



                                                                        }

                                                                        for (var b = 1; b <= <?= $subC; ?>; b++) {

                                                                            if ($('#max' + b).val() != "") {

                                                                                gm += parseInt($('#max' + b).val());

                                                                            }



                                                                        }



                                                                        var gra = (ms / gm) * 100;

                                                                        if (gra <= 100 && gra >= 81) {

                                                                            grade = 'A';

                                                                        } else if (gra <= 80 && gra >= 61) {

                                                                            grade = 'B';

                                                                        } else if (gra <= 60 && gra >= 41) {

                                                                            grade = 'C';



                                                                        } else if (gra <= 40 && gra >= 33) {

                                                                            grade = 'D';

                                                                        } else if (gra <= 32 && gra >= 20) {

                                                                            grade = 'E';

                                                                        }

                                                                        $('#ggra').val(grade);

                                                                    }

                                                                });
                                                            </script>



                                                        </table>

                                                        <div class="mt-4 text-uppercase grading-container">



                                                            <div class="text-center p-3 result-box mr-50">Result:

                                                                <span class="result-text"> <select name="result" style="width:100px">

                                                                        <option <?php if ($tot['result'] == 'Pass') {

                                                                                    echo 'selected';
                                                                                } ?>>Pass</option>

                                                                        <option <?php if ($tot['result'] == 'Failed') {

                                                                                    echo 'selected';
                                                                                } ?>>Failed</option>



                                                                    </select>

                                                            </div>





                                                        </div>



                                                    </div>

                                                </div>

                                            </div>

                                            <div style="margin-bottom: 10%;"><img class="qr mx-auto mt-5" src="../<?= $tot['qr']; ?>" alt=""> </div>

                                        </div>

                                        <div class="form-group row mt-4">

                                            <div class="col-md-2">

                                                <div class="custom-control custom-radio">

                                                    <input class="custom-control-input custom-control-input-primary custom-control-input-outline" type="radio" id="customRadio5" name="status" value="0" <?php if ($tot['status'] == 0) {

                                                                                                                                                                                                                echo "checked";
                                                                                                                                                                                                            }

                                                                                                                                                                                                            ?>>

                                                    <label for="customRadio5" class="custom-control-label">Enable</label>

                                                </div>

                                            </div>

                                            <div class="col-md-2">

                                                <div class="custom-control custom-radio">

                                                    <input class="custom-control-input custom-control-input-danger custom-control-input-outline" type="radio" id="customRadio6" name="status" value="1" <?php if ($tot['status'] == 1) {

                                                                                                                                                                                                            echo "checked";
                                                                                                                                                                                                        } ?>>

                                                    <label for="customRadio6" class="custom-control-label">

                                                        Disabled</label>

                                                </div>

                                            </div>

                                        </div>







                                        <div class=" mt-5">

                                            <button type="submit" class="btn btn-secondary d-block m-auto" id="updateMakrs_btn">Update Marks Sheet</button>

                                        </div>





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







</body>



</html>