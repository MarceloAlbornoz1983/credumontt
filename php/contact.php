<html lang="es-CL" dir="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--  
    Document Title
    =============================================
    -->
    <title>CREDUMONTT COOPERATIVA DE AHORRO Y CREDITO</title>
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
	if (!isset($_POST['nombreContacto'])) {
		$errors['nombreContacto'] = 'Por Favor Escriba su nombre completo';
	}

	// Check if email has been entered and is valid
	if (!isset($_POST['correoContacto']) || !filter_var($_POST['correoContacto'], FILTER_VALIDATE_EMAIL)) {
		$errors['correoContacto'] = 'Por favor ingrese un correo valido';
	}

	//Check if message has been entered
	if (!isset($_POST['message'])) {
		$errors['message'] = 'Nos interesa leer lo que quiere expresar.';
	}
    
    if (!isset($_POST['regionesContacto'])) {
		$errors['regionesContacto'] = 'Nos interesa saber donde se encuentra.';
	}
	 
    if (!isset($_POST['comunasContacto'])) {
		$errors['comunasContacto'] = 'Nos interesa saber donde se encuentra.';
	}
	
	if (!isset($_POST['asunto'])) {
		$errors['asunto'] = 'Nos interesa saber su problema.';
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
            
	$name = $_POST['nombreContacto'];
	$email = $_POST['correoContacto'];
	$message = $_POST['message'];
    $region = $_POST['regionesContacto'];
    $comuna = $_POST['comunasContacto'];
    $asunto = $_POST['asunto'];
    $telefono = $_POST['telefonoContacto'];
 
    
    if($asunto == 1){
        $asunto2 = "RENUNCIA";
    }
    if($asunto == 2){
        $asunto2 = "PAGOS";
    }
    if($asunto == 3){
        $asunto2 = "SOLICITUD DE CREDITO";
    }
    if($asunto == 4){
        $asunto2 = "CONVENIO";
    }
    if($asunto == 5){
        $asunto2 = "HACERSE SOCIO";
    }
    if($asunto == 6){
        $asunto2 = "OTROS MOTIVOS";
    }

    switch ($region) {
        case 'Región Metropolitana de Santiago'://Santiago
            
            switch ($asunto) {
                case '1'://Renuncia
                    $from = $email;
                    $to = 'ibaquero@credumontt.cl';  // please change this email id
                    $subject = $name.' desde credumontt.cl. Asunto: '.$asunto2;
    
                    $body = "$name, de la $region, comuna de $comuna, tiene el siguiente mensaje para Credumontt:\n\n $message \n\nFavor contactar a:\n\nFono: $telefono\nCorreo:  $email\n\nEnviado desde www.credumontt.cl";
        
                    $s= "=?utf-8?b?".base64_encode($s)."?=";
                    $headers = "MIME-Version: 1.0\r\n";
                    $headers.= "From: =?utf-8?b?".base64_encode($name)."?= ".$from."\r\n";
                    $headers.= "Content-Type: text/plain;charset=utf-8\r\n";
                    $headers.= "Reply-To: $reply\r\n";  
                    $headers.= "X-Mailer: PHP/" . phpversion();
                    
                    //send the email
                    $result = '';  
                    
                    break;  
                    
                case '2'://Pagos
                    $from = $email;
                    $to = 'normalizacion@credumontt.cl';  // please change this email id
                    $subject = $name.' desde credumontt.cl. Asunto: '.$asunto2;
    
                    $body = "$name, de la $region, comuna de $comuna, tiene el siguiente mensaje para Credumontt:\n\n $message \n\nFavor contactar a:\n\nFono: $telefono\nCorreo:  $email\n\nEnviado desde www.credumontt.cl";
        
                    $s= "=?utf-8?b?".base64_encode($s)."?=";
                    $headers = "MIME-Version: 1.0\r\n";
                    $headers.= "From: =?utf-8?b?".base64_encode($name)."?= ".$from."\r\n";
                    $headers.= "Content-Type: text/plain;charset=utf-8\r\n";
                    $headers.= "Reply-To: $reply\r\n";  
                    $headers.= "X-Mailer: PHP/" . phpversion();
                    
                    //send the email
                    $result = '';  
                    
                    break; 
                    
                case '3'://Solicitud de creditos
                    $from = $email;
                    $to = 'creditos@credumontt.cl';  // please change this email id
                    $subject = $name.' desde credumontt.cl. Asunto: '.$asunto2;
    
                    $body = "$name, de la $region, comuna de $comuna, tiene el siguiente mensaje para Credumontt:\n\n $message \n\nFavor contactar a:\n\nFono: $telefono\nCorreo:  $email\n\nEnviado desde www.credumontt.cl";
        
                    $s= "=?utf-8?b?".base64_encode($s)."?=";
                    $headers = "MIME-Version: 1.0\r\n";
                    $headers.= "From: =?utf-8?b?".base64_encode($name)."?= ".$from."\r\n";
                    $headers.= "Content-Type: text/plain;charset=utf-8\r\n";
                    $headers.= "Reply-To: $reply\r\n";  
                    $headers.= "X-Mailer: PHP/" . phpversion();
                    
                    //send the email
                    $result = '';  
                    
                    break;  

                case '4'://Convenios
                    $from = $email;
                    $to = 'info@credumontt.cl';  // please change this email id
                    $subject = $name.' desde credumontt.cl. Asunto: '.$asunto2;
    
                    $body = "$name, de la $region, comuna de $comuna, tiene el siguiente mensaje para Credumontt:\n\n $message \n\nFavor contactar a:\n\nFono: $telefono\nCorreo:  $email\n\nEnviado desde www.credumontt.cl";
        
                    $s= "=?utf-8?b?".base64_encode($s)."?=";
                    $headers = "MIME-Version: 1.0\r\n";
                    $headers.= "From: =?utf-8?b?".base64_encode($name)."?= ".$from."\r\n";
                    $headers.= "Content-Type: text/plain;charset=utf-8\r\n";
                    $headers.= "Reply-To: $reply\r\n";  
                    $headers.= "X-Mailer: PHP/" . phpversion();
                    
                    //send the email
                    $result = '';  
                    
                    break;     

                case '5'://Hacerse socio
                    $from = $email;
                    $to = 'info@credumontt.cl';  // please change this email id
                    $subject = $name.' desde credumontt.cl. Asunto: '.$asunto2;
    
                    $body = "$name, de la $region, comuna de $comuna, tiene el siguiente mensaje para Credumontt:\n\n $message \n\nFavor contactar a:\n\nFono: $telefono\nCorreo:  $email\n\nEnviado desde www.credumontt.cl";
        
                    $s= "=?utf-8?b?".base64_encode($s)."?=";
                    $headers = "MIME-Version: 1.0\r\n";
                    $headers.= "From: =?utf-8?b?".base64_encode($name)."?= ".$from."\r\n";
                    $headers.= "Content-Type: text/plain;charset=utf-8\r\n";
                    $headers.= "Reply-To: $reply\r\n";  
                    $headers.= "X-Mailer: PHP/" . phpversion();
                    
                    //send the email
                    $result = '';  
                    
                    break;    
                    
                case '6'://Otros
                    $from = $email;
                    $to = 'info@credumontt.cl';  // please change this email id
                    $subject = $name.' desde credumontt.cl. Asunto: '.$asunto2;
    
                    $body = "$name, de la $region, comuna de $comuna, tiene el siguiente mensaje para Credumontt:\n\n $message \n\nFavor contactar a:\n\nFono: $telefono\nCorreo:  $email\n\nEnviado desde www.credumontt.cl";
        
                    $s= "=?utf-8?b?".base64_encode($s)."?=";
                    $headers = "MIME-Version: 1.0\r\n";
                    $headers.= "From: =?utf-8?b?".base64_encode($name)."?= ".$from."\r\n";
                    $headers.= "Content-Type: text/plain;charset=utf-8\r\n";
                    $headers.= "Reply-To: $reply\r\n";  
                    $headers.= "X-Mailer: PHP/" . phpversion();
                    
                    //send the email
                    $result = '';  
                    
                    break;  
            }

            break;    
        case 'Región de Coquimbo':
            $from = $email;
            $to = 'serena@credumontt.cl, laserena@credumontt.cl';  // please change this email id
            $subject = $name.' desde credumontt.cl. Asunto: '.$asunto2;
    
            $body = "$name, de la $region, comuna de $comuna, tiene el siguiente mensaje para Credumontt:\n\n $message \n\nFavor contactar a:\n\nFono: $telefono\nCorreo:  $email\n\nEnviado desde www.credumontt.cl";

            $s= "=?utf-8?b?".base64_encode($s)."?=";
            $headers = "MIME-Version: 1.0\r\n";
            $headers.= "From: =?utf-8?b?".base64_encode($name)."?= ".$from."\r\n";
            $headers.= "Content-Type: text/plain;charset=utf-8\r\n";
            $headers.= "Reply-To: $reply\r\n";  
            $headers.= "X-Mailer: PHP/" . phpversion();
            
            //send the email
            $result = '';  
            
            break;

        case 'Región de Valparaíso':
            $from = $email;
            $to = 'vinadelmar@credumontt.cl';  // please change this email id
            $subject = $name.' desde credumontt.cl. Asunto: '.$asunto2;
    
            $body = "$name, de la $region, comuna de $comuna, tiene el siguiente mensaje para Credumontt:\n\n $message \n\nFavor contactar a:\n\nFono: $telefono\nCorreo:  $email\n\nEnviado desde www.credumontt.cl";

            $s= "=?utf-8?b?".base64_encode($s)."?=";
            $headers = "MIME-Version: 1.0\r\n";
            $headers.= "From: =?utf-8?b?".base64_encode($name)."?= ".$from."\r\n";
            $headers.= "Content-Type: text/plain;charset=utf-8\r\n";
            $headers.= "Reply-To: $reply\r\n";  
            $headers.= "X-Mailer: PHP/" . phpversion();
            
            //send the email
            $result = '';  
            
            break;
            
        case 'Región del Maule':
            $from = $email;
            $to = 'cauquenes@credumontt.cl';  // please change this email id
            $subject = $name.' desde credumontt.cl. Asunto: '.$asunto2;
    
            $body = "$name, de la $region, comuna de $comuna, tiene el siguiente mensaje para Credumontt:\n\n $message \n\nFavor contactar a:\n\nFono: $telefono\nCorreo:  $email\n\nEnviado desde www.credumontt.cl";

            $s= "=?utf-8?b?".base64_encode($s)."?=";
            $headers = "MIME-Version: 1.0\r\n";
            $headers.= "From: =?utf-8?b?".base64_encode($name)."?= ".$from."\r\n";
            $headers.= "Content-Type: text/plain;charset=utf-8\r\n";
            $headers.= "Reply-To: $reply\r\n";  
            $headers.= "X-Mailer: PHP/" . phpversion();
            
            //send the email
            $result = '';  
            
            break;    
                
        case 'Región del Biobío':
            
            switch($comuna){
                //Concepción
                case 'Concepción': 
                case 'Coronel': 
                case 'Chiguayante': 
                case 'Hualqui': 
                case 'Lota': 
                case 'Penco': 
                case 'San Pedro de la Paz': 
                case 'Talcahuano': 
                case 'Tomé': 
                case 'Hualpén': 
                case 'Lebu': 
                case 'Arauco': 
                case 'Cañete': 
                case 'Contulmo': 
                case 'Curanilahue': 
                case 'Tirúa': 
                case 'Cobquecura': 
                case 'Coelemu': 
                case 'Coihueco': 
                case 'Florida': 
                case 'Santa Juana': 
                case 'Los Álamos':

                    $from = $email;
                    $to = 'concepcion@credumontt.cl';  // please change this email id
                    $subject = $name.' desde credumontt.cl. Asunto: '.$asunto2;
                                                    
                    $body = "$name, de la $region, comuna de $comuna, tiene el siguiente mensaje para Credumontt:\n\n $message \n\nFavor contactar a:\n\nFono: $telefono\nCorreo:  $email\n\nEnviado desde www.credumontt.cl";
        
                    $s= "=?utf-8?b?".base64_encode($s)."?=";
                    $headers = "MIME-Version: 1.0\r\n";
                    $headers.= "From: =?utf-8?b?".base64_encode($name)."?= ".$from."\r\n";
                    $headers.= "Content-Type: text/plain;charset=utf-8\r\n";
                    $headers.= "Reply-To: $reply\r\n";  
                    $headers.= "X-Mailer: PHP/" . phpversion();
                    
                    //send the email
                    $result = '';  
                    
                    break;   
                
                //Los Angeles
                case 'Los Ángeles': 
                case 'Quilaco': 
                case 'Laja': 
                case 'Santa Bárbara': 
                case 'Mulchén': 
                case 'Antuco': 
                case 'Nacimiento': 
                case 'Tucapel': 
                case 'Yumbel': 
                case 'Alto Biobío': 
                case 'Negrete': 
                case 'Quilleco': 
                case 'San Rosendo':
                    
                    $from = $email;
                    $to = 'chillan@credumontt.cl';  // please change this email id
                    $subject = $name.' desde credumontt.cl. Asunto: '.$asunto2;
    
                    $body = "$name, de la $region, comuna de $comuna, tiene el siguiente mensaje para Credumontt:\n\n $message \n\nFavor contactar a:\n\nFono: $telefono\nCorreo:  $email\n\nEnviado desde www.credumontt.cl";
        
                    $s= "=?utf-8?b?".base64_encode($s)."?=";
                    $headers = "MIME-Version: 1.0\r\n";
                    $headers.= "From: =?utf-8?b?".base64_encode($name)."?= ".$from."\r\n";
                    $headers.= "Content-Type: text/plain;charset=utf-8\r\n";
                    $headers.= "Reply-To: $reply\r\n";  
                    $headers.= "X-Mailer: PHP/" . phpversion();
                    
                    //send the email
                    $result = '';  
                    
                    break; 
                    
                //Chillán
                case 'Chillán': 
                case 'Yungay': 
                case 'Chillán Viejo': 
                case 'Cabrero': 
                case 'Quillón': 
                case 'San Ignacio': 
                case 'Ñiquén': 
                case 'San Nicolás': 
                case 'Ninhue': 
                case 'San Carlos': 
                case 'Bulnes': 
                case 'El Carmen': 
                case 'Pemuco': 
                case 'Treguaco': 
                case 'San Fabián': 
                case 'Ránquil': 
                case 'Quirihue': 
                case 'Portezuelo': 
                case 'Pinto':
                
                    $from = $email;
                    $to = 'chillan@credumontt.cl';  // please change this email id
                    $subject = $name.' desde credumontt.cl. Asunto: '.$asunto2;
    
                    $body = "$name, de la $region, comuna de $comuna, tiene el siguiente mensaje para Credumontt:\n\n $message \n\nFavor contactar a:\n\nFono: $telefono\nCorreo:  $email\n\nEnviado desde www.credumontt.cl";
        
                    $s= "=?utf-8?b?".base64_encode($s)."?=";
                    $headers = "MIME-Version: 1.0\r\n";
                    $headers.= "From: =?utf-8?b?".base64_encode($name)."?= ".$from."\r\n";
                    $headers.= "Content-Type: text/plain;charset=utf-8\r\n";
                    $headers.= "Reply-To: $reply\r\n";  
                    $headers.= "X-Mailer: PHP/" . phpversion();
                    
                    //send the email
                    $result = '';  
                    
                    break; 
                
            }
            break;
            
        case 'Región de la Araucanía':
            $from = $email;
            $to = 'temuco@credumontt.cl';  // please change this email id
            $subject = $name.' desde credumontt.cl. Asunto: '.$asunto2;
    
            $body = "$name, de la $region, comuna de $comuna, tiene el siguiente mensaje para Credumontt:\n\n $message \n\nFavor contactar a:\n\nFono: $telefono\nCorreo:  $email\n\nEnviado desde www.credumontt.cl";

            $s= "=?utf-8?b?".base64_encode($s)."?=";
            $headers = "MIME-Version: 1.0\r\n";
            $headers.= "From: =?utf-8?b?".base64_encode($name)."?= ".$from."\r\n";
            $headers.= "Content-Type: text/plain;charset=utf-8\r\n";
            $headers.= "Reply-To: $reply\r\n";  
            $headers.= "X-Mailer: PHP/" . phpversion();
            
            //send the email
            $result = '';  
            
            break;
                
        default:
            

                //Se debe modificar para reenviar de forma automatica
                $from = $email;
                $to = 'info@credumontt.cl';  // please change this email id
                $subject = $name.' desde credumontt.cl. Asunto: '.$asunto2;
    
                $body = "$name, de la $region, comuna de $comuna, tiene el siguiente mensaje para Credumontt:\n\n $message \n\nFavor contactar a:\n\nFono: $telefono\nCorreo:  $email\n\nEnviado desde www.credumontt.cl";
    
                $s= "=?utf-8?b?".base64_encode($s)."?=";
                $headers = "MIME-Version: 1.0\r\n";
                $headers.= "From: =?utf-8?b?".base64_encode($name)."?= ".$from."\r\n";
                $headers.= "Content-Type: text/plain;charset=utf-8\r\n";
                $headers.= "Reply-To: $reply\r\n";  
                $headers.= "X-Mailer: PHP/" . phpversion();
                
                //send the email
                $result = '';  
                
                break;
              
       }


	//send the email
	$result = '';
	if (mail ($to, $subject, $body, $headers)) {
		$result .= '<div class="alert alert-success alert-dismissible" role="alert">';
 		$result .= '<a href=\" http://web.credumontt.cl\"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></a><br/>';
	echo $result .= 'Gracias por conactarnos, en breve le responderemos.';
		$result .= 'Se est&aacute; redirigiendo a la p&aacute;gina principal, si la web no carga haga click <a href=" http://web.credumontt.cl¥">aqu&iacute;.</a>';
		$result .= '</div>';

		echo $result;
		die();
	}

	$result = '';
	$result .= '<div class="alert alert-danger alert-dismissible" role="alert">';
	$result .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
	$result .= 'Hubo un error en el envio, refresque la web e intente de nuevo.';
	$result .= '</div>';

	echo $result;
	
	
?>
  </section>
   </main>
  </body>
  
  </html>