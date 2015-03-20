<?php

	if (isset($_POST['query'])) {
		//Connect to our database
		mysql_connect("localhost", "root" , "root");
		mysql_select_db("Bootstrap");

		// Retrieve the query
		$query = $_POST['query'];

		//Search the database for all similar items
		$sql = mysql_query("SELECT * FROM typeahead WHERE name LIKE '%{$query}%'");
		$array = array();

		while ($row = mysql_fetch_assoc($sql)){
			$array[] = $row['name'];
		}

		//Return the json
		echo json_encode($array);

}
?>