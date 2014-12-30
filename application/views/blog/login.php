<div id="container1" class="container">
	<form id="login" action="<?php echo site_url().'/blog_controller/login'?>" method="post">
		<fieldset>
			<legend>Log In?</legend>
			<span class="error"><?php echo $login_error; ?></span>
			<br>
			<br>
			<label for="username">Username:</label>
			<input type="text" name="username" id="username" required maxlength="12" minlength="5">
			<br>
			<br>
			<label for="password">Password:</label>
			<input type="password" name="password" id="password" required minlength="6">
			<br>
			<br>
			<button type="submit" id="submit_login">Login</button>			
		</fieldset>
	</form>	

	<span class="info">Not a member? <a href="<?php echo site_url().'/blog-controller/register'; ?>">Sign up now!</a></span>
</div>