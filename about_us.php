<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com -->
  <title>About Us</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>



  <link rel="stylesheet" href="css/style1.1.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />


  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap');

  body {
    font: 400 15px 'Poppins', sans-serif;
    line-height: 1.8;
    color: #818181;
  }
  
  h2 {
    font-size: 24px;
    text-transform: uppercase;
    color: #303030;
    font-weight: 600;
    margin-bottom: 30px;
  }
  h4 {
    font-size: 19px;
    line-height: 1.375em;
    color: #303030;
    font-weight: 400;
    margin-bottom: 30px;
  }  
  .jumbotron {
    background-color: #f4511e;
    color: #fff;
    padding: 100px 25px;
    font-family: 'Poppins', sans-serif;
  }
  .container-fluid {
    padding: 60px 50px;
  }
  .bg-grey {
    background-color: #f6f6f6;
  }
  .logo-small {
    color: #f4511e;
    font-size: 50px;
  }
  .logo {
    color: #f4511e;
    font-size: 200px;
  }
  .thumbnail {
    padding: 0 0 15px 0;
    border: none;
    border-radius: 0;
  }
  .thumbnail img {
    width: 100%;
    height: 100%;
    margin-bottom: 10px;
  }
  .carousel-control.right, .carousel-control.left {
    background-image: none;
    color: #f4511e;
  }
  .carousel-indicators li {
    border-color: #f4511e;
  }
  .carousel-indicators li.active {
    background-color: #f4511e;
  }
  .item h4 {
    font-size: 19px;
    line-height: 1.375em;
    font-weight: 400;
    font-style: italic;
    margin: 70px 0;
  }
  .item span {
    font-style: normal;
  }
  .panel {
    border: 1px solid #f4511e; 
    border-radius:0 !important;
    transition: box-shadow 0.5s;
  }
  .panel:hover {
    box-shadow: 5px 0px 40px rgba(0,0,0, .2);
  }
  .panel-footer .btn:hover {
    border: 1px solid #f4511e;
    background-color: #fff !important;
    color: #f4511e;
  }
  .panel-heading {
    color: #fff !important;
    background-color: #f4511e !important;
    padding: 25px;
    border-bottom: 1px solid transparent;
    border-top-left-radius: 0px;
    border-top-right-radius: 0px;
    border-bottom-left-radius: 0px;
    border-bottom-right-radius: 0px;
  }
  
  .slideanim {visibility:hidden;}
  .slide {
    animation-name: slide;
    -webkit-animation-name: slide;
    animation-duration: 1s;
    -webkit-animation-duration: 1s;
    visibility: visible;
  }
  @keyframes slide {
    0% {
      opacity: 0;
      transform: translateY(70%);
    } 
    100% {
      opacity: 1;
      transform: translateY(0%);
    }
  }
  @-webkit-keyframes slide {
    0% {
      opacity: 0;
      -webkit-transform: translateY(70%);
    } 
    100% {
      opacity: 1;
      -webkit-transform: translateY(0%);
    }
  }
  @media screen and (max-width: 768px) {
    .col-sm-4 {
      text-align: center;
      margin: 25px 0;
    }
    .btn-lg {
      width: 100%;
      margin-bottom: 35px;
    }
  }
  @media screen and (max-width: 480px) {
    .logo {
      font-size: 150px;
    }
  }
  </style>
</head>
<body>

<!--HEADER-->
<div style="background-color:#7D9D9C;">
    <nav class="navbar navbar-expand-lg py-3" style="background-color:#7D9D9C;">
        <div class="container">
          <img src="image/logo name landscape1.1.png" width="20% " >
          
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

<!-- Container (About Section) -->
<div id="about" class="container-fluid" style="background-color:#E4DCCF">
  <div class="row">
    <div class="col-sm-8">
      <h2>About Us</h2><br>
      <h4>D-SIGN Clothing Store is a business that sells most of its products involved in casual and stylish clothing. Originally, D-SIGN Clothing Store was just a small roadside business set up in Lot 41, Jalan Tun Samad, Klang, Selangor by an ambitious entrepreneur who is very interested in the field of clothing and embroidery, and none other than Mr. Che Adib. He has a high determination to make the patterns and shapes of the clothes he sells widespread and hopes many people will wear and buy his designer products.</h4><br>
    </div>
    <div class="col-sm-4">
      <img src="image/container.jpg" alt="">
    </div>
  </div>
</div>
<div class="container-fluid bg-grey" style="background-color:#F0EBE3">
  <div class="row">
    <div class="col-sm-4">
        <img src="image/logoAboutUs.png" alt="">
    </div>
    <div class="col-sm-8">
      <h2>Our Values</h2><br>
      <h4><b>MISSION:</b><br> to provide high quality, stylish and basic casual wear at the lowest price - casual wear that can be worn by anyone anytime and anywhere.</h4><br>
      <h4><b>VISION:</b><br>To be the number 1 clothing seller in the world while serving the community by producing products that are friendly and comfortable with the surrounding community.</h4>
    </div>
  </div>
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
            D-SIGN Clothing Store is a business that sells most of its products involved in casual and stylish clothing.
            <span><br><br>Follow Us</span>
          </p>

        <div class="footer-icons">
            <img class="img-fluid w-25 h-100 mm-2" src="image/facebook-black.png">
            <img class="img-fluid w-25 h-100 mm-2" src="image/instagram-black.png">
            <img class="img-fluid w-25 h-100 mm-2" src="image/linkedin-black.png">
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>

</footer>
<!---FOOTER-->
</body>
</html> 