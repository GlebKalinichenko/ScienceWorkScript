<?php
	$data = file_get_contents('php://input');
	$json = json_decode($data);
	$link = $json->{'Link'};	
	$typePrint = $json->{'TypePrint'};

	$mysqli = new mysqli("localhost", "root", "1111", "ScienceWorks");
	/* проверка соединения */
	if (mysqli_connect_errno()) {
    	printf("Соединение не установлено: %s\n", mysqli_connect_error());
    	exit();
	}
	$query = "INSERT into Collections (Link, TypePrint) values ('$link', '$typePrint')";
	$mysqli->query($query);

	printf ("ID новой записи: %d.\n", $mysqli->insert_id);

?>