<?php

    require 'php_scripts/db_connection.php';

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
                border: 1px solid #f1f1f1;  
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
        NameHeader("Jane Doe");
    ?>

    
<form>  
  <div class="container">  
  <center>  <h1> Student Registration</h1> </center>  
  <hr>  
  <label> Firstname </label>   
<input type="text" name="firstname" placeholder= "Firstname" size="15" required />   
  
<label> Lastname: </label>    
<input type="text" name="lastname" placeholder="Lastname" size="15"required />   
<div>  
<label>   
Course :  
</label>   
  
<select>  
<option value="Course">Course</option>  
<option value="BSCS">BSCS</option>  
<option value="MSCS">MSCS</option> 
<option value="BSCE">BSCE</option>   
</select>  
</div>
  
<div>  
<label>   
University  
</label>   
  
<select>  
<option value="UI">University of Idaho</option>  
<option value="NIC">North Idaho College</option>  
<option value="Boise">Boise State</option> 
</select>  
</div>
 
<div>  
<label>   
Career 
</label>   
  
<select>  
<option value="S">Software Engineer</option>  
<option value="It">Information Technology</option>  
<option value="Web">Web developer</option> 
</select>  
</div> 

<div>  
<label>   
Gender :  
</label><br>  
<input type="radio" value="Male" name="gender" checked > Male   
<input type="radio" value="Female" name="gender"> Female     
  
</div> 

Semester:   
</label><br>  
<input type="radio" value="Fall" name="Semester" checked > Fall   
<input type="radio" value="Spring" name="Semester"> Spring <br><br>
<label>
Phone :  
</label>  
<input type="text" name="country code" placeholder="Country Code"  value="+208" size="2"/>   
<input type="text" name="phone" placeholder="phone no." size="10"/ required>
    
Current Address :  
<textarea cols="80" rows="5" placeholder="Current Address" value="address" required>  
</textarea>  
 
</form> 

<div class="row">

    <div class="column columns">


        <form>

            <h2 style="text-align:center">Select courses</h2>

            <div class="row" style="text-align: center; padding: 10px 5px " >

                <div class="medium-6 columns" >
                    <select 
					
						style="height: 50px; width: 500px;"
					   
                        name="category"
                        class="cascadingDropDown "
                        
                        data-group="product-1"
                        data-target="make"
                        data-url="./assets/data/make.json"
                        data-replacement="container1"

                        >

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
                </div>

            </div>
		 
            <form>
    
                <div class="row" style="text-align: center; padding: 10px 5px " >
    
                    <div class="medium-6 columns" >
                        <select 
                        
                            style="height: 50px; width: 500px;"
                           
                            name="category"
                            class="cascadingDropDown "
                            
                            data-group="product-1"
                            data-target="make"
                            data-url="./assets/data/make.json"
                            data-replacement="container1"
    
                            >
                            
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
                    </div>
    
                </div>

                <form>
        
                    <div class="row" style="text-align: center; padding: 10px 5px " >
        
                        <div class="medium-6 columns" >
                            <select 
                            
                                style="height: 50px; width: 500px;"
                               
                                name="category"
                                class="cascadingDropDown "
                                
                                data-group="product-1"
                                data-target="make"
                                data-url="./assets/data/make.json"
                                data-replacement="container1"
        
                                >
                                
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
                        </div>
        
                    </div>

                    <form>
                        <div class="row" style="text-align: center; padding: 10px 5px " >
            
                            <div class="medium-6 columns" >
                                <select 
                                
                                    style="height: 50px; width: 500px;"
                                   
                                    name="category"
                                    class="cascadingDropDown "
                                    
                                    data-group="product-1"
                                    data-target="make"
                                    data-url="./assets/data/make.json"
                                    data-replacement="container1"
            
                                    >
                                    
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
                            </div>
            
                        </div>
        </form>

    </div>

</div>
<button type="submit"  class="registerbtn" onclick="window.location.href='sign_up_success.html';">Continue</button>

<?php
        include('templates/footer.php');
        Footer();
        ?> 

</body>  
</html>  