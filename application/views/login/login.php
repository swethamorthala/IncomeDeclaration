<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<body>

	<p> here is where company should log in </p>

	<?php echo validation_errors(); ?>
	<?php

	if($login_failed) {
		echo "<p> You have entered invalid username or password <p>";
	}

	?>

<?php echo form_open($submission_url) ?>



	<label for="user_name">User Name : </label>
	<input type="input" name="user_name" value="<?php echo set_value('user_name'); ?>" size="30"/><br />

	<label for="password">Password : </label>
	<input type="password" name="password" value="<?php echo set_value('password'); ?>" size="30"/><br />

	<input type="submit" name="submit" value="Login" />

</form>
</body>
