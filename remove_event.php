<?php include('admin/dbcon.php'); ?>
<?php
$id = $_POST['id'];
$delete = mysqli_query($conn, "delete from event where event_id = '$id'") or die(mysqli_error($conn));
if ($delete) {
	echo "done";
} else {
	echo "error";
}
?>

