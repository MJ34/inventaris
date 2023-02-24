<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pegawai extends CI_Controller {

	public function __construct() {
    parent::__construct();
    $this->load->helper('url');
    $this->load->helper('download');
	$this->load->library('pagination');
	$this->load->helper('cookie');
	$this->load->model('pegawai_model');
  }
	
	public function index()
	{
		$data['title'] = 'pegawai';
		$data['pegawai'] = $this->pegawai_model->data()->result();

		$this->load->view('templates/header', $data);
		$this->load->view('pegawai/index');
		$this->load->view('templates/footer');
	}

	public function tambah()
	{
		$data['title'] = 'pegawai';
		$this->load->view('templates/header', $data);
		$this->load->view('pegawai/form_tambah');
		$this->load->view('templates/footer');
	}

	public function ubah($id)
	{
		$data['title'] = 'pegawai';
		$where = array('id_pegawai'=>$id);
		$data['data'] = $this->pegawai_model->detail_data($where, 'pegawai')->result();

		$this->load->view('templates/header', $data);
		$this->load->view('pegawai/form_ubah');
		$this->load->view('templates/footer');
	}

	public function detail_data($id)
  {
    $data['title'] = 'pegawai';

	$where = array('id_pegawai'=>$id);
	$data['data'] = $this->pegawai_model->detail_data($where, 'pegawai')->result();

    $this->load->view('templates/header', $data);
    $this->load->view('pegawai/detail');
    $this->load->view('templates/footer');
  }

	public function proses_hapus($id)
	{
		$where = array('id_pegawai' => $id );
		$foto = $this->pegawai_model->ambilFoto($where);
		if($foto){
			if($foto == 'man.png'){

			}else{
				unlink('./assets/upload/pegawai/'.$foto.'');
			}
			
			$this->pegawai_model->hapus_data($where, 'pegawai');
		}
		
		
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
		redirect('pegawai');
	}

	public function proses_tambah()
	{
		
		$config['upload_path']   = './assets/upload/pegawai/';
		$config['allowed_types'] = 'png|jpg|JPG|jpeg|JPEG|gif|GIF|tif|TIF||tiff|TIFF';
	
		$namaFile = $_FILES['photo']['name'];
		$error = $_FILES['photo']['error'];

		$this->load->library('upload', $config);
		
		$kode = $this->pegawai_model->buat_kode(); 
		$nmlengkap = $this->input->post('nmlengkap');
		$notelp = $this->input->post('notelp');
		$jk = $this->input->post('jk');
		$tempat = $this->input->post('tempat');
		$tgllahir = $this->input->post('tgllahir');
		$umur = $this->input->post('umur');
		$alamat = $this->input->post('alamat');
	
	
		if ($namaFile == '') {
		  	$ganti = 'man.png';
		}else{
			if (! $this->upload->do_upload('photo')) {
			  $error = $this->upload->display_errors();
			  /*
			  $this->session->set_flashdata('Pesan','<div class="alert alert-warning alert-dismissible">
					  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					  <h4><i class="icon fa fa-warning"></i> Oops</h4>
					  '.$error.'
					</div>');
				*/
		  	redirect('pegawai/tambah');
			}
			else{
	
			  $data = array('photo' => $this->upload->data());
			  $nama_file= $data['photo']['file_name'];
			  $ganti = str_replace(" ", "_", $nama_file);
	
	
			}

		}

		$data=array(
			'id_pegawai'=>$kode,
			'nama_lengkap'=>$nmlengkap,
			'notelp'=>$notelp,
			'jk'=>$jk,
			'tempat'=>$tempat,
			'tgllahir'=>$tgllahir,
			'umur'=>$umur,
			'alamat'=>$alamat,
			'foto'=>$ganti
				);
	  
		  $this->pegawai_model->tambah_data($data, 'pegawai');
		  $this->session->set_flashdata('Pesan','
			<script>
			$(document).ready(function() {
			swal.fire({
				title: "Berhasil ditambah!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
			});
			</script>
			');
		  redirect('pegawai');

	}

	public function proses_ubah()
	{
		$config['upload_path']   = './assets/upload/pegawai/';
		$config['allowed_types'] = 'png|jpg|JPG|jpeg|JPEG|gif|GIF|tif|TIF||tiff|TIFF';
	
		$namaFile = $_FILES['photo']['name'];
		$error = $_FILES['photo']['error'];

		$this->load->library('upload', $config);
		
		$kode = $this->input->post('id'); 
		$nmlengkap = $this->input->post('nmlengkap');
		$notelp = $this->input->post('notelp');
		$jk = $this->input->post('jk');
		$tempat = $this->input->post('tempat');
		$tgllahir = $this->input->post('tgllahir');
		$umur = $this->input->post('umur');
		$alamat = $this->input->post('alamat');

		$flama = $this->input->post('fotoLama');
	
	
		if ($namaFile == '') {
		  	$ganti = $flama;
		}else{
			if (! $this->upload->do_upload('photo')) {
			  $error = $this->upload->display_errors();
			  /*
			  $this->session->set_flashdata('Pesan','<div class="alert alert-warning alert-dismissible">
					  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					  <h4><i class="icon fa fa-warning"></i> Oops</h4>
					  '.$error.'
					</div>');
				*/
		  	redirect('pegawai/ubah/'.$kode);
			}
			else{
	
			  $data = array('photo' => $this->upload->data());
			  $nama_file= $data['photo']['file_name'];
			  $ganti = str_replace(" ", "_", $nama_file);
			  if($flama !== 'man.png'){
				unlink('./assets/upload/pegawai/'.$flama.'');
			  }
	
			}

		}

		$data=array(
			'nama_lengkap'=>$nmlengkap,
			'notelp'=>$notelp,
			'jk'=>$jk,
			'tempat'=>$tempat,
			'tgllahir'=>$tgllahir,
			'umur'=>$umur,
			'alamat'=>$alamat,
			'foto' => $ganti
				);

		$where = array('id_pegawai'=>$kode);
	  
		  $this->pegawai_model->ubah_data($where, $data, 'pegawai');
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
		  redirect('pegawai');
	}

}
