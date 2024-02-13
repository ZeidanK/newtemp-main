<!DOCTYPE html>
<html lang="en">  
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hello, ddworld! </title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<style>
div.mycontainer {
  width:30%;  
  display:inline-block;
}
</style>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                مرخبا hello  
                <?php 
                include "connection.php";
                $DB = $_GET['id']; 
                $sqltee = "select * from clientlist WHERE slug='$DB'";
                $resulttee = $conn->query($sqltee);
                if(!$resulttee){
                    die("Invalid query!");
                }
                $row = $resulttee->fetch_assoc();
                echo $row['fullname'];
                ?>
            </a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>




    <?php  
                $count_attending=0;
                $count_attendence=0;
                $count_Null=0;
                $openlink=0;
                
                if(isset($_GET['id'])){
                    include "connection.php";
                    $sql = "select * from $DB";
                    $result = $conn->query($sql);
                    if(!$result){
                        die("Invalid query!");
                    }
                    while($row = $result->fetch_assoc()){
                        $attendancee = $row["attendance"];
                        if($row["visitcount"])
                        $openlink++;

                        $printmsg = "NULL";
                        if($attendancee == b'1') {
                            
                            $count_attending = $count_attending + 1;
                        }
                        else if($attendancee == b'0'){
                           
                        }
                        else if($attendancee == NULL){
                            $count_Null = $count_Null + 1;
                        }
                        $count_attendence = $count_attendence + 1;
                        
                    }
                }
                $percent = ($count_attending / $count_attendence) * 100;
                ?>
                
 <div class="row justify-content-center">               
<div style="width:1600px;height:300px;background-color:blue;" >
<div style="width:800px;height:300px;background-color:black;" >
    <div class="container" >
        <div class="row justify-content-center">
             <div class="mycontainer">
                  <div class="col-md-6" style="position: relative;">
                      <canvas id="pieChart" style="position: absolute; top: 10px; left: -200%;" width="200" height="200"></canvas>
                     <h2 id="topic" class="topic" style="position: absolute; top: 10px; left: 50%; transform: translateX(-50%); font-size: 20px;">نسبة الحضور: % <?php echo round($percent, 2); ?></h2>
                     <div id="legend" class="top" style="position: absolute; top: 60px; left: 50%; transform: translateX(-50%); display: flex; flex-direction: column;">
                <?php
                // Define the legend font size
                $legendFontSize = 18;
                $valueFontsize = 30;
                // Define the label names and colors
                $labels = [
                    ["label" => " لم يجيبوا ", "color" => "#9B9B9B", "count" => $count_Null,"sort_index" => 2],
                    ["label" => " غير حاضرين ", "color" => "#DB0000", "count" => $count_attendence-$count_attending-$count_Null,"sort_index" => 1],
                    ["label" => " حاضرين ", "color" => "#00FF00", "count" => $count_attending,"sort_index" => 0]
                ];

                // Display each label with its color and count
                foreach ($labels as $label) {
                    // Determine text direction
                    $textDirection = (strpos($label["label"], '-') !== false) ? 'rtl' : 'ltr';
                    // Flip text direction if it's right to left
                    if ($textDirection === 'rtl') {
                        $textDirection = 'ltr';
                    } else {
                        $textDirection = 'rtl';
                    }
                    echo '<button class="label-button" style="font-size: ' . $legendFontSize . 'px; color: black; display: flex; align-items: center; direction: ' . $textDirection . ';" onclick="sortTable(\'' . $label["sort_index"] . '\');">';
                    echo '<span style="color: ' . $label["color"] . '; font-size: ' . $legendFontSize . 'px;">&#9632;</span>';
                    echo '<span style="margin-left: 5px;">' . substr($label["label"], 0, 1) . '</span>';
                    echo '<span>' . substr($label["label"], 1) . '</span>: ' . $label["count"];
                    echo '</button>';
                }
                
                ?>
                
     


                    </div>
                </div>
            </div>
         </div>
     </div>
     </div>

     <div class="container" >
        <div class="row justify-content-center">
             <div class="mycontainer">
                  
             <canvas id="pieChart" style="position: absolute; top: 10px; left: -200%;" width="200" height="200"></canvas>
                     <h2 id="topic" class="topic" style="position: absolute; top: 10px; left: 50%; transform: translateX(-50%); font-size: 20px;">نسبة الحضور: % <?php echo round($percent, 2); ?></h2>
                     <div id="legend" class="top" style="position: absolute; top: 60px; left: 50%; transform: translateX(-50%); display: flex; flex-direction: column;">
                  <?php
                // Define the legend font size
                $legendFontSize = 18;
                $valueFontsize = 30;
                // Define the label names and colors
                $labels = [
                    ["label" => " لم يجيبوا ", "color" => "#9B9B9B", "count" => $count_Null,"sort_index" => 2],
                    ["label" => " غير حاضرين ", "color" => "#DB0000", "count" => $count_attendence-$count_attending-$count_Null,"sort_index" => 1],
                    ["label" => " حاضرين ", "color" => "#00FF00", "count" => $count_attending,"sort_index" => 0]
                ];

                // Display each label with its color and count
                foreach ($labels as $label) {
                    // Determine text direction
                    $textDirection = (strpos($label["label"], '-') !== false) ? 'rtl' : 'ltr';
                    // Flip text direction if it's right to left
                    if ($textDirection === 'rtl') {
                        $textDirection = 'ltr';
                    } else {
                        $textDirection = 'rtl';
                    }
                    echo '<button class="label-button" style="font-size: ' . $legendFontSize . 'px; color: black; display: flex; align-items: center; direction: ' . $textDirection . ';" onclick="sortTable(\'' . $label["sort_index"] . '\');">';
                    echo '<span style="color: ' . $label["color"] . '; font-size: ' . $legendFontSize . 'px;">&#9632;</span>';
                    echo '<span style="margin-left: 5px;">' . substr($label["label"], 0, 1) . '</span>';
                    echo '<span>' . substr($label["label"], 1) . '</span>: ' . $label["count"];
                    echo '</button>';
                }
                
                ?>
                
     
                </div>
                </div>
            </div>
         
                
            
    </div>
