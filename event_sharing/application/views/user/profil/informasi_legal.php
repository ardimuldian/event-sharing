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
				<a href="<?php echo base_url("member/profil/informasi-legal"); ?>">Profil - Informasi Legal</a>
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

	<div>
		<div class="page-layout uk-padding-remove-top">
			<div uk-grid="" class="uk-grid uk-grid-medium uk-grid-stack">
				<div class="uk-width-1-1 uk-first-column">
					<div class="page-action">
						<div class="uk-grid uk-grid-medium uk-flex-middle">
							<div class="uk-width-1-1 uk-position-relative">
								<a href="#" class="uk-link-reset">
									<h2 class="event-title-only">Informasi Legal</h2>
								</a>
							</div>
						</div>
					</div>
				</div> 

				<div class="uk-width-1-1 uk-grid-margin uk-first-column">
					<div uk-grid="" class="uk-grid uk-grid-medium uk-flex-center uk-grid-stack">
						<div class="uk-width-3-5@m uk-first-column">
							
							<!-- notifikasi -->
							<?php if ($this->session->flashdata('informasi-legal')): ?>
								<?php echo $this->session->flashdata('informasi-legal'); ?>
							<?php endif ?>
							<!-- notifikasi  -->

							<form method="POST" enctype="multipart/form-data">
								<div id="dokumen-legal-accordion">
									
									<h4 class="dokumen-title">
										Dokumen - KTP
										
										<?php if (empty($member['status'])): ?>
											<span class="uk-margin-small-left" style="color: rgb(238, 86, 89);">Belum Diverifikasi</span>
										<?php endif ?>

									</h4> 

									<ul uk-accordion="multiple: false" id="legal-doc-accordion" class="uk-accordion">
										<li class="uk-open">

											<div class="uk-accordion-content uk-padding-small dashboard-form" aria-hidden="false">
												<div uk-grid="" class="uk-grid-medium uk-grid">
													<div class="uk-width-2-2@m uk-first-column">
														
														<div class="image-upload-placeholder js-upload uk-placeholder uk-text-center">
															
															<div class="edit-file">
																<span class="icon-loket-edit-event-menu"></span>
																<br>
																<span>KTP</span>
															</div>

															<?php if (empty($member['dokumen_ktp'])): ?>
																<img src="<?php echo base_url("assets/img/member/svg/icon-ktp.svg"); ?>" alt="ktp" id="img-upload"> 
															<?php elseif (!empty($member['dokumen_ktp'])): ?>
																<img src="<?php echo base_url("assets/img/member/dokumen/".$member['dokumen_ktp']); ?>" alt="ktp">
															<?php endif ?>

															<br>

															<div uk-form-custom="" class="uk-margin-small-top uk-form-custom">
																<span class="upload-link-click">Dokumen KTP</span>
																<br>

																<?php if (empty($member['dokumen_ktp'])): ?>
																	<span class="upload-link-click" style="color: red;">Belum Ada</span>
																<?php elseif (!empty($member['dokumen_ktp'])): ?>
																	<span class="upload-link-click" style="color: red;"><?php echo $member['dokumen_ktp']; ?></span>
																<?php endif ?>

															</div>

														</div> 

														<div class="uk-margin">
															
															<label for="form-stacked-text" class="uk-form-label">
																Nomor KTP
																<em>*</em>
															</label> 

															<div class="uk-form-controls">
																<div class="uk-inline uk-width-1-1">
																	<input type="text" placeholder="Masukkan 16 digit nomor KTP di sini" class="uk-input" name="no_ktp" value="<?php echo $member['no_ktp']; ?>">
																	<span class="error-message" style="color: rgb(238, 86, 89);"><?php echo form_error('no_ktp'); ?></span>
																</div>
															</div>

														</div> 

														<div class="uk-margin">
															
															<label for="form-stacked-text" class="uk-form-label">
																Nama (sesuai KTP)
																<em>*</em>
															</label> 

															<div class="uk-form-controls">
																<div class="uk-inline uk-width-1-1">
																	<input type="text" class="uk-input" name="nama_ktp" value="<?php echo $member['nama_ktp']; ?>">
																</div>
															</div>

															<span class="error-message" style="color: rgb(238, 86, 89);"><?php echo form_error('nama_ktp'); ?></span>

														</div> 

														<div class="uk-margin">
															
															<label for="form-stacked-text" class="uk-form-label">
																Alamat (sesuai KTP)
																<em>*</em>
															</label> 

															<div class="uk-form-controls">
																<div class="uk-inline uk-width-1-1">
																	<input type="text" class="uk-input" name="alamat_ktp" value="<?php echo $member['alamat_ktp']; ?>"> 
																</div>
															</div>

															<span class="error-message" style="color: rgb(238, 86, 89);"><?php echo form_error('alamat_ktp'); ?></span>

														</div>														

														<div class="uk-margin">
															
															<label for="form-stacked-text" class="uk-form-label">
																Unggah Dokumen KTP
																<em>*</em>
															</label> 

															<div class="uk-form-controls">
																<div class="uk-inline uk-width-1-1">
																	<input type="file" name="dokumen_ktp" accept="image/*" class="uk-input" value="<?php echo $member['dokumen_ktp']; ?>" id="imgInp">
																	<span class="error-message" style="color: rgb(238, 86, 89);"><?php echo form_error('dokumen_ktp'); ?></span>
																</div>
															</div>

															<p align="justify">
																<span style="font-size: 13px;">Pastikan kamu menggunggah dokumen ktp kamu berupa foto karena akan diverifikasi oleh admin. Kami merekomendasikan size gambar max. 2048 KB.</span>
															</p>

														</div>

													</div>

												</div>
											</div>
										</li>

									</ul> 

									<p class="upload-notes uk-margin-bottom">Harap perhatikan kesesuaian identitas pada KTP.</p> 

									<div uk-grid="" class="uk-grid-collapse uk-grid">
										<div class="uk-width-auto uk-first-column">
											<input spellcheck="false" type="checkbox" id="agree-checkbox" class="uk-checkbox uk-margin-small-right"></div> 

											<div class="uk-width-expand">
												<p class="upload-notes uk-margin-bottom" align="justify">
													<label for="agree-checkbox">Dengan ini saya menyatakan dengan sesungguhnya bahwa semua informasi yang disampaikan dalam seluruh lampiran-lampirannya ini adalah benar adanya. Apabila ditemukan dan atau dibuktikan adanya kesalahan/penipuan/pemalsuan atas informasi yang saya sampaikan Event Sharing dibebaskan dari setiap akibat dari penggunaan data/dokumen tersebut.</label>
												</p>
											</div>
										</div> 

										<hr class="uk-margin-small-top"> 
										<p class="upload-notes uk-margin-bottom">
											Dokumen yang sudah diunggah hanya dapat diubah dengan cara menghubungi tim kami.
											<a href="telp:0895380719756" class="link-dusty-orange">0895380719756.</a>
										</p>
									</div> 

									<button class="uk-button uk-button-small uk-box-shadow-small uk-width-1-1 uk-width-auto@m uk-button-primary">
										<span>Kirim Dokumen</span> 
									</button> 

									<!---->
								</form> 

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>

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