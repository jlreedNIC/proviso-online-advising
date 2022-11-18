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
            <a href="index.php" class=" <?php if($location == "home") echo "active" ?> nav-item nav-link my-nav-item">Home</a>
            <a href="degree_overview.php" class=" <?php if($location == "degree") echo "active" ?> nav-item nav-link my-nav-item">Degree Overview</a>
            <a href="career.php" class=" <?php if($location == "career") echo "active" ?> nav-item nav-link my-nav-item">Career Overview</a>

            <a href="class_reg.php" class=" <?php if($location == "course_register") echo "active" ?> nav-item nav-link my-nav-item" >Course Register</a>
            <a href="course_mapper.php" class=" <?php if($location == "course_register") echo "active" ?> nav-item nav-link my-nav-item">Course Mapper</a>
            <a href="#" class="nav-item nav-link my-nav-item disabled">Course outcomes</a>
            <a href="sign_up.php" class="nav-item nav-link my-nav-item">Register</a>
			<a href="#" class=" <?php if($location == "sign_up") echo "active" ?> nav-item nav-link my-nav-item">Logout</a>
        </div>
    </div>
</nav>
<?php
}
?>