<?php
session_start();
include('database_connection.php');
$total_bill=0;
if (isset($_SESSION['Email'])) {
  $sesion=$_SESSION['Email'];


  $sql="SELECT * FROM fetch_id,product_detail where fetch_id.id=product_detail.id AND fetch_id.user_email ='{$sesion}'";
  $result=mysqli_query($conn,$sql);

  while ($show=mysqli_fetch_assoc($result)) {
        
        $total_bill=$total_bill+ $show['price'];  
  }
}
 

 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <link rel="stylesheet" type="text/css" href="style2.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link rel="stylesheet" href="style.css"> 
     <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />-->
     <title>Home</title>
    <style type="text/css">
     *{
        box-sizing: border-box;
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
       .navbar2{
        display: block;
        width: 100%;
        background-color: rgb(228, 242, 228);
        height: 50px;  
        }
    .n1 {
      font-size: 25px;
      padding: 0px 10px;
      display: inline-block;
      float: left;
      line-height: 50px !important;
      width: 10%
    }  
    .n2 {
      width : 90%;
      display: inline-block;
    }
    .n3{
      background-color: ;
    }
    .n3 > * {
      float: right;
    }
    .n4{
      background-color: green;
    }
    .divSigin{
      position: relative;
      width: 80px;
      border:2px solid ;
      border-radius: 40px;
      color: white;
      padding-top: 5px;
      padding-left: 15px;   
      height: 40px;
      text-decoration: none;
      background-color: green;
    }
  .divCart{
    
      position: relative;
      margin-top: 7px;
      border:3px solid #fff;
      border-radius: 40px;
      color: white;
      padding: 5px;
      text-decoration: none; 
      height: 35px;
    }
    .divCart p {
      display: inline-block;
      padding: 0px 5px;
    }
    .divCart a i {
      color: white;
      padding: 0px 5px;
      font-size: 22px;
    }
    .n2 > .example {
      position: relative;
      width: fit-content;
      padding: 0;
      margin: 0;
    }
    form.example input[type=text] {
     padding: 12px;
     margin-top: 5px;
     height: 40px;
     font-size: 17px;
     border: 1px solid grey;
     border-right:none;
     border-radius-left:none; 
     border-radius: 0px 40px 40px 0px;
     width: 400px;
     background: #f1f1f1;
    }
/* Style the submit button */
form.example button {

  float: left;  
  padding: 6px;
  height: 40px;
  margin-top: 5PX;
  background: green;
  color: white;
  font-size: 17px;
  border: 1px solid green;
  border-radius: 40px 0px 0px 40px;
  border-left: none; /* Prevent double borders */
  cursor: pointer;
  display: inline-block;
  padding: 0px 10px;
}

form.example button:hover {
  background: #0b7dda;
}

/* Clear floats */
form.example::after {
  content: "";
  clear: both;
  display: table;
}
/*side bar*/
#sidebr{
    display: none;
    height: 100%;
    width: 20%;
    background-color: white;
    z-index: 9999;
    position: fixed;
    margin-top: 70px;     

}
.headr{
  height: 40px;
  width: 100%;
  background-color: red;
}
#cancel_sidebar{
  
  margin-left: 93%;
  color: white;

}
.dropdownFirstDive{

  background-color: rgb(237, 233, 232);
  height: 140px;
}
.dropdownSecondDive{

  background-color: rgb(237, 233, 232) ;
  height: 25px;
  margin-top: 15px;
  list-style: none;

}
.dropdownSecondDive li{
 margin-left: 17px;
}

.dropdownThirdDive{

  background-color:  rgb(237, 233, 232);
  height: 200px;
  margin-top: 15px;
  list-style: none;


}
.listItem_1{
  
}
.listItem_1 li{
  
   margin-left: -12px;
   padding-top: 5px;
   list-style: none;
   height:calc(100% / 4);   
}
.listItem_1 a{
  text-decoration: none;
  color: black;
}
.listItem_3 li{
     margin-left: -12px;
     list-style: none;
     height: calc(100% / 5);
}
.dropBlur{
  display: block;
  height: 100%;
  position: fixed;
  top: 0;
  bottom: 0;
  right: 0;
  left: 0;
  width: 100%;
  z-index: 9998;
  background: rgba(0,0,0,.7);
}

