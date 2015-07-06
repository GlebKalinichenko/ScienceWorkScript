<?php
	$data = file_get_contents('php://input');
	$json = json_decode($data);
	$employerKod = $json->{'EmployerKod'};
	$orderKod = $json->{'OrderKod'};

	$mysqli = new mysqli("localhost", "root", "1111", "ScienceWorks");
	if (mysqli_connect_errno()) {
    	printf("Соединение не установлено: %s\n", mysqli_connect_error());
    	exit();
	}
	$query = "INSERT into CreateOrders (EmployerKod, OrderKod) values ('$employerKod', '$orderKod')";
	$mysqli->query($query);

	printf ("ID новой записи: %d.\n", $mysqli->insert_id);

?>