<!doctype>
<html>
<head>
<meta charset="UTF-8">
<title>.::Display::.</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>
  $(function() {
	$( "#datepicker" ).datepicker({
		dateFormat: "yy-mm-dd"
		});
	
	$( "#datepicker_sec" ).datepicker({
		dateFormat: "yy-mm-dd"
		});;
  });
  </script>
<script>
function Detect(){
	valor = document.getElementsByName("medio")[1].value;
	<?php $medio = "<script>document.write(valor)</script>"; ?>
	//alert(valor);

}
function DetectSecond(){
	valorSec = document.getElementsByName("camp")[1].value;
	<?php $camp = "<script>document.write(valorSec)</script>"; ?>
	alert(valorSec);

}
<!--Validation-->	
function Validation(){

			var n = document.forms["myForm"]["datepicker"].value;
			var l = document.forms["myForm"]["datepicker_sec"].value;
	
			
			
			if (n == null || n == "") {
				alert("Favor de completar todos los campos de información. Fecha de inicio.");
				return false;
			}
			
			if (l == null || l == "") {
				alert("Favor de completar todos los campos de información. Fecha de finalizar.");
				return false;
			}
			
}
<!--End VAlidation	-->
</script>
<style>
body {
	font-family: "Trebuchet MS", "Helvetica", "Arial", "Verdana", "sans-serif";
	font-size: 12px;
}
#design {
	background: #CCC;
}
#drop {
	font-size: 14px;
	max-width: 150px;
	max-height: 50px;
}
</style>
<link href="../css/style.css" rel="stylesheet"/>
<?php 

require_once( '../classes/class.database.php' );
require_once('../classes/session_conn.php'); 

$medio = "";
$restoA = "";	
$restoB = "";
$restoC = "";	
$restoD = "";	
$resto_sec = "";
$camp = "";
$land = "";
$camp_code = "";
$datepicker = "15-12-14";
$datetime = new DateTime('tomorrow'); 
$datetime = $datetime->format('Y-m-d');
$datepicker_sec = $datetime; 
		
		if (isset($_POST['medio'])) 					$medio 					= $_POST['medio'];
		if (isset($_POST['camp'])) 						$camp 					= $_POST['camp']	;
		if (isset($_POST['land'])) 						$land 					= $_POST['land'];
		if (isset($_POST['camp_code'])) 				$camp_code 				= $_POST['camp_code']	;
		if (isset($_POST['datepicker'])) 				$datepicker 			= $_POST['datepicker'];
		if (isset($_POST['datepicker_sec'])) 			$datepicker_sec 		= $_POST['datepicker_sec'];
		
		
//echo $medio; 
//echo $camp; 
//echo $datepicker; 
//echo $datepicker_sec; 



?>
</head>

<body>
  <div class="row">
   <div class="container" align="right" ><a href="logout.php"><h5>LOGOUT</h5></a></div>
  </div>
<div class="row" style="margin-left:auto; margin-right:auto;">
	<div class="container" align="center">
	<img src="../images/zforms_header.jpg" class="img-responsive"/>
	</div>
