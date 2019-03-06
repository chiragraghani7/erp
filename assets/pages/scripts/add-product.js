jQuery(document).ready(function(){
    $("#category_id").select2({
       placeholder: "select..", 
    });
    $("#supplier_id").select2({
        placeholder: "select..",
        multiple: true,
    });
});