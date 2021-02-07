<div>

	<div class="standard-margin">
		<ul id="breadcrumb">
			<li>
				<a href="">Kamu di sini</a>
			</li> 
			<li>
				<a href="<?php echo base_url("member"); ?>">Home</a>
			</li>
		</ul>
	</div> 

	<?php if ($this->session->flashdata('pesan')): ?>
		<?php echo $this->session->flashdata('pesan'); ?>
	<?php endif ?>

	<?php if (empty($member['nama']) OR empty($member['no_hp']) OR empty($member['logo']) OR empty($member['tentang_kami']) OR empty($member['no_ktp']) OR empty($member['nama_ktp']) OR empty($member['alamat_ktp']) OR empty($member['dokumen_ktp'])): ?>
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

	<?php endif ?> 

	<div class="page-layout uk-padding-remove-top">
		<div uk-grid="" class="uk-grid uk-grid-medium uk-grid-stack">
			<div class="uk-width-1-1 uk-first-column">
				<div uk-grid="" class="uk-grid-medium uk-child-width-1-3@l uk-child-width-1-2@s uk-grid">
					<div class="uk-first-column">
						
						<div class="card dashboard-card uk-padding-small">
							<a href="<?php echo base_url("member/event-saya"); ?>" class="uk-link-reset dashboard-card-detail link-dusty-orange">
								DETAIL <i class="fa fa-caret-right"></i>
							</a> 

							<div class="dashboard-card-title">
								<h3>
									<img width="15" src="<?php echo base_url("assets/svg/event_aktif.png"); ?>" alt="event" style="margin-right: 7px;">
									&nbsp;Event Saya
								</h3>
							</div> 

							<div class="dashboard-card-body">
								<span class="info-value">
									<span>
											<?php $total = 0; ?>
											<?php foreach ($event as $key => $value): ?>
												<?php if ($member['id_user']==$value['id_user']): ?>
													<?php $total = count($event); ?>
												<?php endif ?>
											<?php endforeach ?>
										<?php if (!empty($event)): ?>
											<?php echo $total; ?>
										<?php elseif (empty($event)): ?>
											<?php echo "0"; ?>
										<?php endif ?>
									</span>
								</span> 

								<span class="info-label">Event</span>
							</div>
						</div>

					</div>  

					<div class="uk-grid-margin uk-first-column">
						<div class="card dashboard-card uk-padding-small">
							<div class="dashboard-card-title">
								<h3>
									<img width="15" src="<?php echo base_url("assets/svg/ticket.png"); ?>" alt="event" style="margin-right: 7px;">
									&nbsp;Tiket Saya
								</h3>
							</div> 

							<div class="dashboard-card-body">
								<span class="info-value">
									<span ><?php echo count($tiket); ?></span>
								</span> 

								<span class="info-label">Tiket</span>
							</div>
						</div>
					</div>

					<div class="uk-grid-margin uk-first-column">
						<div class="card dashboard-card uk-padding-small">
							<div class="dashboard-card-title">
								<h3>
									<img width="15" src="<?php echo base_url("assets/svg/total_pengunjung.png"); ?>" alt="event" style="margin-right: 7px;">
									&nbsp;Rata - Rata Pengunjung
								</h3>
							</div> 

							<div class="dashboard-card-body">
								<span class="info-value">
									<span>
										<?php if (!empty($pengunjung)): ?>
											<?php $total = 0; ?>
											<?php $event_saya = count($pengunjung); ?>
											<?php foreach ($pengunjung as $key => $value): ?>
												<?php $pengunjung = count($value['total']); ?>
												<?php echo $total=$pengunjung/$event_saya; ?>
											<?php endforeach ?>
										<?php elseif (empty($pengunjung)): ?>
											<?php echo 0; ?>
										<?php endif ?>
									</span>
								</span> 

								<span class="info-label">Pengunjung</span>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>