<!--<?php echo form_open('message/login'); ?> -->

<form id="login" class="section1" action="index.php/message/login" method="post">
	<span id="error">
	<?php echo validation_errors(); ?>
	</span>
	<br>
	<legend>Log In</legend>
	<br>
	<label for="username">Username:</label>
	<input type="text" name="username" id="username" maxlength="12" required>
	<br>
	<label for="password">Password:</label>
	<input type="password" name="password" id="password" maxlength="12 required">
	<br>
	<button type="submit" id="submit">Log In</button>

</form>