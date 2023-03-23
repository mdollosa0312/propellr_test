<!DOCTYPE html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
	$(document).ready(function(){

		$('form').on('submit', function (e) {
			
			var first_name = $("input[name=first_name]").val();
			var last_name = $("input[name=last_name]").val();
			var email = $("input[name=email]").val();
			var mobile_number = $("input[name=mobile_number]").val();
			var gender = $('select[name=gender]').find(":selected").text();
			
			var nameRegex = new RegExp('^[.a-zA-Z,\s]*$');
			
			//first_name validation
			if(first_name == '' || first_name == null){
				alert('first name is required');
				e.preventDefault();
			} else if(!(nameRegex.test(first_name))){
				alert('only Letters, Space, Period(.), and Comma(,) allowed on First Name');
				e.preventDefault();
			}
			
			//last_name validation
			if(last_name == '' || last_name == null){
				alert('last name is required');
				e.preventDefault();
			} else if(!(nameRegex.test(last_name))){
				alert('only Letters, Space, Period(.), and Comma(,) allowed on Last Name');
				e.preventDefault();
			}
						
			//email validation
			var emailRegex = /^([a-zA-Z0-9_\.\+\-])+\@(([a-zA-z0-9\-])+\.)+([a-zA-Z0-9]{2,4})$/;
			if(email == '' || email == null){
				alert('email is required');
				e.preventDefault();
			} else if(!(emailRegex.test(email))){
				alert('not a valid email address');
				e.preventDefault();
			}
				
			
			//ph mobile number validation
			var phMobileRegex = /^(09|\+639)\d{9}$/;	
			if(mobile_number == '' || mobile_number == null){
				alert('mobile number is required');
				e.preventDefault();
			} else if(!(phMobileRegex.test(mobile_number))){
				alert('must be PH format (starts with 09 or +639)');
				e.preventDefault();
			}
			
			//gender validation
			if(gender == '' || gender == null){
				alert('gender is required');
				e.preventDefault();
			}
			
			var dob = new Date($("input[name=birthday]").val());
			var today = new Date();
			var age = today.getFullYear() - dob.getFullYear();
			var m = today.getMonth() - dob.getMonth();
			if (m < 0 || (m === 0 && today.getDate() < dob.getDate())) {
				age--;
			}			
			
			$.ajax({
				type: 'post',
				url: 'process.php',
				data: $('form').serialize() + "&age="+age,
				success: function (data) {
					alert(data);
				}
			});
			
			e.preventDefault();
		});

	});
</script>
	
<form method='post'>
First Name: <input type='text' name='first_name' pattern='^[.a-zA-Z,\s]*$' title='only Letters, Space, Period(.), and Comma(,) allowed' required>
<br>
Last Name: <input type='text' name='last_name' pattern='^[.a-zA-Z,\s]*$' title='only Letters, Space, Period(.), and Comma(,) allowed' required>
<br>
Email: <input type='email' name='email' required>
<br>
Mobile Number: <input type='text' name='mobile_number' pattern='^(09|\+639)\d{9}$' title='must be PH format (starts with 09 or +639)' required>
<br>
Date of Birth: <input type='date' name='birthday' required>
<br>
Gender: 
<select name='gender' required>
	<option value='male'>Male</option>
	<option value='female'>Female</option>
	
</select>
<br/>
<input type='submit' value='Submit'>
</form>
</html>