<?

	require_once('/home/www/pm_common/dao/msub/event_supp_info.dao.php');
	require_once('/home/www/pm_common/dao/msub/event_supp_date.dao.php');
	require_once('/home/www/pm_common/dao/msub/event_supp_logistic.dao.php');

class dao_arsdehnel_msub_event_master {

	//master info
	public $event_master_id;
	public $event_title;
	public $event_crn;
	public $event_rubric;
	public $event_number;
	public $event_section;
	public $event_quarter;
	public $event_semester;
	public $event_year;
	public $application_date;
	public $status_code;
	public $grading_ind;
	public $event_index;
	public $detail_code;
	public $event_type;
	public $sponsorship_ind;
	public $enrl_act;
	public $enrl_est;
	public $enrl_min;
	public $enrl_max;
	public $event_days;
	public $pax_days;
	public $selected_ind;
	public $repetition_ind;
	public $inv_comp_ind;
	public $eval_del_mthd;
	public $eval_cmpl_ind;
	public $sign_req_ind;
	public $room_setup_day_ind;
	public $otsd_cat_title;
	public $otsd_cat_cntct;
	public $otsd_cat_phone;
	public $created_by;
	public $created_date;
	public $modified_by;
	public $modified_date;
	//supp info
	public $outcms_cmts;
	public $pst_crse_wk;
	public $event_desc;
	public $rm_setup_notes;
	public $tgt_audience;
	public $spnsr_dtls;
	public $event_rmks;
	public $caterer_notes;
	public $eval_of_work;
	public $req_mtrls;
	public $caf_cmts;
	public $bdgt_notes;
	//supp dates
	public $grd_to_inst;
	public $grd_fm_inst;
	public $grd_to_reg;
	public $eval_to_inst;
	public $eval_fm_inst;
	//supp logistics
	public $rm_setup_time;
	public $rm_setup_personnel_id;
	public $rm_open_time;
	public $rm_open_personnel_id;
	public $rm_lock_time;
	public $rm_lock_personnel_id;
	public $catering_time;
	public $catering_personnel_id;
	//output values
	public $grading_desc;
	public $primary_credit;
	public $date_min;
	public $date_max;
	public $coordinator;
	public $setup_aa;
	public $close_aa;
	

	//  ------------------------------------------------------------------------------------------------------------------------  //
	//	------------------------------------------------------ BASIC CRUD ------------------------------------------------------  //
	//  ------------------------------------------------------------------------------------------------------------------------  //
	//CREATE
	public function create(){
				
	}
	
