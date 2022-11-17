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
    </head>  

    <body>  
      
   <?php
    // load navbar and header
    include('templates/Adv_Navbar.php');
    Navbar("home");

    include('templates/header.php');
    NameHeader("Jane Doe");
?>


        <header style="padding:100px; text-align: center;">
            <h1>Register</h1>
            <p>
                Please register to use the online advising system.
            </p>
            <hr>
        </header>

        <!-- registration form -->
        <form method="post" action="php_scripts/sign_up.php">  
            <div class="container-fluid" style="width:80%">  
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

                <div>  
                    <label> Gender : </label><br>  
                    <input type="radio" value="Male" name="gender" checked > Male   
                    <input type="radio" value="Female" name="gender"> Female     
                </div> 

                <div>
                    <label> Role: </label><br>  
                    <input type="radio" value="advisor" name="role" checked > Advisor   
                    <input type="radio" value="student" name="role"> Student <br><br>
                </div>
                
                <button type="submit" class="registerbtn">Continue</button>
            </div>  
        </form> 
    
    </body>  
</html>  

<!-- Tooltip enable script  -->
<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {return new bootstrap.Tooltip(tooltipTriggerEl)})
</script>