.searchitem{
  
  background-color:rgb(228, 242, 228);
  width: 100%;
  color: black;
  z-index: 9998;
  display: none;
  position: fixed;
  
  margin-top: 120px;
  padding: 10px;
}
.searcheditem{
  width: 10%;
  height: 10%;
  padding: 3px;
  border:1px solid transparent;
  border-radius: 10px;
  margin-left: 15%;
  margin-top: 3px;
}
.Searcheditemname{
  display: inline-block;
  margin-left: 18%;
  height: 10%;
  width: 10%;
}
.searcheditemprice{
  display: inline-block;
  margin-left: 18%;
}
.img_set{
  height: 400px;
  width: 100%;
}
.chat_icon{
  position: fixed;
  z-index: 99999;
  margin-left: 93%;
  margin-top: 15%;
}
.navbar-brand {
  padding: 0;
  margin: 0;
}

    @media screen and (max-width: 900px) {
      .n2 form.example input {
        width: 300px;
      }
    }
    @media screen and (max-width: 700px) {
      .n2 form.example input {
        width: 200px;
      }
    }
    @media screen and (max-width: 390px) {
      .n2 form.example input {
        width: 180px;
      }
    }
    </style>
  </head>
  <body>
    <?php include '../chatbot/bot.php'; ?>
      <!--Navbar-->
    <section class="Navbar">
    <nav class="navbar fixed-top navbar-dark">
        <div class="container-fluid" style="padding: 10px 5px">
          <a  href="#" class="navbar-brand">
            <!--logo-->
            <img src="../images/logo.png" alt="" width="40" height="26" class="d-inline-block align-text-top">
              BookFresh Store</a>
          <?php if (!isset($_SESSION['Email'])) { ?><a href="Login.php" style="text-decoration: none;"> <div class="divSigin">sign in</div></a> <?php } ?>
             <?php if (isset($_SESSION['Email'])) { ?><div class="divCart"><a href="cart_section.php">
            <i class="fas fa-shopping-cart"></i></a>
              <p>
                <?php  
                echo $total_bill;
                ?>
                
              </p>
             </div>
           <?php } ?>
           

          </div>
        <!-- </div> -->
     <div class="container-fluid navbar2" style="">
       <div class="row" style="width: 100%">
         <div class="n1 fas fa-bars" id="manue_button">
          
          </div>
         <div class="n2">
           <form class="example" action="action_page.php">
             <button type="submit" class="btn-sm"><i class=" fa fa-map-marker area"></i></button>
            <input type="text" placeholder="Search.." name="search" id="liveProductSearch">
           
           </form>

         </div>
         
         </div>
         </div>
      </nav>
    </section>

    <section>
      <!--area for display search--> 
       <div class="searchitem">
           

     </div> 
    </section>

    <section class="sidbar">
      <div id="sidebr">
        
          <div class="headr">
            <i class="fas fa-times " id="cancel_sidebar" ></i>
          </div>
        <div class="dropdownFirstDive">

        <ul class="listItem_1" style="height: 100%;">
          <li>    Home  </li>
          <a href="page_category.php?category=Fruit"><li>    Fruits  </li></a>
          <a href="page_category.php?category=Vegetable"><li>    Vegatables  </li></a>
          <a href="page_category.php?category=Grocery"><li>    Grocery items  </li></a>
        </ul>

        </div>
        <div class="dropdownSecondDive">
          <li>sign in</li>
        </div>
        <div class="dropdownThirdDive">
          <ul class="listItem_3" style="height: 100%;">
          <li>    About us  </li>
          <li>    Contact us  </li>
          <li>    Privacy policy  </li>
          <li>    FAQs  </li>
          <li>    Delivery charges  </li>
        </ul>
        </div>
      </div>
    </section>
 
      <!--Banner-->
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

