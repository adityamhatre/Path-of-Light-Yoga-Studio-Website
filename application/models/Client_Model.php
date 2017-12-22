<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Client_Model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	/*public function insertData($name,$email,$password,$phone,$address,$time,$class,$day){
		$password=do_hash($password);
        $query = "INSERT INTO `client`(name,email,password,phone,address) VALUES('{$name}','{$email}','{$password}','{$phone}','{$address}')";
        $this->db->query($query);
        $asdf=$this->db->query("SELECT * FROM `client` ORDER BY `clientID` DESC LIMIT 1");
        foreach ($asdf->result() as $aa ) {
        	$cID=$aa->clientID;
            $this->db->query("INSERT INTO `client_schedule`(clientID,timeID,classID,daysID) VALUES('{$cID}','{$time}','{$class}','{$day}')");
        }
        // echo "Inserted in database";
	}*/
	public function insertData($envelope){
		$name = element('name',$envelope);
		$email= element('email',$envelope);
		$password= element('password',$envelope);
		$phone= element('phone',$envelope);
		$address= element('address',$envelope);
		$time= element('time',$envelope);
		$class= element('class',$envelope);
		$day= element('day',$envelope);
		$password=do_hash($password);
        $query = "INSERT INTO `client`(name,email,password,phone,address) VALUES('{$name}','{$email}','{$password}','{$phone}','{$address}')";
        $this->db->query($query);
        $asdf=$this->db->query("SELECT * FROM `client` ORDER BY `clientID` DESC LIMIT 1");
        foreach ($asdf->result() as $aa ) {
        	$cID=$aa->clientID;
            $this->db->query("INSERT INTO `client_schedule`(clientID,timeID,classID,daysID) VALUES('{$cID}','{$time}','{$class}','{$day}')");
        }
        // echo "Inserted in database";
	}

	public function insertComment($name,$email,$comments){
		$query = "INSERT INTO `contact`(name,email,comments_questions) VALUES('{$name}','{$email}','{$comments}')";
        $this->db->query($query);
	}




}

/* End of file  */
/* Location: ./application/models/ */