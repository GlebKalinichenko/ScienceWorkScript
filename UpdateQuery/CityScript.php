<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
	$data = file_get_contents('php://input');
	$json = json_decode($data);
	$oldCity = $json->{'oldCity'};
	$newCity = $json->{'newCity'};

	$oldCountryKod = $json->{'oldCountryKod'};
	$newCountryKod = $json->{'newCountryKod'};

	$mysqli = new mysqli("localhost", "root", "1111", "ScienceWorks");
	if (mysqli_connect_errno()) {
    	printf("Соединение не установлено: %s\n", mysqli_connect_error());
    	exit();
	}
	$query = "UPDATE Cities SET City='$newCity', CountryKod = '$newCountryKod'
		WHERE City='$oldCity' and CountryKod = '$oldCountryKod'";
	$mysqli->query($query);
	printf ("ID новой записи: %d.\n", $mysqli->insert_id);
?>