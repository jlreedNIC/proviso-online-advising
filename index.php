<?php

session_start();
if(!isset($_SESSION['userName']))
{
    header("Location: login.php");
    exit();
}

require('php_scripts/db_connection.php');
// $mysqli = OpenCon();


// SQL query to select data from database
// $sql = " SELECT * FROM degree, careers";

// selects the relevant information for just the current student
$sql = "SELECT Degree_Type, Degree_Name, Description, grade, firstName, lastName, role, Company, Position_Name, Pay, Des
        from students
        join user_career on user_career.User_ID=students.userID
        join user_degree on user_degree.userID=students.userID
        
        join careers on user_career.Career_ID=careers.CareerID
        join degrees on user_degree.DegreeID=degrees.DegreeID
        
        where user_career.User_ID = ".$_SESSION['userID']."";

$result = $mysqli->query($sql);
print_r($result);

$size = 0;
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
    $userInfo[$size] = $row;
    $size++;
}
print_r($userInfo);

$mysqli->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Online Advising</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="mycss.css" rel="stylesheet">

  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  

  <style>
    body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif}
    .w3-bar,h1,button {font-family: "Montserrat", sans-serif}
    .fa-book,.fa-desktop {font-size:200px}
    body {
      background-color: white;
    }
	header{

        width: 100%;
        height: 50%;
        padding: 0 0 50%;
        border: 1px solid;
        background-size: 50%;
        background-repeat: no-repeat;
        background-size: cover;
        margin-left: auto;
        margin-right: auto;
     }

	
  </style>
</head>

<body>  
<?php
    // load navbar and header
    include('templates/navbar.php');
    Navbar("home");

    // do we need this or keep the name below on the dashboard page
    // include('templates/header.php');
    // NameHeader($userInfo[0]['firstName']." ".$userInfo[0]['lastName']);
?>

<!-- Header <img class="center-fit" src="img/notebook.jpg" >-->
<header class="w3-container w3-cyan w3-center " style="padding:128px 16px; background-image: url('img/ccc.jpg')  !important">
  <div style="background-color: black; width:50%; border: 2px solid white" class="container-fluid">
    <h1 class="w3-margin w3-jumbo" style="color:white">Dashboard</h1>
    <p style="color:white" class="w3-xlarge"> <?php echo $_SESSION['role']; ?> </p>
    <p style="color:white" class="w3-large">
      <?php echo $_SESSION['firstName']." ".$_SESSION['lastName']; ?> <br>
      <?php echo $userInfo[0]['grade']; ?>
    </p>
  </div>
</header>

<!-- First Grid -->
<div class="w3-row-padding w3-padding-64 w3-container">
  <div class="w3-content">

    <div class="w3-twothird">
      <!-- degree info  -->
      <h1><?php echo $userInfo[0]['Degree_Type']." ".$userInfo[0]['Degree_Name']; ?>  </h1>
      <p class="w3-text-grey w3-padding-32"><?php echo $userInfo[0]['Description']; ?></p>
    </div>

    <div class="w3-third w3-center">
      <i class="fa fa-book w3-padding-64 w3-text-black"></i>
    </div>

  </div>
</div>

<!-- Second Grid -->
<div class="w3-row-padding w3-light-grey w3-padding-64 w3-container">
  <div class="w3-content">

    <div class="w3-third w3-center">
      <i class="fa fa-desktop w3-padding-64 w3-text-black w3-margin-right"></i>
    </div>

    <div class="w3-twothird">
      <h1><?php echo $userInfo[0]['Position_Name']; ?> </h1>
      <p class="w3-text-grey w3-padding-32"><?php echo $userInfo[0]['Des']; ?></p>
    </div>

  </div>
</div>

<!-- Third Grid -->
<div class="w3-row-padding w3-padding-64 w3-container">
  <div class="w3-content">

    <div class="w3-twothird">
      <h1>Career graph</h1>
      <h5 class="w3-padding-32">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</h5>

      <p class="w3-text-grey">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint
        occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
        laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>

    <div class="w3-third w3-center">
      <i class="fa fa-book w3-padding-64 w3-text-black"></i>
    </div>

  </div>
</div>

<div class="w3-container w3-black w3-center w3-opacity w3-padding-64">
    <h1 class="w3-margin w3-xlarge">Quote of the day: live life</h1>
</div>
 

<!-- Footer -->
<?php
include('templates/footer.php');
Footer();
?>



<script>
// Used to toggle the menu on small screens when clicking on the menu button
function myFunction() {
  var x = document.getElementById("navDemo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}
</script>

</body>
</html>
