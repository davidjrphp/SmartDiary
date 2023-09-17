<?php
include('admin/dbcon.php');
include('session.php');

@$id = $_POST['id'];
@$msg = $_POST['msg'];
@$sender = $session_id;

$query1 = mysqli_query($conn, "select * from tbluser where user_id = '$session_id'") or die(mysqli_error($conn));
$row1 = mysqli_fetch_array($query1);
$name1 = $row1['firstname'] . " " . $row1['lastname'];

mysqli_query($conn, "insert into message (reciever_id,content,date_sended,sender_id,reciever_name,sender_name) values('$id','$msg',NOW(),'$session_id','$id','$name1')") or die(mysqli_error($conn));
