<?php

include '../classes/autoloader.php';
include 'session.php';

if (isset($_POST['country'])) 
{
    $c = new shipping();
    $c->setCountry($_POST['country']);
    $c->setPrice($_POST['price']);
    


    $stmt = $c->addship();

    echo json_encode($stmt);
}


if (isset($_POST['deleteship'])) 
{
    $c = new shipping();
    $c->setCountry($_POST['deleteship']);
    


    $stmt = $c->deleteship();

    echo json_encode($stmt);
}

if (isset($_POST['showship'])) 
{
    $c = new shipping();

    $stmt = $c->showship();

    echo json_encode($stmt);
}
?>