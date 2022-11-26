<?php 

require("../../php_scripts/db_connection.php");
$con = OpenCon();

$qry = "SELECT courses.Course_ID, Course_Name, Department, Course_Num
        from degree_classes_req
        join user_degree on user_degree.DegreeID=degree_classes_req.DegreeID
        join courses on degree_classes_req.Course_ID=courses.Course_ID
        where user_degree.userID = 1";

$rs = mysqli_query($con, $qry);

$size = 0;
while($row = mysqli_fetch_array($rs, MYSQLI_ASSOC))
{
    $courses_req[$size] = $row;
    $size++;
}

for($i=0; $i<$size; $i++)
{
    $qry = "SELECT courses.Course_ID, Course_Name, Department, Course_Num
            FROM prereq
            JOIN courses on prereq.Prereq_ID=courses.Course_ID
            where prereq.Course_ID = ".$courses_req[$i]['Course_ID']."";
    
    $rs = mysqli_query($con, $qry);

    $prereqSize = 0;
    while($row = mysqli_fetch_array($rs, MYSQLI_ASSOC))
    {
        $prereqs_req[$i][$prereqSize] = $row;
        $prereqSize++;
    }
}

// find categories required for degree
$category_queries = "SELECT degree_categories.CategoryID, degree_categories.Category, degree_category_req.CreditsReq
                    from user_degree 
                    join degree_category_req on user_degree.DegreeID=degree_category_req.DegreeID
                    join degree_categories on degree_categories.CategoryID=degree_category_req.CategoryID
                    where user_degree.userID=1";

$rs1 = mysqli_query($con, $category_queries);

$size = 0;
while($row = mysqli_fetch_array($rs1, MYSQLI_ASSOC))
{
    $categories[$size] = $row;
    $size++;
}

// find courses accepted in each category
for($i=0; $i<$size; $i++)
{
    $courses_in_categories = "SELECT courses.Course_ID, courses.Course_Name, courses.Department, courses.Course_Num, courses.Credits
                        from degree_category_accepted_courses
                        join courses on courses.Course_ID=degree_category_accepted_courses.Accepted_Courses
                        where CategoryID = ".$categories[$i]['CategoryID']."";
    
    $rs1 = mysqli_query($con, $courses_in_categories);
    $courseSize = 0;
    while($row = mysqli_fetch_array($rs1, MYSQLI_ASSOC))
    {
        $courses[$i][$courseSize] = $row;
        $courseSize++;
    }
}


// print_r($courses_req);
// echo "<br><br>";
// print_r($prereqs_req);
// echo "<br><br>";

// query to grab all specified course requirements
$req_courses_qry = "select DegreeID, courses.Course_ID, Course_Name, Department, Course_Num
                    from degree_classes_req
                    join courses on degree_classes_req.Course_ID=courses.Course_ID
                    where DegreeID=1
                    order by Course_Num";

$req_prereqs_qry = "select dc.Course_Name as dcName, dc.Department as dcDept, dc.Course_Num as dcNum, c.Course_Name as pName, c.Course_Num as pNum, c.Department as pDept
                    from
                    (select DegreeID, courses.Course_ID, Course_Name, Department, Course_Num
                    from degree_classes_req
                    join courses on degree_classes_req.Course_ID=courses.Course_ID
                    where DegreeID=1) as dc
                    join prereq as p on dc.Course_ID=p.Course_ID
                    join courses as c on p.Prereq_ID=c.Course_ID";

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

CloseCon($con);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>University Departments and Colleges Chart | MindFusion JavaScript Diagram</title>
        <script type = "text/javascript" src="go.js"></script>
    </head>

<body onload = "goIntro()">

    <p id="test">test here:</p>

    <div id ="myDiagramDiv" style = "border: solid 1px black; 
    width:1320px; height:900px"></div>

</body>

