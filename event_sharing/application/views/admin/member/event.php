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
                    <label>Event</label>
                    <label style="padding: 0px 0px 0px 1020px;"><a class="btn bgm-orange waves-effect" href="<?php echo base_url("admin/manajemen-member"); ?>">Kembali</a></label>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 col-sm-12">
                    <div class="card">

                      <div class="row">

                        <div class="col-md-12 col-sm-12">
                          <div class="bgm-white cardcontainer">
                            <div class="card-body card-padding p-t-20">

                              <ul class="main-menu">

                                <?php foreach ($event as $key => $value): ?>
                                  <li class="sub-menu">
                                    <a data-ma-action="submenu-toggle"><i class="zmdi zmdi-code" aria-hidden="true" style="color: black;"></i><?php echo $value['nama_event']; ?></a>

                                    <ul>
                                      <li>
                                        <div class="row">

                                          <div class="col-md-6 col-sm-6">
                                            <div class="bgm-white cardcontainer">
                                              <div class="card-body card-padding p-t-20">

                                                <div class="form-group">
                                                  <div class="fg-line disabled">
                                                    <strong class="f-12">Banner</strong>
                                                    <br><br>
                                                    <center>
                                                      <img src="<?php echo base_url("assets/img/member/banner/".$value['banner']); ?>" alt="Banner" height="200">
                                                    </center>
                                                  </div>
                                                </div>

                                              </div>
                                            </div>
                                          </div>

                                          <div class="col-md-6 col-sm-6">
                                            <div class="bgm-white cardcontainer">
                                              <div class="card-body card-padding p-t-20">

                                                <div class="form-group">
                                                  <div class="fg-line disabled">
                                                    <strong class="f-12">Kategori Event</strong>
                                                    <input type="text" class="form-control f-14 ng-pristine ng-untouched ng-valid ng-not-empty" value="<?php echo $value['nama_kategori']; ?>" disabled>
                                                  </div>
                                                </div>

                                                <div class="form-group">
                                                  <div class="fg-line disabled">
                                                    <strong class="f-12">Tanggal dan Waktu</strong>
                                                    <input type="text" class="form-control f-14 ng-pristine ng-untouched ng-valid ng-not-empty" value="<?php echo $value['tgl_mulai_acara']; ?> - <?php echo $value['tgl_berakhir_acara']; ?> | <?php echo substr($value['waktu_mulai_acara'], 0,5); ?> - <?php echo substr($value['waktu_berakhir_acara'], 0,5); ?>" disabled>
                                                  </div>
                                                </div>

                                                <div class="form-group">
                                                  <div class="fg-line disabled">
                                                    <strong class="f-12">Lokasi</strong>
                                                    <input type="text" class="form-control f-14 ng-pristine ng-untouched ng-valid ng-not-empty" value="<?php echo $value['lokasi_acara']; ?>" disabled>
                                                  </div>
                                                </div>

                                                <div class="form-group">
                                                  <div class="fg-line disabled">
                                                    <strong class="f-12">Tiket Disediakan</strong>
                                                    <input type="text" class="form-control f-14 ng-pristine ng-untouched ng-valid ng-not-empty" value="<?php echo $value['tiket_disediakan']; ?>" disabled>
                                                  </div>
                                                </div>

                                                <?php $total=0; ?>

                                                <?php foreach ($value['pengunjung'] as $kunci => $nilai): ?>
                                                  <?php 
                                                  $total+=$nilai['jml_tiket']; 
                                                  ?>
                                                <?php endforeach ?>

                                                <div class="form-group">
                                                  <div class="fg-line disabled">
                                                    <strong class="f-12">Tiket Terjual</strong>
                                                    <input type="text" class="form-control f-14 ng-pristine ng-untouched ng-valid ng-not-empty" value="<?php echo $total; ?>" disabled>
                                                  </div>
                                                </div>

                                                <div class="form-group">
                                                  <div class="fg-line disabled">
                                                    <strong class="f-12">Pengunjung</strong>
                                                    <input type="text" class="form-control f-14 ng-pristine ng-untouched ng-valid ng-not-empty" value="<?php echo count($value['pengunjung']); ?>" disabled>
                                                  </div>
                                                </div>

                                              </div>
                                            </div>
                                          </div>

                                        </div>
                                      </li>
                                    </ul>

                                  </li>
                                <?php endforeach ?>

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