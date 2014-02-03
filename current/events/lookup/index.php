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
	
				
	//put public contents into the wrapper content slot
	$form			= & new Template($cmpnt_path);  	 
	$results		= & new Template($cmpnt_path);
	//$form			-> set('results_block', $results -> fetch('events/lookup_results.cmpnt.php'));
	$page_wrapper	-> set('content', $form -> fetch('events/lookup_form.cmpnt.php') );
	
	
	echo $page_wrapper 	-> fetch('page_wrapper.tmplt.php'); 
		
?>