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
            
            $customerid = $_SESSION['user_id'];
             
            $userDetails = $this->userModel->fetchUserDetails($_SESSION['user_id']);
        }

        $data = [
            'title' => 'Checkout - '.SITENAME,
            'cart' => $cart,
            'user' => $userDetails
        ];

        $this->view('stores/checkout', $data);
    }

    public function createOrder() {

        if(!isset($_SESSION['cart'])) {

            header("Location: " . URLROOT . "/index");
        }else {
            //get identity
            $identity = $_SESSION['cart'];

            //load cart items
            $cart = $this->userModel->getCartItems($identity);
        }

        var_dump($cart);
        exit();

        if(isLoggedIn()){
            $customerid = $_SESSION['user_id'];
        }else {
            header("Location: " . URLROOT . "/index");
        }

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $deliverOptions = trim($_POST['options']);

            switch ($deliverOptions) {
                case '1':
                    $data = [
                        'name' => trim($_POST['deliveryfname']),
                        'address' => trim($_POST['deliveryAddr']),
                        'email' => trim($_POST['deliveryEmail']),
                        'state' => trim($_POST['deliveryState']),
                        'mobile' => trim($_POST['deliveryMobile']),
                        'location' => '',
                        'deliveryType' => 'DELIVERY',
                        'customerid' => $customerid,
                        'productid' => $productid
                    ];
                break;
                case '2':
                    $data = [
                        'name' => trim($_POST['pickupFname']),
                        'address' => '',
                        'email' => trim($_POST['pickupEmail']),
                        'state' => trim($_POST['pickupState']),
                        'mobile' => trim($_POST['pickupMobile']),
                        'location' => trim($_POST['pickupLocation']),
                        'deliveryType' => 'PICKUP',
                        'customerid' => $customerid,
                        'productid' => $productid
                    ];
                break;
                default:
                    $data = [];
                break;
            }

            //get cart details
            $order = $this->userModel->createOrder($data);

            if($order) {

                header("Location: " . URLROOT . "/stores/confirmation?stat=true");
                exit();

            }else{

                header("Location: " . URLROOT . "/stores/cart?stat=false&err=logged");
                exit();
            }

        }else {
            header("Location: " . URLROOT . "/index");
        }

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