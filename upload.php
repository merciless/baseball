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

include 'PHPExcel/IOFactory.php';
include_once('PHPExcel/PHPExcel.php');

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

	$userName = trim( $allDataInSheet[ $i ][ "A" ] );

	$userMobile = trim( $allDataInSheet[ $i ][ "B" ] );

	$query = "SELECT name FROM records WHERE name = '" . $userName . "' and lname = '" . $userMobile . "'";

	$sql = mysqli_query( $connection, $query );
	
	$recResult = mysqli_fetch_array( $sql );

	$existName = $recResult[ "name" ];

	if ( $existName == "" ) {
		$query = "insert into records (name, lname) values('" . $userName . "', '" . $userMobile . "');";
		$insertTable = mysqli_query( $connection, $query );


		$msg = 'Record has been added. <div style="Padding:20px 0 0 0;"><a href="index.php" target="_blank">Go Back to tutorial</a></div>';

	} else {

		$msg = 'Record already exist. <div style="Padding:20px 0 0 0;"><a href="index.php" target="_blank">Go Back to tutorial</a></div>';

	}

}

echo "<div style='font: bold 18px arial,verdana;padding: 45px 0 0 500px;'>" . $msg . "</div>";

?>