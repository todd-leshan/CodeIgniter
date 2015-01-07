<div id="container1" class="container">
<?php
	$userInfo         = get_object_vars($user);
	$username     = $userInfo['username'];
	$introduction = $userInfo['introduction'];
	$image        = $userInfo['image'];

	if($image != NULL)
	{
?>
		<img class="user_image" src="<?php echo base_url().$image; ?>">
<?php
	}else
	{
?>
		<img class="user_image" src="<?php echo base_url().'site/images/default.png'; ?>">
<?php		
	}
?>
	<p>
		<?php echo $username; ?>
	</p>
	<p>
		<?php echo $introduction; ?>
	</p>
</div>