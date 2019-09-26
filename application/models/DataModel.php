<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class DataModel extends CI_Model {

    
    public function __construct()
    {
        parent::__construct();
        
        // Akan diproses saat class (controller) dipanggil oleh sistem CodeIgniter
        $this->load->database(); // Load Library Database
    }
    
    public function view($tabel)
    {
        # Fungsi: untuk melihat isi tabel
        // Dengan query native, uncomment baris dibawah ini untuk menggunakan fungsinya
        //return $this->db->query("SELECT * FROM $tabel");

        // Dengan Query Builder
        $query = $this->db->get($tabel);
        return $query->result_array();
    }

    public function search($tabel, $dimana_array)
    {
        # Fungsi: untuk pencarian data (output array)
        $query = $this->db->select('*')->get_where($tabel, $dimana_array);
        return $query;
    }

    public function insert($tabel, $isi_array)
    {
        # Fungsi: untuk memasukkan data
        $this->db->insert($tabel, $isi_array);
        return true;
    }

    public function update($tabel, $isi, $dimana_array)
    {
        # Fungsi: untuk mengubah data
        $this->db->update($tabel, $isi, $dimana_array);
        return true;
    }

    public function delete($tabel, $dimana_array)
    {
        # Fungsi: untuk menghapus data
        $this->db->delete($tabel, $dimana_array);
        return true;
    }

}

/* End of file DataModel.php */
