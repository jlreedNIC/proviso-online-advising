<?php

require("php_scripts/db_connection.php");
// query for course table
$con = OpenCon();

// can get all courses req
// can get prereqs of all courses req
// if coursesID is in prereqs, then add path(prereq, course)
// else add path(course)

// query to grab all specified course requirements
$req_courses_qry = "select DegreeID, courses.Course_ID, Course_Name, Department, Course_Num
                    from degree_classes_req
                    join courses on degree_classes_req.Course_ID=courses.Course_ID
                    where DegreeID=1
                    order by Course_Num";
                    // replace!

$req_prereqs_qry = "select dc.Course_Name as dcName, dc.Department as dcDept, dc.Course_Num as dcNum, c.Course_Name as pName, c.Course_Num as pNum, c.Department as pDept
                    from
                    (select DegreeID, courses.Course_ID, Course_Name, Department, Course_Num
                    from degree_classes_req
                    join courses on degree_classes_req.Course_ID=courses.Course_ID
                    where DegreeID=1) as dc
                    join prereq as p on dc.Course_ID=p.Course_ID
                    join courses as c on p.Prereq_ID=c.Course_ID";
                    // replace!

$rs1 = mysqli_query($con, $req_courses_qry);
$rs2 = mysqli_query($con, $req_prereqs_qry);

$size = 0;
while($row = mysqli_fetch_array($rs1, MYSQLI_ASSOC))
{
    $rCourses[$size] = $row;
    $size++;
}

$size = 0;
while($row = mysqli_fetch_array($rs2, MYSQLI_ASSOC))
{
    $rPrereqs[$size] = $row;
    $size++;
}

$i = 0;
$min = 100;
$max = 200;
while($max < 600)
// for($num = 200; $num < 600; $num += 100)
{
    $req_courses = "select Course_Name, Department, Course_Num
                    from degree_classes_req
                    join courses on degree_classes_req.Course_ID=courses.Course_ID
                    where DegreeID=1 and Course_Num < ".$max." and Course_Num > ".$min."
                    order by Course_Num";
    
    $req_prereqs = "select dc.Course_Name as dcName, dc.Department as dcDept, dc.Course_Num as dcNum, c.Course_Name as pName, c.Course_Num as pNum, c.Department as pDept
                    from
                    (select DegreeID, courses.Course_ID, Course_Name, Department, Course_Num
                    from degree_classes_req
                    join courses on degree_classes_req.Course_ID=courses.Course_ID
                    where DegreeID=1) as dc
                    join prereq as p on dc.Course_ID=p.Course_ID
                    join courses as c on p.Prereq_ID=c.Course_ID
                    where dc.Course_Num < ".$max." and dc.Course_Num > ".$min." and c.Course_Num > ".$min;
    
    $courses[$i] = mysqli_query($con, $req_courses);
    $prereqs[$i] = mysqli_query($con, $req_prereqs);

    $i += 1;
    $min += 100;
    $max += 100;
}


$size = 0;
while($row = mysqli_fetch_array($courses[0], MYSQLI_ASSOC))
{
    $freshman_courses[$size] = $row;
    $size++;
}

$size = 0;
while($row = mysqli_fetch_array($prereqs[0], MYSQLI_ASSOC))
{
    $freshman_prereqs[$size] = $row;
    $size++;
}

$size = 0;
while($row = mysqli_fetch_array($courses[1], MYSQLI_ASSOC))
{
    $sophomore_courses[$size] = $row;
    $size++;
}

$size = 0;
$sophomore_prereqs = [];
while($row = mysqli_fetch_array($prereqs[1], MYSQLI_ASSOC))
{
    $sophomore_prereqs[$size] = $row;
    $size++;
}
if($sophomore_prereqs == null) echo "empty";


$size = 0;
while($row = mysqli_fetch_array($courses[2], MYSQLI_ASSOC))
{
    $junior_courses[$size] = $row;
    $size++;
}

