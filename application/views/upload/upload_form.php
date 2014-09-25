<html>
<head>
<title>Upload Form</title>
</head>
<body>

<?php echo $error;?>
    <div class="upload">
<?php echo form_open_multipart('upload/do_upload');?>

<input type="file" name="userfile" size="20" />

<br /><br />
<div class="buttons">
<input type="submit" value="upload" />
</div>
</form>
</div>
</body>
</html>