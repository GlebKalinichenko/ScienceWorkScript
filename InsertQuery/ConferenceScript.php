<?php
	$data = file_get_contents('php://input');
	$json = json_decode($data);
	$nameConference = $json->{'NameConference'};	
	$pressRealiseKod = $json->{'PressRealiseKod'};
	$postRealiseKod = $json->{'PostRealiseKod'};
	$dateBegin = $json->{'DateBegin'};
	$dateEnd = $json->{'DateEnd'};
	$cathedraKod = $json->{'CathedraKod'};
	$typeConferenceKod = $json->{'TypeConferenceKod'};
	$cabinet = $json->{'Cabinet'};
	$collectionKod = $json->{'CollectionKod'};
	$employerKod = $json->{'EmployerKod'};
	$planKod = $json->{'PlanKod'};
	$orderKod = $json->{'OrderKod'};
	$numTeachers = $json->{'NumTeachers'};

	$mysqli = new mysqli("localhost", "root", "1111", "ScienceWorks");
	if (mysqli_connect_errno()) {
    	printf("Соединение не установлено: %s\n", mysqli_connect_error());
    	exit();
	}
	$query = "INSERT into Conferences (NameConference, DateBegin, DateEnd, CathedaKod, TypeConferenceKod, Cabinet, PressRealiseKod,
		PostRealiseKod, CollectionKod, EmployerKod, PlanKod, OrderKod, NumTeachers) values ('$nameConference', '$dateBegin', '$dateEnd', '$cathedraKod',
		'$typeConferenceKod', '$cabinet', '$pressRealiseKod', '$postRealiseKod', '$collectionKod', '$employerKod', '$planKod', '$orderKod', '$numTeachers')";
	$mysqli->query($query);

	printf ("ID новой записи: %d.\n", $mysqli->insert_id);

?>