$size = 0;
$junior_prereqs = [];
while($row = mysqli_fetch_array($prereqs[2], MYSQLI_ASSOC))
{
    $junior_prereqs[$size] = $row;
    $size++;
}

$size = 0;
while($row = mysqli_fetch_array($courses[3], MYSQLI_ASSOC))
{
    $senior_courses[$size] = $row;
    $size++;
}

$size = 0;
$senior_prereqs = [];
while($row = mysqli_fetch_array($prereqs[3], MYSQLI_ASSOC))
{
    $senior_prereqs[$size] = $row;
    $size++;
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

        <!-- the following script will make graph work on Riley's comp -->
        <!-- <script type="text/javascript" src="flowjs-master/lib/createjs-2015.05.21.min.js"></script>
        <script type="text/javascript" src="flowjs-master/flow.min.js"></script> -->

        <!-- the following script will make graph work on Jordan's comp -->
        <script type="text/javascript" src="flowjs/lib/createjs-2015.05.21.min.js"></script>
        <script type="text/javascript" src="flowjs/flow.min.js"></script>

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
            NameHeader("Jane Doe");
        ?>


        <header style="padding:80px; text-align: center;">
            <h1>
                Sample Course Timeline
            </h1>
            <hr style="border: 1px solid black;">
        </header>

        <div class="container-fluid" style="width:80%">
            <a href="degree_overview.php">Back to Degree Overview</a>
        </div>
        
        <div class="container-fluid" style="width:80%">
            <div class="card my-card shadow p-3 mb-5 bg-white rounded">
                <div class="card-body">
                    <div> <h2>Four Year Plan</h2> </div>
                        <canvas id="allyears" width="1200" height="600"></canvas>
                </div>
            </div>
        </div>

        <div class="container-fluid" style="width:80%">
            <div class="card my-card shadow p-3 mb-5 bg-white rounded">
                <div class="card-body">
                    <div> <h2>Four Year Plan - Iframe testing</h2> </div>
                        <iframe src="gojs/release/sample_course_plan.php"  height="800" style="width:100%" title="Iframe Example"></iframe>
                </div>
            </div>
        </div>

        <div class="container-fluid" style="width:80%">
            <div class="card my-card shadow p-3 mb-5 bg-white rounded">
                <div class="card-body">
                    <!-- <div class="row"> -->
                        <div> <h2>Freshman Year</h2> </div>
                            <canvas id="freshman" width="1200" height="300"></canvas>
                    <!-- </div> -->

                    <div class="row">
                        <div> <h2>Sophomore Year</h2> </div>
                        <div class="col-md-6">
                            <h4> Fall</h4>
                            <canvas id="sfall" width="500" height="300">
                            </canvas>
                        </div>

                        <div class="col-md-6">
                            <h4> Spring</h4>
                            <canvas id="sspring" width="500" height="300">
                            </canvas>
                        </div>
                    </div>

                    <div class="row">
                        <div> <h2>Junior Year</h2> </div>
                        <div class="col-md-6">
                            <h4> Fall</h4>
                            <canvas id="jfall" width="500" height="300">
                            </canvas>
                        </div>

                        <div class="col-md-6">
                            <h4> Spring</h4>
                            <canvas id="jspring" width="500" height="300">
                            </canvas>
                        </div>
                    </div>

                    <div class="row">
                        <div> <h2>Senior Year</h2> </div>
                        <div class="col-md-6">
                            <h4> Fall</h4>
                            <canvas id="srfall" width="500" height="300">
                            </canvas>
                        </div>

                        <div class="col-md-6">
                            <h4> Spring</h4>
                            <canvas id="srspring" width="500" height="300">
                            </canvas>
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

<script>
    // $courses $prereqs
    var courseArray = <?php echo json_encode($freshman_courses); ?>;
    var prereqArray = <?php echo json_encode($freshman_prereqs); ?>;

    var g = new flowjs.DiGraph();
    
    i=0;
    for(i=0; i<courseArray.length; i++)
    {
        g.addPaths([ [courseArray[i]['Department'] + courseArray[i]['Course_Num']] ]);
    }
    
    if(prereqArray != undefined)
    {
        for(i=0; i<prereqArray.length; i++)
        {
            g.addPaths([
                [prereqArray[i]['pDept'] + prereqArray[i]['pNum'], prereqArray[i]['dcDept'] + prereqArray[i]['dcNum'], "Sophomore"]
            ]);
        }
    }

    var courseArray = <?php echo json_encode($sophomore_courses); ?>;
    var prereqArray = <?php echo json_encode($sophomore_prereqs); ?>;
    
    if(prereqArray.length > 0)
    {
        g.addPaths([ [ "testing2"] ]);
        for(i=0; i<prereqArray.length; i++)
        {
            g.addPaths([
                [ "Sophomore", prereqArray[i]['pDept'] + prereqArray[i]['pNum'], prereqArray[i]['dcDept'] + prereqArray[i]['dcNum'], "Junior"]
            ]);
        }
    }
    else
    {
        for(i=0; i<courseArray.length; i++)
        {
            g.addPaths([ [ "Sophomore", courseArray[i]['Department'] + courseArray[i]['Course_Num'], "Junior"] ]);
        }
    }

    var courseArray = <?php echo json_encode($junior_courses); ?>;
    var prereqArray = <?php echo json_encode($junior_prereqs); ?>;
    
    if(prereqArray.length > 0)
    {
        for(i=0; i<prereqArray.length; i++)
        {
            g.addPaths([
                [ "Junior", prereqArray[i]['pDept'] + prereqArray[i]['pNum'], prereqArray[i]['dcDept'] + prereqArray[i]['dcNum'], "Senior"]
            ]);
        }
        for(i=0; i<courseArray.length; i++)
        {
            if(g.getNode(courseArray[i]['Department'] + courseArray[i]['Course_Num']) == null)
            {
                g.addPaths([ [ "Junior", courseArray[i]['Department'] + courseArray[i]['Course_Num'], "Senior"] ]);
            }
        }
    }
    else
    {
        for(i=0; i<courseArray.length; i++)
        {
            g.addPaths([ [ "Junior", courseArray[i]['Department'] + courseArray[i]['Course_Num'], "Senior"] ]);
        }
    }

    var courseArray = <?php echo json_encode($senior_courses); ?>;
    var prereqArray = <?php echo json_encode($senior_prereqs); ?>;
    
    if(prereqArray.length > 0)
    {
        g.addPaths([ [ "testing2"] ]);
        for(i=0; i<prereqArray.length; i++)
        {
            g.addPaths([
                [ "Senior", prereqArray[i]['pDept'] + prereqArray[i]['pNum'], prereqArray[i]['dcDept'] + prereqArray[i]['dcNum']]
            ]);
        }
    }
    else
    {
        for(i=0; i<courseArray.length; i++)
        {
            g.addPaths([ [ "Senior", courseArray[i]['Department'] + courseArray[i]['Course_Num']] ]);
        }
    }
    

    new flowjs.DiFlowChart("freshman", g).draw();

    // all courses with no breakup
    var courseArray = <?php echo json_encode($rCourses); ?>;
    var prereqArray = <?php echo json_encode($rPrereqs); ?>;
    var a = new flowjs.DiGraph();
    for(i=0; i<courseArray.length; i++)
    {
        a.addPaths([ [courseArray[i]['Department'] + courseArray[i]['Course_Num']] ]);
    }
    for(i=0; i<prereqArray.length; i++)
    {
        a.addPaths([
            [prereqArray[i]['pDept'] + prereqArray[i]['pNum'], prereqArray[i]['dcDept'] + prereqArray[i]['dcNum']]
        ]);
    }
    
    new flowjs.DiFlowChart("allyears", a).draw();

</script>