<?php
class hibah_model extends ci_model{


  function data()
  {
      $this->db->order_by('id','DESC');
      return $query = $this->db->get('hibah');
  }


  public function view(){
    return $this->db->get('hibah')->result(); // Tampilkan semua data yang ada di tabel hibah
  }

  
  public function ambilFoto($where)
  {
    $this->db->order_by('id','DESC');
    $this->db->limit(1);
    $query = $this->db->get_where('hibah', $where);   
    
    $data = $query->row();
    $foto= $data->foto;
    
    return $foto;
  }

  

  public function dataJoin()
  {
    $this->db->select('*');
    $this->db->from('hibah as b');

    $this->db->order_by('b.id','DESC');
    return $query = $this->db->get();
  }

  public function detail_join($where)
  {
    $this->db->select('*');
    $this->db->from('hibah as b');
    $this->db->where('b.id',$where);
  

    
    return $this->db->get();
  }



  public function ambilId($table, $where)
 {
     return $this->db->get_where($table, $where);
  }

  public function hapus_data($where, $table)
  {
      $this->db->where($where);
      $this->db->delete($table);
       if ($this->db->affected_rows() == 1) {
          return TRUE;
      }
      return false;

  }


  public function detail_data($where, $table)
  {
     return $this->db->get_where($table,$where);
  }

  public function tambah_data($data, $table)
  {
     $this->db->insert($table, $data);
  }

  public function ubah_data($where, $data, $table)
  {
     $this->db->where($where);
     $this->db->update($table, $data);

  }


  public function buat_kode()   {
    $this->db->select('RIGHT(hibah.id,4) as kode', FALSE);
    $this->db->order_by('id','DESC');
    $this->db->limit(1);
    $query = $this->db->get('hibah');      //cek dulu apakah ada sudah ada kode di tabel.
    if($query->num_rows() <> 0){
     //jika kode ternyata sudah ada.
     $data = $query->row();
     $kode = intval($data->kode) + 1;
    }
    else {
     //jika kode belum ada
     $kode = 1;
    }
    $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
    $kodejadi ="H".$kodemax;    // hasilnya ODJ-0001 dst.
    return $kodejadi;
}

  public function buat_kode2()   {
    $this->db->select('RIGHT(hibah.no_hibah,4) as kode', FALSE);
    $this->db->order_by('no_hibah','DESC');
    $this->db->limit(1);
    $query = $this->db->get('hibah');      //cek dulu apakah ada sudah ada kode di tabel.
    if($query->num_rows() <> 0){
     //jika kode ternyata sudah ada.
     $data = $query->row();
     $kode = intval($data->kode) + 1;
    }
    else {
     //jika kode belum ada
     $kode = 1;
    }
    $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
    $kodejadi = $kodemax . "/A";    // hasilnya ODJ-0001 dst.
    return $kodejadi;
}



}
