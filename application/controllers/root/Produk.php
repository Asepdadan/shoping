<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

        function __construct()
        {
            parent::__construct();

            $this->load->model('Model_produk');
            $this->load->helper(array('form', 'url','help'));
              $this->load->library('image_lib');
             $this->load->library('form_validation');
           if(!$this->session->userdata('logged_in')==TRUE){
              redirect('logout');
             } 
        }
        


        public function index(){

            $data['title'] = "Produk";
            $data['data'] = $this->Model_produk->getData();
            $data['kategori'] = $this->Model_produk->getKategori('kategori');
            $data['title'] = "Input Produk";

            $this->load->view('guest/header',$data);
            $this->load->view('guest/menu');
            $this->load->view('admin/kategori/celana_pria',$data);
            $this->load->view('guest/footer');
        }

        public function kemeja(){
          $data['title'] = "Produk";
            $data['data'] = $this->Model_produk->getData();
            $data['kategori'] = $this->Model_produk->getKategori('kategori');
            $data['title'] = "Input Produk";

            $this->load->view('guest/header',$data);
            $this->load->view('guest/menu');
            $this->load->view('admin/kategori/kemeja_pria',$data);
            $this->load->view('guest/footer');


        }

        public function watermark($path){
        $config['source_image'] = $path;
        $config['wm_text'] = 'Gudangjeansfashion.com';
        $config['wm_type'] = 'text';
        $config['wm_font_path'] = './system/fonts/FFF_Tusj.ttf';
        $config['wm_font_size'] = '20';
        $config['wm_font_color'] = '#130707';
        $config['wm_vrt_alignment'] = 'bottom';
        $config['wm_hor_alignment'] = 'right';
        $config['wm_padding'] = '1';

        $this->image_lib->initialize($config);

        $this->image_lib->watermark();


    }


        public function tambah_produk(){
            
            $id = $this->input->post('id');
             $gambar = $this->input->post('userfile');
             $kategori = $this->input->post('kategori');
             $nama = $this->input->post('nama');
             $bahan = $this->input->post('bahan');
             $size = $this->input->post('size');
             $warna = $this->input->post('warna');
             $harga = $this->input->post('harga');
             $deskripsi = $this->input->post('deskripsi');
             $merk = $this->input->post('merk');
             $stok = $this->input->post('stok');


              $this->load->library('form_validation');
                /*$this->form_validation->set_rules('userfile', 'userfile', 'required');*/
                $this->form_validation->set_rules('nama', 'nama', 'alpha_numeric_spaces');
                $this->form_validation->set_rules('bahan', 'bahan', 'alpha_numeric_spaces');
                $this->form_validation->set_rules('harga', 'harga', 'integer|min_length[4]|max_length[9]');
                /*$this->form_validation->set_rules('warna', 'warna', 'required|in_list[merah,biru,hijau,kuning,putih,ungu,pink,coklat,hitam,abu-abu]');*/
                $this->form_validation->set_rules('kategori', 'kategori', 'required');
                $this->form_validation->set_rules('size', 'ukuran', 'alpha_numeric_spaces');
                $this->form_validation->set_rules('stok', 'stok', 'integer');
                

                if ($this->form_validation->run() == FALSE)
                {
                    $data['kategori'] = $this->Model_produk->getKategori('kategori');
                    $data['data'] = $this->Model_produk->getData();
                    $data['title'] = "Gagal Input";
                    
                    $this->load->view('guest/header',$data);
                    $this->load->view('guest/menu');
                    $this->load->view('admin/input_produk',$data);
                    $this->load->view('guest/footer');
                }
                else
                {
                    
                        $config['upload_path'] = './assets/uploads';
                        $config['allowed_types'] = 'gif|jpg|png';
                        $config['max_size'] = '100000';
                        $config['max_width']  = '100024';
                        $config['max_height']  = '76800';


        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload())
        {
            $error = array('error' => $this->upload->display_errors());
             $this->load->view('guest/header',$data);
            $this->load->view('guest/menu');
            $this->load->view('admin/input_produk', $error);
        }
        else
        {



             $data = array('upload_data' => $this->upload->data());

               $this->watermark($data['upload_data']['full_path']);

            
        $post = array(
                'id' => '',
                'gambar' => $data['upload_data']['file_name'],
                'kategori_id' => $kategori,
                'nama' => $nama,
                'bahan' => $bahan,
                'size' => $size,
                'warna' => $warna,
                'harga' => $harga,
                'deskripsi' => $deskripsi,
                'merk' => $merk,
                'stok' => $stok,
                
                 );

            $query = $this->Model_produk->addProduk('tbl_produk',$post);

            redirect('dashbord');

           


        }
                }



    }

        //hapus dari produk admin
        public function hapus($id){
            $data= $this->Model_produk->getWhere($id); 
            //query select where
        unlink('assets/uploads/'.$data[0]['gambar']);

        $this->Model_produk->hapusProduk($id);
        redirect('dashbord');

    }

    //edit
    public function edit($id){
        $data['title'] = "Edit Produk";
        $data['data'] = $this->Model_produk->showForm($id);
              $data['kategori'] = $this->Model_produk->getKategori('kategori'); 
        $this->load->view('guest/header',$data);
            $this->load->view('guest/menu');
        $this->load->view('admin/edit_produk',$data);
    }


    public function actionEdit(){
      /*  $id = $this->input->post('id');
             $gambar = $this->input->post('userfile');
             $kategori = $this->input->post('kategori');
             $nama = $this->input->post('nama');
             $bahan = $this->input->post('bahan');
             $size = $this->input->post('size');
             $warna = $this->input->post('warna');
             $harga = $this->input->post('harga');
             $deskripsi = $this->input->post('deskripsi');
             $merk = $this->input->post('merk');
             $stok = $this->input->post('stok');

             $this->load->library('form_validation');
      */          /*$this->form_validation->set_rules('userfile', 'userfile', 'required');*/
            /*    $this->form_validation->set_rules('nama', 'nama', 'alpha_numeric_spaces');
                $this->form_validation->set_rules('bahan', 'bahan', 'alpha_numeric_spaces');
                $this->form_validation->set_rules('harga', 'harga', 'integer|min_length[4]|max_length[9]');
            */    /*$this->form_validation->set_rules('warna', 'warna', 'required|in_list[merah,biru,hijau,kuning,putih,ungu,pink,coklat,hitam,abu-abu]');*/
            /*    $this->form_validation->set_rules('kategori', 'kategori', 'required');
                $this->form_validation->set_rules('size', 'ukuran', 'alpha_numeric_spaces');
                $this->form_validation->set_rules('stok', 'stok', 'integer');
                

                if ($this->form_validation->run() == FALSE)
                {
                    $data['kategori'] = $this->Model_produk->getKategori('kategori');
                    $data['data'] = $this->Model_produk->getData();
                    $data['title'] = "Gagal Input";
                    
                    $this->load->view('guest/header',$data);
                    $this->load->view('guest/menu');
                    $this->load->view('admin/edit_produk',$data);
                    $this->load->view('guest/footer');
                }
                else
                {
                    
                        $config['upload_path'] = './assets/uploads';
                        $config['allowed_types'] = 'gif|jpg|png';
                        $config['max_size'] = '100000';
                        $config['max_width']  = '100024';
                        $config['max_height']  = '76800';


        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload())
        {

            $data['kategori'] = $this->Model_produk->getKategori('kategori'); 
            $data['title'] = "gagal input";
            $error = array('error' => $this->upload->display_errors());
             $this->load->view('guest/header',$data);
            $this->load->view('guest/menu');
            $this->load->view('admin/edit_produk', $error);
        }
        else
        {



             $data = array('upload_data' => $this->upload->data());

               $this->watermark($data['upload_data']['full_path']);

            
        $post = array(
                'id' => $id,
                'gambar' => $data['upload_data']['file_name'],
                'kategori_id' => $kategori,
                'nama' => $nama,
                'bahan' => $bahan,
                'size' => $size,
                'warna' => $warna,
                'harga' => $harga,
                'deskripsi' => $deskripsi,
                'merk' => $merk,
                'stok' => $stok,
                
                 );
            $where = array('id' => $id);
            $query = $this->Model_produk->edit('tbl_produk',$post,$where);

            redirect('');
        }
    }*/
    print_r($_POST);
    $id = $this->input->post('id');
             $gambar = $this->input->post('userfile');
             $kategori = $this->input->post('kategori');
             $nama = $this->input->post('nama');
             $bahan = $this->input->post('bahan');
             $size = $this->input->post('size');
             $warna = $this->input->post('warna');
             $harga = $this->input->post('harga');
             $deskripsi = $this->input->post('deskripsi');
             $merk = $this->input->post('merk');
             $stok = $this->input->post('stok');
     $post = array(
                'id' => $id,
                'gambar' => $gambar,
                'kategori_id' => $kategori,
                'nama' => $nama,
                'bahan' => $bahan,
                'size' => $size,
                'warna' => $warna,
                'harga' => $harga,
                'deskripsi' => $deskripsi,
                'merk' => $merk,
                'stok' => $stok,
                
                 );
            $where = array('id' => $id);
            $query = $this->Model_produk->edit('tbl_produk',$post,$where);

            redirect('dashbord');
    }//end function


}