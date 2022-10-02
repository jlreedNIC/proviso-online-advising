<?php

include 'db_connection.php';

$con = OpenCon();


$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$gender = $_POST['gender'];

$sql = "INSERT INTO students
        (first_name, last_name, user_name, password, email, gender)
        VALUES ('$firstname', '$lastname', '$username', '$password', '$email', '$gender')";

$rs = mysqli_query($con, $sql);

if($rs)
{
    echo "sign up student record inserted";

    CloseCon($con);

    header("location:../sign_up_success.html"); 
}
else
{
    echo "issue encountered";
    echo $rs;
    CloseCon($con);
}





?>