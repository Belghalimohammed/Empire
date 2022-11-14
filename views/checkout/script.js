$(document).ready(function(){


   

let oldpay =  $("#pay").html();
let newpay = `
<div class="row">

<input type="number" name="type" id="" value="0" hidden>
<input type="number" name="addcommand" id="" hidden>
            <input type="text" name="items" id="test" hidden>
                <div class="col-12">
                    <div class="d-flex flex-column px-md-5 px-4 mb-4"> <span>Full Name</span>
                        <div class="inputWithIcon"> <input name="fname" class="form-control" type="text" value=""> <span class=""> </span> </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="d-flex flex-column px-md-5 px-4 mb-4"> <span>Adresse</span>
                        <div class="inputWithIcon"> <input name="adresse" class="form-control" type="text" value=""> <span class=""> </span> </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex flex-column ps-md-5 px-md-0 px-4 mb-4"> <span>Code<span class="ps-1">Postal</span></span>
                        <div class="inputWithIcon"> <input name="code" type="text" class="form-control" value="">  </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex flex-column pe-md-5 px-md-0 px-4 mb-4"> <span>Pays</span>
                    <select class="js-example-basic-multiple-4 seletc-pays" id="add-size-product" name="pays" --test>
                                              
                                              
                    </select>  
                    </div>
                </div>
                <div class="col-12">
                    <div class="d-flex flex-column px-md-5 px-4 mb-4"> <span>Telephone</span>
                        <div class="inputWithIcon"> <input name="tel" class="form-control text-uppercase" type="number" value=""> </div>
                    </div>
                </div>
                <div class="col-12 px-md-5 px-4 mt-3">
                    <button type="submit" class="btn btn-primary w-100">Order Now</button>
                </div>
</div>
`;


$("#pay").html(newpay);
$("#cal").click(function(){
    $("#pay").html(newpay);
    s4();
    
});
$("#cc").click(function(){
    $("#pay").html(oldpay);
   s5()
});


function getpays(){
    var url = "/empire/business/bsnshipping.php";
    let showship = 'a';
    $.ajax({
        url: url,
  
        type: "post",
        data: {
            showship : showship,
        },
  
        success: function (addd) {
            var jsonc = JSON.parse(addd);
            $(".seletc-pays").html("<option hidden>select</option>");
            for(let i =0 ; i <jsonc.length ; i++){
                $(".seletc-pays").append(`<option for="${jsonc[i].price}" value="${jsonc[i].shipid}">${jsonc[i].country}</option>`);
            }

           // for(let j = 0 ; j < )
        },
      });
     
};

s4()

function s5()
{
    $('.js-example-basic-multiple-5').select2({
        placeholder: {
            id: '-1', // the value of the option
            text: 'Select an option'
          }
      });
      getpays();
      $(".seletc-pays").on("change",function(){
        $(".here-deli").html($(".seletc-pays option:selected").attr("for"));
        $(".here-total").html(`${ +$("#jt").html() + +$(".here-deli").html()}`);
      });
}
function s4()
{
    $('.js-example-basic-multiple-4').select2({
        placeholder: {
            id: '-1', // the value of the option
            text: 'Select an option'
          }
      });
      getpays();
      $(".seletc-pays").on("change",function(){
        $(".here-deli").html($(".seletc-pays option:selected").attr("for"));
        $(".here-total").html(`${ +$("#jt").html() + +$(".here-deli").html()}`);
      });
}

$("#pay").submit(function(e){
    e.preventDefault();
    var url = "/empire/business/bsncommand.php";
    let a = "";
    for(let i = 0 ; i < +$(".idcart").length ; i++){
        a = $(`.idcart${i}`).val() + "," + a  ;
       
    }
    $("#test").val(a);
     $.ajax({
        url: url,

        type: "post",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,

        success: function (addd) {
            $(".container").html("");

            $(".container").html("<div>Command successful  return <a href='/empire'>HOME</a></div>");
             
        },
      });
 



  });


});