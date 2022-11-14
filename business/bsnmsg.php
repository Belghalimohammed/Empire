<?php
include '../classes/autoloader.php';
include 'session.php';


if (isset($_POST['message'])) 
{
    $m = new msg();
    $m->setName($_POST['name']);
    $m->setEmail($_POST['email']);
    $m->setNumber($_POST['number']);
    $m->setTime(date("Y-m-d"));
    $m->setMsg($_POST['message']);
  $stmt =  $m->addMsg();
 

    echo json_encode($stmt);
}

if (isset($_POST['getmsg'])) 
{
  $m = new msg();
    
 

    $stmt = $m->getmsgs();

    echo json_encode($stmt);
}



?>