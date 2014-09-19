<div class="content">
    <div class="add_employee">
        <h3> Employee Details:</h3>
<?php echo validation_errors(); ?>

<?php echo form_open('employeedetails') ?>
        
        <input type="hidden" name="id" value="<?php echo $id; ?>"/>

	<label for="first name">First Name : </label>
	<input type="input" name="first_name" value="<?php echo $first_name; ?>" size="30"/><br />
        

        <label for="last name">Last Name : </label>
	<input type="input" name="last_name" value="<?php echo $last_name; ?>" size="30"/><br />

        <label for="employee uid">Employee Id : </label>
	<input type="input" name="employee uid" value="<?php echo $employee_uid; ?>" size="30"/><br />

        <label for="email">Email : </label>
	<input type="input" name="email" value="<?php echo $email; ?>" size="30"/><br />
        
        <label for="user name">User Name : </label>
	<input type="input" name="user_name" value="<?php echo $user_name; ?>" size="30"/><br />

        <label for="password">Password : </label>
	<input type="password" name="password" value="<?php echo $password; ?>" size="30"/><br/>

        <div class="buttons">
            <input type="submit" name="save" value="save" />
        <input type="submit" name="cancel" value="cancel"/>
	</div>
    

</form>
</div>
</div>

