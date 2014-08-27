
<div class="content">

<h2>Employee details:</h2>

<?php echo validation_errors(); ?>

<?php echo form_open('employee') ?>

	<label for="first name">first name : </label>
	<input type="input" name="first_name" value="<?php echo set_value('first_name'); ?>" size="30"/><br />

        <label for="last name">last name : </label>
	<input type="input" name="last_name" value="<?php echo set_value('last_name'); ?>" size="30"/><br />

	<label for="email">Email : </label>
	<input type="input" name="email" value="<?php echo set_value('email'); ?>" size="30"/><br />

	<div class="button">
	<input type="submit" name="submit" value="submit" />
	</div>

</form>
</div>

