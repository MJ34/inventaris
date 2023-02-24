<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('download');
        $this->load->library('pagination');
        $this->load->helper('cookie');
        $this->load->model('pembelian_model');
        $this->load->model('hibah_model');
        $this->load->model('pengadaan_model');
        $this->load->model('buku_keliling_model');
      }

      public function pengadaan()
      {
        $data['title'] = 'laporan_Pengadaan';
        $data['pengadaan'] = $this->pengadaan_model->dataJoin()->result();
    
        $this->load->view('templates/header', $data);
        $this->load->view('pengadaan/laporan');
        $this->load->view('templates/footer');
      }
    

    public function pembelian()
		{
			$data['title'] = 'laporan_pembelian';
			$data['pembelian'] = $this->pembelian_model->dataJoin()->result();
	
			$this->load->view('templates/header', $data);
			$this->load->view('pembelian/laporan');
			$this->load->view('templates/footer');
		}

    public function hibah()
		{
			$data['title'] = 'laporan_hibah';
			$data['hibah'] = $this->hibah_model->dataJoin()->result();
	
			$this->load->view('templates/header', $data);
			$this->load->view('hibah/laporan');
			$this->load->view('templates/footer');
		}
    public function buku_keliling()
		{
			$data['title'] = 'laporan_buku_keliling';
			$data['buku_keliling'] = $this->buku_keliling_model->dataJoin()->result();
	
			$this->load->view('templates/header', $data);
			$this->load->view('buku_keliling/laporan');
			$this->load->view('templates/footer');
		}

}