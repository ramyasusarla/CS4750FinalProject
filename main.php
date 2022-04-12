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

function addMajor($id, $major)
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

function addNationality($id, $nationality)
{
	global $db; 
	$query = "insert into Nationality (id, nationality) values(:id, :nationality)";
	$statement = $db->prepare($query);

	$statement->bindValue(':id', $id);
	$statement->bindvalue(':nationality', $nationality);
	$statement->execute();
	// release; free the connection to the server so other sql statements may be issued 
	$statement->closeCursor();
} 

function addTraits($id, $trait1, $trait2)
{
	global $db; 
	$query = "insert into Traits (id, trait1, trait2) values(:id, :trait1, :trait2)";
	$statement = $db->prepare($query);

	$statement->bindValue(':id', $id);
	$statement->bindvalue(':trait1', $trait1);
	$statement->bindValue(':trait2', $trait2);
	$statement->execute();
	// release; free the connection to the server so other sql statements may be issued 
	$statement->closeCursor();
} 

function addHobbies($id, $hobby1, $hobby2, $hobby3)
{
	global $db; 
	$query = "insert into Traits (id, hobby1, hobby2, hobby3) values(:id, :hobby1, :hobby2, :hobby3)";
	$statement = $db->prepare($query);

	$statement->bindValue(':id', $id);
	$statement->bindvalue(':hobby1', $hobby1);
	$statement->bindValue(':hobby2', $hobby2);
	$statement->bindValue(':hobby3', $hobby3);
	$statement->execute();
	// release; free the connection to the server so other sql statements may be issued 
	$statement->closeCursor();
} 

function addCurrentJob($id, $currentJobTitle, $currentEmployer)
{
	global $db; 
	$query = "insert into CurrentJob (id, currentJobTitle, currentEmployer) values(:id, :currentJobTitle, :currentEmployer)";
	$statement = $db->prepare($query);

	$statement->bindValue(':id', $id);
	$statement->bindvalue(':currentJobTitle', $currentJobTitle);
	$statement->bindValue(':currentEmployer', $currentEmployer);
	$statement->execute();
	// release; free the connection to the server so other sql statements may be issued 
	$statement->closeCursor();
} 

function addPastJob($id, $pastJobTitle, $pastEmployer)
{
	global $db; 
	$query = "insert into addPastJob (id, pastJobTitle, pastEmployer) values(:id, :pastJobTitle, :pastEmployer)";
	$statement = $db->prepare($query);

	$statement->bindValue(':id', $id);
	$statement->bindvalue(':pastJobTitle', $pastJobTitle);
	$statement->bindValue(':pastEmployer', $pastEmployer);
	$statement->execute();
	// release; free the connection to the server so other sql statements may be issued 
	$statement->closeCursor();
} 

function addSiblingName($id, $siblingName)
{
	global $db; 
	$query = "insert into SiblingName (id, siblingName) values(:id, :siblingName)";
	$statement = $db->prepare($query);

	$statement->bindValue(':id', $id);
	$statement->bindvalue(':siblingName', $siblingName);
	$statement->execute();
	// release; free the connection to the server so other sql statements may be issued 
	$statement->closeCursor();
} 

function addParentName($id, $parent1, $parent2)
{
	global $db; 
	$query = "insert into addParentName (id, parent1, parent2) values(:id, :parent1, :parent2)";
	$statement = $db->prepare($query);

	$statement->bindValue(':id', $id);
	$statement->bindvalue(':parent1', $parent1);
	$statement->bindValue(':parent2', $parent2);
	$statement->execute();
	// release; free the connection to the server so other sql statements may be issued 
	$statement->closeCursor();
} 

function addClass($id, $classSubject, $classNumber, $classTitle)
{
	global $db; 
	$query = "insert into Class (id, classSubject, classNumber, classTitle) values(:id, :classSubject, :classNumber, :classTitle)";
	$statement = $db->prepare($query);

	$statement->bindValue(':id', $id);
	$statement->bindvalue(':classSubject', $classSubject);
	$statement->bindValue(':classNumber', $classNumber);
	$statement->bindValue(':classTitle', $classTitle);
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

function updateHobby($id, $hobby1, $hobby2, $hobby3)
{
	global $db;
	$query = "update Hobbies set hobby1=:hobby1, hobby2=:hobby2, hobby3=:hobby3 where id=:id";
	$statement = $db->prepare($query); 
	$statement->bindValue(':hobby1', $hobby1);
	$statement->bindValue(':hobby2', $hobby2);
	$statement->bindValue(':hobby3', $hobby3);
	$statement->execute();
	$statement->closeCursor();
}

function updateCurrentJob($id, $currentJobTitle, $currentEmployer)
{
	global $db;
	$query = "update CurrentJob set currentJobTitle=:currentJobTitle, currentEmployer=:currentEmployer where id=:id";
	$statement = $db->prepare($query); 
	$statement->bindValue(':currentJobTitle', $currentJobTitle);
	$statement->bindValue(':currentEmployer', $currentEmployer);
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
	global $id;

	$query = "delete from Major where id=:id";
	$statement = $db->prepare($query); 
	$statement->bindValue(':id', $id);
	$statement->execute();
	$statement->closeCursor();
}

function deleteNationality_byID($id)
{
	global $id;

	$query = "delete from Nationality where id=:id";
	$statement = $db->prepare($query); 
	$statement->bindValue(':id', $id);
	$statement->execute();
	$statement->closeCursor();
}

function deleteTraits_byID($id)
{
	global $id;

	$query = "delete from Traits where id=:id";
	$statement = $db->prepare($query); 
	$statement->bindValue(':id', $id);
	$statement->execute();
	$statement->closeCursor();
}

function deleteHobbies_byID($id)
{
	global $id;

	$query = "delete from Hobbies where id=:id";
	$statement = $db->prepare($query); 
	$statement->bindValue(':id', $id);
	$statement->execute();
	$statement->closeCursor();
}

function deleteCurrentJob_byID($id)
{
	global $id;

	$query = "delete from CurrentJob where id=:id";
	$statement = $db->prepare($query); 
	$statement->bindValue(':id', $id);
	$statement->execute();
	$statement->closeCursor();
}

function deletePastJob_byID($id)
{
	global $id;

	$query = "delete from PastJob where id=:id";
	$statement = $db->prepare($query); 
	$statement->bindValue(':id', $id);
	$statement->execute();
	$statement->closeCursor();
}

function deleteSiblingName_byID($id)
{
	global $id;

	$query = "delete from SiblingName where id=:id";
	$statement = $db->prepare($query); 
	$statement->bindValue(':id', $id);
	$statement->execute();
	$statement->closeCursor();
}

function deleteParentName_byID($id)
{
	global $id;

	$query = "delete from ParentNames where id=:id";
	$statement = $db->prepare($query); 
	$statement->bindValue(':id', $id);
	$statement->execute();
	$statement->closeCursor();
}

function deleteClass_byID($id)
{
	global $id;

	$query = "delete from Class where id=:id";
	$statement = $db->prepare($query); 
	$statement->bindValue(':id', $id);
	$statement->execute();
	$statement->closeCursor();
}


?>