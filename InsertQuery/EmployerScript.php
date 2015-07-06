<?php
	$data = file_get_contents('php://input');
	$json = json_decode($data);
	$fio = $json->{'FIO'};
	$postKod = $json->{'PostKod'};
	$academicDegreeKod = $json->{'AcademicDegreeKod'};
	$academicTitleKod = $json->{'AcademicTitleKod'};
	$typeEmployerKod = $json->{'TypeEmployerKod'};
	$phoneNumber = $json->{'PhoneNumber'};
	$email = $json->{'Email'};

	$mysqli = new mysqli("localhost", "root", "1111", "ScienceWorks");
	if (mysqli_connect_errno()) {
    	printf("Соединение не установлено: %s\n", mysqli_connect_error());
    	exit();
	}
	$query = "INSERT into Employers (FIO, PostKod, AcademicDegreeKod, AcademicTitleKod, TypeEmployerKod, PhoneNumber, Email) values 
		('$fio', '$postKod', '$academicDegreeKod',  '$academicTitleKod', '$typeEmployerKod', ''$phoneNumber', '$email')";
	$mysqli->query($query);

	printf ("ID новой записи: %d.\n", $mysqli->insert_id);

?>