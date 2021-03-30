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
              <h3>LOGIN</h3>
              	<?php echo form_open_multipart('users/login'); ?>
				<?php echo validation_errors(); ?>
	                <div class="form-row">
	                  <div class="form-group col-md-6">
	                    <input type="text" name="username_pengunjung" class="form-control" placeholder="Username Anda" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
	                  </div>
	                  <div class="form-group col-md-6">
	                    <input type="password" class="form-control" name="password_pengunjung" id="password_pengunjung" placeholder="Password Anda">
	                  </div>
                    <div class="form-group col-md-6">
                      <a href="<?php echo base_url(); ?>users/forget">Lupa Password</a>
                    </div>
	                </div>
	                <div class="text-center">
						<input class="btn btn-lg btn-primary btn-block" type="submit" value="Sign in">
	                </div>
	                	<!-- <a class="mt-5 mb-3 text-muted" href="forget_password.php">Lupa Password?</a> -->
	              </form>
            </div>
          </div>

        </div>
      </section>
      <!-- #about -->
    </main>