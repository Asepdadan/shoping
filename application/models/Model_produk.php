<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_produk extends CI_Model {

    public function getpencarian($keywoard){
    return $this->db->query("select * from tbl_produk where nama like '%$keywoard%' or kode_produk like '%$keywoard%' ")->result_array();        
    }


    public function getDatawhere($kode_produk){
        return $this->db->query("select * from tbl_produk where kode_produk = '$kode_produk' limit 1")->result_array();
    }


    public function login($email,$password){
        return $this->db->query("select email,password from tbl_admin where email = '$email' and password = '$password' ")->result_array();
    }


    public function pemesanan($tablename,$data){
        $this->db->insert($tablename,$data);
    }


}
