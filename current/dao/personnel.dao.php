<?

class dao_arsdehnel_msub_personnel {

	//  ------------------------------------------------------------------------------------------------------------------------  //
	//	------------------------------------------------------ BASIC CRUD ------------------------------------------------------  //
	//  ------------------------------------------------------------------------------------------------------------------------  //
	//CREATE
	public function create(){
	
		$sql = "INSERT INTO arsdehnel_msub.personnel (personnel_id
													 ,first_name
													 ,last_name
													 ,psnl_type
													 ,psnl_bio
													 ,w9_ind
													 ,status_code
 													 ,created_by
													 ,created_date)
												 	VALUES (nextval('arsdehnel_msub.personnel_id_seq')
												     ,'" . pg_escape_string( $this->first_name ) . "'
												     ,'" . pg_escape_string( $this->last_name ) . "'
												     ,'" . pg_escape_string( $this->psnl_type ) . "'
												     ,'" . pg_escape_string( $this->psnl_bio ) . "'
												     ,'" . pg_escape_string( $this->w9_ind ) . "'
												     ,'" . pg_escape_string( $this->status_code ) . "'
												     ,'" . pg_escape_string( $this->user_id ) . "'
												 	 ,now())";
												 			
		$this->personnel_id = fnc_process_sql( $sql, 'arsdehnel_msub.personnel_id_seq' );

	}
	
	//RETRIEVE
	public function retrieve(){
		
		$rs		= fnc_rs_lookup( "SELECT *
								  FROM arsdehnel_msub.personnel
								  WHERE personnel_id = " . $this->personnel_id );
								 
		$rec	= pg_fetch_assoc( $rs );
				
	}
	
	//update
	public function update() {
	
	}
		
	//DELETE
	public function delete(){
			
	}
	
	//  ------------------------------------------------------------------------------------------------------------------------  //
	//	------------------------------------------------------ CUSTOM STUFF ----------------------------------------------------  //
	//  ------------------------------------------------------------------------------------------------------------------------  //
	public function save(){
		
		if( nvl( $this -> personnel_id, 0 ) == 0 ){
			$this->create();
		}else{
			$this->update();
		}
	
	}
		
}

?>