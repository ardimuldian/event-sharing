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
                    <p>Pengaturan</p>
                  </div>
                </div>

                <?php if ($this->session->flashdata('alert')): ?>
                  <?php echo $this->session->flashdata('alert'); ?>
                <?php endif ?>

                <form method="POST" enctype="multipart/form-data">

                  <div class="row">

                    <div class="col-md-12 col-sm-12">
                      <div class="bgm-white cardcontainer">
                        <div class="card-body card-padding p-t-20">

                          <ul class="main-menu">

                            <li class="sub-menu">
                              <a href="" data-ma-action="submenu-toggle"><i class="zmdi zmdi-code" aria-hidden="true" style="color: black;"></i>Pengaturan Meta (Search Engine)</a>
                              
                              <ul>
                                <li>
                                  <div class="row">

                                    <div class="col-md-12 col-sm-12">
                                      <div class="bgm-white cardcontainer">
                                        <div class="card-body card-padding p-t-20">

                                          <div class="form-group">
                                            <div class="fg-line disabled">
                                              <strong class="f-12">Meta (Keyword)</strong>
                                              <input type="text" name="meta_keyword" class="form-control f-14 ng-pristine ng-untouched ng-valid ng-not-empty" value="<?php echo $meta['meta_keyword']; ?>">
                                              <strong class="f-12" style="color: red;"><?php echo form_error('meta_keyword'); ?></strong>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <div class="fg-line disabled">
                                              <strong class="f-12">Meta (Author)</strong>
                                              <input type="text" name="meta_author" class="form-control f-14 ng-pristine ng-untouched ng-valid ng-not-empty" value="<?php echo $meta['meta_author']; ?>">
                                              <strong class="f-12" style="color: red;"><?php echo form_error('meta_author'); ?></strong>
                                            </div>
                                          </div>  

                                          <div class="form-group">
                                            <div class="fg-line disabled">
                                              <strong class="f-12">Meta (Title)</strong>
                                              <input type="text" name="meta_title" class="form-control f-14 ng-pristine ng-untouched ng-valid ng-not-empty" value="<?php echo $meta['meta_title']; ?>">
                                              <strong class="f-12" style="color: red;"><?php echo form_error('meta_title'); ?></strong>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <div class="fg-line disabled">
                                              <strong class="f-12">Meta (Description)</strong>
                                              <textarea name="meta_description" class="form-control f-14 ng-pristine ng-untouched ng-valid ng-not-empty" rows="4"><?php echo $meta['meta_description']; ?></textarea>
                                              <strong class="f-12" style="color: red;"><?php echo form_error('meta_description'); ?></strong>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <div class="sp-btn">
                                              <button name="meta" value="meta" class="btn bgm-green waves-effect m-20 p-10-20">Ubah</button>
                                            </div>
                                          </div>

                                        </div>
                                      </div>
                                    </div>

                                  </div>
                                </li>
                              </ul>

                            </li>

                            <li class="sub-menu">
                              <a href="" data-ma-action="submenu-toggle"><i class="zmdi zmdi-share" aria-hidden="true" style="color: black;"></i>Pengaturan Social Media</a>
                              
                              <ul>
                                <li class="">
                                  <div class="row">

                                    <div class="col-md-12 col-sm-12">
                                      <div class="cardcontainer">
                                        <div class="card-body card-padding p-t-20">

                                          <div class="form-group">
                                            <div class="fg-line disabled">
                                              <strong class="f-12">Facebook</strong>
                                              <input type="text" name="facebook" class="form-control f-14 ng-pristine ng-untouched ng-valid ng-not-empty" value="<?php echo $meta['facebook']; ?>">
                                              <strong class="f-12" style="color: red;"><?php echo form_error('facebook'); ?></strong>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <div class="fg-line disabled">
                                              <strong class="f-12">Instagram</strong>
                                              <input type="text" name="instagram" class="form-control f-14 ng-pristine ng-untouched ng-valid ng-not-empty" value="<?php echo $meta['instagram']; ?>">
                                              <strong class="f-12" style="color: red;"><?php echo form_error('instagram'); ?></strong>
                                            </div>
                                          </div>  

                                          <div class="form-group">
                                            <div class="fg-line disabled">
                                              <strong class="f-12">Twitter</strong>
                                              <input type="text" name="twitter" class="form-control f-14 ng-pristine ng-untouched ng-valid ng-not-empty" value="<?php echo $meta['twitter']; ?>">
                                              <strong class="f-12" style="color: red;"><?php echo form_error('twitter'); ?></strong>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <div class="fg-line disabled">
                                              <strong class="f-12">Youtube</strong>
                                              <input type="text" name="youtube" class="form-control f-14 ng-pristine ng-untouched ng-valid ng-not-empty" value="<?php echo $meta['youtube']; ?>">
                                              <strong class="f-12" style="color: red;"><?php echo form_error('youtube'); ?></strong>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <div class="sp-btn">
                                              <button name="sosmed" value="sosmed" class="btn bgm-green waves-effect m-20 p-10-20">Ubah</button>
                                            </div>
                                          </div>

                                        </div>
                                      </div>
                                    </div>

                                  </div>
                                </li>

                              </ul>

                            </li>

                            <li class="sub-menu">
                              <a href="" data-ma-action="submenu-toggle"><i class="zmdi zmdi-laptop-mac" aria-hidden="true" style="color: black;"></i>Pengaturan Tampilan</a>
                              
                              <ul>
                                <li class="">
                                  <div class="row">

                                    <div class="col-md-12 col-sm-12">
                                      <div class="cardcontainer">
                                        <div class="card-body card-padding p-t-20">

                                          <div class="form-group">
                                            <div class="fg-line disabled">
                                              <img src="<?php echo base_url("assets/img/favicon/".$meta['favicon']); ?>" height="100">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <div class="fg-line disabled">
                                              <strong class="f-12">Favicon: <?php echo $meta['favicon']; ?></strong>
                                              <input type="file" name="favicon" class="form-control f-14 ng-pristine ng-untouched ng-valid ng-not-empty">
                                              <strong class="f-12" style="color: red;"><?php echo form_error('favicon'); ?></strong>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <div class="fg-line disabled">
                                              <img src="<?php echo base_url("assets/img/logo/".$meta['logo']); ?>" height="50">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <div class="fg-line disabled">
                                              <strong class="f-12">Logo: <?php echo $meta['logo']; ?></strong>
                                              <input type="file" name="logo" class="form-control f-14 ng-pristine ng-untouched ng-valid ng-not-empty">
                                              <strong class="f-12" style="color: red;"><?php echo form_error('logo'); ?></strong>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <div class="fg-line disabled">
                                              <strong class="f-12">Tentang Kami</strong>
                                              <textarea class="form-control" id="editor" name="tentang_kami" rows="10"><?php echo $meta['tentang_kami']; ?></textarea>
                                              <strong class="f-12" style="color: red;"><?php echo form_error('tentang_kami'); ?></strong>
                                            </div>
                                          </div>  

                                          <div class="form-group">
                                            <div class="fg-line disabled">
                                              <strong class="f-12">No Whatsapp</strong>
                                              <input type="text" name="no_wa" class="form-control f-14 ng-pristine ng-untouched ng-valid ng-not-empty" value="<?php echo $meta['no_wa']; ?>">
                                              <strong class="f-12" style="color: red;"><?php echo form_error('no_wa'); ?></strong>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <div class="fg-line disabled">
                                              <strong class="f-12">Copyright</strong>
                                              <input type="text" name="copyright" class="form-control f-14 ng-pristine ng-untouched ng-valid ng-not-empty" value="<?php echo $meta['copyright']; ?>">
                                              <strong class="f-12" style="color: red;"><?php echo form_error('copyright'); ?></strong>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <div class="sp-btn">
                                              <button name="tampilan" value="tampilan" class="btn bgm-green waves-effect m-20 p-10-20">Ubah</button>
                                            </div>
                                          </div>

                                        </div>
                                      </div>
                                    </div>

                                  </div>
                                </li>

                              </ul>

                            </li>

                            <li class="sub-menu">
                              <a href="" data-ma-action="submenu-toggle"><i class="zmdi zmdi-compare" aria-hidden="true" style="color: black;"></i>Support</a>
                              
                              <ul>
                                <li class="">
                                  <div class="row">

                                    <div class="col-md-12 col-sm-12">
                                      <div class="cardcontainer">
                                        <div class="card-body card-padding p-t-20">

                                          <div class="form-group">
                                            <div class="fg-line disabled">
                                            <img src="<?php echo base_url("assets/img/support/".$support['cover_support1']); ?>" height="50">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <div class="fg-line disabled">
                                              <strong class="f-12">Cover Support 1: <?php echo $support['cover_support1']; ?></strong>
                                              <input type="file" name="cover_support1" class="form-control f-14 ng-pristine ng-untouched ng-valid ng-not-empty">
                                              <strong class="f-12" style="color: #bfbfbf;">Max Width:150px | Max Height:55px</strong>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <div class="fg-line disabled">
                                              <img src="<?php echo base_url("assets/img/support/".$support['cover_support2']); ?>" height="50">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <div class="fg-line disabled">
                                              <strong class="f-12">Cover Support 2: <?php echo $support['cover_support2']; ?></strong>
                                              <input type="file" name="cover_support2" class="form-control f-14 ng-pristine ng-untouched ng-valid ng-not-empty">
                                              <strong class="f-12" style="color: #bfbfbf;">Max Width:150px | Max Height:55px</strong>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <div class="fg-line disabled">
                                              <img src="<?php echo base_url("assets/img/support/".$support['cover_support3']); ?>" height="50">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <div class="fg-line disabled">
                                              <strong class="f-12">Cover Support 3: <?php echo $support['cover_support3']; ?></strong>
                                              <input type="file" name="cover_support3" class="form-control f-14 ng-pristine ng-untouched ng-valid ng-not-empty">
                                              <strong class="f-12" style="color: #bfbfbf;">Max Width:150px | Max Height:55px</strong>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <div class="fg-line disabled">
                                              <img src="<?php echo base_url("assets/img/support/".$support['cover_support4']); ?>" height="50">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <div class="fg-line disabled">
                                              <strong class="f-12">Cover Support 4: <?php echo $support['cover_support4']; ?></strong>
                                              <input type="file" name="cover_support4" class="form-control f-14 ng-pristine ng-untouched ng-valid ng-not-empty">
                                              <strong class="f-12" style="color: #bfbfbf;">Max Width:150px | Max Height:55px</strong>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <div class="fg-line disabled">
                                              <img src="<?php echo base_url("assets/img/support/".$support['cover_support5']); ?>" height="50">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <div class="fg-line disabled">
                                              <strong class="f-12">Cover Support5: <?php echo $support['cover_support5']; ?></strong>
                                              <input type="file" name="cover_support5" class="form-control f-14 ng-pristine ng-untouched ng-valid ng-not-empty">
                                              <strong class="f-12" style="color: #bfbfbf;">Max Width:150px | Max Height:55px</strong>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <div class="sp-btn">
                                              <button name="support" value="support" class="btn bgm-green waves-effect m-20 p-10-20">Ubah</button>
                                            </div>
                                          </div>

                                        </div>
                                      </div>
                                    </div>

                                  </div>
                                </li>

                              </ul>

                            </li>

                          </ul>

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