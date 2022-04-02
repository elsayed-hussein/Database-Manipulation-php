<?php
$servername = "127.0.0.1";
$username = "test";
$password = "passowrd";
$db_name = 'product_db';

// Create connection
$conn = new mysqli($servername, $username, $password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: {$conn->connect_error}");
}

echo "Connected successfully";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display</title>
</head>

<body>

</body>

</html>