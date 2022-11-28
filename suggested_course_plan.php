<?php
session_start();
if(!isset($_SESSION['userName']))
{
    header("Location: login.php");
    exit();
}

require("php_scripts/db_connection.php");
// query for course table
$con = OpenCon();


CloseCon($con);

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

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">


        <style>
            body {
                background-color: white;
            }
        </style>
    </head>

    <body>  
        <?php 
            include("templates/navbar.php");
            include("templates/header.php");
            Navbar("NA");
            NameHeader($_SESSION['firstName']." ".$_SESSION['lastName']);
        ?>


        <header style="padding:80px; text-align: center;">
            <h1>
                Four Year Sample Course Plan
            </h1>
            <hr style="border: 1px solid black;">
        </header>

        <!-- <div class="container-fluid" style="width:80%">
            <a href="degree_overview.php">Back to Degree Overview</a>
        </div> -->
        
        <div class="container-fluid" style="width:80%">
            <div class="card my-card shadow p-3 mb-5 bg-white rounded">
                <div class="card-body">
                    
                    <div class="row">
                        <div> 
                            <h3 style="text-align:center">Freshman Year</h3> 
                        </div>
                        <div class="col-md-6">
                            <h4 style="text-align: center; background-color: gray; color: white"> Semester 1</h4>

                            <table class="table bg-white" id="myTable">
                                <tbody>
                                    <tr>
                                        <td><i class="fa fa-square-o" aria-hidden="true"></i></td>
                                        <td>CS 120</td>
                                        <td>Computer Science I</td>
                                        <td>4</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-square-o" aria-hidden="true"></i></td>
                                        <td>MATH 176</td>
                                        <td>Discrete Mathematics</td>
                                        <td>3</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-square-o" aria-hidden="true"></i></td>
                                        <td>COMM 101</td>
                                        <td>Fundamentals of Public Speaking</td>
                                        <td>2</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-square-o" aria-hidden="true"></i></td>
                                        <td>ENGL 102</td>
                                        <td>College Writing and Rhetoric</td>
                                        <td>3</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-square-o" aria-hidden="true"></i></td>
                                        <td>ELECTIVE</td>
                                        <td>Free Elective</td>
                                        <td>3</td>
                                    </tr>
                                    <tr>
                                        <td> </td>
                                        <td> </td>
                                        <td><b>Total Credits</b></td>
                                        <td><b>15</b></td>
                                    </tr>
                                </tbody>
                            </table>
                            
                        </div>

                        <div class="col-md-6">
                            <h4 style="text-align: center; background-color: gray; color: white"> Semester 2</h4>
                            <table class="table bg-white" id="myTable">
                                <tbody>
                                    <tr>
                                        <td><i class="fa fa-square-o" aria-hidden="true"></i></td>
                                        <td>CS 121</td>
                                        <td>Computer Science II</td>
                                        <td>4</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-square-o" aria-hidden="true"></i></td>
                                        <td>CS 150</td>
                                        <td>Computer Organization and Architecture</td>
                                        <td>3</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-square-o" aria-hidden="true"></i></td>
                                        <td>MATH 170</td>
                                        <td>Calculus I</td>
                                        <td>4</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-square-o" aria-hidden="true"></i></td>
                                        <td>ELECTIVE</td>
                                        <td>Humanities/Social Science</td>
                                        <td>3</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-square-o" aria-hidden="true"></i></td>
                                        <td>ELECTIVE</td>
                                        <td>International</td>
                                        <td>3</td>
                                    </tr>
                                    <tr>
                                        <td> </td>
                                        <td> </td>
                                        <td><b>Total Credits</b></td>
                                        <td><b>16</b></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row">
                        <div> 
                            <h3 style="text-align: center">Sophomore Year</h3> 
                        </div>
                        <div class="col-md-6">
                            <h4 style="text-align: center; background-color: gray; color: white">Semester 1</h4>
                            <table class="table bg-white" id="myTable">
                                <thead class="">
                                    <tr>
                                        <th class="table-icon"></th>
                                        <th>Course Number</th>
                                        <th>Course Name</th>
                                        <th>Credits</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><i class="fa fa-square-o" aria-hidden="true"></i></td>
                                        <td>CS 210</td>
                                        <td>Programming Languages</td>
                                        <td>3</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-square-o" aria-hidden="true"></i></td>
                                        <td>MATH 175</td>
                                        <td>Calculus II</td>
                                        <td>4</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-square-o" aria-hidden="true"></i></td>
                                        <td>ELECTIVE</td>
                                        <td>Humanities/Social Science</td>
                                        <td>3</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-square-o" aria-hidden="true"></i></td>
                                        <td>ELECTIVE</td>
                                        <td>Science Elective with Lab</td>
                                        <td>4</td>
                                    </tr>
                                    <tr>
                                        <td> </td>
                                        <td> </td>
                                        <td><b>Total Credits</b></td>
                                        <td><b>14</b></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="col-md-6">
                            <h4 style="text-align: center; background-color: gray; color: white">Semester 2</h4>
                            <table class="table bg-white" id="myTable">
                                <tbody>
                                    <tr>
                                        <td><i class="fa fa-square-o" aria-hidden="true"></i></td>
                                        <td>CS 240</td>
                                        <td>Computer Operating Systems</td>
                                        <td>3</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-square-o" aria-hidden="true"></i></td>
                                        <td>CS 270</td>
                                        <td>System Software</td>
                                        <td>3</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-square-o" aria-hidden="true"></i></td>
                                        <td>STAT 301</td>
                                        <td>Probability and Statistics</td>
                                        <td>3</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-square-o" aria-hidden="true"></i></td>
                                        <td>ELECTIVE</td>
                                        <td>Science Elective with Lab</td>
                                        <td>4</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-square-o" aria-hidden="true"></i></td>
                                        <td>ELECTIVE</td>
                                        <td>Free Elective</td>
                                        <td>3</td>
                                    </tr>
                                    <tr>
                                        <td> </td>
                                        <td> </td>
                                        <td><b>Total Credits</b></td>
                                        <td><b>16</b></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row">
                        <div> 
                            <h3 style="text-align: center">Junior Year</h3> 
                        </div>
                        <div class="col-md-6">
                            <h4 style="text-align: center; background-color: gray; color: white"> Semester 1</h4>
                            <table class="table bg-white" id="myTable">
                                <tbody>
                                    <tr>
                                        <td><i class="fa fa-square-o" aria-hidden="true"></i></td>
                                        <td>CS 385</td>
                                        <td>Theory of Computation</td>
                                        <td>3</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-square-o" aria-hidden="true"></i></td>
                                        <td>CS 383</td>
                                        <td>Software Engineering</td>
                                        <td>4</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-square-o" aria-hidden="true"></i></td>
                                        <td>ELECTIVE</td>
                                        <td>CS Elective 300 or higher</td>
                                        <td>3</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-square-o" aria-hidden="true"></i></td>
                                        <td>MATH 330</td>
                                        <td>Linear Algebra</td>
                                        <td>3</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-square-o" aria-hidden="true"></i></td>
                                        <td>ELECTIVE</td>
                                        <td>Humanities/Social Science</td>
                                        <td>3</td>
                                    </tr>
                                    <tr>
                                        <td> </td>
                                        <td> </td>
                                        <td><b>Total Credits</b></td>
                                        <td><b>16</b></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="col-md-6">
                            <h4 style="text-align: center; background-color: gray; color: white">Semester 2</h4>
                            <table class="table bg-white" id="myTable">
                                <tbody>
                                    <tr>
                                        <td><i class="fa fa-square-o" aria-hidden="true"></i></td>
                                        <td>CS 395</td>
                                        <td>Analysis of Algorithms</td>
                                        <td>3</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-square-o" aria-hidden="true"></i></td>
                                        <td>CS 360</td>
                                        <td>Database Systems</td>
                                        <td>3</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-square-o" aria-hidden="true"></i></td>
                                        <td>ELECTIVE</td>
                                        <td>CS Elective 300 or higher</td>
                                        <td>3</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-square-o" aria-hidden="true"></i></td>
                                        <td>ENGL 317</td>
                                        <td>Technical Writing</td>
                                        <td>3</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-square-o" aria-hidden="true"></i></td>
                                        <td>ELECTIVE</td>
                                        <td>Humanities/Social Science</td>
                                        <td>3</td>
                                    </tr>
                                    <tr>
                                        <td> </td>
                                        <td> </td>
                                        <td><b>Total Credits</b></td>
                                        <td><b>15</b></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row">
                        <div> 
                            <h3 style="text-align: center">Senior Year</h3> 
                        </div>
                        <div class="col-md-6">
                            <h4 style="text-align: center; background-color: gray; color: white"> Semester 1</h4>
                            <table class="table bg-white" id="myTable">
                                <tbody>
                                    <tr>
                                        <td><i class="fa fa-square-o" aria-hidden="true"></i></td>
                                        <td>CS 480</td>
                                        <td>CS Senior Capstone Design I</td>
                                        <td>3</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-square-o" aria-hidden="true"></i></td>
                                        <td>CS 445</td>
                                        <td>Compiler Design</td>
                                        <td>4</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-square-o" aria-hidden="true"></i></td>
                                        <td>ELECTIVE</td>
                                        <td>CS Elective 300 or higher</td>
                                        <td>3</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-square-o" aria-hidden="true"></i></td>
                                        <td>CS 400</td>
                                        <td>Contemporary Issues in Computer Science</td>
                                        <td>3</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-square-o" aria-hidden="true"></i></td>
                                        <td>ELECTIVE</td>
                                        <td>Free Elective</td>
                                        <td>3</td>
                                    </tr>
                                    <tr>
                                        <td> </td>
                                        <td> </td>
                                        <td><b>Total Credits</b></td>
                                        <td><b>16</b></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="col-md-6">
                            <h4 style="text-align: center; background-color: gray; color: white">Semester 2</h4>
                            <table class="table bg-white" id="myTable">
                                <tbody>
                                    <tr>
                                        <td><i class="fa fa-square-o" aria-hidden="true"></i></td>
                                        <td>CS 481</td>
                                        <td>CS Senior Capstone Design II</td>
                                        <td>3</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-square-o" aria-hidden="true"></i></td>
                                        <td>ELECTIVE</td>
                                        <td>CS Elective 300 or higher</td>
                                        <td>3</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-square-o" aria-hidden="true"></i></td>
                                        <td>ELECTIVE</td>
                                        <td>CS Elective 300 or higher</td>
                                        <td>3</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-square-o" aria-hidden="true"></i></td>
                                        <td>ELECTIVE</td>
                                        <td>International</td>
                                        <td>3</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-square-o" aria-hidden="true"></i></td>
                                        <td>ELECTIVE</td>
                                        <td>Free Elective</td>
                                        <td>3</td>
                                    </tr>
                                    <tr>
                                        <td> </td>
                                        <td> </td>
                                        <td><b>Total Credits</b></td>
                                        <td><b>15</b></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <?php
            include('templates/footer.php');
            Footer();
        ?>

        
    </body>  
</html>  

<!-- Tooltip enable script  -->
<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {return new bootstrap.Tooltip(tooltipTriggerEl)})
</script>

