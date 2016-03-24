<?php

 function getidorder()
{
    // BR001
    $CI=& get_instance();
    $chek=$CI->db->query("select order_id from tbl_order order by order_id DESC");
    if($chek->num_rows()>0){
        $chek=$chek->row_array();
        $lastKode=$chek['order_id'];
        $ambil=  substr($lastKode, 4,3)+1;
        $newCode=  "ORD-".sprintf("%03s",$ambil);
        return $newCode;
    }
    else{
        return 'ORD-001';
    }
}

//hitung  seluruh stok
 function hitungstok(){
  $CI=& get_instance();
$data = $CI->db->query("SELECT COUNT(DISTINCT id) FROM `tbl_produk` WHERE stok > 0")->result_array();
        echo $data[0]['COUNT(DISTINCT id)'];

}

function hitungstokcelana1(){
     $CI=& get_instance();
   $data= $CI->db->query("select nama,kategori_id,harga FROM tbl_produk where stok = (SELECT max(stok) FROM tbl_produk)")->result_array();

}

function hitungstokcelana(){
 $CI=& get_instance();
 $data = $CI->db->query("SELECT sum(stok) FROM `tbl_produk` WHERE kategori_id = 'PC001'")->result_array();
echo $data[0]['sum(stok)'];
}

function getKategoripria(){
$CI=& get_instance();
$data['data'] = $CI->db->query("SELECT * from kategori where LEFT(id,1) = 'P'")->result_array();
return $data;

}





?>