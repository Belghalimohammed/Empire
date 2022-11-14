<?php
include '../classes/autoloader.php';
include 'session.php';

if (isset($_POST['addtocart'])) 
{
    $c = new Cart();
    $c->setPid($_POST['pid']);
    $c->setSid($_POST['sid']);
    $c->setId($_SESSION['mylogin']);
    $c->setQuantity($_POST['qu']);
    $c->setCoid($_POST['coid']);
    $c->setPic($_POST['pic']);


    $stmt = $c->addtocart();

    echo json_encode($stmt["MAX(cartid)"]);
}


if (isset($_POST['showcart'])) 
{
    $c = new Cart();
    $c->setId($_POST['showcart']);

    $stmt = $c->showcart();

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