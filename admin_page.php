<?php

@include 'config.php';

session_start();
$username = $_SESSION["username"];

$username=$_SESSION['username'];
$sql2="SELECT * FROM admin WHERE ADMIN_USERNAME='$username'";
$result2=mysqli_query($conn,$sql2);
$rowCustomer=mysqli_fetch_assoc($result2);
$userId=$rowCustomer['ADMIN_ID'];

if(isset($_POST['add_product'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_desc = $_POST['product_description'];
   $product_qty = $_POST['product_quantity'];
   $product_image = addslashes(file_get_contents($_FILES['product_image']['tmp_name']));
   $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
   $product_image_folder = 'image/'.$product_image;

   if(empty($product_name) || empty($product_price) || empty($product_image) ||empty($product_desc) || empty($product_qty)){
      $message[] = 'please fill out all';
   }else{
      $insert = "INSERT INTO product (PRODUCT_NAME, PRODUCT_PRICE, PRODUCT_DESC, PRODUCT_QTY, PRODUCT_IMG, ADMIN_ID) 
                 VALUES('$product_name', '$product_price', '$product_desc', '$product_qty', '{$product_image}', '$userId')";
      $upload = mysqli_query($conn,$insert);
      if($upload){
         move_uploaded_file($product_image_tmp_name, $product_image_folder);
         echo "<script>alert(\"New product added successfully!\");window.open('admin_page.php','_self')</script>";
      }else{
         $message[] = 'could not add the product';
      }
   }
};

if(isset($_GET['delete'])){
   $id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM product WHERE PRODUCT_ID = $id");
   header('location:admin_page.php');
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style1.1.css">
   <title>admin page</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   <link rel="stylesheet" href="css/styleAdmin.css">

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
                <a class="nav-link" href="admin_page.php">Product Detail</a>
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

if(isset($message)){
   foreach($message as $message){
      echo '<span class="message">'.$message.'</span>';
   }
}

?>

<div style="background-color: #E4DCCF; padding: 20px;">
<div class="container-product">

   <div class="admin-product-form-container">

      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
         <h3>add a new product</h3>
         <input type="text" placeholder="enter product name" name="product_name" class="box">
         <input type="text" placeholder="enter product price" name="product_price" class="box">
         <input type="text" placeholder="enter product description" name="product_description" class="box">
         <input type="number" placeholder="enter product quantity" name="product_quantity" class="box">
         <input type="file" accept="image/png, image/jpeg, image/jpg" name="product_image" class="box">
         <input type="submit" class="btn" name="add_product" value="add product">
      </form>

   </div>


   <?php
   $select = mysqli_query($conn, "SELECT * FROM product");
   ?>

   
   <div class="product-display">
      <table class="product-display-table">
         <thead style="border: 1px solid black;">
         <tr>
            <th>product image</th>
            <th>product name</th>
            <th>product price</th>
            <th>product quantity</th>
            <th>action</th>
         </tr>
         </thead>
         <?php while($row = mysqli_fetch_assoc($select)){ ?>
         <tr  style="border: 1px solid black;">
            <td>
            <?php echo "<img style=\"border: 1px solid black; max-width:50%;\"src=\"data:image;charset=utf8;base64,".base64_encode($row["PRODUCT_IMG"])."\" alt=\"outfit\">"; ?></td>
            <td><?php echo $row['PRODUCT_NAME']; ?></td>
            <td>RM<?php echo $row['PRODUCT_PRICE']; ?></td>
            <td><?php echo $row['PRODUCT_QTY']; ?></td>
            <td>
               <a href="admin_update.php?edit=<?php echo $row['PRODUCT_ID']; ?>" class="btn"> <i class="fas fa-edit"></i> edit </a>
               <a href="admin_page.php?delete=<?php echo $row['PRODUCT_ID']; ?>" class="btn"> <i class="fas fa-trash"></i> delete </a>
            </td>
         </tr>
      <?php } ?>
      </table>
   </div>

</div>
</div>
<!---FOOTER-->
<footer class="footer-distributed">
        <div class="footer-left">
            <img src="image/logo dc clear.png" >
            <h3>D-SIGN <span>Clothing Store</span></h3>
            <p class="footer-company-name">D-SIGN Clothing Store &copy;. All Rights Reserved</p>
        </div>

        <div class="footer-center">

            <div>
                <i class="fa-solid fa-location-dot"></i>
                <p><span>Lot 41, Jalan Tun Samad,</span><span> 41150 Klang, Selangor,</span><span> Malaysia.</span></span></p>
            </div>

            <div>
                <i class="fa-solid fa-mobile-screen-button"></i>
                <p><span>+60-1163086011</span></p>
            </div>

            <div>
                <i class="fa-solid fa-envelope"></i>
                <p><span><a href="mailto:maleef.firdaus@gmail.com">DSIGN@gmail.com</a></span></p>
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