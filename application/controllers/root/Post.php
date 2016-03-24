<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller {

        function __construct()
        {
            parent::__construct();

            $this->load->model('Model_pria');
            $this->load->model('Model_pria');
            $this->load->helper(array('form', 'url','help'));
              $this->load->library('image_lib');
             //$this->load->library('form_validation');
           if(!$this->session->userdata('logged_in')==TRUE){
              redirect('logout');
             } 
        }

        public function index(){
          

        }
      
/*  ----------------------------watermark -------------------------------------------------------- */
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
/*  ----------------------------watermark -------------------------------------------------------- */


/*  ----------------------------kemeja -------------------------------------------------------- */
         public function kemeja(){
            $data['title'] = "Produk";
            $data['data'] = $this->Model_pria->Kemeja();
            $data['title'] = "Input Produk Kemeja Pria";
            $data['header'] = "Produk Kemeja Pria";

            $this->load->view('admin/layout/header',$data);
            $this->load->view('admin/layout/menu');
            $this->load->view('admin/kategori/kemeja_pria',$data);
            $this->load->view('admin/layout/footer');


        }

        public function action_kemeja(){
             $id = $this->input->post('id');
             $kode= $this->input->post('kode_produk');
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
   
                $this->form_validation->set_rules('kode_produk', 'Kode Produk', 'required|is_unique[tbl_produk.kode_produk]|alpha_numeric');
                $this->form_validation->set_rules('nama', 'nama', 'required|alpha_numeric_spaces');
                $this->form_validation->set_rules('bahan', 'bahan', 'alpha_numeric_spaces');
                $this->form_validation->set_rules('harga', 'harga', 'required|integer|min_length[4]|max_length[9]');
                $this->form_validation->set_rules('kategori', 'kategori', 'required');
                $this->form_validation->set_rules('size', 'ukuran', 'alpha_numeric_spaces');
                $this->form_validation->set_rules('stok', 'stok', 'integer');           

                if ($this->form_validation->run() == FALSE)
                {
                      $data['title'] = "Produk";
                      $data['data'] = $this->Model_pria->Kemeja();
                      $data['title'] = "Input Produk Kemeja Pria";
                      $data['header'] = "Produk Kemeja Pria";
                    
                      $this->load->view('admin/layout/header',$data);
                      $this->load->view('admin/layout/menu');
                      $this->load->view('admin/kategori/kemeja_pria',$data);
                      $this->load->view('admin/layout/footer');
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
                          
                      $data['title'] = "Produk";
                      $data['data'] = $this->Model_pria->Kemeja();
                      $data['title'] = "Input Produk Kemeja Pria";
                      $data['header'] = "Produk Kemeja Pria";
                    

                            $this->load->view('admin/layout/header',$data);
                          $this->load->view('admin/layout/menu');
                          $this->load->view('admin/kategori/kemeja_pria',$data);
                          $this->load->view('admin/layout/footer');
                      }
                      else
                      {
                           $data = array('upload_data' => $this->upload->data());

                             $this->watermark($data['upload_data']['full_path']);

                          
                      $post = array(
                        
                        'kode_produk' => $kode,
                        'kategori_id' => $kategori,
                        'gambar' => $data['upload_data']['file_name'],
                        'nama' => $nama,
                        'harga' => $harga,
                       'stok' => $stok,
                        'kode_produk' => $kode,
                        'bahan' => $bahan,
                        'size' => $size,
                        'warna' => $warna,
                         'deskripsi' => $deskripsi,
                          'merk' => $merk
                        );

                          $query = $this->Model_pria->addProduk('tbl_produk',$post);
                          redirect('kemeja');       
            }
          }

        }

              public function deletekemeja($kode){
                $data= $this->Model_pria->getWhere($kode); 
                unlink('assets/uploads/'.$data[0]['gambar']);

                $this->Model_pria->deletePria($kode);
                redirect('kemeja');

              }

        public function editkemeja($kode){
         
            $data['title'] = "Input Produk Kemeja Pria";
            $data['header'] = "Edit Produk Kemeja";
            $data['data'] = $this->Model_pria->getWhere($kode);
            $this->load->view('admin/layout/header',$data);
            $this->load->view('admin/layout/menu');
            $this->load->view('admin/kategori/edit/edit_kemeja',$data);
            $this->load->view('admin/layout/footer');
          }

          public function action_edit_kemeja(){

             $id = $this->input->post('id');
             $kode= $this->input->post('kode_produk');
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
   /*$this->form_validation->set_rules('kode_produk', 'Kode Produk', 'required|is_unique[tbl_produk.kode_produk]|alpha_numeric');*/
              $this->form_validation->set_rules('nama', 'nama', 'alpha_numeric_spaces');
              $this->form_validation->set_rules('bahan', 'bahan', 'alpha_numeric_spaces');
              $this->form_validation->set_rules('harga', 'harga', 'integer|min_length[4]|max_length[9]');
 
              
              $this->form_validation->set_rules('size', 'ukuran', 'alpha_numeric_spaces');
              $this->form_validation->set_rules('stok', 'stok', 'integer');
              

            if ($this->form_validation->run() == FALSE)
            {
            $data['title'] = "Produk";
            $data['data'] = $this->Model_pria->Kemeja();
            $data['title'] = "Input Produk Kemeja Pria";
            $data['header'] = "Produk Kemeja Pria";
                    
            $this->load->view('admin/layout/header',$data);
            $this->load->view('admin/layout/menu');
            $this->load->view('admin/kategori/kemeja_pria',$data);
            $this->load->view('admin/layout/footer');
            }
            else
            {           
            $post = array(
                
                'kode_produk' => $kode,
                'kategori_id' => $kategori,
                'nama' => $nama,
                'harga' => $harga,
               'stok' => $stok,
                'kode_produk' => $kode,
                'bahan' => $bahan,
                'size' => $size,
                'warna' => $warna,
                'deskripsi' => $deskripsi,
                'merk' => $merk
              );

            $where = array('kode_produk' => $kode);
            $query = $this->Model_pria->edit('tbl_produk',$post,$where);
            redirect('kemeja');

        }

      }
