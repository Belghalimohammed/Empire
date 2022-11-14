<?php 

include 'business/session.php';
if ($_SESSION['mylogin'] != 1) {


  header('Location: /empire/');
 
}
?>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <link rel="shortcut icon" href="/empire/assets/img/favicon.ico" type="image/x-icon">

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    

        <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
        <link rel="stylesheet" href="assets/css/admin.css">
        
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>

        <title>Empire</title>
      </head>
<body>
                  <div class="loader">
                    <div>
  
                      <span>↓</span>
                      <span class="span" style="--delay: 0.1s">↓</span>
                      <span class="span" style="--delay: 0.3s">↓</span>
                      <span class="span" style="--delay: 0.4s">↓</span>
                      <span class="span" style="--delay: 0.5s">↓</span>
                      
                    </div>       
                  </div>
     
   <?php include 'views/side.html'; ?> 
     

    <div class="home" id="home">
                    <div class="gestcont">
                          <div class="row">
                              <div class="gest">
                                  <p id="add-g">Add</p>
                              </div>
                              <div class="gest">
                                  <p id="edit-g">Edit</p>
                              </div>
                              <div class="gest">
                                  <p>Promotions</p>
                              </div>
                          </div>
                        <div class="row">
                            <div class="gest">
                                <p id="msg-g">Messages</p>
                            </div>
                            <div class="gest">
                                <p>Users</p>
                            </div>
                            <div class="gest">
                                <p>Admins</p>
                            </div>
                        </div>
    
                    </div>
                    <div class="msgcont">
                    <?php include 'views/msg.html'; ?> 
                 </div>
                    <div class="commandcont">
                    <table class="  " id="table-edit-Command">
                    <thead>
                                                <tr>
                                                  <th scope="col">#</th>
                                                  <th scope="col">Product</th>
                                                  <th scope="col">Date</th>
                                                  <th scope="col">size</th>
                                                  <th scope="col">color</th>
                                                  <th scope="col">Quantity</th>
                                                  
                                                  <th scope="col">Price</th>
                                                  <th scope="col">Payed</th>
                                                  <th scope="col">Delivered</th>
                                                  <th scope="col">Client</th>
                                                  <th scope="col"> <i class="fas fa-trash"></i> </th>
                                                </tr>
                                              </thead>
                      </table>
                      <button class="btn btn-dark" id="refcom">Refresh</button>
                    </div>

                    <div class="bilancont">
                      <table class="table table-dark">
                                              <thead>
                                                <tr>
                                                     <th colspan="1">Entree</th>
                                                    <th colspan="20">Sortie</th>
                                                </tr>
                                                <tr>

                                                  <th scope="col">Date</th>
                                                  <th scope="col">Product</th>
                                                  <th scope="col">Quantity</th>
                                                  <th scope="col">Price</th>
                                                  <th scope="col">Date</th>
                                                  <th scope="col">Product</th>
                                                  <th scope="col">Quantity</th>
                                                  <th scope="col">Price</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                <tr>
                                                  <th scope="row">08-11</th>
                                                  <td>shirt8</td>
                                                  <td>5</td>
                                                  <td>500mad</td>
                                                  <td>11-11</td>
                                                  <td>hat</td>
                                                  <td>10</td>
                                                  <td>350 mad</td>
                                                </tr>
                                                
                                              </tbody>
                      </table>
                    </div>

                     <div class="container addcont">
                       <div class="row">
                         <div class="col-6 form-add">
                           <h2>Add Product</h2>
                           
                           <button type="button" class="btn btn-dark btn-lg" data-toggle="modal" data-target="#add-product">
                            Add
                            </button>
                        
                             <h2>Add shipping</h2>
                           
                           <button type="button" class="btn btn-dark btn-lg" data-toggle="modal" data-target="#add-ship">
                            Add
                            </button>
                              
                        </div>
                        <div class="col-6 form">
                          
                                  <h2 class="title">Add Categorie</h2>
                            
                                  <button type="button" class="btn btn-dark btn-lg" data-toggle="modal" data-target="#add-categorie">
                                    Add
                                    </button>
                                <br><br><br><br><br><br>
                          
                            <h2 class="title">Add Color</h2>
                              
                            <button type="button" class="btn btn-dark btn-lg" data-toggle="modal" data-target="#add-color">
                                    Add
                             </button>

                             <br><br><br><br><br><br>
                          
                            <h2 class="title">Add Size</h2>
                              
                            <button type="button" class="btn btn-dark btn-lg" data-toggle="modal" data-target="#add-size">
                                    Add
                             </button>
                                                     
                          
                        </div>
                      </div>
                    </div>

                    <div class="editcont">
                      <table class="  " id="table-edit-product">
                                              <thead>
                                                <tr>
                                                  <th scope="col">#</th>
                                                  <th scope="col">Name</th>
                                                  <th scope="col">Categories</th>
                                                  <th scope="col">Colors</th>
                                                  <th scope="col">sizes</th>
                                                  <th scope="col">Start Stock</th>
                                                  <th scope="col">Now Stock</th>
                                                  <th scope="col">prix achat</th>
                                                  <th scope="col">prix vente</th>
                                                  <th scope="col">Edit</th>
                                                  <th scope="col">Delete</th>
                                                </tr>
                                              </thead>
                                             <!--  <tbody class="display-product">    
                                              </tbody> -->
                      </table>
                    </div>

    </div>
    



    <div class="modal fade" id="add-ship" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form class="needs-validation " id="form-add-ship">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Shipping</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                                           <label for=""> Country</label>
                                            <input type="text" class="form-control" id="shipcountry" name="country" placeholder="" required>
                                          <br>
                                          <label for=""> Price</label>
                                            <input type="number" class="form-control" id="shipprice" name="price" placeholder="" required>
                                          <br>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>



