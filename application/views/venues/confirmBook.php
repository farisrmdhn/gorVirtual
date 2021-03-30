<!-- <?php if($user['current_booking'] == 0): ?>
	Pemesanan tanggal <?php echo $book_time['tanggal']; ?> jam <?php echo $book_time['jam']; ?>
	<br />
	Harga = <?php echo $venue['harga_sewa_venue']; ?> per jam

	<?php echo form_open('bookings/book/'.$venue['id_venue']); ?>
	<input type="hidden" name="id_venue" value="<?php echo $venue['id_venue']; ?>">
	<input type="hidden" name="harga_sewa_venue" value="<?php echo $venue['harga_sewa_venue']; ?>">
	<input type="hidden" name="tanggal_booking" value="<?php echo $book_time['tanggal']; ?>">
	<input type="hidden" name="jam_booking" value="<?php echo $book_time['jam']; ?>">
	<input type="hidden" name="id_jadwal_venue" value="<?php echo $book_time['id_jadwal_venue']?>">
	<input type="hidden" name="next_id_jadwal_venue" value="<?php echo $next_book_time['id_jadwal_venue']?>">
	<select name="durasi_booking">
		<option value="1">1 Jam</option>
		<?php if($next_book_time['status'] != 1): ?>
			<option value="2">2 Jam</option>
		<?php endif;?>
	</select>
	<input type="submit" value="PESAN">
	</form>
<?php else: ?>
	<p>Booking bisa dilakukan setelah booking yang ada lakukan diselesaikan.</p>
<?php endif;?> -->
    <main id="main">

    <!--==========================
      Services Section
      ============================-->
      <section id="services">
        <div class="container">
          <div class="section-header">
            <h2>Detail Pemesanan</h2>
          </div>
          <div class="row">
            <div class="col-lg-6 about-img">
              <div class="card-body">
                <h3 class="card-text"><?php echo $venue['nama_venue']; ?></h3>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                  	<?php echo form_open('bookings/book/'.$venue['id_venue']); ?>
						<input type="hidden" name="id_venue" value="<?php echo $venue['id_venue']; ?>">
						<input type="hidden" name="harga_sewa_venue" value="<?php echo $venue['harga_sewa_venue']; ?>">
						<input type="hidden" name="tanggal_booking" value="<?php echo $book_time['tanggal']; ?>">
						<input type="hidden" name="jam_booking" value="<?php echo $book_time['jam']; ?>">
						<input type="hidden" name="id_jadwal_venue" value="<?php echo $book_time['id_jadwal_venue']?>">
						<input type="hidden" name="next_id_jadwal_venue" value="<?php echo $next_book_time['id_jadwal_venue']?>">
                      	<div class="form-group">
							<select name="durasi_booking">
								<option value="1">1 Jam</option>
								<?php if($next_book_time['id_venue'] == $venue['id_venue'] && $next_book_time['status'] != 1): ?>
									<option value="2" onclick="hargaKaliDua()">2 Jam</option>
								<?php endif;?>
							</select>
						</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 order-md-2 mb-4">
              <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Detail Pemesanan</span>
                <span class="badge badge-secondary badge-pill">1</span>
              </h4>
              <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                  <div>
                    <h6 class="my-0">Reham Futsal</h6>
                    <small class="text-muted"><?php echo $book_time['jam']; ?></small><br>
                    <small class="text-muted">Tanggal = <?php echo $book_time['tanggal']; ?></small>
                  </div>
                  <span class="text-muted">Rp. <?php echo $venue['harga_sewa_venue']; ?></span>
                </li>
              </ul>
            </div>
          </div>
          <hr class="mb-4">
		  <input class="btn btn-primary btn-lg btn-block" type="submit" value="Pesan Sekarang!">
					</form>
        </div>
      </section>
      <!-- #services -->

    </main>

