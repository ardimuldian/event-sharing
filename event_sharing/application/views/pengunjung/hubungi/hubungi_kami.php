<div class="uk-section uk-light uk-background-cover blog-hero" style="background-color: #39f;">
	<div class="uk-container">
		<div class="uk-width-1-1@m">
			<p class="page-breadcrumb">
				<a href="<?php echo base_url(""); ?>" class="uk-link-reset">Home</a> <i class="fa fa-chevron-left"></i> Hubungi Kami
			</p>
			<h2 class="page-title">Hubungi Kami</h2>
		</div>
	</div>
</div>

<div class="uk-section section-border-bottom">
	<div class="uk-container">
		<div class="uk-grid-divider uk-grid-large uk-margin-medium-top uk-margin-large-bottom" uk-grid>
			<div class="uk-width-3-3">
				<form method="POST">

					<?php if ($this->session->flashdata('alert')): ?>
						<?php echo $this->session->flashdata('alert'); ?>
					<?php endif ?>
					
					<div class="uk-margin" uk-grid>
						<div class="uk-inline uk-width-1-2">
							<label class="uk-form-label">Nama Lengkap<em class="red">*</em></label>
							<input type="text" name="nama_lengkap" class="uk-input" placeholder="Jumiyem">
							<label class="uk-form-label"><em class="red"><?php echo form_error('nama_lengkap'); ?></em></label>
						</div>
						<div class="uk-inline uk-width-1-2">
							<label class="uk-form-label">Email<em class="red">*</em></label>
							<input type="email" name="email" class="uk-input" placeholder="reza@gmail.com">
							<label class="uk-form-label"><em class="red"><?php echo form_error('email'); ?></em></label>
						</div>
					</div>
					<div class="uk-margin">
						<label class="uk-form-label">Pesan Kamu<em class="red">*</em></label>
						<textarea class="uk-textarea" name="pesan_visitor" rows="5" placeholder="Isi pesan anda!"></textarea>
						<label class="uk-form-label"><em class="red"><?php echo form_error('pesan_visitor'); ?></em></label>
					</div>
					<div class="uk-margin-small-top">
						<button name="kirim" value="kirim" class="uk-float-left uk-button uk-button-primary uk-text-uppercase uk-box-shadow-small" style="min-width: 150px;">
							Kirim
						</button>
					</div>
				</form>
			</div>
			<div class="uk-width-3-3">
				<div class="uk-width-3-3">
					<h4 class="heading-light">Atau kamu bisa langsung menghubungi kami melalui <span class="fa fa-whatsapp" style="font-size: 20px; line-height: 1; padding-left: 5px;"></span> Whatsapp, <a href="https://api.whatsapp.com/send?phone=<?php echo $pengaturan['no_wa']; ?>" class="text-orange" target="_blank">Klik di sini.</a> <span class="fa fa-envelope-o" style="font-size: 20px; line-height: 1; padding-left: 5px;"></span> <a href="" target="_blank" class="text-orange"><span class="__cf_email__">info@eventsharing.com</span></a> <span class="fa fa-mobile-phone" style="font-size: 20px; line-height: 1; padding-left: 5px;"></span> <a href="tel:<?php echo $pengaturan['no_wa']; ?>" class="text-orange"><?php echo $pengaturan['no_wa']; ?></a></h4>
				</div>
			</div>
		</div>
	</div>
</div>