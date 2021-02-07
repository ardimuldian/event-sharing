<!doctype html>
<html lang="id-ID">
<head>

  <meta charset="UTF-8">
  <meta name="description" content="<?php echo $pengaturan['meta_description']; ?>">
  <meta name="keywords" content="<?php echo $pengaturan['meta_keyword']; ?>">
  <meta name="author" content="<?php echo $pengaturan['meta_author']; ?>">
  <title></title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" sizes="16x16 24x24 32x32 48x48 64x64" href="<?php echo base_url("assets/img/favicon/".$pengaturan['favicon']); ?>">

  <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,400,500,700,700i" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.39/css/uikit.min.css?_=1" />

  <link rel="stylesheet" href="<?php echo base_url("assets/font-awesome/css/font-awesome.min.css"); ?>">
  <link rel="stylesheet" href="<?php echo base_url("assets/css/public-event.css?v=161020191449"); ?>">
  <link rel="stylesheet" href="<?php echo base_url("assets/css/style.css?v=161020191449"); ?>">

  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
  <link rel="stylesheet" href="<?php echo base_url("assets/css/datepicker.css"); ?>">
  <link rel="stylesheet" href="<?php echo base_url("assets/css/njir.css"); ?>">

  <style type="text/css">
    .isDisabled {
      color: currentColor;
      cursor: not-allowed;
      opacity: 0.5;
      text-decoration: none;
    }
  </style>

