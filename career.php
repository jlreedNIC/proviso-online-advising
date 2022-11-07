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
        <title>Career Goal</title>
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
        include('templates/navbar.php');
        Navbar("career");
        NameHeader("Jane Doe");
        ?>
      
	
        <header style="padding:80px; text-align: center;">
            <h1>
                Career Overview
            </h1>
            <hr style="border: 1px solid black;">
        </header>
   
        <div class="container-fluid" style="width:80%">
            <div class="card my-card shadow p-3 mb-5 bg-white rounded">
                <div class="card-body">
                 <?php
				// LOOP TILL END OF DATA
				while($rows=$result->fetch_assoc())
				{


			?>
                    <h2>Career Goal</h2> <span style="font-size: x-large"><?php echo $rows['Position_Name'];?> </span><br>
              <?php
				}
			?>
                </div>
            </div>
        </div>
	     
        <div class="container-fluid" style="width:80%">
            <div class="card my-card shadow p-3 mb-5 bg-white rounded">
                <div class="card-body">
                    
                    <h2>  Personal References</h2> 
				    <br>
                   
				   <table class="table bg-white" id="myTable">
                <thead class="bg-dark text-light">
                    <tr>
                        
                        <th>Name</th>
                        <th>Number</th>
                        <th>Email</th>
                     
                    </tr>
                </thead>
                <tbody>
                
                    <tr>
                       
                        <td>Jane Doe</td>
                        <td >111-111-1111</td>
                        <td >Jane@Gmail.com</td>    
                    </tr>
					<tr>    
						<td>Jack Doe</td>
                        <td >222-222-2222</td>
                        <td >Jack@Gmail.com</td>
                     
                    </tr>
				   
	
				      </tbody>
                        
                    </table>
				   
                </div>
            </div>
        </div>

        <div class="container-fluid" style="width: 80%">
            Skills needed: $skills
        </div>

        <div class="container-fluid" style="width: 80%">
            Courses Recommended based on skills needed: $recommendations
        </div>
		
		<?php
        include('templates/footer.php');
        Footer();
        ?>
		
    </body>
</html>