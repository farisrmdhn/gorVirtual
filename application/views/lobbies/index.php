<!-- <h1><?= $title; ?></h1>
<?php foreach($lobbies as $lobby) : ?>
	<?php if($lobby['id_pengunjung_away'] == NULL):?>
		<div>
			<h3 style="background-color: #f0f0f0"><?php echo $lobby['nama_lobby']?></h3>

			<?php if($lobby['id_pengunjung_away'] === NULL): ?>
				<p style="color: green;">OPEN</p>
			<?php endif; ?>

			<?php if($lobby['id_pengunjung_away'] != NULL): ?>
				<p style="color: red;">CLOSED</p>
			<?php endif; ?>

			<p><?php echo $lobby['deskripsi_lobby']?></p>
			<p>Venue = <?php echo $lobby['nama_venue']?></p>
			<p>Biaya Sewa = <?php echo $lobby['harga_booking']?></p>
			<p>Tanggal = <?php echo $lobby['tanggal_booking']?></p>
			<p>Jam = <?php echo $lobby['jam_booking']?></p>
			<p>Durasi = <?php echo $lobby['durasi_booking']?> Jam</p>

			<?php if($lobby['id_pengunjung_away'] === NULL): ?>
				<p>Lobby Master</p>
				<p><?php echo $lobby['nama_pengunjung']?></p>
				<p><?php echo $lobby['notelp_pengunjung']?></p>
				<p><?php echo $lobby['email_pengunjung']?></p>
			<?php endif;?>

			<?php if($lobby['id_pengunjung_away'] === NULL): ?>
				<?php if($lobby['id_pengunjung_home'] != $this->session->userdata('user_id')): ?>
					<a href="<?php echo base_url(); ?>lobbies/join/<?php echo $lobby['id_lobby']?>">Join Lobby</a>
				<?php else:?>
					<p style="color: green;">This is your lobby</p>
					<a href="<?php echo base_url(); ?>lobbies/delete/<?php echo $lobby['id_lobby']; ?>/<?php echo $lobby['id_booking']; ?>">Delete Lobby</a>
				<?php endif;?>
			<?php endif;?>
		</div>
	<?php endif; ?>
<?php endforeach; ?> -->
    <main id="main">

    <!--==========================
      Services Section
      ============================-->
      <section id="services">
        <div class="container">
          <div class="section-header">
            <h2><?= $title?></h2>
          </div>
          <div class="album py-5 bg-light">
            <div class="container">
              <div class="row">
        <?php if(!$lobbies) : ?>
          <div class="col-md-4">
            <p>Tidak Ada Lobby</p>
          </div>
        <?php endif;?>
				<?php foreach($lobbies as $lobby) : ?>
                <div class="col-md-4">
                  <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                      <h3 class="card-text"><?php echo $lobby['nama_lobby']?></h3>
						<?php if($lobby['id_pengunjung_away'] == NULL):?>
                      		<p class="card-text" style="color: green;">OPEN</p>
                      	<?php endif; ?>
            <?php if($lobby['id_pengunjung_away'] == $this->session->userdata('user_id')):?>
                          <p class="card-text" style="color: green;">You joined this lobby</p>
                        <?php endif; ?>
						<?php if($lobby['id_pengunjung_away'] != NULL):?>
                      		<p class="card-text" style="color: red;">CLOSED</p>
                      	<?php endif; ?>
                      <p class="card-text"><?php echo $lobby['nama_venue']?>
                      <br><?php echo $lobby['tanggal_booking']?>
                      <br><?php echo $lobby['jam_booking']?>
                      <br>Durasi <?php echo $lobby['durasi_booking']?> Jam</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                          <a href="<?php echo base_url()?>lobbies/view/<?php echo $lobby['id_lobby'] ?>" class="btn btn-sm btn-outline-secondary">Detail</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              	<?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>
      </section><!-- #services -->

    </main>