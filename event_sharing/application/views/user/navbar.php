<div id="content-dashboard" class="uk-width-expand uk-height-viewport uk-position-relative">
	<div>
		<div id="dashboard-top-header" class="top-header top-relative">
			<nav uk-navbar="" class="uk-navbar">
				<div class="uk-navbar-left">
					<ul class="uk-navbar-nav">
						<li><h1 class="page-title"><?php echo ucwords($menu); ?></h1></li>
					</ul>
				</div> 

				<div class="uk-navbar-center">
					<a href="#" class="uk-navbar-item uk-logo uk-padding-remove"></a>
				</div> 

				<div class="uk-navbar-right">
					
					<li style="padding: 10px 10px 0px 0px;">
						<ul class="uk-navbar#/buat-event">
							<a href="<?php echo base_url("buat-event"); ?>" target="_blank" class="uk-button uk-button-primary uk-button-small uk-box-shadow-small gradient-button">
								<span class="uk-text-uppercase">Buat Event</span>
							</a>
						</ul>
					</li> 

					<li>

						<a id="profile-icon" href="#">
							<i class="fa fa-user-o" style="color: #113452;"></i>
						</a> 

						<div id="profile-dropdown" uk-dropdown="pos: top-right; mode: hover;offset: 0;" class="profile-menu-overlay uk-dropdown">
							<ul class="uk-nav uk-dropdown-nav">

								<li>
									<a href="<?php echo base_url("member/profil/informasi-dasar"); ?>">
										<i class="fa fa-user uk-margin-small-right uk-margin-small-left" style="color: #113452;"></i> Profil
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
				</ul>
			</div>
		</nav>
	</div> 

</div>