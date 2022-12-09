<?php

// print same navbar on each page
function Navbar($location)
{ 
?>
<nav class="navbar navbar-dark bg-dark navbar-expand-lg nav-pills" style="background-color:black !important">
    <span class="navbar-brand mb-0 h1" style="color:rgb(231, 200, 25)"><strong>ProViso Online Advising</strong></span>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarNav">
        <div class="navbar-nav">
            <a href="Adv_Index.php" class=" <?php if($location == "home") echo "active" ?>  nav-item nav-link my-nav-item">Home</a>
            <a href="Adv_Degree.php" class="<?php if($location == "degree_map") echo "active" ?>  nav-item nav-link my-nav-item">Degree Map</a>
            <a href="Adv_CC.php" class= "<?php if($location == "course_catalog") echo "active" ?> nav-item nav-link my-nav-item">Course Catalog</a>

            <a href="Adv_suggested.php" class=" <?php if($location == "student_management") echo "active" ?> nav-item nav-link my-nav-item" >Student Management</a>
            <a href="Adv_JobD.php" class=" <?php if($location == "job_description") echo "active" ?> nav-item nav-link my-nav-item ">Job Description</a>
        </div>
    </div>
    <div class="navbar-nav form-inline" style="color:white">
        <a href="logout.php" class=" <?php if($location == "sign_up") echo "active" ?> nav-item nav-link my-nav-item">Logout</a>
    </div>
</nav>
<?php
}
?>