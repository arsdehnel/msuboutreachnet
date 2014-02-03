class dao_arsdehnel_msub_event_supp_lgstc {


	//create
	public function create() {
		$sql = "INSERT INTO arsdehnel_msub.event_supp_lgstc (
				
			) VALUES (
				nextval('arsdehnel_msub._seq')
			)";
		$ = fnc_process_sql( $sql, 'arsdehnel_msub._seq' );
	}


	//update
	public function update() {
		$sql = "UPDATE arsdehnel_msub.event_supp_lgstc 
			SET
			WHERE  = " . $this->;
		$ = fnc_process_sql( $sql, null );
	}


	//save
	public function save(){
		if( nvl( $this -> , 0 ) == 0 ){
			$this->create();
		}else{
			$this->update();
		}
	}
}

