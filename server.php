<?php
//session_start();

//initialize variable

$username = "";
$email = "";

//connect to db

$db = mysqli_connect('localhost','root','','practice')or die("couldn't connect to database");//die kill the session

//Register 

$username   = mysqli_real_escape_string($db,$_POST['username']);
$email      = mysqli_real_escape_string($db,$_POST['email']);
$password_1 = mysqli_real_escape_string($db,$_POST['password_1']);
$password_2 = mysqli_real_escape_string($db,$_POST['password_2']);

//form validation

if (empty($username)) {array_push($errors,"Username is required");}
if (empty($email)) {array_push($errors,"Email is required");}
if (empty($password_1)){array_push($errors,"Password is required");}
if (empty($password_1 != $password_2)) { array_push($errors,"Password don't match");}

// check db for existing user with same username
$user_check_query="SELECT*FROM user WHERE username = '$username' or email = '$email' LIMIT 1";
$results = mysqli_query($db, $user_check_query);
$user = mysqli_fetch_assoc($result);
if ($user)
 {
    if ($user['username'] === $username)
    {
         array_push($errors,"username already exists");
    }
    if ($user['email'] === $email)
     {
         array_push($errors,"This email id is already has a registered username");
    }
}
//Register the user if no error

if (count($errors) == 0)
{
    $password = md5($password_1);//this will encrypt the password
    $query="INSERT INTO user (username, email, password)VALUES('$username','$email','$password')";

    mysqli_query($db,$query);
    $_SESSION['username']=$username;
    $_SESSION['success']="You are now logged in";
    header('location: index.php');
}


//LOGIN USER
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db,$_POST['username']);
    $password = mysqli_real_escape_string($db,$_POST['password_1']);

}