</div>
	<p>&nbsp;</p>
	<div class="row">
		<div class="container">
			<div class="pull-right"><a href="export.php?medio=<?php print $medio; ?>&camp=<?php print $camp; ?>&cc=<?php print $camp_code; ?>&datepicker=<?php print $datepicker; ?>&datepicker_sec=<?php print $datepicker_sec; ?>" onclick="document.theForm.submit();" class="btn btn-success" style="font-size:14px; color:#FFF; text-decoration:none;">EXPORT AS .XLS</a>
			</div>
		</div>
	</div>
	<div class="row">
	<div class="container" >

		<form name="myForm" method="POST" action="" onSubmit="return Validation()">
			<div class="pull-left">
				<input type="hidden" name="medio" value="theuser"/>
				<div class="col-md-2" align="center"> <strong>Medio:</strong><br/>









					<?php

					$sql = "SELECT DISTINCT med_rec FROM zforms_records ORDER BY med_rec ";
					$result = $conn->query( $sql );


					if ( $result->num_rows > 0 ) {
						// output data of each row
						echo '<select class="form-control" name="medio" id="medio" onChange="Detect()">';
						while ( $row = $result->fetch_assoc() ) {
							echo "<option value='" . $row[ 'med_rec' ] . "' id='" . $row[ 'med_rec' ] . "' >" . $row[ 'med_rec' ] . "</option>";
						}
						echo '</select>';
					}
					//$conn->close();

					?>
				</div>
				<div class="col-md-2" align="center"><strong>Codigo de Origen:</strong><br/>
					<?php

					$sql = "SELECT DISTINCT code_rec FROM zforms_records ORDER BY code_rec ";
					$result = $conn->query( $sql );

					if ( $result->num_rows > 0 ) {
						// output data of each row
						echo '<select class="form-control" name="camp" id="camp" onChange="DetectSecond()">';
						while ( $row = $result->fetch_assoc() ) {
							echo "<option value='" . $row[ 'code_rec' ] . "' id='" . $row[ 'code_rec' ] . "'>" . $row[ 'code_rec' ] . "</option>";
						}
						echo '</select>';
					}
					//$conn->close();

					?>
				</div>
				<div class="col-md-2" align="center"><strong>Campa&ntilde;a:</strong><br/>
					<?php

					$sql = "SELECT DISTINCT land_rec FROM zforms_records ORDER BY land_rec ";
					$result = $conn->query( $sql );

					if ( $result->num_rows > 0 ) {
						// output data of each row
						echo '<select class="form-control" name="land" id="land" onChange="DetectSecond()">';
						while ( $row = $result->fetch_assoc() ) {
							echo "<option value='" . $row[ 'land_rec' ] . "' id='" . $row[ 'land_rec' ] . "'>" . $row[ 'land_rec' ] . "</option>";
						}
						echo '</select>';
					}
					//$conn->close();

					?>
				</div>
				<div class="col-md-2" align="center"><strong>Codigo de campa&ntilde;a:</strong><br/>
					<?php

					$sql = "SELECT DISTINCT camp_code_rec FROM zforms_records ORDER BY camp_code_rec ";
					$result = $conn->query( $sql );

					if ( $result->num_rows > 0 ) {
						// output data of each row
						echo '<select  class="form-control" name="camp_code" id="camp_code" onChange="DetectSecond()">';
						while ( $row = $result->fetch_assoc() ) {
							echo "<option value='" . $row[ 'camp_code_rec' ] . "' id='" . $row[ 'camp_code_rec' ] . "'>" . $row[ 'camp_code_rec' ] . "</option>";
						}
						echo '</select>';
					}
					//$conn->close();

					?>
				</div>
				<div class="col-md-2" align="center"><strong>Desde:</strong><br/>
					<input class="form-control" type="text" name="datepicker" id="datepicker">
				</div>
				<div class="col-md-2" align="center"><strong>Hasta:</strong> <br/>
					<input class="form-control" type="text" name="datepicker_sec" id="datepicker_sec">
				</div>
				<div class="row">
					<div class="container">
						<div class="col-md-1 pull-right" style="margin-top:10px;">
							<input class="btn btn-primary" type="submit" name="button" id="button" value="SOMETER">
							</input>
						</div>
					</div>
				</div>
		</form>
		</div>
	</div>
  <hr/>
  <div class="container" style="margin-bottom:20px; padding:5px;">
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" id="records" style="padding:5px; font-size: 12px;">
      <tbody>
        <tr>
          <td class="col-md-1" align="center"><strong>Nombre</strong></td>
          <td class="col-md-1" align="center"><strong>CO</strong></td>
          <td class="col-md-1" align="center"><strong>Apellido</strong></td>
          <td class="col-md-1" align="center"><strong>Instituci&oacute;n</strong></td>
           <td class="col-md-1" align="center"><strong>Centros</strong></td>
          <td class="col-md-1" align="center"><strong>Campa&ntilde;a</strong></td>
          <td class="col-md-1" align="center"><strong>CC</strong></td>
          <td class="col-md-1" align="center"><strong>Email</strong></td>
          <td class="col-md-1" align="center"><strong>Medio</strong></td>
          <td class="col-md-1" align="center"><strong>Cuando</strong></td>
        </tr>
      </tbody>
    </table>
  </div>
  <?php
 
