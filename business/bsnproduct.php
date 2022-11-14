<?php
include '../classes/autoloader.php';
include 'session.php';


if (isset($_POST['productName'])) 
{
                $p = new Product();
                $p->setName($_POST['productName']);
              $p->setDescription($_POST['productDescription']);
              $p->setPrice_b($_POST['productPriceB']);
              $p->setPrice_s($_POST['productPriceS']);
              $p->setQuantity($_POST['productQuantity']);
              //$p->setColor($_POST['productColors']);
            
              $stmt = $p->addproduct();

              //categories
                $categories = $_POST['categories'];
                $catcount = count($categories);
                $pid = (int)$p->getProductId()["MAX(pid)"];
                

                for($i = 0 ; $i < $catcount ; $i++){
                  $cid = (int)$categories[$i];
                  $s =   $p->addproductcategories($cid,$pid);
              }

              //colors
            $colors = $_POST['colors'];
            $colcount = count($colors);

            for($i = 0 ; $i < $colcount ; $i++){
              $p->setColor($colors[$i]);
              $st =   $p->addproductColors($pid);
            }

            //sizes
            $sizes = $_POST['size'];
            $sizecount = count($sizes);

            for($i = 0 ; $i < $sizecount ; $i++){
              $p->setSize($colors[$i]);
              $st =   $p->addproductSizes($pid);
        }



      


        //pictures
          $target_dir = "/empire/assets/img/";
          $myfile = $_FILES['my_file'];
          $filecount = count($myfile["name"]);

          for($i = 0 ; $i < $filecount ; $i++){
            $target_file = $target_dir . basename($myfile["name"][$i]);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            //move_uploaded_file($myfile["tmp_name"][$i], $target_file);
            @copy($_FILES['my_file']['tmp_name'][$i],"/opt/lampp/htdocs".$target_file);
         
          $p->setPictures($target_file);
          $stm = $p->addproductImages($pid);

          }
            

            echo json_encode(1);
}

if (isset($_POST['getproduct'])) 
{
    $p = new Product();
    $stmt = $p->displayProduct($_POST['getproduct'],'','','');
    $stmt = $p->format($stmt);
    echo json_encode($stmt);
}

if (isset($_POST['getproductvia'])) 
{
    $p = new Product();
    $co = $_POST['color'];
    $ca = $_POST['categorie'];
    $s = $_POST['size'];
    $stmt = $p->displayProduct($_POST['getproductvia'],$co,$ca,$s);
    $stmt = $p->format($stmt);
    echo json_encode($stmt);
}


if (isset($_POST['deleteproduct'])) 
{
  $p = new Product();
  $p->setPid($_POST['deleteproduct']);
  
    
    $stmt = $p->deleteProduct();
   
   
    echo json_encode($stmt);
}

if (isset($_POST['getproductedit'])) 
{
  $p = new Product();
  $p->setPid($_POST['getproductedit']);
  
    
    $stmt = $p->getProduct();
   $stmt = $p->format($stmt);
   
    echo json_encode($stmt);
}

if (isset($_POST['producteditid'])) 
{
  $p = new Product();
  $p->setPid($_POST['producteditid']);
  $p->setName($_POST['productName_e']);
  $p->setDescription($_POST['productDescription']);
  $p->setPrice_b($_POST['productPriceB']);
  $p->setPrice_s($_POST['productPriceS']);
  $p->setQuantity($_POST['productQuantity']);
    
    
   

    //categories
    
    $categories = $_POST['categories'];
    $catcount = count($categories);
    $pid = $_POST['producteditid'];
    $p->deleteproductCategories();

    for($i = 0 ; $i < $catcount ; $i++){
      $cid = (int)$categories[$i];
      $s =   $p->addproductcategories($cid,$pid);
   }

  
      //colors
      $p->deleteproductColors();
      $colors = $_POST['colors'];
      $colcount = count($colors);

      for($i = 0 ; $i < $colcount ; $i++){
        $p->setColor($colors[$i]);
        $st =   $p->addproductColors($pid);
      }

       //sizes
       $p->deleteproductSizes();
       $sizes = $_POST['sizes'];
       $sizecount = count($sizes);
 
       for($i = 0 ; $i < $sizecount ; $i++){
         $p->setSize($sizes[$i]);
         $st =   $p->addproductSizes($pid);
       }
 
   
      $stmt = $p->editProduct();
    echo json_encode($stmt);
}

if (isset($_POST['deleteproductpicture'])) 
{
  $p = new Product();
  $p->setPid($_POST['deleteproductpicture']);
  $p->setPictures($_POST['imagetodelete']);
  $c = $p->countProductImages();
  if($c['COUNT(*)'] == 1){
    echo json_encode('false');
  } else {
    $stmt = $p->deleteproductImage();
    echo json_encode('true');
  }
    
}

if (isset($_POST['pidforImage'])) 
{
  $p = new Product();
 $test = array();
  $pid = $_POST['pidforImage'];
  
     //pictures
     $target_dir = "assets/img/";
     $myfile = $_FILES['my_file'];
     $filecount = count($myfile["name"]);
     for($i = 0 ; $i < $filecount ; $i++){
                // file_put_contents($target_dir.$myfile["name"][$i], file_get_contents($myfile["tmp_name"][$i]));
      array_push($test , $target_dir.$myfile["name"][$i]);
       array_push($test , file_get_contents($myfile["tmp_name"][$i]));

     $target_file = $target_dir.$myfile["name"][$i];
                // $p->setPictures($target_file);
                // $p->addproductImages($pid);
     }


     $stmt = $p->getproductImages($pid);
 
     $result = array();
     foreach($stmt as $ligne){
      array_push($result , $ligne['image']);
     }

//myfile
  //   echo json_encode($result);
     echo json_encode($test);
}

if (isset($_POST['disposid'])) 
{
    $p = new Product();
    $p->setSid($_POST['disposid']);
    $p->setCid($_POST['dispocoid']);
    $p->setQuantity($_POST['dispoqu']);
    if($p->getProductId()["MAX(pid)"]==NULL){
      $pid = 1;
    } else {
      $pid = (int)$p->getProductId()["MAX(pid)"];
    }
    
    $stmt = $p->addDispo($pid);

    echo json_encode($stmt);
}


?>