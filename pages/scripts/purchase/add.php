<?php
session_start();
require_once("../../includes/functions.php");
$employee_id = $_SESSION['employee_id'];
// code to upload image file
//$image_name = $_FILES['purchase_image']['name'];
//$image_size = $_FILES['purchase_image']['size'];
//$temp_name = $_FILES['purchase_image']['tmp_name'];
//$file_type = $_FILES['purchase_image']['type'];
//
//$file_extension = strtolower(end(explode("." , $image_name)));
//echo "Image Name :".$image_name;
//echo "<br> Image Size : $image_size";
//echo "<br> File type : $file_type";
//echo "<br> File extension : $file_extension";
//
//$valid_extension = array("jpeg", "jpg", "png");
//if(in_array($file_extension, $valid_extension) == false){
//    $error_msg[] = "Image is not valid! please choose jpeg or png file!!";
//}
//if($image_size>2097152){
//    echo "Image Size is too big please select image less tha 2MB";
//}
//if(empty($error_msg)){
//    move_uploaded_file($temp_name, "../../../assets/purchases/images/".$image_name);
//    echo "File Uploaded Successfully!!";
//}else{
//    print_r($error_msg);
//}
//end of code 

//foreach($suppliers as $supplier_id){
//    echo $supplier_id;
//}
if(isset($_POST['add_purchase'])){
    //checking whether the file was uploaded or not
    if(isset($_FILES['purchase_image'])){
        // yes the file was uploaded so we are initializing all the required variables
        $image_name = $_FILES['purchase_image']['name'];
        $image_size = $_FILES['purchase_image']['size'];
        $temp_name = $_FILES['purchase_image']['tmp_name'];
        $file_type = $_FILES['purchase_image']['type'];
        $file_extension = strtolower(end(explode("." , $image_name)));
    }
    $purchase_name = $_POST['purchase_name'];
    $rate_of_sale = $_POST['rate_of_sale'];
    $additional_specification = $_POST['additional_specification'];
    $category_id = $_POST['category_id'];
    $eoq = $_POST['eoq'];
    $suppliers = $_POST['supplier_id'];
    
    $tablename = "purchase";
    $columns = "purchase_name, eoq, additional_specification, category_id, image_extension,  created_by";
    $values = "'$purchase_name', $eoq, '$additional_specification', '$category_id', '$file_extension', '$employee_id'";
    $result = insert($tablename, $columns, $values);
     //purchase has been added
    
    //getting the last purchase_id which was automatically created by DBMS 
    $purchase_id = mysqli_insert_id($connection);
    $tablename = "purchase_sale_rate";
    $columns = "purchase_id, rate_of_sale, wef, created_by";
    $values = "$purchase_id, $rate_of_sale, now(), $employee_id";
    $result = insert($tablename, $columns, $values);
   
    
    
    $tablename = "purchase_supplier";
    $columns = "purchase_id, supplier_id";
    foreach($suppliers as $supplier_id){
        $values = "$purchase_id, $supplier_id";
        $result = insert($tablename, $columns, $values);
    }
    
    // code to upload the file
    
    if(isset($_FILES['purchase_image'])){
     move_uploaded_file($temp_name, "../../../assets/purchases/images/".$purchase_id.".".$file_extension);       
    }
//    echo "Added";
    $_SESSION['status'] = CUSTOMER_ADD_SUCCESS;
    
}

?>