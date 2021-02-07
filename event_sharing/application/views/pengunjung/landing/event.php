<div class="uk-section uk-section-secondary uk-background-cover event-landing-page-section-hero" data-src="<?php echo base_url("assets/img/background/event_populer/event_populer1.jpg"); ?>" style="background-position: bottom right; background-size: cover;">
  <div class="uk-container">
    <h1 class="section-title uk-text-center uk-text-left@m" style="color:#000000"><b>Event</b></h1>

    <div class="uk-grid" uk-grid>

      <div class="uk-width-1-1 uk-width-1-3@m uk-text-center uk-text-left@m">
        <h4 class="section-subtitle uk-text-center uk-text-left@m" style="color:#000000">Semua Event Sharing</h4>
        <p class="section-description uk-text-center uk-text-left@m" style="color:#000000;">Sebagai penyedia jasa manajemen tiket, <a href="<?php echo base_url(""); ?>" target="_blank" class="uk-link-reset">Event Sharing</a> memberikan solusi teknologi terlengkap di industri entertainment. Kunjungi <a href="<?php echo base_url("tentang-kami"); ?>" target="_blank" class="uk-link-reset">Event Sharing</a> untuk keterangan lebih lengkap. <br><br>Berikut adalah event-event berskala besar yang telah berkolaborasi dengan <a href="#support" class="uk-link-reset">Event Sharing</a>.</p>
        <a href="<?php echo base_url("kategori-event/semua-kategori"); ?>" target="_blank" class="uk-margin-medium-top uk-button uk-visible@m uk-button-primary uk-box-shadow-small">SELENGKAPNYA</a>
      </div>

      <div class="uk-width-1-1 uk-width-2-3@m">
        <div uk-slider>

          <div class="uk-grid-small uk-flex-middle uk-margin-bottom" uk-grid>
            <div class="uk-width-expand"><h2 class="section-subtitle uk-text-center uk-text-left@m" style="color:#000000"><b>Daftar Event</b></h2></div>
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

                <?php if ($date_now < $date2): ?>
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
            <?php endif ?>

          </ul>
        </div>

        <div class="uk-text-center">
          <a href="<?php echo base_url("kategori-event/semua-kategori"); ?>" target="_blank" class="uk-button uk-margin-medium-top uk-hidden@m uk-width-1-1 uk-width-auto@s uk-button-primary uk-box-shadow-small">SELENGKAPNYA</a>
        </div>

      </div>
    </div>
  </div>
</div>
  <!-- event populer -->