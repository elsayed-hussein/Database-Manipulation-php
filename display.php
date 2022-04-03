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
    exit();
}

?>
<html>

<head>
    <title>Display</title>
</head>

<body>
    <fieldset>
        <legend>
            <h3>Search Products</h3>
        </legend>

        <form action="" method="post">
            <label for="prod_name">Product Name :</label>
            <input type="text" name="prod_name" id="prod_name" placeholder="Product Name ..." required>
            <br />
            <input type="submit" name="submit" value="Search Products">
        </form>
    </fieldset>
    <fieldset>
        <?php if (isset($_POST['submit'])) : ?>
            <legend>
                <h3>
                    Searched Products
                </h3>
            </legend>
            <?php
            $product_name =  $conn->real_escape_string($_POST['prod_name']);
            $sql = "SELECT id,Prod_name,price,Prod_description,quantity,created_at FROM product Where Prod_name Like '%$product_name%'";
            $result = mysqli_query($conn, $sql); ?>
            <?php
            while ($row = mysqli_fetch_assoc($result)) : ?>
                <ul>
                    <li>
                        <b> ID :</b>
                        <?php echo htmlspecialchars($row['id']); ?>
                    </li>
                    <li>
                        <b> Product Name :</b>
                        <?php echo htmlspecialchars($row['Prod_name']); ?>
                    </li>
                    <li>
                        <b> Price :</b>
                        <?php echo htmlspecialchars($row['price']); ?>
                    </li>
                    <li>
                        <b> Description :</b>
                        <?php echo htmlspecialchars($row['Prod_description']); ?>
                    </li>
                    <li>
                        <b> Quantity :</b>
                        <?php echo htmlspecialchars($row['quantity']); ?>
                    </li>
                    <li>
                        <b> Created At :</b>
                        <?php echo htmlspecialchars($row['created_at']); ?>
                    </li>
                </ul>
                <hr>
            <?php endwhile ?>
        <?php else : ?>
            <legend>
                <h3>
                    Products
                </h3>
            </legend>

            <?php
            $sql = "SELECT id,Prod_name,price,Prod_description,quantity,created_at FROM product order by id desc limit 10";
            $result = mysqli_query($conn, $sql); ?>
            <?php
            while ($row = mysqli_fetch_assoc($result)) : ?>

                <ul>
                    <li>
                        <b> ID :</b>
                        <?php echo htmlspecialchars($row['id']); ?>
                    </li>
                    <li>
                        <b> Product Name :</b>
                        <?php echo htmlspecialchars($row['Prod_name']); ?>
                    </li>
                    <li>
                        <b> Price :</b>
                        <?php echo htmlspecialchars($row['price']); ?>
                    </li>
                    <li>
                        <b> Description :</b>
                        <?php echo htmlspecialchars($row['Prod_description']); ?>
                    </li>
                    <li>
                        <b> Quantity :</b>
                        <?php echo htmlspecialchars($row['quantity']); ?>
                    </li>
                    <li>
                        <b> Created At :</b>
                        <?php echo htmlspecialchars($row['created_at']); ?>
                    </li>
                </ul>
                <hr>
            <?php endwhile ?>
        <?php endif ?>
        <a href="./index.php">
            <b>
                Add Product
            </b>
        </a>
    </fieldset>
</body>

</html>