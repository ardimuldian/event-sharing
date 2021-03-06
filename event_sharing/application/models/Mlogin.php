<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mlogin extends CI_Model {

	// ------------------- Admin -------------------

	function login_admin($email, $password) 
	{
		$this->db->where('level', 'admin');
		$this->db->where('email', $email);
		$this->db->where('password', $password);

		$ambil = $this->db->get('user');
		$dataygcocok = $ambil->num_rows();

		if ($dataygcocok==1) 
		{
			$pecah = $ambil->row_array();
			$this->session->set_userdata('admin',$pecah);
			return "admin";
		}
		else
		{
			return "gagal_admin";
		}
	}

	function logout_admin() 
	{
		session_destroy();
	}

	// ------------------- Admin -------------------

	// ------------------- Member -------------------

	function login_member($login_member) 
	{
		$email = $login_member['email'];
		$password = sha1($login_member['password']);

		$this->db->where('email', $email);
		$this->db->where('password', $password);

		$ambil = $this->db->get('user');
		$dataygcocok = $ambil->num_rows();

		if ($dataygcocok==1) 
		{
			$pecah = $ambil->row_array();
			$this->session->set_userdata('member',$pecah);
			return "member";
		}
		else
		{
			return "gagal_member";
		}
	}

	function login_member_detail($login_member) 
	{
		$email = $login_member['email'];
		$password = sha1($login_member['password']);

		$this->db->where('email', $email);
		$this->db->where('password', $password);
		return $this->db->get('user')->row_array();

	}


	function logout_member() 
	{
		session_destroy();
	}

	function cek_email($email)
	{
		$this->db->where('email', $email);
		$ambil = $this->db->get('user');
		$data = $ambil->row_array();

		return $data;
	}

	function pengaturan()
	{
		$id_config = 1;
		$this->db->where('id_config', $id_config);
		$ambil = $this->db->get('config');
		$data = $ambil->row_array();

		return $data;
	}

	function kirim_tautan($email)
	{
		//include_once APPPATH.'third_party/phpmailer/PHPMailerAutoload.php';

		$pengaturan = $this->pengaturan();

		$user = $this->cek_email($email);
		$token = $user['token'];

		$isi = '<div style="background:#f3f3f3"><div style="background-color:#f3f3f3"><div style="margin:0px auto;max-width:600px;background:#f3f3f3"><table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;background:#f3f3f3" align="center" border="0"><tbody><tr><td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:20px 0px;padding-bottom:0px;padding-top:20px"></td></tr></tbody></table></div><div style="margin:0px auto;max-width:600px;"><table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%; background-color: #191970;" align="center" border="0"><tbody><tr><td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:20px 0px"><div style="margin:0px auto;max-width:600px"><table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%" align="center" border="0"><tbody><tr><td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:20px 0px;padding-bottom:0px;padding-top:0px"><div class="m_-3419396183569862812mj-column-per-33" style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%"><table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0"><tbody><tr><td style="word-wrap:break-word;font-size:0px;padding:10px 25px" align="center"><table role="presentation" cellpadding="0" cellspacing="0" style="border-collapse:collapse;border-spacing:0px" align="center" border="0"><tbody><tr><td style="width:110px"><img alt="" height="auto" src="<?php echo base_url("assets/img/logo/logo.png"); ?>" style="border:none;border-radius:0px;display:block;font-size:13px;outline:none;text-decoration:none;width:100%;height:auto" width="110" class="CToWUd"></td></tr></tbody></table></td></tr></tbody></table></div><div class="m_-3419396183569862812mj-column-per-33" style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%"><table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0"><tbody></tbody></table></div><div class="m_-3419396183569862812mj-column-per-33" style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%"><table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0"><tbody><tr><td style="word-wrap:break-word;font-size:0px;padding:10px 25px" align="right"><div style="color:grey;font-family:Roboto;font-size:20px;font-weight:200;line-height:22px;text-align:right"><a href="'.$pengaturan['facebook'].'"><img style="margin-right:10px;" width="9" src="https://ci4.googleusercontent.com/proxy/3fQs6Mb1OHX4YnV3ZpaYV-PSUH2KnckGn1lti6R1AX1EqWR30uE-ktMTwOGrQ-LxjSmN7R3CDkLxTAAsPVcCb6NPj3NrLBefBifVgAO7CBCuWaZRLT_pAlqWSF0vNpFu-PEpkqHUetoOk9ANzA=s0-d-e1-ft#https://loket-development.s3.amazonaws.com/images/temporary/20180119/1516368063_LJFzEf.png" class="CToWUd"></a><a href="'.$pengaturan['instagram'].'"><img style="margin-right:10px" width="16" src="https://ci3.googleusercontent.com/proxy/Pbn5fMhdhifMjTVPTGW9gMy5tWNT5mA9z6d04MCHL6rzk3mcSfjMNe8G8jqHdDR4THBOs77wDYqrNmTvWusQtMpUXvvEgs5HafFyfn5fHtvXT1geq2rz0Uifbc0gjV7srfkXC_iy6XXY_rzsVw=s0-d-e1-ft#https://loket-development.s3.amazonaws.com/images/temporary/20180119/1516367862_cc0S4y.png" class="CToWUd"></a><a href="'.$pengaturan['twitter'].'"><img style="margin-right:10px" width="17" src="https://ci6.googleusercontent.com/proxy/l9odMctqqIVIOsereJ25BvMcOF8RnLuiVIMsd3_WX5GlwZ8N-Dnj511n3ekPxhg0NLsm5FO0yUey_Nl-vCSpTa2ks1ljOMitvgIbyD_BEP7kv8TLCG8DRN0KIWJhlpjenm3yQCm5HTYj5Sx1VA=s0-d-e1-ft#https://loket-development.s3.amazonaws.com/images/temporary/20180119/1516368019_ACw4gB.png" class="CToWUd"></a></div></td></tr></tbody></table></div></td></tr></tbody></table></div><div style="margin:0px auto;max-width:600px"><table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%" align="center" border="0"><tbody><tr><td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:20px 0px;padding-top:0px"><div class="m_-3419396183569862812mj-column-per-100" style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%"><table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0"><tbody><tr><td style="word-wrap:break-word;font-size:0px;padding:10px 25px" align="center"><table role="presentation" cellpadding="0" cellspacing="0" style="border-collapse:collapse;border-spacing:0px" align="center" border="0"><tbody><tr><td style="width:400px"><img alt="" height="auto" src="https://ci4.googleusercontent.com/proxy/5PTa7NN3SN5QZvSAX-na_H2YLcSXy9yqvhairoxYMNrif4S-YxjkamrilIQtkkH4uYF5wvFERhbiJ1yNEqdW9RAM6bb9xopeoGDp_pJGIQSsPIYO757O4gdgIED2ZNSLqA=s0-d-e1-ft#https://s3.amazonaws.com/loket-zone/images/banner/Reset%20Password%20Permi.png" style="border:none;border-radius:0px;display:block;font-size:13px;outline:none;text-decoration:none;width:100%;height:auto" width="400" class="CToWUd"></td></tr></tbody></table></td></tr></tbody></table></div></td></tr></tbody></table></div></td></tr></tbody></table></div><div style="margin:0px auto;max-width:600px;background:#fff"><table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;background:#fff" align="center" border="0"><tbody><tr><td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:20px 0px;padding-bottom:0px"><div class="m_-3419396183569862812mj-column-per-100" style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%"><table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0"><tbody><tr><td style="word-wrap:break-word;font-size:0px;padding:10px 25px" align="left"><div style="color:grey;font-family:Roboto;font-size:20px;font-weight:200;line-height:22px;text-align:left">Hi <a href="mailto:'.$email.'" target="_blank">'.$email.'</a><wbr>!</div></td></tr><tr><td style="word-wrap:break-word;font-size:0px;padding:10px 25px" align="left"><div style="color:grey;font-family:roboto;font-size:16px;font-weight:200;line-height:2;text-align:left">Silahkan klik button di bawah untuk mengubah password.</div></td></tr><tr><td style="word-wrap:break-word;font-size:0px;padding:10px 25px" align="center"><table role="presentation" cellpadding="0" cellspacing="0" style="border-collapse:separate" align="center" border="0"><tbody><tr><td style="border:none;border-radius:3px;color:white;padding:10px 25px" align="center" valign="middle" bgcolor="#e36a35"><a href="'.base_url() .'lupa-password/perbaharui-password/'. $token .'" style="text-decoration:none;background:#e36a35;color:white;font-family:Roboto;font-size:24px;font-weight:normal;line-height:120%;text-transform:none;margin:0px">RESET PASSWORD</a></td></tr></tbody></table></td></tr><tr><td style="word-wrap:break-word;font-size:0px;padding:10px 25px;padding-top:20px"><p style="font-size:1px;margin:0px auto;border-top:1px solid lightgrey;width:100%"></p></td></tr></tbody></table></div></td></tr></tbody></table></div><div style="margin:0px auto;max-width:600px;background:white"><table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;background:white" align="center" border="0"><tbody><tr><td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:20px 0px"><div class="m_-3419396183569862812mj-column-per-100" style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%"><table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0"><tbody><tr><td style="word-wrap:break-word;font-size:0px;padding:10px 25px" align="left"><div style="color:#b8b8b8;font-family:Roboto;font-size:16px;font-weight:200;line-height:2;text-align:left">Jika kamu tidak bermaksud menyetel ulang password, kamu bisa mengabaikan email ini (Password kamu tidak akan berubah).</div></td></tr></tbody></table></div></td></tr></tbody></table></div><div style="margin:0px auto;max-width:600px"><table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%" align="center" border="0"><tbody><tr><td style="text-align:center;vertical-align:top;border-top:1px solid lightgrey;direction:ltr;font-size:0px;padding:0px"><div style="margin:0px auto;max-width:600px;background:white"><table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;background:white" align="center" border="0"><tbody><tr><td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:20px 0px;padding-bottom:0px"><div class="m_-3419396183569862812mj-column-per-100" style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%"><table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0"><tbody><tr><td style="word-wrap:break-word;font-size:0px;padding:0px" align="center"><div style="color:lightgrey;font-family:Roboto;font-size:12px;line-height:22px;text-align:center">Event Sharing</div></td></tr><tr><td style="word-wrap:break-word;font-size:0px;padding:0px" align="center"></td></tr><tr><td style="word-wrap:break-word;font-size:0px;padding:0px" align="center"><div style="color:lightgrey;font-family:Roboto;font-size:12px;line-height:22px;text-align:center">Email: <span style="color:#e36a35"><a href="mailto:tugaskuliahdemikelulusan@gmail.com" target="_blank">tugaskuliahdemikelulusan@gmail.com</a></span></div></td></tr><tr><td style="word-wrap:break-word;font-size:0px;padding:10px 25px;padding-bottom:20px"><p style="font-size:1px;margin:0px auto;border-top:0px solid #000000;width:100%"></p></td></tr></tbody></table></div></td></tr></tbody></table></div></td></tr></tbody></table></div><div style="margin:0px auto;max-width:600px;background:#f3f3f3"><table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;background:#f3f3f3" align="center" border="0"><tbody><tr><td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:20px 0px;padding-top:20px"></td></tr></tbody></table></div></div><div class="yj6qo"></div><div class="adL"></div></div>';
		
		// $isi = "Silahkan klik link tautan ini untuk mengganti password akun anda. <a href='".base_url() . 'lupa-password/perbaharui-password/'. $token . "'>Reset Password</a>";
		
		$from = "noreply@event-sharing.me";
        $to = "$email";
        $subject = "Autoresponder";
		$message = "Silahkan klik link tautan ini untuk mengganti password akun anda. <a href='".base_url() . 'lupa-password/perbaharui-password/'. $token . "'>Reset Password</a>";
		$headers = "From:" . $from;
        
        mail($to, $subject, $message, $headers);

		//$mail = new PHPMailer();
		
		//$mail->IsSMTP(); 
		// telling the class to use SMTP

		// TAMBAHAN
		// Menggunakan SMTP option. Agar jika localhost pakai SSL tetep kekirim emailnya.
		//$mail->SMTPOptions = array(
			//'ssl' => array(
				//'verify_peer' => false,
				//'verify_peer_name' => false,
				//'allow_self_signed' => true
				//)
			//);

		//$mail->Host = "smtp.gmail.com"; // SMTP server 
		//$mail->SMTPDebug = 0; // enables SMTP debug information (for testing) // 1 = errors and messages // 2 = messages only 
		//$mail->SMTPAuth = true; // enable SMTP authentication 
		//$mail->SMTPSecure = "tls"; // sets the prefix to the servier 
		//$mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server 
		//$mail->Port = 587; // set the SMTP port for the GMAIL server 
		//$mail->Username = "tugaskuliahdemikelulusan@gmail.com"; // GMAIL username 
		//$mail->Password = "12345678ab$"; // GMAIL password

		//$mail->SetFrom('tugaskuliahdemikelulusan@gmail.com', 'Event Sharing');

		//$mail->AddReplyTo("tugaskuliahdemikelulusan@gmail.com", "Event Sharing");

		//$mail->Subject = "Reset Password Akun Event Sharing";

		//$mail->AltBody = "Untuk melihat pesan, mohon gunakan pembaca email yang kompatibel dengan HTML!"; // optional, comment out and test

		//$mail->MsgHTML($isi);

		//$address = $email; 
		//$mail->AddAddress($address);

		//$mail->Send();
	}

	function cek_akun($token)
	{
		$this->db->where('token', $token);
		$ambil = $this->db->get('user');
		$data = $ambil->row_array();

		return $data;
	}

	function ubah_password($password, $token)
	{
		$pass['password'] = sha1($password);

		$this->db->set('password', $pass['password']);
		$this->db->where('token', $token);
		$this->db->update('user');
	}

	// ------------------- Member -------------------

}
?>