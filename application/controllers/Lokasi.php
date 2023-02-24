<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lokasi extends CI_Controller {

	public function __construct() {
    parent::__construct();
    $this->load->helper('url');
    $this->load->helper('download');
	$this->load->library('pagination');
	$this->load->helper('cookie');
	$this->load->model('Lokasi_model');
  }
	
	public function index()
	{
		$data['title'] = 'Lokasi';
		$data['lokasi'] = $this->Lokasi_model->data()->result();

		$this->load->view('templates/header', $data);
		$this->load->view('lokasi/index');
		$this->load->view('templates/footer');
	}

	public function tambah()
	{
		$data['title'] = 'Lokasi';
		$this->load->view('templates/header', $data);
		$this->load->view('lokasi/form_tambah');
		$this->load->view('templates/footer');
	}

	public function proses_tambah()
	{
		$lokasi = $this->input->post('lokasi');
		
		$data=array(
			'lokasi'=> $lokasi
		);

		$this->Lokasi_model->tambah_data($data, 'lokasi');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil ditambahkan!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
    	redirect('lokasi');
	}

	public function proses_ubah()
	{
		$kode = 	$this->input->post('id');
		$lokasi = $this->input->post('lokasi');
		
		$data=array(
			'lokasi'=> $lokasi
		);

		$where = array(
			'id'=>$kode
		);

		$this->Lokasi_model->ubah_data($where, $data, 'lokasi');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil diubah!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
    	redirect('lokasi');
	}

	public function proses_hapus($id)
	{
		$where = array('id' => $id );
		$this->Lokasi_model->hapus_data($where, 'lokasi');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil dihapus!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
		redirect('lokasi');
	}

	public function getData()
	{
		$id = $this->input->post('id');
    	$where = array('id' => $id );
    	$data = $this->Lokasi_model->detail_data($where, 'lokasi')->result();
    	echo json_encode($data);
	}

}
