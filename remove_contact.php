<?php include('admin/dbcon.php'); ?>
<?php
$id = $_POST['id'];
mysqli_query($conn, "delete from contact where id = '$id'") or die(mysqli_error($conn));
echo "done";
?>

