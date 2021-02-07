<div class="uk-section section-border-bottom" style="padding: 50px 0px 100px 0px;">
	<div class="uk-container">
		
		<h3 class="section-title text-primary uk-text-center uk-text-left@m"><b>Acara</b> Berdasarkan</h3>
		
		<form method="POST">
			<div class="uk-grid" uk-grid="">

				<div class="uk-width-1-1 uk-width-1-3@m uk-visible@m uk-first-column" id="column-event-category">
					<div class="list-category-sticky uk-sticky" uk-sticky="offset:80; bottom: #column-event-category;" style="z-index: 0;">

						<h3 class="section-title text-primary uk-text-center uk-text-left@m title-in-sticky"><b>Kategori</b> Event</h3>

						<div>
							<h5 class=" uk-text-center uk-text-left@m">Menampilkan Kategori</h5>
							<select name="id_kategori55" class="uk-select" style="border-radius: 5px; border-color: orange;">
								<option value="">------- Pilih -------</option>
								<?php foreach ($kategori as $key => $value): ?>
									<option value="<?php echo $value['id_kategori']; ?>"><?php echo $value['nama_kategori']; ?></option>
								<?php endforeach ?>
							</select>
						</div>

						<div style="padding: 15px 0px 0px 0px;">
							<h5 class=" uk-text-center uk-text-left@m">Pada Tanggal Mulai Acara</h5>
							<input type="date" name="tgl_mulai_acara" class="uk-input" style="border-radius: 5px; border-color: orange;">
						</div>

						<div style="padding: 15px 0px 0px 0px;">
							<h5 class=" uk-text-center uk-text-left@m">Pada Tanggal Berakhir Acara</h5>
							<input type="date" name="tgl_berakhir_acara" class="uk-input" style="border-radius: 5px; border-color: orange;">
						</div>

						<div style="padding: 15px 0px 0px 0px;">
							<h5 class=" uk-text-center uk-text-left@m">Lokasi Acara</h5>
							<input type="text" name="lokasi_acara" class="uk-input" style="border-radius: 5px; border-color: orange;" placeholder="Ex: Skandinavia">
						</div>

						<div style="padding: 15px 0px 0px 0px;">
							<button name="cari" value="cari" class="uk-button uk-button-small uk-button-primary" style="border-radius: 5px; border-color: orange; height: 40px; width: 100px;">Cari</button>
						</div>

					</div>

					<div class="uk-sticky-placeholder" style="height: 608px; margin: 0px;" hidden=""></div>

				</div>

				<div class="uk-width-1-1 uk-hidden@m">

					<select name="id_kategori" class="uk-select" style="border-radius: 5px; border-color: orange;">
						<option value="">------- Pilih -------</option>
						<?php foreach ($kategori as $key => $value): ?>
							<option value="<?php echo $value['id_kategori']; ?>"><?php echo $value['nama_kategori']; ?></option>
						<?php endforeach ?>
					</select>

				</div>

				<div class="uk-width-1-1 uk-width-2-3@m">

					<ul class="event-content uk-switcher uk-margin">

						<li class="uk-active" id="<?php echo $value['nama_kategori']; ?>">
							<div class="uk-grid uk-grid-small">
								<?php if (!empty($event)): ?>
									<?php foreach ($event as $key => $value): ?>

										<?php $date_now = new DateTime(); $date2 = new DateTime($value['tgl_berakhir_order']); ?>

										<?php if ($date_now < $date2): ?>

											<div class="uk-width-1-3@m uk-width-1-3@s uk-width-1-3 uk-first-column">
												<a class="card-event uk-link-reset" href="<?php echo base_url("acara/".$value['url_event']); ?>" target="_blank">
													<div class="banner-thumb uk-inline-clip">
														<img class="uk-transition-scale-up uk-transition-opaque" src="<?php echo base_url("assets/img/member/banner/".$value['banner']); ?>">
													</div>

													<div class="card-event-body">
														<h4 class="event-title" title="<?php echo $value['nama_event']; ?>"><?php echo $value['nama_event']; ?></h4>
														<div uk-margin="">
															<span class="event-category uk-first-column">
																<?php echo $value['nama_kategori']; ?>
															</span>
														</div>
														<div class="event-details">
															<span class="detail-name">Tanggal &amp; Waktu</span>
															<span class="detail-value"><i class="fa fa-calendar"></i>
																<?php echo $value['tgl_mulai_acara']; ?> - <?php echo $value['tgl_berakhir_acara']; ?>
															</span>
															<span class="detail-value"><i class="fa fa-clock-o test"></i>
																<?php echo substr($value['waktu_mulai_acara'], 0,5); ?> - <?php echo substr($value['waktu_berakhir_acara'], 0,5); ?> WIB
															</span>
														</div>
														<div class="event-details">
															<span class="detail-name">Lokasi</span>
															<span class="detail-value"><i class="fa fa-map-marker"></i><?php echo $value['lokasi_acara']; ?></span>
														</div>
													</div>

												</a>
											</div>

										<?php endif ?>
									<?php endforeach ?>
								<?php endif ?>
							</div>
						</li>

					</ul>

				</div>

			</form>

		</div>
	</div>
</div>