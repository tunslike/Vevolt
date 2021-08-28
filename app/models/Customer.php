<?php

class Customer {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getCustomerID(){
        return $guid = bin2hex(openssl_random_pseudo_bytes(16));
    } 

    public function register($data) {

        try{
            
        $this->db->query("INSERT INTO esb_customers (CUSTOMER_ID, FIRST_NAME, LAST_NAME, MOBILE_PHONE, EMAIL, STATE, DATE_CREATED, IP_ADDRESS) 
                        VALUES(:customerid, :fname, :lname, :mobile, :email, :state, :dateCreated, :ipAddr) ");

        $date =  date('Y-m-d H:i:s');
        $customerid = $this->getCustomerID();

        //Bind values
        $this->db->bind(':fname', $data['firstname']);
        $this->db->bind(':lname', $data['lastname']);
        $this->db->bind(':mobile', $data['mobile']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':state', $data['state']);
        $this->db->bind(':dateCreated', $date);
        $this->db->bind(':ipAddr', $data['remoteIP']);
        $this->db->bind(':customerid', $customerid);

        //Execute function
        if ($this->db->execute()) {

            //generate password
            $this->setupPassword($customerid, $data['password'], 'CUSTOMER');

        return true;
        } else {
        return false;
        }

        }catch(PDOException $e){
            echo 'ERROR!';
            print_r( $e );
        }
    }

    public function setupPassword($customerid, $password, $idtype) {

        try{
            
        $this->db->query("INSERT INTO esb_access (ID_TYPE, CUSTOMER_ID, ACCESS_ID, DATE_CREATED) 
                        VALUES(:idtype, :customerid, :accessid, :dateCreated)");

        $date =  date('Y-m-d H:i:s');

        //Bind values
        $this->db->bind(':idtype', $idtype);
        $this->db->bind(':customerid', $customerid);
        $this->db->bind(':accessid', $password);
        $this->db->bind(':dateCreated', $date);

        //Execute function
        if ($this->db->execute()) {
        return true;
        } else {
        return false;
        }

        }catch(PDOException $e){
            echo 'ERROR!';
            print_r( $e );
        }
    }

    public function logout($customerid) {

        //update access login
        $this->db->query("UPDATE esb_access SET IS_LOGGED = 0 WHERE CUSTOMER_ID = :customerid");

        //Bind values
        $this->db->bind(':customerid', $customerid);
        
        //Execute function
        $this->db->execute();
    }
    
    public function login($username, $password, $ipaddr) {

        $this->db->query('SELECT CUSTOMER_ID, FIRST_NAME, MOBILE_PHONE, EMAIL FROM esb_customers WHERE STATUS = 0 AND EMAIL = :username');

        //Bind value
        $this->db->bind(':username', $username);

        $rowData = $this->db->single();

        $customerid = $rowData->CUSTOMER_ID;
        $email = $rowData->EMAIL;

        //get password
        $this->db->query('SELECT ACCESS_ID, FIRST_LOGIN_DATE FROM esb_access WHERE STATUS = 0 AND CUSTOMER_ID = :customerid');

        //Bind value
        $this->db->bind(':customerid', $customerid);

        $row = $this->db->single();

        $hashedPassword = $row->ACCESS_ID;
        $firstLogin = $row->FIRST_LOGIN_DATE;        

        if (password_verify($password, $hashedPassword)) {

            $this->ActivateUserLogin($customerid, $firstLogin, $ipaddr);

            return $rowData;
        } else {
            return false;
        }
    }

    //update user login details
    public function ActivateUserLogin($customerid, $firstLogin, $ipaddr){
        
        if($firstLogin == ''){
            $sql = "UPDATE esb_access SET FIRST_LOGIN_DATE = :logindate, LAST_LOGIN_DATE = :logindate, IP_ADDRESS = :ipaddress, IS_LOGGED = 1 WHERE CUSTOMER_ID = :customerid";
        }else{
            $sql = "UPDATE esb_access SET LAST_LOGIN_DATE = :logindate, IP_ADDRESS = :ipaddress, IS_LOGGED = 1 WHERE CUSTOMER_ID = :customerid";
        }

        //update access login
        $this->db->query($sql);

        $date =  date('Y-m-d H:i:s');

        //Bind values
        $this->db->bind(':customerid', $customerid);
        $this->db->bind(':logindate', $date);
        $this->db->bind(':ipaddress', $ipaddr);
        
        //Execute function
        $this->db->execute();
    }

    //Find user by email. Email is passed in by the Controller.
    public function findUserByEmail($email) {

        //Prepared statement
        $this->db->query('SELECT * FROM esb_customers WHERE EMAIL = :email');
 
        //Email param will be binded with the email variable
        $this->db->bind(':email', $email);

        //Check if email is already registered
        if($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

}