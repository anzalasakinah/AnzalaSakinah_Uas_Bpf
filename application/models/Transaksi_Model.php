<?php
defined('BASEPATH') or exit('No direct script access 
allowed');



class Transaksi_model extends CI_Model
{
    public $table = 'transaksi';
    public $id = 'transaksi.id';
    public function __construct()
    {
        parent::__construct();
    }
    public function get()
    {
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function getById($id)
    {
        $this->db->from($this->table);
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }
    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
    public function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }
    public function getByIdP($id)
    {
        $this->db->select('p.*,r.nama as nama');
        $this->db->from('transaksi p');
        $this->db->join('user r', 'p.id_user = r.id');
        $this->db->where('p.no_checkout', $id);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function updatestatus($status, $nojual)
    {
        $this->db->set('status', $status);
        $this->db->where('no_checkout', $nojual);
        $this->db->update($this->table);
        return $this->db->affected_rows();
    }
    public function getByUser()
    {
        $id = $this->session->userdata('id');
        $this->db->from($this->table);
        $this->db->where('id_user', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getByUser2($id)
    {
        $idu = $this->session->userdata('id');
        $this->db->from($this->table);
        $this->db->where('id_user', $idu);
        $this->db->where('no_checkout', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function ttransaksi()
{
    $this->db->from($this->table);
    $query = $this->db->get();
    return $query->num_rows();
}
}
