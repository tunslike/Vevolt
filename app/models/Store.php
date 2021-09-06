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

    public function createOrder($data) {

        try{

            $this->db->query('SELECT COUNT(*)COUNT FROM esb_orders');

            $count = $this->db->single();

            $id = ($count->COUNT == 0) ? '1' : $count->COUNT;

            $this->db->query("INSERT INTO esb_orders(ORDER_ID, ORDER_REF, CUSTOMER_ID, PRODUCT_ID, AMOUNT,
                            DELIVERY_NAME, DELIVERY_ADDRESS, DELIVERY_PHONE, DELIVERY_EMAIL, 
                            DELIVERY_STATE, ORDER_DATE) VALUES 
                            (:orderid, :orderRef, :customerid, :productid, :amount, :delname, :deladdress, :delphone,
                            :delemail, :delstate, :orderdate)");

            $date =  date('Y-m-d H:i:s');
            $orderid = getUniqueUserID();
            $orderRef = date('ynj').addLeadingZero($id);

            //Bind values
            $this->db->bind(':orderid', $orderid);
            $this->db->bind(':orderRef', $orderRef);
            $this->db->bind(':customerid', $data['customerid']);
            $this->db->bind(':productid', $data['productid']);
            $this->db->bind(':amount', $data['amount']);
            $this->db->bind(':delname', $data['name']);
            $this->db->bind(':deladdress', $data['address']);
            $this->db->bind(':delphone', $data['phone']);
            $this->db->bind(':delemail', $data['email']);
            $this->db->bind(':delstate', $data['state']);
            $this->db->bind(':orderdate', $date);
            
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
 
        $results = $this->db->resultSet();

        return $results;

    }

    public function getCartItems($userid) {

        //Prepared statement
        $this->db->query('SELECT P.PRODUCT_ID, NAME, AMOUNT, FILE_NAME FROM 
                          esb_products P JOIN esb_cart C ON P.PRODUCT_ID = C.PRODUCT_ID WHERE C.USER_ID = :userid');

        //Bind values
        $this->db->bind(':userid', $userid);
 
        $results = $this->db->resultSet();

        return $results;
    }

    //fetch user details
    public function fetchUserDetails($customerid) {

        $this->db->query('SELECT FIRST_NAME, LAST_NAME, MOBILE_PHONE, EMAIL, STATE FROM esb_customers WHERE CUSTOMER_ID = :customerid');

        //Bind value
        $this->db->bind(':customerid', $customerid);

        $row = $this->db->single();

        return $row;

    }

      //Find user by email. Email is passed in by the Controller.
      public function findProductInCart($productid) {

        //Prepared statement
        $this->db->query('SELECT * FROM esb_cart WHERE PRODUCT_ID = :productid');
 
        //Email param will be binded with the email variable
        $this->db->bind(':productid', $productid);

        //Check if email is already registered
        if($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    
    }

    public function createCustomerCart($productid, $userid) {

        try{

            $this->db->query("INSERT INTO esb_cart(CART_ID, USER_ID, PRODUCT_ID, DATE_CREATED)
                             VALUES(:cartid, :userid, :productid, :dateCreated) ");

            $date =  date('Y-m-d H:i:s');
            $cartid = getUniqueUserID();

            //Bind values
            $this->db->bind(':cartid', $cartid);
            $this->db->bind(':userid', $userid);
            $this->db->bind(':productid', $productid);
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

    public function getProductDetails($productid) {

        $this->db->query('SELECT PRODUCT_ID, AMOUNT, NAME, C.CATEGORY, DESCRIPTION, FILE_NAME, MANUFACTURER, PRODUCT_CODE, QUANTITY FROM esb_products P
                          LEFT JOIN esb_product_category C ON P.CATEGORY_ID = C.SEQ_NUM 
                         WHERE STATUS = 0 AND PRODUCT_ID = :productid');

        //Bind value
        $this->db->bind(':productid', $productid);

        $row = $this->db->single();

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