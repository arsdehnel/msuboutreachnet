<?

	require_once('/home/www/pm_common/system.php');
	
	prc_data_grid( "select em.event_master_id,
						em.event_title as \"Title\",
						to_char(ed.start_date,'MM/DD/YYYY') || ' - ' || to_char(ed.end_date,'MM/DD/YYYY') as dates,
						st.description || ' - ' || et.description as times,
						ed.start_date as \"Start Date\",
						ed.end_date as \"End Date\",
						l.description as \"Location\",
						c.last_name || ', ' || c.first_name as \"Coordinator\",
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
					  AND em.status_code != 'R'
					  AND ed.start_date <= to_date('" . $_POST['end_date'] . "','MM/DD/YYYY')
					  AND ed.end_date >= to_date('" . $_POST['start_date'] . "','MM/DD/YYYY')" );
					  
	/*
	
	select e.event_id,
		msuboutreachnet.fnc_event_code_lookup ( e.event_id ) "Event Code",
		e.event_title "Title",
		dtl.dtl_start_date "Start Date",
		dtl.dtl_end_date "End Date",
		msuboutreachnet.fnc_dtl_days_lookup( dtl.dtl_recurrence, dtl.dtl_start_date, dtl.dtl_end_date, 'rpt_calendar_operations' ) "Days",
		msuboutreachnet.fnc_time_value_lookup( dtl.dtl_start_time ) + '-' + msuboutreachnet.fnc_time_value_lookup( dtl.dtl_end_time ) "Times",
		dv.description "Location",
		e.evaluations_sent_to_instructor "Evals to Inst.",
		IsNull(eo.last_name + ',','') + IsNull(eo.first_name,'') "Instructor",
		IsNull(c.last_name + ',','') + IsNull(c.first_name,'') "Coordinator",
		IsNull(saa.last_name + ',','') + IsNull(saa.first_name,'') + '/' + IsNull(caa.last_name + ',','') + IsNull(caa.first_name,'') "Admin Assts",
		e.event_status
	from tbl_events e,									--events
		tbl_event_dtl dtl,								--event_dtl
		(select ep.event_id,							--event owner
			p.first_name,
			p.last_name
		 from personnel p,
			tbl_event_personnel ep
		 where p.personnel_id = ep.personnel_id
			and ep.primary_ind = 'Y') eo,
		(select personnel_id,							--coordinator
			first_name,
			last_name
		 from personnel) c,
		(select personnel_id,							--setup admin asst
			first_name,
			last_name
		 from personnel) saa,
		(select personnel_id,							--close admin asst
			first_name,
			last_name
		 from personnel) caa,
		(select dv.domain_value_id, dv.description
		 from domain_value dv
			inner join domain d on d.domain_id = dv.domain_id
		 where d.code = 'dtl_location') dv
	where e.event_id = eo.event_id
		and e.event_id = dtl.event_id
		and e.coordinator_id = c.personnel_id
		and e.setup_adminasst_id = saa.personnel_id
		and e.close_adminasst_id = caa.personnel_id
		and dtl.location_id = dv.domain_value_id
		and e.event_status <> 'R'
		and dtl.dtl_start_date <= @v_rpt_end_date
		and dtl.dtl_end_date >= @v_rpt_start_date
	order by dtl.dtl_start_date,
		dtl.dtl_end_date,
		e.event_title
	
	*/				  

?>