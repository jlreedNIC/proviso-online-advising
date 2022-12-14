<?php

session_start();
if(!isset($_SESSION['userName']))
{
    header("Location: login.php");
    exit();
}

// require("php_scripts/db_connection.php");
require("php_scripts/course_mapper_queries.php");
// query for course table
$con = OpenCon();

// get current career choice of student
$qry = "SELECT Position_Name, Company, Pay, Des, firstName, lastName
        from user_career 
        join careers on user_career.Career_ID=careers.CareerID
        join students on students.userID=user_career.User_ID
        where User_ID=".$_SESSION['userID']."";

$rs = mysqli_query($con, $qry);

$size = 0;
while($row = mysqli_fetch_array($rs, MYSQLI_ASSOC))
{
    $data[$size] = $row;
    $size++;
}

// select skills required by career
$qry = "select Skill_Name
        from user_career
        join careers_req_skills on user_career.Career_ID=careers_req_skills.Career_ID
        join skills on careers_req_skills.Skill_ID=skills.Skill_ID
        where user_career.User_ID = ".$_SESSION['userID']."";

$rs = mysqli_query($con, $qry);

$size = 0;
while($row = mysqli_fetch_array($rs, MYSQLI_ASSOC))
{
    $skills[$size] = $row;
    $size++;
}

// select courses and relevant skills to map skills to career
$qry = "SELECT courses.Course_Name, courses.Course_Num, courses.Department, courses.Credits, skills.Skill_Name
        from user_career
        join careers_req_skills on careers_req_skills.Career_ID=user_career.Career_ID
        join course_skills on careers_req_skills.Skill_ID=course_skills.Skill_ID
        join courses on courses.Course_ID=course_skills.Course_ID
        join skills on course_skills.Skill_ID=skills.Skill_ID
        where user_career.User_ID=".$_SESSION['userID']."
        order by courses.Department, courses.Course_Num";

$rs = mysqli_query($con, $qry);

$size = 0;
while($row = mysqli_fetch_array($rs, MYSQLI_ASSOC))
{
    $courses[$size] = $row;
    $size++;
}

// put courses into array with associated skills in list in array
// push first course and skill
$temp[0]['Course_Name'] = $courses[0]['Course_Name'];
$temp[0]['Course_Num'] = $courses[0]['Course_Num'];
$temp[0]['Department'] = $courses[0]['Department'];
$temp[0]['Credits'] = $courses[0]['Credits'];
$temp[0]['Skills'] = [$courses[0]['Skill_Name']];

