<?php

include '../../classes/autoloader.php';
include '../../business/session.php';
?>
<!DOCTYPE html>
<html>
  <head>
  <link rel="shortcut icon" href="/empire/assets/img/favicon.ico" type="image/x-icon">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product</title>
    <!-- Fonts -->
    <link href="style.css" rel="stylesheet">
    <meta name="robots" content="noindex,follow" />
    <script src="/empire/assets/js/jquery-3.5.1.min.js"></script>
    <script src="/empire/assets/js/bootstrap.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/8539302c95.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../product-grid/style.css">
    <script src="script.js" charset="utf-8"></script>
    <script src="../../assets/js/user.js"></script>

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

  <!-- HEADER -->
  <!-- ------------------------------------------------- -->
  <?php include '../header.php'; ?>
<?php
            extract($_GET);
            $id = $_GET['id'];
            $u = new User();
            $f1 = new Product();
            $f1->setpid($id);
            $res = $f1->getProduct();
            $res = $f1->format($res);
            
              $res = $res[0];

              $colors = explode(',',$res['color']);
              $sizes = explode(',',$res['size']);
              $images = explode(',',$res['image']);
              $colid = explode(',',$res['colid']);
              $sizid = explode(',',$res['sizeid']);
            ?>


<div class="alert alert-primary" id="addedtocart" role="alert">
          <button type="button" class="close"  aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
           You Have added THis product to your cart !
</div>
    <main class="container">
    
<input type="number" id="addtocart" value="<?php echo $u->getUserId(); ?>" hidden>
<input type="number" id="pid" value="<?php echo $id ; ?>" hidden>
      <!-- Left Column / Headphones Image -->
      <div class="row">
<div class="col-lg-6">
                  

                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

  <div class="carousel-inner">
    <?php 
      foreach($images as $image){
      ?>
                <div class="carousel-item">
                  <img class="d-block w-100" id="defimg" src="<?php echo $image; ?>" alt="" style="width:100%;height:500px;">
                </div>
      <?php
      }
    ?>
    
   
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
    </div>
      
    
</div>
      
    
     
      
     

      <!-- Right Column -->
<div class="col-lg-6">

        <!-- Product Description -->
        <div class="product-description">
          <span><?php echo $res['categorie']; ?></span>
          <h1><?php echo $res['name']; ?></h1>
          <p><?php echo $res['description']; ?></p>
        </div>

        <!-- Product Configuration -->
        <div class="product-configuration">

          <!-- Product Color -->
          <div class="product-color">
            <span>Color</span>

            <div class="color-choose">
              <?php
              $i=0;
                foreach($colors as $color){
                  
              ?>
                  <div>
                  <input data-image="blue" type="radio" id="red" name="color" value="<?php echo $color ?>" checked>
                  <label for="blue"><span value="<?php echo $colid[$i]; ?>" class="co non" id="color" style="background-color : <?php echo $color ?>;"></span></label>
                  </div>

              <?php
              $i++;
                }
              ?>
             
              
            </div>

          </div>

          <!-- Cable Configuration -->
          <div class="cable-config">
            <span>Choose a Size</span>

            <div class="cable-choose">
              <?php 
               $i=0;
                  foreach($sizes as $size){
                     
                      
                    ?>

                            <button id="size" class="non" value="<?php echo $sizid[$i] ; ?>"><?php echo $size ; ?></button>

              <?php 
                  $i++;
                  }
              ?>
              
            </div>

            <input class="form-control" type="number" name="" id="quantity" placeholder="quantity">
          </div>
        
        </div>
                    
        <!-- Product Pricing -->
        <div class="product-price">
          <span id="price"><?php echo $res['prices']; ?></span><span> MAD</span>
          <?php if (isset($_SESSION['mylogin'])) { ?>
          <a href="#" class="cart-btn" id="addcart">Add to cart</a>
          <?php } else { ?>
            <a href="#" class="cart-btn" id="buynow">Buy Now</a>
            <?php }?>
        </div>
</div>


<?php  $s = new shipping();
        $data = $s->showship();
     
?>
  <table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Country</th>
      <th scope="col">Price</th>
    </tr>
  </thead>
  <tbody>
    <?php  
    
        foreach ($data as $line) {
    ?>

    <tr>
      <td><?php echo $line['country'] ; ?></td>
      <td><?php echo $line['price'] ; ?></td>
    </tr>

    <?php
        }
    ?>
   
  </tbody>
</table>

      </div>
    </main>





<div class="modal fade" id="Sign-in" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form class="needs-validation " id="signin">
      <div class="modal-header">
     

        <h5 class="modal-title" id="exampleModalLabel">Sign In</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="alert alert-primary" role="alert" id="wrong">
         Your Username or Password are wrong !
        </div>

            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Username</label>
              <div class="col-sm-10">
                <input type="text" name="user" class="form-control" id="inputEmail3" placeholder="Username">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
              <div class="col-sm-10">
                <input type="password" name="pass" class="form-control" id="inputPassword3" placeholder="Password">
              </div>
            </div>
                <input type="number" name="log" hidden>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" >Sign In</button>
      </div>
      </form>  
    </div>
  </div>
</div>


<div class="modal fade" id="Sign-out" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form class="needs-validation " action="../business/logout.php" method="post">
      <div class="modal-header">


        <h5 class="modal-title" id="exampleModalLabel">Are you Sure ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <button type="submit" class="btn btn-primary" >Sign Out</button>
      </div>
      </form>  
    </div>
  </div>
</div
    <!-- Scripts -->
 
    <script>
     $(window).on("load",function(){
        $(".loader").fadeOut("slow");
    });
   </script>
   
  </body>
</html>
