<?php

require("php_scripts/db_connection.php");
// query for course table
$con = OpenCon();
$qry = "select Position_Name, Company, Pay, Des, firstName, lastName
        from user_career 
        join careers on user_career.Career_ID=careers.CareerID
        join students on students.userID=user_career.User_ID
        where User_Career_ID=1";

$rs = mysqli_query($con, $qry);

$size = 0;
while($row = mysqli_fetch_array($rs, MYSQLI_ASSOC))
{
    $data[$size] = $row;
    $size++;
}

$qry = "select Skill_Name
        from user_career
        join careers_req_skills on user_career.Career_ID=careers_req_skills.Career_ID
        join skills on careers_req_skills.Skill_ID=skills.Skill_ID
        where user_career.User_ID = 1";

$rs = mysqli_query($con, $qry);

$size = 0;
while($row = mysqli_fetch_array($rs, MYSQLI_ASSOC))
{
    $skills[$size] = $row;
    $size++;
}

CloseCon($con);

?>

<!DOCTYPE html>  
<html>  
    <head>  
        <title>Course Mapper</title>
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
        <?php 
            include("templates/navbar.php");
            include("templates/header.php");
            Navbar("course_mapper");
            $fullName = $data[0]['firstName']." ".$data[0]['lastName'];
            NameHeader($fullName);
        ?>


        <header style="padding:80px; text-align: center;">
            <h1>
                Course Mapper
            </h1>
            <hr style="border: 1px solid black;">
        </header>
        
        
        <div class="container-fluid" style="width:80%">
            <a href="#"> Change Career Goal</a>
            <div class="card my-card shadow p-3 mb-5 bg-white rounded">
                <div class="card-body">
                    <h2><?php echo $data[0]['Position_Name'];?></h2>
                </div>

                <div class="card-body">
                    <p>
                        Company: <?php echo $data[0]['Company'];?><br>
                        Pay: <?php echo $data[0]['Pay'];?>
                    </p>
                </div>
            </div>
        </div>

        <div class="container-fluid" style="width:80%">
            <div class="card my-card shadow p-3 mb-5 bg-white rounded">
                <div class="card-body">
                    <h2>Job Requirements</h2>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card my-card">
                                <div class="card-body">
                                    <h3>Job Description</h3>
                                </div>
                                <div class="card-body">
                                    <?php echo $data[0]['Des']; ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card my-card">
                                <div class="card-body">
                                    <h3>Skills</h3>
                                </div>

                                <div class="card-body">
                                    <?php 
                                    for($i=0; $i<$size; $i++)
                                    {
                                        ?>

                                        <span class="badge badge-info" style="background-color:black">
                                        <?php echo $skills[$i]['Skill_Name'];?>
                                        </span>
                                        
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid" style="width: 80%">
            <div class="card my-card shadow p-3 mb-5 bg-white rounded">
                <div class="card-body">
                    <h2>Job Requirements</h2>
                    <div class="row">
                        <div class="col-md-6">
                            Legend:
                            <i class="fa fa-square-o" aria-hidden="true"></i> Not Completed
                            <i class="fa fa-check-square-o" aria-hidden="true"></i> Completed
                            <i class="fa fa-plus-square-o" aria-hidden="true"></i> Added by Career Goal
                        </div>
                        <div class="col-md-6" style="text-align: right">
                            <a href="suggested_course_plan.php">Suggested Course Plan</a>
                        </div>
                    </div>
						
                    <table class="table bg-white" id="myTable">
                        <thead class="bg-dark text-light">
                            <tr>
                                <th class="table-icon"></th>
                                <th>Course Number</th>
                                <th>Course Name</th>
                                <th class="table-skills">Skills</th>
                            
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                // LOOP TILL END OF DATA
                                // while($rows=$result->fetch_assoc())
                                for($i=0; $i<$size; $i++)
                                {
			                ?>
                            <tr>
                                <td><i class="fa fa-check-square-o" aria-hidden="true"></i></td>
                                <td><?php echo $data[$i]['Department']." ".$data[$i]['Course_Num'];?></td>
                                <td><?php echo $data[$i]['Course_Name']." (".$data[$i]['Credits'].")";?></td>
                                <td>
                                    <span class="badge badge-info" style="background-color:black">
                                        <?php echo 'skills';?>
                                    </span>
                                </td>

                            </tr>
		                    <?php
				                }
		                    ?>	
                        </tbody>
                    </table>
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

