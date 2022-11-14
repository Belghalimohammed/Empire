<?php
include '../classes/autoloader.php';
include 'session.php';

if (isset($_POST['addcommand'])) 
{
    $items = explode(",", $_POST['items']);
    for($i = 0 ; $i <count($items)-1 ; $i++){
        $c = new Command;
        $c->setCartid((int)$items[$i]);
        $c->setFname($_POST['fname']);
        $c->setAdresse($_POST['adresse']);
        $c->setCode($_POST['code']);
        $c->setCountry($_POST['pays']);
        $c->setNb($_POST['tel']);
        $c->setDate(date("Y-m-d"));
        $c->setPaytype($_POST['type']);
        $c->setId($_SESSION['mylogin']);
    
        $stmt = $c->addCommand();
    }
   

    echo json_encode($i);
}


if (isset($_POST['showcommand'])) 
{
    $c = new Command();

    $stmt = $c->displayCommand();

    echo json_encode($stmt);
}

if (isset($_POST['getcommand'])) 
{
    $c = new Command();

    $stmt = $c->getCommand($_POST['getcommand']);

    echo json_encode($stmt);
}

if (isset($_POST['deletecommand'])) 
{
    $c = new Command();
    $c->setId($_POST['deletecommand']);

    $stmt = $c->deleteCommand();

    echo json_encode($stmt);
}

if (isset($_POST['done'])) 
{
    $c = new Command();
    $c->setId($_POST['commandid']);
    $c->setDone($_POST['done']);
    $stmt = $c->done();

    echo json_encode($stmt);
}


?>