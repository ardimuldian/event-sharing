<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mpengaturan extends CI_Model {

    // --------------------- Model untuk admin ---------------------
    function ambil_config($id_config) 
    {
        $this->db->where('id_config', $id_config);
        $ambil = $this->db->get('config');
        $data = $ambil->row_array();
        return $data;
    }    

    function ubah_meta($inputan,$id_config) 
    {
        $this->db->where('id_config', $id_config);
        $this->db->update('config', $inputan);
    }

    function ubah_sosmed($inputan,$id_config) 
    {
        $this->db->where('id_config', $id_config);
        $this->db->update('config', $inputan);
    }

    function ubah_tampilan($inputan,$id_config){

        $tampilan = $this->ambil_config($id_config);

        $config['upload_path'] = './assets/img/favicon';
        $config['allowed_types'] = 'jpg|png|gif|jpeg';
        $config['max_size'] = 2048;
        $this->load->library('upload', $config);
        $upload_favicon = $this->upload->do_upload('favicon');

        $config['upload_path'] = './assets/img/logo';
        $config['allowed_types'] = 'jpg|png|gif|jpeg';
        $config['max_size'] = 2048;
        $this->load->library('upload', $config);
        $upload_logo = $this->upload->do_upload('logo');

        if($upload_favicon && $upload_logo){

            if(file_exists("./assets/img/favicon/".$tampilan['favicon'])){

                unlink("./assets/img/favicon/".$tampilan['favicon']);
            }

            $inputan['favicon'] = $this->upload->data('file_name');

            if(file_exists("./assets/img/logo/".$tampilan['logo'])){

                unlink("./assets/img/logo/".$tampilan['logo']);
            }

            $inputan['logo'] = $this->upload->data('file_name');
            
            $this->db->update('config', $inputan,array('id_config'=>$id_config));
        }

        if($upload_favicon && empty($upload_logo)){

            if(file_exists("./assets/img/favicon/".$tampilan['favicon'])){

                unlink("./assets/img/favicon/".$tampilan['favicon']);
            }

            $inputan['favicon'] = $this->upload->data('file_name');
            
            $this->db->update('config', $inputan,array('id_config'=>$id_config));
        }

        if(empty($upload_favicon) && $upload_logo){

            if(file_exists("./assets/img/logo/".$tampilan['logo'])){

                unlink("./assets/img/logo/".$tampilan['logo']);
            }
            $inputan['logo'] = $this->upload->data('file_name');
            
            $this->db->update('config', $inputan,array('id_config'=>$id_config));
        }

        if(empty($upload_favicon) && empty($upload_logo))
        {
            $this->db->update('config', $inputan,array('id_config'=>$id_config));
        }

    }

    function ambil_support($id_support) 
    {
        $this->db->where('id_support', $id_support);
        $ambil = $this->db->get('support');
        $data = $ambil->row_array();
        return $data;
    }

    function ubah_support($id_support)
    {
        if ($_FILES['cover_support1']['name'] AND $_FILES['cover_support2']['name'] AND $_FILES['cover_support3']['name'] AND $_FILES['cover_support4']['name'] AND $_FILES['cover_support5']['name']) 
        {   
            move_uploaded_file($_FILES['cover_support1']['tmp_name'], "./assets/img/support/".$_FILES['cover_support1']['name']);
            move_uploaded_file($_FILES['cover_support2']['tmp_name'], "./assets/img/support/".$_FILES['cover_support2']['name']);
            move_uploaded_file($_FILES['cover_support3']['tmp_name'], "./assets/img/support/".$_FILES['cover_support3']['name']);
            move_uploaded_file($_FILES['cover_support4']['tmp_name'], "./assets/img/support/".$_FILES['cover_support4']['name']);
            move_uploaded_file($_FILES['cover_support5']['tmp_name'], "./assets/img/support/".$_FILES['cover_support5']['name']);

            $inputan['cover_support1'] = $_FILES['cover_support1']['name'];
            $inputan['cover_support2'] = $_FILES['cover_support2']['name'];
            $inputan['cover_support3'] = $_FILES['cover_support3']['name'];
            $inputan['cover_support4'] = $_FILES['cover_support4']['name'];
            $inputan['cover_support5'] = $_FILES['cover_support5']['name'];

            $this->db->update('support', $inputan, array('id_support'=>$id_support));
        }

        if (empty($_FILES['cover_support1']['name']) AND $_FILES['cover_support2']['name'] AND $_FILES['cover_support3']['name'] AND $_FILES['cover_support4']['name'] AND $_FILES['cover_support5']['name']) 
        {
            move_uploaded_file($_FILES['cover_support2']['tmp_name'], "./assets/img/support/".$_FILES['cover_support2']['name']);
            move_uploaded_file($_FILES['cover_support3']['tmp_name'], "./assets/img/support/".$_FILES['cover_support3']['name']);
            move_uploaded_file($_FILES['cover_support4']['tmp_name'], "./assets/img/support/".$_FILES['cover_support4']['name']);
            move_uploaded_file($_FILES['cover_support5']['tmp_name'], "./assets/img/support/".$_FILES['cover_support5']['name']);

            $inputan['cover_support2'] = $_FILES['cover_support2']['name'];
            $inputan['cover_support3'] = $_FILES['cover_support3']['name'];
            $inputan['cover_support4'] = $_FILES['cover_support4']['name'];
            $inputan['cover_support5'] = $_FILES['cover_support5']['name'];

            $this->db->update('support', $inputan, array('id_support'=>$id_support));
        }

        if (empty($_FILES['cover_support1']['name']) AND empty($_FILES['cover_support2']['name']) AND $_FILES['cover_support3']['name'] AND $_FILES['cover_support4']['name'] AND $_FILES['cover_support5']['name']) 
        {
            move_uploaded_file($_FILES['cover_support3']['tmp_name'], "./assets/img/support/".$_FILES['cover_support3']['name']);
            move_uploaded_file($_FILES['cover_support4']['tmp_name'], "./assets/img/support/".$_FILES['cover_support4']['name']);
            move_uploaded_file($_FILES['cover_support5']['tmp_name'], "./assets/img/support/".$_FILES['cover_support5']['name']);

            $inputan['cover_support3'] = $_FILES['cover_support3']['name'];
            $inputan['cover_support4'] = $_FILES['cover_support4']['name'];
            $inputan['cover_support5'] = $_FILES['cover_support5']['name'];

            $this->db->update('support', $inputan, array('id_support'=>$id_support));
        }

        if (empty($_FILES['cover_support1']['name']) AND empty($_FILES['cover_support2']['name']) AND empty($_FILES['cover_support3']['name']) AND $_FILES['cover_support4']['name'] AND $_FILES['cover_support5']['name']) 
        {
            move_uploaded_file($_FILES['cover_support4']['tmp_name'], "./assets/img/support/".$_FILES['cover_support4']['name']);
            move_uploaded_file($_FILES['cover_support5']['tmp_name'], "./assets/img/support/".$_FILES['cover_support5']['name']);

            $inputan['cover_support4'] = $_FILES['cover_support4']['name'];
            $inputan['cover_support5'] = $_FILES['cover_support5']['name'];

            $this->db->update('support', $inputan, array('id_support'=>$id_support));
        }

        if (empty($_FILES['cover_support1']['name']) AND empty($_FILES['cover_support2']['name']) AND empty($_FILES['cover_support3']['name']) AND empty($_FILES['cover_support4']['name']) AND $_FILES['cover_support5']['name']) 
        {
            move_uploaded_file($_FILES['cover_support5']['tmp_name'], "./assets/img/support/".$_FILES['cover_support5']['name']);

            $inputan['cover_support5'] = $_FILES['cover_support5']['name'];

            $this->db->update('support', $inputan, array('id_support'=>$id_support));
        }

    }

}
?>