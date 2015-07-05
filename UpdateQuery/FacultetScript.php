<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
	$data = file_get_contents('php://input');
	$json = json_decode($data);
	
	$oldNameFacultet = $json->{'oldNameFacultet'};
	$newNameFacultet = $json->{'newNameFacultet'};

	$oldPhoneNumber = $json->{'oldPhoneNumber'};
	$newPhoneNumber = $json->{'newPhoneNumber'};

	$oldEmail = $json->{'oldEmail'};
	$newEmail = $json->{'newEmail'};

	$oldCathedraKod = $json->{'oldUniversityKod'};
	$newCathedraKod = $json->{'newUnviersityKod'};

	$mysqli = new mysqli("localhost", "root", "1111", "ScienceWorks");
	if (mysqli_connect_errno()) {
    	printf("Соединение не установлено: %s\n", mysqli_connect_error());
    	exit();
	}
	$query = "UPDATE Facultetes SET NameFacultet = '$newNameFacultet', PhoneNumber = '$newPhoneNumber', Email = '$newEmail',
		UniversityKod = '$newUniversityKod'
		WHERE NameFacultet = '$oldNameFacultet' and PhoneNumber = '$oldPhoneNumber' and Email = '$oldEmail' 
		and UniversityKod = '$oldUniversityKod'";
	$mysqli->query($query);
	printf ("ID новой записи: %d.\n", $mysqli->insert_id);
?>