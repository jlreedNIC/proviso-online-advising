<?php


require("php_scripts/db_connection.php");

//first query
$sql = " SELECT * FROM adv_students
where Student_ID = 1; 
";

$result = $mysqli->query($sql);

//second query
$sql2 = " SELECT * FROM adv_students
where Student_ID = 2; 
";

$result2 = $mysqli->query($sql2);

//third query
$sql3 = " SELECT * FROM adv_students
where Student_ID = 3; 
";

$result3 = $mysqli->query($sql3);

$mysqli->close();


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
        <script type="text/javascript" src="flowjs-master/lib/createjs-2015.05.21.min.js"></script>
        <script type="text/javascript" src="flowjs-master/flow.min.js"></script>

        <!-- the following script will make graph work on Jordan's comp -->
        <script type="text/javascript" src="flowjs/lib/createjs-2015.05.21.min.js"></script>
        <script type="text/javascript" src="flowjs/flow.min.js"></script>

        <style>
            body {
                background-color: white;
            }
			
			tr:hover { 
                background: gray; 
            }
            
            td a { 
                display: block; 
                border: 1px solid black;
                padding: 16px; 
            }

            /* Extra styles for the cancel button */
            .cancelbtn {
            padding: 14px 20px;
            background-color: #f44336;
            }

            /* Float cancel and signup buttons and add an equal width */
            .cancelbtn, .signupbtn {
            float: left;
            width: 50%;
            }

            /* Add padding to container elements */
            .container {
            padding: 16px;
            }

            /* The Modal (background) */
            .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: #474e5d;
            padding-top: 50px;
            }

            /* Modal Content/Box */
            .modal-content {
            background-color: #fefefe;
            margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
            border: 1px solid #888;
            width: 80%; /* Could be more or less, depending on screen size */
            }

            /* The Close Button (x) */
            .close {
            position: absolute;
            right: 35px;
            top: 15px;
            font-size: 40px;
            font-weight: bold;
            color: #f1f1f1;
            }

            .close:hover,
            .close:focus {
            color: #f44336;
            cursor: pointer;
            }

            /* Clear floats */
            .clearfix::after {
            content: "";
            clear: both;
            display: table;
            }
        </style>
    </head>

    <body>  
        <?php 
            include("templates/Adv_Navbar.php");
            include("templates/header.php");
            Navbar("NA");
            NameHeader("Jane Doe");
        ?>


        <header style="padding:80px; text-align: center;">
            <h1>
                My Students
            </h1>
            <hr style="border: 1px solid black;">
        </header>
       
 <!-- recommended courses  -->
 <div class="container-fluid" style="width: 80%">
            <div class="card my-card shadow p-3 mb-5 bg-white rounded">
                <div class="card-body">
                    <h2>Student List</h2></br>
                   
						
                    <table class="table bg-white" id="myTable">
                        <thead class="bg-dark text-light">
                            <tr>
                                <th>Student ID</th>
                                <th>Student Name</th>
                                <th>Phone #</th>
                                <th>Email</th>
                                <th>Career Graph</th>
                            
                            </tr>
                        </thead>
                        <tbody>
                           
                              
                               
                            <?php
                                // LOOP TILL END OF DATA
                                while($rows=$result->fetch_assoc())
                                {
                            ?>
                            <tr onclick="document.getElementById('id01').style.display='block'" style="padding:10px;">
                         
                                <td><?php echo $rows['Student_ID'];?></td>
                                <td><?php echo $rows['Name'];?></td>
                                <td><?php echo $rows['Phone'];?></td>
                                <td><?php echo $rows['Email'];?></td>
                                <td > Click me </td>

                            </tr>

                            <?php
				                }
		                    ?>


                            <?php
                                // LOOP TILL END OF DATA
                                while($rows=$result2->fetch_assoc())
                                {
                            ?>
                            <tr onclick="document.getElementById('id02').style.display='block'" style="padding:10px;">
                                
                                <td><?php echo $rows['Student_ID'];?></td>
                                <td><?php echo $rows['Name'];?></td>
                                <td><?php echo $rows['Phone'];?></td>
                                <td><?php echo $rows['Email'];?></td>
                                <td > Click me </td>

                            </tr>

                            <?php
				                }
		                    ?>


                            <?php
                                // LOOP TILL END OF DATA
                                while($rows=$result3->fetch_assoc())
                                {
                            ?>
                            <tr onclick="document.getElementById('id03').style.display='block'" style="padding:10px;">
                                
                                <td><?php echo $rows['Student_ID'];?></td>
                                <td><?php echo $rows['Name'];?></td>
                                <td><?php echo $rows['Phone'];?></td>
                                <td><?php echo $rows['Email'];?></td>
                                <td > Click me </td>

                            </tr>

                            <?php
				                }
		                    ?>
		                   
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


  <div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal"  >&times;</span>
  <form class="modal-content" action="/action_page.php">
    <div class="container">
      <h1>Software Developer:</h1></br>
        <canvas  width="10" height="20"></canvas>
        <h2> Career Graph: </h2></br>        
        <p align="center"><iframe src="gojs/release/t.php" height="950" style="width:100%"  title="Iframe Example"></iframe></p>

    </div>
  </form>
</div>

<div id="id02" class="modal">
  <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal"  >&times;</span>
  <form class="modal-content" action="/action_page.php">
    <div class="container">
      <h1>Information Security Analyst:</h1></br>
      <h2> Career Graph: </h2></br>   
             
        <p align="center"><iframe src="gojs/release/t2.php" height="950" style="width:100%"  title="Iframe Example"></iframe></p>

    </div>
  </form>
</div>


<div id="id03" class="modal">
  <span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal"  >&times;</span>
  <form class="modal-content" action="/action_page.php">
    <div class="container">
      <h1>Web Developer:</h1></br>
      <h2> Career Graph: </h2></br>       
        <p align="center"><iframe src="gojs/release/t3.php" height="950" style="width:100%"  title="Iframe Example"></iframe></p>

    </div>
  </form>
</div>
    
        <?php
            include('templates/footer.php');
            Footer();
        ?>

        
    </body>  
</html>  


