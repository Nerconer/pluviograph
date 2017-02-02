<?php
require_once('classes/Data2Bd.class.php');

$data = null;
$SURFACE = 0.013273;	// surface of the funnel in m^2

if (isset($_GET["data"]) ) {
	$data = $_GET["data"];
	$data = ($data/1000)*(1/$SURFACE);
	
	$db = new Data2Bd();
	$db->setData($data);
	$db->storeData();
} else {
	echo "error";
}

?>

<!-- Verification -->
<!DOCTYPE html>
<html>
<head>
	<title>ESP8266</title>
</head>
<body>

<?php 
	if(!is_null($data)) {
		echo "Received data: " . $data . "<br/>";
	}
?>
</body>
</html>