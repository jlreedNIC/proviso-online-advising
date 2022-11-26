<!DOCTYPE html>  
<html>  
    <head>  
        <title>Login to ProViso Online Advising</title>
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
        
        <div style="padding:20px">
        </div>

        <div class="container-fluid login-div" style="width:60%; border-radius: 1em">
            
            <div class="card-body">
                <header style="text-align: center">
                    <h1>ProViso Online Advising</h1>
                    <p>
                        Please login to use the online advising system.
                    </p>
                </header>
            </div>

            <div class="card-body">
                <!-- login form -->
                <form class="form-inline" method="post" action="php_scripts/sign_up.php">  
                    <div class="container-fluid" style="width:80%">  
                            <div class="form-group">
                                <label class="col-md-4"> User Name: </label> 
                                <input type="text" name="username" class="form-control col-md-8" placeholder="user name" size="15"required/>
                            </div>

                            <div class="form-group">
                                <label> Password: </label>    
                                <input type="password" name="password" class="form-control" placeholder="password" size="15"required/>
                            </div>                        
                        
                        <button type="submit" class="registerbtn">Sign In</button>

                        <div class="register-link m-t-15 text-center">
                            <p>Don't have account ? <a href="sign_up.php"> Sign Up Here</a></p>
                        </div>

                    </div>  
                </form> 

                <?php
                include('templates/footer.php');
                Footer();
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