<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model', 'userrole');
        $this->load->model('Checkout_model');
        $this->load->model('Parfum_model');
        $this->load->model('Detail_model');
        $this->load->model('Transaksi_model');
        // $this->load->model('Detail_model');
    }
    public function index()
    {
        $data['judul'] = "Halaman Profil";
        $data['user'] = $this->userrole->getBy();

        $this->load->view("layout/header", $data);
        $this->load->view("profil/vw_profil", $data);
        $this->load->view("layout/footer");
    }
    public function parfum()
    {
        $data['judul'] = "Daftar parfum";
        $data['user'] = $this->userrole->getBy();
        $data['parfum'] = $this->Parfum_model->get();

        $this->load->view("layout/header", $data);
        $this->load->view("profil/vw_parfum", $data);
        $this->load->view("layout/footer", $data);
    }
    public function checkout($id)
    {
        $data['checkout'] = $this->Checkout_model->get();
        $data['judul'] = "Detail Checkout";
        $data['user'] = $this->userrole->getBy();
        $data['parfum'] = $this->Parfum_model->getById($id);
       
        $this->form_validation->set_rules('jumlah',  'Jumlah', 'required', [
            'required' => 'Jumlah Wajib di isi'
        ]);
        if ($this->form_validation->run() == false) {
           
            $this->load->view("layout/header", $data);
            $this->load->view("profil/vw_checkout", $data);
            $this->load->view("layout/footer");
        } else {
            $data = [
                'id_user' => $this->session->userdata('id'),
                'id_parfum' => $this->input->post('id'),
                'jumlah' => $this->input->post('jumlah'),
                'diskon' => $this->input->post('diskon'),
                'total' => $this->input->post('total'),
                'tanggal' => $this->input->post('tanggal'),
                
                
            ];
            $this->Checkout_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Parfum berhasil ditambahkan ke Checkout!</div>');
            redirect('Profil/detail');
        }
    }
    public function detail()
    {
        $data['checkout'] = $this->Checkout_model->get();
        $data['judul'] = "Detail Checkout";
        $data['user'] = $this->userrole->getBy();
        $data['parfum'] = $this->Parfum_model->get();
      
        $this->load->view("layout/header", $data);
        $this->load->view("profil/vw_detail_checkout", $data);
        $this->load->view("layout/footer");

    }
    public function delcheckout($id)
    {
        $this->Checkout_model->delete($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Parfum berhasil dihapus dari checkout!</div>');
        redirect('Profil/detail');
    }
    public function transaksi()
    {
        $jumlah_beli = count($this->input->post('parfum'));
        $data_p = [
            'no_checkout' => $this->input->post('no_checkout'),
            'id_user' => $this->session->userdata('id'),
            'nama_pengirim' => $this->input->post('nama_pengirim'),
            'tanggal' => $this->input->post('tanggal'),
            'total_bayar' => $this->input->post('total_bayar'),
            'alamat' => $this->input->post('alamat'),
            'no_hp' => $this->input->post('no_hp'),
            'pembayaran' => $this->input->post('pembayaran'),
            'keterangan' => $this->input->post('keterangan'),

        ];
        $upload_image = $_FILES['gambar']['name'];
        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/img/transaksi/';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('gambar')) {
                $new_image = $this->upload->data('file_name');
                $this->db->set('gambar', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
        }
        $data_detail = [];
        for ($i = 0; $i < $jumlah_beli; $i++) {
            array_push($data_detail, ['id_parfum' => $this->input->post('parfum')[$i]]);
            $data_detail[$i]['no_checkout'] = $this->input->post('no_checkout');
            $data_detail[$i]['id_user'] = $this->session->userdata('id');
            $data_detail[$i]['diskon'] = $this->input->post('diskon');
            $data_detail[$i]['jumlah'] = $this->input->post('jumlah_p')[$i];
            $data_detail[$i]['total'] = $this->input->post('total_p')[$i];
        }
        // print_r($data_detail);
        // die;
        if ($this->Transaksi_model->insert($data_p, $upload_image) && $this->Detail_model->insert($data_detail)) {
            for ($i = 0; $i < $jumlah_beli; $i++){
                $this->Parfum_model->min_stok($data_detail[$i]['jumlah'], $data_detail[$i]['id_parfum']) or die('gagal min stok');
            }
            $id_us = $this->session->userdata('id');
            $this->Checkout_model->delete_all($id_us);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pesanan Berhasil dibuat!</div>');
             redirect('Profil/parfum');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pesanan Gagal dibuat!</div>');
            redirect('Profil/parfum');
        }
    }
    public function pembelian()
    {
        $data['judul'] = "Data pembelian";
        $data['user'] = $this->userrole->getBy();
        $data['pembelian'] = $this->Transaksi_model->getByUser();
        
        $this->load->view('layout/header', $data);
        $this->load->view('profil/pembelian_user', $data);
        $this->load->view('layout/footer', $data);
    }
    public function statusbeli($id)
    {
        $data['judul'] = "Ubah Data pembelian";
        $data['user'] = $this->userrole->getBy();
        $data['pembelian'] = $this->Transaksi_model->getByUser2($id);
        $data['detailbeli'] = $this->Detail_model->getByUser($id);
        // $data['jlh'] = $this->Checkout_model->jumlah();
        $this->form_validation->set_rules('status', 'Status', 'required', [
            'required' => 'Status Wajib di isi'
        ]);
        // print_r($data);
        // die;
        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("profil/detail_beli", $data);
            $this->load->view("layout/footer");
        } else {
            $status = $this->input->post('status');
            $nojual = $this->input->post('no_checkout');
            $this->Transaksi_model->updatestatus($status, $nojual);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Status Berhasil DiUbah!</div>');
            redirect('Profil/pembelian');
        }
    }
    public function pesanan()
    {
    $jumlah_beli = count($this->input->post('parfum'));
    $data_p = [
        'no_checkout' => $this->input->post('no_checkout'),
        'id_user' => $this->session->userdata('id'),
        'nama_pengirim' => $this->session->userdata('nama_pengirim'),
        'tanggal' => $this->input->post('tanggal'),
        'total_bayar' => $this->input->post('bayar'),
        'alamat' => $this->input->post('alamat'),
        'no_hp' => $this->input->post('no_hp'),
        'pembayaran' => $this->input->post('pembayaran'),
        'keterangan' => $this->input->post('keterangan'),
    ];
    $upload_image = $_FILES['gambar']['name'];
        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '5000';
            $config['upload_path'] = './assets/img/transaksi/';
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('gambar')) {
            $new_image = $this->upload->data('file_name');
        $this->db->set('gambar', $new_image);
    } else {
        echo $this->upload->display_errors();
    }
    }
    $data_detail = [];
        for ($i = 0; $i < $jumlah_beli; $i++) {
            array_push($data_detail, ['id_parfum' => $this->input->post('parfum')[$i]]);
            $data_detail[$i]['no_checkout'] = $this->input->post('no_checkout');
            $data_detail[$i]['id_user'] = $this->session->userdata('id');
            $data_detail[$i]['diskon'] = $this->input->post('diskon');
            $data_detail[$i]['jumlah'] = $this->input->post('jumlah_p')[$i];
            $data_detail[$i]['total'] = $this->input->post('total_p')[$i];
    }
        if ($this->Transaksi_model->insert($data_p, $upload_image) && $this->Detail_model->insert($data_detail)) {
            for ($i = 0; $i < $jumlah_beli; $i++){

            }
            $id_us = $this->session->userdata('id');
            $this->Checkout_model->delete_all($id_us);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pesanan Berhasil dibuat!</div>');
            redirect('Profil/parfum');
} else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pesanan Gagal dibuat!</div>');
            // redirect('Profil/parfum');
}
}
    }
