<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     
    <form method="POST" action="mysql1.php">
    <h2>Form Validation</h2>
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br>

    <label for="ip_address">IP address of your router:</label>
    <input type="text" id="ip_address" name="ip_address" value="192.168.0.1" required><br>

    <label for="web_url">Personal web URL:</label>
    <input type="url" id="web_url" name="web_url" required>
    <br>

    <label for="dob">Date of Birth:</label>
    <input type="text" id="dob" name="dob" required><br>

    <label>Gender:</label>
    <input type="radio" id="male" name="gender" value="male" required>
    <label for="male">Male</label>
    <input type="radio" id="female" name="gender" value="female" required>
    <label for="female">Female</label>
    <input type="radio" id="other" name="gender" value="other" required>
    <label for="other">Other</label><br>

    <label for="mobile">Mobile Number:</label>
    <input type="tel" id="mobile" name="mobile" required><br>

    <label for="brief_info">Brief info:</label><br>
    <textarea id="brief_info" name="brief_info" rows="4" cols="50" required></textarea><br>

    <input type="submit" value="Register">
</body>
</html>