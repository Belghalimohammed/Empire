<?php
include '../classes/autoloader.php';
include 'session.php';


if (isset($_POST['categorieName'])) 
{
    $c = new Categorie();
    $c->setCategorie($_POST['categorieName']);
 

    $stmt = $c->addcategorie();

    echo json_encode($stmt);
}

if (isset($_POST['getcategories'])) 
{
    $c = new Categorie();
    
 

    $stmt = $c->getcategories();

    echo json_encode($stmt);
}



?>