<?php 

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$mobile_number = $_POST['mobile_number'];
$birthday = $_POST['birthday']; 
$gender = $_POST['gender'];
$age = $_POST['age'];

$name_regex = '/^[.a-zA-Z,\s]*$/';
$email_regex = '/^([a-zA-Z0-9_\.\+\-])+\@(([a-zA-z0-9\-])+\.)+([a-zA-Z0-9]{2,4})$/';
$mobile_regex = '/^(09|\+639)\d{9}$/';

if(empty($first_name)){
	echo 'First Name is required';
	exit();
} else if(!preg_match($name_regex, $first_name)){
	echo 'only Letters, Space, Period(.), and Comma(,) allowed on First Name';
	exit();
}
 
if(empty($last_name)){
	echo 'Last Name is required';
	exit();
} else if(!preg_match($name_regex, $last_name)){
	echo 'only Letters, Space, Period(.), and Comma(,) allowed on Last Name';
	exit();
}

if(empty($email)){
	echo 'Email is required';
	exit();
} else if(!preg_match($email_regex, $email)){
	echo 'not a valid email address';
	exit();
}

if(empty($mobile_number)){
	echo 'Mobile Number is required';
	exit();
} else if(!preg_match($mobile_regex, $mobile_number)){
	echo 'must be PH format (starts with 09 or +639)';
	exit();
}

if(empty($gender)){
	echo 'Gender is required';
	exit();
} 

$conn = mysqli_connect("localhost","root","","website");

$query = "INSERT INTO user(first_name, last_name, email, birthday, age, mobile_number, gender) 
			VALUES ('$first_name', '$last_name', '$email', '$birthday', '$age', '$mobile_number', '$gender')";

$result = mysqli_query($conn,$query);

echo 'data saved';