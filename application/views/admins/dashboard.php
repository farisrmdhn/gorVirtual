<?php
  $sum = 0;
  foreach($bookings as $booking) {
    if($booking['konfirmasi'] == 0){
      $sum = $sum + 1;
    }
  }
?>
    <div class="main-panel">
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-4">
              <?php if($jadwal_venues != NULL):?>
                <a class="btn btn-sm btn-primary" href="<?php echo base_url(); ?>admins/updateJadwal">Update Jadwal Hari Ini</a>
              <?php endif;?>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <a style="color: white;" href="<?php echo base_url(); ?>admins/bookings"><i class="material-icons">info_outline</i></a>
                  </div>
                  <p class="card-category">Unconfirmed Bookings</p>
                  <h3 class="card-title"><?php echo $sum?></h3>
                </div>              
              </div>
            </div>
          </div>
        </div>