<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Brand Logo -->

    <a href="index.php" class="brand-link">

        <img src="../images/galaxy-logo.png" alt="Galaxy Techno" class="brand-image" style="opacity: .8">

        <span class="brand-text font-weight-light">Galaxy Techno Branch <small>Panel</small></span>

    </a>



    <!-- Sidebar -->

    <div class="sidebar">

        <!-- Sidebar user panel (optional) -->

        <!--  < ?php

        $admin_data_tl = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `tb_user` WHERE id='$logged_user_id'"));

        ?>

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">

            <div class="image">

                <img src="../uploads/profile/< ?= $admin_data_tl['image']; ?>" class="img-circle elevation-2" alt="User Image">

            </div>

            <div class="info">

                <a href="admin-profile.php" class="d-block">< ?= $admin_data_tl['username']; ?></a>

            </div>

        </div> -->



        <!-- SidebarSearch Form -->

        <!-- <div class="form-inline">

            <div class="input-group" data-widget="sidebar-search">

                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">

                <div class="input-group-append">

                    <button class="btn btn-sidebar">

                        <i class="fas fa-search fa-fw"></i>

                    </button>

                </div>

            </div>

        </div>
 -->


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

                <li class="nav-item">

                    <a href="profile.php" class="nav-link">

                        <i class="nav-icon fas fa-user"></i>

                        <p>

                            My Profile

                            <!--<span class="right badge badge-danger">New</span>-->

                        </p>

                    </a>

                </li>



                <li class="nav-item">

                    <a href="logout.php" class="nav-link">

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