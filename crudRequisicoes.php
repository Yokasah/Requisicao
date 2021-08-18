<?php
session_start();
require( 'bd.php' );
$_SESSION['erroLogin'] = 'false';
?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">

	<title>REQUISICÃO - ESCO</title>
	<meta content="" name="description">
	<meta content="" name="keywords">

	<!-- ======= SCRIPTS ======= -->

	<!--  SCRIPT DE DATETIME   -->
	<script type="text/javascript">
        $(function () {
            $('#datetimepicker1').datetimepicker();
        });
	</script>


	<!-- Favicons -->
	<link href="assets/img/favicon.png" rel="icon">
	<link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

	<!-- DateTimer link  -->
	<link rel="stylesheet"
	      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css">

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
	      rel="stylesheet">

	<!-- Vendor JS Files -->
	<script src="assets/vendor/aos/aos.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
	<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
	<script src="assets/vendor/php-email-form/validate.js"></script>
	<script src="assets/vendor/purecounter/purecounter.js"></script>
	<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
	<script src="assets/vendor/typed.js/typed.min.js"></script>
	<script src="assets/vendor/waypoints/noframework.waypoints.js"></script>


	<!-- Vendor CSS Files -->
	<link href="assets/vendor/aos/aos.css" rel="stylesheet">
	<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
	<link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
	<link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
	<link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

	<!-- Template Main JS File -->
	<script src="assets/js/main.js"></script>

	<!-- Template Main CSS File -->
	<link href="assets/css/style.css" rel="stylesheet">

	<!-- ======= Mobile nav toggle button ======= -->
	<i class="bi bi-list mobile-nav-toggle d-xl-none"></i>
	<!-- ======= END SCRIPTS ======= -->
</head>

<body>

<!-- ======= HEADER ======= -->
<?php
include 'header.php';
?>


<!-- ======= Hero Section ======= -->

<!-- ======== Hero Section -> Escolha ===== -->
<section id="hero" class="d-flex flex-column justify-content-center align-items-center">
	<?php
		include 'requisicaoform.php';
	?>
</section>

<!-- ======== Hero Section -> Formulario ===== -->



<!-- End Hero -->
</body>
</html>