<script>
    function goIntro(){
        var $ = go.GraphObject.make; 
        
        var diagram = new go.Diagram("myDiagramDiv");
        diagram.initialContentAlignment = go.Spot.Center; 
        
        
        diagram.nodeTemplate =
    $(go.Node, go.Panel.Auto,
        $(go.Shape,
        { figure: "RoundedRectangle"},
        
        new go.Binding("fill", "color")),
        
        $(go.TextBlock,
        { margin: 5 },
        
        new go.Binding("text", "key"))
        ); 
        
        
        diagram.layout = $(go.LayeredDigraphLayout,
        {
            direction: 90,
        }
        
        
        );

        var courses_req = <?php echo json_encode($courses_req); ?>;
        var prereqs_req = <?php echo json_encode($prereqs_req); ?>;

        // load required courses
        // load prereqs if not in list
        //     make path for prereqs

        // load courses recommended from career goal
        //    get prereqs for courses and prereqs until no more
        //    these courses will be blue

        // query for have taken
        //    turn those classes green
        //    make next class yellow

        // functions to find if a key is in the list already
        function checkForKey(arrayVal) // nodeDataArray
        {
            return arrayVal['key'] == this;
        }
        function checkForToClass(arrayVal) // linkDataArray
        {
            return arrayVal['to'] == this;
        }
        function checkForToFromPath(arrayVal) // linkDataArray
        {
            return (arrayVal['from'] == this['from']) && (arrayVal['to'] == this['to']);
        }

        var nodeDataArray = [];
        var linkDataArray = [];

        // load all required courses

        for(i=0; i<courses_req.length; i++)
        {
            // add all required courses
            nodeDataArray.push({key: courses_req[i]['Department'] + " " + courses_req[i]['Course_Num'], color: "gray"});
        }

        console.log("finished courses, starting prereqs");

        // -------------------------------------------------------------

        // load all prereqs and start making connections
        for(i=0; i<courses_req.length; i++)   // check each course
        {
            if(prereqs_req[i] != null) // make sure prereq list for each course is not empty
            {
                for(j=0; j<prereqs_req[i].length; j++) // check each prereq for the course
                {
                    // if prereq not in list, add it
                    if(nodeDataArray.findIndex(checkForKey, prereqs_req[i][j]['Department'] + " " + prereqs_req[i][j]['Course_Num']) == -1)
                    {
                        nodeDataArray.push({key: prereqs_req[i][j]['Department'] + " " + prereqs_req[i][j]['Course_Num'], color: "gray"});
                    }

                    // if prereq-course not in paths, add it
                    prereq = prereqs_req[i][j]['Department'] + " " + prereqs_req[i][j]['Course_Num'];
                    course = courses_req[i]['Department'] + " " + courses_req[i]['Course_Num'];

                    index = linkDataArray.findIndex( checkForToFromPath, {from: prereq, to: course} );
                    if(index == -1)
                    {
                        // add path
                        linkDataArray.push({from: prereq, to: course});
                    }
                }
            }
        }

        // ---------------------------------------------------------------

        // load career suggested courses

        // ---------------------------------------------------------------

        // load career suggested course prereqs

        // ---------------------------------------------------------------

        // load will take classes

        // ---------------------------------------------------------------

        // turn all classes with no prereqs yellow, for able to take
        for(i=0; i<nodeDataArray.length; i++)
        {
            index = linkDataArray.findIndex(checkForToClass, nodeDataArray[i]['key']);
            if(index == -1) // class not found to have a prereq
            {
                nodeDataArray[i]['color'] = "pink";
            }
        }

        // --------------------------------------------------------

        // turn all taken classes green
        index = nodeDataArray.findIndex(checkForKey, "CS 120");
        // console.log("finding cs120: " + index);
        nodeDataArray[index]['color'] = "lightgreen";

        index = nodeDataArray.findIndex(checkForKey, "CS 121");
        // console.log("finding cs121: " + index);
        nodeDataArray[index]['color'] = "lightgreen";

        // -------------------------------------------------------

        // turn all 'next' classes yellow for able to take
        for(i=0; i<nodeDataArray.length; i++)
        {
            // console.log("loop i: " + i);
            // console.log("current course color: " + nodeDataArray[i]['color']);
            if(nodeDataArray[i]['color'] == "lightgreen") // course was completed
            {
                // console.log("found completed class at i: " + i + " " + nodeDataArray[i]['key']);
                // find index of all classes that the course is a prereq for

                // for each value in path array, if from == course, find index of to class in data array
                for(j=0; j<linkDataArray.length; j++)
                {
                    if(linkDataArray[j]['from'] == nodeDataArray[i]['key'])
                    {
                        // find index of 'to' class and change color
                        index = nodeDataArray.find(checkForKey, linkDataArray[j]['to']);
                        // console.log("next class color: " + index['color']);
                        if(index['color'] != "lightgreen")
                        {
                            index['color'] = "pink";
                        }
                    }
                }
            }
        }
        

        
        diagram.model = new go.GraphLinksModel(nodeDataArray, linkDataArray); 
    }
</script>

</html>
