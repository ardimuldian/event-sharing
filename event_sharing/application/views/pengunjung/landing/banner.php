<div class="uk-section uk-section-secondary uk-background-cover event-landing-page-section-hero" data-src="<?php echo base_url("assets/img/background/event_populer/event_populer1.jpg"); ?>" style="background-position: bottom right; background-size: cover;">
  <div class="uk-container">

    <div class="uk-grid">

      <div class="uk-width-1-1 uk-width-2-2@m">

        <div uk-slider style="padding: 100px 0px 0px 0px;">

          <div class="uk-grid-small uk-flex-middle uk-margin-bottom">
            <div class="uk-width-expand"></div>
            <div class="uk-width-auto uk-visible@s">
              <div class="uk-slidenav-container">
                <a href="#" class="uk-link-reset uk-display-inline-block uk-margin-small-right" uk-slider-item="previous"><i class="fa fa-chevron-left"></i></a>
                <a href="#" class="uk-link-reset uk-display-inline-block" uk-slider-item="next"><i class="fa fa-chevron-right"></i></a>
              </div>
            </div>
          </div>

          <ul class="uk-margin-remove-top uk-slider-items uk-grid-small">
            <?php if (!empty($event)): ?>

              <?php foreach ($event as $key => $value): ?>

                <?php $date_now = new DateTime(); $date2 = new DateTime($value['tgl_berakhir_order']); ?>

                  <?php if ($value['tiket_disediakan']<=25 AND $date_now < $date2): ?>
                    <li class="uk-transition-toggle animate-section uk-width-2-5@s uk-width-1-3@m uk-width-3-4">
                      <a class="card-event uk-link-reset" href="<?php echo base_url("acara/".$value['url_event']); ?>" target="_blank">
                        <div class="banner-thumb uk-inline-clip">
                          <img class="uk-transition-opaque" data-src="<?php echo base_url("assets/img/member/banner/".$value['banner']); ?>">
                        </div>
                        <div class="card-event-body">
                          <h4 class="event-title"><?php echo $value['nama_event']; ?></h4>
                          <div uk-margin><span class="event-category">
                            <?php echo $value['nama_kategori']; ?>
                          </span></div>
                          <div class="uk-grid-collapse uk-child-width-expand@s uk-grid">
                            <div class="uk-width-5-5@m">
                              <div class="event-details">
                                <span class="detail-name">Tanggal &amp; Waktu</span>
                                <span class="detail-value"><i class="fa fa-calendar"></i>
                                  <?php echo $value['tgl_mulai_acara']; ?> - <?php echo $value['tgl_berakhir_acara']; ?>
                                </span>
                              </div>
                              <div class="event-details">
                                <span class="detail-value"><i class="fa fa-clock-o"></i>
                                  <?php echo substr($value['waktu_mulai_acara'], 0,5); ?> - <?php echo substr($value['waktu_berakhir_acara'], 0,5); ?> WIB
                                </span>
                              </div>
                            </div>
                          </div>
                          <div class="event-details">
                            <span class="detail-name">Lokasi</span>
                            <span class="detail-value"><i class="fa fa-map-marker"></i><?php echo $value['lokasi_acara']; ?></span>
                          </div>
                        </div>
                      </a>
                    </li>
                  <?php endif ?>

              <?php endforeach ?>

            <!-- <?php //elseif (empty($event)): ?>
              <li class="uk-transition-toggle animate-section uk-width-5-5@s uk-width-1-1@m uk-width-5-5" style="text-align: center; opacity: 0.5;">
                <div class="banner-thumb uk-inline-clip">
                  <img class="uk-transition-opaque" data-src="<?php //echo base_url("assets/img/member/banner/data-kosong.png"); ?>">
                </div>
              </li> -->
            <?php endif ?>
            
          </ul>
        </div>

        <div class="uk-text-center">
          <a href="<?php echo base_url(""); ?>" target="_blank" class="uk-button uk-margin-medium-top uk-hidden@m uk-width-1-1 uk-width-auto@s uk-button-primary uk-box-shadow-small">SELENGKAPNYA</a>
        </div>

      </div>
    </div>
  </div>
