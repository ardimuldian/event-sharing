<link rel="stylesheet" href="<?php echo base_url("assets/css/app.css?v=151020192341"); ?>">

<style type="text/css">
	.ts-event-name-container 
	{
		line-height: 1.2em;
		word-break: break-word;
		margin-bottom: 10px;
	}
	.ts-tag-green 
	{
		background-color: #2caa8e;
	}
	.ts-tag 
	{
		font-size: 11px;
		padding: 8px 20px;
		border-radius: 2.5px;
		color: #fff;
		margin-right: 10px;
	}
	.ts-event-name-container span 
	{
		vertical-align: middle;
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
				<a href="<?php echo base_url("member/tiket-saya"); ?>">Tiket Saya</a>
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

	<div class="page-layout uk-padding-remove-top">
		<div class="uk-grid uk-grid-medium uk-grid-stack">
			
			<div class="uk-width-1-1 uk-first-column">
				<div id="tiket-saya-wrapper">
					<div class="uk-width-1-1">
						
						<ul id="tab-form-detail" class="uk-child-width-1-1@m uk-text-uppercase uk-tab">
							<li aria-expanded="true" class="uk-active">
								<a href="#event-berjalan">Tiket Berjalan</a>
							</li> 
						</ul> 

						<!-- Kondisi suda ada event aktif atau event baru yang dibuat member -->
						<?php if (!empty($tiket)): ?>
							<?php foreach ($tiket as $key => $value): ?>
								<?php $date_now = new DateTime(); $date2 = new DateTime($value['event']['tgl_berakhir_acara']); ?>

								<?php if ($date_now < $date2 AND $member['id_user']==$value['id_user'] AND $value['status_cek_in']==1): ?>
									<div class="uk-margin" id="event-berjalan">
										<div class="container-content">
											<div class="uk-width-1-1 uk-margin-bottom">
												<div class="uk-grid-collapse dx-ticket-category uk-grid">
													<div class="uk-width-auto dx-ticket-barcode uk-first-column">
														<img src="http://localhost/Proyek1/event_sharing/assets/img/barcode/barcode-ticket.png" alt="dummy-barcode" class="uk-responsive-height uk-visible@m" style="height: 100%;">
													</div>

													<div class="uk-width-expand dx-ticket-body">
														<div class="uk-grid-small uk-grid">
															<div class="uk-width-expand uk-first-column">
																<h3 class="ts-event-name-container uk-grid-collapse uk-width-1-1 uk-grid">
																	<div class="uk-width-auto@m uk-width-1-1 uk-first-column">
																		<span class="ts-tag ts-paid-tag uk-text-uppercase ts-tag-green">Free</span>
																	</div> 

																	<div class="uk-width-expand@m uk-width-1-1">
																		<span class="ts-event-name"><?php echo $value['nama_tiket']; ?></span>
																	</div>
																</h3> 
																<div>
																	<hr class="uk-margin-small-bottom"></div> 
																	<div class="uk-width-1-1 uk-margin-small-bottom">
																		<p class="text-gray uk-margin-remove uk-text-small">
																			<span><?php echo $value['deskripsi_tiket']; ?></span>
																			<br><span><?php echo $value['event']['tgl_mulai_acara']; ?> <?php echo substr($value['event']['waktu_mulai_acara'], 0,5); ?> - <?php echo $value['event']['tgl_berakhir_acara']; ?> <?php echo substr($value['event']['waktu_berakhir_acara'], 0,5); ?></span>
																			<br><span>Jumlah Tiket <?php echo $value['jml_tiket']; ?></span>
																		</p>
																	</div> 

																	<div>
																		<a href="<?php echo base_url("member/tiket-saya/cetak-tiket/".$value['email']); ?>" target="_blank" class="uk-button uk-button-secondary uk-button-small uk-box-shadow-small ts-button uk-margin-small-right">
																			<span class="uk-text-uppercase">E-Tiket</span>
																		</a>
																	</div>
																</div> 

																<div class="uk-width-1-4 uk-visible@s">
																	<img src="<?php echo base_url("assets/img/member/banner/".$value['event']['banner']); ?>" alt="IOT Pada Revolusi Industri 5.0">
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>  

										</div>
									</div>
								<?php endif ?>
							<?php endforeach ?>
						<?php endif ?>
					</div>

				</div>
			</div>

			<div class="uk-width-1-1 uk-first-column">
				<div id="tiket-saya-wrapper">
					<div class="uk-width-1-1">

						<ul id="tab-form-detail" class="uk-child-width-1-1@m uk-text-uppercase uk-tab">
							<li aria-expanded="true" class="uk-active">
								<a href="#event-lalu">Tiket Lalu</a>
							</li> 
						</ul> 

						<!-- Kondisi suda ada event aktif atau event baru yang dibuat member -->
						<?php if (!empty($tiket)): ?>
							<?php foreach ($tiket as $key => $value): ?>
								<?php $date_now = new DateTime(); $date2 = new DateTime($value['event']['tgl_berakhir_acara']); ?>

								<?php if ($date_now > $date2 AND $member['id_user']==$value['id_user'] AND $value['status_cek_in']==1): ?>
									<div class="uk-margin" id="event-lalu">
										<div class="container-content">
											<div class="uk-width-1-1 uk-margin-bottom">
												<div class="uk-grid-collapse dx-ticket-category uk-grid">
													<div class="uk-width-auto dx-ticket-barcode uk-first-column">
														<img src="http://localhost/Proyek1/event_sharing/assets/img/barcode/barcode-ticket.png" alt="dummy-barcode" class="uk-responsive-height uk-visible@m" style="height: 100%;">
													</div>

													<div class="uk-width-expand dx-ticket-body">
														<div class="uk-grid-small uk-grid">
															<div class="uk-width-expand uk-first-column">
																<h3 class="ts-event-name-container uk-grid-collapse uk-width-1-1 uk-grid">
																	<div class="uk-width-auto@m uk-width-1-1 uk-first-column">
																		<span class="ts-tag ts-paid-tag uk-text-uppercase ts-tag-green">Free</span>
																	</div> 

																	<div class="uk-width-expand@m uk-width-1-1">
																		<span class="ts-event-name"><?php echo $value['nama_tiket']; ?></span>
																	</div>
																</h3> 
																<div>
																	<hr class="uk-margin-small-bottom"></div> 
																	<div class="uk-width-1-1 uk-margin-small-bottom">
																		<p class="text-gray uk-margin-remove uk-text-small">
																			<span><?php echo $value['deskripsi_tiket']; ?></span>
																			<br><span><?php echo $value['event']['tgl_mulai_acara']; ?> <?php echo substr($value['event']['waktu_mulai_acara'], 0,5); ?> - <?php echo $value['event']['tgl_berakhir_acara']; ?> <?php echo substr($value['event']['waktu_berakhir_acara'], 0,5); ?></span>
																			<br><span>Jumlah Tiket <?php echo $value['jml_tiket']; ?></span>
																		</p>
																	</div> 

																	<div>
																		<a href="<?php echo base_url("member/tiket-saya/cetak-tiket/".$value['email']); ?>" target="_blank" class="uk-button uk-button-secondary uk-button-small uk-box-shadow-small ts-button uk-margin-small-right">
																			<span class="uk-text-uppercase">E-Tiket</span>
																		</a>
																	</div>
																</div> 

																<div class="uk-width-1-4 uk-visible@s">
																	<img src="<?php echo base_url("assets/img/member/banner/".$value['event']['banner']); ?>" alt="IOT Pada Revolusi Industri 5.0">
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>  

										</div>
									</div>
								<?php endif ?>
							<?php endforeach ?>
						<?php endif ?>

					</div>

				</div>
			</div>

		</div>