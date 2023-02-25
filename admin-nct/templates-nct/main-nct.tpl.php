<!DOCTYPE html>

<html lang="en">
<head>
  %HEAD%
</head>
<body>
 %SITE_HEADER%
 %BODY%  
 %FOOTER%


 <script src="{SITE_JS}js/jquery-1.11.1.js"></script>
 <script type="text/javascript" src="{SITE_JS}js/image_crop/cropper.js"></script>
 <script type="text/javascript" src="{SITE_JS}js/image_crop/tooltip.min.js"></script>
 <script type="text/javascript" src="{SITE_JS}js/image_crop/main.js"></script>

    <!-- Javascript Files
    ================================================== -->
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
      function hideURLbar(){ window.scrollTo(0,1); } </script>
      <!--js-->
      <!--Icons-->
      <script src="{SITE_ADM_JS}lumino.glyphs.js"></script>

    <!--[if lt IE 9]>
    <script src="{SITE_ADM_JS}html5shiv.js"></script>
    <script src="{SITE_ADM_JS}respond.min.js"></script>
    <![endif]-->
    <!-- <script src="{SITE_ADM_JS}jquery-1.11.1.min.js"></script> -->
    <script src="{SITE_ADM_JS}bootstrap.min.js"></script>
    <script src="{SITE_ADM_JS}chart.min.js"></script>
    <script src="{SITE_ADM_JS}chart-data.js"></script>
    <script src="{SITE_ADM_JS}easypiechart.js"></script>
    <script src="{SITE_ADM_JS}easypiechart-data.js"></script>
    <script src="{SITE_ADM_JS}bootstrap-datepicker.js"></script>
    <script src="{SITE_ADM_JS}bootstrap-table.js"></script>
    <script src="{SITE_ADM_JS}login.js"></script>

    <script>
      $('#calendar').datepicker({
      });

      !function ($) {
        $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
          $(this).find('em:first').toggleClass("glyphicon-minus");      
        }); 
        $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
      }(window.jQuery);

      $(window).on('resize', function () {
        if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
      })
      $(window).on('resize', function () {
        if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
      })
  </script>


  <!-- FOR THE CHANGE PRODUCT STATUS FUNCTION -->
  <script type="text/javascript">
    function changeFunction(value) {
      var pid = value;
      $.ajax({
        type: "GET",
        url: "{SITE_ADM_MOD}manageproduct-nct/index.php",
        data: "pid=" + pid,
        success: function(data) {
          if (data == 'msg1') {
            toastrAlert('success','Product Deactivated Successfully')
          }
          else if (data == 'msg2') {
            toastrAlert('success','Product Activated Successfully')
          }
        }
      });
    }


    <!-- FOR THE CHANGE USER STATUS FUNCTION -->
    function changeUserStatus(value){
      if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp = new XMLHttpRequest();
    } 
    else {
          // code for IE6, IE5
          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            if (this.response == 'msg1') {
              toastrAlert('success','User Deactivated Successfully')
            }
            else if (this.response == 'msg2') {
              toastrAlert('success','User Activated Successfully')
            }
          }
        };
        var uid = value;
        var queryString = "?uid=" + uid;
        xmlhttp.open("GET","{SITE_ADM_MOD}manageuser-nct/index.php" + queryString,true);
        xmlhttp.send();
      }


      <!-- FOR THE CHANGE SLIDER STATUS FUNCTION -->
      function changeSliderStatus(value){
        if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp = new XMLHttpRequest();
    } 
    else {
          // code for IE6, IE5
          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            if (this.response == 'msg1') {
              toastrAlert('success','Image Deactivated Successfully')
            }
            else if (this.response == 'msg2') {
              toastrAlert('success','Image Activated Successfully')
            }
          }
        };
        var sid = value;
        var queryString = "?sid=" + sid;
        xmlhttp.open("GET","{SITE_ADM_MOD}manageslider-nct/index.php" + queryString,true);
        xmlhttp.send();
      }

      <!-- FOR THE CHANGE CATEGORY STATUS FUNCTION -->
      function changeCategoryStatus(value){
        if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp = new XMLHttpRequest();
    } else {
          // code for IE6, IE5
          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            if (this.response == 'msg1') {
              toastrAlert('success','Category Deactivated Successfully')
            }
            else if (this.response == 'msg2') {
              toastrAlert('success','Category Activated Successfully')
            }
          }
        };
        var catid = value;
        var queryString = "?catid=" + catid;
        xmlhttp.open("GET","{SITE_ADM_MOD}managecategory-nct/index.php" + queryString,true);
        xmlhttp.send();      
      }

      <!-- FOR THE CHANGE SUBCATEGORY STATUS FUNCTION -->
      function changeSubcategoryStatus(value){
        if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp = new XMLHttpRequest();
    } else {
          // code for IE6, IE5
          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            if (this.response == 'msg1') {
              toastrAlert('success','Subcategory Deactivated Successfully')
            }
            else if (this.response == 'msg2') {
              toastrAlert('success','Subcategory Activated Successfully')
            }
          }
        };
        var subcatid = value;
        var queryString = "?subcatid=" + subcatid;
        xmlhttp.open("GET","{SITE_ADM_MOD}managesubcategory-nct/index.php" + queryString,true);
        xmlhttp.send();            
      }

      <!-- FOR THE CHANGE BRAND STATUS FUNCTION -->
      function changeBrandStatus(value){
        if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp = new XMLHttpRequest();
    } else {
          // code for IE6, IE5
          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            if (this.response == 'msg1') {
              toastrAlert('success','Brand Deactivated Successfully')
            }
            else if (this.response == 'msg2') {
              toastrAlert('success','Brand Activated Successfully')
            }
          }
        };
        var brandid = value;
        var queryString = "?brandid=" + brandid;
        xmlhttp.open("GET","{SITE_ADM_MOD}managebrand-nct/index.php" + queryString,true);
        xmlhttp.send();           
      }

      <!-- FOR THE CHANGE SLIDER STATUS FUNCTION -->
      function changePageStatus(value){
        if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp = new XMLHttpRequest();
    } 
    else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
          }
          xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              if (this.response == 'msg1') {
                toastrAlert('success','Page Deactivated Successfully')
              }
              else if (this.response == 'msg2') {
                toastrAlert('success','Page Activated Successfully')
              }
            }
          };
          var pid = value;
          var queryString = "?pid=" + pid;
          xmlhttp.open("GET","{SITE_ADM_MOD}managestaticpages-nct/index.php" + queryString,true);
          xmlhttp.send();
        }


        function myFunction(value){
          var id = value;
          window.location.href = "{SITE_ADM_MOD}sellerproduct-nct/index.php?pid=" + id; 
        }

        function updateSellerProduct(value){
          var id = value;
          window.location.href = "{SITE_ADM_MOD}updatesellerproduct-nct/index.php?pid=" + id; 
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

      <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.min.js"></script>
      <script>
       jQuery.validator.addMethod('selectcheck', function (value) {
        return (value != '0');
      }, "This field is required.");

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
            },
            category:{
              selectcheck:true
            },
            subcategory:{
              selectcheck:true
            },
            brand:{
              selectcheck:true
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
    %MESSAGE_TYPE%
  </body>
  </html>

