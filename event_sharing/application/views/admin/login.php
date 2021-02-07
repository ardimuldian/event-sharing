<!DOCTYPE html>
<html >
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Admin</title>
    
    <!-- Vendor CSS -->
    <link href="<?php echo base_url("assets/admin/material-design-iconic-font/css/material-design-iconic-font.min.css"); ?>" rel="stylesheet">     

    <!-- CSS -->
    <link href="<?php echo base_url("assets/admin/css/app_1.css"); ?>" rel="stylesheet">

    <link rel='shortcut icon' href='<?php echo base_url("assets/admin/img/favicon/favicon.png"); ?>' type='image/x-icon'/>

</head>
<body>

  <div class="login-content">

      <!-- Login -->
      <div class="lc-block toggled" id="l-login">

        <div class="lcb-form lcb-form-header">
            <h2><img src="<?php echo base_url("assets/admin/img/bg-img-login/bg-img-login.png"); ?>" alt=""></h2>
            <small class="p-b-10">Silahkan Login dengan Username dan Password anda</small>
            <?php if ($this->session->flashdata('alert')): ?>
                <?php echo $this->session->flashdata('alert'); ?>
            <?php endif ?>
            <hr>
        </div>
        
        <div class="lcb-form p-t-0">
            <form method="post" accept-charset="utf-8">

                <div class="input-group m-b-20">
                    <span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
                    <div class="fg-line">
                        <input type="email" name="email" class="form-control" placeholder="Email" >
                        <?php echo form_error('email','<p style="color: red; font-size: 14px;">','</p>'); ?>                       
                    </div>
                </div>

                <div class="input-group m-b-20">
                    <span class="input-group-addon"><i class="zmdi zmdi-key"></i></span>
                    <div class="fg-line">
                        <input type="password" name="password" class="form-control" placeholder="Password" >
                        <?php echo form_error('password','<p style="color: red; font-size: 14px;">','</p>'); ?>             
                    </div>
                </div>

                <button type="submit" class="btn btn-login btn-warning btn-float" >
                    <i class="zmdi zmdi-arrow-forward"></i>
                </button>

            </form>           
        </div>

    </div>

</div>

</body>
</html>