<?php
defined('BASEPATH') or exit('No direct script access 
allowed');



class detail_model extends CI_Model
{
    public $table = 'detail_checkout';
    public $id = 'detail_checkout.id';
    public function __construct()
    {
        parent::__construct();
    }
    public function get()
    {
        $this->db->select('k.*,s.nama as nama, s.harga as harga');
        $this->db->from('checkout k');
        $this->db->join('parfum s', 'k.id_buku=s.id');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getById($id)
    {
        $this->db->select('d.*,r.nama as nama, s.merk_parfum as parfum');
        $this->db->from('detail_checkout d');
        $this->db->join('user r', 'd.id_user = r.id');
        $this->db->join('parfum s', 'd.id_parfum = s.id');
        $this->db->where('d.no_checkout', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getByUser($id)
    {
        $idu = $this->session->userdata('id');
        $this->db->select('d.*, s.merk_parfum as nama_parfum');
        $this->db->from('detail_checkout d');
        $this->db->join('parfum s', 'd.id_parfum = s.id');
        $this->db->where('d.no_checkout', $id, 'AND d.id_user=' . $idu);
        $this->db->where('d.id_user=' . $idu);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function insert($data)
    {
        return $this->db->insert_batch($this->table, $data);
    }

    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }

    public function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }
    function charts()
    {
        $this->db->select('d.*, s.merk_parfum as parfum, sum(d.jumlah) as jum');
        $this->db->from('detail_checkout d');
        $this->db->join('parfum s', 'd.id_parfum = s.id');
        $this->db->group_by('d.id_parfum');
        $query = $this->db->get();
        return $query->result_array();
    }
}