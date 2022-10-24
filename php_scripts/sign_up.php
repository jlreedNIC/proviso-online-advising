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
        (firstName, lastName, userName, password, email, gender)
        VALUES ('$firstname', '$lastname', '$username', '$password', '$email', '$gender')";

$rs = mysqli_query($con, $sql);

if($rs)
{
    // echo "sign up student record inserted";

    CloseCon($con);

    // header("location:../sign_up_success.html"); 
    echo "<link rel='stylesheet' href='https://www.w3schools.com/w3css/4/w3.css'>
    <body style='background-color:rgb(231, 200, 25) !important'>
    
    <header class='w3-container w3-cyan w3-center' style='padding:128px 16px; background-color: rgb(231, 200, 25) !important'>
          <h1 class='w3-margin w3-jumbo'>Success!</h1>
          <p class='w3-large'>
              You have successfully signed up for the proviso online advising system!
          </p>

          <p class='w3-large'>
              Click 
              <a href='../index.html' class='link'>here</a>
              to go to the dashboard.
          </p>
          </header>
    </body>
        ";
}
else
{
    echo "issue encountered";
    echo $rs;
    CloseCon($con);
}





?>