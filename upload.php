<?php

/************************ YOUR DATABASE CONNECTION START HERE   ****************************/

define( "DB_HOST", "localhost" ); // set database host

define( "DB_USER", "root" ); // set database user

define( "DB_PASS", "" ); // set database password

define( "DB_NAME", "baseball" ); // set database name



// 1. Create a database connection
$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS);
if (!$connection) {
    die("Database connection failed: " . mysqli_error());
}

// 2. Select a database to use 
$db_select = mysqli_select_db($connection, DB_NAME);
if (!$db_select) {
    die("Database selection failed: " . mysqli_error());
}

/************************ YOUR DATABASE CONNECTION END HERE  ****************************/

set_include_path( get_include_path() . PATH_SEPARATOR . 'Classes/' );

include 'PHPExcel/Classes/PHPExcel/IOFactory.php';
include_once('PHPExcel/Classes/PHPExcel.php');

if(isset($_GET)){
    $name = $_GET['name'];

// This is the file path to be uploaded.

	$inputFileName = 'uploads/'. $name;

	try {

		$objPHPExcel = PHPExcel_IOFactory::load( $inputFileName );

	} catch ( Exception $e ) {

		die( 'Error loading file "' . pathinfo( $inputFileName, PATHINFO_BASENAME ) . '": ' . $e->getMessage() );

	}

}



$allDataInSheet = $objPHPExcel->getActiveSheet()->toArray( null, true, true, true );

$arrayCount = count( $allDataInSheet ); // Here get total count of row in that Excel sheet
 
for ( $i = 2; $i <= $arrayCount; $i++ ) {

	$year = trim( $allDataInSheet[ $i ][ "A" ] );

	$rnd = trim( $allDataInSheet[ $i ][ "B" ] );
	
	$dt = trim( $allDataInSheet[ $i ][ "C" ] );

	$ovpck = trim( $allDataInSheet[ $i ][ "D" ] );
	
	$frrnd = trim( $allDataInSheet[ $i ][ "E" ] );

	$rdpck = trim( $allDataInSheet[ $i ][ "F" ] );
	
	$tm = trim( $allDataInSheet[ $i ][ "G" ] );

	$name = trim( $allDataInSheet[ $i ][ "H" ] );
	
	$pos = trim( $allDataInSheet[ $i ][ "I" ] );

	$war = trim( $allDataInSheet[ $i ][ "J" ] );
	
	$g = trim( $allDataInSheet[ $i ][ "K" ] );

	$ab = trim( $allDataInSheet[ $i ][ "L" ] );
	
	$hr = trim( $allDataInSheet[ $i ][ "M" ] );

	$ba = trim( $allDataInSheet[ $i ][ "N" ] );
	
	$ops = trim( $allDataInSheet[ $i ][ "O" ] );

	$g2 = trim( $allDataInSheet[ $i ][ "P" ] );
	
	$w = trim( $allDataInSheet[ $i ][ "Q" ] );

	$l = trim( $allDataInSheet[ $i ][ "R" ] );
	
	$era = trim( $allDataInSheet[ $i ][ "S" ] );

	$whip = trim( $allDataInSheet[ $i ][ "T" ] );
	
	$sv = trim( $allDataInSheet[ $i ][ "U" ] );

	$type = trim( $allDataInSheet[ $i ][ "V" ] );
	
	$doo = trim( $allDataInSheet[ $i ][ "W" ] );

	$state = trim( $allDataInSheet[ $i ][ "X" ] );
	
	$signed = trim( $allDataInSheet[ $i ][ "Y" ] );

	$pv = trim( $allDataInSheet[ $i ][ "Z" ] );
	
	$bonus = trim( $allDataInSheet[ $i ][ "AA" ] );

	$diff = trim( $allDataInSheet[ $i ][ "AB" ] );
	
	$bonus_per = trim( $allDataInSheet[ $i ][ "AC" ] );

//Verify that they are not records with the same content
	//$query = "SELECT bb_year FROM records WHERE bb_year = '" . $year . "' and bb_rnd = '" . $rnd . "'";

	//$sql = mysqli_query( $connection, $query );
	
	//$recResult = mysqli_fetch_array($sql);

	//$existName = $recResult[ "bb_year" ];

//If $existName is empty it proceed with the INSERT query below 

	//if ( $existName == "" ) {
		$query = "insert into records (bb_year, bb_rnd, bb_dt, bb_ovpck, bb_frrnd, bb_rdpck, bb_tm, bb_name, bb_pos, bb_war, bb_g, bb_ab, bb_hr, bb_ba, bb_ops, bb_g2, bb_w, bb_l, bb_era, bb_whip, bb_sv, bb_type, bb_doo, bb_state, bb_signed, bb_pv, bb_bonus, bb_diff, bb_bonus_per, bb_when) values('" . $year . "', '" . $rnd . "', '" . $dt . "', '" . $ovpck . "', '" . $frrnd . "', '" . $rdpck . "', '" . $tm . "', '" . $name . "', '" . $pos . "', '" . $war . "', '" . $g . "', '" . $ab . "', '" . $hr . "', '" . $ba . "', '" . $ops . "', '" . $g2 . "', '" . $w . "', '" . $l . "', '" . $era . "', '" . $whip . "', '" . $sv . "', '" . $type . "', '" . $doo . "', '" . $state . "', '" . $signed . "', '" . $pv . "', '" . $bonus . "', '" . $diff . "', '" . $bonus_per . "', NOW())";
		$insertTable = mysqli_query( $connection, $query );
		

//Messages of success in a variable
		
	//	$msg = 'Record has been added. <div style="Padding:20px 0 0 0;"><a href="index.php" target="_self">Go Back to tutorial</a></div>';

//	} else {

		$msg = 'Record already exist. <div style="Padding:20px 0 0 0;"><a href="index.php" target="_self">Go Back to tutorial</a></div>';

//	}

}

//Echo of the variable of success 
echo "<div style='font: bold 18px arial,verdana;padding: 45px 0 0 500px;'>" . $msg . "</div>";

?>