<?php 
require_once("../../includes/functions.php");
session_start();

if(isset($_POST['edit_purchase'])){
    $purchase_id = $_POST['purchase_id'];
    $purchase_name = $_POST['purchase_name'];
   // $eoq = $_POST['eoq'];
    $rate_of_sale = $_POST['rate_of_sale'];
    $additional_specification = $_POST['additional_specification'];
    //$supplier_name = $_POST['supplier_name'];
    //$category_name = $_POST['category_name'];
    
    
    $query = "UPDATE purchase,purchase_sale_rate SET purchase_name = '$purchase_name', rate_of_sale = '$rate_of_sale', additional_specification = '$additional_specification' updated_by = $employee_id, updated_at = now() WHERE category_id = $category_id";
    $result = mysqli_query($connection, $query);
    checkQueryResult($result);
    $_SESSION['status'] = CATEGORY_EDIT_SUCCESS;
    header("Location: http://".BASE_SERVER."/erp/pages/manage-category.php");
    exit();
}



?>