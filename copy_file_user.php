<?php
include('admin/dbcon.php');
include('session.php');
if (isset($_POST['delete_user'])) {
	$id = $_POST['selector'];

	$N = count($id);
	for ($i = 0; $i < $N; $i++) {
		$result = mysqli_query($conn, "select * from files  where file_id = '$id[$i]' ") or die(mysqli_error($conn));
		while ($row = mysqli_fetch_array($result)) {

			$fname = $row['fname'];
			$floc = $row['floc'];
			$fdesc = $row['fdesc'];
			$teacher_id = $row['teacher_id'];


			mysqli_query($conn, "insert into user_backpack (floc,fdatein,fdesc,user_id,fname) value('$floc',NOW(),'$fdesc','$session_id','$fname')") or die(mysqli_error($conn));
		}
	}
?>
	<script>
		window.location = 'backpack.php';
	</script>
<?php
}
?>