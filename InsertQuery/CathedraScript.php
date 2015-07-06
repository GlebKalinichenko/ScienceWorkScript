<?php
	$data = file_get_contents('php://input');
	$json = json_decode($data);
	$nameCathedra = $json->{'NameCathedra'};	
	$phoneNumber = $json->{'PhoneNumber'};
	$email = $json->{'Email'};
	$facultetKod = $json->{'FacultetKod'};

	$mysqli = new mysqli("localhost", "root", "1111", "ScienceWorks");
	/* проверка соединения */
	if (mysqli_connect_errno()) {
    	printf("Соединение не установлено: %s\n", mysqli_connect_error());
    	exit();
	}
	$query = "INSERT into Cathedres (NameCathedra, PhoneNumber, Email, FacultetKod) values ('$nameCathedra', '$phoneNumber', 
		'$email', '$facultetKod')";
	$mysqli->query($query);

	printf ("ID новой записи: %d.\n", $mysqli->insert_id);

?>