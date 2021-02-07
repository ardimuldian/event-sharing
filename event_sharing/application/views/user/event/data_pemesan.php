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
				<a href="<?php echo base_url("member/event-saya/detail"); ?>"><?php echo ucwords($menu); ?> - <?php echo $event['nama_event']; ?></a>
			</li>
			<li>
				<a href="<?php echo base_url("member/event-saya/check-in"); ?>">Check In</a>
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

			<div class="uk-width-1-1 uk-grid-margin uk-first-column">
				<div>
					<div class="uk-grid-medium uk-margin-xlarge-bottom uk-grid uk-grid-stack">
						<form method="POST">
						<div class="uk-width-3-1 uk-first-column">
							<div class="uk-grid uk-grid-medium dashboard-form uk-grid-stack">
								<div class="uk-width-1-1@m uk-first-column uk-margin-right">
									<button name="cetak_data_pemesan" value="cetak_data_pemesan" class="uk-button button-download uk-button-small uk-box-shadow-small" style="border: solid 1px #e86b36;">
											<span class="uk-text-uppercase" style="opacity: 1; color: #ff4500;">
												<img src="<?php echo base_url("assets/svg/loket-download.svg"); ?>" alt="icon" class="uk-margin-small-right">Laporan Data Pemesan
											</span> 
									</button>
								</div>
							</div>
						</div> 
						</form>

						<div class="uk-width-1-1" style="padding-top: 30px;">
							<?php if (!empty($pengunjung)): ?>
								<div class="uk-width-1-1">
									<div class="table-body-wrapper uk-overflow-auto uk-inline uk-width-1-1">
										<table id="table-checkin" class="uk-table uk-table-middle uk-table-striped uk-margin-remove">
											<thead>
												<tr>
													<th>
														<b>Nama Pemesan</b>
													</th> 
													<th>
														<b>Email</b>
													</th> 
													<th>
														<b>No Tiket</b>
													</th> 
													<th>
														<b>Nama Event</b>
													</th> 
													<th>
														<b>Kuantitas</b>
													</th>
													<th>
														<b>Status</b>
													</th>
												</tr>
											</thead> 

											<tbody class="uk-overflow-auto table-laporan-penjualan-main-body">
												<!-- jika sudah ada data pemesan -->
												<?php foreach ($pengunjung as $key => $value): ?>
													<tr>
														<td><?php echo $value['nama']; ?></td>
														<td><?php echo $value['email']; ?></td>
														<td><?php echo $value['no_tiket']; ?></td>
														<td><?php echo $value['event']['nama_event']; ?></td>
														<td><?php echo $value['jml_tiket']; ?></td>
														<td>
															<?php if ($value['status_cek_in']==0): ?>
																<?php echo "Belum Check In"; ?>
															<?php elseif ($value['status_cek_in']==1): ?>
																<?php echo "Check In"; ?>
															<?php endif ?>
														</td>
													</tr>
												<?php endforeach ?>
												<!-- jika sudah ada data pemesan -->
											</tbody>
										</table>
									</div>
								</div> 
							<?php elseif (empty($pengunjung)): ?>
								<!-- jika belum ada data pemesan -->
								<div class="uk-height-small uk-width-1-1 uk-flex uk-flex-center">
									<div class="uk-margin-large-top">
										<div id="no-pengunjung" class="uk-width-small uk-margin-large-top uk-animation-scale-up uk-transform-origin-bottom-center" style="margin: auto;">
											<img src="<?php echo base_url("assets/svg/icon-page-attendance.png"); ?>" alt="no-data"></div> 
											<p class="uk-width-large uk-text-center">Belum ada pemesanan atas tiket event kamu. Ayo promosikan dan distribusikan event kamu!</p>
										</div>
									</div> 
								</div>
								<!-- jika belum ada data pemesan -->
							<?php endif ?>
						</div>
					</div>
				</div>
				
				<!-- tampil jika sudah ada data pemesannya -->
				<!-- <div class="uk-width-1-1 uk-position-bottom uk-padding uk-grid-margin uk-first-column">
					<div uk-grid="" class="uk-grid-small uk-flex-middle uk-margin-large-bottom uk-grid">

						<div class="uk-width-1-2@s uk-width-1-1 uk-text-center uk-text-left@s uk-first-column" style="">
							<span class="paging-show-option">Tampil:</span> 

							<select class="uk-select uk-form-small paging-select-option">
								<option>7</option> 
								<option>15</option> 
								<option>31</option>
							</select> 

							<span class="paging-total-result uk-margin-small-left">Total Pemesan: 0</span>
						</div> --> 

						<!-- tampil jika sudah ada data pemesannya -->
						<!-- <div class="uk-width-1-2@s uk-width-1-1 uk-text-right@s uk-text-center">
							<div class="paging-number">
								<ul class="paging-page-number">
									<li>
										<span href="#" class="active">1</span>
									</li>
								</ul> 
							</div>
						</div> -->
						<!-- tampil jika sudah ada data pemesannya -->

					<!-- </div>
				</div> -->
				<!-- tampil jika sudah ada data pemesannya -->
			</div>
		</div>

	</div>