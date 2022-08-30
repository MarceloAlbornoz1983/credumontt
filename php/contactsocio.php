

<html lang="es-CL" dir="ltr">
  <head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--  
    Document Title
    =============================================
    -->
    <title>CREDUMONTT COOPERATIVA DE AHOPRRO Y CREDITO</title>
    <!--  
    Favicons
    =============================================
    -->
    <link rel="apple-touch-icon" sizes="57x57" href="assets/images/favicons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="assets/images/favicons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="assets/images/favicons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/images/favicons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="assets/images/favicons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="assets/images/favicons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="assets/images/favicons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="assets/images/favicons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/favicons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="assets/images/favicons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/images/favicons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicons/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/images/favicons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!--  
    Stylesheets
    =============================================
    
    -->
    <!-- Default stylesheets-->
    <link href="assets/lib/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Template specific stylesheets-->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Volkhov:400i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="http://web.credumontt.cl/assets/lib/animate.css/animate.css" rel="stylesheet">
    <link href="http://web.credumontt.cl/assets/lib/components-font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="http://web.credumontt.cl/assets/lib/et-line-font/et-line-font.css" rel="stylesheet">
    <link href="http://web.credumontt.cl/assets/lib/flexslider/flexslider.css" rel="stylesheet">
    <link href="http://web.credumontt.cl/assets/lib/owl.carousel/dist/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="http://web.credumontt.cl/assets/lib/owl.carousel/dist/assets/owl.theme.default.min.css" rel="stylesheet">
    <link href="http://web.credumontt.cl/assets/lib/magnific-popup/dist/magnific-popup.css" rel="stylesheet">
    <link href="http://web.credumontt.cl/assets/lib/simple-text-rotator/simpletextrotator.css" rel="stylesheet">
    <!-- Main stylesheet and color file-->
    <link href="http://web.credumontt.cl/assets/css/style.css" rel="stylesheet">
    <link id="color-scheme" href="http://web.credumontt.cl/assets/css/colors/default.css" rel="stylesheet">
	
  </head>
  <body>
   <main>
	<section class="home-section home-parallax home-fade home-full-height" id="home">
<?php

	$errors = array();

	// Check if name has been entered
	if (!isset($_POST['nombre'])) {
		$errors['nombre'] = 'Por Favor Escriba su nombre completo';
	}

	// Check if email has been entered and is valid
	if (!isset($_POST['correo']) || !filter_var($_POST['correo'], FILTER_VALIDATE_EMAIL)) {
		$errors['correo'] = 'Por favor ingrese un correo valido';
	}
    //Check if region has been entered
	if (!isset($_POST['regiones'])) {
		$errors['regiones'] = 'Introduzca la region donde reside';
	}
	//Check if comuna has been entered
	if (!isset($_POST['comunas'])) {
		$errors['comunas'] = 'Introduzca la comuna donde reside';
	}
	
	//Check if telefono has been entered
	if (!isset($_POST['telefono'])) {
		$errors['telefono'] = 'Introduzca su numero telefonico';
	}

	$errorOutput = '';

	if(!empty($errors)){

		$errorOutput .= '<div class="alert alert-danger alert-dismissible" role="alert">';
 		$errorOutput .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';

		$errorOutput  .= '<ul>';

		foreach ($errors as $key => $value) {
			$errorOutput .= '<li>'.$value.'</li>';
		}

		$errorOutput .= '</ul>';
		$errorOutput .= '</div>';

		echo $errorOutput;
		die();
	}

	$name = $_POST['nombre'];
	$email = $_POST['correo'];
	$region = $_POST['regiones'];
    $comuna = $_POST['comunas'];
    $telefono = $_POST['telefono'];
	$from = $email;
	
	$to = 'chelorocker@hotmail.com';  // please change this email id
	$subject = 'NUEVA SOLICITUD DE SOCIO desde credumontt.cl';
    
	$body = "$name, quien reside en la $region, comuna de $comuna, desea información sobre como ser socio en la cooperativa.\n\nFavor contactar a:\n\nFono: $telefono\nCorreo:  $email\n\nEnviado desde www.credumontt.cl";

    $s= "=?utf-8?b?".base64_encode($s)."?=";
    $headers = "MIME-Version: 1.0\r\n";
    $headers.= "From: =?utf-8?b?".base64_encode($name)."?= ".$from."\r\n";
    $headers.= "Content-Type: text/plain;charset=utf-8\r\n";
    $headers.= "Reply-To: $reply\r\n";  
    $headers.= "X-Mailer: PHP/" . phpversion();

	//send the email
	$result = '';
	if (mail ($to, $subject, $body, $headers)) {
		$result .= '<div class="alert alert-success alert-dismissible" role="alert">';
 		$result .= '<a href=\" http://web.credumontt.cl\"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></a><br/>';
		$result .= 'Gracias por conactarnos, en breve le responderemos.';
		$result .= '</div>';

		echo $result;
		die();
	}

	$result = '';

?>
  </section>
   </main>
  </body>
  
  </html>