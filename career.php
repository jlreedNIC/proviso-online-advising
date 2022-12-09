<?php
session_start();
if(!isset($_SESSION['userName']))
{
    header("Location: login.php");
    exit();
}

require('php_scripts/db_connection.php');

$sql = "SELECT Company, Position_Name, Pay, Des
        from students
        join user_career on user_career.User_ID=students.userID
        
        join careers on user_career.Career_ID=careers.CareerID
        
        where user_career.User_ID = ".$_SESSION['userID']."";

$result = $mysqli->query($sql);

$size = 0;
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
    $careerInfo[$size] = $row;
    $size++;
}

$mysqli->close();

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Career Goal</title>
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
            body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif}
            .w3-bar,h1,button {font-family: "Montserrat", sans-serif}

            body {
                background-color: white;
            }
        </style>
    </head>

    <body>
        <?php
        include('templates/header.php');
        include('templates/navbar.php');
        Navbar("career");
        NameHeader($_SESSION['firstName']." ".$_SESSION['lastName']);
        ?>
      
	
        <header style="padding:80px; text-align: center;">
            <h1>
                Career Overview
            </h1>
            <hr style="border: 1px solid black;">
        </header>
   
        <div class="container-fluid" style="width:80%">
            <div class="card my-card shadow p-3 mb-5 bg-white rounded">
                <div class="card-body">
                    <h2>Career Goal:</h2> <span style="font-size: x-large"><?php echo $careerInfo[0]['Position_Name'];?> </span><br>
                </div>
            </div>
        </div>
	     
        <div class="container-fluid" style="width:80%">
            <div class="card my-card shadow p-3 mb-5 bg-white rounded">
                <div class="card-body">
                    
                    <h2>  Personal References</h2> 
				    <br>
                   
				   <table class="table bg-white" id="myTable">
                <thead class="bg-dark text-light">
                    <tr>
                        
                        <th>Name</th>
                        <th>Number</th>
                        <th>Email</th>
                     
                    </tr>
                </thead>
                <tbody>
                
                    <tr>
                       
                        <td>Jane Doe</td>
                        <td >111-111-1111</td>
                        <td >Jane@Gmail.com</td>    
                    </tr>
					<tr>    
						<td>Jack Doe</td>
                        <td >222-222-2222</td>
                        <td >Jack@Gmail.com</td>
                     
                    </tr>
				   
	
				      </tbody>
                        
                    </table>
				   
                </div>
            </div>
        </div>
        <div class="container-fluid" style="width:80%">
            <div class="card my-card shadow p-3 mb-5 bg-white rounded">
                <div class="card-body">
                    <h2> Career Graph</h2>
                    <canvas id="demo" width="100" height="50"></canvas>

                    <?php
                    $graph_source = "gojs/release/t.php";
                    if($careerInfo[0]['Position_Name'] == "Entry Level Web Developer")
                    {
                        $graph_source = "gojs/release/t3.php";
                    }
                    else if($careerInfo[0]['Position_Name'] == "Information Security analyst (IT Engineer)")
                    {
                        $graph_source = "gojs/release/t2.php";
                    }
                    ?>

                    <iframe src=<?php echo $graph_source; ?>  height="800" style="width:100%" title="Iframe Example"></iframe>
                </div>
            </div>
        </div>
    


        <!--
        <div class="container-fluid" style="width: 80%">
            Skills needed: $skills
        </div>

        <div class="container-fluid" style="width: 80%">
            Courses Recommended based on skills needed: $recommendations
        </div> -->
		
		<?php
        include('templates/footer.php');
        Footer();
        ?>
		
    </body>
</html>