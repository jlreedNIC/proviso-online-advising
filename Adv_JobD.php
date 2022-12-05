<?php

$user = 'root';
$password = '';

// Database name is UserDatabase
$database = 'proviso';

// Server is localhost with
// port number 3306
$servername='localhost:3306';
$mysqli = new mysqli($servername, $user,
				$password, $database);

// Checking for connections
if ($mysqli->connect_error) {
	die('Connect Error (' .
	$mysqli->connect_errno . ') '.
	$mysqli->connect_error);
}


// SQL query to select data from database
$sql = " SELECT * FROM  careers,degree";

$result = $mysqli->query($sql);

$mysqli->close();

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Job Descriptions</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="mycss.css" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <style>
            body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif}
            .w3-bar,h1,button {font-family: "Montserrat", sans-serif}
            .fa-anchor,.fa-coffee {font-size:200px}

            body {
                background-color: white;
            }
         

            button {
  background-color: #ffd700;
  color: black;
  padding: 14px 20px;
  margin: 8px 400px;
  border-radius: 25px;
  border: 4px round black;
  cursor: pointer;
  width: 50%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
  padding: 14px 20px;
  background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.container {
  padding: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: #474e5d;
  padding-top: 50px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

            

/* The Close Button (x) */
.close {
  position: absolute;
  right: 35px;
  top: 15px;
  font-size: 40px;
  font-weight: bold;
  color: #f1f1f1;
}

.close:hover,
.close:focus {
  color: #f44336;
  cursor: pointer;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}


/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
     width: 100%;
  }
}
            

        </style>
    </head>

    <body>
        <?php
        include('templates/header.php');
        include('templates/Adv_Navbar.php');
        Navbar("career");
        NameHeader("Jane Doe");
        ?>
      
	
        <header style="padding:80px; text-align: center;">
            <h1>
            Job Descriptions in BSCS
            </h1>
            <hr style="border: 1px solid black;">
        </header>

        <div class="container-fluid" style="width:80%">
          <button onclick="document.getElementById('id01').style.display='block'" style="padding:10px;">Software Developer</button>
          <button onclick="document.getElementById('id02').style.display='block'" style="padding:10px;">Information Security Analyst</button>
          <button onclick="document.getElementById('id03').style.display='block'" style="padding:10px;">Web Developer</button>
        </div>

<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal"  >&times;</span>
  <form class="modal-content" action="/action_page.php">
    <div class="container">
      <h1>Software Developer:</h1></br>
      <p>Software Developers are tasked with creating and developing websites, programs, 
        and other applications that run on computers or other devices.</p>
      <p>Skills: A strong background in computer programming is highly recommended for these positions.
        Interpersonal skills to collaborate with others on projects 
        and being detail oriented to be able to juggle multiple aspects are also highly valued.</p>
       <p>
       Salary: Around $105,000, according to the U.S. Bureau of Labor Statistics.
       </p>

        <canvas  width="10" height="20"></canvas>
        <h2> Career Graph: </h2></br>   
        <h3> (Software Developer for Micron) </h3></br>       
        <p align="center"><iframe src="gojs/release/t.php" height="950" style="width:100%"  title="Iframe Example"></iframe></p>

    </div>
  </form>
</div>




<div id="id02" class="modal">
  <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal"  >&times;</span>
  <form class="modal-content" action="/action_page.php">
    <div class="container">
      <h1>Information Security Analyst:</h1></br>
      <p>Information Security Analysts are in charge of implementing systems of 
        safety and protecting a company’s computer networks.</p>
      <p>  
        Skills: Being meticulous and detail-oriented in your work is mandatory for success in this role, 
        as a whole organization’s security is on the line. 
        Being able to predict outcomes and adjust security accordingly is also key.</p>
      <p>Salary: Around $98,000.</P>
      <h2> Career Graph: </h2></br>   
        <h3> (Security Analyst for Micron) </h3></br>       
        <p align="center"><iframe src="gojs/release/t2.php" height="950" style="width:100%"  title="Iframe Example"></iframe></p>

    </div>
  </form>
</div>


<div id="id03" class="modal">
  <span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal"  >&times;</span>
  <form class="modal-content" action="/action_page.php">
    <div class="container">
      <h1>Web Developer:</h1></br>
      <p>Web Developers are programmers that are concentrated on coding,
         designing, and building out the layout of a website.</p>
      <p>  
      Skills: Knowledge of HTML/CSS, Javascript, and other programming languages is essential for this role. 
      It’s also important to have knowledge of graphic design 
      and a collaborative mindset while working with other designers on projects.</p>
      <p>Salary: Around $69,000.</P>
      <h2> Career Graph: </h2></br>   
        <h3> (Web Developer for Prosoft) </h3></br>       
        <p align="center"><iframe src="gojs/release/t3.php" height="950" style="width:100%"  title="Iframe Example"></iframe></p>

    </div>
  </form>
</div>
    
      
		<?php
        include('templates/footer.php');
        Footer();
        ?>
		<script>

// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>





    </body>
</html>