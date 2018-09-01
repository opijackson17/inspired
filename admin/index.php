<?php
// ob_start();
// session_start();
?>

<!doctype html>
<html class="no-js" lang="eng">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Prayer App</title>
<link rel="icon" type="image/ico" href="assets/images/favicon.ico" />
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="assets/css/vendor/animsition.min.css">
<link rel="stylesheet" href="assets/css/vendor/simple-line-icons.css">
<link rel="stylesheet" href="assets/css/vendor/weather-icons.min.css">
<link rel="stylesheet" href="assets/js/vendor/sweetalert/sweetalert2.css">


<link rel="stylesheet" href="assets/js/vendor/datetimepicker/css/bootstrap-datetimepicker.min.css">
<link rel="stylesheet" href="assets/js/vendor/daterangepicker/daterangepicker-bs3.css">
<link rel="stylesheet" href="assets/js/vendor/owl-carousel/owl.carousel.css">
<link rel="stylesheet" href="assets/js/vendor/owl-carousel/owl.theme.css">
<link rel="stylesheet" href="assets/js/vendor/chosen/chosen.css">
<link rel="stylesheet" href="assets/js/vendor/summernote/summernote.css">
<link rel="stylesheet" href="assets/css/main.css">

<script type="text/javascript" src="jquery1.6.2.js"></script>

<link rel="stylesheet" href="assets/css/main.css">

<style type="text/css">
	 <style>
      #right-panel {
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }

      #right-panel select, #right-panel input {
        font-size: 15px;
      }

      #right-panel select {
        width: 100%;
      }

      #right-panel i {
        font-size: 12px;
      }
      #right-panel {
        margin: 20px;
        border-width: 2px;
        width: 20%;
        height: 400px;
        float: right;
        text-align: left;
        padding-top: 0;
      }
      #directions-panel {
        margin-top: 10px;
        background-color: #FFFF;
        padding: 10px;
        width: : 100%;
      }
      #note { 
    text-align: center;
    padding: .3em; 10px; 
    background: #009ee0; 
}
	.bool {
	    font-style: italic;
	    color: #313131;
	}
	.info {
	    display: inline-block;
	    width: 40%;
	    text-align: center;
	}
	.infowin {
	    color: #313131;
	}
	#title,
	.bool{
	    font-weight: bold;
	}
</style>
<script src="jquery.js"></script>

<script type="text/javascript">
		function hid(){
			 var x = document.getElementById("mtype");
			 var p = document.getElementById("filem");
			 var q = document.getElementById("txt");
    if (x.selectedIndex ==1) {
        p.style.display = "none";
		q.style.display = "block";
    } 
   
    else if(x.selectedIndex == 2 || x.selectedIndex == 3) {
        q.style.display = "none";
		p.style.display = "block";
    }
	else if(x.selectedIndex == 0){
    	p.style.display = "block";
    	q.style.display = "block";
    }else{
		
	}
		}
</script>

</head>

