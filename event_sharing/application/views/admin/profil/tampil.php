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
                    <p>Profil Admin</p>
                  </div>
                </div>
                <form method="POST" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-md-12 col-sm-12">
                      <div class="bgm-white cardcontainer">
                        <div class="card-body card-padding p-t-20">

                          <?php if ($this->session->flashdata('alert')): ?>
                            <?php echo $this->session->flashdata('alert'); ?>
                          <?php endif ?>

                          <div class="form-group">
                            <div class="fg-line disabled">
                              <strong class="f-12">Name of Admin</strong>
                              <input type="text" name="nama" class="form-control f-14 ng-pristine ng-untouched ng-valid ng-not-empty" value="<?php echo $admin['nama']; ?>" placeholder="<?php if (empty($admin['nama'])){ echo "Belum ada nama, silahkan isi nama anda."; } ?>">
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="fg-line disabled">
                              <strong class="f-12">Email</strong>
                              <input type="email" name="email" class="form-control f-14 ng-pristine ng-untouched ng-valid ng-not-empty" value="<?php echo $admin['email']; ?>">
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="fg-line disabled">
                              <strong class="f-12">Password</strong>
                              <input type="password" name="password" class="form-control f-14 ng-pristine ng-untouched ng-valid ng-not-empty" placeholder="Kosongkan jika tidak ingin mengganti password.">
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="fg-line disabled">
                              <img src="<?php echo base_url("assets/admin/img/profil/".$admin['logo']); ?>" height="100">
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="fg-line disabled">
                              <strong class="f-12">Image : <?php echo $admin['logo']; ?></strong>
                              <input type="file" name="logo" class="form-control f-14 ng-pristine ng-untouched ng-valid ng-not-empty">
                            </div>
                          </div>        

                          <div class="form-group" sty>
                            <div class="sp-btn">
                              <button class="btn bgm-green waves-effect m-20 p-10-20">Change</button>
                            </div>
                          </div>

                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>  
            </div>

          </div>
        </div>
      </div>

    </div>

  </section>
</ng-view>