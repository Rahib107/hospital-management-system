<?php
include("RegistrationAction.php");

$ID=$_GET['rn'];
$quary="DELETE FROM `registration` WHERE ID = '$ID' ";

$data =mysqli_query($conn, $quary);

if($data)
{

           echo " <font color='green'>record delete from database";

}

else
{

           echo " <font color='red'>Failed to delete from database";

}



?>