<?php
require_once('configDB.php');
$id = $_POST['id'];
$course_sem = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `tb_course` WHERE id='$id' && `status`=1 "));
$c = $course_sem['curs_semester'];

for ($i = 1; $i <= $c; $i++) {
?>

    <div class="custom-control custom-radio custom-control-inline">

        <input class="custom-control-input custom-control-input-primary custom-control-input-outline" type="radio" value="<?= $i; ?>" id="customRadio<?= $i; ?>" name="et" required>
        <label for="customRadio<?= $i; ?>" class="custom-control-label"><?= $i; ?> Term</label>
    </div>
<?php
}
?>