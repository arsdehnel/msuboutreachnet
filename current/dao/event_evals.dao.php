<?

class dao_arsdehnel_msub_event_evals {

	public $event_eval_id;
	public $event_master_id;
	public $q1_ansr;
	public $q2_ansr;
	public $q3_ansr;
	public $q4_ansr;
	public $q5_ansr;
	public $q6_ansr;
	public $q7_ansr;
	public $q8_ansr;
	public $inst_feedback;
	public $ctnt_feedback;
	public $loc_feedback;
	public $otr_feedback;
	public $addl_courses;
	public $eval_date;
	public $status_code;
	public $comments;
	public $created_by;
	public $created_date;
	public $modified_by;
	public $modified_date;

	//create
	public function create() {
		$sql = "INSERT INTO arsdehnel_msub.event_evals (
				event_eval_id
				,event_master_id
				,q1_ansr
				,q2_ansr
				,q3_ansr
				,q4_ansr
				,q5_ansr
				,q6_ansr
				,q7_ansr
				,q8_ansr
				,inst_feedback
				,ctnt_feedback
				,loc_feedback
				,otr_feedback
				,addl_courses
				,eval_date
				,status_code
				,comments
				,created_by
				,created_date
			) VALUES (
				nextval('arsdehnel_msub.event_eval_id_seq')
				," . nvl( $this->event_master_id, 'null') . "
				," . nvl( $this->q1_ansr, 'null') . "
				," . nvl( $this->q2_ansr, 'null') . "
				," . nvl( $this->q3_ansr, 'null') . "
				," . nvl( $this->q4_ansr, 'null') . "
				," . nvl( $this->q5_ansr, 'null') . "
				," . nvl( $this->q6_ansr, 'null') . "
				," . nvl( $this->q7_ansr, 'null') . "
				," . nvl( $this->q8_ansr, 'null') . "
				,'" . pg_escape_string($this->inst_feedback) . "'
				,'" . pg_escape_string($this->ctnt_feedback) . "'
				,'" . pg_escape_string($this->loc_feedback) . "'
				,'" . pg_escape_string($this->otr_feedback) . "'
				,'" . pg_escape_string($this->addl_courses) . "'
				,to_date('" . $this->eval_date . "','MM/DD/YYYY')
				,'" . pg_escape_string($this->status_code) . "'
				,'" . pg_escape_string($this->comments) . "'
				," . $this->log_user_id . "
				,to_timestamp('" . nvl( $this->created_date, date('m/d/Y H:i:s') ) . "', 'MM/DD/YYYY HH:MI:SS')
			)";
		$event_eval_id = fnc_process_sql( $sql, 'arsdehnel_msub.event_eval_id_seq' );
		$this->event_eval_id = $event_eval_id;
	}


	//retrieve
	public function retrieve() {
		$rs	= fnc_rs_lookup( "SELECT * 
					  FROM arsdehnel_msub.event_evals
					  WHERE event_eval_id = " . $this->event_eval_id );

		$rec	= pg_fetch_assoc( $rs ); 

		$this	-> event_eval_id	= $rec['event_eval_id'];
		$this	-> event_master_id	= $rec['event_master_id'];
		$this	-> q1_ansr	= $rec['q1_ansr'];
		$this	-> q2_ansr	= $rec['q2_ansr'];
		$this	-> q3_ansr	= $rec['q3_ansr'];
		$this	-> q4_ansr	= $rec['q4_ansr'];
		$this	-> q5_ansr	= $rec['q5_ansr'];
		$this	-> q6_ansr	= $rec['q6_ansr'];
		$this	-> q7_ansr	= $rec['q7_ansr'];
		$this	-> q8_ansr	= $rec['q8_ansr'];
		$this	-> inst_feedback	= $rec['inst_feedback'];
		$this	-> ctnt_feedback	= $rec['ctnt_feedback'];
		$this	-> loc_feedback	= $rec['loc_feedback'];
		$this	-> otr_feedback	= $rec['otr_feedback'];
		$this	-> addl_courses	= $rec['addl_courses'];
		$this	-> eval_date	= $rec['eval_date'];
		$this	-> status_code	= $rec['status_code'];
		$this	-> comments	= $rec['comments'];
		$this	-> created_by	= $rec['created_by'];
		$this	-> created_date	= $rec['created_date'];
		$this	-> modified_by	= $rec['modified_by'];
		$this	-> modified_date	= $rec['modified_date'];
	}


	//update
	public function update() {
		$sql = "UPDATE arsdehnel_msub.event_evals 
			SET
				event_master_id = " . nvl( $this->event_master_id, 'null') . ",
				q1_ansr = " . nvl( $this->q1_ansr, 'null') . ",
				q2_ansr = " . nvl( $this->q2_ansr, 'null') . ",
				q3_ansr = " . nvl( $this->q3_ansr, 'null') . ",
				q4_ansr = " . nvl( $this->q4_ansr, 'null') . ",
				q5_ansr = " . nvl( $this->q5_ansr, 'null') . ",
				q6_ansr = " . nvl( $this->q6_ansr, 'null') . ",
				q7_ansr = " . nvl( $this->q7_ansr, 'null') . ",
				q8_ansr = " . nvl( $this->q8_ansr, 'null') . ",
				inst_feedback = '" . pg_escape_string($this->inst_feedback) . "',
				ctnt_feedback = '" . pg_escape_string($this->ctnt_feedback) . "',
				loc_feedback = '" . pg_escape_string($this->loc_feedback) . "',
				otr_feedback = '" . pg_escape_string($this->otr_feedback) . "',
				addl_courses = '" . pg_escape_string($this->addl_courses) . "',
				eval_date = to_date('" . $this->eval_date . "','MM/DD/YYYY'),
				status_code = '" . pg_escape_string($this->status_code) . "',
				comments = '" . pg_escape_string($this->comments) . "',
				modified_by = " . $this->log_user_id . ",
				modified_date = to_timestamp('" . nvl( $this->modified_date, date('m/d/Y H:i:s') ) . "', 'MM/DD/YYYY HH:MI:SS')
			WHERE event_eval_id = " . $this->event_eval_id;
		$event_eval_id = fnc_process_sql( $sql, null );
	}


	//save
	public function save(){
		if( nvl( $this -> event_eval_id, 0 ) == 0 ){
			$this->create();
		}else{
			$this->update();
		}
	}
	
	public function retrieve_eval_smry(){
	$rs	= fnc_rs_lookup( "SELECT round(avg(q1_ansr),2) as q1_ansr
							,round(avg(q2_ansr),2) as q2_ansr
							,round(avg(q3_ansr),2) as q3_ansr
							,round(avg(q4_ansr),2) as q4_ansr
							,round(avg(q5_ansr),2) as q5_ansr
							,round(avg(q6_ansr),2) as q6_ansr
							,round(avg(q7_ansr),2) as q7_ansr
							,round(avg(q8_ansr),2) as q8_ansr
						  FROM arsdehnel_msub.event_evals
						  WHERE event_master_id = " . $this->event_master_id );

		$rec	= pg_fetch_assoc( $rs ); 

		$this	-> q1_ansr	= $rec['q1_ansr'];
		$this	-> q2_ansr	= $rec['q2_ansr'];
		$this	-> q3_ansr	= $rec['q3_ansr'];
		$this	-> q4_ansr	= $rec['q4_ansr'];
		$this	-> q5_ansr	= $rec['q5_ansr'];
		$this	-> q6_ansr	= $rec['q6_ansr'];
		$this	-> q7_ansr	= $rec['q7_ansr'];
		$this	-> q8_ansr	= $rec['q8_ansr'];
		
		$rs = fnc_rs_lookup( "SELECT inst_feedback
								,ctnt_feedback
								,loc_feedback
								,otr_feedback
								,addl_courses
							  FROM arsdehnel_msub.event_evals
							  WHERE event_master_id = " . $this->event_master_id );
				
		$inst = array();
		$ctnt = array();
		$loc = array();
		$otr = array();
		$addl = array();
							  
		while( $rec = pg_fetch_assoc( $rs ) ):
		
			if( $rec['inst_feedback'] != '' && !is_null( $rec['inst_feedback'] ) ):
				$inst[] = $rec['inst_feedback'];
			endif;
			if( $rec['ctnt_feedback'] != '' && !is_null( $rec['ctnt_feedback'] ) ):
				$ctnt[] = $rec['ctnt_feedback'];
			endif;
			if( $rec['loc_feedback'] != '' && !is_null( $rec['loc_feedback'] ) ):
				$loc[] = $rec['loc_feedback'];
			endif;
			if( $rec['otr_feedback'] != '' && !is_null( $rec['otr_feedback'] ) ):
				$otr[] = $rec['otr_feedback'];
			endif;
			if( $rec['addl_courses'] != '' && !is_null( $rec['addl_courses'] ) ):
				$addl[] = $rec['addl_courses'];
			endif;
		
		endwhile;
		
		$this->inst_feedback = $inst;
		$this->ctnt_feedback = $ctnt;
		$this->loc_feedback = $loc;
		$this->otr_feedback = $otr;
		$this->addl_courses = $addl;
	}
	
}