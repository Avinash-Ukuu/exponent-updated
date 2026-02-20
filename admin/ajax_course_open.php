<?php
require_once('configDB.php');
$id = $_POST['id'];
$query = mysqli_query($conn, "SELECT * FROM `tb_course` WHERE `dept_id`='$id'") or die(mysqli_error($conn));
$ok = mysqli_num_rows($query);
if ($ok > 0) {
?>
    <option value="">--Choose Course--</option>
    <?php
    while ($course = mysqli_fetch_array($query)) {
    ?>
        <option value="<?php echo $course['id']; ?>"><?php echo $course['name']; ?></option>
    <?php
    }
} else {
    ?>
    <option value="">No course found</option>
<?php
}


?>