<main id="main">

    <!--==========================
      Services Section
      ============================-->
      <section id="services">
        <div class="container">
          <div class="section-header">
            <h2><?= $title ?></h2>
          </div>
          <div class="album py-5 bg-light">
            <div class="container">
              <div class="row">
              	<div class="col-md-4">
              		<h4><?php echo $venue['nama_venue']; ?></h4>
              		<p>
              			Tanggal : <?php echo $booking['tanggal_booking']; ?><br>
              			Jam : <?php echo $booking['jam_booking']; ?><br>
              			Durasi : <?php echo $booking['durasi_booking']; ?><br>
              		</p>
              		<?php echo form_open('venues/updateRating'); ?>
              			<input type="hidden" name="id_booking" value="<?php echo $booking['id_booking']; ?>">
              			<label>Your Rating :</label>
              			<select name="rating_venue">
              				<option value="1">1</option>
              				<option value="2">2</option>
              				<option value="3">3</option>
              				<option value="4">4</option>
              				<option value="5">5</option>
              			</select>
              			<input style="margin-left: 20px;" class="btn btn-primary" type="submit" value="Rate!">
              		<?php echo form_close();?>
              	</div>
              	<div class="col-md-4">
                    <img class="img-thumbnail" src="<?php echo base_url(); ?>assets/images/<?php echo $venue['foto1_venue'] ?>" alt="Card image cap">
              	</div>
              	<div class="col-md-4">
              		<iframe src="<?php echo $venue['geotag_venue']?>" width="300" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
              	</div>
              </div>
            </div>
          </div>
        </div>
      </section><!-- #services -->

    </main>