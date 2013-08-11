<?php

// Include the rackspack SDK classes
require_once FCPATH.'rackspace/lib/php-opencloud.php';

class Rackspace 
{
		
	private $connection;
	
	function __construct()
    {
    	// establish our credentials
		$this->connection = new \OpenCloud\Rackspace(RACKSPACE_US,
			array( 'username' => RACK_USERNAME,
		   		   'apiKey' => RACK_APIKEY 
		   	));
        
    }
	
	function put_object ($container,$image)				
	{
		
		// Connect to Rackspace Cloud files in Chicago region.
		$objstore = $this->connection->ObjectStore('cloudFiles', 'ORD');
		$cont = $objstore->Container($container);
		$mypicture = $cont->DataObject();
		$mypicture->Create(array('name'=>$image, 
								'content_type'=>'image/jpeg'),
    							FCPATH.DOWNLOAD_DIR.$image
    					  );

	}
	
	function get_object ($container,$image)				
	{
		
		// Connect to Rackspace Cloud files in Chicago region.
		$objstore = $this->connection->ObjectStore('cloudFiles', 'ORD');
		$cont = $objstore->Container($container);
		$myphoto = $cont->DataObject($image);
		$myphoto->SaveToFilename(FCPATH.DOWNLOAD_DIR.$image);

	}

}


?>