<!DOCTYPE html>

<html lang="en">
  <head>
    %HEAD%
  </head>
    <body>
        %SITE_HEADER%
        %BODY%  
        %FOOTER%
            




    <!-- Javascript Files
    ================================================== -->
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!--js-->
    <script src="{SITE_JS}js/jquery-1.11.1.min.js"></script>
    <script src="{SITE_JS}js/modernizr.custom.js"></script>
    <script src="{SITE_JS}js/imagezoom.js"></script>
    <!--//js-->
    <!--cart-->
    <script src="{SITE_JS}js/simpleCart.min.js"></script>
    <!--cart-->
    <!--start-smooth-scrolling-->
    <script type="text/javascript" src="{SITE_JS}js/move-top.js"></script>
    <script type="text/javascript" src="{SITE_JS}js/easing.js"></script> 
    <script type="text/javascript" src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
    <script type="text/javascript" src="{SITE_JS}js/overhang.min.js"></script>
    <script type="text/javascript" src="{SITE_JS}js/prism.js"></script>
    <script type="text/javascript" src="{SITE_JS}js/index.js"></script>

    <script type="text/javascript">
        jQuery(document).ready(function($) {
          $(".scroll").click(function(event){   
            event.preventDefault();
            $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
          });
        });
    </script>
    <!--//end-smooth-scrolling-->    


    <!--search jQuery-->
    <script src="{SITE_JS}js/main.js"></script>
    <!--//search jQuery-->
    <!--smooth-scrolling-of-move-up-->
    <script type="text/javascript">
      $(document).ready(function() {
      
        var defaults = {
          containerID: 'toTop', // fading element id
          containerHoverID: 'toTopHover', // fading element hover id
          scrollSpeed: 1200,
          easingType: 'linear' 
        };
        
        $().UItoTop({ easingType: 'easeOutQuart' });
        
      });
    </script>
    <!--//smooth-scrolling-of-move-up-->
    <script type="text/javascript" src="{SITE_JS}js/jquery.countdown.min.js"></script>
              <script type="text/javascript">
                $('#example').countdown({
                  date: '12/24/2020 00:00:00',
                  offset: -8,
                  day: 'Day',
                  days: 'Days'
                }, function () {
                  alert('Done!');
                });
    </script>
    <script defer src="{SITE_JS}js/jquery.flexslider.js"></script>
          <script type="text/javascript">
            $(window).load(function(){
              $('.flexslider').flexslider({
              animation: "pagination",
              start: function(slider){
                $('body').removeClass('loading');
              }
              });
            });
    </script>

    <!-- register form validation -->
      <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.1.3.min.js"></script>     
      <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.min.js"></script>
    
    <script>
      jQuery.validator.addMethod("lettersonly", function(value, element) {
            return this.optional(element) || /^[a-z]+$/i.test(value);
          }, "Letters only please");
        $(function() {

          $("#form").validate({
              errorClass: "my-error-class",
              validClass: "my-valid-class",
            rules: {
              name:{
                  required:true,  
                  lettersonly:true
              },
              email: {
                required:true,
                email:true,
                minlength:7
              },
              password: {
                  required:true,
                  minlength:5
              },
              password2: {
                  required:true,
                  minlength:5,
                  equalTo:"#password"
              },
              phone_no: {
                  required:true,
                  minlength:10,
                  maxlength:10,
                  number: true  
              },
              price: {
                  required:true,
                  number:true
              }
            },
            messages:{
              name:{
                required:'Please Enter Name',
                lettersonly:'Only Characters are allowed'
              },
              email: {
                required: 'Please Enter an Email address',
                email:'Please Enter an Valid Email address'
              },
              phone_no: {
                required: 'Please Enter Mobile Number',
                maxlength: 'Must use Mobile Number Only',
                minlength: 'Must use Mobile Number Only' 
              },
              price:{
                number: 'Please Enter Price Properly'
              }
            }
           });
       });

    </script>

    <!-- register form validation end -->

    <!--Bootstrap core JavaScript
      ================================================== -->
      <!--Placed at the end of the document so the pages load faster -->
      <script src="{SITE_JS}js/bootstrap.js"></script>
      <script src="{SITE_JS}wow.min.js"></script>
      <script>
        new WOW().init();
      </script>

<!-- Brand HIDE Scripts -->
<script type="text/javascript">
  $(document).ready(function() {
        $('#mobiles').hide();
        $('#laptops').hide();
        $('#paynow1').hide();
        $('#paynow2').hide();
        $("#addmore").click(function(){
          
        });    

        var navListItems = $('div.setup-panel div a'),
                allWells = $('.setup-content'),
                allNextBtn = $('.nextBtn'),
              allPrevBtn = $('.prevBtn');

        allWells.hide();

        navListItems.click(function (e) {
            e.preventDefault();
            var $target = $($(this).attr('href')),
                    $item = $(this);

            if (!$item.hasClass('disabled')) {
                navListItems.removeClass('btn-primary').addClass('btn-default');
                $item.addClass('btn-primary');
                allWells.hide();
                $target.show();
                $target.find('input:eq(0)').focus();
            }
        });
        
        allPrevBtn.click(function(){
            var curStep = $(this).closest(".setup-content"),
                curStepBtn = curStep.attr("id"),
                prevStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().prev().children("a");

                prevStepWizard.removeAttr('disabled').trigger('click');
        });

        allNextBtn.click(function(){
            var curStep = $(this).closest(".setup-content"),
                curStepBtn = curStep.attr("id"),
                nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                curInputs = curStep.find("input[type='text'],input[type='url'],input[type='file'],input[type='select'],input[type='number']"),
                isValid = true;

            $(".form-group").removeClass("has-error");
            for(var i=0; i<curInputs.length; i++){
                if (!curInputs[i].validity.valid){
                    isValid = false;
                    $(curInputs[i]).closest(".form-group").addClass("has-error");
                }
            }
            if (isValid)
                nextStepWizard.removeAttr('disabled').trigger('click');
        });

        $('div.setup-panel div a.btn-primary').trigger('click');

        
        var defaults = {
          containerID: 'toTop', // fading element id
          containerHoverID: 'toTopHover', // fading element hover id
          scrollSpeed: 1200,
          easingType: 'linear' 
        };
        
        $().UItoTop({ easingType: 'easeOutQuart' });
  });
