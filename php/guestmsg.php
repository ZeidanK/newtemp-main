<?php //testing file like the empty but trying to make a form that accepts long text 
if(isset($_GET['client'])&&isset($_GET['guest'])){

    include "connection.php";
    $message = $_POST["message"];
    $ClientSlug=$_GET['client'];
    $GuestSlug=$_GET['guest'];
    $Guestsql="select * from $ClientSlug WHERE slug='$GuestSlug'";
    $Guestresult=mysqli_query($conn,$Guestsql);
    $Guestrow=mysqli_fetch_array($Guestresult);
    $Clientsql= "select * from clientlist WHERE slug='$ClientSlug'";
    $Clientresult=mysqli_query($conn,$Clientsql);
    $Clientrow=mysqli_fetch_array($Clientresult);
}
 $text=$_POST["message"];
 $query1 = "UPDATE $ClientSlug SET msgfromguest = '$message' WHERE slug='$GuestSlug'";
 $execute= $conn1->query($query1);
?>

echo "<script>
             alert('message sent succesfully'); 
             window.history.go(-1);
     </script>";
