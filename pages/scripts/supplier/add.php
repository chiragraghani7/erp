<?php
session_start();
require_once("../../includes/db.php");
require_once("../../includes/functions.php");

$employee_id = $_SESSION['employee_id'];

if(isset($_POST['add_supplier'])){
    $supplier_name = $_POST['supplier_name'];
    $supplier_address = $_POST['supplier_address'];
    $supplier_email = $_POST['supplier_email'];
    $supplier_contact = $_POST['supplier_contact'];
    $gst_no = $_POST['gst_no'];
    
    $query = "SELECT * FROM supplier WHERE supplier_contact = $supplier_contact and deleted=0";
    $result = mysqli_query($connection, $query);
    checkQueryResult($result);
    
    
    
    if(mysqli_num_rows($result)>0){
        $_SESSION['status'] = ERROR_INVALID_SUPPLIER;
         header("Location: http://".BASE_SERVER."/erp/pages/add-supplier.php?q=error&status=supplier");
            exit;
        
    }
    
//    $query_gst ="SELECT * FROM gst WHERE hsn_code = $hsn_code";
//    $result_gst = mysqli_query($connection, $query_gst);
//    checkQueryResult($result_gst);
//    
    else{
        $query = "INSERT INTO supplier(supplier_name, supplier_address, supplier_email, supplier_contact, gst_no, created_at, created_by) VALUES('$supplier_name', '$supplier_address', '$supplier_email', '$supplier_contact', '$gst_no', now(), $employee_id)";
        $add_supplier_query_result = mysqli_query($connection, $query);
        checkQueryResult($add_supplier_query_result);    
    }
}
          
        header("Location: http://".BASE_SERVER."/erp/pages/add-supplier.php?q=success");

?>