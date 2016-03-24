<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

        function __construct()
        {
        parent::__construct();

        $this->load->model('Model_pria');
        $this->load->model('Model_wanita');
        $this->load->helper(array('form', 'url','help'));      
        $this->load->library('pagination');
        }

    public function index($offset = 0)
    {

   $jml = $this->db->get('tbl_produk');
   
   $config['base_url'] = base_url().'home/index/';
   
   $config['total_rows'] = $this->db->count_all('tbl_produk');
   $config['per_page'] = 25; /*Jumlah data yang dipanggil perhalaman*/ 
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
   $data['pria'] = $this->Model_pria->getPria($config['per_page'], $offset);
   
              
       // $data['pria'] = $this->Model_pria->getPria();
        $data['wanita'] = $this->Model_wanita->getWanita($config['per_page'], $offset);
        
        $data['title'] = "Home";
        
        $this->load->view('guest/header',$data);
        $this->load->view('guest/menu');
        $this->load->view('guest/slider');
        $this->load->view('guest/left_sidebar');
        $this->load->view('guest/content',$data);
        $this->load->view('guest/footer');
    }

    public function produk_Detail($id){

        $data['data'] = $this->Model_produk->getDatawhere($id);
        
        $data['title'] = "Produk Detail";
        $this->load->view('guest/header',$data);
        $this->load->view('guest/menu');
        $this->load->view('guest/left_sidebar');
        $this->load->view('guest/produk_detail',$data);
        $this->load->view('guest/footer');
        
    }

    public function pencarian(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('pencarian', 'pencarian', 'alpha_numeric_spaces');
           if ($this->form_validation->run() == FALSE)
            {       
                redirect('404_override');
            }elseif(empty($this->input->post('pencarian'))){
                redirect('');
            }else{
            $pencarian = $this->input->post('pencarian');
        $data['title'] = "Pencarian";
        $data['data'] = $this->Model_produk->getpencarian($pencarian);
         $this->load->view('guest/header',$data);
        $this->load->view('guest/menu');
        $this->load->view('guest/slider');
        $this->load->view('guest/left_sidebar');
        $this->load->view('guest/pencarian',$data);
        $this->load->view('guest/footer');
        

            }


        
    }

    public function test(){
        $this->load->view('guest/header');
        $this->load->view('test-cart');
        $this->load->view('guest/footer');
    }






}
