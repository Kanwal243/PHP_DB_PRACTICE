<?php include('server.php')?>
<!DOCTYPE html>
<html>
<head>
    <title>Student</title>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Log In</h2>
        </div>
        <form action="login.php" method="post">
            <div>
                <label for="username">Username :</label>
                <input type="text"name="username"required>
            </div>
            <div>
                <label for="password">Password :</label>
                <input type="text"name="password_1"required>
            </div>
            <button type="submit"name="login_user">Log In</button>
       <p>Not a user?<a href="registration.php"><b>Register Here</b></a></p>
        </form>
    </div>
</body>
</html>