<?php

class Stores extends Controller {

    public function __construct(){
        $this->userModel = $this->model('Store');
    }
 
    public function addProduct() {

        $data = [
            'storeid' => 'djhdhjdjhdjhjhdhdjhdhd',
            'name' => 'Filter Pack',
            'amount' => '4500',
            'image' => '../public/images/products/prod8.jpg'
        ];

        $this->userModel->AddProduct($data);

        echo 'Vendor Record Inserted';

        //$this->view('account/login', $data);
    }

    public function LoadProducts() {

        $data = [
            'storeid' => 'djhdhjdjhdjhjhdhdjhdhd',
            'name' => 'Filter Pack',
            'amount' => '4500',
            'image' => '../public/images/products/prod8.jpg'
        ];

        $this->userModel->loadAllProducts($data);

    }

}