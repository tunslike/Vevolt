<?php
class Store {

    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function AddProduct($data) {

        try{

            $this->db->query("INSERT INTO esb_products (PRODUCT_ID, STORE_ID, NAME, AMOUNT, IMAGE, DATE_CREATED) 
            VALUES(:productid, :storeid, :name, :amount, :image, :dateCreated) ");

            $date =  date('Y-m-d H:i:s');
            $productid = getUniqueUserID();

            //Bind values
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':amount', $data['amount']);
            $this->db->bind(':image', convertImageToBlob($data['image']));
            $this->db->bind(':dateCreated', $date);
            $this->db->bind(':productid', $productid);
            $this->db->bind(':storeid', $data['storeid']);

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

    //Find user by email. Email is passed in by the Controller.
    public function loadAllProducts() {

        //Prepared statement
        $this->db->query('SELECT * FROM esb_products WHERE STATUS = 0 AND QUANTITY > 0');
 
        $row = $this->db->single();

        var_dump($row);

        exit();

        return $row;
    }


     //Find user by email. Email is passed in by the Controller.
     public function findExistStore($storeName) {

        //Prepared statement
        $this->db->query('SELECT * FROM esb_store WHERE NAME = :name');
 
        //Email param will be binded with the email variable
        $this->db->bind(':name', $storeName);

        //Check if email is already registered
        if($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function register($data) {

        try{
            
        $this->db->query("INSERT INTO esb_vendor (FIRSTNAME, LASTNAME, MOBILE, EMAIL, STATE, DATE_CREATED, VENDOR_ID, IP_ADDRESS) 
                        VALUES(:fname, :lname, :mobile, :email, :state, :dateCreated, :vendorid, :ipAddr) ");

        $date =  date('Y-m-d H:i:s');
        $vendorid = getUniqueUserID();

        //Bind values
        $this->db->bind(':fname', $data['firstname']);
        $this->db->bind(':lname', $data['lastname']);
        $this->db->bind(':mobile', $data['mobile']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':state', $data['state']);
        $this->db->bind(':dateCreated', $date);
        $this->db->bind(':vendorid', $vendorid);
        $this->db->bind(':ipAddr', $data['remoteIP']);
        
        //Execute function
        if ($this->db->execute()) {

            //generate password
            $this->setupPassword($vendorid, $data['password'], 'VENDOR');

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

}