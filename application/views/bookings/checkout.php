
    <main id="main">

    <!--==========================
      Services Section
      ============================-->
      <section id="services">
        <div class="container">
          <div class="section-header">
            <h2>Pemesanan Anda Berhasil!</h2>
          </div>
          <div class="row">
            <div class="col-lg-6 about-img">
              <p>ID Booking anda : <?php echo $booking['id_booking']?></p>
              <p>Silahkan Transfer ke<br>Rekening <?php echo $booking['nama_bank_venue']?> a/n <?php echo $booking['an_bank_venue']?><br>nomor rekening: <b><?php echo $booking['norek_bank_venue']?></b></p>
              <p style="color: red">Batas waktu transfer maksimal 2 jam setelah pemesanan</p>
            </div>
          </div>
          <hr class="mb-4">
          <p>Sudah Transfer?</p>
          <a class="btn btn-primary btn-lg btn-block" href="<?php echo base_url();?>bookings/uploadBuktiPembayaran/<?php echo $booking['id_booking']?>">Upload Bukti Pembayaran</a>
        </div>
      </section>
      <!-- #services -->

    </main>