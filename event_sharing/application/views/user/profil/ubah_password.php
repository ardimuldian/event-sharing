<div>

	<div class="standard-margin">
		<ul id="breadcrumb">
			<li>
				<a>Kamu di sini</a>
			</li>
			<li>
				<a href="<?php echo base_url("member"); ?>">Home</a>
			</li>
			<li>
				<a href="<?php echo base_url("member/profil/ubah-password"); ?>">Profil - Ubah Password</a>
			</li>
		</ul>
	</div>

	<?php if (empty($member['nama']) OR empty($member['no_hp']) OR empty($member['logo']) OR empty($member['tentang_kami'])): ?>
		<div>
			<div class="standard-margin">
				<div uk-alert="" class="uk-alert-danger uk-margin-remove uk-alert">
					<a uk-close="" class="uk-alert-close uk-hidden uk-close uk-icon">
						<svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg" ratio="1">
						</svg>
					</a> 

					<div uk-grid="" class="uk-grid uk-grid-small uk-flex-middle uk-grid-stack">
						<div class="uk-width-expand uk-first-column">
							<p class="alert-message">

								<i class="fa fa-exclamation-circle uk-margin-small-right"></i>Yuk 

								<span>
									lengkapi 
									<a href="<?php echo base_url("member/profil/informasi-legal"); ?>" class="uk-link-reset link-dusty-orange">
										informasi legal,
									</a>
								</span> 

								<span>
									lengkapi 
									<a href="<?php echo base_url("member/profil/informasi-dasar"); ?>" class="uk-link-reset link-dusty-orange" id="informasi-dasar-alert">
										informasi dasar
									</a>
								</span>

							</p>
						</div>
					</div>

				</div>
			</div> 

		</div>
	<?php endif ?> 

	<div>
		<div class="page-layout uk-padding-remove-top">
			<div uk-grid="" class="uk-grid uk-grid-medium uk-grid-stack">
				<div class="uk-width-1-1 uk-first-column">
					<div class="page-action">
						<div class="uk-grid uk-grid-medium uk-flex-middle">
							<div class="uk-width-1-1 uk-position-relative">
								<a href="<?php echo base_url("member/profil/ubah-password"); ?>" class="uk-link-reset">
									<h2 class="event-title-only">Ubah Password</h2>
								</a>
							</div>
						</div>
					</div>
				</div> 

				<div class="uk-width-1-1 uk-grid-margin uk-first-column">
					<div uk-grid="" class="uk-grid uk-grid-medium uk-flex-center uk-grid-stack">
						<div class="uk-width-3-5@m uk-first-column">
							
							<form method="POST" class="uk-form-stacked dashboard-form">
								
								<?php if ($this->session->flashdata('ubah-password')): ?>
									<?php echo $this->session->flashdata('ubah-password'); ?>
								<?php endif ?>

								<div class="uk-margin-medium">
									<label for="form-stacked-text" class="uk-form-label">Email</label> 

									<div class="uk-form-controls uk-position-relative">
										<input type="text" class="uk-input ubah-email" value="<?php echo $member['email']; ?>" disabled>
									</div>

								</div>

								<div class="uk-margin-medium">
									<label for="form-stacked-text" class="uk-form-label">Password Baru</label> 

									<div class="uk-form-controls">
										<input type="password" name="password" class="uk-input"> 
										<span class="error-message" style="color: rgb(238, 86, 89);"><?php echo form_error('password'); ?></span>
									</div> 

									<p class="uk-margin-remove-top">
										<small>Minimal 5 karakter.</small>
									</p>

								</div>

								<div class="uk-margin-medium">
									<button class="uk-width-1-1 uk-width-auto@m uk-button uk-button-primary uk-button-small uk-box-shadow-small">Simpan Perubahan</button>
								</div>

							</form> 

							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>