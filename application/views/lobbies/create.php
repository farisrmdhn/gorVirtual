<?php echo form_open_multipart('lobbies/create/'.$id_booking); ?>
	<?php echo validation_errors(); ?>
	<div class="container">
		<h1><? $title; ?></h1>
    	<div class="row">
    		<div class="col-lg-6 content">
				<div class="form-group">
					<p>Nama Lobby</p>
					<input type="text" name="nama_lobby" placeholder="Nama">
				</div>
				<div class="form-group">
					<p>Deskripsi Lobby</p>
					<input type="text" name="deskripsi_lobby" placeholder="Deskripsi Lobby">
				</div>
				<input class="btn btn-primary" type="submit" value="Create Lobby">
			</div>
		</div>
	</div>
</form>