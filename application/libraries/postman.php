<?php

class Postman 
{
	public $message;
	private $msg_array;
	
	
	function sync ()
	{
		$this->msg_array = json_decode($this->message, true);
		$this->download_sync();
		$this->upload_sync();
	
	}
	
	private function download_sync ()
	{
		$primary = $this->msg_array['primary'];
		
		// Now that we have primary bucket lets get the image.
		// For convienience we've separated the scripts that
		// download from AWS, Rackspace and Google. Users may
		// choose to use different SDKs. For instance in this
		// setup we've used the Python SDK for Google Cloud.
		
		$down_script_array = unserialize(DOWN_SCRIPTS_ARRAY);
		$down_init = $down_script_array[$primary][0];
		$down_script = $down_script_array[$primary][1];
		
		shell_exec($down_init.' '.FCPATH.$down_script.' '.rawurlencode($this->message));
	
	}
	
	private function upload_sync ()
	{
	
		$image = $this->msg_array['image'];
		
		$up_script_array = unserialize(UP_SCRIPTS_ARRAY);
		
		foreach ($this->msg_array['mirrors'] as $mirror)
		{
			$up_init = $up_script_array[$mirror][0];
			$up_script = $up_script_array[$mirror][1];
			shell_exec($up_init.' '.FCPATH.$up_script.' '.$image.' '.$mirror);
		}
		
		// remove the image from the Download directory
		shell_exec('rm '.FCPATH.DOWNLOAD_DIR.$image);
	
	}
	

}

?>