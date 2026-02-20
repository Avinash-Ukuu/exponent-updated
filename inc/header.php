<?php include('inc/connection.php'); ?>
<div class="top">

    <div class="container">

        <div class="row">

            <div class="col-sm-12 col-xs-12">

                <ul class="list-inline pull-left icon">

                    <li>

                        <a href="tel:+91-9209300400"><i class="icofont icofont-phone"></i>CAll US</a>

                    </li>

                    <li>

                        <a href="mailto:info@exponentinstitute.com"><i

                                class="icofont icofont-mail"></i>info@exponentinstitute.com</a>

                    </li>

                    <li>

                        <form method="post" enctype="multipart/form-data" id="language">

                            <div class="btn-group">

                                <button class="btn btn-link dropdown-toggle" data-toggle="dropdown">

                                    <span class="text"><i class="icofont icofont-globe"></i> Join Us With</span> <i

                                        class="icofont icofont-caret-down"></i>

                                </button>

                                <ul class="dropdown-menu dropdown-menu-right">

                                    <li><a href="#" target="_blank"><i class="fa fa-facebook text-white"></i> Facebook</a>
                                    </li>

                                    <li><a href="#" target="_blank"><i class="fa fa-twitter text-white"></i> Twitter </a></li>

                                    <li><a href="#" target="_blank"><i class="fa fa-instagram text-white"></i> Instagram</a></li>

                                    <li><a href="#" target="_blank"><i class="fa fa-linkedin text-white"></i> Linkedin </a></li>

                                </ul>

                            </div>

                        </form>

                    </li>

                </ul>

                <ul class="list-inline pull-right icon">
<!-- 
                    <li>
                        <a href="http://localhost/branch/"><i class="fa fa-user"></i>LOGIN </a>
                    </li> -->

                    <li>
                        <form method="post" enctype="multipart/form-data" id="language">

                            <div class="btn-group">

                                <button class="btn btn-link dropdown-toggle" data-toggle="dropdown">

                                    <span class="text"><i class="icofont icofont-globe"></i>Verification</span> <i

                                        class="icofont icofont-caret-down"></i>

                                </button>

                                <ul class="dropdown-menu dropdown-menu-right">

                                    <li>

                                        <a href="studentverification.php"> <i class="fa fa-user"></i> Student Admit Card </a>

                                        <a href="studentresult.php">  <i class="fa fa-user"></i>  Student Result </a>

                                        <!--<a href="employeeverification.php">  <i class="fa fa-user"></i> Employee Verification</a>-->



                                    </li>

                                </ul>

                            </div>

                        </form>

                    </li>

                </ul>

            </div>

        </div>

    </div>

</div>



