<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

        function __construct()
        {
        parent::__construct();

        $this->load->model('Model_produk');
        $this->load->helper(array('form', 'url'));
          $this->load->library('image_lib');
        $this->load->library('cart');
        }

        public function index(){
       redirect();

       

        }
        public function cart(){
          
        $data = array(
            'id' => $this->input->post('id'),
            'qty' => $this->input->post('qty'),
            'price' => $this->input->post('price'),
            'name' => $this->input->post('name'),
            'coupon' => 'XMASDSF'
            );

           echo $this->cart->insert($data);
        
        

        //redirect('produk');            

        }

        public function remove($id){
            $this->cart->remove($id);
            redirect('produk');            

        }

        public function update(){

            $data = $this->input->get();
            //$data =$this->cart->update($data);
           print_r($data);
           // redirect('produk');
        

        }

}