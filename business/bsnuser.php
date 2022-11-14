<?php
include '../classes/autoloader.php';
include 'session.php';

if (isset($_POST['log'])) {
    $u1 = new User();
    $u1->setUser($_POST['user']);
    $u1->setPass($_POST['pass']);
    $count = $u1->login();
    
    if ($count <= 0) {

      echo json_encode(0);
      
      
    } else {
      $id = $u1->getUserIdd($_POST['user']);
      $a =  $u1->getAllUser($id);
        $dat = $a['isadmin'];
        if($dat==1){
          $_SESSION['mylogin'] = $dat;
        } else {
         $_SESSION['mylogin'] = $id;
        }
        session_start();


      echo json_encode($dat+1);
    }

   
}

if (isset($_POST['fname'])) {
    $u1 = new User();
    $u1->setUser($_POST['user']);
    $u1->setPass($_POST['pass']);
    $u1->setFname($_POST['fname']);
    $u1->setEmail($_POST['email']);
   
    $a =  $u1->register();

  echo json_encode($a);
   // header("location:../index.php");
}



