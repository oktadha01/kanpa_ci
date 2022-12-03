<?php
class M_perum extends CI_Model
{

    function m_data_perum()
    {

        // if ($title == 'perumahan') {

        $this->db->select('*');
        $this->db->from('perum');
        // $this->db->where('id_perum');
        $this->db->order_by('id_perum', 'desc');
        $query = $this->db->get();
        return $query->result();
        
    }
    function m_simpan_perum($logo, $nm_perum, $url_map, $map, $deskripsi)
    {
        $data = array(
            'nm_perum' => $nm_perum,
            'url_map' => $url_map,
            'map' => $map,
            'deskripsi' => $deskripsi,
            'logo' => $logo,
        );
        $result = $this->db->insert('perum', $data);
        return $result;
    }
    function m_edit_perum($id_perum, $nm_perum, $alamat, $url_map, $map, $deskripsi)
    {
        $update = $this->db->set('nm_perum', $nm_perum)
            ->set('alamat', $alamat)
            ->set('url_map', $url_map)
            ->set('map', $map)
            ->set('deskripsi', $deskripsi)
            ->where('id_perum', $id_perum)
            ->update('perum');
        return $update;
    }
    function m_edit_logo_perum($id_perum, $logo, $nm_perum, $alamat, $url_map, $map, $deskripsi)
    {
        $update = $this->db->set('nm_perum', $nm_perum)
            ->set('alamat', $alamat)
            ->set('url_map', $url_map)
            ->set('map', $map)
            ->set('deskripsi', $deskripsi)
            ->set('logo', $logo)
            ->where('id_perum', $id_perum)
            ->update('perum');
        return $update;
    }
    // function m_data_foto_service($id_service)
    // {
    //     $this->db->select('*');
    //     $this->db->from('foto');
    //     $this->db->where('id_foto_service', $id_service);
    //     $this->db->order_by('id_foto', 'desc');
    //     $query = $this->db->get();
    //     return $query->result();
    // }
    // function m_data_project_service($id_service)
    // {
    //     $this->db->select('*');
    //     $this->db->from('project_service');
    //     $this->db->where('id_service_project', $id_service);
    //     $this->db->order_by('id_project', 'desc');
    //     $query = $this->db->get();
    //     return $query->result();
    // }
    // function m_edit_desc_service($id_service, $desc)
    // {
    //     $update = $this->db->set('desc', $desc)
    //         ->where('id_service', $id_service)
    //         ->update('service');
    //     return $update;
    // }
    // function m_save_project($id_service, $desc_project, $nm_perum)
    // {
    //     $data = array(
    //         'id_service_project' => $id_service,
    //         'tittle_project' => $tittle_project,
    //         'desc_project' => $desc_project,
    //     );
    //     $result = $this->db->insert('project_service', $data);
    //     return $result;
    // }
    // function m_edit_project($id_project, $tittle_project, $desc_project)
    // {
    //     $update = $this->db->set('tittle_project', $tittle_project)
    //         ->set('desc_project', $desc_project)
    //         ->where('id_project', $id_project)
    //         ->update('project_service');
    //     return $update;
    // }
    // function m_save_foto_service($id_foto_service, $foto_service, $tittle_foto_service, $orientasi_foto)
    // {
    //     $data = array(
    //         'id_foto_service' => $id_foto_service,
    //         'foto_service' => $foto_service,
    //         'tittle_foto_service' => $tittle_foto_service,
    //         'orientasi_foto' => $orientasi_foto,
    //     );
    //     $result = $this->db->insert('foto', $data);
    //     return $result;
    // }

    // function m_edit_foto_service($id_foto, $foto_service, $tittle_foto_service, $orientasi_foto)
    // {
    //     $update_foto = $this->db->set('foto_service', $foto_service)
    //         ->set('tittle_foto_service', $tittle_foto_service)
    //         ->set('orientasi_foto', $orientasi_foto)
    //         ->where('id_foto', $id_foto)
    //         ->update('foto');
    //     return $update_foto;
    // }
    // function m_edit_tittle_foto_service($id_foto, $tittle_foto_service, $orientasi_foto)
    // {

    //     $update = $this->db->set('tittle_foto_service', $tittle_foto_service)
    //         ->set('orientasi_foto', $orientasi_foto)
    //         ->where('id_foto', $id_foto)
    //         ->update('foto');
    //     return $update;
    // }

    // function m_hapus_foto_service($id_foto)
    // {
    //     $delete_foto = $this->db->where('id_foto', $id_foto)
    //         ->delete('foto');
    //     return $delete_foto;
    // }
}
