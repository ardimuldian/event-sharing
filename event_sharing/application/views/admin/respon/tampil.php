<style>
  body {font-family: Arial, Helvetica, sans-serif;}

  /* The Modal (background) */
  .modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  }

  /* Modal Content */
  .modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 0px;
    border: 1px solid #888;
    width: 50%;
  }

  /* The Close Button */
  .close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
  }

  .close:hover,
  .close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
  }
</style>

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
                    <p>Respon Pengunjung</p>
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
                              <th>Pesan Visitor</th>
                              <th>Pesan Admin</th>
                              <th>Status</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach ($respon as $key => $value): ?>
                              <tr>
                                <td><?php echo ++$start; ?></td>
                                <td><a href="<?php echo base_url("admin/respon/detail/".$value['id_respon']); ?>" style="color: #5E5E5E;"><?php echo $value['nama_lengkap']; ?></a></td>
                                <td><?php echo $key+1; ?></td>
                                <td><a href="<?php echo base_url("admin/visitor/detail/".$value['id_respon']); ?>" style="color: #5E5E5E;"><?php echo $value['nama_lengkap']; ?></a></td>
                                <td><?php echo $value['email']; ?></td>
                                <td><?php echo substr($value['pesan_visitor'], 0, 50); ?> [..]</td>
                                <td>
                                  <?php if (empty($value['pesan_admin'])): ?>
                                    <?php echo "-"; ?>
                                  <?php elseif (!empty($value['pesan_admin'])): ?>
                                    <?php echo substr($value['pesan_admin'], 0, 50). " [..]"; ?>
                                  <?php endif ?>
                                </td>
                                <td>
                                  <?php if ($value['status']=="Has Not Reply"): ?>
                                    <a id="balas-pesan" class="btn waves-effect m-3 p-5-10" data-id="<?php echo $value['id_respon']; ?>" data-email="<?php echo $value['email']; ?>" style="color: white; background-color: red;">Belum Di Balas</a>
                                  <?php elseif ($value['status']=="Has Reply"): ?>
                                    <a class="btn bgm-success m-3 p-5-10" style="color: white; background-color: green; cursor: not-allowed;">Terkirim</a>
                                  <?php endif ?>
                                </td>
                              </tr>
                            <?php endforeach ?>
                          </tbody>
                        </table>

                        <div align="center">
                        <?php echo $this->pagination->create_links(); ?>
                        </div>

                      </div>

                    </div>

                  </div>

                </div>

                <!-- The Modal -->
                <div id="balas-email" class="modal">

                  <!-- Modal content -->
                  <div class="modal-content">
                    <span class="close">&times;</span>
                    <div class="card-header">
                      <div class="cardtext-small">
                        <p>Balas Pesan Visitor</p>
                      </div>
                    </div>
                    <form method="POST">
                      <div class="row">
                        <div class="col-md-12 col-sm-12">
                          <div class="bgm-white cardcontainer">
                            <div class="card-body card-padding p-t-20">

                              <div class="form-group">
                                <div class="fg-line disabled">
                                  <strong class="f-12">Pesan Admin</strong>
                                  <input type="text" name="id_respon" class="hidden">
                                  <input type="text" name="email" class="hidden">
                                  <textarea class="form-control" id="editor1" name="pesan_admin" rows="10" placeholder="Isi pesan untuk membalas visitor by email"></textarea>
                                  <strong class="f-12" style="color: red;"><?php echo form_error('pesan_admin'); ?></strong>
                                </div>
                              </div>

                              <div class="form-group" sty>
                                <div class="sp-btn">
                                  <button name="save" value="save" class="btn bgm-green waves-effect m-20 p-10-20">Kirim</button>
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
      </div>

    </div>

  </section>
</ng-view>