	//RETRIEVE
	public function retrieve(){
		
		$rs		= fnc_rs_lookup( "SELECT *
								  FROM arsdehnel_msub.event_master
								  WHERE event_master_id = " . $this->event_master_id );
								 
		$rec	= pg_fetch_assoc( $rs );
		
		//master info
		$this 	-> event_master_id		= $rec['event_master_id'];
		$this 	-> event_title			= $rec['event_title'];
		$this 	-> event_crn			= $rec['event_crn'];
		$this 	-> event_rubric			= $rec['event_rubric'];
		$this 	-> event_number			= $rec['event_number'];
		$this 	-> event_section		= $rec['event_section'];
		$this 	-> event_quarter		= $rec['event_quarter'];
		$this 	-> event_semester		= $rec['event_semester'];
		$this 	-> event_year			= $rec['event_year'];
		$this 	-> application_date		= $rec['application_date'];
		$this	-> status_code			= $rec['status_code'];
		$this 	-> grading_ind			= $rec['grading_ind'];
		$this 	-> event_index			= $rec['event_index'];
		$this 	-> detail_code			= $rec['detail_code'];
		$this 	-> event_type			= $rec['event_type'];
		$this 	-> sponsorship_ind		= $rec['sponsorship_ind'];
		$this 	-> enrl_act				= $rec['enrl_act'];
		$this 	-> enrl_est				= $rec['enrl_est'];
		$this 	-> enrl_min				= $rec['enrl_min'];
		$this 	-> enrl_max				= $rec['enrl_max'];
		$this 	-> event_days			= $rec['event_days'];
		$this 	-> pax_days				= $rec['pax_days'];
		$this 	-> selected_ind			= $rec['selected_ind'];
		$this 	-> repetition_ind		= $rec['repetition_ind'];
		$this 	-> inv_comp_ind			= $rec['inv_comp_ind'];
		$this 	-> eval_del_mthd		= $rec['eval_del_mthd'];
		$this 	-> eval_cmpl_ind		= $rec['eval_cmpl_ind'];
		$this 	-> sign_req_ind			= $rec['sign_req_ind'];
		$this 	-> rm_setup_day_ind		= $rec['rm_setup_day_ind'];
		$this 	-> otsd_cat_title		= $rec['otsd_cat_title'];
		$this 	-> otsd_cat_cntct		= $rec['otsd_cat_cntct'];
		$this 	-> otsd_cat_phone		= $rec['otsd_cat_phone'];
		$this 	-> created_by			= $rec['created_by'];
		$this 	-> created_date			= $rec['created_date'];
		$this 	-> modified_by			= $rec['modified_by'];
		$this 	-> modified_date		= $rec['modified_date'];
		
		//supp info
		$rs		= fnc_rs_lookup( "SELECT info_code
									,info_content
								  FROM arsdehnel_msub.event_supp_info
								  WHERE status_code = 'A'
								    AND event_master_id = " . $this->event_master_id );
								    
		if( $rs ){
		
			while( $rec = pg_fetch_array( $rs ) ){
			
				switch( $rec['info_code'] ){
				
					case "outcms_cmts":
					
						$this 	-> outcms_cmts			= $rec['info_content'];
						break;
				
					case "pst_crse_wk":
					
						$this 	-> pst_crse_wk			= $rec['info_content'];
						break;
				
					case "event_desc":
					
						$this 	-> event_desc			= $rec['info_content'];
						break;
				
					case "rm_setup_notes":
					
						$this 	-> rm_setup_notes		= $rec['info_content'];
						break;
				
					case "tgt_audience":
					
						$this 	-> tgt_audience			= $rec['info_content'];
						break;
				
					case "spnsr_dtls":
					
						$this 	-> spnsr_dtls			= $rec['info_content'];
						break;
				
					case "event_rmks":
					
						$this 	-> event_rmks			= $rec['info_content'];
						break;
				
					case "caterer_notes":
					
						$this 	-> caterer_notes		= $rec['info_content'];
						break;
				
					case "eval_of_work":
					
						$this 	-> eval_of_work			= $rec['info_content'];
						break;
				
					case "req_mtrls":
					
						$this 	-> req_mtrls			= $rec['info_content'];
						break;
				
					case "caf_cmts":
					
						$this 	-> caf_cmts				= $rec['info_content'];
						break;
				
					case "bdgt_notes":
					
						$this 	-> bdgt_notes			= $rec['info_content'];
						break;
				
				}//switch
			
			}//while
		
		}//if rs
		
		//supp dates
		$rs		= fnc_rs_lookup( "SELECT date_code
									,to_char(date_value,'MM/DD/YYYY') as  date_value
								  FROM arsdehnel_msub.event_supp_date
								  WHERE status_code = 'A'
								    AND event_master_id = " . $this->event_master_id );
								    
		if( $rs ){
		
			while( $rec = pg_fetch_array( $rs ) ){
			
				switch( $rec['date_code'] ){
				
					case "grd_to_inst":
					
						$this 	-> grd_to_inst			= $rec['date_value'];
						break;

					case "grd_fm_inst":
					
						$this 	-> grd_fm_inst			= $rec['date_value'];
						break;

					case "grd_to_reg":
					
						$this 	-> grd_to_reg			= $rec['date_value'];
						break;
						
					case "eval_to_inst":
					
						$this	-> eval_to_inst			= $rec['date_value'];
						break;
						
					case "eval_fm_inst":
					
						$this	-> eval_fm_inst			= $rec['date_value'];
						break;
						
				}//switch
				
			}//while
			
		}//if rs
		
		//supp logistics
		$rs		= fnc_rs_lookup( "SELECT esl.lgstc_code
									,esl.time_code
									,esl.personnel_id
									,dv.description as time_desc
								  FROM arsdehnel_msub.event_supp_logistic esl
								    INNER JOIN (SELECT code
								    			  ,description
								    			FROM arsdehnel_msub.vue_domain_value
								    			WHERE domain_code = 'dtl_time') dv ON esl.time_code = dv.code
								  WHERE esl.status_code = 'A'
								    AND esl.event_master_id = " . $this->event_master_id );
								    
		if( $rs ){
		
			while( $rec = pg_fetch_array( $rs ) ){
			
				switch( $rec['lgstc_code'] ){
				
					case "rm_setup":
					
						$this 	-> rm_setup_time			= $rec['time_code'];
						$this	-> rm_setup_personnel_id	= $rec['personnel_id'];
						break;

					case "rm_open":
					
						$this 	-> rm_open_time				= $rec['time_code'];
						$this	-> rm_open_personnel_id		= $rec['personnel_id'];
						break;

					case "rm_lock":
					
						$this 	-> rm_lock_time				= $rec['time_code'];
						$this	-> rm_lock_personnel_id		= $rec['personnel_id'];
						break;
						
					case "catering":
					
						$this 	-> catering_time			= $rec['time_code'];
						$this	-> catering_personnel_id	= $rec['personnel_id'];
						break;

				}//switch
				
			}//while
			
		}//if rs								    

		//dv lookups
		$this -> grading_desc		= fnc_first_value( "SELECT description
														FROM arsdehnel_msub.vue_domain_value
														WHERE domain_code = 'grading'
														  AND code = '" . $this->grading_ind . "'" );

		$this -> sponsorship_desc	= fnc_first_value( "SELECT description
														FROM arsdehnel_msub.vue_domain_value
														WHERE domain_code = 'sponsorship'
													  	  AND code = '" . $this->sponsorship_ind . "'" );

		$this -> status_desc		= fnc_first_value( "SELECT description
														FROM arsdehnel_msub.vue_domain_value
														WHERE domain_code = 'event_status'
														  AND code = '" . $this->status_code . "'" );

		$this -> event_type_desc	= fnc_first_value( "SELECT description
														FROM arsdehnel_msub.vue_domain_value
														WHERE domain_code = 'event_type'
														  AND code = '" . $this->event_type . "'" );
		
		//primary lookups
		$this -> primary_credit	= fnc_first_value( "SELECT item_desc
													FROM arsdehnel_msub.event_credits
													WHERE event_master_id = " . $this->event_master_id . "
													  AND primary_ind = 'Y'" );
													  
		//date lookups
		$dates_rs				= fnc_rs_lookup( "SELECT to_char(min(start_date),'MM/DD/YYYY') as start_date
													,to_char(max(end_date),'MM/DD/YYYY') as end_date
												  FROM arsdehnel_msub.event_dtl
												  WHERE event_master_id = " . $this->event_master_id . "
												    AND status_code = 'A'" ); 
		if( $dates_rs ){
			$dates_rec			= pg_fetch_array( $dates_rs );
			$this->date_min		= $dates_rec['start_date'];
			$this->date_max		= $dates_rec['end_date'];
		}
		
		//personnel
		$personnel_rs			= fnc_rs_lookup( "SELECT ep.psnl_role
													,p.first_name || ' ' || p.last_name as personnel_name
													,'(' || substr(pp.phone_nbr,1,3) || ') ' || substr(pp.phone_nbr,4,3) || ' - ' || substr(pp.phone_nbr,7,4) as phone_nbr
													,pe.email_addr
													,ep.primary_ind
													,ep.compensation
												  FROM arsdehnel_msub.event_personnel ep
												    INNER JOIN arsdehnel_msub.personnel p ON ep.personnel_id = p.personnel_id
												    LEFT JOIN (SELECT personnel_id
												    			 ,phone_nbr
												    		   FROM arsdehnel_msub.personnel_phone
												    		   WHERE status_code = 'A'
												    		     AND primary_ind = 'Y') pp ON pp.personnel_id = ep.personnel_id
												    LEFT JOIN (SELECT personnel_id
												    			 ,email_addr
												    		   FROM arsdehnel_msub.personnel_email
												    		   WHERE status_code = 'A'
												    		     AND primary_ind = 'Y') pe ON pe.personnel_id = ep.personnel_id
												  WHERE ep.event_master_id = " . $this->event_master_id . "
												    AND ep.status_code = 'A'" );
		if( $personnel_rs ){
			while( $personnel_rec = pg_fetch_array( $personnel_rs ) ){
				switch( $personnel_rec['psnl_role'] ){
					case "coordinator":
						$this		-> coordinator			= $personnel_rec['personnel_name'];
						$this		-> coordinator_phone	= $personnel_rec['phone_nbr'];
						$this		-> coordinator_email	= $personnel_rec['email_addr'];
						break;
					case "setup_aa":
						$this		-> setup_aa				= $personnel_rec['personnel_name'];
						break;
					case "close_aa":
						$this		-> close_aa				= $personnel_rec['personnel_name'];
						break;
					case "instructor":
						if( $personnel_rec['primary_ind'] == 'Y' ):
							$this	-> inst_comp			= $personnel_rec['compensation'];
						endif;
						break;
				}
			}
		}
				
	}
	
	//update
	public function update() {
	
		$sql = "UPDATE arsdehnel_msub.event_master 
			SET
				event_title = '" . pg_escape_string($this->event_title) . "',
				event_crn = '" . pg_escape_string($this->event_crn) . "',
				event_rubric = '" . pg_escape_string($this->event_rubric) . "',
				event_number = '" . pg_escape_string($this->event_number) . "',
				event_section = '" . pg_escape_string($this->event_section) . "',
				event_quarter = '" . pg_escape_string($this->event_quarter) . "',
				event_semester = '" . pg_escape_string($this->event_semester) . "',
				event_year = '" . pg_escape_string($this->event_year) . "',
				application_date = '" . pg_escape_string($this->application_date) . "',
				status_code = '" . pg_escape_string($this->status_code) . "',
				grading_ind = '" . pg_escape_string($this->grading_ind) . "',
				event_index = " . nvl( $this->event_index, 'null' ) . ",
				detail_code = '" . pg_escape_string($this->detail_code) . "',
				event_type = '" . pg_escape_string($this->event_type) . "',
				sponsorship_ind = '" . pg_escape_string($this->sponsorship_ind) . "',
				enrl_act = " . nvl( $this->enrl_act, 'null' ) . ",
				enrl_est = " . nvl( $this->enrl_est, 'null' ) . ",
				enrl_min = " . nvl( $this->enrl_min, 'null' ) . ",
				enrl_max = " . nvl( $this->enrl_max, 'null' ) . ",
				event_days = " . nvl( $this->event_days, 'null' ) . ",
				pax_days = " . nvl( $this->pax_days, 'null' ) . ",
				selected_ind = '" . pg_escape_string($this->selected_ind) . "',
				repetition_ind = '" . pg_escape_string($this->repetition_ind) . "',
				inv_comp_ind = '" . pg_escape_string($this->inv_comp_ind) . "',
				eval_del_mthd = '" . pg_escape_string($this->eval_del_mthd) . "',
				eval_cmpl_ind = '" . pg_escape_string($this->eval_cmpl_ind) . "',
				sign_req_ind = '" . pg_escape_string($this->sign_req_ind) . "',
				rm_setup_day_ind = '" . pg_escape_string($this->rm_setup_day_ind) . "',
				otsd_cat_title = '" . pg_escape_string($this->otsd_cat_title) . "',
				otsd_cat_cntct = '" . pg_escape_string($this->otsd_cat_cntct) . "',
				otsd_cat_phone = '" . pg_escape_string($this->otsd_cat_phone) . "',
				modified_by = " . $this->user_id . ",
				modified_date = to_timestamp('" . nvl( $this->modified_date, date('m/d/Y H:i:s') ) . "', 'MM/DD/YYYY HH:MI:SS')
			WHERE event_master_id = " . $this->event_master_id;
		$event_master_id = fnc_process_sql( $sql, null );
		
		unset( $sql );
		
		
		//supp info
		$rs = fnc_rs_lookup( "SELECT code
							  FROM arsdehnel_msub.vue_domain_value
							  WHERE domain_code = 'event_supp_info_type'" );
							  
		if( $rs ){
		
			$event_supp_info_obj								= new dao_arsdehnel_msub_event_supp_info();
			$process_ind										= false;

			while( $rec = pg_fetch_array( $rs ) ){
			
				$event_supp_info_obj	-> event_master_id			= $_POST['event_master_id'];
				$event_supp_info_obj	-> user_id					= $_SESSION['user_id'];
				$event_supp_info_obj	-> info_code				= $rec['code'];
			
				switch( $rec['code'] ){
				
					case "outcms_cmts":
					
						if( isset( $this->outcms_cmts ) && $this->outcms_cmts != '' ){
							$event_supp_info_obj 	-> info_content		= $this->outcms_cmts;
							$event_supp_info_obj	-> save();
						}else{
							$event_supp_info_obj	-> delete();
						}
						break;
										
					case "caterer_notes":
					
						if( isset( $this->caterer_notes ) && $this->caterer_notes != '' ){
							$event_supp_info_obj 	-> info_content		= $this->caterer_notes;
							$event_supp_info_obj	-> save();
						}else{
							$event_supp_info_obj	-> delete();
						}
						break;
										
					case "event_rmks":
					
						if( isset( $this->event_rmks ) && $this->event_rmks != '' ){
							$event_supp_info_obj 	-> info_content		= $this->event_rmks;
							$event_supp_info_obj	-> save();
						}else{
							$event_supp_info_obj	-> delete();
						}
						break;
										
					case "event_desc":
					
						if( isset( $this->event_desc ) && $this->event_desc != '' ){
							$event_supp_info_obj 	-> info_content		= $this->event_desc;
							$event_supp_info_obj	-> save();
						}else{
							$event_supp_info_obj	-> delete();
						}
						break;
										
					case "tgt_audience":
					
						if( isset( $this->tgt_audience ) && $this->tgt_audience != '' ){
							$event_supp_info_obj 	-> info_content		= $this->tgt_audience;
							$event_supp_info_obj	-> save();
						}else{
							$event_supp_info_obj	-> delete();
						}
						break;
										
					case "eval_of_work":
					
						if( isset( $this->eval_of_work ) && $this->eval_of_work != '' ){
							$event_supp_info_obj 	-> info_content		= $this->eval_of_work;
							$event_supp_info_obj	-> save();
						}else{
							$event_supp_info_obj	-> delete();
						}
						break;
										
					case "req_mtrls":
					
						if( isset( $this->req_mtrls ) && $this->req_mtrls != '' ){
							$event_supp_info_obj 	-> info_content		= $this->req_mtrls;
							$event_supp_info_obj	-> save();
						}else{
							$event_supp_info_obj	-> delete();
						}
						break;
										
					case "pst_crse_wk":
					
						if( isset( $this->pst_crse_wk ) && $this->pst_crse_wk != '' ){
							$event_supp_info_obj 	-> info_content		= $this->pst_crse_wk;
							$event_supp_info_obj	-> save();
						}else{
							$event_supp_info_obj	-> delete();
						}
						break;
										
					case "caf_cmts":
					
						if( isset( $this->caf_cmts ) && $this->caf_cmts != '' ){
							$event_supp_info_obj 	-> info_content		= $this->caf_cmts;
							$event_supp_info_obj	-> save();
						}else{
							$event_supp_info_obj	-> delete();
						}
						break;
										
					case "bdgt_notes":
					
						if( isset( $this->bdgt_notes ) && $this->bdgt_notes != '' ){
							$event_supp_info_obj 	-> info_content		= $this->bdgt_notes;
							$event_supp_info_obj	-> save();
						}else{
							$event_supp_info_obj	-> delete();
						}
						break;
										
					case "spnsr_dtls":
					
						if( isset( $this->spnsr_dtls ) && $this->spnsr_dtls != '' ){
							$event_supp_info_obj 	-> info_content		= $this->spnsr_dtls;
							$event_supp_info_obj	-> save();
						}else{
							$event_supp_info_obj	-> delete();
						}
						break;
										
					case "rm_setup_notes":
					
						if( isset( $this->rm_setup_notes ) && $this->rm_setup_notes != '' ){
							$event_supp_info_obj 	-> info_content		= $this->rm_setup_notes;
							$event_supp_info_obj	-> save();
						}else{
							$event_supp_info_obj	-> delete();
						}
						break;
										
				}
				
			}
					
		}//if rs
		
		unset( $sql );
		
		//supp dates
		$rs = fnc_rs_lookup( "SELECT code
							  FROM arsdehnel_msub.vue_domain_value
							  WHERE domain_code = 'event_supp_date_code'" );
							  
		if( $rs ){
		
			$event_supp_date_obj								= new dao_arsdehnel_msub_event_supp_date();

			while( $rec = pg_fetch_array( $rs ) ){
			
				$event_supp_date_obj	-> event_master_id			= $_POST['event_master_id'];
				$event_supp_date_obj	-> user_id					= $_SESSION['user_id'];
				$event_supp_date_obj	-> date_code				= $rec['code'];
			
				switch( $rec['code'] ){
				
					case "grd_to_inst":
					
						if( isset( $this->grd_to_inst ) && $this->grd_to_inst != '' ){
							$event_supp_date_obj 	-> date_value		= $this->grd_to_inst;
							$event_supp_date_obj	-> save();
						}else{
							$event_supp_date_obj	-> delete();
						}
						break;

					case "grd_fm_inst":
					
						if( isset( $this->grd_fm_inst ) && $this->grd_fm_inst != '' ){
							$event_supp_date_obj 	-> date_value		= $this->grd_fm_inst;
							$event_supp_date_obj	-> save();
						}else{
							$event_supp_date_obj	-> delete();
						}
						break;

					case "grd_to_reg":
					
						if( isset( $this->grd_to_reg ) && $this->grd_to_reg != '' ){
							$event_supp_date_obj 	-> date_value		= $this->grd_to_reg;
							$event_supp_date_obj	-> save();
						}else{
							$event_supp_date_obj	-> delete();
						}
						break;

				}
							
			}
					
		}//if rs
		
		unset( $sql );
		
		//supp logistics
		$rs = fnc_rs_lookup( "SELECT code
							  FROM arsdehnel_msub.vue_domain_value
							  WHERE domain_code = 'event_supp_lgstc_code'" );
							  
		if( $rs ){
		
			$event_supp_lgstc_obj								= new dao_arsdehnel_msub_event_supp_logistic();

			while( $rec = pg_fetch_array( $rs ) ){
			
				$event_supp_lgstc_obj	-> event_master_id			= $_POST['event_master_id'];
				$event_supp_lgstc_obj	-> user_id					= $_SESSION['user_id'];
				$event_supp_lgstc_obj	-> lgstc_code				= $rec['code'];
				$event_supp_lgstc_obj	-> status_code				= 'A';
			
				switch( $rec['code'] ){
				
					case "rm_open":
					
						if( ( isset( $this->rm_open_time ) && $this->rm_open_time != '' ) || ( isset( $this->rm_open_personnel_id ) && $this->rm_open_personnel_id != '' ) ){
							$event_supp_lgstc_obj 	-> time_code		= $this->rm_open_time;
							$event_supp_lgstc_obj 	-> personnel_id		= nvl( $this->rm_open_personnel_id, 'null' );
							$event_supp_lgstc_obj	-> save();
						}else{
							$event_supp_lgstc_obj	-> delete();
						}
						break;

					case "rm_lock":
					
						if( ( isset( $this->rm_lock_time ) && $this->rm_lock_time != '' ) || ( isset( $this->rm_lock_personnel_id ) && $this->rm_lock_personnel_id != '' ) ){
							$event_supp_lgstc_obj 	-> time_code		= $this->rm_lock_time;
							$event_supp_lgstc_obj 	-> personnel_id		= nvl( $this->rm_lock_personnel_id, 'null' );
							$event_supp_lgstc_obj	-> save();
						}else{
							$event_supp_lgstc_obj	-> delete();
						}
						break;
						
					case "catering":
					
						if( ( isset( $this->catering_time ) && $this->catering_time != '' ) || ( isset( $this->catering_personnel_id ) && $this->catering_personnel_id != '' ) ){
							$event_supp_lgstc_obj 	-> time_code		= $this->catering_time;
							$event_supp_lgstc_obj 	-> personnel_id		= nvl( $this->catering_personnel_id, 'null' );
							$event_supp_lgstc_obj	-> save();
						}else{
							$event_supp_lgstc_obj	-> delete();
						}
						break;
						
					case "rm_setup":
					
						if( ( isset( $this->rm_setup_time ) && $this->rm_setup_time != '' ) || ( isset( $this->rm_setup_personnel_id ) && $this->rm_setup_personnel_id != '' ) ){
							$event_supp_lgstc_obj 	-> time_code		= $this->rm_setup_time;
							$event_supp_lgstc_obj 	-> personnel_id		= nvl( $this->rm_setup_personnel_id, 'null' );
							$event_supp_lgstc_obj	-> save();
						}else{
							$event_supp_lgstc_obj	-> delete();
						}
						break;

				}
							
			}
					
		}//if rs

	}//end update
	
	//DELETE
	public function delete(){
			
	}
	
	//  ------------------------------------------------------------------------------------------------------------------------  //
	//	------------------------------------------------------ CUSTOM STUFF ----------------------------------------------------  //
	//  ------------------------------------------------------------------------------------------------------------------------  //
	public function save(){
		
		if( nvl( $this -> event_master_id, 0 ) == 0 ){
			$this->create();
		}else{
			$this->update();
		}
	
	}
	
	public function retrieve_next_number(){
	
		$curr_nbr	= fnc_first_value( "SELECT max(cast(event_number as double precision))
										FROM arsdehnel_msub.event_master
										WHERE event_rubric = '" . $this->event_rubric . "'
  										  AND length(event_number) > 0" );
		
		echo ( $curr_nbr + 1 );
	
	}
	
}

?>