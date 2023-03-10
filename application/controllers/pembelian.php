<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Include librari PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class pembelian extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('download');
		$this->load->library('pagination');
		$this->load->helper('cookie');
		$this->load->model('kategori_model');
		$this->load->model('Lokasi_model');
		$this->load->model('penerbit_model');
		$this->load->model('pembelian_model');
	  }
		
		public function index()
		{
			$data['title'] = 'Inventaris';
			$data['pembelian'] = $this->pembelian_model->dataJoin()->result();
	
			$this->load->view('templates/header', $data);
			$this->load->view('pembelian/index');
			$this->load->view('templates/footer');
		}
		
		public function tambah()
		{
			$data['title'] = 'Buku Inventaris';
			//data untuk select
			$data['kategori'] = $this->kategori_model->data()->result();
			$data['lokasi'] = $this->Lokasi_model->data()->result();
			$data['penerbit'] = $this->penerbit_model->data()->result();
			$data['id'] = $this->pembelian_model->buat_kode();
			$data['no_inventaris'] = $this->pembelian_model->buat_kode2();
	
			//jml data 
			$data['jmlKategori'] = $this->kategori_model->data()->num_rows();
			$data['jmlLokasi'] = $this->Lokasi_model->data()->num_rows();
			$data['jmlPenerbit'] = $this->penerbit_model->data()->num_rows();
			
	
			$this->load->view('templates/header', $data);
			$this->load->view('pembelian/form_tambah');
			$this->load->view('templates/footer');
		}
	
		public function ubah($id)
		{
			$data['title'] = 'Inventaris';
			//menampilkan data berdasarkan id
			$where = array('id'=>$id);
			$data['data'] = $this->pembelian_model->detail_data($where, 'pembelian')->result();
	
			//data untuk select
			$data['kategori'] = $this->kategori_model->data()->result();
			$data['lokasi'] = $this->Lokasi_model->data()->result();
			$data['penerbit'] = $this->penerbit_model->data()->result();
			
			//jml data
			$data['jmlKategori'] = $this->kategori_model->data()->num_rows();
			$data['jmlLokasi'] = $this->Lokasi_model->data()->num_rows();
			$data['jmlPenerbit'] = $this->penerbit_model->data()->num_rows();
			
	
			$this->load->view('templates/header', $data);
			$this->load->view('pembelian/form_ubah');
			$this->load->view('templates/footer');
		}


		public function statistik()
		{
			$data['title'] = 'laporan Inventaris';
			$data['pembelian'] = $this->pembelian_model->dataJoin()->result();
	
			$this->load->view('templates/header', $data);
			$this->load->view('pembelian/statistik');
			$this->load->view('templates/footer');
		}
	
		public function detail_data($id)
	  {
		$data['title'] = 'Inventaris';
	
		$where = $id;
		$data['data'] = $this->pembelian_model->detail_join($where)->result();
	
		$this->load->view('templates/header', $data);
		$this->load->view('pembelian/detail');
		$this->load->view('templates/footer');
	  }
	
		public function proses_hapus($id)
		{
			$where = array('id' => $id );
			$foto = $this->pembelian_model->ambilFoto($where);
			if($foto){
				if($foto == 'book.png'){
	
				}else{
					unlink('./assets/upload/pembelian/'.$foto.'');
				}
				
				$this->pembelian_model->hapus_data($where, 'pembelian');
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
			redirect('pembelian');
		}

	
		public function proses_tambah()
		{
			
			$config['upload_path']   = './assets/upload/pembelian/';
			$config['allowed_types'] = 'png|jpg|JPG|jpeg|JPEG|gif|GIF|tif|TIF||tiff|TIFF';
		
			$namaFile = $_FILES['photo']['name'];
			$error = $_FILES['photo']['error'];
	
			$this->load->library('upload', $config);
			
			$id = $this->pembelian_model->buat_kode();
			$no_inventaris = $this->pembelian_model->buat_kode2();
			$tanggal = $this->input->post('tanggal');
			$kategori = $this->input->post('kategori');
			$judul = $this->input->post('judul');
			$cetakan = $this->input->post('cetakan');
			$penanggungjawab = $this->input->post('penanggungjawab');
			$kota = $this->input->post('kota');
			$penerbit = $this->input->post('penerbit');
			$tahun = $this->input->post('tahun');
			$lokasi = $this->input->post('lokasi');
			$jumlahjudul = $this->input->post('jumlahjudul');

			
		
		
			if ($namaFile == '') {
				  $ganti = 'book.png';
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
				  redirect('pembelian/tambah');
				}
				else{
		
				  $data = array('photo' => $this->upload->data());
				  $nama_file= $data['photo']['file_name'];
				  $ganti = str_replace(" ", "_", $nama_file);
		
		
				}
	
			}
	
			$data=array(

				'id'=>$id,
				'no_inventaris'=>$no_inventaris,
				'tanggal'=>$tanggal,
				'kategori'=>$kategori,
				'penerbit'=>$penerbit,
				'judul'=>$judul,
				'cetakan'=>$cetakan,
				'penanggungjawab'=>$penanggungjawab,
				'kota'=>$kota,
				'tahun' => $tahun,
				'lokasi'=>$lokasi,
				'jumlahjudul' => $jumlahjudul,
				'foto' => $ganti
					);
		  
			  $this->pembelian_model->tambah_data($data,'pembelian');
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
			  redirect('pembelian');
	
		}
	
		public function proses_ubah()
		{
			$config['upload_path']   = './assets/upload/pembelian/';
			$config['allowed_types'] = 'png|jpg|JPG|jpeg|JPEG|gif|GIF|tif|TIF||tiff|TIFF';
		
			$namaFile = $_FILES['photo']['name'];
			$error = $_FILES['photo']['error'];
	
			$this->load->library('upload', $config);
			
			$id = $this->input->post('id');
			$no_inventaris = $this->input->post('no_inventaris'); 
			$tanggal = $this->input->post('tanggal');
			$kategori = $this->input->post('kategori');
			$judul = $this->input->post('judul');
			$cetakan = $this->input->post('cetakan');
			$penanggungjawab = $this->input->post('penanggungjawab');
			$kota = $this->input->post('kota');
			$penerbit = $this->input->post('penerbit');
			$tahun = $this->input->post('tahun');
			$lokasi = $this->input->post('lokasi');
			$jumlahjudul = $this->input->post('jumlahjudul');
	
			$flama = $this->input->post('fotoLama');
		
		
			if ($namaFile == '') {
				$ganti = 'book.png';
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
				redirect('pembelian/tambah');
			  }
			  else{
	  
				$data = array('photo' => $this->upload->data());
				$nama_file= $data['photo']['file_name'];
				$ganti = str_replace(" ", "_", $nama_file);
	  
	  
			  }
  
			}
	
			$data=array(

				'no_inventaris'=>$no_inventaris,
				'tanggal'=>$tanggal,
				'kategori'=>$kategori,
				'penerbit'=>$penerbit,
				'judul'=>$judul,
				'cetakan' =>$cetakan,
				'penanggungjawab'=>$penanggungjawab,
				'kota'=>$kota,
				'tahun' => $tahun,
				'lokasi' => $lokasi,
				'jumlahjudul' => $jumlahjudul,
				'foto' => $ganti
					);
	
				$where = array('id'=>$id);
		  
			  $this->pembelian_model->ubah_data($where, $data, 'pembelian');
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
			  redirect('pembelian');
		}

		public function Print(){
			$data['pembelian'] = $this->pembelian_model->dataJoin()->result();
			$this->load->view('pembelian/print', $data);
		}

		public function ExportPdf(){
				$this->load->model('pembelian_model');

				$data['pembelian'] = $this->pembelian_model->dataJoin()->result();

				$this->load->library('pdf');
				$this->pdf->setPaper('A4', 'landscape');
				$this->pdf->filename = "laporan inventaris buku.pdf";

				$this->pdf->load_view('pembelian/pdf', $data);
			}

		public function export(){
			
			$spreadsheet = new Spreadsheet();
			$sheet = $spreadsheet->getActiveSheet();
			// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
			$style_col = [
				'font' => ['bold' => true], // Set font nya jadi bold

			  'alignment' => [
				'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
				'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			  ],
			  'borders' => [
				'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
				'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
				'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
				'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
			  ]
			];
			// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
			$style_row = [
			  'alignment' => [
				'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
				'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			  ],

			  'borders' => [
				'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
				'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
				'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
				'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
			  ]
			];
			$sheet->setCellValue('A1', "LAPORAN INVENTARIS BUKU"); // Set kolom A1 dengan tulisan "DATA PEMBELIAN BUKU"
			$sheet->mergeCells('A1:L1'); // Set Merge Cell pada kolom A1 sampai E1
			$sheet->getStyle('A1')->getFont()->setBold(true); // Set bold kolom A1
			// Buat header tabel nya pada baris ke 3
			$sheet->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
			$sheet->setCellValue('B3', "TANGGAL"); // Set kolom B3 dengan tulisan "TANGGAL"
			$sheet->setCellValue('C3', "KATAGORI"); // Set kolom C3 dengan tulisan "KATAGORI"
			$sheet->setCellValue('D3', "JUDUL"); // Set kolom D3 dengan tulisan "JUDUL"
			$sheet->setCellValue('E3', "CETAKAN"); // Set kolom E3 dengan tulisan "CETAKAN"
			$sheet->setCellValue('F3', "PENANGGUNG JAWAB"); // Set kolom F3 dengan tulisan "PENANGGUNGJAWAB"
			$sheet->setCellValue('G3', "KOTA"); // Set kolom G3 dengan tulisan "KOTA"
			$sheet->setCellValue('H3', "PENERBIT"); // Set kolom H3 dengan tulisan "PENERBIT"
			$sheet->setCellValue('I3', "TAHUN"); // Set kolom I3 dengan tulisan "TAHUN"
			$sheet->setCellValue('J3', "LOKASI");
			$sheet->setCellValue('K3', "NO INVENTARIS"); // Set kolom L3 dengan tulisan "NO INVENTARIS"
			// Apply style header yang telah kita buat tadi ke masing-masing kolom header
			$sheet->getStyle('A1')->applyFromArray($style_col);
			$sheet->getStyle('A3')->applyFromArray($style_col);
			$sheet->getStyle('B3')->applyFromArray($style_col);
			$sheet->getStyle('C3')->applyFromArray($style_col);
			$sheet->getStyle('D3')->applyFromArray($style_col);
			$sheet->getStyle('E3')->applyFromArray($style_col);
			$sheet->getStyle('F3')->applyFromArray($style_col);
			$sheet->getStyle('G3')->applyFromArray($style_col);
			$sheet->getStyle('H3')->applyFromArray($style_col);
			$sheet->getStyle('I3')->applyFromArray($style_col);
			$sheet->getStyle('J3')->applyFromArray($style_col);
			$sheet->getStyle('K3')->applyFromArray($style_col);
			// Panggil function view yang ada di pembelian_Model untuk menampilkan semua data pembelian
			$pembelian = $this->pembelian_model->view();
			$no = 1; // Untuk penomoran tabel, di awal set dengan 1
			$numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
			foreach($pembelian as $data){ // Lakukan looping pada variabel pembelian
			  $sheet->setCellValue('A'.$numrow, $no);
			  $sheet->setCellValue('B'.$numrow, $data->tanggal);
			  $sheet->setCellValue('C'.$numrow, $data->kategori);
			  $sheet->setCellValue('D'.$numrow, $data->judul);
			  $sheet->setCellValue('E'.$numrow, $data->cetakan);
			  $sheet->setCellValue('F'.$numrow, $data->penanggungjawab);
			  $sheet->setCellValue('G'.$numrow, $data->kota);
			  $sheet->setCellValue('H'.$numrow, $data->penerbit);
			  $sheet->setCellValue('I'.$numrow, $data->tahun);
			  $sheet->setCellValue('J'.$numrow, $data->lokasi);
			  $sheet->setCellValue('K'.$numrow, $data->no_inventaris);
			  
			  // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
			  $sheet->getStyle('A'.$numrow)->applyFromArray($style_row);
			  $sheet->getStyle('B'.$numrow)->applyFromArray($style_row);
			  $sheet->getStyle('C'.$numrow)->applyFromArray($style_row);
			  $sheet->getStyle('D'.$numrow)->applyFromArray($style_row);
			  $sheet->getStyle('E'.$numrow)->applyFromArray($style_row);
			  $sheet->getStyle('F'.$numrow)->applyFromArray($style_row);
			  $sheet->getStyle('G'.$numrow)->applyFromArray($style_row);
			  $sheet->getStyle('H'.$numrow)->applyFromArray($style_row);
			  $sheet->getStyle('I'.$numrow)->applyFromArray($style_row);
			  $sheet->getStyle('J'.$numrow)->applyFromArray($style_row);
			  $sheet->getStyle('K'.$numrow)->applyFromArray($style_row);
			  $no++; // Tambah 1 setiap kali looping
			  $numrow++; // Tambah 1 setiap kali looping
			}
			// Set width kolom
			$sheet->getColumnDimension('A')->setWidth(4); // Set width kolom A
			$sheet->getColumnDimension('B')->setWidth(15); // Set width kolom B
			$sheet->getColumnDimension('C')->setWidth(20); // Set width kolom C
			$sheet->getColumnDimension('D')->setWidth(50); // Set width kolom D
			$sheet->getColumnDimension('E')->setWidth(10); // Set width kolom E
			$sheet->getColumnDimension('F')->setWidth(30); // Set width kolom E
			$sheet->getColumnDimension('G')->setWidth(10); // Set width kolom E
			$sheet->getColumnDimension('H')->setWidth(30); // Set width kolom E
			$sheet->getColumnDimension('I')->setWidth(10); // Set width kolom E
			$sheet->getColumnDimension('J')->setWidth(20);
			$sheet->getColumnDimension('K')->setWidth(20);
			
			// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
			$sheet->getDefaultRowDimension()->setRowHeight(-1);
			// Set orientasi kertas jadi LANDSCAPE
			$sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
			// Set judul file excel nya
			$sheet->setTitle("Laporan Inventaris Buku.");
			$filename = ''; // set filename for excel file to be exported
			// Proses file excel
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment; filename="Laporan Inventaris Buku.xlsx"'); // Set nama file excel nya
			header('Cache-Control: max-age=0');
			$writer = new xlsx($spreadsheet);
			$writer->save('php://output');
	
	}

} 
?>
