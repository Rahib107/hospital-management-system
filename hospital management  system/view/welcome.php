<?php 

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

?>

<?php
        $color ="";

        If(isset($_COOKIE['color'])){
            $color = $_COOKIE['color'];
        }
        else {
            $color = "#FFFFFF";
        }

        if($_SERVER['REQUEST_METHOD'] === "POST"
          ){
            $color=$_POST['color'];

        }

        setcookie("color",$color,time() + 3000);


 ?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>

    <style type="text/css">
        


        p.dotted {border-style: dotted;}
    </style>
</head>
<body style="background-color: <?php echo $color ?>;">

    <?php echo "<h1>Welcome " . $_SESSION['username'] . "</h1>"; ?>
    <a href="logout.php">Logout</a>

<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <label for="color" >pick a color: </label>
        <input type="color" name="color"id="color">
        <input type="submit" name="submit" value="Change color">

     </form>

     <?php include 'includes/Header.php';?>

     <a class="dotted" href="Dashbord.php"><input type="button"value="Dashbord" ></a>
    <br>
    <br>
    <a href="user.json"><input type="button"value="view patient(json)" ></a>


    <br>
    <br>
    <a href="RegistrationAction.php"><input type="button"value="Add patient" ></a>

    <br>
    <br>

    <a href="changePassword.php"><input type="button"value="change pass" ></a>

     <br>
    <br>

    <a href="table1.php"><input type="button"value="patient view/delet" ></a>
    <br>
    <br>

    <button a href="table1.php" type="table1.php">Click Me!</button>
    
    <?php include 'includes/Footer.php';?>



</body>
</html>