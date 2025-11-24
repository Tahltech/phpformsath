<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <h3>Login!!</h3>
    <form action="./Auth/Auth.php" method="POST">
        <div>
            <label for="username ">Enter Full Name Or Email</label> <br>
            <input type="text" name="username">
        </div>
        <div>
            <label for="password">Password</label><br>
            <input type="text" name="password">
        </div>

        <br>
        <button type="submit">Login</button>


    </form>

</body>

</html>