 <?php
$display = "none";
$error = "";

include "database_connection.php";
if (isset($_POST['register'])){
  $Fname=$_POST['fname'];
  $LastName=$_POST['lastname'];
  $password=$_POST['pswd'];
  $Gender=$_POST['inlineRadioOptions'];
  $phone=$_POST['contact'];
  $Email=$_POST['email'];
  if (empty($Fname)) $error = "First Name Is Empty.";
  else if (empty($LastName)) $error="lastname is Empty.";
  else if ( empty($password)) $error="password is Required.";
  elseif (empty($Gender)) $error="Missing error.";
  elseif (empty($phone))  $error="phone no is Required.";
  elseif (empty($Email))  $error="Email is Required.";
  
    echo $error;
    $display = "block";
   if ($error == "") {
      $sql="insert into user_information(First_name,Last_name,Password,Gender,Mobile_no,Email)values('$Fname','$LastName','$password','$Gender','$phone','$Email')";
      
      $result=mysqli_query($conn,$sql);
      header("location:login.php");
      $display = "none";
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css?_cacheOverride=1647399579560">
    <!-- Bootstrap CSS -->
    <link href='//netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' rel='stylesheet'/>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Registration Page</title>
  </head>
  <body>
    <section class="Navbar">
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark p-md-3">
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
        <!--Navbar menu-->
        <!--form start-->
        <section class="vh-100 gradient-custom bg-light ">
            <div class="container py-5 h-100 my-5">
              <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 col-lg-9 col-xl-7">
                  <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                    <div class="card-body p-4 p-md-5 ">
                      
                      <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 text-center fs-2 fw-bolder" >Registration Form</h3>
                        <div class="mising_field" style="height: 30px; width: 250px;border:1px solid ;transform: translateX(150px);margin-bottom: 30px;border-radius: 10px;color: red;background-color: rgb(230, 209, 218);padding-left: 10px;display:<?php echo $display; ?>;"><?php echo $error; ?></div>
                      <form method="POST" action="">
          
                        <div class="row">
                          <div class="col-md-6 mb-4">
          
                            <div class="form-outline">
                              <input type="text" id="firstName" name="fname" class="form-control form-control-lg "placeholder="First Name" />
                              
                            </div>
          
                          </div>
                          <div class="col-md-6 mb-4">
          
                            <div class="form-outline">
                              <input type="text" id="lastName" name="lastname" class="form-control form-control-lg"placeholder="Last Name" />
                              
                            </div>
          
                          </div>
                        </div>
          
                        <div class="row">
                          <div class="col-md-6 mb-4 d-flex align-items-center">
          
                            <div class="form-outline datepicker w-100">
                            
                              <input type="password" id="lastName" name="pswd" class="form-control form-control-lg " placeholder="Password"  />
                              
                            </div>
          
                          </div>
                          <div class="col-md-6 mb-4">
          
                            <h6 class="mb-2 pb-1">Gender: </h6>
          
                            <div class="form-check form-check-inline">
                              <input
                                class="form-check-input"
                                type="radio"
                                name="inlineRadioOptions"
                                id="femaleGender"
                                value="option1"
                                checked
                              />
                              <label class="form-check-label" for="femaleGender">Female</label>
                            </div>
          
                            <div class="form-check form-check-inline">
                              <input
                                class="form-check-input"
                                type="radio"
                                name="inlineRadioOptions"
                                id="maleGender"
                                value="option2"
                              />
                              <label class="form-check-label" for="maleGender">Male</label>
                            </div>
          
                            <div class="form-check form-check-inline">
                              <input
                                class="form-check-input"
                                type="radio"
                                name="inlineRadioOptions"
                                id="otherGender"
                                value="option3"
                              />
                              <label class="form-check-label" for="otherGender">Other</label>
                            </div>
          
                          </div>
                        </div>
          
                        <div class="row">
                          <div class="col-md-6 mb-4 pb-2">
          
                            <div class="form-outline">
                              <input type="email" id="emailAddress" name="email" class="form-control form-control-lg"placeholder="Email" />
                              
                            </div>
          
                          </div>
                          <div class="col-md-6 mb-4 pb-2">
          
                            <div class="form-outline">
                              <input type="tel" id="phoneNumber" name="contact" class="form-control form-control-lg" placeholder="Phone Number" />
                              
                            </div>
          
                          </div>
                        </div>
          
          
                        <div class="d-flex justify-content-center">
                            <input type="submit" name="register" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" value="Register">
                          </div>
          
                          <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="Login.php" class="fw-bold text-body"><u>Login here</u></a></p>
          
          
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
       <div class="notification"></div>
       <div class="bgBlur" id="blur">
      </section>
              
     
    
    
   <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script type="text/javascript">
    
    $.('.register').on('click',function()){


    
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

  </script>

  </body>
</html>