<!--chat bot -->
     <!-- about us -->
      <section id = "about" class = "py-5">
        <div class = "container">
            <div class = "row gy-lg-5 align-items-center">
                <div class = "col-lg-6 order-lg-1 text-center text-lg-start">
                    <div class = "title pt-3 pb-5">
                        <h2 class = "position-relative d-inline-block ms-4">About us</h2>
                    </div>
              
                    <p>Bookfresh Store started its business in 2021 in Sargodha. We initially started online with a website
                      and helpline for all order placements.Our focus is on catering to the comfort and ease of our customers
                      and ensuring they enjoy fresh fruits and vegetables. At BookFresh Store, from the sourcing of the product, 
                      its purchasing, packaging and delivery are all done in house. We supervise your order from start to finish,
                     making quality checks and thorough inspections before we deliver with caution and experience to our customers  </p>
                </div>
                <div class = "col-lg-6 order-lg-0" >
                    <img src = "../images/font10.jpeg" alt = "" class = "img-fluid">
                </div>
            </div>
        </div>
    </section>
       <!--boostratp js start-->

      <script src="../Bootstrap/js/bootstrap.bundle.min.js">

      </script>
       <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
       <script>
          var nav = document.querySelector("nav");
          window.addEventListener("scroll", function(){
              if(window.pageYOffset>100){
               nav.classList.add("bg-dark","shadow");
              } else {
                  nav.classList.remove("bg-dark", "shadow");
              }
              });
       </script>

     <!--boostratp js End-->
     <section class="main_heading my-4">
      <div class="text-center ">
            <h1 class="display-4  text-danger fw-bolder fst-italic"><span class="text-success fw-bolder fst-italic">Fresh</span> Products</h1>
            <hr class="w-25 mx-auto">
      </div>
      
      <div class="container" >
       
        <div class="row gy-6 my-4" id="product_container">
         

      </div>
     </div>
     
  </section>
  <section class="main_heading my-5">
    <div class="text-center ">
      <h1 class="display-4  text-danger fw-bolder fst-italic"><span class="text-success fw-bolder fst-italic">Our</span> Features</h1>
          <hr class="w-25 mx-auto">
    </div>
    <div class="container " >
      <div class="row">
        
          <div class="col-lg-4 col-md-6 col-sm-10  offset-md-0 offset-sm-1 px-0">
              <div class="image img-fluid " >
               <a href="page_category.php?category=Vegetable">
                <img src="../images/img1.jpg" class="img_set"></a>
                  <div class="overlay">
                     <p class="h4 text-align: center">FRESH VEGETABLES</p>
                   </div>
                 </div>
            </div>
            

            <div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1 px-0
             ">
              <div class="image img-fluid">
               <a href="page_category.php?category=Fruit">
                <img src="../images/font10.jpeg" class="img_set">
               </a>
                  <div class="overlay">
                     <p class="h4 text-align: center">FRESH FRUITS</p>
                   </div>
                 </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1 px-0">
              <div class="image img-fluid">
               <a href="page_category.php?category=Grocery">
                <img src="../images/g23.jpg" class="img_set">
               </a>
               <div class="overlay">
                <p class="h4 text-align: center">GROCERY ITEM</p>
              </div>
            </div>
            </div>
      </div>
     </div>
  </section>


  <!--Fresh Vegetables end-->
  <!--Footer Start-->
  <footer class="nb-footer">
    <div class="container">
    <div class="row">
    <div class="col-sm-12">
    <div class="about">
    <img src="../images/logo.png" class="img-responsive center-block" alt="">
    </div>
    </div>
    <!--Services-->
    <div class="col-md-3 col-sm-6">
    <div class="footer-info-single">
    <h2 class="title">Our Services</h2>
    <ul class="list-unstyled">
    <li><a href="php/page_category.php?category=Vegetable" title=""><i class="fa fa-angle-double-right"></i>Vegetables</a></li>
    <li><a href="php/page_category.php?category=Fruit" title=""><i class="fa fa-angle-double-right"></i> Fruits</a></li>
    <li><a href="php/page_category.php?category=Grocery" title=""><i class="fa fa-angle-double-right"></i>Georcy</a></li>
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

  <link rel="stylesheet"  href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <div class="bgBlur" id="blur">
   </div>
   <div class="popUpModal" data-target="p-1" id="show_popup">
    <i class="fas fa-times " id="cancel" ></i>

    <img src="../images/font10.jpg">
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
     <button class="cart add_to_cart_btn" data-id="1">add to cart</button>
     <a href="" class="cart detail_link">more detail</a>
     
      </div>

   </div>
    <div class="notification"></div>
