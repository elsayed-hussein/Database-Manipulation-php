<html>

<head>
  <title>PHP Test</title>
</head>

<body>
  <?php
  $servername = "127.0.0.1";
  $username = "test";
  $password = "passowrd";
  $db_name = 'product_db';

  // Create connection
  $conn = new mysqli($servername, $username, $password);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: {$conn->connect_error}");
    exit();
  }
  // CREATE DATABASE IF NOT EXISTS 
  if (!$conn->select_db($db_name)) {
    // echo "Couldn't select database: " . $conn->error;
    if (!$conn->query("CREATE DATABASE IF NOT EXISTS {$db_name}")) {
      echo "Couldn't create database: " . $conn->error;
    }
    $conn->select_db($db_name);
  }


  // CREATE TABLE IF NOT EXISTS 
  $query = "SELECT ID FROM 'product'";
  $result = mysqli_query($conn, $query);

  if (empty($result)) {
    $query = "CREATE TABLE `product` ( `ID` INT NOT NULL AUTO_INCREMENT , `Prod_name` VARCHAR NOT NULL DEFAULT 'Product' , `price` FLOAT NOT NULL DEFAULT '0' , `Prod_description` TEXT NOT NULL DEFAULT 'no description', `quantity` INT NOT NULL DEFAULT '0' , `created_at` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`ID`)) ENGINE = InnoDB;";
    $result = mysqli_query($conn, $query);
  };
  echo "Connected successfully";

  $conn->close();
  ?>
</body>

</html>

<!-- [ ] Create a table of products. -->
<!-- [ ] insert 20 rows with the Id of that product, the name and the price of it into the table using a form that takes the needed data and submits it into that table. -->
<!-- [ ] Connect to database using object oriented notation. -->
<!-- [ ] Display only the first 10 products on another display page. -->
<!-- [ ] Display the last record inserted to the table on the display page. -->
<!-- [ ] Search about a specific product and display it on the display page, for example:return all products that have a price more than 5$ using the suitable query statement. -->
<!-- [ ] Use sanitization and escaping functions to secure your program. -->