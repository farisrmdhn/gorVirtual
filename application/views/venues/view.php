<!-- <?= $title ?>
<div>
	<img class="venueViewImg" src="<?php echo base_url(); ?>assets/images/<?php echo $venue['foto1_venue'] ?>">
	<img class="venueViewImg" src="<?php echo base_url(); ?>assets/images/<?php echo $venue['foto2_venue'] ?>">
	<img class="venueViewImg" src="<?php echo base_url(); ?>assets/images/<?php echo $venue['foto3_venue'] ?>">
</div>
<p>Rating = <?php echo $venue['rating_venue']; ?></p>
<p>Harga Sewa = <?php echo $venue['harga_sewa_venue']; ?></p> -->
<!-- alamat dll -->
<!-- <p><?php echo $venue['jenis_venue']; ?></p>

<?php echo form_open_multipart('venues/jadwal/'.$venue['id_venue']); ?>
	<input type="date" name="date">
	<input type="submit"  value="Submit">
</form> -->
<!-- <?php echo base_url(); ?>venue/pesan/<?php echo $venue['id_venue']; ?> -->
<main id="main">

    <!--==========================
      Services Section
      ============================-->
      <section id="services">
        <div class="container">
          <div class="section-header">
            <h2>Detail Lapangan Futsal</h2>
          </div>
          <div class="row">
            <div class="col-lg-6 about-img">
              <div id="carouselExampleControls" style="width: 500px; margin: 0 auto" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img class="d-block w-100" src="<?php echo base_url(); ?>assets/images/<?php echo $venue['foto1_venue'] ?>" alt="First slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="<?php echo base_url(); ?>assets/images/<?php echo $venue['foto2_venue'] ?>" alt="Second slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="<?php echo base_url(); ?>assets/images/<?php echo $venue['foto3_venue'] ?>" alt="Third slide">
                  </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            </div>
            <div class="col-lg-6 content">
              <div class="card-body">
                <h3 class="card-text"><?= $title ?></h3>
                <p class="card-text">Rating : <?php echo number_format(($venue['rating_venue'] / $venue['sum_rating_venue']), 1, '.', ''); ?>/5
                	<br><?php echo $venue['alamat_venue']; ?>
                	<br>Rp. <?php echo $venue['harga_sewa_venue']; ?> / jam
                	<br><?php echo $venue['jenis_venue']; ?><br>
                	<iframe src="<?php echo $venue['geotag_venue']?>" width="400" height="200" frameborder="0" style="border:0" allowfullscreen></iframe></p>
                <div class="d-flex justify-content-between align-items-center">

                  <div class="btn-group">
                    <?php echo form_open_multipart('venues/jadwal/'.$venue['id_venue']); ?>
                      <div class="form-group">
                        <p> Tanggal hari ini : <?php echo date('d-m-Y'); ?></p>
                        <input type="date" class="form-control" name="date" min="<?php echo date('Y-m-d'); ?>">
                      </div>
					         <input class="btn btn-lg btn-primary btn-block" type="submit"  value="Cek Tanggal">           
                  </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

    </main>