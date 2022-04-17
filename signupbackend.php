<?php
require('connect-db.php');

function addUser($firstName, $lastName, $password)
{
    global $db;
    $query = "insert into Login(password, firstName, lastName) values(:password, :firstName, :lastName)";
    $statement = $db->prepare($query);
    $statement->bindValue(':password', $lastName);
    $statement->bindValue(':firstName', $firstName);
    $statement->bindValue(':lastName', $lastName);
    
    $statement->execute();
    
    // $query = "select max(id) from Login";
	// $statement = $db->prepare($query);
	// $statement->execute();
	// $result = $statement->fetch();   
	$statement->closeCursor();	
}
?>