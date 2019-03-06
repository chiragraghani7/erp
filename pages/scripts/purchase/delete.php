<?php
require_once("../../includes/functions.php");
session_start();
$employee_id = $_SESSION['employee_id'];
if(isset($_POST['deleteBtn'])){
    
    $purchase_id = $_POST['purchase_id'];
    $tableName = "purchase";
    $primaryKeyColumnName = "purchase_id";
    deleteRecord($tableName, $primaryKeyColumnName, $purchase_id, $employee_id);
    //$_SESSION['status'] = DELETE_SUCCESSFULLY_SUPPLIER;
    
    $tableName = "purchase_sale_rate";
    deleteRecord($tableName, $primaryKeyColumnName, $purchase_id, $employee_id);

    header("Location: http://".BASE_SERVER."/erp/pages/manage-purchase.php");
    exit();

}
?>