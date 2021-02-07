<ng-view class="ng-scope">
  <section id="content" ng-controller="DashboardMhsController" class="ng-scope">

    <div class="container">

      <div class="row m-5">
        <div class="dash-widgets">
          <div class="row">

            <div class="col-sm-12 col-md-12">
              <div class="card">
                <div class="card-header">
                  <div class="cardtext-small">
                    <p>Manajemen Member</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 col-sm-12">
                    <div class="card">

                      <?php if ($this->session->flashdata('alert')): ?>
                        <?php echo $this->session->flashdata('alert'); ?>
                      <?php endif ?>

                      <div class="table-responsive">  

                        <table class="table table-stripped">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Nama Lengkap</th>
                              <th>Email</th>
                              <th>Foto</th>
                              <th>Status Dokumen</th>
                              <th>Status Akun</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach ($member as $key => $value): ?>
                              <tr>
                                <td><?php echo $key+1; ?></td>
                                <td><a href="<?php echo base_url("admin/manajemen-member/dokumen-member/".$value['id_user']); ?>" style="color: #5E5E5E;"><?php echo $value['nama']; ?></a></td>
                                <td><?php echo $value['email']; ?></td>
                                <td><img src="<?php echo base_url("assets/img/member/logo/".$value['logo']); ?>" height="40"></td>
                                <td>
                                  <?php if ($value['dokumen']['status']==0): ?>
<<<<<<< HEAD
                                    <a href="<?php echo base_url("admin/manajemen-member/validasi/".$value['id_user']); ?>" class="btn waves-effect m-3 p-5-10" style="color: white; background-color: red;">Belum Di Validasi</a>
=======
                                    <a href="<?php echo base_url("#/$value[id_kategori]"); ?>" class="btn waves-effect m-3 p-5-10" style="color: white; background-color: red;">Belum Valid</a>
>>>>>>> 6f6d4e761dc9f0f77a6619c88ab18111579354f8
                                  <?php elseif ($value['dokumen']['status']==1): ?>
                                    <a class="btn bgm-success m-3 p-5-10" style="color: white; background-color: green; cursor: not-allowed;">Valid</a>
                                  <?php endif ?>
                                </td>
                                <td>
                                  <?php if ($value['status']==0): ?>
                                    <a href="<?php echo base_url("admin/manajemen-member/aktif-akun/".$value['id_user']); ?>" class="btn waves-effect m-3 p-5-10" style="color: white; background-color: red;">Non Aktif</a>
                                  <?php elseif ($value['status']==1): ?>
                                    <a href="<?php echo base_url("admin/manajemen-member/nonaktif-akun/".$value['id_user']); ?>" class="btn bgm-success waves-effect m-3 p-5-10" style="color: white; background-color: green;">Aktif</a>
                                  <?php endif ?>
                                </td>
                                <!-- <td>
                                  <?php if ($value['status']=="Has Not Reply"): ?>
                                    <a id="balas-pesan" class="btn waves-effect m-3 p-5-10" data-id="<?php echo $value['id_visitor']; ?>" data-email="<?php echo $value['email']; ?>" style="color: white; background-color: red;">Belum Di Balas</a>
                                  <?php elseif ($value['status']=="Has Reply"): ?>
                                    <a class="btn bgm-success waves-effect m-3 p-5-10" style="color: white; background-color: green;">Terkirim</a>
                                  <?php endif ?>
                                </td> -->
                              </tr>
                            <?php endforeach ?>
                          </tbody>
                        </table>

                      </div>
                    </div>
                  </div>
                </div>

              </div>  
            </div>

          </div>
        </div>
      </div>

    </div>

  </section>
</ng-view>