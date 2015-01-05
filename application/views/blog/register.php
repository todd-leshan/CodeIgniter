<div id="container2" class="container">

<form id="register" action="<?php echo site_url().'/blog_controller/register'?>" method="post" enctype="multipart/form-data">

<fieldset>
	<legend>Sign up with us!!!</legend>
	<ol>
		<li>Your username must be longer than 5 and shorter than 12.</li>
		<li>Your password must contain at least one upper case letter, one lower case letter, one number and no special characters like '@#$%^&*'.</li>
		<li>Rule three</li>
		<li>Rule four</li>
		<li>Rule five</li>
	</ol>
	<br>
	<span class="error">
		<?php 
			
	 		echo validation_errors();
	 		echo '<br>';
	 		echo $register_error;
		 	
		?>
	</span>
	<br>
	<br>
	<label class="register_form" for="username">*Username:</label>
	<input type="text" name="username" id="username" required maxlength="12">
	<br>
	<label class="register_form" for="password">*Password:</label>
	<input type="password" name="password" id="password" required maxlength="12">
	<br>
	<label class="register_form" for="passwordCon">*Confirm Password:</label>
	<input type="password" name="passwordCon" id="passwordCon" required maxlength="12">
	<br>
	<label class="register_form" for="email">*Email:</label>
	<input type="email" name="email" id="email" required>
	<br>
	<label class="register_form" for="introduction">Introduction</label>
	<textarea class="register" name="introduction" id="introduction" placeholder="Enter your introduction here! Maximum 200 characters."></textarea>
	<br>
	<label class="register_form" for="userimage">Profile Image</label>
	<input type="file" name="userimage" id="userimage">
	<br>
	<button type="submit" name="submit_register" id="submit_register">Sign Up Now!</button>
</fieldset>
</form>

</div>