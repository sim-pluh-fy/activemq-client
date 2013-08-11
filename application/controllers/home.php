<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('activemq');
		$this->load->library('postman');
	}
	
	public function index()
	{					
		// Get message from Q	
		$msg = $this->activemq->get_message(QUE);		
		
		if ($msg != null)
		{
			$this->postman->message = $msg->body;		
			$this->postman->sync();          
		}
		
		// Remove the message from Queue
		$this->activemq->ack_message($msg);
		
	}
	
		
}

