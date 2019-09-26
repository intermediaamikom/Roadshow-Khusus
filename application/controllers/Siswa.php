<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();

        // Akan diproses saat class (controller) dipanggil oleh sistem CodeIgniter
        $this->load->database(); // Load Library Database
        $this->load->helper('url'); // Load URL Helper
        $this->load->model('DataModel');
    }
    

    public function index()
    {
        // Menampilkan halaman utama
        $data['siswa'] = $this->DataModel->view('daftar_siswa');
        $this->load->view('daftar_siswa', $data);
    }

    public function tambah()
    {
        // Menampilkan halaman tambah
        $this->load->view('tambah_siswa');
    }

    public function ubah()
    {
        $nis = $this->input->get('nis');
        $cari = $this->DataModel->search("daftar_siswa", array('nis' => $nis))->row();
        $data['nis'] = $cari->nis;
        $data['nama'] = $cari->nama;
        $data['kelas'] = $cari->kelas;
        $data['alamat'] = $cari->alamat;
        $data['tanggal_lahir'] = $cari->tanggal_lahir;
        $data['jenis_kelamin'] = $cari->jenis_kelamin;
        $data['telepon'] = $cari->telepon;
        $this->load->view('ubah_siswa', $data);
    }

    public function hapus()
    {
        // Untuk menghapus data
        $nis = $this->input->get('nis');
        $this->DataModel->delete("daftar_siswa", array("nis" => $nis));
        redirect(base_url(),'refresh');
    }

    public function tambah_baru()
    {
        // Untuk memasukkan data ke database

        // Lakukan Passing Data dari halaman sebelumnya
        $nis            = $this->input->post('nis');
        $nama           = $this->input->post('nama');
        $kelas          = $this->input->post('kelas');
        $alamat         = $this->input->post('alamat');
        $tanggal_lahir  = $this->input->post('tanggal_lahir');
        $jenis_kelamin  = $this->input->post('jenis_kelamin');
        $telepon        = $this->input->post('telepon');

        // Cari duplikat data
        $cari = $this->DataModel->search("daftar_siswa", array("nis" => $nis))->num_rows(); // Menghitung total data yang ada
        if ($cari > 0) {
            echo "NIS $nis sudah ada!";
        } else {
            // Lakukan insert data
            $this->DataModel->insert("daftar_siswa", array(
                'nis' => $nis,
                'nama' => $nama,
                'kelas' => $kelas,
                'alamat' => $alamat,
                'tanggal_lahir' => $tanggal_lahir,
                'jenis_kelamin' => $jenis_kelamin,
                'telepon' => $telepon
            ));
            redirect(base_url(), 'refresh');
        }
    }

    public function ubah_data()
    {
        // Untuk mengubah data di database

        // Lakukan Passing Data dari halaman sebelumnya
        $nis            = $this->input->post('nis');
        $nama           = $this->input->post('nama');
        $kelas          = $this->input->post('kelas');
        $alamat         = $this->input->post('alamat');
        $tanggal_lahir  = $this->input->post('tanggal_lahir');
        $jenis_kelamin  = $this->input->post('jenis_kelamin');
        $telepon        = $this->input->post('telepon');

        // Lakukan update data
        $this->DataModel->update("daftar_siswa", array(
            'nama' => $nama,
            'kelas' => $kelas,
            'alamat' => $alamat,
            'tanggal_lahir' => $tanggal_lahir,
            'jenis_kelamin' => $jenis_kelamin,
            'telepon' => $telepon
        ), array('nis' => $nis));
        redirect(base_url(), 'refresh');
    }

}

/* End of file Siswa.php */
