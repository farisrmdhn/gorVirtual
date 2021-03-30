<!-- <h1><?= $title; ?></h1>
<?php foreach($bookings as $booking) : ?>
	<?php if($booking['id_pengunjung'] == $this->session->userdata('user_id')):?>
		<div style="width: 50%;">
			<p style="background-color: #f0f0f0"><small><?php echo $booking['waktu_booking']; ?></small></p>
			<p>Venue = <?php echo $booking['nama_venue']; ?></p>
			<p>Tanggal Booking = <?php echo $booking['tanggal_booking']; ?></p>
			<p>Jam Booking = <?php echo $booking['jam_booking']; ?></p>
			<p>Durasi Booking = <?php echo $booking['durasi_booking']; ?> Jam</p>

			<?php if($booking['bukti_pembayaran'] == NULL): ?>
				<p style="color: red;">Menunggu Bukti Transfer</p>
				<a href="<?php echo base_url();?>bookings/uploadBuktiPembayaran/<?php echo $booking['id_booking']?>">Upload Bukti Pembayaran</a>
			<?php endif; ?>

			<?php if(($booking['bukti_pembayaran'] != NULL) && $booking['konfirmasi'] == 0): ?>
				<p>Menunggu Konfirmasi</p>
			<?php endif; ?>

			<?php if(($booking['bukti_pembayaran'] != NULL) && $booking['konfirmasi'] == 1): ?>
				<p style="color: green;">Confirmed</p>
			<?php endif; ?>

			<?php if($booking['status_lobby'] == 0 && $booking['konfirmasi'] == 1): ?>
				<a href="<?php echo base_url();?>lobbies/create/<?php echo $booking['id_booking'];?>">Create Lobby</a>
			<?php endif; ?>


			<?php echo form_open('bookings/delete'); ?>
				<input type="hidden" name="id_booking" value="<?php echo $booking['id_booking']; ?>">
				<input type="hidden" name="id_venue" value="<?php echo $booking['id_venue']; ?>">
				<input type="hidden" name="id_jadwal_venue" value="<?php echo $booking['id_jadwal_venue']; ?>">
				<input type="hidden" name="durasi_booking" value="<?php echo $booking['durasi_booking']; ?>">
				<input type="submit" value="Cancel Booking">
			</form>


		</div>
	<?php endif;?>
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
                <?php if($user['current_booking'] != 1):?>
                	<p>Tidak ada booking yang sedang berlangsung</p>
                <?php endif;?>
              <div class="row">
                <?php if($user['current_booking'] == 1):?>
                <div class="col-md-4">
                  <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                      <h3 class="card-text"><?php echo $booking['nama_venue']; ?></h3>
                      <p class="card-text"><?php echo $booking['tanggal_booking']; ?>
                      <br><?php echo $booking['jam_booking']; ?>
                      <br><?php echo $booking['durasi_booking']; ?> Jam</p>
                      	<?php if($booking['bukti_pembayaran'] == NULL): ?>
							<p class="card-text">Status: <b>Menunggu Bukti Transfer</b></p>
							<a href="<?php echo base_url();?>bookings/uploadBuktiPembayaran/<?php echo $booking['id_booking']?>">Upload Bukti Pembayaran</a>
						<?php endif; ?>

						<?php if(($booking['bukti_pembayaran'] != NULL) && $booking['konfirmasi'] == 0): ?>
							<p class="card-text">Status: <b>Menunggu Konfirmasi</b></p>
						<?php endif; ?>

						<?php if(($booking['bukti_pembayaran'] != NULL) && $booking['konfirmasi'] == 1): ?>
							<p class="card-text" style="color: green;">Status: <b>Confirmed</b></p>
						<?php endif; ?>

						<?php if($booking['status_lobby'] == 0 && $booking['konfirmasi'] == 1): ?>
							<div class="d-flex justify-content-between align-items-center">
	                        <div class="btn-group">
	                        	<a class="btn btn-sm btn-outline-secondary" href="<?php echo base_url();?>lobbies/create/<?php echo $booking['id_booking'];?>">Create Lobby</a>
	                        </div>
						<?php endif; ?>
						<?php if($booking['konfirmasi'] == 0): ?>
						<?php echo form_open('bookings/delete'); ?>
							<input type="hidden" name="id_booking" value="<?php echo $booking['id_booking']; ?>">
							<input type="hidden" name="id_venue" value="<?php echo $booking['id_venue']; ?>">
							<input type="hidden" name="id_jadwal_venue" value="<?php echo $booking['id_jadwal_venue']; ?>">
							<input type="hidden" name="durasi_booking" value="<?php echo $booking['durasi_booking']; ?>">
                        	<div class="btn-group">
								<input class="btn btn-sm btn-outline-danger" type="submit" value="Cancel Booking">
							</div>
						</form>
						<?php endif; ?>
					<?php endif;?>
                      </div>
                    </div>
                  </div>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section><!-- #services -->

    </main>