<?php 

		include 'config.php';

		error_reporting(0);

		session_start();

		if (isset($_POST['signUp'])) {
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$address = $_POST['address'];
			$username = $_POST['username'];
			$password = $_POST['password'];
			$gender = $_POST['gender'];
				
				$sql2 = "INSERT INTO customer (CUST_USERNAME, CUST_PASSWORD, CUST_ADDRESS, CUST_GENDER,CONTACT_NO, CUST_EMAIL)
				VALUES ('$username', '$password', '$address',' $gender', '$phone', '$email')";
				$sendsql = mysqli_query($conn,$sql2);	

				if ($sendsql) {
					echo "<script>alert('Congratulation! Welcome to D-SIGN Clothing Store.');location.href='login.php';</script>";
					// header("location:login.php"); 
				}
				else
				{
					echo mysqli_error();
				} 
		}
?>
<!DOCTYPE html>
<html>
	<head >
		<style>
			body, html {
			  height: 100%;
			  margin: 0;
			  
			}
			
			.bg-img {
				background-image: url("image/logo.jpg");
				height: 100%;			
				background-position: center;
				background-repeat: no-repeat;
				background-size: cover;  
			}			
			
			.content{
				width: 100%;
				height: 250px;
				display: flex;
				align-items: center;
				justify-content: center;
			}
			
			form{
				  background-color: #7D9D9C; 
				  display: flex;
				  flex-direction: column;
	              padding: 2vw 4vw;
	              width: 90%;
	              max-width: 250px;
	              border-radius: 10px;	
				  font-family: Arial;
			}
			
			container{
				text-align:items;
				text-align:center;
				
				
			}
			
			#button
			{
				padding: 5px;
				text-align: center;
				font-weight: bold;
				background-color: black;
				color: white;
				transition: 0.5s;
			}
			#button:hover
			{
				background-color: #E4DCCF;
				color: black;
				transform: scale(1.1);
			}
		</style>
	</head>
	
	<body>
		<div class="bg-img">
		<br><br><br><br><br><br><br><br><br>
			
		<br><br>

		<div class="content">
		<div class="container">
		<form action="" method="post">	

			<h2 text-align="center">Register Account</h2>
			<label for="name">Username :</label>
			<input type="text" name="username" placeholder="Enter your username"  value="<?php echo $username; ?>">
			<br>
			<label for="password">Password :</label>
			<input type="text"name="password" placeholder="Enter your password" value="<?php echo $password; ?>">
			<br>
			<label for="email">E-mail :</label>
			<input type="email" name="email" placeholder="Enter your email" value="<?php echo $email; ?>">
			<br>
			<label for="phone">Phone Number :</label>
			<input type="text" name="phone" placeholder="Enter your phone number" value="<?php echo $phone; ?>">
			<br>
			<label for="address">Address :</label>
			<input type="text" name="address" placeholder="Enter your address" value="<?php echo $address; ?>">
			<div>
			<p>Gender:</p> 
			<input type="radio" id="male" name="gender" value="male">
			<label for="male">Male</label>
			<input type="radio" id="female" name="gender" value="female">
			<label for="female">Female</label>
			</div>
			<br>
			<input type="submit" name="signUp" value="Sign Up">
			<p> Already Registered? <a href="login.php">Log In Here</a></p>
							
		</form>
		</div>	         
		</div>
		</div>
		
	</body>
</html>
