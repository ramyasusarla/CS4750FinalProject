<?php 

session_start(); 
require "connect-db.php";
include "login.html";
require "main.php";


global $db;


if($_SERVER["REQUEST_METHOD"] == "POST"){

    if (!empty($_POST['btnAction']) && $_POST['btnAction'] == "Submit")
    { 
            $firstName = validate($_POST['firstName']);

            $password = validate($_POST['password']);

            if (empty($_POST['firstName'])) {

                header("Location: login.php?error=First Name is required");

                exit();

            }

            else if (empty($_POST['password'])){

                header("Location: login.php?error=Password is required");

                exit();

            }
            else{
                // $sql = "SELECT * FROM Login WHERE firstName=:firstName AND lastName =:lastName AND password=:password";

                // $result = mysqli_query($db, $sql);
                    // $row = mysqli_fetch_assoc($result);

                $vp = validate($_POST['password']);
                $vf = validate($_POST['firstName']);
                $vl = validate($_POST['lastName']);

                $result = getUser_login($vf, $vl, $vp);

                //print_r($row);
                // print($_POST['password']);
                // print($_POST['firstName']);
                // print($_POST['lastName']);
                // print($vp);
                // print($vf);
                // print($vl);
                // print("  ");
                // echo "<pre>";
                // print_r($result[0]);
                // echo "</pre>";
                $row=$result[0];


                // if ($row[0] === $_POST['password'] && $row[1] === $_POST['firstName'] && $row[2] === $_POST['lastName']) 
                if ($row[0] === $vp && $row[1] === $vf && $row[2] === $vl) 
                {
                    echo "Logged in!";
                    $_SESSION['firstName'] = $row['1'];
                    $_SESSION['lastName'] = $row['2'];
                    $_SESSION['password'] = $row['0'];
                    // $_SESSION['id'] = $row['id'];
                    header("Location: simpleform.php");
                    exit();
                }
                else
                {
                    header("Location: login.php?error=Incorrect name or password");

                    exit();

                }

            }

        
    }else{

    header("Location: login.php");

    exit();

    }   
}
