
<?php

// Username is root
// Riley Walsh
// lab_5
// 10/07/2022
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
$sql = " SELECT * FROM degree, careers,student_take";

$result = $mysqli->query($sql);

$mysqli->close();

?>

<!DOCTYPE html>  
<html>  
    <head>  
        <title>Degree</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">  
        <!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="mycss.css" rel="stylesheet">
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">

        <!-- flowchart -->
        <script src="https://www.cssscript.com/demo/dynamic-flow-chart-library-with-createjs-flowjs/lib/createjs-2015.05.21.min.js"></script>
        <script src="https://www.cssscript.com/demo/dynamic-flow-chart-library-with-createjs-flowjs/src/flow.js"></script>
        <script src="https://www.cssscript.com/demo/dynamic-flow-chart-library-with-createjs-flowjs/src/flowitem.js"></script>
        <script src="https://www.cssscript.com/demo/dynamic-flow-chart-library-with-createjs-flowjs/src/flowconnector.js"></script>

        <style>
            body {
                background-color: white;
            }
			
			 @media only screen and (max-width:800px) {
            #no-more-tables tbody,
            #no-more-tables tr,
            #no-more-tables td {
                display: block;
            }
            #no-more-tables thead tr {
                position: absolute;
                top: -9999px;
                left: -9999px;
            }
            #no-more-tables td {
                position: relative;
                padding-left: 50%;
                border: none;
                border-bottom: 1px solid #eee;
            }
            #no-more-tables td:before {
                content: attr(data-title);
                position: absolute;
                left: 6px;
                font-weight: bold;
            }
            #no-more-tables tr {
                border-bottom: 1px solid #ccc;
            }
        }
        </style>
    </head>

    <body>  
        <!-- Navbar -->
        <nav class="navbar navbar-dark bg-dark navbar-expand-lg nav-pills" style="background-color:black !important">
            <span class="navbar-brand mb-0 h1" style="color:rgb(231, 200, 25)"><strong>ProViso Online Advising</strong></span>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="navbar-nav">
                    <a href="index.html" class="nav-item nav-link my-nav-item">Home</a>
                    <a href="degree_overview.html" class="active nav-item  nav-link my-nav-item">Degree Overview</a>
                    <a href="career.html" class="nav-item nav-link my-nav-item">Career Overview</a>

                    <a href= Class_Reg.php class="nav-item nav-link my-nav-item" >Course Register</a>
                    <a href="#" class="nav-item nav-link my-nav-item disabled">Course Mapper</a>
                    <a href="#" class="nav-item nav-link my-nav-item disabled">Course outcomes</a>
                    <a href="sign_up.html" class="nav-item nav-link my-nav-item">Register</a>
					 <a href="#" class="nav-item nav-link my-nav-item">Logout</a>
                </div>
            </div>

            
        </nav>


        <header style="padding:80px; text-align: center;">
            <h1>
                Degree Overview
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
                    <h2><?php echo $rows['Name'];?></h2>
                    Career Goal: <span style="font-size: x-large"><?php echo $rows['Position_Name'];?> </span><a href="#">Change Career Goal</a><br>
                    Credits: 128/132
                </div>
            </div>
        </div>

        <div class="container-fluid" style="width: 80%">
            <div class="card my-card shadow p-3 mb-5 bg-white rounded">
                
                <div class="card-body">
                    <h2>Courses</h2>
                    <table class="table table-hover">
                        <div>
                            Legend:
                            <i class="fa fa-square-o" aria-hidden="true"></i> Not Completed
                            <i class="fa fa-check-square-o" aria-hidden="true"></i> Completed
                            <i class="fa fa-plus-square-o" aria-hidden="true"></i> Added by Career Goal
                        </div>
						
						   <table class="table bg-white" id="myTable">
                <thead class="bg-dark text-light">
                    <tr>
                        <th></th>
                        <th>Course Number</th>
                        <th>Course Name</th>
                        <th>Skills</th>
                     
                    </tr>
                </thead>
                <tbody>
                
                    <tr>
                        <td ><i class="fa fa-check-square-o" aria-hidden="true"></i></td>
                        <td><?php echo $rows['Course_Number'];?></td>
                        <td ><?php echo $rows['Course_Name'];?></td>
                        <td ><?php echo $rows['Skill'];?></td>
                     
                    </tr>
           				
						<!--
                        <thead class="table-dark">
                            <tr>
                                <th scope="col" class="table-icon"> </th>
                                <th scope="col">Course Number</th>
                                <th scope="col">Course Name</th>
                                <th scope="col" class="table-skills">Skills</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                
                                <td><i class="fa fa-square-o" aria-hidden="true"></i></td>
                                <td>CS 120</td>
                                <td>Computer Science I (4)></td>
                                <td> 
                                    <span class="badge badge-info" style="background-color:black">C++</span>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"><i class="fa fa-check-square-o" aria-hidden="true"></i></th>
                                <td>CS 470</td>
                                <td>Artificial Intelligence (3)</td>
                                <td> 
                                    <span class="badge badge-info" style="background-color:black">Artificial Intelligence</span>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"><i class="fa fa-plus-square-o" aria-hidden="true"></i></th>
                                <td>CS 360</td>
                                <td>Database Systems (3)</td>
                                <td> 
                                    <span class="badge badge-info" style="background-color:black">HTML5</span>
                                    <span class="badge badge-info" style="background-color:black">SQL</span>
                                    <span class="badge badge-info" style="background-color:black">MySQL</span>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"><i class="fa fa-plus-square-o" aria-hidden="true"></i></th>
                                <td>CS 383</td>
                                <td>Software Engineering (4)</td>
                                <td> 
                                    <span class="badge badge-info" style="background-color:black">Software Design</span>
                                    <span class="badge badge-info" style="background-color:black">Unity</span>
                                    <span class="badge badge-info" style="background-color:black">C#</span>
                                    <span class="badge badge-info" style="background-color:black">GitHub</span>
									
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"><i class="fa fa-check-square-o" aria-hidden="true"></i></th>
                                <td>CS XXX</td>
                                <td>Generic Class (credits)</td>
                                <td> 
                                    <span class="badge badge-info" style="background-color:black">skill</span>
                                </td>
                            </tr>
							--->
                        </tbody>
                        
                    </table>
                </div>
            </div>
        </div>
<?php
				}
			?>
        <div class="container-fluid" style="width:80%">
            <div class="card my-card shadow p-3 mb-5 bg-white rounded">
                <div class="card-body">
                    <h2> sample course layout</h2>
                    <canvas id="demo" width="500" height="300"></canvas>
                </div>
            </div>
        </div>
    
    </body>  
</html>  

<!-- Tooltip enable script  -->
<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {return new bootstrap.Tooltip(tooltipTriggerEl)})
</script>

<script>
    // query for each class
    // query what that class is a prereq of
    // start building chart

    var e = [
        [{id: "CS 121", next: ["CS 210", "CS 240", "CS 270"]}], //{id: "z1", empty: true, next: undefined}, {id: "z1", empty: true, next: undefined}],
        [{id: "CS 210", next: ["CS 383"]}, {id: "CS 240", next: ["CS 383"]},  {id: "CS 270", next: ["CS 383"]}],
        [{id: "CS 383", next: undefined}]//, {id: "Software Engineering", next: undefined}, {{id: "z3", empty: true, next: undefined}],
    ];

    // new flowjs("demo", d).draw();
    new flowjs("demo", e).draw();


</script>