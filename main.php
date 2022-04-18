<?php

// global $id;
// $id = 20;

function getUser_Login($firstName, $lastName, $password)
{ 
    global $db;
    $query = "select * from Login where password=:password and firstName=:firstName and lastName=:lastName";
    $statement = $db->prepare($query);
    $statement->bindValue(':password', $password);
    $statement->bindValue(':firstName', $firstName);
    $statement->bindValue(':lastName', $lastName);
    $statement->execute();
    $result = $statement->fetchAll();   
    $statement->closeCursor();
    return $result; 
}

function validate($data)
{
    $data = trim($data);
	$data = stripslashes($data);
	// $data = htmlspecialchars($data);
	return $data;
}

function getMostRecentID($firstName, $lastName, $phoneNumber, $year, $email)
{ 
	global $db;
	$query = "select * from Student where firstName=:firstName and lastName=:lastName and phoneNumber = :phoneNumber and year=:year and email=:email";
	$statement = $db->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();   
	$statement->closeCursor();

	return $result;	
}

function addUser($firstName, $lastName, $password)
{
    global $db;

    $query = "insert into Login(password, firstName, lastName) values(:password, :firstName, :lastName)";
    $statement = $db->prepare($query);
    $statement->bindValue(':password', $password);
    $statement->bindValue(':firstName', $firstName);
    $statement->bindValue(':lastName', $lastName);
    $statement->execute();
    
    // $query = "select max(id) from Login";
	// $statement = $db->prepare($query);
	// $statement->execute();
	// $result = $statement->fetch();   
	$statement->closeCursor();	
}

function addStudent($firstName, $lastName, $phoneNumber, $year, $email, $major, $nationality, $trait1, $trait2, $hobby1, $hobby2, $hobby3, $currentJobTitle, $currentEmployer, $pastJobTitle, $pastEmployer, $siblingName, $parent1, $parent2, $classSubject, $classNumber, $classTitle)
{
	global $db; 

	$query = "insert into Student (firstName, lastName, phoneNumber, year, email) values(:firstName, :lastName, :phoneNumber, :year, :email)";
	$statement = $db->prepare($query);
	$statement->bindValue(':firstName', $firstName);
	$statement->bindValue(':lastName', $lastName);
	$statement->bindValue(':phoneNumber', $phoneNumber);
	$statement->bindValue(':year', $year);
	$statement->bindValue(':email', $email);
	$statement->execute();

	$query = "select max(id) from Student";
	$statement = $db->prepare($query);
	$statement->execute();
	$result = $statement->fetch();   
	$statement->closeCursor();	
	$resultID = $result[0];

	addMajor($resultID, $major);	
	addNationality($resultID, $nationality);
	addTraits($resultID, $trait1, $trait2);
	addHobbies($resultID, $hobby1, $hobby2, $hobby3);
	addCurrentJob($resultID, $currentJobTitle, $currentEmployer);
	addPastJob($resultID, $pastJobTitle, $pastEmployer);
	addSiblingName($resultID, $siblingName);
	addParentNames($resultID, $parent1, $parent2);
	addClass($resultID, $classSubject, $classNumber, $classTitle);
} 

function addMajor($id, $major)
{
	global $db; 
	$query = "insert into Major (id, major) values(:id, :major)";
	$statement = $db->prepare($query);

	$statement->bindValue(':id', $id);
	$statement->bindValue(':major', $major);
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
	$statement->bindValue(':nationality', $nationality);
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
	$statement->bindValue(':trait1', $trait1);
	$statement->bindValue(':trait2', $trait2);
	$statement->execute();
	// release; free the connection to the server so other sql statements may be issued 
	$statement->closeCursor();
} 

function addHobbies($id, $hobby1, $hobby2, $hobby3)
{
	global $db; 
	$query = "insert into Hobbies (id, hobby1, hobby2, hobby3) values(:id, :hobby1, :hobby2, :hobby3)";
	$statement = $db->prepare($query);

	$statement->bindValue(':id', $id);
	$statement->bindValue(':hobby1', $hobby1);
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
	$statement->bindValue(':currentJobTitle', $currentJobTitle);
	$statement->bindValue(':currentEmployer', $currentEmployer);
	$statement->execute();
	// release; free the connection to the server so other sql statements may be issued 
	$statement->closeCursor();
} 

