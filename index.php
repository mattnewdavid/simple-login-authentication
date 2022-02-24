<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Authentication</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    
        <form method="post" action="signup.php">
            <h2>Sign up</h2>
            <input name="name" type="text" placeholder="Name"><br>
            <input name="email" type="text" placeholder="Email"><br>
            <input name="password" type="password" placeholder="Password"><br>
            <input name="passwordcheck" type="password" placeholder="Confirm Password"><br>
            <input class="submit" name="submit" type="submit" value="Sign-up"><br>
        </form>

        <form method="post" action="login.php">
            <h2>Log in</h2>
            <input name="name" type="text" placeholder="Name"><br>
            <input name="email" type="text" placeholder="Email"><br>
            <input name="password" type="password" placeholder="Password"><br>
            <input name="passwordcheck" type="password" placeholder="Confirm Password"><br>
            <input class="submit" name="submit" type="submit" value="Log-in"><br>
        </form>
    
    
    
</body>
</html>