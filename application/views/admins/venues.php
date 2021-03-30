
    <div class="main-panel">
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Daftar Venue</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>
                          Nama
                        </th>
                        <th>
                          Alamat
                        </th>
                        <th>
                          Harga(Rp)
                        </th>
                        <th>
                          Jenis
                        </th>
                      </thead>
                      <tbody>
                        <?php foreach($venues as $venue):?>
                          <tr>
                            <td>
                              <?php echo $venue['nama_venue']?>
                            </td>
                            <td>
                              <?php echo $venue['alamat_venue']?>
                            </td>
                            <td>
                              Rp. <?php echo $venue['harga_sewa_venue']?> per Jam
                            </td>
                            <td>
                              <?php echo $venue['jenis_venue']?>
                            </td>
                          </tr>
                        <?php endforeach;?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>