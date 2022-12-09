<?php


session_start();
if(!isset($_SESSION['userName']))
{
    header("Location: login.php");
    exit();
}

require('php_scripts/db_connection.php');


// SQL query to select data from database
$sql = " SELECT * FROM  careers,degree";

$result = $mysqli->query($sql);

$mysqli->close();

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Course Catalog</title>
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
        </style>
    </head>

    <body>
        <?php
        include('templates/header.php');
        include('templates/Adv_Navbar.php');
        Navbar("course_catalog");
        NameHeader($_SESSION['firstName']." ".$_SESSION['lastName']);
        ?>
      
	
        <header style="padding:80px; text-align: center;">
            <h1>
            Bachelors of Computer Science
            </h1>
            <hr style="border: 1px solid black;">
        </header>


        <div class="container-fluid" style="width:80%">
            <div class="card my-card shadow p-3 mb-5 bg-white rounded">
                <div class="card-body">
                 
                    <h3><a href="http://uidaho.smartcatalogiq.com/2017-2018/University-of-Idaho-General-Catalog/Departments-of-Instruction/Department-of-Computer-Science/Computer-Science-B-S-C-S">View Full Course Catalog Page</a></h3></br>
                    <h3><a href="https://www.uidaho.edu/registrar/transcripts">View Transcript Policy</a></h3></br>
                    <h2 style="padding:10px; text-align: center;"> Course Catalog </h2>

                    <canvas  width="20" height="10"></canvas>
                    <center>
                    <iframe src="http://uidaho.smartcatalogiq.com/2017-2018/University-of-Idaho-General-Catalog/Departments-of-Instruction/Department-of-Computer-Science/Computer-Science-B-S-C-S" 
                        height="950" style=" width:70%;"  title="Iframe Example"></iframe>
                    </center>
                    </div>
            </div>
        </div>

        
      
        

		<?php
        include('templates/footer.php');
        Footer();
        ?>
		
    </body>
</html>