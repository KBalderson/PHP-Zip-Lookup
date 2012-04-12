<?php

try {
	//open the database
	$zip = is_numeric($_GET['zip']) ? $_GET['zip'] : 0;
	$db = new PDO('sqlite:zipcodes.db');

	$result = $db->query("SELECT country,state,city FROM zipcodes WHERE zipcode='$zip' LIMIT 1");
	$info = $result->fetch(PDO::FETCH_ASSOC);
	if(!$info)
		die(json_encode(array('error' => 'Zip Code not found!')));
	else {
		echo json_encode($info);
	}

	// close the database connection
	$db = NULL;
}
catch(PDOException $e) {
	print 'Exception : '.$e->getMessage();
}

?>