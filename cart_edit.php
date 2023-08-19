<!DOCTYPE html>
<html lang="en">
  <head>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>eCommerce Product Detail</title>
	<link rel="stylesheet" href="css/product.css">
    
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
	<?php
  session_start();
	include 'config.php';
	if(isset($_GET['orderID'])){
      $orderID=mysqli_real_escape_string($conn,$_GET['orderID']);
          
      // $sql="SELECT * FROM ORDER WHERE ORDER_NO='$orderID'";
      $sql = "SELECT * FROM product p, customer c, orders o WHERE p.PRODUCT_ID=o.PRODUCT_ID AND c.CUST_ID=o.CUST_ID AND o.ORDER_NO='$orderID'";
		
      $result=mysqli_query($conn,$sql);
      $row=mysqli_fetch_assoc($result);
      echo "<form method=\"post\"";
        echo "<div style=\"padding:20px; background:#F0EBE3\">";
          echo "<div class=\"container\">";
            echo "<div class=\"card\">";
              echo "<div class=\"container-fliud\" >";
                echo "<div class=\"wrapper row\">";
                  echo "<div class=\"preview col-md-6\">";
                    echo "<div class=\"preview-pic tab-content\">";
                      echo "<div class=\"tab-pane active\" id=\"pic-1\"><img src=\"data:image;base64,". base64_encode($row["PRODUCT_IMG"]) ."\" \"></div>";
                    echo "</div>";
                  echo "</div>";
                  echo "<div class=\"details col-md-6\">";
                    echo "<h3 class=\"product-title\" style=\"text-align:left;\">".$row['PRODUCT_NAME']."</h3>";
                    echo "<p class=\"product-description\" style=\"text-align:left;\" >".$row['PRODUCT_DESC']."</p>";
                    echo "<h4 class=\"price\" style=\"text-align:left;\">Price: RM<span>".$row['PRODUCT_PRICE']."</span></h4>";
                    echo "<div style=\"text-align: left; align-items: left; vertical-align:left; margin-right:15px;\">";
                    echo "<label for=\"quantity\" class=\"price\" style=\"text-align:left;\"><h4>Quantity:</h4></label>";
                    echo "<input type=\"number\" name=\"quantity\" value=".$row['ORDER_QTY'].">";
                    echo "</div>";
                    echo "<br>";
                    echo "<div class=\"action\" style=\"text-align:center;\">";
                      echo "<button class=\"add-to-cart btn btn-default\" type=\"submit\" name=\"updateCart\">Save</button>";
                    echo "</div>";
                  echo "</div>";
                echo "</div>";
              echo "</div>";
            echo "</div>";
          echo "</div>";
        echo "</div>";
      echo "</form>";

      $username=$_SESSION['username'];
      $sql2="SELECT * FROM customer WHERE CUST_USERNAME='$username'";
      $result2=mysqli_query($conn,$sql2);
      $rowCustomer=mysqli_fetch_assoc($result2);

      $userId=$rowCustomer['CUST_ID'];

      if (isset($_POST['updateCart'])) {
        $orderQty = $_POST["quantity"];
				$orderNo = $row['ORDER_NO'];
				$sql3="UPDATE orders 
               SET ORDER_QTY='$orderQty'
               WHERE ORDER_NO = '$orderNo'";
				$result=mysqli_query($conn,$sql3);
        if($result){
          echo "<script>location.href='cart.php'</script>";
        }
        else{
          echo mysqli_error;
        }
        }
      }
			
	?>
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