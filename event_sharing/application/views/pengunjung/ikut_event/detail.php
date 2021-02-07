<!doctype html>
<html lang="id-ID">
<head>

  <meta charset="UTF-8">
  <meta name="description" content="<?php echo $pengaturan['meta_description']; ?>">
  <meta name="keywords" content="<?php echo $pengaturan['meta_keyword']; ?>">
  <meta name="author" content="<?php echo $pengaturan['meta_author']; ?>">
  <title>Tiket <?php echo $event['nama_event']; ?></title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" sizes="16x16 24x24 32x32 48x48 64x64" href="<?php echo base_url("assets/img/favicon/".$pengaturan['favicon']); ?>">

  <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,400,500,700,700i" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.35/css/uikit.min.css?_=1">

  <link rel="stylesheet" href="<?php echo base_url("assets/font-awesome/css/font-awesome.min.css"); ?>">
  <link rel="stylesheet" href="<?php echo base_url("assets/css/public-event.css?v=161020191449"); ?>">
  <link rel="stylesheet" href="<?php echo base_url("assets/css/style.css?v=161020191449"); ?>">

  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
  <link rel="stylesheet" href="<?php echo base_url("assets/css/datepicker.css"); ?>">
  <link rel="stylesheet" href="<?php echo base_url("assets/css/njir.css"); ?>">

