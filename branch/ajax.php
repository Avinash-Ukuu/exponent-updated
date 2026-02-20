<?php require_once('configDB.php');

include "libs/qrlib/qrlib.php";

$logged_center_id = "";
if (getSession('branch_id') > 0) {
    $logged_center_id  = getSession('branch_id');
}



/* logout session */

if (getPost('action') == "logout_account") {

    removeSession("logged_center_id");

    removeSession("logged_cntrname");

    session_destroy();



    $msg = "Logged out successfully.";

    $json_array = array('status' => 'success', 'message' => $msg);

    echo json_encode($json_array);

    exit();
}

/* Traning Centre Update  */

if (getPost('action') == "Update_tran_centre") {

    $validator = new validations();

    $validator->add_rule("name", "Enter Centre Name", "required|alpha");

    $validator->add_rule("address", "Address", "required");

    $validator->add_rule("state", "Select State", "required");

    $validator->add_rule("distt", "Select District", "required");

    $validator->add_rule("city", "City Name", "required");

    $validator->add_rule("pincode", "Pincode", "required|numeric");

    $validator->add_rule("phone_no", "Phone Number", "required");

    $validator->add_rule("email", "Email ID", "required|email");

    $validator->add_rule("username", "Username", "required|alpha");

    $validator->add_rule("password", "password", "required");

    $validator->add_rule("description", "Description", "");

    $error = $validator->run();





    if (trim($error) == '') {

        $id = getNPost('id');

        $name = trim(getPost('name'));

        $address = getPost('address');

        $state = getPost('state');

        $distt = getPost('distt');

        $city = getPost('city');

        $pincode = getPost('pincode');

        $phone_no = getPost('phone_no');

        $email = getPost('email');

        $username = getPost('username');

        $password = getPost('password');

        $description = getPost('description');

        $status = getPost('status');

        $created_date = date("Y-m-d h:i:s");



        $ch_row = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `franchises_centre` WHERE `id`!='$id' && `c_name`='$name' && `phone`='$phone_no'"));



        if ($ch_row == 0) {



            $username_row = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `franchises_centre` WHERE `id`!='$id' && `username`='$username'"));

            if ($username_row == 0) {



                $update_centre_sql = "UPDATE `franchises_centre` SET `c_name`=' $name',`username`='$username',`password`='$password',`address`='$address',`city`=' $city',`distt`='$distt',`state`='$state',`pincode`='$pincode',`phone`='$phone_no',`email`='$email',`description`='$description',`status`='$status' WHERE `id`='$id'";

                $up_centre_query = $conn->query($update_centre_sql);



                if ($up_centre_query) {

                    $msg = "Centre Updated Successfully";

                    $json_array = array("status" => "success", "message" => $msg);

                    echo json_encode($json_array);

                    exit();
                } else {

                    $msg = "Failed to Update, try again later";

                    $json_array = array("status" => "success", "message" => $msg);

                    echo json_encode($json_array);

                    exit();
                }
            } else {

                $msg = "Login username already exist..Try another one";

                $json_array = array("status" => "failed", "message" => $msg);

                echo json_encode($json_array);

                exit();
            }
        } else {

            $msg = "Centre name already exist";

            $json_array = array("status" => "failed", "message" => $msg);

            echo json_encode($json_array);

            exit();
        }
    } else {

        $msg = $error;

        $json_array = array("status" => "failed", "message" => $msg);

        echo json_encode($json_array);

        exit();
    } // trim else end 

} //action - "End Traning Centre "

/* Add Centre  */

