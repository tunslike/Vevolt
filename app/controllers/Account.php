<?php

class Account extends Controller {

    public function __construct(){
        $this->userModel = $this->model('Customer');
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