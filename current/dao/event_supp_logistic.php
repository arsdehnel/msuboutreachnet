class dao_arsdehnel_msub_event_supp_logistic {

	public $event_supp_lgstc_id;
	public $event_master_id;
	public $lgstc_code;
	public $time_code;
	public $personnel_id;
	public $status_code;
	public $comments;
	public $created_by;
	public $created_date;
	public $modified_by;
	public $modified_date;

	//create
	public function create() {
		$sql = "INSERT INTO arsdehnel_msub.event_supp_logistic (
				event_supp_lgstc_id
				,event_master_id
				,lgstc_code
				,time_code
				,personnel_id
				,status_code
				,comments
				,created_by
				,created_date
			) VALUES (
				nextval('arsdehnel_msub.event_supp_lgstc_id_seq')
				," . $this->event_master_id . "
				,'" . pg_escape_string($this->lgstc_code) . "'
				,'" . pg_escape_string($this->time_code) . "'
				," . $this->personnel_id . "
				,'" . pg_escape_string($this->status_code) . "'
				,'" . pg_escape_string($this->comments) . "'
				," . $this->user_id . "
				,to_timestamp('" . nvl( $this->created_date, date('m/d/Y H:i:s') ) . "', 'MM/DD/YYYY HH:MI:SS')
			)";
		$event_supp_lgstc_id = fnc_process_sql( $sql, 'arsdehnel_msub.event_supp_lgstc_id_seq' );
	}


	//update
	public function update() {
		$sql = "UPDATE arsdehnel_msub.event_supp_logistic 
			SET
				event_master_id = " . $this->event_master_id . ",
				lgstc_code = '" . pg_escape_string($this->lgstc_code) . "',
				time_code = '" . pg_escape_string($this->time_code) . "',
				personnel_id = " . $this->personnel_id . ",
				status_code = '" . pg_escape_string($this->status_code) . "',
				comments = '" . pg_escape_string($this->comments) . "',
				modified_by = " . $this->user_id . ",
				modified_date = to_timestamp('" . nvl( $this->modified_date, date('m/d/Y H:i:s') ) . "', 'MM/DD/YYYY HH:MI:SS')
			WHERE event_supp_lgstc_id = " . $this->event_supp_lgstc_id;
		$event_supp_lgstc_id = fnc_process_sql( $sql, null );
	}


	//save
	public function save(){
		if( nvl( $this -> event_supp_lgstc_id, 0 ) == 0 ){
			$this->create();
		}else{
			$this->update();
		}
	}
}

