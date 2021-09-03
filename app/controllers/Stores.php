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

    public function createCart() {

        //check login
        if(!isLoggedIn()){

            if(!isset($_SESSION['cart'])) {
                    
                    $identity = retrieveCartCookie();

                    //check cookie
                    if($identity == '') {
                        
                        //create new cart cookie
                        setCartCookie('cartItem', getUniqueUserID());

                        $identity2 = retrieveCartCookie();

                        echo $identity2.' - this is the cart id';

                        exit();
                    }
            }else{

                $identity = $_SESSION['cart'];
            }
            
        }else{

            $identity = $_SESSION['user_id'];

        }

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $productid = trim($_POST['productid']);

            //get product id
            if(empty($productid)) {

                header("Location: " . URLROOT . "/index");

            }else {

                //check cart
                $cartfound = $this->userModel->findProductInCart($identity); 

                if($cartfound) {

                }else{

                    //create cart
                    $cart = $this->userModel->createCustomerCart($productid, $identity); 
                }
                

                if($cart) {

                    //set session id
                    $_SESSION['cart'] = $identity;
                    
                    header("Location: " . URLROOT . "/stores/cart");
                    exit();
                }
            }
        }

        header("Location: " . URLROOT . "/index");

    }

    public function product() {

        $product = $_GET['pid'];

        //get product id
        if(empty($product)) {
            header("Location: " . URLROOT . "/index");
        }

        //load product details
        $productDetails = $this->userModel->getProductDetails($product);

        $data = [
            'title' => $productDetails->NAME .' - '. SITENAME,
            'details' => $productDetails
        ];

        $this->view('stores/product', $data);
    }

    public function cart() {

        if(!isset($_SESSION['cart'])) {

            header("Location: " . URLROOT . "/index");

        }else{

            //get identity
            $identity = $_SESSION['cart'];
        }

        //get cart details
        $cart = $this->userModel->getCartItems($identity);

        $data = [
            'title' => 'My Cart - '.SITENAME,
            'cart' => $cart
        ];

        $this->view('stores/cart', $data);

    }

    public function checkout() {

        if(!isset($_SESSION['cart'])) {

            header("Location: " . URLROOT . "/index");
        }else {
            //get identity
            $identity = $_SESSION['cart'];
        }

        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            //get cart details
            $cart = $this->userModel->getCartItems($identity);

        }else {
            header("Location: " . URLROOT . "/index");
        }

        if(isLoggedIn()){
            
        }


        $data = [
            'title' => 'Checkout - '.SITENAME,
            'cart' => $cart
        ];


        $this->view('stores/checkout', $data);

    }

    public function confirmation() {

        $data = [
            'title' => 'Payment Confirmation - '.SITENAME
        ];

        $this->view('stores/confirmation', $data);

    }

    public function LoadProducts() {

        $product = $this->userModel->loadAllProducts($data);

        $data = [
            'product' => $product
        ];

        $this->view('stores/product', $data);

    }

}