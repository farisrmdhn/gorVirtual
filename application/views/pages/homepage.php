  <?php if(!$this->session->userdata('logged_in')):?>
  <!--==========================
    Intro Section
  ============================-->
  <section id="intro">

    <div class="intro-content">
      <h2><br>Membuat pemesanan<br>Gelanggan Olahraga<br>menjadi <span>lebih mudah</span>!</h2>
      <div>
        <a href="<?php echo base_url(); ?>users/register" class="btn-get-started scrollto">Registrasi</a>
        <!-- <a href="#portfolio" class="btn-projects scrollto">Our Projects</a> -->
      </div>
    </div>

  </section><!-- #intro -->

  <main id="main">

    <!--==========================
      About Section
    ============================-->
    <section id="about" class="wow fadeInUp">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 about-img">
            <img src="http://www.scoilbarra.ie/wordpress/wp-content/uploads/2017/07/2000px-Sport_balls.svg.png" alt="">
          </div>

          <div class="col-lg-6 content">
            <h2>GorVirtual</h2>
            <h3>Kami hadir untuk memudahkan anda dalam memesan Gelanggang Olahraga secara Online dan terintegrasi.</h3>

            <ul>
              <li><i class="ion-android-checkmark-circle"></i> Pemesanan yang mudah.</li>
              <li><i class="ion-android-checkmark-circle"></i> Dapat mencari teman bermain.</li>
              <li><i class="ion-android-checkmark-circle"></i> Regristasi yang mudah.</li>
            </ul>

          </div>
        </div>

      </div>
    </section><!-- #about -->

    <!--==========================
      Services Section
    ============================-->
    <section id="services">
      <div class="container">
        <div class="section-header">
          <h2>Daftar Lapangan</h2>
        </div>
        <?php foreach($venues as $venue): ?>
        <div class="row">

          <div class="col-lg-6">
            <div class="box wow fadeInLeft">
              <div class="icon"><img src="<?php echo base_url(); ?>assets/images/<?php echo $venue['foto1_venue']; ?>" class="venueHomeImg"></div>
              <h4 class="title"><a href=""><?php echo $venue['nama_venue']; ?></a></h4>
              <!-- <p class="description">Lapangan futsal yang nyaman, terang, dan bersih.</p> -->
            </div>
          </div>

        </div>
      <?php endforeach;?>

      </div>
    </section><!-- #services -->

    <!--==========================
      Our Team Section
    ============================-->
    <section id="team" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Our Team</h2>
        </div>
        <div class="row">
          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic"><img src="<?php echo base_url(); ?>assets/img/faris.png" alt=""></div>
              <div class="details">
                <h4>Faris Ramadhan</h4>
                <div class="social">
                  <a target="_blank" href="https://instagram.com/faris.rmdhn?utm_source=ig_profile_share&igshid=9xe0hosg0pen"><i class="fa fa-instagram"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic"><img src="<?php echo base_url(); ?>assets/img/ratih.png" alt=""></div>
              <div class="details">
                <h4>Ratih Ester N</h4>
                <div class="social">
                  <a target="_blank" href=""><i class="fa fa-instagram"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic"><img src="<?php echo base_url(); ?>assets/img/raihan.png" alt=""></div>
              <div class="details">
                <h4>Raihan Praditya A</h4>
                <div class="social">
                  <a target="_blank" href="https://instagram.com/raihanpraditya?utm_source=ig_profile_share&igshid=9xe0hosg0pen"><i class="fa fa-instagram"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic"><img src="<?php echo base_url(); ?>assets/img/haekal.png" alt=""></div>
              <div class="details">
                <h4>Haekal Rahimmas F</h4>
                <div class="social">
                  <a target="_blank" href="https://instagram.com/rahimmashaekall?utm_source=ig_profile_share&igshid=9xe0hosg0pen"><i class="fa fa-instagram"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>
    <!-- #team -->

    <!--==========================
      Contact Section
    ============================-->
    <section id="contact" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Contact Us</h2>
        </div>

        <div class="row contact-info">

          <div class="col-md-4">
            <div class="contact-address">
              <i class="ion-ios-location-outline"></i>
              <h3>Address</h3>
              <address>Jl. Mulawarman II Kost Nerrisha Residence, Tembalang, Semarang, ID</address>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone">
              <i class="ion-ios-telephone-outline"></i>
              <h3>Phone Number</h3>
              <p><a href="tel:+628119207543">+628119207543</a></p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email">
              <i class="ion-ios-email-outline"></i>
              <h3>Email</h3>
              <p><a href="mailto:admin@gorvirtual.com">admin@gorvirtual.com</a></p>
            </div>
          </div>

        </div>
      </div>

      <div class="container mb-4">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.4722941411956!2d110.43346191386281!3d-7.071110671267336!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708eb0d68aa2c1%3A0xa578110b9202e37d!2sNerissha+Residence!5e0!3m2!1sen!2sid!4v1542453213521" width="100%" height="380" frameborder="0" style="border:0" allowfullscreen></iframe>
      </div>
    </section><!-- #contact -->

  </main>
<?php else: ?>

    <main id="main">

    <!--==========================
      About Section
      ============================-->
      <section id="about" class="wow fadeInUp">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 about-img">
              <img src="http://www.scoilbarra.ie/wordpress/wp-content/uploads/2017/07/2000px-Sport_balls.svg.png" alt="">
            </div>

            <div class="intro-content col-lg-6 content">
              <h2>Selamat Datang <?php echo $user['nama_pengunjung']?>!</h2>
            </div>
          </div>
        </div>
      </section>
      <!-- #about -->
    </main>
<?php endif;?>