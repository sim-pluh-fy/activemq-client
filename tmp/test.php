<?php

class vartest

{

	
	public $tt;
	
	function addtt ()
	{
		return $this->tt + 10;
		
	}
	


}

$dd = new vartest();
$dd->tt = 15;
echo $dd->addtt();


?>