/*  ----------------------------kemeja -------------------------------------------------------- */


/*  ----------------------------blazer -------------------------------------------------------- */      
           public function blazer(){
            $data['title'] = "Produk";
            $data['data'] = $this->Model_pria->Blazer();            
            $data['title'] = "Input Produk Blazer Pria";
            $data['header'] = "Produk Blazer Pria";

            $this->load->view('admin/layout/header',$data);
            $this->load->view('admin/layout/menu');
            $this->load->view('admin/kategori/blazer_pria',$data);
            $this->load->view('admin/layout/footer');


        }

          public function action_blazer(){
             $id = $this->input->post('id');
              $kode= $this->input->post('kode_produk');
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
   
                $this->form_validation->set_rules('kode_produk', 'Kode Produk', 'required|is_unique[tbl_produk.kode_produk]|alpha_numeric');
                $this->form_validation->set_rules('nama', 'nama', 'required|alpha_numeric_spaces');
                $this->form_validation->set_rules('bahan', 'bahan', 'alpha_numeric_spaces');
                $this->form_validation->set_rules('harga', 'harga', 'required|integer|min_length[4]|max_length[9]');
   
                $this->form_validation->set_rules('kategori', 'kategori', 'required');
                $this->form_validation->set_rules('size', 'ukuran', 'alpha_numeric_spaces');
                $this->form_validation->set_rules('stok', 'stok', 'integer');
                

                if ($this->form_validation->run() == FALSE)
                {
                      $data['title'] = "Produk";
                      $data['data'] = $this->Model_pria->Blazer();
                      $data['title'] = "Input Produk Blazer Pria";
                      $data['header'] = "Produk Blazer Pria";
                              
              $this->load->view('admin/layout/header',$data);
              $this->load->view('admin/layout/menu');
              $this->load->view('admin/kategori/blazer_pria',$data);
              $this->load->view('admin/layout/footer');
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
                           
            $this->load->view('admin/layout/header',$data);
            $this->load->view('admin/layout/menu');
            $this->load->view('admin/kategori/blazer_pria',$data);
            $this->load->view('admin/layout/footer');
        }
        else
        {



             $data = array('upload_data' => $this->upload->data());

               $this->watermark($data['upload_data']['full_path']);

            
        $post = array(
                
                'kode_produk' => $kode,
                'kategori_id' => $kategori,
                'gambar' => $data['upload_data']['file_name'],
                'nama' => $nama,
                'harga' => $harga,
               'stok' => $stok,
          'kode_produk' => $kode,
          'bahan' => $bahan,
          'size' => $size,
          'warna' => $warna,
           'deskripsi' => $deskripsi,
            'merk' => $merk
          );

            $query = $this->Model_pria->addProduk('tbl_produk',$post);
            
            redirect('blazer');

           

        }
      }


        }

