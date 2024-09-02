<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Your Orders</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="admin.css" />
     <!--icons link bootstrap-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Admin Order </title>
    <style type="text/css">
      body {
        background: white;
      }
      .modal-dialog {
        width: 100% !important;
        max-width: 100% !important;
        margin: 0 !important;
      }
      span.Paid {
        background-color: green !important;
        padding: 5px 20px;
        color : white;
      }
      span.Unpaid {
        background-color: yellow;
        padding: 5px 20px;
        color : black;
      }


      /* Confirm Dailog */

      .confirm-dialog {
        width: 320px;
        height: 150px;
        border-radius: 5px;
        background: white;
        position: fixed;
        top: 50%;
        left: 50%;
        z-index: 9999;
        display: none;
      }
      .confirm-dialog > * {
        width: 100%;
        position: relative;
      }
      .confirm-dialog p {
        font-weight: bold;
        font-size: 15px;
        text-align: center;
        line-height: 50px;
      }
      .confirm-dialog .buttons {
        height: 90px;
      }
      .confirm-dialog .buttons button {
        width: 150px;
        transform: translateX(10px);
        height: 50px;
        border:none;
        border-radius: 5px;
        color: white;
        font-size: 15px;
        font-weight: bold;
        background: red;
      }
      .bgBlur {
        background: rgba(0,0,0,.7);
        width: 100%;
        height: 100%;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        display: none;
      }
    </style>
</head>

<body>
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
<div class="container">
    <div class="row">
        <h3 class="fs-4 mb-3">Your Orders</h3>
      <div class="col-12" style="margin-top: 100px">
        <table id="orderTable" class="table table-bordered table bg-white rounded shadow-sm  table-hover">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Order ID</th>
              <th scope="col">Date</th>
              <th scope="col">Status Order</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            
          </tbody>
        </table>
       
      </div>
    </div>
  </div>
 <!-- Modal Pop Up -->
    <div id="myModal" class="modal fade " tabindex="-1">
        <div class="modal-dialog modal-fullscreen-xxl-down ">
            <div class="modal-content ">
                <div class="modal-header ">
                    <h5 class="modal-title">VIEW ORDER</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body bg-light  ">
                    <div class="container-fluid">

                        <div class="container">
                          <!-- Title -->
                          <div class="d-flex justify-content-between align-items-center py-3">
                            <h2 class="h5 mb-0"><a href="#" class="text-muted"></a> Order <b class="order-modal-title">#16123222</b></h2>
                          </div>
                        
                          <!-- Main content -->
                          <div class="row">
                            <div class="col-lg-8">
                              <!-- Details -->
                              <div class="card mb-4">
                                <div class="card-body">
                                  <div class="mb-3 d-flex justify-content-between">
                                    <div>
                                      <span class="me-3 order-modal-date">22-11-2021</span>
                                      <span class="me-3 order-modal-title">#16123222</span>
                                    </div>
                                    <div class="d-flex">
                    
                                      <div class="dropdown">
                                        <button class="btn btn-link p-0 text-muted" type="button" data-bs-toggle="dropdown">
                                          <i class="bi bi-three-dots-vertical"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                          <li><a class="dropdown-item" href="#"><i class="bi bi-pencil"></i> Edit</a></li>
                                          <li><a class="dropdown-item" href="#"><i class="bi bi-printer"></i> Print</a></li>
                                        </ul>
                                      </div>
                                    </div>
                                  </div>
                                  <table class="table table-bordered productsTable">
                                    <thead>
                                        <tr>
                                          <th scope="col">Order Detail</th>
                                          <th scope="col">Quantity</th>
                                          <th scope="col">Price</th>
                                        </tr>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                      <tr>
                                        <td colspan="2">Subtotal</td>
                                        <td class="text-end order-modal-subtotal">200</td>
                                      </tr>
                                      <tr>
                                        <td colspan="2">Shipping</td>
                                        <td class="text-end">70</td>
                                      </tr>
                                    

                                      <tr class="fw-bold">
                                        <td colspan="2">TOTAL</td>
                                        <td class="text-end order-modal-total">270</td>
                                      </tr>

                                    </tfoot>
                                  </table>
                                  
                                </div>
                              </div>
                              <!-- Payment -->
                              <div class="card mb-4">
                                <div class="card-body">
                                  <div class="row">
                                    <div class="col-lg-6">
                                      <h3 class="h6">Payment Method</h3>
                                      <p><b class="order-modal-method">Cash On Delivery</b><br>
                                      Total: <b class="order-modal-total"></b> <span class="badge rounded-pill order-modal-status">PAID</span></p>
                                    </div>
                                    <div class="col-lg-6">
                                      <h3 class="h6">Billing address</h3>
                                      <address>
                                        <strong class="order-modal-name"></strong><br>
                                        <p class="order-modal-address"></p>
                                        <abbr title="Phone">P:</abb> <b class="order-modal-phone"></b>
                                      </address>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-4">
                               <div class="card mb-4">
                                <!-- Shipping information -->
                                <div class="card-body">
                                  <h3 class="h6">Shipping Information</h3>
                                 
                                  <hr>
                                  <h3 class="h6">Address</h3>
                                  <address>
                                    <strong class="order-modal-name">Laiba Latif</strong><br>
                                    <p class="order-modal-address"><p>
                                    <abbr title="Phone">P:</abb> <b class="order-modal-phone"></b>
                                  </address>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                          </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>


