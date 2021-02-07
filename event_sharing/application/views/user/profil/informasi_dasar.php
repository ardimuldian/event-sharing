<style type="text/css">
	.uk-alert-success
	{
		background-color: #E0FFFF;
	}
</style>

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
				<a href="<?php echo base_url("member/profil/informasi-dasar"); ?>">Profil - Informasi Dasar</a>
			</li>
		</ul>
	</div>

	<?php if (empty($member['nama']) OR empty($member['no_hp']) OR empty($member['logo']) OR empty($member['tentang_kami']) OR empty($member['no_ktp']) OR empty($member['nama_ktp']) OR empty($member['alamat_ktp']) OR empty($member['dokumen_ktp'])): ?>
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

								<?php if (empty($member['nama']) OR empty($member['no_hp']) OR empty($member['logo']) OR empty($member['tentang_kami'])): ?>
									<span>
										lengkapi 
										<a href="<?php echo base_url("member/profil/informasi-dasar"); ?>" class="uk-link-reset link-dusty-orange" id="informasi-dasar-alert">
											informasi dasar
										</a>
									</span>
								<?php endif ?>

								<?php if (empty($member['no_ktp']) OR empty($member['nama_ktp']) OR empty($member['alamat_ktp']) OR empty($member['dokumen_ktp'])): ?>
								<span>
									lengkapi 
									<a href="<?php echo base_url("member/profil/informasi-legal"); ?>" class="uk-link-reset link-dusty-orange">
										informasi legal,
									</a>
								</span>
								<?php endif ?> 

							</p>
						</div>
					</div>

				</div>
			</div> 

		</div>
	<?php endif ?> 

	<?php if ($this->session->flashdata('informasi-dasar')): ?>
		<?php echo $this->session->flashdata('informasi-dasar'); ?>
	<?php endif ?>

	<div>
		<div class="page-layout uk-padding-remove-top">
			<div uk-grid="" class="uk-grid uk-grid-medium">
				<div class="uk-width-1-1 uk-first-column">
					<div class="page-action">
						<div class="uk-grid uk-grid-medium uk-flex-middle">
							<div class="uk-width-1-1 uk-position-relative">
								<a href="<?php echo base_url("member/profil/informasi-dasar"); ?>" class="uk-link-reset">
									<h2 class="event-title-only">Informasi Dasar</h2>
								</a>
							</div>
						</div>
					</div>
				</div> 

				<div class="uk-width-auto@m uk-grid-margin uk-first-column">
					<div class="informasi-dasar-left">
						<div class="uk-text-small">

							<?php if (empty($member['logo'])): ?>
								<div class="image-upload-placeholder js-upload uk-placeholder uk-text-center" style="padding: 17px 15px; border-radius: 7px; height: 75px;">
									<img width="67" alt="" src="<?php echo base_url("assets/img/member/logo/logo.png"); ?>"> 
								</div> 
							<?php elseif (!empty($member['logo'])): ?>
								<div class="image-upload-placeholder js-upload uk-placeholder uk-text-center" style="padding: 17px 15px; border-radius: 7px; height: 75px;">
								<img height="100" alt="" src="<?php echo base_url("assets/img/member/logo/".$member['logo']); ?>"> 
								</div>
							<?php endif ?>


						</div>
					</div> 

					<div class="uk-margin-small-top informasi-dasar-left-text">
						<p class="text-gray">Pastikan kamu menggunggah foto kamu atau logo organizer kamu karena akan ditampilkan di halaman event kamu. Kami merekomendasikan gambar 350x88, max. 500KB.</p> 

						<div>
							<h6 class="uk-margin-remove-left uk-padding-small uk-padding-remove-top uk-padding-remove-left uk-padding-remove-bottom uk-padding-remove-right" style="margin: 15px 0px 5px;">
								<b>Tipe Akun</b>
							</h6> 

							<h6 class="uk-margin-remove">Perorangan</h6>
						</div>
					</div>
				</div> 

				<div class="uk-width-expand uk-grid-margin">

					<form method="POST" enctype="multipart/form-data" class="uk-form-stacked dashboard-form">
						
						<div class="uk-margin-medium">
							
							<label for="form-stacked-name" class="uk-form-label">
								Nama Organizer
								<em>*</em>
							</label>

							<div class="uk-form-controls">
								<input type="text" class="uk-input" name="nama" value="<?php echo $member['nama']; ?>"> 
								<span class="error-message" style="color: red;"><?php echo form_error('nama'); ?></span>
							</div> 

							<p class="uk-margin-remove-top">
								<small>Nama kamu akan ditampilkan sebagai Nama Penyelenggara di halaman event kamu.</small>
							</p>

						</div> 

						<div class="uk-margin-medium">
							
							<label for="form-stacked-telephone" class="uk-form-label">
								Nomor Handphone
								<em>*</em>
							</label> 

							<div class="uk-form-controls">
								<input type="tel" class="uk-input nomor-handphone" name="no_hp" value="<?php echo $member['no_hp']; ?>"> 
								<span class="error-message" style="color: red;"><?php echo form_error('no_hp'); ?></span>
							</div>

						</div> 

						<div class="uk-margin-medium">
							<label for="form-stacked-telephone" class="uk-form-label">
								Logo
								<em>*</em>
							</label> 

							<div class="uk-form-controls">
								<input type="file" name="logo" class="uk-input" value="<?php echo $member['logo']; ?>">
								<span class="error-message" style="color: red;"><?php echo form_error('logo'); ?></span>
							</div>
						</div>

						<div class="uk-margin-medium">
							<label for="form-stacked-address" class="uk-form-label">Tentang Kami</label> 

							<div class="uk-form-controls">
								<input type="text" maxlength="250" class="uk-input" name="tentang_kami" value="<?php echo $member['tentang_kami']; ?>"> 
								<span class="error-message" style="color: red;"><?php echo form_error('tentang_kami'); ?></span>
							</div>
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