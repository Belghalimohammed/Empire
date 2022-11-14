<?php

include '../../classes/autoloader.php';
include '../../business/session.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="shortcut icon" href="/empire/assets/img/favicon.ico" type="image/x-icon">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="/empire/assets/js/jquery-3.5.1.min.js"></script>
    <script src="/empire/assets/js/bootstrap.js"></script>
    <script src="https://kit.fontawesome.com/8539302c95.js" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="script.js"></script>
  <script src="../../assets/js/user.js"></script>

  <link rel="stylesheet" href="../../assets/css/user.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <title>Our Products</title>
</head>
<body>
                  <div class="loader">
                    <div>
  
                      <span>↓</span>
                      <span class="span" style="--delay: 0.1s">↓</span>
                      <span class="span" style="--delay: 0.3s">↓</span>
                      <span class="span" style="--delay: 0.4s">↓</span>
                      <span class="span" style="--delay: 0.5s">↓</span>
                      
                    </div>       
                  </div>
<div class="page">

  <!-- HEADER -->
  <!-- ------------------------------------------------- -->
  <?php include '../header.php'; ?>

  <!-- SIDEBAR -->
  <!-- ------------------------------------------------- -->
  <div class="sidebar" >
  

    <div class="sidebar__category">
      <div class="sidebar__heading">Type </div>
      <div class="sidebar__options herecats">
        
     
      </div>
    </div>

    <div class="sidebar__category">
      <div class="sidebar__heading">Size  </div>
      <div class="sidebar__options heresizes">
       
      </div>
    </div>

    <div class="sidebar__category">
      <div class="sidebar__heading">Color </div>
      <div class="sidebar__options herecols">
       
   
      </div>
    </div>
  </div>

  <!-- MAIN -->
  <!-- ------------------------------------------------- -->
  <div class="main">

    <!-- PLANTS -->
    <!-- ------------------------------------------------- -->
    <h2 class="main__title"></h2>

    <!-- FILTERS -->
    <!-- ------------------------------------------------- -->
    <div class="filters" >
      <button class="filters__btn"><span class="show">Show</span><span class="hide">Hide</span>&nbsp;Filters <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="black">
        <path d="M3 8L21 8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        <path d="M3 17H21" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        <path d="M17 5L17 11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        <path d="M8 14L8 20" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
      </button>
      <button class="filters__btn filters__btn--sort">Sort By <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="black">
        <path d="M6 9.5L12 15.5L18 9.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
      </button>
    </div>

    <!-- ITEMS -->
    <!-- ------------------------------------------------- -->

    <div class="containerr container-fluid ">
       
       <div class="row here-pro">
         
           
       </div>
     
    </div>
   

  <!-- FOOTER -->
  <!-- ------------------------------------------------- -->
  <footer class="footer">

  
  </footer>

</div>



<script>
     $(window).on("load",function(){
        $(".loader").fadeOut("slow");
    });
   </script>

</body>
</html>