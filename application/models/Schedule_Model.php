<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Schedule_Model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function loadSchedule(){
		$res1 = $this->db->query("SELECT DISTINCT `schedule`.`daysID`,`days_name` FROM `schedule` JOIN `days` ON `schedule`.`daysID` = `days`.`daysID`");
		
		$final = array();
		foreach ($res1->result() as $res1r){
			$res2 = $this->db->query("select * from schedule where daysID=".$res1r->daysID);	
			
			foreach ($res2->result() as $res2r) {
				$res3 = $this->db->query("select * from time where timeID=".$res2r->timeID);
				$res4 = $this->db->query("select * from class where classID=".$res2r->classID);		
				$data['days_name'] = $res1r->days_name;
				$data[$res1r->days_name]['time']=$res3->result()[0]->time;
				$data[$res1r->days_name]['class_name']=$res4->result()[0]->class_name;

				array_push($final, $data);
			}	
			
		}
		return $final;

		
		
	}
}

/* End of file  */
/* Location: ./application/models/ */