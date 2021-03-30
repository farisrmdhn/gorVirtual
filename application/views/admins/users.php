
    <div class="main-panel">
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Daftar User GorVirtual</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>
                          Nama
                        </th>
                        <th>
                          Username
                        </th>
                        <th>
                          Email
                        </th>
                        <th>
                          Nomor Telepon
                        </th>
                      </thead>
                      <tbody>
                        <?php foreach($users as $user):?>
                          <tr>
                            <td>
                              <?php echo $user['nama_pengunjung']; ?>
                            </td>
                            <td>
                              <?php echo $user['username_pengunjung']; ?>
                            </td>
                            <td>
                              <?php echo $user['email_pengunjung']; ?>
                            </td>
                            <td>
                              <?php echo $user['notelp_pengunjung']; ?>
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