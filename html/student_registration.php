	<html>
	<head>
	 <title> student regidtration</title>

	 <link rel="stylesheet" type="text/css" href="stu.css">
	</head>

	<body>
		<form action="stu_reg.php" method="post">
			<div class="cointainer">
		    <div class="cointainer heading">
		    <img src="https://img.collegepravesh.com/2013/06/NIT-Durgapur-Logo.png" style="float: left"/>
  			<h1>Student Registration</h1>
			<p>Please fill this form to create your account</p>
                      </div>
			<hr>
			<label for="name"><b>NAME</b></label>
			<input type="text" placeholder="name" name="name" id="name" required>
	        <br>
			<label for="email"><b>Email</b></label>
	        <input type="email" placeholder="Enter Email" name="email" required>
	        <br>
	        <br>
	        <label for="department"><b>DEPARTMENT</b></label>
			<input type="text" placeholder="department" name="department" id="department" required>
	        <br>
	       
	        <label for="registration_no"><b>REGISTRATION NO</b></label>
			<input type="text" placeholder="reg no." name="registration_no" id="registration_no" required>
	        <br>
	        

			<label for="avatar">Upload Your Photo:</label>
	        <input type="file"
	         id="avatar" name="avatar"
	         accept="image/png, image/jpeg">
	        <br>
	        <br>

	        <label for="cv">upload your cv:</label>
	        <input type="file"
		         id="cv" name="cv"
	         accept="image/*, .pdf">
            <br>
            <br>
            <hr>
		    <label for="psw"><b>Password</b></label>
		    <input type="password" name="psw" id="psw" placeholder="Enter Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>

			  <div id="message">
			  <h3>Password must contain the following:</h3>
			  <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
			  <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
			  <p id="number" class="invalid">A <b>number</b></p>
			  <p id="length" class="invalid">Minimum <b>8 characters</b></p>
			  </div>
             <hr>
		    <label for="psw-repeat"><b>Repeat Password</b></label>
		    <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
		    <hr>

		    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
		    <button type="submit" class="registerbtn">Register</button>
		  </div>

		  <div class="container signin">
		    <h2>Already have an account? <a href="#">Sign in</a>.</h2>
          </div>
          </form>

