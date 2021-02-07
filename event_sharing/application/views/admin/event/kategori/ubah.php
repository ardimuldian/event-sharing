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
                    <p>Ubah Kategori Event</p>
                  </div>
                </div>
                <form method="POST" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-md-12 col-sm-12">
                      <div class="bgm-white cardcontainer">
                        <div class="card-body card-padding p-t-20">

                          <div class="form-group">
                            <div class="fg-line disabled">
                              <strong class="f-12">Nama Kategori</strong>
                              <input type="text" name="nama_kategori" class="form-control f-14 ng-pristine ng-untouched ng-valid ng-not-empty" value="<?php echo $kategori['nama_kategori']; ?>">
                              <strong class="f-12" style="color: red;"><?php echo form_error('nama_kategori'); ?></strong>
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="fg-line disabled">
                              <img src="<?php echo base_url("assets/img/kategori/".$kategori['cover']); ?>" height="100">
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="fg-line disabled">
                              <strong class="f-12">Image : <?php echo $kategori['cover']; ?></strong>
                              <input type="file" name="cover" class="form-control f-14 ng-pristine ng-untouched ng-valid ng-not-empty">
                              <strong class="f-12" style="color: #e0e0e0;">Max Size: 500Kb | Max Width: 630 | Max Height:260 </strong>
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="fg-line disabled">
                              <strong class="f-12">Deskripsi</strong>
                              <textarea name="deskripsi" class="form-control f-14 ng-pristine ng-untouched ng-valid ng-not-empty" rows="4"><?php echo $kategori['deskripsi']; ?></textarea> 
                              <strong class="f-12" style="color: red;"><?php echo form_error('deskripsi'); ?></strong>
                            </div>
                          </div> 

                          <div class="form-group" sty>
                            <div class="sp-btn">
                              <button class="btn bgm-green waves-effect m-20 p-10-20">Ubah</button>
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