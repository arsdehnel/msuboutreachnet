class dao_arsdehnel_msub_domain_group_detail {
	public function create() {
		$sql = "INSERT INTO arsdehnel_msub.domain_group_detail VALUES (
			nextval('domain_group_detail_id_seq')
			," . $this->domain_group_master_id . "
			," . $this->domain_value_id . "
			,'" . pg_escape_string($this->alias) . "'
			,'" . pg_escape_string($this->comments) . "'
			," . $this->created_by . "
			,'" . pg_escape_string($this->created_date) . "'
			," . $this->modified_by . "
			,'" . pg_escape_string($this->modified_date) . "'
		);
	}
}

