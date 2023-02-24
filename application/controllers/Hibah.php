<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Include librari PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class hibah extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('download');
		$this->load->library('pagination');
		$this->load->helper('cookie');
		$this->load->model('penerbit_model');
		$this->load->model('hibah_model');
	  }
		
		public function index()
		{
			$data['title'] = 'hibah';
			$data['hibah'] = $this->hibah_model->dataJoin()->result();
	
			$this->load->view('templates/header', $data);
			$this->load->view('hibah/index');
			$this->load->view('templates/footer');
		}
		
		public function tambah()
		{
			$data['title'] = 'Buku hibah';
			//data untuk select
			$data['penerbit'] = $this->penerbit_model->data()->result();
			$data['id'] = $this->hibah_model->buat_kode();
	
			//jml data
			$data['jmlPenerbit'] = $this->penerbit_model->data()->num_rows();
			
	
			$this->load->view('templates/header', $data);
			$this->load->view('hibah/form_tambah');
			$this->load->view('templates/footer');
		}
	
		public function ubah($id)
		{
			$data['title'] = 'hibah';
			//menampilkan data berdasarkan id
			$where = array('id'=>$id);
			$data['data'] = $this->hibah_model->detail_data($where, 'hibah')->result();
	
			//data untuk select
			$data['penerbit'] = $this->penerbit_model->data()->result();
			
			//jml data
			$data['jmlPenerbit'] = $this->penerbit_model->data()->num_rows();
			
	
			$this->load->view('templates/header', $data);
			$this->load->view('hibah/form_ubah');
			$this->load->view('templates/footer');
		}

		public function statistik()
		{
			$data['title'] = 'laporan hibah';
			$data['hibah'] = $this->hibah_model->dataJoin()->result();
	
			$this->load->view('templates/header', $data);
			$this->load->view('hibah/statistik');
			$this->load->view('templates/footer');
		}
	
		public function detail_data($id)
	  {
		$data['title'] = 'hibah';
	
		$where = $id;
		$data['data'] = $this->hibah_model->detail_join($where)->result();
	
		$this->load->view('templates/header', $data);
		$this->load->view('hibah/detail');
		$this->load->view('templates/footer');
	  }
	
		public function proses_hapus($id)
		{
			$where = array('id' => $id );
			$foto = $this->hibah_model->ambilFoto($where);
			if($foto){
				if($foto == 'book.png'){
	
				}else{
					unlink('./assets/upload/hibah/'.$foto.'');
				}
				
				$this->hibah_model->hapus_data($where, 'hibah');
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
			redirect('hibah');
		}

	
		public function proses_tambah()
		{
			
			$config['upload_path']   = './assets/upload/hibah/';
			$config['allowed_types'] = 'png|jpg|JPG|jpeg|JPEG|gif|GIF|tif|TIF||tiff|TIFF';
		
			$namaFile = $_FILES['photo']['name'];
			$error = $_FILES['photo']['error'];
	
			$this->load->library('upload', $config);
			
			$id = $this->hibah_model->buat_kode();
			$no_inventaris = $this->input->post('no_inventaris');
			$tanggal = $this->input->post('tanggal');
			$judul = $this->input->post('judul');
			$asal = $this->input->post('asal');
			$pengarang = $this->input->post('pengarang');
			$penanggungjawab = $this->input->post('penanggungjawab');
			$kota = $this->input->post('kota');
			$penerbit = $this->input->post('penerbit');
			$tahun = $this->input->post('tahun');
			$jumlahjudul = $this->input->post('jumlahjudul');
			$jumlaheks = $this->input->post('jumlaheks');
		
		
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
				  redirect('hibah/tambah');
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
				'penerbit'=>$penerbit,
				'pengarang'=>$pengarang,
				'asal'=>$asal,
				'judul'=>$judul,
				'penanggungjawab'=>$penanggungjawab,
				'kota'=>$kota,
				'jumlaheks'=>$jumlaheks,
				'tahun' => $tahun,
				'jumlahjudul' => $jumlahjudul,
				'foto' => $ganti
					);
		  
			  $this->hibah_model->tambah_data($data,'hibah');
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
			  redirect('hibah');
	
		}
	
		public function proses_ubah()
		{
			$config['upload_path']   = './assets/upload/hibah/';
			$config['allowed_types'] = 'png|jpg|JPG|jpeg|JPEG|gif|GIF|tif|TIF||tiff|TIFF';
		
			$namaFile = $_FILES['photo']['name'];
			$error = $_FILES['photo']['error'];
	
			$this->load->library('upload', $config);
			
			$id = $this->input->post('id');
			$no_inventaris = $this->input->post('no_inventaris'); 
			$tanggal = $this->input->post('tanggal');
			$judul = $this->input->post('judul');
			$asal = $this->input->post('asal');
			$pengarang = $this->input->post('pengarang');
			$penanggungjawab = $this->input->post('penanggungjawab');
			$kota = $this->input->post('kota');
			$penerbit = $this->input->post('penerbit');
			$tahun = $this->input->post('tahun');
			$jumlahjudul = $this->input->post('jumlahjudul');
			$jumlaheks = $this->input->post('jumlaheks');
	
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
				  redirect('hibah/ubah/'.$kode);
				}
				else{
		
				  $data = array('photo' => $this->upload->data());
				  $nama_file= $data['photo']['file_name'];
				  $ganti = str_replace(" ", "_", $nama_file);
				  if($flama == 'book.png'){
	
				  }else{
					unlink('./assets/upload/hibah/'.$flama.'');
				  }
		
				}
	
			}
	
			$data=array(

				'no_inventaris'=>$no_inventaris,
				'tanggal'=>$tanggal,
				'penerbit'=>$penerbit,
				'pengarang'=>$pengarang,
				'asal'=>$asal,
				'judul'=>$judul,
				'penanggungjawab'=>$penanggungjawab,
				'kota'=>$kota,
				'jumlaheks'=>$jumlaheks,
				'tahun' => $tahun,
				'jumlahjudul' => $jumlahjudul,
				'foto' => $ganti
					);
	
				$where = array('id'=>$id);
		  
			  $this->hibah_model->ubah_data($where, $data, 'hibah');
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
			  redirect('hibah');
		}

		
		public function Print(){
			$data['hibah'] = $this->hibah_model->dataJoin()->result();
			$this->load->view('hibah/print', $data);
		}

		public function ExportPdf(){
				$this->load->model('hibah_model');

				$data['hibah'] = $this->hibah_model->dataJoin()->result();

				$this->load->library('pdf');
				$this->pdf->setPaper('A4', 'landscape');
				$this->pdf->filename = "laporan hibah buku.pdf";

				$this->pdf->load_view('hibah/pdf', $data);
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
			$sheet->setCellValue('A1', "LAPORAN BUKU HIBAH"); // Set kolom A1 dengan tulisan "DATA HIBAH"
			$sheet->mergeCells('A1:L1'); // Set Merge Cell pada kolom A1 sampai E1
			$sheet->getStyle('A1')->getFont()->setBold(true); // Set bold kolom A1
			// Buat header tabel nya pada baris ke 3
			$sheet->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
			$sheet->setCellValue('B3', "TANGGAL"); // Set kolom B3 dengan tulisan "TANGGAL"
			$sheet->setCellValue('C3', "ASAL"); // Set kolom C3 dengan tulisan "ASAL"
			$sheet->setCellValue('D3', "JUDUL"); // Set kolom D3 dengan tulisan "JUDUL"
			$sheet->setCellValue('E3', "PENGARANG"); // Set kolom E3 dengan tulisan "PENGARANG"
			$sheet->setCellValue('F3', "PENANGGUNG JAWAB"); // Set kolom F3 dengan tulisan "PENANGGUNGJAWAB"
			$sheet->setCellValue('G3', "KOTA"); // Set kolom G3 dengan tulisan "KOTA"
			$sheet->setCellValue('H3', "PENERBIT"); // Set kolom H3 dengan tulisan "PENERBIT"
			$sheet->setCellValue('I3', "TAHUN"); // Set kolom I3 dengan tulisan "TAHUN"
			$sheet->setCellValue('J3', "JUMLAH JUDUL"); // Set kolom J3 dengan tulisan "JUMLAH JUDUL"
			$sheet->setCellValue('K3', "JUMLAH EKS"); // Set kolom K3 dengan tulisan "JUMLAH EKS"
			$sheet->setCellValue('L3', "NO INVENTARIS"); // Set kolom L3 dengan tulisan "NO INVENTARIS"
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
			$sheet->getStyle('L3')->applyFromArray($style_col);
			// Panggil function view yang ada di hibah_Model untuk menampilkan semua data HIBAH
			$hibah = $this->hibah_model->view();
			$no = 1; // Untuk penomoran tabel, di awal set dengan 1
			$numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
			foreach($hibah as $data){ // Lakukan looping pada variabel hibah
			  $sheet->setCellValue('A'.$numrow, $no);
			  $sheet->setCellValue('B'.$numrow, $data->tanggal);
			  $sheet->setCellValue('C'.$numrow, $data->asal);
			  $sheet->setCellValue('D'.$numrow, $data->judul);
			  $sheet->setCellValue('E'.$numrow, $data->pengarang);
			  $sheet->setCellValue('F'.$numrow, $data->penanggungjawab);
			  $sheet->setCellValue('G'.$numrow, $data->kota);
			  $sheet->setCellValue('H'.$numrow, $data->penerbit);
			  $sheet->setCellValue('I'.$numrow, $data->tahun);
			  $sheet->setCellValue('J'.$numrow, $data->jumlahjudul);
			  $sheet->setCellValue('K'.$numrow, $data->jumlaheks);
			  $sheet->setCellValue('L'.$numrow, $data->no_inventaris);
			  
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
			  $sheet->getStyle('L'.$numrow)->applyFromArray($style_row);
			  $no++; // Tambah 1 setiap kali looping
			  $numrow++; // Tambah 1 setiap kali looping
			}
			// Set width kolom
			$sheet->getColumnDimension('A')->setWidth(4); // Set width kolom A
			$sheet->getColumnDimension('B')->setWidth(10); // Set width kolom B
			$sheet->getColumnDimension('C')->setWidth(30); // Set width kolom C
			$sheet->getColumnDimension('D')->setWidth(50); // Set width kolom D
			$sheet->getColumnDimension('E')->setWidth(30); // Set width kolom E
			$sheet->getColumnDimension('F')->setWidth(30); // Set width kolom E
			$sheet->getColumnDimension('G')->setWidth(10); // Set width kolom E
			$sheet->getColumnDimension('H')->setWidth(20); // Set width kolom E
			$sheet->getColumnDimension('I')->setWidth(10); // Set width kolom E
			$sheet->getColumnDimension('J')->setWidth(20); // Set width kolom E
			$sheet->getColumnDimension('K')->setWidth(20); // Set width kolom E
			$sheet->getColumnDimension('L')->setWidth(20); // Set width kolom E
			
			// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
			$sheet->getDefaultRowDimension()->setRowHeight(-1);
			// Set orientasi kertas jadi LANDSCAPE
			$sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
			// Set judul file excel nya
			$sheet->setTitle("Laporan Buku hibah");
			$filename = ''; // set filename for excel file to be exported
			// Proses file excel
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment; filename="Laporan Buku hibah.xlsx"'); // Set nama file excel nya
			header('Cache-Control: max-age=0');
			$writer = new xlsx($spreadsheet);
			$writer->save('php://output');
	
	}
}