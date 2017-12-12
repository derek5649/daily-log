<!DOCTYPE html>
<html>
<head>
<title>Wait List</title>
<link type="text/css" rel="stylesheet" href="../css/style.css">
</head>

<body>

<div class="main">

<?php

// This line of code connects the the database, finds your local host, and choose whatever form you have created. However, if it can't find the form, then it will give you an error message saying it can't connect to the MySQL server
$db = mysqli_connect('localhost', 'root', 'forms', 80) or die ('Error connecting to MySQL server.');

// This line of code selects the $db variable which will give you access to the list of rows which I named "log".  If it can't access it, then it will give you the error "Error querying database"
$query = "SELECT * FROM list"; mysqli_query($db, $query) or die ('Error querying database.');

// This line of code sends a query to the current databases on the server that's assossiated with a specific link
$result = mysqli_query($db, $query);

// This line of code fetches the result of the specific links in the row that's either an assossitive array or a numeric array
$row = mysqli_fetch_array($result);

// This line of code we help specify the row that we want to get our results from
while ($row = mysqli_fetch_array($result)) {
	echo $row['dailyLog'] . '<br/>';
}

// This line of code we use the $_POST to retrieve the value of the user's input
$daily_log = $_POST['dailyLog'];

// This line of code we use a string function to prevent hackers or regular users from accessing our data
$daily_log = mysqli_real_escape_string($daily_log);

// This line of code is the SQL Query that contains all of the data in the database which is contained in teh variable "$query"
$query = "INSERT INTO 'list' ('id', 'dailyLog') VALUES (NULL, '$'dailyLog');";


// This line of code runs the SQL command
mysqli_query($query);

// This line of code echos a message onto the page telling you that your log has been sent to the database
echo"Your Log Has Been Sent To The Database";

// This closes the mysql database
mysqli_close($db);


?>
</div>	
</body>
</html>