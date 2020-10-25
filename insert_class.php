<?php

// Enable error logging: 
error_reporting(E_ALL ^ E_NOTICE);
// mysqli connection via user-defined function
include ('./my_connect.php');
$mysqli = get_mysqli_conn();



$member_name = $_POST['member_name']; 
$class_type = $_POST['class_type']; 
$date = $_POST['date']; 
$time = $_POST['time']; 


//sql statement
$sql = "INSERT INTO 'class_register' ('member_name', 'class_type', 'date', 'time') VALUES ('$member_name', '$class_type', '$date', '$time')";


$stmt = $mysqli->prepare($sql);


//  Execute prepared statement
$stmt->bind_param('a', $member_name); 
$stmt->bind_param('b', $class_type); 
$stmt->bind_param('c', $date); 
$stmt->bind_param('d', $time); 
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







	