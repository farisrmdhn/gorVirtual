<!-- <h3>Jadwal <?php echo $venue['nama_venue']?></h3>
<?php if($jadwals != false): ?>
<table border="1">
	<tr>
		<td>Hari</td>
		<td>Jam</td>
		<td>Status</td>
	</tr>
	<?php foreach($jadwals as $jadwal) : ?>
		<tr>
		<?php echo form_open('venues/confirmBook/'.$venue['id_venue']); ?>
			<input type="hidden" name="tanggal" value="<?php echo $jadwal['tanggal']?>">
			<input type="hidden" name="jam" value="<?php echo $jadwal['jam']?>">
			<input type="hidden" name="id_jadwal_venue" value="<?php echo $jadwal['id_jadwal_venue']?>">

			<td><?php echo $jadwal['tanggal'];?></td>
			<td><?php echo $jadwal['jam'];?></td>
			<?php if($jadwal['status'] === "0"): ?>
				<td><input type="submit" value="Pesan"></td>
			<?php endif;?>
			<?php if($jadwal['status'] === "1"): ?>
				<td>Booked</td>
			<?php endif;?>
			</form>
		</tr>
	<?php endforeach; ?>
<?php endif;?>

<?php if($jadwals == false):?>
	<p>Maaf, untuk pemesanan lapangan pada tanggal tersebut hubungi admin</p>
	<p>Pilih Tanggal Lain</p>
	<?php echo form_open_multipart('venues/jadwal/'.$venue['id_venue']); ?>
		<input type="date" name="date">
		<input type="submit"  value="Submit">
	</form>
<?php endif;?>
</table> -->
<?php if($jadwals != false): ?>
    <!--==========================
      Services Section
      ============================-->
      <section id="services">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 about-img">
              <h3>Jadwal <?php echo $venue['nama_venue']?></h3>
              <p>Tanggal = <?php echo $tanggal; ?></p>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Jam</th>
                    <th scope="col">Status</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach($jadwals as $jadwal) : ?>
                  <tr>
					<?php echo form_open('venues/confirmBook/'.$venue['id_venue']); ?>
			<input type="hidden" name="tanggal" value="<?php echo $jadwal['tanggal']?>">
			<input type="hidden" name="jam" value="<?php echo $jadwal['jam']?>">
			<input type="hidden" name="id_jadwal_venue" value="<?php echo $jadwal['id_jadwal_venue']?>">
                    <th scope="row"><?php echo $jadwal['jam'];?></th>
                    <td>
                    	<?php if($jadwal['status'] === "0"): ?>
							Kosong
						<?php endif;?>
						<?php if($jadwal['status'] === "1"): ?>
							Booked
						<?php endif;?>
                    </td>
                    <?php if($jadwal['status'] === "0"): ?>
						<td><input class="btn btn-sm btn-outline-secondary" type="submit" value="Pesan"></td>
					<?php endif;?>
					<?php if($jadwal['status'] === "1"): ?>
						<td></td>
					<?php endif;?>
                  </tr>
              </form>
              	<?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </section>
      <!-- #services -->
<?php endif;?>

<?php if($jadwals == false):?>
      <section id="services">
        <div class="container">
              <h3>Jadwal <?php echo $venue['nama_venue']?></h3>
	<p>Maaf, untuk pemesanan lapangan pada tanggal tersebut hubungi admin</p>
	<p>Pilih Tanggal Lain</p>
		<div class="btn-group">
    		<?php echo form_open_multipart('venues/jadwal/'.$venue['id_venue']); ?>
    		<div class="form-group">
    			<input type="date" class="form-control" name="date">
    		</div>
				<input class="btn btn-lg btn-primary btn-block" type="submit"  value="Cek Tanggal">
			</form>
        </div>
        </div>
      </section>
<?php endif;?>