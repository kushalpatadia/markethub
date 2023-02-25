<style>
     ul.slides{
     list-style-type: none;
    }
</style>
    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <title>Single Product</title>

    <!-- Mobile Specific Metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/icon" href="{SITE_IMG}favicon.ico"/>

    <!-- CSS
    ================================================== --> 
    <!--Custom Theme files -->
    <link rel="stylesheet" href="{SITE_CSS}style2.css" type="text/css" media="screen" />
    <link href="{SITE_CSS}bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="{SITE_CSS}style.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="{SITE_CSS}flexslider1.css" type="text/css" media="screen" />
    <!--//Custom Theme files -->
    <!--web-fonts-->
    <link href='//fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Pompiere' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Fascinate' rel='stylesheet' type='text/css'>
    <!--web-fonts-->
    <!--animation-effect-->
    <link href="{SITE_CSS}animate.min.css" rel="stylesheet"> 
    <script src="js/wow.min.js"></script>
        <script>
         new WOW().init();
        </script>
    <!--//animation-effect-->


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<body>
	<!--header-->
	<!--//header-->

	<!--breadcrumbs-->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="{SITE_URL}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Single page</li>
			</ol>
		</div>
	</div>
	<!--//breadcrumbs-->

	<!--single-page-->
	<div class="single">
		<div class="container">
			%SHOW%
			<!--related-products-->
			<div class="related-products">
				<div class="title-info wow fadeInUp animated" data-wow-delay=".5s">
					<h3 class="title">Related<span> Products</span></h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit curabitur </p>
				</div>
				<div class="related-products-info">
					%RELATED PRODUCTS%
					<div class="clearfix"></div>
				</div>
			</div>
			<!--//related-products-->
		</div>
	</div>
	<!--//single-page-->
	<!--footer-->

	<!--//footer-->			

</body>