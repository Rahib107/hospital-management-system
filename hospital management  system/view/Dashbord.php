<?php
      $color ="";

      If(isset($_COOKIE['color'])){
        $color = $_COOKIE['color'];
      }
      else {
        $color = "#FFFFFF";
      }

      


 ?>
<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body style="background-color: <?php echo $color ?>;">
  <?php include 'includes/Header.php';?>

<h2>Dashbord</h2>

<table>
  <tr>
    <th>SL.NO</th>
    <th>Title</th>
    <th>Description</th>
    <th>Start Date</th>
    <th>End Date</th>
  </tr>
  <tr>
    <td>1</td>
    <td>Holiday</td>
    <td>Thi is a long established fact that a reader</td>
    <td>12.03.2022</td>
    <td>15.03.2022</td>

  </tr>
  <tr>
    <td>2</td>
    <td>class</td>
    <td> test</td>
    <td>26.03.2022</td>
    <td>29.03.2022</td>
  </tr>
  <tr>
    <td>2</td>
    <td>Summer Holiday</td>
    <td>demo test</td>
    <td>20.03.2022</td>
    <td>25.03.2022</td>
  </tr>
  <tr>
    <td>3</td>
    <td>Lock down</td>
    <td>Covid test</td>
    <td>25.03.2022</td>
    <td>30.03.2022</td>
  </tr>
  <tr>
    <td>4</td>
    <td>Office hour</td>
    <td>Lorem ipsum dolor sit amet, consectetur</td>
    <td>1.04.2022</td>
    <td>10.04.2022</td>
  </tr>
  <tr>
    <td>5</td>
    <td>surgery</td>
    <td>A broken hand </td>
    <td>2.04.2022</td>
    <td>2.04.2022</td>
  </tr>
</table>


<br>
<a href="welcome.php">back</a>
<br>
<br>

<?php include 'includes/Footer.php';?>

</body>
</html>

