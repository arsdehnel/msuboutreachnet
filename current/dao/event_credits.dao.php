<?

class dao_arsdehnel_msub_event_credits {

	public $event_credit_id;
	public $event_master_id;
	public $type_id;
	public $per_unit_amt;
	public $per_unit_item_id;
	public $item_qty;
	public $item_desc;
	public $primary_ind;
	public $status_code;
	public $comments;
	public $created_by;
	public $created_date;
	public $modified_by;
	public $modified_date;

	//create
	public function create() {
		$sql = "INSERT INTO arsdehnel_msub.event_credits (
				event_credit_id
				,event_master_id
				,type_id
				,per_unit_amt
				,per_unit_item_id
				,item_qty
				,item_desc
				,primary_ind
				,status_code
				,comments
				,created_by
				,created_date
			) VALUES (
				nextval('arsdehnel_msub.event_credit_id_seq')
				," . nvl( $this->event_master_id, 'null') . "
				," . nvl( $this->type_id, 'null') . "
				," . nvl( $this->per_unit_amt, 'null') . "
				," . nvl( $this->per_unit_item_id, 'null') . "
				," . nvl( $this->item_qty, 'null') . "
				,'" . pg_escape_string($this->item_desc) . "'
				,'" . pg_escape_string($this->primary_ind) . "'
				,'" . pg_escape_string($this->status_code) . "'
				,'" . pg_escape_string($this->comments) . "'
				," . $this->log_user_id . "
				,to_timestamp('" . nvl( $this->created_date, date('m/d/Y H:i:s') ) . "', 'MM/DD/YYYY HH:MI:SS')
			)";
		$event_credit_id = fnc_process_sql( $sql, 'arsdehnel_msub.event_credit_id_seq' );
		$this->event_credit_id = $event_credit_id;
	}


	//retrieve
	public function retrieve() {
		$rs	= fnc_rs_lookup( "SELECT * 
					  FROM arsdehnel_msub.event_credits
					  WHERE event_credit_id = " . $this->event_credit_id );

		$rec	= pg_fetch_assoc( $rs ); 

		$this	-> event_credit_id	= $rec['event_credit_id'];
		$this	-> event_master_id	= $rec['event_master_id'];
		$this	-> type_id	= $rec['type_id'];
		$this	-> per_unit_amt	= $rec['per_unit_amt'];
		$this	-> per_unit_item_id	= $rec['per_unit_item_id'];
		$this	-> item_qty	= $rec['item_qty'];
		$this	-> item_desc	= $rec['item_desc'];
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
		$sql = "UPDATE arsdehnel_msub.event_credits 
			SET
				event_master_id = " . nvl( $this->event_master_id, 'null') . ",
				type_id = " . nvl( $this->type_id, 'null') . ",
				per_unit_amt = " . nvl( $this->per_unit_amt, 'null') . ",
				per_unit_item_id = " . nvl( $this->per_unit_item_id, 'null') . ",
				item_qty = " . nvl( $this->item_qty, 'null') . ",
				item_desc = '" . pg_escape_string($this->item_desc) . "',
				primary_ind = '" . pg_escape_string($this->primary_ind) . "',
				status_code = '" . pg_escape_string($this->status_code) . "',
				comments = '" . pg_escape_string($this->comments) . "',
				modified_by = " . $this->log_user_id . ",
				modified_date = to_timestamp('" . nvl( $this->modified_date, date('m/d/Y H:i:s') ) . "', 'MM/DD/YYYY HH:MI:SS')
			WHERE event_credit_id = " . $this->event_credit_id;
		$event_credit_id = fnc_process_sql( $sql, null );
	}


	//save
	public function save(){
		if( nvl( $this -> event_credit_id, 0 ) == 0 ){
			$this->create();
		}else{
			$this->update();
		}
	}
}

?>