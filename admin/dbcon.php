<?php
// $db = mysqli_select_db('diary',mysqli_connect('localhost','root',''))or die(mysqli_error());

$conn = new mysqli('localhost', 'root', '', 'smartdiary') or die("Could not connect to mysql" . mysqli_error($con));
