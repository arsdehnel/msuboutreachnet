<?

	require_once('/home/www/pm_common/system.php');
	require_once('/home/www/pm_common/template.php');
	
	$actions	= array(
						array(
							'label' => 'View Personnel',
							'class' => 'primary',
							'href' => '../maint/?id=%%'
						) 
				  );
		
	prc_data_grid( "SELECT p.personnel_id
	                  ,p.first_name as \"First Name\"
	                  ,p.last_name as \"Last Name \"
	                  ,dv.description as \"Type\"
					FROM arsdehnel_msub.personnel p
					  INNER JOIN arsdehnel_msub.domain_value dv ON p.psnl_type = dv.code
					  INNER JOIN arsdehnel_msub.domain d ON d.domain_id = dv.domain_id
					WHERE d.code = 'personnel_type'
					  AND upper(p.last_name)		LIKE upper('%" . pg_escape_string( $_GET['last_name'] ) . "%')"
				   ,'Y'
				   ,$actions
				   ,0
				   ,false
				   ,'data_grid'
				   ,null
				   ,null
				   ,20
				   ,'No records found'
				   ,null
				   ,null
				   ,null
				   ,null
				   ,null
				   ,null
				   ,null
				   ,false			//rs_lkup_disp 
				   ,false
				   ,false
				  );

