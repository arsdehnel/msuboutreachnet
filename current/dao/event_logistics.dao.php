class dao_arsdehnel_msub_event_logistics {
	public function create() {
		$sql = "INSERT INTO arsdehnel_msub.event_logistics VALUES (
			nextval('event_logistic_id_seq')
			," . $this->event_master_id . "
			,'" . pg_escape_string($this->logistic_code) . "'
			," . $this->personnel_id . "
			,'" . pg_escape_string($this->logistic_time) . "'
			,'" . pg_escape_string($this->status_code) . "'
			,'" . pg_escape_string($this->comments) . "'
			," . $this->created_by . "
			,
			," . $this->modified_by . "
			,
		);
	}
}

