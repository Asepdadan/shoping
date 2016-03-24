<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

        function __construct()
        {
            parent::__construct();
            $this->load->model('Model_produk');
            $this->load->helper(array('form', 'url','help'));
            $this->load->library('session');
         
        }

        public function index(){
            $this->session->all_userdata();
                $this->session->sess_destroy();

                $data['title'] = "Form Login";
            $this->load->view('admin/layout/header',$data);
            $this->load->view('admin/login/login');
            $this->load->view('admin/layout/footer');

        }

        public function aksi_login(){
            $email = $this->input->post('email');
            $password = sha1($this->input->post('password'));

            $check = $this->Model_produk->login($email,$password);

            if($check){
                 $data = array(
                   'email'  => $email,
                   'password'     => $password,
                   'logged_in' => TRUE
               );

            $this->session->set_userdata($data);
            redirect('blazer');


            }else{
                $this->session->set_flashdata('info','email atau password salah');
                redirect('login');

            }


        }

        public function logout(){
                $this->session->all_userdata();
                $this->session->sess_destroy();
                redirect('login');

        }



    }