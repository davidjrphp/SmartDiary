<?php
include('session.php');
include('admin/dbcon.php');

$errmsg_arr = array();
$errflag = false;

$uploaded_by_query = mysqli_prepare($conn, "SELECT * FROM tbluser WHERE user_id = ?");
if ($uploaded_by_query) {
    mysqli_stmt_bind_param($uploaded_by_query, "i", $session_id);
    mysqli_stmt_execute($uploaded_by_query);
    $uploaded_by_result = mysqli_stmt_get_result($uploaded_by_query);

    if ($uploaded_by_result && $uploaded_by_row = mysqli_fetch_array($uploaded_by_result)) {
        $uploaded_by = $uploaded_by_row['firstname'] . " " . $uploaded_by_row['lastname'];
    } else {
        $errmsg_arr[] = 'User not found';
        $errflag = true;
    }
    mysqli_stmt_close($uploaded_by_query);
} else {
    $errmsg_arr[] = 'Error preparing user data query';
    $errflag = true;
}

$id_class = $_POST['id_class'];
$name = $_POST['name'];
$get_id = $_POST['id_class'];

function clean($str, $conn)
{
    $str = trim($str);
    return mysqli_real_escape_string($conn, $str);
}

$filedesc = clean($_POST['desc']);

if ($filedesc == '') {
    $errmsg_arr[] = 'File description is missing';
    $errflag = true;
}

if ($_FILES['uploaded_file']['size'] >= 1048576 * 5) {
    $errmsg_arr[] = 'File selected exceeds 5MB size limit';
    $errflag = true;
}

if ($errflag) {
    $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
    session_write_close();
    header("Location: uploads.php?id=$get_id");
    exit();
}

$rd2 = mt_rand(1000, 9999) . "_File";

if ((!empty($_FILES["uploaded_file"])) && ($_FILES['uploaded_file']['error'] == 0)) {
    $filename = basename($_FILES['uploaded_file']['name']);
    $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

    if (!in_array($ext, array("jpg", "jpeg", "png", "gif", "pdf", "doc", "docx"))) {
        $errmsg_arr[] = 'Error: Only image, PDF, and Word files are allowed';
        $errflag = true;
    }

    if ($errflag) {
        $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
        session_write_close();
        header("Location: uploads.php?id=$get_id");
        exit();
    }

    $newname = "admin/uploads/" . $rd2 . "_" . $filename;

    if (move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $newname)) {
        $qry2 = "INSERT INTO files (fdesc, floc, fdatein, user_id, fname, uploaded_by) VALUES (?, ?, NOW(), ?, ?, ?)";

        $stmt = mysqli_prepare($conn, $qry2);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ssiss", $filedesc, $newname, $id_class, $name, $uploaded_by);

            if (mysqli_stmt_execute($stmt)) {
                $errmsg_arr[] = 'The file was uploaded';
            } else {
                $errmsg_arr[] = 'Record was not saved in the database, but the file was uploaded';
            }

            mysqli_stmt_close($stmt);
        } else {
            $errmsg_arr[] = 'Error preparing SQL statement';
        }
    } else {
        $errmsg_arr[] = 'Upload of file ' . $filename . ' was unsuccessful';
    }

    $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
    session_write_close();
    header("Location: uploads.php?id=$get_id");
    exit();
} else {
    $errmsg_arr[] = 'Error: No file uploaded';
    $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
    session_write_close();
    header("Location: uploads.php?id=$get_id");
    exit();
}

mysqli_close($conn);
