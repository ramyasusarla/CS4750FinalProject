<?php
require('connect-db.php');
require('main.php');

$list_of_students = getAllStudents();
$list_of_majors = getAllMajors();
$list_of_nationalities = getAllNationalities();
$list_of_traits = getAllTraits();
$list_of_classes = getAllClasses();
$list_of_hobbies = getAllHobbies();
$list_of_currentJobs = getAllCurrentJobs();
$list_of_pastJob = getAllPastJobs();
$list_of_siblingNames = getAllSiblingNames();
$list_of_parentNames = getAllparentNames();

$student_to_update = null;
$major_to_update = null;
$hobby_to_update = null;
$currentJob_to_update = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if (!empty($_POST['btnAction']) && $_POST['btnAction'] == "Add")
    {

        addStudent($_POST['firstName'], $_POST['lastName'], $_POST['phoneNumber'], $_POST['year'], $_POST['email'], $_POST['major'], $_POST['nationality'], $_POST['trait1'], $_POST['trait2'], $_POST['hobby1'], $_POST['hobby2'], $_POST['hobby3'], $_POST['currentJobTitle'], $_POST['currentEmployer'], $_POST['pastJobTitle'], $_POST['pastEmployer'], $_POST['siblingName'], $_POST['parent1'], $_POST['parent2'], $_POST['classSubject'], $_POST['classNumber'], $_POST['classTitle']);

        // $most_recent_ID = getMostRecentID($_POST['firstName'], $_POST['lastName'], $_POST['phoneNumber'], $_POST['year'], $_POST['email']);
        // addMajor($most_recent_ID, $_POST['major']);
        // addNationality($most_recent_ID, $_POST['nationality']);
        // addTraits($most_recent_ID, $_POST['trait1'], $_POST['trait2']);
        // addHobbies($most_recent_ID, $_POST['hobby1'], $_POST['hobby2'], $_POST['hobby3']);
        // addCurrentJob($most_recent_ID, $_POST['currentJobTitle'], $_POST['currentEmployer']);
        // addPastJob($most_recent_ID, $_POST['pastJobTitle'], $_POST['pastJobTitle']);
        // addSiblingName($most_recent_ID, $_POST['siblingName']);
        // addParentNames($most_recent_ID, $_POST['parent1'], $_POST['parent2']);
        // addClass($most_recent_ID, $_POST['classSubject'], $_POST['classNumber'], $_POST['classTitle'])
        
    }
    else if (!empty($_POST['btnAction']) && $_POST['btnAction'] == "Update")
    {  
      $student_to_update = getStudent_byID($_POST['student_to_update']);

      //$major_to_update = getMajor_byID($_POST['major_to_update']);

      // $hobby_to_update = getMajor_byID($_POST['hobby_to_update']);

      // $currentJob_to_update = getMajor_byID($_POST['currentJob_to_update']);


      // To fill in the form, assign the pieces of info to the value attributes of form input textboxes.
      // Then, we'll wait until a user makes some changes to the friend's info 
      // and click the "Confirm update" button to actually make it reflect the database. 
      // (also note: "name" is a primary key -- refer to the friends table we created, thus can't be updated)
    }
    else if (!empty($_POST['btnAction']) && $_POST['btnAction'] == "Delete")
    {
      deleteStudent_byID($_POST['student_to_delete']);
      $list_of_students = getAllStudents();

    }

    if (!empty($_POST['btnAction']) && $_POST['btnAction'] == "Confirm update")
    {
      updateStudent($_POST['id'], $_POST['firstName'], $_POST['lastName'], $_POST['phoneNumber'], $_POST['year'], $_POST['email']);
      // updateStudent($student_to_update['id'], $_POST['firstName'], $_POST['lastName'], $_POST['phoneNumber'], $_POST['year'], $_POST['email'], $_POST['major'], $_POST['nationality'], $_POST['trait1'], $_POST['trait2'], $_POST['hobby1'], $_POST['hobby2'], $_POST['hobby3'], $_POST['currentJobTitle'], $_POST['currentEmployer'], $_POST['pastJobTitle'], $_POST['pastEmployer'], $_POST['siblingName'], $_POST['parent1'], $_POST['parent2'], $_POST['classSubject'], $_POST['classNumber'], $_POST['classTitle']);
      // updateMajor(student_to_update[id], $_POST['major']);
      // updateHobby(student_to_update[id], $_POST['hobby1'], $_POST['hobby2'], $_POST['hobby3']);
      // updateCurrentJob(student_to_update[id], $_POST['currentJobTitle'], $_POST['currentEmployer']);

      $list_of_students = getAllStudents();
      // $list_of_majors = getAllMajors();
      // $list_of_nationalities = getAllNationalities();
      // $list_of_traits = getAllTraits();
      // $list_of_classes = getAllClasses();
      // $list_of_hobbies = getAllHobbies();
      // $list_of_currentJobs = getAllCurrentJobs();
      // $list_of_pastJob = getAllPastJobs();
      // $list_of_siblingNames = getAllSiblingNames();
      // $list_of_parentNames = getAllparentNames();
    }
}
?>


