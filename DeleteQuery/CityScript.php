<?php
	$data = file_get_contents('php://input');
	$json = json_decode($data);
	$city = $json->{'City'};

	$mysqli = new mysqli("localhost", "root", "1111", "ScienceWorks");
	/* проверка соединения */
	if (mysqli_connect_errno()) {
    	printf("Соединение не установлено: %s\n", mysqli_connect_error());
    	exit();
	}
	$query = "DELETE FROM Cities  WHERE City = '$city'";
	$mysqli->query($query);

	printf ("ID новой записи: %d.\n", $mysqli->insert_id);

?>