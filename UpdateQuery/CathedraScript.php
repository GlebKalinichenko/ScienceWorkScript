<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
	$data = file_get_contents('php://input');
	$json = json_decode($data);
	$oldNameCathedra = $json->{'oldNameCathedra'};
	$newNameCathedra = $json->{'newNameCathedra'};

	$oldPhoneNumber = $json->{'oldPhoneNumber'};
	$newPhoneNumber = $json->{'newPhoneNumber'};

	$oldEmail = $json->{'oldEmail'};
	$newEmail = $json->{'newEmail'};

	$oldFacultetKod = $json->{'oldFacultetKod'};
	$newFacultetKod = $json->{'newFacultetKod'};

	$mysqli = new mysqli("localhost", "root", "1111", "ScienceWorks");
	if (mysqli_connect_errno()) {
    	printf("Соединение не установлено: %s\n", mysqli_connect_error());
    	exit();
	}
	$query = "UPDATE Catehdres SET NameCathedra='$newNameCathedra', PhoneNumber = '$newPhoneNumber',
		Email = '$newEmail', FacultetKod  = '$newFacultetKod'
		WHERE NameCathedra='$oldNameCathedra' and PhoneNumber = '$oldPhoneNumber' and FacultetKod = '$oldFacultetKod' ";
	$mysqli->query($query);
	printf ("ID новой записи: %d.\n", $mysqli->insert_id);
?>