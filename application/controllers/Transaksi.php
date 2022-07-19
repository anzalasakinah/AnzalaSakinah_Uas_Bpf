<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Dompdf\Dompdf;

class Transaksi extends CI_Controller
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
    public function index()
    {
        $data['judul'] = "Halaman Transaksi";
        $data['transaksi'] = $this->Transaksi_model->get();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view("layout/header", $data);
        $this->load->view("transaksi/vw_transaksi", $data);
        $this->load->view("layout/footer", $data);
    }
    public function detail()
    {
        $id = $_GET['id'];
        $data['judul'] = "Halaman Detail Transaksi";
        $data['detail'] = $this->Detail_model->getById($id);
        $data['transaksi'] = $this->Transaksi_model->getByIdP($id);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('status', 'Status', 'required', ['required' => 'Status Wajib di isi']);
        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("transaksi/vw_detail_transaksi", $data);
            $this->load->view("layout/footer");
        } else {
            $status = $this->input->post('status');
            $no_checkout = $this->input->post('no_checkout');
            $this->Transaksi_model->updatestatus($status, $no_checkout);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Status Berhasil DiUbah!</div>');
            redirect('Transaksi');
        }
    }
    public function export()
    {
        $dompdf = new Dompdf();
        $this->data['all_jual'] = $this->Transaksi_model->get();
        $this->data['title'] = 'Laporan Data Transaksi';
        $this->data['no'] = 1;
        $dompdf->setPaper('A4', 'Landscape');
        $html = $this->load->view('transaksi/report', $this->data, true);
        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->stream('Laporan Data Penjualan Tanggal ' . date('d F Y'), array("Attachment" => false));
    }
}
