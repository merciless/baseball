<!doctype>
<html>
<head>
<meta charset="UTF-8">
<title>.::Display::.</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">

<meta name="viewport" content="width=device-width, initial-scale=1">

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
/*function Validation(){

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
			
}*/

function Hellow(){

	alert("Hola");
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
//require_once('../classes/session_conn.php'); 

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
	<!-- <div class="row">
		<div class="container">
			<div class="pull-right"><a href="export.php?medio=<?php //print $medio; ?>&camp=<?php //print $camp; ?>&cc=<?php //print $camp_code; ?>&datepicker=<?php //print $datepicker; ?>&datepicker_sec=<?php //print $datepicker_sec; ?>" onclick="document.theForm.submit();" class="btn btn-success" style="font-size:14px; color:#FFF; text-decoration:none;">EXPORT AS .XLS</a>
			</div>
		</div>
	</div> -->
	<div class="row">
	<div class="container" >

		<form name="myForm" method="POST" action="" onSubmit="return Validation()">
			<div class="pull-left">
				<input type="hidden" name="medio" value="theuser"/>
				<div class="col-md-2" align="center"> <strong>Position:</strong><br/>









					<?php

					$sql = "SELECT DISTINCT bb_pos FROM records";
					$result = $conn->query( $sql );


					if ( $result->num_rows > 0 ) {
						// output data of each row
						echo '<select class="form-control" name="medio" id="medio" onChange="Detect()">';
						while ( $row = $result->fetch_assoc() ) {
							echo "<option value='" . $row[ 'bb_pos' ] . "' id='" . $row[ 'bb_pos' ] . "' >" . $row[ 'bb_pos' ] . "</option>";
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
          <td class="col-lg-2 col-md-2 col-sm-2" align="center"><strong>Name</strong></td>
          <td class="col-lg-2 col-md-2 col-sm-2" align="center"><strong>Position</strong></td>
          <td class="col-lg-2 col-md-2 col-sm-2" align="center"><strong>State</strong></td>
          <td class="col-lg-2 col-md-2 col-sm-2" align="center"><strong>University</strong></td>
          <td class="col-lg-2 col-md-2 col-sm-2" align="center"><strong>Round Pick</strong></td>
		  <td class="col-lg-1 col-md-1 col-sm-1" align="center"><strong>Edit</strong></td>
          <td class="col-lg-1 col-md-1 col-sm-1" align="center"><strong>Delete</strong></td>
  
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
		
	    $sql = "select * from records";
	
		$result = mysqli_query($conn, $sql);
		
		$num_rows = mysqli_num_rows($result);
			
		$iRecordCount = $num_rows;
		
		if($medio != ""){
				
				$restoA = " WHERE bb_pos = '" . $medio . "'";
	
			}

			
		/*if($datepicker != "" && $datepicker_sec != ""){
			
				$resto_sec = "WHERE (when_rec BETWEEN '" . $datepicker . "%' AND '" . $datepicker_sec ."%')";
				
		}*/

		$sql = "select * from records "  . $restoA . " ORDER BY bb_when DESC " ; //AND med_rec = '" . $medio . "' AND code_rec = '" . $camp . "'
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
          <td class="col-lg-2 col-md-2 col-sm-2" align="center" ondblclick="Hellow()"><?php print $rs["bb_name"]; ?></td>
          <td class="col-lg-2 col-md-2 col-sm-2" align="center"><?php print $rs["bb_pos"]; ?></td>
          <td class="col-lg-2 col-md-2 col-sm-2" align="center"><?php print $rs["bb_state"]; ?></td>
          <td class="col-lg-2 col-md-2 col-sm-2" align="center"><?php print $rs["bb_doo"]; ?></td>
          <td class="col-lg-2 col-md-2 col-sm-2" align="center"><?php print $rs["bb_rdpck"]; ?></td>
		  <td class="col-lg-1 col-md-1 col-sm-1" align="center"><img src="images/edit.png" width=30 height=30 /></td>
          <td class="col-lg-1 col-md-1 col-sm-1" align="center"><img src="images/delete.png" width=30 height=30 /></td>
  
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