public function deleteblazer($kode){
          $data= $this->Model_pria->getWhere($kode); 
          unlink('assets/uploads/'.$data[0]['gambar']);

          $this->Model_pria->deletePria($kode);
          redirect('blazer');

        }

        public function editblazer($kode){
         
            $data['title'] = "Input Produk Blazer Pria";
            $data['header'] = "Edit Produk Blazer";
          $data['data'] = $this->Model_pria->getWhere($kode);
            $this->load->view('admin/layout/header',$data);
            $this->load->view('admin/layout/menu');
          $this->load->view('admin/kategori/edit/edit_blazer',$data);
            $this->load->view('admin/layout/footer');
        }

          public function action_edit_blazer(){

           $id = $this->input->post('id');
           $kode= $this->input->post('kode_produk');
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
   
                $this->form_validation->set_rules('nama', 'nama', 'alpha_numeric_spaces');
                $this->form_validation->set_rules('bahan', 'bahan', 'alpha_numeric_spaces');
                $this->form_validation->set_rules('harga', 'harga', 'integer|min_length[4]|max_length[9]');
   
                
                $this->form_validation->set_rules('size', 'ukuran', 'alpha_numeric_spaces');
                $this->form_validation->set_rules('stok', 'stok', 'integer');
                

                if ($this->form_validation->run() == FALSE)
                {
                      $data['title'] = "Produk";
            $data['data'] = $this->Model_pria->Blazer();
            $data['title'] = "Input Produk Blazer Pria";
            $data['header'] = "Produk Blazer Pria";
                    
              $this->load->view('admin/layout/header',$data);
            $this->load->view('admin/layout/menu');
            $this->load->view('admin/kategori/blazer_pria',$data);
            $this->load->view('admin/layout/footer');
                }
                else
                {           
        $post = array(
                'kode_produk' => $kode,
                'kategori_id' => $kategori,
                'nama' => $nama,
                'harga' => $harga,
               'stok' => $stok,
          'kode_produk' => $kode,
          'bahan' => $bahan,
          'size' => $size,
          'warna' => $warna,
           'deskripsi' => $deskripsi,
            'merk' => $merk
          );

           $where = array('kode_produk' => $kode);
            $query = $this->Model_pria->edit('tbl_produk',$post,$where);
            
            redirect('blazer');

        }

      }

/*  ----------------------------end blazer -------------------------------------------------------- */      


/*  ----------------------------start celana -------------------------------------------------------- */      
          public function celana(){
          $data['title'] = "Produk";
            $data['data'] = $this->Model_pria->Celana();           
            $data['title'] = "Input Produk Celana Pria";
            $data['header'] = "Produk celana Pria";

            $this->load->view('admin/layout/header',$data);
            $this->load->view('admin/layout/menu');
            $this->load->view('admin/kategori/celana_pria',$data);
            $this->load->view('admin/layout/footer');
        }

          public function action_celana(){

             
           $kode= $this->input->post('kode_produk');
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
   
                $this->form_validation->set_rules('kode_produk', 'Kode Produk', 'required|is_unique[tbl_produk.kode_produk]|alpha_numeric');
                $this->form_validation->set_rules('nama', 'nama', 'required|alpha_numeric_spaces');
                $this->form_validation->set_rules('bahan', 'bahan', 'alpha_numeric_spaces');
                $this->form_validation->set_rules('harga', 'harga', 'required|integer|min_length[4]|max_length[9]');
   
                $this->form_validation->set_rules('kategori', 'kategori', 'required');
                $this->form_validation->set_rules('size', 'ukuran', 'alpha_numeric_spaces');
                $this->form_validation->set_rules('stok', 'stok', 'integer');
                

                if ($this->form_validation->run() == FALSE)
                {
                      $data['title'] = "Produk";
            $data['data'] = $this->Model_pria->Celana();
            $data['title'] = "Input Produk Celana Pria";
            $data['header'] = "Produk Celana Pria";
                    
              $this->load->view('admin/layout/header',$data);
            $this->load->view('admin/layout/menu');
            $this->load->view('admin/kategori/celana_pria',$data);
            $this->load->view('admin/layout/footer');
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
          $data['title'] = "Produk";
            $data['data'] = $this->Model_pria->Celana();
            $data['title'] = "Input Produk Celana Pria";
            $data['header'] = "Produk Celana Pria";

              $this->load->view('admin/layout/header',$data);
            $this->load->view('admin/layout/menu');
            $this->load->view('admin/kategori/celana_pria',$data);
            $this->load->view('admin/layout/footer');
        }
        else
        {
             $data = array('upload_data' => $this->upload->data());
               $this->watermark($data['upload_data']['full_path']);
            
        $post = array(
                
                'kode_produk' => $kode,
                'kategori_id' => $kategori,
                'gambar' => $data['upload_data']['file_name'],
                'nama' => $nama,
                'harga' => $harga,
               'stok' => $stok,
          'kode_produk' => $kode,
          'bahan' => $bahan,
          'size' => $size,
          'warna' => $warna,
           'deskripsi' => $deskripsi,
            'merk' => $merk
          );

            $query = $this->Model_pria->addProduk('tbl_produk',$post);
            
            redirect('celana');

           

        }
      }


        }

        public function deletecelana($kode){
          $data= $this->Model_pria->getWhere($kode); 
          unlink('assets/uploads/'.$data[0]['gambar']);

          $this->Model_pria->deletePria($kode);
          redirect('celana');

        }

        public function editcelana($kode){
         
            $data['title'] = "Input Produk Celana Pria";
            $data['header'] = "Edit Produk Celana";
          $data['data'] = $this->Model_pria->getWhere($kode);
            $this->load->view('admin/layout/header',$data);
            $this->load->view('admin/layout/menu');
          $this->load->view('admin/kategori/edit/edit_celana',$data);
            $this->load->view('admin/layout/footer');
        }

          public function action_edit_celana(){

           $kode= $this->input->post('kode_produk');
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
              
              /*$this->form_validation->set_rules('kode_produk', 'Kode Produk', 'required|is_unique[tbl_produk.kode_produk]|alpha_numeric');*/
                $this->form_validation->set_rules('nama', 'nama', 'alpha_numeric_spaces');
                $this->form_validation->set_rules('bahan', 'bahan', 'alpha_numeric_spaces');
                $this->form_validation->set_rules('harga', 'harga', 'integer|min_length[4]|max_length[9]');
                $this->form_validation->set_rules('size', 'ukuran', 'alpha_numeric_spaces');
                $this->form_validation->set_rules('stok', 'stok', 'integer');

                if ($this->form_validation->run() == FALSE)
                {
                      $data['title'] = "Produk";
            $data['data'] = $this->Model_pria->Celana();
            $data['title'] = "Input Produk Celana Pria";
            $data['header'] = "Produk Celana Pria";
                    
              $this->load->view('admin/layout/header',$data);
            $this->load->view('admin/layout/menu');
            $this->load->view('admin/kategori/celana_pria',$data);
            $this->load->view('admin/layout/footer');
                }
                else
                {           
        $post = array(
                'kode_produk' => $kode,
                'kategori_id' => $kategori,
                'nama' => $nama,
                'harga' => $harga,
               'stok' => $stok,               
          'kode_produk' => $kode,
          'bahan' => $bahan,
          'size' => $size,
          'warna' => $warna,
           'deskripsi' => $deskripsi,
            'merk' => $merk
          );

           $where = array('kode_produk' => $kode);
            $query = $this->Model_pria->edit('tbl_produk',$post,$where);
            
            redirect('celana');

        }

      }
