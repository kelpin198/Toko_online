<?php
/**
 * Controller utama untuk halaman pelanggan.
 * Mengelola tampilan produk, keranjang belanja, checkout, dan detail barang.
 */
class dasboard extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('role_id') != '2') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Anda Belum Login!!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('auth/login');
        }
        
    }

    public function index()
    {
        $data['barang'] = $this->model_barang->tampil_data()->result();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('dasboard', $data);
        $this->load->view('template/footer');
    }

    public function tambah_ke_keranjang($id)
    {
        $barang = $this->model_barang->find($id);

        if (empty($barang)) {
            redirect('dasboard');
        }

        $data = array(
            'id'      => (string) $barang->id_brg,
            'qty'     => 1,
            'price'   => (float) $barang->harga,
            'name'    => $barang->nama_brg
        );

        $keranjang = $this->cart->contents();
        $item_ditemukan = FALSE;

        foreach ($keranjang as $item) {
            if ($item['id'] == $data['id']) {
                $this->cart->update(array(
                    'rowid' => $item['rowid'],
                    'qty'   => $item['qty'] + 1
                ));
                $item_ditemukan = TRUE;
                break;
            }
        }

        if (!$item_ditemukan) {
            $this->cart->insert($data);
        }

        if (!empty($_SERVER['HTTP_REFERER'])) {
            redirect($_SERVER['HTTP_REFERER']);
        }

        redirect('dasboard');
    }

    public function update_keranjang($rowid, $qty)
    {
        $qty = (int) $qty;

        if ($qty <= 0) {
            $this->cart->remove($rowid);
        } else {
            $this->cart->update(array(
                'rowid' => $rowid,
                'qty'   => $qty
            ));
        }

        redirect('dasboard/detail_keranjang');
    }
    public function detail_keranjang()
    {
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('keranjang');
        $this->load->view('template/footer');
    }
    public function hapus_keranjang()
    {
        $this->cart->destroy();
        redirect('welcome');
    }
    public function pembayaran()
    {
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('pembayaran');
        $this->load->view('template/footer');
    }
    public function proses_pesanan()
    {
       $data['pesanan'] = $this->cart->contents();
       $data['total'] = $this->cart->total();

       $is_processed = $this->model_invoice->index();
         if($is_processed) {
              $this->cart->destroy();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('proses_pesanan', $data);
        $this->load->view('template/footer');
    }else {
        echo "Maaf, Pesanan Anda Gagal Diproses!!";
    }
    }
    public function detail_barang($id_brg)
    {
        $data['barang'] = $this->model_barang->detail_brg($id_brg);
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('detail_barang', $data);
        $this->load->view('template/footer');
    }

} 