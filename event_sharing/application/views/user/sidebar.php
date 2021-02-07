<div id="page-wrapper" class="uk-position-relative">
	<div class="uk-container uk-container-expand uk-padding-remove">
		<div uk-grid="" class="uk-grid-collapse uk-grid">

			<div id="dashboard-sidebar" class="uk-width-auto dashboard-sidebar-expand dark-slate-blue uk-first-column">
				<div uk-sticky="top: 50" class="dashboard-sidebar uk-overflow-auto uk-sticky">
					<a href="<?php echo base_url(""); ?>">
						<div class="sidebar-logo uk-flex uk-flex-middle uk-flex-center uk-visible@s">
							<!----> 

							<img src="<?php echo base_url("assets/img/logo/".$pengaturan['logo']); ?>" alt="Event Sharing" class="logo-img loket-logo full-icon"> 

							<span class="icon-loket-logo-only loket-logo small-icon" style="display: none;"></span>
						</div>
					</a> 

					<div class="nav-list-menu">
						<ul uk-nav="" class="uk-nav-default uk-nav-parent-icon uk-visible@s uk-nav">
							<li class="uk-nav-header">Dashboard</li> 

							<li>
								<a href="<?php echo base_url("member"); ?>" class="<?php if($menu=="home"){echo "router-link-exact-active router-link-active";} ?>">
									<span class="icon-sidebar-menu">
										<i class="fa fa-home uk-margin-small-right"></i>
									</span>
									<span class="menu-label">Home</span>
								</a>
							</li> 

							<li>
								<a href="<?php echo base_url("member/event-saya"); ?>" class="<?php if($menu=="event"){echo "router-link-exact-active router-link-active";} ?>">
									<span class="icon-sidebar-menu">
										<i class="fa fa-envelope-o uk-margin-small-right"></i>
									</span> 

									<span class="menu-label">Event Saya</span>
								</a>
							</li> 

							<li>
								<a href="<?php echo base_url("member/tiket-saya"); ?>" class="<?php if($menu=="tiket"){echo "router-link-exact-active router-link-active";} ?>">
									<span class="icon-sidebar-menu">
										<i class="fa fa-ticket uk-margin-small-right"></i>
									</span> 

									<span class="menu-label">Tiket Saya</span>
								</a>
							</li> 

							<li class="uk-nav-divider"></li>
						</ul>

						<?php if ($menu!=="home" AND $menu!=="event" AND $menu!=="tiket" AND $menu!==$event['nama_event'] AND $menu!=="Data Pemesan" AND $menu!=="Check In"): ?>
							<!-- jika masuk profil -->
							<ul uk-nav="" class="uk-nav-default uk-nav-parent-icon uk-nav">

								<li class="uk-nav-header">Profil Kamu</li> 

								<li>
									<a href="<?php echo base_url("member/profil/informasi-dasar"); ?>" class="<?php if($menu=="profil informasi dasar"){echo "router-link-exact-active router-link-active";} ?>">
										<span class="icon-sidebar-menu">
											<i class="fa fa-user-md uk-margin-small-right"></i>
										</span> 

										<span class="menu-label">Informasi Dasar</span>
									</a>
								</li> 

								<li>
									<a href="<?php echo base_url("member/profil/ubah-password"); ?>" class="<?php if($menu=="profil ubah password"){echo "router-link-exact-active router-link-active";} ?>">
										<span class="icon-sidebar-menu">
											<i class="fa fa-user-secret blue-icon uk-margin-small-right"></i>
										</span> 

										<span class="menu-label">Ubah Password</span>
									</a>
								</li> 

								<li>
									<a href="<?php echo base_url("member/profil/informasi-legal"); ?>" class="<?php if($menu=="profil informasi legal"){echo "router-link-exact-active router-link-active";} ?>">
										<span class="icon-sidebar-menu">
											<i class="fa fa-file-text-o uk-margin-small-right"></i>
										</span> 

										<span class="menu-label">Informasi Legal</span>
									</a>
								</li>

							</ul> 
							<!-- jika masuk profil -->
						<?php endif ?>

						<br>

						<!-- jika masuk event home -->
						<?php if ($menu!=="home" AND $menu!=="event" AND $menu!=="tiket" AND $menu!=="profil ubah password" AND $menu!=="profil informasi legal" AND $menu!=="profil informasi dasar"): ?>
							<ul uk-nav="" class="uk-nav-default uk-nav-parent-icon uk-nav">
								<li>
									<a href="<?php echo base_url("member/event-saya/".$event['url_event']); ?>" class="<?php if($menu==$event['nama_event']){echo "router-link-exact-active router-link-active";} ?>">
										<span class="icon-sidebar-menu hide-on-uncollapse">
											<i class="icon-loket-your-events uk-margin-small-right"></i>
										</span> 
										<span class="menu-label"><?php echo $event['nama_event']; ?></span>
									</a>
								</li> 

								<li>
									<a href="<?php echo base_url("member/event-saya/data-pemesan/".$event['url_event']); ?>" class="<?php if($menu=="Data Pemesan"){echo "router-link-exact-active router-link-active";} ?>">
										<span class="icon-sidebar-menu">
											<i class="fa fa-users uk-margin-small-right"></i>
										</span> 

										<span class="menu-label">Data Pemesan</span>
									</a>
								</li> 

								<li>
									<a href="<?php echo base_url("member/event-saya/check-in/".$event['url_event']); ?>" class="<?php if($menu=="Check In"){echo "router-link-exact-active router-link-active";} ?>">
										<span class="icon-sidebar-menu">
											<i class="fa fa-check-square uk-margin-small-right"></i>
										</span> 

										<span class="menu-label">Check-in</span>
									</a>
								</li> 

							</ul>
							<!-- jika masuk event home -->
						<?php endif ?>

					</div> 

				</div>

				<div class="uk-sticky-placeholder" style="height: 380px; margin: 0px;" hidden=""></div>

			</div>