</head>
<body>

  <div class="personal-information">
    <div class="uk-container-small uk-container uk-margin-medium-bottom uk-position-relative">
      <div class="uk-flex-center uk-margin-medium-top">
        <div class="uk-width-1-1 uk-margin-large-bottom">
          <div class="uk-card bordered uk-margin-medium" style="border-radius: 7px; overflow: hidden;">
            <div class="uk-card-media-top">

              <div class="card-bottom container-content uk-margin-medium-left uk-margin-medium-right uk-margin-small-top uk-margin-medium-bottom">

                <div style="margin-top:15px;" uk-grid="" class="uk-grid uk-grid-stack">

                  <div class="uk-width-1-1@m uk-first-column">
                    <h2 class="uk-margin-small-bottom uk-margin-small-top"><?php echo $event['nama_event']; ?></h2>
                  </div>

                  <div class="uk-width-1-1@m uk-margin-remove-top uk-grid-margin uk-first-column">
                    <span class="orange text-medium"><?php echo $event['nama_kategori']; ?></span>
                  </div>

                </div>

                <hr>

                <div class="uk-child-width-1-3@m uk-grid" uk-grid="">

                  <div class="uk-first-column">

                    <p class="uk-text-bold title-event-info">Diselenggarakan oleh</p>

                    <div class="uk-grid-match uk-grid-small gray uk-grid" uk-grid="">

                      <div class="uk-width-1-3@m uk-width-1-5@s uk-width-1-6 uk-text-small uk-first-column">
                        <div class="uk-text-center org-ava uk-flex uk-flex-middle">
                          <img src="<?php echo base_url("assets/img/member/logo/teamit-logo1.png"); ?>">
                        </div>
                      </div>

                      <div class="uk-width-2-3@m uk-width-expand uk-position-relative break-word">
                        <span class="uk-padding-small uk-position-center"><?php echo $event['nama']; ?></span>
                      </div>

                    </div>

                  </div>

                  <div class="section-info-event">

                    <p class="uk-text-bold title-event-info">Tanggal &amp; Waktu</p>

                    <div class="gray">

                      <div class="uk-margin-small-bottom date-time-button">
                        <span class="fa fa-calendar icon-event-detail" style="color: black;"></span>
                        <?php echo $event['tgl_mulai_acara']; ?> - <?php echo $event['tgl_berakhir_acara']; ?>
                      </div>
                      <div class="uk-margin-small-bottom date-time-button">
                        <span class="fa fa-clock-o icon-event-detail"></span>
                        01:05 - 04:05 WIB</div>
                      </div>
                    </div>

                    <div class="section-info-event">
                      <p class="uk-text-bold title-event-info">Lokasi
                      </p>

                      <div class="gray">

                        <a class="uk-margin-small-bottom uk-link-reset uk-grid-collapse uk-grid" uk-grid="">

                          <div class="uk-width-auto uk-first-column">
                            <span class="fa fa-marker-map icon-event-detail"></span>
                          </div>

                          <div class="uk-width-expand">
                            <span>
                              <?php echo $event['lokasi_acara']; ?>
                            </span>
                          </div>

                        </a>
                      </div>
                    </div>

                  </div>
                </div>

              </div>
            </div>

            <div class="uk-card bordered border-yellow uk-margin-medium uk-grid-collapse uk-grid" style="border-radius: 7px; overflow: hidden;" uk-grid="">
              <div class="uk-width-1-6@m uk-width-1-4 yellow-bg uk-padding-small uk-text-center uk-first-column">
                <span class="count-down" id="timer"></span>
              </div>
              <div class="uk-width-5-6@m uk-width-3-4 uk-position-relative">
                <span class="uk-position-center-left count-down-notes" id="ulang">Selesaikan pesanan kamu segera</span>
              </div>
            </div>


            <form method="POST">
              <div class="personal-info-form uk-margin">

                <div class="light uk-h3">
                  Informasi Personal
                </div>

                <div class="uk-child-width-2-2@m uk-grid" uk-grid="">
                  <div class="uk-first-column">

                    <div class="uk-margin">

                    <input type="text" name="id_tiket" value="<?php echo $event['id_tiket']; ?>" style="display: none;">
                    <input type="text" name="id_user" value="<?php echo $event['id_user']; ?>" style="display: none;">

                      <label class="uk-form-label" for="form-stacked-text">Nama Lengkap</label><em class="required">*</em>

                      <div class="uk-form-controls">
                        <div class="uk-inline uk-width-1-1">
                          <input class="uk-input" type="text" id="namalengkap" name="firstname" value="<?php echo $nama_user; ?>">
                        </div>
                      </div>

                    </div>

                    <div class="uk-margin">

                      <label class="uk-form-label" for="form-stacked-text">Email</label><em class="required">*</em>

                      <div class="uk-form-controls">
                        <div class="uk-inline uk-width-1-1">
                          <input class="uk-input email" type="email" name="email" id="email" value="<?php echo $email_user; ?>">
                          <strong class="f-12" style="color: red;"><?php echo form_error('email'); ?></strong>
                        </div>
                        <span class="input-notes gray light">E-tiket akan dikirim ke email kamu.</span>
                      </div>

                    </div>
                  </div>

                </div>

              </div>

              <div class="uk-text-right">
                <!-- kondisi jika waktu belum timeout -->
              <!-- <a href="<?php echo base_url("invoice"); ?>" class="button-min-width uk-margin uk-button uk-button-primary rounded-button uk-margin-small-bottom uk-box-shadow-small uk-width-auto@m uk-width-1-1" id="tombol">
                DAPATKAN TIKET
              </a> -->
              <!-- kondisi jika waktu belum timeout -->

              <!-- kondisi jika waktu timeout nanti datta simpan session untuk nampilin ke innvoice-->
              <button name="input_tiket" value="input_tiket" class="button-min-width uk-button uk-button-primary rounded-button uk-margin-small-bottom uk-box-shadow-small uk-width-1-1 uk-width-auto@m">Dapatkan Tiket</button>
              <!-- kondisi jika waktu timeout -->
            </div>

          </form>

        </div>
      </div>
    </div>

  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.35/js/uikit.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.35/js/uikit-icons.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="<?php echo base_url("assets/js/moment.js"); ?>" type="text/javascript"></script>
  <script src="<?php echo base_url("assets/js/datepicker.js"); ?>"></script>
  <script src="<?php echo base_url("assets/js/custom-form.min.js?v=161020191449"); ?>" type="text/javascript"></script>

  <script type="text/javascript">
    $(document).ready(function() 
    {
      var detik = 59;
      var menit = 04;

      function hitung() 
      {
        setTimeout(hitung,1000);
        document.getElementById("timer").innerHTML = menit + ' : ' + detik;
        detik --;
        if(detik < 0) 
        {
          detik = 59;
          menit --;
          document.getElementById("timer").innerHTML = 'EXPIRED';

          if(menit < 0) 
          {
            menit = 0;
            detik = 0;
            document.getElementById("timer").innerHTML = 'EXPIRED';
            document.getElementById("ulang").innerHTML = 'Silahkan Refresh halaman ini jika ingin melanjutkan pesananmu segera!';
            document.getElementById("namalengkap").disabled = true;
            document.getElementById("email").disabled = true;
            document.getElementById("tombol").style.cursor = "not-allowed";
          }

        }
      }

      hitung();
    });
  </script>

  <script type="text/javascript">

    $(document).ready(function() {
      // remove error on input and textarea
      $('body').on('keyup', '.uk-input, .uk-select', function() {
        var val = $(this).val();
        if(val) {
          $(this).siblings('small').hide();
        } else {
          $(this).siblings('small').show();
        }
      });
      
      // remove error on radio and checkbox
      $('.radio-container, .checkbox-container').each(function() {
        var name = $(this).attr('id');
        var $selector = $(`input[name='${name}']`);
        
        $selector.change(function() {
          var flag = $(`input[name='${name}']:checked`).val()
          if (!flag) {
            $(`#${name} .error`).show();
          } else {
            $(`#${name} .error`).hide();
          }
        });
      });

      // // scroll to form
      // $("html, body").delay(500).animate({scrollTop: $('.time-countdown').offset().top }, 1000);
    })

    $('[data-toggle="datepicker"]').datepicker();
  </script>

  <script src="<?php echo base_url("assets/js/event-page.min.js?v=161020191449"); ?>" type="text/javascript"></script>
</body>
</html>
