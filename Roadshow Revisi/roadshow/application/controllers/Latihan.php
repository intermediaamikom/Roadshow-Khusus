<?php

class Latihan extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        echo "Ini Method Index";
    }

    public function halo(){
        echo "Ini Method halo";
    }

    public function penjumlahan(){
        $angka1 = 5;
        $angka2 = 10;
        $hasil = $angka1 + $angka2;
        echo $hasil;
    }

    public function uri_segment(){
        echo "Uri Segment 1 : " .  $this->uri->segment('1') . "<br>";
        echo "Uri Segment 2 : " .  $this->uri->segment('2') . "<br>";
        echo "Uri Segment 3 : " .  $this->uri->segment('3') . "<br>";
    }

    public function penjumlahan2(){
        $angka1 = $this->uri->segment('3');
        $angka2 = $this->uri->segment('4');
        $hasil = $angka1 + $angka2;
        echo $hasil;
    }

    public function nama($nama = null, $umur = null){
        echo "Hallo Nama Saya $nama, Umur Saya $umur tahun";
    }

}