if (getPost('action') == "add_centre") {

    $validator = new validations();

    $validator->add_rule("name", "Enter Centre Name", "required|alpha");

    $validator->add_rule("address", "Address", "required");

    $validator->add_rule("state", "Select State", "required");

    $validator->add_rule("distt", "Select District", "required");

    $validator->add_rule("city", "City Name", "required");

    $validator->add_rule("pincode", "Pincode", "required|numeric");

    $validator->add_rule("phone_no", "Phone Number", "required");

    $validator->add_rule("email", "Email ID", "required|email");

    $validator->add_rule("username", "Username", "required|alpha");

    $validator->add_rule("password", "password", "required");

    $validator->add_rule("description", "Description", "");

    $error = $validator->run();



    if (trim($error) == '') {

        $name = trim(getPost('name'));

        $address = getPost('address');

        $state = getPost('state');

        $distt = getPost('distt');

        $city = getPost('city');

        $pincode = getPost('pincode');

        $phone_no = getPost('phone_no');

        $email = getPost('email');

        $username = getPost('username');

        $password = getPost('password');

        $description = getPost('description');

        $created_date = date("Y-m-d h:i:s");



        $ch_row = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `franchises_centre` WHERE `c_name`='$name' && `phone`='$phone_no'"));

        if ($ch_row == 0) {

            $username_row = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `franchises_centre` WHERE `username`='$username'"));

            if ($username_row == 0) {



                $franch_query_max = mysqli_query($conn, "SELECT MAX(id) as id FROM `franchises_centre`");

                $ch = mysqli_fetch_array($franch_query_max);

                if ($ch['id'] != 0) {

                    $franch_query = mysqli_query($conn, "SELECT * FROM `franchises_centre` WHERE id='$ch[id]'");

                    $fr_code = mysqli_fetch_array($franch_query);

                    $f_code = $fr_code['c_code'] + 1;
                } else {

                    $f_code = '120000';
                }



                $add_centre_sql = "INSERT INTO `franchises_centre`(`c_code`, `c_name`, `username`, `password`, `address`, `city`, `distt`, `state`, `pincode`, `phone`, `email`, `description`, `status`, `date`) VALUES ('$f_code','$name','$username','$password','$address','$city','$distt','$state','$pincode','$phone_no','$email','$description','1','$created_date')";

                $add_centre_query = $conn->query($add_centre_sql);



                if ($add_centre_query) {

                    $msg = "Centre Code is :  $f_code";

                    $json_array = array("status" => "success", "message" => $msg);

                    echo json_encode($json_array);

                    exit();
                } else {

                    $msg = "Failed to Update, try again later";

                    $json_array = array("status" => "success", "message" => $msg);

                    echo json_encode($json_array);

                    exit();
                }
            } else {

                $msg = "Login username already exist..Try another one";

                $json_array = array("status" => "failed", "message" => $msg);

                echo json_encode($json_array);

                exit();
            }
        } else {

            $msg = "This Centre name already added";

            $json_array = array("status" => "failed", "message" => $msg);

            echo json_encode($json_array);

            exit();
        }
    } else {

        $msg = $error;

        $json_array = array("status" => "failed", "message" => $msg);

        echo json_encode($json_array);

        exit();
    } // trim else end 

} //action - "End Traning Centre "

/* Update Admin Profile */

