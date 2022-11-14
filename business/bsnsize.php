<?php
include '../classes/autoloader.php';
include 'session.php';


if (isset($_POST['addsize'])) 
{
    $c = new Size();
    $c->setSize($_POST['addsize']);
 

    $stmt = $c->addsize();

    echo json_encode($stmt);
}

if (isset($_POST['getsizesp'])) 
{
    $c = new Size();
    
 

    $stmt = $c->getsizes();

    echo json_encode($stmt);
}



?>