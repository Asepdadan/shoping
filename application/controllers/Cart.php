<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

        function __construct()
        {
        parent::__construct();

        $this->load->model('Model_produk');
        $this->load->helper(array('form', 'url','help'));
        $this->load->library('cart');
        
        }

    public function index()
    {
        
        $data['title'] = "Keranjang Detail";
        $this->load->view('guest/header',$data);
        $this->load->view('guest/menu');
        $this->load->view('guest/cart');
        $this->load->view('guest/footer');

    }

     public function add_cart(){
        //print_r($_POST);
         $data = array(
            'id' => $this->input->post('id'),
            'qty' => $this->input->post('qty'),
            'price' => $this->input->post('harga'),
            'name' => $this->input->post('nama'),
            'gambar' => $this->input->post('gambar'),
            );

          $this->cart->insert($data);
            

        redirect('cart');            
    }

    public function remove($id){
            $this->cart->remove($id);
            redirect('cart');            

        }

            public function update(){

            $data = $this->input->get();
            print_r($data);
            $this->cart->update($data);
            redirect('cart');
        

        }


}