</div>
            </div>
            </div>
</div>
      


</body>
<body>               



    <div class="container my-4">
    <table id="sortableTable" class="table table-sortable">
            <thead>
                <tr>
                    <th>NAME</th>
                    <th>PHONE</th>
                    <th>EMAIL</th>
                    <th>OPENLINK?</th>
                    <th>Attending?</th>
                    <th>msgfromguest</th>
                </tr>
            </thead>
            <tbody>
                <?php  
               
                
                if(isset($_GET['id'])){
                    include "connection.php";
                    $sql = "select * from $DB";
                    $result = $conn->query($sql);
                    if(!$result){
                        die("Invalid query!");
                    }
                    while($row = $result->fetch_assoc()){
                        $attendancee = $row["attendance"];
                        $printmsg = "NULL";
                        if($attendancee == b'1') {
                            $printmsg = "yes";
                            
                        }
                        else if($attendancee == b'0'){
                            $printmsg = "no";
                        }
                        else if($attendancee == NULL){
                            
                        }
                       
                        echo "
                        <tr>
                            <td><a href='../home.php?guest={$row['slug']}&client={$row['clientslug']}'>$row[fullname]</a></td>
                            <td>$row[phone]</td>
                            <td>$row[email]</td>
                            <td>$row[visitcount]</td>
                            <td>$printmsg</td>
                            <td>$row[msgfromguest]</td>
                        </tr>
                        ";
                    }
                }
                
                ?>
            </tbody>
        </table>
    </div>


    
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6" style="position: relative;">
            <canvas id="pieChart" style=" top: 0; left: -50%;" width="400" height="400"></canvas>
            <h2 id="topic" class="topic" style=" top: 10px; left: 50%; transform: translateX(-50%); font-size: 20px;">نسبة الحضور: % <?php echo round($percent, 2); ?></h2>
            <div id="legend" class="top" style=" top: 40px; left: 50%; transform: translateX(-50%); display: flex; flex-direction: column;">
                <?php
                // Define the legend font size
                $legendFontSize = 18;
                $valueFontsize = 30;
                // Define the label names and colors
                $labels = [
                    ["label" => " لم يجيبوا ", "color" => "#9B9B9B", "count" => $count_Null,"sort_index" => 2],
                    ["label" => " غير حاضرين ", "color" => "#DB0000", "count" => $count_attendence-$count_attending-$count_Null,"sort_index" => 1],
                    ["label" => " حاضرين ", "color" => "#00FF00", "count" => $count_attending,"sort_index" => 0]
                ];

                // Display each label with its color and count
                foreach ($labels as $label) {
                    // Determine text direction
                    $textDirection = (strpos($label["label"], '-') !== false) ? 'rtl' : 'ltr';
                    // Flip text direction if it's right to left
                    if ($textDirection === 'rtl') {
                        $textDirection = 'ltr';
                    } else {
                        $textDirection = 'rtl';
                    }
                    echo '<button class="label-button" style="font-size: ' . $legendFontSize . 'px; color: black; display: flex; align-items: center; direction: ' . $textDirection . ';" onclick="sortTable(\'' . $label["sort_index"] . '\');">';
                    echo '<span style="color: ' . $label["color"] . '; font-size: ' . $legendFontSize . 'px;">&#9632;</span>';
                    echo '<span style="margin-left: 5px;">' . substr($label["label"], 0, 1) . '</span>';
                    echo '<span>' . substr($label["label"], 1) . '</span>: ' . $label["count"];
                    echo '</button>';
                }
                
                ?>
                
                <script>
    function sortTable(sortIndex) {
        var table, rows, switching, i, x, y, shouldSwitch;
        table = document.getElementById("sortableTable");
        switching = true;
        // Start the loop that will continue until no switching has been done
        while (switching) {
            switching = false;
            rows = table.rows;
            // Loop through all table rows (except the first, which contains table headers)
            for (i = rows.length - 1; i > 0; i--) {
                shouldSwitch = false;
                // Get the two elements to compare, one from the current row and one from the next
                x = rows[i].getElementsByTagName("TD")[4]; // Assuming "Attending?" column is the 5th column (index 4)
                y = rows[i - 1].getElementsByTagName("TD")[4]; // Assuming "Attending?" column is the 5th column (index 4)
                // Check if the two rows should switch place based on the sorting index
                if (sortIndex === '0') {
                    if (x.innerHTML.toLowerCase() === "yes" && y.innerHTML.toLowerCase() !== "yes") {
                        shouldSwitch = true;
                        break;
                    }
                } else if (sortIndex === '1') {
                    if (x.innerHTML.toLowerCase() === "no" && y.innerHTML.toLowerCase() !== "no") {
                        shouldSwitch = true;
                        break;
                    }
                } else if (sortIndex === '2') {
                    if (x.innerHTML.toLowerCase() === "null" && y.innerHTML.toLowerCase() !== "null") {
                        shouldSwitch = true;
                        break;
                    }
                }
               
            }
            if (shouldSwitch) {
                // If a switch has been marked, make the switch and mark the loop as needing to be run again
                rows[i].parentNode.insertBefore(rows[i], rows[i - 1]);
                switching = true;
               }
         }
          
      }
    
