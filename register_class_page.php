<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="reset.css">
    <link rel="stylesheet" type="text/css" href="main2.css">
    <link href='http://fonts.googleapis.com/css?family=Crete+Round' rel='stylesheet' type='text/css'>
    <title>Register Class</title>
</head>
<body>
	<header>
        <div class="wrapper">
            <h1><a href="Welcome.html"> Fitness Pal </a></h1>
            <nav>
                <ul>
                    <li><a  href="register_class_page.php" class="btn btn1" >Register Class</a> </li>
                    <li><a  href="calendar.html" class="btn btn1">Check Calender</a> </li>
                    <li><a  href="add_progress.html" class="btn btn1">Track Progress</a> </li>
                    <li><a  href="user_profile.html" class="btn btn1">Profile</a> </li>
                    
                </ul>
            </nav>
        </div>
    </header>

	<!-- THIS IS THE REGISTRATION PAGE, USERS ENTER THEIR NAME, CLASS, TYPE AND DATE AND TIME TO REGISTER FOR A CLASS-->
	<div class="login-box">
		<form action="insert_class.php" method="POST">
      <p>Register Class</p>
			<div class="user-box">
			<label for ='member_name'><b>Your Name</b></label>
			<br>
			<input type="text" id="member_name" placeholder="Name" name="member_name">
			</div>
			<br></br>
			
			<label for='class_type'> Class Name </label>
  			<select>
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