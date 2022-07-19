<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Parfum extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Parfum_model');
	}
	public function index()
	{
		$data['judul'] = "Halaman Parfum";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata['email']])->row_array();
		$data['parfum'] = $this->Parfum_model->get(); 
        $this->load->view("layout/header", $data);
        $this->load->view("parfum/vw_parfum", $data);
        $this->load->view("layout/footer",$data);
	}
	function detail($id)
    {
        $data['judul'] = "Halaman Detail Parfum";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata['email']])->row_array();
        $data['parfum']= $this->Parfum_model->getById($id);
        $this->load->view('layout/header', $data);
        $this->load->view('parfum/vw_detail_parfum', $data);
        $this->load->view('layout/footer',$data);
    }
	public function hapus($id)
	{
		$this->Parfum_model->delete($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data
		Parfum Berhasil Dihapus!</div>');
		redirect('Parfum');
	}
	public function tambah()
    {
        $data['judul'] = "Halaman Tambah Parfum";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['parfum'] = $this->Parfum_model->get();
        $this->form_validation->set_rules('merk_parfum', 'Merk Parfum', 'required', [
            'required' => 'Merk Wajib Diisi'
        ]);
		$this->form_validation->set_rules('harum_parfum', 'Harum Parfum', 'required', [
            'required' => 'Harum Wajib Diisi'
        ]);
        $this->form_validation->set_rules('stok', 'Stok', 'required|integer', [
            'required' => 'Stok Berdiri Wajib di isi', 'integer' => 'Stok harus Angka'
        ]);
		$this->form_validation->set_rules('diskon', 'diskon', 'required|integer', [
            'required' => 'Diskon Berdiri Wajib di isi', 'integer' => 'Diskon harus Angka'
        ]);
        $this->form_validation->set_rules('harga', 'Harga', 'required|integer', [
            'required' => 'Harga Berdiri Wajib di isi', 'integer' => 'Harga harus Angka'
        ]);
		$this->form_validation->set_rules('jumlah_terjual', 'Jumlah Terjual', 'required|integer', [
            'required' => 'Jumlah Berdiri Wajib di isi', 'integer' => 'Harga harus Angka'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("parfum/vw_tambah_parfum", $data);
            $this->load->view("layout/footer",$data);
        } else {
            $data = [
                'merk_parfum' => $this->input->post('merk_parfum'),
				'harum_parfum' => $this->input->post('harum_parfum'),
				'stok' => $this->input->post('stok'),
				'diskon' => $this->input->post('diskon'),
				'harga' => $this->input->post('harga'),
				'jumlah_terjual' => $this->input->post('jumlah_terjual'),
				'gambar' => $this->input->post('gambar'),
            ];
            $upload_image = $_FILES['gambar']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '5000';
                $config['upload_path'] = './assets/img/parfum/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $this->Parfum_model->insert($data, $upload_image);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data 
            Parfum Berhasil Ditambah!</div>');
            redirect('Parfum');
        }
    }
	/*public function upload()
		{
			$data = [
				'merk_parfum' => $this->input->post('merk_parfum'),
				'harum_parfum' => $this->input->post('harum_parfum'),
				'stok' => $this->input->post('stok'),
				'diskon' => $this->input->post('diskon'),
				'harga' => $this->input->post('harga'),
				'jumlah_terjual' => $this->input->post('jumlah_terjual'),
				'gambar' => $this->input->post('gambar'),
			];
			$this->Parfum_model->insert($data);
			redirect('Parfum');
		}*/
		public function edit($id)
		{
			$data['judul'] = "Halaman Edit Parfum";
			$data['parfum'] = $this->Parfum_model->getById($id);
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
			$this->form_validation->set_rules('merk_parfum', 'Merk Parfum', 'required', [
				'required' => 'Merk Wajib Diisi'
			]);
			$this->form_validation->set_rules('harum_parfum', 'Harum Parfum', 'required', [
				'required' => 'Harum Wajib Diisi'
			]);
			$this->form_validation->set_rules('stok', 'Stok', 'required|integer', [
				'required' => 'Stok Berdiri Wajib di isi', 'integer' => 'Stok harus Angka'
			]);
			$this->form_validation->set_rules('diskon', 'diskon', 'required|integer', [
				'required' => 'Diskon Berdiri Wajib di isi', 'integer' => 'Diskon harus Angka'
			]);
			$this->form_validation->set_rules('harga', 'Harga', 'required|integer', [
				'required' => 'Harga Berdiri Wajib di isi', 'integer' => 'Harga harus Angka'
			]);
			$this->form_validation->set_rules('jumlah_terjual', 'Jumlah Terjual', 'required|integer', [
				'required' => 'Jumlah Berdiri Wajib di isi', 'integer' => 'Harga harus Angka'
			]);
			if ($this->form_validation->run() == false) {
				$this->load->view("layout/header", $data);
				$this->load->view("parfum/vw_ubah_parfum", $data);
				$this->load->view("layout/footer",$data);
			} else {
				$data = [
				'merk_parfum' => $this->input->post('merk_parfum'),
				'harum_parfum' => $this->input->post('harum_parfum'),
				'stok' => $this->input->post('stok'),
				'diskon' => $this->input->post('diskon'),
				'harga' => $this->input->post('harga'),
				'jumlah_terjual' => $this->input->post('jumlah_terjual'),
				'gambar' => $this->input->post('gambar'),
				];
				$upload_image = $_FILES['gambar']['name'];
				if ($upload_image) {
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size'] = '5000';
					$config['upload_path'] = './assets/img/parfum/';
					$this->load->library('upload', $config);
					if ($this->upload->do_upload('gambar')) {
						$old_image = $data['parfum']['gambar'];
						if ($old_image != 'default.jpg') {
							unlink(FCPATH . 'assets/img/parfum/' . $old_image);
						}
						$new_image = $this->upload->data('file_name');
						$this->db->set('gambar', $new_image);
					} else {
						echo $this->upload->display_errors();
					}
				}
				$id = $this->input->post('id');
				$this->Parfum_model->update(['id' => $id], $data, $upload_image);
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Parfum Berhasil 
				Diubah!</div>');
				redirect('Parfum');
			}
		}}
	/*public function update()
	{
		$data = [
			'merk_parfum' => $this->input->post('merk_parfum'),
				'harum_parfum' => $this->input->post('harum_parfum'),
				'stok' => $this->input->post('stok'),
				'diskon' => $this->input->post('diskon'),
				'harga' => $this->input->post('harga'),
				'jumlah_terjual' => $this->input->post('jumlah_terjual'),
				'gambar' => $this->input->post('gambar'),
		];
		$id = $this->input->post('id');
		$this->Parfum_model->update(['id' => $id], $data);
		redirect('Parfum');
	}
}*/