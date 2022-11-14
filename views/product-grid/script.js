

$(document).ready(function(){

  function getcategories(){
    var url = "/empire/business/bsncategorie.php";
    let getcategories = 'a';
    $.ajax({
        url: url,
  
        type: "post",
        data: {
            getcategories : getcategories,
        },
  
        success: function (addd) {
            var jsonc = JSON.parse(addd);
            $(".herecats").html("");
            for(let i =0 ; i <jsonc.length ; i++){
              let data = jsonc[i];
                $(".herecats").append(`
                        <label class="check catcat">
                        <input type="checkbox" class="check__cat" value="${data.cid}">
                        <span class="check__checkbox">
                          <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20 6.5L9 17.5L4 12.5" stroke="#fff" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round" />
                          </svg>
                        </span>
                        <p class="check__text">${data.categorie}</p>
                      </label>
                `);
            }

            cattogo();
            
        },
      });

     
}
let ca='',co='',s='';
function cattogo(){
  $('.check__cat').change(function(){
    let a = 'and (categorie.cid = ';
   $(".check__cat:checked").each(function(index,value){
    a = a + $(value).attr("value");
    if(index===+$(".check__cat:checked").length-1){
      a = a + ')'
    } else {
     a = a + " or categorie.cid = ";
  
    }
    
   });
   if(+$(".check__cat:checked").length === 0 ){
     a ='';
   }
   ca=a;
   getProduct('%',co,ca,s);
    });
}


function sitogo(){
  $('.check__size').change(function(){
    let a = 'and (size.sid = ';
   $(".check__size:checked").each(function(index,value){
    a = a + $(value).attr("value");
    if(index===+$(".check__size:checked").length-1){
      a = a + ')'
    } else {
     a = a + " or size.sid = ";
  
    }
    
   });
   if(+$(".check__size:checked").length === 0 ){
    a ='';
      }
   s=a;
   getProduct('%',co,ca,s);
    });
}

  function getcolors(){
    var url = "/empire/business/bsncolor.php";
    let getcolors = 'a';
    $.ajax({
        url: url,
  
        type: "post",
        data: {
            getcolors : getcolors,
        },
        success: function (addd) {
            var jsonc = JSON.parse(addd);
            $(".herecols").html("");
            for(let i =0 ; i <jsonc.length ; i++){
              let data = jsonc[i];
                $(".herecols").append(`
                <div class="color" style="--hue: 0deg;background-color:${data.color};" value="${data.coid}"><i class="fa fa-check" aria-hidden="true"></i>
                </div>
                `);
            }

           todocolor();

        },
      });

     
}

function todocolor(){
  $('.color').click(function(){
    let a = $(this).children(".fa");
     if($(this).hasClass('colortrue')){
    $(this).removeClass('colortrue');
    a.css("opacity","0");

  } else {
    $(this).addClass('colortrue');
    a.css("opacity","1");
    if($(this).css("background-color")==="rgb(0, 0, 0)"){
      a.css("color","#fff");
    }
  }
  
  let z = 'and (color.coid = ';
    $(".colortrue").each(function(index,value){
      z = z + $(value).attr("value");
      if(index===+$(".colortrue").length-1){
        z = z + ')'
      } else {
       z = z + " or color.coid = ";
    
      }
    });

    if(+$(".colortrue").length === 0 ){
      z ='';
    }
    co=z;
    getProduct('%',co,ca,s);
  });
}

function getsizes(){
  var url = "/empire/business/bsnsize.php";
  let getsizesp = 'a';
  $.ajax({
      url: url,

      type: "post",
      data: {
          getsizesp : getsizesp,
      },
      success: function (addd) {
          var jsonc = JSON.parse(addd);
          $(".heresizes").html("");
          for(let i =0 ; i <jsonc.length ; i++){
            let data = jsonc[i];
              $(".heresizes").append(`
              <label class="check">
              <input type="checkbox" class="check__size" value="${data.sid}">
              <span class="check__checkbox">
                <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M20 6.5L9 17.5L4 12.5" stroke="#fff" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
              </span>
              <p class="check__text">${data.size}</p>
            </label>

              `);
          }

          sitogo();
      },
    });

   
}
getcategories();
getcolors();
getsizes();
function test(){
  $(".check__cat:checked").each(function(index,value){
  });
  $(".check__size:checked").each(function(index,value){
  });
}


function getProduct(c,co,ca,s){
    
  let getproduct = c;
  var url = "/empire/business/bsnproduct.php";
    
  $.ajax({
      url: url,

      type: "post",
      data: {
          getproductvia : getproduct,
          color : co,
          categorie : ca,
          size : s
      },

      success: function (addd) {
          var addd = JSON.parse(addd);
         
          $(".here-pro").html("");
           for(let i = 0 ; i < addd.length ; i++){
            
               let img = addd[i].image.split(',');
               let sizes = addd[i].size.split(',');
               let colors = addd[i].color.split(',');
               
               img = img[0];
               if(img===""){
                 $(".here-pro").html("<h1 class='text-center' >There is no Products in this filter</h1> ");
                 return 1;

               }
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


function displaycat(cat){
  let a = 
  getProduct('%','',cat,'');
}


let a;
$(".filters__btn").click(function(){
  a = $(".containerr").html();
  $(".containerr").html($(".sidebar").html());
  getcategories();
getcolors();
getsizes();
  $(".containerr").append(`<button class="btn btn-dark hidefil"> Continue </button>`)
 $(".sidebar").hide();
 
 $(".hidefil").click(function(){
  $(".containerr").html(a);
  getProduct('%',co,ca,s);
 
});
});

});