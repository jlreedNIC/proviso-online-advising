<?php
$con = mysqli_connect('localhost', 'root', '', 'user_student');

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$gender = $_POST['gender'];

$sql = "INSERT INTO `tbl_students` (`userID`, `fldFirstName`, `fldLastName`, `fldUsername`, `fldPassword`, `fldEmail`, `fldGender`) VALUES ('0', '$firstname', '$lastname', '$username', '$password', '$email', '$gender')";

$rs = mysqli_query($con, $sql);

if($rs)
{
    echo "sign up student record inserted";
}

?>