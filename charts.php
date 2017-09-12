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

$sql = "SELECT  name_team FROM teams";//id_team, name_team, desc_team
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
	$results = array();
	$index=0;
    while($row = mysqli_fetch_assoc($result)) {
        //echo "Team ID = " . $row["id_team"]. " / Team Name = " . $row["name_team"]. " / Team Description = " . $row["desc_team"]. "<br>";
		$results[] = $row['name_team'];
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
            data: [0, 10, 5, 2, 20, 30, 45],
        }]
    },

    // Configuration options go here
    options: {}
});
	</script>
</body>
</html>