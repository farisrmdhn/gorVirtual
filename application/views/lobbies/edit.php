<?php echo form_open_multipart('lobbies/update/'.$lobby['id_booking']); ?>
	<?php echo validation_errors(); ?>
	<div class="container">
		<h1><? $title; ?></h1>
    	<div class="row">
    		<div class="col-lg-6 content">
				<div class="form-group">
					<p>Nama Lobby</p>
					<input type="text" name="nama_lobby" value="<?php echo $lobby['nama_lobby']; ?>">
				</div>
				<div class="form-group">
					<p>Deskripsi Lobby</p>
					<input type="text" name="deskripsi_lobby" value="<?php echo $lobby['deskripsi_lobby']; ?>">
				</div>
				<input type="hidden" name="id_lobby" value="<?php echo $lobby['id_lobby']; ?>">
				<input type="hidden" name="id_booking" value="<?php echo $lobby['id_booking']; ?>">
				<input class="btn btn-primary" type="submit" value="Edit Lobby">
			</div>
		</div>
	</div>
</form>