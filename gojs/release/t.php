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


//-----query 1-----careers table
$users = $mysqli->query("SELECT * FROM careers");
$data = array();

while ($result = $users->fetch_assoc())
{
$row = array (
    "key" => $result['Position_Name'],

);

array_push($data, $row);
}
//echo json_encode($data);


//-----query 2----- skills table
$my = $mysqli->query("SELECT * FROM skills");
$dataa = array();

while ($resultt = $my->fetch_assoc())
{
$roww = array (
    "key" => $resultt['Skill_Name'],
);

array_push($dataa, $roww);
}

//echo json_encode($dataa);


//-----query 3----- job1 table
$job1 = $mysqli->query("SELECT * FROM job1");
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


array_push($data3, $row3);
array_push($data3, $row4);
array_push($data3, $row5);
array_push($data3, $row6);
}

//echo json_encode($data3);


//----query 4---- all tables for linking to array. 
$my = $mysqli->query("SELECT * FROM careers,skills,job1");
$dat = array();

while ($res = $my->fetch_assoc())
{
$ro = array (
    
	"from" => $res['Position_Name'],
	"to" => $res['Skill_Name']
);
$ro2 = array (
    
	"from" => $res['Pos2'],
	"to" => $res['Position_Name'],

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
	 { figure: "Ellipse"},
	
	 new go.Binding("fill", "color")),
	 
	 $(go.TextBlock,
	 { margin: 15 },
	 
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