<div class="modal fade" id="add-product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form class="needs-validation " id="form-add-product" >
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add a Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          
                                      <div class="row">
                                        <div class="col-md-6 mb-3">
                                          <input type="text" class="form-control" id="productName" name="productName" placeholder="name"  required>
                                          <div class="invalid-feedback">
                                            Valid  name is required.
                                          </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                          <label for="lastName">picture</label>
                                          <input type="file" name="my_file[]" multiple>                                      <div class="invalid-feedback">
                                            Valid picture is required.
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-6 mb-3">
                                          <input type="number" class="form-control" id="productPriceB" name="productPriceB" placeholder="Prix d'achat"  required>
                                          <div class="invalid-feedback">
                                            Valid  price is required.
                                          </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                          <input type="number" class="form-control" id="productPriceS" name="productPriceS" placeholder="Prix de ventre"  required>
                                          <div class="invalid-feedback">
                                            Valid price is required.
                                          </div>
                                        </div>
                                      </div>

                                      <div class="form-group ">
                                        <textarea class="form-control" rows="3" maxlength="500" id="productDescription" name="productDescription" placeholder="Description"></textarea>
                                      </div>

                                      <div class="row">
                                        <div class="col-md-6 mb-3">
                                        <input type="number" class="form-control" id="productQuantity" name="productQuantity" placeholder="Quantity" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                             <select class="js-example-basic-multiple-2 seletc-size" id="add-size-product" name="size[]" multiple="multiple"  style="width : 100%">
                                              
                                              
                                              </select>   
                                             
                                              
          
                                        </div>
                                      </div>
                                      

                                      <div class="row">
                                        <div class="col-md-6 mb-3">
                                              <select class="js-example-basic-multiple-1 seletc-col" id="add-color-product" name="colors[]" multiple="multiple"  style="width : 100%">
                                              
                                              
                                              </select>                                 </div>
                                        <div class="col-md-6 mb-3">
                                            <select class="js-example-basic-multiple seletc-cat" name="categories[]" multiple="multiple"  style="width : 100%">
                                              
                                              
                                              </select> 
                                        </div>
                                      </div>


                                      
                                      
          
      </div>
      <div class="modal-footer">
        <button type="button" id="test1" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>



