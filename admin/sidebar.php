<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Brand Logo -->

    <a href="#" class="brand-link">

        <img src="../images/logo-icon.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">

        <span class="brand-text font-weight-light">Exponent Institute </span>

    </a>



    <!-- Sidebar -->

    <div class="sidebar">

        <!-- Sidebar user panel (optional) -->

        <?php

        $admin_data_tl = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `tb_user` WHERE id='$logged_user_id'"));

        ?>

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">

            <div class="image">

                <img src="../uploads/profile/<?= $admin_data_tl['image']; ?>" class="img-circle elevation-2" alt="User Image">

            </div>

            <div class="info">

                <a href="admin-profile.php" class="d-block"><?= $admin_data_tl['username']; ?></a>

            </div>

        </div>



        <!-- SidebarSearch Form -->

        <div class="form-inline">

            <div class="input-group" data-widget="sidebar-search">

                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">

                <div class="input-group-append">

                    <button class="btn btn-sidebar">

                        <i class="fas fa-search fa-fw"></i>

                    </button>

                </div>

            </div>

        </div>



        <!-- Sidebar Menu -->

        <nav class="mt-2">

            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <!-- Add icons to the links using the .nav-icon class

               with font-awesome or any other icon font library -->

                <li class="nav-item menu-open">

                    <a href="index.php" class="nav-link active">

                        <i class="nav-icon fas fa-th"></i>

                        <p>

                            Dashboard

                            <!--<span class="right badge badge-danger">New</span>-->

                        </p>

                    </a>

                </li>

                <!--li class="nav-item">

            <a href="index.php" class="nav-link">

              <i class="nav-icon fas fa-th"></i>

              <p>

                Departments

                <span class="right badge badge-danger">New</span>

              </p>

            </a>

          </li-->

                <li class="nav-item ">

                    <a href="#" class="nav-link ">

                        <i class="nav-icon fas fa-tachometer-alt"></i>

                        <p>

                            Departments

                            <i class="right fas fa-angle-left"></i>

                        </p>

                    </a>

                    <ul class="nav nav-treeview">

                        <li class="nav-item">

                            <a href="department-list.php" class="nav-link">

                                <i class="far fa-circle nav-icon"></i>

                                <p>List Department</p>

                            </a>

                        </li>

                        <li class="nav-item">

                            <a href="department-add.php" class="nav-link">

                                <i class="far fa-circle nav-icon"></i>

                                <p>Add Department</p>

                            </a>

                        </li>

                        <!-- <li class="nav-item">

                            <a href="department-status.php" class="nav-link">

                                <i class="far fa-circle nav-icon"></i>

                                <p>Disable Departments</p>

                            </a>

                        </li> -->

                    </ul>

                </li>



                <li class="nav-item">

                    <a href="#" class="nav-link">

                        <i class="nav-icon fas fa-book"></i>

                        <p>

                            Courses

                            <i class="fas fa-angle-left right"></i>

                        </p>

                    </a>

                    <ul class="nav nav-treeview">

                        <li class="nav-item">

                            <a href="course-list.php" class="nav-link">

                                <i class="far fa-circle nav-icon"></i>

                                <p>List Course</p>

                            </a>

                        </li>

                        <li class="nav-item">

                            <a href="course-add.php" class="nav-link">

                                <i class="far fa-circle nav-icon"></i>

                                <p>Add Course</p>

                            </a>

                        </li>

                    </ul>

                </li>



                <li class="nav-item">

                    <a href="#" class="nav-link">

                        <i class="nav-icon fas fa-book"></i>

                        <p>

                            Subject

                            <i class="fas fa-angle-left right"></i>

                        </p>

                    </a>

                    <ul class="nav nav-treeview">

                        <li class="nav-item">

                            <a href="subject-list.php" class="nav-link">

                                <i class="far fa-circle nav-icon"></i>

                                <p>List Subject</p>

                            </a>

                        </li>

                        <li class="nav-item">

                            <a href="subject-add.php" class="nav-link">

                                <i class="far fa-circle nav-icon"></i>

                                <p>Add Subject</p>

                            </a>

                        </li>

                    </ul>

                </li>

                <li class="nav-item">

                    <a href="#" class="nav-link">

                        <i class="nav-icon fas fa-book"></i>

                        <p>

                            Students

                            <i class="fas fa-angle-left right"></i>

                        </p>

                    </a>

                    <ul class="nav nav-treeview">

                        <li class="nav-item">

                            <a href="student-list.php" class="nav-link">

                                <i class="far fa-circle nav-icon"></i>

                                <p>List Student</p>

                            </a>

                        </li>

                        <li class="nav-item">

                            <a href="student-add.php" class="nav-link">

                                <i class="far fa-circle nav-icon"></i>

                                <p>Add Student</p>

                            </a>

                        </li>

                    </ul>

                </li>

                <!--<li class="nav-item">

                    <a href="#" class="nav-link">

                        <i class="nav-icon fas fa-book"></i>

                        <p>

                            Employee

                            <i class="fas fa-angle-left right"></i>

                        </p>

                    </a>

                    <ul class="nav nav-treeview">

                        <li class="nav-item">

                            <a href="employee-list.php" class="nav-link">

                                <i class="far fa-circle nav-icon"></i>

                                <p>List Employee</p>

                            </a>

                        </li>

                        <li class="nav-item">

                            <a href="employee-add.php" class="nav-link">

                                <i class="far fa-circle nav-icon"></i>

                                <p>Add Employee</p>

                            </a>

                        </li>

                    </ul>

                </li>-->

                <li class="nav-item">

                    <a href="#" class="nav-link">

                        <i class="nav-icon fas fa-id-card"></i>

                        <p>

                            Student Admit Card

                            <i class="fas fa-angle-left right"></i>

                        </p>

                    </a>

                    <ul class="nav nav-treeview">



                        <!--   <li class="nav-item">

                            <a href="admit-card.php" class="nav-link">

                                <i class="far fa-circle nav-icon"></i>

                                <p>Generate Admit Card</p>

                            </a>

                        </li> -->

                        <li class="nav-item">

                            <a href="admit-card-list.php" class="nav-link">

                                <i class="far fa-circle nav-icon"></i>

                                <p>View Admit card</p>

                            </a>

                        </li>

                        <li class="nav-item">

                            <a href="admit-card-sec-list.php" class="nav-link">

                                <i class="far fa-circle nav-icon"></i>

                                <p>2nd Year Admit card</p>

                            </a>

                        </li>

                        <!--  <li class="nav-item">

                            <a href="admit-card-released.php" class="nav-link">

                                <i class="far fa-circle nav-icon"></i>

                                <p>Publish Admit Card</p>

                            </a>

                        </li> -->

                    </ul>

                </li>

                <li class="nav-item">

                    <a href="#" class="nav-link">

                        <i class="nav-icon fas fa-file"></i>

                        <p>

                            Marks Sheet

                            <i class="fas fa-angle-left right"></i>

                        </p>

                    </a>

                    <ul class="nav nav-treeview">



                        <li class="nav-item">

                            <a href="marks-sheet.php" class="nav-link">

                                <i class="far fa-circle nav-icon"></i>

                                <p>Add Marks</p>

                            </a>

                        </li>

                        <li class="nav-item">

                            <a href="marks-sheet-list.php" class="nav-link">

                                <i class="far fa-circle nav-icon"></i>

                                <p>View Marks List</p>

                            </a>

                        </li>



                    </ul>

                </li>
                <li class="nav-item">

                    <a href="#" class="nav-link">

                        <i class="nav-icon fas fa-file"></i>

                        <p>

                            Traning Centre

                            <i class="fas fa-angle-left right"></i>

                        </p>

                    </a>

                    <ul class="nav nav-treeview">



                        <li class="nav-item">

                            <a href="traning-centre-list.php" class="nav-link">

                                <i class="far fa-circle nav-icon"></i>

                                <p> List Traning Centre </p>

                            </a>

                        </li>

                        <li class="nav-item">

                            <a href="traning-centre-add.php" class="nav-link">

                                <i class="far fa-circle nav-icon"></i>

                                <p> Add Traning Centre</p>

                            </a>

                        </li>



                    </ul>

                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-file"></i>
                        <p>
                            Image Gallery
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="imageGallery-list.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> Image Gallery List </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="imageGallery-add.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> Add Image Gallery</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-file"></i>
                        <p>
                            Blogs
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="blog-list.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> Blog List </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="blog-add.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> Add Blog</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Work by varun -->

                <!--<li class="nav-item">

                    <a href="#" class="nav-link">

                        <i class="nav-icon fas fa-file"></i>

                        <p>

                            Pages

                            <i class="fas fa-angle-left right"></i>

                        </p>

                    </a>

                    <ul class="nav nav-treeview">

                        <li class="nav-item">

                            <a href="add-parent.php" class="nav-link">

                                <i class="far fa-circle nav-icon"></i>

                                <p>Add Parent Page</p>

                            </a>

                        </li>

                        <li class="nav-item">

                            <a href="view-Parent-Page.php" class="nav-link">

                                <i class="far fa-circle nav-icon"></i>

                                <p>View Parent Pages</p>

                            </a>

                        </li>

                        <li class="nav-item">

                            <a href="add-subpage.php" class="nav-link">

                                <i class="far fa-circle nav-icon"></i>

                                <p>Add Sub Page</p>

                            </a>

                        </li>

                        <li class="nav-item">

                            <a href="view-subpage.php" class="nav-link">

                                <i class="far fa-circle nav-icon"></i>

                                <p>View Sub Pages</p>

                            </a>

                        </li>



                    </ul>

                </li>-->

                <!-- Work by ends -->

                <li class="nav-item">

                    <a href="admin-profile.php" class="nav-link">

                        <i class="nav-icon fas fa-user"></i>

                        <p>

                            My Profile

                            <!--<span class="right badge badge-danger">New</span>-->

                        </p>

                    </a>

                </li>



                <li class="nav-item">

                    <a href="index.php" class="nav-link">

                        <i class="nav-icon fas fa-power-off"></i>

                        <p>

                            Logout

                            <!--<span class="right badge badge-danger">New</span>-->

                        </p>

                    </a>

                </li>

            </ul>



        </nav>

        <!-- /.sidebar-menu -->

    </div>

    <!-- /.sidebar -->

</aside>