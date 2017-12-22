<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Classes extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->model('Class_Model');
		$data['query_result'] = $this->Class_Model->loadClasses();
		$this->load->view('classes',$data);
	}

}

/* End of file  */
/* Location: ./application/controllers/ */