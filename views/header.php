
<style>
  #logtel {
  display: none;
  visibility: hidden;
}

@media (max-width: 768px) {
    #loglap { display: none ; }
    #logtel  { display: block; visibility: visible; }
}
</style>
<header class="header">
         
                <div class="header__logo-container"  data-toggle="modal" data-target="#exampleModalCenter">
                   <img src="/empire/assets/img/logo.jpg" alt=""  class="header__logo">
                </div>

                <div class="header__logo-container" id="logtel" data-toggle="modal" data-target="#exampleModalCenter">
                
                <i class="fas fa-bars 3x"></i>
    
                    </div>
    
    <div class="header__links">
    <a href="/empire" class="header__link">Home</a>
      <a href="/empire/views/product-grid" class="header__link">Products</a>
      <a href="/empire/views/Contact" class="header__link" >Contact Us</a>
    </div>
    <div class="header__search-container">
      <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M11 19.5C15.4183 19.5 19 15.9183 19 11.5C19 7.08172 15.4183 3.5 11 3.5C6.58172 3.5 3 7.08172 3 11.5C3 15.9183 6.58172 19.5 11 19.5Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        <path d="M21 21.5L16.65 17.15" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
      </svg>
      <input class="header__search" type="text" placeholder="Search">
    </div>


    <?php if (isset($_SESSION['mylogin']) || isset($_SESSION['admin'])) {
               $u = new User();
                $infos =  $u->getAllUser($_SESSION['mylogin']);
          ?>

                  <div class="header__user">
                    <a class="header__loved" href="#" hidden>
                      <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20.84 5.11C20.3292 4.599 19.7228 4.19365 19.0554 3.91708C18.3879 3.64052 17.6725 3.49817 16.95 3.49817C16.2275 3.49817 15.5121 3.64052 14.8446 3.91708C14.1772 4.19365 13.5708 4.599 13.06 5.11L12 6.17L10.94 5.11C9.90831 4.07831 8.50903 3.49871 7.05 3.49871C5.59097 3.49871 4.19169 4.07831 3.16 5.11C2.12831 6.14169 1.54871 7.54097 1.54871 9C1.54871 10.459 2.12831 11.8583 3.16 12.89L4.22 13.95L12 21.73L19.78 13.95L20.84 12.89C21.351 12.3792 21.7564 11.7728 22.0329 11.1054C22.3095 10.4379 22.4518 9.72249 22.4518 9C22.4518 8.27751 22.3095 7.5621 22.0329 6.89464C21.7564 6.22719 21.351 5.62076 20.84 5.11V5.11Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                      </svg>
                    </a>
                    <a class="header__cart" href="/empire/views/cart/">
                      <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7 2.5V6.5H3V20.5C3 21.0304 3.21071 21.5391 3.58579 21.9142C3.96086 22.2893 4.46957 22.5 5 22.5H19C19.5304 22.5 20.0391 22.2893 20.4142 21.9142C20.7893 21.5391 21 21.0304 21 20.5V6.5H17V2.5H7Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M3 6.5H21" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                      </svg>
                    </a>
                    
                    <a class="header__profile" href="#" data-toggle="modal" data-target="#Sign-out"></a>
                   

                   



                 

        </div>
          <?php } else { ?>

                  <a href="#" class="header__link" data-toggle="modal" data-target="#Sign-in">Login</a>
                   <a href="/empire/views/validator" class="header__link">Register</a>
                 
                 

          <?php } ?>
   
  </header>




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


                <div class="form-group row">
          <label for="inputPassword3" class="col-sm-6 col-form-label">You don't have an account ?</label>
              <div class="col-sm-6">
              <a href="/empire/views/validator" class="btn btn-primary">Register</a>
              </div>
      </div>

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
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                  <div class="header__lin">
                <a href="/empire" class="header__link">Home</a>
                  <a href="/empire/views/product-grid" class="header__link">Products</a>
                  <a href="/empire/views/Contact" class="header__link" >Contact Us</a>
                </div>
      </div>
     
    </div>
  </div>
</div>