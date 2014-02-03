<?
	header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
	header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past	

	session_start();
	if (!isset($_SESSION['initiated'])){
	
		session_regenerate_id();
		$_SESSION['user_id'] = 0;
		$_SESSION['site_id'] = 19;
		$_SESSION['initiated'] = true;
		$_SESSION['security_level'] = 0;

	}

	require_once('/home/www/pm_common/system.php');
	require_once('/home/www/pm_common/template.php');  
	require_once('/home/www/msuboutreach.net/dao/event_master.dao.php');
	require_once('/home/www/msuboutreach.net/dao/event_evals.dao.php');
 	  
	list( $view_ind, $maint_ind, $page_title, $menu_level, $menu_id, $menu_control_detail_id, $page_title_image_path ) = explode("|", fnc_page_visit());	
	
	/* ------------------------------------------------------------------------------------------------------------------------------------------------------------------- */
	/* ------------------------------------------------------------------------ PATHS ------------------------------------------------------------------------------------ */
	/* ------------------------------------------------------------------------------------------------------------------------------------------------------------------- */
	$tmplt_path		= '/home/www/msuboutreach.net/_templates/';  
	$cmpnt_path		= '/home/www/msuboutreach.net/_components/';
	
	
	/* ------------------------------------------------------------------------------------------------------------------------------------------------------------------- */
	/* ------------------------------------------------------------------------ COMPONENTS ------------------------------------------------------------------------------- */
	/* ------------------------------------------------------------------------------------------------------------------------------------------------------------------- */	
	//nav_wrapper
	$nav_wrapper	= & new Template($cmpnt_path);
	
	
	/* ------------------------------------------------------------------------------------------------------------------------------------------------------------------- */
	/* ------------------------------------------------------------------------ TEMPLATES -------------------------------------------------------------------------------- */
	/* ------------------------------------------------------------------------------------------------------------------------------------------------------------------- */
	//page_wrapper
	$page_wrapper	= & new Template($tmplt_path);  	 
	$page_wrapper	-> set('page_title', $page_title);
	$page_wrapper	-> set('view_ind', $view_ind);
	$page_wrapper	-> set('nav_wrapper', $nav_wrapper -> fetch( 'nav_wrapper.cmpnt.php' ));
		
	$event_master_obj	= new dao_arsdehnel_msub_event_master();
	$event_master_obj	-> event_master_id = $_GET['event_master_id'];
	$event_master_obj 	-> retrieve();
					
	//put public contents into the wrapper content slot
	$event_form		= & new Template($cmpnt_path);  
	$event_form		-> set('event_master_obj', $event_master_obj );	 

	//put the header into the form
	$header			= & new Template($cmpnt_path);
	$header			-> set('event_master_obj', $event_master_obj );	 
	switch( $_GET['form_code'] ):
		case "caf_credit":
			$form_header = 'Extension Credit Course Approval Form';
			break;
		case 'budget':
			$form_header = 'Event Budget Form';
			break;
		case 'reservation':
			$form_header = 'Event Reservation Form';
			break;
		case 'evaluations':
			$form_header = 'Event Evaluation Report';
			$eval_smry_data		= new dao_arsdehnel_msub_event_evals();
			$eval_smry_data		-> event_master_id = $_GET['event_master_id'];
			$eval_smry_data 	-> retrieve_eval_smry();
			$event_form		-> set('eval_smry_data', $eval_smry_data );	 
			break;
	endswitch;
	$header			-> set('form_header', $form_header );	 
	
	//send it all out to the wrapper
	$page_wrapper	-> set( 'header', $header -> fetch('event_forms/header.cmpnt.php') );
	$page_wrapper	-> set( 'form_body', $event_form -> fetch('event_forms/' . $_GET['form_code'] . '.cmpnt.php') );
	
	echo $page_wrapper 	-> fetch('event_form.tmplt.php'); 
		
?>