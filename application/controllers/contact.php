<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->helper('form');

		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('email','Email','required|callback_email_validate');
		$this->form_validation->set_rules('comments','Address','required');
		
		if ($this->form_validation->run() == FALSE)
        {
        		$data['inserted']='false';
                $this->load->view('contact',$data);
        }
        else
        {
        	$this->load->model('Client_Model');
    		$this->Client_Model->insertComment(
    			$this->input->post('name'),
    			$this->input->post('email'),
    			$this->input->post('comments')
    		);
    		$data['inserted']='true';
            $this->load->view('contact',$data);
        }
	}

	public function email_validate($email)
	{
		if (!preg_match("/^[A-Z0-9._%-]+@[A-Z0-9][A-Z0-9.-]{0,61}[A-Z0-9]\.[A-Z]{2,6}$/i",$email)) {
			$this->form_validation->set_message('email_validate', 'Invalid email format');
			return FALSE;
		}else{
			return TRUE;
		}
	}

}

/* End of file  */
/* Location: ./application/controllers/ */