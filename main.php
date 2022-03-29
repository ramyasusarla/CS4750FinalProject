<?php

function addStudent($name, $major, $nationality, $email, $hobby)
{
	global $db; 

	$query = 'insert student into database';
	$statement = $db->prepare($query);

	$first = None;
	$last = None;

	if(str_contains($name, " ")) {
		$arr = explode(" ", $name);
		$first = $arr[0];
		$last = $arr[1];
	}



	$statement->bindValue(':first name', $first);
	$statement->bindvalue(':last name', $last)
	$statement->bindValue(':major', $major);
	$statement->bindValue(':nationality', $nationality);
	$statement->bindValue(':email', $email);
	$statement->bindValue(':hobby', $hobby);

	$statement->execute();

	// release; free the connection to the server so other sql statements may be issued 
	$statement->closeCursor();

} 
?>