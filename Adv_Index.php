<?php

session_start();
if(!isset($_SESSION['userName']))
{
    header("Location: login.php");
    exit();
}


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
    include('templates/Adv_Navbar.php');
    Navbar("home");

    // include('templates/header.php');
    // NameHeader("Jane Doe");
?>

<!-- Header <img class="center-fit" src="img/notebook.jpg" >-->
<header class="w3-container w3-cyan w3-center " style="padding:128px 16px; background-image: url('img/c.jpg')  !important">
    <div style="background-color: black; width:50%; border: 2px solid gold" class="container-fluid">
      <h1 class="w3-margin w3-jumbo" style="color:gold">Welcome</h1>
      <p style="color:gold" class="w3-xlarge">Advisor</p>
      <p style="color:gold" class="w3-large">
          <?php echo $_SESSION['firstName']." ".$_SESSION['lastName']; ?> 
      </p>
    </div>
</header>


<!-- Second Grid -->
<div class="w3-row-padding w3-light-grey w3-padding-64 w3-container">
  <div class="w3-content">
    <div class="w3-third w3-center">
      <i class="fa fa-desktop w3-padding-64 w3-text-black w3-margin-right"></i>
    </div>

    <div class="w3-twothird">
	
		
      <h1>My Role</h1>
	  
      

      <p class="w3-text-grey w3-padding-32">
      An Academic Advisor’s duty is primarily to students who attend the high school,
       college or university where they are employed. The advisor needs to have a 
       thorough understanding of the various degree programs and the necessary
        classes for those programs. Students will seek the help of advisors
         as they plan for their future careers. Academic Advisors also 
         help students who are transferring from other schools and make sure 
      that they go through orientation and get their credits transferred.    
      </p>
		
    </div>
  </div>
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
