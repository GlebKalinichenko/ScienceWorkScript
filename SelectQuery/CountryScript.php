<?php
	$mysqli = new mysqli("127.0.1.1", "root", "1111", "ScienceWorks");
    $data = array();
	$result = $mysqli->query("SELECT * FROM Countries");
    	if ($result->num_rows > 0) {
 	   // output data of each row
    	while($row = $result->fetch_assoc()) {
            $data[] = $row;
    	}
        echo json_encode($data);
	}
	
?>