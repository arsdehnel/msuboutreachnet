<table width="95%" border="1" cellpadding="3" cellspacing="0" align="center">
	<tr>
		<th>
			Event Title
		</th>
		<th>
			Dates
		</th>
		<th>
			Times
		</th>
		<th>
			Location
		</th>
		<th>
			Coordinator
		</th>
	</tr>
	<?

		$days 		= floor(((abs(strtotime($_POST['start_date']) - strtotime($_POST['end_date']))) - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));		
		$i			= 0;
		$curr_date	= strtotime( $_POST['start_date'] );
		
		while( $i <= $days ){
		
			//write day header
			echo '<tr><td colspan="5" style="background-color: #CCCCFF;">' . date( 'l, F j, Y', $curr_date ) . '</td></tr>';
			
			//get events for that day			
			$event_rs	= fnc_rs_lookup( "SELECT em.event_title, 
											to_char(ed.start_date,'MM/DD/YYYY') || ' - ' || to_char(ed.end_date,'MM/DD/YYYY') as dates,
											st.description || ' - ' || et.description as times,
											l.description as location, 
											c.last_name || ', ' || c.first_name as coordinator,
											em.status_code
										  FROM arsdehnel_msub.event_master em
											INNER JOIN arsdehnel_msub.event_dtl ed ON em.event_master_id = ed.event_master_id
											INNER JOIN arsdehnel_msub.domain_value st ON ed.start_time = st.code
											INNER JOIN arsdehnel_msub.domain_value et ON ed.end_time = et.code
											INNER JOIN arsdehnel_msub.domain_value l ON ed.location_id = l.domain_value_id
											LEFT JOIN (SELECT *
													   FROM arsdehnel_msub.event_personnel
													   WHERE psnl_type = 'INT'
													      AND psnl_role = 'coordinator') ep ON em.event_master_id = ep.event_master_id
											LEFT JOIN arsdehnel_msub.personnel c ON ep.personnel_id = c.personnel_id
										  WHERE st.domain_id = (select domain_id
										  					    from arsdehnel_msub.domain
										  					    where code = 'dtl_time')
										  	AND et.domain_id = (select domain_id
										  					    from arsdehnel_msub.domain
										  					    where code = 'dtl_time')
										  	AND l.domain_id = (select domain_id
										  					    from arsdehnel_msub.domain
										  					    where code = 'dtl_location')
										  	AND arsdehnel_msub.fnc_date_match( ed.recurrence_ind, '" . date( 'm/d/Y', $curr_date ) . "', to_char(ed.start_date,'MM/DD/YYYY'), to_char(ed.end_date,'MM/DD/YYYY') ) = true
										    AND em.status_code != 'R'" );
			
			//if it's got events, start the loop
			if( $event_rs ){
				while( $event_rec = pg_fetch_array( $event_rs ) ){
					echo '<tr>';
					if( $event_rec['status_code'] == 'CA' ){
						$cancelled_formatting = ' style="text-decoration: line-through;"';
					}else{
						$cancelled_formatting = '';
					}
					echo '<td' . $cancelled_formatting . '>' . $event_rec['event_title'] . '</td>';
					echo '<td' . $cancelled_formatting . '>' . $event_rec['dates'] . '</td>';
					echo '<td' . $cancelled_formatting . '>' . $event_rec['times'] . '</td>';
					echo '<td' . $cancelled_formatting . '>' . $event_rec['location'] . '</td>';
					echo '<td' . $cancelled_formatting . '>' . $event_rec['coordinator'] . '</td>';
					echo '</tr>';
				}//end event loop
			}//end event_rs if
			
			//increment stuff
			$curr_date = $curr_date + 86400;
			$i++;
		
		}

	?>
</table>