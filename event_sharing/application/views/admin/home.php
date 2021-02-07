<ng-view class="ng-scope">
  <section id="content" ng-controller="DashboardMhsController" class="ng-scope">

    <div class="container">

      <div class="block-header">
        <h2>Admin Area</h2>
      </div>

      <div class="row m-5 centered">
        <div class="dash-widgets">
          <div class="row">

            <?php if ($this->session->flashdata('welcome')): ?>
              <?php echo $this->session->flashdata('welcome'); ?>
            <?php endif ?>

            <div class="col-sm-4 col-md-4">
              <div class="card">
                <div class="card-header">
                  <div class="cardtext-small">
                  <p>Kategori Event</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 col-sm-12">
                    <div class="bgm-white cardcontainer" align="center">
                      <div>
                        <?php echo count($kategori); ?>
                      </div>
                      <div class="sp-btn margin-5t">
                        <a href="<?php echo base_url("admin/kategori-event"); ?>" class="btn bgm-orange waves-effect">Lhat Kategori Event</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>  
            </div>

            <div class="col-sm-4 col-md-4">
              <div class="card">
                <div class="card-header">
                  <div class="cardtext-small">
                    <p>Respon Pengunjung</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 col-sm-12">
                    <div class="bgm-white cardcontainer" align="center">
                      <div>
                        <?php echo count($respon); ?>
                      </div>
                      <div class="sp-btn margin-5t">
                        <a href="<?php echo base_url("admin/respon"); ?>" class="btn bgm-orange waves-effect">Lihat Respon Pengunjung</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>  
            </div>

            <div class="col-sm-4 col-md-4">
              <div class="card">
                <div class="card-header">
                  <div class="cardtext-small">
                    <p>Member</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 col-sm-12">
                    <div class="bgm-white cardcontainer" align="center">
                      <div>
                        <?php echo count($member); ?>
                      </div>
                      <div class="sp-btn margin-5t">
                        <a href="<?php echo base_url("admin/manajemen-member"); ?>" class="btn bgm-orange waves-effect">Lihat Manajemen Member</a>
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