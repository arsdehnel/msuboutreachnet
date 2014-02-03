class dao_arsdehnel_msub_event_supp_info {

	public $event_supp_info_id;
	public $event_master_id;
	public $info_code;
	public $info_content;
	public $comments;
	public $status_code;
	public $created_by;
	public $created_date;
	public $modified_by;
	public $modified_date;

	//create
	public function create() {
		$sql = "INSERT INTO arsdehnel_msub.event_supp_info (
				event_supp_info_id
				,event_master_id
				,info_code
				,info_content
				,comments
				,status_code
				,created_by
				,created_date
			) VALUES (
				nextval('arsdehnel_msub.event_supp_info_id_seq')
				," . $this->event_master_id . "
				,'" . pg_escape_string($this->info_code) . "'
				,'" . pg_escape_string($this->info_content) . "'
				,'" . pg_escape_string($this->comments) . "'
				,'" . pg_escape_string($this->status_code) . "'
				," . $this->user_id . "
				,to_timestamp('" . nvl( $this->created_date, date('m/d/Y H:i:s') ) . "', 'MM/DD/YYYY HH:MI:SS')
			)";
		$event_supp_info_id = fnc_process_sql( $sql, 'arsdehnel_msub.event_supp_info_id_seq' );
	}


	//update
	public function update() {
		$sql = "UPDATE arsdehnel_msub.event_supp_info 
			SET
				event_master_id = " . $this->event_master_id . ",
				info_code = '" . pg_escape_string($this->info_code) . "',
				info_content = '" . pg_escape_string($this->info_content) . "',
				comments = '" . pg_escape_string($this->comments) . "',
				status_code = '" . pg_escape_string($this->status_code) . "',
				modified_by = " . $this->user_id . "
				modified_date = to_timestamp('" . nvl( $this->modified_date, date('m/d/Y H:i:s') ) . "', 'MM/DD/YYYY HH:MI:SS')
			WHERE arsdehnel_msub.event_supp_info_id = " . $this->event_supp_info_id;
		$event_supp_info_id = fnc_process_sql( $sql, null );
	}


	//save
	public function save(){
		if( nvl( $this -> event_supp_info_id, 0 ) == 0 ){
			$this->create();
		}else{
			$this->update();
		}
	}
}

