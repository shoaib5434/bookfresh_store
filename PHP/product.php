 <?php

include "database_connection.php";
$id = 1;
if (isset($_GET['id'])) $id=$_GET['id'];

$querry="SELECT * from product_detail where id= '$id' ";

$result=mysqli_query($conn,$querry);

$show = mysqli_fetch_assoc($result);
$catg=$show["product_category"];

$qur="SELECT * from product_detail where product_category='$catg' ";
$run=mysqli_query($conn,$qur);
 



?>
<!DOCTYPE html>
<html lang="en">
  <head>
     
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css?_cacheOverride=1647399579560">
    <!-- Bootstrap CSS -->
    <link href='https://netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' rel='stylesheet'/>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <title>Product Details</title>
    <style type="text/css">
      .navbar {
        background: black;
      }
      .notification {
        width: 200px;
        height: 40px;
        position: fixed;
        left: 50%;
        top: 50%;
        transform: translate(-50%,-50%);
        font-size:20px;
        text-align: center;
        background-color: white;
        line-height: 40px;
        display: none;
        color: white;
        z-index: 999999;
        border : 4px solid green;
      }
      .notification.green {
        border-color: green;
         color: green;
      }
      .notification.red {
        border-color: red;
        color: red;
      }
    </style>
  </head>
  <body>
       <!--Navbar-->
    <section class="Navbar">
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark  p-md-3">
        <div class="container">
          <a  href="index.php" class="navbar-brand">
            <!--logo-->
            <img src="../images/logo.png" alt="" width="40" height="26" class="d-inline-block align-text-top">
              BookFresh Store</a>
          <button class="navbar-toggler" 
         type="button"
         data-bs-toggle="collapse" 
         data-bs-target="#navbarNav"
         aria-controls="navbarNav" 
         aria-expanded="false"
         aria-label="Toggle Navbar">
            <span class="navbar-toggler-icon"></span>
          </button>
          <!--Navbar menu-->
          <div class="collapse navbar-collapse " id="navbarNav" >
              <div class="mx-auto"></div>
            <ul class="navbar-nav">
              <li class="nav-item ">
                <a  href="index.php" class="nav-link text-white" >Home</a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link text-white">Sign in</a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link text-white">About Us</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Services
                </a>
                <!--Navbar dropdowen-->
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <li><a class="dropdown-item" href="#">Vegetables</a></li>
                  <li><a class="dropdown-item" href="#">Fruits</a></li>
                  <li><a class="dropdown-item" href="#">Georcy</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </section>
         <section class=" container sproduct my-5 pt-5">
        <div class="row mt-5">
            <div class="col-lg-5 col-md-12 col-12">
                <img class="img-fluid w-100" src="../images/<?php echo $show["product_img"]; ?>"  alt=" ">
                </div>
                
                 
             <div class="col-lg-6 col-md-12 col-12">
                <h6 class="text-secondary"> Home\<?php echo $catg  ;?></h6>
                <h3 class="py-4"> <?php echo $show["product_name"] ?> </h3>
                <h2><?php echo $show["price"]; ?></h2>
                <span class="text-secondary">Quantity:-</span><input id="quantityInput" type="number" value="1">
                <button href="#" class="btn btn-danger mx-auto addToCartBtn btn-block text-center btn-sm" data-id="<?php echo $show["id"] ?>">Add To Cart</button>
                <h4 class="mt-5 mb-5">product Description </h4>
                 <span>
                  <?php echo  $show["product_description"] ?>

                 </span>
                

                </select>

            </div>
        </div>

        </section>

        <section class="main_heading my-4">
            <div class="text-center ">
                  <h1 class="display-4  text-danger fw-bolder fst-italic"><span class="text-success fw-bolder fst-italic">Related</span> Products</h1>
                  <hr class="w-25 mx-auto">
            </div>
           <section class="product">

        <div class="container ">

          <div class="row gy-6 my-4">
                
                  <?php
                    
                    while ($array=mysqli_fetch_assoc($run)) {
                      
                    ?>

                   <div class=" col-sm-6  mx-auto col-md-3 col-lg-3 singleProduct click_it">

               <div class="card my-4"  >
             
                 <img style="height:200px; " class="card-img-top " src="../images/<?php echo $array['product_img'];?>" alt="Card image cap">
                 <div class="card-body">
                   <h4 class="card-title text-center"><?php echo $array['product_name'];?></h4>
                   <p class="card-text text-center text-muted"><?php echo  $array['price'];?></p>
                   <p class="card-text text-center text-muted"><?php echo $array['product_description'];?></p>
                   <button class="btn btn-danger addToCartBtn btn-block text -center"style="width: 100%; " data-id="<?php echo $array['id']; ?>">Add To Cart</button>
                 </div>

               </div>
             </div>
               <?php
                 }
                
               ?>
          </div>
        </div>
            </section>
     <!--Footer Start-->
  <footer class="nb-footer">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-3 mx-auto ">
            
          <div>
              <ul class="list-unstyled d-flex py-3  ">
                  <li>
                      <a href="#" class="text-white text-decoration-none text-muted fs-3 me-4">
                        <i class="bi bi-facebook "></i>
                      </a>
                  </li>s
                  <li>
                      <a href="#" class="text-white text-decoration-none text-muted fs-3 me-4">
                        <i class="bi bi-whatsapp"></i>
                      </a>
                  </li>
                  <li>
                      <a href="#" class="text-white text-decoration-none text-muted fs-3 me-4">
                        <i class="bi bi-twitter"></i>
                      </a>
                  </li>
                  <li>
                      <a href="#" class="text-white text-decoration-none text-muted fs-3 me-4">
                       <i class="bi bi-envelope-check-fill"></i>
                      </a>
                  </li>
                  <li>
                   <a href="#" class="text-white text-decoration-none text-muted fs-3 me-4">
                     <i class="bi bi-instagram"></i>
                   </a>
               </li>
              </ul>
          </div>
 </div>
 </div>
  
    <div class="row">
    <!--Services-->
    <div class="col-md-3 col-sm-6">
    <div class="footer-info-single">
    <h2 class="title">Our Services</h2>
    <ul class="list-unstyled">
    <li><a href="http://www.nextbootstrap.com/" title=""><i class="fa fa-angle-double-right"></i>Vegetables</a></li>
    <li><a href="http://www.nextbootstrap.com/" title=""><i class="fa fa-angle-double-right"></i> Fruits</a></li>
    <li><a href="http://www.nextbootstrap.com/" title=""><i class="fa fa-angle-double-right"></i>Georcy</a></li>
    </ul>
    </div>
    </div>
    <!--Contact us-->
    <div class="col-md-3 col-sm-6">
    <div class="footer-info-single">
    <h2 class="title">Contact Us</h2>
    <ul class="list-unstyled">
    <li><a href="http://www.nextbootstrap.com/" title=""><i class="fa fa-angle-double-right"></i> Address: Sargodha</a></li>
    <li><a href="http://www.nextbootstrap.com/" title=""><i class="fa fa-angle-double-right"></i>Email: Info@bookfresh.pk</a></li>
    <li><a href="http://www.nextbootstrap.com/" title=""><i class="fa fa-angle-double-right"></i> Phone 1: 0321-6542859</a></li>
    </ul>
    </div>
    </div>
    <!--About-->
    <div class="col-md-3 col-sm-6">
    <div class="footer-info-single">
    <h2 class="title">About</h2>
    <ul class="list-unstyled">
    <li><a href="http://www.nextbootstrap.com/" title=""><i class="fa fa-angle-double-right"></i>About Us</a></li>
    <li><a href="http://www.nextbootstrap.com/" title=""><i class="fa fa-angle-double-right"></i>Terms And Conditions</a></li>
    <li><a href="http://www.nextbootstrap.com/" title=""><i class="fa fa-angle-double-right"></i> Privacy Policy</a></li>
    </ul>
    </div>
    </div>
    <!--Payment & Shipping-->
    <div class="col-md-3 col-sm-6">
    <div class="footer-info-single">
    <h2 class="title">Payment &amp; Shipping</h2>
    <ul class="list-unstyled">
      <li><a href="http://www.nextbootstrap.com/" title=""><i class="fa fa-angle-double-right"></i>Terms of Use</a></li>
      <li><a href="http://www.nextbootstrap.com/" title=""><i class="fa fa-angle-double-right"></i>Payment Method</a></li>
      <li><a href="http://www.nextbootstrap.com/" title=""><i class="fa fa-angle-double-right"></i>Shipping Guide</a></li>
      <li><a href="http://www.nextbootstrap.com/" title=""><i class="fa fa-angle-double-right"></i>Estimeted Delivery Time</a></li>
      </ul>
    </div>
    </div>
    </div>
 </div>
  <section class="copyright">
      <div class="container ">
      <div class="row">
      <div class="col-sm-12">
      <p>©2022.BookFresh Store, All Rights Reserved.</p>
      </div>
      </div>
      </div>
   </section>
 
  
    
   


 
 
 





   
  <div class="notification"></div>
  <div class="bgBlur" id="blur"></div>
  </body>
    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
     </script>
     <script type="text/javascript">
       $(document).ready(function(){
        $('.addToCartBtn').on('click',function(){
          let quantity = $('#quantityInput').val();
          quantity = parseInt(quantity);
          $.ajax({
            url : 'action.php',
            method : 'post',
            data : {
              action : 'addToCart', id : $(this).data('id'), quantity : quantity
            },
            dataType : 'json',
            success : function (data) {
              if (!data.isLogedIn) {
                location = 'login.php'
              }
              $('.notification').show(500);
              $('.bgBlur').show(500);
              if (data.success) {
                $('.notification').text("Added To Cart!");
                $('.notification').addClass('green');
                // console.log();
              }
              else {
                $('.notification').text("Already In The Cart");
                $('.notification').addClass('red');
              }
              setTimeout(function(){
                $('.notification').hide();
                $('.bgBlur').hide();
                $('.notification').removeClass('green');
                $('.notification').removeClass('red');
              },2000);
            }
          })
        })
       })
     </script>
</html>
