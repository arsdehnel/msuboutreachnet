<?

	session_start();
	
	echo $_SESSION['success_line'] . '<br />';
	
	unset( $_SESSION['success_line'] );

?>