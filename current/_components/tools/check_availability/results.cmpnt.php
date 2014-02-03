<?

	require_once('/home/www/pm_common/system.php');

	if( isset( $_GET['location_id'] ) && isset( $_GET['lkup_date'] ) ){

		$actions	= array(
							array(
								'label' => 'View Event',
								'href' => '/events/maint/?id=%%'
							) 
					  );
	
		prc_data_grid( "SELECT em.event_master_id
						  ,em.event_rubric
						  ,em.event_number
						  ,em.event_section
						  ,em.event_title
						  ,ed.recurrence_ind
						  ,to_char(ed.start_date,'MM/DD/YYYY') as \"Start Date\"
						  ,to_char(ed.end_date,'MM/DD/YYYY') as \"End Date\"
						  ,st.description as \"Start Time\"
						  ,et.description as \"End Time\"
						FROM arsdehnel_msub.event_master em
						  ,arsdehnel_msub.event_dtl ed
						  ,arsdehnel_msub.domain_value st
						  ,arsdehnel_msub.domain_value et
						WHERE ed.start_time = st.code
						  AND ed.end_time = et.code
						  AND st.domain_id = (select domain_id
						  					  from arsdehnel_msub.domain
						  					  where code = 'dtl_time')
						  AND et.domain_id = (select domain_id
						  					  from arsdehnel_msub.domain
						  					  where code = 'dtl_time')
						  AND em.event_master_id = ed.event_master_id
						  AND arsdehnel_msub.fnc_date_match( ed.recurrence_ind, '" . $_GET['lkup_date'] . "', to_char(ed.start_date,'MM/DD/YYYY'), to_char(ed.end_date,'MM/DD/YYYY') ) = true
						  AND ed.location_id = " . $_GET['location_id']
					   ,'Y'
					   ,$actions );

	}
	
?>
