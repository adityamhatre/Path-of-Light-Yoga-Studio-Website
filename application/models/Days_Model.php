<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Days_Model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function loadDays(){
		return $this->db->query("SELECT * FROM `days`");
	}




}

/* End of file  */
/* Location: ./application/models/ */