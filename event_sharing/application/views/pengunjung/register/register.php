<!doctype html>
<html lang="id-ID">
<head>

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
<meta name="theme-color" content="#113452" />

<title>Register | Bikin event gratis & Atur acaramu sendiri</title>
<meta name="keywords" content="<?php echo $pengaturan['meta_keyword']; ?>">
<meta name="author" content="<?php echo $pengaturan['meta_author']; ?>">
<meta name="title" content="<?php echo $pengaturan['meta_title']; ?>">
<meta name="description" content="<?php echo $pengaturan['meta_description']; ?>" />

<link rel="icon" sizes="16x16 24x24 32x32 48x48 64x64" href="<?php echo base_url("assets/img/favicon/".$pengaturan['favicon']); ?>">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.39/css/uikit.min.css?_=1" />
<link rel="stylesheet" href="<?php echo base_url("assets/css/default.css?v=111020191905"); ?>" />
<link rel="stylesheet" href="<?php echo base_url("assets/css/adding.css"); ?>" />
<link rel="stylesheet" href="<?php echo base_url("assets/font-awesome/css/font-awesome.min.css"); ?>">

<script src='https://www.google.com/recaptcha/api.js'></script>

</head>

<body>

	<div>
		<div class="uk-position-relative">
			<div class="header-nav-top main-nav lss-navwhite uk-boxoshadow-small">
				<div class="uk-container lss-navbar uk-animation-fade">
					<nav class="uk-width-1-1" uk-navbar>
						
						<div class="uk-navbar-left uk-margin-small-bottom uk-margin-small-top uk-text-middle">
							<a href="<?php echo base_url(""); ?>" class="logo-img uk-link-reset">
								<img class="white" src="<?php echo base_url("assets/img/logo/".$pengaturan['logo']); ?>" alt="Create a free event & Set your own show">
							</a>
							<a class="uk-link-reset xd-search-trigger-modal" href="#search-modal" uk-toggle></a>
						</div>

						<div class="uk-navbar-right uk-visible@m">
							<ul class="uk-navbar-nav">
								<li class="uk-text-bold">
									<a href="<?php echo base_url("login"); ?>" class="main-nav-open-menu">Kembali</a>
								</li>
							</ul>
						</div>
						
						<hr>

					</nav>
				</div>

				<div class="uk-container uk-animation-slide-top uk-hidden">
					<nav class="uk-width-1-1 uk-navbar">
						<div class="uk-navbar-left uk-margin-small-bottom uk-margin-small-top uk-text-middle" style="padding: 0px 20px;">
							<a href="<?php echo base_url(""); ?>" class="uk-link-reset">
								<img src="<?php echo base_url("assets/img/logo/logo.png"); ?>" alt="" class="logo-img loket-logo full-icon">
							</a>
						</div>
					</nav>
				</div>

				<br>

				<div class="lss-body-content">
					<div class="lss-common-wrapper uk-padding-remove">
						<div class="uk-container">
							<div uk-grid class="uk-flex-middle uk-flex-center lss-login-body uk-grid uk-grid-stack">
								<div class="uk-width-1-1 uk-width-2-5@m uk-text-center uk-first-column">

									<h1 class="uk-h3 uk-text-uppercase">Daftar</h1>
									<p class="lss-text-small">
										Silahkan daftar untuk membuat event kamu.
									</p>

									<?php if ($this->session->flashdata('pesan')): ?>
										<?php echo $this->session->flashdata('pesan'); ?>
									<?php endif ?>

									<form method="POST" class="uk-form-stacked">
										
										<div>
											
											<div class="uk-margin">
												<label for="form-email" class="uk-form-label uk-text-left">Email</label>
												<div class="uk-form-controls">
													<input type="email" name="email" class="uk-input lss-input-login uk-text-left" value="<?php echo set_value('email'); ?>">
													<?php echo form_error('email','<a class="uk-text-center">','</a>'); ?>	
												</div>
											</div>
											
											<div class="uk-margin">
												<label for="form-password" class="uk-form-label uk-text-left">Password</label>
												<div class="uk-inline uk-width-1-1 pass">
													<a class="uk-link-reset uk-form-icon uk-form-icon-flip icon-loket-eye-disabled"></a>
													<input type="password" name="password" class="uk-input lss-input-login uk-text-left">
													<?php echo form_error('password','<a class="uk-text-center">','</a>'); ?>

												</div>
											</div>

										</div>
										
										<div class="uk-margin uk-grid-small uk-grid uk-text-left">
											
											<div class="uk-width-auto uk-first-column" style="padding-top: 5px;">
												<input type="checkbox" id="agree" class="uk-checkbox">
											</div>
											
											<div class="uk-width-expand">
												<label for="agree" class="lss-text-small">
													Dengan mendaftar, saya menyetujui
													<a href="<?php echo base_url("kebijakan-privasi"); ?>">kebijakan privasi</a> Event Sharing.
												</label>
											</div>

										</div>

										<button type="submit" class="uk-button uk-button-primary uk-width-1-1 uk-box-shadow-medium">
											<span>Daftar</span>
										</button>

									</form>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.39/js/uikit.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.39/js/uikit-icons.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<script src="<?php echo base_url("assets/js/moment.js"); ?>"></script>
	<script src="<?php echo base_url("assets/js/lazy-load-event-page.min.js?v=111020191905"); ?>"></script>

</body>
</html>