<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Buat Event | Bikin Event Gratis & Atur Acaramu Sendiri</title>

	<link rel="icon" sizes="16x16 24x24 32x32 48x48 64x64" href="<?php echo base_url("assets/img/favicon/".$pengaturan['favicon']); ?>">

	<link rel="stylesheet" href="<?php echo base_url("assets/css/uikit.loket-self-service.min.css?_=1"); ?>">

	<link rel="stylesheet" href="<?php echo base_url("assets/css/app.css?v=151020192341"); ?>">
	<link rel="stylesheet" href="<?php echo base_url("assets/css/gm_style.css"); ?>">
	<link rel="stylesheet" href="<?php echo base_url("assets/css/daterangepicker.css"); ?>">
	<link rel="stylesheet" href="<?php echo base_url("assets/css/uk_notification.css"); ?>">
	<link rel="stylesheet" href="<?php echo base_url("assets/css/notification_alert.css"); ?>">
	<link rel="stylesheet" href="<?php echo base_url("assets/css/lss_navwhite.css"); ?>">
	<link rel="stylesheet" href="<?php echo base_url("assets/css/modal_tour.css"); ?>">
	<link rel="stylesheet" href="<?php echo base_url("assets/css/icon_event_detail.css"); ?>">
	<link rel="stylesheet" href="<?php echo base_url("assets/css/pass.css"); ?>">
	<link rel="stylesheet" href="<?php echo base_url("assets/css/icon_add.css"); ?>">
	<link rel="stylesheet" href="<?php echo base_url("assets/css/modal_upload_image.css"); ?>">
	<link rel="stylesheet" href="<?php echo base_url("assets/css/modal_category.css"); ?>">
	<link rel="stylesheet" href="<?php echo base_url("assets/css/modal_event_date_time.css"); ?>">
	<link rel="stylesheet" href="<?php echo base_url("assets/css/title_additional_setting.css"); ?>">
	<link rel="stylesheet" href="<?php echo base_url("assets/css/footer_action.css"); ?>">

	<script src="<?php echo base_url("assets/ajax/libs/croppie.js"); ?>"></script>

	<link rel="stylesheet" href="<?php echo base_url("assets/font-awesome/css/font-awesome.min.css"); ?>">

	<link rel="stylesheet" href="<?php echo base_url("assets/css/croppie.css"); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/csstableselection.css/"); ?>">

	<script src="<?php echo base_url("assets/ajax/libs/uikit.min.js"); ?>"></script>
	<script src="<?php echo base_url("assets/ajax/libs/uikit-icons.min.js"); ?>"></script>
	<script src="<?php echo base_url("assets/ajax/libs/jquery.min.js"); ?>"></script>
	<style>.cke{visibility:hidden;}</style>

	<script type="text/javascript" src="<?php echo base_url("assets/js/config.js?t=HBDD"); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url("assets/js/en.js?t=HBDD"); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url("assets/js/styles.js?t=HBDD"); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url("assets/js/jquery.oembed.min.js?t=HBDD"); ?>"></script>

</head>

