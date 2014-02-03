class dao_arsdehnel_msub_domain_value {

	public $domain_value_id;
	public $domain_id;
	public $description;
	public $code;
	public $comments;
	public $created_by;
	public $created_date;
	public $modified_by;
	public $modified_date;

	//create
	public function create() {
		$sql = "INSERT INTO arsdehnel_msub.domain_value (
				domain_value_id
				,domain_id
				,description
				,code
				,comments
				,created_by
				,created_date
			) VALUES (
				nextval('arsdehnel_msub.domain_value_id_seq')
				," . nvl( $this->domain_id, 'null') . "
				,'" . pg_escape_string($this->description) . "'
				,'" . pg_escape_string($this->code) . "'
				,'" . pg_escape_string($this->comments) . "'
				," . $this->log_user_id . "
				,to_timestamp('" . nvl( $this->created_date, date('m/d/Y H:i:s') ) . "', 'MM/DD/YYYY HH:MI:SS')
			)";
		$domain_value_id = fnc_process_sql( $sql, 'arsdehnel_msub.domain_value_id_seq' );
		$this->domain_value_id = $domain_value_id;
	}


	//retrieve
	public function retrieve() {
		$rs	= fnc_rs_lookup( "SELECT * 
					  FROM arsdehnel_msub.domain_value
					  WHERE domain_value_id = " . $this->domain_value_id );

		$rec	= pg_fetch_assoc( $rs ); 

		$this	-> domain_value_id	= $rec['domain_value_id'];
		$this	-> domain_id	= $rec['domain_id'];
		$this	-> description	= $rec['description'];
		$this	-> code	= $rec['code'];
		$this	-> comments	= $rec['comments'];
		$this	-> created_by	= $rec['created_by'];
		$this	-> created_date	= $rec['created_date'];
		$this	-> modified_by	= $rec['modified_by'];
		$this	-> modified_date	= $rec['modified_date'];
	}


	//update
	public function update() {
		$sql = "UPDATE arsdehnel_msub.domain_value 
			SET
				domain_id = " . nvl( $this->domain_id, 'null') . ",
				description = '" . pg_escape_string($this->description) . "',
				code = '" . pg_escape_string($this->code) . "',
				comments = '" . pg_escape_string($this->comments) . "',
				modified_by = " . $this->log_user_id . ",
				modified_date = to_timestamp('" . nvl( $this->modified_date, date('m/d/Y H:i:s') ) . "', 'MM/DD/YYYY HH:MI:SS')
			WHERE domain_value_id = " . $this->domain_value_id;
		$domain_value_id = fnc_process_sql( $sql, null );
	}


	//save
	public function save(){
		if( nvl( $this -> domain_value_id, 0 ) == 0 ){
			$this->create();
		}else{
			$this->update();
		}
	}
}

