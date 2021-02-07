<!doctype html>
<html lang="id-ID">
<head>

  <title>Bikin event gratis & Atur acaramu sendiri</title>
  <meta name="keywords" content="<?php echo $pengaturan['meta_keyword']; ?>">
  <meta name="author" content="<?php echo $pengaturan['meta_author']; ?>">
  <meta name="title" content="<?php echo $pengaturan['meta_title']; ?>">
  <meta name="description" content="<?php echo $pengaturan['meta_description']; ?>" />

  <link rel="icon" sizes="16x16 24x24 32x32 48x48 64x64" href="<?php echo base_url("assets/img/favicon/".$pengaturan['favicon']); ?>">

  <link rel="stylesheet" href="<?php echo base_url("assets/css/default.css?v=111020191905"); ?>" />
  <link rel="stylesheet" href="<?php echo base_url("assets/css/adding.css"); ?>" />
  <link rel="stylesheet" href="<?php echo base_url("assets/font-awesome/css/font-awesome.min.css"); ?>">
  <link rel="stylesheet" href="<?php echo base_url("assets/ajax/libs/uikit1.min.css?_=1"); ?>">

  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
  <meta name="theme-color" content="#113452" />
<link rel="icon" sizes="16x16 24x24 32x32 48x48 64x64" href="<?php echo base_url("assets/img/favicon/".$pengaturan['favicon']); ?>">
<link rel="stylesheet" href="<?php echo base_url("assets/css/uikit.min.css"); ?>" />
<link rel="stylesheet" href="<?php echo base_url("assets/css/default.css?v=111020191905"); ?>" />
<link rel="stylesheet" href="<?php echo base_url("assets/css/adding.css"); ?>" />
<link rel="stylesheet" href="<?php echo base_url("assets/font-awesome/css/font-awesome.min.css"); ?>">

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
<meta name="theme-color" content="#113452" />

