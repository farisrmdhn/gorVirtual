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
              <h2><?= $title; ?></h2>
              <?php echo form_open_multipart('users/update'); ?>
				      <?php echo validation_errors(); ?>
                <div class="form-group">
                  <h3>Nama<input type="text" class="form-control" name="nama_pengunjung" value="<?php echo $user['nama_pengunjung']; ?>" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject"></h3>
                </div>
                <div class="form-group">
                  <h3>Email<input type="text" class="form-control" name="email_pengunjung" value="<?php echo $user['email_pengunjung']; ?>"></h3>
                </div>
                <div class="form-group">
                  <h3>Username<input type="text" class="form-control" name="username_pengunjung" value="<?php echo $user['username_pengunjung']; ?>" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject"></h3>
                </div>
                <div class="form-group">
                  <p style="color: red;">Keep the password field empty if you do not wish to change your password</p>
                  <h3>Password<input type="password" class="form-control" name="password_pengunjung" placeholder="Password"></h3>
                </div>
                <div class="form-group">
                  <h3>Re-Type Password<input type="password" class="form-control" name="password2_pengunjung" placeholder="Re-Type Password"></h3>
                </div>
                <div class="form-group">
                  <h3>Nomor Telepon<input type="text" class="form-control" name="notelp_pengunjung" value="<?php echo $user['notelp_pengunjung']; ?>"></h3>
                </div>
                <input type="hidden" name="default_password" value="<?php echo $user['password_pengunjung'] ?>">
                <input type="hidden" name="id_pengunjung" value="<?php echo $user['id_pengunjung'] ?>">
                <div class="text-center">
                	<input class="btn btn-lg btn-primary btn-block" type="submit" value="Edit Profile">
                </div>
              </form>
            </div>
          </div>

        </div>
      </section>
      <!-- #about -->
    </main>