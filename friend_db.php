<?php

function addFriend($name,$major, $year)
{
	// db handler
	global $db;

	// write sql
	// insert into friends values('someone', 'cs', 4)";
	//$query = "insert into friends values('" . $name . "', '" . $major . "'," . $year . ")";
	$query = "insert into friends values(:name, :major, :year)";

	// execute the sql
	//$statement = $db->query($query);   // query() will compile and execute the sql
	$statement = $db->prepare($query);

	$statement->bindValue(':name', $name);
	$statement->bindValue(':major', $major);
	$statement->bindValue(':year', $year);

	$statement->execute();
	
	// release; free the connection to the server so other sql statements may be issued 
	$statement->closeCursor();
}

function getAllFriends()
{
	global $db;
	$query = "select * from friends";
	//$statement = $db->query($query);     // 16-Mar, stopped here, still need to fetch and return the result 

	//1. prepare
	//2. bindValue & execute
	$statement=$db->prepare($query);
	$statement -> execute();
	
	//$result2=$statement->get_result();
	//$results=$result2->fetchAll();
	// fetchAll() returns an array of all rows in the result set
	$results = $statement->fetchAll();   
	

	$statement->closeCursor();

	return $results;
}

function getFriend_byName($name)
{
	global $db;
	$query = "select * from friends where name = :name";
	//$statement = $db->query($query);     // 16-Mar, stopped here, still need to fetch and return the result 

	//1. prepare
	//2. bindValue & execute
	$statement=$db->prepare($query);
	$statement->bindValue(':name', $name);
	$statement -> execute();
	
	// fetchAll() returns an array of all rows in the result set
	$results = $statement->fetch();   
	

	$statement->closeCursor();

	return $results;
}





?>