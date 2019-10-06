<?php 

class M_siswa extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database(); // Load Library Database
    }

    public function get_siswa_statis(){
        $siswa[0]["nis"] = "12345";
        $siswa[0]["nama"] = "Rafli Firdausy Irawan";
        $siswa[0]["kelas"] = "X RPL 1";
        $siswa[0]["alamat"] = "Jalan jalan Yuk";
        $siswa[0]["tanggal_lahir"] = "2019-10-26";
        $siswa[0]["jenis_kelamin"] = "L";
        $siswa[0]["telepon"] = "0851273981273";

        $siswa[1]["nis"] = "54321";
        $siswa[1]["nama"] = "Dwi Chan";
        $siswa[1]["kelas"] = "X RPL 2";
        $siswa[1]["alamat"] = "Jalan Rindu";
        $siswa[1]["tanggal_lahir"] = "2019-10-22";
        $siswa[1]["jenis_kelamin"] = "P";
        $siswa[1]["telepon"] = "0812398948320";

        return $siswa;
    }

    public function view($tabel)
    {
        # Fungsi: untuk melihat isi tabel
        // Dengan query native, uncomment baris dibawah ini untuk menggunakan fungsinya
        //$query = $this->db->query("SELECT * FROM $tabel");

        // Dengan Query Builder
        $query = $this->db->get($tabel);
        return $query->result_array();
    }

    public function search($tabel, $dimana_array)
    {
        # Fungsi: untuk pencarian data (output array)
        // SELECT * FROM table WHERE param1 = value1 AND param2 = value2 , dst
        return $this->db->select('*')->get_where($tabel, $dimana_array);
    }

    public function insert($tabel, $isi_array)
    {
        # Fungsi: untuk memasukkan data
        return $this->db->insert($tabel, $isi_array);
    }

    public function getError(){
        # Fungsi: untuk mendapatkan respon erorr dari database
        return $this->db->error()["message"];
    }

    public function update($tabel, $isi, $dimana_array)
    {
        # Fungsi: untuk mengubah data
        return $this->db->update($tabel, $isi, $dimana_array);
    }

    public function delete($tabel, $dimana_array)
    {
        # Fungsi: untuk menghapus data
        return $this->db->delete($tabel, $dimana_array);
    }
}