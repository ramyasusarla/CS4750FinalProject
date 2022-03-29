<?php

function addStudent($name, $major, $nationality, $email, $hobby)
{
	global $db; 

	$query = "insert into Student values(:name, :major, :nationality, :email, :hobby)";
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

function getAllStudents()
{
	global $db;
	$query = "select * from Student";

	$statement = $db->prepare($query);
	$statement->execute();

	$results = $statement->fetchAll();   

	$statement->closeCursor();

	return $results;
}

function getStudent_byName($name)
{
	global $db;
	$query = "select * from Student where name = :name";

	$statement = $db->prepare($query);
	$statement->bindValue(':name', $name);
	$statement->execute();

	$results = $statement->fetch();   

	$statement->closeCursor();

	return $results;	
}

function getStudent_byNationality($nationality)
{
	global $db;
	$query = "select * from Student where nationality = :nationality";

	$statement = $db->prepare($query);
	$statement->bindValue(':nationality', $name);
	$statement->execute();

	$results = $statement->fetch();   

	$statement->closeCursor();

	return $results;	
}

function getStudent_byHobby($hobby)
{
	global $db;
	$query = "select * from Student where hobby = :hobby";

	$statement = $db->prepare($query);
	$statement->bindValue(':hobby', $name);
	$statement->execute();

	$results = $statement->fetch();   

	$statement->closeCursor();

	return $results;	
}

function deleteStudent($name)
{
	global $db;

	$query = "delete from Student where name=:name";
	$statement = $db->prepare($query); 
	$statement->bindValue(':name', $name);
	$statement->execute();
	$statement->closeCursor();
}

?>