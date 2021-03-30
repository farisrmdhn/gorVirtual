<!-- <h1><?= $title ?></h1>

<?php foreach($venues as $venue) : ?>
	<div>
		<a href="<?php echo base_url(); ?>venues/<?php echo $venue['id_venue']; ?>"><h5><?php echo $venue['nama_venue']; ?></h5></a>
		<img class="venueIndexImg" src="<?php echo base_url(); ?>assets/images/<?php echo $venue['foto1_venue'] ?>">
		<p><small>Rating = <?php echo $venue['rating_venue']; ?></small></p>
		<p><?php echo $venue['alamat_venue']; ?></p>
		<p>Harga Sewa = <?php echo $venue['harga_sewa_venue']; ?></p>
		<p><?php echo $venue['jenis_venue']; ?></p>
	</div>
<?php endforeach; ?> -->


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
                	<?php foreach($venues as $venue) : ?>
                <div class="col-md-4">
                  <div class="card mb-4 shadow-sm">
                    <img class="card-img-top img-thumbnail" src="<?php echo base_url(); ?>assets/images/<?php echo $venue['foto1_venue'] ?>" alt="Card image cap">
                    <div class="card-body">
                      <h3 class="card-text"><?php echo $venue['nama_venue']; ?></h3>
                      <p class="card-text">Rating : <?php echo number_format(($venue['rating_venue'] / $venue['sum_rating_venue']), 1, '.', ''); ?>/5
                      <br>
                      <?php echo $venue['alamat_venue']; ?><br>Rp. <?php echo $venue['harga_sewa_venue']; ?> / Jam
                      <br>
                  	  <?php echo $venue['jenis_venue']; ?></p>
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                          <a href="<?php echo base_url(); ?>venues/<?php echo $venue['id_venue']; ?>" class="btn btn-sm btn-outline-secondary">Detail</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach;?>
              </div>
            </div>
          </div>
        </div>
      </section><!-- #services -->

    </main>