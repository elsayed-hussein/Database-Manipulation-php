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
// // CREATE DATABASE IF NOT EXISTS 
// if (!$conn->select_db($db_name)) {
//   // echo "Couldn't select database: " . $conn->error;
//   if (!$conn->query("CREATE DATABASE IF NOT EXISTS {$db_name}")) {
//     echo "Couldn't create database: " . $conn->error;
//   }
//   $conn->select_db($db_name);
// }

// Create database if not  exists
$sql = "CREATE DATABASE IF NOT EXISTS {$db_name}";
if ($conn->query($sql) === TRUE) {
  $conn->select_db($db_name);
} else {
  echo "Error creating database: " . $conn->error;
}

// CREATE TABLE IF NOT EXISTS 
// $query = "SELECT ID FROM 'product'";
$query = "SHOW TABLES LIKE 'product'";
$result = mysqli_query($conn, $query);

if (empty($result)) {
  $query = "CREATE TABLE  `product` ( 
      `ID` INT NOT NULL AUTO_INCREMENT ,
      `Prod_name` VARCHAR(250) NOT NULL,
      `price` double  NOT NULL,
      `Prod_description` TEXT NOT NULL,
      `quantity` INT(10) NOT NULL , 
      `created_at` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP , 
      PRIMARY KEY (`ID`)) ;";
  $result = mysqli_query($conn, $query);
};

// Add data to db
if (isset($_POST['submit'])) {
  $Prod_name = $_POST['prod_name'];
  $price = $_POST['price'];
  $Prod_description = $_POST['Prod_description'];
  $quantity = $_POST['quantity'];
  $sql = "INSERT INTO product (Prod_name,price,Prod_description,quantity)
     VALUES ('$Prod_name','$price','$Prod_description','$quantity')";
  if (mysqli_query($conn, $sql)) {
    echo "New record has been added successfully !";
  } else {
    echo "Error: " . $sql . ":-" . mysqli_error($conn);
  }
}

?>
<html>

<head>
  <title>PHP Test</title>
</head>

<body>
  <fieldset>
    <legend>
      <h3>Add Product</h3>
    </legend>

    <form action="" method="post">
      <label for="prod_name">Product Name :</label>
      <input type="text" name="prod_name" id="prod_name" placeholder="Product Name ..." required>
      <br />

      <label for="price">Product Price :</label>
      <input type="number" step=any name="price" id="price" placeholder="Product Price ..." required>
      <br />
      <label for="Prod_description">Description :</label>
      <textarea name="Prod_description" id="Prod_description" cols="20" rows="6" required placeholder="Product Description ..." style="resize: none"></textarea>
      <br />
      <label for="quantity">Product Quantity :</label>
      <input type="number" name="quantity" id="quantity" placeholder="Product Quantity ..." required>
      <br />
      <input type="submit" name="submit" value="Add Product">
    </form>
  </fieldset>
  <fieldset>
    <legend>
      <h3>
        Last Product
      </h3>
    </legend>

    <?php
    $sql = "SELECT id,Prod_name,price,Prod_description,quantity,created_at FROM product order by id desc limit 1";
    $result = mysqli_query($conn, $sql); ?>
    <?php
    while ($row = mysqli_fetch_assoc($result)) : ?>

      <ul>
        <li>
          <b> ID :</b>
          <?php echo $row['id']; ?>
        </li>
        <li>
          <b> Product Name :</b>
          <?php echo $row['Prod_name']; ?>
        </li>
        <li>
          <b> Price :</b>
          <?php echo $row['price']; ?>
        </li>
        <li>
          <b> Description :</b>
          <?php echo $row['Prod_description']; ?>
        </li>
        <li>
          <b> Quantity :</b>
          <?php echo $row['quantity']; ?>
        </li>
        <li>
          <b> Created At :</b>
          <?php echo $row['created_at']; ?>
        </li>
      </ul>
    <?php endwhile ?>

    <a href="./display.php">
      <b>
        Show All Product
      </b>
    </a>
  </fieldset>
</body>

</html>


<!-- [x] Connect to database using object oriented notation. -->
<!-- [x] Create a table of products. -->
<!-- [x] insert 20 rows with the Id of that product, the name and the price of it into the table using a form that takes the needed data and submits it into that table. -->
<!-- [x] Display the last record inserted to the table on the display page. -->
<!-- [x] Display only the first 10 products on another display page. -->
<!-- [x] Search about a specific product and display it on the display page, for example:return all products that have a price more than 5$ using the suitable query statement. -->
<!-- [ ] Use sanitization and escaping functions to secure your program. -->