<?php

include '../../classes/autoloader.php';
include '../../business/session.php';

?>
<!doctype html>
                        <html>
                            <head>
                            <link rel="shortcut icon" href="/empire/assets/img/favicon.ico" type="image/x-icon">

                                <meta charset='utf-8'>
                                <meta name='viewport' content='width=device-width, initial-scale=1'>
                                <title>Checkout</title>
                                <script src="/empire/assets/js/jquery-3.5.1.min.js"></script>
    <script src="/empire/assets/js/bootstrap.js"></script>
                                <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css' rel='stylesheet'>
                                <link href='https://use.fontawesome.com/releases/v5.7.2/css/all.css' rel='stylesheet'>
                                <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
                               <script src="script.js"></script>
<style>
            @import url('https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap');

                                    * {
                                        margin: 0;
                                        padding: 0;
                                        box-sizing: border-box;
                                        list-style: none;
                                        font-family: 'Montserrat', sans-serif
                                    }

                                    body {
                                        background-color: #BF1932
                                    }

                                    .container {
                                        margin: 20px auto;
                                        width: 800px;
                                        padding: 30px
                                    }

                                    .card.box1 {
                                        width: 350px;
                                        height: 500px;
                                        background-color: #BF1932;
                                        color: #baf0c3;
                                        border-radius: 0
                                    }

                                    .card.box2 {
                                        width: 450px;
                                        height: 750px;
                                        background-color: #ffffff;
                                        border-radius: 0
                                    }

                                    .text {
                                        font-size: 13px
                                    }

                                    .box2 .btn.btn-primary.bar {
                                        width: 20px;
                                        background-color: transparent;
                                        border: none;
                                        color: #BF1932
                                    }

                                    .box2 .btn.btn-primary.bar:hover {
                                        color: #BF1932
                                    }

                                    .box1 .btn.btn-primary {
                                        background-color: #BF1932;
                                        width: 45px;
                                        height: 45px;
                                        display: flex;
                                        justify-content: center;
                                        align-items: center;
                                        border: 1px solid #BF1932
                                    }

                                    .box1 .btn.btn-primary:hover {
                                        background-color: #BF1932;
                                        color: #57c97d
                                    }

                                    .btn.btn-success {
                                        width: 40px;
                                        height: 40px;
                                        border-radius: 50%;
                                        background-color: #BF1932;
                                        color: black;
                                        display: flex;
                                        justify-content: center;
                                        align-items: center;
                                        border: none
                                    }

                                    .nav.nav-tabs {
                                        border: none;
                                        border-bottom: 2px solid #BF1932
                                    }

                                    .nav.nav-tabs .nav-item .nav-link {
                                        border: none;
                                        color: black;
                                        border-bottom: 2px solid transparent;
                                        font-size: 14px
                                    }

                                    .nav.nav-tabs .nav-item .nav-link:hover {
                                        border-bottom: 2px solid #BF1932;
                                        color: #05cf48
                                    }

                                    .nav.nav-tabs .nav-item .nav-link.active {
                                        border: none;
                                        border-bottom: 2px solid #BF1932
                                    }

                                    .form-control {
                                        border: none;
                                        border-bottom: 1px solid #BF1932;
                                        box-shadow: none;
                                        height: 20px;
                                        font-weight: 600;
                                        font-size: 14px;
                                        padding: 15px 0px;
                                        letter-spacing: 1.5px;
                                        border-radius: 0
                                    }

                                    .inputWithIcon {
                                        position: relative
                                    }

                                    img {
                                        width: 50px;
                                        height: 20px;
                                        object-fit: cover
                                    }

                                    .inputWithIcon span {
                                        position: absolute;
                                        right: 0px;
                                        bottom: 9px;
                                        color: #BF1932;
                                        cursor: pointer;
                                        transition: 0.3s;
                                        font-size: 14px
                                    }

                                    .form-control:focus {
                                        box-shadow: none;
                                        border-bottom: 1px solid #ddd
                                    }

                                    .btn-outline-primary {
                                        color: black;
                                        background-color: #BF1932;
                                        border: 1px solid #ddd
                                    }

                                    .btn-outline-primary:hover {
                                        background-color: #BF1932;
                                        border: 1px solid #ddd
                                    }

                                    .btn-check:active+.btn-outline-primary,
                                    .btn-check:checked+.btn-outline-primary,
                                    .btn-outline-primary.active,
                                    .btn-outline-primary.dropdown-toggle.show,
                                    .btn-outline-primary:active {
                                        color: #baf0c3;
                                        background-color: #BF1932;
                                        box-shadow: none;
                                        border: 1px solid #ddd
                                    }

                                    .btn-group>.btn-group:not(:last-child)>.btn,
                                    .btn-group>.btn:not(:last-child):not(.dropdown-toggle),
                                    .btn-group>.btn-group:not(:first-child)>.btn,
                                    .btn-group>.btn:nth-child(n+3),
                                    .btn-group>:not(.btn-check)+.btn {
                                        border-radius: 50px;
                                        margin-right: 20px
                                    }

                                    form {
                                        font-size: 14px
                                    }

                                    form .btn.btn-primary {
                                        width: 100%;
                                        height: 45px;
                                        display: flex;
                                        flex-direction: column;
                                        justify-content: center;
                                        align-items: center;
                                        background-color: #BF1932;
                                        border: 1px solid #ddd
                                    }

                                    form .btn.btn-primary:hover {
                                        background-color: #BF1932;
                                        color: black;
                                    }

                                    @media (max-width:750px) {
                                      
                                        .container {
                                            padding: 10px;
                                            width: 100%
                                        }

                                        .text-green {
                                            font-size: 14px
                                        }

                                        .card.box1,
                                        .card.box2 {
                                            width: 100%;
                                            height: 850px
                                        }

                                        .nav.nav-tabs .nav-item .nav-link {
                                            font-size: 12px
                                        }
                                    }
