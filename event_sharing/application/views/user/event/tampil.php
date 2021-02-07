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
				<a href="<?php echo base_url("member/event-saya"); ?>">Event Saya</a>
			</li>
		</ul>
	</div>

	<?php if (empty($member['nama']) OR empty($member['no_hp']) OR empty($member['logo']) OR empty($member['tentang_kami'])): ?>
		<div>
			<div class="standard-margin">
				<div class="uk-alert-danger uk-margin-remove uk-alert">
					<a class="uk-alert-close uk-hidden uk-close uk-icon">
						<svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg" ratio="1">
						</svg>
					</a> 

					<div class="uk-grid uk-grid-small uk-flex-middle uk-grid-stack">
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

			<div class="uk-width-1-1 tab-mobile uk-grid-margin uk-first-column">
				<ul id="tab-form-detail" class="uk-child-width-1-1@m uk-child-width-1-1 uk-text-uppercase uk-tab">
					
					<li class="uk-active" aria-expanded="true">
						<a href="#event-aktif" class="margin-15 uk-link-rest uk-text-uppercase">
							<span>Event Aktif</span>
						</a>
					</li>

				</ul>
			</div>

			<!-- Kondisi suda ada event aktif atau event baru yang dibuat member -->
			<?php if (!empty($event)): ?>
				<div class="uk-width-1-1 uk-margin-xlarge-bottom uk-grid-margin uk-first-column">

					<?php if ($this->session->flashdata('event')): ?>
						<?php echo $this->session->flashdata('event'); ?>
					<?php endif ?>

					<div uk-height-match="target: > div > a > .card-event-saya" class="uk-grid-medium uk-child-width-1-4@l uk-child-width-1-3@m uk-child-width-1-2@s uk-grid">

						<?php if ($member['status']==1): ?>
							<div class="new-event uk-first-column">
								<a href="<?php echo base_url("buat-event"); ?>" class="uk-link-reset">
									<div class="card card-event-saya uk-flex uk-flex-middle uk-flex-center" style="">
										<div class="link-dusty-orange uk-text-center uk-position-relative uk-width-1-1" style="min-height: 394px;">
											<div class="uk-position-center uk-visible@s">
												<i class="fa fa-plus fa-3x"></i> 
												<p>Buat Event Baru</p>
											</div> 
											<div class="uk-hidden@s">
												<h5 class="uk-margin-remove-bottom orange">
													<i class="icon-loket-add-image uk-margin-small-right"></i> Buat Event Baru
												</h5>
											</div>
										</div>
									</div>
								</a>
							</div>
						<?php elseif ($member['status']==0): ?>
							<div class="new-event uk-first-column">
								<a class="uk-link-reset">
									<div class="card card-event-saya uk-flex uk-flex-middle uk-flex-center" style="">
										<div class="link-dusty-default uk-text-center uk-position-relative uk-width-1-1" style="min-height: 394px;">
											<div class="uk-position-center uk-visible@s">
												<i class="fa fa-info fa-3x"></i> 
												<p>Silahkan tunggu validasi dokumen dari admin untuk buat event</p>
											</div> 
											<div class="uk-hidden@s" style="padding-bottom: 15px;">
												<h5 class="uk-margin-remove-bottom default" style="padding: 15px 0px 0px 0px;">
													<i class="fa fa-info uk-margin-small-right"></i> Silahkan tunggu validasi dokumen dari admin untuk buat event
												</h5>
											</div>
										</div>
									</div>
								</a>
							</div><br>
						<?php endif ?>

						<!-- tab aktif event -->
						<?php foreach ($event as $key => $value): ?>

							<?php $date_now = new DateTime(); $date2 = new DateTime($value['tgl_berakhir_acara']); ?>

							<?php if ($date_now < $date2 AND $member['id_user']==$value['id_user']): ?>
								<div class="fade-in" id="event-aktif">
									<a href="<?php echo base_url("member/event-saya/".$value['url_event']); ?>" class="uk-link-reset">
										<div index="0" class="card card-event-saya uk-box-shadow-hover-medium card-fade" style="min-height: 396px;">
											<div class="card-event-saya-head uk-position-relative">
												<div class="card-bg-head" style="background-image: url(&quot;<?php echo base_url("assets/img/member/banner/".$value['banner']); ?>&quot;);"></div> 
												<img src="<?php echo base_url("assets/img/member/banner/".$value['banner']); ?>" class="uk-position-center"> 
												<div class="on-hover uk-overlay-primary uk-position-cover"></div> 
												<div class="on-hover uk-position-center uk-width-1-1 uk-text-center">
													<button class="uk-button uk-button-primary uk-button-small uk-box-shadow-small">Detil Event</button>
												</div>
											</div> 

											<div class="card-event-saya-body uk-padding-small"> 
												<div class="body-card-top">
													<h2 class="card-event-title uk-margin-remove"><?php echo $value['nama_event']; ?></h2> 
													<div class="orange category-list uk-margin-small-bottom uk-margin-small-top"><?php echo $value['nama_kategori']; ?></div>
												</div> 
												<hr class="uk-margin-remove-top"> 
												<div uk-grid="" class="uk-grid-small uk-grid uk-grid-stack">
													<div class="uk-width-1-1 uk-first-column">
														<div class="event-detail">
															<span class="event-detail-label">Tanggal &amp; Waktu</span> 
															<div uk-grid="" class="uk-grid-collapse event-detail-value uk-grid">
																<div class="uk-width-auto uk-first-column">
																	<i class="fa fa-calendar uk-margin-small-right"></i>
																</div> 
																<div class="uk-width-expand"><?php echo $value['tgl_mulai_acara']; ?> - <?php echo $value['tgl_berakhir_acara']; ?></div>
															</div> 
															<div uk-grid="" class="uk-grid-collapse event-detail-value uk-grid">
																<div class="uk-width-auto uk-first-column">
																	<i class="fa fa-clock-o uk-margin-small-right"></i>
																</div> 
																<div class="uk-width-expand"><?php echo substr($value['waktu_mulai_acara'], 0,5); ?> -  <?php echo substr($value['waktu_berakhir_acara'], 0,5); ?></div>
															</div>
														</div>
													</div> 
													<div class="uk-width-1-1 uk-grid-margin uk-first-column">
														<div class="event-detail">
															<span class="event-detail-label">Lokasi</span> 
															<div uk-grid="" class="uk-grid-collapse event-detail-value uk-grid">
																<div class="uk-width-auto uk-first-column">
																	<i class="fa fa-map-marker uk-margin-small-right"></i>
																</div> 
																<div class="uk-width-expand"><?php echo $value['lokasi_acara']; ?></div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</a>
								</div>
							<?php endif ?>
						<?php endforeach ?>
						<!-- tab aktif event -->

					<?php endif ?>
					<!-- Kondisi suda ada event aktif atau event baru yang dibuat member -->

					<div class="uk-width-1-1 tab-mobile uk-grid-margin uk-first-column">
						<ul id="tab-form-detail" class="uk-child-width-1-1@m uk-child-width-1-1 uk-text-uppercase uk-tab">
							
							<li class="uk-active" aria-expanded="true">
								<a href="#event-lalu" class="margin-15 uk-link-rest uk-text-uppercase">
									<span>Event Lalu</span>
								</a>
							</li>

						</ul>
					</div>

					<!-- Kondisi suda ada event aktif atau event baru yang dibuat member -->
					<?php if (!empty($event)): ?>
						<div class="uk-width-1-1 uk-margin-xlarge-bottom uk-grid-margin uk-first-column">

							
							<div uk-height-match="target: > div > a > .card-event-saya" class="uk-grid-medium uk-child-width-1-4@l uk-child-width-1-3@m uk-child-width-1-2@s uk-grid">

								<!-- tab event lalu -->
								<?php foreach ($event as $key => $value): ?>

									<?php $date_now = new DateTime(); $date2 = new DateTime($value['tgl_berakhir_acara']); ?>

									<?php if ($date_now > $date2 AND $member['id_user']==$value['id_user']): ?>
										<div class="fade-in" id="event-lalu">
											<a href="<?php echo base_url("member/event-saya/".$value['url_event']); ?>" class="uk-link-reset">
												<div index="0" class="card card-event-saya uk-box-shadow-hover-medium card-fade" style="min-height: 396px;">
													<div class="card-event-saya-head uk-position-relative">
														<div class="card-bg-head" style="background-image: url(&quot;<?php echo base_url("assets/img/member/banner/".$value['banner']); ?>&quot;);"></div> 
														<img src="<?php echo base_url("assets/img/member/banner/".$value['banner']); ?>" class="uk-position-center"> 
														<div class="on-hover uk-overlay-primary uk-position-cover"></div> 
														<div class="on-hover uk-position-center uk-width-1-1 uk-text-center">
															<button class="uk-button uk-button-primary uk-button-small uk-box-shadow-small">Detil Event</button>
														</div>
													</div> 

													<div class="card-event-saya-body uk-padding-small"> 
														<div class="body-card-top">
															<h2 class="card-event-title uk-margin-remove"><?php echo $value['nama_event']; ?></h2> 
															<div class="orange category-list uk-margin-small-bottom uk-margin-small-top"><?php echo $value['nama_kategori']; ?></div>
														</div> 
														<hr class="uk-margin-remove-top"> 
														<div uk-grid="" class="uk-grid-small uk-grid uk-grid-stack">
															<div class="uk-width-1-1 uk-first-column">
																<div class="event-detail">
																	<span class="event-detail-label">Tanggal &amp; Waktu</span> 
																	<div uk-grid="" class="uk-grid-collapse event-detail-value uk-grid">
																		<div class="uk-width-auto uk-first-column">
																			<i class="fa fa-calendar uk-margin-small-right"></i>
																		</div> 
																		<div class="uk-width-expand"><?php echo $value['tgl_mulai_acara']; ?> - <?php echo $value['tgl_berakhir_acara']; ?></div>
																	</div> 
																	<div uk-grid="" class="uk-grid-collapse event-detail-value uk-grid">
																		<div class="uk-width-auto uk-first-column">
																			<i class="fa fa-clock-o uk-margin-small-right"></i>
																		</div> 
																		<div class="uk-width-expand"><?php echo substr($value['waktu_mulai_acara'], 0,5); ?> -  <?php echo substr($value['waktu_berakhir_acara'], 0,5); ?></div>
																	</div>
																</div>
															</div> 
															<div class="uk-width-1-1 uk-grid-margin uk-first-column">
																<div class="event-detail">
																	<span class="event-detail-label">Lokasi</span> 
																	<div uk-grid="" class="uk-grid-collapse event-detail-value uk-grid">
																		<div class="uk-width-auto uk-first-column">
																			<i class="fa fa-map-marker uk-margin-small-right"></i>
																		</div> 
																		<div class="uk-width-expand"><?php echo $value['lokasi_acara']; ?></div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</a>
										</div>
									<?php endif ?>
								<?php endforeach ?>
								<!-- tab aktif event -->

							<?php endif ?>
							<!-- Kondisi suda ada event aktif atau event baru yang dibuat member -->

			<!-- <div class="uk-width-1-1 uk-position-bottom uk-padding uk-grid-margin uk-first-column">
			<div uk-grid="" class="uk-grid-small uk-flex-middle uk-margin-large-bottom uk-grid"> -->

					<!-- <div class="uk-width-1-2@s uk-width-1-1 uk-text-center uk-text-left@s uk-first-column" style="">
						<span class="paging-show-option">Tampil:</span> 

						<select class="uk-select uk-form-small paging-select-option">
							<option>7</option> 
							<option>15</option> 
							<option>31</option>
						</select> 

						<span class="paging-total-result uk-margin-small-left">Total Event: 0</span>
					</div>  -->

					<!-- tampil jika sudah ada invoicenya -->
					<!-- <div class="uk-width-1-2@s uk-width-1-1 uk-text-right@s uk-text-center" style="">
						<div class="paging-number">
							<ul class="paging-page-number">
								<li>
									<span href="#" class="active">1</span>
								</li>
							</ul> 
						</div>
					</div> -->
					<!-- tampil jika sudah ada eventnya -->

				</div>
			</div>
		</div>
	</div>

</div>