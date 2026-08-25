<?php
    class Karyawan extends CI_Controller{

        public function __construct(){
            parent::__construct();
            $this->load->model('M_Karyawan');
        }

        public function index(){
            $this->select();
        }

        public function select(){
            $data['judul']="Data Karyawan";
            $data['karyawan']=$this->M_Karyawan->Tampil();
            $this->load->view('template/header' ,$data);
            $this->load->view('karyawan/view_data' ,$data);
            $this->load->view('template/footer');
        }

        public function tambah(){
            $data['judul']="Tambah Data Karyawan";
            $this->load->view('template/header' ,$data);
            $this->load->view('karyawan/form_tambah' );
            $this->load->view('template/footer');
        }

        public function insert(){
            $nama=$this->input->post('nama');
            $alamat=$this->input->post('alamat');
            $tanggal_lahir=$this->input->post('tanggal_lahir');
            
            $this->M_Karyawan->save($nama,$alamat,$tanggal_lahir);
            redirect('karyawan');
        }

        public function get_edit(){
            $id=$this->uri->segment(3);
            $hasil=$this->M_Karyawan->pilih_karyawan($id);
            $i=$hasil->row_array();
            $data = array(
                'nama' => $i['nama'],
                'alamat' => $i['alamat'],
                'tanggal_lahir' => $i['tanggal_lahir'],
                'id' => $i['id']
            );

            $data['judul']="Ubah Data Karyawan";
            $this->load->view('template/header' ,$data);
            $this->load->view('karyawan/form_ubah' ,$data);
            $this->load->view('template/footer');
        }

        public function update(){
            $id=$this->input->post('id');
            $nama=$this->input->post('nama');
            $alamat=$this->input->post('alamat');
            $tanggal_lahir=$this->input->post('tanggal_lahir');

            $this->M_Karyawan->edit($id,$nama,$alamat,$tanggal_lahir);
            redirect('karyawan');
        }

        public function hapus(){
            $id=$this->uri->segment(3);
            $this->M_Karyawan->delete($id);
            redirect('karyawan');
        }
    }  

?> 