if (getPost('action') == "Update_admin_profile") {

    $validator = new validations();

    $validator->add_rule("username", "User Name ", "required");

    $validator->add_rule("password", "Password ", "required");

    $error = $validator->run();



    if (trim($error) == '') {

        $ID = getNPost('id');

        $username = $_POST['username'];

        $password = $_POST['password'];

        $created_date = date("Y-m-d h:i:s");



        $img_upload = $_FILES['proimg']['name'];

        $sign_upload = $_FILES['signature_img']['name'];

        /*  $json_array = array("status" => "failed", "message" => $ID . $username . $password . $img_upload . $sign_upload);

        echo json_encode($json_array);

        exit(); */

        $uploading_path = '../uploads/profile/';



        if (is_array($_FILES)) {



            $attached_files = array(0, 0, 0);

            $uploaded_files = array(0, 0, 0);

            $file_tmp_path = array();

            $file_size = array();

            $file_ext = array();

            $file_name = array();

            $valid_ext = array('jpeg', 'jpg', 'png');

            $max_size = array(5242880, 5242880);

            $upload_err = 0;

            $upld_err_msg = "";

            $size_err = 0;

            $size_err_msg = "";

            $ext_err = 0;

            $ext_err_msg = "";

            $file_exist = 0;

            $file_exist_err = "";



            if ((!empty($_FILES['proimg']['name']))) {

                $attached_files[0] = 1;

                $file_tmp_path[0] = $_FILES['proimg']['tmp_name'];



                if (is_uploaded_file($file_tmp_path[0])) {

                    $uploaded_files[0] = 1;

                    $file_size[0] = $_FILES['proimg']['size'];

                    if ($file_size[0] > $max_size[0]) {

                        $size_err = 1;

                        $size_err_msg .= "|Profile Image|";
                    } else {

                        $file_ext[0] = pathinfo($_FILES['proimg']['name'], PATHINFO_EXTENSION);

                        if (!(in_array($file_ext[0], $valid_ext))) {

                            $ext_err = 1;

                            $ext_err_msg .= "|Profile Image|";
                        } else {

                            $file_name[0] = $_FILES['proimg']['name'];

                            $file_name[0] = str_replace(' ', '_', $file_name[0]);

                            $file_name[0] = mt_rand(1, 10000000) . "_" . $file_name[0];

                            if (file_exists($uploading_path . $file_name[0])) {

                                $file_exist = 1;

                                $file_exist_err = "|Profile Image|";
                            }
                        }
                    }
                } else {

                    $upload_err = 1;

                    $upld_err_msg .= "|Profile Image|";
                }
            }



            if ((!empty($_FILES['signature_img']['name']))) {

                $attached_files[1] = 1;

                $file_tmp_path[1] = $_FILES['signature_img']['tmp_name'];



                if (is_uploaded_file($file_tmp_path[1])) {

                    $uploaded_files[1] = 1;

                    $file_size[1] = $_FILES['signature_img']['size'];

                    if ($file_size[0] > $max_size[0]) {

                        $size_err = 1;

                        $size_err_msg .= "|Profile Icon Image|";
                    } else {

                        $file_ext[1] = pathinfo($_FILES['signature_img']['name'], PATHINFO_EXTENSION);

                        if (!(in_array($file_ext[1], $valid_ext))) {

                            $ext_err = 1;

                            $ext_err_msg .= "|Profile Icon Image|";
                        } else {

                            $file_name[1] = $_FILES['signature_img']['name'];

                            $file_name[1] = str_replace(' ', '_', $file_name[1]);

                            $file_name[1] = mt_rand(1, 10000000) . "_" . $file_name[1];

                            if (file_exists($uploading_path . $file_name[1])) {

                                $file_exist = 1;

                                $file_exist_err = "|Profile Icon Image|";
                            }
                        }
                    }
                } else {

                    $upload_err = 1;

                    $upld_err_msg .= "|Profile Image|";
                }
            }



            if ($upload_err == 1) {

                $json_array = array("status" => "failed", "message" => "Failed to upload file(s): $upld_err_msg");

                echo json_encode($json_array);

                exit();
            } else if ($size_err == 1) {

                $json_array = array("status" => "failed", "message" => "Invalid size of file(s): $size_err_msg");

                echo json_encode($json_array);

                exit();
            } else if ($ext_err == 1) {

                $json_array = array("status" => "failed", "message" => "Invalid type of file(s): $ext_err_msg");

                echo json_encode($json_array);

                exit();
            } else if ($file_exist == 1) {

                $json_array = array("status" => "failed", "message" => "File already exist, kindly rename file(s): $ext_err_msg");

                echo json_encode($json_array);

                exit();
            } else {

                $file_to_upld = "";

                for ($i = 0; $i <= 1; $i++) {

                    if ($attached_files[$i] == 1) {

                        if (move_uploaded_file($file_tmp_path[$i], $uploading_path . $file_name[$i])) {

                            if ($i == 0) {

                                $file_to_upld2 .= "`image` = '$file_name[$i]',";
                            } else if ($i == 1) {

                                $file_to_upld2 .= "`signature` = '$file_name[$i]',";
                            }
                        } else {

                            $json_array = array("status" => "failed", "message" => "Error occurred while uploading file, try again");

                            echo json_encode($json_array);

                            exit();
                        }
                    }
                }







                //$old_query = "SELECT `image`,`signature` FROM `franchises_centre` WHERE `id`='$logged_center_id';";



                $old_query_run = $conn->query($old_query);

                if ($old_query_run) {

                    $old_query_result = $old_query_run->fetch_assoc();
                }

                $query = "UPDATE `franchises_centre` SET `username`='$username',`password`='$password',`update_date`='$created_date' WHERE `id`='$logged_center_id'";
                $query_run = $conn->query($query);
                removeSession("logged_center_id");
                removeSession("logged_cntrname");
                session_destroy();

                // $json_array = array("status"=>"failed", "message"=>$query);

                // echo json_encode($json_array);

                // exit();

                if ($query_run) {

                    for ($i = 0; $i <= 2; $i++) {

                        if ($attached_files[$i] == 1) {



                            if ($i == 0) {

                                unlink(($uploading_path . $old_query_result['image']));
                            } else if ($i == 1) {

                                unlink(($uploading_path . $old_query_result['signature']));
                            }
                        }
                    }

                    $json_array = array("status" => "success", "message" => "Profile updated successfully.");

                    echo json_encode($json_array);

                    exit();
                } else {

                    for ($m = 0; $m <= 2; $m++) {

                        unlink(($uploading_path . $file_name[$m]));
                    }

                    $json_array = array("status" => "failed", "message" => "Some error occurred while saving data.");

                    echo json_encode($json_array);

                    exit();
                }
            }
        } else {

            $json_array = array("status" => "failed", "message" => "Some error occurred.");

            echo json_encode($json_array);

            exit();
        }
    } // end

    else {

        $msg = $error;

        $json_array = array("status" => "failed", "message" => $msg);

        echo json_encode($json_array);

        exit();
    } // trim else end 

} //action - "End Update Marks "