<!-- 1. create HTML5 doctype -->
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">  
  
  <!-- 2. include meta tag to ensure proper rendering and touch zooming -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- 
  Bootstrap is designed to be responsive to mobile.
  Mobile-first styles are part of the core framework.
   
  width=device-width sets the width of the page to follow the screen-width
  initial-scale=1 sets the initial zoom level when the page is first loaded   
  -->
  
  <meta name="author" content="your name">
    
  <title>DB interfacing example</title>
  
  <!-- 3. link bootstrap -->
  <!-- if you choose to use CDN for CSS bootstrap -->  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  
  <!-- you may also use W3's formats -->
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  
  <!-- 
  Use a link tag to link an external resource.
  A rel (relationship) specifies relationship between the current document and the linked resource. 
  -->
  
  <!-- If you choose to use a favicon, specify the destination of the resource in href -->
  <link rel="icon" type="image/png" href="http://www.cs.virginia.edu/~up3f/cs4750/images/db-icon.png" />
  
  <!-- if you choose to download bootstrap and host it locally -->
  <!-- <link rel="stylesheet" href="path-to-your-file/bootstrap.min.css" /> --> 
  
  <!-- include your CSS -->
  <!-- <link rel="stylesheet" href="custom.css" />  -->
       
</head>

<body>
<div class="container">
  <h1>Basic Student Information</h1>  

  <form name="mainForm" action="simpleform.php" method="post">  
  <div class="row mb-3 mx-3">
    ID:
    <input type="text" class="form-control" name="id" required 
            value="<?php if ($student_to_update!=null) echo $student_to_update['id'] ?>"
    />        
  </div>   
  <div class="row mb-3 mx-3">
    First Name:
    <input type="text" class="form-control" name="firstName" required 
            value="<?php if ($student_to_update!=null) echo $student_to_update['firstName'] ?>"
    />            
  </div>  
  <div class="row mb-3 mx-3">
    Last Name:
    <input type="text" class="form-control" name="lastName" required 
            value="<?php if ($student_to_update!=null) echo $student_to_update['lastName'] ?>"
    />          
  </div> 
  <div class="row mb-3 mx-3">
    Phone Number:
    <input type="text" class="form-control" name="phoneNumber" required 
            value="<?php if ($student_to_update!=null) echo $student_to_update['phoneNumber'] ?>"
    />          
  </div> 
  <div class="row mb-3 mx-3">
    Year:
    <input type="number" class="form-control" name="year" required 
            value="<?php if ($student_to_update!=null) echo $student_to_update['year'] ?>"
    />          
  </div>  
  <div class="row mb-3 mx-3">
    Email:
    <input type="text" class="form-control" name="email" required 
            value="<?php if ($student_to_update!=null) echo $student_to_update['email'] ?>"
    />          
  </div>  
  <div class="row mb-3 mx-3">
    Major:
    <input type="text" class="form-control" name="major" required
            value="<?php if ($student_to_update!=null) echo $student_to_update['major'] ?>"
    />          
  </div>  
  <div class="row mb-3 mx-3">
    Nationality:
    <input type="text" class="form-control" name="nationality" required 
            value="<?php if ($student_to_update!=null) echo $student_to_update['nationality'] ?>"
    />          
  </div>  
  <div class="row mb-3 mx-3">
    Trait 1:
    <input type="text" class="form-control" name="trait1" required 
            value="<?php if ($student_to_update!=null) echo $student_to_update['trait1'] ?>"
    />          
  </div>  
  <div class="row mb-3 mx-3">
    Trait 2:
    <input type="text" class="form-control" name="trait2" 
    />          
  </div>  
  <div class="row mb-3 mx-3">
    Hobby 1:
    <input type="text" class="form-control" name="hobby1" 
    />          
  </div>  
  <div class="row mb-3 mx-3">
  Hobby 2:
    <input type="text" class="form-control" name="hobby2" 
    />          
  </div>
  <div class="row mb-3 mx-3">  
  Hobby 3:
    <input type="text" class="form-control" name="hobby3" 
    />          
  </div>  
  <div class="row mb-3 mx-3">
  Current Job Title:
    <input type="text" class="form-control" name="currentJobTitle" 
    />          
  </div> 
  <div class="row mb-3 mx-3"> 
  Current Employer:
    <input type="text" class="form-control" name="currentEmployer" 
    />          
  </div> 
  <div class="row mb-3 mx-3">
    Past Job Title:
    <input type="text" class="form-control" name="pastJobTitle"
    />          
  </div>  
  <div class="row mb-3 mx-3">
    Past Employer:
    <input type="text" class="form-control" name="pastEmployer"
    />          
  </div>  
  <div class="row mb-3 mx-3">
    Sibling Name:
    <input type="text" class="form-control" name="siblingName"
    />          
  </div>  
  <div class="row mb-3 mx-3">
    Parent Name 1:
    <input type="text" class="form-control" name="parent1"
    />          
  </div>  
  <div class="row mb-3 mx-3">
    Parent Name 2:
    <input type="text" class="form-control" name="parent2"
    />          
  </div>  
  <div class="row mb-3 mx-3"> 
  Class Subject (mnuemonic):
    <input type="text" class="form-control" name="classSubject"
    />          
  </div> 
  <div class="row mb-3 mx-3"> 
  Class Number:
    <input type="number" class="form-control" name="classNumber"
    />          
  </div> 
  <div class="row mb-3 mx-3"> 
  Class Title:
    <input type="text" class="form-control" name="classTitle"
    />          
  </div> 
  <input type="submit" value="Add" name="btnAction" class="btn btn-dark" 
        title="insert a student" />  
  <input type="submit" value="Confirm update" name="btnAction" class="btn btn-dark" 
        title="confirm update a student" />  
