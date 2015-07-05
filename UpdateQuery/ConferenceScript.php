<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
	$data = file_get_contents('php://input');
	$json = json_decode($data);
	$oldNameConference = $json->{'oldNameConference'};
	$newNameConference = $json->{'newNameConference'};

	$oldDateBegin = $json->{'oldDateBegin'};
	$newDateBegin = $json->{'newDateBegin'};

	$oldDateEnd = $json->{'oldDateEnd'};
	$newDateEnd = $json->{'newDateEnd'};

	$oldCathedraKod = $json->{'oldCathedraKod'};
	$newCathedraKod = $json->{'newCathedraKod'};

	$oldTypeConferenceKod = $json->{'oldTypeConferenceKod'};
	$newTypeConferenceKod = $json->{'newTypeConferenceKod'};

	$oldCabinet = $json->{'oldCabinet'};
	$newCabinet = $json->{'newCabinet'};

	$oldPressRealiseKod = $json->{'oldPressRealiseKod'};
	$newPressRealiseKod = $json->{'newPressRealiseKod'};

	$oldPostRealiseKod = $json->{'oldPostRealiseKod'};
	$newPostRealiseKod = $json->{'newPostRealiseKod'};	

	$oldCollectionKod = $json->{'oldCollectionKod'};
	$newCollectionKod = $json->{'newCollectionKod'};

	$oldNumTeacher = $json->{'oldNumTeacher'};
	$newNumTeacher = $json->{'newNumTeacher'};

	$oldEmployerKod = $json->{'oldEmployerKod'};
	$newEmployerKod = $json->{'newEmployerKod'};

	$oldPlanKod = $json->{'oldPlanKod'};
	$newPlanKod = $json->{'newPlanKod'};

	$oldOrderKod = $json->{'oldOrderKod'};
	$newOrderKod = $json->{'newOrderKod'};

	$mysqli = new mysqli("localhost", "root", "1111", "ScienceWorks");
	if (mysqli_connect_errno()) {
    	printf("Соединение не установлено: %s\n", mysqli_connect_error());
    	exit();
	}
	$query = "UPDATE Conferences SET NameConference = '$newNameConference', DateBegin = '$newDateBegin', 
		DateEnd = '$newDateEnd', CathedraKod = '$newCathedraKod', TypeConferenceKod = '$newTypeConferenceKod', Cabinet = '$newCabinet',
		PressRealiseKod = '$newPressRealiseKod', PostRealiseKod = '$newPostRealiseKod', CollectionKod = '$newCollectionKod',
		EmployerKod = '$newEmployerKod', PlanKod = '$newPlanKod', OrderKod = '$newOrderKod', NumTeacher = '$newNumTeacher'
		WHERE NameConference = '$oldNameConference', DateBegin = '$oldDateBegin', DateEnd = '$oldDateEnd', 
		CathedraKod = '$oldCathedraKod', TypeConferenceKod = '$oldTypeConferenceKod', Cabinet = '$oldCabinet',
		PressRealiseKod = '$oldPressRealiseKod', PostRealiseKod = '$oldPostRealiseKod', CollectionKod = '$oldCollectionKod',
		EmployerKod = '$oldEmployerKod', PlanKod = '$oldPlanKod', OrderKod = '$oldOrderKod', NumTeacher = '$oldNumTeacher'";
	$mysqli->query($query);
	printf ("ID новой записи: %d.\n", $mysqli->insert_id);
?>