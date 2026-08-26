<?php
/**
 * Model untuk data produk berdasarkan kategori.
 * Digunakan untuk menampilkan item sesuai jenis kategori yang dipilih user.
 */
class model_kategori extends CI_Model {

    public function data_elektronik()
    {
        return $this->db->get_where('tb_barang', array('kategori' => 'Elektronik'));
    }
    public function data_Pakaian_Pria()
    {
        return $this->db->get_where('tb_barang', array('kategori' => 'Pakaian Pria'));
    }
    public function data_Pakaian_Wanita()
    {
        return $this->db->get_where('tb_barang', array('kategori' => 'Pakaian Wanita'));
    }
    public function data_Pakaian_Anak_Anak()
    {
        return $this->db->get_where('tb_barang', array('kategori' => 'Pakaian Anak-Anak'));
    }
    public function data_Peralatan_Olahraga()
    {
        return $this->db->get_where('tb_barang', array('kategori' => 'Peralatan Olahraga'));
    }
        
} 