</form>    

<hr/>
<h2>List of Student Information</h2>
<!-- <div class="row justify-content-center">   -->
<table class="w3-table w3-bordered w3-card-4" style="width:90%">
  <thead>
  <tr style="background-color:#B0B0B0">
    <th width="11%">ID</th>   
    <th width="11%">First Name</th>   
    <th width="11%">Last Name</th>     
    <th width="11%">Phone Number</th>        
    <th width="11%">Year</th> 
    <th width="11%">Email</th> 
    <th width="11%">Update</th>
    <th width="11%">Delete</th> 
  </tr>
  </thead>
  <?php foreach ($list_of_students as $student):  ?>
  <tr>
    <td><?php echo $student['id']; ?></td>
    <td><?php echo $student['firstName']; ?></td>
    <td><?php echo $student['lastName']; ?></td>
    <td><?php echo $student['phoneNumber']; ?></td>
    <td><?php echo $student['year']; ?></td>
    <td><?php echo $student['email']; ?></td>
    <td>
      <form action="simpleform.php" method="post">
        <input type="submit" value="Update" name="btnAction" class="btn btn-primary" />
        <input type="hidden" name="student_to_update" value="<?php echo $student['id'] ?>" />      
      </form>
    </td>
    <td>
    <form action="simpleform.php" method="post">
        <input type="submit" value="Delete" name="btnAction" class="btn btn-danger" />
        <input type="hidden" name="student_to_delete" value="<?php echo $student['id'] ?>" />      
      </form>
    </td> 
  </tr>
  <?php endforeach; ?>
</table>

<!-- <h2>List of Majors</h2>
<table class="w3-table w3-bordered w3-card-4" style="width:90%">
  <thead>
  <tr style="background-color:#B0B0B0">
    <th width="12.5%">ID</th>   
    <th width="12.5%">Major</th>     
    <th width="12.5%">Update</th>
    <th width="12.5%">Delete</th> 
  </tr>
  </thead>
  <?php foreach ($list_of_majors as $major):  ?>
  <tr>
    <td><?php echo $major['id']; ?></td>
    <td><?php echo $major['major']; ?></td>
  </tr>
  <?php endforeach; ?>
</table> -->
  

<!-- </div>   -->


  <!-- CDN for JS bootstrap -->
  <!-- you may also use JS bootstrap to make the page dynamic -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->
  
  <!-- for local -->
  <!-- <script src="your-js-file.js"></script> -->  
  
</div>    
</body>
</html>