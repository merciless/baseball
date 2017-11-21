<?php
require_once( 'classes/class.database.php' );

//header('Content-Type: text/html; charset=utf-8');

/*Important Variables to define, if the variable know = 1 the medium section will not appear*/
$acc_bal = '0';
$agen = 'SUAGM';
$code = isset( $_GET[ 'code' ] ) ? $_GET[ 'code' ] : ''; //campaña
$camp = isset( $_GET[ 'camp' ] ) ? $_GET[ 'camp' ] : ''; //campaña
$inst = isset( $_GET[ 'inst' ] ) ? $_GET[ 'inst' ] : ''; //institucion
$medium = isset( $_GET[ 'med' ] ) ? $_GET[ 'med' ] : ''; //Medio utilizado facebook, twitter, etc...
$know = isset( $_GET[ 'know' ] ) ? $_GET[ 'know' ] : ''; //prender o apagar
$land = isset( $_GET[ 'land' ] ) ? $_GET[ 'land' ] : ''; //landing
$camp_code = isset( $_GET[ 'cc' ] ) ? $_GET[ 'cc' ] : ''; //codigo campaña
/*Ends here the variables for now*/

?>
<!DOCTYPE HTML>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Start of the headers for CoffeeCup Web Form Builder -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="stylesheet" type="text/css" href="css/default.css" id="theme"/>
	<style type="text/css">
		body {
			margin-left: 0px;
			margin-top: 0px;
			margin-right: 0px;
			margin-bottom: 0px;
		}
	</style>
	<!-- End of the headers for CoffeeCup Web Form Builder -->
	<title>Formulario de la RED - Prospecto</title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script>
		function Know() {

			var know = '<?php print $know; ?>';

			if ( know == '1' ) {
				$( '#knowing' ).hide( 'slow' );
			} else {
				$( '#knowing' ).show( 'slow' );
			}
		}
	</script>
	<script>
		$( document ).ready( function () {


			$( '#fb-submit-button' ).click( function () {

				/*if ( document.getElementById( "type" ).checked ) {
					document.getElementById( 'typeHidden' ).disabled = true;
				}*/
				<!--		Validation-->	
				var n = document.forms[ "myForm" ][ "name" ].value;
				var l = document.forms[ "myForm" ][ "lastname" ].value;
				//var ll = document.forms["myForm"]["sec_lastname"].value;
				//var i = document.forms["myForm"]["institution"].value;
				//var c = document.forms["myForm"]["centro"].value;
				var t = document.forms[ "myForm" ][ "telefono" ].value;
				var e = document.forms[ "myForm" ][ "email" ].value;
				//var a = document.forms["myForm"]["address"].value;
				//var p = document.forms["myForm"]["country"].value;
				//var pu = document.forms["myForm"]["pueblos"].value;
				//var z = document.forms["myForm"]["zipcode"].value;
				//var y = document.forms["myForm"]["type"].value;


				if ( n == null || n == "" ) {
					alert( "Favor de completar todos los campos de información. Indique su nombre." );
					return false;
				}

				if ( l == null || l == "" ) {
					alert( "Favor de completar todos los campos de información. Indique su apellido paterno." );
					return false;
				}

				/*if (ll == null || ll == "") {
					alert("Favor de completar todos los campos de información. Indique su apellido materno.");
					return false;
				}*/

				/*	if (i == null || i == "") {
						alert("Favor de completar todos los campos de información. Indique su institución de preferencia.");
						return false;
					}*/
				/*var c = document.getElementById("centro").selected;
				if (c == null || c == "") {
					alert("Favor de completar todos los campos de información. Indique su centro de preferencia.");
					return false;
				}*/

				if ( isNaN( t ) || t == "" ) {
					alert( "Favor de completar todos los campos de información. Indique su telefono, solo numeros." );
					return false;
				}

				if ( e == null || e == "" ) {
					alert( "Favor de completar todos los campos de información. Indique su correo electrónico." );
					return false;
				}

				/*	if (a == null || a == "") {
						alert("Favor de completar todos los campos de información. Indique su dirección.");
						return false;
					}*/

				/*if (p == null || p == "") {
					alert("Favor de completar todos los campos de información. Indique su país de procedencia.");
					return false;
				}*/

				/*if (pu == null || pu == "") {
					alert("Favor de completar todos los campos de información. Indique su pueblo de procedencia.");
					return false;
				}*/

				/*if (isNaN(z) || z == "") {
					alert("Favor de completar todos los campos de información. Indique su codigo postal.");
					return false;
				}*/

				/*if (y == null || y == "") {
					alert("Favor de completar todos los campos de información. Indique tipo de Estudiante.");
					return false;
				}
			
				var gz = $('input[name="institution"]:checked').val();
				if (gz == null || gz == "") {
					alert("Favor de completar todos los campos de información. Indique donde desea estudiar.");
					return false;
				}*/


				<!--End VAlidation	-->

				$.ajax( {
					url: 'process.php',
					dataType: 'text',
					type: 'POST',
					//contentType: 'application/x-www-form-urlencoded',
					data: $( "#docContainer" ).serialize(),
					success: Dale(),
					error: function ( e ) {
						console.log( e )
					}

				} ); // Ajax Call

			} )
		} );
	</script>
	<script>
		function Dale() {
			FLOOD1( 'gracias', 'suagm00' );
			//alert("Convertion true!");
			$( '#theForm' ).hide( 'slow' );
			$( "#thankyou" ).show( 'slow' );
			setInterval( function () {
				window.top.location.href = "http://umet.suagm.edu/";;
			}, 7000 );
			//fbq('track', 'CompleteRegistration');

		}
	</script>

