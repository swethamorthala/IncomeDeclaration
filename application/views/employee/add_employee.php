<body>
<div class="content">
    <div class="add_employee">
    <h3>Add Employee:</h3>

<?php echo validation_errors(); ?>

<?php echo form_open('employee') ?>

	<label for="First Name">First Name : </label>
	<input type="input" name="First_Name" value="<?php echo set_value('First_Name'); ?>" size="30"/><br />

        <label for="Last Name">Last Name : </label>
	<input type="input" name="Last_Name" value="<?php echo set_value('Last_Name'); ?>" size="30"/><br />

        <label for="employee uid">Employee Id : </label>
	<input type="input" name="employee uid" value="<?php echo set_value('employee_uid'); ?>" size="30"/><br />

        <label for="Role Band">Role Band: </label>
	<input type="input" name="Role_Band" value="<?php echo set_value('Role_Band'); ?>" size="30"/><br />

	<label for="Email">Email : </label>
	<input type="input" name="Email" value="<?php echo set_value('Email'); ?>" size="30"/><br />
        
        <label for="password">Password : </label>
	<input type="password" name="password" value="<?php echo set_value('password'); ?>" size="30"/><br/>

        <div class="button">
	<input type="submit" name="submit" value="Add Employee" />
	</div>
    

</form>
</div>
</div>
</body>