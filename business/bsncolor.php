<?php
include '../classes/autoloader.php';
include 'session.php';


if (isset($_POST['addcolor'])) 
{
    $c = new Color();
    $c->setColor($_POST['addcolor']);
 

    $stmt = $c->addcolor();

    echo json_encode($stmt);
}

if (isset($_POST['getcolors'])) 
{
    $c = new Color();
    
 

    $stmt = $c->getcolors();

    echo json_encode($stmt);
}



?>