if (getPost('action') == "user_loginform") {

    $validator = new validations();

    $validator->add_rule("user_name", "Username", "required|max_length[15]");

    $validator->add_rule("password", "Password", "required|max_length[40]");

    $error = $validator->run();



    if (trim($error) == '') {

        $uname = getPost('user_name');

        $pword = getPost('password');



        $query = "SELECT * FROM `franchises_centre` WHERE `username`='$uname' AND `password`='$pword' AND status = 1;";

        $query_result = mysqli_query($conn, $query);



        if ($query_result) {

            if (mysqli_num_rows($query_result) > 0) {

                $query_data = mysqli_fetch_assoc($query_result);

                saveSession('branch_id', $query_data['id']);

                saveSession('branch_username', $uname);



                $msg = "Logged In Successfully";

                $json_array = array("status" => "success", "message" => $msg);

                echo json_encode($json_array);

                exit();
            } else {

                $msg = "Invalid ID or Password";

                $json_array = array('status' => 'failed', 'message' => $msg);

                echo json_encode($json_array);

                exit();
            }
        } else {

            $msg = "Some error occurred";

            $json_array = array('status' => 'failed', 'message' => $msg);

            echo json_encode($json_array);

            exit();
        }
    } else {

        $msg = "$error";

        $json_array = array('status' => 'failed', 'message' => $msg);

        echo json_encode($json_array);

        exit();
    }
}


/* ==================================================================================
   Start Add Student  
   ================================================================================== */

