<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
	$mysqli = new mysqli("localhost", "root", "1111", "ScienceWorks");
    $data = array();
    $mysqli->query('SET NAMES UTF8');
	$result = $mysqli->query("SELECT * FROM Cities");
    	if ($result->num_rows > 0) {
 	   // output data of each row
    	while($row = $result->fetch_assoc()) {
            $data[] = $row;
    	}
        echo json_encode($data);
	}
	
?>