<script type="text/javascript" id="DoubleClickFloodlightTag">
//<![CDATA[
function FLOOD1(type, cat) {
        var axel = Math.random()+"";
        var a = axel * 10000000000000000;
        var flDiv=document.body.appendChild(document.createElement("div"));
        flDiv.setAttribute("id","DCLK_FLDiv1");
        flDiv.style.position="absolute";
        flDiv.style.top="0";
        flDiv.style.left="0";
        flDiv.style.width="1px";
        flDiv.style.height="1px";
        flDiv.style.display="none";
        flDiv.innerHTML='<iframe id="DCLK_FLIframe1" src="https://6837103.fls.doubleclick.net/activityi;src=6837103;type=' + type + ';cat=' + cat + ';ord=' + a + '?" width="1" height="1" frameborder="0"><\/iframe>';
}
//]]>
</script>

</head>

<body onLoad="Know();">
	<div align="center">
		<h1 id="thankyou" style="color:#fff; font-family: calibri; display:none; margin-top:50px;">Muchas gracias por enviarnos su informaci&oacute;n, <br/>
    nos estaremos comunicando con<br/>
    usted lo más pronto posible.</h1>
	</div>
	<div id="theForm">
		<form id="docContainer" name="myForm" onsubmit="return validateForm()" method="post" accept-charset="utf-8" action="process.php">
			<div id="section1" class="section">
				<div id="column1" class="column ui-sortable">
					<div style="display:none; min-height:200px;" id="fb_confirm_inline"> </div>
					<div style="display:none;" id="fb_error_report"> </div>
					<div id="item8" class="fb-item fb-50-item-column">
						<div class="fb-grouplabel">
							<label id="item8_label_0" style="display: inline;">Nombre</label> *
						</div>
						<div class="fb-input-box">
							<input type="text" id="name" maxlength="30" name="name" placeholder="Nombre"/>
						</div>
					</div>
					<div id="item3" class="fb-item fb-50-item-column">
						<div class="fb-grouplabel">
							<label id="item11_label_0" style="display: inline;">Apellido</label> *
						</div>
						<div class="fb-input-box">
							<input type="text" id="item11_text_2" maxlength="30" placeholder="Apellido Paterno" name="lastname"/>
						</div>
					</div>
					<div id="item12" class="fb-item fb-50-item-column" style="opacity: 1;">
						<div class="fb-grouplabel">
							<label id="item12_label_0" style="display: inline;">Tel&eacute;fono </label>
							<i>sin guiones ej.(7875552222)</i> *</div>
						<div class="fb-input-number">
							<input type="text" name="telefono" placeholder="Tel&eacute;fono o Celular" maxlength="12"/>
						</div>
					</div>
					<div id="item" class="fb-item fb-50-item-column" style="opacity: 1;">
						<div class="fb-grouplabel">
							<label id="item13_label_0" style="display: inline;">Correo electr&oacute;nico </label> *
						</div>
						<div class="fb-input-number">
							<input type="text" id="item11_text_3" maxlength="54" placeholder="Email" name="email"/>
						</div>
					</div>
					<div id="item9" class="fb-item fb-50-item-column">
						<div class="fb-grouplabel" id="centro_univ">
							<label id="item5_label_0" style="display: inline;"> Centro Universitario</label>*</div>

						<div class="UM">
							<select name="centro">
								<option value="" selected>Escoge:</option>
								<option value="Cupey 4">Cupey</option>
								<option value="Aguadilla G">Aguadilla</option>
								<option value="Bayamon L">Bayamon</option>
								<option value="Jayuya P">Jayuya</option>
								<option value="Comerio C">Comerio</option>
							</select>
						</div>
					</div>


					<div id="knowing" class="fb-item fb-three-column fb-100-item-column">
						<div class="fb-grouplabel">
							<label id="item2_label_0" style="display: inline;" for="textarea2"><span lang="ES-PR">Grado de inter&eacute;s</span>:</label>
						</div>
						<div class="fb-radio">
							<label id="item2_0_label">
							  <input type="radio" id="item2_0_radio" data-hint="" name="comm"  value="Certificados T&eacute;cnicos" />
							  <span class="fb-fieldlabel" id="item2_0_span">Certificados T&eacute;cnicos</span></label>
						



							<label id="item2_1_label">
							  <input type="radio" id="item2_1_radio" name="comm"  value="Grados Asociados" />
							  <span class="fb-fieldlabel" id="item2_1_span">Grados Asociados</span></label>
						



							<label id="item2_2_label">
							  <input type="radio" id="item2_2_radio" name="comm"  value="Bachilleratos" />
							  <span class="fb-fieldlabel" id="item2_2_span">Bachilleratos</span></label>
						



							<label id="item2_5_label">
							  <input type="radio" id="item2_5_radio"  name="comm" value="Maestrías" />
							  <span class="fb-fieldlabel" id="item2_5_span">Maestrías</span></label>
						


							<label id="item2_5_label">
							  <input type="radio" id="item2_5_radio"  name="comm" value="Programa Ahora" />
							  <span class="fb-fieldlabel" id="item2_5_span">Programa AHORA </span></label>
							  
							  <label id="item2_5_label">
							  <input type="radio" id="item2_5_radio"  name="comm" value="Doctorado" />
							  <span class="fb-fieldlabel" id="item2_5_span">Doctorado</span></label>
						

						</div>
						<div id="item2" class="fb-item fb-three-column fb-100-item-column" style="opacity: 1;">
							<div class="fb-grouplabel">
								<label id="item2_label_0" style="display: inline;" for="textarea"><span lang="ES-PR">Programa de inter&eacute;s</span>:</label>
								<textarea name="comm_sec" id="textarea" placeholder="Comentario"></textarea>
							</div>
						</div>
					</div>

				</div>
				<div id="fb-submit-button-div" class="fb-footer" style="min-height: 1px;" align="right">

					<input type="button" class="fb-button-special fb-submit-design" id="fb-submit-button" data-regular="" style="background-image: url(images/btn_submit.png);" value="Someter"/>
				</div>

				<!--<input id="typeHidden" type="hidden" value="No" name="type">-->
				<input type="hidden" name="acc_bal" value="<?php print $acc_bal; ?>"/>
				<input type="hidden" name="agen" value="<?php print $agen; ?>"/>
				<!-- temp -->
				<input type="hidden" name="camp" value="<?php print $camp; ?>"/>
				<input type="hidden" name="institution" value="<?php print $inst; ?>"/>
				<input type="hidden" name="med" value="<?php print $medium; ?>"/>
				<input type="hidden" name="code" value="<?php print $code; ?>"/>
				<input type="hidden" name="land" value="<?php print $land; ?>"/>
				<input type="hidden" name="camp_code" value="<?php print $camp_code; ?>"/>
		</form>
		</div>
		<!-- End of the body content for CoffeeCup Web Form Builder -->

</body>

</html>