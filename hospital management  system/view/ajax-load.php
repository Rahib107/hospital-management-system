<?php

$conn = mysqli_connect("localhost","root","","validation") or die("Connection Failed");

$sql = "SELECT * FROM registration";
$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");
$output = "";
if(mysqli_num_rows($result) > 0 ){
  

              while($row = mysqli_fetch_assoc($result)){
                $output .= "<tr><td align='center'>{$row["ID"]}</td><td>{$row["firstname"]} {$row["lastname"]}</td>";
              }
    $output .= "</table>";

    mysqli_close($conn);

    echo $output;
}else{
    echo "<h2>No Record Found.</h2>";
}
?>
