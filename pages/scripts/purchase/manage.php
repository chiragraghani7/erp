<?php
require_once("../../includes/db.php");

$columns = array("","purchase.purchase_name", "purchase.eoq","purchase_sale_rate.rate_of_sale", "purchase.additional_specification", "supplier_name", "category.category_name");

    $query = "SELECT purchase.image_extension, purchase.purchase_id, purchase.purchase_name, purchase.eoq, purchase_sale_rate.rate_of_sale, purchase.additional_specification,GROUP_CONCAT( DISTINCT supplier.supplier_name, ',') as supplier_name, category.category_name,purchase.deleted FROM purchase,supplier,category,purchase_sale_rate,purchase_supplier WHERE purchase.category_id = category.category_id AND purchase.purchase_id = purchase_supplier.purchase_id AND purchase_supplier.supplier_id = supplier.supplier_id AND purchase.purchase_id = purchase_sale_rate.purchase_id GROUP BY purchase.purchase_id HAVING purchase.deleted=0";

if(isset($_POST["search"]["value"])){
   $query .= " AND (purchase.purchase_name like '%".$_POST["search"]["value"]."%' OR category.category_name like '%".$_POST['search']['value']."%'OR purchase.eoq like '%".$_POST['search']['value']."%'OR purchase_sale_rate.rate_of_sale like '%".$_POST['search']['value']."%'OR supplier_name like '%".$_POST['search']['value']."%')";
   
}
if(isset($_POST["order"])){
    $query .= " ORDER BY ".$columns[$_POST['order']['0']['column']]." ".$_POST['order']['0']['dir'];
}else{
    $query .= " ORDER BY ".$columns[1]." ASC"; 
}
$query1 = "";
if($_POST["length"]!=-1){
    $query1 = ' LIMIT '. $_POST['start'] . ','.$_POST['length'];
}
$number_filtered_row = mysqli_num_rows(mysqli_query($connection, $query));

$result = mysqli_query($connection, $query . $query1);
$data = array();

while($row = mysqli_fetch_assoc($result)){
    $sub_array = array();
    
    
    $sub_array[] = $row['purchase_id']."." .$row['image_extension'];
    
    
//    $image_name = $row['purchase_id'].".".$row['image_extension'];
//    if($row['image_extension'] !=""){
//        $image_path= "<img src='http://localhost/erp/assets/purchases/images/"+ .$image_name. +"' class ='img-responsive' height='75'/>";
//
//    }else{
//        $image_path='<img class = "img-responsive" src="http://www.placehold.it/75x75/EFEFEF/AAAAAA&amp;text=no+image" alt="" />';
//    }
    $sub_array[] = $row["purchase_name"];
    $sub_array[] = $row["eoq"];
    $sub_array[] = $row["rate_of_sale"];
    $sub_array[] = $row["additional_specification"];
    $sub_array[] = $row["supplier_name"];
    $sub_array[] = $row["category_name"];
    
    $sub_array[] = "<button class='edit fa fa-pencil btn blue' id='".$row['purchase_id']."' data-toggle='modal' data-target='#editModal'></button>";
    $sub_array[] = "<button class='delete fa fa-trash btn red' id='".$row['purchase_id']."' data-toggle='modal' data-target='#deleteModal'></button>";
    //I MAY HAVE TO ADD SOME MORE COLUMNS!
    $data[] = $sub_array; 
    

}

function get_all_data($connection){
    $query = "SELECT * FROM purchase";
    return (mysqli_num_rows(mysqli_query($connection, $query)));
    
}
$output = array(
    "draw" => intval($_POST['draw']),
    "recordsTotal" => get_all_data($connection),
    "recordsFiltered" => $number_filtered_row,
    "data" => $data,
);

echo json_encode($output);
?>