</head>
<body>

  <div class="main-nav uk-position-absolute" uk-sticky="bottom: #offset" style="z-index: 1011;">
    <div class="uk-container">

      <nav class="uk-width-1-1" uk-navbar>

        <div class="uk-navbar-left uk-margin-small-bottom uk-margin-small-top uk-text-middle">
          <a href="<?php echo base_url(""); ?>" class="logo-img uk-link-reset">
            <img class="white" src="<?php echo base_url("assets/img/logo/".$pengaturan['logo']); ?>" alt="Bikin event gratis & Atur acaramu sendiri">
          </a>
          <a class="uk-link-reset xd-search-trigger-modal" href="#search-modal" uk-toggle></a>
        </div>

        <div class="uk-navbar-right">

          <ul class="uk-navbar-nav nav-blue uk-hidden@m">
            <li class="close-search">
              <a class="uk-modal-close uk-link-reset" uk-icon="icon: close; ratio: 1.3"></a>
            </li>
            <li class="hamburger-menu">
              <div class="main-icon-open-menu">
                <a href="#modal-menu" class="main-nav-open-menu" uk-toggle><span class="open-menu">MENU</span></a>
                <i class="close-menu" uk-icon="icon: close; ratio: 1.3"></i>
              </div>
            </li>
          </ul>

          <ul class="uk-navbar-nav nav-blue uk-visible@m">
            <li>
              <a href="<?php echo base_url("buat-event"); ?>">
                <button class="uk-button uk-button-small uk-button-primary uk-box-shadow-small btn-on-top-nav uk-button-small gradient-button">BUAT EVENT</button>
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

        <div id="modal-menu" class="lss-common-wrapper" uk-modal bg-close=false>
          <div class="uk-container">
            <div class="lss-megamenu-body" uk-grid>

              <div class="uk-width-1-1 uk-width-3-5@m uk-flex-last@m">
                <div uk-grid>
                  <div class="uk-width-1-1 uk-hidden@m">
                    <ul id="lss-mobile-mainmenu" class="uk-nav uk-nav-default">
                      <li><a href="#">Cari Event</a></li>
                      <?php if (!$this->session->userdata('member')): ?>
                        <li v-if="!isAuthenticated">
                          <a href="<?php echo base_url("login"); ?>">
                            Masuk
                          </a>
                        </li>
                      <?php endif ?>
                      <?php if ($this->session->userdata('member')): ?>
                        <li v-else @click="logout">
                          <a href="<?php echo base_url("logout-member"); ?>">Keluar</a>
                        </li>
                      <?php endif ?>
                    </ul>
                  </div>

                  <div class="uk-width-1-1 uk-hidden@m"><hr></div>

                  <div class="uk-width-1-1">
                    <div class="adjust-padding-feed-right">
                      <div class="uk-width-1-1 padding-top-feed-desktop uk-margin-bottom">
                        <span class="uk-hidden@m megamenu-main-heading lss-text-light">Orang-orang akan membicarakan eventmu</span>
                      </div>

                      <div class="uk-child-width-1-2@s uk-visible@m uk-grid-match" uk-grid style="padding: 0px 100px 0px 100px">
                        <div>
                          <h3>
                            <span class="fa fa-credit-card uk-margin-small-right"></span> Free Payment
                          </h3>
                          <p class="services-desc uk-margin-remove-top">Tenang, di platform kami gratis. Kamu tak perlu pusing soal biaya.</p>
                        </div>
                        <div>
                          <h3>
                            <span class="fa fa-share-alt uk-margin-small-right"></span> Atur Semaumu
                          </h3>
                          <p class="services-desc uk-margin-remove-top">Kamu bisa mengatur sendiri informasi mengenai event kamu.</p>
                        </div>
                        <div>
                          <h3>
                            <span class="fa fa-sign-in uk-margin-small-right"></span> Check-in
                          </h3>
                          <p class="services-desc uk-margin-remove-top">Registrasi pengunjung event-mu jadi lebih mudah. Gunakan fitur check-in berbasis online yang tersedia.</p>
                        </div>
                        <div>
                          <h3>
                            <span class="fa fa-line-chart uk-margin-small-right"></span> Analisis Data
                          </h3>
                          <p class="services-desc uk-margin-remove-top">Kamu memiliki analisis data akurat tentang event kamu sebelumnya.</p>
                        </div>
                      </div>

                      <div class="uk-width-1-1 uk-margin-medium-top cta-modal-menu" style="padding: 0px 100px 0px 100px">
                        <a href="<?php echo base_url("buat-event"); ?>" class="uk-button uk-button-primary gradient-button">Buat Event Sekarang</a>
                      </div>

                      <div class="categories_items uk-margin-medium-top uk-visible@m">
                      </div>

                    </div>
                  </div>
                </div>
              </div>

            </div>

            <div class="uk-grid-small uk-flex-middle lss-megamenu-footer shortcut-footer-menu-padding" uk-grid>

              <div class="uk-width-1-1 uk-width-3-5@m uk-flex-last@m">
                <div class="uk-grid-small uk-flex-middle" uk-grid>
                  <div class="uk-width-1-1 uk-width-auto@m uk-flex uk-flex-center">
                    <ul id="shortcut-footer-menu-modal" class="uk-subnav adjust-padding-feed-right">
                      <li><a href="<?php echo base_url("tentang-kami"); ?>">Tentang Kami</a></li>
                      <li><a href="<?php echo base_url("kebijakan-privasi"); ?>">Kebijakan Privasi</a></li>
                      <li><a href="<?php echo base_url("hubungi-kami"); ?>">Hubungi Kami</a></li>
                    </ul>
                  </div>
                  <div class="uk-width-1-1 uk-margin-medium-left social-media-container">
                    <ul id="shortcut-footer-menu-modal" class="uk-thumbnav social-icon" uk-margin>
                      <li><a href="<?php echo $pengaturan['facebook']; ?>"><span class="fa fa-facebook"></span></a></li>
                      <li><a href="<?php echo $pengaturan['instagram']; ?>"><span class="fa fa-instagram"></span></a></li>
                      <li><a href="<?php echo $pengaturan['twitter']; ?>"><span class="fa fa-twitter"></span></a></li>
                      <li><a href="<?php echo $pengaturan['youtube']; ?>"><span class="fa fa-youtube"></span></a></li>
                    </ul>
                  </div>
                </div>
              </div>

              <div class="uk-width-1-1 uk-width-2-5@m uk-text-center uk-text-left@m uk-margin-remove-top">
                <span class="copyright-menu-modal"><?php echo $pengaturan['copyright']; ?></span>
              </div>
            </div>

          </div>
        </div>

      </nav>

    </div>
  </div>