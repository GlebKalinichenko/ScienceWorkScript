<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
	$data = file_get_contents('php://input');
	$json = json_decode($data);
	
	$oldEmployerKod = $json->{'oldEmployerKod'};
	$newEmployerKod = $json->{'newEmployerKod'};

	$oldDepartmentKod = $json->{'oldDepartmentKod'};
	$newDepartmentKod = $json->{'newDepartmentKod'};

	$mysqli = new mysqli("localhost", "root", "1111", "ScienceWorks");
	if (mysqli_connect_errno()) {
    	printf("Соединение не установлено: %s\n", mysqli_connect_error());
    	exit();
	}
	$query = "UPDATE Distributions SET EmployerKod = '$newEmployerKod', DepartmentKod = '$newDepartmentKod' 
		WHERE EmployerKod = '$oldEmployerKod' and DepartmentKod = '$oldDepartmentKod'";
	$mysqli->query($query);
	printf ("ID новой записи: %d.\n", $mysqli->insert_id);
?>