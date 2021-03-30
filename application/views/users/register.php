<!-- <?php echo form_open_multipart('users/register'); ?>
	<?php echo validation_errors(); ?>

	<input type="text" name="nama_pengunjung" placeholder="Nama">
	<input type="text" name="username_pengunjung" placeholder="Username">
	<input type="text" name="email_pengunjung" placeholder="Email">
	<input type="text" name="notelp_pengunjung" placeholder="Nomor HP">
	<input type="password" name="password_pengunjung" placeholder="Password">
	<input type="password" name="password2_pengunjung" placeholder="Re-type Password">
	<input type="submit" name="submit">
</form> -->
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
              <h2>Register</h2>
              <?php echo form_open_multipart('users/register'); ?>
				<?php echo validation_errors(); ?>
                <div class="form-group">
                  <h3>Nama<input type="text" class="form-control" name="nama_pengunjung" placeholder="Nama" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject"></h3>
                </div>
                <div class="form-group">
                  <h3>Email<input type="text" class="form-control" name="email_pengunjung" placeholder="Email"></h3>
                </div>
                <div class="form-group">
                  <h3>Username<input type="text" class="form-control" name="username_pengunjung" placeholder="Username" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject"></h3>
                </div>
                <div class="form-group">
                  <h3>Password<input type="password" class="form-control" name="password_pengunjung" placeholder="Password"></h3>
                </div>
                <div class="form-group">
                  <h3>Re-Type Password<input type="password" class="form-control" name="password2_pengunjung" placeholder="Re-Type Password"></h3>
                </div>
                <div class="form-group">
                  <h3>Nomor Telepon<input type="text" class="form-control" name="notelp_pengunjung" placeholder="Nomor Telepon"></h3>
                </div>
                <div class="text-center">
                	<input class="btn btn-lg btn-primary btn-block" type="submit" value="Register">
                </div>
              </form>
            </div>
          </div>

        </div>
      </section>
      <!-- #about -->
    </main>