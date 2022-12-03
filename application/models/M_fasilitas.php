<?php
class M_fasilitas extends CI_Model
{

    function m_data_perum()
    {

        $this->db->select('*');
        $this->db->from('perum');
        $this->db->order_by('id_perum', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
    function m_data_fasilitas_perum($id_fasilitas_perum)
    {

        $this->db->select('*');
        $this->db->from('fasilitas');
        $this->db->where('id_fasilitas_perum', $id_fasilitas_perum);
        $this->db->order_by('id_fasilitas', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
    function m_add_data_fasilitas($nm_fasilitas, $id_fasilitas_perum)
    {
        $data = array(
            'id_fasilitas_perum' => $id_fasilitas_perum,
            'nm_fasilitas' => $nm_fasilitas,
        );
        $result = $this->db->insert('fasilitas', $data);
        return $result;
    }
}
