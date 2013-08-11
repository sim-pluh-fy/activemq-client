<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Awsops extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('myaws');		
	}
	
	public function download($message)
	{					
		$msg_array = json_decode(rawurldecode($message), true);
		$primary = $msg_array['primary'];
		$image = $msg_array['image'];

		$this->myaws->get_object($primary,$image);
		
	}
	
	public function upload($image,$bucket)
	{					
		$this->myaws->put_object($bucket,$image);
		
	}
	
		
}

