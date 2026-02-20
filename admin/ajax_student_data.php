<?php
require_once('configDB.php');
$id = $_POST['id'];
$query = mysqli_query($conn, "SELECT * FROM `tb_student` WHERE `id`='$id'") or die(mysqli_error($conn));
$ok = mysqli_num_rows($query);
if ($ok > 0) {
    $data = mysqli_fetch_array($query)
?>

    <div class="row">

        <h4 class="text-center m-auto"><strong>Acknowledgement Card</strong></h4>
        <table class="table table-bordered table-striped">
            <tbody>

                <tr>
                    <td style="width:30%">Registration No.</td>
                    <td style="width:50%"><?= $data['reg_no']; ?> </td>
                    <td style="width:30%" class="p-0 m-0" rowspan="4"><img src="../uploads/profile/<?= $data['image']; ?>" width="100%" height="auto" /></td>
                </tr>
                <tr>
                    <td>Exam Roll No.</td>
                    <td class="p-0 m-0"><input type="text" class="form-control m-0" style="width:100%;min-height: 48px; border-radius:0" placeholder="Enter exam Roll No." name="exam_rollno" autofocus></td>
                </tr>
                <tr>
                    <td>Student Name</td>
                    <td><?= $data['name']; ?></td>
                </tr>
                <tr>
                    <td>father Name</td>
                    <td><?= $data['father_name']; ?></td>
                </tr>
                <tr>
                    <td>Mother Name</td>
                    <td><?= $data['mother_name']; ?></td>
                    <td style="width:30%" class="p-0 m-0"><img src="../uploads/profile/<?= $data['signature_img']; ?>" width="100%" height="auto" /></td>
                </tr>

            </tbody>
        </table>

    </div>

    <button type="submit" class="btn btn-primary d-block m-auto" id="GenerateID_btn">Generate ID</button>


<?php

} else {
    echo 'No Record Found';
}


?>