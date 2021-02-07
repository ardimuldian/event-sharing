<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mevent extends CI_Model {

    // --------------------- Model untuk admin ---------------------
    function tampil_kategori() 
    {
        $this->db->order_by('id_kategori', 'DESC');
        $ambil = $this->db->get('kategori');
        $data = $ambil->result_array();
        return $data;
    }

    function ambil_kategori($id_kategori) 
    {
        $this->db->where('id_kategori', $id_kategori);
        $ambil = $this->db->get('kategori');
        $data = $ambil->row_array();
        return $data;
    }  

    function tambah_kategori_event($inputan)
    {
        $config['upload_path']    = './assets/img/kategori/';
        $config['allowed_types']  = 'gif|jpg|png';
        $config['max_size']       = 2048;
        $config['width']       = 630;
        $config['height']       = 260;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('cover'))
        {
            $this->db->insert('kategori',$inputan);
        }
        else
        {
            $inputan['cover'] = $this->upload->data('file_name');
            $this->db->insert('kategori',$inputan);
        }
    }

    function ubah_kategori_event($inputan,$id_kategori) 
    {
        $kategori = $this->ambil_kategori($id_kategori);

        $config['upload_path'] = './assets/img/kategori/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2048;
        $config['width'] = 630;
        $config['height'] = 260;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('cover'))
        {
            $this->db->where('id_kategori', $id_kategori);
            $this->db->update('kategori', $inputan);
        }

        if ($this->upload->do_upload('cover'))
        {
            $inputan['cover'] = $this->upload->data('file_name');
            $foto = $kategori['cover'];

            if(file_exists("./assets/img/kategori/$foto"))
            {
                unlink("./assets/img/kategori/$foto");
            }

            $this->db->where('id_kategori',$id_kategori);
            $this->db->update('kategori',$inputan);
        }
    }

    function hapus_kategori_event($id_kategori) 
    {
        $kategori = $this->ambil_kategori($id_kategori);
        $foto = $kategori['cover'];
        unlink("./assets/img/kategori/$foto");
        $this->db->where('id_kategori', $id_kategori);
        $this->db->delete('kategori');
    }

    function buat_event($inputan1, $inputan2)
    {
        $config['upload_path']    = './assets/img/member/banner/';
        $config['allowed_types']  = 'gif|jpg|png';
        $config['max_size']       = 2048;
        $config['width']       = 2000;
        $config['height']       = 1000;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('banner'))
        {
            $inputan1['banner'] = $this->upload->data('file_name');
            $inputan1['url_event']  = url_title($inputan1['nama_event'],"-",TRUE);
            $inputan1['status'] = "Publish";
            $this->db->insert('event',$inputan1);

            $inputan2['id_event'] = $this->db->insert_id('event');
            $this->db->insert('tiket',$inputan2);
        }
    }

    function ubah_event($inputan1, $inputan2)
    {
        $id_event = $inputan1['id_event'];
        $url_event = $inputan1['url_event'];

        $ambil = $this->ambil_event($url_event);

        $config['upload_path']    = './assets/img/member/banner/';
        $config['allowed_types']  = 'gif|jpg|png';
        $config['max_size']       = 2048;
        $config['width']       = 2000;
        $config['height']       = 1000;

        $this->load->library('upload', $config);
        
        if($this->upload->do_upload("banner"))
        {
            if(file_exists("./assets/img/member/banner/".$ambil['banner']))
            {
                unlink("./assets/img/member/banner/".$ambil['banner']);
            }

            $inputan1['banner'] = $this->upload->data("file_name");
            $input['url_event']  = url_title($inputan1['nama_event'],"-",TRUE);

            $this->db->where('id_event', $id_event);
            $this->db->update('event', $inputan1);

            $this->db->where('id_event', $id_event);
            $this->db->update('tiket', $inputan2);
        }

        if(!$this->upload->do_upload("banner"))
        {
            $input['url_event']  = url_title($inputan1['nama_event'],"-",TRUE);

            $this->db->where('id_event', $id_event);
            $this->db->update('event', $inputan1);

            $this->db->where('id_event', $id_event);
            $this->db->update('tiket', $inputan2);
        }

    }

    function tampil_event() 
    {
        $this->db->join('tiket', 'event.id_event = tiket.id_event', 'left');
        $this->db->join('kategori', 'event.id_kategori = kategori.id_kategori', 'left');
        $this->db->where('status', 'Publish');
        $this->db->order_by('event.id_event', 'DESC');
        $ambil = $this->db->get('event');
        $data = $ambil->result_array();
        return $data;
    }

    function ambil_event($url_event) 
    {
        $this->db->join('tiket', 'event.id_event = tiket.id_event', 'left');
        $this->db->join('user', 'event.id_user = user.id_user', 'left');
        $this->db->join('kategori', 'event.id_kategori = kategori.id_kategori', 'left');
        $this->db->where('url_event', $url_event);
        $ambil = $this->db->get('event');
        $data = $ambil->row_array();

        return $data;
    }

    function tampil_event_perkategori($nama_kategori) 
    {
        $this->db->join('tiket', 'event.id_event = tiket.id_event', 'left');
        $this->db->join('kategori', 'event.id_kategori = kategori.id_kategori', 'left');
        $this->db->where('kategori.nama_kategori', $nama_kategori);
        $this->db->where('status', 'Publish');
        $this->db->order_by('kategori.nama_kategori', 'DESC');
        $ambil = $this->db->get('event');
        $data = $ambil->result_array();

        return $data;
    }

    function ambil_event1($url_event) 
    {
        $this->db->join('tiket', 'event.id_event = tiket.id_event', 'left');
        $this->db->join('kategori', 'event.id_kategori = kategori.id_kategori', 'left');
        $this->db->where('url_event', $url_event);
        $ambil = $this->db->get('event');
        $data = $ambil->row_array();
        return $data;
    }

    function ambil_event_user($id_user) 
    {
        $this->db->join('kategori', 'event.id_kategori = kategori.id_kategori');
        $this->db->join('tiket', 'event.id_event = tiket.id_event');
        $this->db->where('id_user', $id_user);
        $ambil = $this->db->get('event');
        $data = $ambil->result_array();

        $semua = array();
        foreach ($data as $key => $value) {
            $this->db->where('id_tiket', $value['id_tiket']);
            $ambil1 = $this->db->get('pengunjung');
            $data1 = $ambil1->result_array();
            $value['pengunjung'] = $data1;

            $semua[] = $value;
        }
        
        return $semua;

    }

    function tampil_tiket($id_user) 
    {
        $this->db->join('tiket', 'pengunjung.id_tiket = tiket.id_tiket');
        $this->db->where('id_user', $id_user);
        $ambil = $this->db->get('pengunjung');
        $data = $ambil->result_array();
        
        $semua = array();
        foreach ($data as $key => $value) 
        {
            $this->db->join('kategori', 'event.id_kategori = kategori.id_kategori');
            $this->db->where('id_event', $value['id_event']);
            $ambil1 = $this->db->get('event');
            $data1 = $ambil1->row_array();
            $value['event'] = $data1;

            $semua[] = $value;
        }
        
        return $semua;

    }

    function ambil_pengunjung($id_tiket) 
    {
        $this->db->where('id_tiket', $id_tiket);
        $ambil = $this->db->get('pengunjung');
        $data = $ambil->result_array();

        $semua = array();
        foreach ($data as $key => $value) {
            $this->db->join('event', 'tiket.id_event = event.id_event');
            $this->db->where('id_tiket', $value['id_tiket']);
            $ambil1 = $this->db->get('tiket');
            $data1 = $ambil1->row_array();
            $value['event'] = $data1;

            $semua[] = $value;
        }
        
        return $semua;
    }

    function cari_no_tiket($cari) 
    {
        $no_tiket = $cari['no_tiket'];

        $ambil = $this->db->query("SELECT id_pengunjung, id_tiket, no_tiket, nama, email, jml_tiket, status_cek_in, id_user FROM pengunjung WHERE no_tiket LIKE '$no_tiket'");
        $data = $ambil->result_array();

        $semua = array();
        foreach ($data as $key => $value) {
            $this->db->join('event', 'tiket.id_event = event.id_event');
            $this->db->where('id_tiket', $value['id_tiket']);
            $ambil1 = $this->db->get('tiket');
            $data1 = $ambil1->row_array();
            $value['event'] = $data1;

            $semua[] = $value;
        }
        
        return $semua;
    }

    function unpublish_event($url_event)
    {
        $inputan['status'] = "Not Publish";
        $this->db->where('url_event', $url_event);
        $this->db->update('event', $inputan);
    }

    function publish_event($url_event)
    {
        $inputan['status'] = "Publish";
        $this->db->where('url_event', $url_event);
        $this->db->update('event', $inputan);
    }

    function cekin_pengunjung($no_tiket)
    {
        $inputan['status_cek_in'] = 1;
        $this->db->where('no_tiket', $no_tiket);
        $this->db->update('pengunjung', $inputan);
    }

    function kode_otomatis()
    {
        $this->db->select('RIGHT(pengunjung.no_tiket,2) as kode', FALSE);
        $this->db->order_by('kode','DESC');    
        $this->db->limit(1);    
        $query = $this->db->get('pengunjung');  //cek dulu apakah ada sudah ada kode di tabel.    
        if($query->num_rows() <> 0)
        {      
               //cek kode jika telah tersedia    
            $data = $query->row();      
            $kode = intval($data->kode) + 1; 
        }
        else
        {      
            $kode = 1;  
               //cek jika kode belum terdapat pada table
        }

        $no_urut = str_pad($kode, 2, "0", STR_PAD_LEFT);
        $bulan = date('m');
        $tahun = substr(date('Y'), 2, 4);
        $kodetampil = $bulan.$tahun.$no_urut;  //format kode
        return $kodetampil;  
    }

    function input_pengunjung($data, $jml_tiket)
    {
        include_once APPPATH.'third_party/phpmailer/PHPMailerAutoload.php';

        $session = $this->session->userdata('member');

        $no_tiket = $this->kode_otomatis();

        $id_user = 0;

        if ($session['id_user']) {
            $id_user = $session['id_user'];
        }

        $inputan['id_tiket'] = $data['id_tiket'];
        $inputan['no_tiket'] = $no_tiket;
        $inputan['nama'] = $data['firstname'];
        $inputan['email'] = $data['email'];
        $inputan['jml_tiket'] = $jml_tiket;
        $inputan['status_cek_in'] = '0';
        $inputan['id_user'] = $id_user;

        $email = $inputan['email'];

        $this->db->insert('pengunjung',$inputan);

        $invoice = $this->Mevent->tampil_invoice($email);

        $banner = base_url('assets/img/member/banner/'.$invoice['banner']);

        $url = base_url('');

        $isi = '<style type="text/css">*,*:before,*:after {-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;}html {font-family: Arial, sans-serif;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;}body {margin: 0;}article,aside,details,figcaption,figure,footer,header,hgroup,main,menu,nav, section,summary {display: block;}audio,canvas,progress,video {display: inline-block;vertical-align: baseline;}audio:not([controls]) {display: none;height: 0;}[hidden],template {display: none;}a {background-color: transparent;}a:active,a:hover {outline: 0;}abbr[title] {border-bottom: 1px dotted;}b,strong {font-weight: bold;}dfn {font-style: italic;}h1 {font-size: 2em;margin: 0.67em 0;}mark {background: #ff0;color: #000;}small {font-size: 80%;}sub,sup {font-size: 75%;line-height: 0;position: relative;vertical-align: baseline;}sup {top: -0.5em;}sub {bottom: -0.25em;}img {border: 0;}svg:not(:root) {overflow: hidden;}figure {margin: 1em 40px;}hr {-moz-box-sizing: content-box;box-sizing: content-box;height: 0;}pre { overflow: auto;}code,kbd,pre,samp {font-family: monospace, monospace;font-size: 1em;}button,input,optgroup,select,textarea {color: inherit;font: inherit;margin: 0;}button {overflow: visible;}button,select {text-transform: none;}button,html input[type="button"],input[type="reset"],input[type="submit"] {-webkit-appearance: button;cursor: pointer;}button[disabled],html input[disabled] {cursor: default;}button::-moz-focus-inner,input::-moz-focus-inner {border: 0;padding: 0;}input {  line-height: normal;}input[type="checkbox"],input[type="radio"] {box-sizing: border-box;padding: 0;}input[type="number"]::-webkit-inner-spin-button,input[type="number"]::-webkit-outer-spin-button {height: auto;}input[type="search"] {-webkit-appearance: textfield;-moz-box-sizing: content-box;-webkit-box-sizing: content-box;box-sizing: content-box;}input[type="search"]::-webkit-search-cancel-button,input[type="search"]::-webkit-search-decoration {-webkit-appearance: none;}fieldset {border: 1px solid #c0c0c0;margin: 0 2px;padding: 0.35em 0.625em 0.75em;}legend {border: 0;padding: 0;}textarea {overflow: auto;}optgroup {font-weight: bold;}table {border-collapse: collapse;border-spacing: 0;}td,th {padding: 0;}body {font-size: 8pt;line-height: 1.5;padding-top: 48px;background: #eee;}img {max-width: 100%;}table {width: 100%;}body {
            font-size: 16px;}.site-header {height: 48px;position: fixed;top: 0;right: 0;left: 0;background: rgba(255, 255, 255, 0.88);
                box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1), 0 1px 1px rgba(0, 0, 0, 0.1);overflow: hidden;padding: 0 16px;z-index: 99;}.site-header__logo {float: left;}.site-header__logo em {display: block;font-size: 20px;font-weight: 400;text-transform: uppercase; font-style: normal;line-height: 48px;color: #d9531e;}.site-header__action {float: right;padding: 8px 0;}.site-header__action .btn {display: block;vertical-align: middle;line-height: 22px;padding: 4px 12px;border: solid 1px rgba(0, 0, 0, 0.1);background: #fff;border-radius: 3px;font: inherit;font-size: 14px;outline: 0 !important;float: left;margin: 0 0 0 8px;background-color: #01A4EF;color: #fff !important;background-image: linear-gradient(#2fbdfe, #01A4EF);text-shadow: -0.1px -0.1px rgba(0, 0, 0, 0.12);box-shadow: 0 0.1px 0.1px rgba(255, 255, 255, 0.4) inset;}.site-header__action .btn svg {display: block;width: 22px;height: 22px;fill: #fff;float: left;margin: 0 6px 0 -4px;
                }.site-header__action .btn:focus {box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);}.evoucher-wrapper {max-width: 746px;margin: 24px auto;background: #fff;padding: 8px;border: solid 1px #e5e5e5;box-shadow: 0 1px 1px rgba(0, 0, 0, 0.04);}.evoucher {border: solid 4px #eee;}.evoucher > table {border-collapse: separate;}.evoucher > table td {
                    padding: 12px;border: solid 4px #eee;}.evoucher > table td img {max-width: 1000px;}td svg {vertical-align: middle;}table.toc td {border: 0;vertical-align: top;}.evoucher td ul,.evoucher td ol {margin: 0 0 0 16px;
                        padding: 0;font-size: 13px;}.file-btn {position: absolute;top: 0px;right: 10px;overflow: hidden;height: 24px;
                            line-height: 24px;padding: 0 6px;border-radius: 3px;border: solid 1px #ccc;font-size: 9px;cursor: pointer;
                            font-family: Arial, sans-serif;text-transform: uppercase;font-weight: 700;background: rgba(255, 255, 255, .4);
                        }.file-btn input {position: absolute;opacity: 0;line-height: 4rem;width: 8rem;top: 0;left: 0;right: 0;bottom: 0;cursor: pointer;}.editable {border: dashed 1px #e5e5e5;outline: 0;}.editable:focus {background: #ffffce;}.break {margin: 24px 0;}@media print {body {padding-top: 0;background: transparent;}.eticket {padding: 0;border: 0;box-shadow: none;}.site-header {display: none;}.break {page-break-after: always;height: 0;background: transparent;margin: 0;}.editable {border: 0;background: transparent;}.inline-editor {display: none;}}</style><div class="content_template"><div class="evoucher-wrapper"><div class="evoucher"><table><tbody><tr><td style="width:75%;text-transform:uppercase;font-weight:700;padding:6px 12px;font-size:14px;"><div class="editable__">Nama Tiket : <span style="color:#FF3A2D;">'.$invoice['nama_tiket'].'</span> (Gratis Lurr)</div></td></tr></tbody></table><table><tbody><tr><td rowspan="0"><div style="position:relative;"><img src="'.$banner.'" class="image_banner" alt="'.$invoice['nama_tiket'].'" style="display:block;max-width:460px;height:240px;margin:0px;padding:0px 55px;"></div></td><td style="text-align:center;vertical-align:middle;padding:0px;"><div style="position:relative;height:100px;"><img src="'.$banner.'" class="image_logo" alt="" style="width: 100px;height: 100px;"><span style="display:block;margin:0;line-height:1.2;font-size:12px;"><br><b>'.$invoice['no_tiket'].'</b></span></div></td></tr><tr><td style="text-align:center;padding:0px 10px"><small style="display:block;margin:0;line-height:1.2;"><b>'.$invoice['nama_kategori'].'</b></small><span style="display:block;margin:0;line-height:1.2;font-size:12px;"><br><b>TICKET '.$invoice['jml_tiket'].'</b></span></td></tr><tr><td style="text-align:center;text-transform:uppercase;font-weight:700;font-size:13px;whitespace:nowrap;padding:6px 12px;"><div class="editable__">'.$invoice['nama_tiket'].'<br>'.$invoice['tgl_mulai_acara'].' – '.$invoice['tgl_berakhir_acara'].' '.$invoice['waktu_mulai_acara'].' - '.$invoice['waktu_berakhir_acara'].' WIB<br>'.$invoice['lokasi_acara'].'</div></td><td style="text-align:center;line-height:1.2;padding:8px 12px;font-size:13px;"><div class="editable__"><b><br>'.$invoice['nama'].'</b><br>Ref: Online<br></div></td></tr><tr><td colspan="2"><table><tbody><tr><td colspan="3" style="text-align:center;white-space:nowrap;font-size:12px;font-weight:700;width:33.33333%;"> Powered by <a href="'.$url.'">eventsharing.com</a></td></tr></tbody></table></div></div></div>';

                        $mail = new PHPMailer();

                        $mail->IsSMTP(); 

                        $mail->SMTPOptions = array(
                            'ssl' => array(
                                'verify_peer' => false,
                                'verify_peer_name' => false,
                                'allow_self_signed' => true
                                )
                            );

                        $mail->Host = "smtp.gmail.com"; 
                        $mail->SMTPDebug = 0;  
                        $mail->SMTPAuth = true;  
                        $mail->SMTPSecure = "tls";  
                        $mail->Host = "smtp.gmail.com";  
                        $mail->Port = 587;  
        $mail->Username = "tugaskuliahdemikelulusan@gmail.com"; // GMAIL username 
        $mail->Password = "12345678ab$"; // GMAIL password

        $mail->SetFrom('tugaskuliahdemikelulusan@gmail.com', 'Event Sharing');

        $mail->AddReplyTo("tugaskuliahdemikelulusan@gmail.com", "Event Sharing");

        $mail->Subject = "Tiket ".$invoice['nama_tiket'];

        $mail->AltBody = "Untuk melihat pesan, mohon gunakan pembaca email yang kompatibel dengan HTML!";

        $mail->MsgHTML($isi);

        $address = $email; 
        $mail->AddAddress($address);

        $mail->Send();

    }

    function tampil_invoice($email) 
    {
        $this->db->join('tiket', 'pengunjung.id_tiket = tiket.id_tiket', 'left');
        $this->db->join('event', 'tiket.id_event = event.id_event', 'left');
        $this->db->join('kategori', 'event.id_kategori = kategori.id_kategori', 'left');
        $this->db->where('email', $email);
        $ambil = $this->db->get('pengunjung');
        $data = $ambil->row_array();

        return $data;
    }

    function total_tiket($id_user) 
    {
        $this->db->where('id_user', $id_user);
        $ambil = $this->db->get('pengunjung');
        $data = $ambil->result_array();
        return $data;
    }

    function total_event($id_user) 
    {
        $this->db->where('id_user', $id_user);
        $this->db->where('status', 'Publish');
        $ambil = $this->db->get('event');
        $data = $ambil->result_array();
        return $data;
    }

    function total_pengunjung($id_event) 
    {
        $this->db->where('id_event', $id_event);
        $ambil = $this->db->get('tiket');
        $data = $ambil->result_array();

        $semua = array();
        foreach ($data as $key => $value) {
            $this->db->where('id_tiket', $value['id_tiket']);
            $ambil1 = $this->db->get('pengunjung');
            $data1 = $ambil1->result_array();
            $value['total'] = $data1;

            $semua[] = $value;
        }
        
        return $semua;
    }

    function cari_id_kategori($id_kategori)
    {
        $ambil = $this->db->query("SELECT event.id_event, kategori.id_kategori, id_tiket, nama_kategori, nama_event, tgl_mulai_acara, tgl_berakhir_acara, waktu_mulai_acara, waktu_berakhir_acara, lokasi_acara, banner, url_event, tgl_berakhir_order, tiket_disediakan FROM event JOIN kategori ON event.id_kategori = kategori.id_kategori JOIN tiket ON event.id_event = tiket.id_event WHERE status = 'Publish' AND kategori.id_kategori LIKE '$id_kategori'");
        $data = $ambil->result_array();

        return $data;
    }

    function cari_id_kategori1($id_kategori55)
    {
        $ambil = $this->db->query("SELECT event.id_event, kategori.id_kategori, id_tiket, nama_kategori, nama_event, tgl_mulai_acara, tgl_berakhir_acara, waktu_mulai_acara, waktu_berakhir_acara, lokasi_acara, banner, url_event, tgl_berakhir_order, tiket_disediakan FROM event JOIN kategori ON event.id_kategori = kategori.id_kategori JOIN tiket ON event.id_event = tiket.id_event WHERE status = 'Publish' AND kategori.id_kategori LIKE '$id_kategori55'");
        $data = $ambil->result_array();

        return $data;
    }

    function cari_tgl_mulai_acara($tgl_mulai_acara)
    {
        $ambil = $this->db->query("SELECT event.id_event, kategori.id_kategori, id_tiket, nama_kategori, nama_event, tgl_mulai_acara, tgl_berakhir_acara, waktu_mulai_acara, waktu_berakhir_acara, lokasi_acara, banner, url_event, tgl_berakhir_order, tiket_disediakan FROM event JOIN kategori ON event.id_kategori = kategori.id_kategori JOIN tiket ON event.id_event = tiket.id_event WHERE status = 'Publish' AND tgl_mulai_acara LIKE '$tgl_mulai_acara'");
        $data = $ambil->result_array();

        return $data;
    }

    function cari_tgl_berakhir_acara($tgl_berakhir_acara)
    {
        $ambil = $this->db->query("SELECT event.id_event, kategori.id_kategori, id_tiket, nama_kategori, nama_event, tgl_mulai_acara, tgl_berakhir_acara, waktu_mulai_acara, waktu_berakhir_acara, lokasi_acara, banner, url_event, tgl_berakhir_order, tiket_disediakan FROM event JOIN kategori ON event.id_kategori = kategori.id_kategori JOIN tiket ON event.id_event = tiket.id_event WHERE status = 'Publish' AND tgl_berakhir_acara LIKE '$tgl_berakhir_acara'");
        $data = $ambil->result_array();

        return $data;
    }

    function cari_tgl_acara($tgl_mulai_acara, $tgl_berakhir_acara)
    {
        $ambil = $this->db->query("SELECT event.id_event, kategori.id_kategori, id_tiket, nama_kategori, nama_event, tgl_mulai_acara, tgl_berakhir_acara, waktu_mulai_acara, waktu_berakhir_acara, lokasi_acara, banner, url_event, tgl_berakhir_order, tiket_disediakan FROM event JOIN kategori ON event.id_kategori = kategori.id_kategori JOIN tiket ON event.id_event = tiket.id_event WHERE status = 'Publish' AND tgl_berakhir_acara BETWEEN '$tgl_mulai_acara' AND '$tgl_berakhir_acara' ");
        $data = $ambil->result_array();

        return $data;
    }

    function cari_lokasi_acara($lokasi_acara)
    {
        $ambil = $this->db->query("SELECT event.id_event, kategori.id_kategori, id_tiket, nama_kategori, nama_event, tgl_mulai_acara, tgl_berakhir_acara, waktu_mulai_acara, waktu_berakhir_acara, lokasi_acara, banner, url_event, tgl_berakhir_order, tiket_disediakan FROM event JOIN kategori ON event.id_kategori = kategori.id_kategori JOIN tiket ON event.id_event = tiket.id_event WHERE status = 'Publish' AND lokasi_acara LIKE '%$lokasi_acara%' ");
        $data = $ambil->result_array();

        return $data;
    }

}
?>