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

    <title>Exponent Institute | Department Form</title>



    <!-- Google Font: Source Sans Pro -->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- Font Awesome -->

    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">



    <!-- daterange picker -->

    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">

    <!-- Tempusdominus Bootstrap 4 -->

    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

    <link href="https://adminlte.io/themes/AdminLTE/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet" />

    <!-- SweetAlert2 -->

    <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

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

                            <h1>Student</h1>

                        </div>

                        <div class="col-sm-6">

                            <ol class="breadcrumb float-sm-right">

                                <li class="breadcrumb-item"><a href="#">Home</a></li>

                                <li class="breadcrumb-item active">Student</li>

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

                        <div class="col-md-6">

                            <!-- general form elements -->

                            <div class="card card-primary">

                                <div class="card-header">

                                    <h3 class="card-title">Edit Student data</h3>

                                </div>

                                <!-- /.card-header -->

                                <!-- form start -->

                                <?php

                                $studtID = getNGet('stu_id');

                                $studtlist_sql = "SELECT stu.*, dept.`id` as mydept_id, dept.`name` as dept_full_name FROM `tb_student` stu LEFT JOIN `tb_department` dept ON stu.`dept_id` = dept.`id` WHERE stu.id = $studtID;";



                                $studtlist_query = $conn->query($studtlist_sql);

                                if ($studtlist_query->num_rows > 0) {


                                    $result = $studtlist_query->fetch_assoc();


                                    $chk_stu_curs_id = $result['course_id'];

                                    $rdate = substr($result['session_start'], -2);

                                    $cursResult = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `tb_course` WHERE `id`=" . $result['course_id']));



                                ?>

                                    <form id="editStud_form" data-id="<?php echo $result['id']; ?>">



                                        <div class="card-body">

                                            <div class="form-group">

                                                <label for="deptID">Department Name</label>

                                                <h4> <?php echo $result['dept_full_name']; ?></h4>

                                                <input type="hidden" class="form-control" id="deptID" placeholder="Department ID" name="Depart_id" value="<?php echo $result['dept_id']; ?>">

                                            </div>
                                            <div class="form-group">

                                                <label for="session_date">Session Year<span class="text-danger">*</span></label>

                                                <div class="row" id="education-range">

                                                    <div class="col-6">

                                                        <input type="text" class="form-control" name="syr" id="st_se" placeholder="Session Start" autocomplete="off" value="<?php echo $result['session_start']; ?>">


                                                    </div>

                                                    <div class="col-6">

                                                        <input type="text" class="form-control" name="eyr" id="en_se" placeholder="Session End" autocomplete="off" value="<?php echo $result['session_end']; ?>">

                                                    </div>

                                                </div>

                                                <!-- /.row -->

                                            </div>

                                            <div class="form-group" id="education-month">

                                                <label for="regi_no">Admission Month<span class="text-danger">*</span></label>

                                                <input type="text" class="form-control" id="month" placeholder="Register Month" name="reg_month" autocomplete="off" value="<?php echo $result['reg_month']; ?>">

                                            </div>

                                            <div class="form-group">

                                                <label for="curs_name">Course Name<span class="text-danger">*</span></label>



                                                <select name="curs_id" id="curs_name" class="form-control">

                                                    <option> -Choose Course - </option>

                                                    <?php

                                                    $curs_query = mysqli_query($conn, "SELECT * FROM `tb_course` WHERE `status`=1 order by `name` ASC") or die(mysqli_error($conn));

                                                    while ($curs_name = mysqli_fetch_array($curs_query)) {



                                                        $chk_cours = $curs_name['id'];

                                                    ?>

                                                        <option value="<?= $curs_name['id']; ?>" <?php if ($chk_cours == $chk_stu_curs_id) {
                                                                                                        echo "selected";
                                                                                                    } ?>>

                                                            <?= $curs_name['name']; ?>

                                                        </option>

                                                    <?php

                                                    }

                                                    ?>

                                                </select>

                                            </div>


                                            <div class="form-group">

                                                <label for="regi_no">Registration Number<span class="text-danger">*</span></label>

                                                <input type="text" name="regi_numr" class="form-control" id="regi_no" placeholder="Registration Number" value="<?php echo 'EI/' . $cursResult['course_code'] . '/' . $rdate . $result['reg_month'] . $result['reg_no'];; ?>">

                                                <!-- <input type="text" id="regi_nn" name="regi_numr"> -->

                                            </div>

                                            <div class="form-group">

                                                <label for="stu_rollno">Roll No. </label>

                                                <input type="text" class="form-control" id="stu_rollno" placeholder="Student Roll Number" name="stu_rollno" value="<?php if ($result['roll_no2'] == '') {
                                                                                                                                                                        echo $result['roll_no'];
                                                                                                                                                                    } else {
                                                                                                                                                                        echo $result['roll_no2'];
                                                                                                                                                                    } ?>" />

                                            </div>


                                            <!-- Course Duration Time add -->








                                            <div class="form-group">

                                                <label for="curs_dura">Course Duration</label>

                                                <input type="text" class="form-control" id="curs_dura" placeholder="Course Duration" name="cours_duration" value="<?php echo $result['course_duration']; ?>" disabled>

                                            </div>





                                            <div class="form-group">

                                                <label for="stu_name">Student Name</label>

                                                <input type="text" class="form-control" id="stu_name" placeholder="Student Name" name="stu_name" value="<?php echo $result['name']; ?>">

                                            </div>

                                            <div class="form-group">

                                                <label for="fthr_name">Father Name</label>

                                                <input type="text" class="form-control" id="fthr_name" placeholder="Father Name" name="father_name" value="<?php echo $result['father_name']; ?>">

                                            </div>

                                            <div class="form-group">

                                                <label for="mthr_name">Mother Name</label>

                                                <input type="text" class="form-control" id="mthr_name" placeholder="Mother Name" name="mother_name" value="<?php echo $result['mother_name']; ?>">

                                            </div>

                                            <div class="form-group">

                                                <label for="trn_centre">Training Centre </label>

                                                <select name="tcentre_name" id="trn_centre" class="form-control">

                                                    <option> - Choose Course - </option>

                                                    <?php

                                                        $chk_centreid = $result['centre_id'];

                                                        $centre_query = mysqli_query($conn, "SELECT * FROM `franchises_centre` WHERE `status` = 1 ORDER BY `id` DESC") or die(mysqli_error($conn));

                                                        while ($centre_name = mysqli_fetch_array($centre_query)) {

                                                    ?>

                                                        <option value="<?= $centre_name['id']; ?>" <?php if($chk_centreid == $centre_name['id']){echo "selected";} ?>>
                                                            <?= $centre_name['c_name'];?> (ID- <?php echo $centre_name['c_code'] ?> )
                                                        </option>

                                                    <?php

                                                    }

                                                    ?>

                                                </select>
                                                <!-- <input type="text" class="form-control" id="trn_centre" placeholder="Training Centre Name" name="tcentre_name" value="<?php //echo $result['centre_name']; ?>"> -->

                                            </div>



                                            <!-- Date -->

                                            <!--div class="form-group">

                                            <label>Date:</label>

                                            <div class="input-group date" id="reservationdate"

                                                data-target-input="nearest">

                                                <input type="text" class="form-control datetimepicker-input"

                                                    data-target="#reservationdate" />

                                                <div class="input-group-append" data-target="#reservationdate"

                                                    data-toggle="datetimepicker">

                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>

                                                </div>

                                            </div>

                                        </div-->

                                            <!-- /.form group -->

                                            <div class="form-group">

                                                <label for="stu_dob">D.O.B </label>

                                                <input type="text" class="form-control" id="stu_dob" placeholder="Student DOB" name="stu_dob" value="<?php echo $result['dob']; ?>">

                                            </div>

                                            <!-- Date -->





                                            <div class="form-group">

                                                <label for="stu_mobno">Mobile No. </label>

                                                <input type="text" class="form-control" id="stu_mobno" placeholder="Student Mobile Number" name="stu_mobileno" value="<?php echo $result['mobile']; ?>">

                                            </div>

                                            <div class="form-group">

                                                <label for="stu_email">Email Address </label>

                                                <input type="text" class="form-control" id="stu_email" placeholder="Student Email" name="stu_email_addrs" value="<?php echo $result['email']; ?>">

                                            </div>

                                            <div class="form-group">

                                                <label for="stu_gender_title">Gender </label>

                                                <?php

                                                $chck_gendr = $result['gender'];

                                                ?>

                                                <div class="col-md-3">

                                                    <div class="custom-control custom-radio">

                                                        <input class="custom-control-input" type="radio" id="customRadio1" name="stu_gender" value="male" <?php if ($chck_gendr == 'male') {
                                                                                                                                                                echo "checked";
                                                                                                                                                            } ?>>

                                                        <label for="customRadio1" class="custom-control-label"> Male</label>

                                                    </div>

                                                    <div class="custom-control custom-radio">

                                                        <input class="custom-control-input" type="radio" id="customRadio2" name="stu_gender" value="female" <?php if ($chck_gendr == 'female') {
                                                                                                                                                                echo "checked";
                                                                                                                                                            } ?>>

                                                        <label for="customRadio2" class="custom-control-label">Female</label>

                                                    </div>

                                                </div>

                                            </div>



                                            <div class="form-group">

                                                <label for="exampleInputFile">Upload Student Image </label>

                                                <br />

                                                <img src="../uploads/profile/<?php echo $result['image']; ?>" height="100px" /><br /><br />

                                                <div class="input-group">

                                                    <div class="custom-file">

                                                        <input type="file" class="custom-file-input" id="stu_img" name="stu_proimg" value="<?php echo $result['image']; ?>">

                                                        <label class="custom-file-label" for="stu_img">Choose

                                                            Student image</label>

                                                    </div>



                                                </div>

                                            </div>

                                            <div class="form-group">

                                                <label for="exampleInputFile">Upload Signature </label><br />

                                                <img src="../uploads/profile/<?php echo $result['signature_img']; ?>" height="100px" /><br /><br />

                                                <div class="input-group">

                                                    <div class="custom-file">

                                                        <input type="file" class="custom-file-input" id="stu_signimg" name="stu_signature_img" value="<?php echo $result['signature_img']; ?>">

                                                        <label class="custom-file-label" for="stu_signimg">Choose

                                                            Signature image</label>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                        <!-- /.card-body -->



                                        <div class="card-footer">

                                            <button type="submit" class="btn btn-primary" id="edittu_btn">Submit</button>

                                        </div>

                                    </form>

                                <?php

                                } else {

                                    echo "Sorry, no record found";
                                }

                                ?>

                            </div>

                            <!-- /.card -->







                        </div>

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

    <script>
        $(function() {

            bsCustomFileInput.init();

        });
    </script>

    <!-- SweetAlert2 -->

    <script src="plugins/sweetalert2/sweetalert2.min.js"></script>

    <!-- Custom form -->

    <script src="custom.js"></script>
    <script>
        $('#education-range input').each(function() {

            $(this).datepicker({

                //multidateSeparator: "-",

                autoclose: false,

                format: "yyyy",

                viewMode: "years",

                minViewMode: "years",

                multidate: 1,

                /*    startDate: '-20y',

                   endDate: '+1y' */

            });

            //$(this).datepicker('clearDates');

        });
    </script>

    <script>
        $('#education-month input').each(function() {

            $(this).datepicker({

                //multidateSeparator: "-",

                autoclose: true,

                format: "mm",

                viewMode: "months",

                minViewMode: "months",

                multidate: 1,
            });

            // $(this).datepicker('clearDates');

        });
    </script>




    <script>
        $(function() {

            $('input[name="stu_dob"]').daterangepicker({

                singleDatePicker: true,

                showDropdowns: true,

                autoApply: true,

                minYear: 1901,

                maxYear: parseInt(moment().format('YYYY'), 10),

                locale: {

                    format: 'YYYY/MM/DD'

                }

            }, function(start, end, label) {

                var years = moment().diff(start, 'years');

                alert("You are " + years + " years old!");

            });

        });
    </script>
    <script>
        $("#curs_name,#st_se,#en_se,#month").on('change', function() {
            var id = $('#curs_name').val();
            var sse = $('#st_se').val();
            var ese = $('#en_se').val();
            var month = $('#month').val();
            //alert(sse);
            $.ajax({
                url: 'ajax_stu_reg_no.php',
                type: 'post',
                data: {
                    id: id,
                    sse: sse,
                    ese: ese,
                    month: month
                },
                success: function(r) {
                    //alert(r);
                    var rr = r.split("###");
                    //alert(rr[1]);
                    $('#regi_no').val(rr[0]);
                    //$('#regi_nn').val(rr[1]);
                    $('#roll_no').val(rr[2]);
                }
            })
        })
    </script>

</body>



</html>