<header>
    <div class="logobar-wrapper">
        <div class="container" style="">
            <div class="row">

                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div id="logo" style="margin: 0px 0;">
                        <a href="index.php">
                            <img class="img-responsive" src="images/logo.png" alt="logo" title="logo" />
                        </a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="topbar-contbox text-right">
                        <ul class="list-unstyled list-topbar-cont topbar-right-logo">
                            <li> <img src="images/expoin-logo-right.png"/> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="menubar-wrapper">
        <div class="container">

            <div class="row">

                <div class="col-md-12col-sm-12 col-xs-12">

                    <!-- menu start here -->

                    <div id="menu">

                        <nav class="navbar">

                            <div class="navbar-header">

                                <span class="menutext visible-xs">Menu</span>

                                <button data-target=".navbar-ex1-collapse" data-toggle="collapse"

                                    class="btn btn-navbar navbar-toggle" type="button">

                                    <i class="fa fa-bars" aria-hidden="true"></i>

                                </button>

                            </div>

                            <div class="collapse navbar-collapse navbar-ex1-collapse padd0">

                                <ul class="nav navbar-nav text-right">

                                    <li> <a href="index.php">Home</a> </li>
                                    <li> <a href="about-us.php">About Us </a> </li>
                                    <li> <a href="ViewDepartments.php">Services </a> </li>
                                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Latest Course </a>

                                        <div class="dropdown-menu repeating">

                                            <div class="dropdown-inner">
                                            <?php
                                                    $servlist_sql = "SELECT * FROM `tb_course`  WHERE `course_type`= 'Advance Diploma' && `status` = 1 ORDER BY `id` ASC";
                                                    $servlist_query = $conn->query($servlist_sql);
                                                ?>
                                                <ul class="list-unstyled">
                                                    <?php 
                                                        
                                                            while($servlist_result = $servlist_query -> fetch_assoc()){
                                                    ?>
                                                    <li> <a href="ViewCourseDetails.php?dptvw_id=<?php echo $servlist_result['id']; ?>"> <?php echo $servlist_result['name']; ?></a> </li>
                                                    <?php } ?>

                                                </ul>
                                                

                                            </div>

                                        </div>

                                    </li>
                                    
                                    <!--<li><a href="ViewDepartments.php">Departments</a></li>-->

                                    <!--<li class="dropdown"><a href="#" class="dropdown-toggle"

                                            data-toggle="dropdown">Approvals/Memberships</a>

                                        <div class="dropdown-menu repeating">

                                            <div class="dropdown-inner">

                                                <ul class="list-unstyled">

                                                    <li><a href="index.php">INTERNATIONAL MEMBERSHIPS / RECOGNITIONS /

                                                            APPROVALS</a></li>

                                                    <li><a href="index.php">NATIONAL MEMBERSHIPS/APPROVALS</a></li>

                                                    <li><a href="index.php">STATES MEMBERSHIPS/APPROVALS</a></li>

                                                    <li><a href="index.php">MSME APPROVALS</a></li>

                                                    <li><a href="index.php">CERTIFICATIONS</a></li>

                                                </ul>

                                            </div>

                                        </div>

                                    </li>-->

                                    <!--<li class="dropdown"><a href="#" class="dropdown-toggle"

                                            data-toggle="dropdown">Institute</a>

                                        <div class="dropdown-menu repeating">

                                            <div class="dropdown-inner">

                                                <ul class="list-unstyled">



                                                    <li><a href="centrelist.php">Training Centres</a></li>

                                                    <li><a href="institutedownloads.php">Downloads</a></li>

                                                    <li><a href="institutefaqs.php">FAQ</a></li>



                                                    <li><a href="franchiseregistration.php">New Centre Request</a></li>

                                                    <li><a href="employeeverification.php">Employee Verification</a></li>

                                                </ul>

                                            </div>

                                        </div>

                                    </li>-->



                                    <!--<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Student

                                            Zone</a>

                                        <div class="dropdown-menu repeating">

                                            <div class="dropdown-inner">

                                                <ul class="list-unstyled">

                                                    <li><a href="admissionprocedure.php">Admission Procedure</a></li>

                                                    <li><a href="studentdownloads.php">Downloads</a></li>



                                                    <li><a href="studentverification.php">Student Verification</a></li>

                                                    <li><a href="#">Feedback for Students</a></li>

                                                    <li><a href="studentfaqs.php">FAQ's</a></li>

                                                </ul>

                                            </div>

                                        </div>

                                    </li>-->


                                    <!--<li class="dropdown"><a href="#" class="dropdown-toggle"

                                            data-toggle="dropdown">Miscellaneous</a>

                                        <div class="dropdown-menu">

                                            <div class="dropdown-inner">

                                                <ul class="list-unstyled">

                                                    <li><a href="imagegallery.php">Gallery</a></li>

                                                </ul>

                                            </div>

                                        </div>

                                    </li>-->

                                    <!--<li> <a href="Training-and-placement.php">Trainings & Placement</a></li>-->

                                    <li> <a href="contactus.php">Contact Us</a></li>

                                </ul>

                            </div>

                        </nav>

                    </div>

                </div>

            </div>

        </div>
    </div>

</header>