    <main id="main">

    <!--==========================
      Services Section
      ============================-->
      <section id="services">
        <div class="container">
          <div class="section-header">
            <h2>Profil</h2>
          </div>
          <div class="row">
            <div class="col-lg-6 about-img">
              <div class="card-body">
                <h3 class="card-text"><?php echo $pengunjung['nama_pengunjung']; ?></h3>
                <p class="card-text">Username : <i><?php echo $pengunjung['username_pengunjung']; ?></i></p>
                <p class="card-text">No. Telepon : <?php echo $pengunjung['notelp_pengunjung']; ?></p>
                <p class="card-text">Email : <?php echo $pengunjung['email_pengunjung']; ?></p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <a href="<?php echo base_url(); ?>users/edit/<?php echo $pengunjung['id_pengunjung']; ?>" class="btn btn-sm btn-outline-secondary" >Ubah Data Profil</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- #services -->

    </main>
