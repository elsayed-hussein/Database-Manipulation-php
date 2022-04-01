Instructions
please watch this video to know how to run mysql on replit -> click here

Create a table of products and insert 20 rows with the Id of that product, the name and the price of it into the table using a form that takes the needed data and submits it into that table.

Connect to database using object oriented notation.
Display only the first 10 products on another display page.
Display the last record inserted to the table on the display page.
Search about a specific product and display it on the display page, for example:
return all products that have a price more than 5$ using the suitable query statement.
Use sanitization and escaping functions to secure your program.
Instructions


DB SCHEMA
The product table schema (feel free to add more columns)
Column  Description
id  INT
name    VARCHAR
price   FLOAT or DOUBLE
description TEXT
quantity    INT
created_at  date



/*



# Get Started


* `system` - The directory containing all configuration files and sockets.
  * `system/config` - The directory containing configuration files for MariaDB, Redis, etc.
  * `system/(package name)` - The directory containing the sockets and data for each package. This shouldn't be modified.

# Creating a Database
> Even if the repl is private, it is not recommended to store sensitive data. For more production-like tasks, a hosted database being provided elsewhere is likely a good idea.

Next up is creating the MySQL database. Open the "Shell" tab in Replit, and execute mysql.sh using ``./mysql.sh``. You may or may not have to grant executable permissions via chmod first (``chmod +x mysql.sh``).

You should then be dropped into the MariaDB shell. To create a database, execute the following commands:
```sql
CREATE DATABASE yourdbname;
USE yourdbname;
```

It should be as simple as that to create a database, but it's no good if you don't have a user! Let's go ahead and do that now. Make sure you choose a strong password (ideally random). Next, you'll need to grant privileges to this user on the database.
```sql
CREATE USER 'username'@'%' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON yourdbname.* TO 'username'@'%';
```

You should be done here! Type exit in the command line to exit MariaDB.






*/