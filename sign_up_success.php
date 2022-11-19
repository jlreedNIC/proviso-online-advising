<?php




 require('php_scripts/db_connection.php');
// $mysqli = OpenCon();


// SQL query to select data from database
$sql = " SELECT * FROM degree, careers";

$result = $mysqli->query($sql);

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
 body{  
                font-family: Calibri, Helvetica, sans-serif;  
                background-color: rgb(41, 38, 25);  
            }

            .container {  
                padding: 50px;  
                background-color: rgb(231, 200, 25);  
            }  
            
            input[type=text], input[type=password], textarea {  
                width: 100%;  
                padding: 15px;  
                margin: 5px 0 22px 0;  
                display: inline-block;  
                border: none;  
                background: #f1f1f1;  
            }

            input[type=text]:focus, input[type=password]:focus {  
                background-color: lightgrey;  
                outline: none;  
            }

            div {  
                padding: 10px 0;  
            }  

            hr {  
                border: 1px solid #f1f1f1;  
                margin-bottom: 25px;  
            }

            .registerbtn {  
                background-color: black;  
                color: white;  
                padding: 16px 20px;  
                margin: 8px 0;  
                border: none;  
                cursor: pointer;  
                width: 100%;  
                opacity: 0.9;  
            }

            .registerbtn:hover {  
                opacity: 1;  
            }  
	
  </style>
</head>

<body>  
<?php
    // load navbar and header
    include('templates/navbar.php');
    Navbar("home");

    include('templates/header.php');
    NameHeader("Jane Doe");
?>

 <header class="w3-container w3-cyan w3-center" style="padding:128px 16px; background-color: rgb(231, 200, 25) !important">
        <h1 class="w3-margin w3-jumbo">Success!</h1>
        <p class="w3-large">
            You have successfully signed up for the proviso online advising system!
        </p>

        <p class="w3-large">
            Click 
            <a href="index.php" class="link">here</a>
             to go to the dashboard.
        </p>
    </header>
    

</body>
</html>
