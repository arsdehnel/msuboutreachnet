<?

	session_start();
	require_once('/home/www/pm_common/system.php');	
	require_once('/home/www/msuboutreach.net/dao/personnel.dao.php');
	
	$personnel							= new dao_arsdehnel_msub_personnel();
	$personnel	-> user_id				= $_SESSION['user_id'];
	
	$personnel	-> psnl_type			= $_POST['psnl_type'];
	$personnel	-> personnel_id			= $_POST['personnel_id'];
	$personnel	-> first_name			= $_POST['first_name'];
	$personnel	-> last_name			= $_POST['last_name'];
	$personnel	-> psnl_bio				= $_POST['biography'];
	$personnel	-> w9_ind				= $_POST['w9_ind'];
	$personnel	-> status_code			= $_POST['status_code'];
	
	$personnel ->save();	
	
	$_SESSION['success_line'] = 'Personnel saved successfully.';
	Header( "Location: index.php?id=" . $personnel -> personnel_id );	
	break;

/* End of file */
/* Location: ./personnel/new/process.php */