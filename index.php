<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Forms</title>
    <link rel="stylesheet" href="style.css">
    <script src="main.js" defer></script>
</head>
<body>

<section>

    <?php require_once "./templates/notice.php" ?>

    <h1>User Registration</h1>

    <form action="./register.php" method="POST">

       <!-- Name -->
        <div>
            <label for="name">Full Name</label>
            <input type="text" name="fullName" id="fullName" required />
        </div>

        <!-- Email -->
        <div>
            <label for="email">Email Address</label>
            <input type="email" name="email" id="email" required />
        </div>

        <!-- Password -->
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required />
        </div>

        <!-- Gender -->
        <div>
            <label for="gender">Gender</label>
            <select name="gender" id="gender" required>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="rather_not_say">Rather Not Say</option>
            </select>
        </div>

        <!-- Phone Number -->
        <div>
            <label for="phoneNumber">Phone Number</label>
            <input type="tel" name="phoneNumber" id="phoneNumber" required />
        </div>

        <!-- Address -->
        <div>
            <label for="address">Address</label>
            <input type="text" name="address" id="address" />
        </div>

        <!-- Place of birth -->
        <div>
            <label for="placeOfBirth">Place of Birth</label>
            <input type="text" name="placeOfBirth" id="placeOfBirth" />
        </div>

        <!-- Date of birth -->
        <div>
            <label for="dateOfBirth">Date of Birth</label>
            <input type="date" name="dateOfBirth" id="dateOfBirth" />
        </div>

        <button type="submit">Submit</button>

    </form>



</section>


    
</body>
</html>