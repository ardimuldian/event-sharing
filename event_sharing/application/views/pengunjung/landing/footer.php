<!-- footer -->
<div class="main-footer">
  <div class="section-border-bottom">
    <div class="uk-container">
      <div class="uk-grid uk-margin-small-top uk-flex-center" uk-grid>
        <div class="uk-width-expand@m uk-width-1-1 uk-text-center uk-text-left@m">
          <ul class="menu-footer uk-text-center uk-text-left@m uk-padding-remove-horizontal">
            <li><a href="<?php echo base_url("tentang-kami"); ?>">Tentang Kami</a></li>
            <li><a href="<?php echo base_url("kebijakan-privasi"); ?>">Kebijakan Privasi</a></li>
            <li><a href="<?php echo base_url("hubungi-kami"); ?>">Hubungi Kami</a></li>
          </ul>
          <p class="section-title-two uk-margin-remove-top uk-text-center uk-text-left@m" style="font-size: 18px;">
            <a href="<?php echo $pengaturan['facebook']; ?>" class="uk-link-reset" style="padding-right: 2px;"><span class="fa fa-facebook"></span></a>
            <a href="<?php echo $pengaturan['instagram']; ?>" class="uk-link-reset" style="padding-right: 2px;"><span class="fa fa-instagram"></span></a>
            <a href="<?php echo $pengaturan['twitter']; ?>" class="uk-link-reset" style="padding-right: 2px;"><span class="fa fa-twitter"></span></a>
            <a href="<?php echo $pengaturan['youtube']; ?>" class="uk-link-reset" style="padding-right: 2px;"><span class="fa fa-youtube"></span></a>
          </p>
          <p class="section-title-two uk-margin-remove-top uk-text-center uk-text-left@m" style="font-size: 12px;"><?php echo $pengaturan['copyright']; ?></p>
        </div>
        <div class="uk-width-1-1 uk-width-auto@m">
          <h3 class="section-title uk-margin-remove uk-text-center uk-text-left@m"><b>Kamu mau bikin event besar ?</b></h3>
          <p class="section-title-two uk-margin-remove-top uk-text-center uk-text-left@m">Eventmu layak untuk didaftarkan di Event Sharing.</p>
          <a href="<?php echo base_url("buat-event"); ?>" class="uk-button uk-button-primary uk-text-uppercase uk-box-shadow-small gradient-button uk-width-auto@m uk-width-1-1">Buat Event Sekarang</a>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- footer -->

<script>
  $(document).ready(function() {
    var el = $('.main-nav-open-menu');
    var mobileMainNav = $('.main-icon-open-menu');
    var elMainNavWrapper = $('.main-nav');
    var bodyWrapper = $('body');
    var openMenu = $('.open-menu');
    var closeMenu = $('.close-menu');

    el.click(function() {
      $('html, body').animate({ scrollTop: 0 }, 'slow');
      if (elMainNavWrapper.hasClass('main-on-active')) {
        elMainNavWrapper.removeClass('main-on-active');
        $('.main-nav-open-menu').text('Menu');
        $('.secondary-menu').show();
      } else {
        elMainNavWrapper.addClass('main-on-active');
        $('.main-nav-open-menu').text('Kembali')
        $('.secondary-menu').hide();
      }

      if (bodyWrapper.hasClass('main-on-active')) {
        bodyWrapper.removeClass('main-on-active');
      } else {
        bodyWrapper.addClass('main-on-active');
      }
      return false;
    });

    mobileMainNav.click(function(){
      $('html, body').animate({ scrollTop: 0 }, 'slow');
      if (elMainNavWrapper.hasClass('main-on-active')) {
        elMainNavWrapper.removeClass('main-on-active');
        $('#search-article').show();
        $('.secondary-menu').show();
      } else {
        elMainNavWrapper.addClass('main-on-active');
        $('#search-article').hide();
        $('.secondary-menu').hide();
      }

      if (bodyWrapper.hasClass('main-on-active')) {
        bodyWrapper.removeClass('main-on-active');
      } else {
        bodyWrapper.addClass('main-on-active');
      }
      return false;
    });

    openMenu.click(function() {
      UIkit.modal('#modal-menu').show();
    });

    closeMenu.click(function() {
      UIkit.modal('#modal-menu').hide();
    });


    // lazy load modal
    function showImage(element, style, attr) {
      var image = $(element).attr('data-src');
      if (attr) {
        $(element).attr(style, image);
      } else {
        $(element).css(style, 'url(' + image + ')');
      }
    };

    $.fn.isInViewport = function() {
      var elementTop = $(this).offset().top;
      var elementBottom = elementTop + $(this).outerHeight();

      var viewportTop = $(window).scrollTop();
      var viewportBottom = viewportTop + $(window).height();

      return elementBottom > viewportTop && elementTop < viewportBottom;
    };

  })
</script>

<script>
  var el = $('.close-search');
  el.click(function(){
    UIkit.modal('#search-modal').hide();
  });
</script>

<script src="<?php echo base_url("assets/js/uikit.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/js/uikit-icons.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/js/jquery.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/js/moment.js"); ?>"></script>
<script src="<?php echo base_url("assets/js/lazy-load-event-page.min.js?v=111020191905"); ?>"></script>

</body>
</html>