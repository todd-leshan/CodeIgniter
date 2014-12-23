<?php echo validation_errors(); ?>

<?php echo form_open('join/save'); ?>

<?php
	// form building
	$firstname = array(
		'name'	=> 'first_name',
		'id'	=> 'first_name',
	);

	echo form_input($firstname);
	echo form_label('First Name', 'first_name');
	echo '<br />';
	
	$lastname = array(
		'name'	=> 'last_name',
		'id'	=> 'last_name',
	);

	echo form_input($lastname);
	echo form_label('Last Name', 'last_name');
	echo '<br />';
	
	$email = array(
		'name'	=> 'email',
		'id'	=> 'email',
	);

	echo form_input($email);
	echo form_label('Email', 'email');
	echo '<br />';
	
	$address = array(
		'name'	=> 'address',
		'id'	=> 'address',
	);

	echo form_input($address);
	echo form_label('Address', 'address');
	echo '<br />';
	
	$state = array(
		'name'	=> 'state_code',
		'id'	=> 'state_code',
		'size'	=> 3,
	);

	echo form_input($state);
	echo form_label('State', 'state_code');
	echo '<br />';
	
	$zip = array(
		'name'	=> 'zip_postal',
		'id'	=> 'zip_postal',
	);

	echo form_input($zip);
	echo form_label('Zip Code', 'zip_postal');
	echo '<br />';
	
	$username = array(
		'name'	=> 'username',
		'id'	=> 'username',
	);

	echo form_input($username);
	echo form_label('Username', 'username');
	echo '<br />';
	
	$password = array(
		'name'	=> 'password',
		'id'	=> 'password',
	);

	echo form_input($password);
	echo form_label('Password', 'password');
	echo '<br />';
	
	$bio = array(
		'name'	=> 'bio',
		'id'	=> 'bio',
	);

	echo form_textarea($bio);
	echo form_label('Bio', 'bio');
	echo '<br />';
	
	$numtoursradio = array(
		'name'	=> 'num_tours',
		'id'	=> 'num_tours',
		'value' => '0',
		'checked' => TRUE,
	);
	$numtoursradio2 = array(
		'name'	=> 'num_tours',
		'id'	=> 'num_tours',
		'value' => '1-3',
	);

	$numtoursradio3 = array(
		'name'	=> 'num_tours',
		'id'	=> 'num_tours',
		'value' => '4-6',
	);
	$numtoursradio4 = array(
		'name'	=> 'num_tours',
		'id'	=> 'num_tours',
		'value' => '7+',
	);

	echo 'none';
	echo form_radio($numtoursradio);
	echo '1 - 3';
	echo form_radio($numtoursradio2);
	echo '4 - 6';
	echo form_radio($numtoursradio3);
	echo '7+';
	echo form_radio($numtoursradio4);
	echo form_label('Number of tours', 'num_tours');
	echo '<br />';
	
	$interests = array(
    	'backpack_cal' => 'Backpack Cal',
 		'cycle_cal' => 'Cycle California',
		'nature_watch' => 'Nature Watch',
		'california_calm' => 'California Calm',
		'desert_to_sea' => 'From Desert to Sea',
		'snowboard_cali' => 'Snowboard Cali',
		'california_hotsprings' => 'California Hotsprings',
		'kids_california' => 'Kids California',
		'taste_of_california' => 'Taste of California',
	);

	echo form_multiselect('interests', $interests);
	echo form_label('What tours are you interested in?', 'interests');
	echo '<br />';
	
	echo form_submit('submit', 'Join Now!');
	
	echo form_close();

?>