</script>


            </div>
            
        </div>
    </div>
</div>






    <script>
        // Sample data
        var data = {
            "لم يجيبوا": <?php echo $count_Null; ?>,
            "غير حاضرين": <?php echo $count_attendence-$count_attending-$count_Null; ?>,
            "حاضرين": <?php echo $count_attending; ?>
        };

        // Define colors for each category
        // null -  no - yes
         var colors = ["#9B9B9B","#DB0000","#00FF00" ];

        // Get canvas element
        var canvas = document.getElementById("pieChart");
        var ctx = canvas.getContext("2d");

        // Center coordinates
        var centerX = canvas.width / 2;
        var centerY = canvas.height / 2;
        var radius = Math.min(centerX, centerY);

        // Total value
        var total = Object.values(data).reduce((acc, cur) => acc + cur, 0);

        // Draw pie chart
        var startAngle = 0;
        var index = 0;

        for (var category in data) {
            var sliceAngle = (data[category] / total) * 2 * Math.PI;
            var endAngle = startAngle + sliceAngle;

            // Draw slice
            ctx.beginPath();
            ctx.moveTo(centerX, centerY);
            ctx.arc(centerX, centerY, radius, startAngle, endAngle);
            ctx.fillStyle = colors[index];
            ctx.fill();

            // Draw value
            var midAngle = startAngle + (sliceAngle / 2);
            var textX = centerX + (radius / 2) * Math.cos(midAngle);
            var textY = centerY + (radius / 2) * Math.sin(midAngle);
            ctx.fillStyle = "#000";
            ctx.textAlign = "center"; // Align text in the center
            ctx.font = "<?php echo $valueFontsize; ?>px Arial"; // Set font size
            ctx.fillText(data[category], textX, textY);

            startAngle = endAngle;
            index++;
        }

    
    </script>


