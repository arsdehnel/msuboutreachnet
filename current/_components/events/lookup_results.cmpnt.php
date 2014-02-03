<?

	require_once('/home/www/pm_common/system.php');
	require_once('/home/www/pm_common/template.php');
	
	$actions	= array(
						array(
							'label' => 'View Event',
							'class' => 'primary',
							'href' => '../maint/?id=%%'
						) 
				  );
		
	prc_data_grid( "SELECT em.event_master_id
						,arsdehnel_msub.fnc_event_code_lkup( em.event_master_id ) as \"Event Code\"
						,case 
						   when char_length( em.event_title ) > 50
						     then substring( em.event_title from 1 for 50 ) || '...'
						   else
						   	 em.event_title
						 end as \"Title\"
						,to_char(dtl.start_date,'MM/DD/YYYY') || ' - ' || to_char(dtl.end_date,'MM/DD/YYYY') as \"Dates\"
					FROM arsdehnel_msub.event_master em
					  LEFT JOIN (select event_master_id
					  				,min(start_date) as start_date
					  				,max(end_date) as end_date
					  			 from arsdehnel_msub.event_dtl
					  			 group by event_master_id) dtl ON em.event_master_id = dtl.event_master_id
					WHERE em.event_master_id 	= coalesce(" . nvl( $_GET['event_master_id'], 'null' ) . ",em.event_master_id)
					  AND em.event_crn 			= arsdehnel_msub.fnc_decode_1('" . pg_escape_string( $_GET['event_crn'] ) . "','',em.event_crn, '" . pg_escape_string( $_GET['event_crn'] ) . "')
					  AND em.event_rubric		= arsdehnel_msub.fnc_decode_1('" . pg_escape_string( $_GET['event_rubric'] ) . "','',em.event_rubric, '" . pg_escape_string( $_GET['event_rubric'] ) . "')
					  AND em.event_number 		= arsdehnel_msub.fnc_decode_1('" . pg_escape_string( $_GET['event_number'] ) . "','',em.event_number, '" . pg_escape_string( $_GET['event_number'] ) . "')
					  AND em.event_section		= arsdehnel_msub.fnc_decode_1('" . pg_escape_string( $_GET['event_section'] ) . "','',em.event_section, '" . pg_escape_string( $_GET['event_section'] ) . "')
					  AND em.event_quarter		= arsdehnel_msub.fnc_decode_1('" . pg_escape_string( $_GET['event_quarter'] ) . "','',em.event_quarter, '" . pg_escape_string( $_GET['event_quarter'] ) . "')
					  AND em.event_semester		= arsdehnel_msub.fnc_decode_1('" . pg_escape_string( $_GET['event_semester'] ) . "','',em.event_semester, '" . pg_escape_string( $_GET['event_semester'] ) . "')
					  AND em.event_year 		= arsdehnel_msub.fnc_decode_1('" . pg_escape_string( $_GET['event_year'] ) . "','',em.event_year, '" . pg_escape_string( $_GET['event_year'] ) . "')
					  AND upper(em.event_title)	LIKE upper('%" . pg_escape_string( $_GET['event_title'] ) . "%')"
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
				   
?>