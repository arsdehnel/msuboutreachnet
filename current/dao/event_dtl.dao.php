<?

class dao_arsdehnel_msub_event_dtl {

	public $event_dtl_id;
	public $event_master_id;
	public $recurrence_ind;
	public $start_date;
	public $end_date;
	public $start_time;
	public $end_time;
	public $location_id;
	public $primary_ind;
	public $status_code;
	public $comments;
	public $created_by;
	public $created_date;
	public $modified_by;
	public $modified_date;

	//create
	public function create() {
		$sql = "INSERT INTO arsdehnel_msub.event_dtl (
				event_dtl_id
				,event_master_id
				,recurrence_ind
				,start_date
				,end_date
				,start_time
				,end_time
				,location_id
				,primary_ind
				,status_code
				,comments
				,created_by
				,created_date
			) VALUES (
				nextval('arsdehnel_msub.event_dtl_id_seq')
				," . nvl( $this->event_master_id, 'null') . "
				,'" . pg_escape_string($this->recurrence_ind) . "'
				,to_date('" . $this->start_date . "','MM/DD/YYYY')
				,to_date('" . $this->end_date . "','MM/DD/YYYY')
				,'" . pg_escape_string($this->start_time) . "'
				,'" . pg_escape_string($this->end_time) . "'
				," . nvl( $this->location_id, 'null') . "
				,'" . pg_escape_string($this->primary_ind) . "'
				,'" . pg_escape_string($this->status_code) . "'
				,'" . pg_escape_string($this->comments) . "'
				," . $this->log_user_id . "
				,to_timestamp('" . nvl( $this->created_date, date('m/d/Y H:i:s') ) . "', 'MM/DD/YYYY HH:MI:SS')
			)";
		$event_dtl_id = fnc_process_sql( $sql, 'arsdehnel_msub.event_dtl_id_seq' );
		$this->event_dtl_id = $event_dtl_id;
	}


	//retrieve
	public function retrieve() {
		$rs	= fnc_rs_lookup( "SELECT * 
					  FROM arsdehnel_msub.event_dtl
					  WHERE event_dtl_id = " . $this->event_dtl_id );

		$rec	= pg_fetch_assoc( $rs ); 

		$this	-> event_dtl_id	= $rec['event_dtl_id'];
		$this	-> event_master_id	= $rec['event_master_id'];
		$this	-> recurrence_ind	= $rec['recurrence_ind'];
		$this	-> start_date	= $rec['start_date'];
		$this	-> end_date	= $rec['end_date'];
		$this	-> start_time	= $rec['start_time'];
		$this	-> end_time	= $rec['end_time'];
		$this	-> location_id	= $rec['location_id'];
		$this	-> primary_ind	= $rec['primary_ind'];
		$this	-> status_code	= $rec['status_code'];
		$this	-> comments	= $rec['comments'];
		$this	-> created_by	= $rec['created_by'];
		$this	-> created_date	= $rec['created_date'];
		$this	-> modified_by	= $rec['modified_by'];
		$this	-> modified_date	= $rec['modified_date'];
	}


	//update
	public function update() {
		$sql = "UPDATE arsdehnel_msub.event_dtl 
			SET
				event_master_id = " . nvl( $this->event_master_id, 'null') . ",
				recurrence_ind = '" . pg_escape_string($this->recurrence_ind) . "',
				start_date = to_date('" . $this->start_date . "','MM/DD/YYYY'),
				end_date = to_date('" . $this->start_date . "','MM/DD/YYYY'),
				start_time = '" . pg_escape_string($this->start_time) . "',
				end_time = '" . pg_escape_string($this->end_time) . "',
				location_id = " . nvl( $this->location_id, 'null') . ",
				primary_ind = '" . pg_escape_string($this->primary_ind) . "',
				status_code = '" . pg_escape_string($this->status_code) . "',
				comments = '" . pg_escape_string($this->comments) . "',
				modified_by = " . $this->log_user_id . ",
				modified_date = to_timestamp('" . nvl( $this->modified_date, date('m/d/Y H:i:s') ) . "', 'MM/DD/YYYY HH:MI:SS')
			WHERE event_dtl_id = " . $this->event_dtl_id;
		$event_dtl_id = fnc_process_sql( $sql, null );
	}


	//save
	public function save(){
		if( nvl( $this -> event_dtl_id, 0 ) == 0 ){
			$this->create();
		}else{
			$this->update();
		}
	}
}

?>