<?php				
	include 'config.php';

    
		$id = $_GET["CUST_ID"];

		$sql = "SELECT * FROM customer WHERE CUST_ID = '$id'";
		$qry = mysqli_query($conn,$sql);	
					
		$data = mysqli_fetch_array($qry); // fetch data
							
			if(isset($_POST["save"])){

                $custid = $_POST["custId"];
				$username = $_POST["username"];
                $password = $_POST["password"];
				$email = $_POST["email"];
				$phone = $_POST["phone"];
                $gender = $_POST["gender"];
                $address = $_POST["address"];

				$sql2 = "UPDATE customer
                         SET CUST_ID='$custid', CUST_USERNAME='$username', CUST_PASSWORD='$password', CUST_EMAIL='$email', CONTACT_NO='$phone', CUST_GENDER='$gender', CUST_ADDRESS='$address' 
						 WHERE CUST_ID='$id'";
				$sendsql = mysqli_query($conn,$sql2);	

				if ($sendsql) {
				
					//mysqli_close($dbname); // Close connection
					header("location:user_info.php"); // redirects to students list page
					exit;
				}
				else
				{
					echo mysqli_error();
				} 
			}
				
			?>

<!DOCTYPE html>
<html>
    <head>
        <title>User Edit Page</title>
        <meta charset = "UTF - 8">
		<meta name = "viewport"  content = "width = device - width, initial - scale = 1.0">
        <link href = "css/user_edit.css" rel="stylesheet" type = "text/css">

        <link rel="stylesheet" href="css/style1.1.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    </head>

    <body>

<!--HEADER-->
        <div style="background-color:#7D9D9C;">
            <nav class="navbar navbar-expand-lg py-3"  >
                <div class="container">
                  <img src="image/logo name landscape1.1.png" width="20%">
                  
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span><i id="bar" class="fa-solid fa-bars" ></i></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                      
                      <li class="nav-item">
                        <a class="nav-link" href="main.php">Home</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="product.php">Shop</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="about_us.php">About Us</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="help.php">Help</a>
                      </li>
                      <li class="nav-item"> 
                        <!--use v6.1.1-->
                        <a class="nav-link" href="search.php"><i class="fa-solid fa-magnifying-glass"></i></a>
                      </li>
                      <li class="nav-item"> 
                        <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping" ></i></a>
                      </li>
                      <li class="nav-item"> 
                       <a class="nav-link" href="user_info.php"><i class="fa-solid fa-user"></i></a> 
                      </li>
                      <li class="nav-item"> 
                       <a class="nav-link" href="userOption.php"><i class="fa-solid fa-arrow-right-from-bracket"></i></a> 
                      </li>
                    </ul>
                  </div>
                </div>
            </nav>
          </div>
<!--HEADER-->
<div style="background-color:#E4DCCF">
        <h1 id = "header">USER EDIT</h1>
        <br>
        <form id = "info" action ="" method = "post">   
            <table id = "user">
                <tr>
                    <td><label for="custId">CUSTOMER ID:</label></td>
                    <td><input type = "text" name = "custId" size = "30" value="<?php echo $data['CUST_ID'] ?>"></td>
                </tr>
                <tr>
                    <td><label for="username">NAME:</label></td>
                    <td><input type = "text" name = "username" size = "30" value="<?php echo $data['CUST_USERNAME'] ?>"></td>
                </tr>
                <tr>
                    <td><label for="password">PASSWORD:</label></td>
                    <td><input type = "text" name = "password" size = "30" value="<?php echo $data['CUST_PASSWORD'] ?>"></td>
                </tr>
                <tr>
                    <td><label for="email">EMAIL:</label></td>
                    <td><input type = "text" name = "email" size = "30" value="<?php echo $data['CUST_EMAIL'] ?>"></td>
                </tr>
                <tr>
                    <td><label for="phone">PHONE NUMBER:</label></td>
                    <td><input type = "text" name = "phone" size = "30" value="<?php echo $data['CONTACT_NO'] ?>"></td>
                </tr>
                <tr>
                    <td><label for="address">ADDRESS:</label></td>
                    <td><input type = "text" name = "address" size = "30" value="<?php echo $data['CUST_ADDRESS'] ?>"></td>
                </tr>
                <tr>
                    <td>GENDER</td>
                    <td>: 
                        <input type = "radio" name = "gender" value = "male">MALE
                        <input type = "radio" name = "gender" value = "female">FEMALE
                    </td>
                </tr>
            </table>
            <br>
            <input id = "btn" type = "submit" name = "save" value = "SAVE">
        </form>

        
</div>
        <!---FOOTER-->
<footer class="footer-distributed">
    <div class="footer-left">
        <img src="image/logo dc clear.png" >
        <h3>D-SIGN <span>Clothing Store</span></h3>


        <p class="footer-company-name">D-SIGN Clothing Store &copy;. All Rights Reserved</p>
        <br>
            <br>
            <button><a href="group_info.php">GROUP'S INFORMATION</a></button>
    </div>

    <div class="footer-center">

        <div>
            <i class="fa-solid fa-location-dot"></i>
            <p><span>Lot 41, Jalan Tun Samad,</span> 41150 Klang, Selangor,<span> Malaysia.</span></span></p>
        </div>

        <div>
            <i class="fa-solid fa-mobile-screen-button"></i>
            <p>+60-1163086011</p>
        </div>

        <div>
            <i class="fa-solid fa-envelope"></i>
            <p><a href="mailto:maleef.firdaus@gmail.com">DSIGN@gmail.com</a></p>
        </div>

    </div>

    <div class="footer-right">
        <p class="footer-company-about">
            <span>About the company</span>
            Lorem ipsum dolor sit amet, consectateur adispicing elit. Fusce euismod convallis velit, eu auctor lacus vehicula sit amet.
            
            <span><br><br>Follow Us</span>
            <div class="footer-icons">
              <img class="img-fluid w-25 h-100 mm-2" src="image/facebook-black.png">
              <img class="img-fluid w-25 h-100 mm-2" src="image/instagram-black.png">
              <img class="img-fluid w-25 h-100 mm-2" src="image/linkedin-black.png">
          </div>
    </div>

</footer>
<!---FOOTER-->
    </body>
</html>