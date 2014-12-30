<form id="register" action="<?php echo site_url().'/blog_controller/register'?>" method="post">

<fieldset>
	<legend>Sign up with us!!!</legend>
</fieldset>
	<ol>
		<li>Rule one</li>
		<li>Rule two</li>
		<li>Rule three</li>
		<li>Rule four</li>
		<li>Rule five</li>
	</ol>
	<br>
	<span class="error">
		<?php echo $register_error; ?>
	</span>
	<br>
	<br>
	<label for="username">*Username:</label>
	<input type="text" name="username" id="username" required maxlength="12">
	<br>
	<label for="password">*Password:</label>
	<input type="password" name="password" id="password" required maxlength="12">
	<br>
	<label for="passwordCon">*Confirm Password:</label>
	<input type="password" name="passwordCon" id="passwordCon" required maxlength="12">
	<br>
	<label for="email">*Email:</label>
	<input type="email" name="email" id="email" required>
	<br>
	<label for="introduction">Introduction</label>
	<textarea name="introduction" id="introduction" placeholder="Enter your introduction here! Maximum 200 characters."></textarea>
	<br>
	<button type="submit" name="submit_register" id="submit_register">Sign Up Now!</button>

</form>