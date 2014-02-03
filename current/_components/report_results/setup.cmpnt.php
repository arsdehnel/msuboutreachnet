<table width="95%" border="1" cellpadding="3" cellspacing="0" align="center">
	<tr>
		<th>
			Event Code
		</th>
		<th>
			Event Title
		</th>
		<th>
			Setup Completed By
		</th>
		<th>
			Setup Completion Time
		</th>
		<th>
			Event Start Day / Date
		</th>
		<th>
			Event End Day / Date
		</th>
		<th>
			Recurrence
		</th>
		<th>
			Times
		</th>
		<th>
			Assigned To
		</th>
		<th>
			Location
		</th>
		<th>
			Room Setup and Equipment
		</th>
	</tr>
	<?
	
		$days 		= floor(((abs(strtotime($_POST['start_date']) - strtotime($_POST['end_date']))) - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));		
		$i			= 0;
		$curr_date	= strtotime( $_POST['start_date'] );
		
		while( $i <= $days ){
		
			echo '<tr><td colspan="12" style="background-color: #CCCCFF;">' . date( 'l, F j, Y', $curr_date ) . '</td></tr>';
			
			$results_rs	= fnc_rs_lookup( "SELECT arsdehnel_msub.fnc_event_code_lkup( em.event_master_id )
											,em.event_master_id
											,em.event_title
											,null
											,null
											,to_char(ed.start_date,'MM/DD/YYYY')
											,to_char(ed.end_date,'MM/DD/YYYY')
											,r.description
											,st.description || ' - ' || et.description
											,null
											,l.description
											,null
										  FROM arsdehnel_msub.event_master em
										  	INNER JOIN arsdehnel_msub.event_dtl ed ON em.event_master_id = ed.event_master_id
										  	INNER JOIN (SELECT code
										  				  ,description
										  				FROM arsdehnel_msub.vue_domain_value
										  				WHERE domain_code = 'dtl_recurrence') r ON r.code = ed.recurrence_ind
										  	INNER JOIN (SELECT code
										  				  ,description
										  				FROM arsdehnel_msub.vue_domain_value
										  				WHERE domain_code = 'dtl_time') st ON st.code = ed.start_time
										  	INNER JOIN (SELECT code
										  				  ,description
										  				FROM arsdehnel_msub.vue_domain_value
										  				WHERE domain_code = 'dtl_time') et ON et.code = ed.end_time
										  	INNER JOIN (SELECT domain_value_id
										  				  ,description
										  				FROM arsdehnel_msub.vue_domain_group_value
										  				WHERE d_code = 'dtl_location'
										  				  AND dgm_code = 'downtown') l ON ed.location_id = l.domain_value_id
										  WHERE arsdehnel_msub.fnc_date_match( ed.recurrence_ind, '" . date( 'm/d/Y', $curr_date ) . "', to_char(ed.start_date,'MM/DD/YYYY'), to_char(ed.end_date,'MM/DD/YYYY') ) = true
										    AND em.status_code != 'CA'" );

			//if it's got events, start the loop
			if( $results_rs ){
				while( $result_rec = pg_fetch_row( $results_rs ) ){
					echo '<tr>';
					foreach($result_rec as $value){
						echo '<td>' . $value . '</td>';  
					}
					echo '</tr>';
				}//end event loop
			}//end event_rs if
			
			//increment stuff
			$curr_date = $curr_date + 86400;
			$i++;
		
		}
		
/*

 select msuboutreachnet.fnc_event_code_lookup( e.event_id ),
		e.event_title,
		s.description,
		msuboutreachnet.fnc_time_value_lookup( e.room_setup_time ) "Setup Completion Time",
		msuboutreachnet.fnc_dtl_days_lookup( dtl.dtl_recurrence, dtl.dtl_start_date, Null, 'rpt_catering' ) + '<br />' + msuboutreachnet.fnc_format_datetime( dtl.dtl_start_date, '%mm/%dd/%yyyy' ),
		msuboutreachnet.fnc_dtl_days_lookup( dtl.dtl_recurrence, dtl.dtl_end_date, Null, 'rpt_catering' ) + '<br />' + msuboutreachnet.fnc_format_datetime( dtl.dtl_end_date, '%mm/%dd/%yyyy' ),
		r.description,
		msuboutreachnet.fnc_time_value_lookup( dtl.dtl_start_time ) + '-' + msuboutreachnet.fnc_time_value_lookup( dtl.dtl_end_time ) "Times",
		IsNull(rs.first_name + ' ','') + IsNull(rs.last_name,''),
		l.description,
		e.room_setup_notes
	FROM tbl_events e
		inner join tbl_event_dtl dtl on e.event_id = dtl.event_id
		left join (select personnel_id, first_name, last_name
					from personnel) rs on rs.personnel_id = e.room_setup_personnel_id
		inner join (select dv.domain_value_id,
						dv.description
					from domain d
						inner join domain_value dv on dv.domain_id = d.domain_id
						inner join domain_group_master dgm on dgm.domain_id = d.domain_id
						inner join domain_group_detail dgd on dgm.domain_group_master_id = dgd.domain_group_master_id
							and dgd.domain_value_id = dv.domain_value_id
					where d.code = 'dtl_location'
						and dgm.code = 'downtown') l on l.domain_value_id = dtl.location_id
		inner join (select dv.code,	dv.description
					from domain_value dv
						inner join domain d on d.domain_id = dv.domain_id
					where d.code = 'lgstc_room_setup_day') s on s.code = e.room_setup_day_ind
		inner join (select dv.code, dv.description
				    from domain_value dv 
						inner join domain d on d.domain_id = dv.domain_id
					where d.code = 'dtl_recurrence') r on dtl.dtl_recurrence = r.code
	where msuboutreachnet.fnc_date_match_lookup( dtl.dtl_recurrence, @p_in_event_date, dtl.dtl_start_date, dtl.dtl_end_date ) = 'Y'
		and e.event_status <> 'R'
		and e.event_status <> 'CA'

*/

?>
</table>