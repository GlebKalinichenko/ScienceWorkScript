<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
	$data = file_get_contents('php://input');
	$json = json_decode($data);
	
	$oldFIO = $json->{'oldFIO'};
	$newFIO = $json->{'newFIO'};

	$oldPostKod = $json->{'oldPostKod'};
	$newPostKod = $json->{'newPostKod'};

	$oldAcademicDegreeKod = $json->{'oldAcademicDegreeKod'};
	$newAcademicDegreeKod = $json->{'newAcademicDegreeKod'};

	$oldAcademicTitleKod = $json->{'oldAcademicTitleKod'};
	$newAcademicTitleKod = $json->{'newAcademicTitleKod'};

	$oldTypeEmployerKod = $json->{'oldTypeEmployerKod'};
	$newTypeEmployerKod = $json->{'newTypeEmployerKod'};

	$oldPhoneNumber = $json->{'oldPhoneNumber'};
	$newPhoneNumber = $json->{'newPhoneNumber'};

	$oldEmail = $json->{'oldEmail'};
	$newEmail = $json->{'newEmail'};

	$mysqli = new mysqli("localhost", "root", "1111", "ScienceWorks");
	if (mysqli_connect_errno()) {
    	printf("Соединение не установлено: %s\n", mysqli_connect_error());
    	exit();
	}
	$query = "UPDATE Employers SET FIO = '$newFIO', PostKod = '$newPostKod', AcademicDegreeKod = '$newAcademicDegreeKod',
		AcademicTitleKod = '$newAcademicTitleKod', TypeEmployerKod = '$newTypeEmployerKod', PhoneNumber = '$newPhoneNumber', Email = '$newEmail'
		WHERE FIO = '$oldFIO' and PostKod = '$oldPostKod' and AcademicDegreeKod = '$oldAcademicDegreeKod' 
		and AcademicTitleKod = '$oldAcademicTitleKod' and TypeEmployerKod = '$oldTypeEmployerKod' and PhoneNumber = '$oldPhoneNumber'
		and Email = '$oldEmail'";
	$mysqli->query($query);
	printf ("ID новой записи: %d.\n", $mysqli->insert_id);
?>