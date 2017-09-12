<?php 
require_once( '../classes/class.database.php' );
require_once('../classes/session_conn.php'); 



session_unset();

session_destroy();

header("Location: index.php");

$conn->close();

exit;

?>