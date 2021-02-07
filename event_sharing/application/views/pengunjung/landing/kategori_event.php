<!-- kategori event -->
<div class="uk-section animate-section section-border-bottom category-container">
  <div class="uk-container">

    <h3 class="section-title text-primary uk-text-center uk-text-left@m"><b>Kategori</b> Event</h3>
    
    <div class="uk-grid uk-flex-middle" uk-grid>
      <div class="uk-width-2-5@m uk-width-expand">
        <p class="section-title-two uk-text-center uk-text-left@m">Temukan event yang kamu inginkan berdasarkan kategori di sini.</p>
      </div>
      <div class="uk-width-3-5@m uk-width-auto uk-text-right uk-visible@s">
      <a href="<?php echo base_url("kategori-event/semua-kategori"); ?>" target="_blank" class="see-more-link" style="color: #113452;">Lihat Semua Kategori 
          <i class="fa fa-chevron-right"></i>
        </a>
      </div>
    </div>

    <div class="uk-grid" uk-grid>

      <?php foreach ($kategori as $key => $value): ?>
        <div class="animate-section uk-width-1-1 uk-width-1-2@s uk-width-1-3@m uk-grid-margin">
          <a href="<?php echo base_url("kategori-event/".$value['nama_kategori']."/#".$value['nama_kategori']); ?>" target="_blank" class="uk-inline-clip uk-transition-toggle event-category-card">
            <img class="image-onload uk-transition-scale-up uk-transition-opaque uk-dark" data-src="<?php echo base_url("assets/img/kategori/".$value['cover']); ?>" alt="">
            <div class="uk-overlay uk-dark uk-position-cover">
              <div class="uk-position-center">
                <h4 class="event-category-card-title uk-text-center"><?php echo $value['nama_kategori']; ?></h4>
              </div>
            </div>
          </a>
        </div>
      <?php endforeach ?>

    </div>
    <div class="uk-width-3-5@m uk-margin-medium-top uk-width-auto uk-text-center uk-hidden@s">
      <a href="<?php echo base_url("kategori-event/semua-kategori"); ?>" class="see-more-link">Lihat Semua Kategori <i class="fa fa-chevron-right"></i></a>
    </div>
  </div>
</div>
<!-- kategori event -->