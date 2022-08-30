<html lang="es-CL" dir="ltr">
    <head>
    <meta charset="utf-8">
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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
    <link href="assets/lib/animate.css/animate.css" rel="stylesheet">
    <link href="assets/lib/components-font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/lib/et-line-font/et-line-font.css" rel="stylesheet">
    <link href="assets/lib/flexslider/flexslider.css" rel="stylesheet">
    <link href="assets/lib/owl.carousel/dist/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/lib/owl.carousel/dist/assets/owl.theme.default.min.css" rel="stylesheet">
    <link href="assets/lib/magnific-popup/dist/magnific-popup.css" rel="stylesheet">
    <link href="assets/lib/simple-text-rotator/simpletextrotator.css" rel="stylesheet">
    <!-- Main stylesheet and color file-->
    <link href="assets/css/style.css" rel="stylesheet">
    <link id="color-scheme" href="assets/css/colors/default.css" rel="stylesheet">

    <!--
    Scroll
    ==============================================

    -->

  </head>
<body>
<main>
<section class="home-section home-parallax home-fade home-full-height" id="home">
<?php
    
    $errors = array();

	// Check if name has been entered
	if (!isset($_POST['cantidad'])) {
		$errors['cantidad'] = 'Por Favor escriba un monto';
	}

	
	if (!isset($_POST['meses'])) {
		$errors['meses'] = 'Debe indicar los meses';
	}

    if (!isset($_POST['credito'])) {
        $errors['credito'] = "";
    }   

	$errorOutput = '';

	if(!empty($errors)) {

		$errorOutput .= '<div class="col-sm-8 col-sm-offset-4 col-md-8">
            <h3>Resultados de la Simulacion</h3><br><br><br>

                <div class="alert alert alert-danger" style="font-size: 14px;" role="alert"> <strong>INFORMACIÓN:</strong> Debe seleccion el tipo de credito</div>';
    

		foreach ($errors as $key => $value) {
			$errorOutput .= $value;
		}

	;

		echo $errorOutput;
		die();
	}
            
	//Valores a simular
    $valor = $_POST['cantidad'];
	$periodo = $_POST['meses'];
    $credito = $_POST['credito'];

  

    if ($credito == "consumo") {
       
        if ($valor == "" && $periodo == "") {
            echo '<div class="col-sm-8 col-sm-offset-4 col-md-8">
               <h3>Resultados de la Simulacion</h3><br><br><br>

                <div class="alert alert alert-danger" style="font-size: 14px;" role="alert"> <strong>INFORMACIÓN:</strong> Debe ingresar todos los datos solicitados</div>
                <div class="alert alert alert-danger" style="font-size: 14px;" role="alert"> <strong>INFORMACIÓN:</strong> El valor minimo de prestamo es de 100.000 y el maximo de 1.000.000</div>
                <div class="alert alert alert-danger" style="font-size: 14px;" role="alert"> <strong>INFORMACIÓN:</strong> Debe indicar entre 1 y 24 cuotas</div>
                <p class="help-block text-danger"></p>';
            
            die();
        }

        else if($valor < 100000 || $valor > 1000000) {

            if ($periodo == "" || $periodo < 1 || $periodo > 24) {
                echo '<div class="col-sm-8 col-sm-offset-4 col-md-8">
                <h3>Resultados de la Simulacion</h3><br><br><br>
                    
                    <div class="alert alert alert-danger" style="font-size: 14px;" role="alert"> <strong>INFORMACIÓN:</strong> El valor minimo de prestamo es de 30.000 y el maximo de 1.000.000</div>
                    <div class="alert alert alert-danger" style="font-size: 14px;" role="alert"> <strong>INFORMACIÓN:</strong> Debe indicar entre 1 y 24 cuotas</div>
                    <p class="help-block text-danger"></p>';

                
            }    
            else if ($periodo >= 1 || $periodo <= 24) {

                echo '<div class="col-sm-8 col-sm-offset-4 col-md-8">
                <h3>Resultados de la Simulacion</h3><br><br><br>
                    
                    <div class="alert alert alert-danger" style="font-size: 14px;" role="alert"> <strong>INFORMACIÓN:</strong> El valor minimo de prestamo es de 100.000 y el maximo de 1.000.000</div>
                    <p class="help-block text-danger"></p>';

                
            }
            die();
        }

        else if ($valor >= 100000 || $valor <= 1000000) {

            if ($periodo == "" || $periodo < 1 || $periodo > 24) {

                echo '<div class="col-sm-8 col-sm-offset-4 col-md-8">
                <h3>Resultados de la Simulacion</h3><br><br><br>
                    
                    <div class="alert alert alert-danger" style="font-size: 14px;" role="alert"> <strong>INFORMACIÓN:</strong> Debe indicar entre 1 y 24 cuotas</div>
                    <p class="help-block text-danger"></p>';

            }

            else {
                $tasa = 27.6;//TASA PUEDE VARIAR DE ACUERDO A LOS SOLICITADOS
                $anual = $tasa/100;
                $mes = round(($anual/12), 6);

                $cuota = $valor / ((pow((1+$mes), $periodo)-1)/($mes*pow((1+$mes), $periodo))); 

                $cpm = ($cuota/($valor/1000000));
                $cuota = number_format($cuota, 0, '.','.');
                $valor = number_format($valor, 0, '.','.');

                echo '<div class="col-sm-8 col-sm-offset-4 col-md-8">
                    <h3>Resultados de la Simulacion</h3><br>
                    <form id="respSimulador" name="respSimuladorForm">
                      <div class="form-group">
                        <h4>Monto del crédito</h4>
                        <input class="form-control" style="font-size: 18px;" type="text" id="cantidad" name="cantidad" value="$ ' . $valor . ' ">
                        <p class="help-block text-danger"></p>
                      </div>
                       <div class="form-group">
                        <h4>Valor Cuota Mensual</h4>
                        <input class="form-control" type="text" id="interes_mensual" name="interes" style="font-size: 18px;" value="$ ' .$cuota. ' ">
                      </div>
                      <div class="form-group">
                        <h4>Plazo en meses</h4>
                        <input class="form-control" type="text" id="meses" name="meses" style="font-size: 18px;" value=" ' . $periodo . ' ">
                        <p class="help-block text-danger"></p>
                      </div>
                      <div class="form-group">
                        <h4>Tasa Anual**</h4>
                        <input class="form-control" type="text" id="interes_anual" name="interes" style="font-size: 18px;" value=" ' . $tasa . '%">
                        <p class="help-block text-danger"></p>
                      </div>
                      <div class="form-group">
                        <h4>Tasa Mensual**</h4>
                        <input class="form-control" type="text" id="interes_mensual" name="interes" style="font-size: 18px;" value=" ' .round(($tasa/12), 2). '%">
                        <p class="help-block text-danger"></p>
                      </div>
                     
                     *El valor de la cuota mensual es solo referencial, no incluye cuota social ni gastos administrativos <br> Para más información consulte con ejecutivo.
                     ** El valor de la tasa esta sujeta a cambios, por lo que puede variar al momento de cursar el crédito. 
                    </form>
                     
                    </div>';                  
            }    

            die();
        }

    }
    
    else if ($credito == "urgencia") {
        if ($valor == "" && $periodo == "") {
            echo '<div class="col-sm-8 col-sm-offset-4 col-md-8">
            <h3>Resultados de la Simulacion</h3><br><br><br>

                <div class="alert alert alert-danger" style="font-size: 14px;" role="alert"> <strong>INFORMACIÓN:</strong> Debe ingresar todos los datos solicitados</div>
                <div class="alert alert alert-danger" style="font-size: 14px;" role="alert"> <strong>INFORMACIÓN:</strong> El valor minimo de prestamo es de 100.000 y el maximo de 200.000</div>
                <div class="alert alert alert-danger" style="font-size: 14px;" role="alert"> <strong>INFORMACIÓN:</strong> Debe indicar entre 1 y 8 cuotas</div>
                <p class="help-block text-danger"></p>';
            
            die();
        }


        else if($valor < 100000 || $valor > 200000) {

            if ($periodo == "" || $periodo < 1 || $periodo > 8) {
                echo '<div class="col-sm-8 col-sm-offset-4 col-md-8">
                <h3>Resultados de la Simulacion</h3><br><br><br>
                    
                    <div class="alert alert alert-danger" style="font-size: 14px;" role="alert"> <strong>INFORMACIÓN:</strong> El valor minimo de prestamo es de 100.000 y el maximo de 200.000</div>
                    <div class="alert alert alert-danger" style="font-size: 14px;" role="alert"> <strong>INFORMACIÓN:</strong> Debe indicar entre 1 y 8 cuotas</div>
                    <p class="help-block text-danger"></p>';

                
            }    
            else if ($periodo >= 1 || $periodo <= 8) {

                echo '<div class="col-sm-8 col-sm-offset-4 col-md-8">
                <h3>Resultados de la Simulacion</h3><br><br><br>
                    
                    <div class="alert alert alert-danger" style="font-size: 14px;" role="alert"> <strong>INFORMACIÓN:</strong> El valor minimo de prestamo es de 100.000 y el maximo de 200.000</div>
                    <p class="help-block text-danger"></p>';

                
            }
            die();
        }

        else if ($valor >= 100000 || $valor <= 200000) {

            if ($periodo == "" || $periodo < 1 || $periodo > 8) {

                echo '<div class="col-sm-8 col-sm-offset-4 col-md-8">
                <h3>Resultados de la Simulacion</h3><br><br><br>
                    
                    <div class="alert alert alert-danger" style="font-size: 14px;" role="alert"> <strong>INFORMACIÓN:</strong> Debe indicar entre 1 y 8 cuotas</div>
                    <p class="help-block text-danger"></p>';

            }

            else {

                $tasa = 30;//TASA PUEDE VARIAR DE ACUERDO A LOS SOLICITADOS
                $anual = $tasa/100;
                $mes = round(($anual/12), 6);

                $cuota = $valor / ((pow((1+$mes), $periodo)-1)/($mes*pow((1+$mes), $periodo))); 

                $cpm = ($cuota/($valor/1000000));
                $cuota = number_format($cuota, 0, '.','.');
                $valor = number_format($valor, 0, '.','.');

                echo '<div class="col-sm-8 col-sm-offset-4 col-md-8">
                    <h3>Resultados de la Simulacion</h3><br>
                    <form id="respSimulador" name="respSimuladorForm">
                      <div class="form-group">
                        <h4>Monto del crédito</h4>
                        <input class="form-control" style="font-size: 18px;" type="text" id="cantidad" name="cantidad" value="$ ' . $valor . ' ">
                        <p class="help-block text-danger"></p>
                      </div>
                      <div class="form-group">
                        <h4>Plazo en meses</h4>
                        <input class="form-control" type="text" id="meses" name="meses" style="font-size: 18px;" value=" ' . $periodo . ' ">
                        <p class="help-block text-danger"></p>
                      </div>
                      <div class="form-group">
                        <h4>Tasa Anual</h4>
                        <input class="form-control" type="text" id="interes_anual" name="interes" style="font-size: 18px;" value=" ' . $tasa . '% ">
                        <p class="help-block text-danger"></p>
                      </div>
                      <div class="form-group">
                        <h4>Tasa Mensual</h4>
                        <input class="form-control" type="text" id="interes_mensual" name="interes" style="font-size: 18px;" value=" ' .round(($tasa/12), 2). '% ">
                        <p class="help-block text-danger"></p>
                      </div>
                      <div class="form-group">
                        <h4>Valor Cuota Mensual</h4>
                        <input class="form-control" type="text" id="interes_mensual" name="interes" style="font-size: 18px;" value="$ ' .$cuota. ' ">
                     
                      </div>
                     *El valor de la cuota mensual es solo referencial, no incluye cuota social ni gastos administrativos <br> Para más información consulte con ejecutivo
                    </form>
                     
                    </div>'; 
                }    

            die();
        }
    }    
    
        


 /*  " Valor: $' .$valor. '<br/>
    Tasa Anual: ' .$tasa. '%<br/>
    Tasa Mensual: ' .round(($tasa/12), 2). '%<br/>
    Cuota: $'.$cuota. '<br />
    Cuota por Millon: $'.number_format($cpm, 0, '.', ',');
*/
	
?>
  </section>
   </main>
  </body>
  
  </html>