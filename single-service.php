<?php 
      session_start();  
?>

<!doctype html> 
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <!--====== USEFULL META ======-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Transportation & Agency Template is a simple Smooth transportation and Agency Based Template" />
    <meta name="keywords" content="Portfolio, Agency, Onepage, Html, Business, Blog, Parallax" />

    <!--====== TITLE TAG ======-->
    <title>Carries HTML5 Business Template</title>

    <!--====== FAVICON ICON =======-->
    <link rel="shortcut icon" type="image/ico" href="img/favicon.png" />

    <!--====== STYLESHEETS ======-->
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/stellarnav.min.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">

    <!--====== MAIN STYLESHEETS ======-->
    <link href="style.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">

    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    <!--[if lt IE 9]>
        <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

<style>
<style>:root{ --main-color: #f368e0; }

.feature-products{
    background-color:#F3F3F3;
    font-family:Roboto;
    position:relative;
}

.feature-products::before{
    position:absolute;
    left: 50%;
    top:0;
    height:65px;
    content: "";
    display: block;
    width:3px;
    background-color: #000;
    z-index:9999;
}

.product-content .title{
    margin-top:40px;
    text-align:center;
    font-family:Roboto;
    font-size:12px;
    text-transform:uppercase;
}


.feature-title{
    font-weight:600;
    color:#000;
}

.feature-title h2{
    margin-top:120px;
    margin-bottom:50px;
    color: #000;
    font-family: Roboto;
    font-size: 38px;
    letter-spacing: 1px;
    text-transform: uppercase;
    font-weight: 700;
}

.feature-title a {
    padding: 0 20px;
    font-size:16px;
    color:#bbb;
}

.feature-active{
    color:#000 !important;
    font-weight:700;
}

.price, .rating{
    display:inline-block;
    margin:0 auto;
    width:100%;
    text-align:center;
    margin-bottom:40px;
}


.product-grid{
    border:1px solid transparent;
    font-family: 'Roboto', sans-serif;
    padding:10px 10px;
    transition: all 0.5s;
    margin-bottom:80px;
    margin-top:40px;
}

.product-grid .product-image{
    position: relative;
    overflow: hidden;
  
    
}
.product-grid .product-image a.image{ display: block; }
.product-grid .product-image img{
    width: 100%;
    height: auto;
  border-radius: 5px;
   
}
.product-grid .add-to-cart{
    color: #fff;
    background: #222;
    font-size: 34px;
    font-weight: 500;
    text-align: center;
    padding: 0 5px;
    display: block;
    position: absolute;
    bottom: -50px;
    right: 0;
    transition: all ease-in-out 0.35s;
    width:20%;
    opacity: 0;

}
.product-grid:hover .add-to-cart{ opacity:1; }
.product-grid .add-to-cart:after{
    content: "\f101";
    color: #fff;
    font-family: 'Font Awesome 5 Free';
    font-weight: 900;
    display: inline-block;
    opacity: 0;
    transition: all 0.5s;
    
}
.product-grid .add-to-cart:hover:after{
    padding-left: 10px;
    opacity: 1;
}
.product-grid .product-content{ position: relative; }
.product-grid .product-stock{
    color: #999;
    font-size: 16px;
    font-weight: 600;
    line-height: 35px;
    border-bottom: 1px solid #c1c1c1;
    display: block;
    margin: 0 0 15px;
}
.product-grid .icon{
    padding: 0;
    margin: 0;
    list-style: none;
    opacity: 0;
    position: absolute;
    top: -15px;
    right: 0;
    transition: all ease-in-out 0.35s;
}
.product-grid:hover .icon{
    opacity: 1;
    top: 8px;
}
.product-grid .icon li{ display: inline-block; }
.product-grid .icon li a{
    color: #222;
    font-size: 16px;
    margin: 0 4px;
}
.product-grid .icon li a:hover{ color: var(--main-color); }
.product-grid .title{
     font-family:Roboto;
    font-size:15px;
    text-transform:uppercase;
    font-weight:700;
    line-height:2px;
}
.product-grid .title a{
    color: #222;
    transition: all 0.5s ease-out 0s;
}
.product-grid .title a:hover{ color: var(--main-color); }
.product-grid .category{
    font-size: 18px;
    margin: 0 0 3px;
    display: block;
}
.product-grid .category a{
    color: #222;
    transition: all 0.3s ease 0s;
}
.product-grid .category a:hover{ color: var(--main-color); }
.product-grid .price{
    font-family:Roboto;
    font-size:14px;
    text-transform:uppercase;
    font-weight:700;
    line-height:0px;
    display: inline-block;
    color:#000;
}
.product-grid .rating{
    padding: 0;
    margin: 0;
    list-style: none;
    float: right;
}
.product-grid .rating li{
    color: #FFB14B;
    font-size: 13px;
    display: inline-block;
}


.action-buttons{
    display:inline-block;
    margin-top:50px;
    width:100%;
    display:flex;
    align-items:center;
    justify-content:center;
}

.action-buttons .btn-outline{
    padding: 6px 20px;
    border-radius:5px;
    border: 2px solid #ccc;
    margin: 0 4px;
}


.action-buttons .btn-outline-icon{
    padding: 6px 10px;
    border-radius:5px;
    border: 2px solid #ccc;
    margin: 0 4px;
}

.action-buttons a{
    color: #000;
    font-family:Roboto;
    font-size: 12px;
    text-transform: uppercase;
    font-weight: 700;
    letter-spacing:1px;
    cursor:pointer;
  transition: .4s;
}

.action-buttons a:hover{
    color: #fff !important;
    background:#000;
   
}

.product-grid .rating li.disable{ color: #c1c1c1; }
@media only screen and (max-width:990px){
    .product-grid{ margin-bottom: 30px; }
}

</style>
        
</head> 

<body class="single-page">

    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <!--- PRELOADER -->
    <div class="preeloader">
        <div class="preloader-spinner"></div>
    </div>

    <!--SCROLL TO TOP-->
    <a href="#home" class="scrolltotop"><i class="fa fa-long-arrow-up"></i></a>

    <!--START TOP AREA-->
    <header class="top-area single-page" id="home">
        <div class="top-area-bg" data-stellar-background-ratio="0.6"></div>
        <div class="header-top-area">
            <!--MAINMENU AREA-->
            <?php include('menu.php'); ?>
            <!--END MAINMENU AREA END-->
        </div>
        <div class="welcome-area">
            <div class="container">
                <div class="row flex-v-center">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="welcome-text text-center">
                            <h2>Welcome <?php echo ($_SESSION['username']); ?></h2>
                            <ul class="page-location">  
                                <li><a href="index.php">Home</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--END TOP AREA-->

    <section class ="feature-products">
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center feature-title">
            <h2>FEATURED PRODUCTS</h2>
        </div>
        <?php include('db/fetch-products.php'); ?>
        
    </div>
</div>           
</section>



    <!--====== SCRIPTS JS ======-->
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/vendor/bootstrap.min.js"></script>

    <!--====== PLUGINS JS ======-->
    <script src="js/vendor/jquery.easing.1.3.js"></script>
    <script src="js/vendor/jquery-migrate-1.2.1.min.js"></script>
    <script src="js/vendor/jquery.appear.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/stellar.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/stellarnav.min.js"></script>
    <script src="js/contact-form.js"></script>
    <script src="js/jquery.sticky.js"></script>

    <!--===== ACTIVE JS=====-->
    <script src="js/main.js"></script>
</body>

</html>
