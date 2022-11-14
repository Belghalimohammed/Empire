<?php

include '../classes/autoloader.php';
include '../business/session.php';
?>
<!doctype html>
<html lang="en">
  <head>
       <!-- Required meta tags -->
       <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  
    <script src="/empire/assets/js/jquery-3.5.1.min.js"></script>

    <script src="/empire/assets/js/bootstrap.js"></script>

  <link rel="shortcut icon" href="/empire/assets/img/favicon.ico" type="image/x-icon">


 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="../assets/css/user.css">
    <link rel="stylesheet" href="product-grid/style.css">

    <title>Products</title>
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
<?php include 'header.php'; ?>
 
    
    <br><br>


    <style>
               .carousel .item {
                                      height: 800px;
                                    }

               .carousel-item img {
                                        position: relative;
                                        top: 0;
                                        left: 0;
                                        height: 50px;
                            }
                            .caritem img {
                                        position: relative;
                                        top: 0;
                                        left: 0;
                                        height: 400px;
                            }
             
    </style>



   <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="/empire/assets/img/bg001.webp" alt="First slide">

      </div>
      
    </div>
    <a class="carousel-control-prev cc" href="#carouselExampleIndicators" role="button" data-slide="prev">
    
    </a>
    <a class="carousel-control-next cc" href="#carouselExampleIndicators" role="button" data-slide="next">
     
    </a>
  </div>

  <br><br>


  <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
  <div class="carousel-item active caritem">
      <img class="d-block w-100" src="/empire/assets/img/4012_1.bmp" alt="First slide">
    </div>
    <div class="carousel-item caritem" >
      <img class="d-block w-100" src="/empire/assets/img/4013_1.bmp" alt="Second slide">
    </div>
    <div class="carousel-item caritem">
      <img class="d-block w-100" src="/empire/assets/img/4012_1.bmp" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


  

  <br><br>
  <H1 class="text-center">Our Products</H1>
    <div class="containerr container-fluid ">
       
            <div class="row here-pro">
              
                
            </div>
          
    </div>







    <!-- Optional JavaScript -->
    <script src="/empire/assets/js/user.js"></script>

   <script>
     $(window).on("load",function(){
        $(".loader").fadeOut("slow");
    });
   </script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
  </body>
</html>