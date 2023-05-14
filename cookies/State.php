<?php
    // This is a file for state management

    class State{
        function session_active(){
            if(isset($_SESSION['active'])){
                // if the user is logged in
                return true;
            }
        }
        
        function cookie_active(){
            if(isset($_COOKIE['userId'])){
                // if the user has an account
                return true;
            }
        }

        function set_cookie($user_id){
            setcookie('userId', $user_id, time()+(60*60));
            
        }
 
        function logout(){
            unset($_SESSION['active']);
        }
    }
?>