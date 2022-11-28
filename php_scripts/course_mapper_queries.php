<?php

/*
 * @brief   File will do all the queries to get all the classes required by a degree, 
 *          as well as what classes a student has taken, and will take
 * 
 * @author  Jordan Reed
 */

require("db_connection.php");

// arrays produced by this script
// ------------------------------
$courses_req = [];
$prereqs_req = [];
$career_rec_courses = [];
$career_prereqs = [];
$have_taken = [];
$will_take = [];
$categories = [];
$cat_courses = [];


$con = OpenCon();

// get courses required by degree for given student
$qry = "SELECT courses.Course_ID, Course_Name, Department, Course_Num
        from degree_classes_req
        join user_degree on user_degree.DegreeID=degree_classes_req.DegreeID
        join courses on degree_classes_req.Course_ID=courses.Course_ID
        where user_degree.userID = 1
        order by Department, Course_Num";

$rs = mysqli_query($con, $qry);

$size = 0;
while($row = mysqli_fetch_array($rs, MYSQLI_ASSOC))
{
    $courses_req[$size] = $row;
    $size++;
}

// prereqs for courses required
for($i=0; $i<$size; $i++)
{
    $qry = "SELECT courses.Course_ID, Course_Name, Department, Course_Num
            FROM prereq
            JOIN courses on prereq.Prereq_ID=courses.Course_ID
            where prereq.Course_ID = ".$courses_req[$i]['Course_ID']."";
    
    $rs = mysqli_query($con, $qry);

    $prereqSize = 0;
    while($row = mysqli_fetch_array($rs, MYSQLI_ASSOC))
    {
        $prereqs_req[$i][$prereqSize] = $row;
        $prereqSize++;
    }
}

// find categories required for degree
$qry = "SELECT degree_categories.CategoryID, degree_categories.Category, degree_category_req.CreditsReq
        from user_degree 
        join degree_category_req on user_degree.DegreeID=degree_category_req.DegreeID
        join degree_categories on degree_categories.CategoryID=degree_category_req.CategoryID
        where user_degree.userID=1";

$rs1 = mysqli_query($con, $qry);

$size = 0;
while($row = mysqli_fetch_array($rs1, MYSQLI_ASSOC))
{
    $categories[$size] = $row;
    $size++;
}

// find courses accepted in each category
for($i=0; $i<$size; $i++)
{
    $qry = "SELECT courses.Course_ID, courses.Course_Name, courses.Department, courses.Course_Num, courses.Credits
            from degree_category_accepted_courses
            join courses on courses.Course_ID=degree_category_accepted_courses.Accepted_Courses
            where CategoryID = ".$categories[$i]['CategoryID']."";
    
    $rs1 = mysqli_query($con, $qry);
    $courseSize = 0;
    while($row = mysqli_fetch_array($rs1, MYSQLI_ASSOC))
    {
        $cat_courses[$i][$courseSize] = $row;
        $courseSize++;
    }
}


// career selected courses
$qry = "SELECT courses.Course_ID, Department, Course_Num
        from user_career
        join careers_req_skills on user_career.Career_ID=careers_req_skills.Career_ID
        join course_skills on course_skills.Skill_ID=careers_req_skills.Skill_ID
        join courses on courses.Course_ID=course_skills.Course_ID
        where user_career.User_ID = 1";

$rs = mysqli_query($con, $qry);

$size = 0;
$pSize = 0;
while($row = mysqli_fetch_array($rs, MYSQLI_ASSOC))
{
    $career_rec_courses[$size] = $row;
    $size++;

    // get all prereqs for the career suggested course
    $qry = "SELECT pre.Course_ID, pre.Department as preDept, pre.Course_Num as preNum, courses.Department as dept, courses.Course_Num as num
            from prereq
            join courses as pre on prereq.Prereq_ID=pre.Course_ID
            join courses on prereq.Course_ID=courses.Course_ID
            where prereq.Course_ID = ".$career_rec_courses[$size-1]['Course_ID']."";
    $rs1 = mysqli_query($con, $qry);

    if(mysqli_num_rows($rs1) > 0)
    {
        while($row1 = mysqli_fetch_array($rs1, MYSQLI_ASSOC))
        {
            $career_prereqs[$pSize] = $row1;
            $pSize++;
        }
    }
}

// career recommended prereqs
$i=0;
while($i < $pSize)
{
    $qry = "SELECT pre.Course_ID, pre.Department as preDept, pre.Course_Num as preNum, courses.Department as dept, courses.Course_Num as num
            from prereq
            join courses as pre on prereq.Prereq_ID=pre.Course_ID
            join courses on prereq.Course_ID=courses.Course_ID
            where prereq.Course_ID = ".$career_prereqs[$i]['Course_ID']."";
    
    $rs = mysqli_query($con, $qry);
    if(mysqli_num_rows($rs) > 0)
    {
        $j = 0;
        while($row = mysqli_fetch_array($rs, MYSQLI_ASSOC))
        {
            array_push($career_prereqs, $row);
            
            $pSize++;
            $j++;
        }

    }
    $i++;
}

// get courses student has taken
$qry = "SELECT courses.Course_ID, Department, Course_Num 
        FROM students_have_taken
        join students on students.userID=students_have_taken.User_ID
        join courses on students_have_taken.Course_ID=courses.Course_ID
        where User_ID = 1";
    
$rs = mysqli_query($con, $qry);

$size = 0;
while($row = mysqli_fetch_array($rs, MYSQLI_ASSOC))
{
    $have_taken[$size] = $row;
    $size++;
}

// get courses student will take
$qry = "SELECT courses.Course_ID, Department, Course_Num
        from students_will_take
        join students on students.userID=students_will_take.User_ID
        join courses on courses.Course_ID=students_will_take.Course_ID
        where User_ID = 1";
    
$rs = mysqli_query($con, $qry);

$size = 0;
while($row = mysqli_fetch_array($rs, MYSQLI_ASSOC))
{
    $will_take[$size] = $row;
    $size++;
}

CloseCon($con);

?>