<?
	session_start();
	require_once('/home/www/pm_common/system.php');
	require_once('/home/www/msuboutreach.net/dao/event_master.dao.php');
		
	$em_obj		= new dao_arsdehnel_msub_event_master();
	$em_obj		->	event_rubric	= $_POST['event_rubric'];
	echo $em_obj -> retrieve_next_number();