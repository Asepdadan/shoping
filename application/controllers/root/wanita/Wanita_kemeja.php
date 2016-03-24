<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wanita_kemeja extends CI_Controller {

        function __construct()
        {
            parent::__construct();

            $this->load->model('Model_wanita');
            $this->load->helper(array('form', 'url','help'));
              $this->load->library('image_lib');
             $this->load->library('form_validation');
           if(!$this->session->userdata('logged_in')==TRUE){
              redirect('logout');
             } 
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

         public function wanita_kemeja(){
            $data['title'] = "Produk";
            $data['data'] = $this->Model_wanita->wanitakemeja();
            $data['title'] = "Input Produk kemeja wanita";
            $data['header'] = "Produk kemeja wanita";

            $this->load->view('admin/layout/header',$data);
            $this->load->view('admin/layout/menu');
            $this->load->view('admin/kategori/wanita/kemeja_wanita',$data);
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
                      $data['data'] = $this->Model_wanita->wanitakemeja();
                      $data['title'] = "Input Produk kemeja wanita";
                      $data['header'] = "Produk kemeja wanita";
                    
                      $this->load->view('admin/layout/header',$data);
                      $this->load->view('admin/layout/menu');
                      $this->load->view('admin/kategori/kemeja_wanita',$data);
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
                      $data['data'] = $this->Model_wanita->wanitakemeja();
                      $data['title'] = "Input Produk kemeja wanita";
                      $data['header'] = "Produk kemeja wanita";
                                         
                            $this->load->view('admin/layout/header',$data);
                          $this->load->view('admin/layout/menu');
                          $this->load->view('admin/kategori/kemeja_wanita',$data);
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

                          $query = $this->Model_wanita->addProduk('tbl_produk',$post);
                          redirect('wanita_kemeja');       
            }
          }

        }

              public function deletekemeja($kode){
                $data= $this->Model_wanita->getWhere($kode); 
                unlink('assets/uploads/'.$data[0]['gambar']);

                $this->Model_wanita->deletewanita($kode);
                redirect('wanita_kemeja');

              }

        public function editkemeja($kode){
         
            $data['title'] = "Input Produk kemeja wanita";
            $data['header'] = "Edit Produk kemeja";
            $data['data'] = $this->Model_wanita->getWhere($kode);
            $this->load->view('admin/layout/header',$data);
            $this->load->view('admin/layout/menu');
            $this->load->view('admin/kategori/edit_wanita/edit_kemeja',$data);
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
            $data['data'] = $this->Model_wanita->wanitakemeja();
            $data['title'] = "Input Produk kemeja wanita";
            $data['header'] = "Produk kemeja wanita";
                    
            $this->load->view('admin/layout/header',$data);
            $this->load->view('admin/layout/menu');
            $this->load->view('admin/kategori/wanita/kemeja_wanita',$data);
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
            $query = $this->Model_wanita->edit('tbl_produk',$post,$where);
            redirect('wanita_kemeja');

        }

      }
}