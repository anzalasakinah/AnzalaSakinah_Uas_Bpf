<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Datatables extends CI_Controller {

      function __construct(){
            parent::__construct();

            $this->load->model('Datatables_model');
      }
      public function index(){
            $data['judul'] = "Data Parfum";
            $data['parfum'] = $this->Datatables_model->get(); 
            $this->load->view("layout/header_table");
            $this->load->view("Datatable/vw_datatables", $data);
            $this->load->view("layout/footer_table");
      }
}