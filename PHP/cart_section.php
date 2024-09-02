<?php
session_start();
include "database_connection.php";
$querry="SELECT * from fetch_id where user_email='".$_SESSION['Email']."'";
$res=mysqli_query($conn,$querry);
$show=mysqli_fetch_all($res);



?>
<!doctype html>
<html lang="en">
  <head>
    
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="style2.css">
  <link rel="stylesheet" type="text/css" href="style.css">
   <link rel="stylesheet"  href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>cart</title>
    <style type="text/css">
      .quantityInput {
        width: 70px;
        float: none;
        border: 2px solid black;
        position: relative;
        left: 50%;
        top: 50%;
        transform: translate(-50%,-50%);
      }
      h3.price {
        text-align: center;
        top: 50%;
        transform: translateY(-50%);
      }
      h3.price p {
        display: inline-block;
        margin: 0;
        padding: 0;
      }
      button.cross {
        position: relative;
        top: 50%;
        transform: translateY(-50%);
      }
      .subBillAmount {
        text-align: center;
      }
      .subBillAmount p {
        display: inline-block;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>
  <body>
      <!--Navbar-->
    <section class="Navbar">
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark p-md-3 ">
        <div class="container">
          <a  href="#" class="navbar-brand">
            <!--logo-->
            <img src="logo.png" alt="" width="40" height="26" class="d-inline-block align-text-top">
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


          <!--cart-->

<div class="container-fluid cbox" style="height: 100%; padding-bottom: 20px;border:none;">
  
 <div class="row crow">
   
   <div class="col-sm-8 box">

     <div class="row">
       <div class="col-sm-9 col-md-9 headingDiv">
        <p>Delivery charges of Rs. 100 will apply to all orders under Rs 1,000.
          A packing fee of Rs. 30 will be charged for all orders.</p>
        </div>
        <?php
          $total_bill = 0;
         foreach ($show as $row) {
            $result = mysqli_query($conn,"SELECT * from product_detail where id = '".$row[1]."'");
            $result = mysqli_fetch_assoc($result);
          
          ?>
         <div class="col-sm-9 col-md-9 singleItem">
           <div class="row">
            
             <div class="col-3">
               <img src="../images/<?php echo $result["product_img"]; ?>" class="simg">
             </div>
             <div class="col-3 itemTitle">
               <h2 class="heading"><?php echo $result["product_name"]; ?></h2>
               <h5 class="uprice"><small>rs<?php echo $result["price"];$total_bill+=$row[2]*$result['price']; ?>/kg</small></h5>
             </div>
             <div class="col-2">
               <input type="number" name="" data-id="<?php echo $row[1]; ?>" value="<?php echo $row[2]; ?>" class="quantityInput">
             </div>
             <div class="col-3">
               <h3 class="price" data-original_price="<?php echo $result['price']; ?>"> Rs <p><?php echo $row[2] * $result["price"]; ?></p></h3>
             </div>
             <div class="col-1">
             <button data-id="<?php echo $result['id'];?>" data-price="<?php echo $result['price'];?>" name="delete" class="fas fa-trash cross"  style="border: none;" ></button>
             </div>

           
            
              
         </div>
       </div>
     <?php 

       }

         
     ?>
     </div>
   </div>

    
   <div class="col-sm-3 box2">
     
       <div class="col-sm-10 col-md-10 billDiv">
        <table id="billSection">
           <tr>
             <td class="billTitle">
              Subtotal:
             </td>
             <td class="subBillAmount">
              RS <p><?php echo $total_bill;?></p>
             </td>
           </tr>
           <tr>
             <td class="billTitle">
              Delievery Charges:
             </td>
             <td class="billAmount">
              RS 200<?php $total_bill += 200;?>
             </td>
           </tr>
           <tr>
             <td class="billTitle">
              Packing Charges:
             </td>
             <td class="billAmount">
              RS 50<?php $total_bill += 50;?>
             </td>
           </tr>
           <tr>
             <td class="billTitle">
              Total:
             </td>
             <td class="billAmountFinal">
              RS
              <p>
              <?php echo $total_bill;?>
              </p>
             </td>
           </tr>
         </table>
       </div>
         <a class="continue" href="index.php">continue shopping</a>
          <a class="checkout" href="place_order.php">checkout now </a>
   </div>

 </div>






</div>     
       

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

   <script src="jquery.js"></script>
      <script>
          // var nav = document.querySelector("nav");
          // window.addEventListener("scroll", function(){
          //     if(window.pageYOffset<100{
          //      nav.classList.add("bg-dark","shadow");
          //     //} //else {
          //        // nav.classList.remove("bg-dark", "shadow");
          //     }
          //     });

          $(document).ready(function(){
            $('.cross').on('click',fun);
            function fun() {
              let id = $(this).data('id');
              let element = $(this);
              let price = $(this).parent().parent()[0].children[3].children[0].children[0].textContent;
              $.ajax({
                url : 'action.php',
                method : 'post',
                data : {action : "deleteFromCart",id : id},
                dataType : 'json',
                success:function(data) {
                  console.log(element.parent().parent().parent().hide(100));
                  $('.billAmountFinal p').text(parseInt($('.billAmountFinal p').text()) - price);
                  $('.subBillAmount p').text(parseInt($('.subBillAmount p').text()) - price);
                }
              })
            }
            $('.quantityInput').on('change',function(){
              updatePrice($(this));
            });
            $('.quantityInput').on('keyup',function(){
              updatePrice($(this));
            });
            function updatePrice(element) {
              let value = (element.val());
              if (value != '') {
                let currentElement = element.parent().parent()[0].children[3].children[0].children[0];
                let old_price = parseInt(currentElement.textContent);
                value = parseInt(value);
                let original_price = element.parent().parent()[0].children[3].children[0].getAttribute('data-original_price');
                currentElement.textContent = value*(parseInt(original_price));
                $('.billAmountFinal p').text(parseInt($('.billAmountFinal p').text()) + (value*(parseInt(original_price)) - old_price));
                $('.subBillAmount p').text(parseInt($('.subBillAmount p').text()) + (value*(parseInt(original_price)) - old_price));
              }
            }
          })
          window.onbeforeunload = function(){
            let data = {
                action : 'updateCart',
                products : []
            };
            let allCartProducts = $('div.col-2 input');
            for (let i = 0; i < allCartProducts.length; ++i) {
              data['products'].push({
                id : allCartProducts[i].getAttribute('data-id'),
                quantity : allCartProducts[i].value
              });
            }
            $.ajax({
              url : 'action.php',
              method : 'post',
              data : data,
              success : function(data) {
                console.log(data);
              }
            })
          };
     </script>
   



    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    
  </body>
</html>