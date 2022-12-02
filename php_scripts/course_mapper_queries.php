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

$courses_master_list = [];  // complete list of courses student will take, or has taken
// course_ID, Department, Num

// colors
$complete_col = "green";
$avail_col = "aquamarine";
$blank_col = "gray";
$career_col = "deepskyblue";


$con = OpenCon();

// ------------------------------------------------------------
// get courses required by degree for given student
$qry = "SELECT courses.Course_ID, Department,  Course_Num, Course_Name, Credits
        from degree_classes_req
        join user_degree on user_degree.DegreeID=degree_classes_req.DegreeID
        join courses on degree_classes_req.Course_ID=courses.Course_ID
        where user_degree.userID = ".$_SESSION['userID']."
        order by Department, Course_Num";

$rs = mysqli_query($con, $qry);

$size = 0;
while($row = mysqli_fetch_array($rs, MYSQLI_ASSOC))
{
    $courses_req[$size] = $row;
    $courses_req[$size]['color'] = $blank_col;
    array_push($courses_master_list, $courses_req[$size]);
    $size++;
}

// echo "array status after adding required courses<br>";
// echo "----------<br>";
// echo "required courses: <br>";
// print_r($courses_req);
// echo "<br><br>";
// echo "master list: <br>";
// print_r($courses_master_list);
// echo "<br><br>";

// ------------------------------------------
// career selected courses
$qry = "SELECT distinct courses.Course_ID, Department, Course_Num, Course_Name, Credits
        from user_career
        join careers_req_skills on user_career.Career_ID=careers_req_skills.Career_ID
        join course_skills on course_skills.Skill_ID=careers_req_skills.Skill_ID
        join courses on courses.Course_ID=course_skills.Course_ID
        where user_career.User_ID = ".$_SESSION['userID']."";

$rs = mysqli_query($con, $qry);

$size = 0;
while($row = mysqli_fetch_array($rs, MYSQLI_ASSOC))
{
    $career_rec_courses[$size] = $row;
    $career_rec_courses[$size]['color'] = $career_col; // add query to array

    // check if row is in master list
    // if it is in master list and the color is wrong, then fix the color
    $color1 = $career_rec_courses[$size];
    $color2 = $career_rec_courses[$size];
    $color2['color'] = $blank_col;
    // echo " to search for: ";
    // print_r($career_rec_courses[$size]);
    // echo "<br>color 1:";
    // print_r($color1);
    // echo "<br> color2: ";
    // print_r($color2);
    // echo "<br>";
    $index = array_search($color2, $courses_master_list);
    if($index != false) // gray color is in list
    {
        // echo "......gray color found at ".$index."<br>";
        // print_r($courses_master_list[$index]);
        // echo "<br> new color: ";
        $courses_master_list[$index]['color'] = $career_col;
        // print_r($courses_master_list[$index]);
        // echo "<br>";

    }
    else if(in_array($color1, $courses_master_list) == false && in_array($color2, $courses_master_list) == false) // lightblue color not in
    {
        // echo "....new entry required!<br>";
        // print_r($career_rec_courses[$size]);
        // echo "<br>";
        array_push($courses_master_list, $career_rec_courses[$size]);
    }
    // else echo "not found <br>";

    // echo "<br><br>";
    
    $size++;
}

// echo "array status after adding career recommended courses<br>";
// echo "----------<br>";
// echo "required courses: <br>";
// print_r($courses_req);
// echo "<br><br>";
// echo "career recommended: <br>";
// print_r($career_rec_courses);
// echo "<br><br>";
// echo "master list: <br>";
// // print_r($courses_master_list);
// for($i=0; $i<count($courses_master_list); $i++)
// {
//     print_r($courses_master_list[$i]);
//     echo "<br>";
// }
// echo "<br><br>";

// ----------------------------
// get courses student will take
$qry = "SELECT courses.Course_ID, Department,  Course_Num, Course_Name, Credits
        from students_will_take
        join students on students.userID=students_will_take.User_ID
        join courses on courses.Course_ID=students_will_take.Course_ID
        where User_ID = ".$_SESSION['userID']."";
    
$rs = mysqli_query($con, $qry);

$size = 0;
while($row = mysqli_fetch_array($rs, MYSQLI_ASSOC))
{
    $will_take[$size] = $row;
    $will_take[$size]['color'] = $blank_col;

    // check for each color variation
    $color1 = $will_take[$size];
    $color2 = $will_take[$size];
    $color1['color'] = $career_col;
    if($index = array_search($color2, $courses_master_list) == false && in_array($color1, $courses_master_list) == false)
    {
        array_push($courses_master_list, $will_take[$size]);
    }

    $size++;
}

// echo "array status after adding will take courses<br>";
// echo "----------<br>";
// echo "required courses: <br>";
// print_r($courses_req);
// echo "<br><br>";
// echo "career recommended: <br>";
// print_r($career_rec_courses);
// echo "<br><br>";
// echo "will take: <br>";
// print_r($will_take);
// echo "<br><br>";
// echo "master list: <br>";
// // print_r($courses_master_list);
// for($i=0; $i<count($courses_master_list); $i++)
// {
//     print_r($courses_master_list[$i]);
//     echo "<br>";
// }
// echo "<br><br>";

