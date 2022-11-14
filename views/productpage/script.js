$(document).ready(function() {

  
  $("#buynow").click(function(){

    if($(".active").length === 3 && $("#quantity").val()!==''){
      var url = "/empire/business/bsncart.php";
      
      $.ajax({
          url: url,
  
          type: "post",
          data: {
              pid: $("#pid").val(),
              sid: $("#size.active").attr("value"),
              addtocart: '',
              qu: $("#quantity").val(),
              coid:$("#color.active").attr("value"),
              pic : $("#defimg").attr("src")
          },
  
          success: function (addd) {
             addd = JSON.parse(addd);
              cartadd(addd);
          },
      });  
      } 

     function cartadd(z){
      var url = "/empire/business/bsncheck.php";
      let  x = +$("#price").text() * +$("#quantity").val();
        let cartid = z;
     
                $.ajax({
                    url: url,
    
                    type: "post",
                    data: { 
                      addcheck : x,
                      cartid : cartid
                    },
    
                    success: function (addd) {
                      addd = JSON.parse(addd);
                     
                      document.location.href = `/empire/views/checkout/index.php?id=${addd}`;
                     
                      
                    },
                  });
    
     }
    
  });

$("[id='color']").click(function(){
 
  if($(this).hasClass('active')){
    $("[id='color']").css('border',"2px solid white");
    $("[id='color']").removeClass('active');
    $(this).css('border',"2px solid white");
    $(this).removeClass('active');
   } else {
    $("[id='color']").css('border',"2px solid white");
    $("[id='color']").removeClass('active');
     $(this).addClass('active');
     $(this).css('border',"2px solid black");
   }

});
$("[id='size']").click(function(){
  
 if($(this).hasClass('active')){
   $("[id='size']").css('border',"2px solid white");
 $("[id='size']").removeClass('active');
  $(this).css('border',"2px solid white");
  $(this).removeClass('active');
 } else {
  $("[id='size']").css('border',"2px solid white");
  $("[id='size']").removeClass('active');
   $(this).addClass('active');
   $(this).css('border',"4px solid black");
 }
  
 
 //$("[id='size']").css('border',"2px solid white");
 //$("[id='size']").removeClass('active');
 

});

$(".carousel-item:first-of-type").addClass('active');

});
