<?php
	$data = file_get_contents('php://input');
	$json = json_decode($data);
	$nameDepartment = $json->{'NameDepartment'};
	$universityKod = $json->{'UniversityKod'};

	$mysqli = new mysqli("localhost", "root", "1111", "ScienceWorks");
	if (mysqli_connect_errno()) {
    	printf("Соединение не установлено: %s\n", mysqli_connect_error());
    	exit();
	}
	$query = "INSERT into Departments (NameDepartment, UniversityKod) values ('$nameDepartment', '$universityKod')";
	$mysqli->query($query);

	printf ("ID новой записи: %d.\n", $mysqli->insert_id);

?>