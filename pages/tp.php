<?php

   require_once("includes/functions.php");
   require_once("includes/status-constants.php");

        $names_email = array("chirag@gmail.com", "dhiren@gmail.com", "jatin@gmail.com", "rahul@gmail.com", "narang@gmail.com", "sumai@gmail.com", "akshay@gmail.com", "shyam@gmail.com", "nikhil@gmail.com", "varun@gmail.com", "dhiraj@gmail.com", "karan@gmail.com", "roshni@gmail.com", "khushboo@gmail.com", "latika@gmail.com","anisha@gmail.com", "avisha@gmail.com", "trupti@gmail.com", "pearl@gmail.com", "richard@gmail.com", "mohit@gmail.com", "parvez@gmail.com", "parmod@gmail.com", "akash@gmail.com", "amit@gmail.com","sarfaraz@gmail.com","jaiyam@gmail.com","prakash@gmail.com","rajesh@gmail.com","ashok@gmail.com","puran@gmail.com","karan@gmail.com","sunil@gmail.com","gaithode@gmail.com","jagu@gmail.com","hiro@gmail.com","girish@gmail.com","girishlal@gmail.com","sunil@gmail.com","sagar@gmail.com", "jatin@gmail.com","pali@gmail.com","ashnil@gmail.com","rahul@gmail.com","gaurav@gmail.com","sahil@gmail.com","khushi@gmail.com");
        $user_password = '$2y$10$CAXhnR08FFY6Ofry4j1O1OgiNz5BvabPRksl.rtueno7l4fTeSf82';
        $user_role_id = array(2,3,5,6,7,8);
        $is_email_verified = 0;
        $is_fully_registered = 0;
        $is_first_login = 0;
        $is_deleted = 0;
        
        
        $j=0;
        
         for($i=0;$i<15;$i++){
            $j=;
        $query = "UPDATE users SET user_role_id =$user_role_id[i]  WHERE user_id>=18 && user_id<=32";
            $result = mysqli_query($connection, $query);
         }
        
        
        checkQueryResult($result);
        
        
?>
    