</script>
      <script type="text/javascript">

    
</script>
      <!-- end Brand Hide Scripts -->

      <!-- ajax start -->
       <!-- ajax start -->
      <script language = "javascript" type = "text/javascript">
            //Browser Support Code
            function ajaxFunction(){
               if (window.XMLHttpRequest) {

              // code for IE7+, Firefox, Chrome, Opera, Safari
              xmlhttp = new XMLHttpRequest();
              } else {
                  // code for IE6, IE5
                  xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
              }
              xmlhttp.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {
                      document.getElementById("ajax").innerHTML = this.responseText;
                         //alert("response");
                  }
              };
              var minprice = document.getElementById('minprice').value;
              var maxprice = document.getElementById('maxprice').value;
              var category = document.getElementById('category').value;
              var subcategory = document.getElementById('mySelect').value;   
              var sorting = $('input[name=sorting]:checked').val();
              //var checkbox = $('input[name=mobile]:checked').val();
              //alert(minprice + maxprice + category + subcategory +'sorting:' +sorting);
              var queryString = "?minprice=" + minprice ;
                   
              queryString +=  "&maxprice=" + maxprice + "&category=" + category + "&subcategory=" + subcategory
              + "&sorting=" + sorting;
              xmlhttp.open("GET","../../modules-nct/products-nct/ajax-products-nct.php" + queryString,true);
              xmlhttp.send();
             }
      </script>
      <!-- ajax end -->

      <!-- filter in product -->
      <script type="text/javascript">
        var fixmeTop = $('#right').offset().top;       // get initial position of the element
        var uptoBottom = $('.footer').offset().top;
        var hhh = $( window ).height();
      $(window).scroll(function() {                  // assign scroll event listener

          var currentScroll = $(window).scrollTop(); // get current position
          if ($(window).width() > 960) {
            if (currentScroll >= fixmeTop) {           // apply position: fixed if you
              $('#right').css({                      // scroll to that element or below it
                  position: 'fixed',
                  top: '0',
                  left: '0',
                  height: '100'
              });
            } else {                                   // apply position: static
                $('#right').css({                      // if you scroll above it
                    position: 'static'
                });
            }
            var currentScroll = $(window).scrollTop() + $(window).height();
            if (currentScroll >= uptoBottom) {           // apply position: fixed if you
                $('#right').css({                      // scroll to that element or below it
                    position: 'static'
                });
            }
          }
      });
      </script>
      <!-- filter in product -->

   <!-- FOR THE ADDING CART AND WISHLIST FUNCTIONS -->
        <script type="text/javascript">
          function addingcart(argument) {
            var id = argument;
            $.ajax({
              type: "GET",
              url: "{SITE_MOD}addcart-nct",
              data: "id=" + id,
              success: function(data) {
                var result = $.trim(data);
                if (result === 'msg1') {
                  toastrAlert('warning','Already added to cart') 
                }
                else if (result === 'msg2') {
                  toastrAlert('info','product is not available')
                }
                else if (result === 'msg3') {
                  toastrAlert('success','Product Added To Cart')
                }
                else if (result === 'msg4') {
                  toastrAlert('error','For Add to Cart You Must Require Login')
                }
                $('#cart_price').load(document.URL +  ' #cart_price');
              }
            });
          }
          function addingwish(argument) {
            var id = argument;
            $.ajax({
              type: "GET",
              url: "{SITE_MOD}addwishlist-nct",
              data: "id=" + id,
              success: function(data) {
              	var result = $.trim(data);
                if (result === 'msg1') {
                  toastrAlert('warning','Already added to Wishlist')
                }
                else if (result === 'msg2') {
                  toastrAlert('success','Product Added To Wishlist')
                }
                else if (result === 'msg3') {
                  toastrAlert('error','For Add to Wishlist You Must Require Login')
                }
              }
            });
          }
        </script>

        <script type="text/javascript" src="{SITE_JS}js/toastr.min.js"></script>
        <link href="{SITE_CSS}toastr.min.css" rel="stylesheet">
        <script type="text/javascript">
             function toastrAlert(type,message,title){
              toastr.options = {
                "closeButton": true,
                "debug": false,
                "positionClass": "toast-top-full-width",
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut",
                // "preventDuplicates": true,
              }
              toastr[type](message, title, {timeOut: 5000})
             }
        </script>
        %MESSAGE_TYPE%
      </body>
      </html>