</div>

 
    <div class="confirm-dialog">
      <p>Are You Sure You Wannt To Delete Order?</p>
      <div class="buttons">
        <button>Cancel</button>
        <button>Delete</button>
      </div>
    </div>
    <div class="bgBlur"></div>
    <!-- /#page-content-wrapper -->
    </div>
    <script src="../../assets/js/plugins/chartjs.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>

        $(document).ready(function(){
          let AllOrders = [];
          $.ajax({
            url : 'action.php',
            method : 'post',
            data : {
              action : 'fetchAllOrders'
            },
            dataType : 'json',
            success : function(data) {
              AllOrders = data;
              overwriteOrders(data);
            }
          })

          function overwriteOrders(data) {
            let status,date;
            for (let i = 0; i < data.length; ++i) {
              status = (data[i].payment_status != 'unpaid') ? 'Paid' : 'Unpaid';
              date = data[i].date;
              date.replace('-','/');
              $("#orderTable tbody").append(`
                <tr>
                  <th scope="row">`+ (i + 1) +`</th>
                  <td>#`+ data[i].order_id +`</td>
                  <td>`+ date +`</td>
                  <td><span class="`+ status +` rounded-pill">`+ status +`</span></td>
                  <td>
                    
                    <a href="#myModal" role="button" class="orderDetail btn btn-md float-left btn-primary" data-bs-toggle="modal" data-id="`+ data[i].order_id +`" data-index="`+ i +`"><i class="far fa-eye"></i></a>
                    <button type="button" class="btn btn-danger deleteOrder" data-id="`+ data[i].order_id +`"><i class="far fa-trash-alt"></i></button>
                   
                  </td>
                </tr>`);
            }
            $('.orderDetail').on('click',function(){
              let index = $(this).data('index');
              $.ajax({
                url : '../admin/action.php',
                method : 'post',
                data : {
                  action : "fetchSingleOrder",
                  id : $(this).data('id')
                },
                dataType : 'json',
                success : function(data) {
                  $('.order-modal-title').text('#' + AllOrders[index].order_id);
                  $('.order-modal-date').text(AllOrders[index].date);
                  $('.order-modal-phone').text(data.phone);
                  $('.order-modal-method').text((AllOrders[index].payment_method == 'COD' ? 'Cash On Delivery' : 'Paypal'));
                  $('.order-modal-name').text(data.name);
                  $('.order-modal-address').text(AllOrders[index].delivery_address);
                  if (AllOrders[index].payment_status == 'unpaid') {
                    $('.order-modal-status').css('background-color','yellow');
                    $('.order-modal-status').text('Unpaid');
                  }
                  else {
                    $('.order-modal-status').css('background-color','green');
                    $('.order-modal-status').text('Paid');
                  }
                  $('.productsTable tbody').html('');
                  let Subtotal = 0;
                  for (let i = 0; i < data.products.length; ++i) {
                    Subtotal += parseInt(data.products[i].price) * parseInt(data.products[i].quantity);
                    $('.productsTable tbody').append(`
                        <tr>
                          <td>
                            <div class="d-flex mb-2">
                              <div >
                                <img src="../Images/`+ data.products[i].product_img +`" alt="" width="70" class="img-fluid">
                              </div>
                              <div class="flex-lg-grow-1 ms-3">
                                <h6 class="small mb-0"><a href="#" class="text-reset">`+ data.products[i].product_name +`</a></h6>
                                <span class="small">Email: `+ data.email +`</span>

                              </div>
                            </div>
                          <td>`+ data.products[i].quantity +`</td>
                          <td class="text-end">`+ data.products[i].price +`</td>
                        </tr>
                      `);
                  }
                  $('.order-modal-subtotal').text(Subtotal);
                  Subtotal += 70;
                  $('.order-modal-total').text(Subtotal);
                }
              })
            })

            $('.deleteOrder').on('click',function(){
              let ele = $(this).parent().parent();
              $.ajax({
                url : '../admin/action.php',
                method : 'post',
                dataType : 'json',
                data : {id : $(this).data('id'),action : 'deleteOrder'},
                success : function(data) {
                  if (data.success) {
                    ele.hide();
                  }
                }
              })
            })
          }
        })
    </script>
            
  
  </body>
</html>