</div>

<div id="search-bar" uk-sticky="animation: uk-animation-slide-top; top: 120;">
  <div class="uk-container">

    <div class="search-container" uk-grid>

      <div class="uk-visible@m uk-width-1-2">
        <h3 class="text-white"><b>Temukan</b> <span class="light">Event Menarik Lainnya</span></h3>
      </div>
      
      <div class="uk-width-1-1 uk-width-1-2@m">
        <div class="uk-inline uk-width-1-1">
          <button class="uk-form-icon uk-form-icon-flip" style="cursor: pointer;"><span class="fa fa-search"></span></button>
          <input type="text" placeholder="Cari event di sini.." class="uk-input search-bar-input">
        </div>
      </div>

    </div>
    
    <div class="uk-width-1-1 sticky-menu-container uk-grid-collapse" uk-grid>

      <div class="uk-width-1-2 uk-width-1-4@m">
        <a href="/" class="logo-img uk-link-reset">
          <img class="white uk-margin-remove-top" src="<?php echo base_url("assets/img/logo/".$pengaturan['logo']); ?>" alt="Create a free event & Set your own show">
        </a>
      </div>
      
      <div class="uk-width-1-2 sticky-main-menu uk-hidden@m">
        <ul class="uk-navbar-nav uk-flex-right">
          <li>
            <a class="search-button-icon"><span class="fa fa-search"></span></a>
          </li>
          <li class="hamburger-menu">
            <a href="#modal-menu" class="main-icon-open-menu" uk-toggle>
              <span class="open-menu">MENU</span>
            </a>
          </li>
        </ul>
      </div>

      <div class="uk-width-3-4 uk-grid-collapse uk-visible@m" uk-grid>
        <div class="uk-width-expand">
          <div class="uk-inline uk-width-1-1">
            <button class="uk-form-icon uk-form-icon-flip" style="cursor: pointer;"><span class="fa fa-search"></span></button>
            <input type="text" placeholder="Cari event di sini.." class="uk-input search-bar-input">
          </div>
        </div>
        <div class="uk-width-auto">
          <div class="uk-float-right">
            <ul class="uk-navbar-nav nav-blue">
              <li>
                <a href="<?php echo base_url("buat-event"); ?>">
                  <button class="uk-button uk-button-small uk-button-primary uk-box-shadow-small btn-on-top-nav uk-button-small gradient-button uk-margin-left">BUAT EVENT</button>
                </a>
              </li>
              <?php if (!$this->session->userdata('member')): ?>
                <li class="uk-text-bold">
                  <a href="<?php echo base_url("login"); ?>" uk-toggle>MASUK</a>
                </li>
              <?php endif ?>
              <?php if ($this->session->userdata('member')): ?>
                <li>

                  <a id="profile-icon" href="#">
                    <i class="fa fa-user-o" style="color: #113452;"></i>
                  </a> 

                  <div id="profile-dropdown" uk-dropdown="pos: top-right; mode: hover;offset: 0;" class="profile-menu-overlay uk-dropdown">
                    <ul class="uk-nav uk-dropdown-nav">

                      <li>
                        <a href="#modal-menu" class="main-nav-open-menu" uk-toggle>
                          <i class="fa fa-info uk-margin-small-right uk-margin-small-left" style="color: #113452;"></i> Informasi
                        </a>
                      </li>

                      <li>
                        <a href="<?php echo base_url("member"); ?>">
                          <i class="fa fa-home uk-margin-small-right uk-margin-small-left" style="color: #113452;"></i> Dashboard
                        </a>
                      </li>

                      <li>
                        <a href="<?php echo base_url("logout-member"); ?>">
                          <i class="fa fa-sign-out uk-margin-small-right uk-margin-small-left" style="color: #113452;"></i> Keluar
                        </a>
                      </li>

                    </ul>
                  </div>
                </li>
              <?php endif ?>
            </ul>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>