<script>
    function sortTable(sortIndex) {
        var table, rows, switching, i, x, y, shouldSwitch;
        table = document.getElementById("sortableTable");
        switching = true;
        // Start the loop that will continue until no switching has been done
        while (switching) {
            switching = false;
            rows = table.rows;
            // Loop through all table rows (except the first, which contains table headers)
            for (i = rows.length - 1; i > 0; i--) {
                shouldSwitch = false;
                // Get the two elements to compare, one from the current row and one from the next
                x = rows[i].getElementsByTagName("TD")[4]; // Assuming "Attending?" column is the 5th column (index 4)
                y = rows[i - 1].getElementsByTagName("TD")[4]; // Assuming "Attending?" column is the 5th column (index 4)
                // Check if the two rows should switch place based on the sorting index
                if (sortIndex === '0') {
                    if (x.innerHTML.toLowerCase() === "yes" && y.innerHTML.toLowerCase() !== "yes") {
                        shouldSwitch = true;
                        break;
                    }
                } else if (sortIndex === '1') {
                    if (x.innerHTML.toLowerCase() === "no" && y.innerHTML.toLowerCase() !== "no") {
                        shouldSwitch = true;
                        break;
                    }
                } else if (sortIndex === '2') {
                    if (x.innerHTML.toLowerCase() === "null" && y.innerHTML.toLowerCase() !== "null") {
                        shouldSwitch = true;
                        break;
                    }
                }
               
            }
            if (shouldSwitch) {
                // If a switch has been marked, make the switch and mark the loop as needing to be run again
                rows[i].parentNode.insertBefore(rows[i], rows[i - 1]);
                switching = true;
               }
         }
          
      }
    
</script>


    <script>
        // Sample data
        var data = {
            "لم يجيبوا": <?php echo $count_Null; ?>,
            "غير حاضرين": <?php echo $count_attendence-$count_attending-$count_Null; ?>,
            "حاضرين": <?php echo $count_attending; ?>
        };

        // Define colors for each category
        // null -  no - yes
         var colors = ["#9B9B9B","#DB0000","#00FF00" ];

        // Get canvas element
        var canvas = document.getElementById("pieChart");
        var ctx = canvas.getContext("2d");

        // Center coordinates
        var centerX = canvas.width / 2;
        var centerY = canvas.height / 2;
        var radius = Math.min(centerX, centerY);

        // Total value
        var total = Object.values(data).reduce((acc, cur) => acc + cur, 0);

        // Draw pie chart
        var startAngle = 0;
        var index = 0;

        for (var category in data) {
            var sliceAngle = (data[category] / total) * 2 * Math.PI;
            var endAngle = startAngle + sliceAngle;

            // Draw slice
            ctx.beginPath();
            ctx.moveTo(centerX, centerY);
            ctx.arc(centerX, centerY, radius, startAngle, endAngle);
            ctx.fillStyle = colors[index];
            ctx.fill();

            // Draw value
            var midAngle = startAngle + (sliceAngle / 2);
            var textX = centerX + (radius / 2) * Math.cos(midAngle);
            var textY = centerY + (radius / 2) * Math.sin(midAngle);
            ctx.fillStyle = "#000";
            ctx.textAlign = "center"; // Align text in the center
            ctx.font = "<?php echo $valueFontsize; ?>px Arial"; // Set font size
            ctx.fillText(data[category], textX, textY);

            startAngle = endAngle;
            index++;
        }

    
    </script>
</body>
</html>