/*  ----------------------------end celana -------------------------------------------------------- */      

/*  ----------------------------start Kaos -------------------------------------------------------- */      
          public function kaos(){
            $data['title'] = "Produk";
            $data['data'] = $this->Model_pria->Kaos();            
            $data['title'] = "Input Produk Kaos Pria";
            $data['header'] = "Produk Kaos Pria";

            $this->load->view('admin/layout/header',$data);
            $this->load->view('admin/layout/menu');
            $this->load->view('admin/kategori/kaos_pria',$data);
            $this->load->view('admin/layout/footer');
        }

          public function action_kaos(){
             $id = $this->input->post('id');
             $kode= $this->input->post('kode_produk');
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
              
   
                $this->form_validation->set_rules('kode_produk', 'Kode Produk', 'required|is_unique[tbl_produk.kode_produk]|alpha_numeric');
                $this->form_validation->set_rules('nama', 'nama', 'required|alpha_numeric_spaces');
                $this->form_validation->set_rules('bahan', 'bahan', 'alpha_numeric_spaces');
                $this->form_validation->set_rules('harga', 'harga', 'required|integer|min_length[4]|max_length[9]');
   
                $this->form_validation->set_rules('kategori', 'kategori', 'required');
                $this->form_validation->set_rules('size', 'ukuran', 'alpha_numeric_spaces');
                $this->form_validation->set_rules('stok', 'stok', 'integer');
                

                if ($this->form_validation->run() == FALSE)
                {
                      $data['title'] = "Produk";
            $data['data'] = $this->Model_pria->Kaos();
            $data['title'] = "Input Produk Kaos Pria";
            $data['header'] = "Produk Kaos Pria";
                    
              $this->load->view('admin/layout/header',$data);
            $this->load->view('admin/layout/menu');
            $this->load->view('admin/kategori/kaos_pria',$data);
            $this->load->view('admin/layout/footer');
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

              $data['title'] = "Produk";
            $data['data'] = $this->Model_pria->Kaos();
            $data['title'] = "Input Produk Kaos Pria";
            $data['header'] = "Produk Kaos Pria";
                           
              $this->load->view('admin/layout/header',$data);
            $this->load->view('admin/layout/menu');
            $this->load->view('admin/kategori/kaos_pria',$data);
            $this->load->view('admin/layout/footer');
            }
            else
            {
             $data = array('upload_data' => $this->upload->data());
               $this->watermark($data['upload_data']['full_path']);
            
        $post = array(
                'kode_produk' => $kode,
                'kategori_id' => $kategori,
                'gambar' => $data['upload_data']['file_name'],
                'nama' => $nama,
                'harga' => $harga,
               'stok' => $stok,
                'kode_produk' => $kode,
                'bahan' => $bahan,
                'size' => $size,
                'warna' => $warna,
                 'deskripsi' => $deskripsi,
                  'merk' => $merk
                );

            $query = $this->Model_pria->addProduk('tbl_produk',$post);
            redirect('kaos');         

        }
      }
        }

          public function deletekaos($kode){
          $data= $this->Model_pria->getWhere($kode); 
          unlink('assets/uploads/'.$data[0]['gambar']);

          $this->Model_pria->deletePria($kode);
          redirect('kaos');

        }

        public function editkaos($kode){
         
            $data['title'] = "Input Produk Kaos Pria";
            $data['header'] = "Edit Produk Kaos";
          $data['data'] = $this->Model_pria->getWhere($kode);
            $this->load->view('admin/layout/header',$data);
            $this->load->view('admin/layout/menu');
          $this->load->view('admin/kategori/edit/edit_kaos',$data);
            $this->load->view('admin/layout/footer');
        }

          public function action_edit_kaos(){

           $kode= $this->input->post('kode_produk');
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
   
              /*$this->form_validation->set_rules('kode_produk', 'Kode Produk', 'required|is_unique[tbl_produk.kode_produk]|alpha_numeric');*/
                $this->form_validation->set_rules('nama', 'nama', 'alpha_numeric_spaces');
                $this->form_validation->set_rules('bahan', 'bahan', 'alpha_numeric_spaces');
                $this->form_validation->set_rules('harga', 'harga', 'integer|min_length[4]|max_length[9]');
                $this->form_validation->set_rules('size', 'ukuran', 'alpha_numeric_spaces');
                $this->form_validation->set_rules('stok', 'stok', 'integer');

                if ($this->form_validation->run() == FALSE)
                {
                      $data['title'] = "Produk";
            $data['data'] = $this->Model_pria->Kaos();
            $data['title'] = "Input Produk Kaos Pria";
            $data['header'] = "Produk Kaos Pria";
                    
              $this->load->view('admin/layout/header',$data);
            $this->load->view('admin/layout/menu');
            $this->load->view('admin/kategori/kaos_pria',$data);
            $this->load->view('admin/layout/footer');
                }
                else
                {           
        $post = array(
          'kode_produk' => $kode,
          'kategori_id' => $kategori,
          'nama' => $nama,
          'harga' => $harga,
         'stok' => $stok,               
          'kode_produk' => $kode,
          'bahan' => $bahan,
          'size' => $size,
          'warna' => $warna,
          'deskripsi' => $deskripsi,
          'merk' => $merk
          );

           $where = array('kode_produk' => $kode);
            $query = $this->Model_pria->edit('tbl_produk',$post,$where);
            
            redirect('kaos');

        }

      }


