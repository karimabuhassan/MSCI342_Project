<!DOCTYPE html>
<html>
<head>
	<title>CLASS REGISTER</title>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
	<h1>REGISTER YOUR CLASS</h1>
	<!-- THIS IS THE REGISTRATION PAGE, USERS ENTER THEIR NAME, CLASS, TYPE AND DATE AND TIME TO REGISTER FOR A CLASS-->
	<div class="login-box">

		<form action="insert_class.php" method="POST">
			<div class="user-box">
			<label for ='member_name'><b>Your Name</b></label>
			<br>
			<input type="text" id="member_name" placeholder="Name" name="member_name">
			</div>
			<br></br>
			
			<label for='class_type'> <b>Class Name</b> </label>
  			<select name='class_type'>
   				<option value='spin class'>Spin Class</a>
   				<option value='yoga'>Yoga</a>
    			<option value='pilates'>Pilates</a>
    			<option value ='cross fit'>CrossFit</a>
    			<option value='cycling'>Cycling</a>
  			</select>
  			
		

		
  		
			<label for='date'> <b>Date</b> </label>
			<input type="date" id="start" name="date"
       		value="2020-11-01"
       		min="2020-11-01" max="2020-12-31">
       		


			
			<label for='time'> <b>Time</b> </label>
			<input type="Time" id="time" name="time" min="09:00" max="20:00" required >
			<br><a type="submit" class="btn btn1"> Register </a>
			<br> <a href="Welcome.html" class="btn btn1"> Back </a> 

		</form>
	</div>
		
	
		
</body>
</html>