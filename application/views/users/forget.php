<?php echo form_open_multipart('users/forget'); ?>
	<?php echo validation_errors(); ?>
	<input type="text" name="email_pengunjung" placeholder="Your Email">
	<input type="text" name="notelp_pengunjung" placeholder="Your Telephone Number">
	<input type="submit" value="Reset Password">
</form>