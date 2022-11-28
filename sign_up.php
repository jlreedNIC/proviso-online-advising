<!DOCTYPE html>  
<html>  
    <head>  
        <title>Register</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">  
        <!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="mycss.css" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>

        <style>
            body{
                background-color: black;
            }

            .login-div{
                background-color: white;
                border: 5px solid rgb(231, 200, 25);
                padding: 20px;
            }
        </style>
    </head>  

    <body>  

        <div style="padding: 20px">
        </div>

        <div class="container-fluid login-div" style="width:60%; border-radius: 1em">

            <div class="card-body">
                <header style="text-align: center">
                    <h1>ProViso Online Advising</h1>
                    
                </header>
            </div>

            <div class="card-body">

                <?php 
                require('php_scripts/db_connection.php');

                $con = OpenCon();

                // When form submitted, insert values into the database.
                if (isset($_REQUEST['username'])) 
                {
                    // removes backslashes
                    $username = stripslashes($_REQUEST['username']);
                    //escapes special characters in a string
                    $username = mysqli_real_escape_string($con, $username);

                    $email    = stripslashes($_REQUEST['email']);
                    $email    = mysqli_real_escape_string($con, $email);

                    $password = stripslashes($_REQUEST['password']);
                    $password = mysqli_real_escape_string($con, $password);

                    $firstname = stripslashes($_REQUEST['firstname']);
                    $firstname = mysqli_real_escape_string($con, $firstname);

                    $lastname = stripslashes($_REQUEST['lastname']);
                    $lastname = mysqli_real_escape_string($con, $lastname);

                    $gender = stripslashes($_REQUEST['gender']);

                    $role = stripslashes($_REQUEST['role']);

                    $query    = "INSERT into `students` (userName, password, email, firstName, lastName, gender, role)
                                VALUES ('$username', '$password', '$email', '$firstname', '$lastname', '$gender', '$role')";
                    $result   = mysqli_query($con, $query);

                    if($result) // able to insert
                    {
                        ?>

                        <p style="text-align: center">You have successfully registered!</p>
                        <p style="text-align: center">Proceed to <a href="login.php">login</a> page.</p>

                        <?php 
                    }
                    else // missing fields
                    {
                        ?>
                        <p style="text-align: center">Required fields are missing. <a href="sign_up.php">Try again.</a> </p>
                        <?php
                    }

                    CloseCon($con);
                }
                else
                {
                ?>

                <p style="text-align: center">
                    Please register to use the online advising system.
                </p>

                <!-- login form -->
                <form class="form-inline" method="post" action="">  
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
                            <div class="col-md-6">
                                <label> User Name: </label>    
                                <input type="text" name="username" class="form-control" placeholder="user name" size="15"required 
                                data-bs-toggle="tooltip" data-bs-placement="top" title="Please use your university NetID"/>
                            </div>

                            <div class="col-md-6">
                                <label> Password: </label>    
                                <input type="password" name="password" class="form-control" placeholder="password" size="15"required 
                                data-bs-toggle="tooltip" data-bs-placement="top" title="Password must contain 1 number, 1 capital, and 1 symbol"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>  
                            <input type="email" class="form-control" placeholder="Enter Email" name="email" size="15" required
                            data-bs-toggle="tooltip" data-bs-placement="top" title="Please use your university email">
                        </div>

                        <div class="row">
                            <div class="col-md-6">  
                                <label> Gender : </label><br>  
                                <input type="radio" value="Male" name="gender" checked > Male   
                                <input type="radio" value="Female" name="gender"> Female     
                            </div> 

                            <div class="col-md-6">
                                <label> Role: </label><br>  
                                <input type="radio" value="Advisor" name="role" checked > Advisor   
                                <input type="radio" value="Student" name="role"> Student <br><br>
                            </div>
                        </div>
                    
                        <button type="submit" class="registerbtn">Continue</button>

                        <div class="register-link m-t-15 text-center">
                            <p> Return to <a href="login.php">Login</a> page</p>
                        </div>
                    </div>  
                </form> 

                <?php
                include('templates/footer.php');
                Footer();

                }
                ?>
            </div>
        </div>
    
        

    </body>  
</html>  

<!-- Tooltip enable script  -->
<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {return new bootstrap.Tooltip(tooltipTriggerEl)})
</script>