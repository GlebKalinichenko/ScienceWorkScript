<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
	$data = file_get_contents('php://input');
	$json = json_decode($data);
	$oldLink = $json->{'oldLink'};
	$newLink = $json->{'newLink'};

	$oldTypePrint = $json->{'oldTypePrint'};
	$newTypePrint = $json->{'newTypePrint'};

	$mysqli = new mysqli("localhost", "root", "1111", "ScienceWorks");
	if (mysqli_connect_errno()) {
    	printf("Соединение не установлено: %s\n", mysqli_connect_error());
    	exit();
	}
	$query = "UPDATE Collections SET Link = '$newLink', TypePrint = '$newTypePrint'
		WHERE Link = '$oldLink' and TypePrint = '$oldTypePrint'";
	$mysqli->query($query);
	printf ("ID новой записи: %d.\n", $mysqli->insert_id);
?>