if (getPost('action') == "add_stud_pro") {

    $validator = new validations();

    $validator->add_rule("curs_id", "Course type", "required|numeric|max_length[90]");

    //$validator->add_rule("reg_month", "Registrator Month", "required");

    //$validator->add_rule("regi_no", "Registration Number", "required");



    $validator->add_rule("stu_name", "Student Name", "required|max_length[90]");

    $validator->add_rule("father_name", "Father Name", "required|max_length[90]");

    $validator->add_rule("mother_name", "Mother Name", "required|max_length[90]");



    //$validator->add_rule("tcentre_name", "Training Centre", "required|max_length[90]");

    $validator->add_rule("stu_dob", "Student D.O.B", "required|max_length[90]");

    $validator->add_rule("stu_rollno", "Student Roll Number", "required|max_length[90]");



    $error = $validator->run();



    if (trim($error) == '') {
        $session_start = getPost('syr');

        $session_end = getPost('eyr');

        $reg_month = getPost('reg_month');

        $stud_curs_id = getPost('curs_id');

        $stud_regi_num = getPost('regi_numr');
        $stud_regi_numr = substr($stud_regi_num, -3);

        $stud_name = getPost('stu_name');



        $stud_fathername = getPost('father_name');

        $stud_mothername = getPost('mother_name');

        $stud_tcentre = getPost('tcentre_name');

        $stud_dob = getPost('stu_dob');

        $stud_gender = getPost('stu_gender');



        $stud_rollno = getPost('stu_rollno');



        $stud_mobile = getPost('stu_mobileno');

        $stud_email = getPost('stu_email_addrs');




        $stud_img = getPost('stu_proimg');

        $stud_signtr_img = getPost('stu_signature_img');



        $stud_joining_date = date("Y-m-d");

        $stud_active = getPost('active');

        $created_date = date("Y-m-d h:i:s");



        $stud_img_upload = $_FILES['stu_proimg']['name'];

        $stud_sign_upload = $_FILES['stu_signature_img']['name'];



        $uploading_path = '../uploads/profile/';



        if (is_array($_FILES)) {

            $attached_files = array(0, 0, 0);

            $uploaded_files = array(0, 0, 0);

            $file_tmp_path = array();

            $file_size = array();

            $file_ext = array();

            $file_name = array();

            $valid_ext = array('jpeg', 'jpg', 'png');

            $max_size = array(5242880, 5242880);

            $upload_err = 0;

            $upld_err_msg = "";

            $size_err = 0;

            $size_err_msg = "";

            $ext_err = 0;

            $ext_err_msg = "";

            $file_exist = 0;

            $file_exist_err = "";



            if ((!empty($_FILES['stu_proimg']['name']))) {

                $attached_files[0] = 1;

                $file_tmp_path[0] = $_FILES['stu_proimg']['tmp_name'];



                if (is_uploaded_file($file_tmp_path[0])) {

                    $uploaded_files[0] = 1;

                    $file_size[0] = $_FILES['stu_proimg']['size'];

                    if ($file_size[0] > $max_size[0]) {

                        $size_err = 1;

                        $size_err_msg .= "|Profile Image|";
                    } else {

                        $file_ext[0] = pathinfo($_FILES['stu_proimg']['name'], PATHINFO_EXTENSION);

                        if (!(in_array($file_ext[0], $valid_ext))) {

                            $ext_err = 1;

                            $ext_err_msg .= "|Profile Image|";
                        } else {

                            $file_name[0] = $_FILES['stu_proimg']['name'];

                            $file_name[0] = str_replace(' ', '_', $file_name[0]);

                            $file_name[0] = mt_rand(1, 10000000) . "_" . $file_name[0];

                            if (file_exists($uploading_path . $file_name[0])) {

                                $file_exist = 1;

                                $file_exist_err = "|Profile Image|";
                            }
                        }
                    }
                } else {

                    $upload_err = 1;

                    $upld_err_msg .= "|Profile Image|";
                }
            }



            if ((!empty($_FILES['stu_signature_img']['name']))) {

                $attached_files[1] = 1;

                $file_tmp_path[1] = $_FILES['stu_signature_img']['tmp_name'];



                if (is_uploaded_file($file_tmp_path[1])) {

                    $uploaded_files[1] = 1;

                    $file_size[1] = $_FILES['stu_signature_img']['size'];

                    if ($file_size[0] > $max_size[0]) {

                        $size_err = 1;

                        $size_err_msg .= "|Profile Icon Image|";
                    } else {

                        $file_ext[1] = pathinfo($_FILES['stu_signature_img']['name'], PATHINFO_EXTENSION);

                        if (!(in_array($file_ext[1], $valid_ext))) {

                            $ext_err = 1;

                            $ext_err_msg .= "|Profile Icon Image|";
                        } else {

                            $file_name[1] = $_FILES['stu_signature_img']['name'];

                            $file_name[1] = str_replace(' ', '_', $file_name[1]);

                            $file_name[1] = mt_rand(1, 10000000) . "_" . $file_name[1];

                            if (file_exists($uploading_path . $file_name[1])) {

                                $file_exist = 1;

                                $file_exist_err = "|Profile Icon Image|";
                            }
                        }
                    }
                } else {

                    $upload_err = 1;

                    $upld_err_msg .= "|Profile Image|";
                }
            }



            if ($upload_err == 1) {

                $json_array = array("status" => "failed", "message" => "Failed to upload file(s): $upld_err_msg");

                echo json_encode($json_array);

                exit();
            } else if ($size_err == 1) {

                $json_array = array("status" => "failed", "message" => "Invalid size of file(s): $size_err_msg");

                echo json_encode($json_array);

                exit();
            } else if ($ext_err == 1) {

                $json_array = array("status" => "failed", "message" => "Invalid type of file(s): $ext_err_msg");

                echo json_encode($json_array);

                exit();
            } else if ($file_exist == 1) {

                $json_array = array("status" => "failed", "message" => "File already exist, kindly rename file(s): $ext_err_msg");

                echo json_encode($json_array);

                exit();
            } else {

                $file_to_upld = "";

                for ($i = 0; $i <= 1; $i++) {

                    if ($attached_files[$i] == 1) {

                        if (move_uploaded_file($file_tmp_path[$i], $uploading_path . $file_name[$i])) {

                            if ($i == 0) {

                                $file_cols .= "`image`,";

                                $file_col_vals .= "'$file_name[$i]',";
                            } else if ($i == 1) {

                                $file_cols .= "`signature_img`,";

                                $file_col_vals .= "'$file_name[$i]',";
                            }
                        } else {

                            $json_array = array("status" => "failed", "message" => "Error occurred while uploading file, try again");

                            echo json_encode($json_array);

                            exit();
                        }
                    }
                }



                $curs_sql = "SELECT `id`, `dept_id`, `course_duration` FROM `tb_course` WHERE id = $stud_curs_id";

                $curs_query1 = mysqli_query($conn, $curs_sql);

                $curs_result =  mysqli_fetch_assoc($curs_query1);



                $dept_id_show = $curs_result['dept_id'];

                $curs_id_show = $curs_result['id'];

                $curs_duration_show = $curs_result['course_duration'];



                $old_query = "SELECT `image`,`signature_img` FROM `tb_student`;";



                $old_query_run = $conn->query($old_query);

                if ($old_query_run) {

                    $old_query_result = $old_query_run->fetch_assoc();
                }
                /*   $json_array = array('status' => 'failed', 'message' => $logged_center_id);

                echo json_encode($json_array);

                exit(); */
                $ch_stu_re = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `tb_student` WHERE `name`='$stud_name' && `dob`='$stud_dob' && `father_name`='$stud_fathername'"));

                if ($ch_stu_re == 0) {

                    $query = "INSERT INTO `tb_student` (`session_start`, `session_end`,`reg_month`,`reg_no`,`course_id`, `dept_id`,`course_duration`,`name`, `dob`,`gender`,`mobile`,`email`,`father_name`, `mother_name`,`center_id`, `centre_name`,`roll_no`,`register_date`, $file_cols `created_date`) 

            VALUES 

            ('$session_start', '$session_end','$reg_month','$stud_regi_numr',$stud_curs_id,$dept_id_show,'$curs_duration_show','$stud_name','$stud_dob', '$stud_gender', $stud_mobile,'$stud_email','$stud_fathername','$stud_mothername','$logged_center_id','$stud_tcentre','$stud_rollno','$stud_joining_date',$file_col_vals '$created_date')";



                    $query_run = $conn->query($query);



                    /*   $json_array = array("status" => "failed", "message" => $query);

                echo json_encode($json_array);

                exit(); */

                    if ($query_run) {





                        for ($i = 0; $i <= 2; $i++) {

                            if ($attached_files[$i] == 1) {



                                if ($i == 0) {

                                    unlink(($uploading_path . $old_query_result['stu_proimg']));
                                } else if ($i == 1) {

                                    unlink(($uploading_path . $old_query_result['stu_signature_img']));
                                }
                            }
                        }

                        $json_array = array("status" => "success", "message" => "Profile updated successfully.");

                        echo json_encode($json_array);

                        exit();
                    } else {

                        for ($m = 0; $m <= 2; $m++) {

                            unlink(($uploading_path . $file_name[$m]));
                        }

                        $json_array = array("status" => "failed", "message" => "Some error occurred while saving data.");

                        echo json_encode($json_array);

                        exit();
                    }
                } else {

                    $json_array = array("status" => "failed", "message" => "Student record already exist in database");

                    echo json_encode($json_array);

                    exit();
                }
            }
        } else {

            $json_array = array("status" => "failed", "message" => "Some error occurred.");

            echo json_encode($json_array);

            exit();
        }
    } // trim end

    else {

        $json_array = array("status" => "failed", "message" => $error);

        echo json_encode($json_array);

        exit();
    } // trim else end 

} //action - "End Add Form Student"



