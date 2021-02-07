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
                    <p>Kategori Event</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 col-sm-12">
                    <div class="card">

                      <div class="sp-btn">
                        <a class="btn bgm-cyan waves-effect m-20 p-10-20" href="<?php echo base_url("admin/kategori-event/tambah"); ?>">Add</a>
                      </div>

                      <?php if ($this->session->flashdata('alert')): ?>
                        <?php echo $this->session->flashdata('alert'); ?>
                      <?php endif ?>

                      <div class="table-responsive">  

                        <table class="table table-stripped">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Kategori Event</th>
                              <th>Cover</th>
                              <th>Deskripsi</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach ($kategori as $key => $value): ?>
                              <tr>
                                <td><?php echo $key+1; ?></td>
                                <td width="150"><?php echo $value['nama_kategori']; ?></td>
                                <td><img height="100" src="<?php echo base_url("assets/img/kategori/".$value['cover']); ?>"></td>
                                <td><?php echo substr($value['deskripsi'], 0,70); ?></td>
                                <td>
                                  <a href="<?php echo base_url("admin/kategori-event/ubah/$value[id_kategori]"); ?>" class="btn bgm-default waves-effect m-3 p-5-10" style="color: green;">Ubah</a>
                                </td>
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