$PAGE_SIZE = 10;  		// The size of our pages.

$iPageCurrent = 0;		// The page we're currently on

$iPageCount = 0;		// Number of pages of records

$iRecordCount = 0;		// Count of the records returned

$I = 0;					// Standard looping variable


// Get the page number

if (isset($_GET['page'])) $iPageCurrent = $_GET['page']; else $iPageCurrent = 1;

if (!is_numeric($iPageCurrent)) $iPageCurrent = 1;
	
		//Finaliza la lista de x usuario
		
	    $sql = "select * from zforms_records";
	
		$result = mysqli_query($conn, $sql);
		
		$num_rows = mysqli_num_rows($result);
			
		$iRecordCount = $num_rows;
		
		if($medio != ""){
				
				$restoA = " AND med_rec = '" . $medio . "'";
	
			}
		if($camp != ""){
				
				$restoB = " AND code_rec = '" . $camp . "'";
	
			}
		if($land != ""){
				
				$restoC = " AND land_rec = '" . $land . "'";
	
			}
		if($camp_code != ""){
				
				$restoD = " AND camp_code_rec = '" . $camp_code . "'";
	
			}
			
		if($datepicker != "" && $datepicker_sec != ""){
			
				$resto_sec = "WHERE (when_rec BETWEEN '" . $datepicker . "%' AND '" . $datepicker_sec ."%')";
				
		}

		$sql = "select * from zforms_records "  . $resto_sec . " " . $restoA . "" . $restoB . "" . $restoC . "" . $restoD ." ORDER BY when_rec DESC " ; //AND med_rec = '" . $medio . "' AND code_rec = '" . $camp . "'
		//echo $sql; 
			
					
			//echo $sql; //test
			
			$result = mysqli_query($conn, $sql) ;
			$num_rows_sec = mysqli_num_rows($result);
			
			//echo $num_rows_sec;
			
			$iRecordCount2 = $num_rows_sec;
			
			// Calculate total pages

			$iPageCount2 	= ceil($iRecordCount2 / $PAGE_SIZE);
	
	/*While records exists	*/
        if (mysqli_num_rows($result) > 0) {

			while ($rs = mysqli_fetch_array($result)) {

        ?>
  <div class="container post" id="records" style="padding:5px;">
   
    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" id="records" style="padding:5px; font-size: 12px;">
      <tbody>
        <tr>
          <td class="col-md-1" align="center"><?php print $rs["name_rec"]; ?></td>
          <td class="col-md-1" align="center"><?php print $rs["code_rec"]; ?></td>
          <td class="col-md-1" align="center"><?php print $rs["lname_rec"]; ?></td>
          <td class="col-md-1" align="center"><?php print $rs["inst_rec"]; ?></td>
          <td class="col-md-1" align="center"><?php print $rs["centro_rec"]; ?></td>
          <td class="col-md-1" align="center"><?php print $rs["camp_rec"]; ?></td>
          <td class="col-md-1" align="center"><?php print $rs["camp_code_rec"]; ?></td>
          <td class="col-md-1" align="center"><?php print $rs["email_rec"]; ?></td>
          <td class="col-md-1" align="center"><?php print $rs["med_rec"]; ?></td>
          <td class="col-md-1" align="center"><?php print $rs["when_rec"]; ?></td>
        </tr>
      </tbody>
    </table>
  
  </div>
  <p>
    <?php

            }

        } else {

        ?>
  </p>
  <p><!-- If there's no records-->
  </p>
  <div class="container">
    <div class="container" height="25" colspan="8" style="margin-left:auto; margin-right:auto;">
      <p align="center">No se encontraron records registrados.</p>
    </div>
  </div>
  <?php

        }

        ?>
  
  <!--Where the pagination goes (the numbers)-->
  <div class="container" align="center">
    <hr/>
    <!--Total of records-->
    <div>
      <?php if ($iRecordCount > 0) { ?>
      Total de records: <?php print $iRecordCount2; ?> of <?php print $iRecordCount; ?>
      <?php } ?>
    </div>
    <div class="pagination"></div>
  </div>
</body>
</html>
<!--Necesary files for the pagination -->

<script src="../js/custom.js"></script>
<script src="../js/paginate.js"></script>