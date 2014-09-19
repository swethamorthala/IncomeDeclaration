

<div class="content">
    <div class="register">

<h2>Register here:</h2>

<?php echo validation_errors(); ?>

<?php echo form_open('register') ?>

	<label for="company_name">Company Name : </label>
	<input type="input" name="company_name" value="<?php echo set_value('company_name'); ?>" size="30"/><br />

	<label for="email">Email : </label>
	<input type="input" name="email" value="<?php echo set_value('email'); ?>" size="30"/><br />

	<label for="user_name">User Name : </label>
	<input type="input" name="user_name" value="<?php echo set_value('user_name'); ?>" size="30"/><br />

	<label for="password">Password : </label>
	<input type="password" name="password" value="<?php echo set_value('password'); ?>" size="30"/><br />

	<div class="button">
	<input type="submit" name="submit" value="Register" />
	</div>

</form>
</div>
</div>