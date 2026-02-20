<?php

require_once('inc/connection.php');

$validator = new validations();

$validator->add_rule("s", "Select Student Course ", "required");

$validator->add_rule("d", "Date of Birth ", "required");

$validator->add_rule("n", "Roll Number ", "required");

$error = $validator->run();



if (trim($error) == '') {



    $st_cours = $_POST['s'];

    $dob = $_POST['d'];

    $roll_no = $_POST['n'];

    /* echo $st_cours - $dob - $roll_no; */

    if ($roll_no != '') {

        $query = mysqli_query($conn, "SELECT * FROM `tb_student` WHERE `course_id`='$st_cours' && `dob`='$dob'  && `status`=1") or die(mysqli_error($conn));

        $ok = mysqli_num_rows($query);

        if ($ok > 0) {


            $data = mysqli_fetch_array($query);


            $dobf = date('d/M/Y', strtotime($data['dob']));

            $course = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `tb_course` WHERE `id`='$st_cours'"));

            $rsdate = substr($data['session_start'], -2);

            $reg_no = 'EI/' . $course['course_code'] . '/' . $rsdate . $data['reg_month'] . $data['reg_no'];





            if ($roll_no == $data['roll_no']) {

                $et = 1;

            } else if ($roll_no == $data['roll_no2']) {

                $et = 2;

            } else {

                echo  '<label class="text-danger">Check Roll Number</label>';

                exit();

            }



?>

<style>

    .table-bordered > thead > tr > th, 

    .table-bordered > tbody > tr > th, 

    .table-bordered > tfoot > tr > th, 

    .table-bordered > thead > tr > td, 

    .table-bordered > tbody > tr > td, 

    .table-bordered > tfoot > tr > td{

        border-color:  #222222;    

       

    }

    .table > thead > tr > th, 

    .table > tbody > tr > th, 

    .table > tfoot > tr > th, 

    .table > thead > tr > td, 

    .table > tbody > tr > td, 

    .table > tfoot > tr > td{

        border-top: 1px solid #222222 !important;

    }

    

    .border-right{border-right: 1px solid #222222;}
    .frontend_logo_img{margin-bottom:25px;}

</style>

            <div class="row">



                <!-- // Start Result Box -->

                <div class="table-responsive" style="border: 1px solid #ddd;padding: 20px;box-shadow: 1px 0px 9px 1px;">

                    <div class="galaxy_logo frontend_logo_img">

                        <img src="images/logo.jpg" alt="logo image" width="100%">

                    </div>

                    <table class="table table-bordered">

                        <tr>

                                <td width='100%' style="padding:0 15px 0px 15px;">

                                    <h4 class="course text-uppercase text-center " style="padding: 30px 0 5px; margin:0; font-size: 25px;"><strong>(<?= $course['course_type'];?>)</strong></span>

                                    </h4>

                                    

                                    <h4 class="course text-uppercase text-center " style="padding: 5px 0 15px; margin:0; font-size: 20px;"><strong><?= $course['name'] ?> <br><span class="course-short">(<?= $course['course_code'] ?>)</strong></span>

                                    </h4>

    

    

                                    <!-- bio table started -->

    

                                    <table class="table mt-2 bio table-bordered">

                                        <tr>

                                            <td width='10%'>

                                                <span class="title" style="font-weight: bold;">Enrollment No.</span>

                                            </td>

                                            <td width='20%'>

                                                <span class="value"><?= $reg_no; ?></span>

                                            </td>

                                            <td width='10%'>

                                                <span class="title" style="font-weight: bold;">DOB</span>

                                            </td>

                                            <td width='20%'>

                                                <span class="value"><?= $dobf; ?></span>

                                            </td>

                                            <td width='40%' rowspan="3">

                                                <img src="uploads/profile/<?= $data['image']; ?>" width="100px" height="auto" />

                                            </td>

                                        </tr>

                                        <tr>

                                            <td width='10%'>

                                                <span class="title" style="font-weight: bold;">Name</span>

                                            </td>

                                            <td width='20%'>

                                                <span class="value"><?= $data['name']; ?></span>

                                            </td>

                                            <td width='17%'>

                                                <span class="title" style="font-weight: bold;">Father's Name</span>

                                            </td>

                                            <td width='40%'>

                                                <span class="value"><?= $data['father_name']; ?></span>

                                            </td>

    

                                        </tr>

                                        <tr>

    

                                            <td width='17%'>

                                                <span class="title" style="font-weight: bold;">Mother's Name</span>

                                            </td>

                                            <td width='40%'>

                                                <span class="value"><?= $data['mother_name']; ?></span>

                                            </td>

                                            <td width='10%'>

                                                <span class="title" style="font-weight: bold;">Reg No.</span>

                                            </td>

                                            <td width='30%'>

                                                <span class="value">

                                                    <?php if($et==1) { echo $data['roll_no'];} else if($et==2){ echo $data['roll_no2'];} ?>

                                                </span>

                                            </td>

                                        </tr>
                                         
                                        <tr>
            
                                            <td width='17%'>
                                                <span class="title" style="font-weight: bold;">Session</span>
                                                
                                                <!--<span class="title" style="font-weight: bold;">Training Center</span>-->

                                            </td>

                                            <td  width='40%'>
                                                <?php  
                                                    $centreID = $data['centre_id'];
                                                    $chk_centre_name = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `franchises_centre` WHERE `id` = $centreID"));
                                                ?>
                                                <!-- PREV <span class="value"> <?php //echo $chk_centre_name['c_name']; ?></span>-->
                                                <!-- OLD <span class="value"><?//= $data['centre_name']; ?></span> -->
                                                <span class="title" style="font-weight: bold;"><?= $reg_month; ?> <?= $data['session_start']; ?> - <?= $end_month; ?> <?= $data['session_end']; ?></span>
                                                
                                                
                                                
                                            </td>
                                            <td width='10%'>
                                                
                                                <div class="text-left p-3 result-box mr-30"><strong>Result:</strong> </div>
                                            </td>
                                            <td width='20%'>
                                                <?php $total = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `tb_tot_marks` WHERE `st_id`='$data[id]' && `exam_term`='$et'")); ?>
                                                <div class="text-left p-3 result-box mr-30">

                                                    <span class="result-text" style="color:#000000;"><strong> <?php if($total['result'] != ''){ echo $total['result']; }else{ echo "<span class='text-success'> Pass</span>";}?></strong>

                                                </div>
                                            </td>

                                            <td width='20%'>
                                                <img src="uploads/profile/<?= $data['signature_img']; ?>" width=" 100px" height="auto" />

                                            </td>
                                        </tr>

                                    </table>
                                </td>

                            <!-- image section -->

                                <!--<td class="photo-section"> <img class=' passport ' src="passport.jpg" alt=""> <br><img class='signature ' src="signature.png" alt=""> </td>-->                            
                        </tr>

                    </table>

                    
                    <div class="marks-container">

                        <div class="table-responsive">

                            <table class="table table-bordered marks-table text-uppercase">
                                <?php 
                                    $no_display = 0;
                                    if($no_display == true){
                                ?>

                                <tr>

                                    <th scope="col" class="text-center text-uppercase " width='12%'>Subject Code

                                    </th>

                                    <th scope="col" class="text-center text-uppercase " width='36%'>Subject</th>





                                    <th colspan="3" class="text-center text-uppercase internal-table no-border" width='100%' style="margin: 0;padding-left: 0;padding-right: 0;padding-bottom:0">

                                        Marks Obtained

                                        <table class="table p-0 m-0" style="margin:0">



                                            <th scope="col" class="text-center text-uppercase internal-table border-right" width='9%'>Theory

                                            </th>

                                            <th scope="col" class="text-center text-uppercase internal-table border-right" width='12%'>

                                                Pratical

                                            </th>

                                            <!--<th scope="col" class="text-center text-uppercase internal-table " width='9%'> Total marks </th>-->

                                        </table>

                                    </th>





                                    <!--<th scope="col" class="text-center text-uppercase " width='12%'>Max Marks</th>-->

                                    <th scope="col" class="text-center text-uppercase " width='12%'>Grade</th>

                                </tr> 
                                
                                <?php



                                        $marks_qr = mysqli_query($conn, "SELECT * FROM `tb_marks_sheet` WHERE `st_id`='$data[id]' && `exam_term`='$et' ");

                                        while ($rows = mysqli_fetch_array($marks_qr)) {



                                            $subject = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `tb_subject` WHERE id='$rows[sub_id]' && `sub_term`='$et' order by sub_code"));

                                            $cours = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `tb_course` WHERE `id`='$subject[cours_id]'"));

                                        ?>

                                    <tr>

                                        <td class="text-center marks-data" width='12%'><?= $cours['course_code']; ?>-<?= $subject['sub_code']; ?></td>

                                        <td class="text-left pl-2 marks-data" width='34%'><?= $subject['sub_name']; ?></td>

                                        <td class="text-center marks-data" width='10.5%'><?php if ($rows['ob_theory'] != 0) {

                                                                                                echo $rows['ob_theory'];

                                                                                            } else {

                                                                                                echo "**";

                                                                                            }  ?></td>

                                        <td class="text-center marks-data" width='12%'><?php if ($rows['ob_practical'] != 0) {

                                                                                            echo $rows['ob_practical'];

                                                                                        } else {

                                                                                            echo "**";

                                                                                        }  ?></td>

                                        <!--<td class="text-center marks-data" width='9%'><? //= $rows['total_marks']; ?></td>-->

                                        <td class="text-center marks-data" width='12%'><?= $rows['max_marks']; ?></td>
                                        <td class="text-center marks-data" width='12%'><?= $rows['grade']; ?></td>

                                    </tr>



                                <?php } ?>

                                <?php $total = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `tb_tot_marks` WHERE `st_id`='$data[id]' && `exam_term`='$et'")); ?>

                                <tr>

                                    <td class="text-center marks-data marks-total p-2" colspan="4">TOTAL</td>

                                    <td class="text-center marks-data  marks-total font-weight-bold no-font" width='10%'><?= $total['grand_tot']; ?>

                                    </td>

                                    <!--<td class="text-center marks-data marks-total font-weight-bold no-font" width='12%'><? //= $total['max_marks']; ?>-->

                                    </td>

                                    <td class="text-center marks-data marks-total font-weight-bold no-font" width='12%'><?= $total['grand_grade']; ?>

                                    </td>

                                </tr>
                                

                                <tr>

                                    <td colspan="4" style="background-color: #0daa52;color: #ffffff;">

                                        <div class="text-left p-3 result-box mr-30"><strong>Result:</strong>

                                            <span class="result-text" style="color:#ffffff;"><strong><?= $total['result']; ?></strong>

                                        </div>

                                    </td>



                                    <!--td colspan="2">

                                    <div class="text-center p-3 margin-left-result  result-box mr-30">Date:

                                        <span class="result-text"><strong>17/07/2017</strong>

                                    </div>

                                </td-->

                                    <td>

                                        <div class="text-center p-3 margin-left-result  result-box mr-30">

                                            <strong> Grade: </strong>

                                        </div>

                                    </td>

                                    <td colspan="2" style="text-align:right;background-color: #222222;color: #ffffff;">

                                        <div class="text-center p-3 margin-left-result  result-box mr-30">

                                            <span class="result-text"><strong><?= $total['grand_grade']; ?></strong>

                                        </div>

                                    </td>

                                </tr>
                                <?php } ?>
                                
                                
                                

                            </table>



                        </div>

                    </div>
                    
                    

                    

                    <i class="fa fa-print fa-2x text-primary" onclick="printDiv()"></i>

                </div>



            </div>





<?php



        } else {

            echo '<label class="text-danger">No Record Found</label>';

        }

    } else {

        echo '<label class="text-danger">Please Enter Your Roll Number</label>';

    }

} else {

    echo  '<label class="text-danger">' . $error . '</label>';

    exit();

}



?>