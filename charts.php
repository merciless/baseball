<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
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

$sql_sec = "SELECT bb_ovpck FROM records";//id_team, name_team, desc_team
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