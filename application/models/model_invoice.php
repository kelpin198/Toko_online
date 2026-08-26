<?php
/**
 * Model untuk menangani data invoice dan pesanan pelanggan.
 * Digunakan saat user melakukan checkout dan admin melihat riwayat transaksi.
 */
class model_invoice extends CI_Model {

    /**
     * Simpan data invoice utama dan item-item pesanan ke database.
     * Dipanggil saat user mengirim form pembayaran.
     */
    public function index()
   {
    date_default_timezone_set('Asia/Jakarta');
    $nama = $this->input->post('nama');
    $alamat = $this->input->post('alamat');

    // Data utama invoice
    $invoice = array(
        'nama' => $nama,
        'alamat' => $alamat,
        'tgl_pesan' => date('Y-m-d H:i:s'),
        'batas_bayar' => date('Y-m-d H:i:s', mktime(date('H'), date('i'), date('s'), date('m'), date('d') + 1, date('Y'))),
    );
    $this->db->insert('tb_invoice', $invoice);
    $id_invoice = $this->db->insert_id();

    // Simpan tiap item dari keranjang ke tabel tb_pesanan
    foreach ($this->cart->contents() as $item) {
        $data = array(
            'id_invoice' => $id_invoice,
            'id_brg' => $item['id'],
            'nama_brg' => $item['name'],
            'jumlah' => $item['qty'],
            'harga' => $item['price']
        );
        $this->db->insert('tb_pesanan', $data);
    }
    return TRUE;
   }

   /**
    * Mengambil semua data invoice untuk ditampilkan di halaman admin.
    */
   public function tampil_data()
   {
    $result = $this->db->get('tb_invoice');
    if ($result->num_rows() > 0) {
        return $result->result();
    } else {
        return false;
    }
   }

   /**
    * Mengambil satu data invoice berdasarkan ID.
    */
   public function ambil_id_invoice($id_invoice)
   {
    $result = $this->db->where('id', $id_invoice)->limit(1)->get('tb_invoice');
    if ($result->num_rows() > 0) {
        return $result->row();
    } else {
        return false;
    }
   }

   /**
    * Mengambil semua item pesanan berdasarkan ID invoice.
    */
    public function ambil_id_pesanan($id_invoice)
    {
     $result = $this->db->where('id_invoice', $id_invoice)->get('tb_pesanan');
     if ($result->num_rows() > 0) {
          return $result->result();
     } else {
          return false;
     }
    }
}