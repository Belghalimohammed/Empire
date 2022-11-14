$(document).ready(function(){

function getProduct(c){
    
    let getproduct = c;
    var url = "/empire/business/bsnproduct.php";
      
    $.ajax({
        url: url,
  
        type: "post",
        data: {
            getproduct : getproduct,
        },
  
        success: function (addd) {
            var addd = JSON.parse(addd);
            $(".here-pro").html("");
             for(let i = 0 ; i < addd.length ; i++){
                 let img = addd[i].image.split(',');
                 let sizes = addd[i].size.split(',');
                 let colors = addd[i].color.split(',');
                 
                 img = img[0];
                $(".here-pro").append(`
                <div class="col-lg-2 col-md-4 col-sm-6 card">
                <div class="imgBx">
                    <img src="${img}">
                </div>
        
                <div class="contentBx">
        
                    <h2>${addd[i].name}</h2>
        
                    
                    <div class="size s${i}">
                        <h3>Size :</h3>
                    </div>
        
                    <div class="size c${i}">
        
                        <h3>Color :</h3>
                        
                    </div>
                    <a href="/empire/views/productpage/index.php?id=${addd[i].pid}">Buy Now</a>
                   
                </div>
        
            </div>
                `);

                $.each(sizes,function(index,value){
                    $(`.s${i}`).append(`
                        <span>${value}</span>
                    `);
                });
                $.each(colors,function(index,value){
                    $(`.c${i}`).append(`
                        <span style="background:${value}"></span>
                    `);
                });
                
             }

        },
      });
  
     
}
/*

*/
getProduct('%');

$("#wrong").hide();
$("#signin").submit(function(e){
    e.preventDefault();
    var url = "/empire/business/bsnuser.php";
    
    $.ajax({
        url: url,
  
        type: "post",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
  
        success: function (addd) {
           
            addd = JSON.parse(addd);
            if(addd===0){
                $("#wrong").show();
            }
            if(addd===1){
                $("#wrong").hide();
                 window.location.reload();
                
            }
            if(addd===2){
                $("#wrong").hide();
               window.location.href = "/empire/admin.php";
            }
        },
      });
});
$("#addedtocart").hide();
$("#addcart").click(function(){
   if($(".active").length === 3 && $("#quantity").val()!==''){
                    var url = "/empire/business/bsncart.php";
                    
                    $.ajax({
                        url: url,
                
                        type: "post",
                        data: {
                            pid: $("#pid").val(),
                            sid: $("#size.active").attr("value"),
                            addtocart: $("#addtocart").val(),
                            qu: $("#quantity").val(),
                            coid:$("#color.active").attr("value"),
                            pic : $("#defimg").attr("src")
                        },
                
                        success: function (addd) {
                            console.log(addd);
                            $("#addedtocart").show();
                        },
                    });  
   } else {
       
   }
});

$(".close").click(function(){
    $("#addedtocart").hide();
});



$(".header__search").on("keyup", function () {
    $("#carouselExampleIndicators").hide();
    getProduct($(".header__search").val());
    if($(".header__search").val() === ''){
       $("#carouselExampleIndicators").show();
    }
  });


  $("#sendmsg").submit(function(e){
    e.preventDefault();
    var url = "/empire/business/bsnmsg.php";
    
    $.ajax({
        url: url,
  
        type: "post",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
  
        success: function (addd) {
           $(".right").html(` <br><div class=" text-center" style="">
           <span><h2>Message sent<h2></span></div><br>`);
        
        },
      });
  });
});