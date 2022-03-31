<?php

$id = 1;

function addStudent($firstName, $lastName, $major, $year, $email)
{
	global $db; 

	$query = "insert into Student values(:firstName, lastName, :major, :year, :email)";
	$statement = $db->prepare($query);

	$statement->bindValue(':id', $id);
	$statement->bindValue(':firstName', $firstName);
	$statement->bindvalue(':lastName', $lastName)
	$statement->bindValue(':major', $major);
	$statement->bindValue(':year', $year);
	$statement->bindValue(':email', $email);

	$statement->execute();

	// release; free the connection to the server so other sql statements may be issued 
	$statement->closeCursor();

	$id++;
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

function getStudent_byName($firstName, $lastName)
{
	global $db;
	$query = "select * from Student where firstName = :firstName and lastName = :lastName";

	$statement = $db->prepare($query);
	$statement->bindValue(':firstName', $firstName);
	$statement->bindValue(':lastName', $lastName);
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
	$statement->bindValue(':nationality', $firstName, $lastName);
	$statement->execute();

	$results = $statement->fetch();   

	$statement->closeCursor();

	return $results;	
}


function getStudent_byEmail($email)
{
	global $db;
	$query = "select * from Student where email = :email";

	$statement = $db->prepare($query);
	$statement->bindValue(':email', $firstName, $lastName);
	$statement->execute();

	$results = $statement->fetch();   

	$statement->closeCursor();

	return $results;	
}


function deleteStudent($name)
{
	global $db;

	$query = "delete from Student where firstName=:firstName and lastName = :lastName;
	$statement = $db->prepare($query); 
	$statement->bindValue(':firstName', $firstName);
	$statement->bindValue(':lastName', $lastName);
	$statement->execute();
	$statement->closeCursor();
}

?>