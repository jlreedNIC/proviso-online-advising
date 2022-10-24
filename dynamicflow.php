<!-- PHP code to establish connection with the localserver -->
<?php

    require 'php_scripts/db_connection.php';

    // open connection to database and check for errors
    $mysqli = OpenCon();

    // get data from database
    $query = "select preclasses.department, preclasses.classNumber, classes.department, classes.classNumber
              from prereq 
              join classes as preclasses on prereq.prereqID=preclasses.classID
              join classes on prereq.classID=classes.classID";
    echo $query;
    $rs = mysqli_query($mysqli, $query);
    print_r($rs);

    // add error handling

    CloseCon($mysqli);

?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Test Class Layout</title>
        <!-- taken from https://www.cssscript.com/dynamic-flow-chart-library-with-createjs-flowjs/  -->
        <script src="https://www.cssscript.com/demo/dynamic-flow-chart-library-with-createjs-flowjs/lib/createjs-2015.05.21.min.js"></script>
        <script src="https://www.cssscript.com/demo/dynamic-flow-chart-library-with-createjs-flowjs/src/flow.js"></script>
        <script src="https://www.cssscript.com/demo/dynamic-flow-chart-library-with-createjs-flowjs/src/flowitem.js"></script>
        <script src="https://www.cssscript.com/demo/dynamic-flow-chart-library-with-createjs-flowjs/src/flowconnector.js"></script>
    </head>
    <body>
    
        <h1> test class layout </h1>

        <canvas id="demo" width="500" height="300"></canvas>

        <script>
            // query for each class
            // query what that class is a prereq of
            // start building chart
            
            var a = [ 
                [{id: "The Collector C", next: ["Groot", "Peter Quill"]}],
                [{id: "Groot", next: ["Peter Quill"]}],
                [{id: "Peter Quill", next: ["Drax"]}],
                [{id: "Drax", next: undefined}]
            ];

            var b = [ 
                [{id: "The Collector A", next: ["Meredith Quill"]}, {id:"z1", empty: true, next: undefined}, {id: "The Collector B", next:["Peter Quill Y", "Peter Quill X"]}],
                [{id: "Meredith Quill", next: ["Drax"]}, {id: "Peter Quill X", next: ["Drax"]}, {id: "Peter Quill Y", next: ["Drax"]} ],
                [{id: "Drax", next: undefined}]
            ];

            var c = [ 
                [{id: "The Collector C", next: ["Nebula B"]}, {id: "Peter Quill", next:["Nebula A"]}],
                [{id: "Nebula B", next: ["Drax"]}, {id: "Nebula A", next: ["Drax"]}],
                [{id: "Drax", next: undefined}]
            ];
            
            var d = [ 
                [{id: "Rocket", next: ["Ronan"]}],
                [{id: "Ronan", next: ["Korath", "Peter Quill", "Peter Quill X", "Peter Quill Y", "Meredith Quill"]}],
                [{id: "Korath", next: ["Groot", "z1", "z2"]}, {id: "Peter Quill"},  {id: "Peter Quill X"},  {id: "Peter Quill Y"}, {id: "Meredith Quill"}],
                [{id: "Groot"}, {id:"z1", empty: true}, {id:"z2", empty: true}, {id:"z3", empty: true}, {id:"z4", empty: true}]
            ];

            var e = [
                [{id: "CS 121", next: ["CS 210", "CS 240", "CS 270"]}], //{id: "z1", empty: true, next: undefined}, {id: "z1", empty: true, next: undefined}],
                [{id: "CS 210", next: ["CS 383"]}, {id: "CS 240", next: ["CS 383"]},  {id: "CS 270", next: ["CS 383"]}],
                [{id: "CS 383", next: undefined}]//, {id: "Software Engineering", next: undefined}, {{id: "z3", empty: true, next: undefined}],
            ];

            // new flowjs("demo", d).draw();
            new flowjs("demo", e).draw();
        
    
        </script>
    </body>
</html>