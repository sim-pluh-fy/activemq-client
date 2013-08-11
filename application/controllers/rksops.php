<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rksops extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('rackspace');		
	}
	
	public function download($message)
	{					
		$msg_array = json_decode(rawurldecode($message), true);
		$primary = $msg_array['primary'];
		$image = $msg_array['image'];

		$this->rackspace->get_object($primary,$image);
		
	}
	
	public function upload($image,$bucket)
	{					
		$this->rackspace->put_object($bucket,$image);
		
	}
	
		
}

