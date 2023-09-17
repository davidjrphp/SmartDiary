<?php
// Assuming you have already established a database connection.
include('admin/dbcon.php');
include('session.php');
$id = $session_id;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Retrieve the form data
	$date_start = $_POST["date_start"];
	$date_end = $_POST["date_end"];
	$title = $_POST["title"];
	$venue = $_POST["venue"];
	$note = $_POST["note"];

	// You may need to sanitize and validate the data here before inserting it into the database.

	// SQL query to insert data into the "event" table
	$sql = "INSERT INTO event (user_id, event_title, note, venue, date_start, date_end) VALUES (?, ?, ?, ?, ?, ?)";

	// Prepare the SQL statement
	$stmt = mysqli_prepare($conn, $sql);

	if ($stmt) {
		// Bind parameters to the statement
		mysqli_stmt_bind_param($stmt, "isssss", $id, $title, $note, $venue, $date_start, $date_end);

		// Execute the statement
		if (mysqli_stmt_execute($stmt)) {
			// Event successfully added
			echo "Event Successfully Added to Diary";
		} else {
			// Error occurred during execution
			echo "Error: " . mysqli_error($conn);
		}

		// Close the statement
		mysqli_stmt_close($stmt);
	} else {
		// Error in preparing the SQL statement
		echo "Error: " . mysqli_error($conn);
	}

	// Close the database connection
	mysqli_close($conn);

?>
	<script>
		window.location = "add-events.php";
	</script>
<?php
}
?>