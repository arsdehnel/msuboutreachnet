class dao_arsdehnel_msub_event_budget {

	public $event_budget_id;
	public $event_master_id;
	public $budget_item_id;
	public $budget_type;
	public $proj_nbr;
	public $proj_cost;
	public $act_nbr;
	public $act_cost;
	public $status_code;
	public $comments;
	public $created_by;
	public $created_date;
	public $modified_by;
	public $modified_date;

	//create
	public function create() {
		$sql = "INSERT INTO arsdehnel_msub.event_budget (
				event_budget_id
				,event_master_id
				,budget_item_id
				,budget_type
				,proj_nbr
				,proj_cost
				,act_nbr
				,act_cost
				,status_code
				,comments
				,created_by
				,created_date
			) VALUES (
				nextval('arsdehnel_msub.event_budget_id_seq')
				," . nvl( $this->event_master_id, 'null') . "
				," . nvl( $this->budget_item_id, 'null') . "
				,'" . pg_escape_string($this->budget_type) . "'
				," . nvl( $this->proj_nbr, 'null') . "
				," . nvl( $this->proj_cost, 'null') . "
				," . nvl( $this->act_nbr, 'null') . "
				," . nvl( $this->act_cost, 'null') . "
				,'" . pg_escape_string($this->status_code) . "'
				,'" . pg_escape_string($this->comments) . "'
				," . $this->log_user_id . "
				,to_timestamp('" . nvl( $this->created_date, date('m/d/Y H:i:s') ) . "', 'MM/DD/YYYY HH:MI:SS')
			)";
		$event_budget_id = fnc_process_sql( $sql, 'arsdehnel_msub.event_budget_id_seq' );
		$this->event_budget_id = $event_budget_id;
	}


	//retrieve
	public function retrieve() {
		$rs	= fnc_rs_lookup( "SELECT * 
					  FROM arsdehnel_msub.event_budget
					  WHERE event_budget_id = " . $this->event_budget_id );

		$rec	= pg_fetch_assoc( $rs ); 

		$this	-> event_budget_id	= $rec['event_budget_id'];
		$this	-> event_master_id	= $rec['event_master_id'];
		$this	-> budget_item_id	= $rec['budget_item_id'];
		$this	-> budget_type	= $rec['budget_type'];
		$this	-> proj_nbr	= $rec['proj_nbr'];
		$this	-> proj_cost	= $rec['proj_cost'];
		$this	-> act_nbr	= $rec['act_nbr'];
		$this	-> act_cost	= $rec['act_cost'];
		$this	-> status_code	= $rec['status_code'];
		$this	-> comments	= $rec['comments'];
		$this	-> created_by	= $rec['created_by'];
		$this	-> created_date	= $rec['created_date'];
		$this	-> modified_by	= $rec['modified_by'];
		$this	-> modified_date	= $rec['modified_date'];
	}


	//update
	public function update() {
		$sql = "UPDATE arsdehnel_msub.event_budget 
			SET
				event_master_id = " . nvl( $this->event_master_id, 'null') . ",
				budget_item_id = " . nvl( $this->budget_item_id, 'null') . ",
				budget_type = '" . pg_escape_string($this->budget_type) . "',
				proj_nbr = " . nvl( $this->proj_nbr, 'null') . ",
				proj_cost = " . nvl( $this->proj_cost, 'null') . ",
				act_nbr = " . nvl( $this->act_nbr, 'null') . ",
				act_cost = " . nvl( $this->act_cost, 'null') . ",
				status_code = '" . pg_escape_string($this->status_code) . "',
				comments = '" . pg_escape_string($this->comments) . "',
				modified_by = " . $this->log_user_id . ",
				modified_date = to_timestamp('" . nvl( $this->modified_date, date('m/d/Y H:i:s') ) . "', 'MM/DD/YYYY HH:MI:SS')
			WHERE event_budget_id = " . $this->event_budget_id;
		$event_budget_id = fnc_process_sql( $sql, null );
	}


	//save
	public function save(){
		if( nvl( $this -> event_budget_id, 0 ) == 0 ){
			$this->create();
		}else{
			$this->update();
		}
	}
}