/* Edit Student  */

if (getPost('action') == "edit_stud_form") {

    $validator = new validations();

    $validator->add_rule("curs_id", "Course type", "required|numeric|max_length[90]");

    //$validator->add_rule("regi_numr", "Registration Number", "required|max_length[90]");



    $validator->add_rule("stu_name", "Student Name", "required|max_length[90]");

    $validator->add_rule("father_name", "Father Name", "required|max_length[90]");

    $validator->add_rule("mother_name", "Mother Name", "required|max_length[90]");



    //$validator->add_rule("tcentre_name", "Training Centre", "required|max_length[90]");

    $validator->add_rule("stu_dob", "Student D.O.B", "required|max_length[90]");

    $validator->add_rule("stu_rollno", "Student Roll Number", "required|max_length[90]");



    $error = $validator->run();



    if (trim($error) == '') {

        $stud_id =  getNPost('id');
        $session_start = getPost('syr');

        $session_end = getPost('eyr');

        $reg_month = getPost('reg_month');

        $stud_curs_id = getNPost('curs_id');

        $stud_regi_num = getPost('regi_numr');
        $stud_regi_numr = substr($stud_regi_num, -3);

        $stud_name = getPost('stu_name');




        $stud_fathername = getPost('father_name');

        $stud_mothername = getPost('mother_name');

        $stud_tcentre = getPost('tcentre_name');

        $stud_dob = getPost('stu_dob');

        $stud_gender = getPost('stu_gender');



        $stud_rollno = getPost('stu_rollno');



        $stud_mobile = getPost('stu_mobileno');

        $stud_email = getPost('stu_email_addrs');



        $stud_img = getPost('stu_proimg');

        $stud_signtr_img = getPost('stu_signature_img');



        $stud_joining_date = date("Y-m-d");

        $stud_active = getNPost('active');

        $created_date = date("Y-m-d");



        $stud_img_upload = $_FILES['stu_proimg']['name'];

        $stud_sign_upload = $_FILES['stu_signature_img']['name'];



        $uploading_path = '../uploads/profile/';



        if (is_array($_FILES)) {



            $attached_files = array(0, 0, 0);

            $uploaded_files = array(0, 0, 0);

            $file_tmp_path = array();

            $file_size = array();

            $file_ext = array();

            $file_name = array();

            $valid_ext = array('jpeg', 'jpg', 'png');

            $max_size = array(5242880, 5242880);

            $upload_err = 0;

            $upld_err_msg = "";

            $size_err = 0;

            $size_err_msg = "";

            $ext_err = 0;

            $ext_err_msg = "";

            $file_exist = 0;

            $file_exist_err = "";



            if ((!empty($_FILES['stu_proimg']['name']))) {

                $attached_files[0] = 1;

                $file_tmp_path[0] = $_FILES['stu_proimg']['tmp_name'];



                if (is_uploaded_file($file_tmp_path[0])) {

                    $uploaded_files[0] = 1;

                    $file_size[0] = $_FILES['stu_proimg']['size'];

                    if ($file_size[0] > $max_size[0]) {

                        $size_err = 1;

                        $size_err_msg .= "|Profile Image|";
                    } else {

                        $file_ext[0] = pathinfo($_FILES['stu_proimg']['name'], PATHINFO_EXTENSION);

                        if (!(in_array($file_ext[0], $valid_ext))) {

                            $ext_err = 1;

                            $ext_err_msg .= "|Profile Image|";
                        } else {

                            $file_name[0] = $_FILES['stu_proimg']['name'];

                            $file_name[0] = str_replace(' ', '_', $file_name[0]);

                            $file_name[0] = mt_rand(1, 10000000) . "_" . $file_name[0];

                            if (file_exists($uploading_path . $file_name[0])) {

                                $file_exist = 1;

                                $file_exist_err = "|Profile Image|";
                            }
                        }
                    }
                } else {

                    $upload_err = 1;

                    $upld_err_msg .= "|Profile Image|";
                }
            }



            if ((!empty($_FILES['stu_signature_img']['name']))) {

                $attached_files[1] = 1;

                $file_tmp_path[1] = $_FILES['stu_signature_img']['tmp_name'];



                if (is_uploaded_file($file_tmp_path[1])) {

                    $uploaded_files[1] = 1;

                    $file_size[1] = $_FILES['stu_signature_img']['size'];

                    if ($file_size[0] > $max_size[0]) {

                        $size_err = 1;

                        $size_err_msg .= "|Profile Icon Image|";
                    } else {

                        $file_ext[1] = pathinfo($_FILES['stu_signature_img']['name'], PATHINFO_EXTENSION);

                        if (!(in_array($file_ext[1], $valid_ext))) {

                            $ext_err = 1;

                            $ext_err_msg .= "|Profile Icon Image|";
                        } else {

                            $file_name[1] = $_FILES['stu_signature_img']['name'];

                            $file_name[1] = str_replace(' ', '_', $file_name[1]);

                            $file_name[1] = mt_rand(1, 10000000) . "_" . $file_name[1];

                            if (file_exists($uploading_path . $file_name[1])) {

                                $file_exist = 1;

                                $file_exist_err = "|Profile Icon Image|";
                            }
                        }
                    }
                } else {

                    $upload_err = 1;

                    $upld_err_msg .= "|Profile Image|";
                }
            }



            if ($upload_err == 1) {

                $json_array = array("status" => "failed", "message" => "Failed to upload file(s): $upld_err_msg");

                echo json_encode($json_array);

                exit();
            } else if ($size_err == 1) {

                $json_array = array("status" => "failed", "message" => "Invalid size of file(s): $size_err_msg");

                echo json_encode($json_array);

                exit();
            } else if ($ext_err == 1) {

                $json_array = array("status" => "failed", "message" => "Invalid type of file(s): $ext_err_msg");

                echo json_encode($json_array);

                exit();
            } else if ($file_exist == 1) {

                $json_array = array("status" => "failed", "message" => "File already exist, kindly rename file(s): $ext_err_msg");

                echo json_encode($json_array);

                exit();
            } else {

                $file_to_upld = "";

                for ($i = 0; $i <= 1; $i++) {

                    if ($attached_files[$i] == 1) {

                        if (move_uploaded_file($file_tmp_path[$i], $uploading_path . $file_name[$i])) {

                            if ($i == 0) {

                                $file_to_upld2 .= "`image` = '$file_name[$i]',";
                            } else if ($i == 1) {

                                $file_to_upld2 .= "`signature_img` = '$file_name[$i]',";
                            }
                        } else {

                            $json_array = array("status" => "failed", "message" => "Error occurred while uploading file, try again");

                            echo json_encode($json_array);

                            exit();
                        }
                    }
                }



                $curs_sql = "SELECT `id`, `dept_id`, `course_duration` FROM `tb_course` WHERE id = $stud_curs_id";

                $curs_query1 = mysqli_query($conn, $curs_sql);

                $curs_result =  mysqli_fetch_assoc($curs_query1);



                $dept_id_show = $curs_result['dept_id'];

                $curs_id_show = $curs_result['id'];

                $curs_duration_show = $curs_result['course_duration'];



                $old_query = "SELECT `image`,`signature_img` FROM `tb_student`;";



                $old_query_run = $conn->query($old_query);

                if ($old_query_run) {

                    $old_query_result = $old_query_run->fetch_assoc();
                }
                /* `centre_name`= '$stud_tcentre', */
                $query = "UPDATE `tb_student` SET `session_start`='$session_start', `session_end`='$session_end', `reg_month`='$reg_month', `reg_no`='$stud_regi_numr', `course_id`= $stud_curs_id, 

                                                  `dept_id`= $dept_id_show,

                                                  `course_duration`= '$curs_duration_show',

                                                  `name`= '$stud_name', 

                                                  `dob`= '$stud_dob',

                                                  `gender`= '$stud_gender',

                                                  `mobile`= $stud_mobile,

                                                  `email`= '$stud_email',

                                                  `father_name`= '$stud_fathername', 

                                                  `mother_name`= '$stud_mothername', 

                                                  `roll_no`= '$stud_rollno',

                                                  `register_date`= '$stud_joining_date', 

                                                  $file_to_upld2

                                                  `created_date`= '$created_date' WHERE `id`=$stud_id";



                $query_run = $conn->query($query);



                //$json_array = array("status"=>"failed", "message"=>$query);

                //                 echo json_encode($json_array);

                //                 exit();

                if ($query_run) {

                    for ($i = 0; $i <= 2; $i++) {

                        if ($attached_files[$i] == 1) {



                            if ($i == 0) {

                                unlink(($uploading_path . $old_query_result['stu_proimg']));
                            } else if ($i == 1) {

                                unlink(($uploading_path . $old_query_result['stu_signature_img']));
                            }
                        }
                    }

                    $json_array = array("status" => "success", "message" => "Profile updated successfully.");

                    echo json_encode($json_array);

                    exit();
                } else {

                    for ($m = 0; $m <= 2; $m++) {

                        unlink(($uploading_path . $file_name[$m]));
                    }

                    $json_array = array("status" => "failed", "message" => "Some error occurred while saving data.");

                    echo json_encode($json_array);

                    exit();
                }
            }
        } else {

            $json_array = array("status" => "failed", "message" => "Some error occurred.");

            echo json_encode($json_array);

            exit();
        }
    } // trim end

    else {

        $json_array = array("status" => "failed", "message" => $error);

        echo json_encode($json_array);

        exit();
    } // trim else end 

} //action - "End Edit Form Student"





// Student Delete //

if (getPost('action') == "stud_del") {

    $stusid = getNPost('id');



    $del = "UPDATE `tb_student` SET  `status` = 0 WHERE `tb_student`.`id` =" . $stusid;

    $query_result = $conn->query($del);



    if ($query_result) {

        $msg = "Deleted Successfully";

        $json_array = array("status" => "success", "message" => $msg);

        echo json_encode($json_array);

        exit();
    } else {

        $msg = "Not Delete";

        $json_array = array("status" => "failed", "message" => $msg);

        echo json_encode($json_array);

        exit();
    }
}


/* ==================================================================================
   End Add Student  
   ================================================================================== */
