<!doctype html>
<!-- this page will show each client the list of his guest and the details, to identify the client we use $_GET['id'] that will give us the clients slug in the url -->
<html lang="en">  
  <head>
    <?php 
   
    
    ?>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, ddworld! </title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">مرخبا hello  <?php $DB=$_GET['id']; //echo  "$DB"  ; 

include "connection.php";
$sqltee = "select * from clientlist WHERE slug='$DB'";
    $resulttee = $conn->query($sqltee);
if(!$resulttee){
  die("Invalid query!");
}
$row=$resulttee->fetch_assoc();

echo "$row[fullname]" ;


          ?> </a>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
           
          </ul>
        </div>
      </div>
    </nav>
    <div class="container my-4">
    <table class="table table-sortable">
    <thead>
      <tr>
        
        <th>NAME</th>
        <th>PHONE</th>
        <th>EMAIL</th>
        <th>OPENLINK?</th>
        <th>Attending?</th>
        <th>msgfromguest</th>
        
       <!-- <th>ACTIONS</th> -->
      </tr>
    </thead>
    <tbody>
    <?php  
      if(isset($_GET['id'])){
        ##$DB=$_GET['id'];




      
        include "connection.php";
        $sql = "select * from $DB";
        $result = $conn->query($sql);
        if(!$result){
          die("Invalid query!");
        }
        while($row=$result->fetch_assoc()){
          $attendancee=$row["attendance"];
          $printmsg="NULL";
          if($attendancee==1) 
          $printmsg="yes";
        else if($attendancee== b'0')
        $printmsg= "no";
          echo "
      <tr>
        <td><a href= '../home.php?guest={$row['slug']}&client={$row['clientslug']}'>$row[fullname]</a></td>
        <td>$row[phone]</td>
        <td>$row[email]</td>
        <td>$row[visitcount]</td>
        <td>$printmsg</td>
        <td>$row[msgfromguest]</td>
        
        
      </tr>
      ";
      $sql = "UPDATE malmmash123 SET visitcount =  1  ";
    }

    }

    
      // At this point unique visitor record is created successfully. Now update total_views of specific page.
      $query = "UPDATE malmmash123 SET visitcount = visitcount + 1 ";
      
      //if(!mysqli_query($conn, $query))
      //{
     //   echo "Error updating record: " . mysqli_error($conn);
      //}
    
    ?>
    </tbody>
  </table>
      </div>
    
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="../js/tablesort.js"></script>
  </body>
</html>

<!-- <html>
  <head>
    <title>Website Counterqq</title>
    <script defer src="index.js"></script>
    <link rel="stylesheet" href="styles.css" />
  </head>
  <body>
    <div>Website visit count:</div>
    <div class="website-counter"></div>
    <button id="reset">Reset</button>
  </body>
</html>  -->
<!--
 <?php
//function add_view($conn, $visitor_ip, $page_id)
//{
  //if(is_unique_view($conn, $visitor_ip, $page_id) === true)
  //{
    // insert unique visitor record for checking whether the visit is unique or not in future.
    //$query = "INSERT INTO page_views (visitor_ip, page_id) VALUES ('$visitor_ip', '$page_id')";
    
   // if(mysqli_query($conn, $query))
    //{
      // At this point unique visitor record is created successfully. Now update total_views of specific page.
     // $query = "UPDATE pages SET total_views = total_views + 1 WHERE id='$page_id'";
      
     // if(!mysqli_query($conn, $query))
     // {
      //  echo "Error updating record: " . mysqli_error($conn);
     // }
   // }
   // else
   // {
   //   echo "Error inserting record: " . mysqli_error($conn);
   // }
  //} 
//}
//?> 
-->