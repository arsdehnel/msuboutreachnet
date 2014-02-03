class dao_arsdehnel_msub_event_master {

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
	public $rm_setup_day_ind;
	public $otsd_cat_title;
	public $otsd_cat_cntct;
	public $otsd_cat_phone;
	public $created_by;
	public $created_date;
	public $modified_by;
	public $modified_date;

	//create
	public function create() {
		$sql = "INSERT INTO arsdehnel_msub.event_master (
				event_master_id
				,event_title
				,event_crn
				,event_rubric
				,event_number
				,event_section
				,event_quarter
				,event_semester
				,event_year
				,application_date
				,status_code
				,grading_ind
				,event_index
				,detail_code
				,event_type
				,sponsorship_ind
				,enrl_act
				,enrl_est
				,enrl_min
				,enrl_max
				,event_days
				,pax_days
				,selected_ind
				,repetition_ind
				,inv_comp_ind
				,eval_del_mthd
				,eval_cmpl_ind
				,sign_req_ind
				,rm_setup_day_ind
				,otsd_cat_title
				,otsd_cat_cntct
				,otsd_cat_phone
				,created_by
				,created_date
			) VALUES (
				nextval('arsdehnel_msub.event_master_id_seq')
				,'" . pg_escape_string($this->event_title) . "'
				,'" . pg_escape_string($this->event_crn) . "'
				,'" . pg_escape_string($this->event_rubric) . "'
				,'" . pg_escape_string($this->event_number) . "'
				,'" . pg_escape_string($this->event_section) . "'
				,'" . pg_escape_string($this->event_quarter) . "'
				,'" . pg_escape_string($this->event_semester) . "'
				,'" . pg_escape_string($this->event_year) . "'
				,'" . pg_escape_string($this->application_date) . "'
				,'" . pg_escape_string($this->status_code) . "'
				,'" . pg_escape_string($this->grading_ind) . "'
				," . $this->event_index . "
				,'" . pg_escape_string($this->detail_code) . "'
				,'" . pg_escape_string($this->event_type) . "'
				,'" . pg_escape_string($this->sponsorship_ind) . "'
				," . $this->enrl_act . "
				," . $this->enrl_est . "
				," . $this->enrl_min . "
				," . $this->enrl_max . "
				," . $this->event_days . "
				," . $this->pax_days . "
				,'" . pg_escape_string($this->selected_ind) . "'
				,'" . pg_escape_string($this->repetition_ind) . "'
				,'" . pg_escape_string($this->inv_comp_ind) . "'
				,'" . pg_escape_string($this->eval_del_mthd) . "'
				,'" . pg_escape_string($this->eval_cmpl_ind) . "'
				,'" . pg_escape_string($this->sign_req_ind) . "'
				,'" . pg_escape_string($this->rm_setup_day_ind) . "'
				,'" . pg_escape_string($this->otsd_cat_title) . "'
				,'" . pg_escape_string($this->otsd_cat_cntct) . "'
				,'" . pg_escape_string($this->otsd_cat_phone) . "'
				," . $this->user_id . "
				,to_timestamp('" . nvl( $this->created_date, date('m/d/Y H:i:s') ) . "', 'MM/DD/YYYY HH:MI:SS')
			)";
		$event_master_id = fnc_process_sql( $sql, 'arsdehnel_msub.event_master_id_seq' );
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
				event_index = " . $this->event_index . ",
				detail_code = '" . pg_escape_string($this->detail_code) . "',
				event_type = '" . pg_escape_string($this->event_type) . "',
				sponsorship_ind = '" . pg_escape_string($this->sponsorship_ind) . "',
				enrl_act = " . $this->enrl_act . ",
				enrl_est = " . $this->enrl_est . ",
				enrl_min = " . $this->enrl_min . ",
				enrl_max = " . $this->enrl_max . ",
				event_days = " . $this->event_days . ",
				pax_days = " . $this->pax_days . ",
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
				modified_by = " . $this->user_id . "
				modified_date = to_timestamp('" . nvl( $this->modified_date, date('m/d/Y H:i:s') ) . "', 'MM/DD/YYYY HH:MI:SS')
			WHERE arsdehnel_msub.event_master_id = " . $this->event_master_id;
		$event_master_id = fnc_process_sql( $sql, null );
	}


	//save
	public function save(){
		if( nvl( $this -> event_master_id, 0 ) == 0 ){
			$this->create();
		}else{
			$this->update();
		}
	}
}

