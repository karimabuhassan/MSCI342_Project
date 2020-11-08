<html>

<head>
<h1>Workout Results:</h1>
</head>

<body>
<div class=userGet>
<?php

// Enable error logging: 
error_reporting(E_ALL ^ E_NOTICE);
// mysqli connection via user-defined function
include ('./my_connect.php');
$mysqli = get_mysqli_conn();

//echo '<p>' . $mysqli->host_info . '</p>';
// gets value sent over search form
$mid = $_GET['membership_ID']; 

// (3) SQL statement to retireve user workout history progress
$sql = "SELECT progress.membership_ID, progress.workout_type, progress.date from progress\n"

    . "WHERE progress.membership_ID like '$mid%'";


// (4a) Prepared statement, stage 1: prepare

$stmt = $mysqli->prepare($sql);

// (5) Execute prepared statement
$stmt->bind_param('i', $mid); 
$stmt->execute();

// (6) Bind selected columns to PHP variables
$stmt->bind_result ($membership_ID, $workout_type, $date);

// (7) fetch values
// <ul> is unordered list
echo '<ul>'; 
while ($stmt->fetch()) 
{
// printf is print format, <li> is list item
printf ('<li> %s  (%s) (%s)  </li>', $membership_ID, $workout_type, $date);

}
echo '</ul>';


// (8) close statement and mysqli connection
$stmt->close();
$mysqli->close();
?>
</div>
</body>

</html>
