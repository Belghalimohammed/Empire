
var check = false;
$(document).ready(function(){




  
  
  
  
 let x = 0;
  
  $(".btn").click(function(){
    check = true;
    $(".remove").click();
  });


  function showcart(){
    var url = "/empire/business/bsncart.php";
    
    $.ajax({
        url: url,
  
        type: "post",
        data: {
            showcart: $("#uid").val()
        },
  
        success: function (addd) {
            var addd = JSON.parse(addd);
            for(let i =0 ; i < addd.length ; i++){
              let data = addd[i];
           
            $("#cart").append(`
                                      <input type="number" id="cid${i}" class="cid" value="${data.cartid}" hidden>
                                        <article class="product">
                                    <header>
                                      <a class="remove">
                                        <img src="${data.pic}" alt="">

                                        <h3 class="rmpr" value="${data.cartid}">Remove product</h3>
                                      </a>
                                    </header>

                                    <div class="content">

                                      <h1>${data.name}</h1>

                                          ${data.description}

                                        

                                      <div title="You have selected this product to be shipped in the color ${data.color}." style="top: 0;background-color:${data.color};" class="color"></div>
                                      <div style="top: 43px" class="type small">${data.size}</div>
                                    </div>

                                    <footer class="content">
                                    <span class="qt-minus">-</span>
                                    <span class="qt">${data.quantity}</span>
                                    <span class="qt-plus">+</span>
                                          <input type="number" class="pu" value="${data.prices}" hidden>

                                      <h2 class="full-price" value="${data.prices }">
                                        ${data.quantity * data.prices } MAD
                                      </h2>

                                      
                                    </footer>
                                  </article>

            `);

             x = x + data.quantity * data.prices;
          }
          $("#subtotal").html(x);
          $(".qt-minus").click(function(){
    
            child = $(this).parent().children(".qt");

            let a = $(this).parent().children(".full-price");
            x = x - +a.attr("value");
            

            if(child.html()>1){
              child.html(`${child.html()-1}`);
            }
           
            changeVal(this);
             });


          $(".qt-plus").click(function(){
            child = $(this).parent().children(".qt"); 

            let a = $(this).parent().children(".full-price");
            x = x + +a.attr("value");
            

            child.html(`${+child.html()+1}`);
            changeVal(this);

          });


          $(".remove").click(function(){
            var el = $(this);
            el.parent().parent().addClass("removed");
            window.setTimeout(
              function(){
                el.parent().parent().slideUp('fast', function() { 
                  el.parent().parent().remove(); 
                  if($(".product").length == 0) {
                    if(check) {
                      $("#cart").html("<h1>The shop does not function, yet!</h1><p>If you liked my shopping cart, please take a second and heart this Pen on <a href='https://codepen.io/ziga-miklic/pen/xhpob'>CodePen</a>. Thank you!</p>");
                    } else {
                      $("#cart").html("<h1>No products!</h1>");
                    }
                  }
                 // changeTotal(); 
                });
              }, 200);
          });

          $(".rmpr").click(function(){
            deletefromcart($(this).attr("value"));
          });


         
        },
      });
}

showcart();

function changeVal(a){
  child = $(a).parent().children(".full-price");
  
  pu = $(a).parent().children(".pu");
  qt = $(a).parent().children(".qt"); 
  child.html(`${ +pu.val() * +qt.html()} MAD`);
  //child.attr("value",+pu.val() * +qt.html());
  $("#subtotal").html(x);
}

function deletefromcart(id){
  var url = "/empire/business/bsncart.php";
    
    $.ajax({
        url: url,
  
        type: "post",
        data: { 
          deletecart : id
        },
  
        success: function (addd) {
           
         
        },
      });
}

$(".btna").click(function(){
  var url = "/empire/business/bsncheck.php";
 
  
  for(let i=0 ; i < +$(".cid").length ; i++){
    let cartid = +$(`#cid${i}`).val();
 
            $.ajax({
                url: url,

                type: "post",
                data: { 
                  addcheck : +$("#subtotal").html(),
                  cartid : cartid
                },

                success: function (addd) {
                  addd = JSON.parse(addd);
                 if(i===+$(".cid").length-1){
                  document.location.href = `/empire/views/checkout/index.php?id=${addd}`;
                 }
                  
                },
              });

  }
   
  
});


});