<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Time_Model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function loadTime(){
		return $this->db->query("SELECT * FROM `time`");
	}




}

/* End of file  */
/* Location: ./application/models/ */