</style>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

                                </head>

<?php
 extract($_GET);
 //$id = $_GET['id'];
 $c = new check();
 if (isset($_SESSION['mylogin'])) {
    $c->setId($_SESSION['mylogin']);
   

 } else {
    $c->setId('99999');
   
 }
 $stmt = $c->showcheck();
 $data = $stmt[0];
?>



<body oncontextmenu='return false' class='snippet-body'>
<div class="container bg-light d-md-flex align-items-center">
    <div class="card box1 shadow-sm p-md-5 p-md-5 p-4">
        <div class="fw-bolder mb-4">MAD</span><span class="ps-1" id="jt"><?php echo $data['fprice']; ?></span></div>
        <div class="d-flex flex-column">

            <div class="d-flex align-items-center justify-content-between text"> <span class="">Livraison</span>  <span class="ps-1 here-deli">0 </span>MAD </div>
            <div class="d-flex align-items-center justify-content-between text mb-4"> <span>Total-Prix  </span>  <span class="ps-1 here-total"><?php echo $data['fprice']; ?></span>MAD</div>
            <div class="border-bottom mb-4"></div>
           <div class="d-flex align-items-center justify-content-between text mt-5">
            
            
            </div>
        </div>
    </div>



    <div class="card box2 shadow-sm">

        <div class="d-flex align-items-center justify-content-between p-md-5 p-4"> <span class="h5 fw-bold m-0">Payment methods</span>
            <div class="btn btn-primary bar"><span class="fas fa-bars"></span></div>
        </div>

        <ul class="nav nav-tabs mb-3 px-md-4 px-2">
            <li class="nav-item" > <a class="nav-link px-2 active" aria-current="page" href="#" id="cc" style="opacity: 0.3; pointer-events: none;">Credit Card</a> </li>
            <li class="nav-item"> <a class="nav-link px-2" href="#" id="cal">Cash a Livraison</a> </li>
            <!-- <li class="nav-item ms-auto"> <a class="nav-link px-2" href="#">+ More</a> </li> -->
        </ul>

        <?php $i=0;foreach($stmt as $one){ ?> 

<input type="number"  class="idcart idcart<?php echo $i; ?>" value="<?php echo $one['cid']; ?>" hidden>    

<?php $i++; } ?>

        <form id="pay">
            <input type="number" name="addcommand" id="" hidden>
        <input type="number" name="type" id="" value="1" hidden>
        
            <input type="text" name="items" id="test" hidden>
            <div class="row">
                <div class="col-12">
                    <div class="d-flex flex-column px-md-5 px-4 mb-4"> <span>Credit Card</span>
                        <div class="inputWithIcon"> <input class="form-control" type="text" value=""> <span class=""> <img src="https://www.freepnglogos.com/uploads/mastercard-png/mastercard-logo-logok-15.png" alt=""></span> </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex flex-column ps-md-5 px-md-0 px-4 mb-4"> <span>Expiration<span class="ps-1">Date</span></span>
                        <div class="inputWithIcon"> <input type="text" class="form-control" value=""> <span class="fas fa-calendar-alt"></span> </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex flex-column pe-md-5 px-md-0 px-4 mb-4"> <span>Code CVV</span>
                        <div class="inputWithIcon"> <input type="password" class="form-control" value=""> <span class="fas fa-lock"></span> </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="d-flex flex-column px-md-5 px-4 mb-4"> <span>Full Name</span>
                        <div class="inputWithIcon"> <input name="fname" class="form-control text-uppercase" type="text" value=""> <span class="far fa-user"></span> </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="d-flex flex-column px-md-5 px-4 mb-4"> <span>Telephone</span>
                        <div class="inputWithIcon"> <input name="tel" class="form-control text-uppercase" type="number" value=""> </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="d-flex flex-column px-md-5 px-4 mb-4"> <span>Adresse</span>
                        <div class="inputWithIcon"> <input name="adresse" class="form-control" type="text" value=""> <span class=""> </span> </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex flex-column ps-md-5 px-md-0 px-4 mb-4"> <span>Code<span class="ps-1">Postal</span></span>
                        <div class="inputWithIcon"> <input name="code" type="text" class="form-control" value="">  </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex flex-column pe-md-5 px-md-0 px-4 mb-4"> <span>Pays</span>
                    <select class="js-example-basic-multiple-5 seletc-pays" id="add-size-product" name="pays" --test>
                                              
                                              
                    </select>  
                    </div>
                </div>
                <div class="col-12 px-md-5 px-4 mt-3">
                    <button type="submit"  class="btn btn-primary w-100 payn">Pay <?php echo $data['fprice']; ?>  MAD</button>
                </div>
            </div>
        </form>

    </div>
</div>
                              
                                </body>
                            </html>