/*  ----------------------------end celana -------------------------------------------------------- */      

/*  ----------------------------start jaket -------------------------------------------------------- */     
          public function jaket(){
            $data['title'] = "Produk";
            $data['data'] = $this->Model_pria->Jaket();        
            $data['title'] = "Input Produk Jaket Pria";
            $data['header'] = "Produk Jaket Pria";

            $this->load->view('admin/layout/header',$data);
            $this->load->view('admin/layout/menu');
            $this->load->view('admin/kategori/jaket_pria',$data);
            $this->load->view('admin/layout/footer');
        }

            public function action_jaket(){
             $kode= $this->input->post('kode_produk');
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
   
              $this->form_validation->set_rules('kode_produk', 'Kode Produk', 'required|is_unique[tbl_produk.kode_produk]|alpha_numeric');
                $this->form_validation->set_rules('kode_produk', 'Kode Produk', 'required|is_unique[tbl_produk.kode_produk]');
                $this->form_validation->set_rules('nama', 'nama', 'required|alpha_numeric_spaces');
                $this->form_validation->set_rules('bahan', 'bahan', 'alpha_numeric_spaces');
                $this->form_validation->set_rules('harga', 'harga', 'required|integer|min_length[4]|max_length[9]');
   
                $this->form_validation->set_rules('kategori', 'kategori', 'required');
                $this->form_validation->set_rules('size', 'ukuran', 'alpha_numeric_spaces');
                $this->form_validation->set_rules('stok', 'stok', 'integer');
                

                if ($this->form_validation->run() == FALSE)
                {
                      $data['title'] = "Produk";
                      $data['data'] = $this->Model_pria->Jaket();
                      $data['title'] = "Input Produk Jaket Pria";
                      $data['header'] = "Produk Jaket Pria";
                              
                        $this->load->view('admin/layout/header',$data);
                      $this->load->view('admin/layout/menu');
                      $this->load->view('admin/kategori/jaket_pria',$data);
                      $this->load->view('admin/layout/footer');
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
                  $data['title'] = "Produk";
                      $data['data'] = $this->Model_pria->Jaket();
                      $data['title'] = "Input Produk Jaket Pria";
                      $data['header'] = "Produk Jaket Pria";
                                   
                    $this->load->view('admin/layout/header',$data);
                    $this->load->view('admin/layout/menu');
                    $this->load->view('admin/kategori/jaket_pria',$data);
                    $this->load->view('admin/layout/footer');
                }
                else
                {
                   $data = array('upload_data' => $this->upload->data());

                   $this->watermark($data['upload_data']['full_path']);

            
                          $post = array(
                                  'kode_produk' => $kode,
                                  'kategori_id' => $kategori,
                                  'gambar' => $data['upload_data']['file_name'],
                                  'nama' => $nama,
                                  'harga' => $harga,
                                 'stok' => $stok,
                            'kode_produk' => $kode,
                            'bahan' => $bahan,
                            'size' => $size,
                            'warna' => $warna,
                             'deskripsi' => $deskripsi,
                              'merk' => $merk
                            );

                              $query = $this->Model_pria->addProduk('tbl_produk',$post);
                              
                              redirect('jaket');

                             

                          }
                        }


        }

          public function deletejaket($kode){
          $data= $this->Model_pria->getWhere($kode); 
          unlink('assets/uploads/'.$data[0]['gambar']);

          $this->Model_pria->deletePria($kode);
          redirect('jaket');

        }

        public function editjaket($kode){
         
            $data['title'] = "Input Produk Jaket Pria";
            $data['header'] = "Edit Produk Jaket";
          $data['data'] = $this->Model_pria->getWhere($kode);
            $this->load->view('admin/layout/header',$data);
            $this->load->view('admin/layout/menu');
          $this->load->view('admin/kategori/edit/edit_jaket',$data);
            $this->load->view('admin/layout/footer');
        }

          public function action_edit_jaket(){

           $kode= $this->input->post('kode_produk');
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
   
              /*$this->form_validation->set_rules('kode_produk', 'Kode Produk', 'required|is_unique[tbl_produk.kode_produk]|alpha_numeric');*/
                $this->form_validation->set_rules('nama', 'nama', 'alpha_numeric_spaces');
                $this->form_validation->set_rules('bahan', 'bahan', 'alpha_numeric_spaces');
                $this->form_validation->set_rules('harga', 'harga', 'integer|min_length[4]|max_length[9]');
                $this->form_validation->set_rules('size', 'ukuran', 'alpha_numeric_spaces');
                $this->form_validation->set_rules('stok', 'stok', 'integer');

                if ($this->form_validation->run() == FALSE)
                {
                      $data['title'] = "Produk";
            $data['data'] = $this->Model_pria->getJaket();
            $data['title'] = "Input Produk Jaket Pria";
            $data['header'] = "Produk Jaket Pria";
                    
              $this->load->view('admin/layout/header',$data);
            $this->load->view('admin/layout/menu');
            $this->load->view('admin/kategori/jaket_pria',$data);
            $this->load->view('admin/layout/footer');
                }
                else
                {           
        $post = array(
                'kode_produk' => $kode,
                'kategori_id' => $kategori,
                'nama' => $nama,
                'harga' => $harga,
               'stok' => $stok,               
          'kode_produk' => $kode,
          'bahan' => $bahan,
          'size' => $size,
          'warna' => $warna,
           'deskripsi' => $deskripsi,
            'merk' => $merk
          );

           $where = array('kode_produk' => $kode);
            $query = $this->Model_pria->edit('tbl_produk',$post,$where);
            
            redirect('jaket');

        }

      }

