<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script = defer src="script3.js" ></script>
	<title>Form</title>
	<style type="text/css">
	*{
		margin:0;
		padding:0;
	   }
	   body{

       background-image:url(2.jpg);

	   }




		
		</style>



</head>
<body>

	<?php 
		$IDErrorMsg = $firstnameErrorMsg = $lastnameErrorMsg = $genderErrorMsg =$birthdayErrorMsg =$religionErrorMsg=
		$addressErrorMsg=  $emailErrorMsg =  $unameErrorMsg = $passErrorMsg= $cpassErrorMsg="";

		$firstname=$lastname=$dob=$gender=$religion=$email=$username=$password="";



	?>

	<?php 
		if ($_SERVER['REQUEST_METHOD'] === "POST") {

			function test($data) {
				$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);

				return $data;
			}

      //$ID =test($_POST["ID"]);
			$firstname = test($_POST["firstname"]);
			$lastname = test($_POST["lastname"]);
			$birthday = test($_POST["birthday"]);
			$religion = test($_POST["religion"]);
			$address = test($_POST["address"]);
			$email = test($_POST["email"]);
			

			$errorMsg = "";

			if (empty($ID)) {
				$IDErrorMsg = "ID Name is empty <br>";
			}

			if (empty($firstname)) {
				$firstnameErrorMsg = "First Name is empty <br>";
			}

			if (empty($lastname)) {
				$lastnameErrorMsg = "Last Name is empty <br>";
				
			}

			if (empty($gender)) {
				$genderErrorMsg = "Gender is not selected <br>";
			}

			if (empty($birthday)) {
				$birthdayErrorMsg = "Birthday is empty <br>";
			}

			if (empty($religion)) {
				$religionErrorMsg = "religion is empty <br>";
			}

			if (empty($address)) {
				$addressErrorMsg = "address is empty <br>";
			}

			if (empty($email)) {
				$emailErrorMsg = "email is empty <br>";
			}
			if (empty($uname)) {
				$unameErrorMsg = "username is empty <br>";
			}
			
			else {
				echo $errorMsg;
			}

		}

		else {
			echo "php validation";
		}


            if(isset($_POST["pass"])){
            	$pass = $_POST["pass"];
            	$cpass = $_POST["cpass"];
            	
            	if(empty($pass)) {
				$passErrorMsg = "password is empty <br>";
			     }

			     if (empty($cpass)) {
				$cpassErrorMsg = " Confirm Password is empty <br>";
		         }

		         if ($_POST["pass"] == $_POST["cpass"]) {
                 echo "give a password!";
              }


                  else {
                     echo "did not mathced :(";
                       }		     

            }


              
	?>
	<?php
	
			if(file_exists('user.json'))
				{  
					$current_data = file_get_contents('user.json');
					$array_data = json_decode($current_data, true);
					$extra = array('username' => $username,
						'password' => $password,
						'firstname' => $firstname,
						'lastname' => $lastname,
						'dob' => $dob,
						'religion' => $religion,
						'email' => $email);
					$array_data[] = $extra;
					$final_data = json_encode($array_data);
					if(file_put_contents('user.json', $final_data))
						{  
							$message = "Registration Complete";
						}
					}
				else
				{
					$error = 'JSON File not exits'; 
				}

			?>
			<?php

error_reporting(0);
			
$ID =$_POST["ID"];
$firstname =$_POST["firstname"];
$lastname =$_POST["lastname"];
$birthday =$_POST["birthday"];
$religion = $_POST["religion"];
$address = $_POST["address"];
$email = $_POST["email"];


$conn =new mysqli('localhost','root','','validation');
if($conn->connect_error){
	echo "$conn->connect_error";
	die("connection failed:".$conn->connect_error);
}else{
	$stmt=$conn->prepare("insert into registration(firstname,lastname,birthday,religion,address,email)values(?,?,?,?,?,?)");
	$stmt->bind_param("ssssss",$firstname,$lastname,$birthday,$religion,$address,$email);
	$execval =$stmt->execute();
	echo $execval;
	//echo" successfull";
	$stmt->close();
	//$conn->close();


}







