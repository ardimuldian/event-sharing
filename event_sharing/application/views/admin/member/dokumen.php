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
                    <label>Dokumen</label>
                    <label style="padding: 0px 0px 0px 800px;"><a class="btn bgm-orange waves-effect" href="<?php echo base_url("admin/manajemen-member"); ?>">Kembali</a></label>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 col-sm-12">
                    <div class="card">

                      <div class="row">

                        <div class="col-md-6 col-sm-^">
                          <div class="bgm-white cardcontainer">
                            <div class="card-body card-padding p-t-20">

                              <div class="form-group">
                                <div class="fg-line disabled">
                                  <strong class="f-12">Nama Lengkap</strong>
                                  <input type="text" class="form-control f-14 ng-pristine ng-untouched ng-valid ng-not-empty" value="<?php echo $member['nama']; ?>" disabled>
                                </div>
                              </div>

                              <div class="form-group">
                                <div class="fg-line disabled">
                                  <strong class="f-12">Email</strong>
                                  <input type="text" class="form-control f-14 ng-pristine ng-untouched ng-valid ng-not-empty" value="<?php echo $member['email']; ?>" disabled>
                                </div>
                              </div>

                              <div class="form-group">
                                <div class="fg-line disabled">
                                  <strong class="f-12">No.HP</strong>
                                  <input type="text" class="form-control f-14 ng-pristine ng-untouched ng-valid ng-not-empty" value="<?php echo $member['no_hp']; ?>" disabled>
                                </div>
                              </div>

                              <div class="form-group">
                                <div class="fg-line disabled">
                                  <strong class="f-12">Logo</strong>
                                  <br><br>
                                  <img src="<?php echo base_url("assets/img/member/logo/".$member['logo']); ?>" alt="ktp" height="30">
                                </div>
                              </div>

                              <div class="form-group">
                                <div class="fg-line disabled">
                                  <strong class="f-12">Deskripsi</strong>
                                  <input type="text" class="form-control f-14 ng-pristine ng-untouched ng-valid ng-not-empty" value="<?php echo $member['tentang_kami']; ?>" disabled>
                                </div>
                              </div>

                              <div class="form-group">
                                <div class="fg-line disabled">
                                  <strong class="f-12">Tanggal dan Waktu Registrasi</strong>
                                  <input type="text" class="form-control f-14 ng-pristine ng-untouched ng-valid ng-not-empty" value="<?php echo $member['date_created']; ?>" disabled>
                                </div>
                              </div>

                            </div>
                          </div>
                        </div>

                        <div class="col-md-6 col-sm-^">
                          <div class="bgm-white cardcontainer">
                            <div class="card-body card-padding p-t-20">

                              <div class="form-group">
                                <div class="fg-line disabled" style="text-align: center;">
                                  <strong class="f-12">Dokumen KTP</strong>
                                  <br><br>
                                  <img src="<?php echo base_url("assets/img/member/dokumen/".$member['dokumen_ktp']); ?>" alt="ktp" height="200">
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
            </div>

          </div>
        </div>
      </div>

    </div>

  </section>
</ng-view>