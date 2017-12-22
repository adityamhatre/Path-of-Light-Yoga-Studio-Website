<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Schedule extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->model('Schedule_Model');
		$data['final'] = $this->Schedule_Model->loadSchedule();
		$this->load->view('schedule',$data);
	}

}

/* End of file  */
/* Location: ./application/controllers/ */