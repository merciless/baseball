<?php 

require_once( '../classes/class.database.php' );

$session_path = "";

$ErrMsg = "";

if (isset($_POST['hdLogin'])) {

	$ErrMsg = "&iexcl;Favor de someter credenciales correctos!";

	if (isset($_POST['email'])) $cont_email = $_POST['email']; else $cont_email = "";

	if (isset($_POST['pass'])) $cont_users_pwd = $_POST['pass']; else $cont_users_pwd = "";

	

	// Clean input

	$cont_email = str_replace("'", "", $cont_email);

	$cont_users_pwd = str_replace("'", "", $cont_users_pwd);

	//$first = md5('$cont_users_pwd');	

	//$quantity = sha1($first);
	

	$sql = "select * from zforms_users where users_email = '$cont_email' and users_passw = sha1(md5('$cont_users_pwd'))";
	
	$result = mysqli_query($conn, $sql);
	

	// Error Handling

	//check_mysql_results($result, $sql, mysql_error());
	
	if (mysqli_num_rows($result) > 0) {
		
		print("Success");
	
		// Login is OK ; Fill and initialize session variables

		$rs = mysqli_fetch_array($result);
		
		session_save_path($session_path);

		session_start();
		
		$_SESSION["id_rec"] 			= $rs[0];

		$_SESSION["name_rec"] 		= $rs[1];

		$_SESSION["email_rec"]	 	=  $rs[2] ;
		
		//$_SESSION["current_option"] =  $rs["users_passw"] ;
			
		header("Location: display.php");
		
		}else{
			print ("Not succesful");
			
		}
}

?>


	