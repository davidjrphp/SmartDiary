<?php
include('session.php');
include('admin/dbcon.php');

// Assuming you have already established a database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Define the allowed file extensions
    $allowedExtensions = array("jpg", "jpeg", "png", "gif", "pdf", "doc", "docx");

    // Retrieve form data
    $floc = ''; // You can set this as needed
    $fdatein = ''; // You can set this as needed
    $fdesc = $_POST["desc"];
    $user_id = $_POST["id"];
    $share_id = $_POST["id_class"];
    $fname = $_POST["name"];
    $uploaded_by = ''; // You can set this as needed

    // File Upload
    $uploadDir = 'uploads/'; // Specify your upload directory
    $uploadedFile = $_FILES['uploaded_file']['name'];
    $uploadPath = $uploadDir . $uploadedFile;
    $fileExtension = strtolower(pathinfo($uploadPath, PATHINFO_EXTENSION));

    // Check if the file extension is in the allowed list
    if (in_array($fileExtension, $allowedExtensions)) {
        if (move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $uploadPath)) {
            // File uploaded successfully, now insert data into the 'files' table
            // SQL query to insert data into the 'files' table
            $sql = "INSERT INTO files (floc, fdatein, fdesc, user_id, share_id, fname, uploaded_by) 
                    VALUES ('$uploadPath', '$fdatein', '$fdesc', '$user_id', '$share_id', '$fname', '$uploaded_by')";

            if (mysqli_query($conn, $sql)) {
                echo "File and data inserted successfully into the 'files' table.";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        } else {
            echo "Error uploading file.";
        }
    } else {
        echo "Invalid file extension. Supported extensions are: jpg, jpeg, png, gif, pdf, doc, docx.";
    }

    // Close the database connection
    mysqli_close($conn);
}
