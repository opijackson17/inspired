<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<title>Prayer App </title>
<!-- Stylesheets -->
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/revolution-slider.css" rel="stylesheet">
<link href="css/jquery-ui.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<!--Favicon-->
<link rel="shortcut icon" href="images/background/inspire.ico" type="image/x-icon">
<link rel="icon" href="images/inspire.ico" type="image/x-icon">
<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link href="css/responsive.css" rel="stylesheet">
<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
<!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->

<script type="text/javascript" src="js/jQuery v3.3.1.js"></script>
<style type="text/css">
    .bevel.all {
    background: #efefef; /* default color */
    background:
        -moz-linear-gradient(45deg,  transparent 10px, #efefef 10px),
        -moz-linear-gradient(135deg, transparent 10px, #efefef 10px),
        -moz-linear-gradient(225deg, transparent 10px, #efefef 10px),
        -moz-linear-gradient(315deg, transparent 10px, #efefef 10px);
    background:
        -o-linear-gradient(45deg,  transparent 10px, #efefef 10px),
        -o-linear-gradient(135deg, transparent 10px, #efefef 10px),
        -o-linear-gradient(225deg, transparent 10px, #efefef 10px),
        -o-linear-gradient(315deg, transparent 10px, #efefef 10px);
    background:
        -webkit-linear-gradient(45deg,  transparent 10px, #efefef 10px),
        -webkit-linear-gradient(135deg, transparent 10px, #efefef 10px),
        -webkit-linear-gradient(225deg, transparent 10px, #efefef 10px),
        -webkit-linear-gradient(315deg, transparent 10px, #efefef 10px);
}
.bevel.tlbr {
    background: #efefef; /* default color */
    background:
        -moz-linear-gradient(45deg,  #efefef 10px, #efefef 10px),
        -moz-linear-gradient(135deg, transparent 10px, #efefef 10px),
        -moz-linear-gradient(225deg, #efefef 10px, #efefef 10px),
        -moz-linear-gradient(315deg, transparent 10px, #efefef 10px);
    background:
        -o-linear-gradient(45deg,  #efefef 10px, #efefef 10px),
        -o-linear-gradient(135deg, transparent 10px, #efefef 10px),
        -o-linear-gradient(225deg, #efefef 10px, #efefef 10px),
        -o-linear-gradient(315deg, transparent 10px, #efefef 10px);
    background:
        -webkit-linear-gradient(45deg,  #efefef 10px, #efefef 10px),
        -webkit-linear-gradient(135deg, transparent 10px, #efefef 10px),
        -webkit-linear-gradient(225deg, #efefef 10px, #efefef 10px),
        -webkit-linear-gradient(315deg, transparent 10px, #efefef 10px);
}
.bevel.trbl {
    background: #efefef; /* default color */
    background:
        -moz-linear-gradient(45deg,  #efefef 10px, #efefef 10px),
        -moz-linear-gradient(135deg, #efefef 10px, #efefef 10px),
        -moz-linear-gradient(225deg, transparent 30px, #efefef 10px),
        -moz-linear-gradient(315deg, #efefef 10px, #efefef 10px);
    background:
        -o-linear-gradient(45deg,  #efefef 10px, #efefef 10px),
        -o-linear-gradient(135deg, #efefef 10px, #efefef 10px),
        -o-linear-gradient(225deg, transparent 30px, #efefef 10px),
        -o-linear-gradient(315deg, #efefef 10px, #efefef 10px);
    background:
        -webkit-linear-gradient(45deg,  #efefef 10px, #efefef 10px),
        -webkit-linear-gradient(135deg, #efefef 10px, #efefef 10px),
        -webkit-linear-gradient(225deg, transparent 30px, #efefef 10px),
        -webkit-linear-gradient(315deg, #efefef 10px, #efefef 10px);
}
.bevel.tr {
    background: #efefef; /* default color */
    background:
        -moz-linear-gradient(45deg,  #efefef 10px, #efefef 10px),
        -moz-linear-gradient(135deg, #efefef 10px, #efefef 10px),
        -moz-linear-gradient(225deg, transparent 10px, #efefef 10px),
        -moz-linear-gradient(315deg, #efefef 10px, #efefef 10px);
    background:
        -o-linear-gradient(45deg,  #efefef 10px, #efefef 10px),
        -o-linear-gradient(135deg, #efefef 10px, #efefef 10px),
        -o-linear-gradient(225deg, transparent 10px, #efefef 10px),
        -o-linear-gradient(315deg, #efefef 10px, #efefef 10px);
    background:
        -webkit-linear-gradient(45deg,  #efefef 10px, #efefef 10px),
        -webkit-linear-gradient(135deg, #efefef 10px, #efefef 10px),
        -webkit-linear-gradient(225deg, transparent 10px, #efefef 10px),
        -webkit-linear-gradient(315deg, #efefef 10px, #efefef 10px);
}
.bevel.all, .bevel.trbl, .bevel.tlbr, .bevel.tr {
    background-position: bottom left, bottom right, top right, top left;
    -moz-background-size: 50% 50%;
    -webkit-background-size: 50% 50%;
    background-size: 50% 50%;
    background-repeat: no-repeat;
    margin-bottom: 15px;
    padding: 15px;
}
.holder{
    position: relative;
    width: 856px;
    /*margin: 30px;*/
}
.main{
    width: 825px;
    height: 200px;/* height */
    border: 2px solid grey;
    position: absolute;
    left: 0px;
    z-index: 1;
}
.corner{
    border-bottom: 2px solid grey;
    width: 75px;
    height: 62px;
    position: absolute;
    top: -25px;
    right: 0px;
    z-index: 3;
    background: #fff;
    /*border: 1px solid grey;*/

    -webkit-transform: rotate(45deg); /* safari, chrome */
    -moz-transform: rotate(45deg); /* firefox */
    -ms-transform: rotate(45deg); /* IE */
    -o-transform: rotate(45deg); /* opera */
}
#bs-example{
    margin:20px;
    border: 2px;
}
table.design{
    border-collapse: collapse;
    width: 100%;
}
th, td {
    text-align: left;
    padding: 8px;
}
tr:nth-child(even){
    background-color: #f2f2f2;
}
th {
    background-color: #4CAF50;
    color: white; 
}

</style>
<script type="text/javascript">

   $(document).ready(function(){
         var par = document.getElementById("reply-form");
        $(par).hide();

        $("#reply-btn").click(function(e){
          $(par).slideToggle("slow");
           e.preventDefault();
       });
    });


    function hid(){
			 var x = document.getElementById("partner");
			 var p = document.getElementById("info");
			//  var q = document.getElementById("txt");
    if (x.selectedIndex == 0 || x.selectedIndex == 1 || x.selectedIndex == 3 || x.selectedIndex == 4) {
        p.style.display = "none";
    } 
   else if(x.selectedIndex == 2){
		p.style.display = "block";
	}
  
		}
</script>

</head>

<body>

<div class="page-wrapper">
 	
    <!-- Preloader -->
    <div class="preloader"></div>
 	
    <!-- Main Header / Header Style Three-->
    <header class="main-header header-style-three">
        
        
    	<!--Header-Upper-->
        <div class="header-upper">
        	<div class="auto-container">
            	<div class="clearfix">
                	
                	<div class="logo-outer">
                    	<div class="logo"><a href="index.php"><img src="images/inspire.jpg" width= "100" height="50" alt="Shelter" title="Shelter"></a></div>
                    </div>
                    
                    <div class="header-upper-right clearfix">
                    	
                        <div class="nav-outer clearfix">
                            <!-- Main Menu -->
                            <nav class="main-menu">
                                <div class="navbar-header">
                                    <!-- Toggle Button -->    	
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    </button>
                                </div>
                                
                                <div class="navbar-collapse collapse clearfix">
                                    <ul class="navigation clearfix">
                                        <li><a href="?info=home">Home</a>
                                        </li>
                                        <li class="dropdown"><a href="#">Inspirational</a>
                                            <ul>
                                                <li><a href="?info=inspired&message=inspire">Inspirational Messages</a></li>
                                                <li><a href="?info=inspired&message=test">Testimonies</a></li>
                                                <!-- <li><a href="">Property Details</a></li> -->
                                            </ul>
                                        </li>
                                        <!-- <li><a href="#">Family</a></li> -->
                                        <li><a href="#">Family</a></li>
                                        <li><a href="?info=chart">Kingdom Chart</a></li>
                                        <li ><a href="?info=about">About Us</a></li>
                                        <li><a href="#">Help</a></li>
                                        <li class="dropdown"><a href="#">Account</a>
                                            <ul>
                                                <?php 
                                                
                                                    if (!empty($_SESSION['users'])) {
                                                        error_reporting(E_WARNING);
                                                        echo '<li><a href="?info=account&register=edit"><i class = "fa fa-user"></i> '.$_SESSION['users'].'</a></li>';
                                                    }
                                                    else{
                                                       echo '<li><a href="?info=account&register=signup">Sign up</a></li>'; 
                                                    }
                                                ?>
                                            
                                            <li><a href="?info=account&register=signout">Sign out</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </nav><!-- Main Menu End-->
                        
                        </div>
                        
                    </div>
                    
                </div>
            </div>
        </div>
        
        
    
    </header>
    <!--End Main Header -->
    
    
    <!--Page Info-->
    <section class="page-info">
        <div class="auto-container">
        	<!--Breadcrumb-->
            <!-- <div class="breadcrumb-outer">
                <ul class="bread-crumb clearfix">
                    <li><a href="index.php">Home</a></li>
                    <li class="active"></li>
                </ul>
            </div> -->
        </div>
    </section>
    
    
    <!--Sidebar Page-->
    <div class="sidebar-page-container" style="margin-top: -70px;">
        <div class="auto-container">
            <div class="row clearfix">

                                <!--Sidebar-->
                <div class="sidebar-side col-lg-3 col-md-4 col-sm-8 col-xs-12">
                    <aside class="sidebar">

                        <!-- Search Form -->
                        <div class="sidebar-widget search-box">

                            <form method="post" action="#">
                                <div class="form-group">
                                    <input type="search" name="search-field" value="" placeholder="Search Keyword...">
                                    <button type="submit"><span class="icon fa fa-search"></span></button>
                                </div>
                            </form>

                        </div>


                        <!-- Categories -->

                        <!-- <div class="sidebar-widget categories">
                            <div style="background-color: darkgreen; color: white; text-align: center; height: 40px; margin-top: auto; margin-bottom: auto;">
                                    <div class="inner-box">
                                        Schedules (Monday - Friday)
                                    </div>
                                </div>

                            <ul class="list">
                                <li><a href="#" class="clearfix">Morning  <span class="count pull-right">(6:30 - 8:30 am)</span></a></li>
                                <li><a href="#" class="clearfix">Afternoon <span class="count pull-right">(12:30 - 2:00 pm)</span></a></li>
                                <li><a href="#" class="clearfix">Evening <span class="count pull-right">(4:30 - 6:00 pm)</span></a></li>
                            </ul>

                        </div> -->


                        <!-- Popular Posts -->
                        <div class="sidebar-widget popular-posts">
                            <div class="sidebar-title"><a href="?info=bar&values=prayer_message"><h3>Recent Prayers</h3></a></div>
                            <div class="sidebar-title"><a href="?info=bar&values=active_testimony"><h3>Recent Messages</h3></a></div>
                            <div class="sidebar-title"><a href="?info=bar&values=prayer"><h3>Recent Testimonies</h3></a></div>
                        </div>
  
                        <!-- Archives -->
                        <div class="sidebar-widget archives">
                            <div class="sidebar-title"><h3>Archives</h3></div>

                            <?php

                            require_once ('Side.php');
                            $ba = new Side();
                            $cp = $ba->countPrayer();
                            $ct = $ba->countTestimony();
                            $cm = $ba->countMessage();
                            ?>

                            <ul class="list">
                                <li><a href="?info=sidebar&bar=testimony" class="clearfix">Testimonies <span class="count pull-right">(<?php echo $ct;?>)</span></a></li>
                                <li><a href="?info=sidebar&bar=message" class="clearfix">Message <span class="count pull-right">(<?php echo $cm;?>)</span></a></li>
                                <li><a href="?info=sidebar&bar=prayer" class="clearfix">Prayer <span class="count pull-right">(<?php echo $cp;?>)</span></a></li>
                                <!-- <li><a href="#" class="clearfix">August 2016 <span class="count pull-right">(12)</span></a></li>
                                <li><a href="#" class="clearfix">July 2016 <span class="count pull-right">(33)</span></a></li> -->
                            </ul>

                        </div>
                        
                        
                        <!-- Archives -->
                        <div class="sidebar-widget gallery-widget">
                            <div class="sidebar-title"><h3><a href="?info=account&register=partner" style = "color:#333333;" >Partners</a></h3></div>
                            <div class="sidebar-title"><h3><a href="?info=account&register=prayerrequest" style = "color:#333333;" >Prayer Request</a></h3></div>
                        </div>
                        <div style="background-color:#EEE8AA; width:auto; height:15em; border-radius:5px 5px 5px 5px;padding-left:1em; padding-right:1em;">
                        <h3>Your Daily Quotes!</h3>
                        <?php
                        require_once('Side.php');
                        $show = new Side();
                        echo '<cite style="">'.$show->quotes().'</cite>';
                        ?>
                        
                        </div>

                    </aside>


                </div>

                <?php
                error_reporting(E_WARNING);

                require_once ('Pray.php');
                
                $content = $display->home();

                switch ($_GET['info']) {
                    case 'home':
                        $content = $display->home();
                        //$content = $display->pRequest();
                        break;
                    case 'chart':
                    require_once ('Chart.php');
                        $content = $chart->chat();
                        $breadcrumb = 'Chat';
                        break;
                    case 'inspired':
                    require_once ('Inspirational.php');
                        switch ($_GET['message']) {
                            case 'inspire':
                                $content = $inspire->iRequest();
                                $breadcrumb = 'Inspiration';
                            break;
                            case 'test':
                                $content = $test->getTest();
                                $breadcrumb = 'Testimony';
                                break;
                            default:
                                # code...
                            break;
                        }
                        break; 
                    case 'bar':
                        require_once('Bar.php');
                        switch ($_GET['values']) {
                            case 'prayer_message':
                                $content = $bar->prayerMessage();
                                break;
                            case 'active_testimony':
                                $content = $bar->activeTestimony();
                                break;
                            case 'prayer':
                                $content = $bar->Prayer();
                                break;
                            
                            default:
                                # code...
                                break;
                        }
                        break;    
                    case 'sidebar':
                    require_once ('Side.php');
                        switch ($_GET['bar']) {
                            case 'testimony':
                               $content = $ba->aTestimony();
                            break;
                            case 'prayer':
                               $content = $ba->aPrayer();
                            break;
                            case 'message':
                               $content = $ba->aMessage();
                            break;
                            
                            default:
                                # code...
                                break;
                        }
                        break;
                    case 'account':
                    require_once ('Account.php');
                        switch ($_GET['register']) {
                            case 'signup':
                            $content = $register->register();
                            break;
                            case 'signin':
                            $content = $register->login();
                            break;
                            case 'partner':
                            $content = $register->partner();
                            break;
                            case 'signout':
                            $content = $register->signout();
                            break;
                            case 'prayerrequest':
                            $content = $register->pRequest();
                            break;
                            case 'edit':
                            $content = $register->update();
                            break;
                            default:
                            # code...
                            break;
                    }
                        
                        break;
                
                    case 'action':
                        require_once ('HForm.php');
                        switch ($_GET['trigger']) {
                            case 'pm':
                                $content = $action->pMessage();
                                break;
                                case 'ct':
                                $content = $action->chart();
                                break;
                                case 'cf':
                                $content = $action->contactForm();
                                break;
                            
                            default:
                                # code...
                                break;
                        }
                        break;
                    case 'about':
                    require_once ('About.php');
                        $content = $about->aboutUs();
                        break;
                    default:
                        # code...
                        break;
                }
                
                ?>
                <!--Sidebar-->
                <div class="content-side col-lg-9 col-md-8 col-sm-12 col-xs-12">
                    
                    <!--News Details Section-->
                        <section class="news-detail-section">
                <?php
                echo $content;
                ?>
				
                <!--Content Side-->
                <!--Content Side-->
                

                    </section>

                </div>
            </div>
        </div>
    </div>
    
    
    <!--Subscribe Bar-->
    <section class="subscribe-bar" style="margin-bottom:-4em;">
    	<!-- <div class="info-box">Open: Sat-Sun 10.00am-8.00pm</div> -->
        
    	<!-- <div class="auto-container"> -->
        	<!-- <div class="clearfix"> -->
            	<!-- <div class="subscribe-title">Subscribe our Newsletter!</div> -->
                <!-- <div class="subscribe-link"><a href="contact.html" class="theme-btn subscribe-btn"><span class="fa fa-paper-plane"></span> Subscribe Now</a></div> -->
            <!-- </div> -->
        <!-- </div> -->
    </section>
    
    
    <!--Main Footer-->
    <footer class="main-footer" style="">
    	
        <!--Footer Title-->
        <div class="footer-title" style="">
            <!-- <figure class="logo"><a href="index-2.html"><img src="images/logo-2.png" alt=""></a></figure> -->
            <h2>Stay in our touch!</h2>
            <!-- <div class="desc-text">But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born.</div> -->
        </div>
            
        <section class="contact-section-one" style="margin-bottom:-8%;">
            <div class="auto-container">
            	<!-- <div class="big-title"><h2>Contact us</h2></div> -->
                
            	<div class="row clearfix">
                	<!--Info Column-->
                    <div class="info-column col-md-5 col-sm-12 col-xs-12">
                		<h3><span class="theme_color">More</span> Info:</h3>
                        <ul class="info-list">
                        	<li><span class="icon fa fa-phone"></span><strong>+256 783-815-035, +256 751-150-234</strong><br><span class="theme_color">Please call us</span></li>
                            <li><span class="icon fa fa-envelope"></span><br>info@inspired2inspire4better.for.ug</li>
                            <li><span class="icon fa fa-map-marker"></span>Ndejje Off Entebbe-Road<br>Lubowa,9000</li>
                        </ul>
                    </div>
                    
                    <!--Form Column-->
                    <div class="form-column col-md-7 col-sm-12 col-xs-12">
                		<h3><span class="theme_color">Contact</span> Form:</h3>
                        <!--Contact Form-->
                        <div class="default-form contact-form">
                            <form method="post" action="?info=action&trigger=cf" id="contact-form">
                                <div class="row clearfix">
                                        
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="fullname" value="" placeholder="Name" required>
                                    </div>
                                    
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <input type="email" name="email" value="" placeholder="Mail" required>
                                    </div>
                                    
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <input type="text" name="subject" value="" placeholder="Subject">
                                    </div> 
                                      
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <textarea name="message" placeholder="Details" required></textarea>
                                    </div>
                                    
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <div class="text-center"><button type="submit" name = "mail" class="theme-btn btn-style-one">Send now!</button></div>
                                    </div>
                                    
                                </div>
                            </form>
                        </div><!--End Contact Form-->
                    </div>
                </div>
            </div>
        </section>
        
        <!--Footer Bottom-->
        <div class="footer-bottom" style="margin-bottom:-2em; text-align:center;">
        	<div class="bottom-container">
            	<div class="clearfix">
                	<div class="copyright-text"style="margin-left: 5px;" >Inspired to Inspire &copy; <?php echo date('Y');?>. All rights are reserved</div>
                </div>
            </div>
        </div>
        
    </footer>
    
    
</div>
<!--End pagewrapper-->

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="icon fa fa-long-arrow-up"></span></div>


<script src="js/jquery.js"></script> 
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/isotope.js"></script>
<script src="js/jquery.fancybox.pack.js"></script>
<script src="js/jquery.fancybox-media.js"></script>
<script src="js/validate.js"></script>
<script src="js/owl.js"></script>
<!-- <script src="js/jQuery v3.3.1.js"></script> -->
<script src="js/wow.js"></script>
<script src="js/script.js"></script>

<!--Google Map APi Key-->
<script src="http://maps.google.com/maps/api/js?key="></script>
<script src="js/map-script.js"></script>
<!--End Google Map APi-->

</body>

</html>
