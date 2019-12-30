<?php
        session_start();
        if(!isset($_SESSION['login_user'])){
            $content = "pages/Login.php";
            require('loginTmpl.php');
            exit;
        }else if(isset($_REQUEST['Login'])){
	
            $content = "pages/Login.php";
            require "LoginTmpl.php";
            
        }else if(isset($_REQUEST['AddServices'])){
	
            $content = "pages/AddServices.php";
            require "adminTmpl.php";
            
        }else if(isset($_REQUEST['ViewServices'])){
	
            $content = "pages/ViewServices.php";
            require "adminTmpl.php";
            
        }else if(isset($_REQUEST['ViewSubServices'])){
	
            $content = "pages/ViewSubServices.php";
            require "adminTmpl.php";
            
        }
        else{
            if(isset($_SESSION['admin'])){
                
                $content = "pages/Dashbord.php";
                require "adminTmpl.php";
            }else{
                $content = "pages/Login.php";
                require "LoginTmpl.php";	
            }	
        }
?>