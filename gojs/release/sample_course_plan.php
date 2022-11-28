<?php 

require("../../php_scripts/course_mapper_queries.php");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>University Departments and Colleges Chart | MindFusion JavaScript Diagram</title>
        <script type = "text/javascript" src="go.js"></script>
    </head>

<body onload = "goIntro()">

    <p id="test">test here:</p>

    <div id ="myDiagramDiv" style = "border: solid 1px black; 
    width:1320px; height:900px"></div>

</body>

<script>
    function goIntro(){
        var $ = go.GraphObject.make; 
        
        var diagram = new go.Diagram("myDiagramDiv");
        diagram.initialContentAlignment = go.Spot.Center; 
        
        
        diagram.nodeTemplate =
    $(go.Node, go.Panel.Auto,
        $(go.Shape,
        { figure: "RoundedRectangle"},
        
        new go.Binding("fill", "color")),
        
        $(go.TextBlock,
        { margin: 5 },
        
        new go.Binding("text", "key"))
        ); 
        
        
        diagram.layout = $(go.LayeredDigraphLayout,
        {
            direction: 90,
        }
        
        
        );

        var courses_req = <?php echo json_encode($courses_req); ?>;
        var prereqs_req = <?php echo json_encode($prereqs_req); ?>;
        var career_rec_courses = <?php echo json_encode($career_rec_courses); ?>;
        var career_prereqs = <?php echo json_encode($career_prereqs); ?>;
        var have_taken = <?php echo json_encode($have_taken); ?>;
        var will_take = <?php echo json_encode($will_take); ?>;

        // load required courses
        // load prereqs if not in list
        //     make path for prereqs

        // load courses recommended from career goal
        //    get prereqs for courses and prereqs until no more
        //    these courses will be blue

        // query for have taken
        //    turn those classes green
        //    make next class yellow

        // functions to find if a key is in the list already
        function checkForKey(arrayVal) // nodeDataArray
        {
            return arrayVal['key'] == this;
        }
        function checkForToClass(arrayVal) // linkDataArray
        {
            return arrayVal['to'] == this;
        }
        function checkForFromClass(arrayVal) // linkDataArray
        {
            return arrayVal['from'] == this;
        }
        function checkForToFromPath(arrayVal) // linkDataArray
        {
            return (arrayVal['from'] == this['from']) && (arrayVal['to'] == this['to']);
        }

        var nodeDataArray = [];
        var linkDataArray = [];

        // load all required courses

        for(i=0; i<courses_req.length; i++)
        {
            // add all required courses
            nodeDataArray.push({key: courses_req[i]['Department'] + " " + courses_req[i]['Course_Num'], color: "gray"});
        }


        // -------------------------------------------------------------

        // load all prereqs and start making connections
        for(i=0; i<courses_req.length; i++)   // check each course
        {
            if(prereqs_req[i] != null) // make sure prereq list for each course is not empty
            {
                for(j=0; j<prereqs_req[i].length; j++) // check each prereq for the course
                {
                    // if prereq not in list, add it
                    if(nodeDataArray.findIndex(checkForKey, prereqs_req[i][j]['Department'] + " " + prereqs_req[i][j]['Course_Num']) == -1)
                    {
                        nodeDataArray.push({key: prereqs_req[i][j]['Department'] + " " + prereqs_req[i][j]['Course_Num'], color: "gray"});
                    }

                    // if prereq-course not in paths, add it
                    prereq = prereqs_req[i][j]['Department'] + " " + prereqs_req[i][j]['Course_Num'];
                    course = courses_req[i]['Department'] + " " + courses_req[i]['Course_Num'];

                    index = linkDataArray.findIndex( checkForToFromPath, {from: prereq, to: course} );
                    if(index == -1)
                    {
                        // add path
                        linkDataArray.push({from: prereq, to: course});
                    }
                }
            }
        }

        // ---------------------------------------------------------------

        // load career suggested courses

        // if course not in list, add it
        for(i=0; i<career_rec_courses.length; i++)
        {
            index = nodeDataArray.findIndex(checkForKey, career_rec_courses[i]['Department'] + " " + career_rec_courses[i]['Course_Num']);
            if(index == -1) // not found in list
            {
                nodeDataArray.push({key: career_rec_courses[i]['Department'] + " " + career_rec_courses[i]['Course_Num'], color: "lightblue"});
            }
            else
            {
                nodeDataArray[index]['color'] = "lightblue";
            }
        }

        // ---------------------------------------------------------------

        // load career suggested course prereqs
        for(i=0; i<career_prereqs.length; i++)
        {
            prereq = career_prereqs[i]['preDept'] + " " + career_prereqs[i]['preNum'];
            course = career_prereqs[i]['dept'] + " " + career_prereqs[i]['num'];

            // check if prereq in data array
            
            index = nodeDataArray.findIndex(checkForKey, prereq);
            if(index == -1) // prereq not found
            {
                nodeDataArray.push({key: prereq, color: "lightblue"});
            }

            // check if prereq to course path is in link array
            
            index = nodeDataArray.findIndex(checkForToFromPath, {from: prereq, to: course});
            if(index == -1) // path not found
            {
                linkDataArray.push({from: prereq, to: course});
            }
        }

        // ---------------------------------------------------------------

        // load will take classes

        for(i=0; i<will_take.length; i++)
        {
            // check if in data array
            index = nodeDataArray.findIndex(checkForKey, will_take[i]['Department'] + " " + will_take[i]['Course_Num']);
            if(index == -1) // not in list
            {
                nodeDataArray.push({key: will_take[i]['Department'] + " " + will_take[i]['Course_Num'], color: "gray"});
            }
        }

        // ---------------------------------------------------------------

        // turn all classes with no prereqs pink, for able to take
        for(i=0; i<nodeDataArray.length; i++)
        {
            index = linkDataArray.findIndex(checkForToClass, nodeDataArray[i]['key']);
            if(index == -1) // class not found to have a prereq
            {
                nodeDataArray[i]['color'] = "pink";
            }
        }

        // --------------------------------------------------------

        // turn all taken classes green

        for(i=0; i<have_taken.length; i++)
        {
            // find index of class
            index = nodeDataArray.findIndex(checkForKey, have_taken[i]['Department'] + " " + have_taken[i]['Course_Num']);
            if(index != -1) // course found
            {
                nodeDataArray[index]['color'] = "lightgreen";
            }
        }

        // -------------------------------------------------------

        // turn all 'next' classes yellow for able to take

        for(i=0; i<nodeDataArray.length; i++)
        {
            if(nodeDataArray[i]['color'] == "lightgreen") // course was completed
            {
                // find index of all classes that the course is a prereq for

                // for each value in path array, if from == course, find index of to class in data array
                for(j=0; j<linkDataArray.length; j++)
                {
                    if(linkDataArray[j]['from'] == nodeDataArray[i]['key'])
                    {
                        // find index of 'to' class and change color
                        index = nodeDataArray.find(checkForKey, linkDataArray[j]['to']);
                        if(index['color'] != "lightgreen")
                        {
                            index['color'] = "pink";
                        }
                    }
                }
            }
        }

        
        

        
        diagram.model = new go.GraphLinksModel(nodeDataArray, linkDataArray); 
    }
</script>

</html>
