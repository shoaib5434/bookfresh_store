<?php
session_start();
include('database_connection.php');
// echo "HII";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    
     <link href='https://netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' rel='stylesheet'/> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="../style2.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
     <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />-->
     <title>Home Page</title>
  </head>
  <body>
      <!--Navbar-->
    <section class="Navbar">
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark  p-md-3">
        <div class="container">
          <a  href="#" class="navbar-brand">
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
                <a  href="#" class="nav-link text-white" id="hom" >Home</a>
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
    <style type="text/css">
                         *{
                          box-sizing: border-box;
                         }

                 .navbar2{
                          transform: translate(0px,62px);
                          width: 100%;
                          background-color: white;
                          height: 50px;
                          
                          
                          
                        }
                    .n1{
                    
                      transform: translate(0px,0px);
                      width: 75px;
                      height: 50px;
                    

                    }  
                    .n2{
                      margin-left: 100px;
                      height: 20px;

                  
                    }  
                    .n3{
                      background-color: ;
                      


             
                    }
                    .n4{
                      background-color: green;
                    }
                    .divSigin{
                      margin-top: 5px;
                      float: left;
                    width: 80px;
                      border:2px solid ;
                      border-radius: 40px;
                      color: white;
                      padding-top: 5px;
                      padding-left: 15px;   
                       height: 80%;
                    background-color: green;

                      

                    }
                  .divCart{
                    position: relative;
                  
                    margin-top: 5px;
                   width: 80px;
                      border:3px solid green ;
                      border-radius: 40px;
                      color: white;
                      padding-top: 5px;
                      padding-left: px;   
                       height: 80%;
                    
                   margin-left: 100px;
                   


                  }
                      
                  
                    form.example input[type=text] {
                                                   padding: 12px;
                                                   margin-top: 5px;
                                                   height: 40px;
                                                   font-size: 17px;
                                                   border: 1px solid grey;
                                                   border-right:none;
                                                   border-radius-left:none; 
                                                   border-radius: 40px 0px 0px 40px;
                                                   float: left;
                                                   width: 80%;
                                                   background: #f1f1f1;
                                                  }
/* Style the submit button */
form.example button {
  float: left;
  width: 15%;
  padding: 6px;
  height: 40px;
  margin-top: 5PX;
  background: green;
  color: white;
  font-size: 17px;
  border: 1px solid green;
  border-radius: 0px 40px 40px 0px;
  border-left: none; /* Prevent double borders */
  cursor: pointer;
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
  
  margin-left: 250px;
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
  display: ;
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


    </style>
    
    <section class=" navbar fixed-top nav2 navbar-expand-lg ">
     <div class="container_fluid navbar2" style="">
       <div class="row" style="">
         <div class="col-1 n1" id="manue_button" >
          <img src="../images/cat.png" style="width: 100% ;height:100%;">
          </div>
         <div class="col-5 n2">
           <form class="example" action="action_page.php">
            <input type="text" placeholder="Search.." name="search">
            <button type="submit"><i class="fa fa-search"></i></button>
           </form>

         </div>
         <div class="col-2 n3">
            <a href="PHP/Login.php"> <div class="divSigin">sign in</div></a>
             <div class="divCart">cart</div>
           </div>
         </div>
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
          <a href="php/page_category.php?category=Fruit"><li>    Fruits  </li></a>
          <a href="php/page_category.php?category=Vegetable"><li>    Vegatables  </li></a>
          <a href="php/page_category.php?category=Grocery"><li>    Grocery items  </li></a>
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
                    <img src = "../images/font5.jpeg" alt = "" class = "img-fluid">
                </div>
            </div>
        </div>
    </section>
       <!--boostratp js start-->
      <script src="js/bootstrap.bundle.min.js"></script>
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
            <h1 class="display-4  text-danger fw-bolder fst-italic"><span class="text-success fw-bolder fst-italic">Fresh</span> Vegetables</h1>
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
               <a href="php/page_category.php?category=Vegetable">
                <img src="../images/font6.jpeg"></a>
                  <div class="overlay">
                     <p class="h4 text-align: center">FRESH VEGETABLES</p>
                   </div>
                 </div>
            </div>
            

            <div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1 px-0
             ">
              <div class="image img-fluid">
               <a href="php/page_category.php?category=Fruit">
                <img src="../images/font6.jpeg">
               </a>
                  <div class="overlay">
                     <p class="h4 text-align: center">FRESH FRUITS</p>
                   </div>
                 </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1 px-0">
              <div class="image img-fluid">
               <a href="php/page_category.php?category=Grocery">
                <img src="../images/font6.jpeg">
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
     <button class="cart add_to_cart_btn" data-id="1">add to cart</button>
     <a href="" class="cart detail_link">more detail</a>
     
      </div>

   </div>
    
</body>
 
 
 
  
 



  

    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
     Option 2: Separate Popper and Bootstrap JS 
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
                   `+<?php
                   if (!isset($_SESSION['Email'])) {
                    header("location:Login.php");
                   } 
                   ?>+`

                   <button data-id="`+products[i].id+`" class="add_to_cart_btn btn btn-danger   btn-block text-center"style="width: 15rem;">Add To Cart</button>
                   <?php
                 }
                 ?>
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
          addToCart(id);
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
          $('#show_popup a.detail_link').attr("href","PHP/product.php?id="+products[index].id);
          $('#show_popup button.cart').data('id',products[index].id);
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
      addToCart(id);
     });
     function addToCart(id) {
      $.ajax({
        url : 'action.php',
        method : 'post',
        data : {action : 'addToCart',id : id},
        dataType : 'json',
        success : function(data) {
          console.log(data);
        }
      })
     }
    </script>
    
  </body>
</html>