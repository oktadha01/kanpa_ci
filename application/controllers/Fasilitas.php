<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fasilitas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_fasilitas');
    }

    function data()
    {
        $tittle = $this->uri->segment(3);

        $data['_title'] = $tittle;
        $data['_script'] = 'fasilitas/fasilitas_js';
        $data['_view'] = 'fasilitas/fasilitas';
        $data['data_perum'] = $this->m_fasilitas->m_data_perum();
        $this->load->view('layout/index', $data);
    }
    function data_fasilitas_perum()
    {
        $id_fasilitas_perum = $this->input->post('id-fasilitas-perum');
        $data['data_fasilitas'] = $this->m_fasilitas->m_data_fasilitas_perum($id_fasilitas_perum);
        $data['_view'] = 'fasilitas/data_fasilitas';
        $this->load->view('fasilitas/data_fasilitas', $data);
    }
    function add_data_fasilitas()
    {
        $id_fasilitas_perum = $this->input->post('id-fasilitas-perum');
        $nm_fasilitas = $this->input->post('nm-fasilitas');
        $insert = $this->m_fasilitas->m_add_data_fasilitas($nm_fasilitas, $id_fasilitas_perum);
        echo json_encode($insert);
    }
    // function simpan_perum()
    // {
    //     $config['upload_path'] = "./upload/";
    //     $config['allowed_types'] = 'gif|jpg|png';
    //     $config['encrypt_name'] = TRUE;

    //     $this->load->library('upload', $config);

    //     if ($this->upload->do_upload("logo")) {
    //         $data = array('upload_data' => $this->upload->data());
    //         $nm_perum = $this->input->post('nm-perum');
    //         $alamat = $this->input->post('alamat');
    //         $url_map = $this->input->post('url-map');
    //         $map = $this->input->post('map');
    //         $deskripsi = $this->input->post('deskripsi');
    //         $logo = $data['upload_data']['file_name'];
    //         $uploadedImage = $this->upload->data();

    //         $this->resizeImage($uploadedImage['file_name']);
    //         $insert = $this->m_perum->m_simpan_perum($logo, $nm_perum, $alamat, $url_map, $map, $deskripsi);
    //         echo json_encode($insert);
    //     }
    //     exit;
    // }
    // function edit_perum()
    // {
    //     $action_change_logo = $this->input->post('ubah-logo');
    //     if ($action_change_logo == 'change-logo') {
    //         $logo_lama = $this->input->post('logo-lama');
    //         unlink('./upload/' . $logo_lama);

    //         $config['upload_path'] = "./upload/";
    //         $config['allowed_types'] = 'gif|jpg|png';
    //         $config['encrypt_name'] = TRUE;

    //         $this->load->library('upload', $config);

    //         if ($this->upload->do_upload("logo")) {
    //             $data = array('upload_data' => $this->upload->data());
    //             $id_perum = $this->input->post('id-perum');
    //             $nm_perum = $this->input->post('nm-perum');
    //             $alamat = $this->input->post('alamat');
    //             $url_map = $this->input->post('url-map');
    //             $map = $this->input->post('map');
    //             $deskripsi = $this->input->post('deskripsi');
    //             $logo = $data['upload_data']['file_name'];
    //             $uploadedImage = $this->upload->data();

    //             $this->resizeImage($uploadedImage['file_name']);
    //             $update = $this->m_perum->m_edit_logo_perum($id_perum, $logo, $nm_perum, $alamat, $url_map, $map, $deskripsi);
    //             echo json_encode($update);
    //         }
    //         exit;
    //     } else {
    //         $id_perum = $this->input->post('id-perum');
    //         $nm_perum = $this->input->post('nm-perum');
    //         $alamat = $this->input->post('alamat');
    //         $url_map = $this->input->post('url-map');
    //         $map = $this->input->post('map');
    //         $deskripsi = $this->input->post('deskripsi');
    //         $update = $this->m_perum->m_edit_perum($id_perum, $nm_perum, $alamat, $url_map, $map, $deskripsi);
    //         echo json_encode($update);
    //     }
    // }
    // function resizeImage($filename)
    // {
    //     $source_path = 'upload/' . $filename;
    //     $target_path = 'upload/';
    //     $config = [
    //         'image_library' => 'gd2',
    //         'source_image' => $source_path,
    //         'new_image' => $target_path,
    //         'maintain_ratio' => TRUE,
    //         'quality' => '50%',
    //         'width' => 'auto',
    //         'height' => '2560',
    //     ];
    //     $this->load->library('image_lib', $config);
    //     if (!$this->image_lib->resize()) {
    //         return [
    //             'status' => 'error compress',
    //             'message' => $this->image_lib->display_errors()
    //         ];
    //     }
    //     $this->image_lib->clear();
    //     return 1;
    // }
}
