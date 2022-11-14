<?php
include '../classes/autoloader.php';
include 'session.php';

if (isset($_POST['addcheck'])) 
{

    $c = new check();
    if (isset($_SESSION['mylogin'])) {
        
        $c->setId($_SESSION['mylogin']);

    } else {
        $c->setId('99999');
    }
    $c->setFprice($_POST['addcheck']);
    $c->setCid($_POST['cartid']);

    
    $c->addcheck();

    $stmt = $c->getCheckId();
    echo json_encode($stmt["MAX(id)"]);
}

if (isset($_POST['deletecheck'])) 
{
    
    $c = new check();
    $c->setId($_SESSION['mylogin']);

    
    $c->deletecheck();
}


if (isset($_POST['showcheck'])) 
{
    $c = new check();
    $c->setId($_POST['showcheck']);

    $stmt = $c->showcheck();

    echo json_encode($stmt);
}

if (isset($_POST['deletecart'])) 
{
    $c = new Cart();
    $c->setCartid($_POST['deletecart']);

    $stmt = $c->deletefromcart();

    echo json_encode($stmt);
}



?>