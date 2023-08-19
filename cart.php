<?php

include 'config.php';


if(isset($_GET['orderID'])){
   $id = $_GET['orderID'];
   mysqli_query($conn, "DELETE FROM ORDERS WHERE ORDER_NO = $id");
   header('location:cart.php');
};

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
  
  <title>Shopping Cart</title>

  <!--
    - custom css link
  -->
  <link rel="stylesheet" href="css/cartStyle.css">
  <link rel="stylesheet" href="css/style1.1.css">

  <!--
    - google font link
  -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+3:200,300,regular,500,600,700,800,900,200italic,300italic,italic,500italic,600italic,700italic,800italic,900italic" rel="stylesheet" />

 
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
              <li class="nav-item"> 
               <a class="nav-link" href="userOption.php"><i class="fa-solid fa-arrow-right-from-bracket"></i></a> 
              </li>
              </li>
            </ul>
          </div>
        </div>
    </nav>
  </div>
<!--HEADER-->
    

<!--CONTENT-->

    <?php
    session_start();
		include 'config.php';
		// $sendsql = mysqli_query($conn, $sql);

    $username=$_SESSION['username'];
    $sql2="SELECT * FROM customer WHERE CUST_USERNAME='$username'";
    $result=mysqli_query($conn,$sql2);
    $rowCustomer=mysqli_fetch_assoc($result);
    $userId=$rowCustomer['CUST_ID'];

		$sql = "SELECT * FROM product p, customer c, orders o 
            WHERE p.PRODUCT_ID=o.PRODUCT_ID 
            AND c.CUST_ID=o.CUST_ID 
            AND o.CUST_ID='$userId' 
            AND o.ORDER_STATUS<=0";
			
		$sendsql = mysqli_query($conn, $sql);
    $sendsql2 = mysqli_query($conn, $sql);

    $total=0.0;

  echo "<div class=\"container-cart\" style=\"background-color: #E4DCCF;\">";
    echo "<h1 class=\"heading\">";
      echo "<ion-icon name=\"cart-outline\"></ion-icon> Shopping Cart";
    echo "</h1>";
    echo "<div class=\"item-flex\">";

      echo "<section class=\"checkout\" style=\"background-color: #E4DCCF;\">";
        echo "<h2 class=\"section-heading\">Payment Details</h2>";
        echo "<form method=\"post\">";
          echo "<div class=\"payment-form\">";
              echo "<div class=\"payment-method\">";
                echo "<button class=\"method selected\">";
                  echo "<i class=\"fa-solid fa-credit-card\"></i>";
                  echo "<span>Credit Card</span>";
                  echo "<input type=\"radio\" name=\"payMethod\" value=\"Credit Card\">";
                echo "</button>";
                echo "<button class=\"method\">";
                  echo "<i class=\"fa-solid fa-money-bill-1\"></i>";
                  echo "<span>CASH ON DELIVERY</span>";
                  echo "<input type=\"radio\" name=\"payMethod\" value=\"Cash On Delivery\">";
                echo "</button>";
              echo "</div>";

              echo" <button  type=\"submit\" class=\"btn btn-primary\"  name=\"payment\">";
                echo "<b>Pay</b>RM<span id=\"totals\"></span>";
              echo "</button>";

          echo "</div>";
        echo "</form>";

        echo "<script>";
          echo "function paymentSuccess(){";
            echo"alert(\"Your payment is successful\")";
            echo "window.location.href =\"main.php\";}";
        echo "</script>";
      echo "</section>";

      echo"<div class=\"cart\">";

        echo "<form action=\"\" method=\"post\">";
            echo"<div class=\"cart-item-box\">";
              echo"<h2 class=\"section-heading\">Order Summary</h2>";
              
              if($sendsql)
              {
                $cQty=1;
                foreach($sendsql as $row)
                {
                  $total += ($row['PRODUCT_PRICE']*$row['ORDER_QTY']);
                  echo"<div class=\"product-card\">";
                    echo"<div class=\"card\">";
                      echo"<div class=\"img-box\">";
                        echo"<img src=\"data:image;base64,".base64_encode($row["PRODUCT_IMG"])."\" alt=\"Uniqlo\" width=\"80px\" class=\"product-img\">";
                        
                      echo"</div>";
                      echo"<div class=\"detail\">";
                        echo"<h4 class=\"product-name\ style=\"text-align:left\">".$row["PRODUCT_NAME"]."</h4>";
                        echo"<div class=\"price\" style=\"text-align:left\">";
                            echo"RM<span id=\"price\">".$row["PRODUCT_PRICE"]."</span>";
                            echo "<br>Quantity: <span id=\"price\">".$row["ORDER_QTY"]."</span>";
                            echo "<br>Sub total: RM<span>".$row['PRODUCT_PRICE']*$row['ORDER_QTY']."</span>";
                        echo"</div><br>";
                        echo"<div class=\"wrapper\">";
                          echo"<div class=\"product-qty\">";
                            echo "<br><button type=\"button\" style=\"background-color:black;\"><a href=\"cart_edit.php?orderID={$row['ORDER_NO']}\">EDIT</a></button>";
                            echo "<br><button style=\"background-color:black;\" name=\"delete\"><a href=\"cart.php?orderID={$row['ORDER_NO']}\">DELETE</a></button>";
                          echo"</div>";
                        echo"</div>";
                      echo"</div>";
                    echo"</div>";
                  echo"</div>";
                }
              }
              else
					    echo "Query failed";
            echo"</div>";
        echo "</form>";
        echo "<div class=\"wrapper\">";
          echo "<div class=\"amount\">";
            echo "<div class=\"total\">";
              echo "<span>Total</span> <span>RM<span id=\"total\"></span></span>";
            echo "</div>";
          echo "</div>";
        echo "</div>";
      echo "</div>";
  echo "</div>"; 
    ?>

<script> 
var total = <?php echo $total ?>;
document.getElementById('total').innerHTML = total.toFixed(2);
document.getElementById('totals').innerHTML = total.toFixed(2);

var totalPriceItem = <?php echo ($row['PRODUCT_PRICE']*$row['ORDER_QTY']) ?>;
document.getElementById('totalPriceItem').innerHTML = totalPriceItem.toFixed(2);
</script>

    <?php

    $username2=$_SESSION['username'];
    $sql2="SELECT * FROM customer WHERE CUST_USERNAME='$username2'";
    $result2=mysqli_query($conn,$sql2);
    $rowCustomer=mysqli_fetch_assoc($result2);
    $userId2=$rowCustomer['CUST_ID'];

            if (isset($_POST['payment'])) {
              $payMethod=$_POST['payMethod'];
              $orderNO =$row['ORDER_NO'];
              
              while($row2=mysqli_fetch_assoc($sendsql2)){
                $orderNo2=$row2['ORDER_NO'];
                $quantity=$row2['ORDER_QTY'];
                $total2=$row2['ORDER_PRICE']*$quantity;
                $sql3="INSERT INTO PAYMENT (PAYMENT_METHOD,PAYMENT_AMOUNT,ORDER_NO) VALUES ('$payMethod','$total2','$orderNo2')";
                $result=mysqli_query($conn,$sql3);
                if($result){
                  $sql4="UPDATE ORDERS SET ORDER_STATUS=1  WHERE ORDER_NO = '$orderNo2'";
                  $result2=mysqli_query($conn,$sql4);
                  echo "<script>alert(\"Payment Successful!\");window.open('cart.php','_self')</script>";
                  echo "<script>location.href='cart.php'</script>";
                }
                else{
                  echo mysqli_error;
                }
              }
            }
            
    ?>

  <script src="cart.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
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