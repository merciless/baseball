<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

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
</head>

<body>
<?php 
	
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "baseball";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if (isset($_POST['medio'])) 					$medio 					= $_POST['medio'];
?>

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
<?php 
$sql = "SELECT  DISTINCT bb_tm FROM records";//id_team, name_team, desc_team
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
	$results = array();
	$index=0;
    while($row = mysqli_fetch_assoc($result)) {
        //echo "Team ID = " . $row["id_team"]. " / Team Name = " . $row["bb_tm"]. " / Team Description = " . $row["desc_team"]. "<br>";
        $results[] = $row['bb_tm'];
	}

	
		} else {
			echo "0 results";
        }

$sql_sec = "SELECT * FROM records WHERE bb_pos = '" . $medio . "'" ;//id_team, name_team, desc_team
echo($sql_sec);
$result_sec = mysqli_query($conn, $sql_sec);
        
if (mysqli_num_rows($result_sec) > 0) {
    // output data of each row
    $results_sec = array();
    $index=0;
    while($row_sec = mysqli_fetch_assoc($result_sec)) {
            //echo "Round = " . $row_sec["bb_ovpck"]; // Team Name = " . $row["name_team"]. " / Team Description = " . $row["desc_team"]. "<br>";
            $results_sec[] = $row_sec['bb_ovpck'];
    }
        
            
        } else {
            echo "0 results";
        }
              
mysqli_close($conn);
	?>
<canvas id="myChart"></canvas>
<script>
var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: [<?php foreach ($results as $key => $value) {
			echo '"' . $value . '", ';
		} ?>],
        datasets: [{
            label: "My First dataset",
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: [<?php foreach ($results_sec as $key => $value) {
			echo $value . ', ';
		} ?>],
        }]
    },

    // Configuration options go here
    options: {}
});
	</script>
</body>
</html>