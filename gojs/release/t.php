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

//No Idea why I need this, but I assume an empty array needs to be initialized in php. 
$data = array();


//-----query 1----- skills table
$users = $mysqli->query("SELECT * FROM  skills 
JOIN job1_skills ON job1_skills.job1_skill_ID =skills.Skill_ID
");
$dataa = array();

while ($resultt = $users->fetch_assoc())
{
$roww = array (
    "key" => $resultt['Skill_Name'],
);

array_push($dataa, $roww);
}

//echo json_encode($dataa);


//-----query 2----- job1 table
$job1 = $mysqli->query("SELECT * FROM job1
where job1_ID = 1
");
$data3 = array();

while ($result3 = $job1->fetch_assoc())
{
$row3 = array (
    "key" => $result3['Pos2'],
);

$row4 = array (
    
	"key" => $result3['Des2']
);

$row5 = array (
    
	"key" => $result3['Pos3']
);

$row6 = array (
    
	"key" => $result3['Des3']
);

$row7 = array (
    
	"key" => $result3['Pos1']
);

array_push($data3, $row3);
array_push($data3, $row4);
array_push($data3, $row5);
array_push($data3, $row6);
array_push($data3, $row7);
}

//echo json_encode($data3);


//----query 3---- all tables for linking to array. 
$my = $mysqli->query("SELECT * FROM skills,job1
where job1_ID = 1
");
$dat = array();

while ($res = $my->fetch_assoc())
{
$ro = array (
    
	"from" => $res['Pos1'],
	"to" => $res['Skill_Name']
);
$ro2 = array (
    
	"from" => $res['Pos2'],
	"to" => $res['Pos1'],

);

$ro3 = array (
    
	"from" => $res['Pos2'],
	"to" => $res['Des2'],

);

$ro4 = array (
    
	"from" => $res['Pos3'],
	"to" => $res['Pos2'],

);

$ro5 = array (
    
	"from" => $res['Pos3'],
	"to" => $res['Des3'],

);

array_push($dat, $ro);
array_push($dat, $ro2);
array_push($dat, $ro3);
array_push($dat, $ro4);
array_push($dat, $ro5);
}

//echo json_encode($dat);



$mysqli->close();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>University Departments and Colleges Chart | MindFusion JavaScript Diagram</title>
<script type = "text/javascript" src="go.js"></script> 


<script>



function goIntro(){



	var $ = go.GraphObject.make; 
	
	var diagram = new go.Diagram("myDiagramDiv");
	diagram.initialContentAlignment = go.Spot.Center; 
	
	
	
	diagram.nodeTemplate =
  $(go.Node, go.Panel.Auto,
	$(go.Shape, { fill: "gold" },
	 { figure: "RoundedRectangle"},
	
	 new go.Binding("fill", "color")),
	 
	 $(go.TextBlock,
	 { margin: 10 },
	 
	 new go.Binding("text", "key"))
	 ); 
	 
	 
	 diagram.layout = $(go.LayeredDigraphLayout,
	 {
		direction: 90,
	
	 }
	 
	 );
	
	//echo the arrays, merge together so that all data can be displayed in one array.  
	var nodeDataArray = <?php echo json_encode(array_merge($data,$dataa,$data3));?>;

    var linkDataArray = <?php echo json_encode($dat);?>;
	
	diagram.model = new go.GraphLinksModel(nodeDataArray, linkDataArray); 
	
	
}
</script>

</head>

<body onload = "goIntro()" > 


<div id ="myDiagramDiv" style = "border: solid 1px black; 
 width:1250px; height:700px"></div>

</body>
</html>
