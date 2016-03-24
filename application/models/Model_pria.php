<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_pria extends CI_Model {

     public function addProduk($tablename,$data){
        $this->db->insert($tablename,$data);
    }

        public function deletePria($kode){
        $this->db->query("delete from tbl_produk where kode_produk = '$kode'");
        
    }

    public function getWhere($kode){
        return $this->db->query("select* from tbl_produk where kode_produk = '$kode'")->result_array();
    }

     public function edit($tablename,$data,$where){
        $this->db->update($tablename,$data,$where);
    }

    public function getPria($limit,$start){
    return $this->db->query("SELECT * FROM tbl_produk where LEFT(kategori_id,1) = 'P' ORDER By created LIMIT  $limit offset $start ")->result_array();
    }

/*kemeja*/
    public function getpriaKemeja($limit,$start){
    return $this->db->query("select * from tbl_produk WHERE kategori_id = 'P002' ORDER BY created LIMIT  $limit offset $start")->result_array();
    }



/*balzer*/
    public function getpriaBlazer($limit,$start){
    return $this->db->query("select * from tbl_produk WHERE kategori_id = 'P003' ORDER BY created LIMIT  $limit offset $start")->result_array();
    }

    public function Blazer(){
    return $this->db->query("select * from tbl_produk WHERE kategori_id = 'P003' ORDER BY created")->result_array();
    }



/*celana*/
    public function getCelana($limit,$start){
    return $this->db->query("select * from tbl_produk WHERE kategori_id = 'P001' ORDER BY created LIMIT  $limit offset $start")->result_array();
    }

    public function Celana(){
    return $this->db->query("select * from tbl_produk WHERE kategori_id = 'P001' ORDER BY created")->result_array();
    }


/*kaos*/
    public function getKaos($limit,$start){
    return $this->db->query("select * from tbl_produk WHERE kategori_id = 'P004' ORDER By created LIMIT  $limit offset $start ")->result_array();
    }

     public function Kaos(){
    return $this->db->query("select * from tbl_produk WHERE kategori_id = 'P004' ORDER By created ")->result_array();
    }



/*topi*/
    public function getTopi($limit,$start){
    return $this->db->query("select * from tbl_produk WHERE kategori_id = 'P005' ORDER BY created LIMIT  $limit offset $start")->result_array();
    }

       public function Topi(){
    return $this->db->query("select * from tbl_produk WHERE kategori_id = 'P005' ORDER BY created")->result_array();
    }



    /*Jaket*/
    public function getJaket($start,$limit){
    return $this->db->query("select * from tbl_produk WHERE kategori_id = 'P006' ORDER BY created LIMIT  $limit offset $start")->result_array();
    }

     public function Jaket(){
    return $this->db->query("select * from tbl_produk WHERE kategori_id = 'P006' ORDER BY created")->result_array();
    }

    /*sepatu*/
    public function getSepatu($limit,$start){
    return $this->db->query("select * from tbl_produk WHERE kategori_id = 'P007' ORDER BY created LIMIT  $limit offset $start")->result_array();
    }

       public function Sepatu(){
    return $this->db->query("select * from tbl_produk WHERE kategori_id = 'P007' ORDER BY created")->result_array();
    }

        /*jam tangan*/
    public function getJamtangan($limit,$start){
    return $this->db->query("select * from tbl_produk WHERE kategori_id = 'P008' ORDER BY created LIMIT  $limit offset $start")->result_array();
    }

     public function Jamtangan(){
    return $this->db->query("select * from tbl_produk WHERE kategori_id = 'P008' ORDER BY created")->result_array();
    }



}    