?>



			


<div id="ack"></div>

   <div id="error"></div>
	<form id="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" novalidate>

		<fieldset>
			<legend style="background-color:orange;"> Basic Information </legend>


			<tr>
      <td id="header">
        

        <div id="search-bar">
          <label>Search :</label>
          <input type="text" id="search" autocomplete="off">
        </div>
      </td>
    </tr>

			

		<label  for="fname"  style="color:blueviolet;">First Name*:</label>
		<input type="text" name="firstname" id="fname">
		<span><?php echo $firstnameErrorMsg; ?></span>

		<br><br>

		<label for="lname"  style="color:blueviolet;" >Last Name*:</label>
		<input type="text" name="lastname" id="lname">
		<span><?php echo $lastnameErrorMsg; ?></span>

		<br><br>

		<label id="gender" for="gen"  style="color:blueviolet;" >Gender*:</label>

			<input type="radio" id="male" name="gender" value="m"><label for="male">Male</label>
		
			<input type="radio" id="female" name="gender" value="f"><label for="female">Female</label>
			<input type="radio" id="others" name="gender" value="o"><label for="others">Others</label>

			


			<br><br>

			<label for="birthday" style="color:blueviolet;" >Birthday*:</label>
            <input type="date" id="birthday" name="birthday">
            <span><?php echo $birthdayErrorMsg; ?></span>


			<br><br>

			<label for="religion"  style="color:blueviolet;" >Religion*:</label>
			<select name="religion" id="religion">
				<option value=""></option>
				<option value="muslim">MUSLIM</option>
				<option value="hindu">HINDU</option>
				<option value="bodhu">BODHU</option>
				<option value="christianity">CHRISTAN</option>
			</select>
			<span><?php echo $religionErrorMsg; ?></span>

		</fieldset>
		<br><br>



		<fieldset>
			<legend  style="background-color:orange;" > Contact Information</legend>

			<label id="address" for="address" style="color:blueviolet;"  >Present Address*:</label>
			<textarea name="address" id="address" placeholder="Write your address please" rows="1" cols="30"></textarea>
			<span><?php echo $addressErrorMsg; ?></span>

			<br><br>

			

			<label for="des" style="color:blueviolet;" >Tell me something about yourself:</label>
			<textarea name="description" id="des" placeholder=" write something within 250 characters"></textarea>

			<br><br>
			<label id="phone" for="phone" style="color:blueviolet;" >Enter a phone number:</label>
            <input type="tel" id="phone" name="phone" placeholder="01*********" >

            <br><br>

            <label for="email" style="color:blueviolet;" >Enter your email*:</label>
            <input type="email" id="email" name="email"  pattern=".+@globex\.com" size="30" >
           
            <span><?php echo $emailErrorMsg; ?></span>

            <br><br>
            <a href="https://www.facebook.com/profile.php?id=100003405692623" target="_blank">click here</a> to visite facebook)
         </fieldset>
         <br><br>

         <tr>
      <td id="table-data">
      </td>
    </tr>



         
		<br><br>
		<input style="background-color:red;" type="submit" name="submit" value="submit">
		<br><br><a href="table1.php"><input  style="color:royalblue;" type="button"value="Refresh" ></a>

		<br>
		<br>
		<br>
		
	<br>
	<a href="welcome.php"><input style="color:red;"  type="button"value="back to home" ></a>

	<br>
		<br>
		<br>




		<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">

$(document).ready(function(){


	 function loadTable(){
      $.ajax({
        url : "ajax-load.php",
        type : "POST",
        success : function(data){
          $("#table-data").html(data);
        }
      });
    }


  $("#search").on("keyup",function(){
       var search_term = $(this).val();

       $.ajax({
         url: "ajax-live-search.php",
         type: "POST",
         data : {search:search_term },
         success: function(data) {
           $("#table-data").html(data);
         }
       });
     });
   });


		</script>
	</form>

</body>


</html>