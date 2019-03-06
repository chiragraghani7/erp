<?php

   require_once("includes/functions.php");
   require_once("includes/status-constants.php");
$staff_first_name = array("avisha", "trupti", "pearl", "richard", "mohit", "parvez", "parmod", "akash", "amit","sarfaraz","jaiyam","prakash","rajesh","ashok","puran");
$staff_middle_name = array("prakash","rajesh","ashok","puran","karan","sunil","gaithode","jagu","prakash","rajesh","ashok","puran","karan","sunil","gaithode");
$staff_last_name = array("nagarkar","raghani","punjabi","kanjan","sumai","thakkar","sadhwani","janyani","narang","raghani","punjabi","kanjan","sumai","thakkar","sadhwani");
echo count($staff_last_name);
$staff_number = array("283461894","8468126491","714832468","47162466","562356922","988462873","9748858275","859773456","283461894","8468126491","714832468","47162466","562356922","988462873","9748858275");
echo count($staff_number);
$staff_department_id = array("1","2","3","4","5");
$staff_gender="Male";
$staff_dob = array("27-03-1998","21-04-1998","12-10-1998","03-04-1998","17-09-1998","27-03-1998","21-04-1998","12-10-1998","03-04-1998","17-09-1998","27-03-1998","21-04-1998","12-10-1998","03-04-1998","17-09-1998");
echo count($staff_dob);
$is_teaching_staff = array(0,1);
$staff_designation_id = array(1,2,3,4,5,6);
$user_id = 18;

for($i=0;$i<15;$i++){
    $j=$i%4;
    $k=$i/2;
    $m=$i%6;
    $query = "INSERT INTO staff (user_id,staff_first_name,staff_middle_name,staff_last_name,staff_number,staff_dept_id,staff_gender,staff_dob,staff_designation_id,is_teaching_staff,created_at) VALUES($user_id,'$staff_first_name[$i]','$staff_middle_name[$i]','$staff_last_name[$i]','$staff_number[$i]',$staff_department_id[$j],'$staff_gender','$staff_dob', $staff_designation_id[$m], $is_teaching_staff[$k],now())";
    $user_id++;
    $result= mysqli_query($connection,$query);
    checkQueryResult($result);
}


      
        
        
        
?>