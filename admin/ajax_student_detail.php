<?php

require_once('configDB.php');

//$id = $_POST['id'];

$id = $_POST['id'];

$et = $_POST['et'];

//$date = date('Ym');

$ch_res = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `tb_tot_marks` WHERE `st_id`='$id' && exam_term='$et'"));

if ($ch_res == 0) {



    $query = mysqli_query($conn, "SELECT * FROM `tb_student` WHERE `id`='$id'") or die(mysqli_error($conn));



    $ok = mysqli_num_rows($query);

    if ($ok > 0) {

        $data = mysqli_fetch_array($query);

        $rsdate1 = substr($data['session_start'], -2);

        $cid = $data['course_id'];

        $max_id = mysqli_fetch_array(mysqli_query($conn, "SELECT MAX(id) as id FROM `tb_tot_marks`"));

        $serial_no = mysqli_fetch_array(mysqli_query($conn, "SELECT *  FROM `tb_tot_marks` WHERE id='$max_id[id]'"));



        $enddate = $data['session_end'] . $data['reg_month'];
        $sr_id = $serial_no['serial_no'] + 1;



        $course = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `tb_course` WHERE id='$cid'"));

        $subjects_query = mysqli_query($conn, "SELECT * FROM `tb_subject` WHERE cours_id='$course[id]' && `dept_id`='$course[dept_id]' && `sub_term`='$et' order by sub_code");

        $subC = mysqli_num_rows($subjects_query)

?>

        <link rel="stylesheet" href="dist/css/adminlte.min.css">

        <script src="dist/js/adminlte.min.js"></script>

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



            .bold-italic {

                font-style: italic;

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

        <div class="row">



            <h4 class="text-center m-auto"><strong>Student Detail</strong></h4>

            <div class="certificate">

                <div class=serial-register>

                    <div class='sn'>

                        <span class="bold-italic"> Serial No.</span><br>

                        <span id="sn" class="">

                            <div class="form-group">

                                <p><?= $enddate ?><input type="text" class="" name="sr_no" style="width: 60px;" placeholder="Enter Serial Number" value="<?= $sr_id; ?>"></p>

                            </div>

                        </span>

                    </div>

                    <div class='reg'>

                        <span class="bold-italic"> Registration No.</span><br>

                        <span id="sn" class=""> <?= 'MAHGU/' . $course['course_code'] . '/' . $rsdate1 . $data['reg_month'] . $data['reg_no']; ?></span>

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
                                                <?php
                                                    $centreID = $data['centre_id'];
                                                    $chk_centre_name = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `franchises_centre` WHERE `id` = $centreID"));

                                                 ?>
                                                <!-- <span class="value"> <? //= $chk_centre_name['c_name']; ?></span> -->

                                                <span class="value"> <?= $data['centre_name'] ?></span>
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

                                while ($rows = mysqli_fetch_array($subjects_query)) {



                                ?>



                                    <tr>

                                        <input type="hidden" name="sub_id[]" value="<?= $rows['id']; ?>">

                                        <td class="text-center marks-data" width='12%'><?= $course['course_code'] . '-' . $rows['sub_code']; ?></td>

                                        <td class="text-left pl-2 marks-data" width='34%'><?= $rows['sub_name'] ?></td>

                                        <td class="text-center marks-data" width='10.5%'><input type="text" id="the<?= $a; ?>" class="m-0 " name="ob_theory[]" placeholder="Enter theory marks"></td>

                                        <td class="text-center marks-data" width='12%'><input type="text" id="pra<?= $a; ?>" class="m-0 " name="ob_practical[]" placeholder="Enter practical marks" <?php if ($rows['is_practical'] == 0) {

                                                                                                                                                                                                        echo 'style="background:#eee" readonly';
                                                                                                                                                                                                    } ?>></td>

                                        <td class="text-center marks-data" width='9%'><input type="text" id="sum<?= $a; ?>" class="m-0 " name="ob_total[]" style="background:#eee" placeholder="Total marks" readonly></td>

                                        <td class="text-center marks-data" width='12%'><input type="text" class="m-0 " id="max<?= $a; ?>" name="max_marks[]" placeholder="Max marks"></td>

                                        <td class="text-center marks-data" width='12%'><input type="text" id="gra<?= $a; ?>" class="m-0 " style="background:#eee" name="ob_grade[]" placeholder="Grade" readonly></td>

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

                                    <td class="text-center marks-data  marks-total " width='10%'><input type="text" class="m-0 " id="gsum" name="ob_grand_tot" placeholder="Grand obtained" style="background:#eee" readonly>

                                    </td>

                                    <td class="text-center marks-data marks-total " width='12%'><input type="text" class="m-0 " id="gmax" name="grand_max" placeholder="Grand max marks" style="background:#eee" readonly>

                                    </td>

                                    <td class="text-center marks-data marks-total " width='12%'><input type="text" class="m-0 " id="ggra" name="ob_grand_grade" placeholder="Grand grade" style="background:#eee" readonly>

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

                                            <option>Pass</option>

                                            <option>Failed</option>



                                        </select>

                                </div>





                            </div>



                        </div>

                    </div>

                </div>

                <div style="margin-bottom: 10%;"><img class="qr mx-auto mt-5" src="qr.png" alt=""> </div>

            </div>



        </div>



        <div class=" mt-5">

            <button type="submit" class="btn btn-secondary d-block m-auto" id="insertMakrs_btn">Submit Marks Sheet</button>

        </div>







<?php





    } else {

        echo 'No Record Found';
    }
} else {

    echo '<label class="text-danger ml-3">This student result already entered</label>';
}





?>