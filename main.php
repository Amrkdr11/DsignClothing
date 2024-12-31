<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style1.1.css">
    <title>D-SIGN CLothing Store</title>
    <link rel="shortcut icon" href="https://drive.google.com/file/d/194UDJMle0Ubs2wY6TLOvq8Prf80qxl6Y/view"/> 
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

    <div class="image-header">
        <img src="image/clothss.png">
    </div>

<!--CONTENT-->

<div class="content">
<h2 style="text-align:center;">Our Product</h2>
  <div class="row">
    <?php
		include 'config.php'?>
		<?php
		$sql = "SELECT * FROM product";

					
		$sendsql = mysqli_query($conn, $sql);
		if($sendsql)
		{
			foreach($sendsql as $row)
			{
				echo " <div class=\"column\">";
					echo "<div class=\"card\">";
          echo "<div class=\"card-container\">";
					echo "<img src=\"data:image;base64,".base64_encode($row["PRODUCT_IMG"])."\" alt=\"outfit2\">";
					echo "</div>";
          echo "<br><p>".$row["PRODUCT_NAME"]."</p>";
					echo "<p>RM ".$row["PRODUCT_PRICE"]."</p>";
					echo "<button><a href=\"product.php?id={$row['PRODUCT_ID']}\">View Product</a></button>";
					echo "</div>";
				echo "</div>";
			}
		}
		else
				echo "Query failed!";
    ?>
	
  </div> 
</div>

<!--CONTENT-->

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
                D-SIGN Clothing Store is a business that sells most of its products involved in casual and stylish clothing.
                <span><br><br>Follow Us</span>
                <div class="footer-icons">
                  <img class="img-fluid w-25 h-100 mm-2" src="image/facebook-black.png">
                  <img class="img-fluid w-25 h-100 mm-2" src="image/instagram-black.png">
                  <img class="img-fluid w-25 h-100 mm-2" src="image/linkedin-black.png">
              </div>
        </div>

    </footer>
<!---FOOTER-->

      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>
</html>