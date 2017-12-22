<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->helper('form');

		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('password','Password','required|callback_password_length_check');
		$this->form_validation->set_rules('c_password','Confirm Password','required|callback_password_check');
		$this->form_validation->set_rules('email','Email','required|callback_email_validate');
		$this->form_validation->set_rules('phone','Phone','required|callback_phone_validate');
		$this->form_validation->set_rules('address','Address','required');
		$this->form_validation->set_rules('schedule_validation','Schedule Validation','callback_schedule_validate');

		$this->load->model('Class_Model');
		$this->load->model('Days_Model');
		$this->load->model('Time_Model');
		$this->load->model('Client_Model');

		$data['class_data']=$this->Class_Model->loadClasses();
		$data['days_data']=$this->Days_Model->loadDays();
		$data['time_data']=$this->Time_Model->loadTime();

		if ($this->form_validation->run() == FALSE)
        {
        		$data['inserted']='false';
                $this->load->view('register',$data);
        }
        else
        {
        		$envelope = array(
        			'name' => $this->input->post('name'),
        			'email' => $this->input->post('email'),
        			'password' => $this->input->post('password'),
        			'phone' => $this->input->post('phone'),
        			'address' => $this->input->post('address'),
        			'time' => $this->input->post('time'),
					'class' => $this->input->post('class'),
					'day' => $this->input->post('day')
        		);
        		$this->Client_Model->insertData($envelope);
        		$data['inserted']='true';
                $this->load->view('register',$data);
        }
		
	}


	public function schedule_validate($var){
		
		$time = $this->input->post('time');
		$class = $this->input->post('class');
		$day = $this->input->post('day');

		$response = $this->Class_Model->validateClass($time,$class,$day);
		if($response['validated']=='true'){
			return TRUE;
		}else{
			$this->form_validation->set_message('schedule_validate', $response['message']);
	        return FALSE;
		}
		
	}

	public function password_check($confirmation_password)
	{
	    $password = $this->input->post('password');
	    if (strcmp($password, $confirmation_password))
	    {
	        $this->form_validation->set_message('password_check', 'Passwords do not match');
	        return FALSE;
	    }
	    else {
	        return TRUE;
	    }
	}
	public function password_length_check($password)
	{
	    if(preg_match("/^[A-Z0-9a-z_]{8,16}/", $password)){
			return TRUE;
		}else{
			$this->form_validation->set_message('password_length_check', 'Passwords should be greater than or equal to 8 characters and less than 16');
	        return FALSE;
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

	public function phone_validate($phone){
		if(preg_match("/^[2-9]{1}[0-9]{2}-[0-9]{3}-[0-9]{4}$/", $phone) ||
            preg_match("/^[2-9]{1}[0-9]{2}.[0-9]{3}.[0-9]{4}$/", $phone) ||
            preg_match("/^[2-9]{1}[0-9]{2} [0-9]{3} [0-9]{4}$/", $phone) ||
            preg_match("/^[(][2-9]{1}[0-9]{2}[)] [0-9]{3}-[0-9]{4}$/", $phone) ||
            preg_match("/^[2-9]{1}[0-9]{2}[0-9]{7}$/", $phone)){
            return TRUE;
        }else{
        	$this->form_validation->set_message('phone_validate', 'Phone number is invaliid');
			return FALSE;
        }
	}
	

}

/* End of file  */
/* Location: ./application/controllers/ */