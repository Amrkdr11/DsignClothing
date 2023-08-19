<?php

@include 'config.php';

$id = $_GET['edit'];

if(isset($_POST['update_product'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_desc = $_POST['product_description'];
   $product_qty = $_POST['product_quantity'];
   $product_image = addslashes(file_get_contents($_FILES['product_image']['tmp_name']));
   $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
   $product_image_folder = 'uploaded_img/'.$product_image;

   if(empty($product_name) || empty($product_price) || empty($product_image) ||empty($product_desc) || empty($product_qty)){
      $message[] = 'please fill out all!';    
   }else{

      $update_data = "UPDATE product SET PRODUCT_NAME='$product_name', PRODUCT_PRICE='$product_price', PRODUCT_IMG='{$product_image}'  WHERE PRODUCT_ID = '$id'";
      $upload = mysqli_query($conn, $update_data);

      if($upload){
         move_uploaded_file($product_image_tmp_name, $product_image_folder);
         echo "<script>alert(\"Product successfully updated!\");window.open('admin_page.php','_self')</script>";
         header('location:admin_page.php');
      }else{
         $message[] = 'please fill out all!'; 
      }

   }
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

<div style="background-color: #E4DCCF;">
<div class="container-product">
<div class="admin-product-form-container centered">

   <?php
      
      $select = mysqli_query($conn, "SELECT * FROM product WHERE PRODUCT_ID = '$id'");
      while($row = mysqli_fetch_assoc($select)){

   ?>
   
   <form action="" method="post" enctype="multipart/form-data">
      <h3 class="title">update the product</h3>
      <input type="text" class="box" name="product_name" value="<?php echo $row['PRODUCT_NAME']; ?>" placeholder="enter the product name">
      <input type="text" class="box" name="product_price" value="<?php echo $row['PRODUCT_PRICE']; ?>" placeholder="enter the product price">
      <input  type="text" class="box" name="product_description" value="<?php echo $row['PRODUCT_DESC']; ?>" placeholder="enter the product desccription">
      <input type="number" min="0" class="box" name="product_quantity" value="<?php echo $row['PRODUCT_QTY']; ?>" placeholder="enter the product quantity">
      <input type="file" class="box" name="product_image"  accept="image/png, image/jpeg, image/jpg">
      <input type="submit" value="update product" name="update_product" class="btn">
      <a href="admin_page.php" class="btn">Back to Product Detail</a>
   </form>

   <?php }; ?>
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