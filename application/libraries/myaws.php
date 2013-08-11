<?php

include_once FCPATH.'vendor/autoload.php';
use Aws\Common\Aws;

class Myaws 
{ 

 	private $aws;
    private $s3Client;
    public $debug=false;
    
    function __construct()
    {
    
        $this->aws = Aws::factory(array(
          'key'    => AWS_KEY,
          'secret' => AWS_SECRET,
          'region' => 'us-east-1'
        ));
      
        $this->s3Client = $this->aws->get('s3');
        
    }
    
    // Upload S3 object
    function put_object($bucket, $image)
    {
        $this->s3Client->putObject(array(
    		'Bucket'     => $bucket,
    		'Key'        => $image,
    		'SourceFile' => FCPATH.DOWNLOAD_DIR.$image,
		));
        
    }
    
    function get_object($bucket,$key)
    {
    	$this->s3Client->getObject(array(
    		'Bucket' => $bucket,
    		'Key'    => $key,
    		'SaveAs' => FCPATH.DOWNLOAD_DIR.$key
		));
    
    }
    
}    
    
?>