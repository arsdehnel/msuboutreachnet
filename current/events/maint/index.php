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
 	  
	list( $view_ind, $maint_ind, $page_title, $menu_level, $menu_id, $menu_control_detail_id, $page_title_image_path ) = explode("|", fnc_page_visit());	
	
	/* ------------------------------------------------------------------------------------------------------------------------------------------------------------------- */
	/* ------------------------------------------------------------------------ PATHS ------------------------------------------------------------------------------------ */
	/* ------------------------------------------------------------------------------------------------------------------------------------------------------------------- */
	$base_path		= '/home/www/msuboutreach.net/';
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
	$event_master_obj	-> event_master_id = $_GET['id'];
	$event_master_obj 	-> retrieve();
					
	//put public contents into the wrapper content slot
	$event_form		= & new Template($cmpnt_path);  
	$event_form		-> set('event_master_obj', $event_master_obj );	 

	//create all the template pieces
	$credits		= & new Template($cmpnt_path); 
	$personnel_int	= & new Template($cmpnt_path); 
	$personnel_ext	= & new Template($cmpnt_path); 
	$dtl			= & new Template($cmpnt_path); 
	$budget			= & new Template($cmpnt_path);
	$room			= & new Template($cmpnt_path); 
	$catering		= & new Template($cmpnt_path); 
	$evals			= & new Template($base_path);

	//send the event_master_obj to each one
	$credits		-> set('event_master_obj', $event_master_obj );
	$personnel_int	-> set('event_master_obj', $event_master_obj );
	$personnel_ext	-> set('event_master_obj', $event_master_obj );
	$dtl			-> set('event_master_obj', $event_master_obj );
	$budget			-> set('event_master_obj', $event_master_obj );
	$room			-> set('event_master_obj', $event_master_obj );
	$catering		-> set('event_master_obj', $event_master_obj );
	$evals			-> set('event_master_obj', $event_master_obj );
	
	//set any variables
	$personnel_int	-> set('psnl_type', 'INT' );
	$personnel_ext	-> set('psnl_type', 'EXT' );
	$room			-> set('type', 'EQP' );
	$catering		-> set('type', 'CAT' );
	
	//put it all together
	$event_form		-> set('credits', $credits -> fetch('events/subforms/credits.cmpnt.php') );  
	$event_form		-> set('personnel_int', $personnel_int -> fetch('events/subforms/personnel.cmpnt.php') );  
	$event_form		-> set('personnel_ext', $personnel_ext -> fetch('events/subforms/personnel.cmpnt.php') );  
	$event_form		-> set('dtl', $dtl -> fetch('events/subforms/dtl.cmpnt.php') );  
	$event_form		-> set('budget', $budget -> fetch('events/subforms/budget.cmpnt.php') );  	
	$event_form		-> set('room', $room -> fetch('events/subforms/logistics.cmpnt.php') );
	$event_form		-> set('catering', $catering -> fetch('events/subforms/logistics.cmpnt.php') );
	$event_form		-> set('evals', $evals -> fetch('events/evals.list.php') );
	
	//send it all out to the wrapper
	$page_wrapper	-> set('content', $event_form -> fetch('events/form.cmpnt.php') );
	
	echo $page_wrapper 	-> fetch('page_wrapper.tmplt.php'); 
		
?>