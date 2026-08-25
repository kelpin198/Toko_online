<?php
    class M_Anggota extends CI_Model{

        public function Tampil(){
            $query = $this->db->get('tblanggota');
            $data=$query->result_array();
            return $data;
        }

        public function save($namaanggota,$alamat){
            $data = array(
                'namaanggota' => $namaanggota,
                'alamat' => $alamat
            );
            
            $this->db->insert('tblanggota', $data);
        }

        public function pilih_anggota($id){
            $query = $this->db->get_where('tblanggota', array('idanggota' => $id));
            return $query;
        }

        public function edit($id,$namaanggota,$alamat){
            $data = array(
                'namaanggota' => $namaanggota,
                'alamat' => $alamat
            );
            $this->db->where('idanggota', $id);
            $this->db->update('tblanggota', $data);
        }

        public function delete($id){
            $this->db->where('idanggota', $id);
            $this->db->delete('tblanggota',);
        }




    }
?>