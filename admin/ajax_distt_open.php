<?php
require_once('configDB.php');
$id = $_POST['id'];
$query = mysqli_query($conn, "SELECT * FROM `district` WHERE `st_code`='$id' order by `name`") or die(mysqli_error($conn));
$ok = mysqli_num_rows($query);
if ($ok > 0) {
?>
    <option value="">--Select District--</option>
    <?php
    while ($distt = mysqli_fetch_array($query)) {
    ?>
        <option value="<?php echo $distt['id']; ?>"><?php echo $distt['name']; ?></option>
    <?php
    }
} else {
    ?>
    <option value="">No District found</option>
<?php
}


?>