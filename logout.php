<?php
 require 'inc/head.php';
?>

<body class="boxed">
	<!-- Loader -->
        <!--
	<div id="loader-wrapper">
		<div class="cube-wrapper">
			<div class="cube-folding">
				<span class="leaf1"></span>
				<span class="leaf2"></span>
				<span class="leaf3"></span>
				<span class="leaf4"></span>
			</div>
		</div>
	</div>
        -->
	<!-- /Loader -->
	<div class="fixed-btns">
            <!-- Back To Top -->
            <a href="#" class="top-fixed-btn back-to-top"><i class="icon icon-arrow-up"></i></a>
            <!-- /Back To Top -->
	</div>
	<div id="wrapper">
		<!-- Page -->
		<div class="page-wrapper">
			<?php 
                            require 'inc/header.php';
                            unset($_SESSION['email']);
                            session_destroy();
                        ?>
			<!-- Page Content -->
			<main class="page-main">
				<div class="block">
					<div class="container">
						<div class="row row-eq-height">
							<div class="col-sm-6 col-sm-offset-3">
								<div class="form-card">
									<h4>Gracias!!!</h4>
									<p>Su sesión se ha cerrado correctamente.</p>
                                                                        
								</div>
							</div>
						</div>
					</div>
				</div>
			</main>
			<!-- /Page Content -->
			<?php require 'inc/footer.php'; ?>
		</div>
		<!-- Page Content -->
	</div>
	<!-- ProductStack -->
	<!-- jQuery Scripts  -->
	<script src="https://www.webinarsenconcreto.com/js/vendor/jquery/jquery.js"></script>
	<script src="https://www.webinarsenconcreto.com/js/vendor/bootstrap/bootstrap.min.js"></script>
	<script src="https://www.webinarsenconcreto.com/js/vendor/swiper/swiper.min.js"></script>
	<script src="https://www.webinarsenconcreto.com/js/vendor/slick/slick.min.js"></script>
	<script src="https://www.webinarsenconcreto.com/js/vendor/parallax/parallax.js"></script>
	<script src="https://www.webinarsenconcreto.com/js/vendor/isotope/isotope.pkgd.min.js"></script>
	<script src="https://www.webinarsenconcreto.com/js/vendor/magnificpopup/dist/jquery.magnific-popup.js"></script>
	<script src="https://www.webinarsenconcreto.com/js/vendor/countdown/jquery.countdown.min.js"></script>
	<script src="https://www.webinarsenconcreto.com/js/vendor/nouislider/nouislider.min.js"></script>
	<script src="https://www.webinarsenconcreto.com/js/vendor/ez-plus/jquery.ez-plus.js"></script>
	<script src="https://www.webinarsenconcreto.com/js/vendor/tocca/tocca.min.js"></script>
	<script src="https://www.webinarsenconcreto.com/js/vendor/bootstrap-tabcollapse/bootstrap-tabcollapse.js"></script>
	<script src="https://www.webinarsenconcreto.com/js/vendor/scrollLock/jquery-scrollLock.min.js"></script>
	<script src="https://www.webinarsenconcreto.com/js/vendor/darktooltip/dist/jquery.darktooltip.js"></script>
	<script src="https://www.webinarsenconcreto.com/js/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
	<script src="https://www.webinarsenconcreto.com/js/vendor/instafeed/instafeed.min.js"></script>
	<script src="https://www.webinarsenconcreto.com/js/megamenu.min.js"></script>
	<script src="js/app.js"></script>
</body>
</html>