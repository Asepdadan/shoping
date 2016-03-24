<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

        function __construct()
        {
            parent::__construct();

            $this->load->model('Model_produk');
            $this->load->helper(array('form', 'url','help'));
              $this->load->library('image_lib');
             $this->load->library('form_validation','session');
        }

    /*  ----------------------------watermark -------------------------------------------------------- */
        public function watermark($path){
        $config['source_image'] = $path;
        $config['wm_text'] = 'BUKTI TRANSFER PELANGGAN';
        $config['wm_type'] = 'text';
        $config['wm_font_path'] = './system/fonts/FFF_Tusj.ttf';
        $config['wm_font_size'] = '30';
        $config['wm_font_color'] = '#1DE9D3';
        $config['wm_vrt_alignment'] = 'middle';
        $config['wm_hor_alignment'] = 'Center';
        $config['wm_padding'] = '1';

        $this->image_lib->initialize($config);

        $this->image_lib->watermark();


    }
/*  ----------------------------watermark -------------------------------------------------------- */

        public function order(){
            $nama = $this->input->post('nama');
            $kode_produk = $this->input->post('kode_produk');
            $email = $this->input->post('email');
            $alamat = $this->input->post('alamat');
            $nohp = $this->input->post('nohp');
            $bukti_transfer = $this->input->post('userfile');
         /*
            $pecah = explode("#", $kode_produk);
            print_r($pecah);
            echo "<br>";*/

            $this->load->library('form_validation');          
   
                $this->form_validation->set_rules('kode_produk', 'Kode Produk', 'required');
                $this->form_validation->set_rules('nama', 'nama', 'required');
                $this->form_validation->set_rules('email', 'email', 'required');
                $this->form_validation->set_rules('nohp', 'nohp', 'required|alpha_numeric');
                  

                if ($this->form_validation->run() == FALSE)
                {
                    $data['title'] = "Belanja Detail";
                            $this->load->view('guest/header',$data);
                            $this->load->view('guest/menu');
                            $this->load->view('guest/cart');
                            $this->load->view('guest/footer');
                    
                }
                else
                {
                        $config['upload_path'] = './assets/bukti';
                        $config['allowed_types'] = 'gif|jpg|png';
                        $config['max_size'] = '100000';
                        $config['max_width']  = '100024';
                        $config['max_height']  = '76800';

                      $this->load->library('upload', $config);

                      if ( ! $this->upload->do_upload())
                      {
                         $error = array('error' => $this->upload->display_errors());

                            $data['title'] = "Belanja Detail";
                            $this->load->view('guest/header',$data);
                            $this->load->view('guest/menu');
                            $this->load->view('guest/cart',$error);
                            $this->load->view('guest/footer');
                      }
                      else
                      {
                           $data = array('upload_data' => $this->upload->data());

                             $this->watermark($data['upload_data']['full_path']);

                          
                      $post = array(
                        'order_id' => '',
                        'kode_produk' => $kode_produk,
                        'nama_order' => $nama,
                        'alamat' => $alamat,
                        'email' => $email,
                        'nohp' => $nohp,
                        'bukti_transfer' => $data['upload_data']['file_name'],
                        );

                        $this->session->set_flashdata('message','Baik Pemesanan Akan Kami Proses Secepatnya Untuk lebih detail silahkan kontak kami');
                          $this->db->insert('tbl_order',$post);
                          redirect('cart');       
            }
          }

          


        }

            public function send_email(){
            //berhasill bro

             $config = Array(
                    'protocol' => 'smtp',
                    'smtp_host' => 'ssl://smtp.googlemail.com',
                    'smtp_port' => 465,
                    'smtp_user' => 'pembeli@gudangjeansfashion.com ',
                    'smtp_pass' => 'pembeli',
                    'mailtype'  => 'html', 
                    'charset' => 'utf-8',
                    'wordwrap' => TRUE
                );            

                /* 
                *
                * Send email with #temp_pass as a link
                *
                */

                $this->load->library('email', $config);
                $this->email->set_newline("\r\n");
                $this->email->from('pembeli@gudangjeansfashion.com', "Achep");
                $this->email->to('achepolshop@gmail.com');
                $this->email->subject("test codeigniter send");

                $message = "test asep dadan berhasil kagak ini dari hostinger kirim nya";
                $this->email->message($message);
                

            if($this->email->send()){
            echo "send email berhasil";
            }else{
            echo "gagal";
            }
                

                }


    }