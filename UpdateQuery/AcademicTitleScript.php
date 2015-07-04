<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
	$data = file_get_contents('php://input');
	$json = json_decode($data);
	$oldAcademicTitle = $json->{'oldAcademicTitle'};
	$newAcademicTitle = $json->{'newAcademicTitle'};
	$mysqli = new mysqli("localhost", "root", "1111", "ScienceWorks");
	/* проверка соединения */
	if (mysqli_connect_errno()) {
    	printf("Соединение не установлено: %s\n", mysqli_connect_error());
    	exit();
	}
	$query = "UPDATE AcademicTitles SET AcademicTitle='$newAcademicTitle' WHERE AcademicTitle='$oldAcademicTitle'";
	$mysqli->query($query);
	printf ("ID новой записи: %d.\n", $mysqli->insert_id);
?>