<body id="oakleaf" class="main_Wrapper">
<!--  Application Content  -->
<div id="wrap" class="animsition">
	<!--  HEADER Content  -->
	<section id="header">
		<header class="clearfix"> 
			<!-- Branding -->
			<div class="branding"> <a class="brand" href="index"><span>Daily Prayer App</span></a> <a role="button" tabindex="0" class="offcanvas-toggle visible-xs-inline"><i class="fa fa-bars"></i></a> </div>
			<!-- Branding end --> 			
			<!-- Left-side navigation -->
			<ul class="nav-left pull-left list-unstyled list-inline">
			<li class="leftmenu-collapse"><a role="button" tabindex="0" class="collapse-leftmenu"><i class="fa fa-arrow-circle-o-left"></i></a></li>
			</ul>
			<!-- Left-side navigation end --> 		

			<!-- Search -->	
			<div class="search" id="main-search" style="width: 40%;">
					<form action="?resourceAllocation=search" method="POST">
						<div class="boxs-body">
							<div class="input-group search-bar">
								<input type="text" class="form-control " name="search" placeholder="Search...">
								<span class="input-group-btn">
								<button class="btn btn-raised btn-default" type="submit"><i class="fa fa-search"></i></button>
								</span>
							</div>
						</div>
					</form>

			</div>
			<!-- Search end --> 
			<!-- Right-side navigation -->

			<ul class="nav-right pull-right list-inline">
				<li class="dropdown nav-profile"> <a href class="dropdown-toggle" data-toggle="dropdown"> <img src="assets/images/profile-photo.jpg" alt="" class="0 size-30x30"></a>
					<ul class="dropdown-menu" role="menu">						
						<li>
							<div class="user-info">
								<div class="user-name"></div>
								<div class="user-position online">Online</div>
							</div>
						</li>
						<li><a href="profile.html" role="button" tabindex="0"><span class="label label-success pull-right">80%</span><i class="fa fa-user"></i>Profile</a></li>
						<li class="divider"></li>
						<li><a href="?resourceAllocation=logout" role="button" tabindex="0"><i class="fa fa-sign-out"></i>Logout</a></li>
					</ul>
				</li>
				<li class="dropdown users"> <a href class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-th"></i>					
				</a>
					<div class="dropdown-menu pull-right with-arrow panel panel-default" role="menu">				
						<ul class="app-sortcut">
						
							</li>
							<li>
								<a href="?admin=staff" class="connection-item">
								<i class="fa fa-plus"></i>
								<span class="block">Add Staff</span>
								</a>
							</li>
							 <li><a href="?admin=msg" class="connection-item">
								<i class="fa fa-bullseye"></i>
								<span class="block">Reply</span>
								</a>
							</li>
							<li>
								<a href="?admin=touch" class="connection-item">
								<i class="fa fa-phone"></i>
								<span class="block">Touch</span>
								</a>
							</li>
						</ul>						
					</div>
				</li>


				<li class="dropdown notifications"> 
					<a href class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-bell"></i>
					<div class="notify"></div>
					</a>
					<div class="dropdown-menu pull-right with-arrow panel panel-default ">		
						<ul class="list-group">

							<li class="list-group-item"> 
								<a role="button" href="?admin=prequest&request=getrequest" tabindex="0" class="media"> 
									<span class="pull-left media-object media-icon"><i class="fa fa-file-image-o"></i> </span>
									<div class="media-body"> <span class="block">Prayer Need</span> 
										<small class="text-muted"></small> 
									</div>
								</a> 
							</li>

							<li class="list-group-item"> 
								<a role="button" href="?admin=msg" tabindex="0" class="media"> 
									<span class="pull-left media-object media-icon"><i class="icon-user-following"></i> </span>
									<div class="media-body"> <span class="block">Reply on Message</span> 
										<small class="text-muted"></small> 
									</div>
								</a> 
							</li>
			
						</ul>
						<div class="panel-footer"> <a role="button" tabindex="0">Show all notifications <i class="fa fa-angle-right pull-right"></i></a> </div>
					</div>
				</li>
				<!-- <li class="toggle-right-leftmenu"><a role="button" tabindex="0"><i class="fa fa-gear"></i></a></li> -->
			</ul>
			<!-- Right-side navigation end --> 
		</header>

	</section>

	<!--/ HEADER Content  --> 

	<!-- CONTROLS Content  -->

	<div id="controls"> 

		<!--SIDEBAR Content -->

