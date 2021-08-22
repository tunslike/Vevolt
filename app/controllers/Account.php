<?php

class Account extends Controller {

    public function __construct(){
        $this->userModel = $this->model('Customer');
    }

   public function login() {
        $data = [
            'title' => 'Login page',
            'username' => '',
            'password' => '',
            'usernameError' => '',
            'passwordError' => ''
        ];

        //Check for post
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Sanitize post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password']),
                'usernameError' => '',
                'passwordError' => '',
            ];
            //Validate username
            if (empty($data['username'])) {
                $data['usernameError'] = 'Please enter a username.';
            }

            //Validate password
            if (empty($data['password'])) {
                $data['passwordError'] = 'Please enter a password.';
            }

            //Check if all errors are empty
            if (empty($data['usernameError']) && empty($data['passwordError'])) {
                $loggedInUser = $this->userModel->login($data['username'], $data['password']);

                if ($loggedInUser) {
                    $this->createUserSession($loggedInUser);
                } else {
                    $data['passwordError'] = 'Password or username is incorrect. Please try again.';

                    $this->view('users/login', $data);
                }
            }

        } else {
            $data = [
                'username' => '',
                'password' => '',
                'usernameError' => '',
                'passwordError' => ''
            ];
        }

        $this->view('account/login', $data);
   }
    
    public function loginRef() {

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

        echo 'Record Inserted';

        //$this->view('account/login', $data);
    }

    public function register() {
        $data = [
            'title' => 'Accounts'
        ];

        $this->view('account/register', $data);
    }

    public function resetPassword() {
        $data = [
            'title' => 'Password Reset'
        ];

        $this->view('account/resetPassword', $data);
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