/*  ----------------------------end jaket -------------------------------------------------------- */     


/*  ----------------------------start topi -------------------------------------------------------- */  
         public function topi(){
          $data['title'] = "Produk";
            $data['data'] = $this->Model_pria->Topi();            
            $data['title'] = "Input Produk Topi Pria";
            $data['header'] = "Produk Topi Pria";

            $this->load->view('admin/layout/header',$data);
            $this->load->view('admin/layout/menu');
            $this->load->view('admin/kategori/topi_pria',$data);
            $this->load->view('admin/layout/footer');


        }

          public function action_topi(){
           $kode= $this->input->post('kode_produk');
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
              
   
                $this->form_validation->set_rules('kode_produk', 'Kode Produk', 'required|is_unique[tbl_produk.kode_produk]|alpha_numeric');
                $this->form_validation->set_rules('nama', 'nama', 'required|alpha_numeric_spaces');
                $this->form_validation->set_rules('bahan', 'bahan', 'alpha_numeric_spaces');
                $this->form_validation->set_rules('harga', 'harga', 'required|integer|min_length[4]|max_length[9]');
   
                $this->form_validation->set_rules('kategori', 'kategori', 'required');
                $this->form_validation->set_rules('size', 'ukuran', 'alpha_numeric_spaces');
                $this->form_validation->set_rules('stok', 'stok', 'integer');
                

                if ($this->form_validation->run() == FALSE)
                {
                      $data['title'] = "Produk";
            $data['data'] = $this->Model_pria->Topi();
            $data['title'] = "Input Produk Topi Pria";
            $data['header'] = "Produk Topi Pria";
                    
              $this->load->view('admin/layout/header',$data);
            $this->load->view('admin/layout/menu');
            $this->load->view('admin/kategori/topi_pria',$data);
            $this->load->view('admin/layout/footer');
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
          $data['title'] = "Produk";
            $data['data'] = $this->Model_pria->Topi();
            $data['title'] = "Input Produk Topi Pria";
            $data['header'] = "Produk Topi Pria";
              $this->load->view('admin/layout/header',$data);
            $this->load->view('admin/layout/menu');
            $this->load->view('admin/kategori/topi_pria',$data);
            $this->load->view('admin/layout/footer');
        }
        else
        {

             $data = array('upload_data' => $this->upload->data());
               $this->watermark($data['upload_data']['full_path']);
            
        $post = array(
                'kode_produk' => $kode,
                'kategori_id' => $kategori,
                'gambar' => $data['upload_data']['file_name'],
                'nama' => $nama,
                'harga' => $harga,
               'stok' => $stok,
          'kode_produk' => $kode,
          'bahan' => $bahan,
          'size' => $size,
          'warna' => $warna,
           'deskripsi' => $deskripsi,
            'merk' => $merk
          );

            $query = $this->Model_pria->addProduk('tbl_produk',$post);
            
            redirect('topi');

           

        }
      }


        }

        public function deletetopi($kode){
          $data= $this->Model_pria->getWhere($kode); 
          unlink('assets/uploads/'.$data[0]['gambar']);

          $this->Model_pria->deletePria($kode);
          redirect('topi');

        }

        public function edittopi($kode){
         
            $data['title'] = "Input Produk Topi Pria";
            $data['header'] = "Edit Produk Topi";
          $data['data'] = $this->Model_pria->getWhere($kode);
            $this->load->view('admin/layout/header',$data);
            $this->load->view('admin/layout/menu');
          $this->load->view('admin/kategori/edit/edit_topi',$data);
            $this->load->view('admin/layout/footer');
        }

          public function action_edit_topi(){

           $kode= $this->input->post('kode_produk');
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
   
              /*$this->form_validation->set_rules('kode_produk', 'Kode Produk', 'required|is_unique[tbl_produk.kode_produk]|alpha_numeric');*/
                $this->form_validation->set_rules('nama', 'nama', 'alpha_numeric_spaces');
                $this->form_validation->set_rules('bahan', 'bahan', 'alpha_numeric_spaces');
                $this->form_validation->set_rules('harga', 'harga', 'integer|min_length[4]|max_length[9]');
                $this->form_validation->set_rules('size', 'ukuran', 'alpha_numeric_spaces');
                $this->form_validation->set_rules('stok', 'stok', 'integer');

                if ($this->form_validation->run() == FALSE)
                {
                      $data['title'] = "Produk";
            $data['data'] = $this->Model_pria->Topi();
            $data['title'] = "Input Produk Topi Pria";
            $data['header'] = "Produk Topi Pria";
                    
              $this->load->view('admin/layout/header',$data);
            $this->load->view('admin/layout/menu');
            $this->load->view('admin/kategori/topi_pria',$data);
            $this->load->view('admin/layout/footer');
                }
                else
                {           
        $post = array(
                'kode_produk' => $kode,
                'kategori_id' => $kategori,
                'nama' => $nama,
                'harga' => $harga,
               'stok' => $stok,               
          'kode_produk' => $kode,
          'bahan' => $bahan,
          'size' => $size,
          'warna' => $warna,
           'deskripsi' => $deskripsi,
            'merk' => $merk
          );

           $where = array('kode_produk' => $kode);
            $query = $this->Model_pria->edit('tbl_produk',$post,$where);
            
            redirect('topi');

        }

      }



