<?php

class Vendors extends Controller {

    public function __construct(){
        $this->userModel = $this->model('Vendor');
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