 <?php

include "database_connection.php";

$cgry=$_GET['category'];

$query="SELECT * from product_detail where product_category='".$cgry."' "; 

$result=mysqli_query($conn,$query);


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta t ags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <!-- <link href='//netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' rel='stylesheet'/> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
     <title>Home Page</title>
     <style type="text/css">
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
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark p-md-3">
        <div class="container">
          <a  href="index.php" class="navbar-brand">
            <!--logo-->
            <img src="logo.png" alt="" width="40" height="26" class="d-inline-block align-text-top">
              BookFresh Store</a>
          
        </div>
        
      </nav>
    </section>
   
            <section class="header">
      <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators" class="my">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        
        <div class="carousel-inner " style="width: 100%;height: 400px">
          <!--img1-->
          <div class="carousel-item active" style="width: 100%;height: 400px">
          <img src="../images/font2.jpg" class="d-block w-100" style="width: 100%;height: 450px"alt="...">
          </div>
          <!--img2-->
          <div class="carousel-item">
            <img src="../images/fon11.png" class="d-block w-100"style="width: 100%;height: 450px" alt="...">
          </div>
          <!--img3-->
          <div class="carousel-item">
            <img src="../images/front3.png" class="d-block w-100"style="width: 100%;height: 450px" alt="...">
          </div>
        </div>
        <!--img-arrow-prev-->
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
         <!--img-arrow-next-->
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </section>
  <!--top img-->
  
    <section class="main_heading my-4">
      <div class="text-center ">            
            <h1 class="display-4  text-danger fw-bolder fst-italic"><span class="text-success fw-bolder fst-italic">
            </span>
            <?php
             echo $cgry;
              ?>
          </h1>
                 
           
            <hr class="w-25 mx-auto">
            <p class="text-capitalize w-75 mx-auto text-center">A wide range of fresh fruits is available online for you to buy. Buy fresh fruits online or from our shop in islamabad & peshawar. Handpicked directly from the farmers, carefully processed, and sold online at reasonable rates in Islamabad. Maintaining the freshness and quality you deserve. You can do fresh fruits shopping for home, office and gift to your loved ones at any occasion like birthday, anniversary or to congratulate.</p>
      </div>

      </section>

      <section class="product">

        <div class="container ">

          <div class="row gy-6 my-4">
             <?php 
           $allRslt = mysqli_fetch_all($result,MYSQLI_ASSOC);
           $i = 0;
           foreach($allRslt as $show) {

           ?>
            <div class=" col-sm-6  mx-auto col-md-3 col-lg-3 singleProduct">

               <div class="card my-4"  >
             
                 <img style="height:200px;" class="card-img-top click_it" src="../images/<?php echo $show['product_img'];?>" alt="Card image cap" data-id="<?php echo $show['id']; ?>">
                 <div class="card-body">
                   <h4 class="card-title text-center"><?php echo $show['product_name'];?></h4>
                   <p class="card-text text-center text-muted"><?php echo  $show['price'];?></p>
                   <p class="card-text text-center text-muted"><?php echo $show['product_description'];?></p>
                   <button class="btn btn-danger btn-block text-center addToCartBtn"style="width: 100%;" data-id="<?php echo $show['id']; ?>">Add To Cart</button>
                 </div>

               </div>
             </div>
            <?php

            ++$i;
          }
          
 ?>

          </div>
         
        </div>

      </section>

       <!--boostratp js start-->
      <!--<script src="js/bootstrap.bundle.min.js"></script>
      <script>
          var nav = document.querySelector("nav");
          window.addEventListener("scroll", function(){
              if(window.pageYOffset>100){
               nav.classList.add("bg-dark","shadow");
              } else {
                  nav.classList.remove("bg-dark", "shadow");
              }
              });
     </script>-->
     <!--boostratp js End-->
    
   
 

  <!--Fresh Vegetables end-->
  <!--Footer Start-->
  <footer class="nb-footer">
    <div class="container">
    <div class="row">
    <div class="col-sm-12">
    <div class="about">
    <img src="images/logo.png" class="img-responsive center-block" alt="">
    </div>
    </div>
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
    <h2 class="title">Payment & Shipping</h2>
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
    <!--Copyright-->
    <section class="copyright">
    <div class="container">
    <div class="row">
    <div class="col-sm-12">
    <p>©2022.BookFresh Store, All Rights Reserved.</p>
    </div>
    </section>
    </footer>

</body>
 
 <link rel="stylesheet"  href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <div class="bgBlur" id="blur">
   </div> 
  <div class="popUpModal" data-target="p-1" id="show_popup">
    <i class="fas fa-times " id="cancel" ></i>

    <img src="font10.jpg">
    <h3>strawberry</h3>
    <div class="stars">
    <i class="fa fa-star"></i>
    <i class="fa fa-star"></i>
    <i class="fa fa-star"></i>
    <i class="fa fa-star"></i>
    <i class="fa fa-star-half-alt"></i> </div>
     <p class="detail">thdiw iwhiw www ls mrrj shdhwiud wlklw ;lwjdjw jjd w d</p>
     <p class="price">200.pkr</p>
     <div class="end">
     <button class="cart addToCartBtn" data-id="">Add To Cart</button>
     <a href="product.php?id=1" class="cart detail_link">more detail</a>
     
      </div>
   </div>
    <div class="notification"></div>
</body>
 




    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
     <!--boostratp js start-->
      <script src="js/bootstrap.bundle.min.js"></script>
      <script>
          var nav = document.querySelector("nav");
          window.addEventListener("scroll", function(){
              if(window.pageYOffset<100){
               nav.classList.add("bg-dark","shadow");
              //} //else {
                 // nav.classList.remove("bg-dark", "shadow");
              }
              });
     </script>
    <script>
      $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        responsive:{
            0:{
                items:2
            },
            600:{
                items:3
            },
            1000:{
                items:5
            }
        }
      });
     

    $('.click_it').on('click',function(){

      $('#show_popup').show();
      $('#blur').show();
      let id = $(this).data('id');
      $.ajax(
      {
        url:'request_page.php',
        method:"post",
        
        data : {
          id : id
        },
        dataType : 'json',
      success:function(data){
      console.log(data);
        
          $('#show_popup img').attr("src","../images/"+data.product_img);
          $('#show_popup h3').text(data.product_name);
          $('#show_popup p.detail').text(data.product_description);
          $('#show_popup p.price').text(data.price);
          $('#show_popup a.detail_link').attr("href","product.php?id="+data.id);
          $('#show_popup button.addToCartBtn').attr("data-id",data.id);

        
       }

       });

     
      }
       );
     $('#cancel').on('click',function() {
        $('#show_popup').hide();
        $('#blur').hide();
      });
      $('#blur').on('click',function() {
        $('#show_popup').hide();
        $('#blur').hide();
      });
      $('.addToCartBtn').on('click',function(){
        let id = $(this).data('id');
        addToCart(id,0);
        $('#show_popup').hide();
      });

     function addToCart(id,price) {
      $.ajax({
        url : 'action.php',
        method : 'post',
        data : {action : 'addToCart',id : id,quantity : 1},
        dataType : 'json',
        success : function(data) {
          $('.notification').show(500);
          $('.bgBlur').show(500);
          if (data.success) {
            $('.notification').text("Added To Cart!");
            $('.notification').addClass('green');
            // $('.divCart p').text(parseInt($('.divCart p').text()) + price);
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
     }
    </script>
  </body>
</html>