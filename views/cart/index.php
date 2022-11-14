<?php

include '../../classes/autoloader.php';
include '../../business/session.php';

?>
<html lang="en">

<head>
    
<link rel="shortcut icon" href="/empire/assets/img/favicon.ico" type="image/x-icon">

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>        <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<link rel="stylesheet" href="../product-grid/style.css">

<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<script src="/empire/assets/js/user.js"></script>
<script src="script.js"></script>
<link rel="stylesheet" href="style.css">

<title>Shopping Cart</title>
</head>

<body>
  
<!-- HEADER -->
  <!-- ------------------------------------------------- -->
  <?php include '../header.php'; ?>

  <input type="number" id="uid" value="<?php echo $_SESSION['mylogin']; ?>" hidden>
  <header id="site-header">
    <div class="container">
      <h1>Shopping cart <span>
       </div>
  </header>

  <div class="container">

    <section id="cart"> 

      
     


    </section>

  </div>

  <footer id="site-footer">
    <div class="container clearfix">

     

      <div class="right">
         <h2 class="subtotal">Subtotal: <span id="subtotal"></span>MAD</h2>
        <a class="btna" >Checkout</a>
      </div>

    </div>
  </footer>

</body>

</html>

