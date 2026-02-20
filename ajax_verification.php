<?php

require_once('inc/connection.php');

$validator = new validations();

$validator->add_rule("s", "Select Student Course ", "required");

$validator->add_rule("d", "Date of Birth ", "required");

$validator->add_rule("n", "Student Name ", "required");

$error = $validator->run();

if (trim($error) == '') {

    $st_cours = $_POST['s'];

    $dob = $_POST['d'];

    $name = $_POST['n'];

    $query = mysqli_query($conn, "SELECT * FROM `tb_student` WHERE `course_id`='$st_cours' && `dob`='$dob' && `name`='$name' && `status`=1") or die(mysqli_error($conn));



    $ok = mysqli_num_rows($query);

    if ($ok > 0) {

        $data = mysqli_fetch_array($query);

        if ($data['roll_no2'] != '') {

            $roll_no = $data['roll_no2'];
        } else {

            $roll_no = $data['roll_no'];
        }

        if ($data['course_duration'] == '6 Month') {

            $lastmonth = $data['reg_month'] - 7;
        } else {

            $lastmonth = $data['reg_month'] - 1;
        }

        $rsdate = substr($data['session_start'], -2);

        $reg_month =  date("F", mktime(0, 0, 0, $data['reg_month'], 10));



        $end_month =  date("F", mktime(0, 0, 0, $lastmonth, 10));

        $course = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `tb_course` WHERE `id`='$st_cours'"));

        $signature = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `tb_user` WHERE `id`='1'"));

?>

        <style>
            @media print {



                .table thead tr td,

                .table tbody tr td {

                    border-width: 1px !important;

                    border-style: solid !important;

                    border-color: #dddddd !important;

                    font-size: 10px !important;

                    /* background-color:  !important; */

                    -webkit-print-color-adjust: exact;

                }

            }
        </style>

        <div class="row">

            <div class="col-sm-12">



                <div class="admiCrd_tlogo">

                    <img src="images/logo.jpg" alt="logo image" width="100%">

                </div>

                <h4 class="text-center m-auto" style="text-align:center;"><strong>Acknowledgement Card</strong></h4>

                <table class="table table-bordered table-striped" width="100%">

                    <tbody>

                        <tr>

                            <td>Session </td>

                            <td style="width:30%"><?= $reg_month; ?> <?= $data['session_start']; ?> - <?= $end_month; ?> <?= $data['session_end']; ?></td>

                            <td style="width:30%" class="p-0 m-0" rowspan="8"><img src="uploads/profile/<?= $data['image']; ?>" width="100%" height="auto" /></td>

                        </tr>

                        <tr>

                            <td style="width:30%">Registration No.</td>

                            <td style="width:50%"><?= 'EI/' . $course['course_code'] . '/' . $rsdate . $data['reg_month'] . $data['reg_no']; ?> </td>



                        </tr>

                        <tr>

                            <td>Course</td>

                            <td><?= $course['name']; ?></td>



                        </tr>

                        <tr>

                            <td>Exam Roll No.</td>

                            <td class="p-0 m-0"><?= $roll_no; ?></td>

                        </tr>

                        <tr>

                            <td>Student Name</td>

                            <td><?= $data['name']; ?></td>

                        </tr>

                        <tr>

                            <td>Father Name</td>

                            <td><?= $data['father_name']; ?></td>

                        </tr>

                        <tr>

                            <td>Mother Name</td>

                            <td><?= $data['mother_name']; ?></td>



                        </tr>



                        <!--<tr>

                            <td>Course</td>

                            <td><? //= $course['name']; ?></td>

                        </tr>-->

                        <tr>

                            <td>Centre Name</td>
                             <?php  
                                $centreID = $data['centre_id'];
                                $chk_centre_name = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `franchises_centre` WHERE `id` = $centreID"));
                            ?>
                            
                            <!--<td><?//= $data['centre_name']; ?></td>-->
                            <td><?php echo $chk_centre_name['c_name']; ?> </td>

                        </tr>

                        <!--   <tr>

                    <td>Centre Code</td>

                    <td> 124001 </td>

                </tr>

 -->

                        <tr>

                            <td style="width:30%" class="p-0 m-0"><img src="uploads/profile/<?= $signature['signature']; ?>" width="100%" height="auto" /></td>

                            <td>

                                <p> Note : This card is the eligibility card for Course. This card is not only the proof for student’s successful application for the Course. (नोट: यह कार्ड पाठ्यक्रम के लिए पात्रता कार्ड है। यह कार्ड केवल कोर्स के लिए छात्र के सफल आवेदन के लिए प्रमाण नहीं है।) </p>

                            </td>

                            <td style="width:30%" class="p-0 m-0"><img src="uploads/profile/<?= $data['signature_img']; ?>" width="100%" height="auto" /></td>

                        </tr>





                    </tbody>

                </table>



            </div>

        </div>



        <i class="fa fa-print fa-2x text-primary" onclick="printDiv()"></i>







<?php



    } else {

        echo '<label class="text-danger">No Record Found</label>';
    }
} else {

    echo  '<label class="text-danger">' . $error . '</label>';

    exit();
}

?>