</body>
 
 
 
  
 



  

    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
     Option 2: Separate Popper and Bootstrap JS 
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- <script type="text/javascript" src="jquery.js"></script> -->
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

    function appendProducts(products) {
                  for (let i =0 ; i < products.length; i++) {
          console.log("Helo");

         $('#product_container').append(

          `<div class=" col-sm-6  mx-auto col-md-3 col-lg-3 singleProduct ">
               <div class="card my-4"  >
                 <img style="height:200px; " class="card-img-top imgclick" data-index="`+i+`" src="../images/`+products[i].product_img+`" alt="Card image cap">
                 <div class="card-body">
                   <h4 class="card-title text-center">`+products[i].product_name+`</h4>
                   <p class="card-text text-center text-muted"> `+products[i].product_urdu_name+`</p>
                   <p class="card-text text-center text-muted">Rs `+products[i].price+` /Kg</p>

                   <button data-id="`+products[i].id+`" data-price="`+products[i].price+`" class="add_to_cart_btn btn btn-danger   btn-block text-center"style="width: 100%;">Add To Cart</button>
                 </div>
               </div>
             </div>`
         );
      }
    }

      $.ajax(

      {

       url: 'fetch_product.php',
       method:"post",
       dataType : 'json',
 
       success:function(products){        
        appendProducts(products);
         $('.add_to_cart_btn').on('click',function(e){
          let id = $(this).data('id');
            <?php
             if (!isset($_SESSION['Email'])) {
              ?>
              window.location = 'login.php'
               <?php
           }
              
           ?>
          addToCart(id,$(this).data('price'));
         });
        $('.imgclick').on('click',function() {
          $('#show_popup').show();
          $('#blur').show();
          let index = $(this).data('index');
           console.log(index);
          $('#show_popup img').attr("src","../images/"+products[index].product_img);
          $('#show_popup h3').text(products[index].product_name);
          $('#show_popup p.detail').text(products[index].product_description);
          $('#show_popup p.price').text(products[index].price);
          $('#show_popup a.detail_link').attr("href","product.php?id="+products[index].id);
          $('#show_popup button.cart').data('id',products[index].id);
          $('#show_popup button.cart').data('price',products[index].price);
        });
        console.log(products);

       }
      }
      );
    
      $('#cancel').on('click',function() {
        console.log("Hii");
        $('#show_popup').hide();
        $('#blur').hide();
      });
      $('#blur').on('click',function() {
        $('#show_popup').hide();
        $('#blur').hide();
      });


      $('#manue_button').on('click',function() {
        console.log("Hii");
        $('#sidebr').show();
        $('#blur').show();
      });
      $('#cancel_sidebar').on('click',function() {
        $('#sidebr').hide();
        $('#blur').hide();
      });
     $('.add_to_cart_btn').on('click',function(e){
      let id = $(this).data('id');
      <?php
       if (!isset($_SESSION['Email'])) {
        ?>
            window.location = 'login.php'
            <?php
           }
           ?>
      addToCart(id,$(this).data('price'));

      $("#show_popup").hide();
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
            $('.divCart p').text(parseInt($('.divCart p').text()) + price);
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
     $('#liveProductSearch').on('keyup',function(){
      $('.searchitem').show();
      let searchtext = $('#liveProductSearch').val();
      if (searchtext==0) {
        $('.searchitem').hide();
      }
      $.ajax({
        url : 'action.php',
        method : 'post',
        data : {action : 'LiveSearch', text : searchtext},
        dataType : 'json',
        success : function(data) {
          if (searchtext.length == 0){
            $('.searchitem').text('');
          }
          else if (data.total_rows == 0) {
            $('.searchitem').text('NO RECORD');
          }
          else {
            $('.searchitem').html('');
            for (let i = 0; i < data.products.length; ++i) {
              $('.searchitem').append(`<div>
               <div class="holdingitem">
              <a href='product.php?id=${data.products[i].id}'> <img class="searcheditem" src="../images/${data.products[i].product_img}"></a>
               <div class="Searcheditemname"><h6>${data.products[i].product_name}</h6></div>
               <h6 class="searcheditemprice">${data.products[i].price}</h6>
             </div>
         `)
            }
          }
        }
      })
     })
    </script>
    
  </body>
</html>