<?php
session_start();
require_once("../../includes/db.php");
require_once("../../includes/functions.php");

$employee_id = $_SESSION['employee_id'];

if(isset($_POST['add_customer'])){
    $customer_name = $_POST['customer_name'];
    $customer_address = $_POST['customer_address'];
    $customer_email = $_POST['customer_email'];
    $customer_contact = $_POST['customer_contact'];
    $gst_no = $_POST['gst_no'];
    
    $query = "SELECT * FROM customer WHERE customer_contact = $customer_contact and deleted=0";
    $result = mysqli_query($connection, $query);
    checkQueryResult($result);
    
    
    
    if(mysqli_num_rows($result)>0){
        $_SESSION['status'] = ERROR_INVALID;
         header("Location: http://".BASE_SERVER."/erp/pages/add-customer.php?q=error&status=customer");
            exit;
        
    }
    
//    $query_gst ="SELECT * FROM gst WHERE hsn_code = $hsn_code";
//    $result_gst = mysqli_query($connection, $query_gst);
//    checkQueryResult($result_gst);
//    
    else{
        $query = "INSERT INTO customer(customer_name, customer_address, customer_email, customer_contact, gst_no, created_at, created_by) VALUES('$customer_name', '$customer_address', '$customer_email', '$customer_contact', '$gst_no', now(), $employee_id)";
        $add_customer_query_result = mysqli_query($connection, $query);
        checkQueryResult($add_customer_query_result);    
    }
}
          
        header("Location: http://".BASE_SERVER."/erp/pages/add-customer.php?q=success");

?>