<?php

// global $id;
// $id = 20;

function addStudent($firstName, $lastName, $phoneNumber, $year, $email)
{
	global $db; 

	$query = "insert into Student (firstName, lastName, phoneNumber, year, email) values(:firstName, :lastName, :phoneNumber, :year, :email)";
	$statement = $db->prepare($query);

	//$statement->bindValue(':id', $id);
	$statement->bindValue(':firstName', $firstName);
	$statement->bindvalue(':lastName', $lastName);
	$statement->bindvalue(':phoneNumber', $phoneNumber);
	$statement->bindValue(':year', $year);
	$statement->bindValue(':email', $email);

	$statement->execute();

	// release; free the connection to the server so other sql statements may be issued 
	$statement->closeCursor();

	//$id++;
} 

function addMajor($major)
{
	global $db; 
	$query = "insert into Major (id, major) values(:id, :major)";
	$statement = $db->prepare($query);

	$statement->bindValue(':id', $id);
	$statement->bindvalue(':major', $major);
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

function getAllMajors()
{
	global $db;
	$query = "select * from Major";
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

function getStudent_byID($id)
{
	global $db;
	$query = "select * from Student where id = :id";

	$statement = $db->prepare($query);
	$statement->bindValue(':id', $id);
	$statement->execute();

	$results = $statement->fetch();   

	$statement->closeCursor();

	return $results;	
}

function getMajor_byID($id)
{
	global $db;
	$query = "select * from Major where id = :id";
	$statement = $db->prepare($query);
	$statement->bindValue(':id', $id);
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

function getStudent_byMajor($major)
{
	global $db;
	$query = "select * from Major where major = :major";
	$statement = $db->prepare($query);
	$statement->bindValue(':major', $major);
	$statement->execute();
	$results = $statement->fetch();   
	$statement->closeCursor();
	return $results;	
}


function updateStudent($firstName, $lastName, $phoneNumber, $year, $email)
{
	global $db;
	$query = "update Student set firstName=:firstName, lastName=:lastName, phoneNumber=:phoneNumber, year=:year, email=:email where firstName=:firstName and lastName =:lastName";
	$statement = $db->prepare($query); 
	$statement->bindValue(':firstName', $firstName);
	$statement->bindValue(':lastName', $lastName);
	$statement->bindValue(':phoneNumber', $phoneNumber);
	$statement->bindValue(':year', $year);
	$statement->bindValue(':email', $email);
	$statement->execute();
	$statement->closeCursor();
}

function updateMajor($id, $major)
{
	global $db;
	$query = "update Major set major=:major where id=:id";
	$statement = $db->prepare($query); 
	$statement->bindValue(':major', $major);
	$statement->execute();
	$statement->closeCursor();
}

/*
function deleteStudent_byName($name)
{
	global $db;

	$query = "delete from Student where firstName=:firstName and lastName = :lastName";
	$statement = $db->prepare($query); 
	$statement->bindValue(':firstName', $firstName);
	$statement->bindValue(':lastName', $lastName);
	$statement->execute();
	$statement->closeCursor();
}
*/

function deleteStudent_byID($id)
{
	global $db;

	$query = "delete from Student where id=:id";
	$statement = $db->prepare($query); 
	$statement->bindValue(':id', $id);
	$statement->execute();
	$statement->closeCursor();
}

function deleteMajor_byID($id)
{
	global $id
	$query = "delete from Major where id=:id";
	$statement = $db->prepare($query); 
	$statement->bindValue(':id', $id);
	$statement->execute();
	$statement->closeCursor();
}


?>