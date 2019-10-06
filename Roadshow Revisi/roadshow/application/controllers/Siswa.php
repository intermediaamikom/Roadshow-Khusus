<?php

class Siswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url'); // Load URL Helper
        $this->load->model('m_siswa', 'siswa'); // Load Model m_siswa dan di beri alias siswa
    }

    public function index()
	{
        // $data["siswa"] = $this->siswa->get_siswa_statis();
        $data["siswa"] = $this->siswa->view('daftar_siswa');
		$this->load->view('v_siswa', $data);
    }
    
    public function tambah(){
        $this->load->view('v_tambah');
    }

    public function proses_tambah(){
        $nis            = $this->input->post('nis');
        $nama           = $this->input->post('nama');
        $kelas          = $this->input->post('kelas');
        $alamat         = $this->input->post('alamat');
        $tanggal_lahir  = $this->input->post('tanggal_lahir');
        $jenis_kelamin  = $this->input->post('jenis_kelamin');
        $telepon        = $this->input->post('telepon');

        $cari = $this->siswa->search("daftar_siswa", array("nis" => $nis))->num_rows(); // Menghitung total data yang ada
        if ($cari > 0) {
            echo "NIS $nis sudah ada!";
        } else {
            $insert = $this->siswa->insert("daftar_siswa", array(
                'nis' => $nis,
                'nama' => $nama,
                'kelas' => $kelas,
                'alamat' => $alamat,
                'tanggal_lahir' => $tanggal_lahir,
                'jenis_kelamin' => $jenis_kelamin,
                'telepon' => $telepon
            ));
    
            if($insert ){
                redirect(base_url('siswa'), 'refresh');
            } else {
                echo "Erorr : " . $this->siswa->getError();
            }   
        }
    }

    public function ubah()
    {
        $nis = $this->input->get('nis');
        $cari = $this->siswa->search("daftar_siswa", array('nis' => $nis))->row();
        $data['nis'] = $cari->nis;
        $data['nama'] = $cari->nama;
        $data['kelas'] = $cari->kelas;
        $data['alamat'] = $cari->alamat;
        $data['tanggal_lahir'] = $cari->tanggal_lahir;
        $data['jenis_kelamin'] = $cari->jenis_kelamin;
        $data['telepon'] = $cari->telepon;
        $this->load->view('v_ubah', $data);
    }

    public function proses_ubah(){
        // Lakukan Passing Data dari halaman sebelumnya
        $nis            = $this->input->post('nis');
        $nama           = $this->input->post('nama');
        $kelas          = $this->input->post('kelas');
        $alamat         = $this->input->post('alamat');
        $tanggal_lahir  = $this->input->post('tanggal_lahir');
        $jenis_kelamin  = $this->input->post('jenis_kelamin');
        $telepon        = $this->input->post('telepon');

        // Lakukan update data
        $this->siswa->update("daftar_siswa", array(
            'nama' => $nama,
            'kelas' => $kelas,
            'alamat' => $alamat,
            'tanggal_lahir' => $tanggal_lahir,
            'jenis_kelamin' => $jenis_kelamin,
            'telepon' => $telepon
        ), array('nis' => $nis));
        redirect(base_url("siswa"), 'refresh');
    }

    public function hapus()
    {
        // Untuk menghapus data
        $nis = $this->input->get('nis');
        $this->siswa->delete("daftar_siswa", array("nis" => $nis));
        redirect(base_url("siswa"),'refresh');
    }
}
