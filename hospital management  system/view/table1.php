<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Display table 1 </title>
</head>
<body>
	<table border="2">

		<tr>
		<th>ID</th>	
		<th>firstname</th>
		<th>lastname</th>
		<th>birthday</th>
		<th>religion</th>
		<th>address</th>
		<th>email</th>
		<th>Operation</th>
	</tr>



<?php
include("RegistrationAction.php");
//error_reporting(0);
$query= "select * from registration";
$data =mysqli_query($conn,$query);

$total=mysqli_num_rows($data);

if ($total!=0)
{


	while ($result = mysqli_fetch_assoc($data)) {

		echo "
         <tr>
         <th>".$result['ID']."</th>
         <th>".$result['firstname']."</th>
         <th>".$result['lastname']."</th>
         <th>".$result['birthday']."</th>
         <th>".$result['religion']."</th>
         <th>".$result['address']."</th>
         <th>".$result['email']."</td>
         <th><a href = 'delete.php?rn=$result[ID]'>Delete </td>
         </tr>

		";
	}


}
else
{
	echo"No records found";
}


	?>

</body>
</html>