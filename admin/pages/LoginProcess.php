<?php
                 session_start();
                 include_once("../conn.php");
                 if(isset($_REQUEST['Login'])){
                    $userid =  $_REQUEST['userid'];
                    $password = $_REQUEST['password'];
                    $query = "select * from  login_admin where userid = '$userid' and password = md5('$password')";
                    $result = mysqli_query($conn,$query);
                    $row = mysqli_fetch_object($result);
                    if($row){
                        $_SESSION['login_user'] = $row ->userid;
                        $_SESSION['email'] = $row->email;
                        $_SESSION['address'] = $row->address;
                        $_SESSION['name'] = $row->name;
                        $_SESSION['admin'] = true;
                        $_SESSION['error'] = null;
                        header("location: ../index.php");
                    }else{
                        $_SESSION['error'] = "UserID or Password Not Match ...!";
                        header("location: ../index.php");
                    }

                 }
                 

?>