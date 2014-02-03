class dao_arsdehnel_msub_domain_group_master {
	public function create() {
		$sql = "INSERT INTO arsdehnel_msub.domain_group_master VALUES (
			nextval('domain_group_master_id_seq')
			," . $this->domain_id . "
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

