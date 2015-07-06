<?php
	$data = file_get_contents('php://input');
	$json = json_decode($data);
	$nameGroup = $json->{'NameGroup'};

	$mysqli = new mysqli("localhost", "root", "1111", "ScienceWorks");
	if (mysqli_connect_errno()) {
    	printf("Соединение не установлено: %s\n", mysqli_connect_error());
    	exit();
	}
	$query = "INSERT into Groups (NameGroup) values 
		('$nameGroup')";
	$mysqli->query($query);

	printf ("ID новой записи: %d.\n", $mysqli->insert_id);

?>