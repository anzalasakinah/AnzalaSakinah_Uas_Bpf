<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // is_logged_in();
        $this->load->model('Parfum_model');
        $this->load->model('Transaksi_model');
        $this->load->model('User_model');
        $this->load->model('Detail_model');
    }
    function index()
    {
        // $data['judul'] = "Halaman Penjualan";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['parfum'] = $this->Parfum_model->tparfum();
        $data['transaksi'] = $this->Transaksi_model->ttransaksi();
        $data['totalb'] = $this->Detail_model->charts();
        $data['us'] = $this->User_model->tuser();
        $this->load->view("layout/header", $data);
        $this->load->view("auth/dashboard", $data);
        $this->load->view("layout/footer");
    }
}