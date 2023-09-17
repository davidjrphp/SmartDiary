<?php
include('admin/dbcon.php');
session_start();

$username = $_POST['username'];
$password = $_POST['password'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$about = $_POST['about'];

include 'dbConnector.php';

// Prepare the SQL query with placeholders
$sql = "INSERT INTO tbluser (firstname, lastname, username, password, about) VALUES (?, ?, ?, ?, ?)";

// Create a prepared statement
$stmt = mysqli_stmt_init($conn);

// Check if the prepared statement could be initialized
if (mysqli_stmt_prepare($stmt, $sql)) {
	// Bind the parameters
	mysqli_stmt_bind_param($stmt, "sssss", $firstname, $lastname, $username, $password, $about);

	// Execute the statement
	if (mysqli_stmt_execute($stmt)) {
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
