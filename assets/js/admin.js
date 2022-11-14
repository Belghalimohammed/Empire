$(window).on("load",function(){
  $(".loader").fadeOut("slow");
});
$(document).ready(function(){
    let i = 0;

    function bars(){
        $(".sidebar").toggleClass("active");
        $(".logo-name").toggle();
        $(".link-name").toggle();
        $(".profile-details").toggle();
      
        
      let sidewidth = $(".sidebar").width() == 212 ? "40" : "212";
      $(".sidebar").width(sidewidth);

      if(i % 2 == 0){
        $("#log-out").css({"left":"70%"});
        $("#btn").css({'left': "50%"});
      } else {
        $("#btn").css({'left': "90%"});
        $("#log-out").css({"left":"90%"});
      }
        
        
      
    i++;
    }

    bars();

                  $("#btn").click(function(){
                    bars();
                      });
        
        function hideall() {
          $(".commandcont").hide();
          $(".bilancont").hide();
          $(".gestcont").hide();
          $(".addcont").hide();
          $(".editcont").hide();
          $(".msgcont").hide();
        }

        hideall();

        $("#gestion").click(function(){
          hideall();
          $(".gestcont").show();
        });
        
        $("#command").click(function(){
          hideall();
          $(".commandcont").show();
       });

       $("#bilan").click(function(){
        hideall();
         $(".bilancont").show();
      });

      $("#add-g").click(function(){
        hideall();
          $(".addcont").show();
      });

      $("#edit-g").click(function(){
        hideall();
          $(".editcont").show();
      });

      $("#msg-g").click(function(){
        hideall();
          $(".msgcont").show();
      });

        $('.js-example-basic-multiple').select2({
          placeholder: "Select Categories",
          allowClear: true
        });
        $('.js-example-basic-multiple-1').select2({
          placeholder: "Select Colors",
          allowClear: true
        });
        $('.js-example-basic-multiple-2').select2({
          placeholder: "Select Sizes",
          allowClear: true
        });
      
      
       
       

});
