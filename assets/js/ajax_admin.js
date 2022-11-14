$(document).ready(function(){


    //------------------product--------------------------------

$("#form-add-product").submit(function(e){
    e.preventDefault();
    
    var url = "business/bsnproduct.php";
    $("#add-size-product").prop('disabled', false);
    $("#add-color-product").prop('disabled', false);
    $.ajax({
        url: url,
  
        type: "post",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
  
        success: function (addd) {
            $('#table-edit-product').DataTable().ajax.reload(null,false);
            size_col_done();
        },
      });

      
});

$("#toeditpro").click(function(){
    getcolors();
    getcategories();
    let getproductedit = $("#editid").val();
    var url = "business/bsnproduct.php";
    
    $.ajax({
        url: url,
  
        type: "post",
        data: {
            getproductedit : getproductedit
        },
  
        success: function (addd) {
            var addd = JSON.parse(addd);
           
            let cols = addd[0].color.split(',');
            let colsid = addd[0].colid.split(',');
            let categories = addd[0].categorie.split(',');
            let catsid = addd[0].catid.split(',');
            let images = addd[0].image.split(',');
            let sizes = addd[0].size.split(',');
             let sizeid = addd[0].sizeid.split(',');
            $("#productName_e").val(addd[0].name);
            $("#productPriceB_e").val(addd[0].priceb);
            $("#productPriceS_e").val(addd[0].prices);
            $("#productDescription_e").val(addd[0].description);
            $("#productQuantity_e").val(addd[0].quantity_s);
            //$("#col_e").val(colsid);

           
            $.each(cols,function(index,value){
                
             $(`#col_e`).append(`<option selected="selected" value="${colsid[index]}" hidden>${value}</option>`);
             
            });

           
            $.each(categories,function(index,value){
                
                $(`#cat_e`).append(`<option selected="selected" value="${catsid[index]}" hidden>${value}</option>`);
                
               });

               
              picture_display(images);

              $.each(sizes,function(index,value){
                
                $(`#size_e`).append(`<option selected="selected" value="${sizeid[index]}" hidden>${value}</option>`);
                
               });

        },
      });

     
});

function picture_display(images){
    $(".here-pic").html("");
    $.each(images,function(index,value){
     $(".here-pic").append(`
     <div class="imgcontainer" id="${value}">
             <img class="product-image-item" src="${value}">
             <div class="overlay">
                 <a href="#" class="icon" title="User Profile">
                     <i onclick="passurl('${value}')" class="fas icon-delete-pic fa-minus-circle" data-toggle="modal"  data-target="#delete-picture-modal"></i>
                 </a>
             </div>
     </div>
     `);

    });
   }

   

$("#form-edit-product").submit(function(e){
    e.preventDefault();
    var url = "business/bsnproduct.php";
    
    $.ajax({
        url: url,
  
        type: "post",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
  
        success: function (addd) {
            $('#table-edit-product').DataTable().ajax.reload(null,false);
            $('#edit-product').modal('hide');
        },
      });

     
});


function displayProduct(){


    
  var   table = $("#table-edit-product").DataTable({
    destroy: true,
            "ajax":{
                "method":"POST",
                "url":"./business/bsnproduct.php",
                "data":{
                    "getproduct":"%"
                },
                "dataSrc":""     
            },
            "columnDefs": [
                {"className": "dt-center", "targets": "_all"}
              ],
            "columns":[
                {"data":"pid"},
                {"data":"name"},
                {"data":"categorie"},
                {"data":"color"},
                {"data":"size"},
                {"data":"quantity_s"},
                {"data":"quantity_n"},
                {"data":"priceb"},
                {"data":"prices"},
                { "data":"edit"},
                { "data":"delete"}
                
            ]
    });
    
    $(".dataTables_length").hide();
      
}

displayProduct();





$("#form-delete-product").submit(function(e){
    e.preventDefault();
    var url = "business/bsnproduct.php";
    
    $.ajax({
        url: url,
  
        type: "post",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
  
        success: function (addd) {
            $('#table-edit-product').DataTable().ajax.reload(null,false);
            $('#delete-product').modal('hide');
        },
      });
});




$("#delete-pic-prod-form").submit(function(e){
    e.preventDefault();
    var url = "business/bsnproduct.php";
    let deleteproductpicture = $("#editidp").val();
    let imagetodelete = $("#imageurl").val();
    $.ajax({
        url: url,
  
        type: "post",
        data: {
            deleteproductpicture : deleteproductpicture,
            imagetodelete : imagetodelete
        },
  
        success: function (addd) {
            var addd = JSON.parse(addd);
           
            if(addd === 'false'){
                $('#delete-picture-modal').modal('hide');
               $("#alert_no_pic").show();
            } else {
                $(`[id="${imagetodelete}"]`).hide();
                $('#delete-picture-modal').modal('hide');
            }
            
           
         // delete-picture-modal    
        },
      });
});
$("#alert_no_pic").hide();

$("#add_Picture_Product").submit(function(e){
    e.preventDefault();
    var url = "business/bsnproduct.php";
    $.ajax({
        url: url,
  
       
        type: "post",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
  
        success: function (addd) {
           addd = JSON.parse(addd);
          picture_display(addd);
         
        },
      });
});

//------------------categorie--------------------------------


$("#form-add-categorie").submit(function(e){
    e.preventDefault();
    var url = "business/bsncategorie.php";
    
    $.ajax({
        url: url,
  
        type: "post",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
  
        success: function (addd) {
            getcategories();
        },
      });
      
});

function getcategories(){
    var url = "business/bsncategorie.php";
    let getcategories = 'a';
    $.ajax({
        url: url,
  
        type: "post",
        data: {
            getcategories : getcategories,
        },
  
        success: function (addd) {
            var jsonc = JSON.parse(addd);
            $(".seletc-cat").html("");
            for(let i =0 ; i <jsonc.length ; i++){
                $(".seletc-cat").append(`<option value="${jsonc[i].cid}">${jsonc[i].categorie}</option>`);
            }
            //$(".seletc-cat")
        },
      });

};

getcategories();







//------------------color--------------------------------


$("#form-add-color").submit(function(e){
    e.preventDefault();
    var url = "business/bsncolor.php";
    
    $.ajax({
        url: url,
  
        type: "post",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
  
        success: function (addd) {
            getcolors();
        },
      });
      
});

function getcolors(){
    var url = "business/bsncolor.php";
    let getcolors = 'a';
    $.ajax({
        url: url,
  
        type: "post",
        data: {
            getcolors : getcolors,
        },
  
        success: function (addd) {
            var jsonc = JSON.parse(addd);
            $(".seletc-col").html("");
            for(let i =0 ; i <jsonc.length ; i++){
                $(".seletc-col").append(`<option  a_key="${jsonc[i].color}" value="${jsonc[i].coid}">${jsonc[i].color}</option>`);
            }
        },
      });
     
};
getcolors();
        


//------------------size--------------------------------


$("#form-add-size").submit(function(e){
    e.preventDefault();
    var url = "business/bsnsize.php";
    
    $.ajax({
        url: url,
  
        type: "post",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
  
        success: function (addd) {
            getsizes();
        },
      });
      
});

function getsizes(){
    var url = "business/bsnsize.php";
    let getsizesp = 'a';
    $.ajax({
        url: url,
  
        type: "post",
        data: {
            getsizesp : getsizesp,
        },
  
        success: function (addd) {
            var jsonc = JSON.parse(addd);
            
            $(".seletc-size").html("");
            for(let i =0 ; i <jsonc.length ; i++){
                $(".seletc-size").append(`<option a_key="${jsonc[i].size}"  value="${jsonc[i].sid}">${jsonc[i].size}</option>`);
            }

           // for(let j = 0 ; j < )
        },
      });
     
};
getsizes();


//-----------------Disponible------------------------------
 
 
 function size_col_done(){
        $("#size-color-product").modal("show");
    
            $("#sizes").html("");
            $("[id='colors']").html("");
            let i = 0;
            $(`.seletc-size option:selected`).each(function(index,value){
               
            $(`.seletc-col option:selected`).each(function(){
                i++;
                
                       $("#sizes").append(`
                       
                       
                            <tr> 
                            

                                <td> ${$(value).attr("a_key")} </td>
                                

                                    
                                                    
                                                    <td>${$(this).attr("a_key")}</td>
                                    <td><input type="number" class="calc"  id="dispoqu${i}" name="dispoqu"></td>
                                                    
                                
                                                
                                 
                                
                                <td>
                                <input   id="disposid${i}" class="hidethis" value="${$(value).val()}" hidden></input>
                                <input type="number"   id="dispocoid${i}" name="dispocoid" value="${$(this).val()}" hidden>
                                <a onclick="dispo(${i})" id="addProductDispo" a_key="${i}" class="btn btn-dark addProductDispo">Done</a>
                                
                                </td>
                                
                           
                            
                            </tr>

                        
                       `);
                });


               
          });

    
 }


$('#addProductDispo1').click(function(){
    var url = "business/bsnproduct.php";
    let i = $(this).attr("a_key");
    let disposid = $(`#disposid${i}`).val();
    let dispocoid = $(`#dispocoid${i}`).val();
    let dispoqu = $(`#dispoqu${i}`).val();
   
    $.ajax({
        url: url,
  
        type: "post",
        data: {
            disposid : disposid,
            dispocoid : dispocoid,
            dispoqu : dispoqu,
        },
  
        success: function (addd) {
            $("#Add-product-color-size").modal("hide");
        },
      });
      
});



//------------------------------shipping
$("#form-add-ship").submit(function(e){
    e.preventDefault();
    var url = "/empire/business/bsnshipping.php";
    
    $.ajax({
        url: url,
  
        type: "post",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
  
        success: function (addd) {
            $("#add-ship").modal("hide");
        },
      });
      
});







//----------------------command

function displayCommand(){


    
    var   table = $("#table-edit-Command").DataTable({
      destroy: true,
              "ajax":{
                  "method":"POST",
                  "url":"/empire/business/bsncommand.php",
                  "data":{
                      "showcommand":"a"
                  },
                  "dataSrc":""     
              },
              "columnDefs": [
                {"className": "dt-center", "targets": "_all"}
              ],
              "columns":[
                  {"data":"commandid"},
                  {"data":"name"},
                  {"data":"date"},
                  {"data":"size"},
                  {"data":"color"},
                 
                  {"data":"quantity"},
                  {"data":"prices"},
                {"data":"paytype",
                render : function(data){
                   if(+data===1){
                       return 'V';
                   } else {
                       return 'X';
                   }
                }
              },
              {render : function(data){
                 return 'X';
              }
            },

            {"data":"commandid",
            render : function(data){
               
                return `<i class="fas fa-user user" onclick="showinf(${data})"></i>` ;
             } 
           },

           {"data":"commandid",
           render : function(data){
            return `<i class="fas fa-trash" onclick="delcom(${data})"></i>`;
                }
            },
            
              ],
              
      });
      
      $(".dataTables_length").hide();
        
  }
  displayCommand();


$("#clientinfo").click(function(){
    let id =$("#herecomtodel").val();
    var url = "/empire/business/bsncommand.php";
   
    $.ajax({
        url: url,
  
        type: "post",
        data: {
            getcommand : id
        },
  
        success: function (addd) {
            
            addd = JSON.parse(addd);
           $("#fname").val(addd.fname);
           $("#adresse").val(addd.adresse);
           $("#pays").val(addd.country);
           $("#code").val(addd.code);
           $("#num").val(addd.numero);

        },
      });

});

$("#deletecommand").click(function(){
    let id =  $("#herecartid").val();
    var url = "/empire/business/bsncommand.php";
   
    $.ajax({
        url: url,
  
        type: "post",
        data: {
            deletecommand : id
        },
  
        success: function (addd) {
           $('#table-edit-Command').DataTable().ajax.reload(null,false);
           $("#delcomsure").modal("hide");
        },
      });
})
$("#refcom").click(function(){
    $('#table-edit-Command').DataTable().ajax.reload(null,false);
});

$("#delivered").click(function(){
    let id =$("#herecomtodel").val();
    var url = "/empire/business/bsncommand.php";
   
    $.ajax({
        url: url,
  
        type: "post",
        data: {
            commandid : id,
            done : 1
        },
  
        success: function (addd) {
           
        },
      });
});

// --------message

$("#msg-g").click(function(){
    var url = "/empire/business/bsnmsg.php";
   
    $.ajax({
        url: url,
  
        type: "post",
        data: {
            getmsg : 'a'
        },
  
        success: function (addd) {
            addd = JSON.parse(addd);
            $(".msg-here").html("");
            for(let i =0 ; i <addd.length ; i++){
                data = addd[i];
               
                $(".msg-here").append(`
                                            <div class="col-md-3">
                                            <div class="card p-3 mb-2">
                                                <div class="d-flex justify-content-between">
                                                    <div class="d-flex flex-row align-items-center">
                                                    
                                                        <div class="ms-2 c-details">
                                                            <h6 class="mb-0">${data.name}</h6> <span>${data.time}</span>
                                                        </div>
                                                    </div>
                                                    <div class="badge"> <span><i class="fas fa-minus-square"></i></span> </div>
                                                </div>
                                                <div class="mt-5">
                                                    <h3 class="heading">${data.msg}</h3>
                                                    <div class="mt-3"> <span class="text1">${data.number} </div>

                                                </div>
                                            </div>
                                            </div>
                                        `);
            }
           
        },
      });
  });



});

