<?php

class Belajar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url'); // Load URL Helper
    }

    public function index()
    {
        $this->load->view('welcome_message');
    }

    public function passing_data()
    {
        $data["nama"] = "Rafli Firdausy";
        $data["instansi"] = "Universitas Amikom Purwokerto";
        $this->load->view('v_nama', $data);
    }

    public function input()
    {
        $this->load->view('v_input');
    }

    public function hasil()
    {
        $data["input_nis"] = $this->input->post('nis');
        $data["input_nama"] = $this->input->post('nama');
        $data["input_kelas"] = $this->input->post('kelas');
        $data["input_alamat"] = $this->input->post('alamat');
        $data["input_tanggal_lahir"] = $this->input->post('tanggal_lahir');
        $data["input_jenis_kelamin"] = $this->input->post('jenis_kelamin');
        $data["input_telepon"] = $this->input->post('telepon');

        $this->load->view('v_hasil', $data);
    }
}