/*  ----------------------------end topi -------------------------------------------------------- */  


/*  ----------------------------start sepatu -------------------------------------------------------- */  
         public function sepatu(){
          $data['title'] = "Produk";
            $data['data'] = $this->Model_pria->Sepatu();            
            $data['title'] = "Input Produk sepatu Pria";
            $data['header'] = "Produk sepatu Pria";

            $this->load->view('admin/layout/header',$data);
            $this->load->view('admin/layout/menu');
            $this->load->view('admin/kategori/sepatu_pria',$data);
            $this->load->view('admin/layout/footer');


        }

          public function action_sepatu(){
           $kode= $this->input->post('kode_produk');
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
   
                $this->form_validation->set_rules('kode_produk', 'Kode Produk', 'required|is_unique[tbl_produk.kode_produk]|alpha_numeric');
                $this->form_validation->set_rules('nama', 'nama', 'required|alpha_numeric_spaces');
                $this->form_validation->set_rules('bahan', 'bahan', 'alpha_numeric_spaces');
                $this->form_validation->set_rules('harga', 'harga', 'required|integer|min_length[4]|max_length[9]');
   
                $this->form_validation->set_rules('kategori', 'kategori', 'required');
                $this->form_validation->set_rules('size', 'ukuran', 'alpha_numeric_spaces');
                $this->form_validation->set_rules('stok', 'stok', 'integer');
                

                if ($this->form_validation->run() == FALSE)
                {
            $data['title'] = "Produk";
            $data['data'] = $this->Model_pria->Sepatu();
            $data['title'] = "Input Produk sepatu Pria";
            $data['header'] = "Produk sepatu Pria";
                    
              $this->load->view('admin/layout/header',$data);
            $this->load->view('admin/layout/menu');
            $this->load->view('admin/kategori/sepatu_pria',$data);
            $this->load->view('admin/layout/footer');
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
          $data['title'] = "Produk";
            $data['data'] = $this->Model_pria->Sepatu();
            $data['title'] = "Input Produk sepatu Pria";
            $data['header'] = "Produk sepatu Pria";
              $this->load->view('admin/layout/header',$data);
            $this->load->view('admin/layout/menu');
            $this->load->view('admin/kategori/sepatu_pria',$data);
            $this->load->view('admin/layout/footer');
        }
        else
        {

             $data = array('upload_data' => $this->upload->data());
               $this->watermark($data['upload_data']['full_path']);
            
        $post = array(
                'kode_produk' => $kode,
                'kategori_id' => $kategori,
                'gambar' => $data['upload_data']['file_name'],
                'nama' => $nama,
                'harga' => $harga,
               'stok' => $stok,
          'kode_produk' => $kode,
          'bahan' => $bahan,
          'size' => $size,
          'warna' => $warna,
           'deskripsi' => $deskripsi,
            'merk' => $merk
          );

            $query = $this->Model_pria->addProduk('tbl_produk',$post);
            
            redirect('sepatu');

           

        }
      }


        }

        public function deletesepatu($kode){
          $data= $this->Model_pria->getWhere($kode); 
          unlink('assets/uploads/'.$data[0]['gambar']);

          $this->Model_pria->deletePria($kode);
          redirect('sepatu');

        }

        public function editsepatu($kode){
         
            $data['title'] = "Input Produk sepatu Pria";
            $data['header'] = "Edit Produk sepatu";
          $data['data'] = $this->Model_pria->getWhere($kode);
            $this->load->view('admin/layout/header',$data);
            $this->load->view('admin/layout/menu');
          $this->load->view('admin/kategori/edit/edit_sepatu',$data);
            $this->load->view('admin/layout/footer');
        }

          public function action_edit_sepatu(){

           $kode= $this->input->post('kode_produk');
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
   
              
                $this->form_validation->set_rules('nama', 'nama', 'alpha_numeric_spaces');
                $this->form_validation->set_rules('bahan', 'bahan', 'alpha_numeric_spaces');
                $this->form_validation->set_rules('harga', 'harga', 'integer|min_length[4]|max_length[9]');
                $this->form_validation->set_rules('size', 'ukuran', 'alpha_numeric_spaces');
                $this->form_validation->set_rules('stok', 'stok', 'integer');

                if ($this->form_validation->run() == FALSE)
                {
            $data['title'] = "Produk";
            $data['data'] = $this->Model_pria->Sepatu();
            $data['title'] = "Input Produk Sepatu Pria";
            $data['header'] = "Produk Sepatu Pria";
                    
              $this->load->view('admin/layout/header',$data);
            $this->load->view('admin/layout/menu');
            $this->load->view('admin/kategori/sepatu_pria',$data);
            $this->load->view('admin/layout/footer');
                }
                else
                {           
        $post = array(
                'kode_produk' => $kode,
                'kategori_id' => $kategori,
                'nama' => $nama,
                'harga' => $harga,
               'stok' => $stok,               
          'kode_produk' => $kode,
          'bahan' => $bahan,
          'size' => $size,
          'warna' => $warna,
           'deskripsi' => $deskripsi,
            'merk' => $merk
          );

           $where = array('kode_produk' => $kode);
            $query = $this->Model_pria->edit('tbl_produk',$post,$where);
            
            redirect('sepatu');

        }

      }



/*  ----------------------------end sepatu -------------------------------------------------------- */  





}        