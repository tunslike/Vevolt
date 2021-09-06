<?php
class Pages extends Controller {
    public function __construct() {
        $this->userModel = $this->model('Store');
    }

    public function index() {

        $products = $this->userModel->loadAllProducts();

        $data = [
            'title' => 'Home page',
            'products' => $products
        ]; 
        
        $this->view('index', $data);
    }

    public function about() {
        
        $this->view('about');
    }
}
