<?php
require_once( '../classes/class.database.php' );

//require_once('classes/constants.php'); 
//require_once('classes/class.database.inc'); 

$restoA = ""; 
$restoB = ""; 
$restoC = ""; 
$resto_sec = ""; 

if (isset($_GET['medio'])) 								$medio 								= $_GET['medio'];
if (isset($_GET['camp'])) 								$camp 								= $_GET['camp'];
if (isset($_GET['cc'])) 								$cc 								= $_GET['cc'];
if (isset($_GET['datepicker'])) 						$datepicker 						= $_GET['datepicker'];
if (isset($_GET['datepicker_sec'])) 					$datepicker_sec 					= $_GET['datepicker_sec'];

		
/*******EDIT LINES 3-8******
$DB_Server = "localhost"; //MySQL Server    
$DB_Username = "username"; //MySQL Username     
$DB_Password = "password";             //MySQL Password     
$DB_DBName = "databasename";         //MySQL Database Name */ 
//$DB_TBLName = "tablename"; //MySQL Table Name   
$filename = "excelfilename" . date("Y_m_d") . time();         //File Name
/*******YOU DO NOT NEED TO EDIT ANYTHING BELOW THIS LINE******    
//create MySQL connection   
$sql = "Select * from $DB_TBLName";
$Connect = @mysql_connect($DB_Server, $DB_Username, $DB_Password) or die("Couldn't connect to MySQL:<br>" . mysql_error() . "<br>" . mysql_errno());
//select database   
$Db = @mysql_select_db($DB_DBName, $Connect) or die("Couldn't select database:<br>" . mysql_error(). "<br>" . mysql_errno());   
//execute query 
$result = @mysql_query($sql,$Connect) or die("Couldn't execute query:<br>" . mysql_error(). "<br>" . mysql_errno());  */ 

		if($medio != ""){
				
				$restoA = " AND med_rec = '" . $medio . "'";
	
			}
		if($camp != ""){
				
				$restoB = " AND code_rec = '" . $camp . "'";
	
			}
		if($cc != ""){
				
				$restoC = " AND camp_code_rec = '" . $cc . "'";
	
			}
			
		if($datepicker != "" && $datepicker_sec != ""){
			
				$resto_sec = "WHERE (when_rec BETWEEN '" . $datepicker . "%' AND '" . $datepicker_sec ."%')";
				
		}

$sql = "SELECT id_rec, CONCAT_WS(' ', name_rec, init_rec) AS name_rec, CONCAT_WS(' ', lname_rec, lname_sec_rec) AS lname_rec, inst_rec, centro_rec, tel_rec, tel_int_rec, concat('0'), acc_bl_rec, code_rec, concat('NC'), email_rec, camp_code_rec, med_rec, when_rec, comm_rec  FROM `zforms_records` " . $resto_sec . " " . $restoA . "" . $restoB ."" . $restoC ." ORDER BY when_rec"; //DESC $sqlPaging
$result = mysqli_query($conn, $sql) ; //concat('N/A') <---- para aplicar en el espacio 

 
$file_ending = "csv";
//header info for browser
header("Content-Type: application/xls");    
header("Content-Disposition: attachment; filename=$filename.csv");  
header("Pragma: no-cache"); 
header("Expires: 0");
/***** Start of Formatting for Excel *****/
// Define separator (defines columns in excel &amp; tabs in word)
$sep = ","; // tabbed character
 
// Start of printing column names as names of MySQL fields
/*for ($i = 0; $i< 3; $i++) {
	$campos = array("ID", "NOMBRE", "APELLIDO");
	echo $campos[$i]  . "\t";
  //echo mysqli_field_name($result, $i) . "\t";
}*/
//print("\n");
// End of printing column names
 
// Start while loop to get data
while($row = mysqli_fetch_array($result))
    {
        $schema_insert = "";
        for($j=0; $j<mysqli_num_fields($result);$j++)
        {
            if(!isset($row[$j]))
                $schema_insert .= "NULL".$sep;
            elseif ($row[$j] != "")
                $schema_insert .= "$row[$j]".$sep;
            else
                $schema_insert .= "".$sep;
        }
        $schema_insert = str_replace($sep."$", "", $schema_insert);
        $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
        $schema_insert .= "\t";
        print(trim($schema_insert));
        print "\n";
    }   
?>