<!-- PHP code to establish connection with the localserver -->
<?php

// Username is root
// Riley Walsh
// lab_5
// 10/07/2022
$user = 'root';
$password = '';

// Database name is UserDatabase
$database = 'career';

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
$sql = " SELECT * FROM job";
$result = $mysqli->query($sql);

$mysqli->close();

?>

<!DOCTYPE HTML>

<html>
    <head>
        <title>Org Chart</title>
        <link rel="stylesheet" href="demo.css"/>
        <link rel="stylesheet" href="jquery/jquery.orgchart.css"/>
        <style>
        span.title {
            font-weight: normal;
            font-style: italic;
            color: #404040;
        }
        </style>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="jquery/jquery.orgchart.js"></script>
        <script>
        $(function() {
            $("#organisation").orgChart({container: $("#main")});
        });
		 
        </script>
    </head>

    <body>


<div id="content">
        
            <h1>JQuery/CSS Organisation Chart</h1>
        
            <div id="main">
            </div>

        <div id="left">
          
        
			  <ul id="organisation">
			  
			 <ul>
			
                 <ul>
				      <li>Software Engineer<br/>
                         <ul>
                    
						<?php
						 // LOOP TILL END OF DATA
						 while($rows=$result->fetch_assoc())
						 { 
						 ?>
			             
							<li><?php echo $rows['100lvl']; ?><br/>
								<ul>
									<li><?php echo $rows['200lvl']; ?><br/>
									    <ul>
									        <li><?php echo $rows['300lvl']; ?><br/>
									
									        </li>
									
									     </ul>
									</li>
						
							    </ul>
							
						
							</li>
                                    
							<?php
						    }	
						    ?>
						
                         </ul>
						
                     </li> 
					 
                </ul>                           
           </ul>
				

    
	 
        </div>
  
            
             
            </div>

   
            
  </body>

</html>