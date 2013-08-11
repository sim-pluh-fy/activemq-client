<?php

// Include the Stomp-PHP classes to use the 
// Stomp protocol
require_once FCPATH.'stomp/Stomp.php';


class Activemq 
{

	private $con;
    
    function __construct()
    {    
		$this->con = new Stomp('tcp://'.ACTIVEMQ_SERVER.':61613');        
    }
	
	function get_message ($que)
	{
		$this->con->connect();
		$this->con->subscribe("/queue/$que");
		$msg = $this->con->readFrame();
	
		return $msg;

	}
	
	function ack_message ($msg)
	{
    	$this->con->ack($msg);
		$this->con->disconnect();	
	}


}

?>