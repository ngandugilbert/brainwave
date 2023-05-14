<?php 
    require_once './Models/UserModel.php';

    $obj = new UserModel();
   // $obj->create_user("Gilbert", "Ng'andu", "ngandugilbert18@gmail.com");
   // $obj->get_user(1);
   
    $obj->login_encrypted("banda@gmail.com", "test1234");
