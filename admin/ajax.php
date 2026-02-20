<?php require_once('configDB.php');

include "libs/qrlib/qrlib.php";

$logged_user_id = 0;



if (getSession('admin_id') > 0) {

    $logged_user_id  = (int)(getSession('admin_id'));
}



/* logout session */

if (getPost('action') == "logout_account") {

    removeSession("admin_id");

    removeSession("admin_username");

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







                $old_query = "SELECT `image`,`signature` FROM `tb_user`;";



                $old_query_run = $conn->query($old_query);

                if ($old_query_run) {

                    $old_query_result = $old_query_run->fetch_assoc();
                }

                $query = "UPDATE `tb_user` SET `username`='$username',`password`='$password',$file_to_upld2`created_date`='$created_date' WHERE `id`=$ID";



                $query_run = $conn->query($query);



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



        $query = "SELECT * FROM `tb_user` WHERE `username`='$uname' AND `password`='$pword' AND status = 1;";

        $query_result = mysqli_query($conn, $query);



        if ($query_result) {

            if (mysqli_num_rows($query_result) > 0) {

                $query_data = mysqli_fetch_assoc($query_result);

                saveSession('admin_id', $query_data['id']);

                saveSession('admin_username', $uname);



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



//Generate second roll no //

if (getPost('action') == "generate_roll_no") {

    $id = getNPost('id');

    $check_stt = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `tb_student` WHERE `id`='$id'"));



    if ($check_stt['roll_no2'] == '') {

        function Randomstring()

        {

            $characters = "0123456789";

            $randomstring = '';

            for ($i = 0; $i < 3; $i++) {

                $randomstring = $randomstring . $characters[rand(0, strlen($characters) - 1)];
            }



            $result = mysqli_query($GLOBALS["conn"], "select * from `tb_student` where reg_no='$randomstring' && `roll_no`='$randomstring'");

            $count = mysqli_num_rows($result);

            if ($count == 0) {

                return $randomstring;
            } else {

                Randomstring();
            }
        }



        $roll_no = Randomstring();





        $rno = $check_stt['session_start'] . $check_stt['reg_month'] . $roll_no;



        $status_up = "UPDATE `tb_student` SET `roll_no2`='$rno' WHERE `id` = $id";
    }



    $query_result = $conn->query($status_up);



    if ($query_result) {

        $msg = "Roll Number Generated Successfully";

        $json_array = array("status" => "success", "message" => $msg);

        echo json_encode($json_array);

        exit();
    } else {

        $msg = "Error Occured.. Please try again..";

        $json_array = array("status" => "failed", "message" => $msg);

        echo json_encode($json_array);

        exit();
    }
}

// 

// Mark Sheet Status Enable/Disabled //

if (getPost('action') == "marksheet_status_change") {

    $Mid = getNPost('id');

    $check_M = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `tb_tot_marks` WHERE `id`='$Mid'"));



    if ($check_M['status'] == 0) {

        $status_up = "UPDATE `tb_tot_marks` SET `status`=1 WHERE `id` = $Mid";
    } else if ($check_M['status'] == 1) {

        $status_up = "UPDATE `tb_tot_marks` SET `status`=0 WHERE `id` = $Mid";
    }



    $query_result = $conn->query($status_up);



    if ($query_result) {

        $msg = "Student Result Status Change Successfully";

        $json_array = array("status" => "success", "message" => $msg);

        echo json_encode($json_array);

        exit();
    } else {

        $msg = "Error Occured.. Please try again..";

        $json_array = array("status" => "failed", "message" => $msg);

        echo json_encode($json_array);

        exit();
    }
}

/* Update Marks */

if (getPost('action') == "Update_markSheet") {

    $validator = new validations();

    //$validator->add_rule("sr_no", "Serial Number ", "required");

    $validator->add_rule("ob_theory", "Theory Marks ", "required");

    $validator->add_rule("ob_practical", "Practical Marks ", "required");

    $validator->add_rule("ob_total", "Obtained Total ", "required");

    $validator->add_rule("max_marks", "Max Marks ", "required");

    $validator->add_rule("ob_grade", "Obtained Grade ", "required");

    $validator->add_rule("ob_grand_tot", "Grand Total Obtained Marks  ", "required");

    $validator->add_rule("grand_max", "Grand Total Max Marks ", "required");

    $validator->add_rule("ob_grand_grade", "Grand Total Obtained Grade ", "required");



    $error = $validator->run();



    if (trim($error) == '') {

        $mID = getNPost('id');

        $st_id = $_POST['st_id'];

        $subjectID = $_POST['sub_id'];



        $exam_term = $_POST['et'];

        $created_date = date("Y-m-d h:i:s");

        $ob_grand_tot = getPost('ob_grand_tot');

        $grand_max = getPost('grand_max');

        $ob_grand_grade = getPost('ob_grand_grade');

        $result = getPost('result');

        $status = getPost('status');

        $qrpath = 'uploads/profile/qrcode/';





        foreach ($subjectID as $k => $val) {

            $ob_theory = $_POST['ob_theory'][$k];

            $ob_practical = $_POST['ob_practical'][$k];

            $ob_total = $_POST['ob_total'][$k];

            $max_marks = $_POST['max_marks'][$k];

            $ob_grade = $_POST['ob_grade'][$k];



            $add_depart_sql = "UPDATE `tb_marks_sheet` SET `ob_theory`='$ob_theory',`ob_practical`='$ob_practical',`total_marks`='$ob_total',`max_marks`='$max_marks',`grade`='$ob_grade' WHERE `st_id`='$st_id' && `exam_term`='$exam_term' && `sub_id`='$val'";

            $add_depart_query = $conn->query($add_depart_sql);
        }



        if ($add_depart_query) {

            $std = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `tb_student` WHERE `id`='$st_id' "));

            $dob = date('d/m/Y', strtotime($std['dob']));

            $rsdate = substr($std['session_start'], -2);

            if ($exam_term == 1) {

                $roll_no = $std['roll_no'];
            } else if ($exam_term == 2) {

                $roll_no = $std['roll_no2'];
            }

            $cou = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `tb_course` WHERE `id`='$std[course_id]'"));

            $reg_id = 'MAHGU/' . $cou['course_code'] . '/' . $rsdate . $std['reg_month'] . $std['reg_no'];

            $text = '

            S NAME    : ' . strtoupper($std['name']) . '

            F NAME    : ' . strtoupper($std['father_name']) . '

            M NAME   : ' . strtoupper($std['mother_name']) . '

            DOB         : ' . $dob . '

            COURSE   : ' . $cou['course_code'] . '

            DURATION : ' . strtoupper($std['course_duration']) . '

            REGD NO.  : ' . $reg_id . '

            ROLL NO    : ' . $roll_no . '

            MARKS      : ' . $ob_grand_tot . '/' . $grand_max . '

            GRADE       : ' . $ob_grand_grade . '

            RESULT      : ' . strtoupper($result) . '';

            $qrfullname = $qrpath . $std['session_start'] . $std['reg_month'] . $std['reg_no'] . ".png";

            $ecc = 'L';

            $pixel_Size = 4;

            QRcode::png($text, '../' . $qrfullname, $ecc, $pixel_Size);

            $add_grandMarks_sql = "UPDATE `tb_tot_marks` SET `grand_tot`='$ob_grand_tot',`max_marks`='$grand_max',`grand_grade`='$ob_grand_grade',`result`='$result',`qr`='$qrfullname',`status`='$status' WHERE `id`='$mID'";

            $conn->query($add_grandMarks_sql);



            $msg = "Marks Updated Successfully";

            $json_array = array("status" => "success", "message" => $msg);

            echo json_encode($json_array);

            exit();
        } else {

            $msg = "Failed to Update, try again..";

            $json_array = array("status" => "failed", "message" => $msg);

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



/* Add Marks  */

if (getPost('action') == "Insert_marks") {

    $validator = new validations();

    $validator->add_rule("sr_no", "Serial Number ", "required");

    $validator->add_rule("ob_theory", "Theory Marks ", "required");

    $validator->add_rule("ob_practical", "Practical Marks ", "required");

    $validator->add_rule("ob_total", "Obtained Total ", "required");

    $validator->add_rule("max_marks", "Max Marks ", "required");

    $validator->add_rule("ob_grade", "Obtained Grade ", "required");

    $validator->add_rule("ob_grand_tot", "Grand Total Obtained Marks  ", "required");

    $validator->add_rule("grand_max", "Grand Total Max Marks ", "required");

    $validator->add_rule("ob_grand_grade", "Grand Total Obtained Grade ", "required");





    $error = $validator->run();



    if (trim($error) == '') {

        $sr_no = $_POST['sr_no'];

        $st_id = $_POST['st_id'];

        $subjectID = $_POST['sub_id'];



        $exam_term = $_POST['et'];

        $created_date = date("Y-m-d h:i:s");

        $ob_grand_tot = getPost('ob_grand_tot');

        $grand_max = getPost('grand_max');

        $ob_grand_grade = getPost('ob_grand_grade');

        $result = getPost('result');

        $qrpath = 'uploads/profile/qrcode/';

        /* $json_array = array("status" => "failed", "message" => $st_id);

        echo json_encode($json_array);

        exit(); */

        $check_rno = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `tb_marks_sheet` WHERE `st_id`='$st_id' && `exam_term`='$exam_term' "));

        if ($check_rno == 0) {



            foreach ($subjectID as $k => $val) {

                $ob_theory = $_POST['ob_theory'][$k];

                $ob_practical = $_POST['ob_practical'][$k];

                $ob_total = $_POST['ob_total'][$k];

                $max_marks = $_POST['max_marks'][$k];

                $ob_grade = $_POST['ob_grade'][$k];



                $add_depart_sql = "INSERT INTO `tb_marks_sheet`( `exam_term`, `st_id`, `sub_id`, `ob_theory`, `ob_practical`, `total_marks`, `max_marks`, `grade`, `date`) VALUES ('$exam_term','$st_id','$val','$ob_theory','$ob_practical','$ob_total','$max_marks','$ob_grade','$created_date')";

                $add_depart_query = $conn->query($add_depart_sql);
            }



            if ($add_depart_query) {

                $std = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `tb_student` WHERE `id`='$st_id' "));

                $dob = date('d/m/Y', strtotime($std['dob']));

                $rsdate = substr($std['session_start'], -2);

                if ($exam_term == 1) {

                    $roll_no = $std['roll_no'];
                } else if ($exam_term == 2) {

                    $roll_no = $std['roll_no2'];
                }

                $cou = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `tb_course` WHERE `id`='$std[course_id]'"));

                $reg_id = 'MAHGU/' . $cou['course_code'] . '/' . $rsdate . $std['reg_month'] . $std['reg_no'];

                $text = '

                S NAME    : ' . strtoupper($std['name']) . '

                F NAME    : ' . strtoupper($std['father_name']) . '

                M NAME   : ' . strtoupper($std['mother_name']) . '

                DOB         : ' . $dob . '

                COURSE   : ' . $cou['course_code'] . '

                DURATION : ' . strtoupper($std['course_duration']) . '

                REGD NO.  : ' . $reg_id . '

                ROLL NO    : ' . $roll_no . '

                MARKS      : ' . $ob_grand_tot . '/' . $grand_max . '

                GRADE       : ' . $ob_grand_grade . '

                RESULT      : ' . strtoupper($result) . '';

                $qrfullname = $qrpath . $std['session_start'] . $std['reg_month'] . $std['reg_no'] . ".png";

                $ecc = 'L';

                $pixel_Size = 4;

                QRcode::png($text, '../' . $qrfullname, $ecc, $pixel_Size);



                $add_grandMarks_sql = "INSERT INTO `tb_tot_marks`(`serial_no`, `exam_term`, `st_id`, `grand_tot`, `max_marks`, `grand_grade`, `result`,`qr`, `date`) VALUES ('$sr_no','$exam_term','$st_id','$ob_grand_tot','$grand_max','$ob_grand_grade','$result','$qrfullname','$created_date')";



                $conn->query($add_grandMarks_sql);





                $msg = "Marks Added Successfully";

                $json_array = array("status" => "success", "message" => $msg);

                echo json_encode($json_array);

                exit();
            } else {

                $msg = "Failed to Update, try again..";

                $json_array = array("status" => "failed", "message" => $msg);

                echo json_encode($json_array);

                exit();
            }
        } else {

            $msg = "This student marks already entered .";

            $json_array = array("status" => "failed", "message" => $msg);

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

} //action - "End Makrs "





/* Publish Admit Card ID */

if (getPost('action') == "Release_adminCards") {

    $validator = new validations();

    $validator->add_rule("session", "Select Session ", "required");

    $validator->add_rule("did", "Select Department", "required");

    $validator->add_rule("cid", "Select Course", "required");



    $error = $validator->run();



    if (trim($error) == '') {

        $end_year = getPost('session');

        $dept_id = getPost('did');

        $course_id = getPost('cid');

        $created_date = date("Y-m-d h:i:s");

        $check_adm = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `tb_admit_card` WHERE `course_id`='$course_id' && status=0 &&  session_end='$end_year' "));

        if ($check_adm != 0) {

            $pub_adm_sql = "UPDATE `tb_admit_card` SET `status`=1, `publish_date`='$created_date' WHERE `course_id`='$course_id' && status=0 &&  session_end='$end_year'";



            $published_adm = $conn->query($pub_adm_sql);



            if ($published_adm) {

                $msg = "Admit cards Published Successfully";

                $json_array = array("status" => "success", "message" => $msg);

                echo json_encode($json_array);

                exit();
            } else {

                $msg = "Failed to Update, try again..";

                $json_array = array("status" => "failed", "message" => $msg);

                echo json_encode($json_array);

                exit();
            }
        } else {

            $msg = "No record found.";

            $json_array = array("status" => "failed", "message" => $msg);

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

} //action - "Publish Generate ID "



/* Generate Admit Card ID */

if (getPost('action') == "Create_admitID") {

    $validator = new validations();

    $validator->add_rule("st_id", "Student ", "required");

    $validator->add_rule("exam_rollno", "Exam Roll Number", "required|max_length[30]");



    $error = $validator->run();



    if (trim($error) == '') {

        $st_id = getPost('st_id');

        $rno = getPost('exam_rollno');

        $start_year = getPost('syear');

        $end_year = getPost('eyear');

        $cid = getPost('cid');

        $created_date = date("Y-m-d h:i:s");

        $check_rno = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `tb_admit_card` WHERE `exam_rollno`='$rno'"));

        if ($check_rno == 0) {

            $check_rno = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `tb_admit_card` WHERE `st_id`='$st_id' && (`session_start`='$start_year' && `session_end`='$end_year')"));

            if ($check_rno == 0) {



                $add_depart_sql = "INSERT INTO `tb_admit_card`( `st_id`, `course_id`, `exam_rollno`, `session_start`, `session_end`, `status`, `date`) VALUES ('$st_id','$cid','$rno','$start_year','$end_year','0','$created_date')";



                $add_depart_query = $conn->query($add_depart_sql);



                if ($add_depart_query) {

                    $msg = "Admit card Generated Successfully";

                    $json_array = array("status" => "success", "message" => $msg);

                    echo json_encode($json_array);

                    exit();
                } else {

                    $msg = "Failed to Update, try again..";

                    $json_array = array("status" => "failed", "message" => $msg);

                    echo json_encode($json_array);

                    exit();
                }
            } else {

                $msg = "This Student ID card already generated for this session.";

                $json_array = array("status" => "failed", "message" => $msg);

                echo json_encode($json_array);

                exit();
            }
        } else {

            $msg = "This roll number already registered.";

            $json_array = array("status" => "failed", "message" => $msg);

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

} //action - "End Generate ID "



/* Update Admit Card ID */

if (getPost('action') == "Update_admitID") {

    $validator = new validations();

    $validator->add_rule("exam_rollno", "Exam Roll Number", "required|max_length[30]");



    $error = $validator->run();



    if (trim($error) == '') {

        $rID = getNPost('id');

        $rno = getPost('exam_rollno');







        $add_depart_sql = "UPDATE `tb_admit_card` SET  `exam_rollno`='$rno' WHERE id='$rID'";



        $add_depart_query = $conn->query($add_depart_sql);



        if ($add_depart_query) {

            $msg = "Admit card Updated Successfully";

            $json_array = array("status" => "success", "message" => $msg);

            echo json_encode($json_array);

            exit();
        } else {

            $msg = "Failed to Update, try again..";

            $json_array = array("status" => "failed", "message" => $msg);

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

} //action - "End Update ID "



// Admit card Status Enable/Disabled //

if (getPost('action') == "admit_status_change") {

    $sid = getNPost('id');

    $check_s = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `tb_student` WHERE `id`='$sid'"));



    if ($check_s['ad_status'] == 0) {

        $status_up = "UPDATE `tb_student` SET `ad_status`=1 WHERE `id` = $sid";
    } else if ($check_s['ad_status'] == 1) {

        $status_up = "UPDATE `tb_student` SET `ad_status`=0 WHERE `id` = $sid";
    }



    $query_result = $conn->query($status_up);



    if ($query_result) {

        $msg = "Admit Card Status Change Successfully";

        $json_array = array("status" => "success", "message" => $msg);

        echo json_encode($json_array);

        exit();
    } else {

        $msg = "Error Occured.. Please try again..";

        $json_array = array("status" => "failed", "message" => $msg);

        echo json_encode($json_array);

        exit();
    }
}

// Admit Card Delete //

if (getPost('action') == "Admit_card_delete") {

    $id = getNPost('id');



    $check_A = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `tb_admit_card` WHERE `id`='$id' && `status`='1'"));

    if ($check_A == 0) {



        $del = "DELETE FROM `tb_admit_card` WHERE `id` = $id";

        $query_result = $conn->query($del);



        if ($query_result) {

            $msg = "Admit Card Deleted Successfully";

            $json_array = array("status" => "success", "message" => $msg);

            echo json_encode($json_array);

            exit();
        } else {

            $msg = "Error Occured.. Please try again..";

            $json_array = array("status" => "failed", "message" => $msg);

            echo json_encode($json_array);

            exit();
        }
    } else {

        $msg = "Admit card published.. Please first hold it.";

        $json_array = array("status" => "failed", "message" => $msg);

        echo json_encode($json_array);

        exit();
    }
}

/* Add Subject  */

if (getPost('action') == "add_subject") {

    $validator = new validations();

    //$validator->add_rule("subject_code", "Subject Code", "required|max_length[20]");

    $validator->add_rule("subject_name", "Subject Name", "required|max_length[100]");

    $validator->add_rule("description", "Subject Duration", "");

    $validator->add_rule("subject_img", "Subject Image", "");

    $error = $validator->run();



    if (trim($error) == '') {

        $dept_id = getPost('dept_id');

        $course_id = getPost('course_id');

        $et = getPost('et');

        $subject_name = getPost('subject_name');

        $description = getPost('description');

        $is_practical = getPost('is_practical');

        $created_date = date("Y-m-d h:i:s");

        //$sub_img_upload = $_FILES['subject_img']['name'];

        if ($et == 1) {

            $ch_scode_qr = mysqli_query($conn, "SELECT * FROM `tb_subject` WHERE `dept_id`='$dept_id' && `cours_id`='$course_id' && `sub_term`='1' order by id DESC");

            $ch = mysqli_num_rows($ch_scode_qr);

            if ($ch != 0) {

                $ch_scode = mysqli_fetch_array($ch_scode_qr);

                $subject_code = $ch_scode['sub_code'] + 1;
            } else {

                $subject_code = '101';
            }
        } else if ($et == 2) {

            $ch_scode_qr1 = mysqli_query($conn, "SELECT * FROM `tb_subject` WHERE `dept_id`='$dept_id' && `cours_id`='$course_id' && `sub_term`='2' order by id DESC");

            $ch = mysqli_num_rows($ch_scode_qr1);

            if ($ch != 0) {

                $ch_scode1 = mysqli_fetch_array($ch_scode_qr1);

                $subject_code = $ch_scode1['sub_code'] + 1;
            } else {

                $subject_code = '201';
            }
        }

        $ch_sub_name = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `tb_subject` WHERE `sub_name`='$subject_name' && `dept_id`='$dept_id' && `cours_id`='$course_id' && `sub_term`='$et'"));

        if ($ch_sub_name == 0) {



            $add_depart_sql = "INSERT INTO `tb_subject`(`dept_id`, `cours_id`, `sub_term`, `sub_code`, `sub_name`, `sub_image`, `sub_description`,`is_practical`, `status`, `create_date`) VALUES ('$dept_id','$course_id','$et', '$subject_code','$subject_name','$sub_img_save','$description','$is_practical','1','$created_date')";

            $add_depart_query = $conn->query($add_depart_sql);



            if ($add_depart_query) {

                $msg = "Subject Added Successfully";

                $json_array = array("status" => "success", "message" => $msg);

                echo json_encode($json_array);

                exit();
            } else {

                $msg = "Failed to Update, try again later";

                $json_array = array("status" => "failed", "message" => $msg);

                echo json_encode($json_array);

                exit();
            }
        } //

        else {

            $msg = "This subject name already added in this course";

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

} //action - "End Add Subject "



/* Subject Update  */

if (getPost('action') == "update_subject") {

    $validator = new validations();

    $validator->add_rule("subject_code", "Subject Code", "required|max_length[20]");

    $validator->add_rule("subject_name", "Subject Name", "required|max_length[100]");

    $validator->add_rule("description", "Subject Duration", "");

    $validator->add_rule("subject_img", "Subject Image", "");

    $error = $validator->run();





    if (trim($error) == '') {

        $dept_id = getPost('dept_id');

        $course_id = getPost('course_id');

        $subject_code = getPost('subject_code');

        $subject_name = getPost('subject_name');

        $description = getPost('description');

        $status = getPost('status');

        $subjectID = getNPost('id');

        //$course_img_upload = $_FILES['subject_img']['name'];



        if (!empty($_FILES['subject_img']['name'])) {

            $image = $_FILES["subject_img"]["name"];

            $subject_img = str_replace(" ", "-", $image);  //stores the original filename from the client

            $tmp =      $_FILES["subject_img"]["tmp_name"]; //stores the name of the designated temporary file

            $errorimg = $_FILES["subject_img"]["error"]; //stores any error code resulting from the transfer



            $valid_extensions = array('jpeg', 'jpg', 'png', 'JPEG', 'PNG'); // valid extensions

            $path = '../uploads/subjects/'; // upload directory



            // get uploaded file's extension

            $ext = strtolower(pathinfo($subject_img, PATHINFO_EXTENSION));



            // can upload same image size limit using function 

            $file_size = $_FILES['subject_img']['size'];



            // can upload same image using rand function

            $final_image = rand(1000, 1000000) . $subject_img;

            /* edit profile */



            // check's valid format

            if (in_array($ext, $valid_extensions)) {

                $path = $path . strtolower($final_image);

                $uploadreport1 = move_uploaded_file($tmp, $path);

                $subject_img_update = 'uploads/subjects/' . $final_image;



                if ($uploadreport1) {



                    $edit_depart_sql = "UPDATE `tb_subject` SET `dept_id`='$dept_id',`cours_id`='$course_id',`sub_code`='$subject_code',`sub_name`='$subject_name',`sub_image`='$subject_img_update',`sub_description`='$description',`status`='$status'  WHERE `id`='$subjectID'";



                    $edit_depart_query = $conn->query($edit_depart_sql);

                    if ($edit_depart_query) {

                        $msg = "Subject Data Update Successfully";

                        $json_array = array("status" => "success", "message" => $msg);

                        echo json_encode($json_array);

                        exit();
                    } else {

                        $msg = "Failed to Update, try again later";

                        $json_array = array("status" => "failed", "message" => $msg);

                        echo json_encode($json_array);

                        exit();
                    }
                } // end uploadreport

                else {

                    $msg = 'Failed to upload image';

                    $json_array = array("status" => "failed", "message" => $msg);

                    echo json_encode($json_array);

                    exit();
                } // end else uploadreport



            } // end check's valid format

            else {

                $msg = 'Invalid file path';

                $json_array = array("status" => "failed", "message" => $msg);

                echo json_encode($json_array);

                exit();
            }
        } // not empty

        else if (empty($_FILES['subject_img']['name'])) {



            $edit_depart_sql = "UPDATE `tb_subject` SET `dept_id`='$dept_id',`cours_id`='$course_id',`sub_code`='$subject_code',`sub_name`='$subject_name',`sub_description`='$description',`status`='$status'  WHERE `id`='$subjectID'";



            $edit_depart_query = $conn->query($edit_depart_sql);



            if ($edit_depart_query) {

                $msg = "Subject Data Update Successfully";

                $json_array = array("status" => "success", "message" => $msg);

                echo json_encode($json_array);

                exit();
            } else {

                $msg = "Failed to Update, try again later";

                $json_array = array("status" => "failed", "message" => $msg);

                echo json_encode($json_array);

                exit();
            }
        } // if empty upload file end

    } // trim end

    else {

        $msg = $error;

        $json_array = array("status" => "failed", "message" => $msg);

        echo json_encode($json_array);

        exit();
    } // trim else end 

} //action - "End Subject Update"



// Subject Status Enable/Disabled //

if (getPost('action') == "subject_status_change") {

    $sid = getNPost('id');

    $check_s = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `tb_subject` WHERE `id`='$sid'"));



    if ($check_s['status'] == 0) {

        $status_up = "UPDATE `tb_subject` SET `status`=1 WHERE `id` = $sid";
    } else if ($check_s['status'] == 1) {

        $status_up = "UPDATE `tb_subject` SET `status`=0 WHERE `id` = $sid";
    }



    $query_result = $conn->query($status_up);



    if ($query_result) {

        $msg = "Course Status Change Successfully";

        $json_array = array("status" => "success", "message" => $msg);

        echo json_encode($json_array);

        exit();
    } else {

        $msg = "Error Occured.. Please try again..";

        $json_array = array("status" => "failed", "message" => $msg);

        echo json_encode($json_array);

        exit();
    }
}

// Course Delete //

if (getPost('action') == "Subject_delete") {

    $id = getNPost('id');



    $del = "DELETE FROM `tb_subject` WHERE `id` = $id";

    $query_result = $conn->query($del);



    if ($query_result) {

        $msg = "Subject Deleted Successfully";

        $json_array = array("status" => "success", "message" => $msg);

        echo json_encode($json_array);

        exit();
    } else {

        $msg = "Error Occured.. Please try again..";

        $json_array = array("status" => "failed", "message" => $msg);

        echo json_encode($json_array);

        exit();
    }
}



/* Add Courses  */

if (getPost('action') == "add_courses") {

    $validator = new validations();

    $validator->add_rule("cours_code", "Course Code", "required|max_length[20]");

    $validator->add_rule("cours_name", "Course Name", "required|max_length[100]");

    $validator->add_rule("course_type", "Course Type", "required|max_length[50]");

    $validator->add_rule("cours_duration", "Course Duration", "required|max_length[20]");

    //$validator->add_rule("cours_img", "Course Image", "");

    $validator->add_rule("cours_eligible", "Course Eligibility", "required|max_length[250]");



    $error = $validator->run();



    if (trim($error) == '') {

        $dept_id = getPost('dept_id');

        $cours_code = getPost('cours_code');

        $cours_name = getPost('cours_name');

        $course_type = getPost('course_type');

        $cours_duration = getPost('cours_duration');

        $description = getPost('description');

        $cours_eligible = getPost('cours_eligible');



        $cours_semst = getPost('course_sems');



        $created_date = date("Y-m-d h:i:s");

        $course_img_upload = $_FILES['cours_img']['name'];



        $add_depart_sql = "INSERT INTO `tb_course`(`dept_id`, `course_code`, `name`, `curs_semester`, `course_type`, `course_duration`, `description`,`course_eligibility`,`status`, `date`) VALUES ('$dept_id','$cours_code','$cours_name', $cours_semst, '$course_type','$cours_duration','$description','$cours_eligible', '1','$created_date')";



        $add_depart_query = $conn->query($add_depart_sql);



        if ($add_depart_query) {

            $msg = "Course Added Successfully";

            $json_array = array("status" => "success", "message" => $msg);

            echo json_encode($json_array);

            exit();
        } else {

            $msg = "Failed to Update, try again later";

            $json_array = array("status" => "failed", "message" => $msg);

            echo json_encode($json_array);

            exit();
        }
    } // trim end

    else {

        $msg = $error;

        $json_array = array("status" => "failed", "message" => $msg);

        echo json_encode($json_array);

        exit();
    } // trim else end 

} //action - "End Add Course "



/* Course Update  */

if (getPost('action') == "update_course") {

    $validator = new validations();

    $validator->add_rule("cours_code", "Course Code", "required|max_length[20]");

    $validator->add_rule("cours_name", "Course Name", "required|max_length[100]");

    $validator->add_rule("course_type", "Course Type", "required|max_length[50]");

    $validator->add_rule("cours_duration", "Course Duration", "required|max_length[20]");

    //$validator->add_rule("cours_img", "Course Image", "");

    $validator->add_rule("cours_eligible", "Course Eligibility", "required|max_length[250]");

    $error = $validator->run();





    if (trim($error) == '') {

        $dept_id = getPost('dept_id');

        $cours_code = getPost('cours_code');

        $cours_name = getPost('cours_name');

        $course_type = getPost('course_type');

        $cours_duration = getPost('cours_duration');

        $description = getPost('description');

        $cours_eligible = getPost('cours_eligible');

        $created_date = date("Y-m-d h:i:s");

        $status = getPost('status');

        $courseID = getNPost('id');



        $cours_semst = getPost('course_sems');



        $course_img_upload = $_FILES['cours_img']['name'];



        if (!empty($_FILES['cours_img']['name'])) {

            $image = $_FILES["cours_img"]["name"];

            $course_img = str_replace(" ", "-", $image);  //stores the original filename from the client

            $tmp =      $_FILES["cours_img"]["tmp_name"]; //stores the name of the designated temporary file

            $errorimg = $_FILES["cours_img"]["error"]; //stores any error code resulting from the transfer



            $valid_extensions = array('jpeg', 'jpg', 'png', 'JPEG', 'PNG'); // valid extensions

            $path = '../uploads/courses/'; // upload directory



            // get uploaded file's extension

            $ext = strtolower(pathinfo($course_img, PATHINFO_EXTENSION));



            // can upload same image size limit using function 

            $file_size = $_FILES['cours_img']['size'];



            // can upload same image using rand function

            $final_image = rand(1000, 1000000) . $course_img;

            /* edit profile */



            // check's valid format

            if (in_array($ext, $valid_extensions)) {

                $path = $path . strtolower($final_image);

                $uploadreport1 = move_uploaded_file($tmp, $path);

                $course_img_update = 'uploads/courses/' . $final_image;



                if ($uploadreport1) {



                    $edit_depart_sql = "UPDATE `tb_course` SET `dept_id`='$dept_id',`course_code`='$cours_code',`name`='$cours_name', `curs_semester`=$cours_semst, `course_type`='$course_type',`course_duration`='$cours_duration',`description`='$description', `course_eligibility`='$cours_eligible',  `status`='$status'  WHERE `id`='$courseID'";



                    $edit_depart_query = $conn->query($edit_depart_sql);



                    //$json_array = array("status" => "failed", "message" => $edit_depart_sql);

                    //                        echo json_encode($json_array);

                    //                        exit();



                    if ($edit_depart_query) {

                        $msg = "Course Data Update Successfully";

                        $json_array = array("status" => "success", "message" => $msg);

                        echo json_encode($json_array);

                        exit();
                    } else {

                        $msg = "Failed to Update, try again later";

                        $json_array = array("status" => "failed", "message" => $msg);

                        echo json_encode($json_array);

                        exit();
                    }
                } // end uploadreport

                else {

                    $msg = 'Failed to upload image';

                    $json_array = array("status" => "failed", "message" => $msg);

                    echo json_encode($json_array);

                    exit();
                } // end else uploadreport



            } // end check's valid format

            else {

                $msg = 'Invalid file path';

                $json_array = array("status" => "failed", "message" => $msg);

                echo json_encode($json_array);

                exit();
            }
        } // not empty

        else if (empty($_FILES['cours_img']['name'])) {



            $edit_depart_sql = "UPDATE `tb_course` SET `dept_id`='$dept_id',`course_code`='$cours_code',`name`='$cours_name', `curs_semester`=$cours_semst, `course_type`='$course_type',`course_duration`='$cours_duration',`course_eligibility`='$cours_eligible',`description`='$description',  `status`='$status'  WHERE `id`='$courseID'";



            $edit_depart_query = $conn->query($edit_depart_sql);



            //$json_array = array("status" => "failed", "message" => $edit_depart_sql);

            //                        echo json_encode($json_array);

            //                        exit();



            if ($edit_depart_query) {

                $msg = "Course Data Update Successfully";

                $json_array = array("status" => "success", "message" => $msg);

                echo json_encode($json_array);

                exit();
            } else {

                $msg = "Failed to Update, try again later";

                $json_array = array("status" => "failed", "message" => $msg);

                echo json_encode($json_array);

                exit();
            }
        } // if empty upload file end

    } // trim end

    else {

        $msg = $error;

        $json_array = array("status" => "failed", "message" => $msg);

        echo json_encode($json_array);

        exit();
    } // trim else end 

} //action - "End Course Update"



// Course Status Enable/Disabled //

if (getPost('action') == "course_status_change") {

    $sid = getNPost('id');

    $check_s = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `tb_course` WHERE `id`='$sid'"));



    if ($check_s['status'] == 0) {

        $status_up = "UPDATE `tb_course` SET `status`=1 WHERE `id` = $sid";
    } else if ($check_s['status'] == 1) {

        $status_up = "UPDATE `tb_course` SET `status`=0 WHERE `id` = $sid";
    }



    $query_result = $conn->query($status_up);



    if ($query_result) {

        $msg = "Course Status Change Successfully";

        $json_array = array("status" => "success", "message" => $msg);

        echo json_encode($json_array);

        exit();
    } else {

        $msg = "Error Occured.. Please try again..";

        $json_array = array("status" => "failed", "message" => $msg);

        echo json_encode($json_array);

        exit();
    }
}

// Course Delete //

if (getPost('action') == "course_delete") {

    $id = getNPost('id');

    $check_subject = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `tb_subject` WHERE `cours_id`='$id'"));

    if ($check_subject != 0) {

        $msg = 'ERROR: Course has subject data.. First delete Subject data.';

        $json_array = array("status" => "failed", "message" => $msg);

        echo json_encode($json_array);

        exit();
    } else {

        $del = "DELETE FROM `tb_course` WHERE `id` = $id";

        $query_result = $conn->query($del);



        if ($query_result) {

            $msg = "Course Deleted Successfully";

            $json_array = array("status" => "success", "message" => $msg);

            echo json_encode($json_array);

            exit();
        } else {

            $msg = "Error Occured.. Please try again..";

            $json_array = array("status" => "failed", "message" => $msg);

            echo json_encode($json_array);

            exit();
        }
    }
}



/* Add Department  */

if (getPost('action') == "add_department") {

    $validator = new validations();

    $validator->add_rule("depart_name", "Department Title", "required|max_length[250]");

    $error = $validator->run();



    if (trim($error) == '') {

        $depart_title = getPost('depart_name');

        $depart_img = getPost('depart_img');

        $description = getPost('description');

        //$rank = getNPost('rank');

        $depart_active = getNPost('active');

        $created_date = date("Y-m-d h:i:s");



        $depart_img_upload = $_FILES['depart_img']['name'];



        if (!empty($_FILES['depart_img']['name'])) {



            $image = $_FILES["depart_img"]["name"];

            $slide_img = str_replace(" ", "-", $image); //stores the original filename from the client

            $tmp =      $_FILES["depart_img"]["tmp_name"]; //stores the name of the designated temporary file

            $errorimg = $_FILES["depart_img"]["error"]; //stores any error code resulting from the transfer



            $valid_extensions = array('jpeg', 'jpg', 'png', 'JPEG', 'PNG'); // valid extensions

            $path = '../uploads/departments/'; // upload directory



            // get uploaded file's extension

            $ext = strtolower(pathinfo($slide_img, PATHINFO_EXTENSION));



            // can upload same image size limit using function 

            $file_size = $_FILES['depart_img']['size'];



            // can upload same image using rand function

            $final_image = rand(1000, 1000000) . $slide_img;

            /* edit profile */



            // check's valid format

            if (in_array($ext, $valid_extensions)) {

                $path = $path . strtolower($final_image);

                $uploadreport1 = move_uploaded_file($tmp, $path);



                if ($uploadreport1) {



                    $add_depart_sql = "INSERT INTO `tb_department` (`name`,`image`,`description`, `created_date`) VALUES ('$depart_title', '$final_image','$description','$created_date')";



                    $add_depart_query = $conn->query($add_depart_sql);



                    if ($add_depart_query) {

                        $msg = "Department Form Update Successfully";

                        $json_array = array("status" => "success", "message" => $msg);

                        echo json_encode($json_array);

                        exit();
                    } else {

                        $msg = "Failed to Update, try again later";

                        $json_array = array("status" => "failed", "message" => $msg);

                        echo json_encode($json_array);

                        exit();
                    }
                } // end uploadreport

                else {

                    $msg = 'Failed to upload image';

                    $json_array = array("status" => "failed", "message" => $msg);

                    echo json_encode($json_array);

                    exit();
                } // end else uploadreport



            } // end check's valid format

            else {

                $msg = 'Invalid file path';

                $json_array = array("status" => "failed", "message" => $msg);

                echo json_encode($json_array);

                exit();
            }
        } // not empty

        else if (empty($_FILES['depart_img']['name'])) {



            $add_depart_sql = "INSERT INTO `tb_department` (`name`,`description`, `created_date`) VALUES ('$depart_title','$description','$created_date')";



            $add_depart_query = $conn->query($add_depart_sql);



            if ($add_depart_query) {

                $msg = "Department Form Update Successfully";

                $json_array = array("status" => "success", "message" => $msg);

                echo json_encode($json_array);

                exit();
            } else {

                $msg = "Failed to Update, try again later";

                $json_array = array("status" => "failed", "message" => $msg);

                echo json_encode($json_array);

                exit();
            }
        } // if empty upload file end

    } // trim end

    else {

        $msg = $error;

        $json_array = array("status" => "failed", "message" => $msg);

        echo json_encode($json_array);

        exit();
    } // trim else end 

} //action - "End Add Department Image"

// Dipartment Status Enable/Disabled //

if (getPost('action') == "dipartment_status_change") {

    $sid = getNPost('id');

    $check_s = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `tb_department` WHERE `id`='$sid'"));



    if ($check_s['status'] == 0) {

        $status_up = "UPDATE `tb_department` SET `status`=1 WHERE `id` = $sid";
    } else if ($check_s['status'] == 1) {

        $status_up = "UPDATE `tb_department` SET `status`=0 WHERE `id` = $sid";
    }



    $query_result = $conn->query($status_up);



    if ($query_result) {

        $msg = "Dipartment Status Change Successfully";

        $json_array = array("status" => "success", "message" => $msg);

        echo json_encode($json_array);

        exit();
    } else {

        $msg = "Error Occured.. Please try again..";

        $json_array = array("status" => "failed", "message" => $msg);

        echo json_encode($json_array);

        exit();
    }
}

/* Edit Department  */

if (getPost('action') == "edit_department") {

    $validator = new validations();

    $validator->add_rule("depart_name", "Department Title", "required|max_length[250]");

    $error = $validator->run();





    if (trim($error) == '') {

        $depart_title = getPost('depart_name');

        $depart_img = getPost('depart_img');

        $description = getPost('description');

        //$rank = getNPost('rank');

        $depart_active = getNPost('set_status');

        $depart_img_upload = $_FILES['depart_img']['name'];

        $depart_edID = getNPost('id');





        if (!empty($_FILES['depart_img']['name'])) {

            $image = $_FILES["depart_img"]["name"];

            $slide_img = str_replace(" ", "-", $image); //stores the original filename from the client

            $tmp =      $_FILES["depart_img"]["tmp_name"]; //stores the name of the designated temporary file

            $errorimg = $_FILES["depart_img"]["error"]; //stores any error code resulting from the transfer



            $valid_extensions = array('jpeg', 'jpg', 'png', 'JPEG', 'PNG'); // valid extensions

            $path = '../uploads/departments/'; // upload directory



            // get uploaded file's extension

            $ext = strtolower(pathinfo($slide_img, PATHINFO_EXTENSION));



            // can upload same image size limit using function 

            $file_size = $_FILES['depart_img']['size'];



            // can upload same image using rand function

            $final_image = rand(1000, 1000000) . $slide_img;

            /* edit profile */



            // check's valid format

            if (in_array($ext, $valid_extensions)) {

                $path = $path . strtolower($final_image);

                $uploadreport1 = move_uploaded_file($tmp, $path);



                if ($uploadreport1) {



                    $edit_depart_sql = "UPDATE  `tb_department` SET  `name`='$depart_title', `image`='$final_image',`description`='$description',  `status`=$depart_active WHERE `id`=$depart_edID";



                    $edit_depart_query = $conn->query($edit_depart_sql);



                    // $json_array = array("status" => "failed", "message" => $edit_depart_sql);

                    // echo json_encode($json_array);

                    // exit();



                    if ($edit_depart_query) {

                        $msg = "Department Form Update Successfully";

                        $json_array = array("status" => "success", "message" => $msg);

                        echo json_encode($json_array);

                        exit();
                    } else {

                        $msg = "Failed to Update, try again later";

                        $json_array = array("status" => "failed", "message" => $msg);

                        echo json_encode($json_array);

                        exit();
                    }
                } // end uploadreport

                else {

                    $msg = 'Failed to upload image';

                    $json_array = array("status" => "failed", "message" => $msg);

                    echo json_encode($json_array);

                    exit();
                } // end else uploadreport



            } // end check's valid format

            else {

                $msg = 'Invalid file path';

                $json_array = array("status" => "failed", "message" => $msg);

                echo json_encode($json_array);

                exit();
            }
        } // not empty

        else if (empty($_FILES['depart_img']['name'])) {



            $edit_depart_sql = "UPDATE `tb_department` SET `name`='$depart_title',`description`='$description', `status`=$depart_active WHERE `id`=$depart_edID";



            $edit_depart_query = $conn->query($edit_depart_sql);



            // $json_array = array("status" => "failed", "message" => $edit_depart_sql);

            // echo json_encode($json_array);

            // exit();



            if ($edit_depart_query) {

                $msg = "Department Form Update Successfully";

                $json_array = array("status" => "success", "message" => $msg);

                echo json_encode($json_array);

                exit();
            } else {

                $msg = "Failed to Update, try again later";

                $json_array = array("status" => "failed", "message" => $msg);

                echo json_encode($json_array);

                exit();
            }
        } // if empty upload file end

    } // trim end

    else {

        $msg = $error;

        $json_array = array("status" => "failed", "message" => $msg);

        echo json_encode($json_array);

        exit();
    } // trim else end 

} //action - "End Edit Department Image"





// Department Delete //



if (getPost('action') == "dept_del") {

    $stusid = getNPost('id');



    $check_course = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `tb_course` WHERE `dept_id`='$stusid'"));

    if ($check_course != 0) {

        $msg = 'ERROR: Dipartment has course data.. First delete course data.';

        $json_array = array("status" => "failed", "message" => $msg);

        echo json_encode($json_array);

        exit();
    } else {

        $del = "DELETE FROM `tb_department` WHERE `tb_department`.`id` =" . $stusid;

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
}



/* Add Student  */

if (getPost('action') == "add_stud_pro") {

    $validator = new validations();

    $validator->add_rule("curs_id", "Course type", "required|numeric|max_length[90]");

    //$validator->add_rule("reg_month", "Registrator Month", "required");

    //$validator->add_rule("regi_no", "Registration Number", "required");



    $validator->add_rule("stu_name", "Student Name", "required|max_length[90]");

    $validator->add_rule("father_name", "Father Name", "required|max_length[90]");

    $validator->add_rule("mother_name", "Mother Name", "required|max_length[90]");



    $validator->add_rule("tcentre_name", "Training Centre", "required|max_length[90]");

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

        $stud_tcentre_id = getNPost('tcentre_name');

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

                // $ch_stu_re = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `tb_student` WHERE `name`='$stud_name' && `dob`='$stud_dob' && `father_name`='$stud_fathername'"));
                $ch_stu_re = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `tb_student` WHERE `roll_no`='$stud_rollno' "));
                
                if ($ch_stu_re == 0) {

                    $query = "INSERT INTO `tb_student` (`session_start`, `session_end`,`reg_month`,`reg_no`,`course_id`, `dept_id`,`course_duration`,`name`, `dob`,`gender`,`mobile`,`email`,`father_name`, `mother_name`, `centre_id`,`roll_no`,`register_date`, $file_cols `created_date`) 

            VALUES 

            ('$session_start', '$session_end','$reg_month','$stud_regi_numr',$stud_curs_id,$dept_id_show,'$curs_duration_show','$stud_name','$stud_dob', '$stud_gender', $stud_mobile,'$stud_email','$stud_fathername','$stud_mothername', $stud_tcentre_id,'$stud_rollno','$stud_joining_date',$file_col_vals '$created_date')";



                    $query_run = $conn->query($query);


                //   $json_array = array("status" => "failed", "message" => $query);
                //     echo json_encode($json_array);
                //     exit(); 

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



    $validator->add_rule("tcentre_name", "Training Centre", "required|max_length[90]");

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

        $stud_tcentre_id = getNPost('tcentre_name');

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

                                                  `centre_id`= $stud_tcentre_id,

                                                  `roll_no`= '$stud_rollno',

                                                  `register_date`= '$stud_joining_date', 

                                                  $file_to_upld2

                                                  `created_date`= '$created_date' WHERE `id`=$stud_id";

                $query_run = $conn->query($query);

                // $json_array = array("status"=>"failed", "message"=>$query);
                // echo json_encode($json_array);
                // exit();

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



/* Add Employee  */

/*if (getPost('action') == "add_empl_pro") {

    $validator = new validations();

    $validator->add_rule("ref_numr", "Reference Number", "required|max_length[90]");

    $validator->add_rule("emply_name", "Employee Name", "required|max_length[90]");

    $validator->add_rule("empl_dob", "Employee D.O.B", "required");

    $validator->add_rule("emp_gender", "Gender", "required|max_length[15]");

    $validator->add_rule("emp_qualif", "Qualification", "required|max_length[250]");

    $validator->add_rule("father_name", "Father Name", "required|max_length[90]");

    $validator->add_rule("mother_name", "Mother Name", "required|max_length[90]");

    $validator->add_rule("emp_mobileno", "Mobile Number", "required|numeric|max_length[90]");

    $validator->add_rule("emp_email_addrs", "Email Address", "required|max_length[90]");

    $validator->add_rule("emp_addrs", "Residential Address", "required|max_length[250]");

    $validator->add_rule("tcentre_name", "Training Centre", "required|max_length[90]");

    $validator->add_rule("dept_id", "Department", "required|max_length[90]");

    //$validator->add_rule("course_id", "Course", "required|max_length[90]");

    $validator->add_rule("is_teach", "Teaching Or Non-teaching", "required|max_length[1]");

    $error = $validator->run();


    if (trim($error) == '') {

        $empl_refno = getPost('ref_numr');

        $empl_name = getPost('emply_name');

        $empl_dob = getPost('empl_dob');

        $empl_gender = getPost('emp_gender');

        $empl_quali = getPost('emp_qualif');



        $emp_fathername = getPost('father_name');

        $emp_mothername = getPost('mother_name');

        $emp_mobil = getPost('emp_mobileno');

        $emp_email = getPost('emp_email_addrs');

        $emp_addrs = getPost('emp_addrs');

        $emp_tcentre_id = getPost('tcentre_name');

        $emp_dept_id = getPost('dept_id');

        $emp_cours_id = getPost('course_id');

        $is_teacher = getNPost('is_teach');
        $emp_salary = getNPost('emp_salary');


        $emp_img = getPost('emp_proimg');



        //$emp_joining_date = date("Y-m-d");
        $emp_active = getNPost('active');

        $joining_date = getPost('emp_joindate'); 
        $emp_joining_date = date('Y-m-d',strtotime($joining_date));
        $ending_date = getPost('emp_enddate');
        $emp_ending_date = date('Y-m-d',strtotime($ending_date));

        $created_date = date("Y-m-d h:i:s");

        $emp_img_upload = $_FILES['emp_proimg']['name'];
        $uploading_path = '../uploads/empl/';
        

        if (!empty($_FILES['emp_proimg']['name'])) {

            $image = $_FILES["emp_proimg"]["name"];

            $slide_img = str_replace(" ", "-", $image); //stores the original filename from the client

            $tmp =      $_FILES["emp_proimg"]["tmp_name"]; //stores the name of the designated temporary file

            $errorimg = $_FILES["emp_proimg"]["error"]; //stores any error code resulting from the transfer

            $valid_extensions = array('jpeg', 'jpg', 'png', 'JPEG', 'PNG'); // valid extensions

            $path = '../uploads/empl/'; // upload directory



            // get uploaded file's extension

            $ext = strtolower(pathinfo($slide_img, PATHINFO_EXTENSION));



            // can upload same image size limit using function 

            $file_size = $_FILES['emp_proimg']['size'];



            // can upload same image using rand function

            $final_image = rand(1000, 1000000) . $slide_img;

            /* edit profile */



            // check's valid format

            /*if (in_array($ext, $valid_extensions)) {

                $path = $path . strtolower($final_image);

                $uploadreport = move_uploaded_file($tmp, $path);



                if ($uploadreport) {



                    $add_empl_sql = "INSERT INTO `tb_employee` (`ref_no`,`centre_id`, `dept_id`,`is_teacher`,`name`, `dob`,`gender`,`mobile`,`email`,`father_name`, `mother_name`, `qualification`, `address`,`join_date`, `end_date`, `salary`, `image`, `created_date`) 

                    VALUES 

                    ('$empl_refno', '$emp_tcentre_id', $emp_dept_id, $is_teacher,'$empl_name','$empl_dob', '$empl_gender', $emp_mobil,'$emp_email','$emp_fathername','$emp_mothername', '$empl_quali', '$emp_addrs', '$emp_joining_date', '$emp_ending_date', $emp_salary, '$path', '$created_date')";



                    $add_empl_query = $conn->query($add_empl_sql);



                    // $json_array = array("status" => "failed", "message" => $add_empl_sql);
                    // echo json_encode($json_array);
                    // exit();



                    if ($add_empl_query) {

                        $msg = "Employee Form Update Successfully";

                        $json_array = array("status" => "success", "message" => $msg);

                        echo json_encode($json_array);

                        exit();
                    } else {

                        $msg = "Failed to Update, try again later";

                        $json_array = array("status" => "failed", "message" => $msg);

                        echo json_encode($json_array);

                        exit();
                    }
                } // end uploadreport

                else {

                    $msg = 'Failed to upload image';

                    $json_array = array("status" => "failed", "message" => $msg);

                    echo json_encode($json_array);

                    exit();
                } // end else uploadreport



            } // end check's valid format

            else {

                $msg = 'Invalid file path';

                $json_array = array("status" => "failed", "message" => $msg);

                echo json_encode($json_array);

                exit();
            }
        } // not empty

        else if (empty($_FILES['emp_proimg']['name'])) {



            $add_empl_sql = "INSERT INTO `tb_employee` (`ref_no`,`centre_id`, `dept_id`,`is_teacher`,`name`, `dob`,`gender`,`mobile`,`email`,`father_name`, `mother_name`, `qualification`, `address`,`join_date`, `end_date`, `salary`, `created_date`) 

            VALUES 

            ('$empl_refno', '$emp_tcentre_id', $emp_dept_id, $is_teacher,'$empl_name','$empl_dob', '$empl_gender', $emp_mobil,'$emp_email','$emp_fathername','$emp_mothername', '$empl_quali', '$emp_addrs', '$emp_joining_date', '$emp_ending_date', $emp_salary, '$created_date')";



            $add_empl_query = $conn->query($add_empl_sql);

            // $json_array = array("status" => "failed", "message" => $emp_ending_date);
            // echo json_encode($json_array);
            // exit();

            if ($add_empl_query) {

                $msg = "Employee Form Update Successfully";

                $json_array = array("status" => "success", "message" => $msg);

                echo json_encode($json_array);

                exit();
            } else {

                $msg = "Failed to Update, try again later";

                $json_array = array("status" => "failed", "message" => $msg);

                echo json_encode($json_array);

                exit();
            }
        } // if empty upload file end

    } // trim end

    else {

        $msg = $error;

        $json_array = array("status" => "failed", "message" => $msg);

        echo json_encode($json_array);

        exit();
    } // trim else end 

} //action - "End Add Employee Image"
*/


/* ============================================================================================================ */
if (getPost('action') == "add_empl_pro") {

    $validator = new validations();

    $validator->add_rule("ref_numr", "Reference Number", "required|max_length[90]");

    $validator->add_rule("emply_name", "Employee Name", "required|max_length[90]");

    $validator->add_rule("empl_dob", "Employee D.O.B", "required");

    $validator->add_rule("emp_gender", "Gender", "required|max_length[15]");

    $validator->add_rule("emp_qualif", "Qualification", "required|max_length[250]");

    $validator->add_rule("father_name", "Father Name", "required|max_length[90]");

    $validator->add_rule("mother_name", "Mother Name", "required|max_length[90]");

    $validator->add_rule("emp_mobileno", "Mobile Number", "required|numeric|max_length[90]");

    $validator->add_rule("emp_email_addrs", "Email Address", "required|max_length[90]");

    $validator->add_rule("emp_addrs", "Residential Address", "required|max_length[250]");

    $validator->add_rule("tcentre_name", "Training Centre", "required|max_length[90]");

    $validator->add_rule("dept_id", "Department", "required|max_length[90]");

    //$validator->add_rule("course_id", "Course", "required|max_length[90]");

    $validator->add_rule("is_teach", "Teaching Or Non-teaching", "required|max_length[1]");

    $error = $validator->run();


    if (trim($error) == '') {

        $empl_refno = getPost('ref_numr');

        $empl_name = getPost('emply_name');

        $empl_dob = getPost('empl_dob');

        $empl_gender = getPost('emp_gender');

        $empl_quali = getPost('emp_qualif');



        $emp_fathername = getPost('father_name');

        $emp_mothername = getPost('mother_name');

        $emp_mobil = getPost('emp_mobileno');

        $emp_email = getPost('emp_email_addrs');

        $emp_addrs = getPost('emp_addrs');

        $emp_tcentre_id = getPost('tcentre_name');

        $emp_dept_id = getPost('dept_id');

        $emp_cours_id = getPost('course_id');

        $is_teacher = getNPost('is_teach');
        $emp_salary = getNPost('emp_salary');


        $emp_img = getPost('emp_proimg');



        //$emp_joining_date = date("Y-m-d");
        $emp_active = getNPost('set_status');

        $joining_date = getPost('emp_joindate'); 
        $emp_joining_date = date('Y-m-d',strtotime($joining_date));
        $ending_date = getPost('emp_enddate');
        $emp_ending_date = date('Y-m-d',strtotime($ending_date));

        $created_date = date("Y-m-d h:i:s");

        $emp_img_upload = $_FILES['emp_proimg']['name'];
        
        $emp_img_upload = $_FILES['emp_signimg']['name'];
        $emp_img_upload = $_FILES['emp_salslip']['name'];
        $emp_img_upload = $_FILES['emp_ofrltr']['name'];
        
        
        $uploading_path = '../uploads/empl/';
        
        if (is_array($_FILES)) {
           $attached_files = array(0, 0, 0);

            $uploaded_files = array(0, 0, 0);

            $file_tmp_path = array();

            $file_size = array();

            $file_ext = array();

            $file_name = array();

            $valid_ext = array('jpeg', 'jpg', 'png', 'pdf');

            $max_size = array(5242880, 5242880);

            $upload_err = 0;

            $upld_err_msg = "";

            $size_err = 0;

            $size_err_msg = "";

            $ext_err = 0;

            $ext_err_msg = "";

            $file_exist = 0;

            $file_exist_err = "";
            
            
            if ((!empty($_FILES['emp_proimg']['name']))) {

                $attached_files[0] = 1;

                $file_tmp_path[0] = $_FILES['emp_proimg']['tmp_name'];


                if (is_uploaded_file($file_tmp_path[0])) {

                    $uploaded_files[0] = 1;

                    $file_size[0] = $_FILES['emp_proimg']['size'];

                    if ($file_size[0] > $max_size[0]) {

                        $size_err = 1;

                        $size_err_msg .= "|Profile Image|";
                    } else {

                        $file_ext[0] = pathinfo($_FILES['emp_proimg']['name'], PATHINFO_EXTENSION);

                        if (!(in_array($file_ext[0], $valid_ext))) {

                            $ext_err = 1;

                            $ext_err_msg .= "|Profile Image|";
                        } else {

                            $file_name[0] = $_FILES['emp_proimg']['name'];

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
            } /* Add Employee Profile Image */
            
            if ((!empty($_FILES['emp_signimg']['name']))) {

                $attached_files[1] = 1;

                $file_tmp_path[1] = $_FILES['emp_signimg']['tmp_name'];



                if (is_uploaded_file($file_tmp_path[1])) {

                    $uploaded_files[1] = 1;

                    $file_size[1] = $_FILES['emp_signimg']['size'];

                    if ($file_size[0] > $max_size[0]) {

                        $size_err = 1;

                        $size_err_msg .= "|Profile Signature Image|";
                    } else {

                        $file_ext[1] = pathinfo($_FILES['emp_signimg']['name'], PATHINFO_EXTENSION);

                        if (!(in_array($file_ext[1], $valid_ext))) {

                            $ext_err = 1;

                            $ext_err_msg .= "|Profile Signature Image|";
                        } else {

                            $file_name[1] = $_FILES['emp_signimg']['name'];

                            $file_name[1] = str_replace(' ', '_', $file_name[1]);

                            $file_name[1] = mt_rand(1, 10000000) . "_" . $file_name[1];

                            if (file_exists($uploading_path . $file_name[1])) {

                                $file_exist = 1;

                                $file_exist_err = "|Profile Signature Image|";
                            }
                        }
                    }
                } else {

                    $upload_err = 1;

                    $upld_err_msg .= "|Profile Signature Image|";
                }
            }/* Add Employee Signature Image */
            
            
            if ((!empty($_FILES['emp_salslip']['name']))) {

                $attached_files[2] = 1;

                $file_tmp_path[2] = $_FILES['emp_salslip']['tmp_name'];



                if (is_uploaded_file($file_tmp_path[2])) {

                    $uploaded_files[2] = 1;

                    $file_size[2] = $_FILES['emp_salslip']['size'];

                    if ($file_size[0] > $max_size[0]) {

                        $size_err = 1;

                        $size_err_msg .= "|Profile Salary Slip|";
                    } else {

                        $file_ext[2] = pathinfo($_FILES['emp_salslip']['name'], PATHINFO_EXTENSION);

                        if (!(in_array($file_ext[2], $valid_ext))) {

                            $ext_err = 1;

                            $ext_err_msg .= "|Profile Salary Slip|";
                        } else {

                            $file_name[2] = $_FILES['emp_salslip']['name'];

                            $file_name[2] = str_replace(' ', '_', $file_name[2]);

                            $file_name[2] = mt_rand(1, 10000000) . "_" . $file_name[2];

                            if (file_exists($uploading_path . $file_name[2])) {

                                $file_exist = 1;

                                $file_exist_err = "|Profile Salary Slip|";
                            }
                        }
                    }
                } else {

                    $upload_err = 1;

                    $upld_err_msg .= "|Profile Salary Slip|";
                }
            }/* Add Employee Salary Slip */

            if ((!empty($_FILES['emp_ofrltr']['name']))) {

                $attached_files[3] = 1;

                $file_tmp_path[3] = $_FILES['emp_ofrltr']['tmp_name'];



                if (is_uploaded_file($file_tmp_path[3])) {

                    $uploaded_files[3] = 1;

                    $file_size[3] = $_FILES['emp_ofrltr']['size'];

                    if ($file_size[0] > $max_size[0]) {

                        $size_err = 1;

                        $size_err_msg .= "|Profile SOffer Letter |";
                    } else {

                        $file_ext[3] = pathinfo($_FILES['emp_ofrltr']['name'], PATHINFO_EXTENSION);

                        if (!(in_array($file_ext[3], $valid_ext))) {

                            $ext_err = 1;

                            $ext_err_msg .= "|Profile Offer Letter |";
                        } else {

                            $file_name[3] = $_FILES['emp_ofrltr']['name'];

                            $file_name[3] = str_replace(' ', '_', $file_name[3]);

                            $file_name[3] = mt_rand(1, 10000000) . "_" . $file_name[3];

                            if (file_exists($uploading_path . $file_name[3])) {

                                $file_exist = 1;

                                $file_exist_err = "|Profile Offer Letter |";
                            }
                        }
                    }
                } else {

                    $upload_err = 1;

                    $upld_err_msg .= "| Offer Letter |";
                }
            }/* Add Employee Offer Letter */
            
            
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
            }else {

                $file_to_upld = "";

                for ($i = 0; $i <= 3; $i++) {

                    if ($attached_files[$i] == 1) {

                        if (move_uploaded_file($file_tmp_path[$i], $uploading_path . $file_name[$i])) {

                            if ($i == 0) {

                                $file_cols .= "`image`,";

                                $file_col_vals .= "'$file_name[$i]',";
                            } else if ($i == 1) {

                                $file_cols .= "`emp_signatr`,";

                                $file_col_vals .= "'$file_name[$i]',";
                            }else if ($i == 2) {

                                $file_cols .= "`emp_sslip`,";

                                $file_col_vals .= "'$file_name[$i]',";
                            }else if ($i == 3) {

                                $file_cols .= "`emp_oletter`,";

                                $file_col_vals .= "'$file_name[$i]',";
                            }
                        } else {

                            $json_array = array("status" => "failed", "message" => "Error occurred while uploading file, try again");

                            echo json_encode($json_array);

                            exit();
                        }
                    }
                }



                $empl_sql = "SELECT `id`, `email`, `mobile`, `dept_id` FROM `tb_employee` WHERE `email` = $emp_email";

                $empl_query1 = mysqli_query($conn, $empl_sql);

                $empl_result =  mysqli_fetch_assoc($empl_query1);

                $dept_id_show = $empl_result['dept_id'];

                $empl_id_show = $empl_result['id'];

                $empl_email_show = $empl_result['email'];


                $old_query = "SELECT `image`,`emp_signatr`, `emp_sslip`, `emp_oletter` FROM `tb_employee`;";


                $old_query_run = $conn->query($old_query);

                if ($old_query_run) {

                    $old_query_result = $old_query_run->fetch_assoc();
                }

                $ch_stu_re = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `tb_employee` WHERE `name`='$empl_name' && `dob`='$empl_dob' && `father_name`='$emp_fathername'"));
                
                if ($ch_stu_re == 0) {
                    $query = "INSERT INTO `tb_employee` (`ref_no`,`centre_id`, `dept_id`,`is_teacher`,`name`, `dob`,`gender`,`mobile`,`email`,`father_name`, `mother_name`, `qualification`, `address`,`join_date`, `end_date`, `salary`, $file_cols `created_date`)
                    VALUES 

                    ('$empl_refno', '$emp_tcentre_id', $emp_dept_id, $is_teacher,'$empl_name','$empl_dob', '$empl_gender', $emp_mobil,'$emp_email','$emp_fathername','$emp_mothername', '$empl_quali', '$emp_addrs', '$emp_joining_date', '$emp_ending_date', $emp_salary, $file_col_vals  '$created_date')";
                    
                    
                    $query_run = $conn->query($query);


                   // $json_array = array("status" => "failed", "message" => $query);
                   //  echo json_encode($json_array);
                   //  exit(); 

                    if ($query_run) {

                        for ($i = 0; $i <= 3; $i++) {

                            if ($attached_files[$i] == 1) {



                                if ($i == 0) {

                                    unlink(($uploading_path . $old_query_result['image']));
                                } else if ($i == 1) {

                                    unlink(($uploading_path . $old_query_result['emp_signatr']));
                                }
                                else if ($i == 2) {

                                    unlink(($uploading_path . $old_query_result['emp_sslip']));
                                }
                                else if ($i == 3) {

                                    unlink(($uploading_path . $old_query_result['emp_ofrltr']));
                                }

                            }
                        }

                        $msg = "Employee Form Added Successfully";

                        $json_array = array("status" => "success", "message" => $msg);

                        echo json_encode($json_array);

                        exit();
                    } else {

                        for ($m = 0; $m <= 3; $m++) {

                            unlink(($uploading_path . $file_name[$m]));
                        }
                        
                        $msg = "Some error occurred while saving data.";

                        $json_array = array("status" => "failed", "message" => $msg);

                        echo json_encode($json_array);
                        
                        exit();
                    }
                } else {
                    
                    $msg = 'Employee record already exist in database';

                    $json_array = array("status" => "failed", "message" => $msg);

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

} //action - "End Add Form Employee"     
        
    

/* ============================================================================================================ */

/* Edit Employee  */

/*if (getPost('action') == "edit_empl_form") {

    $validator = new validations();

    $validator->add_rule("ref_numr", "Reference Number", "required|max_length[90]");

    $validator->add_rule("emply_name", "Employee Name", "required|max_length[90]");

    $validator->add_rule("empl_dob", "Employee D.O.B", "required");

    $validator->add_rule("emp_gender", "Gender", "required|max_length[15]");

    $validator->add_rule("emp_qualif", "Qualification", "required|max_length[250]");

    $validator->add_rule("father_name", "Father Name", "required|max_length[90]");

    $validator->add_rule("mother_name", "Mother Name", "required|max_length[90]");

    $validator->add_rule("emp_mobileno", "Mobile Number", "required|numeric|max_length[90]");

    $validator->add_rule("emp_email_addrs", "Email Address", "required|max_length[90]");

    $validator->add_rule("emp_addrs", "Residential Address", "required|max_length[250]");

    $validator->add_rule("tcentre_name", "Training Centre", "required|max_length[90]");

    $validator->add_rule("dept_id", "Department", "required|max_length[90]");

    //$validator->add_rule("course_id", "Course", "required|max_length[90]");

    $validator->add_rule("is_teach", "Teaching or Non-teaching", "required|max_length[1]");

    $error = $validator->run();



    if (trim($error) == '') {

        $empl_id = getNPost('id');

        $empl_refno = getPost('ref_numr');

        $empl_name = getPost('emply_name');

        $empl_dob = getPost('empl_dob');

        $empl_gender = getPost('emp_gender');

        $empl_quali = getPost('emp_qualif');

        $emp_fathername = getPost('father_name');

        $emp_mothername = getPost('mother_name');

        $emp_mobil = getPost('emp_mobileno');

        $emp_email = getPost('emp_email_addrs');

        $emp_addrs = getPost('emp_addrs');

        $emp_tcentre_id = getPost('tcentre_name');

        $emp_dept_id = getPost('dept_id');

        //$emp_cours_id = getPost('course_id');

        $is_teacher = getNPost('is_teach');

        $emp_salary = getNPost('emp_salary');

        $emp_img = getPost('emp_proimg');


        // $emp_joining_date = getPost('joing_date');

        $joining_date = getPost('emp_joindate'); 
        $emp_joining_date = date('Y-m-d',strtotime($joining_date));

        $ending_date = getPost('emp_enddate');
        $emp_ending_date = date( 'Y-m-d', strtotime($ending_date));

        $emp_active = getNPost('active');

        $created_date = date("Y-m-d h:i:s");

        $empl_active = getNPost('set_status');

        $emp_img_upload = $_FILES['emp_proimg']['name'];

        $uploading_path = '../uploads/empl/';



        if (!empty($_FILES['emp_proimg']['name'])) {



            $image = $_FILES["emp_proimg"]["name"];

            $slide_img = str_replace(" ", "-", $image); //stores the original filename from the client

            $tmp =      $_FILES["emp_proimg"]["tmp_name"]; //stores the name of the designated temporary file

            $errorimg = $_FILES["emp_proimg"]["error"]; //stores any error code resulting from the transfer



            $valid_extensions = array('jpeg', 'jpg', 'png', 'JPEG', 'PNG'); // valid extensions

            $path = '../uploads/empl/'; // upload directory



            // get uploaded file's extension

            $ext = strtolower(pathinfo($slide_img, PATHINFO_EXTENSION));



            // can upload same image size limit using function 

            $file_size = $_FILES['emp_proimg']['size'];



            // can upload same image using rand function

            $final_image = rand(1000, 1000000) . $slide_img;

            /* edit profile */



            // check's valid format

            /*if (in_array($ext, $valid_extensions)) {

                $path = $path . strtolower($final_image);

                $uploadreport = move_uploaded_file($tmp, $path);


                if ($uploadreport) {


                    $edit_empl_sql = "UPDATE `tb_employee` SET `ref_no`= '$empl_refno',`centre_id`='$emp_tcentre_id', `dept_id`= $emp_dept_id, `is_teacher` = $is_teacher, `name`='$empl_name', 

                    `dob`='$empl_dob',`gender`='$empl_gender',`mobile`=$emp_mobil,`email`='$emp_email',`father_name`='$emp_fathername', `mother_name`='$emp_mothername', 

                    `qualification`='$empl_quali', `address`='$emp_addrs', `join_date` = '$emp_joining_date', `end_date`='$emp_ending_date', `salary`= $emp_salary, `image`='$path', `status` = $empl_active  WHERE `id` =" . $empl_id;



                    $edit_empl_query = $conn->query($edit_empl_sql);

                    // $json_array = array("status" => "failed", "message" => $edit_empl_sql);
                    // echo json_encode($json_array);
                    // exit();

                    // $json_array = array("status" => "failed", "message" => $edit_empl_sql);

                    //                     echo json_encode($json_array);

                    //                     exit();



                    if ($edit_empl_query) {

                        $msg = "Employee Form Update Successfully";

                        $json_array = array("status" => "success", "message" => $msg);

                        echo json_encode($json_array);

                        exit();
                    } else {

                        $msg = "Failed to Update, try again later";

                        $json_array = array("status" => "failed", "message" => $msg);

                        echo json_encode($json_array);

                        exit();
                    }
                } // end uploadreport

                else {

                    $msg = 'Failed to upload image';

                    $json_array = array("status" => "failed", "message" => $msg);

                    echo json_encode($json_array);

                    exit();
                } // end else uploadreport



            } // end check's valid format

            else {

                $msg = 'Invalid file path';

                $json_array = array("status" => "failed", "message" => $msg);

                echo json_encode($json_array);

                exit();
            }
        } // not empty

        else if (empty($_FILES['emp_proimg']['name'])) {



            $edit_empl_sql = "UPDATE `tb_employee` SET `ref_no`= '$empl_refno',`centre_id`='$emp_tcentre_id', `dept_id`= $emp_dept_id, `is_teacher`=$is_teacher, `name`='$empl_name', 

                    `dob`='$empl_dob',`gender`='$empl_gender',`mobile`=$emp_mobil,`email`='$emp_email',`father_name`='$emp_fathername', `mother_name`='$emp_mothername', 

                    `qualification`='$empl_quali', `address`='$emp_addrs', `join_date` = '$emp_joining_date', `end_date`='$emp_ending_date', `salary` = $emp_salary, `status` = $empl_active WHERE `id` =" . $empl_id;



            $edit_empl_query = $conn->query($edit_empl_sql);

            // $json_array = array("status" => "failed", "message" => $edit_empl_sql);
            // echo json_encode($json_array);
            // exit();


            if ($edit_empl_query) {

                $msg = "Employee Form Update Successfully";

                $json_array = array("status" => "success", "message" => $msg);

                echo json_encode($json_array);

                exit();
            } else {

                $msg = "Failed to Update, try again later";

                $json_array = array("status" => "failed", "message" => $msg);

                echo json_encode($json_array);

                exit();
            }
        } // if empty upload file end

    } // trim end

    else {

        $msg = $error;

        $json_array = array("status" => "failed", "message" => $msg);

        echo json_encode($json_array);

        exit();
    } // trim else end 

}*/ //action - "End Edit Employee Image"

/* ===================================== (START EMPLOYEE EDIT FORM ) ================================================ */
if (getPost('action') == "edit_empl_form") {

    $validator = new validations();

    $validator->add_rule("ref_numr", "Reference Number", "required|max_length[90]");

    $validator->add_rule("emply_name", "Employee Name", "required|max_length[90]");

    $validator->add_rule("empl_dob", "Employee D.O.B", "required");

    $validator->add_rule("emp_gender", "Gender", "required|max_length[15]");

    $validator->add_rule("emp_qualif", "Qualification", "required|max_length[250]");

    $validator->add_rule("father_name", "Father Name", "required|max_length[90]");

    $validator->add_rule("mother_name", "Mother Name", "required|max_length[90]");

    $validator->add_rule("emp_mobileno", "Mobile Number", "required|numeric|max_length[90]");

    $validator->add_rule("emp_email_addrs", "Email Address", "required|max_length[90]");

    $validator->add_rule("emp_addrs", "Residential Address", "required|max_length[250]");

    $validator->add_rule("tcentre_name", "Training Centre", "required|max_length[90]");

    $validator->add_rule("dept_id", "Department", "required|max_length[90]");

    //$validator->add_rule("course_id", "Course", "required|max_length[90]");

    $validator->add_rule("is_teach", "Teaching Or Non-teaching", "required|max_length[1]");

    $error = $validator->run();


    if (trim($error) == '') {
        $empl_id = getNPost('id');

        // $json_array = array("status" => "failed", "message" => $empl_id);
        // echo json_encode($json_array);
        // exit();    

        $empl_refno = getPost('ref_numr');

        $empl_name = getPost('emply_name');

        $empl_dob = getPost('empl_dob');

        $empl_gender = getPost('emp_gender');

        $empl_quali = getPost('emp_qualif');



        $emp_fathername = getPost('father_name');

        $emp_mothername = getPost('mother_name');

        $emp_mobil = getPost('emp_mobileno');

        $emp_email = getPost('emp_email_addrs');

        $emp_addrs = getPost('emp_addrs');

        $emp_tcentre_id = getPost('tcentre_name');

        $emp_dept_id = getPost('dept_id');

        $emp_cours_id = getPost('course_id');

        $is_teacher = getNPost('is_teach');
        $emp_salary = getNPost('emp_salary');


        $emp_img = getPost('emp_proimg');



        //$emp_joining_date = date("Y-m-d");
        $emp_active = getNPost('set_status');

        $joining_date = getPost('emp_joindate'); 
        $emp_joining_date = date('Y-m-d',strtotime($joining_date));
        $ending_date = getPost('emp_enddate');
        $emp_ending_date = date('Y-m-d',strtotime($ending_date));

        $created_date = date("Y-m-d h:i:s");

        $emp_img_upload = $_FILES['emp_proimg']['name'];
        
        $emp_img_upload = $_FILES['emp_signimg']['name'];
        $emp_img_upload = $_FILES['emp_salslip']['name'];
        $emp_img_upload = $_FILES['emp_ofrltr']['name'];
        $uploading_path = '../uploads/empl/';
        
        
        if (is_array($_FILES)) {
           $attached_files = array(0, 0, 0);

            $uploaded_files = array(0, 0, 0);

            $file_tmp_path = array();

            $file_size = array();

            $file_ext = array();

            $file_name = array();

            $valid_ext = array('jpeg', 'jpg', 'png', 'pdf');

            $max_size = array(5242880, 5242880);

            $upload_err = 0;

            $upld_err_msg = "";

            $size_err = 0;

            $size_err_msg = "";

            $ext_err = 0;

            $ext_err_msg = "";

            $file_exist = 0;

            $file_exist_err = "";
            
            
            if ((!empty($_FILES['emp_proimg']['name']))) {

                $attached_files[0] = 1;

                $file_tmp_path[0] = $_FILES['emp_proimg']['tmp_name'];


                if (is_uploaded_file($file_tmp_path[0])) {

                    $uploaded_files[0] = 1;

                    $file_size[0] = $_FILES['emp_proimg']['size'];

                    if ($file_size[0] > $max_size[0]) {

                        $size_err = 1;

                        $size_err_msg .= "|Profile Image|";
                    } else {

                        $file_ext[0] = pathinfo($_FILES['emp_proimg']['name'], PATHINFO_EXTENSION);

                        if (!(in_array($file_ext[0], $valid_ext))) {

                            $ext_err = 1;

                            $ext_err_msg .= "|Profile Image|";
                        } else {

                            $file_name[0] = $_FILES['emp_proimg']['name'];

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
            } /* Add Employee Profile Image */
            
            if ((!empty($_FILES['emp_signimg']['name']))) {

                $attached_files[1] = 1;

                $file_tmp_path[1] = $_FILES['emp_signimg']['tmp_name'];



                if (is_uploaded_file($file_tmp_path[1])) {

                    $uploaded_files[1] = 1;

                    $file_size[1] = $_FILES['emp_signimg']['size'];

                    if ($file_size[0] > $max_size[0]) {

                        $size_err = 1;

                        $size_err_msg .= "|Profile Signature Image|";
                    } else {

                        $file_ext[1] = pathinfo($_FILES['emp_signimg']['name'], PATHINFO_EXTENSION);

                        if (!(in_array($file_ext[1], $valid_ext))) {

                            $ext_err = 1;

                            $ext_err_msg .= "|Profile Signature Image|";
                        } else {

                            $file_name[1] = $_FILES['emp_signimg']['name'];

                            $file_name[1] = str_replace(' ', '_', $file_name[1]);

                            $file_name[1] = mt_rand(1, 10000000) . "_" . $file_name[1];

                            if (file_exists($uploading_path . $file_name[1])) {

                                $file_exist = 1;

                                $file_exist_err = "|Profile Signature Image|";
                            }
                        }
                    }
                } else {

                    $upload_err = 1;

                    $upld_err_msg .= "|Profile Signature Image|";
                }
            }/* Add Employee Signature Image */
            
            
            if ((!empty($_FILES['emp_salslip']['name']))) {

                $attached_files[2] = 1;

                $file_tmp_path[2] = $_FILES['emp_salslip']['tmp_name'];



                if (is_uploaded_file($file_tmp_path[2])) {

                    $uploaded_files[2] = 1;

                    $file_size[2] = $_FILES['emp_salslip']['size'];

                    if ($file_size[0] > $max_size[0]) {

                        $size_err = 1;

                        $size_err_msg .= "|Profile Salary Slip|";
                    } else {

                        $file_ext[2] = pathinfo($_FILES['emp_salslip']['name'], PATHINFO_EXTENSION);

                        if (!(in_array($file_ext[2], $valid_ext))) {

                            $ext_err = 1;

                            $ext_err_msg .= "|Profile Salary Slip|";
                        } else {

                            $file_name[2] = $_FILES['emp_salslip']['name'];

                            $file_name[2] = str_replace(' ', '_', $file_name[2]);

                            $file_name[2] = mt_rand(1, 10000000) . "_" . $file_name[2];

                            if (file_exists($uploading_path . $file_name[2])) {

                                $file_exist = 1;

                                $file_exist_err = "|Profile Salary Slip|";
                            }
                        }
                    }
                } else {

                    $upload_err = 1;

                    $upld_err_msg .= "|Profile Salary Slip|";
                }
            }/* Add Employee Salary Slip */
                        
            if ((!empty($_FILES['emp_ofrltr']['name']))) {

                $attached_files[3] = 1;

                $file_tmp_path[3] = $_FILES['emp_ofrltr']['tmp_name'];


                if (is_uploaded_file($file_tmp_path[3])) {

                    $uploaded_files[3] = 1;

                    $file_size[3] = $_FILES['emp_ofrltr']['size'];

                    if ($file_size[0] > $max_size[0]) {

                        $size_err = 1;

                        $size_err_msg .= "|Profile Offer Letter |";
                    } else {

                        $file_ext[3] = pathinfo($_FILES['emp_ofrltr']['name'], PATHINFO_EXTENSION);

                        if (!(in_array($file_ext[3], $valid_ext))) {

                            $ext_err = 1;

                            $ext_err_msg .= "|Profile Offer Letter |";
                        } else {

                            $file_name[3] = $_FILES['emp_ofrltr']['name'];

                            $file_name[3] = str_replace(' ', '_', $file_name[3]);

                            $file_name[3] = mt_rand(1, 10000000) . "_" . $file_name[3];

                            if (file_exists($uploading_path . $file_name[3])) {

                                $file_exist = 1;

                                $file_exist_err = "|Profile Offer Letter |";
                            }
                        }
                    }
                } else {

                    $upload_err = 1;

                    $upld_err_msg .= "|Profile Offer Letter|";
                }
            } /* Add Employee Offer Letter */
                        
            
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
            }else {

                $file_to_upld = "";

                for ($i = 0; $i <= 3; $i++) {

                    if ($attached_files[$i] == 1) {

                        if (move_uploaded_file($file_tmp_path[$i], $uploading_path . $file_name[$i])) {

                            if ($i == 0) {

                                $file_to_upld2 .= "`image` = '$file_name[$i]',";
                            } else if ($i == 1) {

                                $file_to_upld2 .= "`emp_signatr` = '$file_name[$i]',";
                            } else if ($i == 2) {

                                $file_to_upld2 .= "`emp_sslip` = '$file_name[$i]',";
                            }
                            else if ($i == 3) {

                                $file_to_upld2 .= "`emp_oletter` = '$file_name[$i]',";
                            }
                        } else {

                            $json_array = array("status" => "failed", "message" => "Error occurred while uploading file, try again");

                            echo json_encode($json_array);

                            exit();
                        }
                    }
                }

                //$json_array = array("status" => "failed", "message" => $file_to_upld2);
//                echo json_encode($json_array);
//                exit(); 
                

                $empl_sql = "SELECT `id`, `email`, `mobile`, `dept_id` FROM `tb_employee` WHERE `email` = $emp_email";

                $empl_query1 = mysqli_query($conn, $empl_sql);

                $empl_result =  mysqli_fetch_assoc($empl_query1);

                $dept_id_show = $empl_result['dept_id'];

                $empl_id_show = $empl_result['id'];

                $empl_email_show = $empl_result['email'];


                $old_query = "SELECT `image`,`emp_signatr`, `emp_sslip`, `emp_oletter`  FROM `tb_employee`;";


                $old_query_run = $conn->query($old_query);

                if ($old_query_run) {

                    $old_query_result = $old_query_run->fetch_assoc();
                }
                    
                $query = "UPDATE `tb_employee` SET 
                    `ref_no`= '$empl_refno', 
                    `name`='$empl_name', 
                    `dob`='$empl_dob',
                    `gender`='$empl_gender',
                    `qualification`='$empl_quali', 
                    `father_name`='$emp_fathername', 
                    `mother_name`='$emp_mothername', 
                    `mobile`=$emp_mobil,
                    `email`='$emp_email',
                    `address`='$emp_addrs', 
                    `centre_id`='$emp_tcentre_id', 
                    `is_teacher`=$is_teacher,
                    `dept_id`= $emp_dept_id, 
                    `join_date` = '$emp_joining_date', 
                    `end_date`='$emp_ending_date', 
                    $file_to_upld2
                    `salary` = $emp_salary,
                    `status` = $emp_active
                     WHERE  `id` =" . $empl_id;


                    $query_run = $conn->query($query);


                    //$json_array = array("status" => "failed", "message" => $query);
//                     echo json_encode($json_array);
//                     exit(); 

                    if ($query_run) {

                        for ($i = 0; $i <= 3; $i++) {

                            if ($attached_files[$i] == 1) {
                                if ($i == 0) {

                                    unlink(($uploading_path . $old_query_result['emp_proimg']));
                                } else if ($i == 1) {

                                    unlink(($uploading_path . $old_query_result['emp_signimg']));
                                }
                                else if ($i == 2) {

                                    unlink(($uploading_path . $old_query_result['emp_salslip']));
                                }
                                else if ($i == 3) {

                                    unlink(($uploading_path . $old_query_result['emp_ofrltr']));
                                }
                            }
                        }

                        $json_array = array("status" => "success", "message" => "Profile updated successfully.");

                        echo json_encode($json_array);

                        exit();
                    } else {

                        for ($m = 0; $m <= 3; $m++) {

                            unlink(($uploading_path . $file_name[$m]));
                        }
                        
                        $msg = "Some error occurred while saving data.";

                        $json_array = array("status" => "failed", "message" => $msg);

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

} //action - "End Edit Form Employee"  
/* ===================================== (END EMPLOYEE EDIT FORM ) ================================================ */



// Employee Enable/Disabled //

if (getPost('action') == "empl_status_change") {

    $empID = getNPost('id');

    $check_s = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `tb_employee` WHERE `id`='$empID'"));



    if ($check_s['status'] == 0) {

        $status_up = "UPDATE `tb_employee` SET `status`=1 WHERE `id` = $empID";
    } else if ($check_s['status'] == 1) {

        $status_up = "UPDATE `tb_employee` SET `status`=0 WHERE `id` = $empID";
    }



    $query_result = $conn->query($status_up);



    // $json_array = array("status" => "failed", "message" => $empID);

    // echo json_encode($json_array);

    // exit();



    if ($query_result) {

        $msg = "Status Change Successfully";

        $json_array = array("status" => "success", "message" => $msg);

        echo json_encode($json_array);

        exit();
    } else {

        $msg = "Error Occured.. Please try again..";

        $json_array = array("status" => "failed", "message" => $msg);

        echo json_encode($json_array);

        exit();
    }
}

// Employee Delete //

if (getPost('action') == "empl_del") {

    $emplid = getNPost('id');



    $del = "DELETE FROM `tb_employee` WHERE `tb_employee`.`id` =" . $emplid;

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