</head>
<body>

  <div class="uk-hidden@s" id="floating-name"><?php echo $event['nama_event']; ?></div>

  <div class="event-page">
    <form method="POST">
      <div class="uk-container-small uk-container uk-margin-medium-bottom uk-position-relative uk-margin-large-bottom">

        <div class="container-content uk-flex-center uk-margin-medium-top ">
          <div class="uk-width-1-1 uk-margin-large-bottom">
            <div class="uk-card bordered uk-margin-medium" style="border-radius: 7px; overflow: hidden;">
              <div class="uk-card-media-top">

                <div class="uk-position-relative uk-visible-toogle">
                  <img class="uk-width-1-1" src="<?php echo base_url("assets/img/member/banner/".$event['banner']); ?>" alt="">
                </div>


                <div class="card-bottom uk-margin-medium-left uk-margin-medium-right uk-margin-small-top uk-margin-medium-bottom">

                  <div style="margin-top:15px;" uk-grid>
                    <div class="uk-width-1-1@m">
                      <h2 class="uk-margin-small-bottom uk-margin-small-top" id="gt-event-name"><?php echo $event['nama_event']; ?></h2>
                    </div>
                    <div class="uk-width-1-1@m uk-margin-remove-top">
                      <span class="orange text-medium" id="gt-kategori-name"><?php echo $event['nama_kategori']; ?></span>
                    </div>
                  </div>

                  <hr class="uk-margin-small-top" />

                  <div class="uk-child-width-1-3@m" uk-grid>

                    <!-- diselenggarakan oleh -->
                    <div>

                      <p class="uk-text-bold title-event-info">
                        Diselenggarakan oleh
                      </p>

                      <div class="uk-grid-match uk-grid-small gray" uk-grid>

                        <div class="uk-width-1-3@m uk-width-1-5@s uk-width-1-6 uk-text-small">
                          <div class="uk-text-center org-ava uk-flex uk-flex-middle">
                            <img src="<?php echo base_url("assets/img/member/logo/".$event['logo']); ?>"/>
                          </div>
                        </div>

                        <div class="uk-width-2-3@m uk-width-expand uk-position-relative break-word">
                          <span class="uk-padding-small uk-position-center" id="gt-org-name"><?php echo $event['nama']; ?></span>
                        </div>

                      </div>

                    </div>
                    <!-- diselenggarakan oleh -->

                    <!-- tanggal dan waktu -->
                    <div class="section-info-event">
                      <p class="uk-text-bold title-event-info">Tanggal & Waktu</p>
                      <div class="gray">
                        <div class="uk-margin-small-bottom date-time-button">
                          <span class="fa fa-calendar icon-event-detail icon-event-detail"></span>
                          <?php echo $event['tgl_mulai_acara']; ?> - <?php echo $event['tgl_berakhir_acara']; ?>
                        </div>
                        <div class="uk-margin-small-bottom date-time-button">
                          <span class="fa fa-clock-o icon-event-detail icon-event-detail"></span>
                          <?php echo substr($event['waktu_mulai_acara'], 0,5); ?> - <?php echo substr($event['waktu_berakhir_acara'], 0,5); ?> WIB
                        </div>
                      </div>
                    </div>
                    <!-- tanggal dan waktu -->

                    <!-- lokasi -->
                    <div class="section-info-event">

                      <p class="uk-text-bold title-event-info">
                        Lokasi
                      </p>

                      <div class="gray">
                        <a class="uk-margin-small-bottom uk-link-reset uk-grid-collapse" uk-grid>
                          <div class="uk-width-auto">
                            <span class="fa fa-map-marker icon-event-detail"></span>
                          </div>
                          <div class="uk-width-expand" style="padding-left: 10px;">
                            <span>
                              <?php echo $event['lokasi_acara']; ?>
                            </span>
                          </div>
                        </a>

                      </div>
                    </div>
                    <!-- lokasi -->

                  </div>
                </div>

              </div>
            </div>

            <div class="uk-margin-large-bottom" style="min-height: 300px;">

              <ul class="uk-child-width-expand uk-text-uppercase" id="event-details" uk-tab>
                <li class="uk-active"><a href="#"><span>Deskripsi Event</span></a></li>
                <li ><a href="#"><span>Kategori Tiket</span></a></li>
              </ul>

              <ul class="uk-switcher uk-margin">
                <li class="uk-margin-large-bottom">
                  <div class="description-tab">
                    <?php echo $event['deskripsi_event']; ?>
                  </div>
                </li>

                <li style="margin-bottom: 140px;">
                  <div class="ticket-category uk-grid-collapse uk-child-width-expand@s" uk-grid>

                    <div class="uk-width-auto bordered ticket-barcode uk-position-relative uk-first-column">
                      <img class="uk-responsive-height uk-visible@s" src="<?php echo base_url("assets/img/barcode/barcode-ticket.png"); ?>" alt="dummy-barcode" style="height:100%;">
                    </div>

                    <div class="uk-width-expand ticket-body uk-position-relative">

                      <div class="uk-width-1-1 uk-margin-small-bottom">
                        <div class="uk-h3">
                          <b>Tiket <?php echo $event['nama_tiket']; ?></b>
                        </div>
                      </div>

                      <hr class="uk-margin-remove-top">

                      <div class="uk-width-1-1 uk-grid-small uk-child-width-expand@s" uk-grid>

                        <div class="uk-width-3-5@m">
                          <p class="uk-text-small gray uk-margin-remove-vertical">
                            <?php if ($this->session->flashdata('pesan')): ?>
                              <?php echo $this->session->flashdata('pesan'); ?>
                            <?php endif ?>
                            <span><?php echo $event['deskripsi_tiket']; ?></span>
                          </p>
                          <p class="blue uk-margin-small-top">
                            Berakhir tanggal
                            <span><?php echo $event['tgl_berakhir_order']; ?></span>
                          </p>
                        </div>

                        <div class="uk-width-1-5@m uk-width-auto">
                          <div class="uk-h4 uk-margin-small-top uk-text-center">
                            <b>GRATIS</b>
                          </div>
                        </div>

                        <div class="uk-width-1-5@m uk-width-expand button-qty" style="z-index: 1; padding-right: 20px;">
                          <div class="uk-margin uk-text-right">
                            <div class="uk-inline dropdown-list">

                              <select name="jml_tiket" class="btn-qty uk-button uk-button-default" style="border-radius: 10px; height: 50px;">
                                <?php foreach ($jml_tiket as $key => $value): ?>
                                  <option value="<?php echo $value; ?>" <?php if($event['maks_trans']==$value){echo "selected";} ?>><?php echo $value; ?></option>
                                <?php endforeach ?>
                              </select>

                              <input type="text" name="id_tiket" value="<?php echo $event['id_tiket']; ?>" style="display: none;">
                              <input type="text" name="id_event" value="<?php echo $event['id_event']; ?>" style="display: none;">

                            </div>
                          </div>
                        </div>

                      </div>

                    </div>

                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <div class="footer-action">
        <div class="uk-container uk-padding-small">
          <div uk-grid>

            <div class="uk-width-auto@m uk-width-1-5 uk-text-right uk-visible@s" style="padding-top: 10px; opacity:.5; color: orange;">
              <span class="fa fa-ticket huge-icon"></span>
            </div>

            <div class="uk-width-expand@m uk-width-4-5 uk-visible@s" style="padding-top: 18px;">
              <span class="uk-h3 uk-text-bold"><?php echo $event['nama_tiket']; ?></span><br>
            </div>

            <div class="uk-text-right uk-width-1-4@m uk-margin-remove-top" style="padding-top: 10px;">

              <?php

              $date_now = new DateTime();
              $date2    = new DateTime($event['tgl_berakhir_order']);

              if ($date_now > $date2) 
              {
                echo '<button style="cursor: not-allowed;" class="button-min-width uk-button uk-button-primary rounded-button uk-margin-small-bottom uk-box-shadow-small uk-width-1-1 uk-width-auto@m">Expired</button>';
              }
              else
              {
                echo '<button name="beli_tiket" value="beli_tiket" class="button-min-width uk-button uk-button-primary rounded-button uk-margin-small-bottom uk-box-shadow-small uk-width-1-1 uk-width-auto@m">Beli Tiket</button>';
              }

              ?>

            </div>

          </div>
        </div>

      </div>
    </div>

  </form>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.39/js/uikit.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.39/js/uikit-icons.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="<?php echo base_url("assets/js/moment.js"); ?>" type="text/javascript"></script>
  <script src="<?php echo base_url("assets/js/event-page.min.js?v=161020191350"); ?>" type="text/javascript"></script>

  <script>
      // limit event name on footer
      var eventName = $('#gt-event-name').text();
      var limitEventName = strLimit(eventName, 60);
      $('#event-name-footer').text(limitEventName);

      // fixing iframe gmaps on instagram webview
      $('#modal-location').on({
        'show.uk.modal': function(){
          var dataIframe = $('#iframe-location').data('src');
          $('#iframe-location').attr('src', dataIframe);
        }
      });
    </script>
  </body>
  </html>
