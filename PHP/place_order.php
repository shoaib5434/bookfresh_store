<?php
session_start();
include "database_connection.php";
$usermail=$_SESSION['Email'];
if(isset($_POST['place_order']))
{
   
   $fname=$_POST['fname'];
   $email=$_POST['email'];
   $addres=$_POST['addres'];
   $contact=$_POST['contact'];
   $payment=$_POST['cod'];
   $cnic=$_POST['cnic'];

   $sql="INSERT INTO orders(fullname,email,delivery_address,cnic,payment_method,mobile_no) values('$fname','$email','$addres','$cnic','$payment','$contact');
   ";
   $query=mysqli_query($conn,$sql);

}
 if (isset($_GET['payment'])) {
  if ($_GET['payment'] == 'done') {
    $userId = $_SESSION['Email'];
      $query = "INSERT INTO orders values (NULL,'{$userId}','{$_GET['address']}','{$_GET['cnic']}','Paypal','{$_GET['phone']}','{$_GET['token']}',current_timestamp());
      ";
      if (mysqli_query($conn,$query)) {
        $order_id = mysqli_fetch_array(mysqli_query($conn,"SELECT order_id FROM orders WHERE email='{$_SESSION['Email']}' ORDER BY order_id DESC LIMIT 1"))[0];
        $order_id = intval($order_id);
        $product_query = "INSERT INTO order_products VALUES";

        $result = mysqli_query($conn,"SELECT * FROM fetch_id WHERE user_email = '{$_SESSION['Email']}'");
        $result = mysqli_fetch_all($result);
        $i = 1;
        foreach ($result as $key) {
          $product_query .= "(" . $order_id . "," . $key[1] . "," . $key[2] . ")";
          if ($i < sizeof($result)) $product_query .= ",";
          ++$i;
        }
        if (mysqli_query($conn,$product_query)) {
          if (mysqli_query($conn,"DELETE FROM fetch_id WHERE user_email = '{$_SESSION['Email']}'")) {
            header("location:track_order.php");
          }
        }
      }
      else {
        echo "ERROR";
      }
  }
 }
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
      .ring
      {
        position:fixed;
        top:50%;
        left:50%;
        transform:translate(-50%,-50%);
        width:150px;
        height:150px;
        background:transparent;
        border:3px solid #3c3c3c;
        border-radius:50%;
        text-align:center;
        line-height:150px;
        font-family:sans-serif;
        font-size:20px;
        color:#fff000;
        letter-spacing:4px;
        text-transform:uppercase;
        text-shadow:0 0 10px #fff000;
        box-shadow:0 0 20px rgba(0,0,0,.5);
        z-index: 999;
        display: none;
      }
      .bgBlur {
        width: 100%;
        position: fixed;
        height: 100%;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0,0,0,.7);
        display: none;
        z-index: 99;
      }
      .bgBlur.show {
        display: block;;
      }
      .ring.show {
        display: block;;
      }
      .ring:before
      {
        content:'';
        position:absolute;
        top:-3px;
        left:-3px;
        width:100%;
        height:100%;
        border:3px solid transparent;
        border-top:3px solid #fff000;
        border-right:3px solid #fff000;
        border-radius:50%;
        animation:animateC 2s linear infinite;
      }
      span
      {
        display:block;
        position:absolute;
        top:calc(50% - 2px);
        left:50%;
        width:50%;
        height:4px;
        background:transparent;
        transform-origin:left;
        animation:animate 2s linear infinite;
      }
      span:before
      {
        content:'';
        position:absolute;
        width:16px;
        height:16px;
        border-radius:50%;
        background:#fff000;
        top:-6px;
        right:-8px;
        box-shadow:0 0 20px #fff000;
      }
      @keyframes animateC
      {
        0%
        {
          transform:rotate(0deg);
        }
        100%
        {
          transform:rotate(360deg);
        }
      }
      @keyframes animate
      {
        0%
        {
          transform:rotate(45deg);
        }
        100%
        {
          transform:rotate(405deg);
        }
      }
    </style>
  </head>
  <body>
    <div class="ring">Working
      <span></span>
    </div>
    <div class="bgBlur"></div>
      <!--Navbar-->
    <section class="Navbar">
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark p-md-3 ">
        <div class="container">
          <a  href="#" class="navbar-brand">
            <!--logo-->
            <img src="logo.png" alt="" width="40" height="26" class="d-inline-block align-text-top">
              BookFresh Store</a>
          </div>
      </nav>
    </section>
        <!--form start-->
        <section class="vh-100 gradient-custom bg-light ">
            <div class="container py-5 h-100 my-5">
              <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 col-lg-9 col-xl-7">
                  <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                    <div class="card-body p-4 p-md-5 ">
                      
                      <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 text-center fs-2 fw-bolder" >Place Order</h3>
                        <div class="mising_field" style="height: 30px; width: 250px;border:1px solid ;transform: translateX(150px);margin-bottom: 30px;border-radius: 10px;color: red;background-color: rgb(230, 209, 218);padding-left: 10px;display:none;"></div>
                      <form method="POST" action="" id="checkoutForm">
          
                        <div class="row">
                        
                          <div class="col-md-6 mb-4">
          
                            <div class="form-outline">
                              <p class="form-control form-control-lg address"><?php echo $usermail; ?></p>
                              
                            </div>
          
                          </div>
                        </div>
          
                        <div class="row">
                          <div class="col-md-6 mb-4 d-flex align-items-center">
          
                            <div class="form-outline datepicker w-100">
                            
                              <input type="text" id="lastName" name="address" class="form-control form-control-lg address" placeholder="delivery address"  />
                              
                            </div>
          
                          </div>
                          <div class="col-md-6 mb-4">
          
                            <div class="form-outline">
                              <input type="text" id="lastName" name="cnic" class="form-control form-control-lg cnic"placeholder="your cnic" />
                              
                            </div>
          
                          </div>
                        </div>
          
                        <div class="row">
                          <div class="col-md-6 mb-4 pb-2">
          
                             <h5 class="mb-2 pb-1">payment Method </h5>
                             <div class="form-check form-check-inline">
                              <input
                                class="form-check-input"
                                type="radio"
                                name="cod"
                                id=""
                                value="COD"
                                checked
                              />
                               <label class="form-check-label" for="">cash on delivery</label><br>
                              <input
                                class="form-check-input"
                                type="radio"
                                name="cod"
                                id=""
                                value="paypal"
                              />
                              <label class="form-check-label" for="">pay pal</label>
                            </div>
          
                          </div>
                          <div class="col-md-6 mb-4 pb-2">
          
                            <div class="form-outline">
                              <input type="tel" id="phoneNumber" name="contact" class="form-control form-control-lg phone" placeholder="Phone Number" />
                              
                            </div>
          
                          </div>
                        </div>
          
          
                        <div class="d-flex justify-content-center">
                            <input type="submit" name="place_order" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" value="place order">
                          </div>
          
                         
          
                      </form>
                    </div>
                  </div>
                </div>
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
                  </li>
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
              
     
    
    
   <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('#checkoutForm').on('submit',function(e){
          e.preventDefault();
          $('.bgBlur').addClass('show');
          $('.ring').addClass('show');
          if ($('.form-check-input:checked').val() == 'paypal') {
            $.ajax({
                url : 'https://api-m.sandbox.paypal.com/v2/checkout/orders',
                method : 'POST',
                dataType : 'json',
                headers : {
                    "Content-Type": "application/json",
                    "Authorization" : "Bearer A21AAJFrqvKpmBxQRJJKkpIUUcjxZc6L1vUem2zBhozgoeFsPejL6V22pdBLs6pBMNr85avY6JAkV_wg_hw0Ep1dIFyeUACIw",
                },
                data : JSON.stringify({
                        "intent": 'CAPTURE',
                        "purchase_units" : [
                         {
                           "amount": {
                         "currency_code": "USD",
                         "value": "10.00"
                     }
                         }
                        ],
                        "application_context" : {
                          "return_url" : "http://localhost/BookFreshStore/BookFreshStore/PHP/place_order.php?payment=done&cnic=" + $("#checkoutForm input.cnic").val() + "&phone=" + $("#checkoutForm input.phone").val() +"&address=" + $("#checkoutForm input.address").val() 
                        }
                    }),
                success : function(data) {
                  $('.bgBlur').removeClass('show');
                  $('.ring').removeClass('show');
                  window.location = data.links[1].href;
                }
            })
          }
          else {
            $.ajax({
              url : 'action.php',
              method : 'post',
              data : {
                action : 'saveOrder',
                address : $("#checkoutForm input.address").val(),
                phone : $("#checkoutForm input.phone").val(),
                cnic : $("#checkoutForm input.cnic").val()
              },
              dataType : 'json',
              success : function(data) {
                console.log(data);
                location = 'track_order.php';
              }
            })
          }
        })
      })
    </script>

  </body>
</html>