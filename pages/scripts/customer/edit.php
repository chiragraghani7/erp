<?php 
require_once("../../includes/functions.php");
session_start();

if(isset($_POST['edit_customer'])){
    $customer_id = $_POST['customer_id'];
    $customer_name = $_POST['customer_name'];
    $employee_id = $_SESSION['employee_id'];
    
    $query = "UPDATE customer SET customer_name = '$customer_name', updated_by = $employee_id, updated_at = now() WHERE customer_id = $customer_id";
    $result = mysqli_query($connection, $query);
    checkQueryResult($result);
    $_SESSION['status'] = EDITED_SUCCESSFULLY;
    header("Location: http://".BASE_SERVER."/erp/pages/manage-customer.php");
    exit();
}



?>