$j = 0;
for($i=1; $i<$size; $i++)
{
    if($courses[$i]['Course_Name'] != $courses[$i-1]['Course_Name'])
    {
        $j++;
        $temp[$j]['Course_Name'] = $courses[$i]['Course_Name'];
        $temp[$j]['Course_Num'] = $courses[$i]['Course_Num'];
        $temp[$j]['Department'] = $courses[$i]['Department'];
        $temp[$j]['Credits'] = $courses[$i]['Credits'];
        $temp[$j]['Skills'] = array();
        array_push($temp[$j]['Skills'], $courses[$i]['Skill_Name']);
        
    }
    else
    {
        array_push($temp[$j]['Skills'], $courses[$i]['Skill_Name']);
    }
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

        <script type = "text/javascript" src="gojs/release/go.js"></script>

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

    <body onload = "goIntro()">  
        <?php 
            include("templates/navbar.php");
            include("templates/header.php");
            Navbar("course_mapper");
            NameHeader($_SESSION['firstName']." ".$_SESSION['lastName']);
        ?>


        <header style="padding:80px; text-align: center;">
            <h1>
                Course Mapper
            </h1>
            <hr style="border: 1px solid black;">
        </header>
        
        <!-- job info  -->
        <div class="container-fluid" style="width:80%">
            <div class="card my-card shadow p-3 mb-5 bg-white rounded">
                <div class="card-body">
                    <h2><?php echo $data[0]['Position_Name']." - ".$data[0]['Company'];?></h2>
                </div>

                <div class="card-body">
                    <p>
                        Estimated Annual Salary: <?php echo $data[0]['Pay'];?>
                    </p>
                </div>
            </div>
        </div>

        <!-- job requirements and skills  -->
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
                                    for($i=0; $i<count($skills); $i++)
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

        <!-- recommended courses  -->
        <div class="container-fluid" style="width: 80%">
            <div class="card my-card shadow p-3 mb-5 bg-white rounded">
                <div class="card-body">
                    <h2>Recommended Courses from Skills</h2>
                    <div class="row">
                        
                        <div  style="text-align: right">
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
                                for($i=0; $i<count($temp); $i++)
                                {
			                ?>
                            <tr>
                                <td><i class="fa fa-check-square-o" aria-hidden="true"></i></td>
                                <td><?php echo $temp[$i]['Department']." ".$temp[$i]['Course_Num'];?></td>
                                <td><?php echo $temp[$i]['Course_Name']." (".$temp[$i]['Credits'].")";?></td>
                                <td>
                                    <?php
                                    for($j=0; $j<count($temp[$i]['Skills']); $j++)
                                    {
                                        ?>

                                        <span class="badge badge-info" style="background-color:black">
                                        <?php echo $temp[$i]['Skills'][$j]; ?>
                                        </span>

                                        <?php
                                    }
                                    ?>

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

        <!-- course tree  -->
        <div class="container-fluid" style="width:80%">
            <div class="card my-card shadow p-3 mb-5 bg-white rounded">
                <div class="card-body">
                    <h2>Course Status Graph</h2>
                </div>

                <div class="card-body">

                    <h5>Legend:
                        <span class="badge badge-info" style="background-color: gray; color: black">Course Not Available</span>
                        <span class="badge badge-info" style="background-color: aquamarine; color: black">Course Available</span>
                        <span class="badge badge-info" style="background-color: green; color: black">Course Completed</span> 
                        <span class="badge badge-info" style="background-color: deepskyblue; color: black">Course Recommended by Career</span> |
                        
                        <span class="badge badge-info" style="background-color: lightgray; color: black">Grade Not Available</span>
                        <span class="badge badge-info" style="background-color: lightskyblue; color: black">Grade Available</span>
                        <span class="badge badge-info" style="background-color: palegreen; color: black">Grade Completed</span>
                        <span class="badge badge-info" style="background-color: salmon; color: black">Grade Behind</span>
                        
                    </h5>

                    <div id ="myDiagramDiv" class="container-fluid" style = "border: solid 1px black; height:700px"></div>
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

<script type = "text/javascript">
    function goIntro(){
        var $ = go.GraphObject.make; 
        
        var diagram = new go.Diagram("myDiagramDiv");
        diagram.initialContentAlignment = go.Spot.Center; 
        
        diagram.nodeTemplate =
            $(go.Node, go.Panel.Auto,
                $(go.Shape,
                { figure: "RoundedRectangle"},
                new go.Binding("figure", "fig"),
                
                new go.Binding("fill", "color")),
                
                $(go.TextBlock,
                { margin: 5 },
                
                new go.Binding("text", "key"))
            ); 
            
        diagram.groupTemplate =
        $(go.Group, "Vertical", 
            $(go.Panel, "Auto",
            $(go.Shape, "RoundedRectangle",  // surrounds the Placeholder
                { parameter1: 14 },
                new go.Binding("fill", "color")),
            $(go.Placeholder,    // represents the area of all member parts,
                { padding: 5})  // with some extra padding around them
            ),
            $(go.TextBlock,         // group title
            {font: "Bold 12pt Sans-Serif" },
            new go.Binding("text", "key"))
        );
        
        
        diagram.layout = $(go.LayeredDigraphLayout,
            {
                direction: 90,
            }
        );

        var courses_master_list = <?php echo json_encode($courses_master_list); ?>;
        var prereqs_req = <?php echo json_encode($prereqs_req); ?>;
        var userGrade = <?php echo json_encode($_SESSION['grade']); ?>;

        var nodeDataArray = [];
        var linkDataArray = [];

        // colors
        completed_group = "palegreen";
        behind_group = "salmon";
        blank_group = "lightgray";
        avail_group = "lightskyblue";

        // load all courses

        temp_figure = "RoundedRectangle";
        for(i=0; i<courses_master_list.length; i++)
        {
            
            // if(courses_master_list[i]['group'] == "Freshman") temp_figure = "RoundedRectangle";
            // else if(courses_master_list[i]['group'] == "Sophomore") temp_figure = "Ellipse";
            // else if(courses_master_list[i]['group'] == "Junior") temp_figure = "Rectangle";
            // else if(courses_master_list[i]['group'] == "Senior") temp_figure = "Diamond";
            // else temp_figure = "RoundedRectangle";
            console.log("figure: " + temp_figure);

            nodeDataArray.push({ key: courses_master_list[i]['Department'] + " " + courses_master_list[i]['Course_Num'], 
                                color: courses_master_list[i]['color'], fig: temp_figure, group: courses_master_list[i]['group']});
        }

        

        // load all prereqs

        for(i=0; i<prereqs_req.length; i++)
        {
            prenum = Math.floor(prereqs_req[i]['preNum'] / 100);
            num = Math.floor(prereqs_req[i]['num'] / 100);
            console.log("prenum: " + prenum + " num: " + num);
            if(prenum == num)
            {
                linkDataArray.push({from: prereqs_req[i]['preDept'] + " " + prereqs_req[i]['preNum'], 
                                to: prereqs_req[i]['dept'] + " " + prereqs_req[i]['num']});
            }
            
        }
        linkDataArray.push( {from: "Freshman", to: "Sophomore"} );
        linkDataArray.push( {from: "Sophomore", to: "Junior"} );
        linkDataArray.push( {from: "Junior", to: "Senior"} );

        // check if all grade level courses are done
        grades = [["Freshman",true, "lightgray"], ["Sophomore", true, "lightgray"], ["Junior", true, "lightgray"], ["Senior", true, "lightgray"]];
        
        freshDone = true;
        sophDone = true;
        junDone = true;
        senDone=true;
        for(i=0; i<nodeDataArray.length; i++)
        {
            for(j=0; j<4; j++)
            {
                if(nodeDataArray[i]['group'] == grades[j][0] && nodeDataArray[i]['color'] != "green")
                {
                    grades[j][1] = false;
                }
            }
        }
        console.log(grades);

        gradeIndex = 0;
        console.log("grade user is at: " + userGrade);

        for(i=0; i<4; i++)
        {
            console.log("grades[i][0] " + grades[i][0]);
            var boolean = grades[i][0] == userGrade;
            console.log("boolean: " + boolean);
            if(grades[i][0] == userGrade) gradeIndex = i;
            if(grades[i][1] == false) // all classes in group are not done
            {
                grades[i][2] = avail_group;
                
                for(j=i+1; j<4; j++)
                {
                    grades[j][2] = blank_group;
                }
                // continue;
            }
            else
            {
                grades[i][2] = completed_group;
            }
        }
        console.log("grade found at index: " + gradeIndex);

        for(i=0; i<gradeIndex; i++)
        {
            console.log("grade: " + grades[i][0] + " == " + userGrade);
            if(grades[i][0] != userGrade && grades[i][1] == false)
            {
                grades[i][2] = behind_group;
            }
        }
        for(i=gradeIndex+1; i<4; i++)
        {
            grades[i][2] = blank_group;
        }
        console.log(grades);

        for(i=0; i<4; i++)
        {
            nodeDataArray.push({key: grades[i][0], isGroup: true, color: grades[i][2]});
        }
        


        
        diagram.model = new go.GraphLinksModel(nodeDataArray, linkDataArray); 

        
    }
</script>