<body style="">

	<div class="uk-position-relative">
		<div class="header-nav-top main-nav lss-navwhite uk-box-shadow-small">
			<div class="uk-container lss-navbar uk-animation-fade">
				<nav class="uk-navbar-container uk-navbar-transparent navbar-blue-mobile uk-navbar">
					<div class="uk-navbar-left">
						<ul class="uk-navbar-nav">
							<li>
								<a href="<?php echo base_url(""); ?>">
									<img src="<?php echo base_url("assets/img/logo/".$pengaturan['logo']); ?>" alt="" class="logo-img">
								</a>
							</li>
							<li class="uk-visible@m">

							</li>
						</ul>   
					</div>
					<div class="uk-navbar-right">
						<ul class="uk-navbar-nav">
							<li class="uk-visible@m">
								<a href="<?php echo base_url(""); ?>" uk-toggle>Kembali</a>
							</li>
						</ul>
					</div>
					<div class="uk-navbar-right uk-hidden@m">
						<ul class="uk-navbar-nav">
							<li>
								<a href="<?php echo base_url(""); ?>">Kembali</a>
							</li>
						</ul>
					</div>
				</nav>
			</div>

			<div class="uk-container uk-animation-slide-top uk-hidden">
				<nav class="uk-width-1-1 uk-navbar">
					<div class="uk-navbar-left uk-margin-small-bottom uk-margin-small-top uk-text-middle" style="padding: 0px 20px;">
						<a href="<?php echo base_url(""); ?>" class="uk-link-reset">
							<img src="<?php echo base_url("assets/img/logo/logo.png"); ?>" class="logo-img loket-logo full-icon">
						</a>
						<span class="header-info gray">Buat Event Page</span>
					</div>
					<div class="k-navbar-right">
						<ul class="uk-navbar-nav">
							<li class="uk-text-bold">
								<a href="<?php echo base_url(""); ?>">Kembali</a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</div>

		<br><br>

		<div class="create-event lss-body-content" style="">
			<div  class="uk-container uk-container-small lss-event-card-padding-margin">
				<form method="POST" enctype="multipart/form-data">
					<div class="uk-grid uk-grid-stack">
						<div  class="uk-width-1-1 uk-first-column">
							<div  class="lss-event-card">

								<!-- banner upload gambar -->
								<div  class="lss-event-card-banner">
									<div  uk-slideshow="min-height: 150; max-height: 421" class="uk-position-relative uk-visible-toggle uk-slideshow">
										<ul  class="uk-slideshow-items" style="height: 421px;">
											<li  class="uk-active uk-transition-active" style="transform: translateX(0px);">
												<div  class="uk-position-relative">
													<img src="<?php echo base_url("assets/img/banner/banner.jpg"); ?>" class="uk-width-1-1" id="img-upload"> 
													<div  class="uk-position-center uk-text-center uk-width-3-5@m">
														<div class="upload" style="color: white;">
															<div  class="uk-text-center js-upload-0">
																<div class="uk-form-custom">
																	<input type="file" name="banner" id="imgInp"> 
																	<span class="fa fa-plus lss-label-upload-icon" style="font-size: 50px;"></span>
																</div> 
																<div>
																	<h3 style="color: white;" class="lss-label-upload">Unggah gambar/poster/banner</h3> 
																	<p class="lss-label-upload-desc">Direkomendasikan 724 x 340px dan tidak lebih dari 2Mb</p>
																	<?php echo form_error('banner','<a class="uk-text-center">','</a>'); ?>
																</div>
															</div>
														</div>
													</div> 
												</div>
											</li>
										</ul>
									</div>
								</div>
								<!-- banner upload gambar -->

								<br>

								<div class="lss-event-card-body">
									<div class="uk-grid-small uk-grid">

										<input type="text" style="display: none;" name="id_user" value="<?php echo $member['id_user']; ?>">

										<!-- nama event -->
										<div class="uk-width-1-1 uk-first-column">
											<input type="text" name="nama_event" placeholder="Nama Event*" class="uk-input lss-input-event-name">
											<?php echo form_error('nama_event','<a class="uk-text-center">','</a>'); ?>
										</div>
										<!-- nama event -->

										<!-- kategori event -->
										<div class="uk-width-1-1 uk-first-column" style="padding-top: 10px;">
											<div class="uk-width-1-1 uk-width-1-1@m">
												<label for="form-stacked-text" class="uk-form-label">Pilih Kategori</label>
												<div class="uk-form-controls">
													<div class="uk-grid-collapse uk-child-width-1-12 uk-grid uk-grid-stack">
														<div>
															<select class="uk-select" name="id_kategori">
																<option>-------- Pilih --------</option>
																<?php foreach ($kategori as $key => $value): ?>
																	<option value="<?php echo $value['id_kategori']; ?>"><?php echo $value['nama_kategori']; ?></option>
																<?php endforeach ?>
															</select>
															<?php echo form_error('id_kategori','<a class="uk-text-center">','</a>'); ?>
														</div>
													</div>
												</div>
											</div>
										</div>
										<!-- kategori event -->

										<!-- diselenggarakan oleh -->
										<div class="uk-width-1-1 uk-width-1-3@m uk-grid-margin uk-first-column" style="padding-top: 10px;">

											<label class="uk-form-label uk-display-block uk-margin-small-bottom">Diselenggarakan Oleh</label> 

											<div class="uk-grid-small uk-flex-middle uk-grid">

												<!-- logo -->
												<div class="uk-width-1-3@m uk-width-auto uk-text-small uk-first-column">
													<div class="bordered uk-text-center upload-logo js-upload-organization uk-form-custom" style="padding: 17px 15px; border-radius: 7px;">
														<?php if (empty($member['logo']) AND !$this->session->userdata('member')): ?>
															<input type="file" id="fileItem" name="logo"> 
															<span class="fa fa-upload" style="font-size: 18px;"></span>
															<br>
															<span style="font-size: 12px;">Logo</span>
														<?php endif ?>
														<?php if (!empty($member['logo']) AND $this->session->userdata('member')): ?>
															<img height="150" src="<?php echo base_url("assets/img/member/logo/".$member['logo']); ?>" readonly> 
														<?php endif ?>
													</div> 
												</div> 

												<!-- nama organizer -->
												<div class="uk-width-expand">
													<?php if (empty($member['logo']) AND !$this->session->userdata('member')): ?>
														<input placeholder="Nama Organizer" name="nama" class="uk-input lss-input-organization-name">
													<?php endif ?>
													<?php if (!empty($member['logo']) AND $this->session->userdata('member')): ?>
														<input name="nama" class="uk-input lss-input-organization-name" value="<?php echo $member['nama']; ?>" readonly>
													<?php endif ?>
												</div>

											</div>
										</div>
										<!-- diselenggarakan oleh --> 

										<!-- Tanggal Mulai Acara -->
										<div class="uk-width-1-1 uk-width-1-3@m uk-grid-margin uk-first-column" style="padding-top: 10px;">

											<label class="uk-form-label uk-display-block uk-margin-small-bottom">Tanggal Mulai Acara</label> 

											<div class="uk-grid-small uk-flex-middle uk-grid" style="padding: 18px 0px 0px 0px;">

												<div class="uk-form-controls">
													<div class="uk-inline uk-width-1-1">
														<input type="date" name="tgl_mulai_acara" class="uk-input">
														<?php echo form_error('tgl_mulai_acara','<a class="uk-text-center">','</a>'); ?>
													</div>
												</div>

											</div>
										</div>
										<!-- Tanggal Mulai Acara -->

										<!-- Tanggal Berakhir Acara -->
										<div class="uk-width-1-1 uk-width-1-3@m uk-grid-margin uk-first-column" style="padding-top: 10px;">

											<label class="uk-form-label uk-display-block uk-margin-small-bottom">Tanggal Berakhir Acara</label> 

											<div class="uk-grid-small uk-flex-middle uk-grid" style="padding: 18px 0px 0px 0px;">

												<div class="uk-form-controls">
													<div class="uk-inline uk-width-1-1">
														<input type="date" name="tgl_berakhir_acara" class="uk-input">
														<?php echo form_error('tgl_berakhir_acara','<a class="uk-text-center">','</a>'); ?>
													</div>
												</div>

											</div>
										</div>
										<!-- Tanggal Berakhir Acara -->

										<!-- Waktu Mulai Acara -->
										<div class="uk-width-1-1 uk-width-1-3@m uk-grid-margin uk-first-column" style="padding-top: 10px;">

											<label class="uk-form-label uk-display-block uk-margin-small-bottom">Waktu Mulai Acara</label> 

											<div class="uk-grid-small uk-flex-middle uk-grid" style="padding: 18px 0px 0px 0px;">

												<div class="uk-form-controls">
													<div class="uk-inline uk-width-1-1">
														<input type="time" name="waktu_mulai_acara" style="width:100px; border:0px dotted #f30; border-radius:4px; -moz-border-radius:4px;height:20px; font-family:Garamond; margin-left:10px; color: black; font-size: 18px;">
														<?php echo form_error('waktu_mulai_acara','<a class="uk-text-center">','</a>'); ?>
													</div>
												</div>

											</div>
										</div>
										<!-- Tanggal Mulai Acara -->

										<!-- Waktu Berakhir Acara -->
										<div class="uk-width-1-1 uk-width-1-3@m uk-grid-margin uk-first-column" style="padding-top: 10px;">

											<label class="uk-form-label uk-display-block uk-margin-small-bottom">Waktu Berakhir Acara</label> 

											<div class="uk-grid-small uk-flex-middle uk-grid" style="padding: 18px 0px 0px 0px;">

												<div class="uk-form-controls">
													<div class="uk-inline uk-width-1-1">
														<input type="time" name="waktu_berakhir_acara" style="width:100px; border:0px dotted #f30; border-radius:4px; -moz-border-radius:4px;height:20px; font-family:Garamond; margin-left:10px; color: black; font-size: 18px;">
														<?php echo form_error('waktu_berakhir_acara','<a class="uk-text-center">','</a>'); ?>
													</div>
												</div>

											</div>
										</div>
										<!-- Waktu Berakhir Acara --> 

										<!-- Lokasi Acara -->
										<div class="uk-width-1-1 uk-width-1-3@m uk-grid-margin uk-first-column" style="padding-top: 10px;">

											<label class="uk-form-label uk-display-block uk-margin-small-bottom">Lokasi Acara</label> 

											<div class="uk-grid-small uk-flex-middle uk-grid" style="padding: 18px 0px 0px 0px;">

												<div class="uk-form-controls">
													<div class="uk-inline uk-width-1-1">
														<input type="text" name="lokasi_acara" class="uk-input" placeholder="Skandinavia">
														<?php echo form_error('lokasi_acara','<a class="uk-text-center">','</a>'); ?>
													</div>
												</div>

											</div>
										</div>
										<!-- Lokasi Acara -->

										<!-- Tiket -->
										<div class="uk-width-1-1 uk-first-column" style="padding-top: 20px;">
											<div class="uk-width-1-1 uk-width-1-1@m">

												<div class="title-additional-setting">
													<span class="uk-form-label uk-margin-small-bottom">Tiket</span>
												</div>

												<br>

												<div class="uk-grid-collapse dx-ticket-category uk-margin-bottom uk-grid">
													<div class="uk-width-auto dx-ticket-barcode uk-first-column">
														<img src="<?php echo base_url("assets/img/barcode/barcode-ticket.png"); ?>" alt="dummy-barcode" class="uk-responsive-height uk-visible@m" style="height: 100%;">
													</div> 

													<div class="uk-width-expand dx-ticket-body">
														<div class="uk-grid-small uk-flex-middle uk-grid">
															<!-- nama tiket -->
															<div class="uk-width-1-1 uk-first-column">
																<input type="text" name="nama_tiket" placeholder="Isi nama tiket" class="uk-input lss-input-event-name"> 
																<?php echo form_error('nama_tiket','<a class="uk-text-center">','</a>'); ?>
															</div>
															<!-- nama tiket -->

															<div class="uk-width-1-1 uk-grid-margin uk-first-column">
																<hr class="dx-divider"></div> 

																<div class="uk-width-1-1 uk-width-expand@m uk-grid-margin uk-first-column">
																	<!-- deskripsi singkat tiket -->
																	<p class="ticket-category-description uk-visible@m">
																		<input name="deskripsi_tiket" class="uk-textarea lss-input-organization-name" placeholder="Isi deskripsi tiket">
																		<?php echo form_error('deskripsi_tiket','<a class="uk-text-center">','</a>'); ?>
																	</p> 
																	<!-- deskripsi singkat tiket -->
																</div>
															</div>

															<div class="uk-grid-small uk-flex-middle uk-grid">

																<!-- tanggal mulai order -->
																<div class="uk-width-1-1 uk-width-1-3@m uk-grid-margin uk-first-column">
																	<div class="uk-form-controls">
																		<label class="uk-form-label uk-display-block uk-margin-small-bottom">Tanggal Mulai Order</label>
																		<input type="date" name="tgl_mulai_order" class="uk-input">
																		<?php echo form_error('tgl_mulai_order','<a class="uk-text-center">','</a>'); ?>
																	</div>
																</div>
																<!-- tanggal mulai order -->

																<!-- tanggal berakhir order -->
																<div class="uk-width-1-1 uk-width-1-3@m uk-grid-margin uk-first-column">
																	<div class="uk-form-controls">
																		<label class="uk-form-label uk-display-block uk-margin-small-bottom">Tanggal Berakhir Order</label>
																		<input type="date" name="tgl_berakhir_order" class="uk-input">
																		<?php echo form_error('tgl_berakhir_order','<a class="uk-text-center">','</a>'); ?>
																	</div>
																</div>
																<!-- tanggal berakhir order -->

																<!-- tiket yang disediakan -->
																<div class="uk-width-1-1 uk-width-1-3@m uk-grid-margin uk-first-column">
																	<div class="uk-form-controls">
																		<label class="uk-form-label uk-display-block uk-margin-small-bottom">Tiket Yang Disediakan</label>
																		<input type="number" name="tiket_disediakan" class="uk-input" placeholder="100 Tiket">
																		<?php echo form_error('tiket_disediakan','<a class="uk-text-center">','</a>'); ?>
																	</div>
																</div>
																<!-- tiket yang disediakan -->
															</div>

														</div>
													</div>

												</div>
											</div>
											<!-- tiket -->

											<!-- deskripsi -->
											<div class="uk-width-1-1 uk-first-column">
												<div class="uk-width-1-1 uk-width-1-1@m">

													<div class="title-additional-setting">
														<span class="uk-form-label uk-margin-small-bottom">Deskripsi</span>
													</div>

													<br>

													<textarea class="ckeditor" id="ckeditor" name="deskripsi_event" rows="2"></textarea>
													<?php echo form_error('deskripsi_event','<a class="uk-text-center">','</a>'); ?>

												</div>
											</div>
											<!-- deskripsi -->

											<!-- pengaturan tambahan -->
											<div class="uk-width-1-1 uk-first-column" style="padding-top: 18px;">
												<div class="uk-width-1-1 uk-width-1-1@m">

													<div class="title-additional-setting">
														<span class="uk-form-label uk-margin-small-bottom">Pengaturan Tambahan</span>
													</div> 

													<hr>

													<div class="uk-child-width-1-2@m uk-margin-top uk-grid">
														<div class="uk-margin-small-top uk-first-column">
															<div style="border-radius: 5px; background-color: #fbfbfb; padding: 15px; font-size: 14px; line-height: 28px;">
																<div class="uk-grid-small uk-grid">
																	<div class="uk-width-expand uk-first-column" style="font-size: 12px;">1 akun email - 1 kali transaksi
																	</div> 

																	<div class="uk-width-auto">
																		<div class="button-switch">
																			<input type="checkbox" name="1_email_1_trans" value="Ya">
																			<?php echo form_error('1_email_1_trans','<a class="uk-text-center">','</a>'); ?>
																		</div>
																	</div>

																</div>
															</div>
														</div> 

														<div class="uk-margin-small-top">
															<div style="border-radius: 5px; background-color: #fbfbfb; padding: 15px; font-size: 14px; line-height: 28px;">
																<div uk-grid="" class="uk-grid-small uk-grid">
																	<div class="uk-width-3-5@m uk-position-relative" style="font-size: 12px;">Jumlah maksimal tiket per transaksi
																	</div> 

																	<div class="uk-width-2-5@m uk-position-relative">
																		<select id="startHour" class="uk-select" name="maks_trans">
																			<option>-------- Pilih --------</option>
																			<option value="1">1</option>
																			<option value="2">2</option>
																			<option value="3">3</option>
																			<option value="4">4</option>
																			<option value="5">5</option>
																		</select>
																		<?php echo form_error('maks_trans','<a class="uk-text-center">','</a>'); ?>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<!-- pengaturan tambahan -->

											</div>
										</div>

									</div>
								</div>
							</div>
						</div>
					</div> 

					<!-- footer -->
					<div class="lss-footer-action">
						<div class="uk-container">
							<div uk-grid="" class="uk-flex-middle uk-grid">

								<div class="uk-width-1-1 uk-width-expand@m uk-visible@m uk-first-column">
									<h3 class="lss-footer-action-title">
										Yeay! 
										<span class="lss-footer-action-desc">Tinggal klik buat event sekarang dan kamu berhasil membuat.</span>
									</h3>
								</div> 

								<div class="uk-width-1-1 uk-width-auto@m">
									<div uk-grid="" class="uk-grid-small uk-grid">
										<div class="uk-width-expand uk-width-auto@m">
											<button name="simpan_event" value="simpan_event" class="uk-button uk-button-primary uk-box-shadow-small lss-action-footer-btn uk-width-1-1 uk-position-relative gradient-button">
												<span>Buat Event Sekarang</span>
											</button>
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>
					<!-- footer -->

				</div>
			</form>

			<!-- Javascript untuk membaca dan menampilkan foto -->
			<script type="text/javascript">
				$(document).ready( function() {
					$(document).on('change', '.btn-file :file', function() {
						var input = $(this),
						label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
						input.trigger('fileselect', [label]);
					});

					$('.btn-file :file').on('fileselect', function(event, label) {

						var input = $(this).parents('.input-group').find(':text'),
						log = label;

						if( input.length ) {
							input.val(log);
						} else {
							if( log ) alert(log);
						}

					});

					function readURL(input) {
						if (input.files && input.files[0]) {
							var reader = new FileReader();

							reader.onload = function (e) {
								$('#img-upload').attr('src', e.target.result);
							}

							reader.readAsDataURL(input.files[0]);
						}
					}

					$("#imgInp").change(function(){
						readURL(this);
					});

				});
			</script>
			<!-- Javascript untuk membaca dan menampilkan foto -->

			<script src="<?php echo base_url("assets/js/croppie.min.js"); ?>"></script>

			<!-- CKEditor -->
			<script src="<?php echo base_url("assets/ckeditor/ckeditor.js"); ?> "></script>

		</body>
		</html>