function addPastJob($id, $pastJobTitle, $pastEmployer)
{
	global $db; 
	$query = "insert into PastJob (id, pastJobTitle, pastEmployer) values(:id, :pastJobTitle, :pastEmployer)";
	$statement = $db->prepare($query);

	$statement->bindValue(':id', $id);
	$statement->bindValue(':pastJobTitle', $pastJobTitle);
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
	$statement->bindValue(':siblingName', $siblingName);
	$statement->execute();
	// release; free the connection to the server so other sql statements may be issued 
	$statement->closeCursor();
} 

function addParentNames($id, $parent1, $parent2)
{
	global $db; 
	$query = "insert into ParentName (id, parent1, parent2) values(:id, :parent1, :parent2)";
	$statement = $db->prepare($query);

	$statement->bindValue(':id', $id);
	$statement->bindValue(':parent1', $parent1);
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
	$statement->bindValue(':classSubject', $classSubject);
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

function getAllNationalities()
{
	global $db;
	$query = "select * from Nationality";
	$statement = $db->prepare($query);
	$statement->execute();
	$results = $statement->fetchAll();   
	$statement->closeCursor();
	return $results;
}

function getAllTraits()
{
	global $db;
	$query = "select * from Traits";
	$statement = $db->prepare($query);
	$statement->execute();
	$results = $statement->fetchAll();   
	$statement->closeCursor();
	return $results;
}

function getAllClasses()
{
	global $db;
	$query = "select * from Class";
	$statement = $db->prepare($query);
	$statement->execute();
	$results = $statement->fetchAll();   
	$statement->closeCursor();
	return $results;
}

function getAllHobbies()
{
	global $db;
	$query = "select * from Hobbies";
	$statement = $db->prepare($query);
	$statement->execute();
	$results = $statement->fetchAll();   
	$statement->closeCursor();
	return $results;
}

function getAllCurrentJobs()
{
	global $db;
	$query = "select * from CurrentJob";
	$statement = $db->prepare($query);
	$statement->execute();
	$results = $statement->fetchAll();   
	$statement->closeCursor();
	return $results;
}

function getAllPastJobs()
{
	global $db;
	$query = "select * from PastJob";
	$statement = $db->prepare($query);
	$statement->execute();
	$results = $statement->fetchAll();   
	$statement->closeCursor();
	return $results;
}

function getAllSiblingNames()
{
	global $db;
	$query = "select * from SiblingName";
	$statement = $db->prepare($query);
	$statement->execute();
	$results = $statement->fetchAll();   
	$statement->closeCursor();
	return $results;
}

function getAllparentNames()
{
	global $db;
	$query = "select * from ParentNames";
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

// function getStudent_byAll($id, $firstName, $lastName, $phoneNumber, $year, $email)
// {
// 	global $db;
// 	$query = "select * from Student where id = :id";

// 	$statement = $db->prepare($query);
// 	$statement->bindValue(':id', $id);
// 	$statement->bindValue(':firstName', $firstName);
// 	$statement->bindValue(':lastName', $lastName);
// 	$statement->bindValue(':phoneNumber', $phoneNumber);
// 	$statement->bindValue(':year', $year);
// 	$statement->bindValue(':email', $email);
// 	$statement->execute();

// 	$results = $statement->fetch();   

// 	$statement->closeCursor();

// 	return $results;	
// }

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

function getStudentsbyYear($year)
{
	global $db;
	$query = "select * from Student where year = :year";
	$statement = $db->prepare($query);
	$statement->bindValue(':year', $year);
	$statement->execute();
	$results = $statement->fetchAll();   
	$statement->closeCursor();
	return $results;	
}

function getStudentsByNationality($id)
{
	global $db;
	$query = "select * FROM `Nationality`natural join `Student` WHERE Nationality.nationality = (SELECT nationality FROM `Student` natural join `Nationality` WHERE Nationality.id = :id)";
	$statement = $db->prepare($query);
	$statement->bindValue(':id', $id);
	$statement->execute();
	$results = $statement->fetchAll();   
	$statement->closeCursor();
	return $results;	
}

function getStudentsByMajor($id)
{
	global $db;
	$query = "select * FROM `Major`natural join `Student` WHERE Major.major = (SELECT major FROM `Student` natural join `Major` WHERE Major.id = :id)";
	$statement = $db->prepare($query);
	$statement->bindValue(':id', $id);
	$statement->execute();
	$results = $statement->fetchAll();   
	$statement->closeCursor();
	return $results;	
}

function updateStudent($id, $firstName, $lastName, $phoneNumber, $year, $email)
{
	global $db;
	// $query = "update Student set year=:year where id=:id";
	$query = "update Student set firstName=:firstName, lastName=:lastName, phoneNumber=:phoneNumber, year=:year, email=:email where id=:id";
	$statement = $db->prepare($query);
	$statement->bindValue(':id', $id); 
	$statement->bindValue(':firstName', $firstName);
	$statement->bindValue(':lastName', $lastName);
	$statement->bindValue(':phoneNumber', $phoneNumber);
	$statement->bindValue(':year', $year);
	$statement->bindValue(':email', $email);
	$statement->execute();
	$statement->closeCursor();
}

// function updateStudent($id, $firstName, $lastName, $phoneNumber, $year, $email, $major, $nationality, $trait1, $trait2, $hobby1, $hobby2, $hobby3, $currentJobTitle, $currentEmployer, $pastJobTitle, $pastEmployer, $siblingName, $parent1, $parent2, $classSubject, $classNumber, $classTitle)
// {
// 	global $db;
// 	updateMajor($id, $major);
// 	$query = "update Student set firstName=:firstName, lastName=:lastName, phoneNumber=:phoneNumber, year=:year, email=:email where id=:id";
// 	$statement = $db->prepare($query); 
// 	$statement->bindValue(':firstName', $firstName);
// 	$statement->bindValue(':lastName', $lastName);
// 	$statement->bindValue(':phoneNumber', $phoneNumber);
// 	$statement->bindValue(':year', $year);
// 	$statement->bindValue(':email', $email);
// 	$statement->execute();
// 	$statement->closeCursor();
// }

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
	deleteMajor_byID($id);
	deleteNationality_byID($id);
	deleteTraits_byID($id);
	deleteHobbies_byID($id);
	deleteCurrentJob_byID($id);
	deletePastJob_byID($id);
	deleteSiblingName_byID($id);
	deleteParentName_byID($id);
	deleteClass_byID($id);
}

function deleteMajor_byID($id)
{
	global $db;

	$query = "delete from Major where id=:id";
	$statement = $db->prepare($query); 
	$statement->bindValue(':id', $id);
	$statement->execute();
	$statement->closeCursor();
}

function deleteNationality_byID($id)
{
	global $db;

	$query = "delete from Nationality where id=:id";
	$statement = $db->prepare($query); 
	$statement->bindValue(':id', $id);
	$statement->execute();
	$statement->closeCursor();
}

function deleteTraits_byID($id)
{
	global $db;

	$query = "delete from Traits where id=:id";
	$statement = $db->prepare($query); 
	$statement->bindValue(':id', $id);
	$statement->execute();
	$statement->closeCursor();
}

function deleteHobbies_byID($id)
{
	global $db;

	$query = "delete from Hobbies where id=:id";
	$statement = $db->prepare($query); 
	$statement->bindValue(':id', $id);
	$statement->execute();
	$statement->closeCursor();
}

function deleteCurrentJob_byID($id)
{
	global $db;

	$query = "delete from CurrentJob where id=:id";
	$statement = $db->prepare($query); 
	$statement->bindValue(':id', $id);
	$statement->execute();
	$statement->closeCursor();
}

function deletePastJob_byID($id)
{
	global $db;

	$query = "delete from PastJob where id=:id";
	$statement = $db->prepare($query); 
	$statement->bindValue(':id', $id);
	$statement->execute();
	$statement->closeCursor();
}

function deleteSiblingName_byID($id)
{
	global $db;

	$query = "delete from SiblingName where id=:id";
	$statement = $db->prepare($query); 
	$statement->bindValue(':id', $id);
	$statement->execute();
	$statement->closeCursor();
}

function deleteParentName_byID($id)
{
	global $db;

	$query = "delete from ParentNames where id=:id";
	$statement = $db->prepare($query); 
	$statement->bindValue(':id', $id);
	$statement->execute();
	$statement->closeCursor();
}

function deleteClass_byID($id)
{
	global $db;

	$query = "delete from Class where id=:id";
	$statement = $db->prepare($query); 
	$statement->bindValue(':id', $id);
	$statement->execute();
	$statement->closeCursor();
}


?>