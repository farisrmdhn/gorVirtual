<!-- <?= $title ?>

	<?php echo validation_errors(); ?>
<?php echo form_open_multipart('bookings/upload') ?>
	<input type="hidden" name="id_booking" value="<?php echo $booking['id_booking']; ?>">
	<input type="file" name="bukti_pembayaran"><br />
	<input type="submit" value="Upload">
</form> -->
    <main id="main">

    <!--==========================
      Services Section
      ============================-->
      <section id="services">
        <div class="container">
          <div class="section-header">
            <h2><?= $title ?></h2>
          </div>
          <div class="row">
            <div class="col-lg-6 about-img">
              <div class="card mb-4 shadow-sm">
                <div class="card-body">
                  <h3 class="card-text">ID Booking: <?php echo $booking['id_booking']; ?></h3>
                  <p class="card-text"><?php echo $booking['nama_venue']; ?><br>Tanggal = <?php echo $booking['tanggal_booking']; ?>
                  <br><?php echo $booking['jam_booking']; ?>
                  <br><?php echo $booking['durasi_booking']; ?> Jam
                  <br>RP. <?php echo $booking['harga_booking']; ?></p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <div class="custom-file">
                      	<?php echo validation_errors(); ?>
						<?php echo form_open_multipart('bookings/upload') ?>
							<input type="hidden" name="id_booking" value="<?php echo $booking['id_booking']; ?>">
							<input type="file" name="bukti_pembayaran">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <hr class="mb-4">
			<input class="btn btn-primary btn-lg btn-block" type="submit" value="Upload Bukti pembayaran">
		</form>
        </div>
      </section>
      <!-- #services -->