<?php

class Vendors extends Controller {

    public function __construct(){
        $this->userModel = $this->model('Vendor');
    }

    public function createStore() {

        if(isset($_SESSION['user_id'])){
            $accessid = $_SESSION['user_id'];
        }

        $data = [
            'name' => '',
            'address' => '',
            'category' => '',
            'mobile' => '',
            'email' => '',
            'state' => '',
            'errorMessage' => ''
        ];

      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

              $data = [
                'name' => trim($_POST['sname']),
                'address' => trim($_POST['saddr']),
                'category' => trim($_POST['cat']),
                'mobile' => trim($_POST['mobile']),
                'email' => trim($_POST['email']),
                'state' => trim($_POST['state']),
                'accessid' => $accessid,
                'errorMessage' => ''
            ];

            $nameValidation = "/^[a-zA-Z0-9]*$/";
            $passwordValidation = "/^(.{0,7}||[^A-Z]*|[^a-z]*|[^\d]*)$/i";


            $data['errorMessage'] = "You have the errors below: <br>";

            //Validate username on letters/numbers
            if (empty($data['name'])) {

                $data['errorMessage'] .= 'Please enter store name. <br>';

            } elseif (!preg_match($nameValidation, $data['name'])) {

                $data['errorMessage'].= 'store name can only contain letters and numbers. <br>';
            }

            //Validate email
            if (empty($data['email'])) {

                $data['errorMessage'] .= 'Please enter email address <br>';

            } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {

                $data['errorMessage'] .= 'Please enter the correct format. <br>';

            } else {

                //Check if email exists.
                if ($this->userModel->findExistStore($data['name'])) {

                    $data['errorMessage'] .= 'Email is already taken.<br>';

                }
            }

            $data['errorMessage'] = '';

            // Make sure that errors are empty
            if (empty($data['errorMessage'])) {

                //Register user from model function
                if ($this->userModel->createNewStore($data)) { 

                    $data['status'] = 'true';

                    //Redirect to the login page
                    $this->view('vendor/createStore', $data);

                } else {

                    die('Something went wrong.');
                }
            }
        }

        if(!isset($_SESSION['user_id'])){
            $logged = 'true';
        }else{
            $logged = 'false';
        }
        
        $data = [
            'title' => 'Create Store',
            'logged' => $logged,
            'status' => 'false'
        ];

        $this->view('vendor/createStore', $data);
    }

    public function login() {

        $data = [
            'firstname' => 'Babatunde',
            'lastname' => 'Francis',
            'email' => 'tunslike@yahoo.com',
            'mobile' => '0809390938',
            'password' => password_hash('123456789', PASSWORD_DEFAULT),
            'state' => 'Lagos',
            'remoteIP' => $this->getRealIPAddr()
        ];

        $this->userModel->register($data);

        echo 'Vendor Record Inserted';

        //$this->view('account/login', $data);
    }

    
    public function getRealIPAddr()
    {
        //check ip from share internet
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) 
        {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
        //to check ip is pass from proxy
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))  
        {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else
        {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

}