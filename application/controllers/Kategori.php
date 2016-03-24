<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

        function __construct()
        {
            parent::__construct();

            $this->load->model('Model_wanita');
            $this->load->model('Model_pria');
            $this->load->helper(array('form', 'url'));
             //$this->load->library('form_validation');
            $this->load->library('pagination');

        }

        public function index($id=NULL){
            

        $config['base_url'] = 'http://localhost/olshop/kategori/index';
        $config['total_rows'] = $this->db->get('tbl_produk')->num_rows();
        $config['per_page'] = 6;
        $config['first_page'] = 'Awal';
         $config['last_page'] = 'Akhir';
         $config['next_page'] = '&laquo;';
         $config['prev_page'] = '&raquo;';

        $this->pagination->initialize($config);


        $data['halaman'] = $this->pagination->create_links();
        $data['data'] = $this->Model_produk->getPag($config['per_page'], $id);

        $data['title'] = "Kategori";
        $this->load->view('guest/header',$data);
        $this->load->view('guest/menu');
        $this->load->view('guest/slider');
        $this->load->view('guest/left_sidebar');
        $this->load->view('guest/kategori',$data);
        $this->load->view('guest/footer');

        }

        public function pria($offset = 0){
       $config['base_url'] = base_url().'kategori/pria/';
   
   $config['total_rows'] = $this->db->count_all('tbl_produk');
   $config['per_page'] = 50; /*Jumlah data yang dipanggil perhalaman*/ 
   $config['uri_segment'] = 3; /*data selanjutnya di parse diurisegmen 3*/
   
   /*Class bootstrap pagination yang digunakan*/
   $config['full_tag_open'] = "<ul class='pagination pagination-sm' style='position:relative; top:-25px;'>";
      $config['full_tag_close'] ="</ul>";
   $config['num_tag_open'] = '<li>';
   $config['num_tag_close'] = '</li>';
   $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
   $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
   $config['next_tag_open'] = "<li>";
   $config['next_tagl_close'] = "</li>";
   $config['prev_tag_open'] = "<li>";
   $config['prev_tagl_close'] = "</li>";
   $config['first_tag_open'] = "<li>";
   $config['first_tagl_close'] = "</li>";
   $config['last_tag_open'] = "<li>";
   $config['last_tagl_close'] = "</li>";
  
   $this->pagination->initialize($config);
   
   $data['halaman'] = $this->pagination->create_links();
   /*membuat variable halaman untuk dipanggil di view nantinya*/
   $data['data'] = $this->Model_pria->getPria($config['per_page'], $offset);
          
        //$data['data'] = $this->Model_pria->getPria();
        $data['title'] = "Kategori Pria";
        $data['header'] = "Kategori Pria";
        $this->load->view('guest/header',$data);
        $this->load->view('guest/menu');
        $this->load->view('guest/slider');
        $this->load->view('guest/left_sidebar');
        $this->load->view('guest/kategori',$data);
        $this->load->view('guest/footer');

        }

        public function pria_celana($offset = 0){

  $config['base_url'] = base_url().'kategori/pria/pria_celana/';
   
   $config['total_rows'] = $this->db->count_all('tbl_produk');
   $config['per_page'] = 50; /*Jumlah data yang dipanggil perhalaman*/ 
   $config['uri_segment'] = 3; /*data selanjutnya di parse diurisegmen 3*/
   
   /*Class bootstrap pagination yang digunakan*/
   $config['full_tag_open'] = "<ul class='pagination pagination-sm' style='position:relative; top:-25px;'>";
   $config['full_tag_close'] ="</ul>";
   $config['num_tag_open'] = '<li>';
   $config['num_tag_close'] = '</li>';
   $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
   $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
   $config['next_tag_open'] = "<li>";
   $config['next_tagl_close'] = "</li>";
   $config['prev_tag_open'] = "<li>";
   $config['prev_tagl_close'] = "</li>";
   $config['first_tag_open'] = "<li>";
   $config['first_tagl_close'] = "</li>";
   $config['last_tag_open'] = "<li>";
   $config['last_tagl_close'] = "</li>";
  
   $this->pagination->initialize($config);
   
   $data['halaman'] = $this->pagination->create_links();
   /*membuat variable halaman untuk dipanggil di view nantinya*/
   $data['data'] = $this->Model_pria->getCelana($config['per_page'], $offset);

        
        $data['title'] = "Kategori Celana Pria";
        $data['header'] = "Kategori Celana Pria";
        $this->load->view('guest/header',$data);
        $this->load->view('guest/menu');
        $this->load->view('guest/slider');
        $this->load->view('guest/left_sidebar');
        $this->load->view('guest/kategori',$data);
        $this->load->view('guest/footer');

        }

        public function pria_kemeja($offset = 0){

           $config['base_url'] = base_url().'kategori/pria/pria_kemeja/';
   
   $config['total_rows'] = $this->db->count_all('tbl_produk');
   $config['per_page'] = 50; /*Jumlah data yang dipanggil perhalaman*/ 
   $config['uri_segment'] = 3; /*data selanjutnya di parse diurisegmen 3*/
   
   /*Class bootstrap pagination yang digunakan*/
   $config['full_tag_open'] = "<ul class='pagination pagination-sm' style='position:relative; top:-25px;'>";
      $config['full_tag_close'] ="</ul>";
   $config['num_tag_open'] = '<li>';
   $config['num_tag_close'] = '</li>';
   $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
   $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
   $config['next_tag_open'] = "<li>";
   $config['next_tagl_close'] = "</li>";
   $config['prev_tag_open'] = "<li>";
   $config['prev_tagl_close'] = "</li>";
   $config['first_tag_open'] = "<li>";
   $config['first_tagl_close'] = "</li>";
   $config['last_tag_open'] = "<li>";
   $config['last_tagl_close'] = "</li>";
  
   $this->pagination->initialize($config);
   
   $data['halaman'] = $this->pagination->create_links();
   /*membuat variable halaman untuk dipanggil di view nantinya*/
   $data['data'] = $this->Model_pria->getpriaKemeja($config['per_page'], $offset);

        $data['title'] = "Kategori Kemeja Pria";
        $data['header'] = "Kategori Kemeja Pria";
        $this->load->view('guest/header',$data);
        $this->load->view('guest/menu');
        $this->load->view('guest/slider');
        $this->load->view('guest/left_sidebar');
        $this->load->view('guest/kategori',$data);
        $this->load->view('guest/footer');

        }

        public function pria_blazer($offset = 0){

          $config['base_url'] = base_url().'kategori/pria/pria_blazer/';
   
   $config['total_rows'] = $this->db->count_all('tbl_produk');
   $config['per_page'] = 50; /*Jumlah data yang dipanggil perhalaman*/ 
   $config['uri_segment'] = 3; /*data selanjutnya di parse diurisegmen 3*/
   
   /*Class bootstrap pagination yang digunakan*/
   $config['full_tag_open'] = "<ul class='pagination pagination-sm' style='position:relative; top:-25px;'>";
      $config['full_tag_close'] ="</ul>";
   $config['num_tag_open'] = '<li>';
   $config['num_tag_close'] = '</li>';
   $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
   $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
   $config['next_tag_open'] = "<li>";
   $config['next_tagl_close'] = "</li>";
   $config['prev_tag_open'] = "<li>";
   $config['prev_tagl_close'] = "</li>";
   $config['first_tag_open'] = "<li>";
   $config['first_tagl_close'] = "</li>";
   $config['last_tag_open'] = "<li>";
   $config['last_tagl_close'] = "</li>";
  
   $this->pagination->initialize($config);
   
   $data['halaman'] = $this->pagination->create_links();
   /*membuat variable halaman untuk dipanggil di view nantinya*/
   $data['data'] = $this->Model_pria->getpriaBlazer($config['per_page'], $offset);

        $data['title'] = "Kategori Blazer Pria";
        $data['header'] = "Kategori Blazer Pria";
        $this->load->view('guest/header',$data);
        $this->load->view('guest/menu');
        $this->load->view('guest/slider');
        $this->load->view('guest/left_sidebar');
        $this->load->view('guest/kategori',$data);
        $this->load->view('guest/footer');

        }

         public function pria_kaos($offset = 0){
          $config['base_url'] = base_url().'kategori/pria/pria_kaos/';
   
   $config['total_rows'] = $this->db->count_all('tbl_produk');
   $config['per_page'] = 50; /*Jumlah data yang dipanggil perhalaman*/ 
   $config['uri_segment'] = 3; /*data selanjutnya di parse diurisegmen 3*/
   
   /*Class bootstrap pagination yang digunakan*/
   $config['full_tag_open'] = "<ul class='pagination pagination-sm' style='position:relative; top:-25px;'>";
      $config['full_tag_close'] ="</ul>";
   $config['num_tag_open'] = '<li>';
   $config['num_tag_close'] = '</li>';
   $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
   $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
   $config['next_tag_open'] = "<li>";
   $config['next_tagl_close'] = "</li>";
   $config['prev_tag_open'] = "<li>";
   $config['prev_tagl_close'] = "</li>";
   $config['first_tag_open'] = "<li>";
   $config['first_tagl_close'] = "</li>";
   $config['last_tag_open'] = "<li>";
   $config['last_tagl_close'] = "</li>";
  
   $this->pagination->initialize($config);
   
   $data['halaman'] = $this->pagination->create_links();
   /*membuat variable halaman untuk dipanggil di view nantinya*/
   $data['data'] = $this->Model_pria->getKaos($config['per_page'], $offset);

        
        $data['title'] = "Kategori Kaos Pria";
        $data['header'] = "Kategori Kaos Pria";
        $this->load->view('guest/header',$data);
        $this->load->view('guest/menu');
        $this->load->view('guest/slider');
        $this->load->view('guest/left_sidebar');
        $this->load->view('guest/kategori',$data);
        $this->load->view('guest/footer');

        }

        public function pria_topi($offset = 0){

$config['base_url'] = base_url().'kategori/pria/pria_topi/';
   
   $config['total_rows'] = $this->db->count_all('tbl_produk');
   $config['per_page'] = 50; /*Jumlah data yang dipanggil perhalaman*/ 
   $config['uri_segment'] = 3; /*data selanjutnya di parse diurisegmen 3*/
   
   /*Class bootstrap pagination yang digunakan*/
   $config['full_tag_open'] = "<ul class='pagination pagination-sm' style='position:relative; top:-25px;'>";
      $config['full_tag_close'] ="</ul>";
   $config['num_tag_open'] = '<li>';
   $config['num_tag_close'] = '</li>';
   $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
   $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
   $config['next_tag_open'] = "<li>";
   $config['next_tagl_close'] = "</li>";
   $config['prev_tag_open'] = "<li>";
   $config['prev_tagl_close'] = "</li>";
   $config['first_tag_open'] = "<li>";
   $config['first_tagl_close'] = "</li>";
   $config['last_tag_open'] = "<li>";
   $config['last_tagl_close'] = "</li>";
  
   $this->pagination->initialize($config);
   
   $data['halaman'] = $this->pagination->create_links();
   /*membuat variable halaman untuk dipanggil di view nantinya*/
   $data['data'] = $this->Model_pria->getTopi($config['per_page'], $offset);

        $data['title'] = "Kategori Topi Pria";
        $data['header'] = "Kategori Topi Pria";
        $this->load->view('guest/header',$data);
        $this->load->view('guest/menu');
        $this->load->view('guest/slider');
        $this->load->view('guest/left_sidebar');
        $this->load->view('guest/kategori',$data);
        $this->load->view('guest/footer');

        }

  public function pria_jaket($offset = 0){

  $config['base_url'] = base_url().'kategori/pria/pria_celana/';
   
   $config['total_rows'] = $this->db->count_all('tbl_produk');
   $config['per_page'] = 50; /*Jumlah data yang dipanggil perhalaman*/ 
   $config['uri_segment'] = 3; /*data selanjutnya di parse diurisegmen 3*/
   
   /*Class bootstrap pagination yang digunakan*/
   $config['full_tag_open'] = "<ul class='pagination pagination-sm' style='position:relative; top:-25px;'>";
      $config['full_tag_close'] ="</ul>";
   $config['num_tag_open'] = '<li>';
   $config['num_tag_close'] = '</li>';
   $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
   $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
   $config['next_tag_open'] = "<li>";
   $config['next_tagl_close'] = "</li>";
   $config['prev_tag_open'] = "<li>";
   $config['prev_tagl_close'] = "</li>";
   $config['first_tag_open'] = "<li>";
   $config['first_tagl_close'] = "</li>";
   $config['last_tag_open'] = "<li>";
   $config['last_tagl_close'] = "</li>";
  
   $this->pagination->initialize($config);
   
   $data['halaman'] = $this->pagination->create_links();
   /*membuat variable halaman untuk dipanggil di view nantinya*/
   $data['data'] = $this->Model_pria->getJaket($config['per_page'], $offset);

        $data['title'] = "Kategori Jaket Pria";
        $data['header'] = "Kategori Jaket Pria";
        $this->load->view('guest/header',$data);
        $this->load->view('guest/menu');
        $this->load->view('guest/slider');
        $this->load->view('guest/left_sidebar');
        $this->load->view('guest/kategori',$data);
        $this->load->view('guest/footer');

        }

        public function pria_jam_tangan($offset = 0){

  $config['base_url'] = base_url().'kategori/pria/pria_jam_tangan/';
   
   $config['total_rows'] = $this->db->count_all('tbl_produk');
   $config['per_page'] = 50; /*Jumlah data yang dipanggil perhalaman*/ 
   $config['uri_segment'] = 3; /*data selanjutnya di parse diurisegmen 3*/
   
   /*Class bootstrap pagination yang digunakan*/
   $config['full_tag_open'] = "<ul class='pagination pagination-sm' style='position:relative; top:-25px;'>";
      $config['full_tag_close'] ="</ul>";
   $config['num_tag_open'] = '<li>';
   $config['num_tag_close'] = '</li>';
   $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
   $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
   $config['next_tag_open'] = "<li>";
   $config['next_tagl_close'] = "</li>";
   $config['prev_tag_open'] = "<li>";
   $config['prev_tagl_close'] = "</li>";
   $config['first_tag_open'] = "<li>";
   $config['first_tagl_close'] = "</li>";
   $config['last_tag_open'] = "<li>";
   $config['last_tagl_close'] = "</li>";
  
   $this->pagination->initialize($config);
   
   $data['halaman'] = $this->pagination->create_links();
   /*membuat variable halaman untuk dipanggil di view nantinya*/
   $data['data'] = $this->Model_pria->getJamtangan($config['per_page'], $offset);

        $data['title'] = "Kategori  Jam tangan Pria";
        $data['header'] = "Kategori jam tangan Pria";
        $this->load->view('guest/header',$data);
        $this->load->view('guest/menu');
        $this->load->view('guest/slider');
        $this->load->view('guest/left_sidebar');
        $this->load->view('guest/kategori',$data);
        $this->load->view('guest/footer');

        }




        //kategori wanita
        public function wanita($offset = 0){


       $config['base_url'] = base_url().'kategori/wanita/';
       
       $config['total_rows'] = $this->db->count_all('tbl_produk');
       $config['per_page'] = 50; /*Jumlah data yang dipanggil perhalaman*/ 
       $config['uri_segment'] = 3; /*data selanjutnya di parse diurisegmen 3*/
   
   /*Class bootstrap pagination yang digunakan*/
   $config['full_tag_open'] = "<ul class='pagination pagination-sm' style='position:relative; top:-25px;'>";
   $config['full_tag_close'] ="</ul>";
   $config['num_tag_open'] = '<li>';
   $config['num_tag_close'] = '</li>';
   $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
   $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
   $config['next_tag_open'] = "<li>";
   $config['next_tagl_close'] = "</li>";
   $config['prev_tag_open'] = "<li>";
   $config['prev_tagl_close'] = "</li>";
   $config['first_tag_open'] = "<li>";
   $config['first_tagl_close'] = "</li>";
   $config['last_tag_open'] = "<li>";
   $config['last_tagl_close'] = "</li>";
  
   $this->pagination->initialize($config);
   
   $data['halaman'] = $this->pagination->create_links();
   /*membuat variable halaman untuk dipanggil di view nantinya*/
   $data['data'] = $this->Model_wanita->getWanita($config['per_page'], $offset);
   
        //$data['data'] = $this->Model_wanita->getWanita();
        $data['title'] = "Kategori Wanita";
        $data['header'] = "Kategori Wanita";
        $this->load->view('guest/header',$data);
        $this->load->view('guest/menu');
        $this->load->view('guest/slider');
        $this->load->view('guest/left_sidebar');
        $this->load->view('guest/kategori',$data);
        $this->load->view('guest/footer');


        }

        public function wanita_celana($offset = 0){        

       $config['base_url'] = base_url().'kategori/wanita/';
       
       $config['total_rows'] = $this->db->count_all('tbl_produk');
       $config['per_page'] = 50; /*Jumlah data yang dipanggil perhalaman*/ 
       $config['uri_segment'] = 3; /*data selanjutnya di parse diurisegmen 3*/
   
   /*Class bootstrap pagination yang digunakan*/
   $config['full_tag_open'] = "<ul class='pagination pagination-sm' style='position:relative; top:-25px;'>";
   $config['full_tag_close'] ="</ul>";
   $config['num_tag_open'] = '<li>';
   $config['num_tag_close'] = '</li>';
   $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
   $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
   $config['next_tag_open'] = "<li>";
   $config['next_tagl_close'] = "</li>";
   $config['prev_tag_open'] = "<li>";
   $config['prev_tagl_close'] = "</li>";
   $config['first_tag_open'] = "<li>";
   $config['first_tagl_close'] = "</li>";
   $config['last_tag_open'] = "<li>";
   $config['last_tagl_close'] = "</li>";
  
   $this->pagination->initialize($config);
   
   $data['halaman'] = $this->pagination->create_links();
   /*membuat variable halaman untuk dipanggil di view nantinya*/
   $data['data'] = $this->Model_wanita->getwanitaCelana($config['per_page'], $offset);
   
        $data['title'] = "Kategori Celana Wanita";
        $data['header'] = "Kategori Celana Wanita";
        $this->load->view('guest/header',$data);
        $this->load->view('guest/menu');
        $this->load->view('guest/slider');
        $this->load->view('guest/left_sidebar');
        $this->load->view('guest/kategori',$data);
        $this->load->view('guest/footer');

        }


        public function wanita_gamis($offset = 0){

              $config['base_url'] = base_url().'kategori/wanita_gamis/';
       
       $config['total_rows'] = $this->db->count_all('tbl_produk');
       $config['per_page'] = 50; /*Jumlah data yang dipanggil perhalaman*/ 
       $config['uri_segment'] = 3; /*data selanjutnya di parse diurisegmen 3*/
   
   /*Class bootstrap pagination yang digunakan*/
   $config['full_tag_open'] = "<ul class='pagination pagination-sm' style='position:relative; top:-25px;'>";
   $config['full_tag_close'] ="</ul>";
   $config['num_tag_open'] = '<li>';
   $config['num_tag_close'] = '</li>';
   $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
   $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
   $config['next_tag_open'] = "<li>";
   $config['next_tagl_close'] = "</li>";
   $config['prev_tag_open'] = "<li>";
   $config['prev_tagl_close'] = "</li>";
   $config['first_tag_open'] = "<li>";
   $config['first_tagl_close'] = "</li>";
   $config['last_tag_open'] = "<li>";
   $config['last_tagl_close'] = "</li>";
  
   $this->pagination->initialize($config);
   
   $data['halaman'] = $this->pagination->create_links();
   /*membuat variable halaman untuk dipanggil di view nantinya*/
   $data['data'] = $this->Model_wanita->getwanitaGamis($config['per_page'], $offset);
   
        $data['title'] = "Kategori Gamis Wanita";
        $data['header'] = "Kategori Gamis Wanita";
        $this->load->view('guest/header',$data);
        $this->load->view('guest/menu');
        $this->load->view('guest/slider');
        $this->load->view('guest/left_sidebar');
        $this->load->view('guest/kategori',$data);
        $this->load->view('guest/footer');

        }



        public function wanita_jaket($offset = 0){

       $config['base_url'] = base_url().'kategori/wanita_jaket/';
       
       $config['total_rows'] = $this->db->count_all('tbl_produk');
       $config['per_page'] = 50; /*Jumlah data yang dipanggil perhalaman*/ 
       $config['uri_segment'] = 3; /*data selanjutnya di parse diurisegmen 3*/
   
   /*Class bootstrap pagination yang digunakan*/
   $config['full_tag_open'] = "<ul class='pagination pagination-sm' style='position:relative; top:-25px;'>";
   $config['full_tag_close'] ="</ul>";
   $config['num_tag_open'] = '<li>';
   $config['num_tag_close'] = '</li>';
   $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
   $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
   $config['next_tag_open'] = "<li>";
   $config['next_tagl_close'] = "</li>";
   $config['prev_tag_open'] = "<li>";
   $config['prev_tagl_close'] = "</li>";
   $config['first_tag_open'] = "<li>";
   $config['first_tagl_close'] = "</li>";
   $config['last_tag_open'] = "<li>";
   $config['last_tagl_close'] = "</li>";
  
   $this->pagination->initialize($config);
   
   $data['halaman'] = $this->pagination->create_links();
   /*membuat variable halaman untuk dipanggil di view nantinya*/
   $data['data'] = $this->Model_wanita->getwanitaJaket($config['per_page'], $offset);
   
        $data['title'] = "Kategori Jaket Wanita";
        $data['header'] = "Kategori Jaket Wanita";
        $this->load->view('guest/header',$data);
        $this->load->view('guest/menu');
        $this->load->view('guest/slider');
        $this->load->view('guest/left_sidebar');
        $this->load->view('guest/kategori',$data);
        $this->load->view('guest/footer');

        }


       
        public function wanita_atasan($offset = 0){

      $config['base_url'] = base_url().'kategori/wanita_atasan/';
       
       $config['total_rows'] = $this->db->count_all('tbl_produk');
       $config['per_page'] = 50; /*Jumlah data yang dipanggil perhalaman*/ 
       $config['uri_segment'] = 3; /*data selanjutnya di parse diurisegmen 3*/
   
   /*Class bootstrap pagination yang digunakan*/
   $config['full_tag_open'] = "<ul class='pagination pagination-sm' style='position:relative; top:-25px;'>";
   $config['full_tag_close'] ="</ul>";
   $config['num_tag_open'] = '<li>';
   $config['num_tag_close'] = '</li>';
   $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
   $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
   $config['next_tag_open'] = "<li>";
   $config['next_tagl_close'] = "</li>";
   $config['prev_tag_open'] = "<li>";
   $config['prev_tagl_close'] = "</li>";
   $config['first_tag_open'] = "<li>";
   $config['first_tagl_close'] = "</li>";
   $config['last_tag_open'] = "<li>";
   $config['last_tagl_close'] = "</li>";
  
   $this->pagination->initialize($config);
   
   $data['halaman'] = $this->pagination->create_links();
   /*membuat variable halaman untuk dipanggil di view nantinya*/
   $data['data'] = $this->Model_wanita->getwanitaAtasan($config['per_page'], $offset);
   
        $data['title'] = "Kategori Atasan Wanita";
        $data['header'] = "Kategori Atasan Wanita";
        $this->load->view('guest/header',$data);
        $this->load->view('guest/menu');
        $this->load->view('guest/slider');
        $this->load->view('guest/left_sidebar');
        $this->load->view('guest/kategori',$data);
        $this->load->view('guest/footer');

        }


        public function wanita_sendal($offset = 0){

      $config['base_url'] = base_url().'kategori/wanita_sendal/';
       
       $config['total_rows'] = $this->db->count_all('tbl_produk');
       $config['per_page'] = 50; /*Jumlah data yang dipanggil perhalaman*/ 
       $config['uri_segment'] = 3; /*data selanjutnya di parse diurisegmen 3*/
   
   /*Class bootstrap pagination yang digunakan*/
   $config['full_tag_open'] = "<ul class='pagination pagination-sm' style='position:relative; top:-25px;'>";
   $config['full_tag_close'] ="</ul>";
   $config['num_tag_open'] = '<li>';
   $config['num_tag_close'] = '</li>';
   $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
   $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
   $config['next_tag_open'] = "<li>";
   $config['next_tagl_close'] = "</li>";
   $config['prev_tag_open'] = "<li>";
   $config['prev_tagl_close'] = "</li>";
   $config['first_tag_open'] = "<li>";
   $config['first_tagl_close'] = "</li>";
   $config['last_tag_open'] = "<li>";
   $config['last_tagl_close'] = "</li>";
  
   $this->pagination->initialize($config);
   
   $data['halaman'] = $this->pagination->create_links();
   /*membuat variable halaman untuk dipanggil di view nantinya*/
   $data['data'] = $this->Model_wanita->getwanitaSendal_Sepatu($config['per_page'], $offset);
   
  
        $data['title'] = "Kategori Sendal Sepatu Wanita";
        $data['header'] = "Kategori Sendal Sepatu Wanita";
        $this->load->view('guest/header',$data);
        $this->load->view('guest/menu');
        $this->load->view('guest/slider');
        $this->load->view('guest/left_sidebar');
        $this->load->view('guest/kategori',$data);
        $this->load->view('guest/footer');

        }


        public function wanita_kerudung($offset = 0){

      $config['base_url'] = base_url().'kategori/wanita_kerudung/';
       
       $config['total_rows'] = $this->db->count_all('tbl_produk');
       $config['per_page'] = 50; /*Jumlah data yang dipanggil perhalaman*/ 
       $config['uri_segment'] = 3; /*data selanjutnya di parse diurisegmen 3*/
   
   /*Class bootstrap pagination yang digunakan*/
   $config['full_tag_open'] = "<ul class='pagination pagination-sm' style='position:relative; top:-25px;'>";
   $config['full_tag_close'] ="</ul>";
   $config['num_tag_open'] = '<li>';
   $config['num_tag_close'] = '</li>';
   $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
   $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
   $config['next_tag_open'] = "<li>";
   $config['next_tagl_close'] = "</li>";
   $config['prev_tag_open'] = "<li>";
   $config['prev_tagl_close'] = "</li>";
   $config['first_tag_open'] = "<li>";
   $config['first_tagl_close'] = "</li>";
   $config['last_tag_open'] = "<li>";
   $config['last_tagl_close'] = "</li>";
  
   $this->pagination->initialize($config);
   
   $data['halaman'] = $this->pagination->create_links();
   /*membuat variable halaman untuk dipanggil di view nantinya*/
   $data['data'] = $this->Model_wanita->getwanitaKerudung($config['per_page'], $offset);
   
        $data['title'] = "Kategori Kerudung Wanita";
        $data['header'] = "Kategori Kerudung Wanita";
        $this->load->view('guest/header',$data);
        $this->load->view('guest/menu');
        $this->load->view('guest/slider');
        $this->load->view('guest/left_sidebar');
        $this->load->view('guest/kategori',$data);
        $this->load->view('guest/footer');

        }

        public function wanita_kaos($offset = 0){

      $config['base_url'] = base_url().'kategori/wanita_kaos/';
       
       $config['total_rows'] = $this->db->count_all('tbl_produk');
       $config['per_page'] = 50; /*Jumlah data yang dipanggil perhalaman*/ 
       $config['uri_segment'] = 3; /*data selanjutnya di parse diurisegmen 3*/
   
   /*Class bootstrap pagination yang digunakan*/
   $config['full_tag_open'] = "<ul class='pagination pagination-sm' style='position:relative; top:-25px;'>";
   $config['full_tag_close'] ="</ul>";
   $config['num_tag_open'] = '<li>';
   $config['num_tag_close'] = '</li>';
   $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
   $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
   $config['next_tag_open'] = "<li>";
   $config['next_tagl_close'] = "</li>";
   $config['prev_tag_open'] = "<li>";
   $config['prev_tagl_close'] = "</li>";
   $config['first_tag_open'] = "<li>";
   $config['first_tagl_close'] = "</li>";
   $config['last_tag_open'] = "<li>";
   $config['last_tagl_close'] = "</li>";
  
   $this->pagination->initialize($config);
   
   $data['halaman'] = $this->pagination->create_links();
   /*membuat variable halaman untuk dipanggil di view nantinya*/
   $data['data'] = $this->Model_wanita->getwanitaKaos($config['per_page'], $offset);
   
        $data['title'] = "Kategori Kaos Wanita";
        $data['header'] = "Kategori Kaos Wanita";
        $this->load->view('guest/header',$data);
        $this->load->view('guest/menu');
        $this->load->view('guest/slider');
        $this->load->view('guest/left_sidebar');
        $this->load->view('guest/kategori',$data);
        $this->load->view('guest/footer');

        }

        public function wanita_kemeja($offset = 0){

      $config['base_url'] = base_url().'kategori/wanita_kemeja/';
       
       $config['total_rows'] = $this->db->count_all('tbl_produk');
       $config['per_page'] = 50; /*Jumlah data yang dipanggil perhalaman*/ 
       $config['uri_segment'] = 3; /*data selanjutnya di parse diurisegmen 3*/
   
   /*Class bootstrap pagination yang digunakan*/
   $config['full_tag_open'] = "<ul class='pagination pagination-sm' style='position:relative; top:-25px;'>";
   $config['full_tag_close'] ="</ul>";
   $config['num_tag_open'] = '<li>';
   $config['num_tag_close'] = '</li>';
   $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
   $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
   $config['next_tag_open'] = "<li>";
   $config['next_tagl_close'] = "</li>";
   $config['prev_tag_open'] = "<li>";
   $config['prev_tagl_close'] = "</li>";
   $config['first_tag_open'] = "<li>";
   $config['first_tagl_close'] = "</li>";
   $config['last_tag_open'] = "<li>";
   $config['last_tagl_close'] = "</li>";
  
   $this->pagination->initialize($config);
   
   $data['halaman'] = $this->pagination->create_links();
   /*membuat variable halaman untuk dipanggil di view nantinya*/
   $data['data'] = $this->Model_wanita->getwanitaKemeja($config['per_page'], $offset);
   
        $data['title'] = "Kategori Kemeja Wanita";
        $data['header'] = "Kategori Kemeja Wanita";
        $this->load->view('guest/header',$data);
        $this->load->view('guest/menu');
        $this->load->view('guest/slider');
        $this->load->view('guest/left_sidebar');
        $this->load->view('guest/kategori',$data);
        $this->load->view('guest/footer');

        }

       

}