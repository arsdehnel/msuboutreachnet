<?

class dao_arsdehnel_msub_event_personnel {

	public $event_personnel_id;
	public $event_master_id;
	public $psnl_type;
	public $psnl_role;
	public $personnel_id;
	public $compensation;
	public $pymt_method;
	public $primary_ind;
	public $status_code;
	public $comments;
	public $created_by;
	public $created_date;
	public $modified_by;
	public $modified_date;

	//create
	public function create() {
		$sql = "INSERT INTO arsdehnel_msub.event_personnel (
				event_personnel_id
				,event_master_id
				,psnl_type
				,psnl_role
				,personnel_id
				,compensation
				,pymt_method
				,primary_ind
				,status_code
				,comments
				,created_by
				,created_date
			) VALUES (
				nextval('arsdehnel_msub.event_personnel_id_seq')
				," . nvl( $this->event_master_id, 'null') . "
				,'" . pg_escape_string($this->psnl_type) . "'
				,'" . pg_escape_string($this->psnl_role) . "'
				," . nvl( $this->personnel_id, 'null') . "
				," . nvl( $this->compensation, 'null') . "
				,'" . pg_escape_string($this->pymt_method) . "'
				,'" . pg_escape_string($this->primary_ind) . "'
				,'" . pg_escape_string($this->status_code) . "'
				,'" . pg_escape_string($this->comments) . "'
				," . $this->log_user_id . "
				,to_timestamp('" . nvl( $this->created_date, date('m/d/Y H:i:s') ) . "', 'MM/DD/YYYY HH:MI:SS')
			)";
		$event_personnel_id = fnc_process_sql( $sql, 'arsdehnel_msub.event_personnel_id_seq' );
		$this->event_personnel_id = $event_personnel_id;
	}


	//retrieve
	public function retrieve() {
		$rs	= fnc_rs_lookup( "SELECT * 
					  FROM arsdehnel_msub.event_personnel
					  WHERE event_personnel_id = " . $this->event_personnel_id );

		$rec	= pg_fetch_assoc( $rs ); 

		$this	-> event_personnel_id	= $rec['event_personnel_id'];
		$this	-> event_master_id	= $rec['event_master_id'];
		$this	-> psnl_type	= $rec['psnl_type'];
		$this	-> psnl_role	= $rec['psnl_role'];
		$this	-> personnel_id	= $rec['personnel_id'];
		$this	-> compensation	= $rec['compensation'];
		$this	-> pymt_method	= $rec['pymt_method'];
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
		$sql = "UPDATE arsdehnel_msub.event_personnel 
			SET
				event_master_id = " . nvl( $this->event_master_id, 'null') . ",
				psnl_type = '" . pg_escape_string($this->psnl_type) . "',
				psnl_role = '" . pg_escape_string($this->psnl_role) . "',
				personnel_id = " . nvl( $this->personnel_id, 'null') . ",
				compensation = " . nvl( $this->compensation, 'null') . ",
				pymt_method = '" . pg_escape_string($this->pymt_method) . "',
				primary_ind = '" . pg_escape_string($this->primary_ind) . "',
				status_code = '" . pg_escape_string($this->status_code) . "',
				comments = '" . pg_escape_string($this->comments) . "',
				modified_by = " . $this->log_user_id . ",
				modified_date = to_timestamp('" . nvl( $this->modified_date, date('m/d/Y H:i:s') ) . "', 'MM/DD/YYYY HH:MI:SS')
			WHERE event_personnel_id = " . $this->event_personnel_id;
		$event_personnel_id = fnc_process_sql( $sql, null );
	}


	//save
	public function save(){
		if( nvl( $this -> event_personnel_id, 0 ) == 0 ){
			$this->create();
		}else{
			$this->update();
		}
	}
}

?>