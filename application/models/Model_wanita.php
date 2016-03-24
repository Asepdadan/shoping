<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_wanita extends CI_Model {

 public function addProduk($tablename,$data){
        $this->db->insert($tablename,$data);
    }

        public function deleteWanita($kode){
        $this->db->query("delete from tbl_produk where kode_produk = '$kode'");
        
    }

    public function getWhere($kode){
        return $this->db->query("select* from tbl_produk where kode_produk = '$kode'")->result_array();
    }

     public function edit($tablename,$data,$where){
        $this->db->update($tablename,$data,$where);
    }

    public function getWanita($limit,$start){
    return $this->db->query("SELECT * FROM tbl_produk where LEFT(kategori_id,1) = 'W' LIMIT  $limit offset $start ")->result_array();
    }


/*celana*/
    public function getwanitaCelana($limit,$start){
    return $this->db->query("select * from tbl_produk WHERE kategori_id = 'W001' ORDER BY created LIMIT  $limit offset $start")->result_array();
    }

    public function wanitaCelana(){
    return $this->db->query("select * from tbl_produk WHERE kategori_id = 'W001' ORDER BY created")->result_array();
    }



/*gamis*/
    public function getwanitaGamis($limit,$start){
    return $this->db->query("select * from tbl_produk WHERE kategori_id = 'W002' ORDER BY created LIMIT  $limit offset $start")->result_array();
    }

    public function wanitaGamis(){
    return $this->db->query("select * from tbl_produk WHERE kategori_id = 'W002' ORDER BY created")->result_array();
    }




/*jaket*/
    public function getwanitaJaket($limit,$start){
    return $this->db->query("select * from tbl_produk WHERE kategori_id = 'W003' ORDER BY created LIMIT  $limit offset $start")->result_array();
    }

      public function wanitaJaket(){
    return $this->db->query("select * from tbl_produk WHERE kategori_id = 'W003' ORDER BY created")->result_array();
    }

/*Atasan*/
    public function getwanitaAtasan($limit,$start){
    return $this->db->query("select * from tbl_produk WHERE kategori_id = 'W004' ORDER BY created LIMIT  $limit offset $start")->result_array();
    }

    public function wanitaAtasan(){
    return $this->db->query("select * from tbl_produk WHERE kategori_id = 'W004' ORDER BY created")->result_array();
    }



/*Sendal Sepatu*/
    public function getwanitaSendal_Sepatu($limit,$start){
    return $this->db->query("select * from tbl_produk WHERE kategori_id = 'W005' ORDER BY created LIMIT  $limit offset $start")->result_array();
    }

       public function wanitaSendal_Sepatu(){
    return $this->db->query("select * from tbl_produk WHERE kategori_id = 'W005' ORDER BY created")->result_array();
    }

    /*Kerudung*/
    public function getwanitaKerudung($limit,$start){
    return $this->db->query("select * from tbl_produk WHERE kategori_id = 'W006' ORDER BY created LIMIT  $limit offset $start")->result_array();
    }

        public function wanitaKerudung(){
    return $this->db->query("select * from tbl_produk WHERE kategori_id = 'W006' ORDER BY created")->result_array();
    }

     /*kaos*/
    public function getwanitaKaos($limit,$start){
    return $this->db->query("select * from tbl_produk WHERE kategori_id = 'W007' ORDER BY created LIMIT  $limit offset $start")->result_array();
    }

      public function wanitaKaos(){
    return $this->db->query("select * from tbl_produk WHERE kategori_id = 'W007' ORDER BY created")->result_array();
    }

     /*Kemeja*/
    public function getwanitaKemeja($limit,$start){
    return $this->db->query("select * from tbl_produk WHERE kategori_id = 'W008' ORDER BY created LIMIT  $limit offset $start")->result_array();
    }

      public function wanitaKemeja(){
    return $this->db->query("select * from tbl_produk WHERE kategori_id = 'W008' ORDER BY created")->result_array();
    }



}    