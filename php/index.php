<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/styles.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>List of Clients</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Welcome, this is the list of our clients (only we can ses this) </a>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
                        
          </ul>
        </div>
      </div>
    </nav>
    <div class="container my-4">
    <table class="table table-sortable">
    <thead>
      <tr>
       <th>ID</th>
        <th>NAME</th>
        <th>EMAIL</th>
        <th>PHONE</th>
        <th>WEDDINGDATE</th>
        <th>INVITETXT</th>        
      </tr>
    </thead>
    <tbody>
      <?php
        include "connection.php";
        $sql = "select * from clientlist";
        $result = $conn->query($sql);
        if(!$result){
          die("Invalid query!");
        }
        while($row=$result->fetch_assoc()){
          echo "
      <tr>
        <td>$row[id]</td>
        <td><a href= 'guestlist.php?id={$row['slug']}'>$row[fullname]</a></td>
        <td>$row[email]</td>
        <td>$row[phone]</td>
        <td>$row[weddingdate]</td>       
        <td>$row[invitetxt]</td>
        
         
      </tr>
      ";
        }
      ?>
    </tbody>
  </table>
      </div>
    





      
      <h1 class="heading">Food consumption in a city</h1>
<div class="wrapper">


<div class="pie-wrap">

<div class="light-yellow entry">
    <p>45%</p>
    <p class="entry-value">حاضرين</p>
</div>

<div class="sky-blue entry">
    <p>5%</p>
    <p class="entry-value">Pasta</p>
</div>

<div class="pink entry">
    <p>12.5%</p>
    <p class="entry-value">Beans </p>
</div>

<div class="purple entry">
    <p> 12.5%</p>
    <p class="entry-value">Plantain</p>
</div>

<div class="green entry">
    <p> 12.5%</p>
    <p class="entry-value">Potato</p>
</div>

<div class="wheat entry">
    <p> 12.5%</p>
    <p class="entry-value">Yam</p>
</div>


</div>

<div class="key-wrap">

<!--Pie chart keys  -->
<input type="radio" id="rice" name="values" class="rice-key"/>
<label for="rice" class="rice-label">حاضرين</label>

<input type="radio" name="values" id="beans" class="beans-key"/>
<label for="beans" class="beans-label"> Beans</label>

<input type="radio" name="values" id="plantain" class="plantain-key"/>
<label for="plantain" class="plantain-label"> Plantain</label>

<input type="radio" name="values" id="potato" class="potato-key"/>
<label for="potato" class="potato-label"> Potato</label>

<input type="radio" name="values" id="yam" class="yam-key"/>
<label for="yam" class="yam-label"> Yam</label>

<input type="radio" name="values" id="pasta" class="pasta-key"/>
<label for="pasta" class="pasta-label"> Pasta</label>
<p class="rice-text text">25% of the people eat Rice</p>
<p class="beans-text text">12.5% of the people eat Beans</p>
<p class="plantain-text text">12.5% of the people eat Plantain</p>
<p class="potato-text text">12.5% of the people eat Potato</p>
<p class="yam-text text">12.5% of the people eat Yam</p>
<p class="pasta-text text">25% of the people eat Pasta</p>

</div>

</div>









    <!-- script for table sort in js   -->
    <script src="../js/tablesort.js"></script>
    
    <script defer src="index.js"></script>
    <link rel="stylesheet" href="styles.css" />
  
 
    
  
  </body>
</html>
