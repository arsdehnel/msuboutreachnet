<?
	session_start();
	session_unset();
	session_destroy();
	session_start();
	$_SESSION['success_line'] = 'Logged out successfully.';
	header("Location: /index.php");
?>