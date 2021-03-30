<main id="main">

    <!--==========================
      Services Section
      ============================-->
      <section id="services">
        <div class="container">
          <div class="section-header">
            <h2>Lobby</h2>
          </div>
          <div class="row">
            <div class="col-lg-6 about-img">
              <div class="card mb-4 shadow-sm">
                <div class="card-body">
                  <h3 class="card-text"><?php echo $lobby['nama_lobby']?></h3>
                  <?php if($lobby['id_pengunjung_away'] == NULL): ?>
                    <p class="card-text" style="color: green">OPEN</p>
                  <?php endif;?>
                  <?php if($lobby['id_pengunjung_away'] != NULL): ?>
                    <p class="card-text" style="color: red;">CLOSED</p>
                  <?php endif;?>
                  <p class="card-text">
                    <table>
                      <tr>
                        <td>Tempat</td>
                        <td> : </td>
                        <td><?php echo $lobby['nama_venue']?></td>
                      </tr>
                      <tr>
                        <td>Tanggal</td>
                        <td> : </td>
                        <td><?php echo $lobby['tanggal_booking']?></td>
                      </tr>
                      <tr>
                        <td>Jam</td>
                        <td> : </td>
                        <td><?php echo $lobby['jam_booking']?></td>
                      </tr>
                      <tr>
                        <td>Durasi</td>
                        <td> : </td>
                        <td><?php echo $lobby['durasi_booking']?> Jam</td>
                      </tr>
                      <tr>
                        <td>Biaya Sewa</td>
                        <td> : </td>
                        <td>Rp. <?php echo $lobby['harga_booking']?></td>
                      </tr>
                      <tr>
                        <td>Lobby Master</td>
                        <td> : </td>
                        <td><?php echo $lobby['nama_pengunjung']?></td>
                      </tr>
                      <tr>
                        <td>No. Telepon</td>
                        <td> : </td>
                        <td><?php echo $lobby['notelp_pengunjung']?></td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td> : </td>
                        <td><?php echo $lobby['email_pengunjung']?></td>
                      </tr>
                    </table>
                  </p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="<?php echo base_url()?>venues/view/<?php echo $lobby['id_venue']?>" class="btn btn-sm btn-outline-secondary">Detail Lokasi</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 content">
              <div class="card mb-4 shadow-sm">
                <div class="card-body">
                  <h3 class="card-text"></h3>
                  <p class="card-text" style="color: green"></p>
                  <p class="card-text">Deskripsi :</p>
                  <p class="card-text"><?php echo $lobby['deskripsi_lobby']?></p>
                  <div class="d-flex justify-content-between align-items-center">
                      <?php if($lobby['id_pengunjung_away'] == NULL): ?>
                      <?php if($lobby['id_pengunjung_home'] != $this->session->userdata('user_id')): ?>
                    <div class="btn-group">
                        <a class="btn btn-sm btn-outline-secondary" href="<?php echo base_url(); ?>lobbies/join/<?php echo $lobby['id_lobby']?>">Join Lobby</a>
                    </div>
                      <?php else:?>
                        <p style="color: green;">This is your lobby</p>
                    <div class="btn-group">
                        <a class="btn btn-sm btn-outline-secondary" href="<?php echo base_url(); ?>lobbies/edit/<?php echo $lobby['id_lobby']; ?>">Edit Lobby</a>
                        <a class="btn btn-sm btn-outline-danger" href="<?php echo base_url(); ?>lobbies/delete/<?php echo $lobby['id_lobby']; ?>/<?php echo $lobby['id_booking']; ?>">Delete Lobby</a>
                    </div>
                      <?php endif;?>
                    <?php endif;?>
                    <?php if($lobby['id_pengunjung_away'] == $this->session->userdata('user_id')): ?>
                        <p style="color: green;">You joined this lobby</p>
                    <div class="btn-group">
                        <a class="btn btn-sm btn-outline-danger" href="<?php echo base_url(); ?>lobbies/cancelJoinLobby/<?php echo $lobby['id_lobby']; ?>">Cancel Join</a>
                    </div>

                    <?php endif;?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section><!-- #services -->

    </main>