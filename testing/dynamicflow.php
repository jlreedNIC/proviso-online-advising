<!-- PHP code to establish connection with the localserver -->
<?php

    require '../php_scripts/db_connection.php';

    // open connection to database and check for errors
    $mysqli = OpenCon();

    // get data from database
    // needs unique column names
    $query = "select prereq.prereqID, p.department as pdept, p.classNumber as pnum, p.name as pname, p.credits as pcred, prereq.classID, c.department, c.classNumber, c.name, c.credits
              from prereq 
              join classes as p on prereq.prereqID=p.classID
              join classes as c on prereq.classID=c.classID";
    // $query = "select * from prereq";
    // echo $query;
    $rs = mysqli_query($mysqli, $query);
    // echo "<br>";
    // print_r($rs);

    $size = 0;
    while($row = mysqli_fetch_array($rs, MYSQLI_ASSOC))
    {
        $data[$size] = $row;
        $size++;
    }
    // echo "<br>";
    // print_r($data);

    // echo "<br>";
    // for($i=0; $i<$size; $i++)
    // {
    //     print_r($data[$i]);
    //     echo "<br>";
    // }

    // echo $data[1]["pname"];

    // add error handling

    CloseCon($mysqli);

?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Test Class Layout</title>
        <!-- taken from https://www.cssscript.com/dynamic-flow-chart-library-with-createjs-flowjs/  -->
        <script type="text/javascript" src="https://www.cssscript.com/demo/dynamic-flow-chart-library-with-createjs-flowjs/lib/createjs-2015.05.21.min.js"></script>
        <script type="text/javascript" src="https://www.cssscript.com/demo/dynamic-flow-chart-library-with-createjs-flowjs/src/flow.js"></script>
        <script type="text/javascript" src="https://www.cssscript.com/demo/dynamic-flow-chart-library-with-createjs-flowjs/src/flowitem.js"></script>
        <script type="text/javascript" src="https://www.cssscript.com/demo/dynamic-flow-chart-library-with-createjs-flowjs/src/flowconnector.js"></script>
        <script type="text/javascript" src="../flowjs/lib/createjs-2015.05.21.min.js"></script>
        <script type="text/javascript" src="../flowjs/flow.min.js"></script>
    </head>
    <body>
    
        <h1> test class layout </h1>

        <canvas id="demo" width="500" height="300"></canvas>

        <script type="text/javascript">
        // var something=<?php //echo json_encode($data); ?>;
        // alert(something);

        // var test_array = <?php 
        //                     for($i=0; $i<$size; $i++)
        //                     {
        //                         echo $data[$i];
        //                     } ?>;

        // for(i=0; i<3; i++)
        // {
        //     print(test_array[i]);
        // }
        // alert(test_array);

        // convert php array into javascript array

        var passedArray = 
        <?php echo json_encode($data); ?>;
            
        // Display the array elements
        // for(var i = 0; i < passedArray.length; i++){
        //     document.write(passedArray[i]['pname']);
        // }
        </script>

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
            // new flowjs("demo", e).draw();
        
    
        </script>

        <canvas id="new_test" width="700" height="300"></canvas>
        <canvas id="class_qry_test" width="700" height="300"></canvas>

        <script >
            var classes = new flowjs.DiGraph();
            classes.addPaths([
            ["AA", "BB", "CC"],
            ["DD", "EE", "CC"],
            ["FF", "EE"],
            ["CC", "GG"],
            ["GG", "HH"],
            ["GG", "II"]
        ]);

            new flowjs.DiFlowChart("new_test", classes).draw();

            var f = new flowjs.DiGraph();
            f.addPaths([
                ["A1", "A2"],
                ["A1", "B2"],
                //["B1", "B2"],
                ["B1", "A2"]
            ]);

            var passedArray = 
            <?php echo json_encode($data); ?>;

            var g = new flowjs.DiGraph();
            for(i=0; i<passedArray.length; i++)
            {
                g.addPaths([
                    [passedArray[i]['pnum'], passedArray[i]['classNumber']]
                ]);
            }
            new flowjs.DiFlowChart("class_qry_test", g).draw();
        </script>
    </body>
</html>