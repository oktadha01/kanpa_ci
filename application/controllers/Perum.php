<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perum extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_perum');
    }

    function data()
    {
        $tittle = $this->uri->segment(3);

        $data['_title'] = $tittle;
        $data['_script'] = 'perum/perum_js';
        $data['_view'] = 'perum/perum';
        $this->load->view('layout/index', $data);
    }
    function data_perum()
    {
        $data['data_perum'] = $this->m_perum->m_data_perum();
        $data['_view'] = 'perum/data_perum';
        $this->load->view('perum/data_perum', $data);
    }
    function simpan_perum()
    {
        $config['upload_path'] = "./upload/";
        $config['allowed_types'] = 'gif|jpg|png';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload("logo")) {
            $data = array('upload_data' => $this->upload->data());
            $nm_perum = $this->input->post('nm-perum');
            $alamat = $this->input->post('alamat');
            $url_map = $this->input->post('url-map');
            $map = $this->input->post('map');
            $deskripsi = $this->input->post('deskripsi');
            $logo = $data['upload_data']['file_name'];
            $uploadedImage = $this->upload->data();

            $this->resizeImage($uploadedImage['file_name']);
            $insert = $this->m_perum->m_simpan_perum($logo, $nm_perum, $alamat, $url_map, $map, $deskripsi);
            echo json_encode($insert);
        }
        exit;
    }
    function edit_perum()
    {
        $action_change_logo = $this->input->post('ubah-logo');
        if ($action_change_logo == 'change-logo') {
            $logo_lama = $this->input->post('logo-lama');
            unlink('./upload/' . $logo_lama);

            $config['upload_path'] = "./upload/";
            $config['allowed_types'] = 'gif|jpg|png';
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload("logo")) {
                $data = array('upload_data' => $this->upload->data());
                $id_perum = $this->input->post('id-perum');
                $nm_perum = $this->input->post('nm-perum');
                $alamat = $this->input->post('alamat');
                $url_map = $this->input->post('url-map');
                $map = $this->input->post('map');
                $deskripsi = $this->input->post('deskripsi');
                $logo = $data['upload_data']['file_name'];
                $uploadedImage = $this->upload->data();

                $this->resizeImage($uploadedImage['file_name']);
                $update = $this->m_perum->m_edit_logo_perum($id_perum, $logo, $nm_perum, $alamat, $url_map, $map, $deskripsi);
                echo json_encode($update);
            }
            exit;
        } else {
            $id_perum = $this->input->post('id-perum');
            $nm_perum = $this->input->post('nm-perum');
            $alamat = $this->input->post('alamat');
            $url_map = $this->input->post('url-map');
            $map = $this->input->post('map');
            $deskripsi = $this->input->post('deskripsi');
            $update = $this->m_perum->m_edit_perum($id_perum, $nm_perum, $alamat, $url_map, $map, $deskripsi);
            echo json_encode($update);
        }
    }
    function resizeImage($filename)
    {
        $source_path = 'upload/' . $filename;
        $target_path = 'upload/';
        $config = [
            'image_library' => 'gd2',
            'source_image' => $source_path,
            'new_image' => $target_path,
            'maintain_ratio' => TRUE,
            'quality' => '50%',
            'width' => 'auto',
            'height' => '2560',
        ];
        $this->load->library('image_lib', $config);
        if (!$this->image_lib->resize()) {
            return [
                'status' => 'error compress',
                'message' => $this->image_lib->display_errors()
            ];
        }
        $this->image_lib->clear();
        return 1;
    }
    // function data_foto_perum()
    // {
    //     $id_perum = $this->input->post('id-perum');

    //     $data['data_foto_service'] = $this->m_perum->m_data_foto_service($id_perum);
    //     $data['_view'] = 'perum/data_foto_perum';
    //     $this->load->view('perum/data_foto_perum', $data);
    // }
    // function data_perum()
    // {
    //     $id_perum = $this->input->post('id-perum');

    //     $data['data_perum'] = $this->m_perum->m_data_perum($id_perum);
    //     $data['_view'] = 'perum/data_perum';
    //     $this->load->view('perum/data_perum', $data);
    // }

    // function edit_desc_service()
    // {

    //     $id_service = $this->input->post('id-service');
    //     $desc = $this->input->post('desc');
    //     $update = $this->m_perum->m_edit_desc_service($id_service, $desc);
    //     echo json_encode($update);
    // }
    // function save_project()
    // {
    //     $id_service = $this->input->post('id-service');
    //     $tittle_project = $this->input->post('tittle-project');
    //     $desc_project = $this->input->post('desc-project');
    //     $insert = $this->m_perum->m_save_project($id_service, $desc_project, $tittle_project);
    //     echo json_encode($insert);
    // }
    // function edit_project()
    // {

    //     $id_project = $this->input->post('id-project');
    //     $tittle_project = $this->input->post('tittle-project');
    //     $desc_project = $this->input->post('desc-project');
    //     $update = $this->m_perum->m_edit_project($id_project, $tittle_project, $desc_project);
    //     echo json_encode($update);
    // }


    // function save_foto_service()
    // {

    //     $config['upload_path'] = "./upload/service/";
    //     $config['allowed_types'] = 'gif|jpg|png';
    //     $config['encrypt_name'] = TRUE;

    //     $this->load->library('upload', $config);

    //     if ($this->upload->do_upload("foto-service")) {
    //         $data = array('upload_data' => $this->upload->data());

    //         $id_foto_service = $this->input->post('id-service');
    //         $foto_service = $data['upload_data']['file_name'];
    //         $tittle_foto_service = $this->input->post('tittle-foto-service');
    //         $orientasi_foto = $this->input->post('orientasi-foto');
    //         $uploadedImage = $this->upload->data();

    //         $this->resizeImage($uploadedImage['file_name']);
    //         $insert = $this->m_perum->m_save_foto_service($id_foto_service, $foto_service, $tittle_foto_service, $orientasi_foto);
    //         echo json_encode($insert);
    //     }
    //     exit;
    // }
    // function edit_foto_service()
    // {
    //     $action_foto = $this->input->post('action-foto');
    //     $id_foto = $this->input->post('id-foto');
    //     $tittle_foto_service = $this->input->post('tittle-foto-service');
    //     $foto_lama = $this->input->post('foto-lama');
    //     $orientasi_foto = $this->input->post('orientasi-foto');
    //     if ($action_foto == 'change-foto') {
    //         unlink('./upload/service/' . $foto_lama);
    //         $config['upload_path'] = "./upload/service/";
    //         $config['allowed_types'] = 'gif|jpg|png';
    //         $config['encrypt_name'] = TRUE;

    //         $this->load->library('upload', $config);

    //         if ($this->upload->do_upload("foto-service")) {
    //             $data = array('upload_data' => $this->upload->data());

    //             // $action_foto = $this->input->post('action-foto');
    //             $id_foto = $this->input->post('id-foto');
    //             $foto_service = $data['upload_data']['file_name'];
    //             $tittle_foto_service = $this->input->post('tittle-foto-service');

    //             $uploadedImage = $this->upload->data();

    //             $this->resizeImage($uploadedImage['file_name']);
    //             $update = $this->m_perum->m_edit_foto_service($id_foto, $foto_service, $tittle_foto_service, $orientasi_foto, $action_foto);
    //             echo json_encode($update);
    //         }
    //         exit;
    //     } else {

    //         $update = $this->m_perum->m_edit_tittle_foto_service($id_foto, $tittle_foto_service, $orientasi_foto, $action_foto);
    //         echo json_encode($update);
    //     }
    // }
    // function hapus_foto_service()
    // {
    //     $foto_lama = $this->input->post('foto-lama');
    //     unlink('./upload/service/' . $foto_lama);

    //     $id_foto = $this->input->post('id-foto');
    //     $data = $this->m_perum->m_hapus_foto_service($id_foto);
    //     echo json_encode($data);
    // }

}
