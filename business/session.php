<?php 

    session_start();

     if(isset($_SESSION['mylogin']) && !empty($_SESSION['mylogin'])) {

     return true;
     }else  {
     return false;
     }


     

 ?>