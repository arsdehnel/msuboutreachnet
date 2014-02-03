<?

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
				,status_code
				,created_by
				,created_date
			) VALUES (
				nextval('arsdehnel_msub.event_supp_info_id_seq')
				," . $this->event_master_id . "
				,'" . pg_escape_string($this->info_code) . "'
				,'" . pg_escape_string($this->info_content) . "'
				,'A'
				," . $this->user_id . "
				,to_timestamp('" . nvl( $this->created_date, date('m/d/Y H:i:s') ) . "', 'MM/DD/YYYY HH:MI:SS')
			)";
		$event_supp_info_id = fnc_process_sql( $sql, 'arsdehnel_msub.event_supp_info_id_seq' );
	}


	//update
	public function update() {
	
		$sql = "UPDATE arsdehnel_msub.event_supp_info 
			SET info_content = '" . pg_escape_string($this->info_content) . "',
				status_code = 'A',
				modified_by = " . $this->user_id . ",
				modified_date = to_timestamp('" . nvl( $this->modified_date, date('m/d/Y H:i:s') ) . "', 'MM/DD/YYYY HH:MI:SS')
			WHERE event_master_id = " . $this->event_master_id . "
			  AND info_code = '" . $this->info_code . "'";
		$event_supp_info_id = fnc_process_sql( $sql, null );
	}

	//delete
	public function delete(){
		if( isset( $this->event_supp_info_id ) ){
		
			$sql = "DELETE 
					FROM arsdehnel_msub.event_supp_info
					WHERE event_supp_info_id = " . $this->event_supp_info_id;
		
		}else{
		
			$sql = "DELETE
					FROM arsdehnel_msub.event_supp_info
					WHERE event_master_id = " . $this->event_master_id . "
					  AND info_code = '" . $this->info_code . "'";
		
		}
		
		$return_id	= fnc_process_sql( $sql, null );
		
	}

	//save
	public function save(){
		$rec_count = fnc_first_value( "SELECT count(1)
									   FROM arsdehnel_msub.event_supp_info
									   WHERE event_master_id = " . $this->event_master_id . "
									     AND info_code = '" . $this->info_code . "'" );
		if( nvl( $rec_count, 0 ) == 0 ){
			$this->create();
		}else{
			$this->update();
		}
	}
}

?>