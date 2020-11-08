<html>

<head>
<h1>User Profile:</h1>
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

// (3) SQL statement to retireve user personal information for database and display them 
$sql = "SELECT Member.membership_ID, Member.name, Member.date_of_birth, Member.subscription_type, Member.start_date, Member.end_date from Member\n"

    . "WHERE Member.membership_ID like '$mid%'";


// (4a) Prepared statement, stage 1: prepare

$stmt = $mysqli->prepare($sql);

// (5) Execute prepared statement
$stmt->bind_param('i', $mid); 
$stmt->execute();

// (6) Bind selected columns to PHP variables
$stmt->bind_result ($membership_ID, $name, $date_of_birth, $subscription_type, $start_date, $end_date);

// (7) fetch values
// <ul> is unordered list
echo '<ul>'; 
while ($stmt->fetch()) 
{
// printf is print format, <li> is list item
printf ('<li> %s  (%s) (%s) (%s) (%s) (%s) </li>', $membership_ID, $name, $date_of_birth, $subscription_type, $start_date, $end_date);

}
echo '</ul>';


// (8) close statement and mysqli connection
$stmt->close();
$mysqli->close();
?>
</div>
</body>

</html>
