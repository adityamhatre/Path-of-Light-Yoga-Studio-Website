<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Class_Model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function loadClasses(){
		return $this->db->query("SELECT * FROM `class`");
	}



	public function validateClass($time,$class,$day){
            $q="SELECT * FROM `schedule` WHERE `timeID`='{$time}' AND `classID`='{$class}' AND `daysID`='{$day}'";
            $r=$this->db->query($q);
            $c=0;
            foreach($r->result() as $ar){
            	$c++;
            }
            if($c==0){
                $showThis="Selected class timings are invalid<br>Timings available are as follows: <br>";
                $q="SELECT * FROM `schedule` WHERE `classID`='{$class}'";
                $r=$this->db->query($q);
                foreach ($r->result() as $rr) {
                	$tID=$rr->timeID;
                    $dID=$rr->daysID;
                    $q="SELECT t.time,d.days_name FROM (SELECT * FROM `time` WHERE timeID='$tID') as t, (SELECT * FROM `days` WHERE daysID='${dID}') as d";
                    $rt=$this->db->query($q);
                    foreach ($rt->result() as $rrt) {
                    	$showThis=$showThis."{$rrt->days_name}: {$rrt->time}<br>";
                    }
                }
                
                $response['validated'] = 'false';
                $response['message'] = $showThis;
            }else{
               
                $response['validated'] = 'true';
                $response['message'] = "Inserted in database";                   
                 
            }
            return $response;
        }


}

/* End of file  */
/* Location: ./application/models/ */