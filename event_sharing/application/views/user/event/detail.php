<div>

	<div class="standard-margin">
		<ul id="breadcrumb">
			<li>
				<a>Kamu di sini</a>
			</li>
			<li>
				<a href="<?php echo base_url("member/event-saya"); ?>">Event Saya</a>
			</li>
			<li>
				<a href="<?php echo base_url("member/event-saya/#aktif-event"); ?>">Aktif Event</a>
			</li>
			<li>
				<a href="<?php echo base_url("#"); ?>"><?php echo ucwords($menu); ?></a>
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

	<form method="POST">
		<div class="page-layout uk-padding-remove-top">

			<?php if ($this->session->flashdata('event')): ?>
				<?php echo $this->session->flashdata('event'); ?>
			<?php endif ?>

			<div class="uk-grid uk-grid-medium uk-grid-stack">
				<div class="uk-width-3-5@m uk-width-1-1@s uk-grid-margin uk-first-column">
					<div class="uk-grid uk-grid-medium uk-grid-stack">
						<div class="uk-width-1-1@m uk-first-column">

							<div class="card card-event-details uk-padding-small">

								<div class="card-event-banner">

									<div class="btn-panel" style="position: absolute; padding: 0px 0px 0px 150px;">
										<?php $date_now = new DateTime(); $date2 = new DateTime($event['tgl_mulai_acara']); ?>
										<?php if ($date_now < $date2): ?>
										<!-- tolong dikasih kondisi publish / unpublish  -->
										<?php if ($event['status']=="Publish"): ?>
											<a href="<?php echo base_url("member/event-saya/unpublish/".$event['url_event']); ?>" class="uk-button uk-button-default" style="border-radius: 3px; padding: 0 10px!important; font-size: .75em; color: #ff4500; margin: 8px 3px; line-height: 26px; font-weight: 500; border:1px solid #ff4500;">
												<span class="fa fa-download"></span> Unpublish
											</a>
										<?php endif ?>
										<?php if ($event['status']=="Not Publish"): ?>
											<a href="<?php echo base_url("member/event-saya/publish/".$event['url_event']); ?>" class="uk-button uk-button-default" style="border-radius: 3px; padding: 0 10px!important; font-size: .75em; color: #ff4500; margin: 8px 3px; line-height: 26px; font-weight: 500; border:1px solid #ff4500;">
												<span class="fa fa-download"></span> Publish
											</a>
										<?php endif ?>
										<!-- tolong dikasih kondisi publish / unpublish  -->

										<!-- edit event -->
										<?php if ($event['status']=="Not Publish"): ?>
											<a href="<?php echo base_url("member/event-saya/edit-event/".$event['url_event']); ?>" class="uk-button uk-button-default" style="border-radius: 3px; padding: 0 10px!important; font-size: .75em; color: #ff4500; margin: 8px 3px; line-height: 26px; font-weight: 500; border:1px solid #ff4500;">
												<span class="fa fa-pencil"></span> Edit Event
											</a> 
										<?php endif ?>
										<!-- edit event -->

										<a href="<?php echo base_url("acara/".$event['url_event']); ?>" target="_blank" class="uk-button uk-button-default" style="border-radius: 3px; padding: 0 10px!important; font-size: .75em; color: #ff4500; margin: 8px 3px; line-height: 26px; font-weight: 500; border:1px solid #ff4500;">
											<span class="fa fa-bullseye"></span> Lihat Event
										</a>
										<?php endif ?>
									</div> 

									<img src="<?php echo base_url("assets/img/member/banner/".$event['banner']); ?>">
								</div>

								<div class="uk-grid uk-grid-small">
									<div class="uk-width-1-3@m uk-width-2-5 uk-first-column">
										<h4 class="card-title">Kategori Event</h4> 
										<div class="card-event-details-description">
											<span><?php echo $event['nama_kategori']; ?></span>
										</div>
									</div> 

									<div class="uk-width-1-3@m uk-width-3-5">
										<h4 class="card-title">Tanggal &amp; Waktu</h4> 
										<div class="card-event-details-description">
											<i class="fa fa-calendar uk-margin-small-right"></i> 
											<span><?php echo $event['tgl_mulai_acara']; ?> - <?php echo $event['tgl_berakhir_acara']; ?></span> 
											<br> 
											<i class="fa fa-clock-o uk-margin-small-right"></i> 
											<span><?php echo substr($event['waktu_mulai_acara'], 0,5); ?> - <?php echo substr($event['waktu_berakhir_acara'], 0,5); ?> WIB</span>
										</div> 
									</div> 

									<div class="uk-width-1-3@m">
										<h4 class="card-title">Lokasi</h4> 
										<div class="card-event-details-description uk-grid-collapse uk-grid">
											<div class="uk-width-auto uk-first-column">
												<i class="fa fa-map-marker uk-margin-small-right"></i>
											</div> 
											<div class="uk-width-expand">
												<span><?php echo $event['lokasi_acara']; ?></span>
											</div>
										</div>
									</div>
								</div>

							</div>
						</div> 

					</div>
				</div>

				<div class="uk-width-2-5@m uk-width-1-1@s uk-grid-margin">
					<div uk-grid="" class="uk-grid uk-grid-medium uk-flex uk-grid-stack">

						<div class="uk-width-1-1@m uk-first-column">
							<div id="card-summary" class="card">
								<ul class="card-sales-transaction">

									<li>
										<div class="uk-grid uk-grid-collapse uk-flex uk-flex-middle">
											<div class="uk-width-auto">
												<div class="card-sales-transaction-icon">
													<i class="fa fa-ticket font-2x" style="color: orange;"></i>
												</div>
											</div> 

											<?php $total=0; ?>

											<?php foreach ($pengunjung as $key => $value): ?>
												<?php 
												$total+=$value['jml_tiket']; 
												?>
											<?php endforeach ?>

											<div class="uk-width-expand">
												<div class="card-sales-transaction-info">
													<span class="card-sales-transaction-label">Tiket Pemesanan</span> 
													<span class="card-sales-transaction-value">
														<?php echo $total; ?>
														<span class="card-sales-transaction-separator">/</span> 

														<span class="card-sales-transaction-additional"><?php echo $event['tiket_disediakan']; ?></span>
													</span>
												</div>
											</div>
										</div>
									</li>

									<li>
										<div class="uk-grid uk-grid-collapse uk-flex uk-flex-middle">
											<div class="uk-width-auto">
												<div class="card-sales-transaction-icon uk-text-center">
													<img src="<?php echo base_url("assets/svg/loket-attendance.svg"); ?>" alt="attendee" width="35">
												</div>
											</div> 
											<div class="uk-width-expand">
												<div class="card-sales-transaction-info">
													<span class="card-sales-transaction-label">Pengunjung</span> 
													<span class="card-sales-transaction-value"><?php echo count($pengunjung); ?></span>
												</div>
											</div>
										</div>
									</li>

								</ul>
							</div>
						</div> 

						<div class="uk-width-1-1@m uk-grid-margin uk-first-column">
							<div class="card card-yellow card-check-in-pengunjung uk-padding-small">
								<div uk-grid="" class="uk-grid uk-grid-small uk-flex-middle uk-grid-stack">
									<div class="uk-width-1-1 uk-first-column">
										<h4 class="card-title">Check-in Pengunjung</h4>
									</div> 
									<div class="uk-width-1-1 uk-margin-remove-top uk-grid-margin uk-first-column">
										<p>Registrasikan pengunjung event kamu melalui menu ini.</p></div> 
										<div class="uk-width-expand uk-hidden">
											<a href="#">
												<i class="fa fa-question-circle-o"></i> Pelajari lebih lanjut
											</a>
										</div> 

										<?php $date_now = new DateTime(); $date2 = new DateTime($event['tgl_mulai_acara']); ?>

										<div class="uk-width-auto uk-grid-margin uk-first-column">
											<?php if ($date_now > $date2): ?>
												<a style="cursor: not-allowed;" class="uk-button uk-button-grey uk-button-small uk-box-shadow-small">Check-in</a>
											<?php else: ?>
												<a href="<?php echo base_url("member/event-saya/check-in/".$event['url_event']); ?>" class="uk-button uk-button-primary uk-button-small uk-box-shadow-small">Check-in</a>
											<?php endif ?>
										</div>
									</div>
								</div>
							</div> 
						</div>
					</div>

					<!-- agdhagd -->

				</div>
			</div>

		</div>
	</form>