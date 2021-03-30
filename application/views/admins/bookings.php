    <div class="main-panel">
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Bookings on your venue</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>
                          ID
                        </th>
                        <th>
                          Nama Pemesan
                        </th>
                        <th>
                          Nama Venue
                        </th>
                        <th>
                          Tanggal Pesanan
                        </th>
                        <th>
                          Waktu Pesanan
                        </th>
                        <th>
                          Lama Pesan
                        </th>
                        <th>
                          Jumlah Tagihan(Rp)
                        </th>
                        <th>
                          Foto
                        </th>
                        <th>
                        </th>
                        <th>
                        </th>
                      </thead>
                      <tbody>
                        <?php foreach($bookings as $booking):?>
                          <tr>
                            <td>
                              <?php echo $booking['id_booking']; ?>
                            </td>
                            <td>
                              <?php echo $booking['nama_pengunjung']; ?>
                            </td>
                            <td>
                              <?php echo $booking['nama_venue']; ?>
                            </td>
                            <td>
                              <?php echo $booking['tanggal_booking']; ?>
                            </td>
                            <td>
                              <?php echo $booking['jam_booking']; ?>
                            </td>
                            <td>
                              <?php echo $booking['durasi_booking']; ?> Jam
                            </td>
                            <td>
                              Rp. <?php echo $booking['harga_booking']; ?>
                            </td>
                            <td>
                              <?php if($booking['bukti_pembayaran'] == NULL):?>
                                belum bayar
                              <?php else:?>
                                <img style="max-height: 100px; max-width: 100px;" src="<?php echo base_url();?>assets/buktiPembayaran/<?php echo $booking['bukti_pembayaran']; ?>">
                              <?php endif;?>
                            </td>
                            <td>
                              <?php if($booking['konfirmasi'] == 0):?>
                              <a class="btn btn-sm btn-outline-success" href="<?php echo base_url();?>admins/confirmBook/<?php echo $booking['id_booking'];?>">Confirm</a>
                              <?php else:?>
                                Confirmed
                              <?php endif;?>
                            </td>
                            <td>
                              <?php if($booking['konfirmasi'] == 0):?>
                              <?php echo form_open('admins/cancelBook'); ?>
                                <input type="hidden" name="id_booking" value="<?php echo $booking['id_booking']; ?>">
                                <input type="hidden" name="id_pengunjung" value="<?php echo $booking['id_pengunjung']; ?>">
                                <input type="hidden" name="id_venue" value="<?php echo $booking['id_venue']; ?>">
                                <input type="hidden" name="id_jadwal_venue" value="<?php echo $booking['id_jadwal_venue']; ?>">
                                <input type="hidden" name="durasi_booking" value="<?php echo $booking['durasi_booking']; ?>">
                                            <div class="btn-group">
                                  <input class="btn btn-sm btn-outline-danger" type="submit" value="Cancel Booking">
                                </div>
                              </form>
                            <?php endif;?>
                              <?php if($booking['konfirmasi'] == 1):?>
                              <a class="btn btn-sm btn-outline-success" href="<?php echo base_url();?>admins/finishBook/<?php echo $booking['id_booking'];?>">Finish</a>
                            <?php endif;?>
                              <?php if($booking['konfirmasi'] == 2):?>
                                <strong style="color: green;">Finished</strong>
                            <?php endif;?>
                            </td>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>