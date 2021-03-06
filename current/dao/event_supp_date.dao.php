<?

class dao_arsdehnel_msub_event_supp_date {

	public $event_supp_date_id;
	public $event_master_id;
	public $date_code;
	public $date_value;
	public $status_code;
	public $comments;
	public $created_by;
	public $created_date;
	public $modified_by;
	public $modified_date;

	//create
	public function create() {
		$sql = "INSERT INTO arsdehnel_msub.event_supp_date (
				event_supp_date_id
				,event_master_id
				,date_code
				,date_value
				,status_code
				,created_by
				,created_date
			) VALUES (
				nextval('arsdehnel_msub.event_supp_date_id_seq')
				," . $this->event_master_id . "
				,'" . pg_escape_string($this->date_code) . "'
				,to_date('" . $this->date_value . "','MM/DD/YYYY')
				,'A'
				," . $this->user_id . "
				,to_timestamp('" . nvl( $this->created_date, date('m/d/Y H:i:s') ) . "', 'MM/DD/YYYY HH:MI:SS')
			)";
		$event_supp_date_id = fnc_process_sql( $sql, 'arsdehnel_msub.event_supp_date_id_seq' );
	}


	//update
	public function update() {
		$sql = "UPDATE arsdehnel_msub.event_supp_date 
			SET
				date_value = to_date('" . $this->date_value . "','MM/DD/YYYY'),
				status_code = 'A',
				modified_by = " . $this->user_id . ",
				modified_date = to_timestamp('" . nvl( $this->modified_date, date('m/d/Y H:i:s') ) . "', 'MM/DD/YYYY HH:MI:SS')
			WHERE event_master_id = " . $this->event_master_id . "
			  AND date_code = '" . $this->date_code . "'";
			  
		//echo $sql . '<br />';
		$event_supp_date_id = fnc_process_sql( $sql, null );
	}

	
	//delete
	public function delete(){
		if( isset( $this->event_supp_date_id ) ){
		
			$sql = "DELETE 
					FROM arsdehnel_msub.event_supp_date
					WHERE event_supp_date_id = " . $this->event_supp_date_id;
		
		}else{
		
			$sql = "DELETE
					FROM arsdehnel_msub.event_supp_date
					WHERE event_master_id = " . $this->event_master_id . "
					  AND date_code = '" . $this->date_code . "'";
		
		}
		
		$return_id	= fnc_process_sql( $sql, null );
		
	}
	
	
	//save
	public function save(){
		$rec_count = fnc_first_value( "SELECT count(1)
									   FROM arsdehnel_msub.event_supp_date
									   WHERE event_master_id = " . $this->event_master_id . "
									     AND date_code = '" . $this->date_code . "'" );
		if( nvl( $rec_count, 0 ) == 0 ){
			$this->create();
		}else{
			$this->update();
		}
	}
	
}

?>