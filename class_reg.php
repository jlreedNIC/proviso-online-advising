<?php

    session_start();
    if(!isset($_SESSION['userName']))
    {
        header("Location: login.php");
        exit();
    }
    require("php_scripts/course_mapper_queries.php");

    // open connection to database and check for errors
    $mysqli = OpenCon();

    // get data from database
    $query = "select * from courses
              order by Course_Num";
    // echo $query;
    $rs = mysqli_query($mysqli, $query);
    // print_r($rs);

    $size = 0;
    while($row = mysqli_fetch_array($rs, MYSQLI_ASSOC))
    {
        $data[$size] = $row;
        $size++;
    }

    // add error handling

    CloseCon($mysqli);

?>


<!DOCTYPE html>  
<html>  
    <head>  
        <title>Course Registration</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">  
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="mycss.css" rel="stylesheet">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
        <style>
            body{  
                /* font-family: Calibri, Helvetica, sans-serif;   */
                background-color: rgb(41, 38, 25);  
            }  
            .container {  
                padding: 50px;  
                background-color: rgb(231, 200, 25);  
            }  

            .container-fluid {  
                padding: 50px;  
                background-color: rgb(231, 200, 25);  
            }  
            
            input[type=text], input[type=password], textarea {  
                width: 100%;  
                padding: 15px;  
                margin: 5px 0 22px 0;  
                display: inline-block;  
                border: none;  
                background: #f1f1f1;  
            }  
            input[type=text]:focus, input[type=password]:focus {  
                background-color: lightgrey;  
                outline: none;  
            }  
            div {  
                padding: 10px 0;  
            }  
            hr {  
                border: 1px solid black;  
                margin-bottom: 25px;  
            }  
            .registerbtn {  
                background-color: black;  
                color: white;  
                padding: 16px 20px;  
                margin: 8px 0;  
                border: none;  
                cursor: pointer;  
                width: 100%;  
                opacity: 0.9;  
            }  
            .registerbtn:hover {  
                opacity: 1;  
            }  
        </style>  
    </head>  
<body>  
    <?php
        include('templates/header.php');
        include('templates/navbar.php');
        Navbar("course_register");
        NameHeader($_SESSION['firstName']." ".$_SESSION['lastName']);
    ?>

    <div class="container-fluid" style="width:70%">
        <header style="text-align: center">
            <h1>Course Registration</h1>
            <hr>
        </header>

        <form class="form-inline" method="" action="">  
            <div class="container-fluid"> 

                <div class="row">
                    <div class="col-md-6">
                        <label> First Name: </label>   
                        <input type="text" name="firstname" class="form-control" placeholder= "first name" size="15" required /> 
                    </div>  
                
                    <div class="col-md-6">
                        <label> Last Name: </label>    
                        <input type="text" name="lastname" class="form-control" placeholder="last name" size="15"required />
                    </div>
                </div>

                <div class="row"> 
                    <label class="col-sm-2 col-form-label">Degree:</label>    
                    <div class="col-sm-10">
                        <select class="form-select">  
                            <option value="BSCS">BSCS</option>  
                            <option value="MSCS">MSCS</option> 
                            <option value="BSCE">BSCE</option>   
                        </select>
                    </div>
                </div>

                <div class="row">  
                    <label class="col-sm-2 col-form-label">University:</label>   
                    <div class="col-sm-10">
                        <select class="form-select">  
                            <option value="UI">University of Idaho</option>  
                            <option value="NIC">North Idaho College</option>  
                            <option value="Boise">Boise State</option> 
                        </select> 
                    </div> 
                </div>


                <div class="row"> 
                    <label class="col-sm-2 col-form-label"> Semester: </label> 
                    <div class="col-sm-2">
                        <input type="radio" value="Fall" name="Semester" checked > Fall   
                        <input type="radio" value="Spring" name="Semester"> Spring  
                    </div>  
                    <div class="col-sm-2">
                    <select class="form-select">  
                            <option value="2022">2022</option>  
                            <option value="2023">2023</option>  
                            <option value="2024">2024</option> 
                        </select> 
                    </div>
                </div>

                <hr>
                
                <h2 style="text-align:center">Select courses</h2>
                <?php
                for($m=0; $m<4; $m++)
                {
                ?>

                <div class="medium-6 columns">
                    <center>
                        <select 
						style="height: 50px; width: 500px;"
                        class="cascadingDropDown form-select"
                        name= <?php echo "course_".$m+1; ?> >

                        <option value="">No Course</option>
                        <?php
						    // LOOP TILL END OF DATA
                            $i = 0;
						    while($i < $size)
						    {
                                echo "<option value='{$data[$i]['Course_ID']}'>{$data[$i]['Department']} {$data[$i]['Course_Num']}  {$data[$i]['Course_Name']}</option>";
                                $i++;
                            }
						?>
                        </select>
                    </center>
                </div>

                <?php
                }
                ?>

            </div>

            <button type="submit"  class="registerbtn" onclick="window.location.href='sign_up_success.php';">Continue</button>
        </form> 

        <?php
        include('templates/footer.php');
        Footer();
        ?> 
    </div>

    

</body>  
</html>  