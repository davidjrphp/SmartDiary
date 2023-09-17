<?php
include('admin/dbcon.php');
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

include 'dbConnector.php';

/* user */
$query = "SELECT * FROM tbluser WHERE username=? AND password=?";
$stmt = mysqli_stmt_init($conn);

// Check if the prepared statement could be initialized
if (mysqli_stmt_prepare($stmt, $query)) {
	// Bind the parameters
	mysqli_stmt_bind_param($stmt, "ss", $username, $password);

	// Execute the statement
	mysqli_stmt_execute($stmt);

	// Get the result
	$result = mysqli_stmt_get_result($stmt);

	// Fetch the row
	$row = mysqli_fetch_array($result);
	$num_row = mysqli_num_rows($result);

	if ($num_row > 0) {
		$_SESSION['id'] = $row['user_id'];
		echo 'true';
	} else {
		echo 'false';
	}

	// Close the statement
	mysqli_stmt_close($stmt);
} else {
	echo 'false';
}

// Close the database connection
mysqli_close($conn);
