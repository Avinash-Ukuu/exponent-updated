<?php
require_once('inc/connection.php');
$validator = new validations();
$validator->add_rule("s", "Employee Refrence No.", "required");
$validator->add_rule("d", "Date of Birth ", "required");
$error = $validator->run();
if (trim($error) == '') {
    $ref_no = trim($_POST['s']);
    $dob = trim($_POST['d']);
    $query = mysqli_query($conn, "SELECT * FROM `tb_employee` WHERE `ref_no`='$ref_no' && `dob`='$dob'") or die(mysqli_error($conn));
    $ok = mysqli_num_rows($query);
    if ($ok > 0) {
        $signature = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `tb_user` WHERE `id`='1'"));

        $data = mysqli_fetch_array($query);
        $department = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `tb_department` WHERE `id`='$data[dept_id]'"));
        $image = $data['image'];
        $img = explode('../', $image);
        $emp_signature = $data['emp_signatr'];
        $empl_sslip = $data['emp_sslip'];
        $empl_ofltre = $data['emp_oletter'];
        $dob = date('d/m/Y', strtotime($data['dob']));
        $join_date = date('d/m/Y', strtotime($data['join_date']));
        if ($data['end_date'] != '0000-00-00 00:00:00') {
            $end_date = date('d/m/Y', strtotime($data['end_date']));
        } else {
            $end_date = '';
        }
        if ($data['is_teacher'] == 1) {
            $desi = 'Teacher';
        } else {
            $desi = 'Non Teaching';
        }
        //echo $img[1];

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

                small {
                    font-size: .6em;
                }
            }
            .empl_proimg{text-align: center;}
            .empl_sign_img {margin-top: 10px;}
            .empl_salary_slip{
                margin-top: 10px;
                padding-top: 10px;
                padding-bottom: 10px;
                text-align: center;
                width: 100%;
                margin: 0 auto;
            }
            .ssdown_pdf_icon {
                float: left;
                width: 30%;
            }
            .ssdown_link a {
                font-size: 13px;
                padding-top: 10px;
                padding-bottom: 10px;
                display: block;
            }
            .ssdown_link {    
                width: 60%;
                float: left;
                text-align: left;
                padding-left: 10px;
            }
            @media print {
               .noprint {
                  visibility: hidden;
               }
            }
        </style>

        <div class="col-sm-12" style="border:1px solid #ddd">
            <div class="admiCrd_tlogo" style="margin-top: 20px;">
                <img src="images/logo.jpg" alt="logo image" width="100%">
            </div>
            <h4 class="text-center m-auto" style="text-align:center;"><strong>Employee Card</strong><a href="javascript:void()" style="float: right;" title="print"><i class="fa fa-print fa-1x text-danger" onclick="printDiv()" style="font-size: 1.6em;"></i></a></h4>
            <table class="table table-bordered table-striped text-uppercase table-sm" width="100%">
                <tbody>
                    <tr>
                        <td style="width:30%"> Refernce No.</td>
                        <td style="width:50%"><?= $data['ref_no']; ?> </td>
                        <td style="width:30%" class="p-0 m-0" rowspan="15" >
                            <div class="empl_proimg"><img src="uploads/empl/<?= $img[0]; ?>" height="175" /></div>
                            <div class="empl_sign_img text-center pad-top10">
                                <img src="uploads/empl/<?= $emp_signature; ?>" height="90" />
                            </div>
                            <div class="empl_salary_slip noprint">
                                <div class="ssdown_pdf_icon"> <img src="images/salary-slip-icon.png" style="width: 50px;" /><br/></div>
                                <div class="ssdown_link"> <a href="uploads/empl/<?= $empl_sslip; ?>" target="_blank">  Salary Slip Download   </a></div>
                                <div style="clear:both;">
                            </div>
                            <div class="empl_salary_slip noprint">
                                <div class="ssdown_pdf_icon"> <img src="uploads/empl/offer-ltr-icon.png" style="width: 50px;" /><br/></div>
                                <div class="ssdown_link"> <a href="uploads/empl/<?= $empl_ofltre; ?>" target="_blank">  Offer Letter Download   </a></div>
                                <div style="clear:both;">
                            </div>

                        </td>
                    </tr>
                    <tr>
                        <td>Employee Name</td>
                        <td><?= strtoupper($data['name']); ?></td>
                    </tr>
                    <tr>
                        <td>Father Name</td>
                        <td><?= strtoupper($data['father_name']); ?></td>
                    </tr>
                    <tr>
                        <td>Mother Name</td>
                        <td><?= strtoupper($data['mother_name']); ?></td>
                    </tr>
                    <tr>
                        <td>Date of Birth</td>
                        <td><?= $dob; ?></td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td><?= strtoupper($data['gender']); ?></td>
                    </tr>
                    <tr>
                        <td>Qualification</td>
                        <td><?= strtoupper($data['qualification']); ?></td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td><?= strtoupper($data['address']); ?></td>
                    </tr>
                    <tr>
                        <td>Contact Number</td>
                        <td><?= $data['mobile']; ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><?= strtoupper($data['email']); ?></td>
                    </tr>

                    <tr>
                        <td>Centre Name</td>
                        <td>
                            <? //= strtoupper($data['centre_name']); ?>
                            <?php
                                $centreID = $data['centre_id'];
                                $chk_centre_name = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `franchises_centre` WHERE `id` = $centreID"));
                             ?>
                             <?= $chk_centre_name['c_name']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Department</td>
                        <td><?= strtoupper($department['name']); ?></td>
                    </tr>
                    <tr>
                        <td>Designation</td>
                        <td><?= strtoupper($desi); ?></td>
                    </tr>
                    <tr>
                        <td>Salary <small>(Per Month)</small></td>
                        <td><?= $data['salary']; ?></td>
                    </tr>
                    <tr>
                        <td>Joining Date</td>
                        <td><?= $join_date; ?></td>

                    </tr>
                    <?php if ($end_date != '') { ?>
                        <tr>
                            <td>End Date</td>
                            <td><?= $end_date; ?></td>

                        </tr>
                    <?php } ?>


                    <tr>
                        <td style="width:30%" class="p-0 m-0"><img src="uploads/profile/<?= $signature['signature']; ?>" width="100%" height="auto" /><small style=" text-align: center;display: block;">authorized signature</small></td>
                        <td>
                            <!--  <p> </p> -->
                        </td>
                    </tr>
                    
                </tbody>
            </table>
        </div>


<?php
    } else {
        echo '<label class="text-danger">No Record Found</label>';
    }
} else {
    echo  '<label class="text-danger">' . $error . '</label>';
    exit();
}
?>