// --------------------------------------------
// get courses student has taken
$qry = "SELECT courses.Course_ID, Department,  Course_Num, Course_Name, Credits
        FROM students_have_taken
        join students on students.userID=students_have_taken.User_ID
        join courses on students_have_taken.Course_ID=courses.Course_ID
        where User_ID = ".$_SESSION['userID']."";
    
$rs = mysqli_query($con, $qry);

$size = 0;
while($row = mysqli_fetch_array($rs, MYSQLI_ASSOC))
{
    $have_taken[$size] = $row;
    $have_taken[$size]['color'] = $complete_col;

    // check for each color variation
    $color1 = $have_taken[$size]; // green
    $color2 = $have_taken[$size]; // lightblue
    $color3 = $have_taken[$size]; // gray
    $color2['color'] = $career_col;
    $color3['color'] = $blank_col;

    $i3 = array_search($color3, $courses_master_list); // look for gray
    $i2 = array_search($color2, $courses_master_list); // look for lightblue
    $i1 = array_search($color1, $courses_master_list); // look for green

    // echo "searching for course taken : ";
    // print_r($color1);
    // echo "<br>";
    // echo "--search results: gray-".$i3." lightblue-".$i2." green-".$i1."<br>";
    if($i3 !== false) // gray found
    {
        // echo "---gray found<br>";
        $courses_master_list[$i3]['color'] = $complete_col;
    }
    else if($i2 !== false)
    {
        // echo "-----lightblue found<br>";
        $courses_master_list[$i2]['color'] = $complete_col;
    }
    else if($i1 === false) // green not found
    {
        // echo "--------adding have taken course<br>";
        array_push($courses_master_list, $have_taken[$size]);
    }

    $size++;
}

// echo "array status after adding has taken courses<br>";
// echo "----------<br>";
// echo "required courses: <br>";
// print_r($courses_req);
// echo "<br><br>";
// echo "career recommended: <br>";
// print_r($career_rec_courses);
// echo "<br><br>";
// echo "will take: <br>";
// print_r($will_take);
// echo "<br><br>";
// echo "have taken: <br>";
// print_r($have_taken);
// echo "<br><br>";
// echo "master list: <br>";
// for($i=0; $i<count($courses_master_list); $i++)
// {
//     print_r($courses_master_list[$i]);
//     echo "<br>";
// }
// // print_r($courses_master_list);
// echo "<br><br>";

// -----------------------------
// prereqs for courses required

$size = count($courses_master_list);

$prereqSize = 0;
for($i=0; $i<$size; $i++)
{
    $qry = "SELECT pre.Course_ID as pID, pre.Department as preDept, pre.Course_Num as preNum, pre.Course_Name as preName, pre.Credits as preCredits, courses.Course_ID as cID, courses.Department as dept, courses.Course_Num as num, courses.Course_Name as cName, courses.Credits as credits
            from prereq
            join courses as pre on prereq.Prereq_ID=pre.Course_ID
            join courses on prereq.Course_ID=courses.Course_ID
            where prereq.Course_ID = ".$courses_master_list[$i]['Course_ID']."";
    
    $rs = mysqli_query($con, $qry);
    
    while($row = mysqli_fetch_array($rs, MYSQLI_ASSOC))
    {
        // echo "checking prereq: ";
        // print_r($row);
        // echo "<br>";
        if(in_array($row, $prereqs_req) == false)
        {
            $prereqs_req[$prereqSize] = $row;
        
            // look for all variations in master list and add if it's not in there
            $newClass = [];
            $newClass['Course_ID'] = $prereqs_req[$prereqSize]['pID'];
            $newClass['Department'] = $prereqs_req[$prereqSize]['preDept'];
            $newClass['Course_Num'] = $prereqs_req[$prereqSize]['preNum'];
            $newClass['Course_Name'] = $prereqs_req[$prereqSize]['preName'];
            $newClass['Credits'] = $prereqs_req[$prereqSize]['preCredits'];
            $newClass['color'] = $blank_col;

            // echo "----------now checking color variations in master list of: ";
            // print_r($newClass);
            // echo "<br>";

            $color1 = $newClass;
            $color2 = $newClass;
            $color3 = $newClass;
            $color2['color'] = $career_col;
            $color3['color'] = $complete_col;

            $i3 = in_array($color3, $courses_master_list); // look for gray
            $i2 = in_array($color2, $courses_master_list); // look for lightblue
            $i1 = in_array($color1, $courses_master_list); // look for green
            if(!$i3 && !$i2 && !$i1) // check to see if the course is in the list at all
            {
                array_push($courses_master_list, $newClass);
                $size++;
            }

            $prereqSize++;
        }
        
    }
}

// -----------------------------------------------
// find next classes of completed and mark available

