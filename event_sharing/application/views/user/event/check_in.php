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
				<a href="<?php echo base_url("member/event-saya/detail"); ?>"><?php echo ucwords($menu); ?></a>
			</li>
			<li>
				<a href="<?php echo base_url("member/event-saya/check-in"); ?>"><?php echo $event['nama_event']; ?></a>
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

						<!-- <form method="POST"> -->
						<form method="POST">
							<div class="uk-width-1-1 uk-first-column">
								<div class="uk-grid uk-grid-medium dashboard-form uk-grid-stack">
									<div class="uk-width-1-2@m uk-first-column">

										<div class="uk-width-1-1 uk-inline">
											<span uk-icon="icon: search" class="uk-form-icon uk-form-icon-flip uk-icon">
												<svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" ratio="1">
												</svg>
											</span> 

											<input type="text" name="no_tiket" placeholder="Input No Tiket" class="uk-input">
										</div>
									</div>

									<div class="uk-width-1-3@m uk-first-column">
										<button name="cari" value="cari" class="uk-button uk-button-primary uk-button-small uk-box-shadow-small">Cari</button>
									</div>

								</div>
							</div> 


							<div class="uk-width-1-1@m uk-first-column">
								<div class="uk-width-1-1 uk-inline uk-margin-right">

									<!-- jika sudah berhasil dicari -->
									<table style="width:100%;border-spacing:0;border-collapse:collapse;vertical-align:top;text-align:left;padding:0">
										<tbody>
											<tr style="vertical-align:top;text-align:left;padding:0" align="left">
												<td style="word-break:break-word;border-collapse:collapse!important;vertical-align:top;text-align:left;color:#4c4f55;font-family:'Helvetica','Arial',sans-serif;font-weight:normal;line-height:19px;font-size:14px;margin:0;padding:32px" align="left" valign="top">
													<br>
													<?php foreach ($pengunjung as $key => $value): ?>
														<table style="border-spacing:0;border-collapse:collapse;vertical-align:top;text-align:left;padding:0">
															<tbody>
																<tr style="vertical-align:top;text-align:left;padding:0" align="left">
																	<td style="white-space:nowrap;border-collapse:collapse!important;vertical-align:top;text-align:left;color:#4c4f55;font-family:'Helvetica','Arial',sans-serif;font-weight:normal;line-height:19px;font-size:14px;margin:0;padding:5px 10px 5px 0;vertical-align:top" align="left" valign="top">
																		Nama Pemesan
																	</td>
																	<td style="word-break:break-word;border-collapse:collapse!important;vertical-align:top;text-align:left;color:#4c4f55;font-family:'Helvetica','Arial',sans-serif;font-weight:normal;line-height:19px;font-size:14px;margin:0;padding:5px 10px 5px 0" align="left" valign="top">
																		: <?php echo $value['nama']; ?>
																	</td>
																	<input type="text" name="nama" value="<?php echo $value['nama']; ?>" style="display: none;">
																</tr>
																<tr style="vertical-align:top;text-align:left;padding:0" align="left">
																	<td style="white-space:nowrap;border-collapse:collapse!important;vertical-align:top;text-align:left;color:#4c4f55;font-family:'Helvetica','Arial',sans-serif;font-weight:normal;line-height:19px;font-size:14px;margin:0;padding:5px 10px 5px 0;vertical-align:top" align="left" valign="top">
																		Nama Event
																	</td>
																	<td style="word-break:break-word;border-collapse:collapse!important;vertical-align:top;text-align:left;color:#4c4f55;font-family:'Helvetica','Arial',sans-serif;font-weight:normal;line-height:19px;font-size:14px;margin:0;padding:5px 10px 5px 0" align="left" valign="top">
																		: <?php echo $value['event']['nama_event']; ?>
																	</td>
																</tr>
																<tr style="vertical-align:top;text-align:left;padding:0" align="left">
																	<td style="white-space:nowrap;border-collapse:collapse!important;vertical-align:top;text-align:left;color:#4c4f55;font-family:'Helvetica','Arial',sans-serif;font-weight:normal;line-height:19px;font-size:14px;margin:0;padding:5px 10px 5px 0;vertical-align:top" align="left" valign="top">
																		Lokasi Acara
																	</td>
																	<td style="word-break:break-word;border-collapse:collapse!important;vertical-align:top;text-align:left;color:#4c4f55;font-family:'Helvetica','Arial',sans-serif;font-weight:normal;line-height:19px;font-size:14px;margin:0;padding:5px 10px 5px 0" align="left" valign="top">
																		: <?php echo $value['event']['lokasi_acara']; ?>
																	</td>
																</tr>
																<tr style="vertical-align:top;text-align:left;padding:0" align="left">
																	<td style="white-space:nowrap;border-collapse:collapse!important;vertical-align:top;text-align:left;color:#4c4f55;font-family:'Helvetica','Arial',sans-serif;font-weight:normal;line-height:19px;font-size:14px;margin:0;padding:5px 10px 5px 0;vertical-align:top" align="left" valign="top">
																		Jadwal Event
																	</td>
																	<td style="word-break:break-word;border-collapse:collapse!important;vertical-align:top;text-align:left;color:#4c4f55;font-family:'Helvetica','Arial',sans-serif;font-weight:normal;line-height:19px;font-size:14px;margin:0;padding:5px 10px 5px 0" align="left" valign="top">
																		: <?php echo $value['event']['tgl_mulai_acara']; ?> <?php echo substr($value['event']['waktu_mulai_acara'], 0,5); ?> - <?php echo $value['event']['tgl_berakhir_acara']; ?> <?php echo substr($value['event']['waktu_berakhir_acara'], 0,5); ?>
																	</td>
																</tr>
																<tr style="vertical-align:top;text-align:left;padding:0" align="left">
																	<td style="white-space:nowrap;border-collapse:collapse!important;vertical-align:top;text-align:left;color:#4c4f55;font-family:'Helvetica','Arial',sans-serif;font-weight:normal;line-height:19px;font-size:14px;margin:0;padding:5px 10px 5px 0;vertical-align:top" align="left" valign="top">
																		Nomor Tiket
																	</td>
																	<td style="word-break:break-word;border-collapse:collapse!important;vertical-align:top;text-align:left;color:#4c4f55;font-family:'Helvetica','Arial',sans-serif;font-weight:normal;line-height:19px;font-size:14px;margin:0;padding:5px 10px 5px 0" align="left" valign="top">
																		: <?php echo $value['no_tiket']; ?>
																	</td>
																	<input type="text" name="no_tiket" value="<?php echo $value['no_tiket']; ?>" style="display: none;">
																</tr>
																<tr style="vertical-align:top;text-align:left;padding:0" align="left">
																	<td style="white-space:nowrap;border-collapse:collapse!important;vertical-align:top;text-align:left;color:#4c4f55;font-family:'Helvetica','Arial',sans-serif;font-weight:normal;line-height:19px;font-size:14px;margin:0;padding:5px 10px 5px 0;vertical-align:top" align="left" valign="top">
																		Kuantitas
																	</td>
																	<td style="word-break:break-word;border-collapse:collapse!important;vertical-align:top;text-align:left;color:#4c4f55;font-family:'Helvetica','Arial',sans-serif;font-weight:normal;line-height:19px;font-size:14px;margin:0;padding:5px 10px 5px 0" align="left" valign="top">
																		: <?php echo $value['jml_tiket']; ?>
																	</td>
																</tr>
																<tr style="vertical-align:top;text-align:left;padding:0" align="left">
																	<td style="white-space:nowrap;border-collapse:collapse!important;vertical-align:top;text-align:left;color:#4c4f55;font-family:'Helvetica','Arial',sans-serif;font-weight:normal;line-height:19px;font-size:14px;margin:0;padding:5px 10px 5px 0;vertical-align:top" align="left" valign="top">
																		Status
																	</td>
																	<td style="word-break:break-word;border-collapse:collapse!important;vertical-align:top;text-align:left;color:#4c4f55;font-family:'Helvetica','Arial',sans-serif;font-weight:normal;line-height:19px;font-size:14px;margin:0;padding:5px 10px 5px 0" align="left" valign="top">
																		: <?php if ($value['status_cek_in']==0): ?>
																		<?php echo "Belum Check-in"; ?>
																	<?php elseif ($value['status_cek_in']==1): ?>
																		<?php echo "Check-in"; ?>
																	<?php endif ?>
																</td>
															</tr>
															<tr>
																<td>
																	<?php $date_now = new DateTime(); $date2 = new DateTime($event['tgl_mulai_acara']); ?>

																	<?php if ($date_now > $date2): ?>
																		<button style="cursor: not-allowed;" class="uk-button uk-button-primary uk-button-small uk-box-shadow-small gradient-button">Check-in</button>
																	<?php else: ?>
																		<button name="checkin" value="checkin" class="uk-button uk-button-primary uk-button-small uk-box-shadow-small gradient-button">Check-in</button>
																	<?php endif ?>
																</td>
															</tr>
															<br><br>
														</tbody>
													</table>
												<?php endforeach ?>
											</td>
										</tr>
									</tbody>
								</table>

							</div>
						</div>
						<!-- </form> -->
					</form>

				</div>
			</div>

		</div>