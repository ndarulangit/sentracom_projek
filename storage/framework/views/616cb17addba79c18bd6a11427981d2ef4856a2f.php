<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?php echo $__env->yieldContent('Judul Halaman'); ?></title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(asset('assets/images/favicon.png')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/chartist/css/chartist.min.css')); ?>">
    <link href="<?php echo e(asset('assets/vendor/datatables/css/jquery.dataTables.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/vendor/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')); ?>" rel="stylesheet">
    <!-- Pick date -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/pickadate/themes/default.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/pickadate/themes/default.date.css')); ?>">
	<link href="<?php echo e(asset('assets/vendor/owl-carousel/owl.carousel.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/css/style.css')); ?>" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="<?php echo $__env->yieldContent('logo_nav'); ?>" class="brand-logo">
                <img class="logo-abbr" src="<?php echo e(asset('assets/images/logo.png')); ?>" alt="">
                <img class="logo-compact" src="<?php echo e(asset('assets/images/sentra.png')); ?>" alt="">
                <img class="brand-title" src="<?php echo e(asset('assets/images/sentra.png')); ?>" alt="">
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

		<!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="dashboard_bar">
								<?php echo $__env->yieldContent('Header'); ?>
                            </div>
                        </div>
                        <ul class="navbar-nav header-right">
						<?php echo $__env->yieldContent('header_set'); ?>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->
        

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="deznav">
            <div class="deznav-scroll">
				<a class="add-menu-sidebar" disabled >Sentracom</a>
				<ul class="metismenu" id="menu">
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-381-networking"></i>
							<span class="nav-text">Dashboard</span>
						</a>
                        <ul aria-expanded="false">
						<?php echo $__env->yieldContent('dashboard_nav'); ?>
						</ul>
                    </li>
                    <?php echo $__env->yieldContent('dahsboard_nav_profile'); ?>
                </ul>
				<div class="copyright">
					<p><strong>Sentracom Service Computer</strong> © 2021 All Rights Reserved</p>
					<p>Made with <span class="heart"></span> by Seila</p>
				</div>
			</div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->
   
	<?php echo $__env->yieldContent('content'); ?>

        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="http://dexignzone.com/" target="_blank">DexignZone</a> 2021</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

		<!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="<?php echo e(asset('assets/vendor/moment/moment.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/global/global.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/vendor/chart.js/Chart.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/custom.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/js/deznav-init.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/vendor/owl-carousel/owl.carousel.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')); ?>"></script>
	
    <!-- Datatable -->
    <script src="<?php echo e(asset('assets/vendor/datatables/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins-init/datatables.init.js')); ?>"></script>

    <script src="<?php echo e(asset('assets/vendor/pickadate/picker.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/pickadate/picker.time.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/pickadate/picker.date.js')); ?>"></script>

     <!-- Material color picker init -->
     <script src="<?php echo e(asset('assets/js/plugins-init/material-date-picker-init.js')); ?>"></script>
    
     <!-- Pickdate -->
    <script src="<?php echo e(asset('assets/js/plugins-init/pickadate-init.js')); ?>"></script>

	<!-- Chart piety plugin files -->
    <script src="<?php echo e(asset('assets/vendor/peity/jquery.peity.min.js')); ?>"></script>
	
	<!-- Apex Chart -->
	<script src="<?php echo e(asset('assets/vendor/apexchart/apexchart.js')); ?>"></script>
	
	<!-- Dashboard 1 -->
	<script src="<?php echo e(asset('assets/js/dashboard/dashboard-1.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/js/dashboard/analytics.js')); ?>"></script>
	
	<script>
		function carouselReview(){
			/*  event-bx one function by = owl.carousel.js */
			jQuery('.event-bx').owlCarousel({
				loop:true,
				margin:30,
				nav:true,
				center:true,
				autoplaySpeed: 3000,
				navSpeed: 3000,
				paginationSpeed: 3000,
				slideSpeed: 3000,
				smartSpeed: 3000,
				autoplay: false,
				navText: ['<i class="fa fa-caret-left" aria-hidden="true"></i>', '<i class="fa fa-caret-right" aria-hidden="true"></i>'],
				dots:true,
				responsive:{
					0:{
						items:1
					},
					720:{
						items:2
					},
					
					1150:{
						items:3
					},			
					
					1200:{
						items:2
					},
					1749:{
						items:3
					}
				}
			})			
		}
		jQuery(window).on('load',function(){
			setTimeout(function(){
				carouselReview();
			}, 1000); 
		});
	</script>
</body>
</html><?php /**PATH C:\xampp\htdocs\sentracom_projek\resources\views/\layout\viewnavbar.blade.php ENDPATH**/ ?>