<aside id="sidebar" class="sidebar c-overflow">

  <div class="s-profile text-center profil-bg">

    <div class="image-cropper">
      <img src="<?php echo base_url("assets/admin/img/profil/".$admin['logo']); ?>" alt="Foto Profil" title="<?php echo $admin['nama']; ?>"/>
    </div>

    <div class="sp-info">
      <?php echo $admin['nama']; ?>
    </div>

    <div class="sp-btn">
      <a class="btn bgm-orange waves-effect" href="<?php echo base_url("admin/profil"); ?>">Lihat Profil</a>
    </div>

  </div>

  <!-- start ul -->
  <ul class="main-menu">

    <li class="<?php if($menu=="dashboard"){echo "active";} ?>">
      <a href="<?php echo base_url("admin/dashboard"); ?>"><i class="zmdi zmdi-home"></i> Home</a>
    </li>

    <li class="<?php if($menu=="kategori_event"){echo "active";} ?>">
      <a href="<?php echo base_url("admin/kategori-event"); ?>"><i class="zmdi zmdi-folder"></i> Kategori Event</a>
    </li>

    <li class="<?php if($menu=="respon_pengunjung"){echo "active";} ?>">
      <a href="<?php echo base_url("admin/respon"); ?>"><i class="zmdi zmdi-comments"></i> Respon Pengunjung</a>
    </li>

    <li class="<?php if($menu=="manajemen_member"){echo "active";} ?>">
      <a href="<?php echo base_url("admin/manajemen-member"); ?>"><i class="zmdi zmdi-accounts-list-alt"></i> Manajemen Member</a>
    </li>

    <li class="<?php if($menu=="pengaturan"){echo "active";} ?>">
      <a href="<?php echo base_url("admin/pengaturan"); ?>"><i class="zmdi zmdi-settings"></i> Pengaturan</a>
    </li>

  </ul>

  <ul class="main-menu">
  <?php if ($menu!=="dashboard" AND $menu!=="kategori_event" AND $menu!=="respon_pengunjung" AND $menu!=="manajemen_member" AND !empty($member)): ?>
      <li class="sub-menu">
        <a href="<?php echo base_url("admin/manajemen-member"); ?>" data-ma-action="submenu-toggle"><i class="zmdi zmdi-account" aria-hidden="true"></i><?php echo $member['nama']; ?></a>
        <ul>
          <li class="<?php if($menu=="dokumen_member"){echo "active";} ?>">
            <a href="<?php echo base_url("admin/manajemen-member/dokumen-member/".$id_user); ?>">Dokumen Member</a>
          </li>
          <li class="<?php if($menu=="event_member"){echo "active";} ?>">
            <a href="<?php echo base_url("admin/manajemen-member/event-member/".$id_user); ?>">Event</a>
          </li>
        </ul>
      </li>
    <?php endif ?>
  </ul>

</aside>