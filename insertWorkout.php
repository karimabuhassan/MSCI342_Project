<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>


<?php

// Enable error logging: 
error_reporting(E_ALL ^ E_NOTICE);
// mysqli connection via user-defined function
include ('./my_connect.php');
$mysqli = get_mysqli_conn();



$member_ID = $_POST['membership_ID']; 
$workout_type = $_POST['workout_type']; 
$date = $_POST['date']; 



//sql statement
$sql = "INSERT INTO 'progress' ('membership_ID', 'workout_type', 'date') VALUES ('$membership_ID', '$workout_type', '$date')";


$stmt = $mysqli->prepare($sql);


//  Execute prepared statement
$stmt->bind_param('a', $membership_ID); 
$stmt->bind_param('b', $workout_type); 
$stmt->bind_param('c', $date); 

$stmt->execute();

print ("TEST");


if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$stmt->close();
$mysqli->close();
?>

</body>
</html>

	