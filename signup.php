<?php
require('main.php');
//require('simpleform.php');
require('connect-db.php');
#require('signupbackend.php');

session_start(); 

$account_exist = false;

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if (!empty($_POST['btnAction']) && $_POST['btnAction'] == "Submit")
    {
        $vp = validate($_POST['password']);
        $vf = validate($_POST['firstName']);
        $vl = validate($_POST['lastName']);

        $check = getUser_Login($vp, $vf, $vl);

        echo "<pre>";
        print_r($check[0]);
        echo "</pre>";

        if ($check[0] == null)
        {   
            $account_exist = false;
            addUser($vf, $vl, $vp);
            header("Location: login.php");
        }
        else
        {
            $account_exist = true;
            echo("Account already exists, proceed to Login");
            header('Location: signup.php');
        }
    }   
}
?>

<!--         <?php if($account_exist == true):?>
            <p style="text-align:center">Account already exists, proceed to Login</p>
        <?php endif; ?> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
    </style>
</head>

<body>
  
    <div style="margin: auto" class="wrapper">
        <h2 style="text-align:center">Find Your Friends</h2>
        <p style="text-align:center">Please fill this form to create an account.</p>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>First Name</label>
                <input name="firstName" class="form-control">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
                <br>
                <label>Last Name</label>
                <input name="lastName" class="form-control">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
                <br>
                <label>Password</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
                
            </div>
            <div class="form-group">
                <input style="margin: auto width: 50%"type="submit" class="btn btn-primary" name="btnAction" value="Submit">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>    
   
</body>
</html>