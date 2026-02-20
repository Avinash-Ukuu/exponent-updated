<?php

include_once('configDB.php');

$logged_user_id = "";

$logged_username = "";



if (getSession('admin_id') > 0) {

    $logged_user_id  = getSession('admin_id');

    //$logged_user_actype = getSession('log_usertype');

    $logged_username = getSession('admin_username');

} else { header("location: login.php"); }



    $empID = getNGet('empl_id');

    $emplSql_query = mysqli_query($conn,"SELECT * FROM `tb_employee` WHERE `id` = $empID")or die(mysqli_error($conn));

    $result = mysqli_fetch_array($emplSql_query);

?>

<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Exponent Institute | Employee Form</title>



    <!-- Google Font: Source Sans Pro -->

    <link rel="stylesheet"

        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- Font Awesome -->

    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">



    <!-- daterange picker -->

    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">

    <!-- Tempusdominus Bootstrap 4 -->

    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">



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

                    <input class="form-control form-control-navbar" type="search" placeholder="Search"

                        aria-label="Search">

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

                                <img src="../../dist/img/user1-128x128.jpg" alt="User Avatar"

                                    class="img-size-50 mr-3 img-circle">

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

                                <img src="../../dist/img/user8-128x128.jpg" alt="User Avatar"

                                    class="img-size-50 img-circle mr-3">

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

                                <img src="../../dist/img/user3-128x128.jpg" alt="User Avatar"

                                    class="img-size-50 img-circle mr-3">

                                <div class="media-body">

                                    <h3 class="dropdown-item-title">

                                        Nora Silvester

                                        <span class="float-right text-sm text-warning"><i

                                                class="fas fa-star"></i></span>

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

                            <h1>Employee</h1>

                        </div>

                        <div class="col-sm-6">

                            <ol class="breadcrumb float-sm-right">

                                <li class="breadcrumb-item"><a href="#">Home</a></li>

                                <li class="breadcrumb-item active">Employee</li>

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

                                    <h3 class="card-title">Edit Employee</h3>

                                </div>

                                <!-- /.card-header -->

                                <!-- form start -->



                                <form id="editEmpl_form" enctype="multipart/form-data" data-id="<?php echo $result['id'] ?>">



                                    <div class="card-body">

                                        <div class="form-group">

                                            <label for="reference_no">Reference Number</label>

                                            <input type="text" class="form-control" id="reference_no"

                                                placeholder="Reference Number" name="ref_numr"

                                                value="<?php echo $result['ref_no'];?>">

                                        </div>

                                        <div class="form-group">

                                            <label for="emp_name">Employee Name</label>

                                            <input type="text" class="form-control" id="emp_name"

                                                placeholder="Employee Name" name="emply_name"

                                                value="<?php echo $result['name'];?>">

                                        </div>

                                        <div class="form-group">

                                            <label for="empl_dob">D.O.B </label>

                                            <input type="text" class="form-control" id="empl_dob"

                                                placeholder="Employee DOB" name="empl_dob"

                                                value="<?php echo $result['dob'];?>">

                                        </div>

                                        <!-- Date -->

                                        <div class="form-group">

                                            <label for="stu_gender_title">Gender </label>

                                            <div class="col-md-3">

                                                <?php ?>

                                                <div class="custom-control custom-radio">

                                                    <input class="custom-control-input" type="radio" id="customRadio1"

                                                        name="emp_gender" value="male" <?php if($result['gender'] =='male'){echo 'checked="checked"';}?>>

                                                    <label for="customRadio1" class="custom-control-label"> Male</label>

                                                </div>

                                                <div class="custom-control custom-radio">

                                                    <input class="custom-control-input" type="radio" id="customRadio2"

                                                        name="emp_gender" value="female" <?php if($result['gender'] =='female'){echo 'checked="checked"';}?>>

                                                    <label for="customRadio2"

                                                        class="custom-control-label">Female</label>

                                                </div>

                                            </div>

                                        </div>

                                        

                                        <div class="form-group">

                                            <label for="emp_qualification">Qualification </label>

                                            <input type="text" class="form-control" id="emp_qualification"

                                                placeholder="Employee Qualification" name="emp_qualif" value="<?php echo $result['qualification'];?>" />

                                        </div>

                                        <div class="form-group">

                                            <label for="fthr_name">Father Name</label>

                                            <input type="text" class="form-control" id="fthr_name"

                                                placeholder="Father Name" name="father_name" value="<?php echo $result['father_name'];?>" />

                                        </div>

                                        <div class="form-group">

                                            <label for="mthr_name">Mother Name</label>

                                            <input type="text" class="form-control" id="mthr_name"

                                                placeholder="Mother Name" name="mother_name" value="<?php echo $result['mother_name'];?>" />

                                        </div>

                                        <div class="form-group">

                                            <label for="stu_mobno">Mobile No. </label>

                                            <input type="text" class="form-control" id="stu_mobno"

                                                placeholder="Employee Mobile Number" name="emp_mobileno" value="<?php echo $result['mobile'];?>" />

                                        </div>

                                        <div class="form-group">

                                            <label for="emp_email">Email Address </label>

                                            <input type="text" class="form-control" id="emp_email"

                                                placeholder="Email Address" name="emp_email_addrs" value="<?php echo $result['email'];?>" />

                                        </div>

                                        <div class="form-group">

                                            <label for="emp_address">Residential Address </label>

                                            <textarea name="emp_addrs" id="emp_address" class="form-control" cols="30"

                                                rows="10"> <?php echo $result['address'];?></textarea>

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

                                            <!-- <input type="text" class="form-control" id="trn_centre"

                                                placeholder="Training Centre Name" name="tcentre_name" value="<?php //echo $result['centre_name'];?>" /> -->

                                        </div>

                                        

                                        <!-- Is Teaching Or non Teaching -->

                                        <div class="form-group">

                                            <label for="is_teaching"> Is Teaching ?</label>

                                            <div class="col-md-3">

                                                <div class="custom-control custom-radio">

                                                    <input class="custom-control-input" type="radio" id="ISteach"

                                                        name="is_teach" value="1" <?php if($result['is_teacher']== 1){echo "checked='checked'";}  ?> />

                                                    <label for="ISteach" class="custom-control-label"> Yes, Teaching</label>

                                                </div>

                                                <div class="custom-control custom-radio">

                                                    <input class="custom-control-input" type="radio" id="ISnonteach"

                                                        name="is_teach" value="0" <?php if($result['is_teacher']== 0){echo "checked='checked'";}  ?>/>

                                                    <label for="ISnonteach"

                                                        class="custom-control-label">Non-Teaching</label>

                                                </div>

                                            </div>

                                        </div>

                                        

                                        <div class="form-group">

                                            <label for="department_id">Department Name</label>



                                            <select name="dept_id" id="department_id" class="form-control">

                                                <option> -Choose Department- </option>

                                                <?php

                                                $dept_query = mysqli_query($conn, "SELECT * FROM `tb_department` WHERE `status`=1 order by `name` ASC") or die(mysqli_error($conn));

                                                while ($dept_name = mysqli_fetch_array($dept_query)) {

                                                ?>

                                                <option value="<?= $dept_name['id']; ?>" <?php if ($result['dept_id'] == $dept_name['id']) echo "selected"; ?>><?= $dept_name['name']; ?></option>

                                                </option>

                                                <?php

                                                }

                                                ?>

                                            </select>

                                        </div>

                                        <!--<div class="form-group">

                                            <label for="curs_name">Course Assign</label>



                                            <select name="course_id" id="course" class="form-control">

                                            <!-- <?php

                                                // $dptID = $result['dept_id'];

                                                // $course_query = mysqli_query($conn, "SELECT * FROM `tb_course` WHERE dept_id=".$dptID) or die(mysqli_error($conn));



                                                // while ($course = mysqli_fetch_array($course_query)) {

                                            ?> -->

                                                    <!-- <option <?php //if ($result['cours_id'] == $course['id']) echo "selected"; ?> value="<? //= $course['id']; ?>"> <? //= $course['name']; ?></option> -->

                                                <?php //} ?>

                                            <!--</select>

                                            

                                        </div>-->

                                        <!-- Course Duration Time add -->



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

                                        <!-- Start Joining Date -->
                                       
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">

                                                    <label for="empl_dob">Joining Date </label>
                                                     <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1"> <i class="fa fa-calendar"></i></span>
                                                        <input type="text" class="form-control" id="joindate"

                                                        placeholder="Employee Joining Date" name="emp_joindate"

                                                        value="<?php echo $result['join_date'];?>">
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">

                                                    <label for="empl_dob">End Date </label>
                                                   <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1"> <i class="fa fa-calendar"></i></span>
                                                      
                                                        <input type="text" class="form-control" id="enddate"

                                                        placeholder="Employee Joining Date" name="emp_enddate"

                                                        value="<?php echo $result['end_date'];?>">
                                                    </div>

                                                            
                                                        

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                 

                                                <!-- Join Date -->
                                                <!-- <div class="form-group">
                                                    <label>Join Date:</label>
                                                    <div class="input-group date" id="joindate"
                                                        data-target-input="nearest">
                                                        <input type="text" class="form-control datetimepicker-input"
                                                            data-target="#joindate" name="emp_joindate" value="<?php //echo $result['join_date'];?>" />
                                                        <div class="input-group-append" data-target="#joindate"
                                                            data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                        </div>
                                                    </div>
                                                </div> -->
                                                <!-- <div class="form-group">
                                                    <label>Join Date:</label>
                                                    <div class="input-group date" id="joindate"
                                                        data-target-input="nearest">
                                                        <input type="text" class="form-control datetimepicker-input"
                                                            data-target="#joindate" name="emp_joindate" value="< ?php echo $result['join_date'];?>" />
                                                        <div class="input-group-append" data-target="#joindate"
                                                            data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                        </div>
                                                    </div>
                                                </div> -->
                                            </div>
                                            <div class="col-md-6">
                                                <!-- Date -->
                                                <!--<div class="form-group">
                                                    <label>End Date:</label>
                                                    <div class="input-group date" id="enddate"
                                                        data-target-input="nearest">
                                                        <input type="text" class="form-control datetimepicker-input"
                                                            data-target="#enddate" name="emp_enddate" value="<?php //echo $result['end_date'];?>" />
                                                        <div class="input-group-append" data-target="#enddate"
                                                            data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                        </div>
                                                    </div>
                                                </div>-->
                                            </div>
                                        </div>

                                        <!-- End Joining Date -->

                                    <!--     <div class="form-group">

                                            <label for="joining_date">Joining Date </label>

                                            <input type="text" class="form-control" id="joining_date"

                                                placeholder="Joining Date" name="joing_date"

                                                value="< ?php echo $result['join_date'];?>" />

                                        </div> -->

                                        <!-- End Joining Date -->

                                        <div class="form-group">

                                            <label for="crnt_salary">Current Salary </label>

                                            <input type="text" class="form-control" id="crnt_salary"

                                                placeholder="Current Salary" name="emp_salary" value="<?php echo $result['salary']; ?>"/>

                                        </div>

                                        <div class="form-group row">

                                            <div class="col-md-10">

                                                <label for="exampleInputFile">Upload Employee Image </label>

                                                <div class="input-group">

                                                    <div class="custom-file">

                                                        <input type="file" class="custom-file-input" id="emp_img"

                                                            name="emp_proimg" value="<?php echo $result['image']; ?>"/>

                                                        <label class="custom-file-label" for="emp_img">Choose

                                                            Employee image</label>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-md-2">

                                                <div style="text-align: right;max-height: 100px;max-width: 150px;padding-top:10px;">

                                                    <img src="../uploads/empl/<?php echo $result['image']; ?>" width="80px" height="80px"/>

                                                </div>

                                            </div>

                                        </div>
                                        
                                        
                                        <div class="form-group row">
                                            <div class="col-md-10">
                                                <label for="exampleInputFile2">Upload Employee Signature </label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="emp_signs_img"
                                                            name="emp_signimg" value="<?php echo $result['emp_signatr']; ?>">
                                                        <label class="custom-file-label" for="emp_signs_img">Choose Employee Signature</label>
                                                    </div>
                                                </div>    
                                            </div>
                                            <div class="col-md-2">
                                                <div style="text-align: right;max-height: 100px;max-width: 150px;padding-top:10px;border: 1px solid #a8a8a8;margin-top: 15px;">

                                                    <img src="../uploads/empl/<?php echo $result['emp_signatr']; ?>" width="100%"/>

                                                </div>    
                                            </div>

                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-10">
                                                <label for="exampleInputFile2">Upload Employee Salary Slip </label>

                                                <div class="input-group">

                                                    <div class="custom-file">

                                                        <input type="file" class="custom-file-input" id="emp_sslip_file" name="emp_salslip" value="<?php echo $result['emp_sslip']; ?>">

                                                        <label class="custom-file-label" for="emp_sslip_file">Choose Salary Slip</label>
                                                    </div>

                                                </div>    
                                            </div>
                                            <div class="col-md-2">
                                                <div style="text-align: right;max-height: 100px;max-width: 150px;padding-top:10px;margin-top: 15px;text-align: center;padding-bottom: 10px;">

                                                    <a href="../uploads/empl/<?php echo $result['emp_sslip']; ?>" target="_blank"> 
                                                        <img src="../uploads/empl/salary-slip-icon.png" width="80px"/>
                                                    </a>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-10">

                                                <label for="exampleInputFile2">Upload Offer Letter </label>

                                                <div class="input-group">

                                                    <div class="custom-file">

                                                        <input type="file" class="custom-file-input" id="emp_ofrltr_file"

                                                            name="emp_ofrltr">

                                                        <label class="custom-file-label" for="emp_ofrltr_file">Choose Offer Letter</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div style="text-align: right;max-height: 100px;max-width: 150px;padding-top:10px;margin-top: 15px;text-align: center;padding-bottom: 10px;">

                                                    <a href="../uploads/empl/<?php echo $result['emp_oletter']; ?>" target="_blank"> 
                                                        <img src="../uploads/empl/offer-ltr-icon.png" width="80px"/>
                                                    </a>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">

                                            <div class="col-md-2">

                                                <div class="custom-control custom-radio">

                                                    <input

                                                        class="custom-control-input custom-control-input-primary"

                                                        type="radio" id="customRadio5" name="set_status" value="1"

                                                        <?php $set_status_empl =  $result['status']; if ($set_status_empl == 1) {echo "checked";}?> />

                                                    <label for="customRadio5"

                                                        class="custom-control-label">Enable</label>

                                                </div>

                                            </div>

                                            <div class="col-md-10">

                                                <div class="custom-control custom-radio">

                                                    <input

                                                        class="custom-control-input custom-control-input-danger"

                                                        type="radio" id="customRadio6" name="set_status" value="0"

                                                        <?php $set_status_empl =  $result['status']; if ($set_status_empl == 0) {echo "checked";} ?> />

                                                    <label for="customRadio6" class="custom-control-label">

                                                        Disabled</label>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <!-- /.card-body -->



                                    <div class="card-footer">

                                        <button type="submit" class="btn btn-primary" id="updtempl_btn">Submit</button>

                                    </div>

                                </form>

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



    <!-- Page specific script -->

    <script>

        $(function() {

            // //Date range picker
                // $('#joindate').datetimepicker({ format: 'L',});
                // $( "#joindate" ).datepicker("setDate",$(this).val());

                // $('#enddate').datetimepicker({format: 'L',});
                // $('#enddate').datepicker('setDate2',$(this).val());

            //Timepicker

            // $('#timepicker').datetimepicker({

            //     format: 'LT',

            // })

        });

    </script>



    <script>

        $(function() {

            $('input[name="empl_dob"]').daterangepicker({

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

        $(function() {

            $('input[name="emp_joindate"]').daterangepicker({

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

                //alert("You are " + years + " years old!");

            });

        });


        $(function() {

            $('input[name="emp_enddate"]').daterangepicker({

                singleDatePicker: true,

                showDropdowns: true,

                autoApply: true,

                minYear: 1901,

                maxYear: parseInt(moment().format('YYYY'), 12),

                locale: {

                    format: 'YYYY/MM/DD'

                }

            }, function(start, end, label) {

                var years = moment().diff(start, 'years');

                //alert("You are " + years + " years old!");

            });

        });

    

    

    </script>

    <script>

    // $("#department_id").change(function() {

    //     var id = $(this).val();

    //     //alert(id);

    //     $.ajax({

    //         url: 'ajax_course_open.php',

    //         type: 'post',

    //         data: {

    //             id: id

    //         },

    //         success: function(r) {

    //             //alert(r);

    //             $('#course').html(r)



    //         }

    //     })

    // })

    </script>

</body>



</html>