<aside id="leftmenu">
	<div id="leftmenu-wrap">
		<div class="panel-group slim-scroll" role="tablist">
			<div class="panel panel-default">						
				<div id="leftmenuNav" class="panel-collapse collapse in" role="tabpanel">
					<div class="panel-body"> 
						<!--  NAVIGATION Content -->
						<ul id="navigation">
							
							<li class=""><a href="index.php"><i class="fa fa-home"></i> <span>Home</span></a></li>
							<li class=""><a href="?admin=prayer"><i class="icon-pointer"></i> <span>Prayer</span></a></li>									
							<li class=""><a href="?admin=message"><i class="icon-check"></i>Message<span class="label  label-success"></span></a></li>
							
							<li class=""><a href="?admin=partners"><i class="fa fa-group"></i> <span>Partners</span></a></li>				
							<!-- <li class=""><a href=""><i class="icon-clock"></i> <span></span></a></li>						 -->
							<li class=""><a href="?admin=prequest&request=getrequest"><i class="icon-bar-chart"></i> <span>Prayer Request</span></a></li>
							<li class=""><a href=""><i class="icon-question"></i> <span>Help</span></a></li>

								</ul>
							</li>
						</ul>
						<!--/ NAVIGATION Content --> 
					</div>
				</div>
			</div>



					

				</div>

			</div>

		</aside>

		<?php
		error_reporting(E_WARNING);
		$action = $_GET['admin'];
		include_once('Prequest.php');
		$content = $quest->home();
		switch ($action) {
			case 'prayer':
			include_once('Prayer.php');
				$content = $prayer->adminPrayer();
				break;
			case 'message':
			include_once('Message.php');
				$content = $message->messageAdmin();
				break;
			case 'staff':
			include_once('Staff.php');
				$content = $staff->addStaff();
				break;
			case 'partners':
			include_once('Staff.php');
				$content = $staff->getPartners();
				break;
			case 'msg':
			include_once('Staff.php');
				$content = $staff->getReply();
				break;
			case 'touch':
			include_once('Staff.php');
				$content = $staff->stayTouch();
				break;
			case 'prequest':
			include_once('Prequest.php');
				switch ($_GET['request']) {
					case 'getrequest':
						$content = $quest->getRequest();
						break;
					case 'response':
						$content = $quest->addressRequest();
						break;	
					
					default:
						break;
				}
			
			default:
				# code...
				break;
		}

			echo $content;
		?>

		<!--/ SIDEBAR Content --> 
		<!--RIGHTBAR Content -->

		<!-- <aside id="rightmenu">

			<div role="tabpanel">  -->

				<!-- Nav tabs -->

				<!-- <ul class="nav nav-tabs" role="tablist">

					<li role="presentation" class="active"><a href="#chat" aria-controls="chat" role="tab" data-toggle="tab">Settings</a></li> -->

					<!-- <li role="presentation"><a href="#todo" aria-controls="todo" role="tab" data-toggle="tab">Todo</a></li> -->

					<!-- <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li> -->

				<!-- </ul> -->

				<!-- Tab panes -->

				<!-- <div class="tab-content"> -->
					<!-- Settings -->
					<!-- <div role="tabpanel" class="tab-pane active" id="chat">
						<h6>Recent</h6>
						<ul>

							<li class="online">

								<div class="media"> 
									<a href="?resourceAllocation=settings&setCat=or" style="text-decoration: none;"><div class="media-body"> <span class="name">Operation range</span> <span class="message">Geofencing an area by defining radius ...</span> <span class="badge badge-outline status"></span> </div></a>
								</div>
							</li>

							<li class="online">

								<div class="media"> 
									<a href="?resourceAllocation=settings&setCat=pricekm" style="text-decoration: none;"><div class="media-body"> <span class="name">Pricing</span> <span class="message">Price per Km</span> <span class="badge badge-outline status"></span> </div></a>
								</div>
							</li>

							<li class="online">

								<div class="media"> 
									<a href="?resourceAllocation=settings&setCat=companycharges" style="text-decoration: none;"><div class="media-body"> <span class="name">Pricing</span> <span class="message">Price per Km to move from company</span> <span class="badge badge-outline status"></span> </div></a>
								</div>
							</li>

							<li class="online">

								<div class="media"> 
									<a href="?resourceAllocation=settings&setCat=startpoint" style="text-decoration: none;"><div class="media-body"> <span class="name">Company Residence</span> <span class="message">Where to start resolving from</span> <span class="badge badge-outline status"></span> </div></a>
								</div>
							</li>	

							<li class="online">

								<div class="media"> 
									<a href="?resourceAllocation=settings&setCat=schools" style="text-decoration: none;"><div class="media-body"> <span class="name">School</span> <span class="message">Schools currently working with</span> <span class="badge badge-outline status"></span> </div></a>
								</div>
							</li>

							<li class="online">

								<div class="media"> 
									<a href="?resourceAllocation=settings&setCat=freetime" style="text-decoration: none;"><div class="media-body"> <span class="name">Free Time</span> <span class="message">Free time of the day</span> <span class="badge badge-outline status"></span> </div></a>
								</div>
							</li>

						</ul>
					</div>
 -->
					<!-- End settings -->
<!-- 
				</div>

			</div>

		</aside>
 -->
		<!--/ RIGHTBAR Content --> 

	<!-- </div> -->

	<!--/ CONTROLS Content --> 

	<!--  CONTENT -->
	
<!-- Vendor JavaScripts  --> 

<script src="assets/bundles/libscripts.bundle.js"></script>
<script src="assets/bundles/vendorscripts.bundle.js"></script>
<script src="assets/js/vendor/classie/classie.js"></script> 
<script src="assets/bundles/sweetalertscripts.bundle.js"></script>

<!-- Footable Plugin -->
<script src="assets/js/vendor/footable/footable.all.min.js"></script> 
<script type="text/javascript">
	$(window).load(function(){
		$('.footable').footable();
	});
</script> 
<!-- End Footable Plugin -->

<!-- js to hide form field -->

<!-- end of js to hide for field  -->

<script src="assets/js/vendor/sparkline/jquery.sparkline.min.js"></script> 
<script src="assets/js/vendor/owl-carousel/owl.carousel.min.js"></script> 
<script src="assets/js/vendor/daterangepicker/moment.min.js"></script> 
<script src="assets/js/vendor/datetimepicker/js/bootstrap-datetimepicker.min.js"></script> 
<script src="assets/js/vendor/chosen/chosen.jquery.min.js"></script> 
<script src="assets/js/vendor/summernote/summernote.min.js"></script>
<script src="assets/bundles/coolclockscripts.bundle.js"></script>

<script src="assets/js/page/widgets.js"></script>

<!--/ vendor javascripts --> 

<!-- Custom JavaScripts  --> 

<script src="assets/js/main.js"></script>

<!--/ custom javascripts --> 

<!-- Page Specific Scripts  --> 

<script type="text/javascript">
					
				</script>

</body>

</html>