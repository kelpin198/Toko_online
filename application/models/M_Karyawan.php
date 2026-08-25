<?php
    class M_Karyawan extends CI_Model{

        public function Tampil(){
            $query = $this->db->get('tblkaryawan');
            $data=$query->result_array();
            return $data;
        }

        public function save($nama,$alamat,$tanggal_lahir){
            $data = array(
                'nama' => $nama,
                'alamat' => $alamat,
                'tanggal_lahir' => $tanggal_lahir
            );
            
            $this->db->insert('tblkaryawan', $data);
        }

        public function pilih_karyawan($id){
            $query = $this->db->get_where('tblkaryawan', array('id' => $id));
            return $query;
        }

        public function edit($id,$nama,$alamat,$tanggal_lahir){
            $data = array(
                'nama' => $nama,
                'alamat' => $alamat,
                'tanggal_lahir' => $tanggal_lahir
            );
            $this->db->where('id', $id);
            $this->db->update('tblkaryawan', $data);
        }

        public function delete($id){
            $this->db->where('id', $id);
            $this->db->delete('tblkaryawan');
        }

    }
?>
