<?php //this one is used to change the attendance by taking the client and guest and aswer as input in the url then updateing the database
// at the end there is also a script the gives a messeg and send the user back to the last page as this page has nothing to display just update
if(isset($_GET['client'])&&isset($_GET['guest'])){

  include "php/connection.php";
  $ClientSlug=$_GET['client'];
  $GuestSlug=$_GET['guest'];
  $answer=$_GET['answer'];

          if($_GET['answer']){
          $query = "UPDATE $ClientSlug SET attendance = b'1' WHERE slug='$GuestSlug'";
          $execute= $conn1->query($query);
          if(!$execute){
            die("Invalid query!");
          }
        }else{
            $query1 = "UPDATE $ClientSlug SET attendance = b'0' WHERE slug='$GuestSlug'";
            $execute= $conn1->query($query1);
            if(!$execute){
                die("Invalid query!");
        }
  
  

}
}


//this is the script that turn you back to the page you came from
?>

echo "<script>
             alert('message sent succesfully'); 
             window.history.go(-1);
     </script>";