function search_master_for_course($course, $masterArr)
{
    global $complete_col, $avail_col, $career_col, $blank_col;
    $index = -1;
    $course['color'] = $blank_col;
    $index = array_search($course, $masterArr);
    if($index != false) return $index;

    $course['color'] = $complete_col;
    $index = array_search($course, $masterArr);
    if($index != false) return $index;

    $course['color'] = $career_col;
    $index = array_search($course, $masterArr);
    if($index != false) return $index;

    $course['color'] = $avail_col;
    $index = array_search($course, $masterArr);
    if($index != false) return $index;

    return $index;
}

function search_for_all_parents($dept, $courseNum, $prereqArr)
{
    $courses = [];

    for($i=0; $i<count($prereqArr); $i++)
    {
        if($prereqArr[$i]['dept'] == $dept && $prereqArr[$i]['num'] == $courseNum)
        {
            $course = [];
            $course['Course_ID'] = $prereqArr[$i]['pID'];
            $course['Department'] = $prereqArr[$i]['preDept'];
            $course['Course_Num'] = $prereqArr[$i]['preNum'];
            $course['Course_Name'] = $prereqArr[$i]['preName'];
            $course['Credits'] = $prereqArr[$i]['preCredits'];
            array_push($courses, $course);
        }
    }
    return $courses;
}

function search_for_all_children($course, $prereqArr)
{
    $indexes = [];

    for($i=0; $i<count($prereqArr); $i++)
    {
        if($prereqArr[$i]['preDept'] == $course['Department'] && $prereqArr[$i]['preNum'] == $course["Course_Num"])
        {
            array_push($indexes, $i);
        }
    }

    return $indexes;
}

// echo "---prereqs---<br>";
// print_r($prereqs_req);
// echo "<br><br>";
// echo "starting to mark available classes<br>";
for($i=0; $i<count($courses_master_list); $i++)
{
    if($courses_master_list[$i]['color'] == $complete_col)
    {
        // echo "completed class: ";
        // print_r($courses_master_list[$i]);
        // echo "<br>";

        $indexes = search_for_all_children($courses_master_list[$i], $prereqs_req);
        // echo "size of indexes: ".count($indexes)."<br>";
        // find all prereqs of child course(s)
        for($j=0; $j<count($indexes); $j++)
        {
            $dept = $prereqs_req[$indexes[$j]]['dept'];
            $courseNum = $prereqs_req[$indexes[$j]]['num'];
            $credits = $prereqs_req[$indexes[$j]]['credits'];
            $courseName = $prereqs_req[$indexes[$j]]['cName'];
            $cID = $prereqs_req[$indexes[$j]]['cID'];
            
            // echo "-----searching for all parents of: ".$dept." ".$courseNum."<br>";
            $parentI = search_for_all_parents($dept, $courseNum, $prereqs_req);

            // for each parent, make sure it is green
            $available = true;
            for($k=0; $k<count($parentI); $k++)
            {
                // echo "-------------checking color of parent node: ";
                // print_r($parentI[$k]);
                // echo "<br>";
                $index = search_master_for_course($parentI[$k], $courses_master_list);
                // echo "-------------checking color of parent node: ";
                // print_r($courses_master_list[$index]);
                // echo "<br>";
                if($courses_master_list[$index]['color'] != $complete_col) 
                {
                    // echo "====condition failed. parent not completed<br>";
                    $available = false;
                }
            }

            if($available)
            {
                // echo "======course available!<br>";
                $c['Course_ID'] = $prereqs_req[$indexes[$j]]['cID'];
                $c['Department'] = $dept;
                $c['Course_Num'] = $courseNum;
                $c['Course_Name'] = $courseName;
                $c['Credits'] = $credits;

                $index = search_master_for_course($c, $courses_master_list);
                if($courses_master_list[$index]['color'] != $complete_col) $courses_master_list[$index]['color'] = $avail_col;
            }
        }
    }
}

// ----------------------------------
// turn all courses with no prereqs and not completed pink

for($i=0; $i<count($courses_master_list); $i++)
{
    $dept = $courses_master_list[$i]['Department'];
    $courseNum = $courses_master_list[$i]['Course_Num'];


    $indexes = search_for_all_parents($dept, $courseNum, $prereqs_req);
    if(count($indexes) == 0 && $courses_master_list[$i]['color'] != $complete_col)
    {
        $courses_master_list[$i]['color'] = $avail_col;
    }
}

// ----------------
// put into correct groups based on course number
for($i=0; $i<count($courses_master_list); $i++)
{
    if($courses_master_list[$i]['Course_Num'] < 200) $courses_master_list[$i]['group'] = "Freshman";
    else if($courses_master_list[$i]['Course_Num'] < 300) $courses_master_list[$i]['group'] = "Sophomore";
    else if($courses_master_list[$i]['Course_Num'] < 400) $courses_master_list[$i]['group'] = "Junior";
    else if($courses_master_list[$i]['Course_Num'] < 500) $courses_master_list[$i]['group'] = "Senior";
}



// find categories required for degree
$qry = "SELECT degree_categories.CategoryID, degree_categories.Category, degree_category_req.CreditsReq
        from user_degree 
        join degree_category_req on user_degree.DegreeID=degree_category_req.DegreeID
        join degree_categories on degree_categories.CategoryID=degree_category_req.CategoryID
        where user_degree.userID=".$_SESSION['userID']."";

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



CloseCon($con);

?>