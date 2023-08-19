<!DOCTYPE html>
<html>
    <head>
        <title>Login Page</title>
        <meta charset = "UTF - 8">
		<meta name = "viewport"  content = "width = device - width, initial - scale = 1.0">
        <link href = "css/login.css" rel="stylesheet" type = "text/css">
    </head>
    <body style="background-image: url(image/logo.jpg);">
            <form id="first" action=" " method="post">

			    <b>Username: </b><br>
			
		     	<input type = "text" name = "username"> <br>
			
		    	<b>Password: </b> <br>
		    	<input type = "password" name = "pass" maxlength="20"> <br>
			
		    	<input type ="submit" value="Login" name="login" id="button">
                
	    	</form>
            <?php
				
				include 'config.php';
					
				if(isset($_POST["login"])){

					include 'config.php';
					
					

					$user = $_POST["username"];
					$pass = $_POST["pass"];


					$sqlcheck = "SELECT * FROM admin WHERE ADMIN_USERNAME = '$user'AND ADMIN_PASSWORD = '$pass'";
					
					$result = mysqli_query($conn,$sqlcheck);	
					
					if ($result) {
						if (mysqli_num_rows($result) > 0) {
							echo "<script>alert('Login Successful!\\nWelcome ".$user."');location.href='admin_page.php';</script>";
						}
					}
					
					session_start();
					$_SESSION["username"] = $user;

				}
				
			?>


    </body>

</html>