<?php

$search_value = $_POST["search"];

$conn = mysqli_connect("localhost","root","","validation") or die("Connection Failed");

$sql = "SELECT * FROM registration WHERE firstname LIKE '%{$search_value}%' OR lastname LIKE '%{$search_value}%'";
$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");
$output = "";
if(mysqli_num_rows($result) > 0 ){
  

              while($row = mysqli_fetch_assoc($result)){
                $output .= "<tr><td align='center'>{$row["id"]}</td><td>{$row["first_name"]} {$row["last_name"]}</td>";
              }
    $output .= "</table>";

    mysqli_close($conn);

    echo $output;
}else{
    echo "<h2>No Record Found.</h2>";
}

?>
