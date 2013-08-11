<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Define AWS & Rackspace API Keys
|--------------------------------------------------------------------------
*/
define ('AWS_KEY', '<aws_key>');
define('AWS_SECRET','<aws_secret_key>');

define('RACK_USERNAME', 'rackspace_username');
define('RACK_APIKEY', 'rackspace_key');

/*
|--------------------------------------------------------------------------
| Define ActiveMQ server IP
|--------------------------------------------------------------------------
*/
define ('ACTIVEMQ_SERVER','<activemq server ip>');
define ('QUE','s3backup');

/*
|--------------------------------------------------------------------------
| Define array of scripts that will be used for downloading from Primary
|--------------------------------------------------------------------------
*/
define ('DOWN_SCRIPTS_ARRAY',serialize(array(
								'my-us-aws-bucket' => array('php', 'index.php awsops download'),
								'my-gs-bucket' => array('python','gs/download.py'),
								'my-rks-bucket' => array ('php','index.php rksops download')
								)));

/*
|--------------------------------------------------------------------------
| Define array of scripts that will be used for uploading to the Mirrors
|--------------------------------------------------------------------------
*/
define ('UP_SCRIPTS_ARRAY',serialize(array(
								'my-us-aws-bucket' => array('php', 'index.php awsops upload'),
								'my-gs-bucket' => array('python','gs/upload.py'),
								'my-rks-bucket' => array ('php','index.php rksops upload')
								)));


/*
|--------------------------------------------------------------------------
| Define Directory that will hold image files temporarily
|--------------------------------------------------------------------------
*/
define ('DOWNLOAD_DIR','tmp/');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');


/* End of file constants.php */
/* Location: ./application/config/constants.php */