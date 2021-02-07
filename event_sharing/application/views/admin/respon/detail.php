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
                    <p>Pesan dari <?php echo $visitor['nama_lengkap']; ?></p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 col-sm-12">
                    <div class="card">

                    <br>

                        <div class="p-b-20 alert bgm-orange f-wht">
                          <label style="font-size: 20px;"><?php echo $visitor['nama_lengkap']; ?></label><br>
                          <?php echo $visitor['pesan_visitor']; ?>
                        </div>

                        <div class="p-b-20 alert bgm-green f-wht" style="text-align: right;">
                          <label style="font-size: 20px;">Admin</label><br>
                          <?php echo $visitor['pesan_admin']; ?>
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