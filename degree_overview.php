<?php


require("php_scripts/db_connection.php");
$con = OpenCon(); // open connection to database

$sql = " SELECT * FROM student_take";
$sqll= " SELECT * FROM degree,careers";

$result = mysqli_query($con, $sql);
$answer = mysqli_query($con, $sqll);


//require("php_scripts/db_connection.php");
// query for course table

// $con = OpenCon();
$qry = "select * from courses
        
        order by Course_Num";
        // join skills  on Skill_ID=Skills_ID
$rs = mysqli_query($con, $qry);

$size = 0;
while($row = mysqli_fetch_array($rs, MYSQLI_ASSOC))
{
    $data[$size] = $row;
    $size++;
}

// query for graph
$qry = "select prereq.Prereq_ID, p.Department as pdept, p.Course_Num as pnum, p.Course_Name as pname, p.Credits as pcred, 
        prereq.Course_ID, c.Department, c.Course_Num, c.Course_Name, c.Credits
        from prereq 
        join courses as p on prereq.Prereq_ID=p.Course_ID
        join courses as c on prereq.Course_ID=c.Course_ID";

$rs = mysqli_query($con, $qry);

$gSize = 0;
while($row = mysqli_fetch_array($rs, MYSQLI_ASSOC))
{
    $graph[$gSize] = $row;
    $gSize++;
}
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

        <!-- flowchart -->
        <!-- <script src="https://www.cssscript.com/demo/dynamic-flow-chart-library-with-createjs-flowjs/lib/createjs-2015.05.21.min.js"></script>
        <script src="https://www.cssscript.com/demo/dynamic-flow-chart-library-with-createjs-flowjs/src/flow.js"></script>
        <script src="https://www.cssscript.com/demo/dynamic-flow-chart-library-with-createjs-flowjs/src/flowitem.js"></script>
        <script src="https://www.cssscript.com/demo/dynamic-flow-chart-library-with-createjs-flowjs/src/flowconnector.js"></script> -->

        <!-- the following script will make graph work on Riley's comp -->
        <script type="text/javascript" src="flowjs-master/lib/createjs-2015.05.21.min.js"></script>
        <script type="text/javascript" src="flowjs-master/flow.min.js"></script>

        <!-- the following script will make graph work on Jordan's comp -->
        <script type="text/javascript" src="flowjs/lib/createjs-2015.05.21.min.js"></script>
        <script type="text/javascript" src="flowjs/flow.min.js"></script>

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
            Navbar("degree");
            NameHeader("Jane Doe");
        ?>


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
				// LOOP TILL END OF DAT
				while ($rows = mysqli_fetch_array($answer, MYSQLI_ASSOC))
				{

			?>
			<h2><?php echo $rows['Name'];?></h2>
			 Career Goal: <span style="font-size: x-large"><?php echo $rows['Position_Name'];?></a><br>
			  Credits: 128/132
			<?php
				}
		
			?>	
                </div>
            </div>
        </div>

        <div class="container-fluid" style="width: 80%">
            <div class="card my-card shadow p-3 mb-5 bg-white rounded">
                <div class="card-body">
                    <h2>Courses</h2>
                    <div class="row">
                        <div class="col-md-6">
                            Legend:
                            <!--<i class="fa fa-square-o" aria-hidden="true"></i> Not Completed -->
                            <i class="fa fa-check-square-o" aria-hidden="true"></i> Completed
                            <!--<i class="fa fa-plus-square-o" aria-hidden="true"></i> Added by Career Goal -->
                        </div>
                        <div class="col-md-6" style="text-align: right">
                          <h3>  <a href="suggested_course_plan.php">Suggested Course Plan</a></h3>
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
                                    <?php echo $data[$i]['Skill_Name']?>
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

        <!-- <div class="container-fluid" style="width:80%">
            <div class="card my-card shadow p-3 mb-5 bg-white rounded">
                <div class="card-body">
                    <h2> Sample Course Layout</h2>
                    <canvas id="demo" width="500" height="300">
                    </canvas>
                  
                </div>
            </div>
        </div> -->



        <div class="container-fluid" style="width:80%">
            <div class="card my-card shadow p-3 mb-5 bg-white rounded">
                <div class="card-body">
                    <h2> Full Degree</h2>
                    <canvas id="demo" width="100" height="50"></canvas>
        
                    <iframe src="gojs/release/DM.html"  height="800" style="width:100%" title="Iframe Example"></iframe>
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

<script>
    // query for each class
    //
    // query what that class is a prereq of
    // start building chart

    // var e = [
    //     [{id: "CS 121", next: ["CS 210", "CS 240", "CS 270"]}], //{id: "z1", empty: true, next: undefined}, {id: "z1", empty: true, next: undefined}],
    //     [{id: "CS 210", next: ["CS 383"]}, {id: "CS 240", next: ["CS 383"]},  {id: "CS 270", next: ["CS 383"]}],
    //     [{id: "CS 383", next: undefined}]//, {id: "Software Engineering", next: undefined}, {{id: "z3", empty: true, next: undefined}],
    // ];

    // new flowjs("demo", d).draw();
    // new flowjs("demo", e).draw();

    // var passedArray = <?php //echo json_encode($graph); ?>;

    // var g = new flowjs.DiGraph();
    // for(i=0; i<passedArray.length; i++)
    // {
    //     g.addPaths([
    //         [passedArray[i]['pnum'], passedArray[i]['Course_Num']]
    //     ]);
    // }
    // new flowjs.DiFlowChart("demo", g).draw();


</script>