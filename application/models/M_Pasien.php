<?php
    class M_Pasien extends CI_Model{

        public function Tampil(){
            $query = $this->db->get('tblpasien'); // UBAH NAMA TABEL
            $data=$query->result_array();
            return $data;
        }

        public function save($nama,$alamat,$jeniskelamin,$no_hp,$riwayat){
            $data = array(
                'nama' => $nama,
                'alamat' => $alamat,
                'jeniskelamin' => $jeniskelamin,
                'no_hp' => $no_hp,
                'riwayat' => $riwayat
            );
            
            $this->db->insert('tblpasien', $data);
        }

        public function pilih_pasien($id){
            $query = $this->db->get_where('tblpasien', array('id_pasien' => $id)); // UBAH NAMA TABEL & FIELD ID
            return $query; 
        }

        public function edit($id,$nama,$alamat,$jeniskelamin,$no_hp,$riwayat){
            $data = array(
                'nama' => $nama,
                'alamat' => $alamat,
                'jeniskelamin' => $jeniskelamin,
                'no_hp' => $no_hp,
                'riwayat' => $riwayat
            );
            $this->db->where('id_pasien', $id); // UBAH NAMA FIELD ID
            $this->db->update('tblpasien', $data); // UBAH NAMA TABEL
        }

        public function delete($id){
            $this->db->where('id_pasien', $id); // UBAH NAMA FIELD ID
            $this->db->delete('tblpasien'); // UBAH NAMA TABEL
        }
    }
?>