<?php
/**
 * Controller dashboard admin.
 * Menampilkan statistik toko, total pendapatan, dan daftar pesanan terbaru.
 */
class dasboard_admin extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('role_id') != '1') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Anda Belum Login!!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('auth/login');
         }
    }
    public function index()
    {
        // 1. Statistik jumlah produk yang tersedia di tabel tb_barang
        $data['total_produk'] = $this->db->count_all('tb_barang');

        // 2. Statistik jumlah invoice / transaksi yang tercatat di tb_invoice
        $data['total_invoice'] = $this->db->count_all('tb_invoice');

        // 3. Statistik jumlah item yang sudah terjual dari tabel tb_pesanan
        $data['total_pesanan'] = $this->db->count_all('tb_pesanan');

        // 4. Menghitung total pendapatan dari seluruh pesanan:
        //    total = harga per item * jumlah item, lalu dijumlahkan semua record
        $revenue = $this->db->select('SUM(harga * jumlah) AS total', false)
                            ->from('tb_pesanan')
                            ->get()
                            ->row();
        $data['total_revenue'] = $revenue->total ?? 0;

        // 5. Menampilkan 5 pesanan terbaru beserta nama pelanggan, tanggal, jumlah item,
        //    dan total harga yang dibelanjakan pada setiap invoice
        $data['recent_orders'] = $this->db->query(
            "SELECT i.id, i.nama, i.tgl_pesan, SUM(p.harga * p.jumlah) AS total_harga, COUNT(*) AS item_count
             FROM tb_invoice i
             JOIN tb_pesanan p ON i.id = p.id_invoice
             GROUP BY i.id, i.nama, i.tgl_pesan
             ORDER BY i.tgl_pesan DESC
             LIMIT 5"
        )->result();

        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/dasboard', $data);
        $this->load->view('template_admin/footer');
    }

}