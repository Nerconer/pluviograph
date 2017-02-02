<?php
	ignore_user_abort(true);	//if caller closes the connection (if initiating with cURL from another PHP, this allows you to end the calling PHP script without ending this one)
	set_time_limit(0);

	require_once('classes/Data2Bd.class.php');

	$script = new Data2Bd();


	//$script->setData(1001);

	//LLEGIR DATA DE POST
	//$script->readData();
	$num = 500;
	$script->fakeData($num);
	$script->storeData();
	$script->updateYear($num/2, 'raw_data');

?>