<div class="modal fade" id="add-categorie" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form class="needs-validation " id="form-add-categorie">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Categorie</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                                           <label for=""> name</label>
                                            <input type="text" class="form-control" id="categorieName" name="categorieName" placeholder="" required>
                                          <br>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>


<div class="modal fade" id="add-color" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form class="needs-validation " id="form-add-color">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Color</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <label for=""> name</label>
                                        <input type="text" class="form-control" id="colorName" name="addcolor" placeholder="" required>
                                      <br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" >Save changes</button>
      </div>
      </form>  
    </div>
  </div>
</div>


<div class="modal fade" id="add-size" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form class="needs-validation " id="form-add-size">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Size</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <label for=""> name</label>
                                        <input type="text" class="form-control" id="sizeName" name="addsize" placeholder="" required>
                                      <br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" >Save changes</button>
      </div>
      </form>  
    </div>
  </div>
</div>

<div class="modal fade" id="edit-product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form class="needs-validation " id="form-edit-product" >
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit  Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          
                                      <div class="row">
                                        <div class="col-md-6 mb-3">
                                          <input type="text" class="form-control" id="productName_e" name="productName_e" placeholder="name"  required>
                                          <div class="invalid-feedback">
                                            Valid  name is required.
                                          </div>
                                        </div>
                                        <div class="col-md-6 mb-3 ">
                                          <label for="lastName">pictures</label>
                                          <i class="fas fa-images" data-toggle="modal"  data-target="#edit-Product-Images"></i>
                                          <input type="file" name="my_file[]" multiple>                                      <div class="invalid-feedback">
                                            Valid picture is required.
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-6 mb-3">
                                          <input type="number" class="form-control" id="productPriceB_e" name="productPriceB" placeholder="Prix d'achat"  required>
                                          <div class="invalid-feedback">
                                            Valid  price is required.
                                          </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                          <input type="number" class="form-control" id="productPriceS_e" name="productPriceS" placeholder="Prix de ventre"  required>
                                          <div class="invalid-feedback">
                                            Valid price is required.
                                          </div>
                                        </div>
                                      </div>

                                      <div class="form-group ">
                                        <textarea class="form-control" rows="3" maxlength="500" id="productDescription_e" name="productDescription" placeholder="Description"></textarea>
                                      </div>

                                      <div class="row">
                                        <div class="col-md-6 mb-3">
                                          <input type="number" class="form-control" id="productQuantity_e" name="productQuantity" placeholder="Quantity start" required>
                                        
                                        </div>
                                        <div class="col-md-6 mb-3">
                                        <select class="js-example-basic-multiple-1 seletc-size" id="size_e" name="sizes[]" multiple="multiple"  style="width : 100%">
                                              
                                              
                                              </select>    
          
                                        </div>
                                      </div>

                                      <div class="row">
                                        <div class="col-md-6 mb-3">
                                              <select class="js-example-basic-multiple-1 seletc-col" id="col_e" name="colors[]" multiple="multiple"  style="width : 100%">
                                              
                                              
                                              </select>                                    </div>
                                        <div class="col-md-6 mb-3">
                                            <select class="js-example-basic-multiple seletc-cat" id="cat_e" name="categories[]" multiple="multiple"  style="width : 100%">
                                              
                                              
                                              </select> 
                                        </div>
                                      </div>

                                    <input type="number" name="producteditid" id="edit-id" hidden>
                                      
                                      
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit"  class="btn btn-primary" >Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
                                    
                                        
                              
<div class="modal fade" id="delete-product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form class="needs-validation " id="form-delete-product">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Are you sure ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <input type="number" name="deleteproduct" id="deleteid" hidden>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <button type="submit"  class="btn btn-primary" >Yes</button>
      </div>
      </form>  
    </div>
  </div>
</div>
                             

<div class="modal fade" id="sure-edit-product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form class="needs-validation " id="">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Continue ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <input type="number" name="getproductedit" id="editid" hidden>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <button type="button" id="toeditpro" data-toggle="modal"  data-target="#edit-product"  class="btn btn-primary" data-dismiss="modal">Yes</button>
      </div>
      </form>  
    </div>
  </div>
