<?php
	// Initialize connection variables.
	$host = "desarrollodea.postgres.database.azure.com";
	$database = "DEA";
	$user = "administrador";
	$password = "Urbanik2023*";

	// Initialize connection object.
	$connection = pg_connect("host=$host dbname=$database user=$user password=$password") 
		or die("Failed to create connection to database: ". pg_last_error(). "<br/>");
	print "Successfully created connection to database.<br/>";

	// Drop previous table of same name if one exists.
	$query = "DROP TABLE IF EXISTS TBL_DEA;";
	pg_query($connection, $query) 
		or die("Encountered an error when executing given sql statement: ". pg_last_error(). "<br/>");
	print "Finished dropping table (if existed).<br/>";

	// Create table.
	$query = "CREATE TABLE TBL_DEA (id serial PRIMARY KEY, name VARCHAR(50), quantity INTEGER);";
	pg_query($connection, $query) 
		or die("Encountered an error when executing given sql statement: ". pg_last_error(). "<br/>");
	print "Finished creating table.<br/>";

	// Insert some data into table.
	$name = '\'banana\'';
	$quantity = 150;
	$query = "INSERT INTO TBL_DEA (name, quantity) VALUES ($name, $quantity);";
	pg_query($connection, $query) 
		or die("Encountered an error when executing given sql statement: ". pg_last_error(). "<br/>");

	$name = '\'orange\'';
	$quantity = 154;
	$query = "INSERT INTO TBL_DEA (name, quantity) VALUES ($name, $quantity);";
	pg_query($connection, $query) 
		or die("Encountered an error when executing given sql statement: ". pg_last_error(). "<br/>");

	$name = '\'apple\'';
	$quantity = 100;
	$query = "INSERT INTO TBL_DEA (name, quantity) VALUES ($name, $quantity);";
	pg_query($connection, $query) 
		or die("Encountered an error when executing given sql statement: ". pg_last_error()). "<br/>";

	print "Inserted 3 rows of data.<br/>";

	// Closing connection
	pg_close($connection);
?>