<?php
	$data = file_get_contents('php://input');
	$json = json_decode($data);
	$nameDepartment = $json->{'NameDepartment'};

	$mysqli = new mysqli("localhost", "root", "1111", "ScienceWorks");
	/* проверка соединения */
	if (mysqli_connect_errno()) {
    	printf("Соединение не установлено: %s\n", mysqli_connect_error());
    	exit();
	}
	$query = "DELETE FROM Departments  WHERE NameDepartment = '$nameDepartment'";
	$mysqli->query($query);

	printf ("ID новой записи: %d.\n", $mysqli->insert_id);

?>