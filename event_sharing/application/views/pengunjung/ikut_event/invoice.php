<!DOCTYPE html>
<html>
<head>

  <meta charset="UTF-8">
  <meta name="description" content="<?php echo $pengaturan['meta_description']; ?>">
  <meta name="keywords" content="<?php echo $pengaturan['meta_keyword']; ?>">
  <meta name="author" content="<?php echo $pengaturan['meta_author']; ?>">
  <title>Invoice | Event Sharing</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="icon" sizes="16x16 24x24 32x32 48x48 64x64" href="<?php echo base_url("assets/img/favicon/".$pengaturan['favicon']); ?>">

  <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,400,500,700,700i" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.39/css/uikit.min.css?_=1" />

  <link rel="stylesheet" href="<?php echo base_url("assets/font-awesome/css/font-awesome.min.css"); ?>">
  <link rel="stylesheet" href="<?php echo base_url("assets/css/public-event.css?v=161020191449"); ?>">
  <link rel="stylesheet" href="<?php echo base_url("assets/css/style.css?v=161020191449"); ?>">

  <link rel="stylesheet" href="<?php echo base_url("assets/css/social-sharing.css"); ?>">

</head>

<body>

  <div class="thankyou-page">
    <div class="uk-container uk-margin-medium-bottom uk-position-relative">
      <div class="uk-flex-center uk-margin-medium-top uk-grid uk-grid-stack" uk-grid="">
        <div class="uk-width-5-6@m uk-margin-large-bottom uk-first-column">
          
          <div class="uk-width-1-4 uk-text-left@m uk-text-center">
            
            <a href="<?php echo base_url(""); ?>" class="uk-link-reset">
              <img class="white" src="<?php echo base_url("assets/img/logo/".$pengaturan['logo']); ?>">
              <hr>
            </a>

          </div>

          <div class="uk-width-1-1 uk-text-left@m uk-text-center">
            
            <h2 class="uk-margin-small-bottom">
              Terima kasih atas pesanan kamu
            </h2>

          </div>

          <div class="uk-grid-divider uk-margin-medium uk-grid" uk-grid="">
            <div class="uk-width-3-5@m uk-first-column">
              <div class="">

                <p class="uk-text-left@m uk-text-center">Kamu melakukan pemesanan tiket untuk event:</p>
                
                <div class="uk-card bordered" style="border-radius: 7px; overflow: hidden;">
                  <div class="uk-card-media-top">
                    <div style="margin: 15px 20px;">

                      <div style="margin-top:15px;" uk-grid="" class="uk-grid uk-grid-stack">
                        <div class="uk-width-4-5@m uk-first-column">
                          <a class="uk-link-reset">
                            <h3 class="uk-margin-small-bottom"><?php echo $invoice['nama_event'] ?></h3></a>
                          </div>
                        </div>
                        
                        <hr class="uk-margin-small-top">
                        
                        <div class="uk-grid-collapse uk-grid" uk-grid="">
                          <div class="uk-width-3-5@m uk-first-column">
                            <div class="gray">

                              <div class="uk-grid-collapse uk-grid" uk-grid="">

                                <div class="uk-width-auto uk-first-column">
                                  <span class="fa fa-calendar icon-event-detail"></span>
                                </div>
                                
                                <div class="uk-width-expand uk-margin-small-bottom date-time-button uk-text-small" style="padding-left: 10px;">
                                  <?php echo $invoice['tgl_mulai_acara'] ?> - <?php echo $invoice['tgl_berakhir_acara'] ?>
                                </div>

                              </div>

                              <div class="uk-grid-collapse uk-grid" uk-grid="">

                                <div class="uk-width-auto uk-first-column">
                                  <span class="fa fa-clock-o icon-event-detail"></span>
                                </div>

                                <div class="uk-margin-small-bottom date-time-button uk-text-small" style="padding-left: 10px;">
                                  <?php echo substr($invoice['waktu_mulai_acara'], 0,5); ?> - <?php echo substr($invoice['waktu_berakhir_acara'], 0,5); ?> WIB
                                </div>

                              </div>

                            </div>
                          </div>

                          <div class="uk-width-2-5@m">
                            <div class="gray">

                              <a class="uk-margin-small-bottom uk-link-reset uk-grid-collapse uk-text-small uk-grid" href="#" uk-grid="">

                                <div class="uk-width-auto uk-first-column">
                                  <span class="fa fa-map-marker icon-event-detail"></span>
                                </div>

                                <div class="uk-width-expand" style="padding-left: 10px;">
                                  <span>
                                    <?php echo $invoice['lokasi_acara'] ?>
                                  </span>
                                </div>

                              </a>

                            </div>
                          </div>

                        </div>
                      </div>
                    </div>
                  </div>

                  <p>
                    Silakan cek email kamu <b>(<?php echo $invoice['email'] ?>)</b> untuk mendapatkan tiket yang kamu pesan atau klik tombol di bawah untuk langsung mencetak e-voucher.
                    <br>
                    <form method="POST">
                      <button name="tiket" value="tiket" class="uk-margin uk-button uk-button-primary rounded-button uk-margin-small-bottom uk-box-shadow-small uk-width-auto@m uk-width-1-1">Lihat E-Ticket</button>
                    </form>
                  </p>

                </div>
              </div>

              <!-- social sharing -->
              <div class="social-sharing uk-width-2-5@m">

                <b>Informasi</b>

                <div class="uk-margin-small-top">

                  <p class="line-height-small gray uk-text-small" align="justify">Temukan event menarik lainnya di halaman <a href="<?php echo base_url(""); ?>" class="uk-link-reset link-primary">Event Sharing</a>. <br>
                    Punya event menarik? 
                    <a href="<?php echo base_url("register"); ?>" class="uk-link-reset link-primary">Daftar</a> sebagai member Event Sharing sekarang dan dapatkan kemudahan untuk mengatur dan menjual tiket event kamu.
                  </p>

                  <a href="<?php echo base_url("buat-event"); ?>">
                    <button class="uk-button rounded-button uk-margin-small-bottom uk-box-shadow-small uk-margin-small-right primary-color uk-width-1-1 uk-width-auto@m">
                      BUAT EVENT SEKARANG
                    </button>
                  </a>

                </div>

              </div>
              <!-- social sharing -->

            </div>

          </div>
        </div>
      </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.39/js/uikit.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.39/js/uikit-icons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="<?php echo base_url("assets/js/moment.js"); ?>" type="text/javascript"></script>
    <script src="<?php echo base_url("assets/js/event-page.min.js?v=161020191449"); ?>" type="text/javascript"></script>

  </body>

  </html>