</div>



<div class="modal fade" id="edit-Product-Images" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form class="needs-validation " id="add_Picture_Product">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Pictures </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        
      </div>
      <div class="modal-body">
        <div class="alert alert-primary" id="alert_no_pic" role="alert">
          You Must Have a Picture !
        </div>
        <div class="here-pic">
       
        </div>
      </div>
      <input type="number" name="pidforImage" id="editidp" hidden>
      <div class="modal-footer">
        <input type="file" id="filetoadd" name="my_file[]" style="left:5px;" multiple>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">cancel</button>
        <button type="submit"   class="btn btn-primary" >Add</button>
      </div>
      </form>  
    </div>
  </div>
</div>

                              
<div class="modal fade" id="delete-picture-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form class="needs-validation " id="delete-pic-prod-form">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Are you sure ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <input type="text"  id="imageurl" hidden>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <button type="submit"  class="btn btn-primary" >Yes</button>
      </div>
      </form>  
    </div>
  </div>
</div>


<div class="modal fade bd-example-modal-lg" id="size-color-product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Quantity </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        
      </div>
      <div class="modal-body">
        <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">Size</th>
                    <th scope="col">Color</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Set</th>
                  </tr>
                </thead>
                
                  <tbody id="sizes">
                    
                  
                  </tbody>
               
         </table>
        
      </div>
     
      <div class="modal-footer">
        
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Return</button>
      </div>
      </form>  
    </div>
  </div>
</div>

                              
<div class="modal fade" id="Add-product-color-size" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
   
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Are you sure ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-footer here-btn">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <a id="addProductDispo1"  class="btn btn-dark addProductDispo">Done</a>
      </div>
       
    </div>
  </div>
</div>

<div class="modal fade" id="showinfosure" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form class="needs-validation " id="">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Continue ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <input type="number" name="" id="herecartid" value="" hidden>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <button type="button" id="clientinfo" data-toggle="modal"  data-target="#showinfo"  class="btn btn-primary" data-dismiss="modal">Yes</button>
      </div>
      </form>  
    </div>
  </div>
</div>

<div class="modal fade" id="showinfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Infos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Full Name:</label>
            <input type="text" class="form-control" id="fname" value="" disabled>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Adresse:</label>
            <textarea class="form-control" rows="2" id="adresse" disabled></textarea>
          </div>
          <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <div class="form-group">
                                              <label for="recipient-name" class="col-form-label">Pays:</label>
                                              <input type="text" class="form-control" id="pays" value="" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                              <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Code Postal:</label>
                                                <input type="text" class="form-control" id="code" value="" disabled>
                                              </div>
                                        </div>
           </div>
          
        
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Numero:</label>
            <input type="text" class="form-control" id="num" value="" disabled>
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="delivered" class="btn btn-primary">Delivered</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="delcomsure" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form class="needs-validation " id="">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Continue ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <input type="number" name="" id="herecomtodel" value="" hidden>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <button type="button" class="btn btn-primary" id="deletecommand">Yes</button>
      </div>
      </form>  
    </div>
  </div>
</div>

  <!-- Optional JavaScript -->
  <script>
    function showinf(id){
      $("#showinfosure").modal("show");
      $("#herecomtodel").val(+id);

    }
    function delcom(id){
      $("#delcomsure").modal("show");
      $("#herecartid").val(+id);

    }
    function dispo(i){
      $("#Add-product-color-size").modal("show");

      $("#addProductDispo1").attr("a_key",i);
    }
    function edit(id){
      $("#editid").attr("value",id);
      $("#edit-id").attr("value",id);
      $("#editidp").attr("value",id);
      $("#alert_no_pic").hide();
    }

    function delet(id){
      $("#deleteid").attr("value",id);
    }

    function passurl(url){
       $("#imageurl").val(url);
   }
  </script>

  <script src="assets/js/ajax_admin.js"></script>
  <script src="assets/js/admin.js"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://kit.fontawesome.com/8539302c95.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   
</body>
</html>

