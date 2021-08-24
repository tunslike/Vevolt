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
            'errorMessage' => ''
        ];

        //Check for post
        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            //Sanitize post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'username' => trim($_POST['usern']),
                'password' => trim($_POST['entry']),
                'errorMessage' => ''
            ];
            
            //Validate username
            if (empty($data['username']) || empty($data['password'])) {
                $data['errorMessage'] = 'Please enter username and password';
            }

            if (empty($data['errorMessage'])) {

                $loggedInUser = $this->userModel->login($data['username'], $data['password'], $this->getRealIPAddr());

                if ($loggedInUser) {

                    $this->createUserSession($loggedInUser);

                } else {

                    $data['errorMessage'] = 'Username or password is incorrect. Please try again.';

                    $this->view('account/login', $data);
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

    public function registerRef() {
        
        $data = [
            'firstname' => 'Babatunde',
            'lastname' => 'Francis',
            'email' => 'tunslike@yahoo.com',
            'mobile' => '0809390938',
            'password' => password_hash('123456789', PASSWORD_DEFAULT),
            'state' => 'Lagos',
            'remoteIP' => $this->getRealIPAddr()
        ];

        $this->view('account/register', $data);
    }


    public function register() {

        $data = [
            'firstname' => '',
            'lastname' => '',
            'email' => '',
            'mobile' => '',
            'state' => '',
            'password' => '',
            'errorMessage' => '',
            'status' => 'false'
        ];

      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

              $data = [
                'firstname' => trim($_POST['fname']),
                'lastname' => trim($_POST['lname']),
                'email' => trim($_POST['email']),
                'mobile' => trim($_POST['phone']),
                'state' => trim($_POST['state']),
                'password' => '',
                'errorMessage' => '',
                'remoteIP' => $this->getRealIPAddr(),
                'status' => 'false'
            ];

            $nameValidation = "/^[a-zA-Z0-9]*$/";
            $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";

            $data['errorMessage'] = "You have the errors below: <br>";

            //Validate username on letters/numbers
            if (empty($data['firstname'])) {

                $data['errorMessage'] .= 'Please enter username. <br>';

            } elseif (!preg_match($nameValidation, $data['firstname'])) {

                $data['errorMessage'] .= 'Name can only contain letters and numbers. <br>';

            }

            //Validate email
            if (empty($data['email'])) {

                $data['errorMessage'] .= 'Please enter email address <br>';

            } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {

                $data['errorMessage'] .= 'Please enter the correct format. <br>';

            } else {


                //Check if email exists.
                if ($this->userModel->findUserByEmail($data['email'])) {

                    $data['errorMessage'] .= 'Email is already taken.<br>';

                }
            }
            
            // Make sure that errors are empty
            if (empty($data['errorMessage'])) {

                // Hash password
                $data['password'] = password_hash('1234567', PASSWORD_DEFAULT);

                //Register user from model function
                if ($this->userModel->register($data)) { 

                    $data['status'] = 'true';

                    //Redirect to the login page
                    $this->view('account/register', $data);

                } else {

                    die('Something went wrong.');

                }
            }
        }

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

    public function createUserSession($user) {

        //set session values
        $_SESSION['user_id'] = $user->CUSTOMER_ID;
        $_SESSION['firstname'] = $user->FIRST_NAME;
        $_SESSION['mobile'] = $user->MOBILE_PHONE;
        $_SESSION['email'] = $user->EMAIL;

        //redirect to home page
        header('location:' . URLROOT . '/pages/index');
    }

    public function logout() {

        $customerid = $_SESSION['user_id'];

        $this->userModel->logout($customerid);

        //unset
        unset($_SESSION['user_id']);
        unset($_SESSION['firstname']);
        unset($_SESSION['mobile']);
        unset($_SESSION['email']);
    
        //redirect to login
        header('location:' . URLROOT . '/account/login?r=1');
    }

}