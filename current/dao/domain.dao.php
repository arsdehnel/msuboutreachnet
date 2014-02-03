class dao_arsdehnel_msub_domain {
	public function create() {
		$sql = "INSERT INTO arsdehnel_msub.domain VALUES (
			nextval('domain_id_seq')
			,'" . pg_escape_string($this->description) . "'
			,'" . pg_escape_string($this->code) . "'
			,'" . pg_escape_string($this->comments) . "'
			," . $this->created_by . "
			,'" . pg_escape_string($this->created_date) . "'
			," . $this->modified_by . "
			,'" . pg_escape_string($this->modified_date) . "'
		);
	}
}

