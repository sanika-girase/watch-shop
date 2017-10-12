<?php
	session_start();
	// variable declaration
	$email    = "";
	$errors = array();
	$_SESSION['success'] = "";
	// connect to database
	include_once "connection.php";

// REGISTER USER
	if (isset($_POST['reg_user'])) {
		// receive all input values from the form
		
		$email = mysqli_real_escape_string($con, $_POST['email']);
		$name =mysqli_real_escape_string($con, $_POST['name']);
		$password_1 = mysqli_real_escape_string($con, $_POST['password_1']);
		$mobile = mysqli_real_escape_string($con, $_POST['mobile']);
		// form validation: ensure that the form is correctly filled
	
		/*if (empty($email) && ) { array_push($errors, "Email is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }
	if (empty($mobile)) { array_push($errors, "Mobile No is required"); }*/
	if (empty($email) && empty($password_1) && empty($mobile) && empty($name))
		{
		
			header('location: register.php');
			
			array_push($errors,"");
		}
		else if (empty($email)) { array_push($errors, "Email is required"); }
		else if (empty($password_1)) { array_push($errors, "Password is required"); }
	   else if (empty($mobile)) { array_push($errors, "Mobile No is required"); }
        else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
array_push($errors, "Enter Valid Email Address"); }
		
else if(!preg_match('/^\d{10}$/',$mobile)) // phone number is valid
{
	array_push($errors, "Enter Valid Mobile No");}
	else if(!preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/',$password_1))

	{
array_push($errors, "Password Should Contain  at least one lower case ,one digit,one upper case charachters and it should be 8-20 digits long");

	}

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password_1);//encrypt the password before saving in the database
			$query = "INSERT INTO customer (email_id, password,mobile_no,name)
					VALUES('$email', '$password','$mobile','$name')";
			mysqli_query($con, $query);
		
		$_SESSION['email'] = $email;
			$_SESSION['success'] =$email;
			if(!empty($_SESSION['cart']))
	            {
				header('location: cart.php');
			     }
			    else
			    {
				header('location: index.php');
		        }
			
		}
	}
function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}



	// ...
	// LOGIN USER
	if (isset($_POST['login'])) {
		$email = mysqli_real_escape_string($con, $_POST['email']);
		$password = mysqli_real_escape_string($con, $_POST['password']);
		if (empty($email)) {
			array_push($errors, "Email-id is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}
		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM  customer WHERE email_id='$email'";
			$results = mysqli_query($con, $query);
			if (mysqli_num_rows($results) == 1) {
			
				$_SESSION['email'] = $email;
				$_SESSION['success'] = $email;
				if(!empty($_SESSION['cart']))
	            {
				header('location: cart.php');
			     }
			    else
			    {
				header('location: index.php');
		        	}
			}else {
				array_push($errors, "Wrong email/password combination");
			}
		}
	}

//Cart Checking
?>